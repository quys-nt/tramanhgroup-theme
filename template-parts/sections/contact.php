  <?php
  $section_contact = get_field('section_contact', 'option');
  if ($section_contact):
    $contactIntro = $lang === "en" ? $section_contact['intro']['en'] : $section_contact['intro']['vn'];
    $contactTitleFirst = $lang === "en" ? $section_contact['title_first']['en'] : $section_contact['title_first']['vn'];
    $contactTitleLast = $lang === "en" ? $section_contact['title_last']['en'] : $section_contact['title_last']['vn'];
    $form = $lang === "en" ? $section_contact['form']['en'] : $section_contact['form']['vn'];
  ?>
    <section class="p-home__contact">
      <div class="p-home__contact--iframe js-home-iframe" data-aos="fade-up">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3919.354118147717!2d106.7010362!3d10.7841667!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f4bc8ad1f21%3A0x1c31b41801cfac6c!2sSaigon%20Trade%20Center!5e0!3m2!1svi!2s!4v1759944105198!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
      <div class="p-home__contact--form">
        <div data-aos="fade-up">
          <p class="c-text__intro01">
            <?php echo $contactIntro; ?>
          </p>
          <h2 class="c-title__02">
            <span class="c-title__02--first">
              <?php echo $contactTitleFirst; ?>
            </span>
            <span class="c-title__02--last">
              <?php echo $contactTitleLast; ?>
            </span>
          </h2>
        </div>
        <div>
          <div class="form-contact" data-aos="fade-up">
            <?php
            echo  do_shortcode($form);
            ?>
          </div>
        </div>
      </div>
    </section>
  <?php endif; ?>