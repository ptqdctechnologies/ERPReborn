<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\create\budgeting                 |
|                 \setCombinedBudgetModification\v1                                                                                |
| ▪ API Key     : transaction.create.budgeting.setCombinedBudgetModification                                                       |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2026 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\create\budgeting\setCombinedBudgetModification\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.create.budgeting.setCombinedBudgetModification.v1_throughAPIGateway     |
        |                     ► http://172.28.0.4/transaction.create.budgeting.setCombinedBudgetModification.v1_throughAPIGateway  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0001.0000000                                                                                       |
        | ▪ Last Update     : 2026-11-26                                                                                           |
        | ▪ Creation Date   : 2026-11-26                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function throughAPIGateway($varAPIWebToken)
            {
            //-----[ PARAMETER SET ]-----
            if (!$varAPIWebToken) {
                $varAPIWebToken =
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getAPIWebToken_System();
                }

            //-----[ CORE ]-----
            $varData =
                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                    //-----[ METADATA ]-----( START )-----
                        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                        $varAPIWebToken,
                        'transaction.create.budgeting.setCombinedBudgetModification',
                        'latest',
                    //-----[ METADATA ]-----(  END  )-----

                    //-----[ DATA ]---------( START )-----
                        [
                        'entities' => [
                            "documentDateTimeTZ" => '2022-03-07',
                            "log_FileUpload_Pointer_RefID" => 91000000000001,
                            "requesterWorkerJobsPosition_RefID" => 164000000000497,
                            "JSONData" =>
                                \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONEncode(
                                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                                    [
                                    "recordID" => 46000000000033,
                                    "entities" => [
                                        "itemList" => [
                                                [
                                                "index" => 1,
                                                "recordID" => 143000000000305,
                                                "entities" => [
                                                    "itemList" => [
                                                            [
                                                            "index" => 1,
                                                            "recordID" => 88000000000083,
                                                            "entities" => [
                                                                "quantity" => 1.00,
                                                                "quantityUnit_RefID" => 73000000000009,
                                                                "unitPriceCurrency_RefID" => 62000000000001,
                                                                "unitPriceCurrencyValue" => 1500000.00,
                                                                "unitPriceCurrencyExchangeRate" => 1.00,
                                                                "work_RefID" => 302000000000001
                                                                ]
                                                            ],
                                                            [
                                                            "index" => 2,
                                                            "recordID" => 88000000000302,
                                                            "entities" => [
                                                                "quantity" => 4.00,
                                                                "quantityUnit_RefID" => 73000000000013,
                                                                "unitPriceCurrency_RefID" => 62000000000001,
                                                                "unitPriceCurrencyValue" => 380000.00,
                                                                "unitPriceCurrencyExchangeRate" => 1.00,
                                                                "work_RefID" => 302000000000002
                                                                ]
                                                            ]
                                                        ]
                                                    ]
                                                ],
                                                [
                                                "index" => 2,
                                                "recordID" => 143000000000308,
                                                "entities" => [
                                                    "itemList" => [
                                                            [
                                                            "index" => 1,
                                                            "recordID" => 88000000000083,
                                                            "entities" => [
                                                                "quantity" => 5.00,
                                                                "quantityUnit_RefID" => 73000000000012,
                                                                "unitPriceCurrency_RefID" => 62000000000001,
                                                                "unitPriceCurrencyValue" => 5000000.00,
                                                                "unitPriceCurrencyExchangeRate" => 1.00,
                                                                "work_RefID" => 302000000000003
                                                                ]
                                                            ],
                                                            [
                                                            "index" => 2,
                                                            "recordID" => 88000000000302,
                                                            "entities" => [
                                                                "quantity" => 2.00,
                                                                "quantityUnit_RefID" => 73000000000001,
                                                                "unitPriceCurrency_RefID" => 62000000000001,
                                                                "unitPriceCurrencyValue" => 3100000.00,
                                                                "unitPriceCurrencyExchangeRate" => 1.00,
                                                                "work_RefID" => 302000000000005
                                                                ]
                                                            ]
                                                        ]
                                                    ]
                                                ]
                                            ]
                                        ]
                                    ]
                                    ),
                            "remarks" => 'My Remarks'
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
        | ▪ Call URL        : http(s)://<HOST>/                                                                                    |
        |                     transaction.create.budgeting.setCombinedBudgetModification.v1_throughAPIGatewayJQuery                |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       transaction.create.budgeting.setCombinedBudgetModification.v1_throughAPIGatewayJQuery              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-09-19                                                                                           |
        | ▪ Creation Date   : 2022-09-19                                                                                           |
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
            echo '<table border="1" style="border-collapse: collapse;">';
            echo    '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">Project Main Data</p></td></tr>';
            echo        '<tr><td>Name</td><td><input type="text" id="dataInput_Name" value="Project XYZ"></td></tr>';
            echo        '<tr><td>MaterialProductAssembly_RefID</td><td><input type="text" id="dataInput_MaterialProductAssembly_RefID" value=""></td></tr>';
            echo        '<tr><td>ValidStartDateTimeTZ</td><td><input type="text" id="dataInput_ValidStartDateTimeTZ" value="2009-04-17 00:00:00+07"></td></tr>';
            echo        '<tr><td>ValidFinishDateTimeTZ</td><td><input type="text" id="dataInput_ValidFinishDateTimeTZ" value="9999-12-31 23:59:59+07"></td></tr>';
            echo        '<tr><td>Code</td><td><input type="text" id="dataInput_Code" value="Qxxxxx">';
            echo '</table><br>';
            $varJQueryFunction =
                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                    $varAPIWebToken, 
                    'transaction.create.budgeting.setCombinedBudgetModification', 
                    'latest', 
                    '{'.
                        '"entities" : {'.
                            '"name" : document.getElementById("dataInput_Name").value, '.
                            '"materialProductAssembly_RefID" : parseInt(document.getElementById("dataInput_MaterialProductAssembly_RefID").value), '.
                            '"validStartDateTimeTZ" : document.getElementById("dataInput_ValidStartDateTimeTZ").value, '.
                            '"validFinishDateTimeTZ" : document.getElementById("dataInput_ValidFinishDateTimeTZ").value, '.
                            '"code" : document.getElementById("dataInput_Code").value'.
                            '}'.
                    '}'
                    );             
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";
            dd($varJQueryFunction);
            }
        }
    }