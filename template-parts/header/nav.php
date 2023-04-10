<?php
/**
 * Header Navigation
 * @package Advancetheme
 */
$menu_class = ADVANCE_THEME\Inc\Menus::get_instance();

$header_menu_id = $menu_class->get_menu_id('advance-theme-header-menu');

$header_menus = wp_get_nav_menu_items($header_menu_id);

//
//wp_nav_menu(array('theme-location' => "advance-theme-header-menu",
//    'theme-class' => "menu-container-class"));
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <?php
        if (function_exists('the_custom_logo')) {
            the_custom_logo();
        }
        ?>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <?php
            if (!empty($header_menus) && is_array($header_menus)) {
                ?>
                <ul class="navbar-nav mr-auto">
                    <?php
                    foreach ($header_menus as $menu_item) {
                        if (!$menu_item->menu_item_parent) {
                            $child_menu_items = $menu_class->get_child_menu_items($header_menus, $menu_item->ID);
                            $has_children = !empty($child_menu_items) && is_array($child_menu_items);
                            if (!$has_children) {
                                echo '<li class="nav-item active">
                            <a class="nav-link" href="' . esc_url($menu_item->url) . '">' . esc_html($menu_item->title) . '</a>
                            </li>';
                            } else {
                                echo '<li class="nav-item dropdown">
                             <a class="nav-link dropdown-toggle" href="' . esc_url($menu_item->url) . '" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             ' . esc_html($menu_item->title) . '
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">';
                                foreach ($child_menu_items as $child_menu_item) {
                                    echo '<a class="dropdown-item" href="' . esc_url($child_menu_item->url) . '">' . esc_html($child_menu_item->title) . '</a>';
                                }
                                echo '</div>
                         </li>';
                            }
                        }
                    }
                    ?>
                </ul>
            <?php
            }
            echo get_search_form();
            ?>
        </div>
    </div>
</nav>