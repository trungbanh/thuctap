<?php
namespace Blog\App;

use \Blog\App\App;
use \Blog\App\Request;


class Boots {

    public function __construct() {
    }

    public function run() {
        $dispatcher = \FastRoute\simpleDispatcher(function(\FastRoute\RouteCollector $r) {
            require_once(ROOT_PATH."/config/Router.php");
        });
        
        // Fetch method and URI from somewhere
        $httpMethod = $_SERVER['REQUEST_METHOD'];
        $uri = $_SERVER['REQUEST_URI'];
        
        // Strip query string (?foo=bar) and decode URI
        if (false !== $pos = strpos($uri, '?')) {
            $uri = substr($uri, 0, $pos);
        }
        $uri = rawurldecode($uri);
        
        $routeInfo = $dispatcher->dispatch($httpMethod, $uri);
        switch ($routeInfo[0]) {
            case \FastRoute\Dispatcher::NOT_FOUND:
                // ... 404 Not Found
                // throw new \Exception ('404 Not Found');
                break;
            case \FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
                $allowedMethods = $routeInfo[1];
                // ... 405 Method Not Allowed

                // throw new \Exception ('405 Method Not Allowed');
                break;
            case \FastRoute\Dispatcher::FOUND:
                $handler = $routeInfo[1];
                $vars = $routeInfo[2];

                list($className, $classMethod) = explode("@",$handler);
                $classinit = new $className();
                App::request()->setQuery($vars);
                echo call_user_func_array(array($classinit,$classMethod),array( App::request()));
                break;

            default:
                throw new Exception ('N/A method Not Allowed');
        }
    }
}