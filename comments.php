<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Reload_Production
 */

/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$fb_comment = get_theme_mod( 'rpid_comment', 'default-comment' );
if ( 'fb-comment' === $fb_comment ) {
	return get_template_part( '/inc/fb-comment', '' );
}

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php

	$commenter = wp_get_current_commenter();
	$req       = get_option( 'require_name_email' );
	$aria_req  = ( $req ? " aria-required='true'" : '' );

	$fields = array(
		'author' =>
		'<p class="comment-form-author">' .
		'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
		'" placeholder="' . __( 'Name', 'Reload_Production' ) . ( $req ? '*' : '' ) . '" size="30"' . $aria_req . ' /></p>',

		'email'  =>
		'<p class="comment-form-email">' .
		'<input id="email" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) .
		'" placeholder="' . __( 'Email', 'Reload_Production' ) . ( $req ? '*' : '' ) . '" size="30"' . $aria_req . ' /></p>',

		'url'    =>
		'<p class="comment-form-url">' .
		'<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
		'" placeholder="' . __( 'Website', 'Reload_Production' ) . '" size="30" /></p>',
	);

	$args = array(
		'comment_field' => '<p class="comment-form-comment"><label for="comment" class="rpid-hidden">' . _x( 'Comment', 'noun', 'Reload_Production' ) .
		'</label><textarea id="comment" name="comment" cols="45" rows="2" placeholder="' . _x( 'Comment', 'noun', 'Reload_Production' ) . '" aria-required="true">' .
		'</textarea></p>',

		'fields'        => apply_filters( 'comment_form_default_fields', $fields ),
	);
	comment_form( $args );

	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<h2 class="comments-title">
			<?php
				$commentnumber = get_comments_number();
				printf(
					/* translators: %1$s: commentnumber */
					esc_html( _n( '%1$s comment', '%1$s comments', $commentnumber, 'Reload_Production' ) ),
					esc_html( number_format_i18n( $commentnumber ) )
				);
			?>
		</h2>

		<ol class="comment-list">
			<?php
				wp_list_comments(
					array(
						'style'       => 'ol',
						'short_ping'  => true,
						'avatar_size' => 32,
					)
				);
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'Reload_Production' ); ?></h2>
			<?php
			paginate_comments_links(
				apply_filters(
					'rpid_get_comment_pagination_args',
					array(
						'prev_text' => '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path d="M17.59 18L19 16.59L14.42 12L19 7.41L17.59 6l-6 6z" fill="currentColor"/><path d="M11 18l1.41-1.41L7.83 12l4.58-4.59L11 6l-6 6z" fill="currentColor"/></svg>',
						'next_text' => '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path d="M6.41 6L5 7.41L9.58 12L5 16.59L6.41 18l6-6z" fill="currentColor"/><path d="M13 6l-1.41 1.41L16.17 12l-4.58 4.59L13 18l6-6z" fill="currentColor"/></svg>',
						'type'      => 'list',
					)
				)
			);
			?>
		</nav><!-- #comment-nav-below -->

			<?php
		endif; // Check for comment navigation.

	endif; // Check for have_comments().

	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
		?>

		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'Reload_Production' ); ?></p>
		<?php
	endif;
	?>

</div><!-- #comments -->
