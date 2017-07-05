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

// With hints from https://stackoverflow.com/questions/8916631/make-wordpress-user-name-the-email-address
add_filter('wpmu_validate_user_signup', function($info) {
  $_POST['noconfirmation'] = 1;
  if (isset($info['errors']->errors['user_name'])) {
    unset($info['errors']->errors['user_name']);
  }
  return $info;
});
