<?php
/*
Template Name: Leadership & Vision
Description: English Leadership & Vision page with journey, core values, etc.
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
                <div class="p-home__mv--contents">
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
        </div>
        <div class="swiper-pagination"></div>
      </div>
    </section>
  <?php endif; ?>

  <section class="p-vison__sec01">
    <div class="l-container">
      <div class="p-vison__sec01--box01">
        <div>
          <div class="users">
            <div class="users-avatar">
              <img src="https://plus.unsplash.com/premium_photo-1690407617542-2f210cf20d7e?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=774" alt="">
            </div>
            <div class="users-body">
              <p class="text01">
                <span>Madam</span> Nguyen Thi Kim Hai
              </p>
              <p class="text02">
                Chairwoman, General Direction
              </p>
            </div>
          </div>
        </div>
        <div>
          <div>
            <p class="c-text__intro01">
              Chairman’s Message
            </p>
            <h2 class="c-title__02 type-03">
              <span class="c-title__02--last">
                Navigating a
              </span>
              <span class="c-title__02--first">
                New Era of Growth
              </span>
            </h2>
          </div>
          <div class="quotes">
            <div class="quotes-group01">
              <div class="quotes-text01">
                <span>“</span>
              </div>
              <div class="quotes-text02">
                We understand that trust is earned through consistent performance and shared vision. Our commitment is to approach every partnership with <strong>Agility</strong>, ensuring we adapt quickly to your needs and market dynamics.
              </div>
            </div>
            <div class="quotes-text03">
              By fostering <strong>Unity</strong> across our six divisions and committing to <strong>Sustainability</strong>, we ensure that the value we create today is long-lasting and contributes positively to your future and the community we share.
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="p-vison__sec02">
    <div class="l-container">
      <div class="p-vison__sec02--box01">
        <div class="p-vison__sec02--item">
          <p class="c-text__intro01">
            Corporate’s philosophy
          </p>
          <h2 class="c-title__02 type-03">
            <span class="c-title__02--last">
              Cultures create
            </span>
            <span class="c-title__02--first">
              coherent views
            </span>
          </h2>
        </div>
        <div class="p-vison__sec02--item">
          <div class="text01">
            Our operations across diverse sectors are unified by a steadfast commitment to ethical conduct, pioneering spirit, and collective advancement.
          </div>
          <div class="text02">
            To ensure alignment across all our member companies and stakeholders, we strictly adhere to The 5 Guiding Principles, a framework that translates our core values (Innovation, Sustainability, Agility, Integrity, and Unity) into daily action and decision-making.
          </div>
        </div>
      </div>
      <div class="p-vison__sec02--box02">
        <div class="vison-item">
          <span class="vison-title01">The</span>
          <span class="vison-title02">5</span>
          <span class="vison-title03">
            Guiding Principles
          </span>
        </div>
        <div class="vison-item">
          <div class="vison-text01">
            Innovation Mandate
          </div>
          <div class="vison-text02">
            Never Stop Transforming
          </div>
          <div class="vison-text03">
            We continuously challenge the status quo and invest in R&D to deliver future-proof solutions. We believe in the power of Innovation to drive change, not just react to it.
          </div>
        </div>
        <div class="vison-item">
          <div class="vison-text01">
            Innovation Mandate
          </div>
          <div class="vison-text02">
            Never Stop Transforming
          </div>
          <div class="vison-text03">
            We continuously challenge the status quo and invest in R&D to deliver future-proof solutions. We believe in the power of Innovation to drive change, not just react to it.
          </div>
        </div>
        <div class="vison-item">
          <div class="vison-text01">
            Innovation Mandate
          </div>
          <div class="vison-text02">
            Never Stop Transforming
          </div>
          <div class="vison-text03">
            We continuously challenge the status quo and invest in R&D to deliver future-proof solutions. We believe in the power of Innovation to drive change, not just react to it.
          </div>
        </div>
        <div class="vison-item">
          <div class="vison-text01">
            Innovation Mandate
          </div>
          <div class="vison-text02">
            Never Stop Transforming
          </div>
          <div class="vison-text03">
            We continuously challenge the status quo and invest in R&D to deliver future-proof solutions. We believe in the power of Innovation to drive change, not just react to it.
          </div>
        </div>
        <div class="vison-item">
          <div class="vison-text01">
            Innovation Mandate
          </div>
          <div class="vison-text02">
            Never Stop Transforming
          </div>
          <div class="vison-text03">
            We continuously challenge the status quo and invest in R&D to deliver future-proof solutions. We believe in the power of Innovation to drive change, not just react to it.
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="p-vison__sec03">
    <div class="l-container">
      <div class="c-text__center">
        <p class="c-text__intro01">
          Leadership
        </p>
        <h2 class="c-title__02 type-02">
          <span class="c-title__02--first">
            The Leadership Team
          </span>
          <span class="c-title__02--last">
            Board of Management
          </span>
        </h2>
      </div>
      <div class="p-vison__sec03--box01">
        <div class="leader-item">
          <div class="leader-avatar">
            <img src="https://plus.unsplash.com/premium_photo-1690407617542-2f210cf20d7e?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=774" alt="">
          </div>
          <div class="leader-contents">
            <div class="leader-text01">
              Nguyen Thi Kim Hai
            </div>
            <div class="leader-text02">
              Chairwoman, General Director
            </div>
          </div>
        </div>
        <div class="leader-item">
          <div class="leader-avatar">
            <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=922" alt="">
          </div>
          <div class="leader-contents">
            <div class="leader-text01">
              Nguyen Thi Kim Hai
            </div>
            <div class="leader-text02">
              Chairwoman, General Director
            </div>
          </div>
        </div>
        <div class="leader-item">
          <div class="leader-avatar">
            <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=928" alt="">
          </div>
          <div class="leader-contents">
            <div class="leader-text01">
              Nguyen Thi Kim Hai
            </div>
            <div class="leader-text02">
              Chairwoman, General Director
            </div>
          </div>
        </div>
        <div class="leader-item">
          <div class="leader-avatar">
            <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=774" alt="">
          </div>
          <div class="leader-contents">
            <div class="leader-text01">
              Nguyen Thi Kim Hai
            </div>
            <div class="leader-text02">
              Chairwoman, General Director
            </div>
          </div>
        </div>
        <div class="leader-item">
          <div class="leader-avatar">
            <img src="https://images.unsplash.com/photo-1663893364107-a6ecd06cf615?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=774" alt="">
          </div>
          <div class="leader-contents">
            <div class="leader-text01">
              Nguyen Thi Kim Hai
            </div>
            <div class="leader-text02">
              Chairwoman, General Director
            </div>
          </div>
        </div>
        <div class="leader-item">
          <div class="leader-avatar">
            <img src="https://plus.unsplash.com/premium_photo-1690407617542-2f210cf20d7e?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=774" alt="">
          </div>
          <div class="leader-contents">
            <div class="leader-text01">
              Nguyen Thi Kim Hai
            </div>
            <div class="leader-text02">
              Chairwoman, General Director
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>