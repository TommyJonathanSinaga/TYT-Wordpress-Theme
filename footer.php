<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bloggingpro
 */

/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

			</div><!-- .row -->
		</div><!-- .container -->

		<?php
		if ( ! bloggingpro_is_amp() ) {
			do_action( 'reload_procuction_footerbanner' );
		}
		?>
	</div><!-- .rpid-content -->

</div><!-- #site-container -->

<div class="footer-container">
	<div class="container">
		<?php
		$mod = get_theme_mod( 'rpid_footer_column', '3' );
		if ( '4' === $mod ) {
			$class = 'col-md-3';
		} elseif ( '3' === $mod ) {
			$class = 'col-md-4';
		} elseif ( '2' === $mod ) {
			$class = 'col-md-6';
		} else {
			$class = 'col-md-12';
		}

		if ( ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' ) ) && ! reload_procuction_is_amp() ) :
			?>
			<div id="footer-sidebar" class="widget-footer" role="complementary">
				<div class="row">
					<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
						<div class="footer-column <?php echo esc_html( $class ); ?>">
							<?php dynamic_sidebar( 'footer-1' ); ?>
						</div>
					<?php endif; ?>
					<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
						<div class="footer-column <?php echo esc_html( $class ); ?>">
							<?php dynamic_sidebar( 'footer-2' ); ?>
						</div>
					<?php endif; ?>
					<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
						<div class="footer-column <?php echo esc_html( $class ); ?>">
							<?php dynamic_sidebar( 'footer-3' ); ?>
						</div>
					<?php endif; ?>
					<?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
						<div class="footer-column <?php echo esc_html( $class ); ?>">
							<?php dynamic_sidebar( 'footer-4' ); ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		<?php endif; ?>
		<div id="footer-content" class="content-footer">
			<div class="row">
				<div class="footer-column col-md-6">
					<?php
					echo '<div class="rpid-footer-logo">';
					/* if get value from customizer rpid_logoimage */
					$setting = 'rpid_footer_logo';

					$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );
					if ( $mod ) {
						/* get url image from value rpid_logoimage */
						echo '<img src="' . esc_url_raw( $mod ) . '" alt="' . esc_html( get_rpid( 'name' ) ) . '" title="' . esc_html( get_rpid( 'name' ) ) . '" />';
					}
					echo '</div>';
						/* Footer Menu */
					if ( has_nav_menu( 'copyrightnav' ) ) {
						wp_nav_menu(
							array(
								'theme_location' => 'copyrightnav',
								'container'      => 'ul',
								'menu_id'        => 'copyright-menu',
								'depth'          => 1,
							)
						);
					}
					?>
				</div>

				<div class="footer-column col-md-6">
					<?php
					/* Option remove search button */
					$setting = 'rpid_active-socialnetwork';

					$mod_social = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

					/* Social settings */
					$fb_url = get_theme_mod( 'rpid_fb_url_icon' );

					$twitter_url = get_theme_mod( 'rpid_twitter_url_icon' );

					$pinterest_url = get_theme_mod( 'rpid_pinterest_url_icon' );

					$tumblr_url = get_theme_mod( 'rpid_tumblr_url_icon' );

					$stumbleupon_url = get_theme_mod( 'rpid_stumbleupon_url_icon' );

					$wordpress_url = get_theme_mod( 'rpid_wordpress_url_icon' );

					$instagram_url = get_theme_mod( 'rpid_instagram_url_icon' );

					$dribbble_url = get_theme_mod( 'rpid_dribbble_url_icon' );

					$vimeo_url = get_theme_mod( 'rpid_vimeo_url_icon' );

					$linkedin_url = get_theme_mod( 'rpid_linkedin_url_icon' );

					$deviantart_url = get_theme_mod( 'rpid_deviantart_url_icon' );

					$skype_url = get_theme_mod( 'rpid_skype_url_icon' );

					$youtube_url = get_theme_mod( 'rpid_youtube_url_icon' );

					$myspace_url = get_theme_mod( 'rpid_myspace_url_icon' );

					$picassa_url = get_theme_mod( 'rpid_picassa_url_icon' );

					$flickr_url = get_theme_mod( 'rpid_flickr_url_icon' );

					$blogger_url = get_theme_mod( 'rpid_blogger_url_icon' );

					$spotify_url = get_theme_mod( 'rpid_spotify_url_icon' );

					$delicious_url = get_theme_mod( 'rpid_delicious_url_icon' );

					$tiktok_url = get_theme_mod( 'rpid_tiktok_url_icon' );

					$telegram_url = get_theme_mod( 'rpid_telegram_url_icon' );

					$soundcloud_url = get_theme_mod( 'rpid_soundcloud_url_icon' );

					$rssicon = get_theme_mod( 'rpid_active-rssicon', 0 );

					if ( $fb_url || $twitter_url || $pinterest_url || $tumblr_url || $stumbleupon_url ||
					$wordpress_url || $instagram_url || $dribbble_url || $vimeo_url || $linkedin_url || $deviantart_url ||
					$skype_url || $youtube_url || $myspace_url || $picassa_url || $flickr_url || $blogger_url || $spotify_url || 0 === $rssicon ) :
						if ( 0 === $mod_social ) :
							echo '<h3 class="widget-title">' . esc_html__( 'Social Network', 'Reload_production' ) . '</h3>';
							echo '<ul class="footer-social-icon">';
							if ( $fb_url ) :
								echo '<li class="facebook"><a href="' . esc_url( $fb_url ) . '" title="' . esc_html__( 'Facebook', 'Reload_production' ) . '" target="_blank" rel="nofollow"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path d="M12 2.04c-5.5 0-10 4.49-10 10.02c0 5 3.66 9.15 8.44 9.9v-7H7.9v-2.9h2.54V9.85c0-2.51 1.49-3.89 3.78-3.89c1.09 0 2.23.19 2.23.19v2.47h-1.26c-1.24 0-1.63.77-1.63 1.56v1.88h2.78l-.45 2.9h-2.33v7a10 10 0 0 0 8.44-9.9c0-5.53-4.5-10.02-10-10.02z" fill="currentColor"/></svg>' . esc_html__( 'Facebook', 'bloggingpro' ) . '</a></li>';
							endif;
							if ( $twitter_url ) :
								echo '<li class="twitter"><a href="' . esc_url( $twitter_url ) . '" title="' . esc_html__( 'Twitter', 'Reload_production' ) . '" target="_blank" rel="nofollow"><svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M18.901 1.153h3.68l-8.04 9.19L24 22.846h-7.406l-5.8-7.584l-6.638 7.584H.474l8.6-9.83L0 1.154h7.594l5.243 6.932ZM17.61 20.644h2.039L6.486 3.24H4.298Z"/></svg>' . esc_html__( 'Twitter', 'bloggingpro' ) . '</a></li>';
							endif;
							if ( $pinterest_url ) :
								echo '<li class="pinterest"><a href="' . esc_url( $pinterest_url ) . '" title="' . esc_html__( 'Pinterest', 'Reload_production' ) . '" target="_blank" rel="nofollow"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path d="M9.04 21.54c.96.29 1.93.46 2.96.46a10 10 0 0 0 10-10A10 10 0 0 0 12 2A10 10 0 0 0 2 12c0 4.25 2.67 7.9 6.44 9.34c-.09-.78-.18-2.07 0-2.96l1.15-4.94s-.29-.58-.29-1.5c0-1.38.86-2.41 1.84-2.41c.86 0 1.26.63 1.26 1.44c0 .86-.57 2.09-.86 3.27c-.17.98.52 1.84 1.52 1.84c1.78 0 3.16-1.9 3.16-4.58c0-2.4-1.72-4.04-4.19-4.04c-2.82 0-4.48 2.1-4.48 4.31c0 .86.28 1.73.74 2.3c.09.06.09.14.06.29l-.29 1.09c0 .17-.11.23-.28.11c-1.28-.56-2.02-2.38-2.02-3.85c0-3.16 2.24-6.03 6.56-6.03c3.44 0 6.12 2.47 6.12 5.75c0 3.44-2.13 6.2-5.18 6.2c-.97 0-1.92-.52-2.26-1.13l-.67 2.37c-.23.86-.86 2.01-1.29 2.7v-.03z" fill="currentColor"/></svg>' . esc_html__( 'Pinterest', 'Reload_Producution' ) . '</a></li>';
							endif;
							if ( $tumblr_url ) :
								echo '<li class="tumblr"><a href="' . esc_url( $tumblr_url ) . '" title="' . esc_html__( 'Tumblr', 'Reload_production' ) . '" target="_blank" rel="nofollow"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20"><path d="M10 .4C4.698.4.4 4.698.4 10s4.298 9.6 9.6 9.6s9.6-4.298 9.6-9.6S15.302.4 10 .4zm2.577 13.741a5.508 5.508 0 0 1-1.066.395a4.543 4.543 0 0 1-1.031.113c-.42 0-.791-.055-1.114-.162a2.373 2.373 0 0 1-.826-.459a1.651 1.651 0 0 1-.474-.633c-.088-.225-.132-.549-.132-.973V9.16H6.918V7.846c.359-.119.67-.289.927-.512c.257-.221.464-.486.619-.797c.156-.31.263-.707.322-1.185h1.307v2.35h2.18V9.16h-2.18v2.385c0 .539.028.885.085 1.037a.7.7 0 0 0 .315.367c.204.123.437.185.697.185c.466 0 .928-.154 1.388-.461v1.468z" fill="currentColor"/></svg>' . esc_html__( 'Tumblr', 'bloggingpro' ) . '</a></li>';
							endif;
							if ( $stumbleupon_url ) :
								echo '<li class="stumbleupon"><a href="' . esc_url( $stumbleupon_url ) . '" title="' . esc_html__( 'Stumbleupon', 'Reload_production' ) . '" target="_blank" rel="nofollow"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 32 32"><path d="M16 2a14 14 0 1 0 14 14A14 14 0 0 0 16 2zm-.09 10.45a.84.84 0 0 0-.84.84v5.14a3.55 3.55 0 0 1-7.1 0v-2.34h2.71v2.24a.84.84 0 0 0 1.68 0v-5a3.55 3.55 0 0 1 7.09 0v1l-1.58.51l-1.12-.51v-1a.85.85 0 0 0-.84-.88zm7.93 6a3.55 3.55 0 0 1-7.09 0v-2.31l1.12.51l1.58-.51v2.29a.84.84 0 0 0 1.68 0v-2.24h2.71z" fill="currentColor"/></svg>' . esc_html__( 'Stumbleupon', 'bloggingpro' ) . '</a></li>';
							endif;
							if ( $wordpress_url ) :
								echo '<li class="wordpress"><a href="' . esc_url( $wordpress_url ) . '" title="' . esc_html__( 'WordPress', 'Reload_production' ) . '" target="_blank" rel="nofollow"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path d="M3.42 12c0-1.24.27-2.42.74-3.5l4.1 11.22A8.563 8.563 0 0 1 3.42 12m14.37-.43c0 .73-.29 1.58-.65 2.77l-.86 2.86l-3.1-9.2l.98-.1c.47-.06.41-.74-.05-.71c0 0-1.39.11-2.29.11l-2.26-.11c-.46-.03-.51.68-.06.71l.91.1l1.34 3.64l-1.88 5.63L6.74 8l.99-.1c.46-.06.4-.74-.06-.71c0 0-1.39.11-2.29.11l-.55-.01C6.37 4.96 9 3.42 12 3.42c2.23 0 4.27.86 5.79 2.25h-.11c-.84 0-1.44.73-1.44 1.52c0 .71.41 1.31.84 2.01c.33.57.71 1.3.71 2.37m-5.64 1.18l2.64 7.22l.06.12c-.89.32-1.85.49-2.85.49c-.84 0-1.65-.12-2.42-.35l2.57-7.48m7.38-4.87A8.548 8.548 0 0 1 20.58 12c0 3.16-1.72 5.93-4.27 7.41l2.62-7.57c.49-1.22.66-2.2.66-3.07l-.06-.89M12 2a10 10 0 0 1 10 10a10 10 0 0 1-10 10A10 10 0 0 1 2 12A10 10 0 0 1 12 2m0 19.54c5.26 0 9.54-4.28 9.54-9.54c0-5.26-4.28-9.54-9.54-9.54c-5.26 0-9.54 4.28-9.54 9.54c0 5.26 4.28 9.54 9.54 9.54z" fill="currentColor"/></svg>' . esc_html__( 'WordPress', 'Reload_Productio' ) . '</a></li>';
							endif;
							if ( $instagram_url ) :
								echo '<li class="instagram"><a href="' . esc_url( $instagram_url ) . '" title="' . esc_html__( 'Instagram', 'Reload_production' ) . '" target="_blank" rel="nofollow"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path d="M7.8 2h8.4C19.4 2 22 4.6 22 7.8v8.4a5.8 5.8 0 0 1-5.8 5.8H7.8C4.6 22 2 19.4 2 16.2V7.8A5.8 5.8 0 0 1 7.8 2m-.2 2A3.6 3.6 0 0 0 4 7.6v8.8C4 18.39 5.61 20 7.6 20h8.8a3.6 3.6 0 0 0 3.6-3.6V7.6C20 5.61 18.39 4 16.4 4H7.6m9.65 1.5a1.25 1.25 0 0 1 1.25 1.25A1.25 1.25 0 0 1 17.25 8A1.25 1.25 0 0 1 16 6.75a1.25 1.25 0 0 1 1.25-1.25M12 7a5 5 0 0 1 5 5a5 5 0 0 1-5 5a5 5 0 0 1-5-5a5 5 0 0 1 5-5m0 2a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3z" fill="currentColor"/></svg>' . esc_html__( 'Instagram', 'bloggingpro' ) . '</a></li>';
							endif;
							if ( $dribbble_url ) :
								echo '<li class="dribble"><a href="' . esc_url( $dribbble_url ) . '" title="' . esc_html__( 'Dribbble', 'Reload_production' ) . '" target="_blank" rel="nofollow"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 48 48"><g fill="none" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"><path d="M44 24a19.938 19.938 0 0 1-5.889 14.173A19.937 19.937 0 0 1 24 44C12.954 44 4 35.046 4 24a19.932 19.932 0 0 1 5.5-13.775A19.943 19.943 0 0 1 24 4a19.937 19.937 0 0 1 14.111 5.827A19.938 19.938 0 0 1 44 24z"/><path d="M44 24c-2.918 0-10.968-1.1-18.173 2.063C18 29.5 12.333 34.831 9.863 38.147"/><path d="M16.5 5.454C19.63 8.343 26.46 15.699 29 23c2.54 7.302 3.48 16.28 4.06 18.835"/><path d="M4.154 21.5c3.778.228 13.779.433 20.179-2.3c6.4-2.733 11.907-7.76 13.796-9.355"/><path d="M5.5 31.613a20.076 20.076 0 0 0 9 9.991"/><path d="M4 24a19.932 19.932 0 0 1 5.5-13.775"/><path d="M24 4a19.943 19.943 0 0 0-14.5 6.225"/><path d="M32 5.664a20.037 20.037 0 0 1 6.111 4.163A19.938 19.938 0 0 1 44 24c0 2.463-.445 4.821-1.26 7"/><path d="M24 44a19.937 19.937 0 0 0 14.111-5.827"/></g></svg>>' . esc_html__( 'Dribbble', 'Reload_Production' ) . '</a></li>';
							endif;
							if ( $vimeo_url ) :
								echo '<li class="vimeo"><a href="' . esc_url( $vimeo_url ) . '" title="' . esc_html__( 'Vimeo', 'Reload_production' ) . '" target="_blank" rel="nofollow"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path d="M22 7.42c-.09 1.95-1.45 4.62-4.08 8.02C15.2 19 12.9 20.75 11 20.75c-1.15 0-2.14-1.08-2.95-3.25c-.55-1.96-1.05-3.94-1.61-5.92c-.6-2.16-1.24-3.24-1.94-3.24c-.14 0-.66.32-1.56.95L2 8.07c1-.87 1.96-1.74 2.92-2.61c1.32-1.14 2.31-1.74 2.96-1.8c1.56-.16 2.52.92 2.88 3.2c.39 2.47.66 4 .81 4.6c.43 2.04.93 3.04 1.48 3.04c.42 0 1.05-.64 1.89-1.97c.84-1.32 1.29-2.33 1.35-3.03c.12-1.14-.33-1.71-1.35-1.71c-.48 0-.97.11-1.48.33c.98-3.23 2.86-4.8 5.63-4.71c2.06.06 3.03 1.4 2.91 4.01z" fill="currentColor"/></svg>' . esc_html__( 'Vimeo', 'bloggingpro' ) . '</a></li>';
							endif;
							if ( $linkedin_url ) :
								echo '<li class="linkedin"><a href="' . esc_url( $linkedin_url ) . '" title="' . esc_html__( 'Linkedin', 'Reload_production' ) . '" target="_blank" rel="nofollow"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.32 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.79M6.88 8.56a1.68 1.68 0 0 0 1.68-1.68c0-.93-.75-1.69-1.68-1.69a1.69 1.69 0 0 0-1.69 1.69c0 .93.76 1.68 1.69 1.68m1.39 9.94v-8.37H5.5v8.37h2.77z" fill="currentColor"/></svg>' . esc_html__( 'Linkedin', 'bloggingpro' ) . '</a></li>';
							endif;
							if ( $deviantart_url ) :
								echo '<li class="devianart"><a href="' . esc_url( $deviantart_url ) . '" title="' . esc_html__( 'Deviantart', 'Reload_production' ) . '" target="_blank" rel="nofollow"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path d="M6 6h6l2-4h4v4l-3.5 7H18v5h-6l-2 4H6v-4l3.5-7H6V6z" fill="currentColor"/></svg>' . esc_html__( 'Deviantart', 'bloggingpro' ) . '</a></li>';
							endif;
							if ( $myspace_url ) :
								echo '<li class="myspace"><a href="' . esc_url( $myspace_url ) . '" title="' . esc_html__( 'Myspace', 'Reload_production' ) . '" target="_blank" rel="nofollow"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><g fill="currentColor" transform="translate(2 2)"><path d="M10 18a8 8 0 1 0 0-16a8 8 0 0 0 0 16zm0 2C4.477 20 0 15.523 0 10S4.477 0 10 0s10 4.477 10 10s-4.477 10-10 10z"/><ellipse cx="6.418" cy="9.443" rx="1.288" ry="1.275"/><path d="M6.4 11.051c-.78.01-1.4.654-1.4 1.426v.359c0 .083.068.15.152.15h2.531a.151.151 0 0 0 .152-.15v-.382A1.41 1.41 0 0 0 6.4 11.051z"/><ellipse cx="9.68" cy="9.151" rx="1.394" ry="1.38"/><path d="M9.661 10.892a1.542 1.542 0 0 0-1.515 1.543v.4c0 .084.068.151.152.151h2.764a.151.151 0 0 0 .153-.15v-.425c0-.845-.698-1.53-1.554-1.519zm3.582-.717c.882 0 1.597-.708 1.597-1.581s-.715-1.58-1.597-1.58s-1.597.707-1.597 1.58c0 .873.715 1.58 1.597 1.58zm0 .413c-.97 0-1.757.779-1.757 1.74v.508c0 .083.068.15.152.15h3.21a.151.151 0 0 0 .152-.15v-.509c0-.96-.787-1.74-1.757-1.74z"/></g></svg>' . esc_html__( 'Myspace', 'Reload_Productio' ) . '</a></li>';
							endif;
							if ( $skype_url ) :
								echo '<li class="skype"><a href="' . esc_url( $skype_url ) . '" title="' . esc_html__( 'Skype', 'Reload_production' ) . '" target="_blank" rel="nofollow"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path d="M18 6c2.07 2.04 2.85 4.89 2.36 7.55c.41.72.64 1.56.64 2.45a5 5 0 0 1-5 5c-.89 0-1.73-.23-2.45-.64c-2.66.49-5.51-.29-7.55-2.36c-2.07-2.04-2.85-4.89-2.36-7.55C3.23 9.73 3 8.89 3 8a5 5 0 0 1 5-5c.89 0 1.73.23 2.45.64c2.66-.49 5.51.29 7.55 2.36m-5.96 11.16c2.87 0 4.3-1.38 4.3-3.24c0-1.19-.56-2.46-2.73-2.95l-1.99-.44c-.76-.17-1.62-.4-1.62-1.11c0-.72.6-1.22 1.7-1.22c2.23 0 2.02 1.53 3.13 1.53c.58 0 1.08-.34 1.08-.93c0-1.37-2.19-2.4-4.05-2.4c-2.01 0-4.16.86-4.16 3.14c0 1.1.39 2.27 2.55 2.81l2.69.68c.81.2 1.01.65 1.01 1.07c0 .68-.68 1.35-1.91 1.35c-2.41 0-2.08-1.85-3.37-1.85c-.58 0-1 .4-1 .97c0 1.11 1.33 2.59 4.37 2.59z" fill="currentColor"/></svg>' . esc_html__( 'Skype', 'Reload_Productio' ) . '</a></li>';
							endif;
							if ( $youtube_url ) :
								echo '<li class="youtube"><a href="' . esc_url( $youtube_url ) . '" title="' . esc_html__( 'Youtube', 'Reload_production' ) . '" target="_blank" rel="nofollow"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path d="M2.5 4.5h19c.84 0 1.5.65 1.5 1.5v11.5c0 .85-.66 1.5-1.5 1.5h-19c-.85 0-1.5-.65-1.5-1.5V6c0-.85.65-1.5 1.5-1.5m7.21 4V15l5.71-3.3l-5.71-3.2M17.25 21H6.65c-.3 0-.5-.2-.5-.5s.2-.5.5-.5h10.7c.3 0 .5.2.5.5s-.3.5-.6.5z" fill="currentColor"/></svg>' . esc_html__( 'Youtube', 'bloggingpro' ) . '</a></li>';
							endif;
							if ( $picassa_url ) :
								echo '<li class="picassa"><a href="' . esc_url( $picassa_url ) . '" title="' . esc_html__( 'Picassa', 'Reload_production' ) . '" target="_blank" rel="nofollow"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="0.96em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 464 488"><path d="M138 333h301q-26 55-76 89.5T253 462h-42q-40-3-73-19V333zM327 22Q281 2 232 2q-41 0-80 15q3 3 87.5 79.5T327 176V22zm-200 5q-58 30-91.5 85T2 232q0 28 8 60q3-2 102.5-92.5T214 107q-2-2-44-40.5T127 27zm-14 403V231q-4 4-49 45t-46 42q30 73 95 112zM351 36v272h98q13-35 13-76q0-60-29.5-112.5T351 36z" fill="currentColor"/></svg>' . esc_html__( 'Picassa', 'bloggingpro' ) . '</a></li>';
							endif;
							if ( $flickr_url ) :
								echo '<li class="flickr"><a href="' . esc_url( $flickr_url ) . '" title="' . esc_html__( 'Flickr', 'Reload_production' ) . '" target="_blank" rel="nofollow"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16"><path d="M8 0C3.582 0 0 3.606 0 8.055s3.582 8.055 8 8.055s8-3.606 8-8.055S12.418 0 8 0zM4.5 10.5a2.5 2.5 0 1 1 0-5a2.5 2.5 0 0 1 0 5zm7 0a2.5 2.5 0 1 1 0-5a2.5 2.5 0 0 1 0 5z" fill="currentColor"/></svg>' . esc_html__( 'Flickr', 'bloggingpro' ) . '</a></li>';
							endif;
							if ( $blogger_url ) :
								echo '<li class="blogger"><a href="' . esc_url( $blogger_url ) . '" title="' . esc_html__( 'Blogger', 'Reload_production' ) . '" target="_blank" rel="nofollow"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16"><path d="M14.5 0h-13C.675 0 0 .675 0 1.5v13c0 .825.675 1.5 1.5 1.5h13c.825 0 1.5-.675 1.5-1.5v-13c0-.825-.675-1.5-1.5-1.5zM14 10.125C14 12.266 12.259 14 10.103 14h-4.2C3.747 14 2 12.266 2 10.125v-4.25C2 3.734 3.747 2 5.903 2h1.966c2.156 0 3.881 1.609 3.881 3.75c.028.4.391.75.8.75h.672c.431 0 .775.453.775.881v2.744z" fill="currentColor"/><path d="M11 10c0 .55-.45 1-1 1H6c-.55 0-1-.45-1-1s.45-1 1-1h4c.55 0 1 .45 1 1z" fill="currentColor"/><path d="M9 6c0 .55-.45 1-1 1H6c-.55 0-1-.45-1-1s.45-1 1-1h2c.55 0 1 .45 1 1z" fill="currentColor"/></svg>' . esc_html__( 'Blogger', 'bloggingpro' ) . '</a></li>';
							endif;
							if ( $spotify_url ) :
								echo '<li class="spotify"><a href="' . esc_url( $spotify_url ) . '" title="' . esc_html__( 'Spotify', 'Reload_production' ) . '" target="_blank" rel="nofollow"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path d="M17.9 10.9C14.7 9 9.35 8.8 6.3 9.75c-.5.15-1-.15-1.15-.6c-.15-.5.15-1 .6-1.15c3.55-1.05 9.4-.85 13.1 1.35c.45.25.6.85.35 1.3c-.25.35-.85.5-1.3.25m-.1 2.8c-.25.35-.7.5-1.05.25c-2.7-1.65-6.8-2.15-9.95-1.15c-.4.1-.85-.1-.95-.5c-.1-.4.1-.85.5-.95c3.65-1.1 8.15-.55 11.25 1.35c.3.15.45.65.2 1m-1.2 2.75c-.2.3-.55.4-.85.2c-2.35-1.45-5.3-1.75-8.8-.95c-.35.1-.65-.15-.75-.45c-.1-.35.15-.65.45-.75c3.8-.85 7.1-.5 9.7 1.1c.35.15.4.55.25.85M12 2A10 10 0 0 0 2 12a10 10 0 0 0 10 10a10 10 0 0 0 10-10A10 10 0 0 0 12 2z" fill="currentColor"/></svg>' . esc_html__( 'Spotify', 'bloggingpro' ) . '</a></li>';
							endif;
							if ( $delicious_url ) :
								echo '<li class="delicious"><a href="' . esc_url( $delicious_url ) . '" title="' . esc_html__( 'Delicious', 'Reload_production' ) . '" target="_blank" rel="nofollow"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 1536 1536"><path d="M1472 1248V768H768V64H288q-93 0-158.5 65.5T64 288v480h704v704h480q93 0 158.5-65.5T1472 1248zm64-960v960q0 119-84.5 203.5T1248 1536H288q-119 0-203.5-84.5T0 1248V288Q0 169 84.5 84.5T288 0h960q119 0 203.5 84.5T1536 288z" fill="currentColor"/></svg>' . esc_html__( 'Delicious', 'bloggingpro' ) . '</a></li>';
							endif;
							if ( $tiktok_url ) :
								echo '<li class="tiktok"><a href="' . esc_url( $tiktok_url ) . '" title="' . esc_html__( 'Tiktok', 'Reload_production' ) . '" target="_blank" rel="nofollow"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="0.88em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 448 512"><path d="M448 209.91a210.06 210.06 0 0 1-122.77-39.25v178.72A162.55 162.55 0 1 1 185 188.31v89.89a74.62 74.62 0 1 0 52.23 71.18V0h88a121.18 121.18 0 0 0 1.86 22.17A122.18 122.18 0 0 0 381 102.39a121.43 121.43 0 0 0 67 20.14z" fill="currentColor"/></svg>' . esc_html__( 'Tiktok', 'bloggingpro' ) . '</a></li>';
							endif;
							if ( $telegram_url ) :
								echo '<li class="telegram"><a href="' . esc_url( $telegram_url ) . '" title="' . esc_html__( 'Telegram', 'Reload_production' ) . '" target="_blank" rel="nofollow"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="0.97em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 496 512"><path d="M248 8C111 8 0 119 0 256s111 248 248 248s248-111 248-248S385 8 248 8zm121.8 169.9l-40.7 191.8c-3 13.6-11.1 16.9-22.4 10.5l-62-45.7l-29.9 28.8c-3.3 3.3-6.1 6.1-12.5 6.1l4.4-63.1l114.9-103.8c5-4.4-1.1-6.9-7.7-2.5l-142 89.4l-61.2-19.1c-13.3-4.2-13.6-13.3 2.8-19.7l239.1-92.2c11.1-4 20.8 2.7 17.2 19.5z" fill="currentColor"/></svg>' . esc_html__( 'Telegram', 'bloggingpro' ) . '</a></li>';
							endif;
							if ( $soundcloud_url ) :
								echo '<li class="soundcloud"><a href="' . esc_url( $soundcloud_url ) . '" title="' . esc_html__( 'Soundcloud', 'Reload_production' ) . '" target="_blank" rel="nofollow"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1.25em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 640 512"><path d="M111.4 256.3l5.8 65l-5.8 68.3c-.3 2.5-2.2 4.4-4.4 4.4s-4.2-1.9-4.2-4.4l-5.6-68.3l5.6-65c0-2.2 1.9-4.2 4.2-4.2c2.2 0 4.1 2 4.4 4.2zm21.4-45.6c-2.8 0-4.7 2.2-5 5l-5 105.6l5 68.3c.3 2.8 2.2 5 5 5c2.5 0 4.7-2.2 4.7-5l5.8-68.3l-5.8-105.6c0-2.8-2.2-5-4.7-5zm25.5-24.1c-3.1 0-5.3 2.2-5.6 5.3l-4.4 130l4.4 67.8c.3 3.1 2.5 5.3 5.6 5.3c2.8 0 5.3-2.2 5.3-5.3l5.3-67.8l-5.3-130c0-3.1-2.5-5.3-5.3-5.3zM7.2 283.2c-1.4 0-2.2 1.1-2.5 2.5L0 321.3l4.7 35c.3 1.4 1.1 2.5 2.5 2.5s2.2-1.1 2.5-2.5l5.6-35l-5.6-35.6c-.3-1.4-1.1-2.5-2.5-2.5zm23.6-21.9c-1.4 0-2.5 1.1-2.5 2.5l-6.4 57.5l6.4 56.1c0 1.7 1.1 2.8 2.5 2.8s2.5-1.1 2.8-2.5l7.2-56.4l-7.2-57.5c-.3-1.4-1.4-2.5-2.8-2.5zm25.3-11.4c-1.7 0-3.1 1.4-3.3 3.3L47 321.3l5.8 65.8c.3 1.7 1.7 3.1 3.3 3.1c1.7 0 3.1-1.4 3.1-3.1l6.9-65.8l-6.9-68.1c0-1.9-1.4-3.3-3.1-3.3zm25.3-2.2c-1.9 0-3.6 1.4-3.6 3.6l-5.8 70l5.8 67.8c0 2.2 1.7 3.6 3.6 3.6s3.6-1.4 3.9-3.6l6.4-67.8l-6.4-70c-.3-2.2-2-3.6-3.9-3.6zm241.4-110.9c-1.1-.8-2.8-1.4-4.2-1.4c-2.2 0-4.2.8-5.6 1.9c-1.9 1.7-3.1 4.2-3.3 6.7v.8l-3.3 176.7l1.7 32.5l1.7 31.7c.3 4.7 4.2 8.6 8.9 8.6s8.6-3.9 8.6-8.6l3.9-64.2l-3.9-177.5c-.4-3-2-5.8-4.5-7.2zm-26.7 15.3c-1.4-.8-2.8-1.4-4.4-1.4s-3.1.6-4.4 1.4c-2.2 1.4-3.6 3.9-3.6 6.7l-.3 1.7l-2.8 160.8s0 .3 3.1 65.6v.3c0 1.7.6 3.3 1.7 4.7c1.7 1.9 3.9 3.1 6.4 3.1c2.2 0 4.2-1.1 5.6-2.5c1.7-1.4 2.5-3.3 2.5-5.6l.3-6.7l3.1-58.6l-3.3-162.8c-.3-2.8-1.7-5.3-3.9-6.7zm-111.4 22.5c-3.1 0-5.8 2.8-5.8 6.1l-4.4 140.6l4.4 67.2c.3 3.3 2.8 5.8 5.8 5.8c3.3 0 5.8-2.5 6.1-5.8l5-67.2l-5-140.6c-.2-3.3-2.7-6.1-6.1-6.1zm376.7 62.8c-10.8 0-21.1 2.2-30.6 6.1c-6.4-70.8-65.8-126.4-138.3-126.4c-17.8 0-35 3.3-50.3 9.4c-6.1 2.2-7.8 4.4-7.8 9.2v249.7c0 5 3.9 8.6 8.6 9.2h218.3c43.3 0 78.6-35 78.6-78.3c.1-43.6-35.2-78.9-78.5-78.9zm-296.7-60.3c-4.2 0-7.5 3.3-7.8 7.8l-3.3 136.7l3.3 65.6c.3 4.2 3.6 7.5 7.8 7.5c4.2 0 7.5-3.3 7.5-7.5l3.9-65.6l-3.9-136.7c-.3-4.5-3.3-7.8-7.5-7.8zm-53.6-7.8c-3.3 0-6.4 3.1-6.4 6.7l-3.9 145.3l3.9 66.9c.3 3.6 3.1 6.4 6.4 6.4c3.6 0 6.4-2.8 6.7-6.4l4.4-66.9l-4.4-145.3c-.3-3.6-3.1-6.7-6.7-6.7zm26.7 3.4c-3.9 0-6.9 3.1-6.9 6.9L227 321.3l3.9 66.4c.3 3.9 3.1 6.9 6.9 6.9s6.9-3.1 6.9-6.9l4.2-66.4l-4.2-141.7c0-3.9-3-6.9-6.9-6.9z" fill="currentColor"/></svg>' . esc_html__( 'Soundcloud', 'Reload_Production' ) . '</a></li>';
							endif;
							if ( 0 === $rssicon ) :
								echo '<li class="rssicon"><a href="' . esc_url( get_rpid( 'rss2_url' ) ) . '" title="' . esc_html__( 'RSS', 'Reload_production' ) . '" target="_blank" rel="nofollow"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path d="M6.18 15.64a2.18 2.18 0 0 1 2.18 2.18C8.36 19 7.38 20 6.18 20C5 20 4 19 4 17.82a2.18 2.18 0 0 1 2.18-2.18M4 4.44A15.56 15.56 0 0 1 19.56 20h-2.83A12.73 12.73 0 0 0 4 7.27V4.44m0 5.66a9.9 9.9 0 0 1 9.9 9.9h-2.83A7.07 7.07 0 0 0 4 12.93V10.1z" fill="currentColor"/></svg>' . esc_html__( 'RSS', 'bloggingpro' ) . '</a></li>';
							endif;
							echo '</ul>';
							endif;
						endif;
					?>
				</div>
			</div>
		</div>
		<footer id="colophon" class="site-footer" role="contentinfo" <?php echo bloggingpro_itemtype_schema( 'WPFooter' ); /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?>>
			<div class="site-info">
			<?php
			if ( bloggingpro_is_amp() ) {
				/* Add Non AMP Version using <div id="site-version-switcher"> and id="version-switch-link" */
				$nonamp_link = amp_remove_endpoint( amp_get_current_url() );
				echo '<div id="site-version-switcher"><a id="version-switch-link" href="' . esc_url( $nonamp_link ) . '" class="amp-wp-canonical-link" title="' . esc_html__( 'Non AMP Version', 'Reload Production' ) . '" rel="noamphtml">' . esc_html__( 'Non AMP Version', 'Reload Production' ) . '</a></div>';
			}
			$copyright = get_theme_mod( 'rpid_copyright' );

			if ( $copyright ) :
				/* sanitize html output than convert it again using htmlspecialchars_decode */
				echo wp_kses_post( $copyright );
			else :
				?>
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'Reload Production' ) ); ?>" title="<?php printf( esc_html__( 'Proudly powered by WordPress', 'Reload Production' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by WordPress', 'Reload Production' ) ); ?></a>
				<span class="sep"> / </span>
				<a href="<?php echo esc_url( __( 'https://https://github.com/TommyJonathanSinaga/TYT-Wordpress-Theme, 'Reload Production' ) ); ?>" title="<?php printf( esc_html__( 'Theme: Reload Production', 'Reload Production' ) ); ?>"><?php printf( esc_html__( 'Theme: Reload Production', 'Reload Production' ) ); ?></a>
			<?php endif; ?>
			</div><!-- .site-info -->
		</footer>
	</div>
</div><!-- .footer-container -->
</div>
<?php
if ( ! rpid_is_amp() ) {
	do_action( 'rpid_floating_banner_footer' );
}
?>

<?php
if ( ! rpid_is_amp() ) {
	?>
	<div class="rpid-ontop gmr-hide"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path d="M6 4h12v2H6zm.707 11.707L11 11.414V20h2v-8.586l4.293 4.293l1.414-1.414L12 7.586l-6.707 6.707z" fill="currentColor"/></svg></div>
	<?php
} else {
	?>
	<amp-sidebar id="navigationamp" layout="nodisplay" side="left">
		<div id="rpid-logoamp">
			<?php
			/* if get value from customizer rpid_logoimage */
			$setting = 'rpid_logoimage';

			$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );
			if ( $mod ) {
				/* get url image from value rpid_logoimage */
				$image = esc_url_raw( $mod );
				?>
				<div class="logo-wrap">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="custom-logo-link" <?php echo bloggingpro_itemprop_schema( 'url' ); /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?> title="<?php echo esc_html( get_bloginfo( 'name' ) ); ?>">
						<img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_html( get_rpid( 'name' ) ); ?>" title="<?php echo esc_html( get_rpid( 'name' ) ); ?>" />
					</a>
				</div>
				<?php
			} else {
				/* if get value from customizer blogname */
				if ( get_theme_mod( 'blogname', get_rpid( 'name' ) ) ) {
					?>
					<div class="site-title" <?php echo bloggingpro_itemprop_schema( 'headline' ); /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?>>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" <?php echo rpid_itemprop_schema( 'url' ); /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?> title="<?php echo esc_html( get_rpid( 'name' ) ); ?>">
							<?php echo esc_html( get_theme_mod( 'blogname', get_rpid( 'name' ) ) ); ?>
						</a>
					</div>

					<?php
				}
				/* if get value from customizer blogdescription */
				if ( get_theme_mod( 'blogdescription', get_rpid( 'description' ) ) ) {
					?>
					<span class="site-description" <?php echo rpid_itemprop_schema( 'description' ); /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?>>
						<?php echo esc_html( get_theme_mod( 'blogdescription', get_rpid( 'description' ) ) ); ?>
					</span>
					<?php
				}
			}
			?>
		</div>
		<button on="tap:navigationamp.close" class="close-topnavmenu-wrap"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path d="M12 20c-4.41 0-8-3.59-8-8s3.59-8 8-8s8 3.59 8 8s-3.59 8-8 8m0-18C6.47 2 2 6.47 2 12s4.47 10 10 10s10-4.47 10-10S17.53 2 12 2m2.59 6L12 10.59L9.41 8L8 9.41L10.59 12L8 14.59L9.41 16L12 13.41L14.59 16L16 14.59L13.41 12L16 9.41L14.59 8z" fill="currentColor"/></svg></button>
		<div class="wrapmenu">
		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'primary',
				'container'      => 'ul',
				'menu_id'        => 'amp-primary-menu',
				'fallback_cb'    => 'rpid_add_link_adminmenu',
				'link_before'    => '<span itemprop="name">',
				'link_after'     => '</span>',
			)
		);
		?>

		<?php
		// Second top menu.
		if ( has_nav_menu( 'secondary' ) ) {
			?>

				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'secondary',
						'container'      => 'ul',
						'menu_id'        => 'amp-primary-menu',
						'link_before'    => '<span itemprop="name">',
						'link_after'     => '</span>',
					)
				);
				?>
			<?php
		}
		?>
		</div>
	</amp-sidebar>
	<?php
}

wp_footer();
?>

</body>
</html>
