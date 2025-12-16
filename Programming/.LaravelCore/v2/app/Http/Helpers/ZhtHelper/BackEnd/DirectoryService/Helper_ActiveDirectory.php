<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Helpers                                                                                                   |
| ▪ Name Space : \App\Http\Helpers\ZhtHelper\BackEnd\DirectoryService                                                              |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2025 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/

namespace App\Http\Helpers\ZhtHelper\BackEnd\DirectoryService
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : Helper_ActiveDirectory                                                                                       |
    | ▪ Description : Menangani segala hal yang terkait Active Directory                                                           |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class Helper_ActiveDirectory
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.000000                                                                                        |
        | ▪ Last Update     : 2025-12-11                                                                                           |
        | ▪ Creation Date   : 2025-12-11                                                                                           |
        | ▪ Description     : System's Default Constructor                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function __construct()
            {
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __destruct                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-12-11                                                                                           |
        | ▪ Creation Date   : 2025-12-11                                                                                           |
        | ▪ Description     : System's Default Destructor                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function __destruct()
            {
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getUserPrincipalNameFromSAMAccountName                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2025-12-16                                                                                           |
        | ▪ Creation Date   : 2020-07-28                                                                                           |
        | ▪ Description     : Mendapatkan User Principal Name dari SAM Account Name                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varBaseDN ► LDAP Base Domain Name                                                                        |
        |      ▪ (string) varSAMAccountName ► LDAP SAM Account Name                                                                |
        |      ------------------------------                                                                                      |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Linked Function :                                                                                                      |
        |      ▪                                                                                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        private static function getUserPrincipalNameFromSAMAccountName (
            $varUserSession, $varBaseDN, $varSAMAccountName
            )
            {
            //---> Data Initialization
                $varReturn = (string) null;

            //---> Data Process
                try {
                    $varReturn =
                        (
                        $varSAMAccountName.
                        '@'.
                        strtoupper (
                            str_replace (
                                ',',
                                '.',
                                str_replace (
                                    'dc=',
                                    '',
                                    strtolower (
                                        $varBaseDN
                                        )
                                    )
                                )
                            )
                        );
                    }

                catch (\Exception $ex) {
                    }

            //---> Data Return
                return
                    $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getAuthenticationBySAMAccountName                                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2025-12-16                                                                                           |
        | ▪ Creation Date   : 2020-07-28                                                                                           |
        | ▪ Description     : Mendapatkan otentikasi LDAP berdasarkan SAM Account Name (varSAMAccountName)                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varLDAPHost ► Alamat IP Server LDAP                                                                      |
        |      ▪ (int)    varLDAPPort ► Port Server LDAP                                                                           |
        |      ▪ (string) varBaseDN ► LDAP Base Domain Name                                                                        |
        |      ▪ (string) varSAMAccountName ► LDAP SAM Account Name                                                                |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varPassword ► Password                                                                                   |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Linked Function :                                                                                                      |
        |      ▪                                                                                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getAuthenticationBySAMAccountName (
            $varUserSession, string $varLDAPHost, int $varLDAPPort, string $varBaseDN, string $varSAMAccountName,
            string $varPassword = null
            )
            {
            //---> Data Initialization
                $varReturn = (bool) false;

            //---> Data Process
                try {
                    $ObjLDAPConnection =
                        ldap_connect (
                            $varLDAPHost,
                            $varLDAPPort
                            );

                    if (!$ObjLDAPConnection)
                        {
                        throw
                            new \Exception("Active Direcoty Connection Failed");
                        }
                    else
                        {
                        unset ($ObjLDAPBind);

                        $varReturn = true;
                        }
                    }

                catch (\Exception $ex) {
                    }

            //---> Data Return
                return
                    $varReturn;
            }
        }
    }