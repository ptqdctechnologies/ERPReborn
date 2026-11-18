<?php

/*
┌──────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────┐
│ ▪ Category   : Laravel Helpers                                                                                                           │
│ ▪ Name Space : \App\Http\Helpers\ZhtHelper\BackEnd\Database\SQL                                                                          │
├──────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────┤
│ ▪ Copyleft 🄯 2020 - 2025 Zheta (teguhpjs@gmail.com)                                                                                      │
└──────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────┘
*/

namespace
    App\Http\Helpers\ZhtHelper\BackEnd\Database\SQL
        {
        /*
        ┌───────────────┬──────────────────────────────────────────────────────────────────────────────────────────────────────────────────┐
        │ ▪ Class Name  │ Helper_PostgreSQL                                                                                                │
        │ ▪ Description │ Menangani segala hal yang terkait Database PostgreSQL                                                            │
        └───────────────┴──────────────────────────────────────────────────────────────────────────────────────────────────────────────────┘
        */
        class
            Helper_PostgreSQL
                {
                /*
                ┌──────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────┐
                │ Class Property Declaration                                                                                               │
                └──────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────┘
                */


                /*
                ┌───────────────────┬──────────────────────────────────────────────────────────────────────────────────────────────────────┐
                │ ▪ Method Name     │ __construct                                                                                          │
                ├───────────────────┼──────────────────────────────────────────────────────────────────────────────────────────────────────┤
                │ ▪ Version         │ 1.0000.0000000                                                                                       │
                │ ▪ Last Update     │ 2020-07-17                                                                                           │
                │ ▪ Creation Date   │ 2020-07-17                                                                                           │
                │ ▪ Description     │ System's Default Constructor                                                                         │
                ├───────────────────┴──────────────────────────────────────────────────────────────────────────────────────────────────────┤
                │ ▪ Input Variable  :                                                                                                      │
                │      ▪ (void)                                                                                                            │
                │ ▪ Output Variable :                                                                                                      │
                │      ▪ (void)                                                                                                            │
                └──────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────┘
                */
                public function
                    __construct (
                        )
                            {
                            }


                /*
                ┌───────────────────┬──────────────────────────────────────────────────────────────────────────────────────────────────────┐
                │ ▪ Method Name     │ __destruct                                                                                           │
                ├───────────────────┼──────────────────────────────────────────────────────────────────────────────────────────────────────┤
                │ ▪ Version         │ 1.0000.0000000                                                                                       │
                │ ▪ Last Update     │ 2020-07-17                                                                                           │
                │ ▪ Creation Date   │ 2020-07-17                                                                                           │
                │ ▪ Description     │ System's Default Destructor                                                                          │
                ├───────────────────┴──────────────────────────────────────────────────────────────────────────────────────────────────────┤
                │ ▪ Input Variable  :                                                                                                      │
                │      ▪ (void)                                                                                                            │
                │ ▪ Output Variable :                                                                                                      │
                │      ▪ (void)                                                                                                            │
                └──────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────┘
                */
                public function
                    __destruct (
                        )
                            {
                            }


                /*
                ┌───────────────────┬──────────────────────────────────────────────────────────────────────────────────────────────────────┐
                │ ▪ Method Name     │ getArrayFromQueryExecutionDataFetch_UsingLaravelConnection                                           │
                ├───────────────────┼──────────────────────────────────────────────────────────────────────────────────────────────────────┤
                │ ▪ Version         │ 1.0000.0000002                                                                                       │
                │ ▪ Last Update     │ 2023-05-03                                                                                           │
                │ ▪ Creation Date   │ 2023-05-03                                                                                           │
                │ ▪ Description     │ Mengambil data berbentuk Array dari database sesuai syntax query (varSQLQuery) melalui koneksi       │
                │                   │ Laravel Connection                                                                                   │
                ├───────────────────┴──────────────────────────────────────────────────────────────────────────────────────────────────────┤
                │ ▪ Input Variable  :                                                                                                      │
                │      ▪ varUserSession (mixed - Mandatory) ► User Session                                                                 │
                │      ▪ varSQLQuery (string - Mandatory) ► SQL Query Syntax                                                               │
                │      ------------------------------                                                                                      │
                │ ▪ Output Variable :                                                                                                      │
                │      ▪ varReturn (array)                                                                                                 │
                ├──────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────┤
                │ ▪ Linked Function :                                                                                                      │
                │      ▪ \App\Http\Helpers\ZhtHelper\BackEnd\Database\Helper_PostgreSQL::                                                  │
                │           getQueryExecutionDataFetch                                                                                     │
                │              (mixed $varUserSession, string $varSQLQuery)                                                                │
                └──────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────┘
                */
                private static function
                    getArrayFromQueryExecutionDataFetch_UsingLaravelConnection (
                        mixed $varUserSession, string $varSQLQuery
                        )
                            {
                            //-----[ DATA INITIALIZATION ]-------------------------------------------------------------------( START )-----
                                //---> Initializing : varReturn
                                    $varReturn =
                                        (array) null;
                            //-----[ DATA INITIALIZATION ]-------------------------------------------------------------------(  END  )-----

                            //-----[ DATA PROCESS ]--------------------------------------------------------------------------( START )-----
                                try {
                                    $i = 0;

                                    //---> Initializing : varDataFetch
                                        $varDataFetch =
                                            self::getQueryExecutionDataFetch (
                                                $varUserSession,
                                                $varSQLQuery
                                                );

                                    //---> ...
                                        $varData = [];
                                        $varNotice = null;
                                        foreach ($varDataFetch as $row)
                                            {
                                            $varData[] = (array) $row;
                                            $i++;
                                            }

                                    //---> Renitializing : varReturn
                                        $varReturn['data'] = $varData;
                                        $varReturn['Notice'] = null;
                                        $varReturn['rowCount']=$i;

                                        unset ($varData);
                                    }

                                catch (\Exception $ex) {
                                    }
                            //-----[ DATA PROCESS ]--------------------------------------------------------------------------(  END  )-----

                            //-----[ DATA RETURN ]---------------------------------------------------------------------------( START )-----
                                return
                                    $varReturn;
                            //-----[ DATA RETURN ]---------------------------------------------------------------------------(  END  )-----
                            }


                /*
                ┌───────────────────┬──────────────────────────────────────────────────────────────────────────────────────────────────────┐
                │ ▪ Method Name     │ getArrayFromQueryExecutionDataFetch_UsingPGSQLConnection                                             │
                ├───────────────────┼──────────────────────────────────────────────────────────────────────────────────────────────────────┤
                │ ▪ Version         │ 1.0000.0000004                                                                                       │
                │ ▪ Last Update     │ 2025-12-16                                                                                           │
                │ ▪ Creation Date   │ 2023-05-03                                                                                           │
                │ ▪ Description     │ Mengambil data berbentuk Array dari database sesuai syntax query (varSQLQuery) melalui koneksi       │
                │                   │ PgSql\Connection                                                                                     │
                ├───────────────────┴──────────────────────────────────────────────────────────────────────────────────────────────────────┤
                │ ▪ Input Variable  :                                                                                                      │
                │      ▪ varUserSession (mixed - Mandatory) ► User Session                                                                 │
                │      ▪ varSQLQuery (string - Mandatory) ► SQL Query Syntax                                                               │
                │      ------------------------------                                                                                      │
                │ ▪ Output Variable :                                                                                                      │
                │      ▪ varReturn (array)                                                                                                 │
                ├──────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────┤
                │ ▪ Linked Function :                                                                                                      │
                │      ▪ \App\Http\Helpers\ZhtHelper\BackEnd\Database\Helper_PostgreSQL::                                                  │
                │           getArrayFromQueryExecutionDataFetch_UsingLaravelConnection                                                     │
                │              (mixed $varUserSession, string $varSQLQuery)                                                                │
                │      ▪ \App\Http\Helpers\ZhtHelper\BackEnd\Database\Helper_PostgreSQL::                                                  │
                │           getBooleanConvertion                                                                                           │
                │              (mixed $varUserSession, array $varData)                                                                     │
                └──────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────┘
                */
                private static function
                    getArrayFromQueryExecutionDataFetch_UsingPGSQLConnection (
                        mixed $varUserSession, string $varSQLQuery
                        )
                            {
                            //-----[ DATA INITIALIZATION ]-------------------------------------------------------------------( START )-----
                                //---> Initializing : varReturn
                                    $varReturn =
                                        (array) null;
                            //-----[ DATA INITIALIZATION ]-------------------------------------------------------------------(  END  )-----

                            //-----[ DATA PROCESS ]--------------------------------------------------------------------------( START )-----
                                try {
                                    //---> Initializing : varConfig
                                        $varConfig =
                                            (array) (\Illuminate\Support\Facades\DB::getConfig());

                                    //---> Reinitializing : varReturn
                                        if (!is_null ($varConfig))
                                            {
                                            $varConnectionString = 
                                                'host='.$varConfig['host'].' '.
                                                'port='.$varConfig['port'].' '.
                                                'dbname='.$varConfig['database'].' '.
                                                'user='.$varConfig['username'].' '.
                                                'password='.$varConfig['password'];
                                            //var_dump($varConnectionString);

                                            $i=0;
                                            $varData = [];
                                            $varNotice = null;
                                            if ($DBConnection = pg_connect ($varConnectionString))
                                                {
                                                pg_last_notice (
                                                    $DBConnection,
                                                    PGSQL_NOTICE_CLEAR
                                                    );

                                                $varResult =
                                                    pg_query (
                                                        $DBConnection,
                                                        $varSQLQuery
                                                        );

                                                $varNotice =
                                                    pg_last_notice (
                                                        $DBConnection,
                                                        PGSQL_NOTICE_ALL
                                                        );

                                                //---> Field Type Initializing
                                                unset ($varFieldType);

                                                for ($j=0, $jMax = pg_num_fields ($varResult); $j != $jMax; $j++)
                                                    {
                                                    $varFieldType[$j] =
                                                        pg_field_type (
                                                            $varResult,
                                                            $j
                                                            );
                                                    }

                                                while ($row = pg_fetch_assoc ($varResult)) {
                                                    $varDataContent = null;
                                                    $varData[$i] = $row;
                                                    $j = 0;
                                                    foreach ($varData[$i] as $key => $value)
                                                        {
                                                        $varData[$i][$key] = $value;

                                                        $varData[$i][$key] = null;
                                                        switch ($varFieldType[$j++])
                                                            {
                                                            case 'bool':
                                                                $varData[$i][$key] =
                                                                    self::getBooleanConvertion (
                                                                        $varUserSession,
                                                                        $value
                                                                        );
                                                                break;
                                                            case 'int2':
                                                            case 'int4':
                                                            case 'int8':
                                                                if (!is_null($value))
                                                                    {
                                                                    $varData[$i][$key] = (int) $value;
                                                                    }
                                                                break;
                                                            case 'float4':
                                                            case 'float8':
                                                                if (!is_null($value))
                                                                    {
                                                                    $varData[$i][$key] = (float) $value;
                                                                    }
                                                                break;
                                                            case 'varchar':
                                                            default:
                                                                if (!is_null($value))
                                                                    {
                                                                    $varData[$i][$key] = $value;
                                                                    }
                                                                break;
                                                            }
                                                        }
                                                    $i++;
                                                    }

                                                pg_close (
                                                    $DBConnection
                                                    );
                                                }

                                            $varReturn['data'] = $varData;
                                            $varReturn['notice'] = $varNotice;
                                            $varReturn['rowCount']=$i;
                                            }
                                        else
                                            {
                                            $varDataTemp =
                                                self::getArrayFromQueryExecutionDataFetch_UsingLaravelConnection (
                                                    $varUserSession,
                                                    $varSQLQuery
                                                    );

                                            $varReturn['data'] = $varDataTemp['data'];
                                            $varReturn['notice'] = $varDataTemp['notice'];
                                            $varReturn['rowCount'] = $varDataTemp['rowCount'];                        
                                            }
                                    }

                                catch (\Exception $ex) {
                                    }
                            //-----[ DATA PROCESS ]--------------------------------------------------------------------------(  END  )-----

                            //-----[ DATA RETURN ]---------------------------------------------------------------------------( START )-----
                                return
                                    $varReturn;
                            //-----[ DATA RETURN ]---------------------------------------------------------------------------(  END  )-----
                            }


                /*
                ┌───────────────────┬──────────────────────────────────────────────────────────────────────────────────────────────────────┐
                │ ▪ Method Name     │ getBooleanConvertion                                                                                 │
                ├───────────────────┼──────────────────────────────────────────────────────────────────────────────────────────────────────┤
                │ ▪ Version         │ 1.0000.0000001                                                                                       │
                │ ▪ Last Update     │ 2025-12-16                                                                                           │
                │ ▪ Creation Date   │ 2023-05-03                                                                                           │
                │ ▪ Description     │ Mendapatkan konversi Boolean PHP dari data Boolean PostgreSQL (varData)                              │
                ├───────────────────┴──────────────────────────────────────────────────────────────────────────────────────────────────────┤
                │ ▪ Input Variable  :                                                                                                      │
                │      ▪ varUserSession (mixed - Mandatory) ► User Session                                                                 │
                │      ▪ varData (string - Mandatory) ► Data                                                                               │
                │      ------------------------------                                                                                      │
                │ ▪ Output Variable :                                                                                                      │
                │      ▪ varReturn (bool)                                                                                                  │
                ├──────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────┤
                │ ▪ Linked Function :                                                                                                      │
                │      ▪                                                                                                                   │
                └──────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────┘
                */
                public static function
                    getBooleanConvertion (
                        mixed $varUserSession, string $varData
                        )
                            {
                            //-----[ DATA INITIALIZATION ]-------------------------------------------------------------------( START )-----
                                //---> Initializing : varReturn
                                    $varReturn =
                                        (bool) true;
                            //-----[ DATA INITIALIZATION ]-------------------------------------------------------------------(  END  )-----

                            //-----[ DATA PROCESS ]--------------------------------------------------------------------------( START )-----
                                try {
                                    //---> Reinitializing : varReturn
                                        if ((strcmp ($varData, 'f') == 0) OR ((bool) $varData == false)) {
                                            $varReturn =
                                                false;
                                            }
                                    }

                                catch (\Exception $ex) {
                                    }
                            //-----[ DATA PROCESS ]--------------------------------------------------------------------------(  END  )-----

                            //-----[ DATA RETURN ]---------------------------------------------------------------------------( START )-----
                                return
                                    $varReturn;
                            //-----[ DATA RETURN ]---------------------------------------------------------------------------(  END  )-----
                            }


                /*
                ┌───────────────────┬──────────────────────────────────────────────────────────────────────────────────────────────────────┐
                │ ▪ Method Name     │ getQueryExecution                                                                                    │
                ├───────────────────┼──────────────────────────────────────────────────────────────────────────────────────────────────────┤
                │ ▪ Version         │ 1.0000.0000004                                                                                       │
                │ ▪ Last Update     │ 2025-12-16                                                                                           │
                │ ▪ Creation Date   │ 2020-10-19                                                                                           │
                │ ▪ Description     │ Mendapatkan data dari database sesuai syntax query (varSQLQuery)                                     │
                ├───────────────────┴──────────────────────────────────────────────────────────────────────────────────────────────────────┤
                │ ▪ Input Variable  :                                                                                                      │
                │      ▪ varUserSession (mixed - Mandatory) ► User Session                                                                 │
                │      ▪ varSQLQuery (string - Mandatory) ► SQL Query Syntax                                                               │
                │      ------------------------------                                                                                      │
                │ ▪ Output Variable :                                                                                                      │
                │      ▪ varReturn (array)                                                                                                 │
                ├──────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────┤
                │ ▪ Linked Function :                                                                                                      │
                │      ▪ \App\Http\Helpers\ZhtHelper\BackEnd\Database\Helper_PostgreSQL::                                                  │
                │           getArrayFromQueryExecutionDataFetch_UsingPGSQLConnection                                                       │
                │              (mixed $varUserSession, string $varSQLQuery)                                                                │
                │      ▪ \App\Http\Helpers\ZhtHelper\BackEnd\Database\Helper_PostgreSQL::                                                  │
                │           getResourceAvailabilityStatus                                                                                  │
                │              (mixed $varUserSession)                                                                                     │
                │      ▪ \App\Http\Helpers\ZhtHelper\General\Utilities\Helper_DateTime::                                                   │
                │           getDifferenceOfDateTimeTZString                                                                                │
                │              (mixed $varUserSession, string $varSQLQuery, string $varFinishDateTimeTZ)                                   │
                │      ▪ \App\Http\Helpers\ZhtHelper\General\Utilities\Helper_DateTime::                                                   │
                │           getTimeStampTZConvert_PHPDateTimeToDateTimeTZString                                                            │
                │              (mixed $varUserSession, \Date $varPHPDateTime, string $varTimeZoneOffset)                                   │
                └──────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────┘
                */
                public static function
                    getQueryExecution (
                        mixed $varUserSession, string $varSQLQuery
                        )
                            {
                            //-----[ DATA INITIALIZATION ]-------------------------------------------------------------------( START )-----
                                //---> Initializing : varReturn
                                    $varReturn =
                                        (array) null;
                            //-----[ DATA INITIALIZATION ]-------------------------------------------------------------------(  END  )-----

                            //-----[ DATA PROCESS ]--------------------------------------------------------------------------( START )-----
                                try {
                                    if (self::getResourceAvailabilityStatus ($varUserSession) === false)
                                        {
                                        throw
                                            new \Exception ('Database Resource is not available');                
                                        }

                                    if (!$varSQLQuery)
                                        {
                                        throw
                                            new \Exception ('Incorrect SQL syntax');
                                        }
                                    else
                                        {
                                        //---> Reinitializing : varSQLQuery
                                            $varSQLQuery =
                                                ltrim (
                                                    str_replace (
                                                        "\n",
                                                        ""
                                                        ,
                                                        $varSQLQuery
                                                        )
                                                );
                                            //echo $varSQLQuery;

                                        //---> Reinitializing : varReturn
                                            $varReturn['process']['DBMS']['executionTime']['interval'] =
                                                null;

                                        //---> Inisialisasi [Process][StartDateTime]
                                            $varDataTemp = 
                                                self::getArrayFromQueryExecutionDataFetch_UsingLaravelConnection(
                                                    $varUserSession, 
                                                    "SELECT NOW();"
                                                    );
                                            $varTempExplode =
                                                explode (
                                                    '+',
                                                    $varDataTemp['data'][0]['now']
                                                    );
                                            unset ($varDataTemp);

                                            $varReturn['process']['DBMS']['executionTime']['startDateTimeTZ'] =
                                                \App\Http\Helpers\ZhtHelper\General\Utilities\Helper_DateTime::getTimeStampTZConvert_PHPDateTimeToDateTimeTZString(
                                                    //\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                                                    $varUserSession,
                                                    (new \DateTime())
                                                    );

                                        //---> Inisialisasi [Data], [RowCount], [Notice]
                                            //$varDataTemp = self::getArrayFromQueryExecutionDataFetch_UsingLaravelConnection($varUserSession, $varSQLQuery);
                                            $varDataTemp = 
                                                self::getArrayFromQueryExecutionDataFetch_UsingPGSQLConnection(
                                                    $varUserSession,
                                                    $varSQLQuery
                                                    );

                                            $varReturn['data'] =
                                                $varDataTemp['data'];
                                            $varReturn['rowCount'] =
                                                $varDataTemp['rowCount'];
                                            $varReturn['notice'] =
                                                $varDataTemp['notice'];

                                            unset ($varDataTemp);

                                        //---> Inisialisasi : varReturn[process][DBMS][finishDateTimeTZ]
                                            $varReturn['process']['DBMS']['executionTime']['finishDateTimeTZ'] =
                                                \App\Http\Helpers\ZhtHelper\General\Utilities\Helper_DateTime::getTimeStampTZConvert_PHPDateTimeToDateTimeTZString(
                                                    //\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                                                    $varUserSession,
                                                    (new \DateTime())
                                                    );

                                        //---> Inisialisasi : varReturn[process][DBMS][executionInterval]
                                            $varReturn['process']['DBMS']['executionTime']['interval'] = 
                                                \App\Http\Helpers\ZhtHelper\General\Utilities\Helper_DateTime::getDifferenceOfDateTimeTZString (
                                                    $varUserSession,
                                                    $varReturn['process']['DBMS']['executionTime']['startDateTimeTZ'],
                                                    $varReturn['process']['DBMS']['executionTime']['finishDateTimeTZ']
                                                    );
                                        }
                                    }

                                catch (\Exception $ex) {
                                    }
                            //-----[ DATA PROCESS ]--------------------------------------------------------------------------(  END  )-----

                            //-----[ DATA RETURN ]---------------------------------------------------------------------------( START )-----
                                return
                                    $varReturn;
                            //-----[ DATA RETURN ]---------------------------------------------------------------------------(  END  )-----
                            }                    


                /*
                ┌───────────────────┬──────────────────────────────────────────────────────────────────────────────────────────────────────┐
                │ ▪ Method Name     │ getQueryExecutionDataFetch                                                                           │
                ├───────────────────┼──────────────────────────────────────────────────────────────────────────────────────────────────────┤
                │ ▪ Version         │ 1.0000.0000003                                                                                       │
                │ ▪ Last Update     │ 2025-12-16                                                                                           │
                │ ▪ Creation Date   │ 2020-07-21                                                                                           │
                │ ▪ Description     │ Mengambil data dari database sesuai syntax query (varSQLQuery)                                       │
                ├───────────────────┴──────────────────────────────────────────────────────────────────────────────────────────────────────┤
                │ ▪ Input Variable  :                                                                                                      │
                │      ▪ varUserSession ► User Session (mixed - Mandatory)                                                                 │
                │      ▪ varSQLQuery ► SQL Query Syntax (string - Mandatory)                                                               │
                │      ------------------------------                                                                                      │
                │ ▪ Output Variable :                                                                                                      │
                │      ▪ varReturn (array)                                                                                                 │
                ├──────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────┤
                │ ▪ Linked Function :                                                                                                      │
                │      ▪                                                                                                                   │
                └──────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────┘
                */
                private static function
                    getQueryExecutionDataFetch (
                        mixed $varUserSession, string $varSQLQuery
                        )
                            {
                            //-----[ DATA INITIALIZATION ]-------------------------------------------------------------------( START )-----
                                //---> Initializing : varReturn
                                    $varReturn =
                                        (array) null;
                            //-----[ DATA INITIALIZATION ]-------------------------------------------------------------------(  END  )-----

                            //-----[ DATA PROCESS ]--------------------------------------------------------------------------( START )-----
                                try {
                                    //---> Initializing : varSQLQuery
                                        $varSQLQuery =
                                            ltrim (
                                                str_replace (
                                                    "\n",
                                                    "" ,
                                                    $varSQLQuery
                                                    )
                                                );

                                    //---> Reinitializing : varReturn
                                        $varReturn =
                                            \Illuminate\Support\Facades\DB::select (
                                                $varSQLQuery
                                                );
                                    }

                                catch (\Exception $ex) {
                                    }
                            //-----[ DATA PROCESS ]--------------------------------------------------------------------------(  END  )-----

                            //-----[ DATA RETURN ]---------------------------------------------------------------------------( START )-----
                                return
                                    $varReturn;
                            //-----[ DATA RETURN ]---------------------------------------------------------------------------(  END  )-----
                            }


                /*
                ┌───────────────────┬──────────────────────────────────────────────────────────────────────────────────────────────────────┐
                │ ▪ Method Name     │ getResourceAvailabilityStatus                                                                        │
                ├───────────────────┼──────────────────────────────────────────────────────────────────────────────────────────────────────┤
                │ ▪ Version         │ 1.0000.0000003                                                                                       │
                │ ▪ Last Update     │ 2025-12-16                                                                                           │
                │ ▪ Creation Date   │ 2020-07-26                                                                                           │
                │ ▪ Description     │ Mendapatkan status ketersediaan resource PostgreSQL                                                  │
                ├───────────────────┴──────────────────────────────────────────────────────────────────────────────────────────────────────┤
                │ ▪ Input Variable  :                                                                                                      │
                │      ▪ varUserSession ► User Session (mixed - Mandatory)                                                                 │
                │      ------------------------------                                                                                      │
                │ ▪ Output Variable :                                                                                                      │
                │      ▪ varReturn (bool)                                                                                                  │
                ├──────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────┤
                │ ▪ Linked Function :                                                                                                      │
                │      ▪                                                                                                                   │
                └──────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────┘
                */
                public static function
                    getResourceAvailabilityStatus (
                        mixed $varUserSession
                        )
                            {
                            //-----[ DATA INITIALIZATION ]-------------------------------------------------------------------( START )-----
                                //---> Initializing : varReturn
                                    $varReturn =
                                        (bool) false;
                            //-----[ DATA INITIALIZATION ]-------------------------------------------------------------------(  END  )-----

                            //-----[ DATA PROCESS ]--------------------------------------------------------------------------( START )-----
                                try {
                                    if (!$varDataFetch =
                                        \Illuminate\Support\Facades\DB::select (
                                            'SELECT 1;'
                                            )
                                        )
                                        {
                                        throw
                                            new \Exception("Error");
                                        }

                                    //---> Reinitializing : varReturn
                                        $varReturn =
                                            true;
                                    }

                                catch (\Exception $ex) {
                                    }
                            //-----[ DATA PROCESS ]--------------------------------------------------------------------------(  END  )-----

                            //-----[ DATA RETURN ]---------------------------------------------------------------------------( START )-----
                                return
                                    $varReturn;
                            //-----[ DATA RETURN ]---------------------------------------------------------------------------(  END  )-----
                            }
                }
        }