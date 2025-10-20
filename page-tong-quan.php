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
              <div class="c-button js-swiper-button-prev">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-arrow-left.svg" alt="icon-arrow-left">
              </div>
              <div class="c-button js-swiper-button-next">
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

<?php get_template_part( 'template-parts/sections/contact' ); ?>

</main>

<?php get_footer(); ?>
<script>
  jQuery(document).ready(function($) {
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
      resizeTimer = setTimeout(updateTitleWidths, 250);
    });
  });
</script>