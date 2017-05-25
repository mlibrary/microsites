<?php
/*
	Plugin Name: U-M Library Setup
	Plugin URI: https://github.com/mlibrary/microsites
	Description: Provide some basic setup for U-M Library sites.
	Version: 1.0
	Author: Albert Bertram
	License: BSD-Revised
*/
add_action( 'init', 'umlib_setup');
function umlib_setup() {
    umask(002);
    wp_oembed_add_provider(
      'https://lib.mivideo.it.umich.edu/*',
      'https://lib.mivideo.it.umich.edu/oembed',
       false
    );
}
