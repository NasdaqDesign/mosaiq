<?php

$css = get_template_directory_uri() . '/library/css/';
$libs = get_template_directory_uri() . '/library/js/libs/';
$prodaq = get_template_directory_uri() . '/library/js/prodaq/min/';


function prodaq_scripts_and_styles(){
	global $post_type;

	wp_register_style( 'select2', get_template_directory_uri() . '/library/css/select2/select2.css', false, '3.5.4', 'all' );
	wp_register_style( 'select2-skins', get_template_directory_uri() . '/library/css/select2/select2-skins.css', false, '3.5.2', 'all' );

	wp_enqueue_style( 'select2' );
	wp_enqueue_style( 'select2-skins' );

	// Libraries/plugins
	wp_register_script( 'fancybox', 				$GLOBALS['libs'] . 'fancybox/jquery.fancybox.pack.js', array(), '2.1.5', true );
	wp_register_script( 'fancy-buttons', 		$GLOBALS['libs'] . 'fancybox/helpers/jquery.fancybox-buttons.js', array(), '1.0.5', true );
	wp_register_script( 'fancy-media', 			$GLOBALS['libs'] . 'fancybox/helpers/jquery.fancybox-media.js', array(), '1.0.5', true );
	wp_register_script( 'fullPage', 				$GLOBALS['libs'] . 'jquery.fullPage.min.js', array(), '2.6.5', true );
	wp_register_script( 'hideseek', 				$GLOBALS['libs'] . 'jquery.hideseek.min.js', array(), '0.6.2', true );
	wp_register_script( 'isotope', 					$GLOBALS['libs'] . 'isotope.pkgd.min.js', array(), '2.2.0', true );
	wp_register_script( 'progressbar', 			$GLOBALS['libs'] . 'progressbar.min.js', array(), '0.9.0', true );
	wp_register_script( 'slick', 						$GLOBALS['libs'] . 'slick.min.js', array(), '1.3.7', true );
	wp_register_script( 'stellar', 					$GLOBALS['libs'] . 'jquery.stellar.min.js', array(), '0.6.2', true );
	wp_register_script( 'wow', 							$GLOBALS['libs'] . 'wow.min.js', array(), '1.1.2', true );
	wp_register_script( 'select2-js', 			$GLOBALS['libs'] . 'select2.min.js', 'jquery', '3.5.4', true);



	// Breaking these all out into more modular files with dependencies
	// Our base JS and core functions
	wp_register_script( 'core', 						$GLOBALS['prodaq'] . 'core-min.js', array(), false, true );
	// Page or post specific
	wp_register_script( 'campaign', 				$GLOBALS['prodaq'] . 'campaign-min.js', array('fancybox', 'fancy-media', 'isotope', 'daq-isotope', 'hideseek'), false, true);
	wp_register_script( 'daq-isotope', 			$GLOBALS['prodaq'] . 'daq-isotope-min.js', array(), false, true );
	wp_register_script( 'design-resources', $GLOBALS['prodaq'] . 'design-resources-min.js', array('fancybox', 'fancy-media'), false, true );
	wp_register_script( 'findings', 				$GLOBALS['prodaq'] . 'findings-min.js', array('fullPage'), false, true );
	wp_register_script( 'persona', 					$GLOBALS['prodaq'] . 'persona-min.js', array('isotope', 'daq-isotope'), false, true );
	wp_register_script( 'product', 					$GLOBALS['prodaq'] . 'product-min.js', array('fancybox', 'slick'), false, true);
	wp_register_script( 'stats', 						$GLOBALS['prodaq'] . 'stats-min.js', array('isotope', 'daq-isotope', 'progressbar', 'select2-js'), false, true );
	wp_register_script( 'story', 						$GLOBALS['prodaq'] . 'story-min.js', array('fullPage'), false, true );
	wp_register_script( 'participant', 			$GLOBALS['prodaq'] . 'participant-min.js', array('fancybox', 'fancy-media'), false, true );
	wp_register_script( 'report', 					$GLOBALS['prodaq'] . 'report.js', array('fullPage'), false, true );


	wp_enqueue_script( 'stellar' );
	wp_enqueue_script( 'wow' );


	wp_enqueue_script('core');
	// This lets us access directory_uri.template_directory_uri as a variable in our JS so we can reference assets in the parent theme without them breaking in the child theme.
	$wnm_custom = array( 'template_directory_uri' => get_template_directory_uri() );
	wp_localize_script( 'core', 'directory_uri', $wnm_custom );

	if(is_tax() ){
		wp_enqueue_script( 'story' );
	}
	if(is_page_template('templates/page-home.php')){
		wp_enqueue_script( 'slick' );
	}
	if(is_page_template('templates/page-stats.php')){
		wp_enqueue_script( 'stats' );
	}
	if($post_type == 'persona' || is_post_type_archive('persona') || is_page_template('templates/page-persona-stats.php')){
		wp_enqueue_script('persona');
	}
	if(is_page_template('templates/page-resources.php')){
		wp_enqueue_script('design-resources');
	}
	if($post_type == 'product' || is_post_type_archive('product')){
		wp_enqueue_script('product');
	}
	if($post_type == 'report'){
		wp_enqueue_script('findings');
	}
	if($post_type == 'campaign' || is_post_type_archive('campaign')){
		wp_enqueue_script('campaign');
	}
	if($post_type == 'participant' || is_post_type_archive('participant')){
		wp_enqueue_script('participant');
	}

}
add_action( 'wp_enqueue_scripts', 'prodaq_scripts_and_styles', 999 );


// Admin scripts and styles... needs a bit of cleanup.
function prodaq_admin_scripts_and_styles() {
	global $post_type;
	$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
	$template_file = get_post_meta($post_id,'_wp_page_template',TRUE);


	wp_register_style( 'bootstrap-styles', get_template_directory_uri() . '/library/less/prodaq/plugins/bootstrap.css', false, '3.3.5', 'all');
	//for datepicker
	wp_register_style( 'jquery-ui-style', get_template_directory_uri() . '/library/css/jquery-ui.min.css', false, '1.11.4', 'all' );
	wp_register_style( 'jquery-ui-theme', get_template_directory_uri() . '/library/css/jquery-ui.theme.min.css', false, '1.11.4', 'all');
	wp_register_style( 'select2', get_template_directory_uri() . '/library/css/select2/select2.css', false, '3.5.4', 'all' );
	//http://ui.themepixels.com/select2-skins
	wp_register_style( 'select2-skins', get_template_directory_uri() . '/library/css/select2/select2-skins.css', false, '3.5.2', 'all' );
	//Our stuff
	wp_register_style( 'admin-styles' , get_template_directory_uri() . '/library/css/prodaq-admin.css', false, false, 'all');

	//Scripts
	wp_register_script( 'bootstrap', 				$GLOBALS['libs'] . 'bootstrap.min.js', 'jquery', '3.3.5', true);
	wp_register_script( 'jquery-ui', 				$GLOBALS['libs'] . 'jquery-ui.min.js', 'jquery', '1.11.4', true);
	wp_register_script( 'select2-js', 			$GLOBALS['libs'] . 'select2.min.js', 'jquery', '3.5.4', true);
	wp_register_script( 'hideseek', 				$GLOBALS['libs'] . 'jquery.hideseek.min.js', 'jquery', '0.6.2', true );


	wp_register_script( 'admin', 						$GLOBALS['prodaq'] . 'admin-min.js', array('jquery', 'jquery-ui', 'bootstrap', 'select2-js', 'hideseek'), false, true );


	function wpb_adding_scripts() {

	wp_register_script( 'canvas', 					$GLOBALS['libs'] . 'canvas.js', '1', true );
	wp_enqueue_script('canvas');
	}




	//we dont want bootstrap everywhere, just places we have tabs and stuff since it screws up wordpress styling
	$allowBs = array('participant', 'campaign', 'persona', 'product', 'iteration', 'report','quote');
	foreach($allowBs as $post){
		if($post == $post_type){
			wp_enqueue_style( 'bootstrap-styles' );
		}
	}
	if($template_file == 'templates/page-resources.php') {
		wp_enqueue_style( 'bootstrap-styles' );
	}
	if($template_file == 'templates/page-home.php') {
		wp_enqueue_style( 'canvas' );
	}
	wp_enqueue_style( 'select2' );
	wp_enqueue_style( 'select2-skins' );
	wp_enqueue_style( 'jquery-ui-style' );
	wp_enqueue_style( 'jquery-ui-theme' );
	wp_enqueue_style( 'admin-styles');

	wp_enqueue_script('admin');
}
add_action( 'admin_enqueue_scripts', 'prodaq_admin_scripts_and_styles','wpb_adding_scripts' );
