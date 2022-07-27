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
                $varAPIWebToken = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
                }
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.update.taxation.setTaxTariff', 
                'latest', 
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
                $varAPIWebToken = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
                }
            //---Core---
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2NTgzNzAzMzF9.i8rJMM1FI5Tb_e2YolL673V6wpFa1CQW6bKqprdMJrE';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=183000000000001>';
            echo '<input type="text" id="dataInput_TaxType_RefID" value=182000000000001>';
            echo '<input type="text" id="dataInput_ValidStartDateTimeTZ" value="1970-01-01 00:00:00+07">';
            echo '<input type="text" id="dataInput_ValidFinishDateTimeTZ" value="9999-12-31 23:59:59+07">';
            echo '<input type="text" id="dataInput_TariffMinimumRate" value=0.10>';
            echo '<input type="text" id="dataInput_TariffMaximumRate" value=0.10>';
            echo '<input type="text" id="dataInput_RoundUnit" value=1000>';
            echo '<input type="text" id="dataInput_SignRoundUp" value="true">';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.update.taxation.setTaxTariff', 
                'latest', 
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
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";
            dd($varJQueryFunction);
            }
        }
    }