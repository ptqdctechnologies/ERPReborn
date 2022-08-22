<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\fileHandling\upload\combined\general         |
|                 \getMasterFileRecord\v1                                                                                          |
| ▪ API Key     : fileHandling.upload.combined.general.getMasterFileRecord                                                         |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2022 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\fileHandling\upload\combined\general\getMasterFileRecord\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/fileHandling.upload.combined.general.getMasterFileRecord.v1_throughAPIGateway       |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       fileHandling.upload.combined.general.getMasterFileRecord.v1_throughAPIGateway                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-08-03                                                                                           |
        | ▪ Creation Date   : 2022-08-03                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function throughAPIGateway($varAPIWebToken)
            {
            //---Parameter Set---
            if (!$varAPIWebToken) {
                $varAPIWebToken = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
                }
/*
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'fileHandling.upload.combined.general.getMasterFileRecord', 
                'latest', 
                [
                'parameter' => [
                    'log_FileUpload_Pointer_RefID' => 91000000000010,
                    'rotateLog_FileUploadStagingArea_RefRPK' => 485,
                    'deleteCandidate_Log_FileUpload_ObjectDetail_RefArrayID' => [1,2]
                    ]
                ]
                );*/

            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'fileHandling.upload.combined.general.getMasterFileRecord', 
                'latest', 
                [
                'parameter' => [
                    'log_FileUpload_Pointer_RefID' => 91000000000011,
                    'rotateLog_FileUploadStagingArea_RefRPK' => null,
                    'deleteCandidate_Log_FileUpload_ObjectDetail_RefArrayID' => [1,2]
                    ]
                ]
                );

                
            var_dump($varData);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/                                                                                    |
        |                     fileHandling.upload.combined.general.getMasterFileRecord.v1_throughAPIGatewayJQuery                  |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       fileHandling.upload.combined.general.getMasterFileRecord.v1_throughAPIGatewayJQuery                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-08-03                                                                                           |
        | ▪ Creation Date   : 2022-08-03                                                                                           |
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
            echo '<br>Archive Record ID<input type="text" id="dataInput_log_FileUpload_Pointer_RefID" value="">';
            echo '<br>Staging Area Record PK<input type="text" id="dataInput_rotateLog_FileUploadStagingArea_RefRPK" value=186>';
            echo '<br>Delete Candidate Log_FileUpload_ObjectDetail RefArrayID<input type="text" id="dataInput_deleteCandidate_Log_FileUpload_ObjectDetail_RefArrayID" value="[]">';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'fileHandling.upload.combined.general.getMasterFileRecord', 
                'latest', 
                '{'.
                    '"parameter" : {'.
                        '"log_FileUpload_Pointer_RefID" : parseInt(document.getElementById("dataInput_log_FileUpload_Pointer_RefID").value), '.
                        '"rotateLog_FileUploadStagingArea_RefRPK" : parseInt(document.getElementById("dataInput_rotateLog_FileUploadStagingArea_RefRPK").value), '.
                        '"deleteCandidate_Log_FileUpload_ObjectDetail_RefArrayID" : document.getElementById("dataInput_deleteCandidate_Log_FileUpload_ObjectDetail_RefArrayID").value'.
                        '}'.
                '}'
                );
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";
            dd($varJQueryFunction);
            }
        }
    }