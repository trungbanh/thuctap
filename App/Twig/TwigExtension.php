<?php

namespace Blog\App\Twig;

use \Blog\App\App;

class TwigExtension extends \Twig\Extension\AbstractExtension implements \Twig\Extension\GlobalsInterface
{
    public function getGlobals()
    {
        return [
            'App' => array(
                'session' => App::session()
            )
        ];
    }
}


?>