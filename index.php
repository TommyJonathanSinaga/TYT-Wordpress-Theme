<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Reload Production
 */

/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

/* Blog layout options via customizer */
$blog_layout = get_theme_mod( 'rpid_blog_layout', 'rpid-smallthumb' );

?>

<div id="primary" class="col-md-main">
	<div class="content-area">
		<?php
		if ( ! rpid_is_amp() ) {
			$modulehome = get_theme_mod( 'rpid_active-module-home', 0 );
			if ( 0 === $modulehome ) {
				do_action( 'rpid_display_modulehome' );
			}

			do_action( 'rpid_banner_after_modulehome' );

			$carousel = get_theme_mod( 'rpid_active-headline', 0 );
			if ( 0 === $carousel ) {
					do_action( 'rpid_display_carousel' );
			}
		}
		?>
		<main id="main" class="site-main rpid-infinite-selector" role="main">
		<?php
		if ( have_posts() ) :
			$count = 0;

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text" <?php echo rpid_itemprop_schema( 'headline' ); /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?>><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;

			if ( is_front_page() && is_home() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php bloginfo( 'name' ); ?></h1>
				</header>
				<?php
			endif;

			echo '<div id="rpid-main-load">';

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
				$count++;
				$current_page = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

				do_action( 'rpid_banner_between_posts' );

				if ( ! rpid_is_amp() ) {
					if ( 6 === $count && 1 === $current_page ) {
						/* Home module */
						if ( is_active_sidebar( 'module-after-1' ) ) {
							echo '<div class="rpid-box-content item-infinite home-module">';
							dynamic_sidebar( 'module-after-1' );
							echo '</div>';
						}
					}

					if ( 9 === $count && 1 === $current_page ) {
						/* Home module 2 */
						if ( is_active_sidebar( 'module-after-2' ) ) {
							echo '<div class="rpid-box-content item-infinite home-module">';
							dynamic_sidebar( 'module-after-2' );
							echo '</div>';
						}
					}
				}

			endwhile;
			echo '</div>';

			$loadmore = get_theme_mod( 'rpid_blog_pagination', 'rpid-pagination' );
			if ( ( 'gmr-infinite' === $loadmore ) || ( 'gmr-more' === $loadmore ) && ! rpid_is_amp() ) {
				$class = 'inf-pagination';
			} else {
				$class = 'pagination';
			}
			echo '<div class="' . esc_html( $class ) . '">';
			echo rpid_get_pagination(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			echo '</div>';
			if ( ( 'rpid-infinite' === $loadmore ) || ( 'rpid-more' === $loadmore ) && ! rpid_is_amp() ) :
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
