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
	// Lọc bỏ các phần tử null, false, empty
	if ($gallery_items && is_array($gallery_items)) {
		$gallery_items = array_filter($gallery_items);
	}

	if (!empty($gallery_items)) :
	?>
		<section class="p-single__gallery">
			<div class="l-container">
				<div class="p-single__gallery--grid">
					<?php
					foreach ($gallery_items as $index => $item) :
						// Kiểm tra $item có hợp lệ không
						if (!$item || !is_array($item)) continue;

						$mime_type = $item['mime_type'] ?? get_post_mime_type($item['ID'] ?? 0);
						$full_url = $item['url'] ?? wp_get_attachment_url($item['ID'] ?? 0);

						// Kiểm tra URL có tồn tại không
						if (!$full_url) continue;

						$is_image = strpos($mime_type, 'image/') !== false;
						$is_video = strpos($mime_type, 'video/') !== false;
					?>
						<div class="gallery-item <?php echo $is_video ? "is-video" : "" ?>"
							data-slide-index="<?php echo $index; ?>"
							data-modal-src="<?php echo esc_url($full_url); ?>"
							data-modal-type="<?php echo esc_attr($mime_type); ?>">
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
							<?php
							$sec_gallery_3 = get_field('sec_gallery_3', 'option');
							if ($sec_gallery_3):
							?>
								<p class="c-text__intro01">
									<?php echo $lang === "en" ? $sec_gallery_3['intro']['en'] : $sec_gallery_3['intro']['vn']; ?>
								</p>
								<h2 class="c-title__02 type-03">
									<span class="c-title__02--first">
										<?php echo $lang === "en" ? $sec_gallery_3['title_first']['en'] : $sec_gallery_3['title_first']['vn']; ?>
									</span>
									<span class="c-title__02--last">
										<?php echo $lang === "en" ? $sec_gallery_3['title_last']['en'] : $sec_gallery_3['title_last']['vn']; ?>
									</span>
								</h2>
							<?php endif; ?>
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

<!-- Modal cho Gallery với Swiper -->
<div id="gallery-modal" class="modal">
	<div class="modal-bg js-modal-close"></div>
	<div class="modal-body">
		<span class="close js-modal-close">&times;</span>
		<div class="modal-content">
			<div class="swiper modal-swiper">
				<div class="swiper-wrapper">
					<?php
					if ($gallery_items && is_array($gallery_items)) :
						foreach ($gallery_items as $index => $item) :
							$mime_type = $item['mime_type'] ?? get_post_mime_type($item['ID']);
							$full_url = $item['url'] ?? wp_get_attachment_url($item['ID']);
							$is_image = strpos($mime_type, 'image/') !== false;
							$is_video = strpos($mime_type, 'video/') !== false;
					?>
							<div class="swiper-slide">
								<?php if ($is_image) : ?>
									<div class="modal-item modal-video">
										<img src="<?php echo esc_url($full_url); ?>" alt="<?php echo esc_attr($item['alt'] ?? ''); ?>">
									</div>
								<?php elseif ($is_video) : ?>
									<div class="modal-item modal-video">
										<video src="<?php echo esc_url($full_url); ?>" controls>
											<p>Trình duyệt không hỗ trợ video.</p>
										</video>
									</div>
								<?php endif; ?>
							</div>
					<?php
						endforeach;
					endif;
					?>
				</div>
			</div>

			<!-- Navigation buttons -->
			<div class="modal-list01">
				<div class="modal-btn prev js-swiper-button-prev">
				</div>
				<div class="modal-btn next js-swiper-button-next">
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>

<script>
	document.addEventListener('DOMContentLoaded', function() {
		const modal = document.getElementById('gallery-modal');
		const galleryItems = document.querySelectorAll('.gallery-item');
		let modalSwiper = null;

		// Khởi tạo Swiper cho modal
		function initModalSwiper(initialSlide = 0) {
			// Destroy swiper cũ nếu có
			if (modalSwiper) {
				modalSwiper.destroy(true, true);
			}

			// Khởi tạo swiper mới
			modalSwiper = new Swiper('.modal-swiper', {
				initialSlide: initialSlide,
				navigation: {
					nextEl: '.js-swiper-button-next',
					prevEl: '.js-swiper-button-prev',
				},
				keyboard: {
					enabled: true,
					onlyInViewport: false,
				},
				loop: true,
				slidesPerView: 1,
				spaceBetween: 0,
				on: {
					slideChange: function() {
						// Dừng tất cả video khi chuyển slide
						const videos = modal.querySelectorAll('video');
						videos.forEach(video => {
							video.pause();
							video.currentTime = 0;
						});
					}
				}
			});
		}

		// Mở modal khi click gallery-item
		galleryItems.forEach(function(item) {
			item.addEventListener('click', function() {
				const slideIndex = parseInt(this.getAttribute('data-slide-index'));

				// Mở modal và khởi tạo swiper với slide được click
				modal.style.display = 'flex';
				document.body.style.overflow = 'hidden';

				// Delay một chút để đảm bảo modal đã hiển thị
				setTimeout(() => {
					initModalSwiper(slideIndex);
				}, 50);
			});
		});

		// Đóng modal
		const closeElements = document.querySelectorAll('.js-modal-close');
		closeElements.forEach(function(element) {
			element.addEventListener('click', function() {
				closeModal();
			});
		});

		// Hàm đóng modal
		function closeModal() {
			modal.style.display = 'none';
			document.body.style.overflow = '';

			// Dừng tất cả video
			const videos = modal.querySelectorAll('video');
			videos.forEach(video => {
				video.pause();
				video.currentTime = 0;
			});
		}

		// Đóng bằng ESC key
		document.addEventListener('keydown', function(event) {
			if (event.key === 'Escape' && modal.style.display === 'flex') {
				closeModal();
			}
		});
	});
</script>