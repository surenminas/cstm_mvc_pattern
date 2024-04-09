<?php

namespace app\controller;

use app\model\User;
use fw\core\base\View;
use Valitron\Validator;

class UserController extends AppController{

    public function signupAction() {

        if(!empty($_POST)){
            Validator::langDir(WWW . '/valitron/lang');
            Validator::lang('ru');
            $user = new User();
            $user->load($_POST);
            if(!$user->validate($_POST) || !$user->checkUnique()) {
                $user->getErrors();
                $_SESSION['form_data'] = $_POST;
                redirect();
            }else{
                $user->attributs['password'] = password_hash($user->attributs['password'], PASSWORD_DEFAULT);
                if($user->save('user')) {
                    $_SESSION['success'] = 'you registered successfully';
                }else{
                    $_SESSION['error'] = 'Wrong';
                }
            }
            redirect();
        }
        View::setMeta('Registration', 'desc', 'keyword');
    }

    public function loginAction() {
        if(!empty($_POST)) {
            $user = new User();
            if($user->login()) {
                $_SESSION['success'] = 'you authorized successfully';
                redirect("/mvc_2");
            }else{
                $_SESSION['error'] = 'Wrong login/password';
            }
        }

        View::setMeta('Login', 'desc', 'keyword');        
    }

    public function logoutAction() {
        if(isset($_SESSION['user'])) unset($_SESSION['user']);
        redirect('login');
    }
}