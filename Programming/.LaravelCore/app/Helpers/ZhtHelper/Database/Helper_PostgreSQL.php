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
        | ▪ Method Name     : init                                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-07-09                                                                                           |
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
            \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogIndentationIncrease(000000);
            \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutput(000000, __CLASS__, '('.__FUNCTION__.') Class initializing');
            self::$varNameSpace=get_class();
            \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogIndentationDecrease(000000);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDateTimeTZ                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-07-13                                                                                           |
        | ▪ Description     : Mendapatkan Tanggal dan Waktu dari database                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getDateTimeTZ()
            {
            $varDataFetch = DB::select('SELECT NOW();');
            foreach($varDataFetch as $row)
                {
                $varData = (array) $row;
                }
            $varReturn = $varData['now'];
            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getStatusAvailability                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-07-10                                                                                           |
        | ▪ Description     : Mendapatkan status ketersediaan reseource PostgreSQL                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (boolean) varReturn                                                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getStatusAvailability()
            {
            \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogIndentationIncrease(000000);
            \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutput(000000, __CLASS__, '('.__FUNCTION__.') Check PostgreSQL database availability to accept request');
            $varReturn = true;
            try {
                if(!$varDataFetch = DB::select('SELECT 1;'))
                    {
                    throw new \Exception("Error");
                    }
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLastLogOuputAppend(000000, 'Success');
                }
            catch (\Exception $ex) {
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogError(000000, __CLASS__, '('.__FUNCTION__.') PostgreSQL database connection not available to accept request. Please to check environment configuration');
                $varReturn = false;
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLastLogOuputAppend(000000, 'Failed');
                }
            \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogIndentationDecrease(000000);
            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getQueryExecution                                                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-07-10                                                                                           |
        | ▪ Description     : Mendapatkan data dari database sesuai syntax query (varSQLQuery)                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varSQLQuery                                                                                              |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array) varReturn                                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getQueryExecution($varSQLQuery)
            {
            \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogIndentationIncrease(000000);
            \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutput(000000, __CLASS__, '('.__FUNCTION__.') Execute SQL syntax `'.$varSQLQuery.'` to PostgreSQL database');
            $varSQLQuery = ltrim(str_replace("\n", "" , $varSQLQuery));
            if(self::getStatusAvailability()==true)
                {
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogIndentationIncrease(000000);
                //---> Inisialisasi [Process][StartDateTime]
                $varDataFetch = self::getQueryExecutionDataFetch("SELECT NOW();");
                //$varDataFetch = DB::select("SELECT NOW();");
                foreach($varDataFetch as $row)
                    {
                    $varData[] = (array) $row;
                    }
                $varReturn['Process']['StartDateTime']=$varData[0]['now'];
                unset($varData);
                //---> Inisialisasi [Data], [RowCount]
                $i=0;
                $varDataFetch = self::getQueryExecutionDataFetch($varSQLQuery);
                $varData = [];
                foreach($varDataFetch as $row)
                    {
                    $varData[] = (array) $row;
                    //str_replace("world","Peter","Hello world!");
                    //$varData[] = str_replace("\\u20ac", "€", ((array) $row));
                    $i++;
                    }
                $varReturn['Data'] = $varData;
                $varReturn['RowCount']=$i;
                unset($varData);
                //---> Inisialisasi [Process][StartDateTime]
                $varDataFetch = self::getQueryExecutionDataFetch(
                    "
                    SELECT
                        \"SubSQL\".now AS \"FinishDateTime\",
                        (\"SubSQL\".now - '".$varReturn['Process']['StartDateTime']."')::interval AS \"ExecutionTime\"
                    FROM
                        (
                        SELECT NOW()
                        ) AS \"SubSQL\"
                    "
                    );
                foreach($varDataFetch as $row)
                    {
                    $varData[] = (array) $row;
                    }
                $varReturn['Process']['FinishDateTime']=$varData[0]['FinishDateTime'];
                $varReturn['Process']['ExecutionTime']=$varData[0]['ExecutionTime'];
                unset($varData);
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogIndentationDecrease(000000);
                }
            else
                {
                $varReturn = null;
                }
            \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogIndentationDecrease(000000);
            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getQueryExecutionDataFetch                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-07-10                                                                                           |
        | ▪ Description     : Mengambil data dari database sesuai syntax query (varSQLQuery)                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varSQLQuery                                                                                              |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array) $varDataFetch                                                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        private static function getQueryExecutionDataFetch($varSQLQuery)
            {
            \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogIndentationIncrease(000000);
            //$varSQLQuery = preg_replace('/\s+/', '', $varSQLQuery);
            $varSQLQuery = ltrim(str_replace("\n", "" , $varSQLQuery));
            \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutput(000000, __CLASS__, '('.__FUNCTION__.') Fetch data from SQL syntax `'.$varSQLQuery.'`');
            $varDataFetch = DB::select($varSQLQuery);
            \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogIndentationDecrease(000000);
            return $varDataFetch;
            }
        }
    }

?>