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
        <div class="l-header__menu">
          <nav class="l-header__nav">
            <ul>
              <li>
                <a href="#">About Tram Anh Group</a>
                <ul>
                  <li><a href="#">Overview</a></li>
                  <li><a href="#">Leadership & Vision</a></li>
                  <li><a href="#">Sustainability & Community</a></li>
                </ul>
              </li>
              <li>
                <a href="#">Business Ecosystem</a>
                <ul>
                  <li><a href="#">Automotive & Mobility</a></li>
                  <li><a href="">Lubricants & Chemicals</a></li>
                  <li><a href="#">Yachting & Lifestyle</a></li>
                  <li><a href="#">Retail & Luxury</a></li>
                  <li><a href="#">Real Estate</a></li>
                  <li><a href="#">Sports & Community</a></li>
                </ul>
              </li>
              <li>
                <a href="#">News & Contact</a>
                <ul>
                  <li><a href="#">Newsroom</a></li>
                  <li><a href="">Gallery</a></li>
                  <li><a href="#">Contact & Investor Relations</a></li>
                </ul>
              </li>
            </ul>
            <div class="l-header__box01">
              <button class="l-header__btn01">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-en-flag.svg" alt="en flag">
                EN
              </button>
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
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-menu.svg" alt="en menu">
        </button>
      </div>
    </div>
  </header>