<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-title" content="Ville de Strasbourg">
    <link rel="apple-touch-icon" href="<?= get_template_directory_uri(); ?>/img/apple-touch-icon.jpg">

    <meta name="color" content="#218fc0"> <!--couleur navigateur android-->
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="application-name" content="Ville de Strasbourg">
    <link rel="icon" type="image/png" href="<?= get_template_directory_uri(); ?>/img/icon.png" sizes="192x192">
    <link rel="icon" type="image/png" href="media/img/icons/favicon.ico"/>
    <?php wp_head(); ?>
  </head>


  <body <?php body_class(); ?>>
    <header id="masthead" class="site-header" role="banner">
      <div class="container">

        <div class="mobile-menu">
          <i class="fa fa-bars"></i>
        </div>

        <nav id="site-navigation" class="main-navigation" role="navigation">

          <?php
            $args = array('theme_location' => 'main-menu');

            wp_nav_menu( $args );
           ?>

        </nav><!--.site-navigation-->

      </div>
    </header>
