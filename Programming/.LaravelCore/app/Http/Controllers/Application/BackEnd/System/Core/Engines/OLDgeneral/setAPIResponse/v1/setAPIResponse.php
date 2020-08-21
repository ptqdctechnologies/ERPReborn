<?php


namespace App\Http\Controllers\Application\BackEnd\System\Core\Engines\general\setAPIResponse\v1
    {
    class setAPIResponse extends \App\Http\Controllers\Controller
        {
        function __construct()
            {
            }


        function setAPIResponse($varUserSession, $varData)
            {
            $varReturn = [
                'metadata' => [
                    'HTTPStatusCode' => $varMetaData_HTTPStatusCode,
                    'APIResponse' => $varMetaData_APIResponse,
                    ],
                'data' => [
                    'message' => $varData_Message
                    ]
                ];
            return $varReturn;
            }
        }
    }

?>