<?php

/**
 * Theme Functions.
 * @package Advacnetheme
 */
if ( !defined( 'ADVANCE_THEME_DIR_PATH' )) {
    define( 'ADVANCE_THEME_DIR_PATH' , untrailingslashit(get_template_directory() ) );
}

require_once ADVANCE_THEME_DIR_PATH . '/inc/helpers/autoloader.php';

function advance_theme_enqueue_script() {

    //register style
    wp_register_style('stylesheet', get_stylesheet_uri(), [], filemtime(get_template_directory() . '/style.css'), 'all');
    wp_register_style('bootstrap-css', get_template_directory_uri() . "/assets/src/library/css/bootstrap.min.css", [], false, 'all');
    //register script
    wp_register_script('main-js', get_template_directory_uri() . '/assets/main.js', [], filemtime(get_template_directory() . '/assets/main.js'), true);
    wp_register_script('bootstrap-js', get_template_directory_uri() . '/assets/src/library/js/bootstrap.min.js', ['jquery'], false, true);

    //enqueue style 
    wp_enqueue_style('stylesheet');
    wp_enqueue_style('bootstrap-css');
    //enqueue script
    wp_enqueue_script('main-js');
    wp_enqueue_script('bootstrap-js');
}

add_action('wp_enqueue_scripts', 'advance_theme_enqueue_script');
