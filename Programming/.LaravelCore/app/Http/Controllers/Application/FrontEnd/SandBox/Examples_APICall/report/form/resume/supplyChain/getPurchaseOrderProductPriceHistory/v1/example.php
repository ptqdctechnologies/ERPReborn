<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\report\form\resume\supplyChain               |
|                 \getPurchaseOrderProductPriceHistory\v1                                                                          |
| ▪ API Key     : report.form.resume.supplyChain.getPurchaseOrderProductPriceHistory                                               |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2025 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\report\form\resume\supplyChain\getPurchaseOrderProductPriceHistory\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/                                                                                    |
        |                     report.form.resume.supplyChain.getPurchaseOrderProductPriceHistory.v1_throughAPIGateway              |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       report.form.resume.supplyChain.getPurchaseOrderProductPriceHistory.v1_throughAPIGateway            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-07-04                                                                                           |
        | ▪ Creation Date   : 2025-07-04                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function throughAPIGateway($varAPIWebToken)
            {
            //---Parameter Set---
            if (!$varAPIWebToken) {
                $varAPIWebToken = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
                }

            //---Core---
            $varData =
                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                    //-----[ METADATA ]-----( START )-----
                        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                        $varAPIWebToken, 
                        'report.form.resume.supplyChain.getPurchaseRequisitionToPurchaseOrder', 
                        'latest',
                    //-----[ METADATA ]-----(  END  )-----

                    //-----[ DATA ]-----( START )-----
                        [
                        'parameter' => [
                            'combinedBudget_RefID' => 46000000000033,
                            'combinedBudgetSection_RefID' => null             
                            ],
                        'SQLStatement' => [
                            'pick' => null,
                            'sort' => null,
                            'filter' => null,
                            'paging' => null
                            ]
                        ]
                    //-----[ DATA ]-----(  END  )-----
                    );

            //-----[ DATA RETURN ]--------------------------------------------------------------------------------------------------
            return
                $varData;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/                                                                                    |
        |                     report.form.resume.supplyChain.getPurchaseOrderProductPriceHistory.v1_throughAPIGatewayJQuery        |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       report.form.resume.supplyChain.getPurchaseOrderProductPriceHistory.v1_throughAPIGatewayJQuery      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-09-20                                                                                           |
        | ▪ Creation Date   : 2022-09-20                                                                                           |
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
            echo    '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">Combined Budget Section Segmented Detail Resume Form Data</p></td></tr>';
            echo        '<tr><td>Product_RefID</td><td><input type="text" id="dataInput_Product_RefID" value="88000000000003"></td></tr>';
            echo '</table><br>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'report.form.resume.supplyChain.getPurchaseRequisitionToPurchaseOrder', 
                'latest', 
                '{'.
                    '"parameter" : {'.
                        '"product_RefID" : parseInt(document.getElementById("dataInput_Product_RefID").value) '.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";
            dd($varJQueryFunction);
            }
        }
    }