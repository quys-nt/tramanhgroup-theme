<?php get_header(); ?>
<?php $lang = get_current_lang(); ?>
<main>
  <section class="p-home__mv">
    <div class="js-swiper-mv">
      <div class="swiper-wrapper">
        <?php if (have_rows('main_visual', 'option')) : ?>
          <?php while (have_rows('main_visual', 'option')) : the_row(); ?>
            <?php $image = get_sub_field('mv_image'); ?>
            <div class="swiper-slide">
              <div class="p-home__mv--item">
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt'] ?: $image['title'] ?: 'Banner image'); ?>" class="p-home__mv--thumbnail" loading="lazy">
                <div class="p-home__mv--contents">
                  <h1 class="p-home__mv--title">
                    <p><?php echo esc_attr($lang === "en" ? get_sub_field('title_first')['en'] : get_sub_field('title_first')['vn']) ?></p>
                    <p><?php echo esc_attr($lang === "en" ? get_sub_field('title_last')['en'] : get_sub_field('title_last')['vn']) ?></p>
                  </h1>
                  <div class="p-home__mv--text01">
                    <?php echo wp_kses_post($lang === "en" ? get_sub_field('mv_description')['en'] : get_sub_field('mv_description')['vn']) ?>
                  </div>
                  <div>
                    <a href=" <?php echo esc_attr($lang === "en" ? get_sub_field('link_button')['en'] : get_sub_field('link_button')['vn']) ?> " class="c-btn__01">
                      <?php echo esc_attr($lang === "en" ? get_sub_field('text_button')['en'] : get_sub_field('text_button')['vn']) ?>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          <?php endwhile; ?>
        <?php endif; ?>
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </section>

  <?php
  $section_trusted = get_field('section_trusted', 'option');
  if ($section_trusted):
  ?>
    <section class="p-home__since">
      <div class="l-container">
        <div class="p-home__since--box01">
          <div data-aos="fade-up">
            <?php if ($section_trusted['trusted_intro']): ?>
              <p class="c-text__intro01">
                <?php echo $lang === "en" ? $section_trusted['trusted_intro']['en'] : $section_trusted['trusted_intro']['vn']; ?>
              </p>
            <?php endif; ?>
            <?php if ($section_trusted['trusted_title_last']): ?>
              <h2 class="c-title__02">
                <span class="c-title__02--first">
                  <?php echo $lang === "en" ? $section_trusted['trusted_title_first']['en'] : $section_trusted['trusted_title_first']['vn']; ?>
                </span>
                <span class="c-title__02--last">
                  <?php echo $lang === "en" ? $section_trusted['trusted_title_last']['en'] : $section_trusted['trusted_title_last']['vn']; ?>
                </span>
              </h2>
            <?php endif; ?>
          </div>
          <div class="p-home__since--box01-right" data-aos="fade-up">
            <?php if ($section_trusted['trusted_description']): ?>
              <p class="c-text01">
                <?php echo $lang === "en" ? $section_trusted['trusted_description']['en'] : $section_trusted['trusted_description']['vn']; ?>
              </p>
            <?php endif; ?>
            <?php if ($section_trusted['trusted_button_text']): ?>
              <a href=" <?php echo $lang === "en" ? $section_trusted['trusted_button_link']['en'] : $section_trusted['trusted_button_link']['vn']; ?> "
                class="c-btn__02">
                <?php echo $lang === "en" ? $section_trusted['trusted_button_text']['en'] : $section_trusted['trusted_button_text']['vn']; ?>
              </a>
            <?php endif; ?>
          </div>
        </div>
        <div class="p-home__since--box02" data-aos="fade-up">
          <img src="<?php echo esc_url($section_trusted['trusted_image_first']['url']) ?>" alt="<?php echo $section_trusted['trusted_image_first']['title'] ?>">
          <img src="<?php echo esc_url($section_trusted['trusted_image_last']['url']) ?>" alt="<?php echo $section_trusted['trusted_image_last']['title'] ?>">
        </div>
      </div>
    </section>
  <?php endif; ?>

  <?php
  $section_business = get_field('section_business', 'option');
  if ($section_business):
  ?>
    <section class="p-home__our">
      <div class="l-container small">
        <div class="p-home__our--box01" data-aos="fade-up">
          <?php if ($section_business['intro']): ?>
            <p class="c-text__intro01">
              <?php echo $lang === "en" ? $section_business['intro']['en'] : $section_business['intro']['vn']; ?>
            </p>
          <?php endif; ?>
          <h2 class="c-title__02 type-02">
            <span class="c-title__02--first">
              <?php echo $lang === "en" ? $section_business['title_first']['en'] : $section_business['title_first']['vn']; ?>
            </span>
            <span class="c-title__02--last">
              <?php echo $lang === "en" ? $section_business['title_last']['en'] : $section_business['title_last']['vn']; ?>
            </span>
          </h2>
        </div>
        <div class="p-home__our--box02">
          <div class="p-home__our--box03" data-aos="fade-up">
            <div class="p-home__our--item first">
              <div class="icons">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home-page/icons/icon-our-01.svg" alt="icon-our-01">
              </div>
              <div class="conents">
                <h3 class="title">
                  <?php echo $lang === "en" ? $section_business['item_1']['title']['en'] : $section_business['item_1']['title']['vn']; ?>
                </h3>
                <p class="desc">
                  <?php echo $lang === "en" ? $section_business['item_1']['desc']['en'] : $section_business['item_1']['desc']['vn']; ?>
                </p>
                <a href="<?php echo $lang === "en" ? $section_business['item_1']['button_link']['en'] : $section_business['item_1']['button_link']['vn']; ?>" class="c-btn__03">
                  <?php echo $lang === "en" ? $section_business['item_1']['button']['en'] : $section_business['item_1']['button']['vn']; ?>
                </a>
              </div>
            </div>
            <div class="p-home__our--item-center">
              <div class="p-home__our--item-main">
                <div class="icons">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home-page/icons/icon-automotive.svg" alt="icon-automotive">
                </div>  
                <div class="conents">
                  <h3 class="title">
                    <?php echo $lang === "en" ? $section_business['item_2']['title']['en'] : $section_business['item_2']['title']['vn']; ?>
                  </h3>
                  <p class="desc">
                    <?php echo $lang === "en" ? $section_business['item_2']['desc']['en'] : $section_business['item_2']['desc']['vn']; ?>
                  </p>
                  <a href="<?php echo $lang === "en" ? $section_business['item_2']['button_link']['en'] : $section_business['item_2']['button_link']['vn']; ?>" class="c-btn__01">
                    <?php echo $lang === "en" ? $section_business['item_2']['button']['en'] : $section_business['item_2']['button']['vn']; ?>
                  </a>
                </div>
              </div>
            </div>
            <div class="p-home__our--item last">
              <div class="icons">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home-page/icons/icon-our-02.svg" alt="icon-our-01">
              </div>
              <div class="conents">
                <h3 class="title">
                  <?php echo $lang === "en" ? $section_business['item_3']['title']['en'] : $section_business['item_3']['title']['vn']; ?>
                </h3>
                <p class="desc">
                  <?php echo $lang === "en" ? $section_business['item_3']['desc']['en'] : $section_business['item_3']['desc']['vn']; ?>
                </p>
                <a href="<?php echo $lang === "en" ? $section_business['item_3']['button_link']['en'] : $section_business['item_3']['button_link']['vn']; ?>" class="c-btn__03">
                  <?php echo $lang === "en" ? $section_business['item_3']['button']['en'] : $section_business['item_3']['button']['vn']; ?>
                </a>
              </div>
            </div>
          </div>
          <div class="p-home__our--box04" data-aos="fade-up">
            <div class="p-home__our--item">
              <div class="icons">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home-page/icons/icon-our-03.svg" alt="icon-our-03">
              </div>
              <div class="conents">
                <h3 class="title">
                  <?php echo $lang === "en" ? $section_business['item_4']['title']['en'] : $section_business['item_4']['title']['vn']; ?>
                </h3>
                <p class="desc">
                  <?php echo $lang === "en" ? $section_business['item_4']['desc']['en'] : $section_business['item_4']['desc']['vn']; ?>
                </p>
                <a href="<?php echo $lang === "en" ? $section_business['item_4']['button_link']['en'] : $section_business['item_4']['button_link']['vn']; ?>" class="c-btn__03">
                  <?php echo $lang === "en" ? $section_business['item_4']['button']['en'] : $section_business['item_4']['button']['vn']; ?>
                </a>
              </div>
            </div>
            <div class="p-home__our--item">
              <div class="icons">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home-page/icons/icon-our-04.svg" alt="icon-our-04">
              </div>
              <div class="conents">
                <h3 class="title">
                  <?php echo $lang === "en" ? $section_business['item_5']['title']['en'] : $section_business['item_5']['title']['vn']; ?>
                </h3>
                <p class="desc">
                  <?php echo $lang === "en" ? $section_business['item_5']['desc']['en'] : $section_business['item_5']['desc']['vn']; ?>
                </p>
                <a href="<?php echo $lang === "en" ? $section_business['item_5']['button_link']['en'] : $section_business['item_5']['button_link']['vn']; ?>" class="c-btn__03">
                  <?php echo $lang === "en" ? $section_business['item_5']['button']['en'] : $section_business['item_5']['button']['vn']; ?>
                </a>
              </div>
            </div>
            <div class="p-home__our--item">
              <div class="icons">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home-page/icons/icon-our-05.svg" alt="icon-our-05">
              </div>
              <div class="conents">
                <h3 class="title">
                  <?php echo $lang === "en" ? $section_business['item_6']['title']['en'] : $section_business['item_6']['title']['vn']; ?>
                </h3>
                <p class="desc">
                  <?php echo $lang === "en" ? $section_business['item_6']['desc']['en'] : $section_business['item_6']['desc']['vn']; ?>
                </p>
                <a href="<?php echo $lang === "en" ? $section_business['item_6']['button_link']['en'] : $section_business['item_6']['button_link']['vn']; ?>" class="c-btn__03">
                  <?php echo $lang === "en" ? $section_business['item_6']['button']['en'] : $section_business['item_6']['button']['vn']; ?>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php endif; ?>

  <?php
  $section_partners = get_field('section_partners', 'option');
  if ($section_partners):
  ?>
    <section class="p-home__partners">
      <div class="p-home__partners--box01" data-aos="fade-up">
        <?php if ($section_partners['partners_intro']): ?>
          <p class="c-text__intro01">
            <?php echo $lang === "en" ? $section_partners['partners_intro']['en'] : $section_partners['partners_intro']['vn']; ?>
          </p>
        <?php endif; ?>
        <h2 class="c-title__02 type-02">
          <span class="c-title__02--first">
            <?php echo $lang === "en" ? $section_partners['partners_title_first']['en'] : $section_partners['partners_title_first']['vn']; ?>
          </span>
          <span class="c-title__02--last">
            <?php echo $lang === "en" ? $section_partners['partners_title_last']['en'] : $section_partners['partners_title_last']['vn']; ?>
          </span>
        </h2>
      </div>
      <?php if ($section_partners['partners_list_images']) : ?>
        <div class="swiper-partners">
          <div class="swiper-wrapper">
            <?php foreach ($section_partners['partners_list_images'] as $partner) :
              $image = $partner['partners_image'];
            ?>
              <div class="swiper-slide">
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt'] ?: $image['title']); ?>" class="p-home__partners--logo">
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      <?php endif; ?>
    </section>
  <?php endif; ?>
  <?php
  $section_latest = get_field('section_latest', 'option');
  if (function_exists('qhp_get_highlight_posts_by_category')) {
    $highlight_posts = qhp_get_highlight_posts_by_category($current_category->term_id, 8);
  } else {
    // Fallback nếu plugin chưa active
    $highlight_posts = new WP_Query(array('post_count' => 0)); // Query rỗng
  }
  if ($section_latest):
  ?>
    <section class="p-home__posts">
      <div class="l-container">
        <div class="p-home__posts--box01" data-aos="fade-up">
          <div>
            <?php if ($section_latest['latest_intro']): ?>
              <p class="c-text__intro01">
                <?php echo $lang === "en" ? $section_latest['latest_intro']['en'] : $section_latest['latest_intro']['vn']; ?>
              </p>
            <?php endif; ?>
            <h2 class="c-title__02 type-03">
              <span class="c-title__02--first">
                <?php echo $lang === "en" ? $section_latest['latest_title_first']['en'] : $section_latest['latest_title_first']['vn']; ?>
              </span>
              <span class="c-title__02--last">
                <?php echo $lang === "en" ? $section_latest['latest_title_last']['en'] : $section_latest['latest_title_last']['vn']; ?>
              </span>
            </h2>
          </div>
          <?php if ($highlight_posts->found_posts > 3): ?>
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
      <?php if ($highlight_posts->have_posts()): ?>
        <div class="l-container">
          <div class="swiper-posts">
            <div class="swiper-wrapper">
              <?php while ($highlight_posts->have_posts()): $highlight_posts->the_post(); ?>
                <div class="swiper-slide">
                  <?php get_template_part('template-parts/content'); ?>
                </div>
              <?php endwhile; ?>
              <?php wp_reset_postdata(); // Reset query sau loop 
              ?>
            </div>
            <?php if ($section_latest['latest_button_link']): ?>
              <div class="p-home__posts--bottom">
                <a href="<?php echo $lang === "en" ? $section_latest['latest_button_link']['en'] : $section_latest['latest_button_link']['vn']; ?>  " class="c-btn__04">
                  <?php echo $lang === "en" ? $section_latest['latest_button_text']['en'] : $section_latest['latest_button_text']['vn']; ?>
                </a>
              </div>
            <?php endif; ?>
          </div>
        <?php endif; ?>
    </section>
  <?php endif; ?>

  <?php get_template_part('template-parts/sections/commitment'); ?>
  <?php get_template_part('template-parts/sections/contact'); ?>
</main>

<?php get_footer(); ?>