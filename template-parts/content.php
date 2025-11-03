<div class="p-home__posts--item">
  <a href="<?php the_permalink(); ?>" class="thumbnail">
    <?php
    $thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'large');
    if ($thumbnail):
    ?>
      <img src="<?php echo $thumbnail; ?>" alt="<?php echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true); ?>" title="<?php echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true); ?>">
    <?php endif; ?>
  </a>
  <div class="contents">
    <a href="<?php the_permalink(); ?>">
      <h3 class=" title">
        <?php the_title(); ?>
      </h3>
    </a>
    <p class="time">
      <?php the_time('d/m/Y') ?>
    </p>
  </div>
  <a href="<?php the_permalink(); ?>" class=" c-btn__05">
    <?php
    $lang = get_current_lang();
    echo $lang === "en" ? "See details" : "Xem chi tiết";
    ?>
  </a>
</div>