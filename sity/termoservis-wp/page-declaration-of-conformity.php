<?php

/**
 * Template Name: Декларации о соответствии
 *
 * @package Termoservis
 */

$uploads        = wp_get_upload_dir();
$image_relative = '2026/02/full_lek8ggyf.webp';

$image_url = '';
if ( ! empty( $uploads['baseurl'] ) ) {
	$image_url = trailingslashit( $uploads['baseurl'] ) . $image_relative;
} else {
	$image_url = content_url( '/uploads/' . $image_relative );
}

get_header();
?>

<style>
	.declaration-page {
		--primary: #0056b8;
		--bg: #f6f8fb;
		--card: #ffffff;
		--border: rgba(0, 0, 0, 0.08);
		--shadow: 0 18px 55px rgba(0, 0, 0, 0.12);
		--radius: 18px;

		background:
			radial-gradient(1200px 600px at 12% 10%, rgba(0, 86, 184, 0.08), transparent 55%),
			radial-gradient(900px 520px at 88% 5%, rgba(0, 163, 255, 0.06), transparent 55%),
			var(--bg);
		padding: 64px 0;
	}

	.declaration-container {
		width: min(1100px, calc(100% - 32px));
		margin: 0 auto;
	}

	.declaration-card {
		background: var(--card);
		border: 1px solid var(--border);
		border-radius: var(--radius);
		box-shadow: var(--shadow);
		padding: clamp(12px, 2vw, 22px);
	}

	.declaration-sr {
		position: absolute;
		width: 1px;
		height: 1px;
		padding: 0;
		margin: -1px;
		overflow: hidden;
		clip: rect(0, 0, 0, 0);
		white-space: nowrap;
		border: 0;
	}

	.declaration-link {
		display: block;
		width: min(100%, 920px);
		margin: 0 auto;
		cursor: zoom-in;
		border-radius: 12px;
	}

	.declaration-image {
		width: 100%;
		height: auto;
		display: block;
		border-radius: 12px;
		background: #ffffff;
		box-shadow: 0 10px 30px rgba(0, 0, 0, 0.10);
		transition: transform 160ms ease, box-shadow 160ms ease;
	}

	.declaration-link:hover .declaration-image {
		transform: translateY(-2px);
		box-shadow: 0 18px 50px rgba(0, 0, 0, 0.16);
	}

	.declaration-link:focus-visible .declaration-image {
		outline: 3px solid rgba(0, 86, 184, 0.45);
		outline-offset: 6px;
	}

	@media (max-width: 480px) {
		.declaration-page {
			padding: 44px 0;
		}

		.declaration-container {
			width: calc(100% - 22px);
		}
	}

	@media (prefers-reduced-motion: reduce) {
		.declaration-image {
			transition: none;
		}

		.declaration-link:hover .declaration-image {
			transform: none;
		}
	}
</style>

<main class="declaration-page" id="declaration-of-conformity">
	<h1 class="declaration-sr"><?php echo esc_html( get_the_title() ); ?></h1>

	<div class="declaration-container">
		<div class="declaration-card">
			<a class="declaration-link" href="<?php echo esc_url( $image_url ); ?>" target="_blank" rel="noopener" aria-label="Открыть декларацию в новой вкладке">
				<img class="declaration-image" src="<?php echo esc_url( $image_url ); ?>" alt="Декларации о соответствии" decoding="async" fetchpriority="high" loading="eager">
			</a>
		</div>
	</div>
</main>

<?php
get_footer();
