<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Helpers                                                                                                   |
| ▪ Name Space : \App\Http\Helpers\ZhtHelper\General\System                                                                        |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2020 - 2025 Zheta (teguhpjs@gmail.com)                                                                              |
+----------------------------------------------------------------------------------------------------------------------------------+
*/

namespace App\Http\Helpers\ZhtHelper\General\System
    {
    use Illuminate\Support\Facades\Route;
    
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : Helper_Route                                                                                                 |
    | ▪ Description : Menangani Route                                                                                              |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class Helper_LaravelRoute
        {
        private static $ObjLaravelRoute;

        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.000000                                                                                        |
        | ▪ Last Update     : 2020-07-17                                                                                           |
        | ▪ Creation Date   : 2020-07-17                                                                                           |
        | ▪ Description     : System's Default Constructor                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function __construct()
            {
            }

            
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __destruct                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-07-17                                                                                           |
        | ▪ Creation Date   : 2020-07-17                                                                                           |
        | ▪ Description     : System's Default Destructor                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function __destruct()
            {
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : init                                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2020-07-17                                                                                           |
        | ▪ Creation Date   : 2020-07-17                                                                                           |
        | ▪ Description     : Inisialisasi                                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function init()
            {
            try {
                self::$ObjLaravelRoute =
                    new \Illuminate\Support\Facades\Route();
                }

            catch (\Exception $ex) {
                }
            }
            
            
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setRoute                                                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2025-12-11                                                                                           |
        | ▪ Creation Date   : 2020-07-17                                                                                           |
        | ▪ Description     : Menetapkan routing laravel untuk View                                                                |
        |                                                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varRoute ► Route                                                                                         |
        |      ▪ (string) varHTTPMethod ► HTTP Method                                                                              |
        |      ▪ (string) varTarget ► Target (Controller atau View)                                                                |
        |      ▪ (string) varMiddleware ► Middleware                                                                               |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (boolean) varReturn                                                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function setRoute($varRoute, $varHTTPMethod, $varTarget, $varMiddleware=null)
            {
            $varReturn = true;

            try {
                //---> Check Initialization
                if (!isset(self::$ObjLaravelRoute))
                    {
                    self::init();
                    }
                if (strpos($varTarget, '@') === FALSE) {
                    self::setRouteForView(
                        $varRoute,
                        $varHTTPMethod,
                        $varTarget,
                        $varMiddleware
                        );
                    }
                else
                    {
                    $varTargetData = explode('@', $varTarget);
                    self::setRouteForController(
                        $varRoute,
                        $varHTTPMethod,
                        $varTargetData[0],
                        $varTargetData[1],
                        $varMiddleware
                        );
                    }
                }
                
            catch (\Exception $ex) {
                $varReturn = false;
                }

            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setRouteForController                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2025-12-11                                                                                           |
        | ▪ Creation Date   : 2020-07-17                                                                                           |
        | ▪ Description     : Menetapkan routing laravel untuk Controller                                                          |
        |                                                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varRoute ► Route                                                                                         |
        |      ▪ (string) varHTTPMethod ► HTTP Method                                                                              |
        |      ▪ (string) varClassName ► Class Name                                                                                |
        |      ▪ (string) varMethodName ► MethodName                                                                               |
        |      ▪ (string) varMiddleware ► Middleware                                                                               |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (boolean) varReturn                                                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        private static function setRouteForController($varRoute, $varHTTPMethod, $varClassName, $varMethodName, $varMiddleware=null)
            {
            $varReturn = true;
            try {
                //---> Check Initialization
                if (!isset(self::$ObjLaravelRoute))
                    {
                    self::init();
                    }

                //---> Main Process
                if (is_array($varHTTPMethod)==false)
                    {
                    switch ($varHTTPMethod)
                        {
                        case 'delete':
                            {
                            break;
                            }    
                        case 'get':
                            {
                            self::$ObjLaravelRoute::get(
                                $varRoute,
                                $varClassName.'@'.$varMethodName
                                );
                            break;
                            }
                        case 'post':
                            {
                            self::$ObjLaravelRoute::post(
                                $varRoute,
                                $varClassName.'@'.$varMethodName
                                );
                            break;
                            }
                        case 'put':
                            {
                            break;
                            }    
                        default:
                            {
                            self::$ObjLaravelRoute::any(
                                $varRoute,
                                $varClassName.'@'.$varMethodName
                                );
                            break;
                            }
                        }                    
                    }
                else
                    {
                    self::$ObjLaravelRoute::match(
                        $varHTTPMethod,
                        $varRoute,
                        $varClassName.'@'.$varMethodName
                        );
                    }
                }

            catch (\Exception $ex) {
                $varReturn = false;
                }

            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setRouteForView                                                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2025-12-11                                                                                           |
        | ▪ Description     : Menetapkan routing laravel untuk View                                                                |
        |                                                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varRoute ► Route                                                                                         |
        |      ▪ (string) varHTTPMethod ► HTTP Method                                                                              |
        |      ▪ (string) varView ► View Name                                                                                      |
        |      ▪ (string) varMiddleware ► Middleware                                                                               |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (boolean) varReturn                                                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        private static function setRouteForView($varRoute, $varHTTPMethod, $varView, $varMiddleware=null)
            {
            $varReturn = true;

            try {
                //---> Check Initialization
                if (!isset(self::$ObjLaravelRoute))
                    {
                    self::init();
                    }

                //---> Main Process
                switch ($varHTTPMethod)
                    {
                    case 'delete':
                        {
                        break;
                        }    
                    case 'get':
                        {
                        if (!$varMiddleware)
                            {
                            self::$ObjLaravelRoute::get(
                                $varRoute,
                                function () use(&$varView) {
                                    return
                                        view($varView);                                    
                                    }
                                );
                            }
                        else
                            {
                            self::$ObjLaravelRoute::get(
                                $varRoute,
                                function () use(&$varView) {
                                    return
                                        view($varView);}
                                )
                                ->middleware($varMiddleware);
                            }
                        break;
                        }
                    case 'post':
                        {
                        if (!$varMiddleware)
                            {
                            self::$ObjLaravelRoute::post(
                                $varRoute,
                                function () use(&$varView) {
                                    return
                                        view($varView);
                                    }
                                );
                            }
                        else
                            {
                            self::$ObjLaravelRoute::post(
                                $varRoute,
                                function () use(&$varView) {
                                    return
                                        view($varView);
                                    }
                                )
                                ->middleware($varMiddleware);
                            }
                        break;
                        }
                    case 'put':
                        {
                        break;
                        }    
                    default:
                        {
                        if (!$varMiddleware)
                            {
                            self::$ObjLaravelRoute::any(
                                $varRoute,
                                function () use(&$varView) {
                                    return
                                        view($varView);
                                    }
                                );
                            }
                        else
                            {
                            self::$ObjLaravelRoute::any(
                                $varRoute,
                                function () use(&$varView) {
                                    return
                                        view($varView);
                                    }
                                )
                                ->middleware($varMiddleware);
                            }                        
                        }
                    }
                }

            catch (\Exception $ex) {
                $varReturn = false;
                }

            return
                $varReturn;
            }
        }
    }