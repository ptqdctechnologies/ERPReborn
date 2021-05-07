<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Helpers                                                                                                   |
| ▪ Name Space : \App\Helpers\ZhtHelper\Database                                                                                   |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2021 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Helpers\ZhtHelper\Database
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : Helper_ODBC                                                                                                  |
    | ▪ Description : Menangani Database ODBC                                                                                      |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class Helper_ODBC
        {
        private static $ObjODBC;
        
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-05-03                                                                                           |
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
        | ▪ Last Update     : 2021-05-03                                                                                           |
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


        public static function init($varUserSession, string $varDSNString, string $userName = null, string $userPassword = null, array $varOptions = null)
            {
            self::$ObjODBC = new \PDO($varDSNString, $userName, $varDSNString, $varOptions);            
            }

        
        public static function init_MicrosoftAccess($varUserSession, string $varPath, string $userName = null, string $userPassword = null, array $varOptions = null)
            {
            $varDriver = 'MDBTools';
            //$varPath  = '/zhtConf/tmp/download/SwingBarrierGate.mdb';
            $varDSNString = 'odbc:DRIVER='.$varDriver.'; DBQ='.$varPath;
            self::init($varUserSession, $varDSNString, $userName, $userPassword, $varOptions);
            }

        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getQueryExecution                                                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000003                                                                                       |
        | ▪ Last Update     : 2020-10-19                                                                                           |
        | ▪ Description     : Mendapatkan data dari database sesuai syntax query (varSQL)                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varSQL ► SQL                                                                                             |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array) varReturn                                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getQueryExecution($varUserSession, $varSQL)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Get Query Execution');
                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    $varReturn['Process']['StartDateTime'] = \App\Helpers\ZhtHelper\General\Helper_DateTime::getCurrentDateTimeString($varUserSession);
                    //---> Inisialisasi [Data], [RowCount]
                    $i=0;
                    foreach(self::getQueryExecutionDataFetch($varUserSession, $varSQL) as $row)
                        {
                        $varData[] = (array) $row;
                        $i++;
                        }
                    $varReturn['Data'] = $varData;
                    $varReturn['RowCount']=$i;
                    do
                        {
                        $varReturn['Process']['FinishDateTime'] = \App\Helpers\ZhtHelper\General\Helper_DateTime::getCurrentDateTimeString($varUserSession);
                        $varReturn['Process']['ExecutionTime'] = \App\Helpers\ZhtHelper\General\Helper_DateTime::getDateTimeStringDifference($varUserSession, $varReturn['Process']['StartDateTime'], $varReturn['Process']['FinishDateTime']);
                        }
                    while ($varReturn['Process']['ExecutionTime'] < 0);
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
        | ▪ Method Name     : getQueryExecutionDataFetch                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-05-04                                                                                           |
        | ▪ Description     : Mengambil data dari database sesuai syntax query (varSQL)                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed) varUserSession ► User Session                                                                             |
        |      ▪ (string) varSQL ► SQL                                                                                             |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array) varReturn                                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        private static function getQueryExecutionDataFetch($varUserSession, $varSQL)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Fetch data from SQL syntax `'.$varSQL.'`');
                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    $varReturn = self::$ObjODBC->query($varSQL, \PDO::FETCH_ASSOC);
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
        }
    }
