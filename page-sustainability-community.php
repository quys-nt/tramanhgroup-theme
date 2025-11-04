<?php
/*
Template Name: Sustainability & Community
Description: English Sustainability & Community page with journey, core values, etc.
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
                    <p><?php echo esc_html(get_sub_field('title_first')) ?></p>
                    <p><?php echo esc_html(get_sub_field('title_last')) ?></p>
                  </h1>
                  <div class="p-home__mv--text01">
                    <?php echo wp_kses_post(get_sub_field('mv_description')) ?>
                  </div>
                  <div>
                    <a href=" <?php echo esc_html_e(get_sub_field('link_button')) ?> " class="c-btn__01 download">
                      <?php echo esc_html(get_sub_field('text_button')) ?>
                    </a>
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
  $section_1 = get_field('section_1');
  $box01Intro = $section_1['intro'];
  $box01TitleFirst = $section_1['title_first'];
  $box01TitleLast = $section_1['title_last'];
  $box01Desc = $section_1['desc'];
  $box01Item = $section_1['item'];
  if ($section_1) {
  ?>
    <section class="p-cus__sec01">
      <div class="l-container">
        <div class="p-cus__sec01--box01">
          <div class="p-cus__sec01--item">
            <p class="c-text__intro01">
              <?php esc_html_e($box01Intro) ?>
            </p>
            <h2 class="c-title__02 type-03">
              <span class="c-title__02--last">
                <?php esc_html_e($box01TitleFirst) ?>
              </span>
              <span class="c-title__02--first">
                <?php esc_html_e($box01TitleLast) ?>
              </span>
            </h2>
          </div>
          <div class="p-cus__sec01--item">
            <div class="text01">
              <?php esc_html_e($box01Desc) ?>
            </div>
          </div>

        </div>

        <?php if ($box01Item) : ?>
          <div class="p-cus__sec01--box02">
            <div class="p-cus__sec01--list">

              <?php foreach ($box01Item as $key => $item) :
                $title = $item['title'];
                $desc = $item['desc'];
              ?>
                <div class="sec-item <?php echo $key == 0 ? " is-active" : "" ?> ">
                  <div class="text01">
                    <?php esc_html_e($desc); ?>
                  </div>
                  <div class="text02">
                    <?php esc_html_e($title); ?>
                  </div>
                </div>
              <?php endforeach; ?>

            </div>
          </div>
        <?php endif; ?>
      </div>
    </section>
  <?php } ?>

  <?php
  $section_2 = get_field('section_2');
  $sec2Contents = $section_2['content'];
  $sec2Button = $section_2['button_text'];
  $sec2ButtonLink = $section_2['button_link'];
  if ($section_2) {
  ?>
    <section class="p-cus__sec02">
      <div class="l-container">
        <div class="p-cus__sec02--inner">
          <div class="text01 js-animation-typewriter">
            <?php echo $sec2Contents; ?>
          </div>
          <div class="p-cus__sec02--box01">
            <a href="<?php esc_attr_e($sec2ButtonLink); ?>" class="c-btn__08">
              <?php esc_html_e($sec2Button); ?>
            </a>
          </div>
        </div>
      </div>
    </section>
  <?php } ?>

  <?php
  $section_3 = get_field('section_3');
  $sec3Intro = $section_3['intro'];
  $sec3TitleFirst = $section_3['title_first'];
  $sec3TitleLast = $section_3['title_last'];
  $sec3Desc = $section_3['desc'];
  $sec3Image = $section_3['image'];
  $sec3Item = $section_3['item'];
  if ($section_3) {
  ?>
    <section class="p-cus__sec03">
      <div class="l-container">
        <div class="p-cus__sec03--box01">
          <div class="p-cus__sec01--item">
            <p class="c-text__intro01">
              <?php esc_html_e($sec3Intro); ?>
            </p>
            <h2 class="c-title__02 type-03">
              <span class="c-title__02--last">
                <?php esc_html_e($sec3TitleFirst); ?>
              </span>
              <span class="c-title__02--first">
                <?php esc_html_e($sec3TitleLast); ?>
              </span>
            </h2>
          </div>
          <div class="p-cus__sec01--item">
            <div class="text01">
              <?php esc_html_e($sec3Desc); ?>
            </div>
          </div>
        </div>
        <div class="p-cus__sec03--box02"
          style="background-image: linear-gradient(0deg, rgba(0, 0, 0, 0.2) 0%, rgba(0, 0, 0, 0.2) 100%),  url('<?php echo esc_url($sec3Image['url']); ?>');">
          <button class="btn">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-play-circle.png" alt="icon-play-circle">
          </button>
        </div>
        <?php if ($sec3Item) : ?>
          <div class="p-cus__sec03--box03">
            <?php foreach ($sec3Item as $key => $item) :
              $title = $item['title'];
              $desc = $item['desc'];
            ?>
              <div class="sport-item">
                <div class="text01">
                  <?php esc_html_e($title); ?>
                </div>
                <div class="text02">
                  <?php esc_html_e($desc); ?>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>
    </section>
  <?php } ?>

  <?php
  $section_4 = get_field('section_4');
  $sec4Intro = $section_4['intro'];
  $sec4TitleFirst = $section_4['title_first'];
  $sec4TitleLast = $section_4['title_last'];
  $sec4Item = $section_4['item'];
  if ($section_4) {
  ?>
    <section class="p-about__sec04">
      <div class="l-container">
        <div class="l-container">
          <div class="c-text__center">
            <p class="c-text__intro01">
              <?php esc_html_e($sec4Intro); ?>
            </p>
            <h2 class="c-title__02 type-02">
              <span class="c-title__02--first">
                <?php esc_html_e($sec4TitleFirst); ?>
              </span>
              <span class="c-title__02--last">
                <?php esc_html_e($sec4Intro); ?>
              </span>
            </h2>
          </div>
        </div>
        <?php if ($sec4Item) : ?>
          <div class="p-about__sec04--box01 type-02">

            <?php foreach ($sec4Item as $key => $item) :
              $icon = $item['icon'];
              $number = $item['number'];
              $title = $item['title'];
              $desc = $item['desc'];
            ?>
              <div class="item">
                <div>
                  <img src="<?php echo esc_url($icon['url']); ?>" alt="<?php esc_attr_e($icon['alt']); ?> ">
                </div>
                <div>
                  <div class="group">
                    <div class="number js-count-number">
                      <?php esc_html_e($number); ?>
                    </div>
                    <div class="text">
                      <?php esc_html_e($title); ?>
                    </div>
                  </div>
                  <div class="desc">
                    <?php esc_html_e($desc); ?>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>
    </section>
  <?php } ?>

  <?php get_template_part('template-parts/sections/commitment'); ?>
</main>
<?php get_footer(); ?>
<script>
  jQuery(document).ready(function($) {
    $(".sec-item").hover(function() {
      $(".sec-item").removeClass("is-active");
      $(this).addClass("is-active");
    });

    if ($('.js-animation-typewriter').length) {
      var $typewriterEl = $('.js-animation-typewriter');
      var fullText = $typewriterEl.html();
      $typewriterEl.html('');
      var spanRegex = /<span([^>]*)>(.*?)<\/span>/gs;
      var parts = [];
      var lastIndex = 0;
      var match;
      while ((match = spanRegex.exec(fullText)) !== null) {
        if (match.index > lastIndex) {
          parts.push({
            type: 'text',
            content: fullText.substring(lastIndex, match.index)
          });
        }
        parts.push({
          type: 'span',
          openTag: '<span' + match[1] + '>',
          innerContent: match[2],
          closeTag: '</span>'
        });
        lastIndex = spanRegex.lastIndex;
      }
      if (lastIndex < fullText.length) {
        parts.push({
          type: 'text',
          content: fullText.substring(lastIndex)
        });
      }
      var currentPartIndex = 0;
      var typingSpeed = 50;
      var tagDelay = 100;

      function typeNextPart() {
        if (currentPartIndex < parts.length) {
          var part = parts[currentPartIndex];
          if (part.type === 'span') {
            var $tempSpan = $(part.openTag);
            $typewriterEl.append($tempSpan);
            var innerCharIndex = 0;

            function typeInnerChar() {
              if (innerCharIndex < part.innerContent.length) {
                var charNode = document.createTextNode(part.innerContent.charAt(innerCharIndex));
                $tempSpan.append(charNode);
                innerCharIndex++;
                setTimeout(typeInnerChar, typingSpeed);
              } else {
                currentPartIndex++;
                setTimeout(typeNextPart, tagDelay);
              }
            }
            typeInnerChar();
          } else {
            var charIndex = 0;

            function typeChar() {
              if (charIndex < part.content.length) {
                var charNode = document.createTextNode(part.content.charAt(charIndex));
                $typewriterEl.append(charNode);
                charIndex++;
                setTimeout(typeChar, typingSpeed);
              } else {
                currentPartIndex++;
                setTimeout(typeNextPart, typingSpeed);
              }
            }
            typeChar();
          }
        }
      }
      var observerOptions = {
        threshold: 0.5,
        rootMargin: '0px 0px -100px 0px'
      };
      var observer = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
          if (entry.isIntersecting && !$typewriterEl.hasClass('typing-started')) {
            $typewriterEl.addClass('typing-started');
            setTimeout(typeNextPart, 500);
            observer.unobserve(entry.target);
          }
        });
      }, observerOptions);
      observer.observe($typewriterEl[0]);
    }
  });
</script>