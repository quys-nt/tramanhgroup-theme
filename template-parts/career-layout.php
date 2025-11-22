<?php get_header(); ?>
<main class="p-home">

  <?php
  // Lấy object của danh mục hiện tại
  $term = get_queried_object();
  if ($term && function_exists('get_field')): ?>
    <?php if (have_rows('main_visual', $term)) : ?>
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
                      <p><?php echo esc_html(get_sub_field('title_first')); ?></p>
                      <p><?php echo esc_html(get_sub_field('title_last')); ?></p>
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

    <?php endif; ?>
  <?php endif; ?>

  <?php
  $lang = function_exists('get_current_lang') ? get_current_lang() : 'en';
  $sec_1 = get_field('sec_1', 'option');
  $sec1Intro = $sec_1['intro'];
  $sec1TitleFirst = $sec_1['title_first'];
  $sec1TitleLast = $sec_1['title_last'];
  $sec1Desc = $sec_1['desc'];
  $sec1Items = $sec_1['items'];
  if ($sec_1): ?>
    <section class="p-business__sec01">
      <div class="l-container">
        <div class="p-business__sec01--box01 type-04">
          <div>
            <p class="c-text__intro01">
              <?php echo $lang === "en" ? $sec1Intro['en'] : $sec1Intro['vi']; ?>
            </p>
            <h2 class="c-title__02 type-03">
              <span class="c-title__02--first">
                <?php echo $lang === "en" ? $sec1TitleFirst['en'] : $sec1TitleFirst['vi']; ?>
              </span>
              <span class="c-title__02--last">
                <?php echo $lang === "en" ? $sec1TitleLast['en'] : $sec1TitleLast['vi']; ?>
              </span>
            </h2>
          </div>
          <div>
            <div class="c-text01">
              <?php echo nl2br(esc_html($lang === "en" ? $sec1Desc['en'] : $sec1Desc['vi'])); ?>
            </div>
          </div>
        </div>
        <?php
        $list_count = count($sec1Items);
        if ($list_count > 0):
        ?>
          <div class="p-business__sec01--box02">
            <div class="js-swiper-career01 ">
              <div class="swiper-wrapper">
                <?php foreach ($sec1Items as $item) : ?>
                  <div class="swiper-slide">
                    <div class="sec01__card"
                      style="background-image:linear-gradient(180deg, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.5) 100%), url('<?php echo esc_url($item['image'] ? $item['image']['url'] : ''); ?>');">
                      <div class="sec01__title">
                        <?php echo nl2br(esc_html($lang === "en" ? $item['title']['en'] : $item['title']['vi'])); ?>
                      </div>
                      <div class="sec01__contents">
                        <?php echo nl2br(esc_html($lang === "en" ? $item['contents']['en'] : $item['contents']['vi'])); ?>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>

            <div class="p-career__swiper--list01">
              <div class="c-button prev js-swiper-career-button-prev">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-arrow-right-w.svg" alt="icon-arrow-right-w">
              </div>
              <div class="c-button next js-swiper-career-button-next">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-arrow-right-w.svg" alt="icon-arrow-right-w">
              </div>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </section>
  <?php endif; ?>

  <!-- Career Posts Section with Filter Tabs -->
  <section class="p-archive__sec02">
    <div class="l-container">
      <?php
      $sec_2 = get_field('sec_2', 'option');
      $sec2Intro = $sec_2['intro'] ? $sec_2['intro'] : "";
      $sec2TitleFirst = $sec_2['title_first'] ? $sec_2['title_first'] : "";
      $sec2TitleLast = $sec_2['title_last'] ? $sec_2['title_last'] : "";
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

      <?php
      // Get current category and its translations
      $current_cat = get_queried_object();
      $cat_ids = array($current_cat->term_id);

      // Add translated category IDs if Polylang is active
      if (function_exists('pll_get_term_translations')) {
        $translations = pll_get_term_translations($current_cat->term_id);
        $cat_ids = array_values($translations);
      }

      // Query all career posts để lấy departments
      $args = array(
        'post_type' => 'post',
        'posts_per_page' => -1,
        'category__in' => $cat_ids,
        'orderby' => 'date',
        'order' => 'DESC'
      );

      $career_query = new WP_Query($args);
      $total_posts = $career_query->post_count;

      // Lấy tất cả departments có trong posts
      $active_departments = array();
      while ($career_query->have_posts()) {
        $career_query->the_post();
        $department = get_field('career_department');
        if ($department && !in_array($department, $active_departments)) {
          $active_departments[] = $department;
        }
      }

      if ($career_query->have_posts()) {
        while ($career_query->have_posts()) {
          $career_query->the_post();
          $department = get_field('career_department');
          if ($department && !in_array($department, $active_departments)) {
            $active_departments[] = $department;
          }
        }
        wp_reset_postdata();
      }

      // Sắp xếp departments theo thứ tự định sẵn
      $department_order = array('automotive', 'lubricants', 'yachting', 'retail', 'real_estate', 'sports');
      $sorted_departments = array();
      foreach ($department_order as $dept) {
        if (in_array($dept, $active_departments)) {
          $sorted_departments[] = $dept;
        }
      }
      ?>

      <!-- Filter Tabs - Chỉ hiển thị departments có posts -->
      <?php if (!empty($sorted_departments)) : ?>
        <div class="tabs-nav">
          <button class="js-career-tab tab-btn active" data-department="all">
            <?php echo ($lang === 'vi') ? 'Tất cả' : 'All'; ?>
          </button>
          <?php foreach ($sorted_departments as $dept) : ?>
            <button class="js-career-tab tab-btn" data-department="<?php echo esc_attr($dept); ?>">
              <?php echo esc_html($department_labels[$dept] ?? ucfirst(str_replace('_', ' ', $dept))); ?>
            </button>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>

      <!-- Posts Grid -->
      <div class="posts-grid" id="career-posts-grid">
        <?php
        // Query lại để hiển thị posts
        if ($career_query->have_posts()) :
          $career_query->rewind_posts();
          while ($career_query->have_posts()) : $career_query->the_post();
            $department = get_field('career_department');
            $location = get_field('location');
            $dept_class = $department ? 'dept-' . $department : 'dept-none';
        ?>
            <div class="js-post-item <?php echo esc_attr($dept_class); ?> hidden" data-department="<?php echo esc_attr($department ? $department : 'none'); ?>">
              <?php get_template_part('template-parts/content-recruitment-card', get_post_format(), array(
                'department' => $department,
                'location' => $location,
              )); ?>
            </div>
        <?php
          endwhile;
        else:
          echo '<p class="no-posts-message">' .
            (($lang === 'vi') ? 'Không có bài viết nào.' : 'No posts found.') .
            '</p>';
        endif;

        wp_reset_postdata();
        ?>
      </div>

      <!-- Load More Button -->
      <div class="p-career__post-load-more c-text__center" style="<?php echo ($total_posts <= 9) ? 'display: none;' : ''; ?>">
        <button class="c-btn__04" id="career-load-more">
          <?php echo ($lang === 'vi') ? 'Xem thêm' : 'Load More'; ?>
        </button>
      </div>

    </div>
  </section>

</main>

<?php get_footer(); ?>


<script>
  jQuery(document).ready(function($) {
    let allPosts = [];
    let currentFilteredPosts = [];
    let shownCount = 0;
    const initialPerPage = 9;
    const perPage = 6;
    let currentDepartment = 'all';
    const totalPosts = <?php echo $total_posts ?? 0; ?>;

    // Khởi tạo: Lưu tất cả posts và hiển thị initial 9 cho 'all'
    function initPosts() {
      allPosts = $('.js-post-item').toArray();
      applyFilter('all');
    }

    // Áp dụng filter và reset pagination
    function applyFilter(department) {
      currentDepartment = department;
      if (department === 'all') {
        currentFilteredPosts = allPosts.slice();
      } else {
        currentFilteredPosts = allPosts.filter(post => $(post).data('department') === department);
      }

      // Ẩn tất cả posts
      $('.js-post-item').addClass('hidden');

      // Reset shown count
      shownCount = 0;

      // Hiển thị initial 9
      const initialEnd = Math.min(initialPerPage, currentFilteredPosts.length);
      for (let i = 0; i < initialEnd; i++) {
        $(currentFilteredPosts[i]).removeClass('hidden').fadeIn(300);
      }
      shownCount = initialEnd;

      // Cập nhật load more button
      updateLoadMoreButton();

      // Xử lý no posts
      handleNoPosts();
    }

    // Hiển thị thêm posts
    function loadMorePosts() {
      const start = shownCount;
      const toShow = Math.min(perPage, currentFilteredPosts.length - shownCount);
      if (toShow <= 0) {
        return;
      }

      const end = start + toShow;
      for (let i = start; i < end; i++) {
        $(currentFilteredPosts[i]).removeClass('hidden').fadeIn(300);
      }

      shownCount += toShow;

      // Cập nhật load more button
      updateLoadMoreButton();

      // Xóa no-posts nếu có
      $('.no-posts-message').remove();
    }

    // Cập nhật hiển thị button load more
    function updateLoadMoreButton() {
      const totalFiltered = currentFilteredPosts.length;
      const hasMore = shownCount < totalFiltered && totalFiltered > 0;

      if (hasMore) {
        $('#career-load-more').show();
      } else {
        $('#career-load-more').hide();
      }
    }

    // Xử lý thông báo không có posts
    function handleNoPosts() {
      const totalFiltered = currentFilteredPosts.length;
      if (totalFiltered === 0) {
        if ($('.no-posts-message').length === 0) {
          const lang = $('html').attr('lang') || 'en';
          const message = lang === 'vi' ? 'Không có bài viết trong mục này.' : 'No posts in this category.';
          $('#career-posts-grid').append('<p class="no-posts-message">' + message + '</p>');
        }
        $('#career-load-more').hide();
      } else {
        $('.no-posts-message').remove();
      }
    }

    // Event cho filter tabs
    $('.js-career-tab').on('click', function() {
      const department = $(this).data('department');

      // Update active tab
      $('.js-career-tab').removeClass('active');
      $(this).addClass('active');

      // Áp dụng filter
      applyFilter(department);
    });

    // Event cho load more
    $('#career-load-more').on('click', function() {
      loadMorePosts();
    });

    // Khởi tạo khi DOM ready
    initPosts();
  });
</script>