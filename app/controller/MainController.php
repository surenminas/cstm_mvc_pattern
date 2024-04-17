<?php

namespace app\controller;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

use app\model\Main;
use fw\core\base\View;
use fw\libs\Pagination;
use fw\core\App;

use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

use app\model\Posts;

class MainController extends AppController {

    public function indexAction() {
        
        AppController::customRegister('js','test.js'); //file name 
        // AppController::customRegister('css', 'test.css');

        // App::$app->registerScript('something/xxx');
        // App::$app->registerStyle('something/xxx');

        $lang = App::$app->getProperty('lang')['code'];

        $total = \R::count('posts', "lang_code = ?", [$lang]);
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = 2;


        $pagination = new Pagination($page, $perpage, $total);
        $start = $pagination->getStart();
        $posts = \R::findAll('posts', "lang_code = ? LIMIT $start, $perpage", [$lang]);

      
        $menu = $this->getMenu();
        View::setMeta('Personal blog Home page', 'blog', 'blog, post');
        $this->set(compact('posts', 'menu', 'pagination', 'total'));
 
    }

    public function aboutAction() {
        $model = new Main;
        if($this->isAjax()) {
            $post = \R::findOne('posts', "id = {$_POST['id']}");
            $this->loadView('test', compact('post'));
            die;
        }
        $menu = $this->getMenu();
        $this->set(compact('menu'));
    }

    public function contactAction() {
        if(!empty($_POST)) {
            $to = 'mail_mail@mail.ru';
            $subject = "От сайта: blog_mvc, Name: {$_POST['name']}, Email: " . $_POST['email'];
            $msg = $_POST['text'];
            if(mail( $to, $subject, $msg )) {
                    $this->errors['success'] = 'Your mail sent';
                }else{
                    $this->errors['error'] = 'WRONGE your mail not send';
            }       
        }
        $error = $this->errors;
        $menu = $this->getMenu();
        $this->set(compact('error', 'menu'));


        //$phpMailer = new PHPMailer();
    }

}