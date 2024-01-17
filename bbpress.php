<?php
/**
 * The template for displaying all pages for bbpress
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.buddypress.org/themes/bp-theme-compatibility-and-the-wordpress-default-themes/twenty-twelve-theme/
 *
 * @package Reload_Production
 */

/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

?>

<div id="primary" class="content-area col-md-12">
	<?php do_action( 'Reload_Production_view_breadcrumbs' ); ?>

	<main id="main" class="site-main" role="main">

	<?php
	while ( have_posts() ) :
		the_post();
		get_template_part( 'template-parts/content', 'page' );

	endwhile;
	?>

	</main><!-- #main -->

</div><!-- #primary -->

<?php

get_footer();
