<?php
/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Helpers                                                                                                   |
| ▪ Name Space : \App\Helpers\ZhtHelper\System                                                                                     |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2022 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/

namespace App\Helpers\ZhtHelper\System\FrontEnd
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
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setDynamicRoute_Examples_APICall                                                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2022-07-21                                                                                           |
        | ▪ Creation Date   : 2022-07-21                                                                                           |
        | ▪ Description     : Menetapkan dynamic routing laravel untuk Examples APICall                                            |
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
        public static function setDynamicRoute_Examples_APICall($varUserSession, $varAPIWebToken)
            {
            $varArrayExampleAPIKey = \App\Helpers\ZhtHelper\General\Helper_File::getDeepestSubFoldersInFolder(
                $varUserSession,
                \App\Helpers\ZhtHelper\General\Helper_File::getAutoMatchDirectoryPath(
                    $varUserSession, 
                    getcwd(), 
                    '/app/Http/Controllers/Application/FrontEnd/SandBox/Examples_APICall'
                    )
                );


            for($i=0, $iMax=count($varArrayExampleAPIKey); $i!=$iMax; $i++)
                {
                $varClass = '\App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall'.str_replace('/', '\\', $varArrayExampleAPIKey[$i]).'\example';
                $varFilePath = \App\Helpers\ZhtHelper\General\Helper_File::getAutoMatchFilePath(
                    $varUserSession, 
                    getcwd(), 
                    '/app/Http/Controllers/Application/FrontEnd/SandBox/Examples_APICall'.$varArrayExampleAPIKey[$i].'/example.php'
                    );
                $varArrayFunctionEntities = \App\Helpers\ZhtHelper\General\Helper_PHPObject::getAllFunctionEntitiesFromPHPFile($varUserSession, $varFilePath);

                /*
                echo "\n";
                var_dump($varClass);
                var_dump($varFilePath);
                var_dump($varArrayFunctionEntities);
                */

                for($j=0, $jMax=count($varArrayFunctionEntities); $j!=$jMax; $j++)
                    {
                    Route::get(
                        str_replace('/', '.', str_replace('#/', '', '#'.$varArrayExampleAPIKey[$i])).'_'.$varArrayFunctionEntities[$j]['Name'], 
                        $varClass.'@'.$varArrayFunctionEntities[$j]['Name']
                        )->defaults('APIWebToken', $varAPIWebToken);
                    }
                }
            }
        }
    }