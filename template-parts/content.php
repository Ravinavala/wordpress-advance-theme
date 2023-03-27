<?php
/**
 * Main template file
 *
 * @package Advancetheme
 */
?>

<article id="post-<?php the_ID(); ?> <?php post_class('mb-5'); ?>">
    <?php get_template_part('template-parts/components/blog/entry-header', $name); ?>
    <?php get_template_part('template-parts/components/blog/entry-content', $name); ?>
    <?php get_template_part('template-parts/components/blog/entry-meta', $name); ?>
    <?php get_template_part('template-parts/components/blog/entry-footer', $name); ?>
</article>