<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Helpers                                                                                                   |
| ▪ Name Space : \App\Helpers\ZhtHelper\General                                                                                    |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2020 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Helpers\ZhtHelper\General
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : Helper_JQuery                                                                                                |
    | ▪ Description : Menangani JQuery                                                                                             |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class Helper_JQuery
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-12-16                                                                                           |
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
        | ▪ Last Update     : 2020-12-16                                                                                           |
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
        | ▪ Method Name     : setLibrary                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-12-16                                                                                           |
        | ▪ Description     : Mengeset Library JQuery                                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession                                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        private static function setLibrary($varUserSession)
            {
            $varReturn = 
                '<script src = "js/jQuery/jquery.min.js">'.
                '</script>';
            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setCallAPI                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-12-16                                                                                           |
        | ▪ Description     : Mengeset API                                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession                                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function setCallAPI($varUserSession, $varAPIWebToken, $varAPIKey, $varAPIVersion, $varData)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, false, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'set Call API');
                try {
                    $varURL = \App\Helpers\ZhtHelper\System\Helper_Environment::getFrontEndConfigEnvironment($varUserSession, 'URL_FRONTEND_JQUERY_API_GATEWAY');
                    $varJSONObject = json_encode([
                        'APIWebToken' => $varAPIWebToken,
                        'APIKey' => $varAPIKey, 
                        'APIVersion' => $varAPIVersion,
                        'data' => $varData,
                        '_token' => \App\Helpers\ZhtHelper\System\Helper_Environment::getCSRFToken($varUserSession)
                        ]);
                    $varReturn = 
                        self::setLibrary($varUserSession).
                        '<script type="text/javascript">'.
                            'varURL="'.$varURL.'";'.
                            'varJSONObject='.$varJSONObject.';'.
                            'window.alert(varURL);'.
                            //'window.alert(JSON.stringify(varJSONObject));'.
                            '
                            window.onload = function()
                                {
                                $.ajax(varURL, {
                                    type : "POST",
                                    data : JSON.stringify(varJSONObject),
                                    contentType : "application/json",
                                    success: function(varDataResponse) 
                                        {
                                        alert("Success!" + varDataResponse);
                                        $("body").append(JSON.stringify(varDataResponse));
                                        },
                                    error: function(varDataResponse)
                                        {
                                        $("body").append(JSON.stringify(varDataResponse));
                                        varStatusCode = varDataResponse.status;
                                        varStatusText = varDataResponse.statusText;
                                        varContent = varDataResponse.responseText;
                                        varReadyState = varDataResponse.readyState;

                                        //$("body").append(JSON.stringify(varDataResponse));
                                        //alert("Failed, Error " + JSON.stringify(varDataResponse)); 
                                        }
                                    });
                                //alert("URL -> " + varURL + ", JSONObject" + JSON.stringify(varDataResponse.status));
                                }
                            '.
/*                          '
                            varURL="'.$varURL.'";
                            varJSONObject='.$varJSONObject.';
                            window.onload = function()
                                {
                                $.ajax(varURL, {
                                    type : "POST",
                                    data : JSON.stringify(varJSONObject),
                                    contentType : "application/json",
                                    success: function(varDataResponse) 
                                        {
                                        alert("Success!" + varDataResponse);
                                        $("body").append(JSON.stringify(varDataResponse));
                                        },
                                    error: function(varDataResponse)
                                        {
                                        varStatusCode = varDataResponse.status;
                                        varStatusText = varDataResponse.statusText;
                                        varContent = varDataResponse.responseText;
                                        varReadyState = varDataResponse.readyState;

                                        //$("body").append(JSON.stringify(varDataResponse));
                                        //alert("Failed, Error " + JSON.stringify(varDataResponse)); 
                                        }
                                    });
                                //alert("URL -> " + varURL + ", JSONObject" + JSON.stringify(varDataResponse.status));
                                }
                            '.*/
                            //'window.alert("xxx");'.
                        '</script>';
                    
                        
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Success');
                    }
                catch (\Exception $ex) {
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Failed, '. $ex->getMessage());
                    }
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
                } 
            catch (\Exception $ex) {
                }
            return \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }


        public static function setCallAPIOLD($varUserSession)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, false, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'set Call API');
                try {
                    $varURL = \App\Helpers\ZhtHelper\System\Helper_Environment::getFrontEndConfigEnvironment($varUserSession, 'URL_BACKEND_API_GATEWAY');
                    $varURL = 'http://172.28.0.3/api/gateway';
                    $varURL = 'http://172.28.0.3/api/test';
                    $varJSONObject = json_encode([
                        'APIWebToken' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwODE3Njg0Nn0.KwRz-o9Nr4DLsG6XDkxSD5F6ZBcW8ANTwFxNoS6wXz4',
                        'APIKey' => 'environment.general.session.getUserPrivilegesMenu', 
                        'APIVersion' => 'latest',
                        'data' => [
                            ]
                        ]);
                    $varReturn = 
                        self::setLibrary($varUserSession).
                        '<script type="text/javascript">'.
                            '
                            varURL="'.$varURL.'";
                            varJSONObject='.$varJSONObject.';
                            window.onload = function()
                                {
                                $.ajax(varURL, {
                                    type : "POST",
                                    data : JSON.stringify(varJSONObject),
                                    contentType : "application/json",
                                    success: function(varDataResponse) 
                                        {
                                        alert("Success!" + varDataResponse);
                                        $("body").append(JSON.stringify(varDataResponse));
                                        },
                                    error: function(varDataResponse)
                                        {
                                        varStatusCode = varDataResponse.status;
                                        varStatusText = varDataResponse.statusText;
                                        varContent = varDataResponse.responseText;
                                        varReadyState = varDataResponse.readyState;

                                        //$("body").append(JSON.stringify(varDataResponse));
                                        //alert("Failed, Error " + JSON.stringify(varDataResponse)); 
                                        }
                                    });
                                //alert("URL -> " + varURL + ", JSONObject" + JSON.stringify(varDataResponse.status));
                                }
                            '.
                            //'window.alert("xxx");'.
                        '</script>';
/*
                                if (window.jQuery)
                                    {
                                    alert("jQuery is loaded");
                                    }
                                else
                                    {
                                    alert("jQuery is not loaded");
                                    }
 */
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Success');
                    }
                catch (\Exception $ex) {
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Failed, '. $ex->getMessage());
                    }
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
                } 
            catch (\Exception $ex) {
                }
            return \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);

            
            
            
            
            }
        }
    }