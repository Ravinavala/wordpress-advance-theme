<?php
/**
 * Template for displaying no content message
 *
 * @package Advancetheme
 */
?>
<section class="no-result not-found">
    <header class="page-header">
        <h1 class="page-title"><?php esc_html_e('Nothing Found', 'advance-theme'); ?></h1>
    </header>

    <div class="page-content">
        <?php
        if (is_home() && current_user_can('publish_posts')) {
            ?>
            <p>
                <?php
                printf(
                        wp_kses(
                                __('Ready to publish your first post? <a href="%s">Get started here</a>', 'advance-theme'),
                                [
                                    'a' => [
                                        'href' => []
                                    ]
                                ]
                        ),
                        esc_url(admin_url('post-new.php'))
                )
                ?>
            </p>
            <?php
        } elseif (is_search()) {
            ?>
            <p><?php esc_html_e('Sorry but nothing matched your search item. Please try again with some different keywords', 'advance-theme'); ?></p>
            <?php
            get_search_form();
        } else {
            ?>
            <p><?php esc_html_e('It seems that we cannot find what you are looking for . Perhaps search can help', 'advance-theme'); ?></p>
            <?php
            get_search_form();
        }
        ?>
    </div>
</section>