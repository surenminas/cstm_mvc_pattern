<?php

namespace app\controller\admin;

use app\controller\admin\AppController;

class TestController extends AppController{

    public function indexAction() {
        echo __METHOD__;
    }

    public function testAction() {
        echo __METHOD__;
    }
}

