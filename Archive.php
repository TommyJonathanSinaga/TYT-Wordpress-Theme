<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Reload_Production
 */

/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

/* Blog layout options via customizer */
$blog_layout = get_theme_mod( 'gmr_blog_layout', 'gmr-smallthumb' );
?>

<div id="primary" class="col-md-main">
	<div class="content-area">
		<?php
		/* display only on category, tag or taxonomy newstopic */
		if ( ! Reload_Production_is_amp() ) {
			if ( is_tag() || is_category() || is_tax( 'newstopic' ) ) {
				$modulepopular = get_theme_mod( 'gmr_active-modulepopular', 0 );
				if ( 0 === $modulepopular ) {
					do_action( 'Reload_Production_display_modulepopuler' );
				}
				do_action( 'Reload_Production_banner_after_modulehome' );

				/* Slider */
				$carousel = get_theme_mod( 'gmr_active-headlinearchive', 0 );
				if ( 0 === $carousel ) :
					do_action( 'Reload_Production_display_carousel' );
				endif;
			}
		}
		?>

		<?php
			echo '<h1 class="page-title" ' . Reload_Production_itemprop_schema( 'headline' ) /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ . '>';
				the_archive_title();
			echo '</h1>';

			/* display description archive page */
			the_archive_description( '<div class="taxonomy-description">', '</div>' );
		?>

		<main id="main" class="site-main rpid-infinite-selector" role="main">

		<?php
		if ( have_posts() ) :
			echo '<div id="rpid-main-load">';

			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content', get_post_format() );
				do_action( 'Reload_Production_banner_between_posts' );

			endwhile;
			echo '</div>';

			$loadmore = get_theme_mod( 'rpid_blog_pagination', 'rpid-more' );
			if ( ( 'rpid-infinite' === $loadmore ) || ( 'rpid-more' === $loadmore ) && ! Reload_Production_is_amp() ) {
				$class = 'inf-pagination';
			} else {
				$class = 'pagination';
			}
			echo '<div class="' . esc_html( $class ) . '">';
			echo rpid_get_pagination(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			echo '</div>';
			if ( ( 'rpid-infinite' === $loadmore ) || ( 'rpid-more' === $loadmore ) && ! Reload_Production_is_amp() ) :
				echo '
				<div class="text-center">
					<div class="page-load-status">
						<div class="loader-ellips infinite-scroll-request rpid-ajax-load-wrapper rpid-loader">
							<div class="rpid-ajax-wrap">
								<div class="rpid-ajax-loader">
									<div></div>
									<div></div>
								</div>
							</div>
						</div>
						<p class="infinite-scroll-last">' . esc_attr__( 'No More Posts Available.', 'Reload_Production' ) . '</p>
						<p class="infinite-scroll-error">' . esc_attr__( 'No more pages to load.', 'Reload_Production' ) . '</p>
					</div>';
				if ( 'rpid-more' === $loadmore ) {
					echo '<p><button class="view-more-button heading-text">' . esc_attr__( 'View More', 'Reload_Production' ) . '</button></p>';
				}
				echo '
				</div>
				';
			endif;

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</div><!-- .content-area -->
</div><!-- #primary -->

<?php
get_sidebar();

get_footer();
