<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Models                                                                                                    |
| ▪ Name Space : \App\Models\Cache                                                                                                 |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2020 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Models\Cache
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : DefaultClassPrototype                                                                                        |
    | ▪ Description : Menangani Prototype untuk diwariskan ke Class Models Cache                                                   |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class DefaultClassPrototype
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | Class Properties                                                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        private $varKeyHeader;


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Creation Date   : 2020-08-28                                                                                           |
        | ▪ Last Update     : 2020-08-28                                                                                           |
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
        | ▪ Method Name     : init                                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Creation Date   : 2020-08-28                                                                                           |
        | ▪ Last Update     : 2020-08-28                                                                                           |
        | ▪ Description     : Inisialisasi                                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed) varUserSession                                                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        protected function init($varUserSession, string $varClassName)
            {
            $this->varKeyHeader = \App\Helpers\ZhtHelper\System\Helper_Environment::getApplicationID().'::'.(\App\Helpers\ZhtHelper\General\Helper_PHPObject::getClassNameFromNameSpace($varUserSession, $varClassName));
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getAllDataRecord                                                                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Creation Date   : 2020-09-02                                                                                           |
        | ▪ Last Update     : 2020-09-02                                                                                           |
        | ▪ Description     : Mendapatkan seluruh record                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getAllDataRecord($varUserSession)
            {
            $varReturn = \App\Helpers\ZhtHelper\Cache\Helper_Redis::getAllRecord($varUserSession, $this->varKeyHeader);
            return $varReturn['data'];
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataRecord                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Creation Date   : 2020-08-28                                                                                           |
        | ▪ Last Update     : 2020-08-28                                                                                           |
        | ▪ Description     : Mendapatkan nilai dari suatu key (varKey)                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varKey ► Data Key                                                                                        |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataRecord($varUserSession, string $varKey)
            {
            $varReturn = \App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue($varUserSession, $this->varKeyHeader.'::'.$varKey);
            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataTTL                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Creation Date   : 2020-08-28                                                                                           |
        | ▪ Last Update     : 2020-08-28                                                                                           |
        | ▪ Description     : Mendapatkan TTL dari suatu key (varKey)                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varKey ► Data Key                                                                                        |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataTTL($varUserSession, string $varKey)
            {
            $varReturn = \App\Helpers\ZhtHelper\Cache\Helper_Redis::getTTL($varUserSession, $this->varKeyHeader.'::'.$varKey);
            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getKeyHeader                                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Creation Date   : 2020-09-02                                                                                           |
        | ▪ Last Update     : 2020-09-02                                                                                           |
        | ▪ Description     : Mendapatkan KeyHeader                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getKeyHeader($varUserSession)
            {
            $varReturn = $this->varKeyHeader;
            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : isDataExist                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Creation Date   : 2020-08-31                                                                                           |
        | ▪ Last Update     : 2020-08-31                                                                                           |
        | ▪ Description     : Mendapatkan keberadaan dari suatu key (varKey)                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varKey ► Data Key                                                                                        |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function isDataExist($varUserSession, string $varKey)
            {
            $varReturn = FALSE;
            if (strcmp($varKey, \App\Helpers\ZhtHelper\System\Helper_Environment::getAPIWebToken_System()) == 0)
                {
                $varReturn = TRUE;
                }
            else
                {
                $varReturn =
                    \App\Helpers\ZhtHelper\Cache\Helper_Redis::isExist(
                        $varUserSession,
                        $this->varKeyHeader.'::'.$varKey
                        );                
                }

            return
                $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : isDataExpired                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Creation Date   : 2020-08-31                                                                                           |
        | ▪ Last Update     : 2020-08-31                                                                                           |
        | ▪ Description     : Mendapatkan status kadaluwarsa dari suatu key (varKey)                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varKey ► Data Key                                                                                        |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function isDataExpired($varUserSession, string $varKey)
            {
            $varReturn = TRUE;
            if (strcmp($varKey, \App\Helpers\ZhtHelper\System\Helper_Environment::getAPIWebToken_System())==0)
                {
                $varReturn = FALSE;
                }
            else
                {
                $varReturn = 
                    \App\Helpers\ZhtHelper\Cache\Helper_Redis::isExpired(
                        $varUserSession,
                        $this->varKeyHeader.'::'.$varKey
                        );
                }

            return
                $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setDataDelete                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Creation Date   : 2020-08-28                                                                                           |
        | ▪ Last Update     : 2020-08-28                                                                                           |
        | ▪ Description     : Menghapus data berdasarkan key (varKey)                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varKey ► Data Key                                                                                        |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataDelete($varUserSession, string $varKey)
            {
            \App\Helpers\ZhtHelper\Cache\Helper_Redis::delete($varUserSession, $this->varKeyHeader.'::'.$varKey);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setDataExpireAt                                                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Creation Date   : 2021-01-25                                                                                           |
        | ▪ Last Update     : 2021-01-25                                                                                           |
        | ▪ Description     : Menyimpan Expired DateTime data dengan key tertentu (varKey)                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varKey ► Data Key                                                                                        |
        |      ▪ (mixed)  varValue ► Data Value                                                                                    |
        |      ▪ (string) varExpireDateTime ► Expiry Date Time                                                                     |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataExpireAt($varUserSession, string $varKey, string $varExpireDateTime)
            {
            $varReturn = \App\Helpers\ZhtHelper\Cache\Helper_Redis::setExpireAt($varUserSession, $this->varKeyHeader.'::'.$varKey, $varExpireDateTime);
            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setDataInsert                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Creation Date   : 2020-08-28                                                                                           |
        | ▪ Last Update     : 2020-08-28                                                                                           |
        | ▪ Description     : Menambahkan data dengan key (varKey)                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varKey ► Data Key                                                                                        |
        |      ▪ (mixed)  varValue ► Data Value                                                                                    |
        |      ▪ (int)    varTTL ► TTL                                                                                             |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataInsert(int $varUserSession, string $varKey, $varValue, int $varTTL = null)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Set Data Insert');
                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    \App\Helpers\ZhtHelper\Cache\Helper_Redis::setValue($varUserSession, $this->varKeyHeader.'::'.$varKey, $varValue, $varTTL);
                    $varReturn = $this->varKeyHeader.'::'.$varKey;
                    //---- ( MAIN CODE ) ----------------------------------------------------------------------- [ END POINT ] -----
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
        | ▪ Method Name     : setDataUpdate                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Creation Date   : 2020-10-15                                                                                           |
        | ▪ Last Update     : 2020-10-15                                                                                           |
        | ▪ Description     : Mengupdate data dengan key (varKey)                                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varKey ► Data Key                                                                                        |
        |      ▪ (mixed)  varValue ► Data Value                                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (bool)   varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataUpdate(int $varUserSession, string $varKey, $varValue)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Set Data Update');
                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    \App\Helpers\ZhtHelper\Cache\Helper_Redis::setValueRenewal(
                        $varUserSession,
                        $this->varKeyHeader.'::'.$varKey,
                        $varValue
                        );

                    $varReturn = true;
                    //---- ( MAIN CODE ) ----------------------------------------------------------------------- [ END POINT ] -----
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
        | ▪ Method Name     : setDataTTLRenewal                                                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Createion Date  : 2020-08-31                                                                                           |
        | ▪ Last Update     : 2020-08-31                                                                                           |
        | ▪ Description     : Menyimpan ulang TTL data dengan key tertentu (varKey)                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varKey ► Data Key                                                                                        |
        |      ▪ (int)    varTTL ► TTL                                                                                             |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataTTLRenewal(int $varUserSession, string $varKey, int $varTTL)
            {
            \App\Helpers\ZhtHelper\Cache\Helper_Redis::setTTLRenewal($varUserSession, $this->varKeyHeader.'::'.$varKey, $varTTL);
            }            
        }
    }