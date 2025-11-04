<?php $lang = get_current_lang(); ?>
<footer class="l-footer">
  <div class="l-container">
    <div class="l-footer__body">
      <div class="l-footer__first">
        <div>
          <div class="l-footer__logo">
            <?php
            $custom_logo_id = get_theme_mod('custom_logo');
            $logo_url = wp_get_attachment_image_src($custom_logo_id, 'full');
            ?>
            <a href="<?php echo esc_url(home_url()); ?>">
              <img src="<?php echo esc_url($logo_url ? $logo_url[0] : get_template_directory_uri() . '/assets/images/logo-tramanhgroup02.png'); ?>" alt="logo tramanhgroup">
            </a>
          </div>
          <p class="l-footer__text01">
            <?php
            echo $lang === "en"
              ? "Tram Anh Industrial Manufacturing & Trading Co., Ltd."
              : "Công ty TNHH Sản xuất Công nghiệp Thương mại Trâm Anh"
            ?>
          </p>
        </div>
        <div class="l-footer__first--list01">
          <ul>
            <li>
              <span>
                <img class="icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-map.svg" alt="icon map">
              </span>
              <span>
                <?php if ($lang === "en"): ?>
                  Floor 19, Room 1901 – Saigon Trade Center,<br>
                  No. 37 Ton Duc Thang Street, Saigon Ward, Ho Chi Minh City, Vietnam.
                <?php else : ?>
                  Tầng 19, P.1901 - Saigon Trade Center<br>
                  37 Tôn Đức Thắng, Phường Sài Gòn, Thành phố Hồ Chí Minh, Việt Nam
                <?php endif; ?>
              </span>
            </li>
            <li>
              <span>
                <img class="icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-phone.svg" alt="icon phone">
              </span>
              <a href="tel:+1900 11 22 33">1900 11 22 33</a>
            </li>
            <li>
              <span>
                <img class="icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-mail.svg" alt="icon mail">
              </span>
              <a href="mailto:info@tramanhgroup.com.vn">info@tramanhgroup.com.vn</a>
            </li>
          </ul>
        </div>
        <div class="l-footer__first--list02">
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
      <div class="l-footer__menu">
        <?php
        wp_nav_menu(array(
          'theme_location' => 'footer',
          'container' => false,
          'menu_class' => '',
          'menu_id' => '',
          'depth' => 2,
          'fallback_cb' => false,
          'link_before' => '',
          'link_after' => ''
        ));
        ?>
      </div>
    </div>
    <div class="l-footer__bottom">
      <div class="l-footer__bottom--list01">
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
      <p class="text-copyright">
        <?php if ($lang === "en"): ?>
          © 2025 Tram Anh Group. All rights reserved.
        <?php else : ?>
          © 2025 Trâm Anh Group. Tất cả các quyền được bảo lưu.
        <?php endif; ?>
      </p>
      <div class="l-footer__bottom--box01">
        <?php
        wp_nav_menu(array(
          'theme_location' => 'policy',
          'container' => false,
          'menu_class' => '',
          'menu_id' => '',
          'depth' => 2,
          'fallback_cb' => false,
          'link_before' => '',
          'link_after' => ''
        ));
        ?>
      </div>
    </div>
  </div>
</footer>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.min.js"></script>
<?php wp_footer(); ?>
</body>

</html>