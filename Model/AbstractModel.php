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

        return null;
    }
    
    public function __set($varname, $value) {
        return $this->data[$varname] = $value;
    }
    /**
     * Set/Get attribute wrapper
     *
     * @param   string $method
     * @param   array $args
     * @return  mixed
     */
    public function __call($method, $args)
    {
        switch (substr($method, 0, 3)) {
            case 'get' :
                $key = $this->_underscore(substr($method,3));
                $data = $this->{$key};
                return $data;

            case 'set' :
                $key = $this->_underscore(substr($method,3));
                return $this->{$key} = isset($args[0]) ? $args[0] : null;

            case 'uns' :
                $key = $this->_underscore(substr($method,3));
                if (isset($this->data[$key])) {
                    $result = $this->data[$key];
                } else {
                    $result = null;
                }

                unset($this->data[$key]);
                return $result;

            case 'has' :
                $key = $this->_underscore(substr($method,3));
                return isset($this->_data[$key]);
        }
        throw new Varien_Exception("Invalid method ".get_class($this)."::".$method."(".print_r($args,1).")");
    }

    protected function _underscore($name)
    {
        $result = strtolower(preg_replace('/(.)([A-Z])/', "$1_$2", $name));
        return $result;
    }
}

?>