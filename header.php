<!DOCTYPE html>
<html lang="vn">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Crimson+Pro:ital,wght@0,200..900;1,200..900&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">

  <!-- CSS -->
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/style.css">
  <?php wp_head(); ?>
</head>

<body>
  <header class="l-header">
    <div class="l-container">
      <div class="l-header__inner">
        <div class="l-header__logo">
          <?php
          $custom_logo_id = get_theme_mod('custom_logo');
          $logo_url = wp_get_attachment_image_src($custom_logo_id, 'full');
          ?>
          <a href="<?php echo home_url(); ?>">
            <img src="<?php echo $logo_url ? $logo_url[0] : get_template_directory_uri() . '/assets/images/logo-tramanhgroup01.png'; ?>" alt="logo tramanhgroup">
          </a>
        </div>
        <nav class="l-header__nav">
          <ul>
            <li><a href="#">About Tram Anh Group</a></li>
            <li><a href="#">Business Ecosystem</a></li>
            <li><a href="#">News & Contact</a></li>
          </ul>
          <button class="l-header__btn01">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-en-flag.svg" alt="en flag">
            EN
          </button>
        </nav>
      </div>
    </div>
  </header>