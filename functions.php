<?php
function enqueue_swiper()
{
  wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), '11', true);
  wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css');
  // wp_enqueue_script('jquery');
  wp_enqueue_style('my-theme-style', get_stylesheet_uri(), array(), '1.0.0');
  // wp_enqueue_style('my-theme-custom-css', get_template_directory_uri() . '/assets/css/style.css', array('my-theme-style'), '1.0.0');
  wp_enqueue_script('my-theme-script', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'enqueue_swiper');
function add_cache_busting_to_styles() {
    wp_enqueue_style('custom-style', get_stylesheet_directory_uri() . '/assets/css/style.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/style.css'));
}
add_action('wp_enqueue_scripts', 'add_cache_busting_to_styles');
/**
 * Theme Setup
 */
function mytheme_setup()
{
  // Add theme support
  add_theme_support('title-tag');
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('html5', array(
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
  ));

  // Register navigation menus
  register_nav_menus(array(
    'primary'   => __('Primary Menu', 'mytheme'),
    'footer'    => __('Footer Menu', 'mytheme'),
    'social'    => __('Social Menu', 'mytheme'),
  ));
}
add_action('after_setup_theme', 'mytheme_setup');

function add_cache_busting_to_images($url) {
    if (is_admin()) return $url; // Không áp dụng trong admin
    $file_path = str_replace(get_site_url(), ABSPATH, $url);
    if (file_exists($file_path)) {
        $url = add_query_arg('v', filemtime($file_path), $url);
    }
    return $url;
}
add_filter('wp_get_attachment_url', 'add_cache_busting_to_images');
add_filter('image_downsize', function($out, $id, $size) {
    if (is_array($out)) {
        $out[0] = add_cache_busting_to_images($out[0]);
    }
    return $out;
}, 10, 3);