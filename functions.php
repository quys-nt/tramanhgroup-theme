<?php
function enqueue_swiper()
{
  wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), '11', true);
  wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css');
  wp_enqueue_style('my-theme-style', get_stylesheet_uri(), array(), '1.0.0');
  wp_enqueue_script('my-theme-script', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'enqueue_swiper');
function add_cache_busting_to_styles()
{
  wp_enqueue_style('custom-style', get_stylesheet_directory_uri() . '/assets/css/style.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/style.css'));
}
add_action('wp_enqueue_scripts', 'add_cache_busting_to_styles');

/**
 * Theme Setup
 */
function mytheme_setup()
{
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

  register_nav_menus(array(
    'primary'   => __('Primary Menu', 'mytheme'),
    'footer'    => __('Footer Menu', 'mytheme'),
    'social'    => __('Social Menu', 'mytheme'),
  ));
}
add_action('after_setup_theme', 'mytheme_setup');

if (function_exists('acf_add_options_page')) {
  acf_add_options_page(array(
    'page_title'    => 'Setting Themes Tram Anh Group',
    'menu_title'    => 'Setting Themes',
    'menu_slug'     => 'theme-settings',
    'capability'    => 'edit_posts',
    'redirect'  => false
  ));
}

if (function_exists('pll_current_language')) {
  function get_current_lang()
  {
    return pll_current_language();
  }
  function get_field_by_lang($field_name, $post_id = null)
  {
    $lang = get_current_lang();
    $translated_id = pll_get_post($post_id ?: get_the_ID());
    return get_field($field_name, $translated_id);
  }
  add_filter('body_class', function ($classes) {
    $lang = get_current_lang();
    $classes[] = 'lang-' . $lang;
    return $classes;
  });
  add_filter('language_attributes', function ($lang_attr) {
    $current_lang = get_current_lang();
    return str_replace('lang="en"', 'lang="' . ($current_lang === 'vi' ? 'vi' : 'en') . '"', $lang_attr);
  });
} elseif (defined('ICL_LANGUAGE_CODE')) {
  function get_current_lang()
  {
    return ICL_LANGUAGE_CODE;
  }
}

add_action('wp_enqueue_scripts', function () {
  if (function_exists('pll_the_languages')) {
    wp_enqueue_style('polylang', 'https://polylang.pro/css/polylang.css', array(), '3.0');
  }
});
