<?php

/**
 * The template for displaying category archives.
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

$category_obj  = get_queried_object();
$category_name = isset( $category_obj->name ) ? (string) $category_obj->name : 'Рубрика';
$category_desc = category_description();

get_header();
?>

<style>
	.archive-page {
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

	.archive-page .container {
		width: min(1200px, calc(100% - 32px));
		margin: 0 auto;
	}

	.archive-breadcrumbs {
		background: #ffffff;
		border-bottom: 1px solid rgba(0, 0, 0, 0.06);
		padding: 14px 0;
		font-size: 0.92rem;
	}

	.archive-breadcrumbs a {
		color: var(--primary);
		text-decoration: none;
	}

	.archive-breadcrumbs a:hover {
		text-decoration: underline;
	}

	.archive-breadcrumbs span {
		color: var(--muted);
		margin: 0 8px;
	}

	.archive-hero {
		background:
			linear-gradient(105deg, rgba(0, 86, 184, 0.92) 0%, rgba(0, 86, 184, 0.74) 100%),
			url('<?php echo esc_url( $hero_bg_url ); ?>') center/cover no-repeat;
		color: #ffffff;
		padding: 88px 0 56px;
		position: relative;
		overflow: hidden;
	}

	.archive-hero:before {
		content: '';
		position: absolute;
		inset: 0;
		background:
			radial-gradient(1200px 600px at 10% 15%, rgba(255, 255, 255, 0.14), transparent 60%),
			radial-gradient(900px 520px at 85% 10%, rgba(0, 0, 0, 0.18), transparent 60%);
		pointer-events: none;
	}

	.archive-hero .container {
		position: relative;
		z-index: 1;
	}

	.archive-kicker {
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

	.archive-hero h1 {
		margin: 0 0 12px;
		line-height: 1.22;
		color: #ffffff;
		text-align: left;
		text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.25);
	}

	.archive-hero p {
		font-size: 1.05rem;
		opacity: 0.95;
		line-height: 1.75;
		margin: 0;
		max-width: 85ch;
	}

	.archive-content {
		padding: 56px 0 86px;
	}

	.archive-grid {
		display: grid;
		grid-template-columns: repeat(3, minmax(0, 1fr));
		gap: 18px;
	}

	.archive-card {
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

	.archive-card:hover {
		transform: translateY(-2px);
		border-color: rgba(0, 86, 184, 0.22);
		box-shadow: var(--shadow-strong);
	}

	.archive-thumb {
		display: block;
		position: relative;
		padding-top: 56%;
		background: linear-gradient(135deg, rgba(0, 86, 184, 0.16), rgba(0, 163, 255, 0.12));
		overflow: hidden;
	}

	.archive-thumb img {
		position: absolute;
		inset: 0;
		width: 100%;
		height: 100%;
		object-fit: cover;
	}

	.archive-body {
		padding: 18px 18px 16px;
		display: flex;
		flex-direction: column;
		gap: 10px;
		flex: 1;
	}

	.archive-meta {
		display: flex;
		align-items: center;
		gap: 10px;
		color: var(--muted);
		font-size: 0.92rem;
	}

	.archive-meta i {
		color: rgba(0, 86, 184, 0.75);
	}

	.archive-title {
		margin: 0;
		line-height: 1.35;
		font-size: 1.08rem;
	}

	.archive-title a {
		color: #1f2a3a;
		text-decoration: none;
	}

	.archive-title a:hover {
		color: var(--primary);
		text-decoration: underline;
	}

	.archive-excerpt {
		color: var(--muted);
		line-height: 1.7;
		margin: 0;
	}

	.archive-footer {
		margin-top: auto;
		padding-top: 6px;
	}

	.archive-readmore {
		color: var(--primary);
		font-weight: 800;
		text-decoration: none;
		display: inline-flex;
		align-items: center;
		gap: 8px;
	}

	.archive-readmore:hover {
		text-decoration: underline;
	}

	.archive-pagination {
		margin-top: 26px;
	}

	.archive-pagination .nav-links {
		display: flex;
		flex-wrap: wrap;
		gap: 10px;
		justify-content: center;
	}

	.archive-pagination a,
	.archive-pagination span {
		display: inline-flex;
		align-items: center;
		justify-content: center;
		min-width: 44px;
		padding: 10px 12px;
		border-radius: 999px;
		border: 1px solid rgba(0, 86, 184, 0.18);
		background: rgba(0, 86, 184, 0.06);
		color: var(--primary);
		font-weight: 800;
		text-decoration: none;
	}

	.archive-pagination span.current {
		background: linear-gradient(90deg, var(--primary) 0%, var(--primary-2) 100%);
		border-color: transparent;
		color: #ffffff;
	}

	.archive-empty {
		border: 2px dashed rgba(0, 86, 184, 0.22);
		background: rgba(0, 86, 184, 0.04);
		border-radius: var(--radius);
		padding: 18px;
		color: #0f2f5d;
	}

	.archive-empty p {
		margin: 0;
		line-height: 1.75;
	}

	@media (max-width: 980px) {
		.archive-grid {
			grid-template-columns: repeat(2, minmax(0, 1fr));
		}
	}

	@media (max-width: 680px) {
		.archive-hero {
			padding: 78px 0 52px;
		}

		.archive-grid {
			grid-template-columns: 1fr;
		}
	}

	@media (prefers-reduced-motion: reduce) {
		.archive-card {
			transition: none;
		}

		.archive-card:hover {
			transform: none;
		}
	}
</style>

<main class="archive-page" id="category-archive">
	<div class="archive-breadcrumbs">
		<div class="container">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Главная</a> <span>/</span>
			<a href="<?php echo esc_url( $blog_url ); ?>">Блог / Статьи</a> <span>/</span>
			<strong><?php echo esc_html( $category_name ); ?></strong>
		</div>
	</div>

	<section class="archive-hero">
		<div class="container">
			<a class="archive-kicker" href="<?php echo esc_url( $blog_url ); ?>">
				<i class="fas fa-arrow-left"></i> Назад в блог
			</a>
			<h1><?php echo esc_html( $category_name ); ?></h1>
			<?php if ( ! empty( $category_desc ) ) : ?>
				<div><?php echo wp_kses_post( $category_desc ); ?></div>
			<?php else : ?>
				<p>Публикации в рубрике «<?php echo esc_html( $category_name ); ?>».</p>
			<?php endif; ?>
		</div>
	</section>

	<section class="archive-content">
		<div class="container">
			<?php if ( have_posts() ) : ?>
				<div class="archive-grid">
					<?php while ( have_posts() ) : ?>
						<?php
						the_post();
						$excerpt = get_the_excerpt();
						if ( $excerpt === '' ) {
							$excerpt = wp_strip_all_tags( get_the_content() );
						}
						$excerpt = wp_trim_words( $excerpt, 26 );
						?>
						<article class="archive-card">
							<a class="archive-thumb" href="<?php the_permalink(); ?>" aria-label="<?php the_title_attribute(); ?>">
								<?php if ( has_post_thumbnail() ) : ?>
									<?php the_post_thumbnail( 'medium_large', array( 'loading' => 'lazy', 'decoding' => 'async' ) ); ?>
								<?php endif; ?>
							</a>

							<div class="archive-body">
								<div class="archive-meta">
									<i class="far fa-calendar"></i>
									<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date( 'd.m.Y' ) ); ?></time>
								</div>

								<h2 class="archive-title">
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</h2>

								<p class="archive-excerpt"><?php echo esc_html( $excerpt ); ?></p>

								<div class="archive-footer">
									<a class="archive-readmore" href="<?php the_permalink(); ?>">
										Читать <i class="fas fa-arrow-right"></i>
									</a>
								</div>
							</div>
						</article>
					<?php endwhile; ?>
				</div>

				<div class="archive-pagination">
					<?php
					the_posts_pagination(
						array(
							'mid_size'  => 1,
							'prev_text' => '<i class="fas fa-chevron-left"></i>',
							'next_text' => '<i class="fas fa-chevron-right"></i>',
						)
					);
					?>
				</div>
			<?php else : ?>
				<div class="archive-empty">
					<p>Пока нет записей в этой рубрике.</p>
				</div>
			<?php endif; ?>
		</div>
	</section>
</main>

<?php
get_footer();
