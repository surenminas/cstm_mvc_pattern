<?php

namespace app\controller;

use app\model\Main;
use fw\core\App;
use fw\core\base\BaseController;
use fw\core\Router;
use fw\libs\Cache;
use fw\widgets\language\Language;

class AppController extends BaseController {
    
    //public $meta = [];
    public $errors = [];
    public static $customScripts = [];
    public static $customStylesheets = [];
     
    public function __construct($route) {
        parent::__construct($route);

        self::getActionStyleAndScript();

        new Main;
        App::$app->setProperty('langs', Language::getLanguages()); 
        App::$app->setProperty('lang', Language::getLanguage(App::$app->getProperty('langs'))); 

        // debug(App::$app->getProperties('langs'));
        //App::$app->cache->delete('category');
    }

    protected function getMenu(){
        $category = new Cache();
        $catMenu = $category->get('category');
        if(!$catMenu) {
            //$catMenu = \R::getAssoc('SELECT * FROM category');
            $catMenu = \R::findAll('category');
            $catMenu = $category->set('category', $catMenu);
        }
        return $catMenu;
    }

    protected function getActionStyleAndScript() {
        $filesPath = Router::getRoute();
        $filesPathController = lcfirst($filesPath['controller']);
        $filesPathAction = $filesPath['action'];

        if(file_exists(WWW . '\js\\'. $filesPathController . '.' . $filesPathAction . '.js')) {
            self::$customScripts[] = $filesPathController . '.' . $filesPathAction . '.js';
        }

        if(file_exists(WWW . '\css\\'. $filesPathController . '.' . $filesPathAction . '.css')) {
            self::$customStylesheets[] = $filesPathController . '.' . $filesPathAction . '.css';
        }
    }

    public static function customRegister($fileExtension, $fileName) {
        $filesPath = Router::getRoute();
        $filesPathController = lcfirst($filesPath['controller']);

        if($fileExtension == 'js') {
            self::$customScripts[] = $filesPathController . '.' . $fileName;
        }
        
        if($fileExtension == 'css') {
            self::$customStylesheets[] = $filesPathController . '.' . $fileName;
        }

    }

    // public static function registerScript($name) {
    //     $filesPath = Router::getRoute();
    //     self::$customScripts[] = $filesPath['controller'] .'\\'. $name;
    // }

    // public static function registerStylesheets($name) {
    //     $filesPath = Router::getRoute();
    //     self::$customStylesheets[] = $filesPath['controller'] .'/'. $name;
    // }

        

    // protected function setMeta($title = '', $desc = '', $keywords = '') {
    //     $this->meta['title'] = $title;
    //     $this->meta['description'] = $desc;
    //     $this->meta['keywords'] = $keywords;
    // }
}