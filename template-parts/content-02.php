<div class="p-home__posts--item">
  <a href="<?php the_permalink(); ?>" class="thumbnail">
    <?php
    $thumbnailNull = get_template_directory_uri() . '';
    $thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'large');
    ?>
    <img src="<?php echo $thumbnail ? $thumbnail : $thumbnailNull; ?>" alt="<?php echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true); ?>" title="<?php echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true); ?>">
  </a>
  <div class="contents">
    <a href="<?php the_permalink(); ?>">
      <h3 class=" title">
        <?php the_title(); ?>
      </h3>
    </a>
  </div>
</div>