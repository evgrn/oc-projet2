<?php

// Inclusion des scripts et feuilles de style
function strasbourg_scripts(){
  wp_register_style( 'normalize', get_template_directory_uri() . '/css/normalize.css', array(), '6.0.0');
  wp_register_style( 'fontawesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.7.0');
  wp_register_style( 'style', get_template_directory_uri() . '/style.css', array('normalize'), '1.0');
  wp_register_style( 'mediaqueries', get_template_directory_uri() . '/css/mediaqueries.css', array('normalize', 'style'), '1.0');

  wp_enqueue_style('normalize');
  wp_enqueue_style('fontawesome');
  wp_enqueue_style('style');
  wp_enqueue_style('mediaqueries');

  wp_register_script('scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0.0', true);


  wp_enqueue_script('jquery');
  wp_enqueue_script('jquery-ui-core');
  wp_enqueue_script('jquery-ui-datepicker');
  wp_enqueue_script('scripts');

}
add_action('wp_enqueue_scripts', 'strasbourg_scripts');




// Initialisation des menus
function strasbourg_menus(){
  register_nav_menus(array(
    'main-menu' => __('Menu principal', 'villedestrasbourg')
  ));
}
add_action('init', 'strasbourg_menus');


//Searchform
function add_search_box( $items, $args ) {
    $items .= '<li class="searchbox">' . get_search_form( false ) . '</li>';
    return $items;
}
add_filter( 'wp_nav_menu_items','add_search_box', 10, 2 );

// Ne pas afficher la barre admin
add_action('show_admin_bar', '__return_false');


//Définition des tailles des images
function strasbourg_setup(){
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');

  add_image_size('page ', 1200, 1000, true);
  add_image_size('box', 300, 200, true);
  add_image_size('box-lg', 450, 300, true);
  add_image_size('box-mini', 100, 100, true);
  add_image_size('box-sm', 200, 200, true);
  add_image_size('pre-footer', 1600, 400, true);
  add_image_size('banner', 1200, 400, true);
}
add_action('after_setup_theme', 'strasbourg_setup');

//Définition de la taille et de la forme de l'excerpt
function strasbourg_excerpt_length( $length ) {
    return 15;
}
add_filter( 'excerpt_length', 'strasbourg_excerpt_length', 999 );

function new_excerpt_more($more) {
    return ' (...)';
}
add_filter('excerpt_more', 'new_excerpt_more');

//Types d'articles personnalisés
function villedestrasbourg_evenements() {
	$labels = array(
		'name'               => _x( 'Evènements', 'villedestrasbourg' ),
		'singular_name'      => _x( 'Evènement', 'post type singular name', 'villedestrasbourg' ),
		'menu_name'          => _x( 'Evènements', 'admin menu', 'villedestrasbourg' ),
		'name_admin_bar'     => _x( 'Evènements', 'Ajouter nouvel on admin bar', 'villedestrasbourg' ),
		'add_new'            => _x( 'Ajouter', 'book', 'villedestrasbourg' ),
		'add_new_item'       => __( 'Ajouter nouvel Evènement', 'villedestrasbourg' ),
		'new_item'           => __( 'Nouveau Evènements', 'villedestrasbourg' ),
		'edit_item'          => __( 'Editer Evènements', 'villedestrasbourg' ),
		'view_item'          => __( 'View Evènements', 'villedestrasbourg' ),
		'all_items'          => __( 'Tous les Evènements', 'villedestrasbourg' ),
		'search_items'       => __( 'Rechercher Evènements', 'villedestrasbourg' ),
		'parent_item_colon'  => __( 'Evènements parents:', 'villedestrasbourg' ),
		'not_found'          => __( 'Aucun évènement trouvé', 'villedestrasbourg' ),
		'not_found_in_trash' => __( 'Aucun évènement trouvé dans la corbeille', 'villedestrasbourg' )
	);

	$args = array(
		'labels'             => $labels,
    'description'        => __( 'Description.', 'villedestrasbourg' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'evenements' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 6,
		'supports'           => array( 'title', 'editor', 'thumbnail' ),
    'taxonomies'          => array( 'category' ),
	);

	register_post_type( 'evenements', $args );
}

add_action( 'init', 'villedestrasbourg_evenements' );
