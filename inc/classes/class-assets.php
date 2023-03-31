<?php

/**
 * Enqueue theme assets
 * @package Advancetheme
 */

namespace ADVANCE_THEME\Inc;

use ADVANCE_THEME\Inc\Traits\Singleton;

class Assets {

    use Singleton;

    protected function __construct() {
        // load class.
        $this->setup_hooks();
    }

    public function setup_hooks() {
        //add actions and filter hook
        add_action('wp_enqueue_scripts', array($this, 'register_styles'));
        add_action('wp_enqueue_scripts', array($this, 'register_scripts'));
    }

    public function register_styles() {
        //register style
        wp_register_style('stylesheet', get_stylesheet_uri(), [], filemtime(ADVANCE_THEME_DIR_PATH . '/style.css'), 'all');
        wp_register_style('bootstrap-css', ADVANCE_THEME_DIR_URI . "/assets/src/library/css/bootstrap.min.css", [], false, 'all');
        wp_register_style('fonts-css', ADVANCE_THEME_DIR_URI . "/assets/fonts/fonts.css", [], false, 'all');

        //enqueue style 
        wp_enqueue_style('stylesheet');
        wp_enqueue_style('fonts-css');
        wp_enqueue_style('bootstrap-css');
    }

    public function register_scripts() {
        //register script
        wp_register_script('main-js', ADVANCE_THEME_BUILD_JS_DIR_URI . '/main.js', ['jquery'], filemtime(ADVANCE_THEME_BUILD_DIR_JS_PATH . '/main.js'), true);
        wp_register_script('bootstrap-js', ADVANCE_THEME_DIR_URI . '/assets/src/library/js/bootstrap.min.js', ['jquery'], false, true);

        //enqueue script
        wp_enqueue_script('main-js');
        wp_enqueue_script('bootstrap-js');
    }

}
