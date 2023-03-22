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
        <meta name="viewport" content="width=device-widht,initial-scale=1" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Wordpress theme </title>
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <?php wp_body_open(); ?>
        <header>
            <p>Header</p>
        </header>