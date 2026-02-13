<?php

/**
 * The template for displaying single posts.
 *
 * @package Termoservis
 */

$theme_uri   = get_template_directory_uri();
$hero_bg_url = $theme_uri . '/img/convertio.in_photo-1581094794329-c8112a89af12.webp';

$blog_url   = home_url( '/blog/' );
$blog_pages = get_pages(
	array(
		'meta_key'    => '_wp_page_template',
		'meta_value'  => 'page-blog.php',
		'number'      => 1,
		'post_status' => 'publish',
	)
);

if ( ! empty( $blog_pages ) ) {
	$blog_url = get_permalink( $blog_pages[0]->ID );
}

get_header();
?>

<style>
	.post-page {
		--primary: #0056b8;
		--primary-2: #00a3ff;
		--text: #333333;
		--muted: #666666;
		--bg: #f8f9fa;
		--card: #ffffff;
		--border: rgba(0, 0, 0, 0.08);
		--shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
		--shadow-strong: 0 20px 55px rgba(0, 0, 0, 0.14);
		--radius: 16px;

		background: var(--bg);
		color: var(--text);
	}

	.post-page .container {
		width: min(980px, calc(100% - 32px));
		margin: 0 auto;
	}

	.post-breadcrumbs {
		background: #ffffff;
		border-bottom: 1px solid rgba(0, 0, 0, 0.06);
		padding: 14px 0;
		font-size: 0.92rem;
	}

	.post-breadcrumbs a {
		color: var(--primary);
		text-decoration: none;
	}

	.post-breadcrumbs a:hover {
		text-decoration: underline;
	}

	.post-breadcrumbs span {
		color: var(--muted);
		margin: 0 8px;
	}

	.post-hero {
		background:
			linear-gradient(105deg, rgba(0, 86, 184, 0.92) 0%, rgba(0, 86, 184, 0.74) 100%),
			url('<?php echo esc_url( $hero_bg_url ); ?>') center/cover no-repeat;
		color: #ffffff;
		padding: 86px 0 54px;
		position: relative;
		overflow: hidden;
	}

	.post-hero:before {
		content: '';
		position: absolute;
		inset: 0;
		background:
			radial-gradient(1200px 600px at 10% 15%, rgba(255, 255, 255, 0.14), transparent 60%),
			radial-gradient(900px 520px at 85% 10%, rgba(0, 0, 0, 0.18), transparent 60%);
		pointer-events: none;
	}

	.post-hero .container {
		position: relative;
		z-index: 1;
	}

	.post-kicker {
		display: inline-flex;
		align-items: center;
		gap: 10px;
		padding: 10px 16px;
		background: rgba(255, 255, 255, 0.12);
		border: 1px solid rgba(255, 255, 255, 0.18);
		border-radius: 999px;
		font-weight: 800;
		margin-bottom: 14px;
		text-decoration: none;
		color: #ffffff;
	}

	.post-hero h1 {
		margin: 0 0 12px;
		line-height: 1.22;
		color: #ffffff;
		text-align: left;
		text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.25);
	}

	.post-meta {
		display: flex;
		flex-wrap: wrap;
		gap: 10px 14px;
		align-items: center;
		opacity: 0.95;
	}

	.post-meta-item {
		display: inline-flex;
		align-items: center;
		gap: 8px;
		background: rgba(255, 255, 255, 0.12);
		border: 1px solid rgba(255, 255, 255, 0.18);
		border-radius: 999px;
		padding: 8px 12px;
	}

	.post-meta a {
		color: #ffffff;
		text-decoration: underline;
		text-underline-offset: 2px;
	}

	.post-content {
		padding: 58px 0 80px;
	}

	.post-card {
		background: var(--card);
		border: 1px solid var(--border);
		border-radius: var(--radius);
		box-shadow: var(--shadow-strong);
		padding: clamp(18px, 2.6vw, 32px);
	}

	.post-featured {
		margin: 0 0 18px;
		border-radius: 14px;
		overflow: hidden;
		box-shadow: 0 12px 30px rgba(0, 0, 0, 0.12);
	}

	.post-featured img {
		display: block;
		width: 100%;
		height: auto;
	}

	.post-body {
		color: var(--text);
		line-height: 1.85;
		font-size: 1.02rem;
	}

	.post-body h2,
	.post-body h3,
	.post-body h4 {
		color: #222;
		margin-top: 26px;
		margin-bottom: 14px;
		line-height: 1.35;
	}

	.post-body a {
		color: var(--primary);
		text-decoration: underline;
	}

	.post-fields {
		margin: 0 0 18px;
		border: 1px solid var(--border);
		border-radius: 16px;
		padding: 18px;
		background:
			radial-gradient(900px 520px at 20% 20%, rgba(0, 163, 255, 0.12), transparent 60%),
			radial-gradient(900px 520px at 90% 10%, rgba(0, 86, 184, 0.08), transparent 60%),
			#ffffff;
		box-shadow: 0 12px 28px rgba(0, 0, 0, 0.06);
	}

	.post-fields-header {
		display: flex;
		align-items: center;
		gap: 10px;
		margin-bottom: 12px;
		font-weight: 900;
		color: #1f2a3a;
	}

	.post-fields-header i {
		color: var(--primary);
	}

	.post-fields-grid {
		display: grid;
		grid-template-columns: repeat(2, minmax(0, 1fr));
		gap: 12px 14px;
		margin: 0;
	}

	.post-field {
		border: 1px solid rgba(0, 86, 184, 0.14);
		background: rgba(0, 86, 184, 0.03);
		border-radius: 14px;
		padding: 12px 14px;
	}

	.post-field dt {
		margin: 0;
		color: #1f2a3a;
		font-weight: 900;
		font-size: 0.92rem;
		letter-spacing: 0.01em;
	}

	.post-field dd {
		margin: 8px 0 0;
		color: var(--muted);
		line-height: 1.65;
		word-break: break-word;
	}

	.post-field dd a {
		color: var(--primary);
		text-decoration: underline;
		font-weight: 800;
	}

	.post-field dd ul,
	.post-field dd ol {
		margin: 0;
		padding-left: 1.1rem;
		display: grid;
		gap: 6px;
	}

	.post-field dd li {
		margin: 0;
	}

	.post-field dd p {
		margin: 0;
	}

	.post-field-list {
		margin: 0;
		padding-left: 1.1rem;
		display: grid;
		gap: 6px;
	}

	.post-field-list li {
		margin: 0;
	}

	@media (max-width: 760px) {
		.post-hero {
			padding: 76px 0 52px;
		}

		.post-fields-grid {
			grid-template-columns: 1fr;
		}
	}
</style>

<main class="post-page" id="single-post">
	<div class="post-breadcrumbs">
		<div class="container">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Главная</a> <span>/</span>
			<a href="<?php echo esc_url( $blog_url ); ?>">Блог / Статьи</a> <span>/</span>
			<strong><?php echo esc_html( wp_strip_all_tags( get_the_title() ) ); ?></strong>
		</div>
	</div>

	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : ?>
			<?php
			the_post();
			$categories = get_the_category();
			?>

			<section class="post-hero">
				<div class="container">
					<a class="post-kicker" href="<?php echo esc_url( $blog_url ); ?>">
						<i class="fas fa-arrow-left"></i> Назад в блог
					</a>
					<h1><?php the_title(); ?></h1>

					<div class="post-meta">
						<div class="post-meta-item">
							<i class="far fa-calendar"></i>
							<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date( 'd.m.Y' ) ); ?></time>
						</div>

						<?php if ( ! empty( $categories ) ) : ?>
							<div class="post-meta-item">
								<i class="fas fa-folder-open"></i>
								<?php foreach ( $categories as $cat ) : ?>
									<a href="<?php echo esc_url( get_category_link( $cat->term_id ) ); ?>"><?php echo esc_html( $cat->name ); ?></a>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</section>

			<section class="post-content">
				<div class="container">
					<div class="post-card">
						<?php if ( has_post_thumbnail() ) : ?>
							<div class="post-featured">
								<?php the_post_thumbnail( 'large', array( 'loading' => 'eager', 'decoding' => 'async' ) ); ?>
							</div>
						<?php endif; ?>

						<?php
						$raw_meta = get_post_meta( get_the_ID() );

						$excluded_meta_prefixes = array(
							'rank_math_',
							'aioseo_',
							'yoast_wpseo_',
						);

						$flatten_meta = static function ( $value ) use ( &$flatten_meta ) {
							if ( is_array( $value ) ) {
								$all = array();
								foreach ( $value as $nested ) {
									$all = array_merge( $all, $flatten_meta( $nested ) );
								}
								return $all;
							}

							if ( is_object( $value ) ) {
								if ( method_exists( $value, '__toString' ) ) {
									return array( (string) $value );
								}

								return array( wp_json_encode( $value ) );
							}

							return array( $value );
						};

						$format_meta_key = static function ( $key ) {
							$label = trim( preg_replace( '/\\s+/', ' ', str_replace( array( '_', '-' ), ' ', (string) $key ) ) );
							if ( $label === '' ) {
								return '';
							}

							if ( function_exists( 'mb_strtoupper' ) && function_exists( 'mb_substr' ) ) {
								$first = mb_substr( $label, 0, 1 );
								$rest  = mb_substr( $label, 1 );
								return mb_strtoupper( $first ) . $rest;
							}

							return ucfirst( $label );
						};

						$format_meta_value_html = static function ( $value ) {
							if ( is_bool( $value ) ) {
								$value = $value ? 'Да' : 'Нет';
							}

							if ( is_null( $value ) ) {
								return '';
							}

							$value = trim( (string) $value );
							if ( $value === '' ) {
								return '';
							}

							if ( preg_match( '/<[^>]+>/', $value ) ) {
								return wp_kses_post( $value );
							}

							if ( is_email( $value ) ) {
								return '<a href="mailto:' . esc_attr( $value ) . '">' . esc_html( $value ) . '</a>';
							}

							if ( preg_match( '#^https?://#i', $value ) ) {
								$path = wp_parse_url( $value, PHP_URL_PATH );
								$name = is_string( $path ) && $path !== '' ? basename( $path ) : $value;
								return '<a href="' . esc_url( $value ) . '" target="_blank" rel="noopener"><i class="fas fa-link"></i> ' . esc_html( $name ) . '</a>';
							}

							if ( preg_match( '#^/wp-content/uploads/#', $value ) ) {
								$url  = home_url( $value );
								$name = basename( $value );
								return '<a href="' . esc_url( $url ) . '" target="_blank" rel="noopener"><i class="fas fa-file-download"></i> ' . esc_html( $name ) . '</a>';
							}

							if ( ctype_digit( $value ) ) {
								$attachment_id = (int) $value;
								$attachment    = get_post( $attachment_id );
								if ( $attachment && $attachment->post_type === 'attachment' ) {
									$url  = wp_get_attachment_url( $attachment_id );
									$name = get_the_title( $attachment_id );
									if ( ! $name && is_string( $url ) ) {
										$name = basename( wp_parse_url( $url, PHP_URL_PATH ) );
									}

									if ( is_string( $url ) && $url !== '' ) {
										return '<a href="' . esc_url( $url ) . '" target="_blank" rel="noopener"><i class="fas fa-file-download"></i> ' . esc_html( (string) $name ) . '</a>';
									}
								}
							}

							return nl2br( esc_html( $value ) );
						};

						$display_meta = array();
						foreach ( (array) $raw_meta as $meta_key => $meta_values ) {
							$meta_key = (string) $meta_key;
							if ( $meta_key === '' || $meta_key[0] === '_' ) {
								continue;
							}

							foreach ( $excluded_meta_prefixes as $prefix ) {
								if ( stripos( $meta_key, $prefix ) === 0 ) {
									continue 2;
								}
							}

							$formatted_key = $format_meta_key( $meta_key );
							if ( $formatted_key === '' ) {
								continue;
							}

							$values = array();
							foreach ( (array) $meta_values as $meta_value ) {
								$meta_value = maybe_unserialize( $meta_value );
								foreach ( $flatten_meta( $meta_value ) as $flat_value ) {
									if ( is_array( $flat_value ) || is_object( $flat_value ) ) {
										continue;
									}

									$flat_value = trim( (string) $flat_value );
									if ( $flat_value !== '' ) {
										$values[] = $flat_value;
									}
								}
							}

							$values = array_values( array_unique( $values ) );
							if ( empty( $values ) ) {
								continue;
							}

							$display_meta[] = array(
								'key'   => $formatted_key,
								'raw'   => $meta_key,
								'value' => $values,
							);
						}
						?>

						<?php if ( ! empty( $display_meta ) ) : ?>
							<div class="post-fields" aria-label="Произвольные поля">
								<div class="post-fields-header">
									<i class="fas fa-sliders-h"></i>
									<span>Дополнительные параметры</span>
								</div>
								<dl class="post-fields-grid">
									<?php foreach ( $display_meta as $meta_item ) : ?>
										<div class="post-field">
											<dt><?php echo esc_html( $meta_item['key'] ); ?></dt>
											<dd>
												<?php if ( count( $meta_item['value'] ) > 1 ) : ?>
													<ul class="post-field-list">
														<?php foreach ( $meta_item['value'] as $item_value ) : ?>
															<?php $html_value = $format_meta_value_html( $item_value ); ?>
															<?php if ( $html_value !== '' ) : ?>
																<li><?php echo $html_value; ?></li>
															<?php endif; ?>
														<?php endforeach; ?>
													</ul>
												<?php else : ?>
													<?php echo $format_meta_value_html( $meta_item['value'][0] ); ?>
												<?php endif; ?>
											</dd>
										</div>
									<?php endforeach; ?>
								</dl>
							</div>
						<?php endif; ?>

						<div class="post-body">
							<?php the_content(); ?>
							<?php wp_link_pages(); ?>
						</div>
					</div>
				</div>
			</section>
		<?php endwhile; ?>
	<?php endif; ?>
</main>

<?php
get_footer();
