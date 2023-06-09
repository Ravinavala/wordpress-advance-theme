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

    public function get_menu_id($location) {
        //get all the locations
        $locations = get_nav_menu_locations();
        $menu_id = $locations[$location];
        return !empty($menu_id) ? $menu_id : "";
    }

    public function get_child_menu_items($menu_array, $parent_id) {

        $child_menus = array();
        if (!empty($menu_array) && is_array($menu_array)) {
            foreach ($menu_array as $menu) {
                if (intval($menu->menu_item_parent) === $parent_id) {
                    array_push($child_menus, $menu);
                }
            }
        }

        return $child_menus;
    }

}
