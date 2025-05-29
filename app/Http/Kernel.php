<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    // Middleware globales
    protected $middleware = [
        // ...otros middleware...
        // \App\Http\Middleware\CheckAge::class, // Si quieres que sea global
    ];

    // Middleware de grupo
    protected $middlewareGroups = [
        'web' => [
            // ...otros middleware...
        ],

        'api' => [
            // ...otros middleware...
        ],
    ];

    // Middleware asignables a rutas
    protected $routeMiddleware = [
        // ...otros middleware...
        'admin' => \App\Http\Middleware\AdminMiddleware::class, // Registrar aquí
    ];
}