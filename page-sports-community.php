<?php
/*
Template Name: Sports & Community Relations
Description: English Sports & Community Relations page with journey, core values, etc.
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
  $sec1Image = $sec_1['image'];
  $sec1Intro = $sec_1['intro'];
  $sec1TitleFirst = $sec_1['title_first'];
  $sec1TitleLast = $sec_1['title_last'];
  $sec1Desc1 = $sec_1['desc_1'];
  $sec1Desc2 = $sec_1['desc_2'];
  if ($sec_1): ?>
    <section class="p-business__sec06">
      <div class="l-container">
        <div class="p-business__sec06--grid">
          <?php if ($sec1Image): ?>
            <div class="p-business__sec06--grid-first">
              <div>
                <img src="<?php echo esc_attr($sec1Image['url']); ?>" alt="<?php echo esc_attr($sec1Image['alts']); ?>">
              </div>
            </div>
          <?php endif; ?>
          <div class="p-business__sec06--grid-last">
            <div>
              <p class="c-text__intro01">
                <?php echo esc_html($sec1Intro); ?>
              </p>
              <h2 class="c-title__02">
                <span class="c-title__02--last">
                  <?php echo esc_html($sec1TitleFirst); ?>
                </span>
                <span class="c-title__02--first">
                  <?php echo esc_html($sec1TitleLast); ?>
                </span>
              </h2>
            </div>
            <p class="c-text01">
              <?php echo nl2br(esc_html($sec1Desc1)); ?>
            </p>
            <p class="c-text04">
              <?php echo nl2br(esc_html($sec1Desc2)); ?>
            </p>
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
    <section class="p-business__sec01 type-03">
      <div class="l-container">
        <div class="p-business__sec01--box03">
          <p class="c-text__intro01">
            <?php echo esc_html($sec2Intro); ?>
          </p>
          <h2 class="c-title__02">
            <span class="c-title__02--first">
              <?php echo esc_html($sec2TitleFirst); ?>
            </span>
            <span class="c-title__02--last">
              <?php echo esc_html($sec2TitleLast); ?>
            </span>
          </h2>
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
  $sec3Intro = $sec_3['intro'];
  $sec3TitleFirst = $sec_3['title_first'];
  $sec3TitleLast = $sec_3['title_last'];
  $sec3Desc = $sec_3['desc'];
  $sec3Items = $sec_3['items'];
  if ($sec_3): ?>
    <section class="p-business__sec07">
      <div class="l-container">
        <div class="c-text__center">
          <p class="c-text__intro01">
            <?php echo esc_html($sec3Intro); ?>
          </p>
          <h2 class="c-title__02 type-02">
            <span class="c-title__02--first">
              <?php echo esc_html($sec3TitleFirst); ?>
            </span>
            <span class="c-title__02--last">
              <?php echo esc_html($sec3TitleLast); ?>
            </span>
          </h2>
          <div class="p-business__sec07--box01--desc">
            <p class="c-text02">
              <?php echo nl2br(esc_html($sec3Desc)); ?>
            </p>
          </div>
        </div>
        <?php
        $list_sec3count = count($sec3Items);
        if ($list_sec3count):
        ?>
          <div class="p-about__sec04--box01">
            <?php foreach ($sec3Items as $item): ?>
              <div class="item">
                <div>
                  <img src="<?php echo esc_attr($item['image']['url']); ?>" alt="<?php echo esc_attr($item['image']['url']); ?>">
                </div>
                <div>
                  <div class="group">
                    <div class="number js-count-number">
                      <?php echo esc_html($item['title']) ?>
                    </div>
                    <div class="text">
                      <?php echo esc_html($item['intro']) ?>
                    </div>
                  </div>
                  <div class="desc">
                    <?php echo esc_html($item['contents']) ?>
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