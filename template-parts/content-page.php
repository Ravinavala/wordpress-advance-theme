<?php
/**
 * Content page template template 
 *
 * @package Advancetheme
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('mb-6'); ?>>
    <?php
    if (!is_home()) {
        ?>
        <header class="entry-header">
            <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
        </header><!-- .entry-header -->
        <?php
    }
    ?>

    <div class="entry-content">
        <?php
        the_content();
        if (!is_home()) {
            wp_link_pages(
                    array(
                        'before' => '<div class="page-links">' . esc_html__('Pages:', 'advance-theme'),
                        'after' => '</div>',
                    )
            );
        }
        ?>
    </div>

    <footer class="entry-footer">
        <?php edit_post_link(esc_html__('Edit', 'advance-theme'), '<span class="edit-link">', '</span>'); ?>
    </footer><!-- .entry-footer -->
</article>