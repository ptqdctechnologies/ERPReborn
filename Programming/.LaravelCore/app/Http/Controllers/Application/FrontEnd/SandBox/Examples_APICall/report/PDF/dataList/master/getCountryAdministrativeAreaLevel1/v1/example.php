<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\report\PDF\dataList\master                   |
|                 \getCountryAdministrativeAreaLevel1\v1                                                                           |
| ▪ API Key     : report.PDF.dataList.master.getCountryAdministrativeAreaLevel1                                                    |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2022 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\report\PDF\dataList\master\getCountryAdministrativeAreaLevel1\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/report.PDF.dataList.master.getCountryAdministrativeAreaLevel1.v1_throughAPIGateway  |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       report.PDF.dataList.master.getCountryAdministrativeAreaLevel1.v1_throughAPIGateway                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-07-25                                                                                           |
        | ▪ Creation Date   : 2022-07-25                                                                                           |
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
                'report.PDF.dataList.master.getCountryAdministrativeAreaLevel1', 
                'latest', 
                [
                'outputFileName' => 'Data List - Country Administrative Area Level 1.pdf',
                'parameter' => [
                    'country_RefID' => 20000000000078
                    ]
                ]
                );
            var_dump($varData);
            }
        }
    }