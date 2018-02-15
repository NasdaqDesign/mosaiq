<?php

/* Register Persona Post Type
---------------------------------------------------------------*/
function daq_report() {
	$labels = array(
		'name'               => _x( 'Reports', 'post type general name' ),
		'singular_name'      => _x( 'Report', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'report' ),
		'add_new_item'       => __( 'Add New Report' ),
		'edit_item'          => __( 'Edit Report' ),
		'new_item'           => __( 'New Report' ),
		'all_items'          => __( 'All Reports' ),
		'view_item'          => __( 'View Report' ),
		'search_items'       => __( 'Search Reports' ),
		'not_found'          => __( 'No reports found' ),
		'not_found_in_trash' => __( 'No reports found in the Trash' ),
		'parent_item_colon'  => '',
		'menu_name'          => 'Reports'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Holds our findings reports and related data',
		'public'        => true,
		'menu_position' => 25,
		'menu_icon' 	=> '',
		'supports'      => array( 'title', 'thumbnail'),
		'has_archive'   => true,
		'rewrite' 		=> true
	);
	register_post_type( 'report', $args );
}
add_action( 'init', 'daq_report' );


// Declare new metabox and template for participant
$reportData = new WPAlchemy_MetaBox(array
(
	'id' => '_report_data',
	'mode' => WPALCHEMY_MODE_EXTRACT,
	'prefix' => '_report_',
	'title' => 'Findings Report',
	'types' => array('report'),
	'context' => 'normal', // same as above, defaults to "normal"
	'priority' => 'high', // same as above, defaults to "high"
	'template' => get_stylesheet_directory() . '/library/_prodaq/report/report-base.php'
));
