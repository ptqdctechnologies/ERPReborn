<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\create\supplyChain               |
|                 \setStockOpname\v1                                                                                       |
| ▪ API Key     : transaction.create.supplyChain.setStockOpname                                                            |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2026 Wisnu (wisnu.wirayuda01@gmail.com)                                                                              |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\create\supplyChain\setStockOpname\v1 {
    class example extends \App\Http\Controllers\Controller
    {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.create.supplyChain.setStockOpname.v1_throughAPIGateway          |
        |                     ► http://172.28.0.4/transaction.create.supplyChain.setStockOpname.v1_throughAPIGateway       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2026-11-10                                                                                           |
        | ▪ Creation Date   : 2026-11-10                                                                                           |
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
                    'transaction.create.supplyChain.setStockOpname',
                    'latest',
                    //-----[ METADATA ]-----(  END  )-----

                    //-----[ DATA ]-----( START )-----
                    [
                        'entities' => [
                            "documentDateTimeTZ" => '2026-11-12',
                            "type" => 'WAREHOUSE',
                            "additionalData" => [
                                "itemList" => [
                                    "items" => [
                                        [
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