<?php
/*
Author: Prodaq
URL: http://nasdaqdesign.com

Just pulling together all the various functions needed for Prodaq
*/

// Our front and backend scripts
include( '_prodaq/scripts.php');

// Add Font Awesome to admin head
function FontAwesome_icons() {
		echo '<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"  rel="stylesheet">';
}
// This needs to go in the head. pretty neat wysiwyg. for some reason couldn't get the wp one working with wpalchemy but this should suffice. configuration file is in library/js/libs/ckeditor/config.js
// more importantly, this editor creates <p> tags on enter. works now on repeatable groups too.
function CKEditor(){
	echo '<script src="' . get_template_directory_uri() . '/library/js/libs/ckeditor/ckeditor.js"></script>';
	echo '<script src="' . get_template_directory_uri() . '/library/js/libs/ckeditor/adapters/jquery.js"></script>';
}
add_action('admin_head', 'CKEditor');
add_action('admin_head', 'FontAwesome_icons');
add_action('wp_head', 'FontAwesome_icons');


register_sidebar(array(
	'name'=> 'Events',
	'id' => 'event_widget',
	'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget' => '</li>',
	'before_title' => '<h3>',
	'after_title' => '</h3>',
));

function pluralize($count, $singular, $plural = false)
{
	 if (!$plural) $plural = $singular . 's';

	return ($count == 1 ? $singular : $plural) ;
}

// Kill the admin bar
add_filter('show_admin_bar', '__return_false');

// For checking page templates
$post_id = isset($_GET['post']) ? $_GET['post'] : isset($_POST['post_ID']) ? $_POST['post_ID'] : false;
$template_file = get_post_meta($post_id,'_wp_page_template',TRUE);

function ST4_get_featured_image($post_ID) {
		$post_thumbnail_id = get_post_thumbnail_id($post_ID);
		if ($post_thumbnail_id) {
				$post_thumbnail_img = wp_get_attachment_image_src($post_thumbnail_id, 'featured_preview');
				return $post_thumbnail_img[0];
		}
}

/* Include Login Styles */
include( '_prodaq/login.php');
/* Include Dashboard Widgets */
include( '_prodaq/dashboard.php');

//Metaboxes via WPAlchemy
//https://github.com/farinspace/wpalchemy
/*I've chosen to use wpalchemy for a few reasons over something like CMB2, Cuztom, etc because it allows full control over the actual template of the metaboxes where as the others just generate the markup from a series of objects. WPAlchemy has decent community of answers and for the most part works pretty solidly (in my experience at least) for most basic needs despite no longer having full support. I'm hoping that it's revisited by the author at some point (ive had to manually update the image uploader etc) as wordpress continues to advance. If we can find another option with the same degree of control, it should be easy enough to maintain the db values. -dansel */
include '_prodaq/wpalchemy.php';
/* Include Participant Custom Post Using WPAlchemy */
include( '_prodaq/participant/participants.php');
/* Include Campaign Custom Post and Metaboxes */
include( '_prodaq/campaign/campaigns.php');
/* Include Persona Custom Post and Metaboxes */
include( '_prodaq/persona/personas.php');

function remove_prodaq_menus(){
		if ( function_exists('remove_menu_page') ) {
				remove_menu_page('edit-comments.php');  // Remove the Links tab by providing its slug
		}
}
add_action('admin_menu', 'remove_prodaq_menus');

/* We dont' need the editor since we're using custom metaboxes */
add_action( 'init', 'hide_editor' );
function hide_editor() {
	remove_post_type_support( 'persona', 'editor' );
	remove_post_type_support( 'campaign', 'editor' );
	remove_post_type_support( 'participant', 'editor' );
	$post_id = isset($_GET['post']) ? $_GET['post'] : isset($_POST['post_ID']) ? $_POST['post_ID'] : false;
	if( !isset( $post_id ) ) return;

	// Get the name of the Page Template file.
	$template_file = get_post_meta($post_id, '_wp_page_template', true);
	if($template_file == 'templates/page-iframe.php' || $template_file == 'templates/page-work.php' || $template_file == 'templates/page-resources.php') { // edit the template name
		remove_post_type_support('page', 'editor');
	}
}
/* Add Logged Out body class... can add others here too */
add_filter('body_class','my_class_names');
function my_class_names($classes) {
	global $post;
	if ( isset( $post ) ) {
		$classes[] = $post->post_type . '-' . $post->post_name;
	}

	// if (! ( is_user_logged_in() ) ) {
	// 		$classes[] = 'logged-out';
	// }
	return $classes;
}

/* Change Title Placeholder to Name of Persona */
function change_default_title( $title ){
		$screen = get_current_screen();
		if ( 'persona' == $screen->post_type ){
				$title = 'Enter Name';
		}
		if ( 'campaign' == $screen->post_type ){
				$title = 'Campaign Title';
		}
		if ( 'participant' == $screen->post_type ){
				$title = 'Participant Name';
		}
		return $title;
}
add_filter( 'enter_title_here', 'change_default_title' );

function get_asset_if_exists($asset) {
	if(file_exists(get_stylesheet_directory() . $asset)) {
		return get_stylesheet_directory_uri() . $asset;
	}
	else if(file_exists(get_template_directory() . $asset)){
		return get_template_directory_uri() . $asset;
	}
	else {
		return "";
	}
}
