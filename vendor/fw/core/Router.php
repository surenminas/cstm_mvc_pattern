<?php

namespace fw\core;

class Router
{

    protected static $routes = [];
    protected static $route = [];

    public static function add($regexp, $route = [])
    {
        self::$routes[$regexp] = $route;
    }

    public static function getRouts()
    {
        return self::$routes;
    }

    public static function getRoute()
    {
        return self::$route;
    }

    public static function matchRoute($url)
    {
        foreach (self::$routes as $pattern => $route) {
            if (preg_match("#$pattern#i", $url, $matches)) {
                foreach ($matches as $k => $v) {
                    if (is_string($k)) {
                        $route[$k] = $v;
                    }
                }
                if (!isset($route['action'])) {
                    $route['action'] = 'index';
                }
                //prefix for admin controller
                if (!isset($route['prefix'])) {
                    $route['prefix'] = '';
                } else {
                    $route['prefix'] .= '/';
                }

                $route['controller'] = self::upperCamelCase($route['controller']);
                self::$route = $route;
                return true;
            }
        }
        return false;
    }

    /**
     * перенаправляет URL по конкретному маршруту
     * 
     * @param string $url
     * 
     * @return void // void ничего не возвращает //
     * 
     */

    public static function dispatch($url)
    {
        $url = self::removeQueryString($url);
        if (self::matchRoute($url)) {
            $controller = "app\controller\\" . self::$route['prefix'] . self::$route['controller'] . "Controller";
            var_dump($controller);
            if (class_exists($controller)) {
                $cObj = new $controller(self::$route);
                $action = self::lowerCamelCase(self::$route['action'] . "Action");
                if (method_exists($cObj, $action)) {
                    if (method_exists($cObj, 'before')) $cObj->before();
                    $cObj->$action();
                    $cObj->getView();
                } else {
                    // echo "Method $controller::$action not found";
                    throw new \Exception("Method <b>" . $controller::$action . "</b> not found", 404);
                }
            } else {
                // echo "class " . $controller . " not found";
                throw new \Exception("Method <b>" . $controller . "</b> not found", 404);
            }
        } else {
            // http_response_code(404);
            // include '404.html';
            throw new \Exception("Page not found", 404);
        }
    }

    /**
     * преобразует имена к виду CamelCase
     * @param string $name строка для преобразования
     * @return string
     */
    protected static function upperCamelCase($name)
    {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $name)));
    }

    /**
     * преобразует имена к виду camelCase
     * @param string $name строка для преобразования
     * @return string
     */
    public static function lowerCamelCase($name)
    {
        return lcfirst(self::upperCamelCase($name));
    }

    /**
     * возвращает строку без GET параметров
     * @param string $url Запрос URL
     * @return string
     */

    protected static function removeQueryString($url)
    {
        if (!empty($url)) {
            $params = explode('&', $url, 2);
            if (false === strpos($params[0], '=')) {
                return rtrim($params[0], '/');
            } else {
                return '';
            }
        } else {
            return '';
        }
    }
}
