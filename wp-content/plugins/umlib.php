<?php
/*
	Plugin Name: U-M Library Setup
	Plugin URI: https://github.com/mlibrary/microsites
	Description: Provide some basic setup for U-M Library sites.
	Version: 1.0
	Author: Albert Bertram
	License: BSD-Revised, GPL as required.
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

// Some portions of this are modeled after the WP pastacode plugin
// The author of that plugin is Willy Bahuaud.
function umlib_gist_shortcode($atts) {

  $id   = isset($atts['id']) ? $atts['id'] :
          isset($atts[0]) ? explode('/', $atts[0])[4] :
          NULL;

  $file = isset($atts['file']) ? $atts['file'] : NULL;

  if (!empty($id)) {
    $req  = wp_sprintf('https://api.github.com/gists/%s', $id);
    $code = wp_remote_get($req);
    if (!is_wp_error($code) && 200 == wp_remote_retrieve_response_code($code)) {
      $data = json_decode(wp_remote_retrieve_body($code));
      $url  = $data->html_url;
      if ($file && isset($data->files->{$file})) {
        $data = $data->files->{$file};
      }
      else {
        $data = (array) $data->files;
        $data = reset($data);
      }
      $name = esc_html($data->filename);
      $gist = esc_html($data->content);
      $raw  = esc_html($data->raw_url);
    }
  }
  if (empty($gist)) {
    return '';
  }
  return "<figure><pre class='gist'><code>{$gist}</code></pre><figcaption><a href='{$url}'>GitHub Gist: {$name}</a></figcaption></figure>";
}
add_shortcode('gist', 'umlib_gist_shortcode');
