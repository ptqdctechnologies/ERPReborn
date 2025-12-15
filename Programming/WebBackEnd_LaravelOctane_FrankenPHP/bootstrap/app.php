<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

//return \Illuminate\Foundation\Application::configure(basePath: dirname(__DIR__))
//    Application::configure(basePath: dirname(__DIR__))

return
    \Illuminate\Foundation\Application::configure(basePath: dirname(__DIR__))
        ->withRouting(
            web: __DIR__.'/../routes/web.php',
            api: __DIR__.'/../routes/api.php',
            commands: __DIR__.'/../routes/console.php',
            health: '/up',
            )
        ->withMiddleware(function (Middleware $middleware) {
                $middleware->validateCsrfTokens(
                    except: [
                        'getPHPInformation',
                        'api/*'
                        //'stripe/*', // Exclude all routes starting with 'stripe/'
                        //'api/webhook', // Exclude a specific API webhook route
                    ]
                );
            }
            )
        ->withExceptions(function (Exceptions $exceptions): void {
            //
            }
            )->create();
