<?php
use fw\core\Router;


$query = rtrim($_SERVER['QUERY_STRING'], '/');


define("DEBUG", 1);
define('WWW', __DIR__);
define('CORE', dirname(__DIR__) . '/vendor/fw/core');
define('ROOT', dirname(__DIR__));
define('LIBS', dirname(__DIR__) . '/vendor/fw/libs');
define('APP', dirname(__DIR__) . '/app');
define('CACHE', dirname(__DIR__) . '/tmp/cache');
define('PASS', dirname(__DIR__) . '/public/index.php');
define('LAYOUT', 'blog');
define('ADMIN', 'http://localhost/mvc_2/admin');


require __DIR__ . '/../vendor/fw/libs/functions.php';
require __DIR__ . '/../vendor/autoload.php';

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
