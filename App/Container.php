<?php 
namespace Blog\App;

use \Blog\App\Request;
use \Blog\App\Session;


class Container 
{
    protected $session ;
    protected $request ;

    public function __construct() {
        $this->session = new Session();
        $this->request = new Request();
    }

    function session () {
        return $this->session;
    }

    function request () {
        return $this->request;
    }

}