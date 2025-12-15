<?php

try {
    if (file_exists(__DIR__.'/../vendor/autoload.php') == TRUE)
        {
        // Load the Composer autoloader, which handles loading all dependencies
        require_once(
            __DIR__.'/../vendor/autoload.php'
            );

        // Get an instance of the application HTTP kernel
        $app =
            require_once(
                __DIR__.'/../bootstrap/app.php'
                );

        // Preload Kernel dan Router
        $kernel =
            $app->make(
                \Illuminate\Contracts\Http\Kernel::class
                );
        $kernel->bootstrap();

        // Preload Routes
        if (file_exists(__DIR__.'/../routes/web.php') == TRUE)
            {
            try {
                require_once(
                    __DIR__.'/../routes/web.php'
                    );                
                }
            catch (\Exception $ex) {
                }
            }
        if (file_exists(__DIR__.'/../routes/api.php') == TRUE)
            {
            try {
                require_once(
                    __DIR__.'/../routes/api.php'
                    );
                }
            catch (\Exception $ex) {
                }
            }
        }
    }
catch (\Exception $ex) {
    }