<?php
/**
 * Register Register meta boxes 
 * 
 * @package Advancetheme
 */

namespace ADVANCE_THEME\Inc;

use ADVANCE_THEME\Inc\Traits\Singleton;

class Meta_Boxes {

    use Singleton;

    protected function __construct() {
        //load classes
        $this->setup_hooks();
    }

    public function setup_hooks() {
        //Setup hooks
        add_action('add_meta_boxes', array($this, 'register_custom_meta_boxes'));
    }

    public function register_custom_meta_boxes($post) {
        $screens = array('post');
        foreach ($screens as $screen) {
            add_meta_box(
                'hide-page-title',
                __('Hide page title', 'advance-theme'),
                array($this, 'render_custom_meta_box_html'),
                $screen, 
                'side'
            );
        }
    }

    public function render_custom_meta_box_html($post) {
        $selection = get_post_meta( $post->ID, '_hide_page_title', true );
        wp_nonce_field(plugin_basename(__FILE__), 'hide_title_meta_box_nonce_name');
        ?>
        <label for="advancetheme-field"><?php esc_html_e('Hide the page title', 'advance-theme'); ?></label>
        <select name="advacnetheme_hide_title_field" id="advance-theme-field" class="post_meta">
            <option value=""><?php esc_html_e('Select', 'advance-theme'); ?></option>
            <option value="yes" <?php selected($selection, 'yes'); ?>>
                <?php esc_html_e('Yes', 'advance-theme'); ?>
            </option>
            <option value="no" <?php selected($selection, 'no'); ?>>
                <?php esc_html_e('No', 'advance-theme'); ?>
            </option>
        </select>
        <?php
    }

}
