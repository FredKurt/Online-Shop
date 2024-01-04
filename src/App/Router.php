<?php
namespace OlineShop\App;

use OlineShop\Controllers\MainController;

class Router {
    const ROUTE_LABEL = "label";
    const ROUTE_METHOD = "method";
    const CLASS_NAME = "className";
    const ACTION_NAME = "actionName";
    public static array $routes = [];
    public static function add($route, $method, $className, $actionName): void {
        $indexName = md5($method . $route);
        if (!array_key_exists($indexName, self::$routes)) {
            self::$routes[$indexName] = [
                self::ROUTE_LABEL => $route,
                self::METHOD_LABEL => $method,
                self::CLASS_NAME => $className,
                self::ACTION_NAME => $actionName
            ];
        }
        
    }

    public static function run (): void {
        $method = strtolower($_SERVER['REQUEST_METHOD']);
        $route = strtolower($_SERVER['REQUEST_URI']);
        $indexName = md5($method . $route);
        if(!array_key_exists($indexName, self::$routes)) {
            $classNameSpace = self::$routes[$indexName][self::CLASS_NAME];
            $action = self::$routes[$indexName][self::CLASS_NAME];
            if(class_exists($classNameSpace)) {
                $object = new $classNameSpace(View());
                $object->{$action . "Action"}();
            } else {
                $mainController = new MainController();
                $mainController->pageNotFoundAction();
                die;
            }
        }
    }
}
