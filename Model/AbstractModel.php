<?php 
namespace Blog\Model;
abstract class AbstractModel {
    protected $fields = array();

    protected $data = array(

    );
    public function __construct(array $data = array()) {
        $this->data = $data;
    }

    public function __get($varname) {
        if (isset($this->data[$varname])) {
            return $this->data[$varname];
        }
        
        // throw new exceptio

        return null;
    }
    
    public function __set($varname, $value) {
        return $this->data[$varname] = $value;
    }

}

?>