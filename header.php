<!DOCTYPE html>
<html lang="vn">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- ogp -->
  <meta name="robots" content="follow, index">
  <link rel="canonical" href="<?php echo get_home_url(); ?>">
  <meta property="og:locale" content="vi_VN">
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Crimson+Pro:ital,wght@0,200..900;1,200..900&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">

  <!-- CSS -->
  <?php wp_head(); ?>
</head>

<?php
$headerWhite = false;
if (
  is_page('overview') ||
  is_page('tong-quan') ||
  is_page('portfolio') ||
  is_page('ho-so') ||
  is_single()
  ) {
  $headerWhite = true;
}
?>

<body>
  <header class="l-header js-header<?php echo $headerWhite ? " is-white" : "" ?>">
    <div class="l-container">
      <div class="l-header__inner">
        <div class="l-header__logo">
          <?php
          $custom_logo_id = get_theme_mod('custom_logo');
          $logo_url = wp_get_attachment_image_src($custom_logo_id, 'full');
          ?>
          <a href="<?php echo home_url(); ?>">
            <img class="l-header__logo--first" src="<?php echo $logo_url ? $logo_url[0] : get_template_directory_uri() . '/assets/images/logo-tramanhgroup01.png'; ?>" alt="logo tramanhgroup">
            <img class="l-header__logo--last" src="<?php echo $logo_url ? $logo_url[0] : get_template_directory_uri() . '/assets/images/logo-tramanhgroup03.png'; ?>" alt="logo tramanhgroup">
          </a>
        </div>
        <div class="l-header__menu">
          <nav class="l-header__nav">
            <?php
            $lang = get_current_lang();
            // $menu_id = ($lang === 'vi') ? 3 : 2; // VN menu ID 3, EN ID 2
            wp_nav_menu(array(
              'theme_location' => 'primary',
              'container' => false,
              'menu_class' => '',
              'menu_id' => '',
              'depth' => 2,
              'fallback_cb' => false,
              'link_before' => '',
              'link_after' => ''
            ));
            ?>
            <div class="l-header__box01">
              <div class="l-header__box02">
                <button class="l-header__btn01 js-show-drop-lang">
                  <?php
                  $current_lang = pll_current_language() ?: 'en'; // Current lang (en/vi)
                  $flag_src = ($current_lang === 'en') ?
                    get_template_directory_uri() . '/assets/images/icon-en-flag.svg' :
                    get_template_directory_uri() . '/assets/images/icon-vi-flag.svg'; // Adjust icon-vi-flag.svg nếu có
                  ?>
                  <img src="<?php echo esc_url($flag_src); ?>" alt="<?php echo esc_attr($current_lang); ?> flag">
                  <?php echo esc_html(strtoupper($current_lang)); ?>
                </button>
                <div class="l-header__box02--drop js-box-drop-lang">
                  <?php
                  // $translations = pll_the_languages(array('raw' => 1));
                  // if (!empty($translations)) {
                  //   foreach ($translations as $lang_item) {
                  //     if ($lang_item['slug'] === $current_lang) continue; // Skip current lang
                  //     // $flag = isset($lang_item['flag']) ?
                  //     //   '<img src="' . esc_url($lang_item['flag']) . '" alt="' . esc_attr($lang_item['slug']) . '" style="width:24px;">' : '';
                  //     $custom_flag_src = ($lang_item['slug'] === 'en') ?
                  //       get_template_directory_uri() . '/assets/images/icon-en-flag.svg' :
                  //       get_template_directory_uri() . '/assets/images/icon-vi-flag.svg';
                  //     $flag = '<img src="' . esc_url($custom_flag_src) . '" alt="' . esc_attr($lang_item['slug']) . '" style="width:24px;">';
                  //     echo '<a href="' . esc_url($lang_item['url']) . '" class="lang-' . esc_attr($lang_item['slug']) . '">' . $flag . esc_html(strtoupper($lang_item['slug'])) . '</a> ';
                  //   }
                  // }
                  ?>
                  <?php if ($lang === "vi"): ?>
                    <a href="http://localhost/tramanhgroup.local/en/">
                      <img src="<?php echo get_template_directory_uri() . '/assets/images/icon-en-flag.svg'; ?>" alt="">
                      EN
                    </a>
                  <?php else : ?>
                    <a href="http://localhost/tramanhgroup.local/vi/">
                      <img src="<?php echo get_template_directory_uri() . '/assets/images/icon-vi-flag.svg'; ?>" alt="">
                      VI
                    </a>
                  <?php endif; ?>
                </div>
              </div>
              <div class="l-header__box01--sp">
                <div class="l-header__box01--list01">
                  <a href="#">Terms</a>
                  <a href="#">Privacy Policy</a>
                </div>
                <div class="l-header__box01--list02">
                  <a href="https://fb.com">
                    <img class="icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-in.svg" alt="icon in">
                  </a>
                  <a href="https://fb.com">
                    <img class="icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-fb.svg" alt="icon fb">
                  </a>
                  <a href="https://fb.com">
                    <img class="icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-youtube.svg" alt="icon youtube">
                  </a>
                </div>
              </div>
            </div>
          </nav>
        </div>
        <button class="l-header__btn02 js-show-menu">
          <img class="l-header__btn02--first" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-menu.svg" alt="en menu">
          <img class="l-header__btn02--last" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-menu-02.svg" alt="en menu">
          <img class="l-header__btn02--close" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-close.svg" alt="en menu">
        </button>
      </div>
    </div>
  </header>