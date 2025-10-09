<?php get_header(); ?>
<main>
  <section class="p-home__mv">
    <div class="js-swiper-mv">
      <div class="swiper-wrapper">
        <?php if (have_rows('main_visual', 'option')) : ?>
          <?php while (have_rows('main_visual', 'option')) : the_row(); ?>
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
                    <a href="<?php echo esc_attr(get_sub_field('link_button')) ?>" class="c-btn__01">Discover</a>
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

  <?php
  $section_trusted = get_field('section_trusted', 'option');
  if ($section_trusted):
  ?>
    <section class="p-home__since">
      <div class="l-container">
        <div class="p-home__since--box01">
          <div data-aos="fade-up">
            <?php if ($section_trusted['trusted_intro']): ?>
              <p class="c-text__intro01">
                <?php echo $section_trusted['trusted_intro']; ?>
              </p>
            <?php endif; ?>
            <?php if ($section_trusted['trusted_title_last']): ?>
              <h2 class="c-title__02">
                <span class="c-title__02--first">
                  <?php echo $section_trusted['trusted_title_first']; ?>
                </span>
                <span class="c-title__02--last">
                  <?php echo $section_trusted['trusted_title_last']; ?>
                </span>
              </h2>
            <?php endif; ?>
          </div>
          <div class="p-home__since--box01-right" data-aos="fade-up">
            <?php if ($section_trusted['trusted_description']): ?>
              <p class="c-text01">
                <?php echo $section_trusted['trusted_description']; ?>
              </p>
            <?php endif; ?>
            <?php if ($section_trusted['trusted_button_text']): ?>
              <a href="<?php echo $section_trusted['trusted_button_link']; ?>" class="c-btn__02">
                <?php echo $section_trusted['trusted_button_text']; ?>
              </a>
            <?php endif; ?>
          </div>
        </div>
        <div class="p-home__since--box02" data-aos="fade-up">
          <img src="<?php echo esc_url($section_trusted['trusted_image_first']['url']) ?>" alt="<?php echo $section_trusted['trusted_image_first']['title'] ?>">
          <img src="<?php echo esc_url($section_trusted['trusted_image_last']['url']) ?>" alt="<?php echo $section_trusted['trusted_image_last']['title'] ?>">
        </div>
      </div>
    </section>
  <?php endif; ?>

  <section class="p-home__our">
    <div class="l-container small">
      <div class="p-home__our--box01" data-aos="fade-up">
        <p class="c-text__intro01">
          Our Core Sectors
        </p>
        <h2 class="c-title__02 type-02">
          <span class="c-title__02--first">Business</span>
          <span class="c-title__02--last">Highlights</span>
        </h2>
      </div>
      <div class="p-home__our--box02">
        <div class="p-home__our--box03" data-aos="fade-up">
          <div class="p-home__our--item first">
            <div class="icons">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home-page/icons/icon-our-01.svg" alt="icon-our-01">
            </div>
            <div class="conents">
              <h3 class="title">
                Lubricants & Chemicals
              </h3>
              <p class="desc">
                Founding shareholder of AP Saigon Petro and ChemStation Asia, leaders in blending and distribution.
              </p>
              <a href="#" class="c-btn__03">Read More</a>
            </div>
          </div>
          <div class="p-home__our--item-center">
            <div class="p-home__our--item-main">
              <div class="icons">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home-page/icons/icon-automotive.svg" alt="icon-automotive">
              </div>
              <div class="conents">
                <h3 class="title">
                  Automotive & Mobility
                </h3>
                <p class="desc">
                  Audi Vietnam, Ducati, Royal Enfield, Aprilia, Moto Guzzi, Piaggio, Vespa, and EV One charging solutions.
                </p>
                <a href="#" class="c-btn__01">Read More</a>
              </div>
            </div>
          </div>
          <div class="p-home__our--item last">
            <div class="icons">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home-page/icons/icon-our-02.svg" alt="icon-our-01">
            </div>
            <div class="conents">
              <h3 class="title">
                Sports & Community
              </h3>
              <p class="desc">
                Owner of Thang Long Warriors Basketball Team, its Academy, and modern sports complexes under OCenter.
              </p>
              <a href="#" class="c-btn__03">Read More</a>
            </div>
          </div>
        </div>
        <div class="p-home__our--box04" data-aos="fade-up">
          <div class="p-home__our--item">
            <div class="icons">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home-page/icons/icon-our-03.svg" alt="icon-our-03">
            </div>
            <div class="conents">
              <h3 class="title">
                Yachting & Lifestyle
              </h3>
              <p class="desc">
                Founding partner of Tam Son Yachting.
              </p>
              <a href="#" class="c-btn__03">Read More</a>
            </div>
          </div>
          <div class="p-home__our--item">
            <div class="icons">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home-page/icons/icon-our-04.svg" alt="icon-our-04">
            </div>
            <div class="conents">
              <h3 class="title">
                Real Estate
              </h3>
              <p class="desc">
                Urban and industrial property developments and investments.
              </p>
              <a href="#" class="c-btn__03">Read More</a>
            </div>
          </div>
          <div class="p-home__our--item">
            <div class="icons">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home-page/icons/icon-our-05.svg" alt="icon-our-05">
            </div>
            <div class="conents">
              <h3 class="title">
                Retail & Luxury
              </h3>
              <p class="desc">
                Exclusive distributor of Jacob & Co Vietnam.
              </p>
              <a href="#" class="c-btn__03">Read More</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php
  $section_partners = get_field('section_partners', 'option');
  if ($section_partners):
  ?>
    <section class="p-home__partners">
      <div class="p-home__partners--box01" data-aos="fade-up">
        <?php if ($section_partners['partners_intro']): ?>
          <p class="c-text__intro01">
            <?php echo $section_partners['partners_intro']; ?>
          </p>
        <?php endif; ?>
        <h2 class="c-title__02 type-02">
          <span class="c-title__02--first"><?php echo $section_partners['partners_title_first']; ?></span>
          <span class="c-title__02--last"><?php echo $section_partners['partners_title_last']; ?></span>
        </h2>
      </div>
      <?php if ($section_partners['partners_list_images']) : ?>
        <div class="swiper-partners">
          <div class="swiper-wrapper">
            <?php foreach ($section_partners['partners_list_images'] as $partner) :
              $image = $partner['partners_image'];
            ?>
              <div class="swiper-slide">
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt'] ?: $image['title']); ?>" class="p-home__partners--logo">
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      <?php endif; ?>
    </section>
  <?php endif; ?>
  <?php
  $section_latest = get_field('section_latest', 'option');
  if ($section_latest):
  ?>
    <section class="p-home__posts">
      <div class="l-container">
        <div class="p-home__posts--box01" data-aos="fade-up">
          <div>
            <?php if ($section_latest['latest_intro']): ?>
              <p class="c-text__intro01">
                <?php echo $section_latest['latest_intro']; ?>
              </p>
            <?php endif; ?>
            <h2 class="c-title__02 type-03">
              <span class="c-title__02--first"><?php echo $section_latest['latest_title_first']; ?></span>
              <span class="c-title__02--last"><?php echo $section_latest['latest_title_last']; ?></span>
            </h2>
          </div>
          <?php if (isset($section_latest['latest_post']) && count($section_latest['latest_post']) > 3): ?>
            <div class="p-home__posts--box01--right">
              <div class="c-button js-swiper-button-prev">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-arrow-left.svg" alt="icon-arrow-left">
              </div>
              <div class="c-button js-swiper-button-next">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-arrow-right.svg" alt="icon-arrow-right">
              </div>
            </div>
          <?php endif; ?>
        </div>
      </div>
      <div class="l-container">
        <div class="swiper-posts">
          <div class="swiper-wrapper">
            <?php if ($section_latest['latest_post']) : ?>
              <?php foreach ($section_latest['latest_post'] as $latest) :
                $image = $latest['latest_post_thumbnail'];
                $title = $latest['latest_post_title'];
                $link = $latest['latest_post_link'];
                $date = $latest['latest_post_date'];
              ?>
                <div class="swiper-slide">
                  <div class="p-home__posts--item" data-aos="fade-up" data-aos-offset="400" data-aos-duration="1500">
                    <a href="<?php echo $link; ?>" target="_blank" class="thumbnail">
                      <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt'] ?: $image['title']); ?>">
                    </a>
                    <div class="contents">
                      <a href="<?php echo $link; ?>">
                        <h3 class=" title"><?php echo $title; ?></h3>
                      </a>
                      <p class="time">
                        <?php echo $date; ?>
                      </p>
                    </div>
                    <a href="<?php echo $link; ?>" class=" c-btn__05">
                      See details
                    </a>
                  </div>
                </div>
              <?php endforeach; ?>
            <?php endif; ?>
          </div>
        </div>
        <?php if ($section_latest['latest_button_link']): ?>
          <div class="p-home__posts--bottom">
            <a href="<?php echo $section_latest['latest_button_link']; ?>" class="c-btn__04">View All News</a>
          </div>
        <?php endif; ?>
      </div>
    </section>
  <?php endif; ?>

  <?php
  $section_commitment = get_field('section_commitment', 'option');
  if ($section_commitment):
  ?>
    <section class="p-home__commitment">
      <div class="l-container not-padding">
        <div class="p-home__commitment--box01" data-aos="fade-up">
          <div>
            <?php if ($section_commitment['commitment_intro']): ?>
              <p class="c-text__intro01">
                <?php echo $section_commitment['commitment_intro']; ?>
              </p>
            <?php endif; ?>
            <h2 class="c-title__02 type-03">
              <span class="c-title__02--last"><?php echo $section_commitment['commitment_title_first']; ?></span>
              <span class="c-title__02--first"><?php echo $section_commitment['commitment_title_last']; ?></span>
            </h2>
          </div>
          <div class="p-home__commitment--box01--right">
            <?php if ($section_commitment['commitment_button_link']): ?>
              <a href="<?php echo $section_commitment['commitment_button_link']; ?>" class="c-btn__06">Learn More</a>
            <?php endif; ?>
          </div>
        </div>
        <div class="p-home__commitment--box02">
          <?php if ($section_commitment['commitment_lists_post']) : ?>
            <?php foreach ($section_commitment['commitment_lists_post'] as $partner) :
              $image = $partner['post_thumbnail'];
              $title = $partner['post_title'];
              $desc = $partner['post_desc'];
              $link = $partner['post_link'];
            ?>
              <a href="<?php echo $link; ?>" class="p-home__commitment--item" data-aos="fade-up">
                <img class="thumbnail" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt'] ?: $image['title']); ?>">
                <div class="contents">
                  <h3 class="title">
                    <?php echo $title; ?>
                  </h3>
                  <div class="desc">
                    <?php echo $desc; ?>
                  </div>
                </div>
              </a>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
        <div class="p-home__commitment--bottom">
          <?php if ($section_commitment['commitment_button_link']): ?>
            <a href="<?php echo $section_commitment['commitment_button_link']; ?>" class="c-btn__06">Learn More</a>
          <?php endif; ?>
        </div>
      </div>
      </div>
    </section>
  <?php endif; ?>

  <section class="p-home__contact">
    <div class="p-home__contact--iframe js-home-iframe" data-aos="fade-up">
      <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3919.354118147717!2d106.7010362!3d10.7841667!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f4bc8ad1f21%3A0x1c31b41801cfac6c!2sSaigon%20Trade%20Center!5e0!3m2!1svi!2s!4v1759944105198!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <div class="p-home__contact--form">
      <div data-aos="fade-up">
        <p class="c-text__intro01">
          Get in Touch
        </p>
        <h2 class="c-title__02">
          <span class="c-title__02--first">Contact &</span>
          <span class="c-title__02--last">Global Presence</span>
        </h2>
      </div>
      <div>
        <div class="form-contact" data-aos="fade-up">
          <?php
          echo  do_shortcode('[contact-form-7 id="772b1e3" title="Form liên hệ 1"]');
          ?>
        </div>
      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>