<?php get_header(); ?>

<?php
// Lấy ngôn ngữ hiện tại
$lang = get_current_lang();

// Lấy tất cả categories của bài viết
$categories = get_the_category();
$current_category = null;  // Category con (để hiển thị)
$parent_category = null;   // Category cha (để tạo link)

if (!empty($categories)) {
	// Vòng lặp 1: Tìm category con và category cha
	foreach ($categories as $cat) {
		// Nếu là category cha (parent = 0)
		if ($cat->parent == 0) {
			$parent_category = $cat;
		}
		// Nếu là category con (parent != 0)
		else {
			if (!$current_category) {
				$current_category = $cat;
			}
		}
	}
	
	// Nếu không có category con được gán
	if (!$current_category) {
		$current_category = $categories[0];
	}
	
	// Nếu không có parent category, tìm parent của current_category
	if (!$parent_category && $current_category->parent != 0) {
		$parent_category = get_category($current_category->parent);
	}
}

// Tạo link đến category cha (Newsroom/Tin tức)
$newsroom_link = $parent_category ? get_category_link($parent_category->term_id) : home_url('/');
?>

<main>
	<section class="p-single__sec01">
		<div class="l-container sm">
			<div class="p-single__sec01--group01">
				<?php if ($current_category): ?>
					<p class="c-text__intro01">
						<?php echo esc_html($current_category->name); ?>
					</p>
				<?php endif; ?>
				<h1 class="title"><?php the_title(); ?></h1>
				<div class="date">
					<?php echo ($lang === 'en') ? 'Updated ' : 'Cập nhật '; ?>
					<?php the_time('d/m/Y') ?>
				</div>
			</div>
			<div class="excerpt">
				<?php the_excerpt(); ?>
			</div>
		</div>
	</section>

	<?php if (has_post_thumbnail()) : ?>
		<div class="p-single__thumbnail">
			<?php
			the_post_thumbnail('full', array(
				'class' => 'p-single__featured-image__img',
				'alt' => get_the_title(),
				'loading' => 'lazy'
			));
			?>
		</div>
	<?php endif; ?>

	<?php
	// Lấy thông tin bài viết để share
	$post_title = get_the_title();
	$post_url = get_permalink();
	$post_excerpt = get_the_excerpt();

	// Encode URL và text cho share links
	$encoded_url = urlencode($post_url);
	$encoded_title = urlencode($post_title);
	$encoded_excerpt = urlencode($post_excerpt);

	// Tạo share URLs
	$facebook_share_url = 'https://www.facebook.com/sharer/sharer.php?u=' . $encoded_url;
	$twitter_share_url = 'https://twitter.com/intent/tweet?url=' . $encoded_url . '&text=' . $encoded_title;

	// Email subject và body
	$email_subject = $post_title;
	$email_body = $post_excerpt . '%0D%0A%0D%0A' . $post_url;
	$mailto_link = 'mailto:?subject=' . $encoded_title . '&body=' . $email_body;
	?>

	<section class="p-single__sec02">
		<div class="l-container sm">
			<div class="p-single__sec02--group01">
				<article class="p-single__article">
					<?php the_content(); ?>
				</article>
				<div class="p-single__sec02--btns">
					<!-- Facebook Share -->
					<button class="c-btn__09 icon-fb js-share-facebook"
						data-url="<?php echo esc_url($facebook_share_url); ?>"
						title="<?php echo ($lang === 'en') ? 'Share on Facebook' : 'Chia sẻ lên Facebook'; ?>">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-fb.png" alt="Facebook">
						<span class="btn-text">Facebook</span>
					</button>

					<!-- Twitter/X Share -->
					<button class="c-btn__09 icon-twitter js-share-twitter"
						data-url="<?php echo esc_url($twitter_share_url); ?>"
						title="<?php echo ($lang === 'en') ? 'Share on Twitter' : 'Chia sẻ lên Twitter'; ?>">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-twitter.png" alt="Twitter">
						<span class="btn-text">Twitter</span>
					</button>

					<!-- Email Share -->
					<a href="<?php echo esc_url($mailto_link); ?>"
						class="c-btn__09 icon-mail"
						title="<?php echo ($lang === 'en') ? 'Share via Email' : 'Chia sẻ qua Email'; ?>">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-mail-02.svg" alt="Email">
						<span class="btn-text">Email</span>
					</a>

					<!-- Copy Link -->
					<button class="c-btn__09 icon-link js-copy-link"
						data-url="<?php echo esc_url($post_url); ?>"
						title="<?php echo ($lang === 'en') ? 'Copy Link' : 'Sao chép liên kết'; ?>">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-link.svg" alt="Copy Link">
						<span class="btn-text"><?php echo ($lang === 'en') ? 'Copy Link' : 'Sao chép'; ?></span>
					</button>
				</div>

				<!-- Toast notification for copy link -->
				<div class="copy-toast" id="copyToast">
					<span class="toast-icon">✓</span>
					<span class="toast-text">
						<?php echo ($lang === 'en') ? 'Link copied to clipboard!' : 'Đã sao chép liên kết!'; ?>
					</span>
				</div>
			</div>
		</div>
	</section>

	<?php
	// Lấy bài viết liên quan từ cùng danh mục
	if ($current_category) :
		$args = array(
			'category__in'   => array($current_category->term_id),
			'post__not_in'   => array(get_the_ID()),
			'posts_per_page' => 6,
			'orderby'        => 'date',
			'order'          => 'DESC'
		);
		$related_posts = new WP_Query($args);

		if ($related_posts->have_posts()) : ?>
			<section class="p-home__posts">
				<div class="l-container">
					<div class="p-home__posts--box01">
						<div>
							<p class="c-text__intro01">
								<?php echo ($lang === 'en') ? 'Related News' : 'Tin liên quan'; ?>
							</p>
							<h2 class="c-title__02 type-03">
								<span class="c-title__02--first">
									<?php echo ($lang === 'en') ? 'More Stories' : 'Nhiều hơn'; ?>
								</span>
								<span class="c-title__02--last">
									<?php echo ($lang === 'en') ? 'from Tram Anh Group' : 'từ Trâm Anh Group'; ?>
								</span>
							</h2>
						</div>
						<div>
							<a href="<?php echo esc_url($newsroom_link); ?>" class="c-btn__04">
								<?php echo ($lang === 'en') ? 'View All News' : 'Xem tất cả tin tức'; ?>
							</a>
						</div>
					</div>
				</div>
				<div class="l-container">
					<div class="swiper-posts">
						<div class="swiper-wrapper">
							<?php
							while ($related_posts->have_posts()) {
								$related_posts->the_post();
								echo '<div class="swiper-slide">';
								get_template_part('template-parts/content');
								echo '</div>';
							}
							wp_reset_postdata();
							?>
						</div>
					</div>
				</div>
			</section>
		<?php endif; ?>
		<?php wp_reset_postdata(); ?>
	<?php endif; ?>

</main>

<?php get_footer(); ?>