<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<main class="js-main-custom">
			<section class="p-page__sec01">
				<div class="l-container">
					<?php
					$title1 = get_field('title_first');
					$title2 = get_field('title_last');
					?>
					<h1 class="page-title">
						<span class="page-title-first">
							<?php echo esc_html($title1); ?>
						</span>
						<span class="page-title-last">
							<?php echo esc_html($title2); ?>
						</span>
					</h1>

					<div class="p-page__sec01--grid">
						<article class="page-contents content-area">
							<?php the_content(); ?>
						</article>
						<div class="p-page__sec01--toc">
							<div class="toc-body">
								<h3 class="title">
									In this article
								</h3>
								<ul class="toc-list" id="table-of-contents"></ul>
							</div>
						</div>
					</div>
				</div>
			</section>
		</main>

<?php
	endwhile;
endif;
?>

<?php get_footer(); ?>
<script>
	const $header = $('.js-header');
	const $main = $('.js-main-custom');

	$header.addClass('is-white');

	function updateMainMargin() {
		if ($main.length && $header.length) {
			$main.css("margin-top", $header.outerHeight() + "px");
		}
	}

	updateMainMargin();
	$(window).on("resize", updateMainMargin);

	$(document).ready(function() {

		$('#table-of-contents').toc({
			content: '.content-area',
			headings: 'h1,h2,h3'
		});
	});
	
	$(document).ready(function() {
		const tocLinks = $('#table-of-contents a');
		const observerOptions = {
			rootMargin: '-20% 0px -60% 0px',
			threshold: 0
		};

		const observer = new IntersectionObserver((entries) => {
			entries.forEach(entry => {
				const id = entry.target.id;
				const tocLink = $(`#table-of-contents a[href="#${id}"]`);

				if (entry.isIntersecting) {
					// Xóa active class từ tất cả li
					$('#table-of-contents li').removeClass('active');
					// Thêm active class cho li cha
					tocLink.parent('li').addClass('active');
				}
			});
		}, observerOptions);

		tocLinks.each(function() {
			const href = $(this).attr('href');
			if (href && href.startsWith('#')) {
				const sectionId = href.substring(1);
				const section = document.querySelector(`[id="${sectionId}"]`);
				if (section) {
					observer.observe(section);
				}
			}
		});
	});
</script>