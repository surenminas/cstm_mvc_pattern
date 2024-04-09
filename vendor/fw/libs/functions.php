<?php

function debug($arr){
    echo "<pre>";
        var_dump($arr);
    echo "</pre>";
}

function redirect($http = false) {
    if($http) {
        $redirect = $http;
    }else{
        $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '/mvc_2//';
    }
    header("Location: $redirect");
    exit;
}

function h($str) {
    return htmlspecialchars($str, ENT_QUOTES);
}

function __($key) {
    echo \fw\core\base\Lang::get($key);
}
