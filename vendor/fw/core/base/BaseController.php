<?php

namespace fw\core\base;

use fw\core\base\View;

abstract class BaseController {

    /*
     * current route and parameters
     * @var array
     */
    
    public $route = [];

    /*
     * current view
     * @var string
     */
    public $view;

    public $layout;

    public $vars = [];
    
    public function __construct($route) {
        $this->route = $route;
        $this->view = $route['action'];
    }

    
    public function getView(){
        $vObj = new View($this->route, $this->layout, $this->view);
        $vObj->render($this->vars);
    }

    public function set($vars){
        $this->vars = $vars;
    }

    public function isAjax() {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] ==='XMLHttpRequest';
    }

    public function loadView($view, $vars = []) {
        extract($vars);
        require APP . "/view/{$this->route['controller']}/{$view}.php";
    }

}