<?php
// telegram-send.php

// Настройки
$bot_token = '8588271571:AAFCGdoM24DFRUi6QhJPE7JV7C05F6xh5Tc';
$chat_id   = '-1003550560566'; // пример: -1001234567890

// Получаем данные
$name    = $_POST['name'] ?? '';
$phone   = $_POST['phone'] ?? '';
$email   = $_POST['email'] ?? '';
$message = $_POST['message'] ?? '';
$time    = $_POST['time'] ?? '';
$model   = $_POST['model'] ?? '';
$location   = $_POST['location'] ?? '';
$noise   = $_POST['noise'] ?? '';
$water   = $_POST['water'] ?? '';
$climate   = $_POST['climate'] ?? '';
$budget   = $_POST['budget'] ?? '';
// Формируем текст
$text = "📩 Новая заявка с сайта\n\n";
$text .= "👤 Имя: $name\n";
$text .= "📞 Телефон: $phone\n";
if(!empty($email)){
    $text .= "✉️ Email: $email\n";
}
if(!empty($message)){
    $text .= "💬 Сообщение:\n$message\n";
}
if(!empty($time)){
    $text .= "⏰ Время: $time\n";
}
if(!empty($model)){
    $text .= "🔧 Модель: $model\n";
}
if(!empty($location)){
    $text .= "Выбор клиента:\n";
    $text .= "📍 Локация: $location\n";
}
if(!empty($noise)){
    $text .= "🔊 Шум: $noise\n";
}
if(!empty($water)){
    $text .= "� Вода: $water\n";
}
if(!empty($climate)){
    $text .= "🌡️ Климат: $climate\n";
}
if(!empty($budget)){
    $text .= "💰 Бюджет: $budget\n";
}

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

// ----------------------------
// Обработка файлов (до 10 МБ)
if(!empty($_FILES)){
    foreach($_FILES as $file){
        if($file['error'] === UPLOAD_ERR_OK && $file['size'] <= 10*1024*1024){ // ≤10 МБ
            $tmpFile = $file['tmp_name'];
            $fileName = $file['name'];

            $sendFileUrl = "https://api.telegram.org/bot$bot_token/sendDocument";
            $postFields = [
                'chat_id' => $chat_id,
                'document' => new CURLFile($tmpFile, mime_content_type($tmpFile), $fileName)
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

echo 'OK';
