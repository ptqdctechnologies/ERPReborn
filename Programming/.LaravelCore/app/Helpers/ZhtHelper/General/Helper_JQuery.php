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
        public static function setLibrary($varUserSession)
            {
            $varReturn = 
                '<script src = "js/jQuery/jquery.min.js">'.
                '</script>';
            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setSyntax_AJAX_Post_JSON                                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-12-16                                                                                           |
        | ▪ Description     : Mengeset API                                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession                                                                                           |
        |      ▪ (string) varAPIWebToken                                                                                           |
        |      ▪ (string) varAPIKey                                                                                                |
        |      ▪ (mixed)  varAPIVersion                                                                                            |
        |      ▪ (array)  varData                                                                                                  |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function setSyntax_AJAX_Post_JSON($varUserSession, string $varURL, string $varJSONObject, string $varSuccessScript = null, string $varFailedScript = null)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, false, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'set Syntax AJAX Post JSON');
                try {
                    $varReturn = 
                        'var varData = function() {'.
                            'if (window.jQuery)'.
                                '{'.                            
                                'var varURL = "'.$varURL.'"; '.
                                'var varJSONObject = '.$varJSONObject.'; '.
                                'var varAJAXReturn = null; '.
                                '$.ajax(varURL, {'.
                                    'async : false, '.
                                    'type : "POST", '.
                                    'data : JSON.stringify(varJSONObject), '.
                                    'contentType : "application/json", '.
                                    'success: function(varDataResponse, varTextStatus, ObjXHR) '.
                                        '{ '.
                                        //'$("body").append(JSON.stringify(ObjXHR)); '.
                                        //'$("body").append(JSON.stringify(varTextStatus)); '.
                                        //'$("body").append(JSON.stringify(varDataResponse)); '.
                                        //'alert("Success"); '.
                                        //'varAJAXReturn = "Success"; '.
                                        'varAJAXReturn = JSON.stringify(varDataResponse)'.
                                        ($varSuccessScript ? $varSuccessScript : '').
                                        '}, '.
                                    'error: function(varDataResponse, varTextStatus) '.
                                        '{ '.
                                        //'varStatusCode = varDataResponse.status; '.
                                        //'varStatusText = varDataResponse.statusText; '.
                                        //'varContent = varDataResponse.responseText; '.
                                        //'varReadyState = varDataResponse.readyState; '.
                                        //'$("body").append(JSON.stringify(varDataResponse)); '.
                                        //'alert("Failed, Error " + JSON.stringify(varDataResponse));  '.
                                        //'varAJAXReturn = "Failed"; '.
                                        'varAJAXReturn = JSON.stringify(varDataResponse)'.
                                        ($varFailedScript ? $varFailedScript : '').
                                        '} '.
                                    '}); '.
                                'return varAJAXReturn; '.
                                '}'.
                            'else'.
                                '{'.
                                'alert("jQuery is not yet loaded\nPlease initialize jquery first using Helper Object :\n\n\\\\App\\\\Helpers\\\\ZhtHelper\\\\General\\\\Helper_JQuery::setLibrary($varUserSession)"); '.
                                '}'.
                            '}(); '.
                        //'alert(varReturn); '.
                        '';
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