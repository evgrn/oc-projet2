<div class="hero" style="background-image: url('<?= get_the_post_thumbnail_url()?>')">
  <h1><?php the_title(); ?></h1>
  <div class="hero-overlay"></span></div>
  <p class="credit-photo">Crédit photo : <span class="photo-author"><?= the_field('credit_photo') ?></p>
</div>
