<?php

namespace fw\core;

class Registry {

    use Tsingleton;

    protected static $properties = [];

    public function setProperty($name, $value) {
        self::$properties[$name] = $value;
    }

    public function getProperty($name) {
        if(isset(self::$properties[$name])) {
            return self::$properties[$name];
        }
        return null;
    }

    public function getProperties() {
        return self::$properties;
    }

    
    // protected function __construct() {
    //     require ROOT . '/config/config.php';
    //     foreach($config['components'] as $name => $components) {
    //         self::$objects[$name] = new $components;
    //     }            
    // }

    // public function __get($name) {
    //     if(is_object(self::$objects[$name])) {
    //         return self::$objects[$name];
    //     }else{
    //         echo "Error";
    //     }
    // }

    // public function __set($name, $value) {
    //     if(isset(self::$objects[$name])) {
    //         self::$objects[$name] = new $value;
    //     }
    // }
    
    // public static function instance() {
    //     if(self::$instance === null) {
    //         self::$instance = new self;
    //     }
    //     return self::$instance;
    // }

 
     
}