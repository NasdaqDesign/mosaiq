<?php
/* Register Research Campaign Post Type
---------------------------------------------------------------*/
function daq_iteration() {
	$labels = array(
		'name'               => _x( 'Iterations', 'post type general name' ),
		'singular_name'      => _x( 'Iteration', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'iteration' ),
		'add_new_item'       => __( 'Add New Iteration' ),
		'edit_item'          => __( 'Edit Iteration' ),
		'new_item'           => __( 'New Iteration' ),
		'all_items'          => __( 'All Iterations' ),
		'view_item'          => __( 'View Iteration' ),
		'search_items'       => __( 'Search Iterations' ),
		'not_found'          => __( 'No Iterations found' ),
		'not_found_in_trash' => __( 'No Iterations found in the Trash' ),
		'parent_item_colon'  => '',
		'menu_name'          => 'Iterations'
	);
	$args = array(
		'labels'             => $labels,
		'description'        => 'Holds info about each iteration.',
		'public'             => true,
		'menu_position'      => 29,
		'menu_icon' 	       => '',
		'supports'           => array( 'title', 'thumbnail' ),
		'taxonomies' 				 => array('post_tag'),
		'has_archive'        => 'Iterations',
		'rewrite' 		       => true
	);
	register_post_type( 'iteration', $args );
}
add_action( 'init', 'daq_iteration' );
/* Iteration Taxonomy
---------------------------------------------------------------*/
function my_taxonomies_iteration() {
	$labels = array(
		'name'              => _x( 'Stories', 'taxonomy general name' ),
		'singular_name'     => _x( 'Story', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Stories' ),
		'all_items'         => __( 'All Stories' ),
		'parent_item'       => __( 'Parent Story' ),
		'parent_item_colon' => __( 'Parent Story:' ),
		'edit_item'         => __( 'Edit Story' ),
		'update_item'       => __( 'Update Story' ),
		'add_new_item'      => __( 'Add New Story' ),
		'new_item_name'     => __( 'New Story' ),
		'menu_name'         => __( 'Stories' ),
	);
	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
		'show_admin_column' => true
	);
	register_taxonomy( 'story', 'iteration', $args );
}
add_action( 'init', 'my_taxonomies_iteration', 0 );


/* Metaboxes
---------------------------------------------------------------*/
$iterationData = new WPAlchemy_MetaBox(array
(
	'id' => '_iteration_data',
	'mode' => WPALCHEMY_MODE_EXTRACT,
	'prefix' => '_iteration_',
	'title' => 'Iteration Details',
	'types' => array('iteration'),
	'context' => 'normal', // same as above, defaults to "normal"
	'priority' => 'high', // same as above, defaults to "high"
	'template' => get_stylesheet_directory() . '/library/_prodaq/iteration/iteration-base.php'
));
