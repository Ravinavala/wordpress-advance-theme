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
        add_action('save_post', array($this, 'save_post_meta'));
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
        $selection = get_post_meta($post->ID, '_hide_page_title', true);
        wp_nonce_field(plugin_basename(__FILE__), 'hide_title_meta_box_nonce');
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

    public function save_post_meta($post_id) {
        
        if (!current_user_can('edit_post', $post_id)) {
            return;
        }

        /**
         * Check if the nonce value we received is the same we created.
         */
        if (!isset($_POST['hide_title_meta_box_nonce']) ||
                !wp_verify_nonce($_POST['hide_title_meta_box_nonce'], plugin_basename(__FILE__))
        ) {
            return;
        }

        /*
         * If this is an autosave, our form has not been submitted,
         * so we don't want to do anything.
         */
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return $post_id;
        }


        // Sanitize the user input.
        $mydata = sanitize_text_field($_POST['advacnetheme_hide_title_field']);

        // Update the meta field.
        update_post_meta($post_id, '_hide_page_title', $mydata);
    }

}
