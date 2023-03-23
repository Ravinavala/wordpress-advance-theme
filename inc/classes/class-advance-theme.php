<?php

/*
 * Bootstrap themes
 * 
 * @package Advancetheme
 */

namespace ADVANCE_THEME\Inc;

use ADVANCE_THEME\Inc\Traits\Singleton;

class ADVANCE_THEME {
    /* use singleton from traits to access property and method from singleton */

use Singleton;

    public function construct__() {
        //load class
        Assets::get_instance();
        $this->setup_hooks();
    }

    public function setup_hooks() {
        //add actions and filter hook
    }

}
