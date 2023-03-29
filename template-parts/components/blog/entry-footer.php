<?php
/**
 * Template for post entry footer
 *
 * To be used inside wordpress post loop
 * 
 * @package Advancetheme
 */
$the_post_id = get_the_ID();
$article_terms = wp_get_post_terms($the_post_id, array('category', 'post_tag'));

if (empty($article_terms) || !is_array($article_terms)) {
    return;
}
?>
<section class="entry-footer">
    <?php foreach ($article_terms as $key => $term) { ?>
        <button class="btn border border-secondary mb-2 mr-2">
            <a href="<?php echo esc_url(get_term_link($term)); ?>" class="entry-footer-link text-black-50">
                <?php echo esc_html($term->name); ?>
            </a>
        </button>
        <?php
    }
    ?>
</section>

