<?php

namespace ADVANCE_THEME\Inc\Traits;

trait Singleton {

    public function __construct() {
        
    }

    public function __clone() {
        
    }

    final public static function get_instance() {


        $called_class = get_called_class();

        if (!isset($instance[$called_class])) {

            $instance[$called_class] = new $called_class();

            /**
             * Dependent items can use the `aquila_theme_singleton_init_{$called_class}` hook to execute code
             */
            do_action(sprintf('advance_theme_singleton_init_%s', $called_class)); // phpcs:ignore WordPress.NamingConventions.ValidHookName.UseUnderscores
        }

        return $instance[$called_class];
    }

}
