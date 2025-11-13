<?php
/*
Template Name: Automotive & Mobility Relations
Description: English Automotive & Mobility Relations page with journey, core values, etc.
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
                    <p><?php echo esc_html_e(get_sub_field('title_first')) ?></p>
                    <p><?php echo esc_html_e(get_sub_field('title_last')) ?></p>
                  </h1>
                  <div class="p-home__mv--text01">
                    <?php echo wp_kses_post(get_sub_field('mv_description')) ?>
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
  $sec1Desc = $sec_1['desc'];
  $sec1Items = $sec_1['items'];
  if ($sec_1): ?>
    <section class="p-audio__sec01">
      <div class="l-container">
        <div class="p-audio__sec01--box01">
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
              <?php echo esc_html($sec1Desc); ?>
            </div>
          </div>
        </div>
        <?php
        $list_count = count($sec1Items);
        if ($list_count > 0):
        ?>
          <div class="p-audio__sec01--box02">
            <?php foreach ($sec1Items as $item) : ?>

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
  get_template_part('template-parts/sections/contact-map');
  ?>

</main>
<?php get_footer(); ?>