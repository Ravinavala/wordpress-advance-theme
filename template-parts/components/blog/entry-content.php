<?php
/**
 * Template for post entry content
 *
 * @package Advancetheme
 */
?>

<section class="entry-content">
   <?php if(is_single()) {
        the_content(
        sprintf(wp_kses( __('Continue Reading %s <span class="meta-nav"> &rarr; </span>', 'advance-theme'), 
                
                [
                    'span' => [
                        'class' => []
                    ]
                ]
                
                ), the_title( '<span class="screen-reader-text">', '</span>'))
        );
   } else { 
       advance_theme_the_excerpt(25);
   } ?>
</section>

