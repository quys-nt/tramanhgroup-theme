<?php
/*
Template Name: Automotive & Mobility Relations
Description: English Automotive & Mobility Relations page with journey, core values, etc.
*/
?>
<?php get_header(); ?>


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
                    <p><?php echo esc_html_e(get_sub_field('title_first')); ?></p>
                    <p><?php echo esc_html_e(get_sub_field('title_last')); ?></p>
                  </h1>
                  <div class="p-home__mv--text01">
                    <?php echo wp_kses_post(get_sub_field('mv_description')); ?>
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
  $sec_1 = get_field('sec_1');
  $sec1Intro = $sec_1['intro'];
  $sec1TitleFirst = $sec_1['title_first'];
  $sec1TitleLast = $sec_1['title_last'];
  $sec1Desc = $sec_1['desc'];
  $sec1Items = $sec_1['items'];
  if ($sec_1): ?>
    <section class="p-audio__sec01">
      <div class="l-container">
        <div class="p-audio__sec01--box01">
          <div>
            <p class="c-text__intro01">
              <?php echo esc_html($sec1Intro); ?>
            </p>
            <h2 class="c-title__02 type-03">
              <span class="c-title__02--first">
                <?php echo esc_html($sec1TitleFirst); ?>
              </span>
              <span class="c-title__02--last">
                <?php echo esc_html($sec1TitleLast); ?>
              </span>
            </h2>
          </div>
          <div>
            <div class="c-text02">
              <?php echo esc_html($sec1Desc); ?>
            </div>
          </div>
        </div>
        <?php
        $list_count = count($sec1Items);
        if ($list_count > 0):
        ?>
          <div class="p-audio__sec01--box02">
            <?php foreach ($sec1Items as $item) : ?>

              <div class="sec01__card"
                style="background-image:linear-gradient(180deg, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.5) 100%), url('<?php echo esc_url($item['image'] ? $item['image']['url'] : ''); ?>');">
                <div class="sec01__title">
                  <?php echo nl2br(esc_html($item['title'])); ?>
                </div>
                <div class="sec01__contents">
                  <?php echo nl2br(esc_html($item['contents'])); ?>
                </div>
              </div>

            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>
    </section>
  <?php endif; ?>

  <?php
  $sec_2 = get_field('sec_2');
  $sec2Intro = $sec_2['intro'];
  $sec2TitleFirst = $sec_2['title_first'];
  $sec2TitleLast = $sec_2['title_last'];
  $sec2ItemsFirst = $sec_2['item_first'];
  $sec2Items = $sec_2['items'];
  if ($sec_2): ?>
    <section class="p-audio__sec02">
      <div class="l-container">
        <div class="p-audio__sec02--box01">
          <p class="c-text__intro01">
            <?php echo esc_html($sec1Intro); ?>
          </p>
          <h2 class="c-title__02 type-02">
            <span class="c-title__02--last">
              <?php echo esc_html($sec1TitleFirst); ?>
            </span>
            <span class="c-title__02--first">
              <?php echo esc_html($sec1TitleLast); ?>
            </span>
          </h2>
        </div>

        <?php
        $list_count = count($sec1Items);
        if ($list_count > 0):
        ?>
          <div class="p-audio__sec02--box02">

            <div class="sec02__card">
              <p class="sec02__card-first-text01"><?php echo esc_html($sec2ItemsFirst["text_1"]); ?></p>
              <div class="sec02__card-first-text02"><?php echo esc_html($sec2ItemsFirst["text_2"]); ?></div>
              <div class="sec02__card-first-text03"><?php echo nl2br(esc_html($sec2ItemsFirst["text_3"])); ?></div>
            </div>
            <?php foreach ($sec2Items as $item) : ?>
              <div class="sec02__card">
                <div class="text01">
                  <?php echo esc_html($item['title']); ?>
                </div>
                <div class="text02">
                  <?php echo esc_html($item['contents']); ?>
                </div>
              </div>
            <?php endforeach; ?>

          </div>
        <?php endif; ?>
      </div>
    </section>
  <?php endif; ?>

  <?php
  get_template_part('template-parts/sections/contact-map');
  ?>


  <?php
  $sec_4 = get_field('sec_4');
  $sec4Image = $sec_4['image'];
  $sec4Intro = $sec_4['intro'];
  $sec4Button = $sec_4['button'];
  if ($sec_4): ?>
    <section class="p-audio__sec04">
      <img src="<?php echo esc_attr($sec4Image['url']); ?>" alt="<?php echo esc_attr($sec4Image['alt']); ?>" class="p-audio__sec04--bg">
      <div class="p-audio__sec04--contents">
        <p class="text01">
          <?php echo esc_html($sec4Intro); ?>
        </p>
        <a href=" <?php echo esc_attr($sec4Button['link']); ?>" class="c-btn__10">
          <?php echo esc_html($sec4Button['text']); ?>
        </a>
      </div>
    </section>
  <?php endif; ?>

  <?php
  $sec_5 = get_field('sec_5'); // Group field
  $youtube_url = $sec_5['youtube_url']; // URL field
  $sec5Image = $sec_5['image']; // URL field

  // Function to convert YouTube URL to embed URL
  function get_youtube_embed_url($url)
  {
    if (empty($url)) {
      return '';
    }
    // Extract video ID from various YouTube URL formats
    $video_id = '';

    // Format: https://youtu.be/VIDEO_ID
    if (preg_match('/youtu\.be\/([^\?&]+)/', $url, $matches)) {
      $video_id = $matches[1];
    }
    // Format: https://www.youtube.com/watch?v=VIDEO_ID
    elseif (preg_match('/youtube\.com\/watch\?v=([^\?&]+)/', $url, $matches)) {
      $video_id = $matches[1];
    }
    // Format: https://www.youtube.com/embed/VIDEO_ID
    elseif (preg_match('/youtube\.com\/embed\/([^\?&]+)/', $url, $matches)) {
      $video_id = $matches[1];
    }
    if ($video_id) {
      return 'https://www.youtube.com/embed/' . $video_id . '?enablejsapi=1&autoplay=1';
    }
    return '';
  }

  if ($sec_5 && $youtube_url):
    $embed_url = get_youtube_embed_url($youtube_url);
    if ($embed_url):
  ?>
      <div class="p-audio__sec05">
        <iframe
          id="player"
          width="2545"
          height="810"
          src="<?php echo esc_url($embed_url); ?>"
          title="<?php echo esc_attr($sec_5['video_title'] ?: 'YouTube video'); ?>"
          frameborder="0"
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
          referrerpolicy="strict-origin-when-cross-origin"
          allowfullscreen>
        </iframe>
        <img src="<?php echo esc_attr($sec5Image['url']); ?>" alt="<?php echo esc_attr($sec5Image['akt']); ?>" class="p-audio__sec05--img js-thumbnail-youtube">
        <button class="p-audio__sec05--btn js-show-youtube">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-play-circle.png" alt="icon-play-circle">
        </button>
      </div>
  <?php
    endif;
  endif;
  ?>

  <?php get_template_part('template-parts/sections/contact'); ?>

</main>
<?php get_footer(); ?>

<script src="https://www.youtube.com/iframe_api"></script>
<script>
  var player;
  var playerReady = false;

  // This function is called when the YouTube Iframe API is ready
  function onYouTubeIframeAPIReady() {
    player = new YT.Player('player', {
      events: {
        'onReady': onPlayerReady
      }
    });
  }

  // This function is called when the player is ready
  function onPlayerReady(event) {
    playerReady = true;
  }

  // Make the onYouTubeIframeAPIReady function globally accessible
  window.onYouTubeIframeAPIReady = onYouTubeIframeAPIReady;

  // Handle play button click
  jQuery(document).ready(function($) {
    $('.js-show-youtube').on('click', function() {
      // Hide thumbnail and button
      $(this).hide();
      $('.js-thumbnail-youtube').hide();

      // Play video if player is ready
      if (playerReady && player && typeof player.playVideo === 'function') {
        player.playVideo();
      } else {
        // If player not ready, wait and try again
        setTimeout(function() {
          if (player && typeof player.playVideo === 'function') {
            player.playVideo();
          }
        }, 500);
      }
    });
  });
</script>