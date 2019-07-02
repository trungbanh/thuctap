<?php 
namespace App\data;

    use Zend\Db\Adapter\Adapter;

// define('ERROR_REPORTING', E_ALL | E_STRICT);

class MysqlDB {
    /**
     * @var \Zend\Db\Adapter\Adapter
     */
    protected $adapter;

    public function __construct() 
    {
        $this->adapter = new Adapter(array(
            'driver'   => 'Mysqli',
            'database' => 'myDB',
            'username' => 'teng',
            'password' => 'password',
            'hostname' => 'localhost'
        ));

    }
    
    protected function qi($name) {
        return $this->adapter->platform->quoteIdentifier($name);
    }

    protected function fp($name) {
        return $this->adapter->driver->formatParameterName($name);
    }
}