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
    | ▪ Class Name  : Helper_APIResponse                                                                                           |
    | ▪ Description : Menangani segala parameter yang terkait API Response                                                         |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class Helper_APIResponse
        {    
        public static function getNotification_SuccessMessage_v1($varUserSession, $varHTTPStatusCode, $varMessage)
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
            }
        }
    }

?>