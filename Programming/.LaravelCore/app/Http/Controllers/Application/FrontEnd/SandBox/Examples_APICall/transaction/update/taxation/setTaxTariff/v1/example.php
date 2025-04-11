<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\taxation\setTaxTariff\v1  |
| ▪ API Key     : transaction.update.taxation.setTaxTariff                                                                         |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2022 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\taxation\setTaxTariff\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.update.taxation.setTaxTariff.v1_throughAPIGateway                       |
        |                     ► http://172.28.0.4/transaction.update.taxation.setTaxTariff.v1_throughAPIGateway                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-07-21                                                                                           |
        | ▪ Creation Date   : 2022-07-21                                                                                           |
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
                        'transaction.update.taxation.setTaxTariff', 
                        'latest',
                    //-----[ METADATA ]-----(  END  )-----

                    //-----[ DATA ]-----( START )-----
                        [
                        'recordID' => 183000000000001,
                        'entities' => [
                            "taxType_RefID" => 182000000000001,
                            "validStartDateTimeTZ" => '1970-01-01 00:00:00+07',
                            "validFinishDateTimeTZ" => '9999-12-31 23:59:59+07',
                            "tariffMinimumRate" => 0.10,
                            "tariffMaximumRate" => 0.10 ,
                            "roundUnit" => 1000,
                            "signRoundUp" => TRUE
                            ]
                        ]
                    //-----[ DATA ]-----(  END  )-----
                    );

            var_dump($varData);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.update.taxation.setTaxTariff.v1_throughAPIGatewayJQuery                 |
        |                     ► http://172.28.0.4/transaction.update.taxation.setTaxTariff.v1_throughAPIGatewayJQuery              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-07-21                                                                                           |
        | ▪ Creation Date   : 2022-07-21                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function throughAPIGatewayJQuery($varAPIWebToken)
            {
            //---Parameter Set---
            if (!$varAPIWebToken) {
                $varAPIWebToken =
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getAPIWebToken_System();
                }

            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());

            echo '<table border="1" style="border-collapse: collapse;">';
            echo    '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">Tax Tariff Main Data</p></td></tr>';
            echo        '<tr><td>RecordID</td><td><input type="text" id="dataInput_RecordID" value=183000000000001></td></tr>';
            echo        '<tr><td>TaxType_RefID</td><td><input type="text" id="dataInput_TaxType_RefID" value=182000000000001></td></tr>';
            echo        '<tr><td>ValidStartDateTimeTZ</td><td><input type="text" id="dataInput_ValidStartDateTimeTZ" value="1970-01-01 00:00:00+07"></td></tr>';
            echo        '<tr><td>ValidFinishDateTimeTZ</td><td><input type="text" id="dataInput_ValidFinishDateTimeTZ" value="9999-12-31 23:59:59+07"></td></tr>';
            echo        '<tr><td>TariffMinimumRate</td><td><input type="text" id="dataInput_TariffMinimumRate" value=0.10></td></tr>';
            echo        '<tr><td>TariffMaximumRate</td><td><input type="text" id="dataInput_TariffMaximumRate" value=0.10></td></tr>';
            echo        '<tr><td>RoundUnit1</td><td><input type="text" id="dataInput_RoundUnit" value=1000></td></tr>';
            echo        '<tr><td>SignRoundUp</td><td><input type="text" id="dataInput_SignRoundUp" value="true"></td></tr>';
            echo '</table><br>';

            $varJQueryFunction =
                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                    //-----[ METADATA ]-----( START )-----
                        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                        $varAPIWebToken, 
                        'transaction.update.taxation.setTaxTariff', 
                        'latest',
                    //-----[ METADATA ]-----(  END  )-----

                    //-----[ DATA ]-----( START )-----
                        '{'.
                        '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value), '.
                        '"entities" : {'.
                            '"taxType_RefID" : parseInt(document.getElementById("dataInput_TaxType_RefID").value), '.
                            '"validStartDateTimeTZ" : document.getElementById("dataInput_ValidStartDateTimeTZ").value, '.
                            '"validFinishDateTimeTZ" : document.getElementById("dataInput_ValidFinishDateTimeTZ").value, '.
                            '"tariffMinimumRate" : parseFloat(document.getElementById("dataInput_TariffMinimumRate").value), '.
                            '"tariffMaximumRate" : parseFloat(document.getElementById("dataInput_TariffMaximumRate").value), '.
                            '"roundUnit" : parseFloat(document.getElementById("dataInput_RoundUnit").value), '.
                            '"signRoundUp" : (document.getElementById("dataInput_SignRoundUp").value.toLowerCase() === "true")'.
                            '}'.
                        '}'
                    //-----[ DATA ]-----(  END  )-----
                    ); 

            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";

            dd($varJQueryFunction);
            }
        }
    }