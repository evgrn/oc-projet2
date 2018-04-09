<?php get_header() ?>
<?php global $post; ?>
<?php get_template_part('templates/hero'); ?>

  <section class="container align-left">
    <?= get_post_field('post_content', $post->ID) ?>
  </section>








  <?php get_footer() ?>
