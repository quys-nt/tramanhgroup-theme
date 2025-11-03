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

  <section class="p-archive__sec02">
    <div class="l-container">

      <p class="c-text__intro01">
        <?php echo $lang === "en" ? "Our Albums" : "Điểm nổi bật" ?>
      </p>
      <h2 class="c-title__02 type-03">
        <span class="c-title__02--first">
          <?php echo $lang === "en" ? "Explore Signature Moments" : "Những câu chuyện nổi bật" ?>
        </span>
        <span class="c-title__02--last">
          <?php echo $lang === "en" ? "from Across Tram Anh Group’s Ecosystem" : "và những khoảnh khắc quan trọng" ?>
        </span>
      </h2>

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
    </div>

  </section>

</main>
<?php get_footer(); ?>