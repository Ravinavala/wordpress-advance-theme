<?php
/**
 * Template for post entry header
 *
 * @package Advancetheme
 */
$the_post_id = get_the_ID();
$has_post_thumbnail = get_the_post_thumbnail($the_post_id)
?>

<header class="entry-header">
    <?php if ($has_post_thumbnail()) { ?>
        <div class="entry-image mb-3">
            <a href="<?php echo esc_url(get_permalink()); ?>"> 
                <?php
                the_post_thumbnail();
                ?>
            </a>
        </div>
    <?php }
    ?>
</header>

