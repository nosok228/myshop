<?php

namespace App\Core;

class Router {

    protected $routes;

    public function __construct()
    {
        $this->routes = include DIR.'/App/Config/routes.php';
    }
    
    private function getUri()
    {
        return trim($_SERVER['REQUEST_URI'], '/');
    }

    public function run()
    {
        foreach($this->routes as $key => $value) {

            if(preg_match('~'.$key.'~', $this->getUri())) {

                $internalRoute = preg_replace('~'.$key.'~', $value, $this->getUri());

                $segments = explode('/', $internalRoute);
                
                $class = ucfirst(array_shift($segments)).'Controller';
                $action = array_shift($segments).'Action';

                $path = '\App\Controllers\\'.$class;

                if(class_exists($path)) {
                    if(method_exists($path, $action)) {
                       $objController = new $path();
                       $result = call_user_func_array([$objController, $action], $segments);
                        
                }
                else {
                    http_response_code(404);
                }
            }
            else {
                http_response_code(404);
            }

                if($result != null) {
                    break;
                }

            }
        }
    }
}