<?php get_header(); ?>

<main>
	<section class="p-single__sec01">
		<div class="l-container sm">
			<div class="p-single__sec01--group01">
				<p class="c-text__intro01">
					Automotive & Mobility
				</p>
				<h1 class="title"><?php the_title(); ?></h1>
				<div class="date">
					Updated <?php the_date(); ?>
				</div>
			</div>
			<div class="excerpt">
				<?php the_excerpt(); ?>
			</div>
		</div>
	</section>

	<div class="p-single__thumbnail">
		<?php if (has_post_thumbnail()) : ?>
			<?php
			// Hiển thị featured image với size 'large' hoặc 'full'
			the_post_thumbnail('full', array(
				'class' => 'p-archive__featured-image__img',
				'alt' => get_the_title(),
				'loading' => 'lazy'
			));
			?>
		<?php endif; ?>
	</div>

	<section class="p-single__sec02">
		<div class="l-container sm">
			<div class="p-single__sec02--group01">
				<article class="p-single__article">
					<?php the_content(); ?>
				</article>
			</div>
		</div>
	</section>

	<?php
	$categories = wp_get_post_categories(get_the_ID());
	if ($categories) :
		$args = array(
			'category__in'   => $categories,
			'post__not_in'   => array(get_the_ID()),
			'orderby'        => 'DESC'
		);
		$related_posts = new WP_Query($args);
		if ($related_posts->have_posts()) : ?>
			<section class="p-home__posts">
				<div class="l-container">
					<div class="p-home__posts--box01">
						<div>
							<p class="c-text__intro01">
								Related New
							</p>
							<h2 class="c-title__02 type-03">
								<span class="c-title__02--first">
									More Stories
								</span>
								<span class="c-title__02--last">
									from Tram Anh Group
								</span>
							</h2>
						</div>
						<div>
							<a href="/" class="c-btn__04">
								View All News
							</a>
						</div>
					</div>
				</div>
				<div class="l-container">
					<div class="swiper-posts">
						<div class="swiper-wrapper">
							<div class="swiper-slide">
								<?php
								while ($related_posts->have_posts()) {
									$related_posts->the_post();
									get_template_part('template-parts/content');
									wp_reset_postdata();
								}
								?>
							</div>
						</div>
					</div>
			</section>
		<?php endif; ?>
	<?php endif; ?>

</main>

<?php get_footer(); ?>