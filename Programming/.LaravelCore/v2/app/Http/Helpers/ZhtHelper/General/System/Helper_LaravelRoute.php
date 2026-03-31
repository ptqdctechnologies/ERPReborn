<?php

/*
┌──────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────┐
│ ▪ Category   : Laravel Helpers                                                                                                           │
│ ▪ Name Space : \App\Http\Helpers\ZhtHelper\General\System                                                                                │
├──────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────┤
│ ▪ Copyleft 🄯 2020 - 2025 Zheta (teguhpjs@gmail.com)                                                                                      │
└──────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────┘
*/

namespace
    App\Http\Helpers\ZhtHelper\General\System
        {
        use
            Illuminate\Support\Facades\Route;

        /*
        ┌───────────────┬──────────────────────────────────────────────────────────────────────────────────────────────────────────────────┐
        │ ▪ Class Name  │ Helper_Route                                                                                                     │
        │ ▪ Description │ Menangani Route dari System                                                                                      │
        └───────────────┴──────────────────────────────────────────────────────────────────────────────────────────────────────────────────┘
        */
        class
            Helper_LaravelRoute
                {
                /*
                ┌──────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────┐
                │ Class Property Declaration                                                                                               │
                └──────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────┘
                */
                private static
                    $ObjLaravelRoute;


                /*
                ┌───────────────────┬──────────────────────────────────────────────────────────────────────────────────────────────────────┐
                │ ▪ Method Name     │ __construct                                                                                          │
                ├───────────────────┼──────────────────────────────────────────────────────────────────────────────────────────────────────┤
                │ ▪ Version         │ 1.0000.0000000                                                                                       │
                │ ▪ Last Update     │ 2020-07-17                                                                                           │
                │ ▪ Creation Date   │ 2020-07-17                                                                                           │
                │ ▪ Description     │ System's Default Constructor                                                                         │
                ├───────────────────┴──────────────────────────────────────────────────────────────────────────────────────────────────────┤
                │ ▪ Input Variable  :                                                                                                      │
                │      ▪ (void)                                                                                                            │
                │ ▪ Output Variable :                                                                                                      │
                │      ▪ (void)                                                                                                            │
                └──────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────┘
                */
                public function
                    __construct (
                        )
                            {
                            }


                /*
                ┌───────────────────┬──────────────────────────────────────────────────────────────────────────────────────────────────────┐
                │ ▪ Method Name     │ __destruct                                                                                           │
                ├───────────────────┼──────────────────────────────────────────────────────────────────────────────────────────────────────┤
                │ ▪ Version         │ 1.0000.0000000                                                                                       │
                │ ▪ Last Update     │ 2020-07-17                                                                                           │
                │ ▪ Creation Date   │ 2020-07-17                                                                                           │
                │ ▪ Description     │ System's Default Destructor                                                                          │
                ├───────────────────┴──────────────────────────────────────────────────────────────────────────────────────────────────────┤
                │ ▪ Input Variable  :                                                                                                      │
                │      ▪ (void)                                                                                                            │
                │ ▪ Output Variable :                                                                                                      │
                │      ▪ (void)                                                                                                            │
                └──────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────┘
                */
                public function
                    __destruct (
                        )
                            {
                            }


                /*
                ┌───────────────────┬──────────────────────────────────────────────────────────────────────────────────────────────────────┐
                │ ▪ Method Name     │ init                                                                                                 │
                ├───────────────────┼──────────────────────────────────────────────────────────────────────────────────────────────────────┤
                │ ▪ Version         │ 1.0000.0000001                                                                                       │
                │ ▪ Last Update     │ 2020-07-17                                                                                           │
                │ ▪ Creation Date   │ 2020-07-17                                                                                           │
                │ ▪ Description     │ Inisialisasi                                                                                         │
                ├───────────────────┴──────────────────────────────────────────────────────────────────────────────────────────────────────┤
                │ ▪ Input Variable  :                                                                                                      │
                │      ▪ (void)                                                                                                            │
                │ ▪ Output Variable :                                                                                                      │
                │      ▪ (void)                                                                                                            │
                ├──────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────┤
                │ ▪ Linked Function :                                                                                                      │
                │      ▪                                                                                                                   │
                └──────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────┘
                */
                public static function
                    init (
                        )
                            {
                            //-----[ DATA INITIALIZATION ]-------------------------------------------------------------------( START )-----
                            //-----[ DATA INITIALIZATION ]-------------------------------------------------------------------(  END  )-----

                            //-----[ DATA PROCESS ]--------------------------------------------------------------------------( START )-----
                                try {
                                    self::$ObjLaravelRoute =
                                        new \Illuminate\Support\Facades\Route ();
                                    }

                                catch (\Exception $ex) {
                                    }
                            //-----[ DATA PROCESS ]--------------------------------------------------------------------------(  END  )-----

                            //-----[ DATA RETURN ]---------------------------------------------------------------------------( START )-----
                            //-----[ DATA RETURN ]---------------------------------------------------------------------------(  END  )-----
                            }


                /*
                ┌───────────────────┬──────────────────────────────────────────────────────────────────────────────────────────────────────┐
                │ ▪ Method Name     │ setDynamicRoute_Examples_APICall                                                                     │
                ├───────────────────┼──────────────────────────────────────────────────────────────────────────────────────────────────────┤
                │ ▪ Version         │ 1.0000.0000002                                                                                       │
                │ ▪ Last Update     │ 2025-12-11                                                                                           │
                │ ▪ Creation Date   │ 2022-07-21                                                                                           │
                │ ▪ Description     │ Menetapkan dynamic routing laravel untuk Examples APICall                                            │
                ├───────────────────┴──────────────────────────────────────────────────────────────────────────────────────────────────────┤
                │ ▪ Input Variable  :                                                                                                      │
                │      ▪ varUserSession (mixed - Mandatory) ► User Session                                                                 │
                │      ▪ varAPIWebToken (string - Mandatory) ► APIWebToken                                                                 │
                │      ------------------------------                                                                                      │
                │ ▪ Output Variable :                                                                                                      │
                │      ▪ varReturn (bool)                                                                                                  │
                ├──────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────┤
                │ ▪ Linked Function :                                                                                                      │
                │      ▪ \App\Http\Helpers\ZhtHelper\General\System\Helper_LaravelRoute::                                                  │
                │           setRouteForController                                                                                          │
                │              (string $varRoute, string $varHTTPMethod, string $varClassName, string $varTarget, string $varMiddleware)   │
                │      ▪ \App\Http\Helpers\ZhtHelper\General\System\Helper_LaravelRoute::                                                  │
                │           setRouteForView                                                                                                │
                │              (string $varRoute, string $varHTTPMethod, string $varViewName, string $varMiddleware)                       │
                └──────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────┘
                */
                public static function
                    setDynamicRoute_Examples_APICall (
                        mixed $varUserSession, string $varAPIWebToken
                        )
                            {
                            //-----[ DATA INITIALIZATION ]-------------------------------------------------------------------( START )-----
                                $varReturn =
                                    (bool) true;
                            //-----[ DATA INITIALIZATION ]-------------------------------------------------------------------(  END  )-----

                            //-----[ DATA PROCESS ]--------------------------------------------------------------------------( START )-----
                                try {
                                    /*
                                    echo '
    ● Dynamic Route - API Call Example :';
                                    $varArrayExampleAPIKey =
                                        \App\Http\Helpers\ZhtHelper\General\Utilities\Helper_File::getDeepestSubFoldersInFolder (
                                            $varUserSession,
                                            \App\Http\Helpers\ZhtHelper\General\Utilities\Helper_File::getAutoMatchDirectoryPath (
                                                $varUserSession, 
                                                getcwd(), 
                                                '/app/Http/Controllers/Application/FrontEnd/SandBox/Examples_APICall'
                                                )
                                            );
                                    */

                                    //---> Initializing : varArrayExampleAPIKey
                                        $varArrayExampleAPIKey =
                                            \App\Http\Helpers\ZhtHelper\General\Utilities\Helper_File::getDeepestSubFoldersInFolder (
                                                $varUserSession,
                                                \App\Http\Helpers\ZhtHelper\General\Utilities\Helper_File::getAutoMatchDirectoryPath (
                                                    $varUserSession, 
                                                    getcwd(), 
                                                    '/app/Http/Controllers/Application/FrontEnd/SandBox/Examples_APICall'
                                                    )
                                                );

                                    //---> Initializing : Dynamic Route
                                        for ($i = 0, $iMax = count ($varArrayExampleAPIKey); $i != $iMax; $i++)
                                            {
                                            $varClass = (
                                                '\App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall'.
                                                str_replace (
                                                    '/',
                                                    '\\',
                                                    $varArrayExampleAPIKey[$i]
                                                    ).
                                                '\example'
                                                );

                                            //---> Initializing : varFilePath
                                                if (is_file (
                                                    $varFilePath =
                                                        \App\Http\Helpers\ZhtHelper\General\Utilities\Helper_File::getAutoMatchFilePath (
                                                            $varUserSession, 
                                                            getcwd(), 
                                                            '/app/Http/Controllers/Application/FrontEnd/SandBox/Examples_APICall'.$varArrayExampleAPIKey[$i].'/example.php'
                                                            )                                                    
                                                    ))
                                                    {
                                                    //---> Initializing : varArrayFunctionEntities
                                                        $varArrayFunctionEntities =
                                                            \App\Http\Helpers\ZhtHelper\General\Utilities\Helper_PHPObject::getAllFunctionInPHPFile (
                                                                $varUserSession,
                                                                $varFilePath
                                                                );

                                                    for ($j = 0, $jMax = count ($varArrayFunctionEntities); $j != $jMax; $j++)
                                                        {
                                                        if (
                                                            (strcmp ($varArrayFunctionEntities[$j]['Name'], '__construct') == 0)
                                                            OR (strcmp ($varArrayFunctionEntities[$j]['Name'], '__destruct') == 0)
                                                            ) {
                                                            continue;
                                                            }
                                                
                                                        //---> Initializing : varURL
                                                            $varURL = (
                                                                str_replace (
                                                                    '/',
                                                                    '.',
                                                                    str_replace (
                                                                        '#/',
                                                                        '',
                                                                        ('#'.$varArrayExampleAPIKey[$i])
                                                                        )
                                                                    ).
                                                                '_'.
                                                                $varArrayFunctionEntities[$j]['Name']
                                                                );

                                                        //---> Initializing : $varControllerPath
                                                            $varControllerPath = (
                                                                $varClass.
                                                                '@'.
                                                                $varArrayFunctionEntities[$j]['Name']
                                                                );

                                                        echo '
      • [http://172.28.0.30/'.$varURL.']
          ► '.$varControllerPath;

                                                        \App\Http\Helpers\ZhtHelper\General\System\Helper_LaravelRoute::setRoute (
                                                            $varURL,
                                                            'get',
                                                            $varControllerPath
                                                            );
                                                        }
                                                    }
                                                }
                                    }

                                catch (\Exception $ex) {
                                    $varReturn = false;
                                    }
                            //-----[ DATA PROCESS ]--------------------------------------------------------------------------(  END  )-----

                            //-----[ DATA RETURN ]---------------------------------------------------------------------------( START )-----
                                return
                                    $varReturn;
                            //-----[ DATA RETURN ]---------------------------------------------------------------------------(  END  )-----
                            }


                /*
                ┌───────────────────┬──────────────────────────────────────────────────────────────────────────────────────────────────────┐
                │ ▪ Method Name     │ setRoute                                                                                             │
                ├───────────────────┼──────────────────────────────────────────────────────────────────────────────────────────────────────┤
                │ ▪ Version         │ 1.0000.0000001                                                                                       │
                │ ▪ Last Update     │ 2025-12-11                                                                                           │
                │ ▪ Creation Date   │ 2020-07-17                                                                                           │
                │ ▪ Description     │ Menetapkan Routing Laravel                                                                           │
                ├───────────────────┴──────────────────────────────────────────────────────────────────────────────────────────────────────┤
                │ ▪ Input Variable  :                                                                                                      │
                │      ▪ varRoute (string - Mandatory) ► Route                                                                             │
                │      ▪ varHTTPMethod (mixed - Mandatory) ► HTTP Method                                                                   │
                │      ▪ varTarget (string - Mandatory) ► Target (Controller atau View)                                                    │
                │      ------------------------------                                                                                      │
                │      ▪ varMiddleware (string - Optional) ► Middleware                                                                    │
                │ ▪ Output Variable :                                                                                                      │
                │      ▪ varReturn (bool)                                                                                                  │
                ├──────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────┤
                │ ▪ Linked Function :                                                                                                      │
                │      ▪ \App\Http\Helpers\ZhtHelper\General\System\Helper_LaravelRoute::                                                  │
                │           setRouteForController                                                                                          │
                │              (string $varRoute, string $varHTTPMethod, string $varClassName, string $varTarget, string $varMiddleware)   │
                │      ▪ \App\Http\Helpers\ZhtHelper\General\System\Helper_LaravelRoute::                                                  │
                │           setRouteForView                                                                                                │
                │              (string $varRoute, string $varHTTPMethod, string $varViewName, string $varMiddleware)                       │
                └──────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────┘
                */
                public static function
                    setRoute (
                        string $varRoute, mixed $varHTTPMethod, string $varTarget,
                        string $varMiddleware = null
                        )
                            {
                            //---> Data Initialization
                                $varReturn = true;

                            //---> Data Process
                                try {
                                    //---> Check Initialization
                                    if (!isset (self::$ObjLaravelRoute))
                                        {
                                        self::init();
                                        }

                                    if (strpos ($varTarget, '@') === FALSE) {
                                        self::setRouteForView (
                                            $varRoute,
                                            $varHTTPMethod,
                                            $varTarget,
                                            $varMiddleware
                                            );
                                        }
                                    else
                                        {
                                        $varTargetData =
                                            explode (
                                                '@',
                                                $varTarget
                                                );

                                        self::setRouteForController (
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

                            //---> Data Return
                                return
                                    $varReturn;
                            }


                /*
                ┌───────────────────┬──────────────────────────────────────────────────────────────────────────────────────────────────────┐
                │ ▪ Method Name     │ setRouteForController                                                                                │
                ├───────────────────┼──────────────────────────────────────────────────────────────────────────────────────────────────────┤
                │ ▪ Version         │ 1.0000.0000001                                                                                       │
                │ ▪ Last Update     │ 2025-12-11                                                                                           │
                │ ▪ Creation Date   │ 2020-07-17                                                                                           │
                │ ▪ Description     │ Menetapkan Routing Laravel untuk Controller                                                          │
                ├───────────────────┴──────────────────────────────────────────────────────────────────────────────────────────────────────┤
                │ ▪ Input Variable  :                                                                                                      │
                │      ▪ varRoute (string - Mandatory) ► Route                                                                             │
                │      ▪ varHTTPMethod (mixed - Mandatory) ► HTTP Method                                                                   │
                │      ▪ varClassName (string - Mandatory) ► Class Name                                                                    │
                │      ▪ varMethodName (string - Mandatory) ► MethodName                                                                   │
                │      ------------------------------                                                                                      │
                │      ▪ varMiddleware (string - Optional) ► Middleware                                                                    │
                │ ▪ Output Variable :                                                                                                      │
                │      ▪ varReturn (bool)                                                                                                  │
                ├──────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────┤
                │ ▪ Linked Function :                                                                                                      │
                │      ▪                                                                                                                   │
                └──────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────┘
                */
                private static function
                    setRouteForController (
                        string $varRoute, mixed $varHTTPMethod, string $varClassName, string $varMethodName,
                        string $varMiddleware = null
                        )
                            {
                            //---> Data Initialization
                                $varReturn = true;

                            //---> Data Process
                                try {
                                    //---> Check Initialization
                                    if (!isset (self::$ObjLaravelRoute))
                                        {
                                        self::init();
                                        }

                                    //---> Main Process
                                    if (is_array ($varHTTPMethod) == false)
                                        {
                                        switch ($varHTTPMethod)
                                            {
                                            case 'delete':
                                                {
                                                break;
                                                }    
                                            case 'get':
                                                {
                                                self::$ObjLaravelRoute::get (
                                                    $varRoute,
                                                    ($varClassName.'@'.$varMethodName)
                                                    );
                                                break;
                                                }
                                            case 'post':
                                                {
                                                self::$ObjLaravelRoute::post (
                                                    $varRoute,
                                                    ($varClassName.'@'.$varMethodName)
                                                    );
                                                break;
                                                }
                                            case 'put':
                                                {
                                                break;
                                                }    
                                            default:
                                                {
                                                self::$ObjLaravelRoute::any (
                                                    $varRoute,
                                                    ($varClassName.'@'.$varMethodName)
                                                    );
                                                break;
                                                }
                                            }                    
                                        }
                                    else
                                        {
                                        self::$ObjLaravelRoute::match (
                                            $varHTTPMethod,
                                            $varRoute,
                                            $varClassName.'@'.$varMethodName
                                            );
                                        }
                                    }

                                catch (\Exception $ex) {
                                    $varReturn = false;
                                    }

                            //---> Data Return
                                return
                                    $varReturn;
                            }


                /*
                ┌───────────────────┬──────────────────────────────────────────────────────────────────────────────────────────────────────┐
                │ ▪ Method Name     │ setRouteForView                                                                                      │
                ├───────────────────┼──────────────────────────────────────────────────────────────────────────────────────────────────────┤
                │ ▪ Version         │ 1.0000.0000001                                                                                       │
                │ ▪ Last Update     │ 2025-12-11                                                                                           │
                │ ▪ Creation Date   │ 2025-12-11                                                                                           │
                │ ▪ Description     │ Menetapkan Routing Laravel untuk View                                                                │
                ├───────────────────┴──────────────────────────────────────────────────────────────────────────────────────────────────────┤
                │ ▪ Input Variable  :                                                                                                      │
                │      ▪ varRoute (string - Mandatory) ► Route                                                                             │
                │      ▪ varHTTPMethod (mixed - Mandatory) ► HTTP Method                                                                   │
                │      ▪ varViewName (string - Mandatory) ► View Name                                                                      │
                │      ------------------------------                                                                                      │
                │      ▪ varMiddleware (string - Optional) ► Middleware                                                                    │
                │ ▪ Output Variable :                                                                                                      │
                │      ▪ (bool)   varReturn                                                                                                │
                ├──────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────┤
                │ ▪ Linked Function :                                                                                                      │
                │      ▪                                                                                                                   │
                └──────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────┘
                */
                private static function
                    setRouteForView (
                        string $varRoute, mixed $varHTTPMethod, string $varViewName,
                        string $varMiddleware = null
                        )
                            {
                            //---> Data Initialization
                                $varReturn = true;

                            //---> Data Process
                                try {
                                    //---> Check Initialization
                                    if (!isset (self::$ObjLaravelRoute))
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
                                                self::$ObjLaravelRoute::get (
                                                    $varRoute,
                                                    function () use(&$varViewName) {
                                                        return
                                                            view ($varViewName);                                    
                                                        }
                                                    );
                                                }
                                            else
                                                {
                                                self::$ObjLaravelRoute::get (
                                                    $varRoute,
                                                    function () use(&$varViewName) {
                                                        return
                                                            view($varViewName);}
                                                    )
                                                    ->middleware ($varMiddleware);
                                                }
                                            break;
                                            }
                                        case 'post':
                                            {
                                            if (!$varMiddleware)
                                                {
                                                self::$ObjLaravelRoute::post (
                                                    $varRoute,
                                                    function () use(&$varViewName) {
                                                        return
                                                            view ($varViewName);
                                                        }
                                                    );
                                                }
                                            else
                                                {
                                                self::$ObjLaravelRoute::post (
                                                    $varRoute,
                                                    function () use(&$varViewName) {
                                                        return
                                                            view ($varViewName);
                                                        }
                                                    )
                                                    ->middleware ($varMiddleware);
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
                                                self::$ObjLaravelRoute::any (
                                                    $varRoute,
                                                    function () use(&$varViewName) {
                                                        return
                                                            view ($varViewName);
                                                        }
                                                    );
                                                }
                                            else
                                                {
                                                self::$ObjLaravelRoute::any(
                                                    $varRoute,
                                                    function () use(&$varViewName) {
                                                        return
                                                            view ($varViewName);
                                                        }
                                                    )
                                                    ->middleware ($varMiddleware);
                                                }                        
                                            }
                                        }
                                    }

                                catch (\Exception $ex) {
                                    $varReturn = false;
                                    }

                            //---> Data Return
                                return
                                    $varReturn;
                            }
                }
        }