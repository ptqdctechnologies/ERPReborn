<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\supplyChain               |
|                 \setStockOpname\v1                                                                                       |
| ▪ API Key     : transaction.update.supplyChain.setStockOpname                                                            |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2026 Wisnu (wisnu.wirayuda01@gmail.com)                                                                              |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\supplyChain\setStockOpname\v1 {
    class example extends \App\Http\Controllers\Controller
    {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.update.supplyChain.setPurchaseRequisition.v1_throughAPIGateway          |
        |                     ► http://172.28.0.4/transaction.update.supplyChain.setPurchaseRequisition.v1_throughAPIGateway       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2026-11-13                                                                                           |
        | ▪ Creation Date   : 2026-11-13                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function throughAPIGateway($varAPIWebToken)
        {
            //---Parameter Set---
            if (!$varAPIWebToken) {
                $varAPIWebToken =
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getAPIWebToken_System();
            }

            //---Core---
            $varData =
                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                    //-----[ METADATA ]-----( START )-----
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                    $varAPIWebToken,
                    'transaction.update.supplyChain.setStockOpname',
                    'latest',
                    //-----[ METADATA ]-----(  END  )-----

                    //-----[ DATA ]-----( START )-----
                    [
                        'recordID' => 303000000000005,
                        'entities' => [
                            "documentDateTimeTZ" => '2026-11-12',
                            "type" => 'WAREHOUSE',
                            "additionalData" => [
                                "itemList" => [
                                    "items" => [
                                        [
                                            "recordID" => 316000000000001,
                                            "entities" => [
                                                "qtyGood" => 1.00,
                                                "qtyReject" => 1.00,
                                                "quantityUnit_RefID" => 73000000000001,
                                                "product_RefID" => 88000000000002,
                                                "remarks" => 'Catatan Pertama',
                                                "warehouse_RefID" => 173000000000001
                                            ]
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ]
                    //-----[ DATA ]-----(  END  )-----
                );

            return $varData;
        }
    }
}