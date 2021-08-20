<?php

namespace zhtSDK\Device\Goodwin\SwingGateBarrier\ServoSW01
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
        public function __construct($varUserSession)
            {
            $this->init($varUserSession);
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
        private function init($varUserSession)
            {
            $this->varUserSession = $varUserSession;
            }


        public function getDataAttendanceFromLocalDatabase(string $varDatabaseFilePath, string $varTemporaryDatabase, string $varTimeZoneOffset = null, $varCutOffStartDateTime = null)
            {
$varReturn = null;
            try {
               //---> Sync
                \App\Helpers\ZhtHelper\Database\Helper_ODBC::init_MicrosoftAccess($this->varUserSession, $varDatabaseFilePath);
                //---> Table CheckInOut Access
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
                
                //---> Delete Temporary Table If Exist
/*                $varSQLBuilder = '
                    DROP TABLE IF EXISTS '.$varTemporaryDatabase.';
                    ';
                //dd($varSQLBuilder);
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::setStatementExecution($this->varUserSession, $varSQLBuilder);

                //---> Create Temporary Table
                $varSQLBuilder = '
                    CREATE TABLE '.$varTemporaryDatabase.' (
                        "ID" bigint, 
                        "CheckTime" timestamp without time zone, 
                        "UserID" bigint, 
                        "CardSerialNumber" character varying(64) COLLATE pg_catalog."default",
                        "SensorID" smallint,
                        "LogID" bigint
                        );
                    ';
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::setStatementExecution($this->varUserSession, $varSQLBuilder);

                //---> Insert Data To Temporary Table
                $varSQLBuilder = '
                    INSERT INTO
                        '.$varTemporaryDatabase.'
                    VALUES
                        '.$varSQLBuilder_TblCheckInOut.';
                    ';
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::setStatementExecution($this->varUserSession, $varSQLBuilder);

                //---> Data Processing on Temporary Table
                $varSQL = '
                    SELECT
                        "SubSQL"."ID",
                        "SubSQL"."dateTimeTZ"
                    FROM
                        (
                        SELECT
                            "UserID" AS "ID",
                            ("CheckTime"::varchar || \''.$varTimeZoneOffset.'\'::varchar)::timestamptz AS "dateTimeTZ",
                            ROW_NUMBER() OVER(ORDER BY "CheckTime" ASC, "LogID" ASC) AS "OrderSequence"
                        FROM 
                            "SchData-OLTP-DataAcquisition"."TblTemp_Device_SwingGateBarrier_CheckInOut"
                        WHERE
                            "CheckTime" >= \'2021-01-14 00:00:00\'::timestamp
                        ) AS "SubSQL"
                    --WHERE
                    --    "SubSQL"."dateTimeTZ" >= \'2021-05-06 00:00:00+07\'::timestamptz
                    ORDER BY
                        "SubSQL"."dateTimeTZ" ASC, 
                        "SubSQL"."OrderSequence" ASC
                    ';
                
                $varSQL = '
                    SELECT
                        "SubSQL"."ID",
                        "SubSQL"."dateTimeTZ"
                    FROM
                        (
                        SELECT
                            "SubSQL"."ID",
                            "SubSQL"."dateTimeTZ",
                            "CardSerialNumber",
                            ROW_NUMBER() OVER(PARTITION BY "SubSQL"."ID", "dateTimeTZ" ORDER BY "OrderSequence" ASC) AS "FilterSequence",
                            ROW_NUMBER() OVER(ORDER BY "SubSQL"."OrderSequence" ASC, "SubSQL"."ID" ASC) AS "OrderSequence"
                        FROM
                            (
                            SELECT
                                "UserID" AS "ID",
                                ("CheckTime"::varchar || \''.$varTimeZoneOffset.'\'::varchar)::timestamptz AS "dateTimeTZ",
                                "CardSerialNumber",
                                ROW_NUMBER() OVER(ORDER BY "CheckTime" ASC, "LogID" ASC) AS "OrderSequence"
                            FROM 
                                "SchData-OLTP-DataAcquisition"."TblTemp_Device_SwingGateBarrier_CheckInOut"
                            WHERE
                                "CheckTime" >= \'2021-01-14 00:00:00\'::timestamp
                            ) AS "SubSQL"
                        ) AS "SubSQL"
                    WHERE
                        "SubSQL"."FilterSequence" = 1
                    ORDER BY
                        "SubSQL"."OrderSequence" ASC
                    ';
/*                
                $varDataBuffer = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution($this->varUserSession, $varSQL);
                for($i=0; $i!=$varDataBuffer['RowCount']; $i++)
                    {
                    $varReturn[]=[
                        'ID' => $varDataBuffer['Data'][$i]['ID'],
                        'dateTimeTZ' => $varDataBuffer['Data'][$i]['dateTimeTZ']
                        ];
                    }

                //---> Delete Temporary Table If Exist
                $varSQLBuilder = '
                    DROP TABLE IF EXISTS '.$varTemporaryDatabase.';
                    ';
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::setStatementExecution($this->varUserSession, $varSQLBuilder);
                */
                } 
            catch (\Exception $ex) {
                echo "Error";
//                throw new \Exception("Error");
                }
            return $varReturn;
            }
        }
    }