<?php


/* Register Research Campaign Post Type
---------------------------------------------------------------*/
function daq_campaign() {
  $labels = array(
    'name'               => _x( 'Campaigns', 'post type general name' ),
    'singular_name'      => _x( 'Campaign', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'campaign' ),
    'add_new_item'       => __( 'Add New Campaign' ),
    'edit_item'          => __( 'Edit Campaign' ),
    'new_item'           => __( 'New Campaign' ),
    'all_items'          => __( 'All Campaigns' ),
    'view_item'          => __( 'View Campaign' ),
    'search_items'       => __( 'Search Campaigns' ),
    'not_found'          => __( 'No campaigns found' ),
    'not_found_in_trash' => __( 'No campaigns found in the Trash' ),
    'parent_item_colon'  => '',
    'menu_name'          => 'Campaigns'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds our research campaigns and campaigns specific data',
    'public'        => true,
    'menu_position' => 26,
    'menu_icon' 	=> '',
    'supports'      => array( 'title', 'thumbnail' ),
    'has_archive'   => 'campaigns',
    'rewrite' 		=> true
  );
  register_post_type( 'campaign', $args );
}
add_action( 'init', 'daq_campaign' );

/* Campaign Taxonomy
---------------------------------------------------------------*/
function my_taxonomies_campaign() {
  $labels = array(
    'name'              => _x( 'Campaign Categories', 'taxonomy general name' ),
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
  register_taxonomy( 'campaign_product', 'campaign', $args );
}
add_action( 'init', 'my_taxonomies_campaign', 0 );

/* Metaboxes
---------------------------------------------------------------*/
// Declare new metabox and template for campaign
$campaignData = new WPAlchemy_MetaBox(array
(
  'id' => '_campaign_data',
  'mode' => WPALCHEMY_MODE_EXTRACT,
  'prefix' => '_campaign_',
  'title' => 'Campaign Information',
  'types' => array('campaign'),
  'context' => 'normal', // same as above, defaults to "normal"
  'priority' => 'high', // same as above, defaults to "high"
  'template' => get_template_directory() . '/library/_prodaq/campaign/campaign-base.php'
));
