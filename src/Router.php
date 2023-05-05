<?php

namespace GIPHYV2;

use FastRoute\RouteCollector;
use function FastRoute\simpleDispatcher;

class Router
{
    public static function getDispatcher()
    {
        return simpleDispatcher(function (RouteCollector $r) {
            $r->addRoute('GET', '/', [Controller\GifController::class, 'index']);
            $r->addRoute('GET', '/search/{searchTerm}', [Controller\GifController::class, 'search']);
        });
    }
}
