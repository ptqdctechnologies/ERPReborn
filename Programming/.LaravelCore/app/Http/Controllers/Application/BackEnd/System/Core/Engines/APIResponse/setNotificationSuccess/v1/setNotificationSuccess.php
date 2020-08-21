<?php

namespace App\Http\Controllers\Application\BackEnd\System\Core\Engines\APIResponse\setNotificationSuccess\v1
    {
    class setNotificationSuccess extends \App\Http\Controllers\Controller
        {
        function __construct()
            {
            }


        public static function setNotificationSuccess($varUserSession, $varData)
            {
            $varReturn = [
                'metadata' => [
                    'HTTPStatusCode' => $varData['HTTPStatusCode'],
                    'APIResponse' => [
                        'class' => 'core.general.notification',
                        'type' => 'successMessage',
                        'version' => 1
                        ],
                    ],
                'data' => [
                    'message' => $varData['message']
                    ]
                ];
            return $varReturn;
            }
        }
    }