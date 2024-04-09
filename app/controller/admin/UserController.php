<?php

namespace app\controller\admin;

// use app\controller\admin;
use app\model\User;
use fw\core\base\View;

class UserController extends AppController{

    public $layout = 'admin';

    public function indexAction() {
        View::setMeta('Admin page', 'desc', 'keyword');
        View::getMeta();
        
        // $this->set(compact('metaInfo'));
    }

    public function loginAction() {
        if(!empty($_POST)) {
            $user = new User();
            if(!$user->login(true)) {
                $_SESSION['error'] = 'Login/Password error';
            }
            if(User::isAdmin()) {
                redirect(ADMIN);
            }else{
                redirect();
            }
        }
        $this->layout = 'login';
    }

    public function logoutAction() {
        if(isset($_SESSION['user'])) unset($_SESSION['user']);
        redirect(ADMIN .'/user/login');
    }
}

