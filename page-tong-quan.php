<?php get_header(); ?>
<?php $section_1 = get_field('section_1'); ?>

<main>
  <section class="p-about__sec01">
    <div class="l-container">
      <div class="p-about__sec01--box01">
        <div>
          <h1 class="p-about__sec01--title">
            <span>
              <?php echo $section_1['title_first']; ?>
            </span>
            <span>
              <?php echo $section_1['title_last']; ?>
            </span>
          </h1>
        </div>
        <div>
          <div class="p-about__sec01--desc">
            <?php the_content(); ?>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php
  $section_2 = get_field('section_2');
  $images = $section_2['images']['url'];
  $box01Title = $section_2['vison']['title'];
  $box01Desc = $section_2['vison']['desc'];
  $box02Title = $section_2['mission']['title'];
  $box02Desc = $section_2['mission']['desc'];
  if ($section_2) {
  ?>
    <div class="p-about__sec02"
      style="background-image: linear-gradient(180deg, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.3) 41.53%, rgba(0, 0, 0, 0.8) 92.53%), url('<?php echo $images; ?>');">
      <div class="l-container">
        <div class="p-about__sec02--box01">
          <div class="p-about__sec02--box01-first">
            <div class="desc">
              <?php echo $box01Desc; ?>
            </div>
            <div class="title js-box-title-first">
              <span class="js-box-title-first-text"><?php echo $box01Title; ?></span>
            </div>
          </div>
          <div class="p-about__sec02--box01-last">
            <div class="desc">
              <?php echo $box02Desc; ?>
            </div>
            <div class="title js-box-title-last">
              <span class="js-box-title-last-text"><?php echo $box02Title; ?></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>

  <section class="p-about__sec03">
    <div class="l-container">
      <div class="c-text__center">

        <p class="c-text__intro01">
          Hành trình của chúng tôi
        </p>
        <h2 class="c-title__02">
          <span class="c-title__02--first">
            Hành trình hơn 25 năm
          </span>
          <span class="c-title__02--last">
            Tăng trưởng & đổi mới bền vững
          </span>
        </h2>
      </div>
    </div>

    <div class="p-about__sec03--inner">
      <div class="p-about__sec03--box01">
        <div thumbsSlider="" class="swiper js-about-history">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div class="swiper-item">
                <div class="box01">
                  <p class="year">1993</p>
                  <p class="desc">
                    Khởi đầu với thương hiệu Chevrolet Retail trực thuộc Công ty Hòa Bình.
                  </p>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="swiper-item">
                <div class="logos">
                  <img src="http://localhost/tramanhgroup.local/wp-content/uploads/2025/10/thien-nghia-logo.png" alt="">
                </div>
                <div class="box01">
                  <p class="year">1996</p>
                  <p class="desc">
                    Thành lập Trâm Anh Group, đánh dấu bước phát triển chính thức của tập đoàn.
                  </p>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="swiper-item">
                <div class="logos">
                  <img src="http://localhost/tramanhgroup.local/wp-content/uploads/2025/10/thien-nghia-logo.png" alt="">
                </div>
                <div class="box01">
                  <p class="year">2004</p>
                  <p class="desc">
                    Trở thành cổ đông sáng lập của Thien Nghia ChemStation Asia, mở rộng hoạt động sang lĩnh vực hóa chất.
                  </p>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="swiper-item">
                <div class="logos">
                  <img src="http://localhost/tramanhgroup.local/wp-content/uploads/2025/10/thien-nghia-logo.png" alt="">
                </div>
                <div class="box01">
                  <p class="year">2006</p>
                  <p class="desc">
                    Gia nhập ngành công nghiệp ô tô với vai trò cổ đông và đối tác chiến lược của Audi Vietnam.
                  </p>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="swiper-item">
                <div class="logos">
                  <img src="http://localhost/tramanhgroup.local/wp-content/uploads/2025/10/thien-nghia-logo.png" alt="">
                </div>
                <div class="box01">
                  <p class="year">2008</p>
                  <p class="desc">
                    Đồng sáng lập AP Saigon Petro, mở rộng sang lĩnh vực dầu nhớt và nhiên liệu.
                  </p>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="swiper-item">
                <div class="logos">
                  <img src="http://localhost/tramanhgroup.local/wp-content/uploads/2025/10/thien-nghia-logo.png" alt="">
                </div>
                <div class="box01">
                  <p class="year">2017–2018</p>
                  <p class="desc">
                    Mở rộng sang lĩnh vực phong cách sống và thể thao với kinh doanh du thuyền (hợp tác cùng Tam Son Group), thành lập đội bóng rổ Thang Long Warriors và tổ hợp thể thao OCenter.
                  </p>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="swiper-item">
                <div class="logos">
                  <img src="http://localhost/tramanhgroup.local/wp-content/uploads/2025/10/thien-nghia-logo.png" alt="">
                </div>
                <div class="box01">
                  <p class="year">2022</p>
                  <p class="desc">
                    Trở thành cổ đông sáng lập Jacob & Co Vietnam, đồng thời ra mắt EV One – Giải pháp sạc xe điện.
                  </p>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="swiper-item">
                <div class="logos">
                  <img src="http://localhost/tramanhgroup.local/wp-content/uploads/2025/10/thien-nghia-logo.png" alt="">
                </div>
                <div class="box01">
                  <p class="year">2025</p>
                  <p class="desc">
                    Thành lập Tram Anh Motor Sports, trở thành nhà nhập khẩu và phân phối chính thức Ducati, Royal Enfield, đồng thời là đại lý ủy quyền Motoplex Vietnam & E-bike."
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="c-button prev js-about-history-button-prev"></div>
      <div class="c-button next js-about-history-button-next"></div>
    </div>
    <div class="p-about__sec03--timelines">
      <div class="p-about__sec03--timelines-text">
        Dòng thời gian
      </div>
      <div class="p-about__sec03--timelines-list">
        <div class="item slide-1">
          1993
        </div>
        <div class="item slide-2">
          1994
        </div>
        <div class="item slide-3">
          1995
        </div>
        <div class="item slide-4">
          1996
        </div>
        <div class="item slide-5">
          1997
        </div>
        <div class="item slide-6">
          1998
        </div>
        <div class="item slide-7">
          1999
        </div>
        <div class="item slide-8">
          2000
        </div>
      </div>
    </div>
  </section>

  <section class="p-about__sec05">
    <div class="l-container">
      <div class="p-about__sec05--box01">
        <div>
          <p class="c-text__intro01">
            Giá trị cốt lõi
          </p>
          <h2 class="c-title__02">
            <span class="c-title__02--first">
              Định hình tương lai
            </span>
            <span class="c-title__02--last">
              Chính trực & Đổi mới
            </span>
          </h2>
        </div>
        <div>
          <div class="c-arcodion__list">
            <div class="c-arcodion__item">
              <div class="c-arcodion__header">
                Đổi mới
              </div>
              <div class="c-arcodion__body">
                Chúng tôi đón nhận sự thay đổi và luôn đặt câu hỏi với những giới hạn hiện có, không ngừng tìm kiếm giải pháp sáng tạo để mang đến giá trị tiên tiến và giữ vững vị thế dẫn đầu.
              </div>
            </div>
            <div class="c-arcodion__item">
              <div class="c-arcodion__header">
                Bền vững
              </div>
              <div class="c-arcodion__body">
                Chúng tôi cam kết phát triển lâu dài, cân bằng giữa hiệu quả kinh tế, bảo vệ môi trường và lợi ích xã hội, đảm bảo sự phát triển hôm nay mang lại giá trị cho mai sau.
              </div>
            </div>
            <div class="c-arcodion__item">
              <div class="c-arcodion__header">
                Linh hoạt
              </div>
              <div class="c-arcodion__body">
                Chúng tôi duy trì khả năng thích ứng và phản ứng nhanh, giúp chủ động trước biến động thị trường và đáp ứng vượt mong đợi của khách hàng.
              </div>
            </div>
            <div class="c-arcodion__item">
              <div class="c-arcodion__header">
                Chính trực
              </div>
              <div class="c-arcodion__body">
                Chúng tôi tuân thủ các chuẩn mực đạo đức cao, minh bạch và trung thực trong mọi mối quan hệ và hoạt động kinh doanh.
              </div>
            </div>
            <div class="c-arcodion__item">
              <div class="c-arcodion__header">
                Đoàn kết
              </div>
              <div class="c-arcodion__body">
                Chúng tôi xây dựng văn hóa hợp tác và tôn trọng lẫn nhau, gắn kết các công ty thành viên như một tập thể thống nhất để đạt được thành công chung.
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php
  $section_latest = get_field('section_latest', 'option');
  if ($section_latest):
  ?>
    <section class="p-home__posts">
      <div class="l-container">
        <div class="p-home__posts--box01">
          <div>
            <p class="c-text__intro01">
              Các Công Ty Thành Viên Tiêu Biểu
            </p>
            <h2 class="c-title__02 type-03">
              <span class="c-title__02--first">
                Những Dấu Ấn Đáng Nhớ
              </span>
              <span class="c-title__02--last">
                Trong Hành Trình Phát Triển
              </span>
            </h2>
          </div>
          <?php if (isset($section_latest['latest_post']) && count($section_latest['latest_post']) > 3): ?>
            <div class="p-home__posts--box01--right">
              <div class="c-button js-js-about-history-button-prev">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-arrow-left.svg" alt="icon-arrow-left">
              </div>
              <div class="c-button js-js-about-history-button-next">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-arrow-right.svg" alt="icon-arrow-right">
              </div>
            </div>
          <?php endif; ?>
        </div>
      </div>
      <div class="l-container">
        <div class="swiper-posts">
          <div class="swiper-wrapper">

            <?php if ($section_latest['latest_post']) : ?>
              <?php foreach ($section_latest['latest_post'] as $latest) :
                $image = $latest['latest_post_thumbnail'];
                $title = $lang === "en" ? $latest['latest_post_title']['en'] : $latest['latest_post_title']['vn'];
                $textButton = $lang === "en" ? $latest['latest_post_text']['en'] : $latest['latest_post_text']['vn'];
                $link = $latest['latest_post_link'];
                $date = $latest['latest_post_date'];
              ?>
                <div class="swiper-slide">
                  <div class="p-home__posts--item">
                    <a href="<?php echo $link; ?>" target="_blank" class="thumbnail">
                      <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt'] ?: $image['title']); ?>">
                    </a>
                    <div class="contents mb-0">
                      <a href="<?php echo $link; ?>">
                        <h3 class=" title"><?php echo $title; ?></h3>
                      </a>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </section>
  <?php endif; ?>

  <section class="p-about__sec04">
    <div class="l-container">
      <div class="l-container">
        <div class="c-text__center">
          <p class="c-text__intro01">
            Thành Tựu
          </p>
          <h2 class="c-title__02 type-02">
            <span class="c-title__02--first">
              Hành Trình Phát Triển
            </span>
            <span class="c-title__02--last">
              Của Chúng Tôi
            </span>
          </h2>
        </div>
      </div>
      <div class="p-about__sec04--box01">
        <div class="item">
          <div>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-banknote.svg" alt="icon ">
          </div>
          <div>
            <div class="group">
              <div class="numbber">
                800
              </div>
              <div class="text">
                tỷ VNĐ
              </div>
            </div>
            <div class="desc">
              Doanh thu mỗi năm
            </div>
          </div>
        </div>
        <div class="item">
          <div>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-bill-check.svg" alt="icon ">
          </div>
          <div>
            <div class="group">
              <div class="numbber">
                1.000
              </div>
              <div class="text">
                tỷ VNĐ
              </div>
            </div>
            <div class="desc">
              Tổng vốn đầu tư
            </div>
          </div>
        </div>
        <div class="item">
          <div>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-buildings.svg" alt="icon ">
          </div>
          <div>
            <div class="group">
              <div class="numbber">
                15 công ty
              </div>
            </div>
            <div class="desc">
              Thành viên trong hệ sinh thái
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php get_template_part('template-parts/sections/contact'); ?>
</main>

<?php get_footer(); ?>
<script>
  jQuery(document).ready(function($) {

    var swiper = new Swiper(".js-about-history", {
      slidesPerView: 3.5,
      spaceBetween: 0,
      speed: 1000,
      freeMode: {
        enabled: true,
        momentum: true,
        snap: true
      },
      watchSlidesProgress: true,
      centeredSlides: true,
      grabCursor: true,
      navigation: {
        nextEl: '.js-about-history-button-next',
        prevEl: '.js-about-history-button-prev',
      },
      breakpoints: {
        320: {
          slidesPerView: 1,
          centeredSlides: false
        },
        768: {
          slidesPerView: 2.5,
          centeredSlides: true
        },
        1024: {
          slidesPerView: 3.5,
          centeredSlides: true
        },
        1550: {
          slidesPerView: 4.5,
          centeredSlides: true
        }
      },
      on: {
        init: function() {
          updateTimelineActive(0);
        },
        slideChange: function() {
          updateTimelineActive(this.realIndex);
        }
      }
    });

    function updateTimelineActive(index) {
      $('.p-about__sec03--timelines-list .item').removeClass('active');
      var targetSlide = '.slide-' + (index + 1);
      $(targetSlide).addClass('active');
    }

    var navSlides = document.querySelectorAll('.slide-1, .slide-2, .slide-3, .slide-4, .slide-5, .slide-6, .slide-7, .slide-8');

    navSlides.forEach(function(nav, index) {
      nav.addEventListener('click', function(e) {
        e.preventDefault();
        swiper.slideTo(index, 500);
      });
    });

    function updateTitleWidths() {
      var titlefirstWidth = $('.js-box-title-first-text').outerWidth();
      $('.js-box-title-first').css('--title-width-first', titlefirstWidth + 'px');
      var titleWidth = $('.js-box-title-last-text').outerWidth();
      $('.js-box-title-last').css('--title-width-last', titleWidth + 'px');
    }
    updateTitleWidths();

    var resizeTimer;
    $(window).on('resize', function() {
      clearTimeout(resizeTimer);
      resizeTimer = setTimeout(function() {
        swiper.update();
        updateTitleWidths();
      }, 250);
    });

    $('.c-arcodion__item:first-child').addClass('active');
    $('.c-arcodion__item:first-child .c-arcodion__header').addClass('active');
    $('.c-arcodion__item:first-child .c-arcodion__body').show();
    $(document).on('click', '.c-arcodion__header', function(e) {
      e.preventDefault();
      var $header = $(this);
      var $item = $header.closest('.c-arcodion__item');
      var $body = $item.find('.c-arcodion__body');
      var isActive = $item.hasClass('active');
      if (isActive) {
        $item.removeClass('active');
        $header.removeClass('active');
        $body.slideUp(300);
      } else {
        $('.c-arcodion__item').removeClass('active');
        $('.c-arcodion__header').removeClass('active');
        $('.c-arcodion__body').slideUp(300);
        $item.addClass('active');
        $header.addClass('active');
        $body.slideDown(300);
      }
    });
  });
</script>