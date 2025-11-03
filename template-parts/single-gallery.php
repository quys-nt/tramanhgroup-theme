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
		</div>
	</section>


	<?php
	$gallery_items = get_field('gallery');
	if ($gallery_items && is_array($gallery_items)) :
	?>
		<section class="p-single__gallery">
			<div class="l-container">
				<div class="p-single__gallery--grid">
					<?php

					foreach ($gallery_items as $index => $item) :
						// $item là attachment object từ ACF Gallery field (hỗ trợ cả image và video)
						$mime_type = $item['mime_type'] ?? get_post_mime_type($item['ID']);
						$full_url = $item['url'] ?? wp_get_attachment_url($item['ID']);
						$is_image = strpos($mime_type, 'image/') !== false;
						$is_video = strpos($mime_type, 'video/') !== false;
					?>
						<div class="gallery-item <?php echo $is_video ? "is-video" : "" ?>" data-modal-src="<?php echo esc_url($full_url); ?>" data-modal-type="<?php echo esc_attr($mime_type); ?>">
							<?php if ($is_image) : ?>
								<img
									src="<?php echo esc_url($item['sizes']['large'] ?? $item['url']); ?>"
									srcset="<?php echo esc_attr($item['sizes']['medium'] ?? ''); ?> 768w, <?php echo esc_attr($item['sizes']['large'] ?? ''); ?> 1024w, <?php echo esc_url($full_url); ?> 1200w"
									sizes="(max-width: 768px) 100vw, (max-width: 1024px) 50vw, 50vw"
									alt="<?php echo esc_attr($item['alt'] ?? ''); ?>"
									loading="lazy"
									class="gallery-image">
							<?php elseif ($is_video) : ?>
								<video
									src="<?php echo esc_url($full_url); ?>"
									poster="<?php echo esc_url($item['sizes']['large'] ?? ''); ?>"
									class="gallery-video"
									loading="lazy"
									width="100%"
									height="auto">
								</video>
							<?php endif; ?>
						</div>
					<?php
					endforeach;
					?>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php if (the_content()): ?>
		<section class="p-single__sec02">
			<div class="l-container">
				<div class="p-single__sec02--group01">
					<article class="p-single__article">
						<?php the_content(); ?>
					</article>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php
	// Lấy bài viết liên quan từ cùng danh mục
	if ($current_category) :
		$args = array(
			'category__in'   => array($current_category->term_id),
			'post__not_in'   => array(get_the_ID()),
			'posts_per_page' => 3,
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
					</div>
				</div>
				<div class="l-container">
					<div class="p-single__gallery--list01">
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
			</section>
		<?php endif; ?>
		<?php wp_reset_postdata(); ?>
	<?php endif; ?>

</main>

<!-- Modal cho Gallery -->
<div id="gallery-modal" class="modal">
	<div class="modal-bg js-hidden"></div>
	<div class="modal-body">
		<span class="close js-hidden">&times;</span>
		<div class="modal-content">
			<div class="js-modal-gallery-item"></div>
		</div>
	</div>
</div>

<?php get_footer(); ?>

<script>
	document.addEventListener('DOMContentLoaded', function() {
		const modal = document.getElementById('gallery-modal');
		const modalContent = modal.querySelector('.js-modal-gallery-item');
		const closeBtn = $('.js-hidden');
		const galleryItems = document.querySelectorAll('.gallery-item');

		// Mở modal khi click gallery-item
		galleryItems.forEach(function(item) {
			item.addEventListener('click', function() {
				$("html body").css("overflow", "hidden")
				const src = this.getAttribute('data-modal-src');
				const type = this.getAttribute('data-modal-type');
				let content = '';

				if (type && type.startsWith('image/')) {
					content = `<img src="${src}" alt="Full size image">`;
				} else if (type && type.startsWith('video/')) {
					content = `<div class="modal-video"><video src="${src}" controls autoplay ><p>Trình duyệt không hỗ trợ video.</p></video></div>`;
				}

				modalContent.innerHTML = content;
				modal.style.display = 'flex';
			});
		});

		// Đóng modal
		$('.js-hidden').on('click', function() {
			modal.style.display = 'none';
			$("html body").removeAttr("style")
		});

		// Đóng khi click ngoài content
		window.addEventListener('click', function(event) {
			if (event.target === modal) {
				modal.style.display = 'none';
			}
		});

		// Đóng bằng ESC key
		document.addEventListener('keydown', function(event) {
			if (event.key === 'Escape') {
				modal.style.display = 'none';
			}
		});
	});
</script>