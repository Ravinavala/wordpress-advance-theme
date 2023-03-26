<?php
/**
 * Header template file
 *
 * @package Advacnetheme
 */
?>
<!doctype html>
<html lang="<?php language_attributes(); ?>">
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width,initial-scale=1" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title><?php wp_title(); ?></title>
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <?php if(function_exists('wp_body_open')) { 
            wp_body_open(); 
        } ?>
        <div id="page" class="site">
            
        <header id="masthead" class="site-header">
            <?php get_template_part('template-parts/header/nav'); ?>
        </header>
        <div id="content" class="site-content">
                
        </div>