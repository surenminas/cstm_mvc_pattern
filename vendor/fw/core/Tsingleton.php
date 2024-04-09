<?php

namespace fw\core;

trait Tsingleton {
    protected static $instance;

    public static function instance() {
        if(self::$instance === null) {
            self::$instance = new self;
        }
        return self::$instance;
    }
}