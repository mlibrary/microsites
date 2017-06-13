<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package falafel
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'falafel' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="header-alt">
			<div class="header-container-alt">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php header_image(); ?>" class="header-logo-image-alt"></a>
				<div class="header-title-container-alt">
					<h1 class="header-alt-title"><?php bloginfo( 'name' ); ?></h1>
					<p class="header-alt-subtitle"><?php bloginfo( 'description' ); ?></p>
				</div>
			</div>
		</div>
		<nav id="site-navigation" class="header-navigation-alt" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'falafel' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu', 'menu_class' => 'header-navigation-list-alt' ) ); ?>
		</nav>
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
