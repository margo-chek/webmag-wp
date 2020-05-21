<?php

// Быстрее чем @import
add_action( 'wp_enqueue_scripts', 'my_child_theme_scripts' );
function my_child_theme_scripts() {
    // wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css', array('normalize') );
}


// add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
// function theme_enqueue_styles(){
//     wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array('mytheme-style') );
//     // wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css', array('normalize') );
// }


// не так
// wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

// а так
// wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css', array('normalize') );
