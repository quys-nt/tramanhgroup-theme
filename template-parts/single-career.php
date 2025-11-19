<?php get_header(); ?>

<main>
	<?php
	$lang = function_exists('get_current_lang') ? get_current_lang() : 'en';
	$careerSingle = get_field('career_single', 'option');
	$careerSingleImg = $careerSingle['image'];
	$careerSingleButton = $careerSingle['button'];

	// $sec2TitleFirst = $sec_2['title_first'] ? $sec_2['title_first'] : "";
	// $sec2TitleLast = $sec_2['title_last'] ? $sec_2['title_last'] : "";
	?>
	<div class="p-career__mv" style="background-image: linear-gradient(180deg, rgba(0, 0, 0, 0.7) 7.47%, rgba(0, 0, 0, 0.35) 66.94%, rgba(0, 0, 0, 0) 100%), url('<?php echo $careerSingleImg['url'] ? $careerSingleImg['url'] : get_template_directory_uri() . '/assets/images/img-bg-career-single.png' ?>');"></div>
	<section class="p-page__sec01">
		<div class="l-container">
			<h1 class="p-career__single--title"><?php the_title(); ?></h1>
			<article class="page-contents">
				<?php the_content(); ?>
			</article>
			<div class="p-career__single--group01">
				<a href="<?php echo esc_attr($careerSingleButton['link']); ?>" class="c-btn__02">
					<?php echo esc_html($careerSingleButton ? ($lang === "en" ? $careerSingleButton['text']['en'] : $careerSingleButton['text']['vi']) : "Submit Your CV"); ?>
				</a>
			</div>
		</div>
	</section>

	<?php
	$department = get_field('career_department');
	if ($department) :
		$categories = get_the_category();
		$cat_ids = array();

		if (!empty($categories)) {
			foreach ($categories as $cat) {
				$cat_ids[] = $cat->term_id;

				if (function_exists('pll_get_term_translations')) {
					$translations = pll_get_term_translations($cat->term_id);
					$cat_ids = array_merge($cat_ids, array_values($translations));
				}
			}
		}

		// Query related posts
		$related_args = array(
			'post_type' => 'post',
			'posts_per_page' => 6,
			'post__not_in' => array(get_the_ID()),
			'category__in' => $cat_ids,
			'meta_query' => array(
				array(
					'key' => 'career_department',
					'value' => $department,
					'compare' => '='
				)
			),
			'orderby' => 'date',
			'order' => 'DESC'
		);

		$related_query = new WP_Query($related_args);

		if ($related_query->have_posts()) :
	?>
			<section class="p-archive__sec02">
				<div class="l-container">
					<?php
					$sec2Intro = $careerSingle['sec_02']['intro'] ? $careerSingle['sec_02']['intro'] : "";
					$sec2TitleFirst = $careerSingle['sec_02']['title_first'] ? $careerSingle['sec_02']['title_first'] : "";
					$sec2TitleLast = $careerSingle['sec_02']['title_last'] ? $careerSingle['sec_02']['title_last'] : "";
					?>
					<div class="p-archive__sec02--group01">
						<p class="c-text__intro01">
							<?php echo $lang === "en" ? $sec2Intro['en'] : $sec2Intro['vi']; ?>
						</p>
						<h2 class="c-title__02 type-03">
							<span class="c-title__02--last">
								<?php echo $lang === "en" ? $sec2TitleFirst['en'] : $sec2TitleFirst['vi']; ?>
							</span>
							<span class="c-title__02--first">
								<?php echo $lang === "en" ? $sec2TitleLast['en'] : $sec2TitleLast['vi']; ?>
							</span>
						</h2>
					</div>

					<div class="p-career__swiper--list02 js-swiper-career02">
						<div class="swiper-wrapper">
							<?php
							while ($related_query->have_posts()) : $related_query->the_post(); ?>
								<div class="swiper-slide">
									<?php get_template_part('template-parts/content-recruitment-card', get_post_format(), array(
										'department' => $department,
										'location' => $location,
									)); ?>
								</div>
							<?php
							endwhile;
							?>
						</div>
					</div>
				</div>
			</section>
	<?php
		endif;
		wp_reset_postdata();
	endif;
	?>

</main>

<?php get_footer(); ?>

<script>
	$(".js-header").removeClass('is-white');
</script>