<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://www.facebook.com/TommyJonathanSinaga
 *
 * @package Reload-Production
 */

/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<div id="primary" class="col-md-main">
	<div class="content-area">
		<h1 class="title" <?php echo Reload_Production_itemprop_schema( 'headline' ); /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?>><?php esc_html_e( 'Nothing Found', 'Reload_Production' ); ?></h1>
		<main id="main" class="site-main" role="main">
			<div class="item-content no-results not-found clearfix">
				<h2 class="page-title screen-reader-text"><?php esc_html_e( 'Error 404', 'Reload_Production' ); ?></h2>
				<section class="error-404 not-found">
					<div class="page-content" <?php echo Reload_Production_itemprop_schema( 'text' ); /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?>>
						<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'Reload_Production' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .page-content -->
				</section><!-- .error-404 -->
			</div>
		</main><!-- #main -->
	</div>
</div><!-- #primary -->

<?php
get_sidebar();

get_footer();
