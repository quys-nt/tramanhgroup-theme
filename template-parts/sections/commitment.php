  <?php
  $show_desc = isset($args['show_desc']) ? $args['show_desc'] : false;
  $section_commitment = get_field('section_commitment', 'option');
  if ($section_commitment):
  ?>
    <section class="p-home__commitment">
      <div class="l-container not-padding">
        <?php
        $has_desc = !empty($section_commitment['commitment_desc']['en']) || !empty($section_commitment['commitment_desc']['vn']);
        ?>
        <div class="p-home__commitment--box01 <?php echo $has_desc && $show_desc ? "" : "flex-end"; ?>" data-aos="fade-up">
          <div>
            <?php if ($section_commitment['commitment_intro']): ?>
              <p class="c-text__intro01">
                <?php echo $lang === "en" ? $section_commitment['commitment_intro']['en'] : $section_commitment['commitment_intro']['vn']; ?>
              </p>
            <?php endif; ?>
            <h2 class="c-title__02 type-03">
              <span class="c-title__02--last">
                <?php echo $lang === "en" ? $section_commitment['commitment_title_first']['en'] : $section_commitment['commitment_title_first']['vn']; ?>
              </span>
              <span class="c-title__02--first">
                <?php echo $lang === "en" ? $section_commitment['commitment_title_last']['en'] : $section_commitment['commitment_title_last']['vn']; ?>
              </span>
            </h2>
          </div>
          <div class="p-home__commitment--box01--right">
            <?php if ($show_desc): ?>
              <?php if ($has_desc): ?>
                <div class="c-text03">
                  <?php echo $lang === "en" ? $section_commitment['commitment_desc']['en'] : $section_commitment['commitment_desc']['vn']; ?>
                </div>
              <?php endif; ?>
            <?php endif; ?>
            <?php if ($section_commitment['commitment_button_link']): ?>
              <a href="<?php echo esc_attr($lang === "en" ? $section_commitment['commitment_button_link']['en'] : $section_commitment['commitment_button_link']['vn']); ?>" class="c-btn__06">
                <?php echo $lang === "en" ? $section_commitment['commitment_button_text']['en'] : $section_commitment['commitment_button_text']['vn']; ?>
              </a>
            <?php endif; ?>
          </div>
        </div>
        <div class="p-home__commitment--box02">
          <?php if ($section_commitment['commitment_lists_post']) : ?>
            <?php foreach ($section_commitment['commitment_lists_post'] as $commitment) :
              $image = $commitment['post_thumbnail'];
              $title = $lang === "en" ? $commitment['post_title']['en'] : $commitment['post_title']['vn'];
              $desc = $lang === "en" ? $commitment['post_desc']['en'] : $commitment['post_desc']['vn'];
              $link = $lang === "en" ? $commitment['post_link']['en'] : $commitment['post_link']['vn'];
              // $link = $commitment['post_link'];
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