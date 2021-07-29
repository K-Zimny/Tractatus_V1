<?php

/*Tractatus functions and definitions*/

/*enqueue styles*/

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    $parenthandle = 'parent-style';
    $theme = wp_get_theme();
    wp_enqueue_style( $parenthandle, get_template_directory_uri() . '/style.css',
        array(),  // if the parent theme code has a dependency, copy it to here
        $theme->parent()->get('Version')
    );
    wp_enqueue_style( 'child-style', get_stylesheet_uri(),
        array( $parenthandle ),
        $theme->get('Version') // this only works if you have Version in the style header
    );
}

/*enqueue font*/

function wpb_add_google_fonts() {
        wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;500;600;700&display=swap', false );
    }
add_action( 'wp_enqueue_scripts', 'wpb_add_google_fonts' );


?>