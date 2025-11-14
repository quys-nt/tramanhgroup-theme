<?php
/**
 * YouTube Player Component
 * 
 * @param array $args {
 *     @type string $youtube_url YouTube URL
 *     @type array  $image       ACF image array
 *     @type string $video_title Optional video title
 *     @type string $section_class Optional additional CSS class
 * }
 */

$youtube_url = isset($args['youtube_url']) ? $args['youtube_url'] : '';
$image = isset($args['image']) ? $args['image'] : null;
$video_title = isset($args['video_title']) ? $args['video_title'] : 'YouTube video';
$section_class = isset($args['section_class']) ? $args['section_class'] : '';

// Function to convert YouTube URL to embed URL
if (!function_exists('get_youtube_embed_url')) {
  function get_youtube_embed_url($url)
  {
    if (empty($url)) {
      return '';
    }
    
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
      return 'https://www.youtube.com/embed/' . $video_id . '?enablejsapi=1';
    }
    
    return '';
  }
}

if ($youtube_url):
  $embed_url = get_youtube_embed_url($youtube_url);
  if ($embed_url):
    // Generate unique ID for multiple instances
    $unique_id = 'youtube-player-' . uniqid();
?>
    <div class="p-business__secVideo <?php echo esc_attr($section_class); ?>" data-youtube-player>
      <iframe
        id="<?php echo esc_attr($unique_id); ?>"
        class="js-youtube-player__iframe"
        width="2545"
        height="810"
        src="<?php echo esc_url($embed_url); ?>"
        title="<?php echo esc_attr($video_title); ?>"
        frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
        referrerpolicy="strict-origin-when-cross-origin"
        allowfullscreen>
      </iframe>
      
      <?php if ($image && isset($image['url'])): ?>
        <img 
          src="<?php echo esc_url($image['url']); ?>" 
          alt="<?php echo esc_attr($image['alt'] ?: $video_title); ?>" 
          class="p-business__secVideo--img js-youtube-thumbnail"
        >
      <?php endif; ?>
      
      <button class="p-business__secVideo--btn js-youtube-play" aria-label="Play video">
        <img 
          src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-play-circle.png" 
          alt="Play"
        >
      </button>
    </div>
<?php
  endif;
endif;
?>