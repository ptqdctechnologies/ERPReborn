<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Helpers                                                                                                   |
| ▪ Name Space : \App\Helpers\ZhtHelper\General                                                                                    |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2020 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Helpers\ZhtHelper\General
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : Helper_LDAP                                                                                                  |
    | ▪ Description : Menangani LDAP                                                                                               |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class Helper_LDAP
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | Class Properties                                                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        private static $varNameSpace;


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-07-28                                                                                           |
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
        | ▪ Last Update     : 2020-07-28                                                                                           |
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
        | ▪ Method Name     : init                                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-07-28                                                                                           |
        | ▪ Description     : Inisialisasi                                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function init()
            {
            self::$varNameSpace=get_class();
            }

        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getUserPrincipalNameFromSAMAccountName                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-07-28                                                                                           |
        | ▪ Description     : Mendapatkan User Principal Name dari SAM Account Name                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varBaseDN ► LDAP Base Domain Name                                                                        |
        |      ▪ (string) varSAMAccountName ► LDAP SAM Account Name                                                                |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        private static function getUserPrincipalNameFromSAMAccountName($varUserSession, $varBaseDN, $varSAMAccountName)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, false, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Get User Principal Name from SAM AccountName `'.$varSAMAccountName.'`');
                try {
                    $varReturn = $varSAMAccountName.'@'.strtoupper(str_replace(',', '.', str_replace('dc=', '', strtolower($varBaseDN))));
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Success');
                    } 
                catch (\Exception $ex) {
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Failed, '. $ex->getMessage());
                    }
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
                } 
            catch (\Exception $ex) {
                }
            return \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getAuthenticationBySAMAccountName                                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-07-28                                                                                           |
        | ▪ Description     : Mendapatkan otentikasi LDAP berdasarkan SAM Account Name (varSAMAccountName)                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varLDAPHost ► Alamat IP Server LDAP                                                                      |
        |      ▪ (string) varLDAPPort ► Port Server LDAP                                                                           |
        |      ▪ (string) varBaseDN ► LDAP Base Domain Name                                                                        |
        |      ▪ (string) varSAMAccountName ► LDAP SAM Account Name                                                                |
        |      ▪ (string) varPassword ► Password                                                                                   |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getAuthenticationBySAMAccountName($varUserSession, $varLDAPHost, int $varLDAPPort, $varBaseDN, $varSAMAccountName, $varPassword=null)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, false, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Get authentication by SAM Account Name `'.$varSAMAccountName.'` with password `'.$varPassword.'`');
                try {
                    \Illuminate\Support\Facades\Log::info('[Helper_LDAP.bind] attempt', [
                        'host'   => $varLDAPHost,
                        'port'   => $varLDAPPort,
                        'baseDN' => $varBaseDN,
                        'sAMAccountName' => $varSAMAccountName,
                    ]);

                    $ObjLDAPConnection = ldap_connect($varLDAPHost, $varLDAPPort);
                    if (!$ObjLDAPConnection)
                        {
                        \Illuminate\Support\Facades\Log::warning('[Helper_LDAP.bind] ldap_connect returned false');
                        throw new \Exception("Connection Failed");
                        }
                    else
                        {
                        // [PROFILER] Fail fast — without this, ldap_bind() blocks for the OS TCP
                        // connect timeout (~60s) when the LDAP host is unreachable, making the
                        // whole login endpoint appear to hang. 5s is enough for any healthy LAN DC.
                        ldap_set_option($ObjLDAPConnection, LDAP_OPT_NETWORK_TIMEOUT, 5);
                        // AD typically requires v3 + no referral chasing; make it explicit.
                        ldap_set_option($ObjLDAPConnection, LDAP_OPT_PROTOCOL_VERSION, 3);
                        ldap_set_option($ObjLDAPConnection, LDAP_OPT_REFERRALS, 0);

                        $varUserPrincipalName =
                            self::getUserPrincipalNameFromSAMAccountName(
                                $varUserSession,
                                $varBaseDN,
                                $varSAMAccountName
                                );
                        \Illuminate\Support\Facades\Log::info('[Helper_LDAP.bind] constructed UPN', [
                            'userPrincipalName' => $varUserPrincipalName,
                        ]);

                        $varBindStart = microtime(true);
                        $ObjLDAPBind = @ldap_bind($ObjLDAPConnection, $varUserPrincipalName, $varPassword);
                        $varBindMs = round((microtime(true) - $varBindStart) * 1000, 1);

                        if (!$ObjLDAPBind)
                            {
                            // Capture the concrete LDAP error so we can tell apart
                            // "user not found", "bad credentials", "server down", etc.
                            \Illuminate\Support\Facades\Log::warning('[Helper_LDAP.bind] BIND FAILED', [
                                'host'              => $varLDAPHost,
                                'port'              => $varLDAPPort,
                                'userPrincipalName' => $varUserPrincipalName,
                                'ldap_errno'        => @ldap_errno($ObjLDAPConnection),
                                'ldap_error'        => @ldap_error($ObjLDAPConnection),
                                'bind_elapsed_ms'   => $varBindMs,
                            ]);
                            throw new \Exception("LDAP Bind Failed");
                            }
                        else
                            {
                            \Illuminate\Support\Facades\Log::info('[Helper_LDAP.bind] BIND OK', [
                                'bind_elapsed_ms' => $varBindMs,
                            ]);
                            unset($ObjLDAPBind);
                            $varReturn = true;
                            }
                        }
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Success');
                    }

                catch (\Throwable $ex) {
                    \Illuminate\Support\Facades\Log::warning('[Helper_LDAP.bind] throwable', [
                        'class'   => get_class($ex),
                        'message' => $ex->getMessage(),
                        'file'    => $ex->getFile(),
                        'line'    => $ex->getLine(),
                    ]);
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Failed, '. $ex->getMessage());
                    }
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
                }

            catch (\Exception $ex) {
                }

            return \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }
        }
    }