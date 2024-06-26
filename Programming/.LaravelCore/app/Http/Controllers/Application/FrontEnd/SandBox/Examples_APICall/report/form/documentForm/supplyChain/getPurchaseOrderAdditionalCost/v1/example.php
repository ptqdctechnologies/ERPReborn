<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\report\form\documentForm\supplyChain         |
|                 \getPurchaseOrderAdditionalCost\v1                                                                               |
| ▪ API Key     : report.form.documentForm.taxation.getPurchaseOrderAdditionalCost                                                 |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2023 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\report\form\documentForm\supplyChain\getPurchaseOrderAdditionalCost\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/                                                                                    |
        |                     report.form.documentForm.supplyChain.getPurchaseOrderAdditionalCost.v1_throughAPIGateway             |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       report.form.documentForm.supplyChain.getPurchaseOrderAdditionalCost.v1_throughAPIGateway           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-05-19                                                                                           |
        | ▪ Creation Date   : 2023-05-19                                                                                           |
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
                'report.form.documentForm.supplyChain.getPurchaseOrderAdditionalCost', 
                'latest',
                [
                'parameter' => [
                    'recordID' => 85000000000001
                    ]
                ]
                );
            var_dump($varData);
            }
        }
    }