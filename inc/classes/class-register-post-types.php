<?php

/**
 * Register Post Types
 *
 * @package Advancetheme
 */

namespace ADVANCE_THEME\Inc;

use ADVANCE_THEME\Inc\Traits\Singleton;

class Register_Post_Types {

    use Singleton;

    protected function __construct() {

        // load class.
        $this->setup_hooks();
    }

    protected function setup_hooks() {

        /**
         * Actions.
         */
        add_action('init', [$this, 'create_book_cpt'], 0);
    }

    // Register Custom Post Type Book
    public function create_book_cpt() {

        $labels = [
            'name' => _x('Books', 'Post Type General Name', 'advance-theme'),
            'singular_name' => _x('Book', 'Post Type Singular Name', 'advance-theme'),
            'menu_name' => _x('Books', 'Admin Menu text', 'advance-theme'),
            'name_admin_bar' => _x('Book', 'Add New on Toolbar', 'advance-theme'),
            'archives' => __('Book Archives', 'advance-theme'),
            'attributes' => __('Book Attributes', 'advance-theme'),
            'parent_item_colon' => __('Parent Book:', 'advance-theme'),
            'all_items' => __('All Books', 'advance-theme'),
            'add_new_item' => __('Add New Book', 'advance-theme'),
            'add_new' => __('Add New', 'advance-theme'),
            'new_item' => __('New Book', 'advance-theme'),
            'edit_item' => __('Edit Book', 'advance-theme'),
            'update_item' => __('Update Book', 'advance-theme'),
            'view_item' => __('View Book', 'advance-theme'),
            'view_items' => __('View Books', 'advance-theme'),
            'search_items' => __('Search Book', 'advance-theme'),
            'not_found' => __('Not found', 'advance-theme'),
            'not_found_in_trash' => __('Not found in Trash', 'advance-theme'),
            'featured_image' => __('Featured Image', 'advance-theme'),
            'set_featured_image' => __('Set featured image', 'advance-theme'),
            'remove_featured_image' => __('Remove featured image', 'advance-theme'),
            'use_featured_image' => __('Use as featured image', 'advance-theme'),
            'insert_into_item' => __('Insert into Book', 'advance-theme'),
            'uploaded_to_this_item' => __('Uploaded to this Book', 'advance-theme'),
            'items_list' => __('Books list', 'advance-theme'),
            'items_list_navigation' => __('Books list navigation', 'advance-theme'),
            'filter_items_list' => __('Filter Books list', 'advance-theme'),
        ];
        $args = [
            'label' => __('Book', 'advance-theme'),
            'description' => __('The Books', 'advance-theme'),
            'labels' => $labels,
            'menu_icon' => 'dashicons-book-alt',
            'supports' => [
                'title',
                'editor',
                'excerpt',
                'thumbnail',
                'revisions',
                'author',
                'comments',
                'trackbacks',
                'page-attributes',
                'custom-fields',
            ],
            'taxonomies' => [],
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'menu_position' => 5,
            'show_in_admin_bar' => true,
            'show_in_nav_menus' => true,
            'can_export' => true,
            'has_archive' => true,
            'hierarchical' => false,
            'exclude_from_search' => false,
            'show_in_rest' => true,
            'publicly_queryable' => true,
            'capability_type' => 'post',
        ];

        register_post_type('books', $args);
    }

}
