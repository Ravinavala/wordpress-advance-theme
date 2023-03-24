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

        /**
         * It allows you to link a custom stylesheet file to the TinyMCE editor within the post edit screen.
         *
         * Since we are not passing any parameter to the function,
         * it will by default, link the editor-style.css file located directly under the current theme directory.
         * You can can add 'editor-style.css' if you like to support TinyMCE editor styles.
         *
         * @see add_editor_style(
         * @link https://developer.wordpress.org/reference/functions/add_editor_style/
         */
        add_editor_style();
    }

}
