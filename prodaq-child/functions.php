<?php
/*
Prodaq Child Functions file.
If you intend to add in additional php functions to your customized version of prodaq, add it below.
See https://developer.wordpress.org/themes/basics/theme-functions/ to learn more about the functions.php file.
--------------------------
*/
function child_theme_enqueue_styles() {

    $parent_style = 'parent-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/library/css/style.css' );
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( $parent_style )
    );
}
add_action( 'wp_enqueue_scripts', 'child_theme_enqueue_styles' );
