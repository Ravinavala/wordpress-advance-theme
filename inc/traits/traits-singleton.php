<?php

namespace ADVANCE_THEME\Inc\Traits;

trait Singleton {
    
    public function __construct() {
        
    }
    
    public function __clone(){
        
    }
    
    final public static function get_instance(){
        
        static $instance = array();
        $called_class = get_call_class();
        
        if(!isset($instance [$called_class])){
            $instance[$called_class] = new $called_class();
            do_action(sprintf('advance_theme_singleton_init%s', $called_class));
        }
        
        return $instance[ $called_class ];
    }
}



