<?php
/*
	Plugin Name: UM-Lib Kaltura Enable oEmbed
	Plugin URI:
	Description: Enable UM-Library Kaltura oEmbed within your site.
	Version: 1.0
	Author: Tony Box
	License: GPL2
*/
add_action( 'init', 'umlib_kaltura_add_oembed_handlers');
function umlib_kaltura_add_oembed_handlers() {
    wp_oembed_add_provider( 'https://lib.mivideo.it.umich.edu/*', 'https://lib.mivideo.it.umich.edu/oembed', false );
}
