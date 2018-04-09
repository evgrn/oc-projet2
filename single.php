<?php get_header() ?>
<?php while(have_posts()): the_post(); ?>
  <?php get_template_part('templates/hero'); ?>

  <section class="container">

    <article>
      <div class="content">

        <div class="featured-image">
          <?php the_post_thumbnail('box-lg') ?>
        </div>
        <div class="article-content">
            <?php the_content(); ?>
        </div>

      </div><!--.content-->

        <div class="post-information clear">
          <p><span class="author"><?php the_author(); ?></span>, le <span class="date"><?php the_time('j F Y'); ?></span>, <br/>Crédit photo : <span class="photo-author"><?= the_field('credit_photo') ?></span></p>
        </div>

    </article>

  </section><!--.container-->

<?php endwhile; ?>


<?php get_footer() ?>
