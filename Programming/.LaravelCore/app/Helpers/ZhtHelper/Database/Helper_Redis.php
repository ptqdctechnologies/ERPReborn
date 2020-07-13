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
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : Helper_Redis                                                                                                 |
    | ▪ Description : Menangani Database Non SQL Redis                                                                             |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class Helper_Redis
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
        | ▪ Last Update     : 2020-07-10                                                                                           |
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
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : delete                                                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-07-13                                                                                           |
        | ▪ Description     : Menghapus data berdasarkan kata kunci (varKey)                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varKey ► Kata Kunci                                                                                      |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (boolean) varReturn                                                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function delete($varKey)
            {
            \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogIndentationIncrease(000000);
            \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutput(000000, __CLASS__, '('.__FUNCTION__.') Retrieve data stored with key `'.$varKey.'`');
            $varReturn = true;
            if(self::getStatusAvailability()==true)
                {
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogIndentationIncrease(000000);
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogIndentationIncrease(000000);
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutput(000000, __CLASS__, '('.__FUNCTION__.') Retrieve data stored with key `'.$varKey.'`');
                $ObjRedis = new \Illuminate\Support\Facades\Redis();
                $varConnRedis = $ObjRedis::connection();
                if($varConnRedis->get($varKey))
                    {
                    $varConnRedis->unlink($varKey);
                    }
                unset($varConnRedis);
                unset($ObjRedis);
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogIndentationDecrease(000000);
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogIndentationDecrease(000000);
                }
            \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogIndentationDecrease(000000);
            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDateTimeTZ                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-07-13                                                                                           |
        | ▪ Description     : Mendapatkan tanggal dan waktu dari Redis                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getDateTimeTZ()
            {
            \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogIndentationIncrease(000000);
            \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutput(000000, __CLASS__, '('.__FUNCTION__.') Get current date and time of Redis');
            $varReturn = null;
            if(self::getStatusAvailability()==true)
                {
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogIndentationIncrease(000000);
                $ObjRedis = new \Illuminate\Support\Facades\Redis();
                $varConnRedis = $ObjRedis::connection();
                $varReturn = $varConnRedis->time();
                unset($varConnRedis);
                unset($ObjRedis);
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogIndentationDecrease(000000);
                }
            \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogIndentationDecrease(000000);
            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getInfo                                                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-07-13                                                                                           |
        | ▪ Description     : Mendapatkan informasi umum dari Redis                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getInfo()
            {
            \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogIndentationIncrease(000000);
            \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutput(000000, __CLASS__, '('.__FUNCTION__.') Get general information of Redis');
            $varReturn = null;
            if(self::getStatusAvailability()==true)
                {
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogIndentationIncrease(000000);
                $ObjRedis = new \Illuminate\Support\Facades\Redis();
                $varConnRedis = $ObjRedis::connection();
                $varReturn = $varConnRedis->info();
                unset($varConnRedis);
                unset($ObjRedis);
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogIndentationDecrease(000000);
                }
            \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogIndentationDecrease(000000);
            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getStatusAvailability                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-07-10                                                                                           |
        | ▪ Description     : Mendapatkan status ketersediaan reseource Redis                                                      |
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
            \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutput(000000, __CLASS__, '('.__FUNCTION__.') Check Redis database availability to accept request');
            $varReturn = true;
            $ObjRedis = new \Illuminate\Support\Facades\Redis();
            try {
                if(!$varConnRedis = $ObjRedis::connection())
                    {
                    throw new \Exception("Error");
                    }
                unset($varConnRedis);
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLastLogOuputAppend(000000, 'Success');
                } 
            catch (\Exception $ex) {
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogError(000000, __CLASS__, '('.__FUNCTION__.') Redis database connection not available to accept request. Please to check environment configuration');
                $varReturn = false;
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLastLogOuputAppend(000000, 'Failed');
                }
            unset($ObjRedis);
            \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogIndentationDecrease(000000);
            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getTTL                                                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-07-13                                                                                           |
        | ▪ Description     : Mendapatkan TTL data berdasarkan kata kunci (varKey)                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varKey ► Kata Kunci                                                                                      |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getTTL($varKey)
            {
            \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogIndentationIncrease(000000);
            \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutput(000000, __CLASS__, '('.__FUNCTION__.') Get TTL of key `'.$varKey.'`');
            $varReturn = null;
            if(self::getStatusAvailability()==true)
                {
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogIndentationIncrease(000000);
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogIndentationIncrease(000000);
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutput(000000, __CLASS__, '('.__FUNCTION__.') Get TTL of key `'.$varKey.'`');
                $ObjRedis = new \Illuminate\Support\Facades\Redis();
                $varConnRedis = $ObjRedis::connection();
                $varReturn = $varConnRedis->ttl($varKey);
                unset($varConnRedis);
                unset($ObjRedis);
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogIndentationDecrease(000000);
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogIndentationDecrease(000000);
                }
            \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogIndentationDecrease(000000);
            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getValue                                                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-07-13                                                                                           |
        | ▪ Description     : Mendapatkan nilai yang tersimpan berdasarkan kata kunci (varKey)                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varKey ► Kata Kunci                                                                                      |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getValue($varKey)
            {
            \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogIndentationIncrease(000000);
            \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutput(000000, __CLASS__, '('.__FUNCTION__.') Retrieve data stored with key `'.$varKey.'`');
            $varReturn = null;
            if(self::getStatusAvailability()==true)
                {
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogIndentationIncrease(000000);
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogIndentationIncrease(000000);
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutput(000000, __CLASS__, '('.__FUNCTION__.') Retrieve data stored with key `'.$varKey.'`');
                $ObjRedis = new \Illuminate\Support\Facades\Redis();
                $varConnRedis = $ObjRedis::connection();
                $varReturn = $varConnRedis->get($varKey);
                unset($varConnRedis);
                unset($ObjRedis);
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogIndentationDecrease(000000);
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogIndentationDecrease(000000);
                }
            \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogIndentationDecrease(000000);
            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setValue                                                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-07-13                                                                                           |
        | ▪ Description     : Menyimpan data (varValue) berdasarkan kata kunci (varKey) dengan expiry time tertentu (varTTL)       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varKey ► Kata Kunci                                                                                      |
        |      ▪ (string) varValue ► Nilai                                                                                         |
        |      ▪ (int) varTTL ► Expiry Time (in seconds)                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function setValue($varKey, $varValue, $varTTL=null)
            {
            \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogIndentationIncrease(000000);
            \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutput(000000, __CLASS__, '('.__FUNCTION__.') Storing data value of `'.$varValue.'` with key `'.$varKey.'` '.($varTTL?' (will expired at '.$varTTL.' second(s))':''));
            $varReturn = false;
            if(self::getStatusAvailability()==true)
                {
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogIndentationIncrease(000000);
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogIndentationIncrease(000000);
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutput(000000, __CLASS__, '('.__FUNCTION__.') Storing data value of `'.$varValue.'` with key `'.$varKey.'` on Redis database');
                $ObjRedis = new \Illuminate\Support\Facades\Redis();
                $varConnRedis = $ObjRedis::connection();
                if($varTTL)
                    {
                    $varConnRedis->setEx($varKey, $varTTL, $varValue);
                    }
                else
                    {
                    $varConnRedis->set($varKey, $varValue);
                    }
                unset($varConnRedis);
                unset($ObjRedis);
                $varReturn = true;
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogIndentationDecrease(000000);
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogIndentationDecrease(000000);
                }
            \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogIndentationDecrease(000000);
            return $varReturn;
            }
        }
    }

?>