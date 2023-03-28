<?php

/**
 * Theme Functions.
 * @package Advacnetheme
 */
if (!defined('ADVANCE_THEME_DIR_PATH')) {
    define('ADVANCE_THEME_DIR_PATH', untrailingslashit(get_template_directory()));
}

if (!defined('ADVANCE_THEME_DIR_URI')) {
    define('ADVANCE_THEME_DIR_URI', untrailingslashit(get_template_directory_uri()));
}

require_once ADVANCE_THEME_DIR_PATH . '/inc/helpers/autoloader.php';

require_once ADVANCE_THEME_DIR_PATH . '/inc/helpers/template-tag.php';

function advance_theme_instance() {
    //this will instantiate class using namespace and your main class name
    \ADVANCE_THEME\Inc\ADVANCE_THEME::get_instance();
}

advance_theme_instance();

