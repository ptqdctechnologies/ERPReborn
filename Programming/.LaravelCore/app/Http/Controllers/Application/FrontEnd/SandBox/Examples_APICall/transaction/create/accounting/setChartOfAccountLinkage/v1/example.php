<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\create\accounting                |
|                 \setChartOfAccountLinkage\v1                                                                                     |
| ▪ API Key     : transaction.create.accounting.setChartOfAccountLinkage                                                           |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2024 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\create\accounting\setChartOfAccountLinkage\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.create.accounting.setChartOfAccountLinkage.v1_throughAPIGateway         |
        |                     ► http://172.28.0.4/transaction.create.accounting.setChartOfAccountLinkage.v1_throughAPIGateway      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-05-03                                                                                           |
        | ▪ Creation Date   : 2024-05-03                                                                                           |
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
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                    $varAPIWebToken, 
                    'transaction.create.accounting.setChartOfAccountLinkage', 
                    'latest', 
                    [
                    'entities' => [
                        'chartOfAccount_RefID' => 65000000000005,
                        'linkage_RefID' => null,
                        'code' => '1-1101.01.000001',
                        'name' => 'Others',
                        'fullName' => 'Aset ► Aset Lancar ► Cash & Bank ► Petty Cash ► Petty Cash (IDR) ► Others',
                        'currency_RefID' => 62000000000001,
                        'validStartDateTimeTZ' => '2016-01-01 00:00:00',
                        'validFinishDateTimeTZ' => null,
                        'signOtherThing' => true
                        ]
                    ]
                    );
            var_dump($varData);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.create.accounting.setChartOfAccountLinkage.v1_throughAPIGatewayJQuery   |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       transaction.create.accounting.setChartOfAccountLinkage.v1_throughAPIGatewayJQuery                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-05-03                                                                                           |
        | ▪ Creation Date   : 2024-05-03                                                                                           |
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
            echo    '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">Chart Of Account Main Data</p></td></tr>';
            echo        '<tr><td>ChartOfAccount_RefID</td><td><input type="text" id="dataInput_ChartOfAccount_RefID" value="65000000000005"></td></tr>';
            echo        '<tr><td>Linkage_RefID</td><td><input type="text" id="dataInput_Linkage_RefID" value=""></td></tr>';
            echo        '<tr><td>Code</td><td><input type="text" id="dataInput_Code" value="1-0000"></td></tr>';
            echo        '<tr><td>Name</td><td><input type="text" id="dataInput_Name" value="Assets"></td></tr>';
            echo        '<tr><td>FullName</td><td><input type="text" id="dataInput_FullName" value="Aset ► Aset Lancar ► Cash & Bank ► Petty Cash ► Petty Cash (IDR) ► Others"></td></tr>';
            echo        '<tr><td>Currency_RefID</td><td><input type="text" id="dataInput_Currency_RefID" value="62000000000001"></td></tr>';
            echo        '<tr><td>ValidStartDateTimeTZ</td><td><input type="text" id="dataInput_validStartDateTimeTZ" value="2016-01-01 00:00:00"></td></tr>';
            echo        '<tr><td>ValidFinishDateTimeTZ</td><td><input type="text" id="dataInput_validFinishDateTimeTZ" value="9999-12-31 23:59:59"></td></tr>';
            echo        '<tr><td>SignOtherThing</td><td><input type="text" id="dataInput_signOtherThing" value="TRUE"></td></tr>';
            echo '</table><br>';
            $varJQueryFunction =
                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                    $varAPIWebToken, 
                    'transaction.create.accounting.setChartOfAccountLinkage', 
                    'latest', 
                    '{'.
                        '"entities" : {'.
                            '"chartOfAccount_RefID" : parseInt(document.getElementById("dataInput_ChartOfAccount_RefID").value), '.
                            '"linkage_RefID" : parseInt(document.getElementById("dataInput_Linkage_RefID").value), '.
                            '"code" : document.getElementById("dataInput_Code").value, '.
                            '"name" : document.getElementById("dataInput_Name").value, '.
                            '"fullName" : document.getElementById("dataInput_FullName").value, '.
                            '"currency_RefID" : parseInt(document.getElementById("dataInput_Currency_RefID").value), '.
                            '"validStartDateTimeTZ" : document.getElementById("dataInput_validStartDateTimeTZ").value, '.
                            '"validFinishDateTimeTZ" : document.getElementById("dataInput_validFinishDateTimeTZ").value, '.
                            '"signOtherThing" : true'.
                            '}'.
                    '}'
                    ); 
//'"signOtherThing" : document.getElementById("dataInput_signOtherThing").value '.
            
            echo "xxx : ". json_encode('"Aset ► Others"');
            
            $varJQueryFunction =
                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                    $varAPIWebToken, 
                    'transaction.create.accounting.setChartOfAccountLinkage', 
                    'latest', 
                    '{'.
                        '"entities" : {'.
                            '"chartOfAccount_RefID" : 65000000000005, '.
                            '"linkage_RefID" : null, '.
                            '"code" : "1-1101.01.000001", '.
                            '"name" : "Others", '.
                            '"fullName" : "Aset ► Others", '.
                            '"signOtherThing" : true'.
                            '}'.
                    '}'
                    ); 

/*
                        ,
                        
                        
                        
                        
                        "currency_RefID" : 62000000000001,
                        "validStartDateTimeTZ" : "2016-01-01 00:00:00",
                        "validFinishDateTimeTZ" : null, 
                        

 */

//            echo "<button type='button' onclick='javascript:alert(   (\"\\\\\"+escape(\"►\").replace(\"%\",\"\").toLowerCase())      ); var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";
            echo "<button type='button' onclick='javascript:alert(escape(\"a ► b\")); var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";
            dd($varJQueryFunction);
            }
        }
    }