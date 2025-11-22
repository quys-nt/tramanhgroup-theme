<?php
function enqueue_swiper()
{
  wp_enqueue_script('aos', 'https://unpkg.com/aos@2.3.1/dist/aos.js', array(), '2.3.', true);
  wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), '11', true);
  wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css');
  wp_enqueue_style('my-theme-style', get_stylesheet_uri(), array(), '1.0.0');
  wp_enqueue_script('my-theme-script', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0.0', true);
  wp_enqueue_script('query-toc-script', get_template_directory_uri() . '/assets/js/jquery.toc.min.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'enqueue_swiper');
function add_cache_busting_to_styles()
{
  wp_enqueue_style('custom-style', get_stylesheet_directory_uri() . '/assets/css/style.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/style.css'));
}
add_action('wp_enqueue_scripts', 'add_cache_busting_to_styles');

function enqueue_youtube_player_script()
{
  wp_enqueue_script(
    'youtube-player',
    get_template_directory_uri() . '/assets/js/youtube-player.js',
    array('jquery'),
    '1.0.0',
    true
  );
}
add_action('wp_enqueue_scripts', 'enqueue_youtube_player_script');

/**
 * Theme Setup
 */
function mytheme_setup()
{
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
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
    'policy'    => __('Policy Menu', 'mytheme'),
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

if (function_exists('acf_add_options_page')) {
  acf_add_options_page(array(
    'page_title'    => 'Gallery Settings',
    'menu_title'    => 'Gallery',
    'menu_slug'     => 'gallery-settings',
    'capability'    => 'edit_posts',
    'redirect'      => false,
    'parent_slug'   => 'theme-settings'
  ));
  acf_add_options_page(array(
    'page_title'    => 'Career Settings',
    'menu_title'    => 'Career',
    'menu_slug'     => 'Career-settings',
    'capability'    => 'edit_posts',
    'redirect'      => false,
    'parent_slug'   => 'theme-settings'
  ));
  acf_add_options_page(array(
    'page_title'    => 'Post Settings',
    'menu_title'    => 'Post',
    'menu_slug'     => 'post-settings',
    'capability'    => 'edit_posts',
    'redirect'      => false,
    'parent_slug'   => 'theme-settings'
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

/**
 * Enqueue share scripts cho single post
 */
function enqueue_share_scripts()
{
  if (is_single()) {
    wp_enqueue_script(
      'share-functions',
      get_template_directory_uri() . '/assets/js/share.js',
      array('jquery'),
      '1.0.0',
      true
    );

    wp_localize_script('share-functions', 'shareData', array(
      'ajaxurl' => admin_url('admin-ajax.php'),
      'postId' => get_the_ID(),
      'lang' => function_exists('get_current_lang') ? get_current_lang() : 'en'
    ));
  }
}
add_action('wp_enqueue_scripts', 'enqueue_share_scripts');

/**
 * Get child category của bài viết (bỏ qua category cha)
 * 
 * @param int $post_id Post ID (optional)
 * @return object|null Category object hoặc null
 */
function get_post_child_category($post_id = null)
{
  if (!$post_id) {
    $post_id = get_the_ID();
  }

  $categories = get_the_category($post_id);

  if (empty($categories)) {
    return null;
  }

  foreach ($categories as $cat) {
    if ($cat->parent != 0) {
      return $cat;
    }
  }

  return $categories[0];
}

/**
 * Get tất cả child categories của bài viết
 * 
 * @param int $post_id Post ID (optional)
 * @return array Mảng các category objects
 */
function get_post_child_categories($post_id = null)
{
  if (!$post_id) {
    $post_id = get_the_ID();
  }

  $categories = get_the_category($post_id);
  $child_categories = array();

  if (empty($categories)) {
    return $child_categories;
  }

  foreach ($categories as $cat) {
    if ($cat->parent != 0) {
      $child_categories[] = $cat;
    }
  }

  if (empty($child_categories)) {
    return $categories;
  }

  return $child_categories;
}

/**
 * Get parent category của bài viết hiện tại
 * 
 * @param int $post_id Post ID (optional, default = current post)
 * @return object|null Category object hoặc null
 */
function get_post_parent_category($post_id = null)
{
  if (!$post_id) {
    $post_id = get_the_ID();
  }

  $categories = get_the_category($post_id);

  if (empty($categories)) {
    return null;
  }

  foreach ($categories as $cat) {
    if ($cat->parent == 0) {
      return $cat;
    }
  }

  $first_cat = $categories[0];
  if ($first_cat->parent != 0) {
    return get_category($first_cat->parent);
  }

  return null;
}

/**
 * Get parent category link của bài viết hiện tại
 * 
 * @param int $post_id Post ID (optional)
 * @param string $fallback_url URL fallback nếu không tìm thấy (default = home_url)
 * @return string Category link URL
 */
function get_post_parent_category_link($post_id = null, $fallback_url = null)
{
  if (!$fallback_url) {
    $fallback_url = home_url('/');
  }

  $parent_cat = get_post_parent_category($post_id);

  if ($parent_cat) {
    return get_category_link($parent_cat->term_id);
  }

  return $fallback_url;
}

/**
 * Check xem category có phải là parent category không
 * 
 * @param int $cat_id Category ID
 * @return bool
 */
function is_parent_category($cat_id)
{
  $category = get_category($cat_id);

  if (!$category) {
    return false;
  }

  return ($category->parent == 0);
}

/**
 * Get breadcrumb categories cho bài viết
 * Trả về mảng [parent_category, child_category]
 * 
 * @param int $post_id Post ID (optional)
 * @return array
 */
function get_post_category_breadcrumb($post_id = null)
{
  $breadcrumb = array(
    'parent' => null,
    'child' => null
  );

  $parent_cat = get_post_parent_category($post_id);
  $child_cat = get_post_child_category($post_id);

  $breadcrumb['parent'] = $parent_cat;
  $breadcrumb['child'] = $child_cat;

  return $breadcrumb;
}

/**
 * Get career department label
 * 
 * @param string $department_key Department key
 * @return string Department label
 */
function get_career_department_label($department_key)
{
  $labels = array(
    'automotive' => 'Automotive & Mobility',
    'lubricants' => 'Lubricants & Chemicals',
    'yachting' => 'Yachting & Lifestyle',
    'retail' => 'Retail & Luxury',
    'real_estate' => 'Real Estate',
    'sports' => 'Sports & Community'
  );

  return isset($labels[$department_key]) ? $labels[$department_key] : $department_key;
}

/**
 * Get all career departments
 * 
 * @return array Department options
 */
function get_career_departments()
{
  return array(
    'automotive' => 'Automotive & Mobility',
    'lubricants' => 'Lubricants & Chemicals',
    'yachting' => 'Yachting & Lifestyle',
    'retail' => 'Retail & Luxury',
    'real_estate' => 'Real Estate',
    'sports' => 'Sports & Community'
  );
}

/**
 * Get latest posts from child categories (mixed from all categories)
 * Each category contributes equally to the total
 * 
 * @param int $parent_cat_id Parent category ID
 * @param int $total_posts Total number of posts to display (default: 8)
 * @return WP_Query Query object with mixed posts from all child categories
 */
function get_mixed_latest_posts_from_children($parent_cat_id, $total_posts = 8) {
    // Get all child categories
    $child_categories = get_categories(array(
        'parent' => $parent_cat_id,
        'hide_empty' => true,
        'orderby' => 'name',
        'order' => 'ASC'
    ));
    
    if (empty($child_categories)) {
        // Return empty query if no child categories
        return new WP_Query(array('post__in' => array(0)));
    }
    
    // Calculate posts per category
    $posts_per_category = ceil($total_posts / count($child_categories));
    
    $all_post_ids = array();
    
    // Get posts from each category
    foreach ($child_categories as $child_cat) {
        $cat_posts = get_posts(array(
            'cat' => $child_cat->term_id,
            'posts_per_page' => $posts_per_category,
            'orderby' => 'date',
            'order' => 'DESC',
            'post_status' => 'publish',
            'fields' => 'ids'
        ));
        
        if (!empty($cat_posts)) {
            $all_post_ids = array_merge($all_post_ids, $cat_posts);
        }
    }
    
    // Remove duplicates and limit to total_posts
    $all_post_ids = array_unique($all_post_ids);
    $all_post_ids = array_slice($all_post_ids, 0, $total_posts);
    
    // Create final query
    if (empty($all_post_ids)) {
        return new WP_Query(array('post__in' => array(0)));
    }
    
    return new WP_Query(array(
        'post__in' => $all_post_ids,
        'orderby' => 'date',
        'order' => 'DESC',
        'posts_per_page' => $total_posts,
        'post_status' => 'publish'
    ));
}

/**
 * Get parent category ID by slug (works with Polylang)
 * 
 * @param string $slug Category slug
 * @return int|null Category ID or null
 */
function get_category_id_by_slug($slug) {
    $category = get_category_by_slug($slug);
    
    if (!$category && function_exists('pll_current_language')) {
        // Try to get translated category
        $en_cat = get_category_by_slug($slug);
        if ($en_cat) {
            $translated_cat_id = pll_get_term($en_cat->term_id, pll_current_language());
            if ($translated_cat_id) {
                $category = get_category($translated_cat_id);
            }
        }
    }
    
    return $category ? $category->term_id : null;
}