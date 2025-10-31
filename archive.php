<?php get_header(); ?>
<main class="p-home">

  <section class="c-mainvisual">
    <div class="l-container">
      <h1 class="c-mainvisual__title u-text__center u-text__title--h1"><?php single_cat_title(); ?></h1>
    </div>
  </section>

  <section class="c-list__blogs">
    <div class="l-container">
      <div class="c-list__row">

        <div class="c-list__left">
          <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 24px;">
            <?php
            if (have_posts()) {
              while (have_posts()) {
                the_post();
                get_template_part('template-parts/content', get_post_format());
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

        <?php get_sidebar(); ?>
      </div>
    </div>

  </section>

</main>
<?php get_footer(); ?>