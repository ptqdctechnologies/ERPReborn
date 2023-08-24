<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\report\form\documentForm\sysConfig           |
|                 \getLogBusinessDocumentWorkFlowPathHistory\v1                                                                    |
| ▪ API Key     : report.form.documentForm.sysConfig.getLogBusinessDocumentWorkFlowPathHistory                                     |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2023 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\report\form\documentForm\sysConfig\getLogBusinessDocumentWorkFlowPathHistory\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/                                                                                    |
        |                     report.form.documentForm.sysConfig.getLogBusinessDocumentWorkFlowPathHistory.v1_throughAPIGateway    |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       report.form.documentForm.sysConfig.getLogBusinessDocumentWorkFlowPathHistory.v1_throughAPIGateway  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-06-13                                                                                           |
        | ▪ Creation Date   : 2023-06-13                                                                                           |
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
                'report.form.documentForm.sysConfig.getLogBusinessDocumentWorkFlowPathHistory', 
                'latest',
                [
                'parameter' => [
                    'recordID' => 74000000020323 // 74000000000003 // Business Document ID
                    //'recordID' => 75000001493195 // Business Document Version ID
                    //'recordID' => 75000001493374
                    ]
                ]
                );
            var_dump($varData);
            }
        }
    }