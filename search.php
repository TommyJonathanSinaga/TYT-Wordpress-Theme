<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
			echo '<h1 class="page-title" ' . rpid_itemprop_schema( 'headline' ) /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ . '>';
				echo esc_html__( 'Search Results For: ', 'reload_production' ) . ' ' . esc_attr( apply_filters( 'the_search_query', get_search_query( false ) ) );
			echo '</h1>';
		?>
		<main id="main" class="site-main rpid-infinite-selector" role="main">
		<?php
		if ( have_posts() ) :
			echo '<div id="rpid-main-load">';
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;
			echo '</div>';

			$loadmore = get_theme_mod( 'rpid_blog_pagination', 'rpid-pagination' );
			if ( ( 'rpid-infinite' === $loadmore ) || ( 'rpid-more' === $loadmore ) && ! rpid_is_amp() ) {
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
