<?php

/**
 * Template Name: Блог / Статьи
 *
 * @package Termoservis
 */

$theme_uri   = get_template_directory_uri();
$hero_bg_url = $theme_uri . '/img/convertio.in_photo-1581094794329-c8112a89af12.webp';

$blog_sections = array(
	array(
		'id'              => 'company-news',
		'title'           => 'Новости компании',
		'icon'            => 'fa-newspaper',
		'default_slug'    => 'novosti-kompanii',
		'fuzzy_term_name' => 'Новости компании',
		'description'     => 'Официальные новости, события и обновления компании.',
	),
	array(
		'id'              => 'technical-articles',
		'title'           => 'Технические статьи',
		'icon'            => 'fa-file-alt',
		'default_slug'    => 'tehnicheskie-stati',
		'fuzzy_term_name' => 'Технические статьи',
		'description'     => 'Практические материалы, инструкции и разборы по холодильным системам.',
	),
	array(
		'id'              => 'cases-reviews',
		'title'           => 'Кейсы и обзоры',
		'icon'            => 'fa-project-diagram',
		'default_slug'    => 'kejsy-i-obzory',
		'fuzzy_term_name' => 'Кейсы и обзоры',
		'description'     => 'Реальные проекты, результаты внедрений и обзоры решений.',
	),
);

foreach ( $blog_sections as $index => $section ) {
	$term = get_category_by_slug( $section['default_slug'] );

	if ( ! $term ) {
		$fuzzy = get_term_by( 'name', $section['fuzzy_term_name'], 'category' );
		if ( $fuzzy && ! is_wp_error( $fuzzy ) ) {
			$term = $fuzzy;
		}
	}

	$blog_sections[ $index ]['term'] = $term;
}

get_header();

if ( have_posts() ) {
	the_post();
}
?>

<style>
	.blog-hub {
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

	.blog-hub .container {
		width: min(1200px, calc(100% - 32px));
		margin: 0 auto;
	}

	.blog-breadcrumbs {
		background: #ffffff;
		border-bottom: 1px solid rgba(0, 0, 0, 0.06);
		padding: 14px 0;
		font-size: 0.92rem;
	}

	.blog-breadcrumbs a {
		color: var(--primary);
		text-decoration: none;
	}

	.blog-breadcrumbs a:hover {
		text-decoration: underline;
	}

	.blog-breadcrumbs span {
		color: var(--muted);
		margin: 0 8px;
	}

	.blog-hero {
		background:
			linear-gradient(105deg, rgba(0, 86, 184, 0.92) 0%, rgba(0, 86, 184, 0.74) 100%),
			url('<?php echo esc_url( $hero_bg_url ); ?>') center/cover no-repeat;
		color: #ffffff;
		padding: 92px 0 64px;
		position: relative;
		overflow: hidden;
	}

	.blog-hero:before {
		content: '';
		position: absolute;
		inset: 0;
		background:
			radial-gradient(1200px 600px at 10% 15%, rgba(255, 255, 255, 0.14), transparent 60%),
			radial-gradient(900px 520px at 85% 10%, rgba(0, 0, 0, 0.18), transparent 60%);
		pointer-events: none;
	}

	.blog-hero .container {
		position: relative;
		z-index: 1;
	}

	.blog-kicker {
		display: inline-flex;
		align-items: center;
		gap: 10px;
		padding: 10px 16px;
		background: rgba(255, 255, 255, 0.12);
		border: 1px solid rgba(255, 255, 255, 0.18);
		border-radius: 999px;
		font-weight: 700;
		margin-bottom: 14px;
	}

	.blog-hero h1 {
		color: #ffffff;
		text-align: left;
		margin: 0 0 12px;
		text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.25);
	}

	.blog-hero p {
		font-size: 1.08rem;
		opacity: 0.95;
		line-height: 1.75;
		margin: 0;
		max-width: 78ch;
	}

	.blog-nav {
		margin-top: -34px;
		padding-bottom: 14px;
	}

	.blog-nav-grid {
		display: grid;
		grid-template-columns: repeat(3, minmax(0, 1fr));
		gap: 16px;
	}

	.blog-nav-card {
		background: var(--card);
		border: 1px solid var(--border);
		border-radius: var(--radius);
		box-shadow: var(--shadow);
		padding: 18px 18px 16px;
		text-decoration: none;
		color: inherit;
		transition: transform 160ms ease, box-shadow 160ms ease, border-color 160ms ease;
		min-height: 96px;
		display: flex;
		flex-direction: column;
		justify-content: space-between;
	}

	.blog-nav-card:hover {
		transform: translateY(-2px);
		border-color: rgba(0, 86, 184, 0.25);
		box-shadow: var(--shadow-strong);
	}

	.blog-nav-title {
		display: flex;
		align-items: center;
		gap: 10px;
		font-weight: 800;
	}

	.blog-nav-title i {
		color: var(--primary);
	}

	.blog-nav-meta {
		color: var(--muted);
		font-size: 0.92rem;
		margin-top: 10px;
		display: flex;
		align-items: center;
		gap: 10px;
		justify-content: space-between;
	}

	.blog-nav-meta span {
		display: inline-flex;
		align-items: center;
		gap: 6px;
	}

	.blog-admin-note {
		margin: 22px 0 0;
		padding: 14px 14px;
		border-radius: 14px;
		border: 2px dashed rgba(255, 255, 255, 0.35);
		background: rgba(255, 255, 255, 0.12);
	}

	.blog-admin-note strong {
		display: block;
		margin-bottom: 6px;
	}

	.blog-content {
		padding: 56px 0 80px;
	}

	.blog-section {
		scroll-margin-top: 90px;
		padding: 62px 0;
	}

	.blog-section + .blog-section {
		border-top: 1px solid rgba(0, 0, 0, 0.06);
	}

	.blog-section-header {
		display: flex;
		align-items: flex-end;
		justify-content: space-between;
		gap: 18px;
		margin-bottom: 14px;
	}

	.blog-section-title {
		display: flex;
		align-items: center;
		gap: 12px;
	}

	.blog-section-title i {
		color: var(--primary);
		font-size: 1.25rem;
	}

	.blog-section-title h2 {
		margin: 0;
		line-height: 1.2;
		text-align: left;
	}

	.blog-section-desc {
		margin: 0 0 22px;
		color: var(--muted);
		max-width: 85ch;
		line-height: 1.75;
	}

	.blog-actions {
		display: inline-flex;
		align-items: center;
		gap: 10px;
		flex-wrap: wrap;
		justify-content: flex-end;
	}

	.blog-hub .btn {
		display: inline-flex;
		align-items: center;
		gap: 10px;
		padding: 12px 18px;
		border-radius: 999px;
		border: 1px solid rgba(0, 86, 184, 0.22);
		background: rgba(0, 86, 184, 0.08);
		color: var(--primary);
		font-weight: 800;
		text-decoration: none;
		transition: transform 160ms ease, box-shadow 160ms ease, background 160ms ease;
	}

	.blog-hub .btn:hover {
		transform: translateY(-1px);
		box-shadow: 0 12px 25px rgba(0, 86, 184, 0.12);
		background: rgba(0, 86, 184, 0.12);
	}

	.blog-hub .btn.btn-primary {
		background: linear-gradient(90deg, var(--primary) 0%, var(--primary-2) 100%);
		border-color: transparent;
		color: #ffffff;
	}

	.blog-grid {
		display: grid;
		grid-template-columns: repeat(3, minmax(0, 1fr));
		gap: 18px;
	}

	.blog-card {
		background: var(--card);
		border: 1px solid var(--border);
		border-radius: var(--radius);
		box-shadow: var(--shadow);
		overflow: hidden;
		display: flex;
		flex-direction: column;
		min-height: 100%;
		transition: transform 160ms ease, box-shadow 160ms ease, border-color 160ms ease;
	}

	.blog-card:hover {
		transform: translateY(-2px);
		border-color: rgba(0, 86, 184, 0.22);
		box-shadow: var(--shadow-strong);
	}

	.blog-thumb {
		display: block;
		position: relative;
		padding-top: 56%;
		background: linear-gradient(135deg, rgba(0, 86, 184, 0.16), rgba(0, 163, 255, 0.12));
		overflow: hidden;
	}

	.blog-thumb img {
		position: absolute;
		inset: 0;
		width: 100%;
		height: 100%;
		object-fit: cover;
	}

	.blog-thumb-placeholder {
		position: absolute;
		inset: 0;
		display: grid;
		place-items: center;
		color: rgba(0, 86, 184, 0.6);
		font-size: 1.6rem;
	}

	.blog-card-body {
		padding: 18px 18px 16px;
		display: flex;
		flex-direction: column;
		gap: 10px;
		flex: 1;
	}

	.blog-meta {
		display: flex;
		align-items: center;
		gap: 10px;
		color: var(--muted);
		font-size: 0.92rem;
	}

	.blog-meta i {
		color: rgba(0, 86, 184, 0.75);
	}

	.blog-card-title {
		margin: 0;
		line-height: 1.35;
		font-size: 1.08rem;
	}

	.blog-card-title a {
		color: #1f2a3a;
		text-decoration: none;
	}

	.blog-card-title a:hover {
		color: var(--primary);
		text-decoration: underline;
	}

	.blog-card-excerpt {
		color: var(--muted);
		line-height: 1.7;
		margin: 0;
	}

	.blog-card-footer {
		margin-top: auto;
		padding-top: 6px;
	}

	.blog-readmore {
		color: var(--primary);
		font-weight: 800;
		text-decoration: none;
		display: inline-flex;
		align-items: center;
		gap: 8px;
	}

	.blog-readmore:hover {
		text-decoration: underline;
	}

	.blog-empty {
		border: 2px dashed rgba(0, 86, 184, 0.22);
		background: rgba(0, 86, 184, 0.04);
		border-radius: var(--radius);
		padding: 18px;
		color: #0f2f5d;
	}

	.blog-empty p {
		margin: 0;
		line-height: 1.75;
	}

	@media (max-width: 980px) {
		.blog-grid {
			grid-template-columns: repeat(2, minmax(0, 1fr));
		}

		.blog-nav-grid {
			grid-template-columns: repeat(2, minmax(0, 1fr));
		}
	}

	@media (max-width: 680px) {
		.blog-hero {
			padding: 78px 0 56px;
		}

		.blog-nav {
			margin-top: -24px;
		}

		.blog-nav-grid {
			grid-template-columns: 1fr;
		}

		.blog-section-header {
			flex-direction: column;
			align-items: flex-start;
		}

		.blog-actions {
			justify-content: flex-start;
		}

		.blog-grid {
			grid-template-columns: 1fr;
		}
	}

	@media (prefers-reduced-motion: reduce) {
		.blog-nav-card,
		.blog-card,
		.blog-hub .btn {
			transition: none;
		}

		.blog-nav-card:hover,
		.blog-card:hover,
		.blog-hub .btn:hover {
			transform: none;
		}
	}
</style>

<main class="blog-hub" id="blog">
	<div class="blog-breadcrumbs">
		<div class="container">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Главная</a> <span>/</span> <strong><?php echo esc_html( get_the_title() ); ?></strong>
		</div>
	</div>

	<section class="blog-hero">
		<div class="container">
			<div class="blog-kicker">
				<i class="fas fa-newspaper"></i>
				Блог / Статьи
			</div>
			<h1><?php echo esc_html( get_the_title() ); ?></h1>
			<p>Публикации по рубрикам: новости компании, технические статьи, кейсы и обзоры. Добавляйте записи в WordPress и выбирайте нужную рубрику — они автоматически появятся в соответствующем блоке.</p>

			<?php
			$missing_terms = array();
			foreach ( $blog_sections as $section ) {
				if ( empty( $section['term'] ) ) {
					$missing_terms[] = $section['title'];
				}
			}
			?>

			<?php if ( current_user_can( 'manage_options' ) && ! empty( $missing_terms ) ) : ?>
				<div class="blog-admin-note">
					<strong>Администратору:</strong>
					<div>Не найдены рубрики: <?php echo esc_html( implode( ', ', $missing_terms ) ); ?>. Создайте их в разделе «Записи → Рубрики» (можно с такими названиями), чтобы блоки заполнились.</div>
				</div>
			<?php endif; ?>
		</div>
	</section>

	<section class="blog-nav" aria-label="Навигация по рубрикам">
		<div class="container">
			<div class="blog-nav-grid">
				<?php foreach ( $blog_sections as $section ) : ?>
					<?php
					$count_label = 'Пока нет записей';
					if ( ! empty( $section['term'] ) && isset( $section['term']->count ) ) {
						$count_label = (int) $section['term']->count . ' записей';
					}
					?>
					<a class="blog-nav-card" href="#<?php echo esc_attr( $section['id'] ); ?>">
						<div class="blog-nav-title">
							<i class="fas <?php echo esc_attr( $section['icon'] ); ?>"></i>
							<?php echo esc_html( $section['title'] ); ?>
						</div>
						<div class="blog-nav-meta">
							<span><i class="fas fa-layer-group"></i><?php echo esc_html( $count_label ); ?></span>
							<span><i class="fas fa-arrow-down"></i>Смотреть</span>
						</div>
					</a>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="blog-content">
		<div class="container">
			<?php if ( trim( get_the_content() ) !== '' ) : ?>
				<div style="margin: 0 0 26px; color: var(--muted); line-height: 1.75;">
					<?php the_content(); ?>
				</div>
			<?php endif; ?>
		</div>

		<?php foreach ( $blog_sections as $section ) : ?>
			<?php
			$term = ! empty( $section['term'] ) ? $section['term'] : null;

			$posts_query_args = array(
				'post_type'           => 'post',
				'post_status'         => 'publish',
				'posts_per_page'      => 6,
				'ignore_sticky_posts' => true,
				'no_found_rows'       => true,
			);

			if ( $term ) {
				$posts_query_args['cat'] = (int) $term->term_id;
			} else {
				$posts_query_args['post__in'] = array( 0 );
			}

			$posts_query = new WP_Query( $posts_query_args );
			?>

			<section class="blog-section" id="<?php echo esc_attr( $section['id'] ); ?>">
				<div class="container">
					<div class="blog-section-header">
						<div>
							<div class="blog-section-title">
								<i class="fas <?php echo esc_attr( $section['icon'] ); ?>"></i>
								<h2><?php echo esc_html( $section['title'] ); ?></h2>
							</div>
						</div>

						<div class="blog-actions">
							<?php if ( $term ) : ?>
								<a class="btn" href="<?php echo esc_url( get_category_link( $term->term_id ) ); ?>">
									<i class="fas fa-list"></i> Смотреть все
								</a>
							<?php endif; ?>

							<?php if ( current_user_can( 'edit_posts' ) ) : ?>
								<a class="btn btn-primary" href="<?php echo esc_url( admin_url( 'post-new.php' ) ); ?>" target="_blank" rel="noopener">
									<i class="fas fa-plus"></i> Добавить запись
								</a>
							<?php endif; ?>
						</div>
					</div>

					<p class="blog-section-desc"><?php echo esc_html( $section['description'] ); ?></p>

					<?php if ( $posts_query->have_posts() ) : ?>
						<div class="blog-grid">
							<?php while ( $posts_query->have_posts() ) : ?>
								<?php
								$posts_query->the_post();
								$excerpt = get_the_excerpt();
								if ( $excerpt === '' ) {
									$excerpt = wp_strip_all_tags( get_the_content() );
								}
								$excerpt = wp_trim_words( $excerpt, 26 );
								?>
								<article class="blog-card">
									<a class="blog-thumb" href="<?php the_permalink(); ?>" aria-label="<?php the_title_attribute(); ?>">
										<?php if ( has_post_thumbnail() ) : ?>
											<?php the_post_thumbnail( 'medium_large', array( 'loading' => 'lazy', 'decoding' => 'async' ) ); ?>
										<?php else : ?>
											<div class="blog-thumb-placeholder" aria-hidden="true">
												<i class="fas <?php echo esc_attr( $section['icon'] ); ?>"></i>
											</div>
										<?php endif; ?>
									</a>

									<div class="blog-card-body">
										<div class="blog-meta">
											<i class="far fa-calendar"></i>
											<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date( 'd.m.Y' ) ); ?></time>
										</div>

										<h3 class="blog-card-title">
											<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
										</h3>

										<p class="blog-card-excerpt"><?php echo esc_html( $excerpt ); ?></p>

										<div class="blog-card-footer">
											<a class="blog-readmore" href="<?php the_permalink(); ?>">
												Читать <i class="fas fa-arrow-right"></i>
											</a>
										</div>
									</div>
								</article>
							<?php endwhile; ?>
						</div>
					<?php else : ?>
						<div class="blog-empty">
							<p>Пока нет записей в рубрике «<?php echo esc_html( $section['title'] ); ?>». Добавьте новую запись и назначьте ей соответствующую рубрику — после публикации она появится здесь.</p>
						</div>
					<?php endif; ?>

					<?php wp_reset_postdata(); ?>
				</div>
			</section>
		<?php endforeach; ?>
	</section>
</main>

<?php
get_footer();
