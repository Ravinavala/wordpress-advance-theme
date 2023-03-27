<?php
/**
 * Template for post entry header
 *
 * @package Advancetheme
 */
$the_post_id = get_the_ID();
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
    <?php } ?>
</header>

