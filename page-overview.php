<?php
/*
Template Name: Overview
Description: English Overview page with journey, core values, etc.
*/
?>
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
          Our Journey
        </p>
        <h2 class="c-title__02">
          <span class="c-title__02--first">
            Over 25 Years of
          </span>
          <span class="c-title__02--last">
            Growth & Innovation
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
                    Began Chevrolet retail business under Hoa Binh Company.
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
                  <p class="year">1994</p>
                  <p class="desc">
                    Began Chevrolet retail business under Hoa Binh Company.
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
                  <p class="year">1995</p>
                  <p class="desc">
                    Began Chevrolet retail business under Hoa Binh Company.
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
                    Began Chevrolet retail business under Hoa Binh Company.
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
                  <p class="year">1997</p>
                  <p class="desc">
                    Began Chevrolet retail business under Hoa Binh Company.
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
                  <p class="year">1998</p>
                  <p class="desc">
                    Began Chevrolet retail business under Hoa Binh Company.
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
                  <p class="year">1999</p>
                  <p class="desc">
                    Began Chevrolet retail business under Hoa Binh Company.
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
                  <p class="year">2000</p>
                  <p class="desc">
                    Began Chevrolet retail business under Hoa Binh Company.
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
        Timeline
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
            Our Values
          </p>
          <h2 class="c-title__02">
            <span class="c-title__02--first">
              Shaping the Future
            </span>
            <span class="c-title__02--last">
              with Integrity & Innovation
            </span>
          </h2>
        </div>
        <div>
          <div class="c-arcodion__list">
            <div class="c-arcodion__item">
              <div class="c-arcodion__header">
                Innovation
              </div>
              <div class="c-arcodion__body">
                We embrace change and challenge the status quo, constantly seeking inventive ways to deliver future-forward solutions and maintain market leadership.
              </div>
            </div>
            <div class="c-arcodion__item">
              <div class="c-arcodion__header">
                Sustainable
              </div>
              <div class="c-arcodion__body">
                We are committed to long-term economic viability, environmental stewardship, and social well-being, ensuring our growth benefits future generations.
              </div>
            </div>
            <div class="c-arcodion__item">
              <div class="c-arcodion__header">
                Agility
              </div>
              <div class="c-arcodion__body">
                We maintain flexibility and responsiveness, allowing us to adapt quickly and effectively to dynamic market conditions and exceed client expectations.
              </div>
            </div>
            <div class="c-arcodion__item">
              <div class="c-arcodion__header">
                Integrity
              </div>
              <div class="c-arcodion__body">
                We operate with unwavering ethical standards, transparency, and honesty in all our relationships and business dealings.
              </div>
            </div>
            <div class="c-arcodion__item">
              <div class="c-arcodion__header">
                Unity
              </div>
              <div class="c-arcodion__body">
                We foster a culture of collaboration and mutual respect, working as one cohesive force across all member companies to achieve collective success.
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
              Subsidaries' Highlights
            </p>
            <h2 class="c-title__02 type-03">
              <span class="c-title__02--first">
                Remarkable Moments
              </span>
              <span class="c-title__02--last">
                from Our Subsidiaries
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
            Our Achievements
          </p>
          <h2 class="c-title__02 type-02">
            <span class="c-title__02--first">
              What we’ve got
            </span>
            <span class="c-title__02--last">
              since founded
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
                billion
              </div>
            </div>
            <div class="desc">
              Annual revenue
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
                1000
              </div>
              <div class="text">
                billion
              </div>
            </div>
            <div class="desc">
              Total investment capital
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
                15
              </div>
            </div>
            <div class="desc">
              Number of subsidiaries
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