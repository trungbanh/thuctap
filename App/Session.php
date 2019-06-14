<?php 
namespace Blog\App;


class Session {
    protected $session = null;
    public function __construct() {
        $this->session = $_SESSION ;
    }

    public function getUser () {
        return $this->session['user'];
    }

    public function isSession () {
        return isset($_SESSION['user']);
    }
}