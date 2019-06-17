<?php 
namespace Blog\App;


class Session {
    protected $session = null;
    public function __construct() {
        $this->session = $_SESSION ;
    }

    public function getUser () {
        if (isset( $this->session['user'])) {
            return  $this->session['user'];
        }

        return null;
    }

    public function isSession () {
        return isset($_SESSION['user']);
    }

    
}