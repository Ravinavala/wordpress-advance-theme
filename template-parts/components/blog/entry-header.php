<?php
/**
 * Template for post entry header
 *
 * @package Advancetheme
 */

$the_post_id = get_the_ID();
$hide_title = get_post_meta($the_post_id, '_hide_page_title', true);
$heading_class = (!empty($hide_title) && $hide_title === 'yes') ? "hide" : "";
?>
<header class="entry-header">
    <?php if (has_post_thumbnail($the_post_id)) { ?>
        <div class="entry-image mb-3">
            <a href="<?php echo esc_url(get_permalink()); ?>"> 
                <?php
                the_post_custom_thumbnail(
                    $the_post_id,
                    'featured-custom-thumbnail',
                    [
                        'sizes' => '(max-width: 360px) 360px, 195px',
                        'class' => 'attachment-featured-large'
                    ]
                );
                ?>
            </a>
        </div>
    <?php }
    if(is_single() || is_page()) {
        echo '<h1 class="page-title '. esc_attr($heading_class).'">'. wp_kses_post(get_the_title()) .' </h1>';
    } else {
        echo '<h2 class="entry-title mb-3"><a href="'. esc_url(get_the_permalink()).'">'. wp_kses_post(get_the_title()) .' </a></h2>';
    }
    ?>
</header>

