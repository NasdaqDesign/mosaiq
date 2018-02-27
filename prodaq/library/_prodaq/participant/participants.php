<?php
add_image_size( 'participant-small', 40, 40);
add_image_size( 'participant-thumb', 90, 90);
/* Register Persona Post Type
---------------------------------------------------------------*/
function daq_participant() {
	$labels = array(
		'name'               => _x( 'Participants', 'post type general name' ),
		'singular_name'      => _x( 'Participant', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'participant' ),
		'add_new_item'       => __( 'Add New Participant' ),
		'edit_item'          => __( 'Edit Participant' ),
		'new_item'           => __( 'New Participant' ),
		'all_items'          => __( 'All Participants' ),
		'view_item'          => __( 'View Participant' ),
		'search_items'       => __( 'Search Participants' ),
		'not_found'          => __( 'No participants found' ),
		'not_found_in_trash' => __( 'No participants found in the Trash' ),
		'parent_item_colon'  => '',
		'menu_name'          => 'Participants'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Holds our participants and participant specific data',
		'public'        => true,
		'menu_position' => 25,
		'menu_icon' 	=> '',
		'supports'      => array( 'title', 'thumbnail'),
		'has_archive'   => true,
		'rewrite' 		=> true
	);
	register_post_type( 'participant', $args );
}
add_action( 'init', 'daq_participant' );


function ST4_get_company($post_ID) {
	$company = get_post_meta($post_ID, '_participant_company', true);
	if (!empty($company)) {
		return $company;
	}
}
function ST4_columns_head_participants($columns) {
	$columns['featured_image'] = 'Photo';

	$customOrder = array('cb','featured_image', 'title', 'company', 'date');
	foreach ($customOrder as $colname)
		$new[$colname] = $columns[$colname];
	return $new;
}
function ST4_columns_content_participants($column_name, $post_ID) {
	if ($column_name == 'featured_image') {
		$post_featured_image = ST4_get_featured_image($post_ID);
		if ($post_featured_image) {
			echo '<img width="55px" src="' . $post_featured_image . '" />';
		}
		else {
			echo '<img width="55px" src="' . get_asset_if_exists("/library/images/blank.jpg") . '">';
		}
	}
	if ($column_name == 'company') {
		$company = ST4_get_company($post_ID);
		if ($company) {
			echo $company;
		}
		else {
			echo 'No Company Listed';
		}
	}
}

add_filter('manage_participant_posts_columns', 'ST4_columns_head_participants', 10);
add_action('manage_participant_posts_custom_column', 'ST4_columns_content_participants', 10, 2);

if ( ! function_exists ( 'addParticipantMetabox' ) ) {
		function addParticipantMetabox() {
			$participantData = new WPAlchemy_MetaBox(array
			(
				'id' => '_participant_data',
				'mode' => WPALCHEMY_MODE_EXTRACT,
				'prefix' => '_participant_',
				'title' => 'Participant Information',
				'types' => array('participant'),
				'context' => 'normal', // same as above, defaults to "normal"
				'priority' => 'high', // same as above, defaults to "high"
				'template' => get_stylesheet_directory() . '/library/_prodaq/participant/participant-base.php'
			));
		}
}
addParticipantMetabox();
