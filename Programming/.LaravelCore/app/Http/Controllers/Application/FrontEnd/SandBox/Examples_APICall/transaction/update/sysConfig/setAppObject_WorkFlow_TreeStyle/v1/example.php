<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\sysConfig                 |
|                 \setAppObject_WorkFlow_TreeStyle\v1                                                                              |
| ▪ API Key     : transaction.update.sysConfig.setAppObject_WorkFlow_TreeStyle                                                     |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2026 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\sysConfig\setAppObject_WorkFlow_TreeStyle\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.update.sysConfig.setAppObject_WorkFlow_TreeStyle.v1_throughAPIGateway   |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       transaction.update.sysConfig.setAppObject_WorkFlow_TreeStyle.v1_throughAPIGateway                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2026-10-13                                                                                           |
        | ▪ Creation Date   : 2026-10-13                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function throughAPIGateway($varAPIWebToken)
            {
            //-----[ PARAMETER SET ]------------------------------------------------------------------------------------------------
            if (!$varAPIWebToken) {
                $varAPIWebToken = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
                }

            //-----[ CORE PROCESS ]-------------------------------------------------------------------------------------------------
            $varData =
                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                    //-----[ METADATA ]-------------------------------------------------( START )-----
                        $varAPIWebToken, 
                        'transaction.update.sysConfig.setAppObject_WorkFlow_TreeStyle', 
                        'latest',

                    //-----[ METADATA ]-------------------------------------------------(  END  )-----

                    //-----[ DATA ]-----------------------------------------------------( START )-----
                        [
                        'recordID' => 112000000000028,
                        'entities' => [
                            "remarks" => null,
                            "JSONDataInitGraph" => 
                                \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONEncode(
                                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),

                                    [
                                        [
                                            164000000000253,
                                            164000000000528
                                        ],
                                        [
                                            164000000000397
                                        ],
                                        [
                                            164000000000349,
                                            164000000000500
                                        ],
                                        [
                                            164000000000017
                                        ]
                                    ]
                                    ),
                            "JSONDataMapper" => 
                                \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONEncode(
                                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),

                                    [
                                        [
                                        'businessDocumentType_RefID' => 77000000000005,
					'combinedBudget_RefID' => 103000000000001
                                        ]
                                    ]
                                    )
                            ]
                        ]
                    //-----[ DATA ]-----------------------------------------------------(  END  )-----
                    );

            //-----[ DATA RETURN ]--------------------------------------------------------------------------------------------------
            return
                $varData;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/                                                                                    |
        |                     transaction.update.sysConfig.setAppObject_WorkFlow_TreeStyle.v1_throughAPIGatewayJQuery              |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       transaction.update.sysConfig.setAppObject_WorkFlow_TreeStyle.v1_throughAPIGatewayJQuery            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2026-10-13                                                                                           |
        | ▪ Creation Date   : 2026-10-13                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function throughAPIGatewayJQuery($varAPIWebToken)
            {
            //---Parameter Set---
            if (!$varAPIWebToken) {
                $varAPIWebToken = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
                }
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=112000000000001>';
            echo '<input type="text" id="dataInput_Name" value="Name Update">';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.update.sysConfig.setAppObject_WorkFlow_TreeStyle', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value), '.
                    '"entities" : {'.
                        '"name" : document.getElementById("dataInput_Name").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";
            dd($varJQueryFunction);
            }
        }
    }