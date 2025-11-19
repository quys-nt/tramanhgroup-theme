<?php
/*
Template Name: Overview
Description: English Overview page with journey, core values, etc.
*/
?>
<?php get_header(); ?>
<?php $section_1 = get_field('section_1'); ?>

<main>
  <?php if ($section_1): ?>
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
  <?php endif; ?>

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

  <?php
  $section_3 = get_field('section_3');
  $sec3Intro = $section_3['intro'];
  $sec3TitleFirst = $section_3['title_first'];
  $sec3TitleLast = $section_3['title_last'];
  $sec3item = $section_3['item'];
  if ($section_3) {
  ?>
    <section class="p-about__sec03">
      <div class="l-container">
        <div class="c-text__center">
          <p class="c-text__intro01">
            <?php echo $sec3Intro; ?>
          </p>
          <h2 class="c-title__02">
            <span class="c-title__02--first">
              <?php echo $sec3TitleFirst; ?>
            </span>
            <span class="c-title__02--last">
              <?php echo $sec3TitleLast; ?>
            </span>
          </h2>
        </div>
      </div>

      <div class="p-about__sec03--inner">
        <div class="p-about__sec03--box01">
          <div thumbsSlider="" class="swiper js-about-history">
            <div class="swiper-wrapper">
              <?php foreach ($sec3item as $item): ?>
                <?php
                $year = $item["year"];
                $desc = $item["desc"];
                $logo = $item["logo"];
                ?>
                <div class="swiper-slide">
                  <div class="swiper-item">
                    <div class="logos">
                      <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($item['logo']['alt']); ?>">
                    </div>
                    <div class=" box01">
                      <p class="year">
                        <?php echo $year; ?>
                      </p>
                      <p class="desc">
                        <?php echo $desc; ?>
                      </p>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
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
          <?php foreach ($sec3item as $key => $item): ?>
            <?php
            $year = $item["year"];
            ?>
            <div class="item slide-<?php echo $key + 1; ?>">
              <?php echo $year; ?>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
  <?php } ?>

  <?php
  $section_4 = get_field('section_4');
  $sec4Intro = $section_4['intro'];
  $sec4TitleFirst = $section_4['title_first'];
  $sec4TitleLast = $section_4['title_last'];
  $sec4item = $section_4['item'];
  if ($section_4) {
  ?>
    <section class="p-about__sec05">
      <div class="l-container">
        <div class="p-about__sec05--box01">
          <div>
            <p class="c-text__intro01">
              <?php echo $sec4Intro; ?>
            </p>
            <h2 class="c-title__02">
              <span class="c-title__02--first">
                <?php echo $sec4TitleFirst; ?>
              </span>
              <span class="c-title__02--last">
                <?php echo $sec4TitleLast; ?>
              </span>
            </h2>
          </div>
          <div>
            <div class="c-arcodion__list">
              <?php foreach ($sec4item as $item): ?>
                <div class="c-arcodion__item">
                  <div class="c-arcodion__header">
                    <?php echo $item['title']; ?>
                  </div>
                  <div class="c-arcodion__body">
                    <?php echo $item['desc']; ?>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php } ?>

  <?php
  $section_5 = get_field('section_5');
  $sec5Intro = $section_5['intro'];
  $sec5TitleFirst = $section_5['title_first'];
  $sec5TitleLast = $section_5['title_last'];
  $sec5item = $section_5['item'];
  if (function_exists('qhp_get_highlight_posts_by_category')) {
    $highlight_posts = qhp_get_highlight_posts_by_category($current_category->term_id, 8);
  } else {
    // Fallback nếu plugin chưa active
    $highlight_posts = new WP_Query(array('post_count' => 0)); // Query rỗng
  }
  if ($section_5) {
  ?>
    <section class="p-home__posts">
      <div class="l-container">
        <div class="p-home__posts--box01">
          <div>
            <p class="c-text__intro01">
              <?php echo $sec5Intro; ?>
            </p>
            <h2 class="c-title__02 type-03">
              <span class="c-title__02--first">
                <?php echo $sec5TitleFirst; ?>
              </span>
              <span class="c-title__02--last">
                <?php echo $sec5TitleLast; ?>
              </span>
            </h2>
          </div>
          <?php if ($highlight_posts->found_posts > 3): ?>
            <div class="p-home__posts--box01--right">
              <div class="c-button js-swiper-button-next">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-arrow-left.svg" alt="icon-arrow-left">
              </div>
              <div class="c-button js-swiper-button-prev">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-arrow-right.svg" alt="icon-arrow-right">
              </div>
            </div>
          <?php endif; ?>
        </div>
      </div>
      <?php if ($highlight_posts->have_posts()): ?>
        <div class="l-container">
          <div class="swiper-posts">
            <div class="swiper-wrapper">
              <?php while ($highlight_posts->have_posts()): $highlight_posts->the_post(); ?>
                <div class="swiper-slide">
                  <?php get_template_part('template-parts/content-02'); ?>
                </div>
              <?php endwhile; ?>
              <?php wp_reset_postdata(); // Reset query sau loop 
              ?>
            </div>
          </div>
        </div>
      <?php endif; ?>
    </section>
  <?php } ?>

  <?php
  $section_6 = get_field('section_6');
  $sec6Intro = $section_6['intro'];
  $sec6TitleFirst = $section_6['title_first'];
  $sec6TitleLast = $section_6['title_last'];
  $sec6item = $section_6['item'];
  if ($section_6) {
  ?>
    <section class="p-about__sec04">
      <div class="l-container">
        <div class="c-text__center">
          <p class="c-text__intro01">
            <?php echo $sec6Intro; ?>
          </p>
          <h2 class="c-title__02 type-02">
            <span class="c-title__02--first">
              <?php echo $sec6TitleFirst; ?>
            </span>
            <span class="c-title__02--last">
              <?php echo $sec6TitleLast; ?>
            </span>
          </h2>
        </div>
        <?php if ($sec6item) : ?>
          <div class="p-about__sec04--box01">
            <?php foreach ($sec6item as $item) :
              $icon = $item['icon'];
              $number = $item['number'];
              $title = $item['title'];
              $desc = $item['desc'];
            ?>
              <div class="item">
                <div>
                  <img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt'] ?: $image['title']); ?>">
                </div>
                <div>
                  <div class="group">
                    <div class="number js-count-number">
                      <?php echo $number; ?>
                    </div>
                    <?php if ($title): ?>
                      <div class="text">
                        <?php echo $title; ?>
                      </div>
                    <?php endif; ?>
                  </div>
                  <div class="desc">
                    <?php echo $desc; ?>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>
    </section>
  <?php } ?>

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