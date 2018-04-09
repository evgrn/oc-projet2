
<aside id="secondary" class="secondary">

  <?php
  $args = array(
      'posts_per_page' => 1,
      'category_name' => 'news',
      'order' => 'DESC',
      'orderby' => 'date'
    );
  $lastNews = new WP_Query($args); ?>

  <div class="last-news">

    <h3>Dernière actualité</h3>

    <?php while($lastNews->have_posts()): $lastNews->the_post(); ?>
      <?php get_template_part('templates/article-preview'); ?>
    <?php endwhile; wp_reset_postdata();?>


</aside>
<div class="clear">

</div>
