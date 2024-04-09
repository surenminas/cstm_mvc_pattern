<?php

    $config = [
        'components' => [
            'cache' => 'classes\Cache',
            'test' => 'classes\Test',
        ],
    ];

    spl_autoload_register(function ($class) {
        $file = str_replace("\\", "/" , $class) . ".php";
        if(is_file($file)){
            require_once $file;
        }else {
            echo "Class $file not found";
        }

    });

    class Registry {

        public static $objects = [];

        protected static $instance;

        protected function __construct() {
            global $config;
            foreach($config['components'] as $name => $components) {
                self::$objects[$name] = new $components;
            }            
        }

        public static function instance() {
            if(self::$instance === null) {
                self::$instance = new self;
            }
            return self::$instance;
        }

        public function __get($name) {
            if(is_object(self::$objects[$name])) {
                return self::$objects[$name];
            }else{
                echo "it's not object";
            }
        }

        public function __set($name, $objects) {
            if(!isset(self::$objects[$name])) {
                self::$objects[$name] = new $objects;
            }
        }
        
        // public function getList() {
        //     echo "<pre>";
        //         var_dump(self::$objects);
        //     echo "</pre>";
        // }
        
    }

    $app = Registry::instance();
    // $app->getList();
    // $app->test->go();
    $app->tests = 'classes\Tests';
    // $app->tests->tt(); nael