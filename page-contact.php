
<?php get_header() ?>
<?php while(have_posts()): the_post(); ?>

  <?php get_template_part('templates/hero'); ?>


  <section class="container">
          <div class="contact-form">
              <?php the_content(); ?>
          </div>
  </section>

<?php endwhile; ?>


<?php get_footer() ?>
