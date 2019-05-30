<?php
namespace Blog\App;
use \Blog\App\Request;


class Boots {
    protected $request;

    public function __construct(Request $request) {
        $this->request = $request;
    }

    public function getControllerMethod() {
        switch($this->request->requestMethod()) {
            case 'GET':
                if (empty($this->request->Query())) {
                    return 'all';
                } else {
                    return 'detail';
                }
            break;
            case 'PUT':
                return 'update';
            case 'POST':
                return 'insert';
            case 'DELETE':
                return 'delete';

        }
    }

    public function run() {

        $myrouter = require_once(ROOT_PATH.'/config/Router.php'); 
        $controllerName = $myrouter[$this->request->controllerName()];
        $controllerClass = new $controllerName;

        $controllerMethod = $this->getControllerMethod();

        // die(var_dump(new $controllerName));

        return call_user_func_array(array($controllerClass, $controllerMethod), array($this->request));
    }
}