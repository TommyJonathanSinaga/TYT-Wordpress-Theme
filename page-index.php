<?php
/**
 * Template Name: Index Pages
 *
 * A WordPress template to list page titles by first letter.
 *
 * You should modify the CSS to suit your theme and place it in its proper file.
 * Be sure to set the $posts_per_row and $posts_per_page variables.
 *
 * @package Reload Production
 */

/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$posts_per_row  = 1;
$posts_per_page = -1;

?>
<aside id="secondary" class="widget-area col-md-3 pos-sticky" role="complementary" <?php echo rpid_itemtype_schema( 'WPSideBar' ); /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?>>
	<div class="sidebar-indexpage">
	<h3 class="widget-title"><span><?php esc_html_e( 'Category', 'rpid' ); ?></span></h3>
	<?php
	echo '<ul class="index-page-numbers">';
	wp_list_categories(
		array(
			'title_li' => '',
		)
	);
	echo '</ul>';
	?>
	</div>
</aside><!-- #secondary -->
<div id="primary" class="col-md-9 page-index">

	<?php
	if ( have_posts() ) {
		echo '<header class="entry-header screen-reader-text">';
			the_title( '<h1 class="title" ' . rpid_itemprop_schema( 'headline' ) . '>', '</h1>' );
		echo '</header><!-- .entry-header -->';

		$arg = array(
			'post_type' => array( 'post' ),
		);

		$categories = get_categories( $arg );

		/* Start the Loop */
		foreach ( $categories as $cats ) {
			echo '<div class="gmr-az-list">';
			$pagess = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
			/* get term by id custom taxonomy */
			$catid = $cats->term_id;
			echo '<div class="az-list-header">';
			echo '<h2><a href="' . esc_url( get_category_link( $cats->term_id ) ) . '" title="' . esc_html( $cats->name ) . '">' . esc_html( $cats->name ) . '</a> <span class="rpid-litle-title pull-right">' . intval( $cats->count ) . ' ' . esc_html__( 'news', 'Reload_Production' ) . '</span></h2>';
			echo '</div>';

			/* create a custom WordPress query */
			$args = array(
				'post_type'      => array( 'post' ),
				'post_status'    => 'publish',
				'cat'            => $catid,
				'posts_per_page' => 5,
				'paged'          => $pagess,
			);

			$recent = new WP_Query( $args );
			echo '<ul>';
			/* Start the Loop */
			while ( $recent->have_posts() ) :
				$recent->the_post();
				?>
					<li>
					<?php
					/* translators: used between list items, there is a space after the comma */
					$categories_list = get_the_category_list( ', ' );
					$category        = '';
					if ( $categories_list ) {
						$category = '<span class="cat-links-content">' . $categories_list . '</span>'; // WPCS: XSS OK.
					}
					$time_string = '<time class="entry-date published updated" ' . rpid_itemprop_schema( 'dateModified' ) . ' datetime="%1$s">%2$s</time>';
					if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
						$time_string = '<time class="entry-date published" ' . rpid_itemprop_schema( 'datePublished' ) . ' datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
					}

					$time_string = sprintf(
						$time_string,
						esc_attr( get_the_date( 'c' ) ),
						esc_html( get_the_date() ),
						esc_attr( get_the_modified_date( 'c' ) ),
						esc_html( get_the_modified_date() )
					);

					$posted_on = sprintf( '%s', $time_string );
						echo '<div class="rpid-metacontent rpid-metacontent-archive">' . $category . '<span class="posted-on byline">' . $posted_on . '</span></div>';  // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					?>
					<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php esc_attr_e( 'Permanent Link to', 'reload_production' ); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
					</li>
				<?php
			endwhile;
			echo '</ul>';
			echo '</div>';
		}
	} else {
		echo '<h2>' . esc_html__( 'Sorry, no posts were found!', 'Reload_Production' ) . '</h2>';
	}
	?>
	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
