<?php get_header(); ?>

<?php
if (have_posts()) :
	while (have_posts()) : the_post();
		if (
			in_category('gallery') ||
			in_category('thu-vien-hinh-anh')
		) {
			get_template_part('template-parts/single-gallery');
		} elseif (
			in_category('career') ||
			in_category('su-nghiep')
		) {
			get_template_part('template-parts/single-career');
		} else {
			get_template_part('template-parts/single-main');
		}
	endwhile;
endif;
?>

<?php get_footer(); ?>