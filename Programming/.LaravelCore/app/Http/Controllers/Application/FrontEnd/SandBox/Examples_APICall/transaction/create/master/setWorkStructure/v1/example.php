<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\create\master                    |
|                 \setWorkStructure\v1                                                                                          |
| ▪ API Key     : transaction.create.master.setWorkStructure                                                                    |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2026 Wisnu (wisnu.wirayuda01@gmail.com)                                                                               |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\create\master\setWorkStructure\v1 {
    use App\Http\Controllers\Controller;
    use App\Helpers\ZhtHelper\System\Helper_Environment;
    use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
    class example extends Controller
    {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.create.master.setWorkStructure.v1_throughAPIGateway                  |
        |                     ► http://172.28.0.4/transaction.create.master.setWorkStructure.v1_throughAPIGateway               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2026-08-04                                                                                           |
        | ▪ Creation Date   : 2026-08-04                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function throughAPIGateway($varAPIWebToken)
        {
            //---Parameter Set---
            if (!$varAPIWebToken) {
                $varAPIWebToken = Helper_Environment::getUserSessionID_System();
            }
            //---Core---
            $varData = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'transaction.create.master.setWorkStructure',
                'latest',
                [
                    'entities' => [
                        "code" => 'W-07',
                        "name" => 'Pondasi'
                    ]
                ]
            );
            return $varData;
        }

        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.create.master.setWorkStructure.v1_throughAPIGatewayJQuery            |
        |                     ► http://172.28.0.4/transaction.create.master.setWorkStructure.v1_throughAPIGatewayJQuery         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2026-08-04                                                                                           |
        | ▪ Creation Date   : 2026-08-04                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        */

        public function throughAPIGatewayJQuery($varAPIWebToken)
        {
            // Code Here
        }
    }
}