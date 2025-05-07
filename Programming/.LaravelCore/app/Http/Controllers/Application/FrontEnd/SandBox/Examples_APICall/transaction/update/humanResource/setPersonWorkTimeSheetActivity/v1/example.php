<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\humanResource             |
|                 \setPersonWorkTimeSheetActivity\v1                                                                               |
| ▪ API Key     : transaction.update.humanResource.setPersonWorkTimeSheetActivity                                                  |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2022 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\humanResource\setPersonWorkTimeSheetActivity\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/                                                                                    |
        |                     transaction.update.humanResource.setPersonWorkTimeSheetActivity.v1_throughAPIGateway                 |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       transaction.update.humanResource.setPersonWorkTimeSheetActivity.v1_throughAPIGateway               |
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
            $varData =
                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                    //-----[ METADATA ]-----( START )-----
                        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                        $varAPIWebToken, 
                        'transaction.update.humanResource.setPersonWorkTimeSheetActivity', 
                        'latest',
                    //-----[ METADATA ]-----(  END  )-----

                    //-----[ DATA ]-----( START )-----
                        [
                        'recordID' => 50000000000001,
                        'entities' => [
                            'personWorkTimeSheet_RefID' => 48000000000001,
                            'projectSectionItem_RefID' => null,
                            'startDateTimeTZ' => '2026-01-01 07:00:00 +07',
                            'finishDateTimeTZ' => '2026-01-01 13:00:00 +07',
                            'activity' => 'Kegiatan ABCD dan EFGH',
                            'colorText' => '#000000',
                            'colorBackground' => '#ababab'
                            ]
                        ]
                    //-----[ DATA ]-----(  END  )-----
                    );

            return
                $varData;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/                                                                                    |
        |                     transaction.update.humanResource.setPersonWorkTimeSheetActivity.v1_throughAPIGatewayJQuery           |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       transaction.update.humanResource.setPersonWorkTimeSheetActivity.v1_throughAPIGatewayJQuery         |
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
            echo    '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">Person Work Time Sheet Detail Main Data</p></td></tr>';
            echo        '<tr><td>RecordID</td><td><input type="text" id="dataInput_RecordID" value=50000000085287></td></tr>';
            echo        '<tr><td>PersonWorkTimeSheet_RefID</td><td><input type="text" id="dataInput_PersonWorkTimeSheet_RefID" value=48000000000001></td></tr>';
            echo        '<tr><td>ProjectSectionItem_RefID</td><td><input type="text" id="dataInput_ProjectSectionItem_RefID" value=""></td></tr>';
            echo        '<tr><td>StartDateTimeTZ</td><td><input type="text" id="dataInput_StartDateTimeTZ" value="2026-01-01 07:00:00 +07"></td></tr>';
            echo        '<tr><td>FinishDateTimeTZ</td><td><input type="text" id="dataInput_FinishDateTimeTZ" value="2026-01-01 13:00:00 +07"></td></tr>';
            echo        '<tr><td>Activity</td><td><input type="text" id="dataInput_Activity" value="Kegiatan ABCD dan EFGH"></td></tr>';
            echo        '<tr><td>ColorText</td><td><input type="text" id="dataInput_ColorText" value="#000000"></td></tr>';
            echo        '<tr><td>ColorBackground</td><td><input type="text" id="dataInput_ColorBackground" value="#ababab"></td></tr>';
            echo '</table><br>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.update.humanResource.setPersonWorkTimeSheetActivity', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value), '.
                    '"entities" : {'.
                        '"personWorkTimeSheet_RefID" : parseInt(document.getElementById("dataInput_PersonWorkTimeSheet_RefID").value), '.
                        '"projectSectionItem_RefID" : parseInt(document.getElementById("dataInput_ProjectSectionItem_RefID").value), '.
                        '"startDateTimeTZ" : document.getElementById("dataInput_StartDateTimeTZ").value, '.
                        '"finishDateTimeTZ" : document.getElementById("dataInput_FinishDateTimeTZ").value, '.
                        '"activity" : document.getElementById("dataInput_Activity").value, '.
                        '"colorText" : document.getElementById("dataInput_ColorText").value, '.
                        '"colorBackground" : document.getElementById("dataInput_ColorBackground").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";
            dd($varJQueryFunction);
            }
        }
    }