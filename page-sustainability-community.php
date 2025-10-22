<?php
/*
Template Name: Sustainability & Community
Description: English Sustainability & Community page with journey, core values, etc.
*/
?>
<?php get_header(); ?>
<main>

  <section class="p-home__mv">
    <div class="js-swiper-mv">
      <div class="swiper-wrapper">
        <?php if (have_rows('main_visual', '')) : ?>
          <?php while (have_rows('main_visual', '')) : the_row(); ?>
            <?php $image = get_sub_field('mv_image'); ?>
            <div class="swiper-slide">
              <div class="p-home__mv--item">
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="p-home__mv--thumbnail">
                <div class="p-home__mv--contents type-02">
                  <h1 class="p-home__mv--title">
                    <p><?php echo esc_attr(get_sub_field('title_first')) ?></p>
                    <p><?php echo esc_attr(get_sub_field('title_last')) ?></p>
                  </h1>
                  <div class="p-home__mv--text01">
                    <?php echo wp_kses_post(get_sub_field('mv_description')) ?>
                  </div>
                  <div>
                    <a href=" <?php echo esc_attr(get_sub_field('link_button')) ?> " class="c-btn__01 download">
                      <?php echo esc_attr(get_sub_field('text_button')) ?>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          <?php endwhile; ?>
        <?php endif; ?>
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </section>

  <section class="p-cus__sec01">
    <div class="l-container">
      <div class="p-cus__sec01--box01">
        <div class="p-cus__sec01--item">
          <p class="c-text__intro01">
            CSR Introduction
          </p>
          <h2 class="c-title__02 type-03">
            <span class="c-title__02--last">
              Our Dedication to
            </span>
            <span class="c-title__02--first">
              Lasting Impact
            </span>
          </h2>
        </div>
        <div class="p-cus__sec01--item">
          <div class="text01">
            Our operations across diverse sectors are unified by a steadfast commitment to ethical conduct, pioneering spirit, and collective advancement.
          </div>
        </div>

      </div>
      <div class="p-cus__sec01--box02">
        <div class="p-cus__sec01--list">
          <div class="sec-item is-active">
            <div class="text01">
              Reducing our ecological footprint through green technology adoption, waste optimization, and promoting a circular economy across our industrial and operational divisions.
            </div>
            <div class="text02">
              Environmental Stewardship
            </div>
          </div>
          <div class="sec-item">
            <div class="text01">
              Investing in human capital, ensuring ethical labor practices, and supporting community development through education, healthcare access, and employee volunteer programs.
            </div>
            <div class="text02">
              Social Empowerment
            </div>
          </div>
          <div class="sec-item">
            <div class="text01">
              Maintaining the highest standards of transparency and accountability. We ensure robust corporate governance that aligns all subsidiaries with our core value of Integrity and strict regulatory compliance.
            </div>
            <div class="text02">
              Governance & Ethics
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="p-cus__sec02">
    <div class="l-container">
      <div class="p-cus__sec02--inner">
        <div class="text01 js-animation-typewriter">
          We also aim for <span class="border">ESG</span>, which is our <span>defining strategy for Sustainable growth</span>. We prioritize <span class="icon icon01"></span> <span>Decarbonization</span> and <span class="icon icon02"></span> <span>Community Investment</span> while ensuring <span>Integrity</span> and transparent <span>Governance</span>, pioneering the Future for all stakeholders.
        </div>
        <div class="p-cus__sec02--box01">
          <a href="#" class="c-btn__08">
            See How We Did it
          </a>
        </div>
      </div>
    </div>
  </section>

  <section class="p-cus__sec03">
    <div class="l-container">
      <div class="p-cus__sec03--box01">
        <div class="p-cus__sec01--item">
          <p class="c-text__intro01">
            Sports initiatives
          </p>
          <h2 class="c-title__02 type-03">
            <span class="c-title__02--last">
              Fostering
            </span>
            <span class="c-title__02--first">
              Excellence and Community
            </span>
          </h2>
        </div>
        <div class="p-cus__sec01--item">
          <div class="text01">
            We’re dedicated to advancing sports and community well-being. By investing in athletes, infrastructure, and grassroots programs, we create opportunities that make sports accessible to all.
          </div>
        </div>
      </div>
      <div class="p-cus__sec03--box02"
        style="background-image: linear-gradient(0deg, rgba(0, 0, 0, 0.2) 0%, rgba(0, 0, 0, 0.2) 100%),  url('<?php echo get_template_directory_uri(); ?>/assets/images/dummy-01.png');">
        <button class="btn">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-play-circle.png" alt="icon-play-circle">
        </button>
      </div>
      <div class="p-cus__sec03--box03">
        <div class="sport-item">
          <div class="text01">
            High-Performance Sponsorships
          </div>
          <div class="text02">
            We fund and support athletes to help them compete confidently on national and global stages.
          </div>
        </div>
        <div class="sport-item">
          <div class="text01">
            Grassroots Development
          </div>
          <div class="text02">
            We nurture young talent in underserved areas, building unity and promoting active lifestyles.
          </div>
        </div>
        <div class="sport-item">
          <div class="text01">
            Infrastructure & Events
          </div>
          <div class="text02">
            We develop world-class facilities and host premier events that inspire athletes and engage communities.
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="p-about__sec04">
    <div class="l-container">
      <div class="l-container">
        <div class="c-text__center">
          <p class="c-text__intro01">
            Our Achievements
          </p>
          <h2 class="c-title__02 type-02">
            <span class="c-title__02--first">
              Our Impact
            </span>
            <span class="c-title__02--last">
              since 1996
            </span>
          </h2>
        </div>
      </div>
      <div class="p-about__sec04--box01 type-02">
        <div class="item">
          <div>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-health.svg" alt="icon ">
          </div>
          <div>
            <div class="group">
              <div class="numbber">
                1.5
              </div>
              <div class="text">
                billion
              </div>
            </div>
            <div class="desc">
              Invested in community health projects
            </div>
          </div>
        </div>
        <div class="item">
          <div>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-bolt-circle.svg" alt="icon ">
          </div>
          <div>
            <div class="group">
              <div class="numbber">
                15%
              </div>
              <div class="text">
                reduction
              </div>
            </div>
            <div class="desc">
              In group-wide energy consumption
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

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