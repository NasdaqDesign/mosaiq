<?php

add_image_size( 'persona-thumb', 115, 115);
/* Register Research Campaign Post Type
---------------------------------------------------------------*/
function daq_product() {
  $labels = array(
    'name'               => _x( 'Products', 'post type general name' ),
    'singular_name'      => _x( 'Product', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'campaign' ),
    'add_new_item'       => __( 'Add New Product' ),
    'edit_item'          => __( 'Edit Product' ),
    'new_item'           => __( 'New Product' ),
    'all_items'          => __( 'All Products' ),
    'view_item'          => __( 'View Product' ),
    'search_items'       => __( 'Search Products' ),
    'not_found'          => __( 'No products found' ),
    'not_found_in_trash' => __( 'No products found in the Trash' ),
    'parent_item_colon'  => '',
    'menu_name'          => 'Products'
  );
  $args = array(
    'labels'             => $labels,
    'description'        => 'Holds info about each product.',
    'public'             => true,
    'menu_position'      => 27,
    'menu_icon' 	       => '',
    'supports'           => array( 'title', 'thumbnail' ),
    'taxonomies' 				 => array('post_tag'),
    'has_archive'        => 'products',
    'rewrite' 		       => true
  );
  register_post_type( 'product', $args );
}
add_action( 'init', 'daq_product' );

/* Campaign Taxonomy
---------------------------------------------------------------*/
function my_taxonomies_product() {
  $labels = array(
    'name'               => _x( 'Product Parent', 'taxonomy general name' ),
    'singular_name'      => _x( 'Product Parent', 'taxonomy singular name' ),
    'search_items'       => __( 'Search Product Parents' ),
    'all_items'          => __( 'All Product Parents' ),
    'edit_item'          => __( 'Edit Product Parent' ),
    'update_item'        => __( 'Update Product Parent' ),
    'add_new_item'       => __( 'Add New Product Parent' ),
    'new_item_name'      => __( 'New Product Parent' ),
    'menu_name'          => __( 'Product Parent' ),
  );
  $args = array(
    'labels'             => $labels,
    'hierarchical'       => true,
    'show_admin_column' => true
  );
  register_taxonomy( 'product_parent', 'product', $args );
}
add_action( 'init', 'my_taxonomies_product', 0 );

/* Metaboxes
---------------------------------------------------------------*/
$productData = new WPAlchemy_MetaBox(array
(
  'id' => '_product_data',
  'mode' => WPALCHEMY_MODE_EXTRACT,
  'prefix' => '_product_',
  'title' => 'Product Details',
  'types' => array('product'),
  'context' => 'normal', // same as above, defaults to "normal"
  'priority' => 'high', // same as above, defaults to "high"
  'template' => get_stylesheet_directory() . '/library/_prodaq/product/product-base.php'
));
