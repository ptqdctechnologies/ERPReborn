<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\instruction\device\fingerprintAttendance     |
|                 \Solution\x601\getDataAttendance\v1                                                                              |
| ▪ API Key     : instruction.device.fingerprintAttendance.Solution.x601.getDataAttendance                                         |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2022 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\instruction\device\fingerprintAttendance\Solution\x601\getDataAttendance\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/                                                                                    |
        |                     instruction.device.fingerprintAttendance.Solution.x601.getDataAttendance.v1_throughAPIGateway        |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       instruction.device.fingerprintAttendance.Solution.x601.getDataAttendance.v1_throughAPIGateway      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-09-19                                                                                           |
        | ▪ Creation Date   : 2022-09-19                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function throughAPIGateway($varAPIWebToken)
            {
            //---Parameter Set---
            if (!$varAPIWebToken) {
                $varAPIWebToken = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
                }
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'instruction.device.fingerprintAttendance.Solution.x601.getDataAttendance', 
                'latest', 
                [
                'entities' => [
                    'IPAddress' => '192.168.1.203',
                    'port' => 4370, 
                    'serialNumber' => 'AEYU202860040',
                    'timeZoneOffset' => '+07',
                    'startDateTime' => '2021-01-01'
                    ]
                ]
                );
            var_dump($varData);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/                                                                                    |
        |                     instruction.device.fingerprintAttendance.Solution.x601.getDataAttendance.v1_throughAPIGatewayJQuery  |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       instruction.device.fingerprintAttendance.Solution.x601.getDataAttendance.                          |
        |                       v1_throughAPIGatewayJQuery                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-09-19                                                                                           |
        | ▪ Creation Date   : 2022-09-19                                                                                           |
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
            echo    '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">Instruction Device Fingerprint Attendance Solution x601 Data</p></td></tr>';
            echo        '<tr><td>IPAddress</td><td><input type="text" id="dataInput_IPAddress" value="192.168.1.203"></td></tr>';
            echo        '<tr><td>Port</td><td><input type="text" id="dataInput_Port" value=4370></td></tr>';
            echo        '<tr><td>SerialNumber</td><td><input type="text" id="dataInput_SerialNumber" value="AEYU202860040"></td></tr>';
            echo        '<tr><td>TimeZoneOffset</td><td><input type="text" id="dataInput_TimeZoneOffset" value="+07"></td></tr>';
            echo        '<tr><td>StartDateTime</td><td><input type="text" id="dataInput_StartDateTime" value="2021-01-01"></td></tr>';
            echo '</table><br>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'instruction.device.fingerprintAttendance.Solution.x601.getDataAttendance', 
                'latest', 
                '{'.
                    '"entities" : {'.
                        '"IPAddress" : document.getElementById("dataInput_IPAddress").value, '.
                        '"port" : parseInt(document.getElementById("dataInput_Port").value), '.
                        '"serialNumber" : document.getElementById("dataInput_SerialNumber").value, '.
                        '"timeZoneOffset" : document.getElementById("dataInput_TimeZoneOffset").value, '.
                        '"startDateTime" : document.getElementById("dataInput_StartDateTime").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";
            dd($varJQueryFunction);
            }
        }
    }