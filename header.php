<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package riverside
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site <?php echo $pagename; ?>">

	<header id="masthead" class="site-header" role="banner">
		<div class="row">
	
			<div id="logo">
				<a href="<?php echo home_url(	); ?>"><img src="<?php echo get_stylesheet_directory_uri() . '/assets/logo.svg'; ?>" width="100px"></a>
			</div><!-- .site-branding -->

			<div id="navigation">
				<nav id="site-navigation" class="main-navigation" role="navigation">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fa fa-bars"></i><span class="screen-reader-text"><?php esc_html_e( 'Menu', 'a4c' ); ?></span></button>
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?> 
				</nav><!-- #site-navigation -->
			</div>

			<div id="links">
				<a href="<?php echo home_url( '/our-rooms' ); ?>#rooms" class="teal email">Book Your Stay</a>
				<a href="<?php echo home_url( '/offers' ); ?>" class="blue trip">Offers</a>
			</div>

		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
