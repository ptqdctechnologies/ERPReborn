<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Helpers                                                                                                   |
| ▪ Name Space : \App\Helpers\ZhtHelper\Database                                                                                   |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2020 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Helpers\ZhtHelper\Database
    {
    use Illuminate\Support\Facades\DB;


    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : Helper_PostgreSQL                                                                                            |
    | ▪ Description : Menangani Database PostgreSQL                                                                                |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class Helper_PostgreSQL
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
        | ▪ Last Update     : 2020-07-17                                                                                           |
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
        | ▪ Last Update     : 2020-07-17                                                                                           |
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
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2020-07-09                                                                                           |
        | ▪ Description     : Inisialisasi                                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function init($varUserSession)
            {
            try {
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogIndentationIncrease($varUserSession);
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutput($varUserSession, __CLASS__, '('.__FUNCTION__.') Class initializing');
                self::$varNameSpace=get_class();
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogIndentationDecrease($varUserSession);
                } 
            catch (\Exception $ex) {
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getArrayFromQueryExecutionDataFetch_UsingLaravelConnection                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000002                                                                                       |
        | ▪ Last Update     : 2023-05-03                                                                                           |
        | ▪ Creation Date   : 2023-05-03                                                                                           |
        | ▪ Description     : Mengambil data berbentuk Array dari database sesuai syntax query (varSQLQuery) melalui koneksi       |
        |                     Laravel Connection                                                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varUserSession                                                                                           |
        |      ▪ (string) varSQLQuery                                                                                              |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array) $varDataFetch                                                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        private static function getArrayFromQueryExecutionDataFetch_UsingLaravelConnection($varUserSession, $varSQLQuery)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);

            try {
                $varSysDataProcess =
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__,
                        'Fetch Array Data from SQL syntax `'.$varSQLQuery.'`'
                        );

                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                        //$varSQLQuery = preg_replace('/\s+/', '', $varSQLQuery);                   
                        $i = 0;

                        $varDataFetch =
                            self::getQueryExecutionDataFetch(
                                $varUserSession,
                                $varSQLQuery
                                );

                        //var_dump($varReturn);
                        //var_dump($varSQLQuery);

                        $varData = [];
                        $varNotice = null;
                        foreach($varDataFetch as $row)
                            {
                            $varData[] = (array) $row;
                            $i++;
                            }

                        $varReturn['data'] = $varData;
                        $varReturn['Notice'] = null;
                        $varReturn['rowCount']=$i;

                        unset($varData);                    
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

            return
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getArrayFromQueryExecutionDataFetch_UsingPGSQLConnection                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000003                                                                                       |
        | ▪ Last Update     : 2025-05-24                                                                                           |
        | ▪ Creation Date   : 2023-05-03                                                                                           |
        | ▪ Description     : Mengambil data berbentuk Array dari database sesuai syntax query (varSQLQuery) melalui koneksi       |
        |                     PgSql\Connection                                                                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varUserSession                                                                                           |
        |      ▪ (string) varSQLQuery                                                                                              |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array) $varDataFetch                                                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        private static function getArrayFromQueryExecutionDataFetch_UsingPGSQLConnection($varUserSession, $varSQLQuery)
            {  
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Fetch data from SQL syntax Using PGSQL/Connection`'.$varSQLQuery.'`');
                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    $varConfig = (array) (\Illuminate\Support\Facades\DB::getConfig());

                    if(!is_null($varConfig))
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
                        //---> [PERF Q4] Use a persistent connection (pg_pconnect) reused across queries instead
                        //     of pg_connect()+pg_close() per query, which forced a Postgres backend-fork on
                        //     every call. The connection is pooled per PHP worker and is NOT closed per query;
                        //     notices are cleared per query (PGSQL_NOTICE_CLEAR below) so reuse stays clean.
                        if($DBConnection = @pg_pconnect($varConnectionString))
                            {
                            /*
                            var_dump($varConnectionString);
                            echo "<br>";
                            var_dump($varSQLQuery);
                            echo "<br><br><br>";
                            */

                            pg_last_notice($DBConnection, PGSQL_NOTICE_CLEAR);
                            $varProfilerStartNs = hrtime(true);
                            $varResult = @pg_query($DBConnection, $varSQLQuery);
                            \App\Helpers\ZhtHelper\Logger\Helper_QueryProfiler::record(
                                'pgsql',
                                $varSQLQuery,
                                (hrtime(true) - $varProfilerStartNs) / 1e6,
                                ($varResult !== false),
                                ($varResult === false ? pg_last_error($DBConnection) : null)
                                );

                            //---> [PERF Q3] Now that the pre-query syntax-validation probe is removed, an
                            //     invalid statement surfaces here. Fail cleanly instead of letting
                            //     pg_num_fields(false) raise a TypeError in the fetch loop below.
                            if ($varResult === false)
                                {
                                //---> [PERF Q4] Do not close the persistent connection; a failed statement in
                                //     autocommit leaves it healthy for reuse by the next query.
                                $varErrorMessage = pg_last_error($DBConnection);
                                throw new \Exception('Incorrect SQL syntax: '.$varErrorMessage);
                                }

                            $varNotice = pg_last_notice($DBConnection, PGSQL_NOTICE_ALL);

                            /*
                            while ($row = pg_fetch_assoc($varResult)) {
                                $varData[] = $row;
                                $i++;
                                }
                            */

                            //---> Field Type Initializing
                            unset($varFieldType);
                            //echo "<br>@@@--->";
                            for ($j=0, $jMax = pg_num_fields($varResult); $j!=$jMax; $j++)
                                {
                                $varFieldType[$j] = pg_field_type($varResult, $j);
                                //echo $varFieldType[$j];
                                //echo ",";
                                }

                            while ($row = pg_fetch_assoc($varResult)) {
                                $varDataContent = null;
                                $varData[$i] = $row;
                                $j = 0;
                                foreach($varData[$i] as $key => $value)
                                    {
                                    $varData[$i][$key] = $value;
//                                    echo "<br><br><br>";
//                                    var_dump($key);
//                                    var_dump($value);

                                    $varData[$i][$key] = null;
                                    switch($varFieldType[$j++])
                                        {
                                        case 'bool':
                                            $varData[$i][$key] = self::getBooleanConvertion($varUserSession, $value);
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
                                //var_dump($varDataContent);
                                //$varData[$i] = $varDataContent;
                                $i++;
                                }
                            //---> [PERF Q4] Persistent connection kept open for reuse (no per-query pg_close).
                            }
                        else
                            {
                            //---> [PERF Q1] Now that the pre-query "SELECT 1" probe is removed, availability
                            //     is enforced here: a failed connection raises a clean, logged error instead
                            //     of silently returning an empty result set.
                            throw new \Exception('Database connection is not available');
                            }

                        $varReturn['data'] = $varData;
                        $varReturn['notice'] = $varNotice;
                        $varReturn['rowCount']=$i;
                        }
                    else
                        {
                        //dd($varConfig);
                        $varDataTemp = self::getArrayFromQueryExecutionDataFetch_UsingLaravelConnection($varUserSession, $varSQLQuery);
                        $varReturn['data'] = $varDataTemp['data'];
                        $varReturn['notice'] = $varDataTemp['notice'];
                        $varReturn['rowCount'] = $varDataTemp['rowCount'];                        
                        }
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
        | ▪ Method Name     : getBooleanConvertion                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-05-03                                                                                           |
        | ▪ Creation Date   : 2023-05-03                                                                                           |
        | ▪ Description     : Mendapatkan konversi Boolean PHP dari data Boolean PostgreSQL (varData)                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varUserSession                                                                                           |
        |      ▪ (string) varSQLQuery                                                                                              |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array) $varDataFetch                                                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getBooleanConvertion($varUserSession, $varData)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Get Boolean Convertion From PostgreSQL To PHP');
                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----                    
                    $varReturn = true;
                    if ((strcmp($varData, 'f') == 0) OR ((boolean) $varData == false))
                        {
                        $varReturn = false;
                        }
                    //dd($varReturn);
                    return $varReturn;
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
        | ▪ Method Name     : getBuildStringLiteral_StoredProcedure                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000002                                                                                       |
        | ▪ Last Update     : 2020-08-28                                                                                           |
        | ▪ Description     : Mendapatkan Literasi String untuk StoredProcedure                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varStoredProcedureName ► Nama Stored Procedure                                                           |
        |      ▪ (array)  varData ► Data                                                                                           |
        |      ▪ (array)  varFieldReturn ► Return Field                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getBuildStringLiteral_StoredProcedure(
            $varUserSession, 
            string $varStoredProcedureName, array $varData, array $varReturnField = null)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);

            try {
                $varSysDataProcess =
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__,
                        'Get Build String Literal for Stored Procedure'
                        );

                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    //---> Parameter Reinitialization
                    if (!$varReturnField)
                        {
                        $varReturnField = ['*'];
                        }
                    
                    //---> Check data integrity
                    if ((!$varStoredProcedureName) OR (count($varReturnField) == 0))
                        {
                        throw new \Exception('Invalid data entry');
                        }
                    //---> Build SELECT
                    if ((count($varReturnField) == 1) && (strcmp($varReturnField[0], '*') == 0))
                        {
                        $varSQL = "SELECT * FROM ";
                        }
                    else
                        {
                        $varSQL = "SELECT ";
                        for ($i = 0; $i != count($varReturnField); $i++)
                            {
                            if ($i != 0)
                                {
                                $varSQL .= ", ";
                                }
                            $varSQL .= "\"".$varReturnField[$i]."\"";
                            }
                        $varSQL .= " FROM ";
                        }
                    //--->
                    $varTemp = explode('.', str_replace('"', '', $varStoredProcedureName));
                    $varSQL .= "\"".$varTemp[0]."\".\"".$varTemp[1]."\"";
                    //--->
                    $varSQL .= "(";
                    //--->
                    $varSpecialKeyword = ['NOW()'];
                    for ($i = 0; $i != count($varData); $i++)
                        {
                        if ($i != 0)
                            {
                            $varSQL .= ", ";
                            }
                        if (strcmp($varData[$i][1], 'point') == 0)
                            {
                            $varSQL .= (
                                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getStringLiteralConvertForVarChar(
                                    $varUserSession,
                                    $varData[$i][0]
                                    )
                                )."::point";                            
                            }                                    
                        elseif ((is_array($varData[$i][0]) == FALSE) && (strcmp(substr($varData[$i][0], 0, 1), '(')==0) && (strcmp(substr($varData[$i][0], strlen($varData[$i][0])-1, 1), ')')==0))
                            {
                            $varSQL .= $varData[$i][0]."::".$varData[$i][1];
                            }
                        elseif ((is_array($varData[$i][0]) == FALSE) && (in_array(strtoupper($varData[$i][0]), $varSpecialKeyword))) 
                            { 
                            $varSQL .= $varData[$i][0]."::".$varData[$i][1];
                            }
                        else
                            {
                            switch ($varData[$i][1])
                                {
                                case 'bigint':
                                    {
                                    if ((!$varData[$i][0]) OR (is_int($varData[$i][0]) == TRUE) OR (is_int((int) $varData[$i][0]) == TRUE))
                                        {
                                        $varSQL .= (
                                            \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getStringLiteralConvertForBigInteger(
                                                $varUserSession,
                                                $varData[$i][0]
                                                )
                                            )."::bigint";
                                        }
                                    else
                                        {
                                        throw new \Exception('Error');                                        
                                        }
                                    break;
                                    }
                                case 'bigint[]':
                                    {
                                    if (is_array($varData[$i][0])==FALSE)
                                        {
                                        $varSQL .= (
                                            \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getStringLiteralConvertForVarChar(
                                                $varUserSession,
                                                $varData[$i][0]
                                                )
                                            )."::bigint[]";                                
                                        }
                                    else
                                        {
                                        $varSQL .= "'{";
                                        for ($j=0, $jMax=count($varData[$i][0]); $j!=$jMax; $j++)
                                            {
                                            if ($j>0) {
                                                $varSQL .= ", ";                                        
                                                }
                                            $varSQL .= $varData[$i][0][$j];
                                            }
                                        $varSQL .= "}'::bigint[]";
                                        }
                                    break;
                                    }
                                case 'boolean':
                                    {
                                    $varSQL .= (
                                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getStringLiteralConvertForVarChar(
                                            $varUserSession,
                                            ($varData[$i][0] == null ? null : ($varData[$i][0] == true ? 'TRUE' : 'FALSE'))
                                            )
                                        )."::boolean";
                                    break;
                                    }
                                case 'bytea':
                                    {
                                    $varSQL .= (
                                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getStringLiteralConvertForBytea(
                                            $varUserSession,
                                            $varData[$i][0]
                                            )
                                        )."::bytea";
                                    break;
                                    }
                                case 'cidr':
                                    {
                                    $varSQL .= (
                                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getStringLiteralConvertForVarChar(
                                            $varUserSession,
                                            $varData[$i][0]
                                            )
                                        )."::cidr";
                                    break;
                                    }
                                case 'character varying':
                                case 'varchar':
                                    {
                                    $varSQL .= (
                                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getStringLiteralConvertForVarChar(
                                            $varUserSession,
                                            $varData[$i][0]
                                            )
                                        )."::varchar";
                                    break;
                                    }
                                case 'character varying[]':
                                case 'varchar[]':
                                    {
                                    $varSQL .= (
                                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getStringLiteralConvertForVarChar(
                                            $varUserSession,
                                            $varData[$i][0]
                                            )
                                        )."::varchar[]";
                                    break;
                                    }
                                case 'date':
                                    {
                                    $varSQL .= (
                                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getStringLiteralConvertForVarChar(
                                            $varUserSession,
                                            $varData[$i][0]
                                            )
                                        )."::date";
                                    break;
                                    }
                                case 'interval':
                                    {
                                    $varSQL .= (
                                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getStringLiteralConvertForVarChar(
                                            $varUserSession,
                                            $varData[$i][0]
                                            )
                                        )."::interval";
                                    break;
                                    }
                                case 'numeric':
                                    {
                                    if ((!$varData[$i][0]) OR (is_numeric($varData[$i][0]) == TRUE))
                                        {
                                        $varSQL .= (
                                            \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getStringLiteralConvertForVarChar(
                                                $varUserSession,
                                                $varData[$i][0]
                                                )
                                            )."::numeric";
                                        }
                                    else
                                        {
                                        throw new \Exception('Error');
                                        }
                                    break;
                                    }
                                case 'json':
                                    {
                                    $varSQL .= (
                                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getStringLiteralConvertForVarChar(
                                            $varUserSession,
                                            $varData[$i][0]
                                            )
                                        )."::json";
                                    break;
                                    }
                                case 'smallint':
                                    {
                                    if ((!$varData[$i][0]) OR (is_int($varData[$i][0]) == TRUE) OR (is_int((int) $varData[$i][0]) == TRUE))
                                        {
                                        $varSQL .= (
                                            \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getStringLiteralConvertForSmallInteger(
                                                $varUserSession,
                                                $varData[$i][0]
                                                )
                                            )."::smallint";
                                        }
                                    else
                                        {
                                        throw new \Exception('Error');                                        
                                        }
                                    break;
                                    /*
                                    if((!$varData[$i][0]) OR (is_int($varData[$i][0]) == TRUE))
                                        {
                                        $varSQL .= (\App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getStringLiteralConvertForBigInteger($varUserSession, $varData[$i][0]))."::smallint";
                                        }
                                    else
                                        {throw new \Exception('Error');}
                                    break;
                                     * 
                                     */
                                    }
                                case 'timestamp without time zone':
                                case 'timestamp':
                                    {
                                    $varSQL .= (\App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getStringLiteralConvertForVarChar($varUserSession, $varData[$i][0]))."::timestamp";
                                    break;
                                    }
                                case 'timestamp with time zone':
                                case 'timestamptz':
                                    {
                                    $varSQL .= (\App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getStringLiteralConvertForVarChar($varUserSession, $varData[$i][0]))."::timestamptz";
                                    break;
                                    }
                                default:
                                    {
                                    $varSQL .= (\App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getStringLiteralConvertForVarChar($varUserSession, $varData[$i][0]))."::".$varData[$i][1];
                                    break;
                                    }
                                }
                            }
                        }
                    //--->
                    $varSQL .= ");";
                    
                    $varReturn =
                        $varSQL;
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

            return
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);            
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getCurrentDateTimeTZ                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-08-28                                                                                           |
        | ▪ Creation Date   : 2020-08-28                                                                                           |
        | ▪ Description     : Mendapatkan Tanggal dan Waktu saat ini dari database                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varUserSession                                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getCurrentDateTimeTZ($varUserSession)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Get date and time');
                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    if(self::getStatusAvailability($varUserSession)==false)
                        {
                        throw new \Exception('Database not available');
                        }
                    $varDataFetch = \Illuminate\Support\Facades\DB::select('SELECT NOW();');
                    foreach($varDataFetch as $row)
                        {
                        $varData = (array) $row;
                        }
                    $varReturn = $varData['now'];
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
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
        | ▪ Method Name     : getCurrentUnixTime                                                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-08-28                                                                                           |
        | ▪ Description     : Mendapatkan UnixTime saat ini dari database                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varUserSession                                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getCurrentUnixTime($varUserSession)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Get date and time');
                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    if(self::getStatusAvailability($varUserSession)==false)
                        {
                        throw new \Exception('Database not available');
                        }
                    $varDataFetch = \Illuminate\Support\Facades\DB::select('SELECT "SchSysConfig"."FuncSys_General_GetUnixTime"(NOW()) AS "UnixTime";');
                    foreach($varDataFetch as $row)
                        {
                        $varData = (array) $row;
                        }
                    $varReturn = $varData['UnixTime'];
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
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
        | ▪ Method Name     : getCurrentYear                                                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-08-28                                                                                           |
        | ▪ Description     : Mendapatkan Tahun saat ini dari database                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varUserSession                                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getCurrentYear($varUserSession)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Get date and time');
                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    if(self::getStatusAvailability($varUserSession)==false)
                        {
                        throw new \Exception('Database not available');
                        }
                    $varDataFetch = \Illuminate\Support\Facades\DB::select("SELECT EXTRACT('YEAR' FROM NOW())::smallint AS \"CurrentYear\";");
                    foreach($varDataFetch as $row)
                        {
                        $varData = (array) $row;
                        }
                    $varReturn = $varData['CurrentYear'];
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
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
        | ▪ Method Name     : getStatusAvailability                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000002                                                                                       |
        | ▪ Last Update     : 2020-07-26                                                                                           |
        | ▪ Description     : Mendapatkan status ketersediaan reseource PostgreSQL                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (boolean) varReturn                                                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getStatusAvailability($varUserSession)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, false, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Check PostgreSQL database availability to accept request');
                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    if(!$varDataFetch = \Illuminate\Support\Facades\DB::select('SELECT 1;'))
                        {
                        throw new \Exception("Error");
                        }
                    $varReturn = true;
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Success');
                    }
                catch (\Exception $ex) {
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Failed, PostgreSQL database connection not available to accept request. Please to check environment configuration, '. $ex->getMessage());
                    }
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
                } 
            catch (\Exception $ex) {
                }
            return \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getSQLSyntax_Source_NumberArrayToBigIntArray                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-08-05                                                                                           |
        | ▪ Creation Date   : 2022-08-05                                                                                           |
        | ▪ Description     : Mendapatkan SQL Syntax sebagai sumber data yang berasal dari Array Number PHP menjadi Array BigInt   |
        |                     Postgre                                                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varUserSession                                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getSQLSyntax_Source_NumberArrayToBigIntArray($varUserSession, array $varJSONArray)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, '', __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Get SQLSyntax Source : PHP Number Array To PostgreSQL BigInt Array');
                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    for($i=0, $iMax=count($varJSONArray); $i != $iMax; $i++)
                        {
                        if ($i!=0)
                            {
                            $varReturn .= ',';
                            }
                        $varReturn .= $varJSONArray[$i];
                        }
                    $varReturn = '(SELECT \'{'.$varReturn.'}\'::bigint[])';
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
        | ▪ Method Name     : getQueryExecution                                                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000003                                                                                       |
        | ▪ Last Update     : 2020-10-19                                                                                           |
        | ▪ Creation Date   : 2020-10-19                                                                                           |
        | ▪ Description     : Mendapatkan data dari database sesuai syntax query (varSQLQuery)                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varUserSession                                                                                           |
        |      ▪ (string) varSQLQuery                                                                                              |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array) varReturn                                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getQueryExecution($varUserSession, $varSQLQuery)
            {
            /*
            if(stristr($varSQLQuery, 'Func_GetData_APIWebToken_ByUserSessionID'))
                {
                dd($varSQLQuery);
                }
            */
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Get Query Execution');
                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    if (!$varSQLQuery)
                        {
                        throw
                            new \Exception('Incorrect SQL syntax');
                        }
                    else
                        {
                        $varSQLQuery = ltrim(str_replace("\n", "" , $varSQLQuery));

                        //echo $varSQLQuery."<br><br>";
                        //---> [PERF Q1] Dropped the "SELECT 1" availability probe (getStatusAvailability)
                        //     to remove one DB round-trip per query. Connectivity is now enforced at the
                        //     real pg_pconnect() below (getArrayFromQueryExecutionDataFetch_UsingPGSQLConnection),
                        //     which throws 'Database connection is not available' when the connection fails.
                            //---> [PERF Q3] Dropped the pre-query isValid_SQLSyntax() round-trip.
                            //     That server-side probe only ran PREPARE/DEALLOCATE to test parseability
                            //     (not a security gate) and was redundant with executing the query. An
                            //     invalid statement is now caught at the real pg_query() below, which raises
                            //     'Incorrect SQL syntax'. (isValid_SQLSyntax() is kept for its other callers.)
                                $varReturn['process']['DBMS']['executionTime']['interval'] = NULL;

                                //---> Inisialisasi [Process][StartDateTime]
                                //---> [PERF Q1] Removed the redundant "SELECT NOW();" DB round-trip.
                                //     The start timestamp is taken from the PHP clock (new \DateTime()) below;
                                //     the previously-fetched SQL NOW() value was discarded (dead work).
                                $varReturn['process']['DBMS']['executionTime']['startDateTimeTZ'] =
                                    \App\Helpers\ZhtHelper\General\Helper_DateTime::getTimeStampTZConvert_PHPDateTimeToDateTimeTZString(
                                        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                                        (new \DateTime())
                                        );

                                //---> Inisialisasi [Data], [RowCount], [Notice]
                                //$varDataTemp = self::getArrayFromQueryExecutionDataFetch_UsingLaravelConnection($varUserSession, $varSQLQuery);
                                $varDataTemp = 
                                    self::getArrayFromQueryExecutionDataFetch_UsingPGSQLConnection(
                                        $varUserSession,
                                        $varSQLQuery
                                        );

                                $varReturn['data'] = $varDataTemp['data'];
                                $varReturn['rowCount'] = $varDataTemp['rowCount'];
                                $varReturn['notice'] = $varDataTemp['notice'];

                                unset($varDataTemp);
                                
                                //---> Inisialisasi : varReturn[process][DBMS][finishDateTimeTZ]
                                //---> [PERF Q1] Removed the redundant "SELECT NOW() ... ::interval" DB round-trip.
                                //     The finish timestamp is taken from the PHP clock (new \DateTime()) below and the
                                //     interval is computed in PHP; the previously-fetched SQL values were discarded.
                                $varReturn['process']['DBMS']['executionTime']['finishDateTimeTZ'] =
                                    \App\Helpers\ZhtHelper\General\Helper_DateTime::getTimeStampTZConvert_PHPDateTimeToDateTimeTZString(
                                        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                                        (new \DateTime())
                                        );

                                //---> Inisialisasi : varReturn[process][DBMS][executionInterval]
                                $varReturn['process']['DBMS']['executionTime']['interval'] =
                                     \App\Helpers\ZhtHelper\General\Helper_DateTime::getDifferenceOfDateTimeTZString(
                                        $varUserSession,
                                        $varReturn['process']['DBMS']['executionTime']['startDateTimeTZ'],
                                        $varReturn['process']['DBMS']['executionTime']['finishDateTimeTZ']
                                        );
                        }
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

            return
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getQueryExecutionDataFetch                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000002                                                                                       |
        | ▪ Last Update     : 2020-07-26                                                                                           |
        | ▪ Creation Date   : 2020-07-21                                                                                           |
        | ▪ Description     : Mengambil data dari database sesuai syntax query (varSQLQuery)                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varUserSession                                                                                           |
        |      ▪ (string) varSQLQuery                                                                                              |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array) $varDataFetch                                                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        private static function getQueryExecutionDataFetch($varUserSession, $varSQLQuery)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Fetch data from SQL syntax `'.$varSQLQuery.'`');
                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    //$varSQLQuery = preg_replace('/\s+/', '', $varSQLQuery);
                    $varSQLQuery = ltrim(str_replace("\n", "" , $varSQLQuery));

                    $varProfilerStartNs = hrtime(true);
                    try {
                        $varReturn = \Illuminate\Support\Facades\DB::select($varSQLQuery);
                        \App\Helpers\ZhtHelper\Logger\Helper_QueryProfiler::record(
                            'laravel',
                            $varSQLQuery,
                            (hrtime(true) - $varProfilerStartNs) / 1e6,
                            true,
                            null
                            );
                        }
                    catch (\Throwable $varProfilerEx) {
                        \App\Helpers\ZhtHelper\Logger\Helper_QueryProfiler::record(
                            'laravel',
                            $varSQLQuery,
                            (hrtime(true) - $varProfilerStartNs) / 1e6,
                            false,
                            $varProfilerEx->getMessage()
                            );
                        throw $varProfilerEx;
                        }
                    
                    //dd(((array) \Illuminate\Support\Facades\DB::getConnections())['pgsql']);
                    //$connection = \Illuminate\Support\Facades\DB::connection();
//(array) (\Illuminate\Support\Facades\DB::getConnections())['pgsql'];
                    //dd($connection);
                    
                    
                    
                    ///$varPDOConnection = (((array) \Illuminate\Support\Facades\DB::getConnections())['pgsql']->getRawPdo());
                    
                    //dd(((array) \Illuminate\Support\Facades\DB::getConnections())['pgsql']);
                    
                    //dd($varPDOConnection);
                    
                    //pg_last_notice($connection);
                    
                    
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
        | ▪ Method Name     : getQueryExecutionDataFetch_DataOnly_All                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0001.0000000                                                                                       |
        | ▪ Last Update     : 2020-09-15                                                                                           |
        | ▪ Description     : Mendapatkan Literasi String untuk Query pengambilan Data Only tanpa menyertakan Field System         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varSchemaName ► Schema Name                                                                              |
        |      ▪ (string) varTableName ► Table Name                                                                                |
        |      ▪ (bool)   varStatusAuthenticatedDataOnly ► Status Authenticated Data Only                                          |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getQueryExecutionDataFetch_DataOnly_All($varUserSession, string $varSchemaName, string $varTableName, bool $varStatusAuthenticatedDataOnly = null)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Get a literal build string to retrieve recorded field data only');
                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    if($varStatusAuthenticatedDataOnly === null)
                        {
                        $varStatusAuthenticatedDataOnly = true;
                        }
                    $varSQL = '
                        SELECT 
                            "FuncSys_General_GetStringLiteralFieldSelect_DataOnly_All" AS "QueryBuilderString"
                        FROM 
                            "SchSysConfig"."FuncSys_General_GetStringLiteralFieldSelect_DataOnly_All"(
                                \''.$varSchemaName.'\'::varchar,
                                \''.$varTableName.'\'::varchar,
                                '.($varStatusAuthenticatedDataOnly == true ? 'TRUE' : 'FALSE').'::boolean
                                )
                        ';
                    //echo $varSQL."<br><br>";
                    $varData = self::getQueryExecution($varUserSession, $varSQL);
                    $varSQL = $varData['data'][0]['QueryBuilderString'];
                    //--->
                    //echo $varSQL."<br><br>";
                    $varData = self::getQueryExecution($varUserSession, $varSQL);
                    $varReturn = $varData;
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
        | ▪ Method Name     : getQueryExecutionDataFetch_DataOnly_Filtered                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-10-05                                                                                           |
        | ▪ Description     : Mendapatkan Literasi String untuk Query pengambilan Data Only tanpa menyertakan Field System         |
        |                     berdasarkan kondisi Filter (varFilterCondition)                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varSchemaName ► Schema Name                                                                              |
        |      ▪ (string) varTableName ► Table Name                                                                                |
        |      ▪ (string) varFilterCondition ► Kondisi Filter                                                                      |
        |      ▪ (bool)   varStatusAuthenticatedDataOnly ► Status Authenticated Data Only                                          |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getQueryExecutionDataFetch_DataOnly_Filtered($varUserSession, string $varSchemaName, string $varTableName, string $varFilterCondition = null, bool $varStatusAuthenticatedDataOnly = null)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Get a literal build string to retrieve recorded filtered field data only');
                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    if($varStatusAuthenticatedDataOnly === null)
                        {
                        $varStatusAuthenticatedDataOnly = true;
                        }
                    $varSQL = '
                        SELECT 
                            "FuncSys_General_GetStringLiteralFieldSelect_DataOnly_All" AS "QueryBuilderString"
                        FROM 
                            "SchSysConfig"."FuncSys_General_GetStringLiteralFieldSelect_DataOnly_All"(
                                \''.$varSchemaName.'\'::varchar,
                                \''.$varTableName.'\'::varchar,
                                '.($varStatusAuthenticatedDataOnly == true ? 'TRUE' : 'FALSE').'::boolean
                                )
                        ';
                    //echo $varSQL."<br><br>";
                    $varData = self::getQueryExecution($varUserSession, $varSQL);
                    $varSQL = '
                        SELECT
                            * 
                        FROM 
                            ('.$varData['data'][0]['QueryBuilderString'].') AS "SubSQL"
                        WHERE
                            1 = 1
                            '.($varFilterCondition ? ' AND ' .$varFilterCondition : '').'
                        ';
                    //--->
                    echo $varSQL."<br><br>";
                    //$varData = self::getQueryExecution($varUserSession, $varSQL);
                    $varReturn = $varData;
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
        | ▪ Method Name     : getQueryExecutionDataFetch_DataOnly_Specific                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-08-31                                                                                           |
        | ▪ Description     : Mendapatkan Literasi String untuk Query pengambilan Data Only tanpa menyertakan Field System sesuai  |
        |                     Record ID tertentu (varRecordID)                                                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varRecordID ► Record ID                                                                                  |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getQueryExecutionDataFetch_DataOnly_Specific($varUserSession, int $varRecordID)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Get a literal build string to retrieve recorded filed data only');
                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    $varSQL = '
                        SELECT 
                            "FuncSys_General_GetStringLiteralFieldSelect_DataOnly_Specific" AS "QueryBuilderString"
                        FROM 
                            "SchSysConfig"."FuncSys_General_GetStringLiteralFieldSelect_DataOnly_Specific"('.$varRecordID.'::bigint)
                        ';
                    $varData = self::getQueryExecution($varUserSession, $varSQL);
                    $varSQL = $varData['data'][0]['QueryBuilderString'];
                    //--->
                    //echo $varSQL."<br><br>";
                    $varData = self::getQueryExecution($varUserSession, $varSQL);
                    $varReturn = $varData;
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
        | ▪ Method Name     : getQueryExecutionDataFetch_DataOnly_SpecificWithFacade                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-07-06                                                                                           |
        | ▪ Description     : Mendapatkan Literasi String untuk Query pengambilan Data Only berserta Facade ReferenceText untuk    |
        |                     field ReferenceID tanpa menyertakan Field System sesuai Record ID tertentu (varRecordID)             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varRecordID ► Record ID                                                                                  |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getQueryExecutionDataFetch_DataOnly_SpecificWithFacade($varUserSession, int $varRecordID)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Get a literal build string to retrieve recorded filed data only');
                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    $varSQL = '
                        SELECT 
                            "FuncSys_General_GetStringLiteralFieldSelect_DataOnly_SpcfFacade" AS "QueryBuilderString"
                        FROM 
                            "SchSysConfig"."FuncSys_General_GetStringLiteralFieldSelect_DataOnly_SpcfFacade"('.$varRecordID.'::bigint)
                        ';
                    $varData = self::getQueryExecution($varUserSession, $varSQL);
                    $varSQL = $varData['data'][0]['QueryBuilderString'];
                    //--->
                    //echo $varSQL."<br><br>";
                    $varData = self::getQueryExecution($varUserSession, $varSQL);
                    $varReturn = $varData;
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
        | ▪ Method Name     : getStringLiteralConvertForBigInteger                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-08-25                                                                                           |
        | ▪ Creation Date   : 2020-08-25                                                                                           |
        | ▪ Description     : Mendapatkan Literasi String konversi untuk Big Integer (varData)                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varData ► Data                                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getStringLiteralConvertForBigInteger($varUserSession, $varData)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Get String Literal Convertion for BigInteger');
                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    if ((strcmp($varData, '0')==0))
                        {
                        $varReturn = '0';
                        }
                    else
                        {
                        if ((!$varData) || (strcmp($varData, '') == 0) || (strcmp(strtolower($varData), 'null') ==0) ) 
                            {
                            $varReturn = 'NULL';
                            }
                        else
                            {
                            $varReturn = $varData;
                            }
                        }
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
        | ▪ Method Name     : getStringLiteralConvertForBytea                                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-08-01                                                                                           |
        | ▪ Last Update     : 2022-08-01                                                                                           |
        | ▪ Description     : Mendapatkan Literasi String konversi untuk Byte Array (varData)                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (mixed)  varData ► Data                                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getStringLiteralConvertForBytea($varUserSession, $varData)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Get String Literal Convertion for VarChar');
                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    if((!$varData) || (strcmp($varData, '')==0) || (strcmp(strtolower($varData), 'null')==0)) 
                        {
                        $varReturn = 'NULL';
                        }
                    else
                        {
                        $varReturn = '\''.self::getStringLiteralEscapedCharacter_SingleQuote($varUserSession,$varData).'\'';
//                        $varReturn = '\''.pg_escape_bytea($varUserSession,$varData).'\'';
                        }
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
        | ▪ Method Name     : getStringLiteralConvertForInteger                                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-05-27                                                                                           |
        | ▪ Creation Date   : 2024-05-27                                                                                           |
        | ▪ Description     : Mendapatkan Literasi String konversi untuk Integer (varData)                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varData ► Data                                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getStringLiteralConvertForInteger($varUserSession, $varData)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Get String Literal Convertion for BigInteger');
                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    if ((strcmp($varData, '0')==0))
                        {
                        $varReturn = '0';
                        }
                    else
                        {
                        if((!$varData) || (strcmp($varData, '')==0) || (strcmp(strtolower($varData), 'null')==0)) 
                            {
                            $varReturn = 'NULL';
                            }
                        else
                            {
                            $varReturn = $varData;
                            }                        
                        }
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
        | ▪ Method Name     : getStringLiteralConvertForSmallInteger                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-05-27                                                                                           |
        | ▪ Creation Date   : 2024-05-27                                                                                           |
        | ▪ Description     : Mendapatkan Literasi String konversi untuk Big Integer (varData)                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varData ► Data                                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getStringLiteralConvertForSmallInteger($varUserSession, $varData)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Get String Literal Convertion for BigInteger');
                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    if ((strcmp($varData, '0')==0))
                        {
                        $varReturn = '0';
                        }
                    else
                        {
                        if((!$varData) || (strcmp($varData, '')==0) || (strcmp(strtolower($varData), 'null')==0)) 
                            {
                            $varReturn = 'NULL';
                            }
                        else
                            {
                            $varReturn = $varData;
                            }
                        }
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
        | ▪ Method Name     : getStringLiteralConvertForVarChar                                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-08-25                                                                                           |
        | ▪ Description     : Mendapatkan Literasi String konversi untuk Variable Character (varData)                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varData ► Data                                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getStringLiteralConvertForVarChar($varUserSession, $varData)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Get String Literal Convertion for VarChar');
                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    if ((!$varData) || (strcmp($varData, '')==0) || (strcmp(strtolower($varData), 'null')==0)) 
                        {
                        $varReturn =
                            'NULL';
                        }
                    else
                        {
                        $varReturn =
                            '\''.self::getStringLiteralEscapedCharacter_SingleQuote($varUserSession,$varData).'\'';
                        }
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

            return
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getStringLiteralEscapedCharacter_SingleQuote                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-08-25                                                                                           |
        | ▪ Description     : Mendapatkan Literasi String untuk Escaped Character Single Quote dari data (varData)                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varData ► Data                                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getStringLiteralEscapedCharacter_SingleQuote($varUserSession, $varData)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Get String Literal Escaped Character for Single Quote');
                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    $varReturn = str_replace('\'', '\'\'', $varData);
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
        | ▪ Method Name     : isValid_SQLSyntax                                                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-10-19                                                                                           |
        | ▪ Description     : Mengecek apakah SQL Syntax (varSQL) sudah valid atau tidak                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varSQL ► SQL Syntax                                                                                      |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (bool)   varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function isValid_SQLSyntax($varUserSession, $varSQL)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Check if SQL is valid');
                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    $varReturn = ((array)((\Illuminate\Support\Facades\DB::select(
                        self::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchSysConfig.FuncSys_General_IsValid_SQLSyntax',
                            [
                                [$varSQL, 'varchar']
                            ]
                            )
                        ))[0]))['FuncSys_General_IsValid_SQLSyntax'];
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
        | ▪ Method Name     : setStatementExecution                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-05-05                                                                                           |
        | ▪ Description     : Mengeksekusi SQL Statement (DDL)                                                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varSQL ► SQL Syntax                                                                                      |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (bool)   varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function setStatementExecution($varUserSession, $varSQL)
            {
            $varReturn = \Illuminate\Support\Facades\DB::statement($varSQL);
            return $varReturn;
            }
        }
    }

?>
