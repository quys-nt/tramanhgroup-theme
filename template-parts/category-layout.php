<?php

/**
 * Shared template for Newsroom layout with tabs
 * Used by both category-newsroom.php and category-tin-tuc.php
 */
$lang = get_current_lang();
$current_category = get_queried_object();

// Lấy tất cả danh mục con
$child_categories = get_categories(array(
	'parent' => $current_category->term_id,
	'hide_empty' => false,
	'orderby' => 'name',
	'order' => 'ASC'
));

// Lấy category hiện tại từ URL (nếu có)
$active_tab = isset($_GET['tab']) ? sanitize_text_field($_GET['tab']) : 'all';

// Lấy highlight posts của category hiện tại (từ plugin Quick Highlight Posts)
if (function_exists('qhp_get_highlight_posts_by_category')) {
	$highlight_posts = qhp_get_highlight_posts_by_category($current_category->term_id, 6);
} else {
	// Fallback nếu plugin chưa active
	$highlight_posts = new WP_Query(array('post_count' => 0)); // Query rỗng
}
?>

<main>
	<?php
	// Lấy object của danh mục hiện tại
	$term = get_queried_object();
	if ($term && function_exists('get_field')):
		if (have_rows('main_visual', $term)) : ?>
			<section class="p-home__mv">
				<div class="js-swiper-mv">
					<div class="swiper-wrapper">
						<?php while (have_rows('main_visual', $term)) : the_row(); ?>
							<?php
							$image = get_sub_field('mv_image');
							?>
							<div class="swiper-slide">
								<div class="p-home__mv--item">
									<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="p-home__mv--thumbnail">
									<div class="p-home__mv--contents type-02">
										<h1 class="p-home__mv--title">
											<p><?php echo esc_html(get_sub_field('title_first')) ?></p>
											<p><?php echo esc_html(get_sub_field('title_last')) ?></p>
										</h1>
										<div class="p-home__mv--text01">
											<?php echo wp_kses_post(get_sub_field('mv_description')) ?>
										</div>
									</div>
								</div>
							</div>
						<?php endwhile; ?>
					</div>
					<div class="swiper-pagination"></div>
				</div>
			</section>
	<?php endif;
	endif; ?>

	<?php if ($highlight_posts->have_posts()): ?>
		<?php

	$sec_cate = get_field('post_category_sec_highlights', 'option');
	$secCateIntroHightlight = $sec_cate['intro'];
	$secCateTitleFirstHightlight = $sec_cate['title_first'];
	$secCateTitleLastHightlight = $sec_cate['title_last'];
	?>
		<section class="p-archive__sec01">
			<div class="l-container">
				<p class="c-text__intro01">
					<?php echo $lang === "en" ? $secCateIntroHightlight['en'] : $secCateIntroHightlight['vi']; ?>
				</p>
				<h2 class="c-title__02 type-03">
					<span class="c-title__02--first">
						<?php echo $lang === "en" ? $secCateTitleFirstHightlight['en'] : $secCateTitleFirstHightlight['vi']; ?>
					</span>
					<span class="c-title__02--last">
						<?php echo $lang === "en" ? $secCateTitleLastHightlight['en'] : $secCateTitleLastHightlight['vi']; ?>
					</span>
				</h2>
				<div class="p-archive__sec01--grid">
					<?php while ($highlight_posts->have_posts()): $highlight_posts->the_post(); ?>
						<a href="<?php the_permalink(); ?>" class="p-archive__sec01--card">
							<div class="p-archive__sec01--card__image">
								<?php if (has_post_thumbnail()): ?>
									<?php the_post_thumbnail('large', array(
										'alt' => get_the_title(),
										'loading' => 'lazy'
									)); ?>
								<?php endif; ?>
								<div class="p-archive__sec01--card__content">
									<h3 class="p-archive__sec01--card__title">
										<?php the_title(); ?>
									</h3>
								</div>
							</div>
							<div class="p-archive__sec01--card__excerpt">
								<div class="text01">
									<?php echo get_the_excerpt(); ?>
								</div>
								<div>
									<div class="icon">
										<img src="<?php echo get_template_directory_uri() . '/assets/images/icon-arrow-right-up-03.svg'; ?>" alt="icon-arrow-right-up-03">
									</div>
								</div>
							</div>
							<div class="p-archive__sec01--card__time">
								<p class="c-text04">
									<?php the_time('d/m/Y')?>
								</p>
							</div>
						</a>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); // Reset query sau loop 
					?>
				</div>
			</div>
		</section>
	<?php endif; ?>
	<?php

	$sec_cate = get_field('post_category_sec', 'option');
	$secCateIntro = $sec_cate['intro'];
	$secCateTitleFirst = $sec_cate['title_first'];
	$secCateTitleLast = $sec_cate['title_last'];
	?>
	<section class="p-archive__sec02">
		<div class="l-container">
			<div class="p-archive__sec02--group01">
				<p class="c-text__intro01">
					<?php echo $lang === "en" ? $secCateIntro['en'] : $secCateIntro['vi']; ?>
				</p>
				<h2 class="c-title__02 type-03">
					<span class="c-title__02--last">
						<?php echo $lang === "en" ? $secCateTitleFirst['en'] : $secCateTitleFirst['vi']; ?>
					</span>
					<span class="c-title__02--first">
						<?php echo $lang === "en" ? $secCateTitleLast['en'] : $secCateTitleLast['vi']; ?>
					</span>
				</h2>
			</div>

			<!-- Tab navigation -->
			<div class="tabs-nav">
				<button class="tab-btn js-tab-btn active"
					data-tab="all">
					<?php echo ($lang === 'en') ? 'All News' : 'Tất cả tin tức'; ?>
				</button>
				<?php foreach ($child_categories as $child_cat): ?>
					<button class="tab-btn js-tab-btn"
						data-tab="<?php echo esc_attr($child_cat->slug); ?>">
						<?php echo esc_html($child_cat->name); ?>
					</button>
				<?php endforeach; ?>
			</div>

			<!-- Tab content -->
			<div class="tabs-content">
				<div class="tab-content active"
					id="tab-all">
					<?php
					$all_posts = new WP_Query(array(
						'category__in' => array($current_category->term_id),
						'posts_per_page' => 100,
						'paged' => get_query_var('paged') ? get_query_var('paged') : 1
					));

					if ($all_posts->have_posts()):
					?>
						<div class="posts-grid">
							<?php while ($all_posts->have_posts()): $all_posts->the_post(); ?>
								<?php get_template_part('template-parts/content'); ?>
							<?php endwhile; ?>
						</div>
					<?php
						wp_reset_postdata();
					else:
					?>
						<p><?php echo ($lang === 'en') ? 'No posts found.' : 'Không có bài viết nào.'; ?></p>
					<?php endif; ?>
				</div>

				<!-- Child category tabs -->
				<?php foreach ($child_categories as $key => $child_cat): ?>
					<div class="tab-content"
						id="tab-<?php echo esc_attr($child_cat->slug); ?>">
						<?php
						$cat_posts = new WP_Query(array(
							'cat' => $child_cat->term_id,
							'posts_per_page' => 100,
							'paged' => get_query_var('paged') ? get_query_var('paged') : 1
						));

						if ($cat_posts->have_posts()):
						?>
							<div class="posts-grid">
								<?php while ($cat_posts->have_posts()): $cat_posts->the_post(); ?>
									<?php get_template_part('template-parts/content'); ?>
								<?php endwhile; ?>
							</div>
						<?php
							wp_reset_postdata();
						else:
						?>
							<p><?php echo ($lang === 'en') ? 'No posts found.' : 'Không có bài viết nào.'; ?></p>
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
</main>