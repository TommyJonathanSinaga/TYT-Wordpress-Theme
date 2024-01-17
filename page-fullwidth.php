<?php
/**
 * Template Name: Fullwidth
 *
 * @package Reload Production
 */

/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<div id="primary" class="col-md-12">
	<div class="content-area">
	<?php do_action( 'rpid_view_breadcrumbs' ); ?>

	<main id="main" class="site-main" role="main">
		<div class="inner-container">
		<?php
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content', 'page' );

			/* If comments are open or we have at least one comment, load up the comment template. */
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; /* End of the loop. */
		?>
		</div>
	</main><!-- #main -->
	</div><!-- .content-area -->
</div><!-- #primary -->

<?php

get_footer();
