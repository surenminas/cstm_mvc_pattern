<?php

namespace fw\core\base;

use fw\core\App;


class View {

    /*
     * current route and parameters
     * @var array
     */
    
    public $route = [];

    /*
     * current view
     * @var string
     */
    public $view;

    /*
     * template
     * @var string
     */
    public $layout;

    public $scripts = [];

    public static $meta = [ 'title' => '', 'desc' => '', 'keywords' => ''];

    public function __construct($route, $layout = '', $view = '') {
        $this->route = $route;
        if($layout === false) {
            $this->layout = false;
        } else {
            $this->layout = $layout ?: LAYOUT;  
        }
        $this->view = $view; 
    }

    protected function compressPage($buffer) {
        $search = [
            "/(\n)+/",
            "/\r\n+/",
            "/\n(\t)+/",
            "/\n(\ )+/",
            "/\>(\n)+</",
            "/\>\r\n</",
        ];
        $replace = [
            "\n",
            "\n",
            "\n",
            "\n",
            '><',
            '><',
        ];
        return  preg_replace($search, $replace, $buffer);
    }

    public function render($vars) {
        Lang::load(App::$app->getProperty('lang'), $this->route);
        if(is_array($vars)) extract($vars);
        $file_view = APP . "/view/{$this->route['prefix']}{$this->route['controller']}/{$this->view}.php";
        ob_start([$this, 'compressPage']); 
        //ob_start("ob_gzhandler");
        
            //header("Content-Encoding: gzip", true);
            if(is_file($file_view)){
            require $file_view;
            } else {
                // echo "File $file_view not found";
                throw new \Exception("File $file_view not found", 404);
            }

            $content = ob_get_contents();
        
         ob_clean();
        //$content = ob_get_clean();
        
        if(false !== $this->layout){
            $file_layout = APP . "/view/layout/{$this->layout}.php";
            if(is_file($file_layout)){
                $content = $this->getScripts($content);
                $scripts = [];
                if (!empty($this->scripts[0])) {
                    $scripts = $this->scripts[0];
                }
                require $file_layout;
            }else{
                // echo "template $file_view not found";
                throw new \Exception("template $file_view not found");
            }
        }
    }

    protected function getScripts($content){
        $pattern = "#<script.*?>.*?</script>#si";
        preg_match_all($pattern, $content, $this->scripts);
        if(!empty($this->scripts)) {
            $content = preg_replace($pattern, '', $content);
        }
        return $content;
    }

    public static function getMeta() {
        echo '<title>' . self::$meta['title'] . '</title>
        <meta name="description" content="' . self::$meta['desc']. '">
        <meta name="keywords" content="' . self::$meta['keywords']. '">';
    }

    public static function setMeta($title = '', $desc = '', $keyword = '') {
        self::$meta['title'] = $title;
        self::$meta['desc'] = $desc;
        self::$meta['keywords'] = $keyword;
    }

    public function getPart($file) {
        $file = APP . "/view/{$file}.php";
        if(is_file($file)){
            require_once $file;
        }else{
            // echo "template $file_view not found";
            throw new \Exception("template $file_view not found");
        }
    }
}