<?php
/*
Template Name: Coming Soon
Description: English Coming Soon page with journey, core values, etc.
*/
?>
<?php get_header(); ?>

<main>
  <div class="p-coming__head"></div>

  <section class="p-coming__sec01">
    <div class="l-container">
      <div class="p-coming__sec01-box01">
        <h1 class="title">
          <span>Great Things</span>
          <span>Are on the Way.</span>
        </h1>
        <div class="text01">
          <?php the_content(); ?>
        </div>
        <a href="<?php echo home_url(); ?>" class="c-btn__02">Go Back Home</a>
      </div>
      <div class="p-coming__sec01-box02">
        <div class="text02">
          If you need urgent assistance, feel free to contact us and we’ll be right at you shortly.
        </div>
        <a href="mailto:info@tramanhgroup.com.vn" class="text03">info@tramanhgroup.com.vn</a>
      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>