<?php
function made_in_italy_setup() {
    // Support pour les menus
    add_theme_support('menus');
    register_nav_menu('main-menu', 'Menu Principal');
}
add_action('after_setup_theme', 'made_in_italy_setup');

// Ajouter le support des images mises en avant
add_theme_support('post-thumbnails');

// Enregistrer et lier les styles CSS
function made_in_italy_enqueue_styles() {
    wp_enqueue_style('made-in-italy-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'made_in_italy_enqueue_styles');
?>
