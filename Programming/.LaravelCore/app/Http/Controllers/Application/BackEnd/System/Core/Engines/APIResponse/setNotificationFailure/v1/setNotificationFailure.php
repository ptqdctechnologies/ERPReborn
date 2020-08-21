<?php


namespace App\Http\Controllers\Application\BackEnd\System\Core\Engines\APIResponse\setNotificationFailure\v1
    {
    class setNotificationFailure extends \App\Http\Controllers\Controller
        {
        function __construct()
            {
            }


        public static function setNotificationFailure($varUserSession, $varData)
            {
            $varReturn = [
                'metadata' => [
                    'HTTPStatusCode' => $varData['HTTPStatusCode'],
                    'APIResponse' => [
                        'class' => 'core.general.notification',
                        'type' => 'failureMessage',
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