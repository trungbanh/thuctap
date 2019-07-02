<?php 

require __DIR__ . '/vendor/autoload.php';


define('ROOT_PATH', __DIR__);
define('BASE_PATH', dirname(__FILE__));
define('ROOT','\Blog');
define('CONTROLLER','Controller');

   use \Blog\App\Request;
   use \Blog\App\Boots;

   $request = new Request();
   $bootloader = new Boots($request);
   $result = $bootloader->run();
?>
