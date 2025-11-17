<?php
/*
Template Name: Leadership & Vision
Description: English Leadership & Vision page with journey, core values, etc.
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
                <div class="p-home__mv--contents">
                  <h1 class="p-home__mv--title">
                    <p><?php echo esc_html_e(get_sub_field('title_first')) ?></p>
                    <p><?php echo esc_html_e(get_sub_field('title_last')) ?></p>
                  </h1>
                  <div class="p-home__mv--text01">
                    <?php echo wp_kses_post(get_sub_field('mv_description')) ?>
                  </div>
                  <div>
                    <a href=" <?php echo esc_html_e(get_sub_field('link_button')) ?> " class="c-btn__01 download" download>
                      <?php echo esc_html_e(get_sub_field('text_button')) ?>
                    </a>
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
  $section_1 = get_field('section_1');
  $sec1Staff = $section_1['staff'];
  $sec1Intro = $section_1['intro'];
  $sec1TitleFirst = $section_1['title_first'];
  $sec1TitleLast = $section_1['title_last'];
  $sec1Desc1 = $section_1['desc_1'];
  $sec1Desc2 = $section_1['desc_2'];
  if ($section_1) {
  ?>
    <section class="p-vison__sec01">
      <div class="l-container">
        <div class="p-vison__sec01--box01">
          <div>
            <div class="users">
              <div class="users-avatar">
              <img src="<?php echo esc_url($sec1Staff['avatar']['url']);?>" alt="<?php esc_attr_e($sec1Staff['avatar']['alt'])?>">  
              </div>
              <div class="users-body">
                <p class="text01">
                  <span><?php esc_html_e($sec1Staff['gender']) ?></span> <?php esc_html_e($sec1Staff['full_name']) ?>
                </p>
                <p class="text02">
                  <?php esc_html_e($sec1Staff['location']) ?>
                </p>
              </div>
            </div>
          </div>
          <div>
            <div>
              <p class="c-text__intro01">
                <?php esc_html_e($sec1Intro) ?>
              </p>
              <h2 class="c-title__02 type-03">
                <span class="c-title__02--last">
                  <?php esc_html_e($sec1TitleFirst) ?>
                </span>
                <span class="c-title__02--first">
                  <?php esc_html_e($sec1TitleLast) ?>
                </span>
              </h2>
            </div>
            <div class="quotes">
              <div class="quotes-group01">
                <div class="quotes-text01">
                  <span>“</span>
                </div>
                <div class="quotes-text02">
                  <?php echo wp_kses_post($sec1Desc1) ?>
                </div>
              </div>
              <div class="quotes-text03">
                <?php echo wp_kses_post($sec1Desc2) ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php } ?>

  <?php
  $section_2 = get_field('section_2');
  $sec2Intro = $section_2['intro'];
  $sec2TitleFirst = $section_2['title_first'];
  $sec2TitleLast = $section_2['title_last'];
  $sec2Desc1 = $section_2['desc_1'];
  $sec2Desc2 = $section_2['desc_2'];
  $sec2Item1 = $section_2['item_1'];
  $sec2Items = $section_2['items'];
  if ($section_2) {
  ?>
    <section class="p-vison__sec02">
      <div class="l-container">
        <div class="p-vison__sec02--box01">
          <div class="p-vison__sec02--item">
            <p class="c-text__intro01">
              <?php esc_html_e($sec2Intro) ?>
            </p>
            <h2 class="c-title__02 type-03">
              <span class="c-title__02--last">
                <?php esc_html_e($sec2TitleFirst) ?>
              </span>
              <span class="c-title__02--first">
                <?php esc_html_e($sec2TitleLast) ?>
              </span>
            </h2>
          </div>
          <div class="p-vison__sec02--item">
            <div class="text01">
              <?php echo wp_kses_post($sec2Desc1) ?>
            </div>
            <div class="text02">
              <?php echo wp_kses_post($sec2Desc2) ?>
            </div>
          </div>
        </div>
        <div class="p-vison__sec02--box02">

          <div class="vison-item">
            <span class="vison-title01">
              <?php esc_html_e($sec2Item1['text_1']); ?>
            </span>
            <span class="vison-title02">
              <?php esc_html_e($sec2Item1['text_2']); ?>
            </span>
            <span class="vison-title03">
              <?php esc_html_e($sec2Item1['text_3']); ?>
            </span>
          </div>
          <?php foreach ($sec2Items as $item) : ?>
            <div class="vison-item">
              <div class="vison-text01">
                <?php esc_html_e($item['intro']) ?>
              </div>
              <div class="vison-text02">
                <?php esc_html_e($item['title']) ?>
              </div>
              <div class="vison-text03">
                <?php esc_html_e($item['desc']) ?>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
  <?php } ?>

  <?php
  $section_3 = get_field('section_3');
  $sec3Intro = $section_3['intro'];
  $sec3TitleFirst = $section_3['title_first'];
  $sec3TitleLast = $section_3['title_last'];
  $sec3Items = $section_3['items'];
  if ($section_3) {
  ?>
    <section class="p-vison__sec03">
      <div class="l-container">
        <div class="c-text__center">
          <p class="c-text__intro01">
            <?php esc_html_e($sec3Intro) ?>
          </p>
          <h2 class="c-title__02 type-02">
            <span class="c-title__02--first">
              <?php esc_html_e($sec3TitleFirst) ?>
            </span>
            <span class="c-title__02--last">
              <?php esc_html_e($sec3TitleLast) ?>
            </span>
          </h2>
        </div>
        <?php if ($sec3Items): ?>
          <div class="p-vison__sec03--box01">
            <?php foreach ($sec3Items as $item): ?>
              <div class="leader-item">
                <div class="leader-avatar">
                  <img src="<?php echo esc_url($item['avatar']['url']) ?>" alt="<?php esc_attr_e($item['avatar']['alt']) ?>">
                </div>
                <div class="leader-contents">
                  <div class="leader-text01">
                    <?php esc_html_e($item['full_name']) ?>
                  </div>
                  <div class="leader-text02">
                    <?php esc_html_e($item['location']) ?>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>
    </section>
  <?php } ?>
</main>
<?php get_footer(); ?>