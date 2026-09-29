<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\generalPurposes\status\project               |
|                 \isProjectProgressDataFromLastWeekAvailable\v1                                                                   |
| ▪ API Key     : generalPurposes.status.project.isProjectProgressDataFromLastWeekAvailable                                        |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2026 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\generalPurposes\status\project\isProjectProgressDataFromLastWeekAvailable\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/                                                                                    |
        |                     generalPurposes.status.project.isProjectProgressDataFromLastWeekAvailable.v1_throughAPIGateway       |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       generalPurposes.status.project.isProjectProgressDataFromLastWeekAvailable.v1_throughAPIGateway     |
        |                                                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2026-09-29                                                                                           |
        | ▪ Creation Date   : 2026-09-29                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function throughAPIGateway($varAPIWebToken)
            {
            //-----[ PARAMETER SET ]-----
            if (!$varAPIWebToken) {
                $varAPIWebToken =
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getAPIWebToken_System();
                }

            //-----[ CORE ]-----
            $varData =
                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                    //-----[ METADATA ]-----( START )-----
                        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                        $varAPIWebToken, 
                        'generalPurposes.status.project.isProjectProgressDataFromLastWeekAvailable', 
                        'latest',
                    //-----[ METADATA ]-----(  END  )-----

                    //-----[ DATA ]---------( START )---
                        [
                        'parameter' => [
                            'recordID' => 46000000000033
                            ]
                        ]
                    //-----[ DATA ]---------(  END  )-----
                    );

            //-----[ DATA RETURN ]-----
            return
                $varData;
            }

        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/                                                                                    |
        |                     report.form.resume.project.getProjectProgress.v1_throughAPIGatewayJQuery     |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       report.form.resume.project.getProjectProgress.v1_throughAPIGatewayJQuery   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-01-09                                                                                           |
        | ▪ Creation Date   : 2025-01-09                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function throughAPIGatewayJQuery($varAPIWebToken)
            {
            //---Parameter Set---
            if (!$varAPIWebToken) {
                $varAPIWebToken =
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getAPIWebToken_System();
                }

            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());

            echo '<table border="1" style="border-collapse: collapse;">';
            echo    '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">Business Document Issuance Disposition Count Main Data</p></td></tr>';
            echo        '<tr><td>RecordID</td><td><input type="text" id="dataInput_RecordID" value="164000000000196"></td></tr>';
            echo '</table><br>';

            $varJQueryFunction =
                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                    $varAPIWebToken, 
                    'report.form.resume.project.getProjectProgress', 
                    'latest', 
                    '{'.
                        '"parameter" : {'.
                            '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                            '}'.
                    '}'
                    ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";

            dd($varJQueryFunction);
            }
        }
    }