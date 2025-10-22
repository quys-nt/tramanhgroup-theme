<?php
/*
Template Name: Portfolio
Description: English Portfolio page with journey, core values, etc.
*/
?>
<?php get_header(); ?>
<main>
  <?php
  $section_1 = get_field('section_1');
  $box01TitleFirst = $section_1['title_first'];
  $box01TitleLast = $section_1['title_last'];
  $box01TextScroll = $section_1['text_scroll'];
  if ($section_1) {
  ?>
    <section class="p-portfolio__sec01">
      <div class="l-container">
        <h1 class="title">
          <p class="title-first">
            <?php esc_html_e($box01TitleFirst); ?>
          </p>
          <p class="title-last">
            <?php esc_html_e($box01TitleLast); ?>
          </p>
        </h1>
        <div class="p-portfolio__sec01--box01">
          <div>
            <div class="text01">
              <?php echo wp_kses_post(the_content()); ?>
            </div>
          </div>
          <div>
            <div class="group01">
              <p class="icon"></p>
              <p class="text02">
                <?php esc_html_e($box01TextScroll); ?>
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php } ?>
  <?php
  $listLogo = get_field('list_logos');
  if ($listLogo) {
  ?>
    <div class="p-portfolio__sec02">
      <div class="p-portfolio__sec02--inner">
        <div class="p-portfolio__sec02--list">
          <?php foreach ($listLogo as $item): ?>
            <div class="item-logo">
              <img src="<?php echo esc_url($item['logo']['url']); ?>" alt="<?php esc_attr_e($item['logo']['alt']); ?>">
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  <?php } ?>

</main>
<?php get_footer(); ?>