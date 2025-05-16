<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\dataWarehouse\dataCheck\recordIDExistantion  |
|                 \acquisition\getFileUpload_Pointer\v1                                                                            |
| ▪ API Key     : dataWarehouse.dataCheck.recordIDExistantion.acquisition.getFileUpload_Pointer                                    |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2023 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\dataWarehouse\dataCheck\recordIDExistantion\acquisition\getFileUpload_Pointer\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/                                                                                    |
        |                     dataWarehouse.dataCheck.recordIDExistantion.acquisition.getFileUpload_Pointer.v1_throughAPIGateway   |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       dataWarehouse.dataCheck.recordIDExistantion.acquisition.getFileUpload_Pointer.v1_throughAPIGateway |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-08-20                                                                                           |
        | ▪ Creation Date   : 2024-08-20                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function throughAPIGateway($varAPIWebToken)
            {

/*
            $varData = 
                [
                'dataWarehouse.dataCheck.recordIDExistantion.acquisition.getFileUpload_Pointer', 
                'latest', 
                [
                'parameter' => [
                    'recordID' => 91000000000001
                    ]
                ]
                ];
            

            $varUserSession = 1;
            $varHeaders = [
                'Authorization' => (((\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'header', $varData) == true) && (\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'authorization', $varData['header']) == true)) ? $varData['header']['authorization'] : null),
                'User-Agent' => (empty($_SERVER['HTTP_USER_AGENT'])? 'Non Browser' : $_SERVER['HTTP_USER_AGENT']),
                'Agent-DateTime' => \App\Helpers\ZhtHelper\General\Helper_HTTPHeader::generateDate($varUserSession),
                'Expires' => \App\Helpers\ZhtHelper\General\Helper_HTTPHeader::generateExpires($varUserSession, (10*60)),
                'Content-Type' => \App\Helpers\ZhtHelper\General\Helper_HTTPHeader::generateContentType($varUserSession, json_encode($varData)),
                'X-Content-MD5' => \App\Helpers\ZhtHelper\General\Helper_HTTPHeader::generateContentMD5(
                    $varUserSession, 
                    json_encode(
                        \App\Helpers\ZhtHelper\General\Helper_Array::setRemoveElementByKey(
                            \App\Helpers\ZhtHelper\General\Helper_HTTPHeader::generateDate($varUserSession), 
                            'header', 
                            $varData
                            )
                        )
                    ),
                'X-Request-ID' => \App\Helpers\ZhtHelper\General\Helper_RandomNumber::getUniqueID($varUserSession)
                ];
            
            $ObjClient = new \GuzzleHttp\Client();
            $varResponse = 
                $ObjClient->request(
                    'GET',
                    'https://172.28.0.4/getAPIRedirect',
                    [
                    'verify' => false,
                    'headers' => $varHeaders, 
                    'body' =>  json_encode($varData, true)
                    //'timeout' => 5,
                    //'connect_timeout' => 2
                    ]
                    );

$varResponseData = \App\Helpers\ZhtHelper\System\Helper_HTTPResponse::getResponse_BodyContent($varUserSession, $varResponse);
            
            dd($varResponseData);    
*/
                
            //-----[ PARAMETER SET ]------------------------------------------------------------------------------------------------
            if (!$varAPIWebToken) {
                $varAPIWebToken =
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getAPIWebToken_System();
                }

            //-----[ CORE PROCESS ]-------------------------------------------------------------------------------------------------
            $varData =
                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                    //-----[ METADATA ]-------------------------------------------------( START )-----
                        $varAPIWebToken,
                        'dataWarehouse.dataCheck.recordIDExistantion.acquisition.getFileUpload_Pointer',
                        'latest',
                    //-----[ METADATA ]-------------------------------------------------(  END  )-----

                    //-----[ DATA ]-----------------------------------------------------( START )-----
                        [
                        'parameter' => [
                            'recordID' => 91000000000001
                            ]
                        ]
                    //-----[ DATA ]-----------------------------------------------------(  END  )-----
                    );

            //-----[ DATA RETURN ]--------------------------------------------------------------------------------------------------
            return
                $varData;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/                                                                                    |
        |                     dataWarehouse.dataCheck.recordIDExistantion.acquisition.getFileUpload_Pointer.                       |
        |                     v1_throughAPIGatewayJQuery                                                                           |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       dataWarehouse.dataCheck.recordIDExistantion.acquisition.getFileUpload_Pointer.                     |
        |                       v1_throughAPIGatewayJQuery                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-08-20                                                                                           |
        | ▪ Creation Date   : 2024-08-20                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function throughAPIGatewayJQuery($varAPIWebToken)
            {
            //---Parameter Set---
            if (!$varAPIWebToken) {
                $varAPIWebToken = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
                }
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<table border="1" style="border-collapse: collapse;">';
            echo '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">Parameter</p></td></tr>';
            echo '<tr><td>RecordID</td><td><input type="text" id="dataInput_RecordID" value=91000000000001></td></tr>';
            echo '</table>';
            $varJQueryFunction =
                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                    $varAPIWebToken, 
                    'dataWarehouse.dataCheck.recordIDExistantion.acquisition.getFileUpload_Pointer', 
                    'latest', 
                    '{'.
                        '"parameter" : {'.
                            '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value), '.
                            '}'.
                    '}'
                    ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";
            dd($varJQueryFunction);
            }
        }
    }