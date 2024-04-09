<?php

namespace app\controller\admin;

use fw\core\base\View;

class MainController extends AppController{

    //public $layout = 'admin';

    public function indexAction() {
        View::setMeta('Admin page', 'desc', 'keyword');
        View::getMeta();
        
        // $this->set(compact('metaInfo'));
    }
}