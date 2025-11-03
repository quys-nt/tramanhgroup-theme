<?php
/*
Template Name: Contact & Investor Relations
Description: English Contact & Investor Relations page with journey, core values, etc.
*/
?>
<?php get_header(); ?>

<?php
// Hàm helper để format file size từ bytes sang KB/MB/GB (với 2 chữ số thập phân)
function format_file_size($bytes, $decimals = 2)
{
  if ($bytes == 0) return '0 B';
  $units = array('B', 'KB', 'MB', 'GB', 'TB');
  $i = 0;
  while (($bytes / pow(1024, $i + 1)) > 1) {
    $i++;
  }
  $size = $bytes / pow(1024, $i);
  return round($size, $decimals) . ' ' . $units[$i];
}

// Hàm helper để lấy extension từ filename (lowercase, không có dấu chấm)
function get_file_extension($filename)
{
  return strtolower(pathinfo($filename, PATHINFO_EXTENSION));
}
?>

<main>

  <?php if (have_rows('main_visual', '')) : ?>
    <section class="p-home__mv">
      <div class="js-swiper-mv">
        <div class="swiper-wrapper">
          <?php while (have_rows('main_visual', '')) : the_row(); ?>
            <?php $image = get_sub_field('mv_image'); ?>
            <div class="swiper-slide">
              <div class="p-home__mv--item">
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="p-home__mv--thumbnail">
                <div class="p-home__mv--contents type-02">
                  <h1 class="p-home__mv--title">
                    <p><?php echo esc_html_e(get_sub_field('title_first')) ?></p>
                    <p><?php echo esc_html_e(get_sub_field('title_last')) ?></p>
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

  <?php
  $sec_contact_1 = get_field('sec_contact_1');
  $sec1Intro = $sec_contact_1['intro'];
  $sec1TitleFirst = $sec_contact_1['title_first'];
  $sec1TitleLast = $sec_contact_1['title_last'];
  $sec1Desc = $sec_contact_1['desc'];
  $sec1Grids = $sec_contact_1['grids'];
  if ($sec_contact_1): ?>
    <section class="p-contact__sec01">
      <div class="l-container">
        <div class="p-contact__sec01--box01">
          <div>
            <p class="c-text__intro01">
              <?php echo $sec1Intro; ?>
            </p>
            <h2 class="c-title__02 type-03">
              <span class="c-title__02--first">
                <?php echo $sec1TitleFirst; ?>
              </span>
              <span class="c-title__02--last">
                <?php echo $sec1TitleLast; ?>
              </span>
            </h2>
          </div>
          <div>
            <div class="p-contact__sec01--desc">
              <?php echo $sec1Desc; ?>
            </div>
          </div>
        </div>
        <div class="p-contact__sec01--box02">
          <div class="sec01-item01">
            <img src="<?php echo esc_url($sec1Grids['image']['url']); ?>" alt="<?php echo esc_attr($sec1Grids['image']['alt']); ?>">
          </div>
          <div class="sec01-item02">
            <p class="text01">
              <?php echo esc_html_e($sec1Grids['item_1']['text_1']); ?>
            </p>
            <p class="text02">
              <?php echo esc_html_e($sec1Grids['item_1']['text_2']); ?>
            </p>
            <p class="text03">
              <?php echo esc_html_e($sec1Grids['item_1']['text_3']); ?>
            </p>
          </div>
          <div class="sec01-item03">
            <p class="text01">
              <?php echo esc_html_e($sec1Grids['item_2']['text_1']); ?>
            </p>
            <p class="text02">
              <?php echo esc_html_e($sec1Grids['item_2']['text_2']); ?>
            </p>
          </div>
          <div class="sec01-item04">
            <p class="text01">
              <?php echo esc_html_e($sec1Grids['item_3']['text_1']); ?>
            </p>
          </div>
        </div>
      </div>
    </section>
  <?php endif; ?>

  <?php
  $sec_contact_2 = get_field('sec_contact_2');
  $sec2Image = $sec_contact_2['image'];
  if ($sec_contact_2): ?>
    <div class="p-contact__sec02">
      <div class="p-cus__sec03--box02"
        style="background-image: linear-gradient(0deg, rgba(0, 0, 0, 0.2) 0%, rgba(0, 0, 0, 0.2) 100%),  url('<?php echo esc_url($sec2Image['url']); ?>');">
        <button class="btn">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-play-circle.png" alt="icon-play-circle">
        </button>
      </div>
    </div>
  <?php endif; ?>

  <?php
  $sec_contact_3 = get_field('sec_contact_3');
  $sec3Intro = $sec_contact_3['intro'];
  $sec3TitleFirst = $sec_contact_3['title_first'];
  $sec3TitleLast = $sec_contact_3['title_last'];
  $sec3Form = $sec_contact_3['form'];
  $sec3Image = $sec_contact_3['image'];
  if ($sec_contact_3): ?>
    <section class="p-contact__sec03">
      <div class="l-container">
        <div class="p-contact__sec03--box01">
          <div>
            <p class="c-text__intro01">
              <?php echo $sec3Intro; ?>
            </p>
            <h2 class="c-title__02 type-03">
              <span class="c-title__02--first">
                <?php echo $sec3TitleFirst; ?>
              </span>
              <span class="c-title__02--last">
                <?php echo $sec3TitleLast; ?>
              </span>
            </h2>
            <div class="p-contact__sec03--form">
              <?php
              echo do_shortcode($sec3Form);
              ?>
            </div>
          </div>
          <div>
            <img src="<?php echo esc_url($sec3Image['url']); ?>" alt="<?php echo esc_attr($sec3Image['alt']); ?>">
          </div>
        </div>
      </div>
    </section>
  <?php endif; ?>

  <?php
  $sec_contact_4 = get_field('sec_contact_4');
  $sec4Intro = $sec_contact_4['intro'];
  $sec4TitleFirst = $sec_contact_4['title_first'];
  $sec4TitleLast = $sec_contact_4['title_last'];
  $sec4Lists = $sec_contact_4['lists'] ?? [];  // Fallback mảng rỗng nếu không tồn tại
  // var_dump($sec4Lists); // Bỏ comment nếu cần debug
  if ($sec_contact_4 && !empty($sec4Lists)):  // Kiểm tra thêm !empty($sec4Lists) để đảm bảo có items
  ?>
    <section class="p-contact__sec04">
      <div class="l-container">
        <div class="p-contact__sec04--box01">
          <div class="c-text__center">
            <p class="c-text__intro01">
              <?php echo $sec4Intro; ?>
            </p>
            <h2 class="c-title__02 type-02">
              <span class="c-title__02--first">
                <?php echo $sec4TitleFirst; ?>
              </span>
              <span class="c-title__02--last">
                <?php echo $sec4TitleLast; ?>
              </span>
            </h2>
          </div>
        </div>
        <div class="p-contact__sec04--box02">
          <?php
          // Kiểm tra length trước khi foreach (dùng count() để lấy số lượng items)
          $list_count = count($sec4Lists);
          if ($list_count > 0):  // Chỉ chạy nếu length > 0
            foreach ($sec4Lists as $item) :
              // Lấy extension từ filename (an toàn hơn subtype cho các MIME type phức tạp)
              $extension = get_file_extension($item['filename']);
              $icon = 'icon-default.svg';  // Icon fallback

              if ($extension === 'pdf') {
                $icon = 'icon-pdf.svg';
              } elseif (in_array($extension, ['xls', 'xlsx'])) {  // Hỗ trợ cả xls và xlsx
                $icon = 'icon-xls.svg';  // Giả sử tên icon cho Excel là icon-xls.svg
              } else {
                $icon = 'icon-file.svg';
              }
              // Bạn có thể thêm case khác: elseif ($extension === 'doc') { $icon = 'icon-doc.svg'; }
              // elseif ($extension === 'docx') { $icon = 'icon-docx.svg'; }
          ?>
              <div class="file-item">
                <img src="<?php echo get_template_directory_uri() . '/assets/images/' . $icon ?>" alt="<?php echo esc_attr($extension); ?> file icon">
                <div class="file-content">
                  <h3 class="title">
                    <?php esc_html_e($item['title']) ?>
                  </h3>
                  <p class="text01">
                    <?php echo format_file_size($item['filesize']); // Sử dụng hàm để format size 
                    ?>
                  </p>
                </div>
                <a href="<?php echo esc_attr($item['url']) ?>" download class="c-btn__01 download">
                  Download
                </a>
              </div>

          <?php endforeach;
          else:  // Fallback nếu length = 0
          // Hiển thị message tùy chọn, ví dụ:
          // echo '<p>Không có file nào để hiển thị.</p>';
          endif;
          ?>
        </div>
      </div>
    </section>
  <?php endif; ?>

</main>
<?php get_footer(); ?>