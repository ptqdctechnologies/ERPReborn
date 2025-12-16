<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : API Engine Controller                                                                                             |
| ▪ Name Space : App\Http\Controllers\Application\BackEnd\System\Notification\Engines\webDisplayPage\getPHPInformation\v1          |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2025 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/

namespace App\Http\Controllers\Application\BackEnd\System\Notification\Engines\webDisplayPage\getPHPInformation\v1
    {
    use Illuminate\Http\Request;

    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : getPHPInformation                                                                                            |
    | ▪ Description : Menangani API notification.webDisplayPage.getPHPInformation Version 1                                        |
    +------------------------------------------------------------------------------------------------------------------------------+
    */  
    class getPHPInformation extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-12-09                                                                                           |
        | ▪ Creation Date   : 2025-12-09                                                                                           |
        | ▪ Description     : System's Default Constructor                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        function __construct()
            {
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : main                                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-12-09                                                                                           |
        | ▪ Creation Date   : 2025-12-09                                                                                           |
        | ▪ Description     : Fungsi Utama Engine                                                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (array)  varData ► Data                                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        function main()
//        function main($varUserSession, $varData)
            {
            /*
            try {
                //-----[ MAIN CODE ]----------------------------------------------------------------------------( START POINT )-----
                echo phpinfo();
                //-----[ MAIN CODE ]----------------------------------------------------------------------------(  END POINT  )-----                
                }
            catch (\Exception $ex) {
                }
*/
            //return
            //    "Hello from MyController!";
            
            //echo $_SERVER['FRANKENPHP_WORKER'];
/*
if (isset($_SERVER['FRANKENPHP_WORKER'])) {
    echo " (Mode Worker)";
} else {
    echo " (Mode Klasik)";
}
*/
//echo \App\Http\Helpers\ZhtHelper\General\Utilities\Helper_EncodeDecode::getBase64Encode(11, 'abcdef');
//echo \App\Http\Helpers\ZhtHelper\General\Utilities\Helper_Network::getCurrentProtocol(11);

            $varUserSession = 11;
            
            /*
            // LDAP
            $varUserName = 'teguh.pratama';
            $varUserPassword = 'teguhpratama1234';
            if (
               \App\Http\Helpers\ZhtHelper\BackEnd\DirectoryService\Helper_ActiveDirectory::getAuthenticationBySAMAccountName(
                    $varUserSession,
                    \App\Http\Helpers\ZhtHelper\General\System\Helper_Environment::getBackEndConfigEnvironment(
                        $varUserSession,
                        'LDAP_HOST'
                        ),
                    \App\Http\Helpers\ZhtHelper\General\System\Helper_Environment::getBackEndConfigEnvironment(
                        $varUserSession,
                        'LDAP_PORT'
                        ),
                    \App\Http\Helpers\ZhtHelper\General\System\Helper_Environment::getBackEndConfigEnvironment(
                        $varUserSession,
                        'LDAP_BASEDN'
                        ),
                    $varUserName,
                    $varUserPassword
                    ) == true
                ) {
                $varSignLoginSuccess = true;
                }
            echo $varSignLoginSuccess;
            */
            
            /*
            // DATABASE
            $x = \App\Http\Helpers\ZhtHelper\BackEnd\Database\Helper_PostgreSQL::getQueryExecution(
                $varUserSession,
                'SELECT NOW();'    
                );
            var_dump($x);
            */

            return
                phpinfo();
            }
        }
    }
