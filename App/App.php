<?php 
namespace Blog\App;


class App {
    public static $container; 
    public static function __callStatic($name, $arguments)
    {
        if (App::$container == null) {
            App::$container = new Container();
        }

        return \call_user_func_array( array( App::$container, $name), $arguments);
    }
}