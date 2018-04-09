<article>

    <div class="featured-image">
      <?php the_post_thumbnail('box-lg') ?>
      <div class="article-info">
        <h2><?php the_title(); ?></h2>
        <a href="<?php the_permalink(); ?>">
          <button type="button" name="readmore">Consulter l'article</button>
        </a>
      </div>
    </div><!--.featured-image--->

    <div class="article-content">
        <?php the_excerpt(); ?>
    </div>
    <a href="<?php the_permalink();?>"><button class="readmore">Lire l'article</button></a>

    <div class="post-information clear">
      <p><span class="author"><?php the_author(); ?></span>, le <span class="date"><?php the_time('j F Y'); ?></span></p>
    </div>

</article>
