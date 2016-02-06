<?php 

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}

// Add Secondary menu for Social Media.
register_nav_menu( 'secondary', __( 'Secondary Menu', 'arcade' ) );

?>