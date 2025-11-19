<?php
$department = isset($args['department']) ? $args['department'] : '';
$location = isset($args['location']) ? $args['location'] : 'Ho Chi Minh City, Vietnam';
?>
<a href="<?php the_permalink(); ?>" class="p-career__post--item">
  <div class="header">
    <p class="time">
      <?php the_time('d/m/Y') ?>
    </p>
    <div class="tag">
      <?php echo $department; ?>
    </div>
  </div>
  <div class="body">
    <div>
      <h3 class=" title">
        <?php the_title(); ?>
      </h3>
      <div class="location">
        <?php echo $location; ?>
      </div>
    </div>
    <span class="icon"></span>
  </div>
</a>