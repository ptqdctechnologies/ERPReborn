<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\report\form\dataPickList\supplyChain         |
|                 \getWarehouse\v1                                                                                                 |
| ▪ API Key     : report.form.dataPickList.supplyChain.getWarehouse                                                                |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2026 Wisnu (wisnu.wirayuda01@gmail.com)                                                                             |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\report\form\dataPickList\supplyChain\getWarehouse\v1 {
    use App\Http\Controllers\Controller;
    use App\Helpers\ZhtHelper\System\Helper_Environment;
    use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
    class example extends Controller
    {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/report.form.dataPickList.supplyChain.getWarehouse.v1_throughAPIGateway               |
        |                     ► http://172.28.0.4/report.form.dataPickList.supplyChain.getWarehouse.v1_throughAPIGateway            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2026-08-12                                                                                           |
        | ▪ Creation Date   : 2026-08-12                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function throughAPIGateway($varAPIWebToken)
        {
            //-----[ PARAMETER SET ]-----
            if (!$varAPIWebToken) {
                $varAPIWebToken =
                    Helper_Environment::getUserSessionID_System();
            }

            //-----[ CORE ]-----
            $varData =
                Helper_APICall::setCallAPIGateway(
                    //-----[ METADATA ]-----( START )-----
                    Helper_Environment::getUserSessionID_System(),
                    $varAPIWebToken,
                    'report.form.dataPickList.supplyChain.getWarehouse',
                    'latest',
                    //-----[ METADATA ]-----(  END  )-----

                    //-----[ DATA ]---------( START )-----
                    [
                        'parameter' => [
                            'pagination' => [
                                'pageSize' => 10,
                                'pageShow' => 1
                            ],
                            'dataFilter' => [
                                'name' => NULL,
                                'code' => NULL,
                                'warehouseType_RefID' => NULL
                            ],
                        ]
                    ]
                    //-----[ DATA ]---------(  END  )-----
                );

            //-----[ DATA RETURN ]-----
            return
                $varData;
        }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/report.form.dataPickList.supplyChain.getWarehouse.v1_throughAPIGatewayJQuery        |
        |                     ► http://172.28.0.4/report.form.dataPickList.supplyChain.getWarehouse.v1_throughAPIGatewayJQuery     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2026-08-12                                                                                           |
        | ▪ Creation Date   : 2026-08-12                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function throughAPIGatewayJQuery($varAPIWebToken)
        {
        }
    }
}