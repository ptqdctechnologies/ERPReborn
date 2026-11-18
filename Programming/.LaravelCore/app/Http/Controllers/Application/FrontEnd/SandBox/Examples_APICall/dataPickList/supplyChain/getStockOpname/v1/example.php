<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\dataPickList\supplyChain\getStockOpname\v1     |
| ▪ API Key     : dataPickList.supplyChain.getStockOpname                                                                            |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2026 Wisnu (wisnu.wirayuda01@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\dataPickList\supplyChain\getStockOpname\v1 {
    class example extends \App\Http\Controllers\Controller
    {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/dataPickList.supplyChain.getStockOpname.v1_throughAPIGateway                          |
        |                     ► http://172.28.0.4/dataPickList.supplyChain.getStockOpname.v1_throughAPIGateway                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2026-11-18                                                                                           |
        | ▪ Creation Date   : 2026-11-18                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function throughAPIGateway($varAPIWebToken)
        {
            //-----[ PARAMETER SET ]-----
            if (!$varAPIWebToken) {
                $varAPIWebToken = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
            }

            //-----[ CORE ]-----
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'dataPickList.supplyChain.getStockOpname',
                'latest',
                [
                    'parameter' => [
                        'pagination' => [
                            'pageSize' => 10,
                            'pageShow' => 1
                        ],
                        'dataFilter' => [
                            'businessDocumentNumber' => null
                        ]
                    ]
                ]
            );

            return
                $varData;
        }
    }
}