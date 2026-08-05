<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\report\form\dataPickList\master\getWorkStructure      |
|                 \v1                                                                                                              |
| ▪ API Key     : report.form.dataPickList.master.getWorkStructure                                                                          |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2026 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\report\form\dataPickList\master\getWorkStructure\v1 {
    class example extends \App\Http\Controllers\Controller
    {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/report.form.dataPickList.master.getWorkStructure.v1_throughAPIGateway                        |
        |                     ► http://172.28.0.4/report.form.dataPickList.master.getWorkStructure.v1_throughAPIGateway                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2026-08-05                                                                                           |
        | ▪ Creation Date   : 2026-08-05                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function throughAPIGateway($varAPIWebToken)
        {
            //-----[ PARAMETER SET ]-----
            if (!$varAPIWebToken) {
                $varAPIWebToken =
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
            }

            //-----[ CORE ]-----
            $varData =
                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                    //-----[ METADATA ]-----( START )-----
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                    $varAPIWebToken,
                    'report.form.dataPickList.master.getWorkStructure',
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
                                'code' => NULL
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
        | ▪ Call URL        : http(s)://<HOST>/report.form.dataPickList.master.getWorkStructure.v1_throughAPIGatewayJQuery         |
        |                     ► http://172.28.0.4/report.form.dataPickList.master.getWorkStructure.v1_throughAPIGatewayJQuery      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2026-08-05                                                                                           |
        | ▪ Creation Date   : 2026-08-05                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function throughAPIGatewayJQuery($varAPIWebToken)
        {
        }
    }
}