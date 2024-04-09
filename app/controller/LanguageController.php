<?php

namespace app\controller;

use fw\core\App;

class LanguageController extends AppController {

    public function changeAction() {
        $lang = !empty($_GET['lang']) ? $_GET['lang'] : null;
        if($lang) {
            if(array_key_exists($lang, App::$app->getProperty('langs'))){
                setcookie('lang', $lang, time() + 3600, '/');
            }
        }
        redirect();
    }
}