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

function response() {
    $response = new \Blog\App\Respones();

    return $response;
}

function redirects(){
    $response = new \Blog\App\Respones();

    return $response;
}

?>

