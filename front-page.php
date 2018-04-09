<?php get_header() ?>
<?php while(have_posts()): the_post(); ?>
  <div class="container">


    <section class="home-title-container" style="background-image: url('<?= get_the_post_thumbnail_url(get_the_ID(),'page')?>')">
      <h1><?php the_title(); ?></h1>
      <div class="home-title-container-overlay"></div>
    </section>

    <section class="home-content">

      <article class="primary">

        <div class="home-pages">

          <h2><?php the_title(); ?></h2>
          <p class="home-presentation"><?php the_content(); ?></p>

<?php endwhile; ?>

          <?php $args =  array(
            'post_type'      => 'page',
            'posts_per_page' => 10,
            'post_parent'    => 0,
            'post__not_in' => array(5, 239)
            );
            $pageList = new WP_Query($args); ?>

          <div class="home-pages-list">


            <?php while($pageList->have_posts()): $pageList->the_post(); ?>

                <div class="pages-list-ele" id="page-list-ele-<?= get_the_ID()?>">

                  <?php the_post_thumbnail('box-sm') ?>

                  <div class="pages-list-ele-more">
                      <i class="fa fa-plus"></i>

                  </div><!--.pages-list-ele-title-->

                </div><!--.pages-list-ele-->

            <?php endwhile; wp_reset_postdata();?>

          </div><!-- .home-pages-list -->

            <?php $args =  array(
              'post_type'      => 'page',
              'posts_per_page' => 10,
              'post_parent'    => 0,
              'post__not_in' => array(5, 239)
              );
              $pageList = new WP_Query($args); ?>


            <div class="home-pages-description-list">


              <?php while($pageList->have_posts()): $pageList->the_post(); ?>

                  <div class="pages-list-ele-description" id="page-list-ele-<?= get_the_ID()?>-description" style="background-image: url('<?= get_the_post_thumbnail_url()?>')">
                    <div class="pages-list-ele-description-content">
                        <h3><?php the_title(); ?></h3>
                        <?php the_field('description_page') ?>
                        <a href="<?= the_permalink(); ?>"><button>Aller</button></a>
                    </div><!--.pages-list-ele-content-mobile-->
                  </div><!--.pages-list-ele-mobile-->

              <?php endwhile; wp_reset_postdata();?>

            </div><!--.home-pages-list .mobile-->


        </div><!--.home-pages-->

      </article><!---.primary-->

      <?php get_sidebar(); ?>
    </section><!--.home-content-->

    <section class="pre-footer clear" style="background-image: url('<?= the_field('pre-footer') ?>');">
      <p class="hero-text">BONNE VISITE</p>
    </section>


  </div><!--.container-->



<?php get_footer() ?>
