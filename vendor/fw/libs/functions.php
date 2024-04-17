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
        $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '/cstm_mvc_pattern/';
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

function baseUrl($protocol = true, $host = true)
{
    if ($protocol) {
        $protocol = 'http://';
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') {
            $protocol = 'https://';
        }
    } else $protocol = '';

    if ($host) {
        $host = $_SERVER['HTTP_HOST'];
    } else $host = '';


    $dir =  str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);

    return $protocol . $host . $dir;
}