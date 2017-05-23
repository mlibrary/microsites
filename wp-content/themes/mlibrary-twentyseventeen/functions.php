<?php
function my_theme_enqueue_styles() {

    $parent_style = 'twentyseventeen-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

function mlibrary_custom_header_args( $args ) {
	$args['default-image'] = null;
	return $args;
}

add_filter( 'twentyseventeen_custom_header_args', 'mlibrary_custom_header_args' );

add_action( 'customize_register', 'prefix_remove_customizers', 15 );

function prefix_remove_customizers( $wp_customize ) {
	$wp_customize->remove_section( 'custom_css' );
	$wp_customize->remove_section( 'colors' );
}

?>
