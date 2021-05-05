<?php

namespace zhtSDK\Goodwin\SwingGateBarrier\ServoSW01
    {
    class zhtSDK
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Class Attributes                                                                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        private $varUserSession;
        private $varDatabaseFilePath;


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-05-15                                                                                           |
        | ▪ Description     : System's Default Constructor                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varDatabaseFilePath ► Database File Path                                                                 |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function __construct($varUserSession, string $varDatabaseFilePath)
            {
            $this->init($varUserSession, $varDatabaseFilePath);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : init                                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-05-05                                                                                           |
        | ▪ Description     : System's Init                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        private function init($varUserSession, string $varDatabaseFilePath)
            {
            $this->varUserSession = $varUserSession;
            $this->varDatabaseFilePath = $varDatabaseFilePath;
            }


        public function getDataAttendance(string $varTimeZoneOffset = null, $varCutOffStartDateTime = null)
            {
            //---> Sync
            \App\Helpers\ZhtHelper\Database\Helper_ODBC::init_MicrosoftAccess($this->varUserSession, $this->varDatabaseFilePath);
            //---> Table CheckInOut
            $varSQL = '
                SELECT 
                    *
                FROM 
                    CHECKINOUT
                ';
            $varDataMDB = \App\Helpers\ZhtHelper\Database\Helper_ODBC::getQueryExecution($this->varUserSession, $varSQL);
            $varSQLBuilder_TblCheckInOut='';
            for($i=0; $i!=$varDataMDB['RowCount']; $i++)
                {
                if($i>0)
                    {
                    $varSQLBuilder_TblCheckInOut .= ', ';
                    }
                $varSQLBuilder_TblCheckInOut .= 
                    '('.
                    ($i+1).', '.
                    '\''.$varDataMDB['Data'][$i]['CHECKTIME'].'\', '.
                    $varDataMDB['Data'][$i]['USERID'].', '.
                    '\''.$varDataMDB['Data'][$i]['sn'].'\', '.
                    $varDataMDB['Data'][$i]['SENSORID'].', '.
                    $varDataMDB['Data'][$i]['LOGID'].''.
                    ')';
                }

                
            $varSQLBuilder = '
                DROP TABLE IF EXISTS "SchData-OLTP-DataAcquisition"."TblTemp_Device_SwingGateBarrier_CheckInOut";
                ';
            \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::setStatementExecution($this->varUserSession, $varSQLBuilder);
            
            $varSQLBuilder = '
                CREATE TABLE "SchData-OLTP-DataAcquisition"."TblTemp_Device_SwingGateBarrier_CheckInOut" (
                    "ID" bigint, 
                    "CheckTime" timestamp without time zone, 
                    "UserID" bigint, 
                    "CardSerialNumber" character varying(64) COLLATE pg_catalog."default",
                    "SensorID" smallint,
                    "LogID" bigint
                    );
                ';
            \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::setStatementExecution($this->varUserSession, $varSQLBuilder);
    
            $varSQLBuilder = '
                INSERT INTO
                    "SchData-OLTP-DataAcquisition"."TblTemp_Device_SwingGateBarrier_CheckInOut"
                VALUES
                    '.$varSQLBuilder_TblCheckInOut.';
                ';
            \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::setStatementExecution($this->varUserSession, $varSQLBuilder);

            echo "Done";
            }
        }
    }