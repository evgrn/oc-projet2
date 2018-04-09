<?php get_header() ?>
<?php get_template_part('templates/hero'); ?>


  <section class="container container-flex">

    <?php $args =  array(
      'post_type'      => 'page',
      'posts_per_page' => 10,
      'post_parent'    => 9,
      );
      $actualites = new WP_Query($args); ?>

      <?php while($actualites->have_posts()): $actualites->the_post(); ?>
        <?php get_template_part('templates/article-preview'); ?>
      <?php endwhile; wp_reset_postdata();?>

  </section>

  <?php get_footer() ?>
