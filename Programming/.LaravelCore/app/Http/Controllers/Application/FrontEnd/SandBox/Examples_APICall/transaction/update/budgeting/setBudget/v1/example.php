<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\budgeting\setBudget\v1    |
| ▪ API Key     : transaction.update.budgeting.setBudget                                                                           |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2023 - 2025 Zheta (teguhpjs@gmail.com)                                                                              |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\budgeting\setBudget\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.update.budgeting.setBudget.v1_throughAPIGateway                         |
        |                     ► http://172.28.0.4/transaction.update.budgeting.setBudget.v1_throughAPIGateway                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0001.0000000                                                                                       |
        | ▪ Last Update     : 2025-02-19                                                                                           |
        | ▪ Creation Date   : 2023-05-05                                                                                           |
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
                    //-----[ HEADER ]-----( START )-----
                        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                        $varAPIWebToken,
                        'transaction.update.budgeting.setBudget',
                        'latest',
                    //-----[ HEADER ]-----( END )-----

                    //-----[ BODY ]-----( START )-----
                        [
                        'recordID' => 103000000000001,
                        'entities' => [
                            "documentDateTimeTZ" => '2020-01-01',
                            "log_FileUpload_Pointer_RefID" => null,
                            "requesterWorkerJobsPosition_RefID" => 164000000000497,
                            'name' => 'Budget Non Project 2020',
                            'validStartDateTimeTZ' => '2020-01-01 00:00:00 +07',
                            'validFinishDateTimeTZ' => '2020-12-31 23:59:59 +07',
                            'code' => 'My Code',
                            ]
                        ]
                    //-----[ BODY ]-----( END )-----
                    );

            var_dump($varData);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.update.budgeting.setBudget.v1_throughAPIGatewayJQuery                   |
        |                     ► http://172.28.0.4/transaction.update.budgeting.setBudget.v1_throughAPIGatewayJQuery                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0001.0000000                                                                                       |
        | ▪ Last Update     : 2025-02-19                                                                                           |
        | ▪ Creation Date   : 2023-05-05                                                                                           |
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
            echo    '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">Budget Main Data</p></td></tr>';
            echo        '<tr><td>RecordID</td><td><input type="text" id="dataInput_RecordID" value=103000000000001></td></tr>';
            echo        '<tr><td>DocumentDateTimeTZ</td><td><input type="text" id="dataInput_DocumentDateTimeTZ" value="2023-03-25"></td></tr>';
            echo        '<tr><td>Log_FileUpload_Pointer_RefID</td><td><input type="text" id="dataInput_Log_FileUpload_Pointer_RefID" value=91000000000001></td></tr>';
            echo        '<tr><td>RequesterWorkerJobsPosition_RefID</td><td><input type="text" id="dataInput_RequesterWorkerJobsPosition_RefID" value=164000000000497></td></tr>';
            echo        '<tr><td>Name</td><td><input type="text" id="dataInput_Name" value="Budget Non Project 2026"></td></tr>';
            echo        '<tr><td>ValidStartDateTimeTZ</td><td><input type="text" id="dataInput_ValidStartDateTimeTZ" value="2026-01-01 00:00:00 +07"></td></tr>';
            echo        '<tr><td>validFinishDateTimeTZ</td><td><input type="text" id="dataInput_validFinishDateTimeTZ" value="2026-12-31 23:59:59 +07"></td></tr>';
            echo        '<tr><td>Code</td><td><input type="text" id="dataInput_Code" value="My Code"></td></tr>';
            echo '</table><br>';

            $varJQueryFunction =
                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                    //-----[ HEADER ]-----( START )-----
                        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                        $varAPIWebToken,
                        'transaction.update.budgeting.setBudget',
                        'latest',
                    //-----[ HEADER ]-----( END )-----

                    //-----[ BODY ]-----( START )-----
                        '{'.
                            '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value), '.
                            '"entities" : {'.
                                '"documentDateTimeTZ" : document.getElementById("dataInput_DocumentDateTimeTZ").value, '.
                                '"log_FileUpload_Pointer_RefID" : parseInt(document.getElementById("dataInput_Log_FileUpload_Pointer_RefID").value), '.
                                '"requesterWorkerJobsPosition_RefID" : parseInt(document.getElementById("dataInput_RequesterWorkerJobsPosition_RefID").value), '.
                                '"name" : document.getElementById("dataInput_Name").value, '.
                                '"validStartDateTimeTZ" : document.getElementById("dataInput_ValidStartDateTimeTZ").value, '.
                                '"validFinishDateTimeTZ" : document.getElementById("dataInput_validFinishDateTimeTZ").value, '.
                                '"code" : document.getElementById("dataInput_Code").value '.
                                '}'.
                        '}'
                    //-----[ BODY ]-----( END )-----
                    ); 

            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";

            dd($varJQueryFunction);
            }
        }
    }