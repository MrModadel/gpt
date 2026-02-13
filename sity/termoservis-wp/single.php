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

	.post-nav {
		margin-top: 26px;
		display: grid;
		grid-template-columns: 1fr 1fr;
		gap: 14px;
	}

	.post-nav a {
		display: block;
		background: rgba(0, 86, 184, 0.06);
		border: 1px solid rgba(0, 86, 184, 0.18);
		border-radius: 14px;
		padding: 14px;
		color: var(--primary);
		font-weight: 800;
		text-decoration: none;
	}

	.post-nav a:hover {
		background: rgba(0, 86, 184, 0.10);
		box-shadow: 0 12px 26px rgba(0, 86, 184, 0.10);
	}

	.post-nav .nav-next {
		text-align: right;
	}

	@media (max-width: 760px) {
		.post-hero {
			padding: 76px 0 52px;
		}

		.post-nav {
			grid-template-columns: 1fr;
		}

		.post-nav .nav-next {
			text-align: left;
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

						<div class="post-body">
							<?php the_content(); ?>
							<?php wp_link_pages(); ?>
						</div>

						<div class="post-nav">
							<div class="post-nav-prev">
								<?php previous_post_link( '%link', '<i class="fas fa-chevron-left"></i> %title' ); ?>
							</div>
							<div class="post-nav-next">
								<?php next_post_link( '%link', '%title <i class="fas fa-chevron-right"></i>' ); ?>
							</div>
						</div>
					</div>
				</div>
			</section>
		<?php endwhile; ?>
	<?php endif; ?>
</main>

<?php
get_footer();
