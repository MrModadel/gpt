<?php
// telegram-send.php
// Универсальный обработчик для отправки данных форм в Telegram

// Настройки
$bot_token = '8588271571:AAFCGdoM24DFRUi6QhJPE7JV7C05F6xh5Tc';
$chat_id   = '-1003550560566';

// Определяем заголовок сообщения
$formType = $_POST['formType'] ?? 'Форма с сайта';
$text = "📩 $formType\n";
$text .= str_repeat("━", 30) . "\n\n";

// Эмодзи для разных типов полей
$emojiMap = [
    'name' => '👤',
    'phone' => '📞',
    'email' => '✉️',
    'message' => '💬',
    'time' => '⏰',
    'model' => '🔧',
    'location' => '📍',
    'noise' => '🔊',
    'water' => '💧',
    'climate' => '🌡️',
    'budget' => '💰',
    'company' => '🏢',
    'position' => '💼',
    'request' => '📝',
    'notes' => '📄',
    'temp' => '🌡️',
    'flow' => '💦',
    'power' => '⚡',
    'media' => '🧪',
    'timeline' => '⏳',
    'funding' => '💳',
    'file' => '📎',
];

// Обрабатываем все POST данные
$postedFields = array_diff_key($_POST, array_flip(['formType', 'submitBtn'])); // Исключаем служебные поля

// Разделяем поля на основные, чекбоксы и текстовые поля
$groupedData = [
    'main' => [],
    'checkboxes' => [],
    'textarea' => [],
];

foreach ($postedFields as $fieldName => $fieldValue) {
    if (empty($fieldValue)) continue;
    
    // Получаем эмодзи
    $emoji = '';
    foreach ($emojiMap as $key => $symbol) {
        if (strpos(strtolower($fieldName), $key) !== false) {
            $emoji = $symbol;
            break;
        }
    }
    if (empty($emoji)) $emoji = '•';
    
    // Создаём красивое название поля
    $label = preg_replace('/([A-Z])/', ' $1', $fieldName);
    $label = ucfirst(trim(str_replace(['request', 'id'], '', $label)));
    
    // Классифицируем тип поля
    if (is_array($fieldValue)) {
        $groupedData['checkboxes'][$label] = implode(', ', $fieldValue);
    } else if (strlen($fieldValue) > 100 || strpos($fieldName, 'Notes') !== false || strpos($fieldName, 'notes') !== false) {
        $groupedData['textarea'][$label] = $fieldValue;
    } else {
        $groupedData['main'][$label] = $fieldValue;
    }
}

// Форматируем основные данные
if (!empty($groupedData['main'])) {
    $text .= "🔹 *Основная информация:*\n";
    foreach ($groupedData['main'] as $label => $value) {
        // Ищем эмодзи
        $emoji = '•';
        foreach ($emojiMap as $key => $symbol) {
            if (strpos(strtolower($label), strtolower($key)) !== false) {
                $emoji = $symbol;
                break;
            }
        }
        $text .= "$emoji $label: <b>$value</b>\n";
    }
    $text .= "\n";
}

// Форматируем чекбоксы
if (!empty($groupedData['checkboxes'])) {
    $text .= "✓ *Выбранные опции:*\n";
    foreach ($groupedData['checkboxes'] as $label => $values) {
        $text .= "• $label: <b>$values</b>\n";
    }
    $text .= "\n";
}

// Форматируем текстовые поля
if (!empty($groupedData['textarea'])) {
    $text .= "📋 *Дополнительная информация:*\n";
    foreach ($groupedData['textarea'] as $label => $value) {
        $text .= "━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
        $text .= "<b>$label:</b>\n";
        $text .= htmlspecialchars($value) . "\n\n";
    }
}

// Добавляем время отправки
$text .= "━" . str_repeat("━", 28) . "\n";
$text .= "🕐 Время отправки: " . date('d.m.Y H:i:s') . "\n";
$text .= "🌐 IP: " . ($_SERVER['REMOTE_ADDR'] ?? 'N/A');

// Отправка текста в Telegram
$sendTextUrl = "https://api.telegram.org/bot$bot_token/sendMessage";
$params = [
    'chat_id' => $chat_id,
    'text' => $text,
    'parse_mode' => 'HTML'
];

$options = [
    'http' => [
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($params),
    ]
];
$context  = stream_context_create($options);
file_get_contents($sendTextUrl, false, $context);

// Обработка файлов (до 50 МБ за файл)
function termoservis_normalize_uploaded_files($filesData) {
    if (empty($filesData) || !isset($filesData['name'])) {
        return [];
    }

    // Одиночный файл
    if (!is_array($filesData['name'])) {
        return [$filesData];
    }

    // Множественная загрузка
    $normalized = [];
    $fileCount = count($filesData['name']);

    for ($i = 0; $i < $fileCount; $i++) {
        $normalized[] = [
            'name' => $filesData['name'][$i] ?? '',
            'type' => $filesData['type'][$i] ?? '',
            'tmp_name' => $filesData['tmp_name'][$i] ?? '',
            'error' => $filesData['error'][$i] ?? UPLOAD_ERR_NO_FILE,
            'size' => $filesData['size'][$i] ?? 0,
        ];
    }

    return $normalized;
}

if (!empty($_FILES)) {
    foreach ($_FILES as $fieldName => $filesData) {
        foreach (termoservis_normalize_uploaded_files($filesData) as $file) {
            if (($file['error'] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_OK) {
                continue;
            }

            $fileSize = $file['size'] ?? 0;
            if (!is_numeric($fileSize) || $fileSize > 50 * 1024 * 1024) {
                continue;
            }

            $tmpFile = $file['tmp_name'] ?? '';
            $fileName = $file['name'] ?? '';
            if (empty($tmpFile) || empty($fileName)) {
                continue;
            }

            $sendFileUrl = "https://api.telegram.org/bot$bot_token/sendDocument";
            $mimeType = function_exists('mime_content_type') ? mime_content_type($tmpFile) : 'application/octet-stream';
            $postFields = [
                'chat_id' => $chat_id,
                'document' => new CURLFile($tmpFile, $mimeType, $fileName),
                'caption' => "📎 Файл: $fieldName"
            ];

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $sendFileUrl);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_exec($ch);
            curl_close($ch);
        }
    }
}

echo json_encode(['success' => true, 'message' => 'OK']);
