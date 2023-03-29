<?php

/**
 * Bootstraps the Theme.
 *
 * @package Advancetheme
 */

namespace ADVANCE_THEME\Inc;

use ADVANCE_THEME\Inc\Traits\Singleton;

class ADVANCE_THEME {

    use Singleton;

    protected function __construct() {

        // load class.

        Assets::get_instance();
        Menus::get_instance();
        Meta_Boxes::get_instance();
        Sidebars::get_instance();

        $this->setup_hooks();
    }

    protected function setup_hooks() {

        /**
         * Actions.
         */
        add_action('after_setup_theme', [$this, 'setup_theme']);
    }

    /**
     * Setup theme.
     *
     * @return void
     */
    public function setup_theme() {


        add_theme_support('title-tag');

        add_theme_support(
                'custom-logo',
                [
                    'header-text' => [
                        'site-title',
                        'site-description',
                    ],
                    'height' => 100,
                    'width' => 400,
                    'flex-height' => true,
                    'flex-width' => true,
                ]
        );

        $args = array(
            'default-color' => '000000',
            'default-image' => '',
            'default-repeat' => 'no-repeat'
        );

        add_theme_support('custom-background', $args);

        add_theme_support('post-thumbnails');

        add_image_size('featured-custom-thumbnail', 360, 195, true);
        
        //Register image size
        add_theme_support('customize-selective-refresh-widgets');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /**
         * Switch default core markup for search form, comment form, comment-list, gallery, caption, script and style
         * to output valid HTML5.
         */
        add_theme_support(
                'html5',
                [
                    'search-form',
                    'comment-form',
                    'comment-list',
                    'gallery',
                    'caption',
                    'script',
                    'style',
                ]
        );

        add_editor_style();

        add_theme_support('block-style-editor');
        //Add option to add wide and full width alignment for gutenber blocks like image block 
        add_theme_support('align-wide');

        //Define content width

        global $content_width;
        if (!isset($content_width)) {
            //It will set maximum allowed width for any content in theme like oembed and images
            $content_width = 1240;
        }
        
    }

}
