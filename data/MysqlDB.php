<?php namespace Blog\data;

// define('ERROR_REPORTING', E_ALL | E_STRICT);

class MysqlDB {
    /**
     * @var \Zend\Db\Adapter\Adapter
     */
    protected $adapter;

    public function __construct() 
    {
        $driverConfig = require_once(ROOT_PATH."/config/configdb.php");
        $this->adapter = new \Zend\Db\Adapter\Adapter($driverConfig);

    }
    
    protected function qi($name) {
        return $this->adapter->platform->quoteIdentifier($name);
    }

    protected function fp($name) {
        return $this->adapter->driver->formatParameterName($name);
    }
}