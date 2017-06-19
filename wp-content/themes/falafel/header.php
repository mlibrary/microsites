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

	<header id="masthead" role="banner">
		<div class="header-alt">
			<div class="container-fluid">
				<div class="header-container-alt">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<?php if ( has_header_image() ) { ?>
							<img src="<?php echo( get_header_image() ); ?>" class="header-logo-image-alt" alt="<?php echo( get_bloginfo( 'title' ) ); ?>" />
						<?php } ?>
					</a>
					<div class="header-title-container-alt">
						<h1 class="header-alt-title"><?php bloginfo( 'name' ); ?></h1>
						<p class="header-alt-subtitle"><?php bloginfo( 'description' ); ?></p>
					</div>
				</div>
			</div>
		</div>
		<nav id="site-navigation" class="header-navigation-alt" role="navigation">
			<div class="container-fluid">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'falafel' ); ?></button>
				<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu', 'menu_class' => 'header-navigation-list-alt' ) ); ?>
			</div>
		</nav>
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
