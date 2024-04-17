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

class ContactController extends AppController {

    public function indexAction() {
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

    }

}