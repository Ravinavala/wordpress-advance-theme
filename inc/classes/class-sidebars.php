<?php

/**
 * Register sidebar
 * 
 * @package Advancetheme
 */

namespace ADVANCE_THEME\Inc;

use ADVANCE_THEME\Inc\Traits\Singleton;

class Sidebars {

    use Singleton;

    protected function __construct() {
        //load classes
        $this->setup_hooks();
    }

    public function setup_hooks() {
        //Setup hooks
        add_action('widgets_init', array($this, 'register_theme_sidebars'));
        add_action('widgets_init', array($this, 'register_clock_widget'));
    }

    public function register_theme_sidebars() {
        register_sidebar(array(
            'name' => __('Main Sidebar', 'advacnce-theme'),
            'id' => 'sidebar-1',
            'description' => __('Main sidebar', 'advacnce-theme'),
            'before_widget' => '<li id="%1$s" class="widget widget-sidebar %2$s">',
            'after_widget' => '</li>',
            'before_title' => '<h2 class="widgettitle">',
            'after_title' => '</h2>',
        ));
        register_sidebar(array(
            'name' => __('Sidebar', 'advacnce-theme'),
            'id' => 'sidebar-2',
            'description' => __('Footer sidebar', 'advacnce-theme'),
            'before_widget' => '<li id="%1$s" class="widget widget-footer %2$s">',
            'after_widget' => '</li>',
            'before_title' => '<h2 class="widgettitle">',
            'after_title' => '</h2>',
        ));
    }

    public function register_clock_widget() {
        register_widget("ADVANCE_THEME\Inc\Clock_Widget");
    }

}
