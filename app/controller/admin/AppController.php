<?php

namespace app\controller\admin;

use fw\core\base\BaseController;
use app\model\User;

class AppController extends BaseController{

    public $layout = 'admin';

    public function __construct($route) {
        parent::__construct($route);
        if(!User::isAdmin() && $route['action'] != 'login') {
            redirect(ADMIN .'/user/login');
        }
    }
}