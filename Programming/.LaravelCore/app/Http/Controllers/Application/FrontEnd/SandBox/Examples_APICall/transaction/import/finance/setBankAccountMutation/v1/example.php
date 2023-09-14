<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\import\finance                   |
|                 \setBankAccountMutation\v1                                                                                       |
| ▪ API Key     : transaction.import.finance.setBankAccountMutation                                                                |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2023 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\import\finance\setBankAccountMutation\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.import.finance.setBankAccountMutation.v1_throughAPIGateway              |
        |                     ► http://172.28.0.4/transaction.crimporteate.finance.setBankAccountMutation.v1_throughAPIGateway     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-09-03                                                                                           |
        | ▪ Creation Date   : 2023-09-03                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function throughAPIGateway($varAPIWebToken)
            {
            //---Parameter Set---
            if (!$varAPIWebToken) {
                $varAPIWebToken = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
                }
            //---Core---
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.import.finance.setBankAccountMutation.v1_throughAPIGatewayJQuery        |
        |                     ► http://172.28.0.4/transaction.import.finance.setBankAccountMutation.v1_throughAPIGatewayJQuery     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-09-03                                                                                           |
        | ▪ Creation Date   : 2023-09-03                                                                                           |
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
            $varFileUpload_UniqueID = 'FileContentRead';
            echo '<br>Log FileUpload Pointer RefID ► '.
                '<textarea id="dataInput_Log_FileContent" name="dataInput_Log_FileContent" rows="14" cols="50"); "></textarea>'.
                '<input type="file" id="dataInput_Log_FileContent_Action" multiple="multiple" '.
                    'onChange="javascript:'.
                    \App\Helpers\ZhtHelper\General\Helper_JavaScript::getSyntaxFunc_DOMInputFileContentRead(
                        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                        $varAPIWebToken,
                        $varFileUpload_UniqueID,
                        'dataInput_Log_FileContent'
                        ).
                    //'; alert(\'DONE : \' + varReturn);'.
                    '" />';
            }
        }
    }