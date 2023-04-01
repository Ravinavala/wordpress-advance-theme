<?php

/**
 * Register Block Pattern  
 * 
 * @packagep_hooks();
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

  Advancetheme
 */

namespace ADVANCE_THEME\Inc;

use ADVANCE_THEME\Inc\Traits\Singleton;

class Block_Patterns {

    use Singleton;

    protected function __construct() {
        //load classes
        $this->setup_hooks();
    }

    public function setup_hooks() {
        //Setup hooks
        add_action('init', array($this, 'register_block_pattern'));
        add_action('init', array($this, 'get_pattern_content'));
    }

    public function register_block_pattern() {
        if (function_exists('register_block_pattern')) {
            $cover_content = $this->get_pattern_content('template-parts/patterns/cover');

            register_block_pattern(
                    'advance-theme/cover',
                    [
                        'title' => __('Advance Theme Cover Block', 'advance-theme'),
                        'description' => __('Advance theme cover block with image and text', 'advacne-theme'),
                        'content' => $cover_content
                    ]
            );
        }
    }

    public function get_pattern_content($template_path) {

        ob_start();

        get_template_part($template_path);

        $pattern_content = ob_get_contents();

        ob_end_clean();

        return $pattern_content;
    }

}
