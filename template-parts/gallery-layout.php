<?php get_header(); ?>
<main class="p-home">

  <?php
  // Lấy object của danh mục hiện tại
  $term = get_queried_object();
  if ($term && function_exists('get_field')):
    if (have_rows('main_visual', $term)) : ?>
      <section class="p-home__mv">
        <div class="js-swiper-mv">
          <div class="swiper-wrapper">
            <?php while (have_rows('main_visual', $term)) : the_row(); ?>
              <?php
              $image = get_sub_field('mv_image');
              ?>
              <div class="swiper-slide">
                <div class="p-home__mv--item">
                  <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="p-home__mv--thumbnail">
                  <div class="p-home__mv--contents type-02">
                    <h1 class="p-home__mv--title">
                      <p><?php echo esc_attr(get_sub_field('title_first')) ?></p>
                      <p><?php echo esc_attr(get_sub_field('title_last')) ?></p>
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
  <?php endif;
  endif; ?>

  <?php
  $sec_gallery_1 = get_field('sec_gallery_1', 'option');
  $galleryitem = $sec_gallery_1['gallery'];
  if ($sec_gallery_1):
  ?>
    <section class="p-gallery__sec01">
      <div class="l-container">
        <div class="c-text__center">
          <p class="c-text__intro01">
            <?php echo $lang === "en" ? $sec_gallery_1['intro']['en'] : $sec_gallery_1['intro']['vn']; ?>
          </p>
          <div class="p-gallery__sec01--title ">
            <?php echo $lang === "en" ? $sec_gallery_1['title']['en'] : $sec_gallery_1['title']['vn']; ?>
          </div>
        </div>
        <div class="p-gallery__sec01--gallery">
          <div class="sec01-gallery-item">
            <div class="sec01-gallery-img1">
              <img src="<?php echo esc_url($galleryitem['image_1']['url']); ?>" alt="<?php echo esc_attr($galleryitem['image_1']['alt'] ?: $image['title']); ?>" class="p-home__partners--logo">
            </div>
            <div class="sec01-gallery-img2">
              <img src="<?php echo esc_url($galleryitem['image_2']['url']); ?>" alt="<?php echo esc_attr($galleryitem['image_2']['alt'] ?: $image['title']); ?>" class="p-home__partners--logo">
            </div>
          </div>
          <div class="sec01-gallery-item">
            <div class="sec01-gallery-img3">
              <img src="<?php echo esc_url($galleryitem['image_3']['url']); ?>" alt="<?php echo esc_attr($galleryitem['image_3']['alt'] ?: $image['title']); ?>" class="p-home__partners--logo">
            </div>
            <div class="sec01-gallery-img4">
              <img src="<?php echo esc_url($galleryitem['image_4']['url']); ?>" alt="<?php echo esc_attr($galleryitem['image_4']['alt'] ?: $image['title']); ?>" class="p-home__partners--logo">
            </div>
          </div>
          <div class="sec01-gallery-item">
            <div class="sec01-gallery-img5">
              <img src="<?php echo esc_url($galleryitem['image_5']['url']); ?>" alt="<?php echo esc_attr($galleryitem['image_5']['alt'] ?: $image['title']); ?>" class="p-home__partners--logo">
            </div>
          </div>
          <div class="sec01-gallery-item">
            <div class="sec01-gallery-img6">
              <img src="<?php echo esc_url($galleryitem['image_6']['url']); ?>" alt="<?php echo esc_attr($galleryitem['image_6']['alt'] ?: $image['title']); ?>" class="p-home__partners--logo">
            </div>
            <div class="sec01-gallery-img7">
              <img src="<?php echo esc_url($galleryitem['image_7']['url']); ?>" alt="<?php echo esc_attr($galleryitem['image_7']['alt'] ?: $image['title']); ?>" class="p-home__partners--logo">
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php endif; ?>

  <section class="p-archive__sec02">
    <div class="l-container">
      <?php
      $sec_gallery_2 = get_field('sec_gallery_2', 'option');
      if ($sec_gallery_2):
      ?>
        <p class="c-text__intro01">
          <?php echo $lang === "en" ? $sec_gallery_2['intro']['en'] : $sec_gallery_2['intro']['vn']; ?>
        </p>
        <h2 class="c-title__02 type-03">
          <span class="c-title__02--first">
            <?php echo $lang === "en" ? $sec_gallery_2['title_first']['en'] : $sec_gallery_2['title_first']['vn']; ?>
          </span>
          <span class="c-title__02--last">
            <?php echo $lang === "en" ? $sec_gallery_2['title_last']['en'] : $sec_gallery_2['title_last']['vn']; ?>
          </span>
        </h2>
      <?php endif; ?>

      <div>
        <div class="posts-grid">
          <?php
          if (have_posts()) {
            while (have_posts()) {
              the_post();
              get_template_part('template-parts/content-02', get_post_format());
            }
          }
          wp_reset_query();
          ?>
        </div>

        <div class="c-paging">
          <?php
          echo paginate_links(
            array(
              'mid_size'     => 1,
              'prev_text'    => sprintf(__('←')),
              'next_text'    => sprintf(__('→')),
            )
          );
          ?>
        </div>
      </div>
    </div>
  </section>

</main>
<?php get_footer(); ?>