<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Helpers                                                                                                   |
| ▪ Name Space : \App\Helpers\ZhtHelper\System\API\Response                                                                        |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2020 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Helpers\ZhtHelper\System\API\Response
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : Helper_APIResponse                                                                                           |
    | ▪ Description : Menangani segala parameter yang terkait API Response                                                         |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class Helper_APIResponse
        {
        public static function getResponse()
            {
            $varArgsCount = func_num_args();
            $varArgsList = func_get_args();
            
            $varUserSession = $varArgsList[0];
            $varAPIClass = $varArgsList[1][0];
            $varAPIName = $varArgsList[1][1];
            $varAPIVersion = $varArgsList[1][2];
            
            $varBasePath = '/app/Helpers/ZhtHelper/System/API/Response/MethodContentLibrary';
            $varFilePathPostFix = $varBasePath.'/'.$varAPIClass.'/'.$varAPIName.'/'.$varAPIVersion.'/method.php';
            $varFilePath = \App\Helpers\ZhtHelper\General\Helper_File::getAutoMatchFilePath($varUserSession, getcwd(), $varFilePathPostFix);
            if($varFilePath)
                {
                $varMetaData_APIResponse = [
                    'class' => $varAPIClass,
                    'name' => $varAPIName,
                    'version' => $varAPIVersion
                    ];
                eval(\App\Helpers\ZhtHelper\General\Helper_File::getFileContentFromPHPScript($varUserSession, $varFilePath));
                return $varReturn;
                }
            }
        
        
/*        public static function getNotification_SuccessMessage_v1($varUserSession, $varHTTPStatusCode, $varMessage)
            {
            $varReturn = [
                'metadata' => [
                    'HTTPStatusCode' => $varHTTPStatusCode,
                    'APIResponse' => [
                        'class' => 'core.notification',
                        'type' => 'successMessage',
                        'version' => 1
                        ],
                    ],
                'data' => [
                    'message' => $varMessage
                    ]
                ];
            return $varReturn;
            }

        public static function getNotification_FailureMessage_v1($varUserSession, $varHTTPStatusCode, $varMessage)
            {
            $varReturn = [
                'metadata' => [
                    'HTTPStatusCode' => $varHTTPStatusCode,
                    'APIResponse' => [
                        'class' => 'core.notification',
                        'type' => 'failureMessage',
                        'version' => 1
                        ],
                    ],
                'data' => [
                    'message' => $varMessage
                    ]
                ];
            return $varReturn;
            }*/
        }
    }

?>