<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require
        $maintenance;
    }

// Prevent worker script termination when a client connection is interrupted
    ignore_user_abort(true);

// Register the Composer autoloader...
    if (file_exists(__DIR__.'/../vendor/autoload.php')) {
        require
            __DIR__.'/../vendor/autoload.php';
        }

// Bootstrap Laravel and handle the request...
/** @var Application $app */
    if (file_exists(__DIR__.'/../bootstrap/app.php')) {
       $app = 
          require_once(__DIR__.'/../bootstrap/app.php');

       $app->handleRequest(Request::capture());
       }
