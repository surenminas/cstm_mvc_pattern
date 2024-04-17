<?php
use fw\core\Router;

// $query = trim($_SERVER['REQUEST_URI'], '/');

$query = $_SERVER['REQUEST_URI'];


define("DEBUG", 1);
define('LIBS', dirname(__DIR__) . '/vendor/fw/libs');
require LIBS . '/functions.php';
define('WWW', __DIR__);
define('CORE', dirname(__DIR__) . '/vendor/fw/core');
define('ROOT', dirname(__DIR__));
define('APP', dirname(__DIR__) . '/app');
define('CACHE', dirname(__DIR__) . '/tmp/cache');
define('PASS', dirname(__DIR__) . '/public/index.php');
define('LAYOUT', 'blog');
define('ADMIN', 'http://localhost/cstm_mvc_pattern/admin');

require __DIR__ . '/../vendor/autoload.php';

debug(baseUrl());


// spl_autoload_register(function($class){
//     debug($class);
//     $file = ROOT . '/' . str_replace('\\', '/', $class) . '.php';
//     if(is_file($file)){
//         require_once $file;
//     }
// });

new \fw\core\App;

Router::add('^page/(?P<alias>[a-z-]+)$', ['controller' => 'Page', 'action' => 'index']);
Router::add('^page/(?P<action>[a-z-]+)/(?P<alias>[a-z-]+)$', ['controller' => 'Page']);

// About
Router::add('^about/(?P<alias>[a-z-]+)$', ['controller' => 'About', 'action' => 'index']);
Router::add('^about/(?P<action>[a-z-]+)/(?P<alias>[a-z-]+)$', ['controller' => 'About']);

// Contact
Router::add('^contact/(?P<alias>[a-z-]+)$', ['controller' => 'Contact', 'action' => 'index']);
Router::add('^contact/(?P<action>[a-z-]+)/(?P<alias>[a-z-]+)$', ['controller' => 'Contact']);

Router::add('^posts$', ['controller' => 'Posts', 'action' => 'view']);
Router::add('^posts/(?P<action>[a-z-]+)$', ['controller' => 'Posts']);
Router::add('^posts/(?P<alias>[a-z-]+)$', ['controller' => 'Posts', 'action' => 'view']);
Router::add('^posts/(?P<action>[a-z-]+)/?(?P<alias>[a-z-]+)?$', ['controller' => 'Posts']);


// defaults routs
Router::add('^admin$', ['controller' => 'Main', 'action' => 'index', 'prefix' => 'admin']);
Router::add('^admin/?(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$', ['prefix' => 'admin']);

Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');

Router::dispatch($query);
