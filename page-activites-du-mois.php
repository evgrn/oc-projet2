<?php get_header() ?>
<?php get_template_part('templates/hero'); ?>

  <div class="container">


    <section>
      <table class="evenements">
        <tr>
          <th class="evenements-photo">Photo</th>
          <th class="evenements-date">Date</th>
          <th class="evenements-nom">Evènement</th>
          <th class="evenements-description">Desription</th>
          <th class="evenements-adresse">Adresse</th>
          <th class="evenements-bouton">Inscription</th>
        </tr>

    <?php
      $args = array(
        'post_type' => 'evenements',
        'posts_per_page' => 20,
        'meta_key' => 'date',
	      'orderby' => 'meta_value_num',
        'order' => 'ASC'
      );


      $evenements = new WP_Query($args);
    ?>

    <?php while($evenements->have_posts()): $evenements->the_post(); ?>

      <?php $date = DateTime::createFromFormat('dmY', get_field('date'));
            $date_evenement = $date->format('d/m/Y');

            if(!null == (get_field('date_fin'))){
              $date_fin = DateTime::createFromFormat('dmY', get_field('date_fin'));
                $date_evenement .= '<br/> - <br/>' . $date_fin->format('d/m/Y');
            }


      ?>

        <tr>
           <td class="evenements-photo"><?php the_post_thumbnail('box-mini'); ?></td>
           <td class="evenements-date"><?= $date_evenement ?></td>
           <td class="evenements-nom"><?php the_title(); ?></td>
           <td class="evenements-description"><?php the_content(); ?></td>
           <td class="evenements-adresse"><?php the_field('adresse'); ?></td>
           <td class="evenements-bouton"><button class="s-inscrire" event-id="<?= get_the_id()?>" event-name="<?= the_title();?>">S'inscrire</button></td>
        </tr>

    <?php endwhile; wp_reset_postdata(); ?>

    </table><!--.evenements-->

  </section>

    <?php get_template_part('templates/inscriptions', 'form'); ?>

  </div><!--.container-->

  <?php get_footer() ?>
