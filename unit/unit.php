<?php

use Twig\Loader\FilesystemLoader;
use Twig\Environment;



$loader = new \Twig\Loader\FilesystemLoader(ROOT_PATH . '/View/');
$twig = new \Twig\Environment($loader, [
    'cache' => ROOT_PATH . '/cache/',
    'debug' => true,

]);
$twig->addExtension(new \Twig\Extension\DebugExtension());
$twig->addExtension(new \Blog\App\Twig\TwigExtension());



function move_on($path){
    header('Location:'.$path);
}

function render($path, $var = array()){
    global $loader,$twig;
    // $template = $twig->load($path);

    echo($twig->render($path, $var));
}
?>