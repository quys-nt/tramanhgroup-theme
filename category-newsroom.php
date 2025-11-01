<?php
/**
 * Template for Newsroom (parent category with tabs)
 */
get_header();
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
?>

<main>
	<section class="p-newsroom__hero">
		<div class="l-container">
			<h1 class="c-title__01">
				<?php echo esc_html($current_category->name); ?>
			</h1>
			<?php if ($current_category->description): ?>
				<div class="category-description">
					<?php echo wpautop($current_category->description); ?>
				</div>
			<?php endif; ?>
		</div>
	</section>

	<section class="p-newsroom__tabs">
		<div class="l-container">
			<!-- Tab navigation -->
			<div class="tabs-nav">
				<button class="tab-btn <?php echo ($active_tab === 'all') ? 'active' : ''; ?>" 
						data-tab="all">
					<?php echo ($lang === 'en') ? 'All News' : 'Tất cả tin tức'; ?>
				</button>
				<?php foreach ($child_categories as $child_cat): ?>
					<button class="tab-btn <?php echo ($active_tab === $child_cat->slug) ? 'active' : ''; ?>" 
							data-tab="<?php echo esc_attr($child_cat->slug); ?>">
						<?php echo esc_html($child_cat->name); ?>
					</button>
				<?php endforeach; ?>
			</div>

			<!-- Tab content -->
			<div class="tabs-content">
				<div class="tab-content <?php echo ($active_tab === 'all') ? 'active' : ''; ?>" 
					 id="tab-all">
					<?php
					$all_posts = new WP_Query(array(
						'category__in' => array($current_category->term_id),
						'posts_per_page' => 12,
						'paged' => get_query_var('paged') ? get_query_var('paged') : 1
					));
					
					if ($all_posts->have_posts()):
					?>
						<div class="posts-grid">
							<?php while ($all_posts->have_posts()): $all_posts->the_post(); ?>
								<?php get_template_part('template-parts/content'); ?>
							<?php endwhile; ?>
						</div>
						
						<div class="pagination">
							<?php
							echo paginate_links(array(
								'total' => $all_posts->max_num_pages,
								'prev_text' => ($lang === 'en') ? '← Previous' : '← Trước',
								'next_text' => ($lang === 'en') ? 'Next →' : 'Tiếp →',
							));
							?>
						</div>
					<?php
					wp_reset_postdata();
					else:
					?>
						<p><?php echo ($lang === 'en') ? 'No posts found.' : 'Không có bài viết nào.'; ?></p>
					<?php endif; ?>
				</div>

				<!-- Child category tabs -->
				<?php foreach ($child_categories as $child_cat): ?>
					<div class="tab-content <?php echo ($active_tab === $child_cat->slug) ? 'active' : ''; ?>" 
						 id="tab-<?php echo esc_attr($child_cat->slug); ?>">
						<?php
						$cat_posts = new WP_Query(array(
							'cat' => $child_cat->term_id,
							'posts_per_page' => 12,
							'paged' => get_query_var('paged') ? get_query_var('paged') : 1
						));
						
						if ($cat_posts->have_posts()):
						?>
							<div class="posts-grid">
								<?php while ($cat_posts->have_posts()): $cat_posts->the_post(); ?>
									<?php get_template_part('template-parts/content'); ?>
								<?php endwhile; ?>
							</div>
							
							<div class="pagination">
								<?php
								echo paginate_links(array(
									'total' => $cat_posts->max_num_pages,
									'prev_text' => ($lang === 'en') ? '← Previous' : '← Trước',
									'next_text' => ($lang === 'en') ? 'Next →' : 'Tiếp →',
								));
								?>
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

<script>
jQuery(document).ready(function($) {
	$('.tab-btn').on('click', function() {
		var tabId = $(this).data('tab');
		
		// Remove active class from all tabs
		$('.tab-btn').removeClass('active');
		$('.tab-content').removeClass('active');
		
		// Add active class to clicked tab
		$(this).addClass('active');
		$('#tab-' + tabId).addClass('active');
		
		// Update URL without reload
		var newUrl = window.location.pathname + '?tab=' + tabId;
		window.history.pushState({path: newUrl}, '', newUrl);
	});
});
</script>

<?php get_footer(); ?>