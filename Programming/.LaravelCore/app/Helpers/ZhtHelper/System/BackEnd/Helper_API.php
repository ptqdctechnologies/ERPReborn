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
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setCallAPIEngine                                                                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0001.0000000                                                                                       |
        | ▪ Last Update     : 2020-09-01                                                                                           |
        | ▪ Description     : Memanggil API Engine                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varUserSession ► User Session                                                                            |
        |      ▪ (array)  varAPIKey ► API Key                                                                                      |
        |      ▪ (array)  varAPIVersion ► API Version                                                                              |
        |      ▪ (array)  varData ► Data yang akan diproses                                                                        |
        |      ▪ (string) varFunctionName ► Nama Fungsi yang akan dipanggil                                                        |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (mixed)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function setCallAPIEngine($varUserSession, $varAPIKey, $varAPIVersion, array $varData, string $varFunctionName=null)
            {
            $varAPIKeyData = explode('.', $varAPIKey);
            $varAPIService = \App\Helpers\ZhtHelper\General\Helper_String::getUpperCaseFirstCharacter($varUserSession, array_shift($varAPIKeyData));
            $varAPIStructure = implode('.', $varAPIKeyData);
            
            //---> Cek Nama Fungsi yang akan dieksekusi
            if(!$varFunctionName)
                {
                //---> Bila Null, maka disamakan dengan nama fungsi parent yang menginisiasi objek ini
                $varFunctionName = debug_backtrace()[1]['function'];
                }
            
            //---> Latest Version Translation
            if(strcmp($varAPIVersion, 'latest') == 0)
                {
                $varFileVersionHeader = 'v';
                $varFolderArray = \App\Helpers\ZhtHelper\General\Helper_File::getFilesListInFolder($varUserSession, getcwd().'/./../app/Http/Controllers/Application/BackEnd/System/'.$varAPIService.'/Engines/'.str_replace('.', '/', $varAPIStructure));
                $varLastVersion = 0;
                for($i=0; $i!=count($varFolderArray); $i++)
                    {
                    $varCheckVersion = str_replace($varFileVersionHeader, '', $varFolderArray[$i]);
                    if($varLastVersion < $varCheckVersion)
                        {
                        $varLastVersion = $varCheckVersion;
                        }
                    }
                $varAPIVersion=$varLastVersion;
                }
                
            //---> Main Process
            $varClass = 'App\\Http\\Controllers\\Application\\BackEnd\\System\\'.$varAPIService.'\\Engines\\'.str_replace('.', '\\', $varAPIStructure).'\\v'.$varAPIVersion.'\\'.$varAPIKeyData[count($varAPIKeyData)-1];
            $varFilePath = \App\Helpers\ZhtHelper\General\Helper_File::getAutoMatchFilePath($varUserSession, getcwd(), '/./../'.str_replace('App/', 'app/', str_replace('\\', '/', $varClass)).'.php');
            if(!$varFilePath)
                {
                throw new \Exception('API with Key `'.$varAPIKey.'` version `'.$varAPIVersion.'` does not found');
                }
            require_once($varFilePath);
            //$varObj = new $varClass();
            //$varReturn = $varObj->{$varFunctionName}($varUserSession, $varData);
            $varReturn = (new $varClass())->{$varFunctionName}($varUserSession, $varData);
//$varReturn='xxxxxxxxxx';

            if($varReturn['metadata']['successStatus']==false)
                {
//                if($varReturn['data']['code']!=null)
      //              {
                    return \App\Helpers\ZhtHelper\System\Helper_HTTPError::setResponseOveride($varUserSession, $varReturn['data']['code'], $varReturn['data']['message']);
//return \App\Helpers\ZhtHelper\System\Helper_HTTPError::setResponseOveride($varUserSession, $varReturn['data']['code'], json_encode($varReturn));
        //            }
//                else
  //                  {
                    //return $varReturn;
                    
                    //return \App\Helpers\ZhtHelper\System\Helper_HTTPError::setResponseOveride($varUserSession, 401, 'Mymessage');
                    
                    //return \App\Helpers\ZhtHelper\System\Helper_HTTPError::setHTTPErrorPageDisplay($varUserSession, 401);
                    //return self::setEngineResponseDataReturn_Fail($varUserSession, 401);
//return \App\Helpers\ZhtHelper\System\Helper_HTTPError::setResponseOveride($varUserSession, $varReturn['data']['code'], $varReturn['data']['message']);
            
//return 'Class = '.$varClass.', Function = '.$varFunctionName.', Data = '.serialize($varData);            
                    //die;
//return \App\Helpers\ZhtHelper\System\Helper_HTTPError::setResponseOveride($varUserSession, 401, json_encode($varReturn));
    //                }
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

public static function setEngineResponseDataReturn_FailXXX($varUserSession, int $varHTTPErrorCode, string $varHTTPErrorMessage = null)
    {
    if(!$varHTTPErrorMessage)
        {
        $varHTTPErrorMessage = '';
        }
    $varReturn = [
        "metadata" => [
            "successStatus" => true
            ],
        "data" => [
            "code" => $varHTTPErrorCode,
            "message" => $varHTTPErrorMessage
            ]
        ];
    return $varReturn;
    }
    
    
    
        public static function setCallAPIEngine2($varUserSession, $varAPIKey, $varAPIVersion, array $varData, string $varFunctionName=null)
            {
            $varAPIKeyData = explode('.', $varAPIKey);
            $varAPIService = \App\Helpers\ZhtHelper\General\Helper_String::getUpperCaseFirstCharacter($varUserSession, array_shift($varAPIKeyData));
            $varAPIStructure = implode('.', $varAPIKeyData);
            
            //---> Cek Nama Fungsi yang akan dieksekusi
            if(!$varFunctionName)
                {
                //---> Bila Null, maka disamakan dengan nama fungsi parent yang menginisiasi objek ini
                $varFunctionName = debug_backtrace()[1]['function'];
                }
            
            //---> Latest Version Translation
            if(strcmp($varAPIVersion, 'latest') == 0)
                {
                $varFileVersionHeader = 'v';
                $varFolderArray = \App\Helpers\ZhtHelper\General\Helper_File::getFilesListInFolder($varUserSession, getcwd().'/./../app/Http/Controllers/Application/BackEnd/System/'.$varAPIService.'/Engines/'.str_replace('.', '/', $varAPIStructure));
                $varLastVersion = 0;
                for($i=0; $i!=count($varFolderArray); $i++)
                    {
                    $varCheckVersion = str_replace($varFileVersionHeader, '', $varFolderArray[$i]);
                    if($varLastVersion < $varCheckVersion)
                        {
                        $varLastVersion = $varCheckVersion;
                        }
                    }
                $varAPIVersion=$varLastVersion;
                }
                
            //---> Main Process
            $varClass = 'App\\Http\\Controllers\\Application\\BackEnd\\System\\'.$varAPIService.'\\Engines\\'.str_replace('.', '\\', $varAPIStructure).'\\v'.$varAPIVersion.'\\'.$varAPIKeyData[count($varAPIKeyData)-1];
            $varFilePath = \App\Helpers\ZhtHelper\General\Helper_File::getAutoMatchFilePath($varUserSession, getcwd(), '/./../'.str_replace('App/', 'app/', str_replace('\\', '/', $varClass)).'.php');
            if(!$varFilePath)
                {
                throw new \Exception('API with Key `'.$varAPIKey.'` version `'.$varAPIVersion.'` does not found');
                }
            require_once($varFilePath);
            $varReturn = (new $varClass())->{$varFunctionName}($varUserSession, $varData);
            
            if($varReturn['metadata']['successStatus']==false)
                {
                if(!$varReturn['data']['code'])
                    {
                    return \App\Helpers\ZhtHelper\System\Helper_HTTPError::setResponseOveride($varUserSession, $varReturn['data']['code'], $varReturn['data']['message']);
                    }
                }
            return $varReturn;            
            }    
    
    
    
    
    
    
    
    
    
    
    
        }
    }