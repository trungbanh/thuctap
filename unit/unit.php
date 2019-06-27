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


$response = new \Blog\App\Respones();

function response() {
    global $response;
    return $response;
}

function redirects(){
    global $response;
    return $response;
}

?>

