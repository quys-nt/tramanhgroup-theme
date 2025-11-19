<?php get_header(); ?>

<main>
	<section class="p-single__sec01">
		<div class="l-container sm">
			<div class="p-single__sec01--group01">
				<h1 class="title"><?php the_title(); ?></h1>
				
				<?php 
				// Hiển thị department
				$department = get_field('career_department');
				if ($department) :
					$dept_labels = array(
						'automotive' => 'Automotive & Mobility',
						'lubricants' => 'Lubricants & Chemicals',
						'yachting' => 'Yachting & Lifestyle',
						'retail' => 'Retail & Luxury',
						'real_estate' => 'Real Estate',
						'sports' => 'Sports & Community'
					);
					?>
					<div class="career-department">
						<span class="dept-badge">
							<?php echo esc_html($dept_labels[$department] ?? $department); ?>
						</span>
					</div>
				<?php endif; ?>
			</div>
			
			<article class="p-single__article">
				<?php the_content(); ?>
			</article>
		</div>
	</section>

	<?php 
	// Related Posts Section - Bài viết cùng department
	if ($department) :
		// Get current category
		$categories = get_the_category();
		$cat_ids = array();
		
		if (!empty($categories)) {
			foreach ($categories as $cat) {
				$cat_ids[] = $cat->term_id;
				
				// Add translated categories if Polylang is active
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
		<section class="p-single__related-posts">
			<div class="l-container">
				<h2 class="related-title">
					<?php 
					echo (function_exists('get_current_lang') && get_current_lang() === 'vi') 
						? 'Vị trí tương tự' 
						: 'Similar Positions'; 
					?>
				</h2>
				
				<div class="related-posts-grid">
					<?php 
					while ($related_query->have_posts()) : $related_query->the_post();
						get_template_part('template-parts/content', get_post_format());
					endwhile;
					?>
				</div>
				
				<?php 
				// Link to view all positions in this department
				$parent_cat = get_post_parent_category();
				if ($parent_cat) :
					$cat_link = get_category_link($parent_cat->term_id);
				?>
					<div class="view-all-link">
						<a href="<?php echo esc_url($cat_link); ?>" class="c-btn__view-all">
							<?php 
							echo (function_exists('get_current_lang') && get_current_lang() === 'vi') 
								? 'Xem tất cả vị trí' 
								: 'View All Positions'; 
							?>
						</a>
					</div>
				<?php endif; ?>
			</div>
		</section>
	<?php 
		endif;
		wp_reset_postdata();
	endif;
	?>

</main>

<?php get_footer(); ?>

<style>
.career-department {
	margin: 15px 0;
}

.dept-badge {
	display: inline-block;
	padding: 8px 16px;
	background: #2c5f2d;
	color: white;
	border-radius: 20px;
	font-size: 14px;
	font-weight: 500;
}

.p-single__related-posts {
	padding: 60px 0;
	background: #f9f9f9;
	margin-top: 60px;
}

.related-title {
	font-size: 32px;
	font-weight: 700;
	text-align: center;
	margin-bottom: 40px;
	color: #2c5f2d;
}

.related-posts-grid {
	display: grid;
	grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
	gap: 30px;
	margin-bottom: 40px;
}

.view-all-link {
	text-align: center;
	margin-top: 40px;
}

.c-btn__view-all {
	display: inline-block;
	padding: 14px 32px;
	background: #2c5f2d;
	color: white;
	text-decoration: none;
	border-radius: 25px;
	font-weight: 600;
	transition: all 0.3s ease;
}

.c-btn__view-all:hover {
	background: #1e4020;
	transform: translateY(-2px);
	box-shadow: 0 4px 12px rgba(44, 95, 45, 0.3);
}

@media (max-width: 768px) {
	.related-title {
		font-size: 24px;
	}
	
	.related-posts-grid {
		grid-template-columns: 1fr;
		gap: 20px;
	}
	
	.p-single__related-posts {
		padding: 40px 0;
		margin-top: 40px;
	}
}
</style>