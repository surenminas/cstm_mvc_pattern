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


}