<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Reload Production
 */

/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head <?php echo rpid_itemtype_schema( 'WebSite' ); /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?>>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php
$chrome_color = get_theme_mod( 'rpid_chrome_mobile_color' );
if ( $chrome_color ) :
	$color = sanitize_hex_color( $chrome_color );
	?>
	<meta name="theme-color" content="<?php echo esc_html( $color ); ?>" />
	<?php
endif;
?>
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php echo rpid_itemtype_schema( 'WebPage' ); /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?>>
<?php do_action( 'wp_body_open' ); ?>
<div id="full-container">
<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'Reload_Production' ); ?></a>
<?php
/* enu style via customizer */
$menu_style = get_theme_mod( 'rpid_menu_style', 'rpid-boxmenu' );

/* Disable top navigation via customizer */
$topnav = get_theme_mod( 'rpid_active-topnavigation', 0 );
?>

<?php
if ( ! rpid_is_amp() ) {
	do_action( 'rpid_floating_banner_left' );
	do_action( 'rpid_floating_banner_right' );
	do_action( 'rpid_topbanner_verytop' );
}
?>

<header id="masthead" class="site-header" role="banner" <?php echo rpid_itemtype_schema( 'WPHeader' ); /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?>>
	<div class="container">
		<?php
		$enable_logo = get_theme_mod( 'rpid_active-logosection', 0 );
		if ( 0 === $enable_logo ) {
			?>
			<div class="clearfix rpid-headwrapper">

				<div class="list-table clearfix">
					<div class="table-row">
						<div class="table-cell onlymobile-menu">
							<?php if ( ! rpid_is_amp() ) { ?>
								<a id="rpid-responsive-menu" href="#menus" rel="nofollow" title="<?php echo esc_html_e( 'Mobile Menu', 'Reload_Production' ); ?>"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path d="M3 6h18v2H3V6m0 5h18v2H3v-2m0 5h18v2H3v-2z" fill="currentColor"/></svg><span class="screen-reader-text"><?php echo esc_html_e( 'Mobile Menu', 'Reload_Production' ); ?></span></a>
							<?php } else { ?>
								<button id="rpid-responsive-menu" on="tap:navigationamp.toggle" title="Menus" rel="nofollow"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path d="M3 6h18v2H3V6m0 5h18v2H3v-2m0 5h18v2H3v-2z" fill="currentColor"/></svg></button>
							<?php } ?>
						</div>
						<?php if ( ! rpid_is_amp() ) { ?>
						<div class="close-topnavmenu-wrap"><a id="close-topnavmenu-button" rel="nofollow" href="#"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path d="M12 20c-4.41 0-8-3.59-8-8s3.59-8 8-8s8 3.59 8 8s-3.59 8-8 8m0-18C6.47 2 2 6.47 2 12s4.47 10 10 10s10-4.47 10-10S17.53 2 12 2m2.59 6L12 10.59L9.41 8L8 9.41L10.59 12L8 14.59L9.41 16L12 13.41L14.59 16L16 14.59L13.41 12L16 9.41L14.59 8z" fill="currentColor"/></svg></a></div>
						<?php } ?>
						<div class="table-cell rpid-logo">
							<?php
							/* if get value from customizer rpid_logoimage */
							$setting = 'rpid_logoimage';

							$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );
							if ( $mod ) {
								/* get url image from value rpid_logoimage */
								$image = esc_url_raw( $mod );
								?>
								<div class="logo-wrap">
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="custom-logo-link" <?php echo rpid_itemprop_schema( 'url' ); /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?> title="<?php echo esc_html( get_bloginfo( 'name' ) ); ?>">
										<img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_html( get_bloginfo( 'name' ) ); ?>" title="<?php echo esc_html( get_bloginfo( 'name' ) ); ?>" />
									</a>
								</div>
								<?php
							} else {
								/* if get value from customizer blogname */
								if ( get_theme_mod( 'blogname', get_bloginfo( 'name' ) ) ) {
									?>
									<div class="site-title" <?php echo rpid_itemprop_schema( 'headline' ); /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?>>
										<a href="<?php echo esc_url( home_url( '/' ) ); ?>" <?php echo rpid_itemprop_schema( 'url' ); /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?> title="<?php echo esc_html( get_bloginfo( 'name' ) ); ?>">
											<?php echo esc_html( get_theme_mod( 'blogname', get_bloginfo( 'name' ) ) ); ?>
										</a>
									</div>

									<?php
								}
								/* if get value from customizer blogdescription */
								if ( get_theme_mod( 'blogdescription', get_bloginfo( 'description' ) ) ) {
									?>
									<span class="site-description" <?php echo rpid_itemprop_schema( 'description' ); /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?>>
										<?php echo esc_html( get_theme_mod( 'blogdescription', get_bloginfo( 'description' ) ) ); ?>
									</span>
									<?php
								}
							}
							?>
						</div>
						<?php if ( ! rpid_is_amp() ) { ?>
							<div class="table-cell search">
								<a id="search-menu-button-top" class="responsive-searchbtn pull-right" href="#" rel="nofollow"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><g fill="none"><path d="M21 21l-4.486-4.494M19 10.5a8.5 8.5 0 1 1-17 0a8.5 8.5 0 0 1 17 0z" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></g></svg></a>
								<form method="get" id="search-topsearchform-container" class="rpid-searchform searchform topsearchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
									<input type="text" name="s" id="s" placeholder="<?php echo esc_html_e( 'Search', 'Reload_Production' ); ?>" />
									<button type="submit" class="topsearch-submit"><?php echo esc_html_e( 'Search', 'Reload_Production' ); ?></button>
								</form>
							</div>
							<div class="table-cell rpid-table-date">
								<span class="rpid-top-date pull-right" data-lang="<?php echo esc_html( get_bloginfo( 'language' ) ); ?>"></span>
							</div>
						<?php } else { ?>
							<div class="table-cell search">
								<button id="search-menu-button-top" class="responsive-searchbtn pull-right" on="tap:AMP.setState({visible: !visible})" rel="nofollow"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><g fill="none"><path d="M21 21l-4.486-4.494M19 10.5a8.5 8.5 0 1 1-17 0a8.5 8.5 0 0 1 17 0z" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></g></svg></button>
								<div [class]="visible ? 'showsearch' : 'hidesearch'" class="hidesearch">
									<form method="get" class="rpid-searchform searchform topsearchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
										<input type="text" name="s" id="s" placeholder="<?php echo esc_html_e( 'Search', 'Reload_Production' ); ?>" />
										<button type="submit" class="topsearch-submit"><?php echo esc_html_e( 'Search', 'Reload_Prodution' ); ?></button>
									</form>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
				<?php
				if ( wp_is_mobile() ) {
					if ( has_nav_menu( 'mobilemenu' ) ) {
						echo '<div class="rpid-mobilemenu clearfix">';
						wp_nav_menu(
							array(
								'theme_location' => 'mobilemenu',
								'fallback_cb'    => false,
								'container'      => 'ul',
								'menu_id'        => 'mobile-menu',
								'depth'          => 1,
								'link_before'    => '<span itemprop="name">',
								'link_after'     => '</span>',
							)
						);
						echo '</div>';
					}
				}
				?>
			</div>
			<?php
		}
		?>
	</div><!-- .container -->
</header><!-- #masthead -->

<?php if ( ! rpid_is_amp() ) { ?>
<div class="top-header">
	<div class="container">
	<div class="rpid-menuwrap mainwrap-menu clearfix">
		<nav id="site-navigation" class="rpid-mainmenu" role="navigation" <?php echo rpid_itemtype_schema( 'SiteNavigationElement' ); /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?>>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'container'      => 'ul',
					'menu_id'        => 'primary-menu',
					'fallback_cb'    => 'rpid_add_link_adminmenu',
					'link_before'    => '<span itemprop="name">',
					'link_after'     => '</span>',
				)
			);
			?>
		</nav><!-- #site-navigation -->
	</div>
	<?php
	// Second top menu.
	if ( has_nav_menu( 'secondary' ) ) {
		?>
	<div class="gmr-menuwrap secondwrap-menu clearfix">
		<nav id="site-navigation" class="rpid-mainmenu" role="navigation" <?php echo rpid_itemtype_schema( 'SiteNavigationElement' ); /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?>>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'secondary',
					'container'      => 'ul',
					'menu_id'        => 'primary-menu',
					'link_before'    => '<span itemprop="name">',
					'link_after'     => '</span>',
				)
			);
			?>
		</nav><!-- #site-navigation -->
	</div>
		<?php
	}
	?>
	</div><!-- .container -->
</div><!-- .top-header -->
<?php } ?>
<div class="site inner-wrap" id="site-container">

<?php
$mod   = get_theme_mod( 'rpid_notif_marquee', 'textnotif' );
$notif = get_theme_mod( 'rpid_textnotif' );

if ( 'disable' !== $mod ) {
	echo '<div class="container">';
	echo '<div class="rpid-topnotification">';
	echo '<div class="wrap-marquee">';
	$textmarquee = get_theme_mod( 'rpid_textmarquee' );
	echo '<div class="text-marquee">';
	if ( $textmarquee ) :
		/* sanitize html output */
		echo esc_html( $textmarquee );
	else :
		echo esc_html__( 'Special Content', 'reload_Production' );
	endif;
	echo '</div>';
	echo '<span class="marquee">';
	if ( 'recentpost' === $mod ) {
		do_action( 'rpid_recentpost_marque' );
	} else {
		if ( isset( $notif ) && ! empty( $notif ) ) {
			echo do_shortcode( $notif );
		}
	}
	echo '</span>';
	echo '</div>';
	echo '</div>';
	echo '</div>';
}
?>

<?php do_action( 'rpid_topbanner_aftermenu' ); ?>

	<div id="content" class="rpid-content">

		<div class="container">
			<div class="row">
