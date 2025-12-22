<?php

try {
    if (file_exists (__DIR__.'/../vendor/autoload.php') == true)
        {
        // ---> Load the Composer autoloader, which handles loading all dependencies
            require_once (
                __DIR__.'/../vendor/autoload.php'
                );

        //---> Get an instance of the application HTTP kernel
            if (file_exists (__DIR__.'/../bootstrap/app.php') == true)
                {
                $app =
                    require_once (
                        __DIR__.'/../bootstrap/app.php'
                        );
                }
            else if (file_exists (__DIR__.'/../../bootstrap/app.php') == true)
                {
                $app =
                    require_once (
                        __DIR__.'/../../bootstrap/app.php'
                        );
                }


        //---> Preload Kernel dan Router
            try {
                $kernel =
                    $app->make (
                        \Illuminate\Contracts\Http\Kernel::class
                        );
                $kernel->bootstrap();            
                }
            catch (\Exception $ex) {
                }


        //---> Preload Routes
            if (file_exists(__DIR__.'/../routes/web.php') == true)
                {
                try {
                    require_once (
                        __DIR__.'/../routes/web.php'
                        );                
                    }
                catch (\Exception $ex) {
                    }
                }
            if (file_exists(__DIR__.'/../routes/api.php') == true)
                {
                try {
                    require_once (
                        __DIR__.'/../routes/api.php'
                        );
                    }
                catch (\Exception $ex) {
                    }
                }
            if (file_exists(__DIR__.'/../routes/console.php') == true)
                {
                try {
                    require_once (
                        __DIR__.'/../routes/console.php'
                        );
                    }
                catch (\Exception $ex) {
                    }
                }
        }
    }

catch (\Exception $ex) {
    }