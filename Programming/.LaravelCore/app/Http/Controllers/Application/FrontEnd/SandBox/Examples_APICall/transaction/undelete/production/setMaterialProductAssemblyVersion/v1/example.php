<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\undelete\production                |
|                 \setMaterialProductAssemblyVersion\v1                                                                                            |
| ▪ API Key     : transaction.undelete.production.setMaterialProductAssemblyVersion                                                                  |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2025 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\undelete\production\setMaterialProductAssemblyVersion\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.undelete.production.setMaterialProductAssemblyVersion.v1_throughAPIGateway                |
        |                     ► http://172.28.0.4/transaction.undelete.production.setMaterialProductAssemblyVersion.v1_throughAPIGateway             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-02-28                                                                                           |
        | ▪ Creation Date   : 2025-02-28                                                                                           |
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
                'transaction.undelete.production.setMaterialProductAssemblyVersion',
                'latest',
                [
                'recordID' => 159000000000001
                ]
                );
            return $varData;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.undelete.production.setMaterialProductAssemblyVersion.v1_throughAPIGatewayJQuery          |
        |                     ► http://172.28.0.4/transaction.undelete.production.setMaterialProductAssemblyVersion.v1_throughAPIGatewayJQuery       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-02-28                                                                                           |
        | ▪ Creation Date   : 2025-02-28                                                                                           |
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
            echo '<input type="text" id="dataInput_RecordID" value=159000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'transaction.undelete.production.setMaterialProductAssemblyVersion',
                'latest',
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                );
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";
            dd($varJQueryFunction);
            }
        }
    }
