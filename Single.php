<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Reload Production
 */

/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

?>

<div id="primary" class="col-md-main">
	<div class="content-area rpid-single-wrap">
	<?php do_action( 'rpid_view_breadcrumbs' ); ?>
	<main id="main" class="site-main" role="main">
		<div class="inner-container">
			<?php
			while ( have_posts() ) :
				the_post();
				if ( is_attachment() ) {
					get_template_part( 'template-parts/content', 'attachment' );
				} else {
					get_template_part( 'template-parts/content', 'single' );
				}
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					if ( rpid_is_amp() ) {
						/* Add Non AMP Version using <div id="site-version-switcher"> and id="version-switch-link" */
						$nonamp_link = amp_remove_endpoint( amp_get_current_url() );
						echo '<div class="site-main rpid-box-content text-center"><div id="site-version-switcher"><a id="version-switch-link" class="button" href="' . esc_url( $nonamp_link ) . '#comments" class="amp-wp-canonical-link" title="' . esc_html__( 'Add Comment', 'Reload_Production' ) . '" rel="noamphtml nofollow">' . esc_html__( 'Add Comment', 'Reload_Production' ) . '</a></div></div>';
					} else {
						comments_template();
					}
				endif;

			endwhile; /* End of the loop. */
			?>
		</div>
	</main><!-- #main -->

	</div><!-- .content-area -->
</div><!-- #primary -->

<?php
get_sidebar();

get_footer();
