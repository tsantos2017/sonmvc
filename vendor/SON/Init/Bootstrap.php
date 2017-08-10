<?php
namespace SON\Init;
abstract class Bootstrap{
    private $routes;
    public function __construct(){
        $this->initRoutes();
        $this->run($this->getUrl());
    }
    abstract protected function initRoutes();
//    protected function run($url){
//        array_walk($this->routes, function ($route) use ($url){
//            if($url == $route['route']){
//                $class = "App\\Controllers\\".ucfirst($route['controller']);
//                $controller = new $class;
//                $action = $route['action'];
//                $controller->$action();
//            }
//        });
//    }

    protected function run($url){
        array_walk($this->routes, function ($route) use ($url){
           $urlComBarra = ltrim($url,'/');
           $routeParts = explode('/',$urlComBarra);
           if("/{$routeParts[0]}" == $route['route']){
               $class = "App\\Controllers\\".ucfirst($route['controller']);
               $controller = new $class;
               $action = $route['action'];
               if(isset($routeParts[1])){
                   $controller->$action($routeParts[1]);
               }else{
                   $controller->$action();
               }
           }
        });
    }

    protected function setRoutes(array $routes){
        $this->routes = $routes;
    }
    protected function getUrl(){
        return parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
    }
}