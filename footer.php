<?php if ($lang === "en") : ?>
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
              <a href="<?php echo home_url(); ?>">
                <img src="<?php echo $logo_url ? $logo_url[0] : get_template_directory_uri() . '/assets/images/logo-tramanhgroup02.png'; ?>" alt="logo tramanhgroup">
              </a>
            </div>
            <p class="l-footer__text01">
              Công ty TNHH Sản xuất Công nghiệp Thương mại Trâm Anh
            </p>
          </div>
          <div class="l-footer__first--list01">
            <ul>
              <li>
                <span>
                  <img class="icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-map.svg" alt="icon map">
                </span>
                <span>
                  Floor 19, Room 1901 – Saigon Trade Center,<br>
                  No. 37 Ton Duc Thang Street, Saigon Ward, Ho Chi Minh City, Vietnam.
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
        <div class="l-footer__last">
          <div class="l-footer__list01">
            <p class="title">About Trâm Anh Group</p>
            <ul>
              <li><a href="#">Overview</a></li>
              <li><a href="#">Leadership & Vision</a></li>
              <li><a href="#">Sustainability & Community</a></li>
            </ul>
          </div>
          <div class="l-footer__list01">
            <p class="title">Business Ecosystem</p>
            <ul>
              <li><a href="#">Automotive & Mobility</a></li>
              <li><a href="#">Lubricants & Chemicals</a></li>
              <li><a href="#">Yachting & Lifestyle</a></li>
              <li><a href="#">Retail & Luxury</a></li>
              <li><a href="#">Real Estate</a></li>
              <li><a href="#">Sports & Community</a></li>
            </ul>
          </div>
          <div class="l-footer__list01">
            <p class="title">News & Contact</p>
            <ul>
              <li><a href="#">Newsroom</a></li>
              <li><a href="#">Gallery</a></li>
              <li><a href="#">Contact & Investor Relations</a></li>
            </ul>
          </div>
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
        <p class="text-copyright">© 2025 Tram Anh Group. All rights reserved.</p>
        <div class="l-footer__bottom--box01">
          <a href="#">Terms</a>
          <a href="#">Privacy Policy</a>
        </div>
      </div>
    </div>
  </footer>
<?php else : ?>
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
              <a href="<?php echo home_url(); ?>">
                <img src="<?php echo $logo_url ? $logo_url[0] : get_template_directory_uri() . '/assets/images/logo-tramanhgroup02.png'; ?>" alt="logo tập đoàn trâm anh">
              </a>
            </div>
            <p class="l-footer__text01">
              Công ty TNHH Sản xuất Công nghiệp Thương mại Trâm Anh
            </p>
          </div>
          <div class="l-footer__first--list01">
            <ul>
              <li>
                <span>
                  <img class="icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-map.svg" alt="biểu tượng bản đồ">
                </span>
                <span>
                  Tầng 19, Phòng 1901 – Trung tâm Thương mại Sài Gòn,<br>
                  Số 37 Tôn Đức Thắng, Phường Sài Gòn, Thành phố Hồ Chí Minh, Việt Nam.
                </span>
              </li>
              <li>
                <span>
                  <img class="icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-phone.svg" alt="biểu tượng điện thoại">
                </span>
                <a href="tel:+1900 11 22 33">1900 11 22 33</a>
              </li>
              <li>
                <span>
                  <img class="icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-mail.svg" alt="biểu tượng email">
                </span>
                <a href="mailto:info@tramanhgroup.com.vn">info@tramanhgroup.com.vn</a>
              </li>
            </ul>
          </div>
          <div class="l-footer__first--list02">
            <a href="https://fb.com">
              <img class="icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-in.svg" alt="biểu tượng linkedin">
            </a>
            <a href="https://fb.com">
              <img class="icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-fb.svg" alt="biểu tượng facebook">
            </a>
            <a href="https://fb.com">
              <img class="icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-youtube.svg" alt="biểu tượng youtube">
            </a>
          </div>
        </div>
        <div class="l-footer__last">
          <div class="l-footer__list01">
            <p class="title">Về Tập đoàn Trâm Anh</p>
            <ul>
              <li><a href="#">Tổng quan</a></li>
              <li><a href="#">Lãnh đạo & Tầm nhìn</a></li>
              <li><a href="#">Bền vững & Cộng đồng</a></li>
            </ul>
          </div>
          <div class="l-footer__list01">
            <p class="title">Hệ sinh thái Kinh doanh</p>
            <ul>
              <li><a href="#">Ô tô & Di chuyển</a></li>
              <li><a href="#">Chất bôi trơn & Hóa chất</a></li>
              <li><a href="#">Du thuyền & Lối sống</a></li>
              <li><a href="#">Bán lẻ & Cao cấp</a></li>
              <li><a href="#">Bất động sản</a></li>
              <li><a href="#">Thể thao & Cộng đồng</a></li>
            </ul>
          </div>
          <div class="l-footer__list01">
            <p class="title">Tin tức & Liên hệ</p>
            <ul>
              <li><a href="#">Phòng tin tức</a></li>
              <li><a href="#">Thư viện ảnh</a></li>
              <li><a href="#">Liên hệ & Quan hệ Nhà đầu tư</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="l-footer__bottom">
        <div class="l-footer__bottom--list01">
          <a href="https://fb.com">
            <img class="icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-in.svg" alt="biểu tượng linkedin">
          </a>
          <a href="https://fb.com">
            <img class="icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-fb.svg" alt="biểu tượng facebook">
          </a>
          <a href="https://fb.com">
            <img class="icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-youtube.svg" alt="biểu tượng youtube">
          </a>
        </div>
        <p class="text-copyright">© 2025 Tram Anh Group. All rights reserved.</p>
        <div class="l-footer__bottom--box01">
          <a href="#">Điều khoản</a>
          <a href="#">Chính sách Bảo mật</a>
        </div>
      </div>
    </div>
  </footer>
<?php endif; ?>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<?php wp_footer(); ?>
</body>

</html>