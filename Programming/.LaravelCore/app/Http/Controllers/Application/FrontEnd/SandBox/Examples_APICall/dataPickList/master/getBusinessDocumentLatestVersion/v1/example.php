<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\dataPickList\master                          |
|                 \getBusinessDocumentLatestVersion\v1                                                                             |
| ▪ API Key     : dataPickList.master.getBusinessDocumentLatestVersion                                                             |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2025 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\dataPickList\master\getBusinessDocumentLatestVersion\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/dataPickList.master.getBusinessDocumentLatestVersion.v1_throughAPIGateway           |
        |                     ► http://172.28.0.4/dataPickList.master.getBusinessDocumentLatestVersion.v1_throughAPIGateway        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-04-09                                                                                           |
        | ▪ Creation Date   : 2025-04-09                                                                                           |
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
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                    $varAPIWebToken, 
                    'dataPickList.master.getBusinessDocumentLatestVersion', 
                    'latest',
                    [
                    'parameter' => [
                        'businessDocumentType_RefID' => 77000000000057
                        ]
                    ]
                    );

            var_dump($varData);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/dataPickList.master.getBusinessDocumentLatestVersion.v1_throughAPIGatewayJQuery     |
        |                     ► http://172.28.0.4/dataPickList.master.getBusinessDocumentLatestVersion.v1_throughAPIGatewayJQuery  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-04-09                                                                                           |
        | ▪ Creation Date   : 2025-04-09                                                                                           |
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
            echo '<tr><td>Business&nbsp;Document&nbsp;Type&nbsp;RefID</td><td><input type="text" id="dataInput_BusinessDocumentType_RefID" value=77000000000057></td></tr>';
            echo '</table>';

            $varJQueryFunction =
                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                    $varAPIWebToken, 
                    'dataPickList.master.getBusinessDocumentLatestVersion', 
                    'latest', 
                    '{'.
                        '"parameter" : {'.
                            'businessDocumentType_RefID :  parseInt(document.getElementById("dataInput_BusinessDocumentType_RefID").value) '.
                            '}'.
                    '}'
                    );            

            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";

            dd($varJQueryFunction);
            }
        }
    }