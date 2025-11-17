<?php
/*
Template Name: Retail & Luxury
Description: English Retail & Luxury page with journey, core values, etc.
*/
?>
<?php get_header(); ?>
<main class="p-retail">

  <?php if (have_rows('main_visual', '')) : ?>
    <section class="p-home__mv">
      <div class="js-swiper-mv">
        <div class="swiper-wrapper">
          <?php while (have_rows('main_visual', '')) : the_row(); ?>
            <?php $image = get_sub_field('mv_image'); ?>
            <?php $imageSP = get_sub_field('mv_image_sp'); ?>
            <div class="swiper-slide">
              <div class="p-home__mv--item">
                <picture>
                  
                  <source media="(min-width: 768px)" srcset="<?php echo esc_url($image['url']); ?>">
                  <img src="<?php echo esc_url($imageSP['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="p-home__mv--thumbnail type-02">
                </picture>
                <div class="p-home__mv--contents type-02">
                  <h1 class="p-home__mv--title">
                    <p><?php echo nl2br(esc_html(get_sub_field('title_first'))); ?></p>
                    <p class="type-02"><?php echo nl2br(esc_html(get_sub_field('title_last'))); ?></p>
                  </h1>
                  <div class="p-home__mv--text01">
                    <?php echo wp_kses_post(get_sub_field('mv_description')); ?>
                  </div>
                </div>
              </div>
            </div>
          <?php endwhile; ?>
        </div>
        <div class="swiper-pagination"></div>
      </div>
    </section>
  <?php endif; ?>

  <?php
  $sec_2 = get_field('sec_2');
  $sec2Image = $sec_2['image'];
  $sec2Intro = $sec_2['intro'];
  $sec2TitleFirst = $sec_2['title_first'];
  $sec2TitleLast = $sec_2['title_last'];
  $sec2Desc1 = $sec_2['desc_1'];
  $sec2Desc2 = $sec_2['desc_2'];
  $sec2Btn = $sec_2['button'];
  if ($sec_2): ?>
    <section class="p-business__sec06">
      <div class="l-container">
        <div class="p-business__sec06--grid type-03">
          <?php if ($sec2Image): ?>
            <div>
              <div>
                <img src="<?php echo esc_attr($sec2Image['url']); ?>" alt="<?php echo esc_attr($sec2Image['alts']); ?>">
              </div>
            </div>
          <?php endif; ?>
          <div class="p-business__sec06--grid-last">
            <div>
              <p class="c-text__intro01">
                <?php echo esc_html($sec2Intro); ?>
              </p>
              <h2 class="c-title__02">
                <span class="c-title__02--last">
                  <?php echo esc_html($sec2TitleFirst); ?>
                </span>
                <span class="c-title__02--first">
                  <?php echo esc_html($sec2TitleLast); ?>
                </span>
              </h2>
            </div>
            <p class="c-text03">
              <?php echo nl2br(esc_html($sec2Desc1)); ?>
            </p>
            <div class="p-business__sec06--group01">
              <div>
                <p class="c-text04">
                  <?php echo nl2br(esc_html($sec2Desc2)); ?>
                </p>
              </div>
              <div class="c-text__right pc">
                <a href="<?php echo esc_attr($sec2Btn['link']); ?>" class="c-btn__06 type-02">
                  <?php echo esc_html($sec2Btn['text']); ?>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php endif; ?>

  <?php
  $sec_gallery = get_field('sec_gallery');
  if ($sec_gallery): ?>
    <section class="p-business__gallery01">
      <div class="p-business__gallery01--container">
        <div class="swiper-business-gallery">
          <div class="swiper-wrapper">
            <?php foreach ($sec_gallery as $item) : ?>
              <div class="swiper-slide" lazy="true">
                <img src="<?php echo esc_attr($item['url']); ?>" alt="<?php echo esc_attr($item['alt']); ?>" loading="lazy">
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </section>
  <?php endif; ?>

  <?php
  $sec_5 = get_field('sec_5');
  $sec5Intro = $sec_5['intro'];
  $sec5TitleFirst = $sec_5['title_first'];
  $sec5TitleLast = $sec_5['title_last'];
  $sec5Desc = $sec_5['desc'];
  $sec5Items = $sec_5['items'];
  if ($sec_5): ?>
    <section class="p-business__sec07">
      <div class="l-container">
        <div class="c-text__center">
          <p class="c-text__intro01">
            <?php echo esc_html($sec5Intro); ?>
          </p>
          <h2 class="c-title__02 type-02">
            <span class="c-title__02--first">
              <?php echo esc_html($sec5TitleFirst); ?>
            </span>
            <span class="c-title__02--last">
              <?php echo esc_html($sec5TitleLast); ?>
            </span>
          </h2>
          <div class="p-business__sec07--box01--desc type-02">
            <p class="c-text02">
              <?php echo nl2br(esc_html($sec5Desc)); ?>
            </p>
          </div>
        </div>
        <?php
        $list_sec3count = count($sec5Items);
        if ($list_sec3count):
        ?>
          <div class="p-business__sec07--grid02">
            <?php foreach ($sec5Items as $item): ?>
              <div class="item type-02">
                <div class="title">
                  <?php echo esc_html($item['title']) ?>
                </div>
                <div class="c-text05">
                  <?php echo esc_html($item['content']) ?>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>
    </section>
  <?php endif; ?>

  <?php
  $youtube_section = get_field('youtube_section');

  if ($youtube_section):
    get_template_part('template-parts/sections/youtube-player', null, array(
      'youtube_url' => $youtube_section['youtube_url'],
      'image' => $youtube_section['image'],
      'video_title' => $youtube_section['video_title'] ?: 'YouTube video',
      'section_class' => 'p-audio__sec05'
    ));
  endif;

  get_template_part('template-parts/sections/contact');
  ?>
</main>
<?php get_footer(); ?>

<script>
  const swiper = new Swiper('.swiper-business-gallery', {
    slidesPerView: 1.5,
    spaceBetween: 20,
    breakpoints: {
      640: {
        slidesPerView: 2.5,
      },
      1024: {
        slidesPerView: 3.4,
        spaceBetween: 40,
      },
    },
  });
</script>