<?php


/* Register Quote Post Type
---------------------------------------------------------------*/
function daq_quote() {
  $labels = array(
    'name'               => _x( 'Quotes', 'post type general name' ),
    'singular_name'      => _x( 'Quote', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'quote' ),
    'add_new_item'       => __( 'Add New Quote' ),
    'edit_item'          => __( 'Edit Quote' ),
    'new_item'           => __( 'New Quote' ),
    'all_items'          => __( 'All Quotes' ),
    'view_item'          => __( 'View Quote' ),
    'search_items'       => __( 'Search Quotes' ),
    'not_found'          => __( 'No quotes found' ),
    'not_found_in_trash' => __( 'No quotes found in the Trash' ),
    'parent_item_colon'  => '',
    'menu_name'          => 'Quotes'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds our quotes and quotes specific data',
    'public'        => true,
    'menu_position' => 30,
    'menu_icon' 	=> '',
    'supports'      => array( 'title', 'thumbnail' ),
    'taxonomies' 	=> array('post_tag'),
    'has_archive'   => true,
    'rewrite' 		=> true
  );
  register_post_type( 'quote', $args );
}
add_action( 'init', 'daq_quote' );

/* Metaboxes
---------------------------------------------------------------*/
// Declare new metabox and template for campaign
$campaignData = new WPAlchemy_MetaBox(array
(
  'id' => '_quotes_data',
  'mode' => WPALCHEMY_MODE_EXTRACT,
  'prefix' => '_quote_',
  'title' => 'Quotes',
  'types' => array('quote'),
  'context' => 'normal', // same as above, defaults to "normal"
  'priority' => 'high', // same as above, defaults to "high"
  'template' => get_stylesheet_directory() . '/library/_prodaq/quotes/quote-base.php'
));
