<?php

/**
 * Register nav menu
 * 
 * @package Advancetheme
 */

namespace ADVANCE_THEME\Inc;

use ADVANCE_THEME\Inc\Traits\Singleton;

class Menus {
    use Singleton;
    protected function __construct() {
        //load classes
        $this->setup_hooks();
    }

    public function setup_hooks() {
        //Setup hooks
        add_action('init', array($this, 'register_menus'));
    }

    public function register_menus() {
        register_nav_menus(array(
            'advance-theme-header-menu' => esc_html__("Header Menu", 'advance-theme'),
            'advance-theme-footer-menu' => esc_html('Footer Menu', 'advance-theme'),
        ));
    }
}
