<?php

/**
 * Register Custom Taxonomies
 *
 * @package Advancetheme
 */

namespace ADVANCE_THEME\Inc;

use ADVANCE_THEME\Inc\Traits\Singleton;

class Register_Taxonomies {

    use Singleton;

    protected function __construct() {

        // load class.
        $this->setup_hooks();
    }

    protected function setup_hooks() {

        /**
         * Actions.
         */
        add_action('init', [$this, 'create_book_taxonomy']);
        add_action('init', [$this, 'create_year_taxonomy']);
    }

    // Register Taxonomy Book
    public function create_book_taxonomy() {

        $labels = [
            'name' => _x('Books', 'taxonomy general name', 'advance-theme'),
            'singular_name' => _x('Book', 'taxonomy singular name', 'advance-theme'),
            'search_items' => __('Search Books', 'advance-theme'),
            'all_items' => __('All Books', 'advance-theme'),
            'parent_item' => __('Parent Book', 'advance-theme'),
            'parent_item_colon' => __('Parent Book:', 'advance-theme'),
            'edit_item' => __('Edit Book', 'advance-theme'),
            'update_item' => __('Update Book', 'advance-theme'),
            'add_new_item' => __('Add New Book', 'advance-theme'),
            'new_item_name' => __('New Book Name', 'advance-theme'),
            'menu_name' => __('Book', 'advance-theme'),
        ];
        $args = [
            'labels' => $labels,
            'description' => __(' Book', 'advance-theme'),
            'hierarchical' => true,
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_nav_menus' => true,
            'show_tagcloud' => true,
            'show_in_quick_edit' => true,
            'show_admin_column' => true,
            'show_in_rest' => true,
        ];

        register_taxonomy('Book', ['books'], $args);
    }

    // Register Taxonomy Year
    public function create_year_taxonomy() {

        $labels = [
            'name' => _x('Years', 'taxonomy general name', 'advance-theme'),
            'singular_name' => _x('Year', 'taxonomy singular name', 'advance-theme'),
            'search_items' => __('Search Years', 'advance-theme'),
            'all_items' => __('All Years', 'advance-theme'),
            'parent_item' => __('Parent Year', 'advance-theme'),
            'parent_item_colon' => __('Parent Year:', 'advance-theme'),
            'edit_item' => __('Edit Year', 'advance-theme'),
            'update_item' => __('Update Year', 'advance-theme'),
            'add_new_item' => __('Add New Year', 'advance-theme'),
            'new_item_name' => __('New Year Name', 'advance-theme'),
            'menu_name' => __('Year', 'advance-theme'),
        ];
        $args = [
            'labels' => $labels,
            'description' => __('Book Publish Year', 'advance-theme'),
            'hierarchical' => false,
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_nav_menus' => true,
            'show_tagcloud' => true,
            'show_in_quick_edit' => true,
            'show_admin_column' => true,
            'show_in_rest' => true,
        ];
        register_taxonomy('book-publish-year', ['books'], $args);
    }

}
