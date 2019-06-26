<?php 
namespace Blog\App;

class Session {
    protected $session = null;
    public function __construct() {
        session_start();
        $this->session = &$_SESSION ;
    }

    public function getUser () {
        if (isset( $this->session['user'])) {
            return $this->session['user'];
        }
        return null;
    }

    public function isSession () {
        return isset($_SESSION['user']);
    }

    public function setUser($user) {
        $this->session['user'] = $user;
    }

    public function destroy(){
        unset($_SESSION['user']);
        session_destroy();
    } 
}