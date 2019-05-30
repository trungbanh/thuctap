<?php 
   define('ROOT_PATH', __DIR__);
   define('BASE_PATH', dirname(__FILE__));
   define('ROOT','\Blog');
   define('CONTROLLER','Controller');

function __autoloader($class)
{
   $filename =  preg_replace('/\\\\/', DIRECTORY_SEPARATOR, $class);
   
   $filename =  preg_replace("/^Blog/", BASE_PATH, $filename). '.php';

   // $filename = preg_grep(array('/\\\\/','/^Blog/'),array(DIRECTORY_SEPARATOR,BASE_PATH),$class).'php';
   require_once($filename);
}

spl_autoload_register('__autoloader');
?>