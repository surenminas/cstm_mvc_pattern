<?php

namespace app\controller;

class PostsController extends AppController {
    
    // public $layout = 'default';

    public function viewAction() {
        // debug($this->layout);
        // $this->layout = 'default';
        echo "controller/posts";

       
        

    }

    public function singleAction() {
        $post = \R::findOne('posts', "id = ?", [$_GET['p']]);
        $this->set(compact('post'));

    }

    public function testAction() {
        echo "test";

    }


}