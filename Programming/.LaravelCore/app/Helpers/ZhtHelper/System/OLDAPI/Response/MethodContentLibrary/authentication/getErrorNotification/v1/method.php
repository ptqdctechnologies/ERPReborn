<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ API Class   : authentication                                                                                                   |
| ▪ API Name    : getErrorNotification                                                                                             |
| ▪ API Version : v1                                                                                                               |
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Last Update : 2020-08-14                                                                                                       |
| ▪ Description : Mendapatkan Notifikasi Error                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/

$varMetaData_HTTPStatusCode = $varArgsList[2];
$varData_Message = $varArgsList[3];

$varReturn = [
    'metadata' => [
        'HTTPStatusCode' => $varMetaData_HTTPStatusCode,
        'APIResponse' => $varMetaData_APIResponse,
        ],
    'data' => [
        'message' => $varData_Message
        ]
    ];

?>