<?php get_header() ?>
<?php get_template_part('templates/hero'); ?>


  <?php global $post; ?>


    <section class="container container-flex">
      <div class="contenu-page">
        <?=$post->post_content ?>

      </div>

      <?php $args = array(
        'posts_per_page' => 10,
        'category_name' => $post->post_name,
        'order' => 'DESC',
        'orderby' => 'date'
      );
      $categorie = new WP_Query($args); ?>


      <?php while($categorie->have_posts()): $categorie->the_post(); ?>
        <?php get_template_part('templates/article-preview'); ?>
      <?php endwhile; wp_reset_postdata();?>
      
    </section>



  <?php get_footer() ?>
