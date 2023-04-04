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

if (!defined('ADVANCE_THEME_BUILD_DIR_URI')) {
    define('ADVANCE_THEME_BUILD_DIR_URI', untrailingslashit(get_template_directory_uri().'/assets/build'));
}

if (!defined('ADVANCE_THEME_BUILD_JS_DIR_URI')) {
    define('ADVANCE_THEME_BUILD_JS_DIR_URI', untrailingslashit(get_template_directory_uri().'/assets/build/js'));
}

if (!defined('ADVANCE_THEME_BUILD_DIR_JS_PATH')) {
    define('ADVANCE_THEME_BUILD_DIR_JS_PATH', untrailingslashit(get_template_directory().'/assets/build/js'));
}

if (!defined('ADVANCE_BUILD_IMG_DIR_URI')) {
    define('ADVANCE_BUILD_IMG_DIR_URI', untrailingslashit(get_template_directory_uri().'/assets/build/src/img'));
}

if (!defined('ADVANCE_THEME_BUILD_DIR_CSS_PATH')) {
    define('ADVANCE_THEME_BUILD_DIR_CSS_PATH', untrailingslashit(get_template_directory().'/assets/build/css'));
}

if (!defined('ADVANCE_BUILD_CSS_DIR_URI')) {
    define('ADVANCE_BUILD_CSS_DIR_URI', untrailingslashit(get_template_directory_uri().'/assets/build/css'));
}

require_once ADVANCE_THEME_DIR_PATH . '/inc/helpers/autoloader.php';

require_once ADVANCE_THEME_DIR_PATH . '/inc/helpers/template-tag.php';

function advance_theme_instance() {
    //this will instantiate class using namespace and your main class name
    \ADVANCE_THEME\Inc\ADVANCE_THEME::get_instance();
}

advance_theme_instance();

