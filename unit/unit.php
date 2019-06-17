<?php

use Twig\Loader\FilesystemLoader;
use Twig\Environment;

$loader = new \Twig\Loader\FilesystemLoader(ROOT_PATH . '/View/layout/');
$twig = new \Twig\Environment($loader, [
    'cache' => ROOT_PATH . '/cache/',
]);


function move_on($path){
    header('Location:'.$path);
}

function render($path, $var = array()){
    global $loader,$twig;
    extract($var);
    $template = $twig->load($path);

    echo($template->render($var));
}
?>