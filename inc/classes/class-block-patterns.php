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
        add_action('init', array($this, 'register_block_pattern_categories'));
    }

    public function register_block_pattern() {
        if (function_exists('register_block_pattern')) {
            $cover_content = $this->get_pattern_content('template-parts/patterns/cover');
            $two_column_content = $this->get_pattern_content('template-parts/patterns/two-columns');

            register_block_pattern(
                'advance-theme/cover',
                [
                    'title' => __('Advance Theme Cover Block', 'advance-theme'),
                    'description' => __('Advance theme cover block with image and text', 'advacne-theme'),
                    'categories' => ['cover'],
                    'content' => $cover_content
                ]
            );
            
             register_block_pattern(
                'advance-theme/two-columns',
                [
                    'title' => __('Advance Theme Two Column Block', 'advance-theme'),
                    'description' => __('Advance theme two column block with heading and text', 'advacne-theme'),
                    'categories' => ['two_columns'],
                    'content' => $two_column_content
                ]
            );
        }
    }

    public function register_block_pattern_categories() {

        $pattern_categories = [
            'cover' => __('Cover', 'advance-theme'),
            'two_columns' => __('Two Columns', 'advance-theme'),
        ];

        if (!empty($pattern_categories) && is_array($pattern_categories)) {
            foreach ($pattern_categories as $pattern_category => $pattern_category_key) {
                register_block_pattern_category(
                        $pattern_category,
                        ['label' => $pattern_category_key]
                );
            }
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
