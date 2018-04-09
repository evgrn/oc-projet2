<?php get_header() ?>
<?php
  $blog_page = get_option('page_for_posts');
  $image = get_post_thumbnail_id($blog_page);
  $image = wp_get_attachment_image_src( $image, 'banner');
?>

  <div class="hero" style="background-image: url('<?= $image[0]?>')">
    <h1><?= get_the_title($blog_page )?></h1>
    <div class="hero-overlay"></div>
    <p class="credit-photo">Crédit photo : <span class="photo-author"><?= the_field('credit_photo', 7)?></p>
  </div>


  <section class="container container-flex">

    <?php $args = array(
      'posts_per_page' => 10,
      'category_name' => 'news',
      'order' => 'DESC',
      'orderby' => 'date'
    );
    $actualites = new WP_Query($args); ?>

    <?php while($actualites->have_posts()): $actualites->the_post(); ?>
      <?php get_template_part('templates/article-preview'); ?>
    <?php endwhile; wp_reset_postdata();?>

  </section><!--.container-->


<?php get_footer() ?>
