<?php
function prodaq_login_css() {
	wp_enqueue_style( 'prodaq_login_css', get_template_directory_uri() . '/library/css/login.css', false );
}

// changing the logo link from wordpress.org to your site
function prodaq_login_url() {  return home_url(); }

// changing the alt text on the logo to show your site name
function prodaq_login_title() { return get_option( 'blogname' ); }

// calling it only on the login page
add_action( 'login_enqueue_scripts', 'prodaq_login_css', 10 );
add_filter( 'login_headerurl', 'prodaq_login_url' );
add_filter( 'login_headertitle', 'prodaq_login_title' );
