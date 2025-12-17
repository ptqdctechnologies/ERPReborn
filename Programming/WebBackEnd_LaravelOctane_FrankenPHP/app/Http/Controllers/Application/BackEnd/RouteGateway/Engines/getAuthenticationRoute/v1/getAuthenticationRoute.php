<?php

/*
┌──────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────┐
│ ▪ Category   : Route Controller                                                                                                          │
│ ▪ Name Space : \App\Http\Controllers\Application\BackEnd\RouteGateway\Engines\getAuthenticationRoute\v1                                  │
├──────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────┤
│ ▪ Copyleft 🄯 2025 Zheta (teguhpjs@gmail.com)                                                                                             │
└──────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────┘
*/

namespace
    App\Http\Controllers\Application\BackEnd\RouteGateway\Engines\getAuthenticationRoute\v1
        {
        /*
        ┌───────────────┬──────────────────────────────────────────────────────────────────────────────────────────────────────────────────┐
        │ ▪ Class Name  │ getAuthenticationRoute                                                                                           │
        │ ▪ Description │ Menangani Route Authentication Version 1                                                                         │
        └───────────────┴──────────────────────────────────────────────────────────────────────────────────────────────────────────────────┘
        */
        class
            getAuthenticationRoute extends \App\Http\Controllers\Controller
                {
                /*
                ┌───────────────────┬──────────────────────────────────────────────────────────────────────────────────────────────────────┐
                │ ▪ Method Name     │ main                                                                                                 │
                ├───────────────────┼──────────────────────────────────────────────────────────────────────────────────────────────────────┤
                │ ▪ Version         │ 1.0000.0000000                                                                                       │
                │ ▪ Last Update     │ 2025-12-17                                                                                           │
                │ ▪ Creation Date   │ 2025-12-17                                                                                           │
                │ ▪ Description     │ Fungsi Utama Engine                                                                                  │
                ├───────────────────┴──────────────────────────────────────────────────────────────────────────────────────────────────────┤
                │ ▪ Input Variable  :                                                                                                      │
                │      ▪ (mixed)  varUserSession ► User Session                                                                            │
                |      ▪ (array)  varData ► Data                                                                                           |
                │      ------------------------------                                                                                      │
                │ ▪ Output Variable :                                                                                                      │
                │      ▪ (string) varReturn                                                                                                │
                ├──────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────┤
                │ ▪ Linked Function :                                                                                                      │
                │      ▪                                                                                                                   │
                └──────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────┘
                */
                public function
                    main (
                        //$varUserSession, $varData
                        )
                            {
                            //echo "xxx";
                            $varUserSession = 1;
                    
                    $varArrayExampleAPIKey =
                        \App\Http\Helpers\ZhtHelper\General\Utilities\Helper_File::getDeepestSubFoldersInFolder (
                            $varUserSession,
                            \App\Http\Helpers\ZhtHelper\General\Utilities\Helper_File::getAutoMatchDirectoryPath (
                                $varUserSession, 
                                getcwd(), 
                                '/app/Http/Controllers/Application/FrontEnd/SandBox/Examples_APICall'
                                )
                            );
                    
                    dd($varArrayExampleAPIKey);
                            }
                }
        }