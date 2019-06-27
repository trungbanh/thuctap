<?php

namespace Blog\App;

class Respones {

    // protected static $contend ;

    public function __construct(){
        // 
        
    }

    public function json($data = array()) {
        // $this->contend = $data;
        return json_encode($data) ;
    }

    public function path($path){
        header('Location:'.$path);
    }

    public function view($path, $var = array()) {
        global $loader, $twig;
    
        return $twig->render($path, $var);
    }
}
?>