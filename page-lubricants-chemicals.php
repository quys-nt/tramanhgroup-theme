<?php
/*
Template Name: Lubricants & Chemicals Relations
Description: English Lubricants & Chemicals Relations page with journey, core values, etc.
*/
?>
<?php get_header(); ?>
<main>

  <?php if (have_rows('main_visual', '')) : ?>
    <section class="p-home__mv">
      <div class="js-swiper-mv">
        <div class="swiper-wrapper">
          <?php while (have_rows('main_visual', '')) : the_row(); ?>
            <?php $image = get_sub_field('mv_image'); ?>
            <div class="swiper-slide">
              <div class="p-home__mv--item">
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="p-home__mv--thumbnail">
                <div class="p-home__mv--contents type-02">
                  <h1 class="p-home__mv--title">
                    <p><?php echo esc_html_e(get_sub_field('title_first')); ?></p>
                    <p><?php echo esc_html_e(get_sub_field('title_last')); ?></p>
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
  $sec_1 = get_field('sec_1');
  $sec1Intro = $sec_1['intro'];
  $sec1TitleFirst = $sec_1['title_first'];
  $sec1TitleLast = $sec_1['title_last'];
  $sec1Desc1 = $sec_1['desc_1'];
  $sec1Desc2 = $sec_1['desc_2'];
  $sec1Image = $sec_1['image'];
  if ($sec_1): ?>
    <section class="p-business__sec01 type-02">
      <div class="l-container">
        <div class="p-business__sec01--box01 type-02">
          <div>
            <p class="c-text__intro01">
              <?php echo esc_html($sec1Intro); ?>
            </p>
            <h2 class="c-title__02 type-03">
              <span class="c-title__02--first">
                <?php echo esc_html($sec1TitleFirst); ?>
              </span>
              <span class="c-title__02--last">
                <?php echo esc_html($sec1TitleLast); ?>
              </span>
            </h2>
          </div>
          <div>
            <div class="c-text02">
              <?php echo esc_html($sec1Desc1); ?>
            </div>
          </div>
        </div>
        <div class="p-business__sec01--box01 type-03">
          <div>
            <div class="c-text02">
              <?php echo esc_html($sec1Desc2); ?>
            </div>
          </div>
          <div>
            <img src="<?php echo esc_attr($sec1Image['url']); ?>" alt="<?php echo esc_attr($sec1Image['alt']); ?>">
          </div>
        </div>
      </div>
    </section>
  <?php endif; ?>

  <?php
  $sec_2 = get_field('sec_2');
  $sec2Intro = $sec_2['intro'];
  $sec2TitleFirst = $sec_2['title_first'];
  $sec2TitleLast = $sec_2['title_last'];
  $sec2Desc = $sec_2['desc'];
  $sec2Items = $sec_2['items'];
  if ($sec_2): ?>
    <section class="p-business__sec01">
      <div class="l-container">
        <div class="p-business__sec01--box01">
          <div>
            <p class="c-text__intro01">
              <?php echo esc_html($sec2Intro); ?>
            </p>
            <h2 class="c-title__02 type-03">
              <span class="c-title__02--first">
                <?php echo esc_html($sec2TitleFirst); ?>
              </span>
              <span class="c-title__02--last">
                <?php echo esc_html($sec2TitleLast); ?>
              </span>
            </h2>
          </div>
          <div>
            <div class="c-text02">
              <?php echo esc_html($sec2Desc); ?>
            </div>
          </div>
        </div>
        <?php
        $list_count = count($sec2Items);
        if ($list_count > 0):
        ?>
          <div class="p-business__sec01--box02">
            <?php foreach ($sec2Items as $item) : ?>

              <div class="sec01__card"
                style="background-image:linear-gradient(180deg, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.5) 100%), url('<?php echo esc_url($item['image'] ? $item['image']['url'] : ''); ?>');">
                <div class="sec01__title">
                  <?php echo nl2br(esc_html($item['title'])); ?>
                </div>
                <div class="sec01__contents">
                  <?php echo nl2br(esc_html($item['contents'])); ?>
                </div>
              </div>

            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>
    </section>
  <?php endif; ?>

  <?php
  $sec_3 = get_field('sec_3');
  if ($sec_3): ?>
    <section class="p-business__gallery01">
      <div class="p-business__gallery01--container">
        <div class="swiper-business-gallery">
          <div class="swiper-wrapper">
            <?php foreach ($sec_3 as $item) : ?>
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
  $sec_4 = get_field('sec_4');
  $sec4Intro = $sec_4['intro'];
  $sec4TitleFirst = $sec_4['title_first'];
  $sec4TitleLast = $sec_4['title_last'];
  $sec4Desc = $sec_4['desc'];
  $sec4IOS = $sec_4['ios'];
  $sec4Items = $sec_4['items'];
  if ($sec_4): ?>
    <section class="p-business__sec05">
      <div class="l-container">
        <div class="c-text__center">
          <p class="c-text__intro01">
            <?php echo esc_html($sec4Intro); ?>
          </p>
          <h2 class="c-title__02 type-02">
            <span class="c-title__02--first">
              <?php echo esc_html($sec4TitleFirst); ?>
            </span>
            <span class="c-title__02--last">
              <?php echo esc_html($sec4TitleLast); ?>
            </span>
          </h2>
          <div class="p-business__sec05--text01">
            <div class="c-text02">
              <?php echo esc_html($sec4Desc); ?>
            </div>
          </div>
        </div>

        <?php
        $listSec04_count_ios = count($sec4IOS);
        if ($listSec04_count_ios > 0):
        ?>
          <div class="p-business__sec09--grid">
            <?php foreach ($sec4IOS as $item) : ?>
              <div class="card-item">
                <div class="card-item-title">
                  <?php echo nl2br(esc_html($item['title'])); ?>
                </div>
                <div class="card-item-content">
                  <?php echo nl2br(esc_html($item['text'])); ?>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>

        <?php
        $listSec04_count = count($sec4Items);
        if ($listSec04_count > 0):
        ?>
          <div class="p-business__sec05--grid">
            <?php foreach ($sec4Items as $item) : ?>

              <div class="sec05__card">
                <div class="sec05__card--header">
                  <?php echo esc_html($item['title']); ?>
                </div>
                <div class="sec05__card--body">
                  <?php if ($item['contents']['title']): ?>
                    <div class="sec05__card--title">
                      <?php echo esc_html($item['contents']['title']); ?>
                    </div>
                  <?php endif; ?>
                  <?php if ($item['contents']['image']): ?>
                    <div class="sec05__card--img">
                      <img src="<?php echo esc_attr($item['contents']['image']['url']); ?>" alt="<?php echo esc_attr($item['contents']['image']['alt']); ?>">
                    </div>
                  <?php endif; ?>
                  <div class="sec05__card--content">
                    <?php echo esc_html($item['contents']['content']); ?>
                  </div>
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