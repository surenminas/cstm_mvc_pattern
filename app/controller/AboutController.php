<?php

namespace app\controller;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

use fw\core\base\View;
use fw\libs\Pagination;
use fw\core\App;

use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class AboutController extends AppController {

    public function indexAction() {
        var_dump('about controller');
        $about = "About";
        $this->set(compact('about'));

    }

    public function aboutAction() {
        // $model = new Main;
        if($this->isAjax()) {
            $post = \R::findOne('posts', "id = {$_POST['id']}");
            $this->loadView('test', compact('post'));
            die;
        }
        $menu = $this->getMenu();
        $this->set(compact('menu'));
    }



}