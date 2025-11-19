<?php
$department = isset($args['department']) ? $args['department'] : '';
$location = isset($args['location']) ? $args['location'] : 'Ho Chi Minh City, Vietnam';
if ($department) {
  $dept_labels = array(
    'automotive' => 'Automotive & Mobility',
    'lubricants' => 'Lubricants & Chemicals',
    'yachting' => 'Yachting & Lifestyle',
    'retail' => 'Retail & Luxury',
    'real_estate' => 'Real Estate',
    'sports' => 'Sports & Community'
  );
}
?>
<a href="<?php the_permalink(); ?>" class="p-career__post--item">
  <div class="header">
    <p class="time">
      <?php the_time('d/m/Y') ?>
    </p>
    <div class="tag">
      <?php echo esc_html($dept_labels[$department] ?? $department); ?>
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