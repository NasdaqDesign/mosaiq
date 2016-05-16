<?php

add_image_size( 'persona-thumb', 120, 120);
/* Register Persona Post Type
---------------------------------------------------------------*/
function daq_persona() {
  $labels = array(
    'name'               => _x( 'Personas', 'post type general name' ),
    'singular_name'      => _x( 'Persona', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'persona' ),
    'add_new_item'       => __( 'Add New Persona' ),
    'edit_item'          => __( 'Edit Persona' ),
    'new_item'           => __( 'New Persona' ),
    'all_items'          => __( 'All Personas' ),
    'view_item'          => __( 'View Persona' ),
    'search_items'       => __( 'Search Personas' ),
    'not_found'          => __( 'No personas found' ),
    'not_found_in_trash' => __( 'No personas found in the Trash' ),
    'parent_item_colon'  => '',
    'menu_name'          => 'Personas'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds our personas and persona specific data',
    'public'        => true,
    'menu_position' => 28,
    'menu_icon' 	=> '',
    'supports'      => array( 'title', 'thumbnail' ),
    'has_archive'   => 'personas',
    'rewrite' 		=> true
  );
  register_post_type( 'persona', $args );
}
add_action( 'init', 'daq_persona' );


/* Persona Taxonomy
---------------------------------------------------------------*/
function my_taxonomies_persona() {
  $labels = array(
    'name'              => _x( 'Persona Categories', 'taxonomy general name' ),
    'singular_name'     => _x( 'Category', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Categories' ),
    'all_items'         => __( 'All Categories' ),
    'parent_item'       => __( 'Parent Category' ),
    'parent_item_colon' => __( 'Parent Category:' ),
    'edit_item'         => __( 'Edit Category' ),
    'update_item'       => __( 'Update Category' ),
    'add_new_item'      => __( 'Add New Category' ),
    'new_item_name'     => __( 'New Category' ),
    'menu_name'         => __( 'Categories' ),
  );
  $args = array(
    'labels' => $labels,
    'hierarchical' => true,
  );
  register_taxonomy( 'persona_product', 'persona', $args );
}
add_action( 'init', 'my_taxonomies_persona', 0 );


function ST4_columns_head_personas($columns) {
    $columns['featured_image'] = 'Photo';

    $customOrder = array('cb','featured_image', 'title', 'date');
    foreach ($customOrder as $colname)
      $new[$colname] = $columns[$colname];
    return $new;
}
function ST4_columns_content_personas($column_name, $post_ID) {
    if ($column_name == 'featured_image') {
        $post_featured_image = ST4_get_featured_image($post_ID);
        if ($post_featured_image) {
            echo '<img width="55px" src="' . $post_featured_image . '" />';
        }
        else {
            echo '<img width="55px" src="' . get_bloginfo( 'template_url' ) . '/library/images/blank.jpg" />';
        }
    }
}

add_filter('manage_persona_posts_columns', 'ST4_columns_head_personas', 10);
add_action('manage_persona_posts_custom_column', 'ST4_columns_content_personas', 10, 2);
/* Metaboxes
---------------------------------------------------------------*/
// Declare new metabox and template for campaign
$personaData = new WPAlchemy_MetaBox(array
(
  'id' => '_persona_data',
  'mode' => WPALCHEMY_MODE_EXTRACT,
  'prefix' => '_persona_',
  'title' => 'Persona Details',
  'types' => array('persona'),
  'context' => 'normal', // same as above, defaults to "normal"
  'priority' => 'high', // same as above, defaults to "high"
  'template' => get_template_directory() . '/library/_prodaq/persona/persona-base.php'
));
