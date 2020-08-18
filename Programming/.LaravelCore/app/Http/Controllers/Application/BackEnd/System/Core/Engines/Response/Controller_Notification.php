<?php

namespace App\Http\Controllers\Application\BackEnd\System\Core\API\Response
    {
    use Illuminate\Http\Request;
    
    class Controller_Notification extends \App\Http\Controllers\Controller
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