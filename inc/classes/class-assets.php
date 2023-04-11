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
       	
        wp_register_style('bootstrap-css', ADVANCE_THEME_DIR_URI . "/assets/src/library/css/bootstrap.min.css", [], false, 'all');
        wp_register_style( 'slick-css', ADVANCE_THEME_BUILD_LIBRARY_URI . '/css/slick.css', [], false, 'all' );
	wp_register_style( 'slick-theme-css', ADVANCE_THEME_BUILD_LIBRARY_URI . '/css/slick-theme.css', ['slick-css'], false, 'all' );
        wp_register_style('main-css', ADVANCE_BUILD_CSS_DIR_URI . "/main.css", ['bootstrap-css'], filemtime(ADVANCE_THEME_BUILD_DIR_CSS_PATH . "/main.css"), 'all');
        
        //enqueue style 
        wp_enqueue_style('bootstrap-css');
        wp_enqueue_style('slick-css'); 
        wp_enqueue_style('slick-theme-css');
         
        wp_enqueue_style('main-css');
        wp_enqueue_style('stylesheet');
    }

    public function register_scripts() {
        //register script
        wp_register_script('slick-js', ADVANCE_THEME_BUILD_LIBRARY_URI . '/js/slick.min.js', ['jquery'], false, true);
        wp_register_script('main-js', ADVANCE_THEME_BUILD_JS_DIR_URI . '/main.js', ['jquery'], filemtime(ADVANCE_THEME_BUILD_DIR_JS_PATH . '/main.js'), true);
        wp_register_script('bootstrap-js', ADVANCE_THEME_DIR_URI . '/assets/src/library/js/bootstrap.min.js', ['jquery'], false, true);

        //enqueue script
        wp_enqueue_script('slick-js');
        wp_enqueue_script('main-js');
        wp_enqueue_script('bootstrap-js');
        
        wp_localize_script('main-js', 'siteConfig', [
            'ajaxUrl' => admin_url('admin-ajax.php'),
            'ajax_nonce' => wp_create_nonce('loadmore_post_nonce'),
        ]);
    }

}
