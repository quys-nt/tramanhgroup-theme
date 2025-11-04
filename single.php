<?php get_header(); ?>

<?php
if (have_posts()) :
	while (have_posts()) : the_post();
		if (
			in_category('gallery') ||
			in_category('thu-vien-hinh-anh')
		) {
			get_template_part('template-parts/single-gallery');
		} else {
			get_template_part('template-parts/single-main');
		}
	endwhile;
endif;
?>

<?php get_footer(); ?>