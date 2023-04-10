<?php
/*
 * Front page template
 * 
 * @package Advancetheme
 */

get_header();
?>

<div id="primary">
    <main id="main" class="site-main mt-5" role="main">
        <?php if (have_posts()) :
            ?>
            <div class="home-page-wrap">
                <?php
                    get_template_part('template-parts/content', 'page');
                ?>
            </div>
            <?php
        else:
            get_template_part('template-parts/content-none');
        endif;
            get_template_part('template-parts/components/posts-carousel');
        ?>
    </main>
</div>

<?php get_footer(); ?>