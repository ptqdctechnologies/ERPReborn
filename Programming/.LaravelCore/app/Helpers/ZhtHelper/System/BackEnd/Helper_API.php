<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Helpers                                                                                                   |
| ▪ Name Space : \App\Helpers\ZhtHelper\System\BackEnd                                                                             |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2020 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Helpers\ZhtHelper\System\BackEnd
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : Helper_API                                                                                                   |
    | ▪ Description : Menangani segala parameter yang terkait API                                                                  |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class Helper_API
        {
        public static function setCallAPIEngine($varUserSession, $varAPI, $varData, $varCallerFunctionName=null)
            {
            //Fungsi ini tidak diperbolehkan menggunakan try catch karena akan mengganggu pesan error
            if(!$varCallerFunctionName)
                {
                $varCallerFunctionName = debug_backtrace()[1]['function'];
                }
            //---> Translate of Latest
            if(strcmp($varAPI['version'], 'latest') == 0)
                {
                $varFileVersionHeader = 'v';
                $varFolderArray = \App\Helpers\ZhtHelper\General\Helper_File::getFilesListInFolder($varUserSession, getcwd().'/./../app/Http/Controllers/Application/BackEnd/System/'.\App\Helpers\ZhtHelper\General\Helper_String::getUpperCaseFirstCharacter($varUserSession, $varAPI['service']).'/Engines/'.$varAPI['class'].'/'.$varAPI['subClass'].'');
                $varLastVersion = 0;
                for($i=0; $i!=count($varFolderArray); $i++)
                    {
                    $varCheckVersion = str_replace($varFileVersionHeader, '', $varFolderArray[$i]);
                    if($varLastVersion < $varCheckVersion)
                        {
                        $varLastVersion = $varCheckVersion;
                        }
                    }
                $varAPI['version']=$varLastVersion;
                }
                
            //---> Main Process
            $varClass = 'App\\Http\\Controllers\\Application\\BackEnd\\System\\'.\App\Helpers\ZhtHelper\General\Helper_String::getUpperCaseFirstCharacter($varUserSession, $varAPI['service']).'\\Engines\\'.$varAPI['class'].'\\'.$varAPI['subClass'].'\\v'.$varAPI['version'].'\\'.$varAPI['subClass'];
            $varFilePath = \App\Helpers\ZhtHelper\General\Helper_File::getAutoMatchFilePath($varUserSession, getcwd(), '/./../'.str_replace('App/', 'app/', str_replace('\\', '/', $varClass)).'.php');
            if(!$varFilePath)
                {
                throw new \Exception('API "'.$varAPI['class'].'.'.$varAPI['subClass'].'" with version "'.$varAPI['version'].'" is not found');
                }
            require_once($varFilePath);
            $varObjEngine = new $varClass();
            $varReturn = $varObjEngine->{$varCallerFunctionName}($varUserSession, $varData);
            
            if($varReturn['metadata']['successStatus']==false)
                {
                return \App\Helpers\ZhtHelper\System\Helper_HTTPError::setResponseOveride($varUserSession, $varReturn['data']['code'], $varReturn['data']['message']);
                }   
            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setEngineResponseDataReturn_Fail                                                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-08-27                                                                                           |
        | ▪ Description     : Mendapatkan Fail Engine Return HTTP Response                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varUserSession ► User Session                                                                            |
        |      ▪ (int)    varHTTPErrorCode ► Error Code HTTP Response                                                              |
        |      ▪ (string) varHTTPErrorMessage ► Error Message HTTP Response                                                        |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (int)    varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function setEngineResponseDataReturn_Fail($varUserSession, int $varHTTPErrorCode, string $varHTTPErrorMessage = null)
            {
            if(!$varHTTPErrorMessage)
                {
                $varHTTPErrorMessage = '';
                }
            $varReturn = [
                "metadata" => [
                    "successStatus" => false
                    ],
                "data" => [
                    "code" => $varHTTPErrorCode,
                    "message" => $varHTTPErrorMessage
                    ]
                ];
            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setEngineResponseDataReturn_Success                                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-08-27                                                                                           |
        | ▪ Description     : Mendapatkan Success Engine Return HTTP Response                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varUserSession ► User Session                                                                            |
        |      ▪ (array)  varData ► Data yang akan dikirim oleh HTTP Response                                                      |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (int)    varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function setEngineResponseDataReturn_Success($varUserSession, array $varData)
            {
            $varReturn = [
                "metadata" => [
                    "successStatus" => true
                    ],
                "data" => $varData
                ];
            return $varReturn;
            }
        }
    }