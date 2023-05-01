<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\report\PDF\dataList\supplyChain              |
|                 \getPurchaseOrder\v1                                                                                             |
| ▪ API Key     : report.PDF.dataList.supplyChain.getPurchaseOrder                                                                 |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2023 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\report\PDF\dataList\supplyChain\getPurchaseOrder\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/report.PDF.dataList.supplyChain.getPurchaseOrder.v1_throughAPIGateway               |
        |                     ► http://172.28.0.4/report.PDF.dataList.supplyChain.getPurchaseOrder.v1_throughAPIGateway            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-04-20                                                                                           |
        | ▪ Creation Date   : 2023-04-20                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function throughAPIGateway($varAPIWebToken)
            {
            //---Parameter Set---
            if (!$varAPIWebToken) {
                $varAPIWebToken = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
                }
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayReport(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'report.PDF.dataList.supplyChain.getPurchaseOrder', 
                'latest', 
                [
                'outputFileName' => 'Data List - PurchaseOrder.pdf',
                'parameter' => [
                    ]
                ]
                );
            var_dump($varData);
            }
        }
    }