<?php namespace Blog\data;

use Mysqli;

define('ERROR_REPORTING', E_ALL | E_STRICT);

class MysqlDB {
    protected $conn;

    public function __construct() 
    {
        $servername = "localhost";
        $username = "teng";
        $password = "password";
        $dbname =  "myDB";
        try {
            $this->conn = new mysqli();

            @$this->conn->connect($servername, $username, $password, $dbname);
            
            if ($this->conn->connect_error) {
                die("Connection failed: " . $this->conn->connect_error);
            }
        } catch(Exception $e) {
            die('ok');
        }
    }

    public function query ($sql){
        $result = $this->conn->query($sql);
        if ($result) {
            return $result;
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
        }
    }

    public function theLastId(){
        return mysqli_insert_id($this->conn);
    }

    public function close() {
        $this->conn->close();
    }
}