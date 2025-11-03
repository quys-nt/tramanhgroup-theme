<?php get_header(); ?>

<?php
if (
	in_category('gallery') ||
	in_category('thu-vien-hinh-anh')
) {
	get_template_part('template-parts/single-gallery');
} else {
	get_template_part('template-parts/single-main');
}
?>

<?php get_footer(); ?>