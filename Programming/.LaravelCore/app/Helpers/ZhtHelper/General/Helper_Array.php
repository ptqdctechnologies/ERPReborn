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
    | ▪ Class Name  : Helper_Array                                                                                                 |
    | ▪ Description : Menangani Array                                                                                              |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class Helper_Array
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
            self::$varNameSpace=get_class();
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getArrayValue                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-07-10                                                                                           |
        | ▪ Description     : Mendapatkan nilai dari suatu array (varDataArray) berdasarkan Pola Key (varArrayPattern)             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (array)  varDataArray ► Data Array                                                                                |
        |      ▪ (string) varArrayPattern ► Pola Key Array (harus bernotasi KEY1::KEY2::KEY3::...)                                 |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getArrayValue($varDataArray, $varArrayPattern)
            {
            $varReturn = null;
            if(self::isKeyExistOnSubArray(000000, $varDataArray, $varArrayPattern)==true)
                {
                $varArrayTemp=explode('::', $varArrayPattern);
                switch(count($varArrayTemp))
                    {
                    case 1:
                        $varReturn = $varDataArray[$varArrayTemp[0]];
                        break;
                    case 2:
                        $varReturn = $varDataArray[$varArrayTemp[0]][$varArrayTemp[1]];
                        break;
                    case 3:
                        $varReturn = $varDataArray[$varArrayTemp[0]][$varArrayTemp[1]][$varArrayTemp[2]];
                        break;
                    case 4:
                        $varReturn = $varDataArray[$varArrayTemp[0]][$varArrayTemp[1]][$varArrayTemp[2]][$varArrayTemp[3]];
                        break;
                    case 5:
                        $varReturn = $varDataArray[$varArrayTemp[0]][$varArrayTemp[1]][$varArrayTemp[2]][$varArrayTemp[3]][$varArrayTemp[4]];
                        break;
                    case 6:
                        $varReturn = $varDataArray[$varArrayTemp[0]][$varArrayTemp[1]][$varArrayTemp[2]][$varArrayTemp[3]][$varArrayTemp[4]][$varArrayTemp[5]];
                        break;
                    case 7:
                        $varReturn = $varDataArray[$varArrayTemp[0]][$varArrayTemp[1]][$varArrayTemp[2]][$varArrayTemp[3]][$varArrayTemp[4]][$varArrayTemp[5]][$varArrayTemp[6]];
                        break;
                    case 8:
                        $varReturn = $varDataArray[$varArrayTemp[0]][$varArrayTemp[1]][$varArrayTemp[2]][$varArrayTemp[3]][$varArrayTemp[4]][$varArrayTemp[5]][$varArrayTemp[6]][$varArrayTemp[7]];
                        break;
                    case 9:
                        $varReturn = $varDataArray[$varArrayTemp[0]][$varArrayTemp[1]][$varArrayTemp[2]][$varArrayTemp[3]][$varArrayTemp[4]][$varArrayTemp[5]][$varArrayTemp[6]][$varArrayTemp[7]][$varArrayTemp[8]];
                        break;
                    case 10:
                        $varReturn = $varDataArray[$varArrayTemp[0]][$varArrayTemp[1]][$varArrayTemp[2]][$varArrayTemp[3]][$varArrayTemp[4]][$varArrayTemp[5]][$varArrayTemp[6]][$varArrayTemp[7]][$varArrayTemp[8]][$varArrayTemp[9]];
                        break;
                    default:
                        $varReturn = null;
                        break;
                    }
                }
            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : isKeyExist                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2020-08-05                                                                                           |
        | ▪ Description     : Mengecek apakah suatu Key (varKey) ada pada suatu array (varData) dalam satu lapis pencarian         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varKey ► Key Array                                                                                       |
        |      ▪ (array)  varData ► Data Array                                                                                     |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function isKeyExist($varUserSession, $varKey, $varData)
            {
            $varReturn = false;
                       
            if($varData)
                {
                if (array_key_exists($varKey, $varData))
                    {
                    $varReturn = true;
                    }
                }
            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : isAssociativeArray                                                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2020-07-26                                                                                           |
        | ▪ Description     : Mengecek suatu array (varArrayData) termasuk Associative Array (Array yang memiliki key)             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varUserSession ► User Session                                                                            |
        |      ▪ (array)  varArrayData ► Data Array                                                                                |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function isAssociativeArray($varUserSession, array $varDataArray)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Is associative array');
                try {
                    if (array() === $varDataArray) 
                        {
                        $varReturn = false;
                        }
                    else
                        {
                        $varReturn = (array_keys($varDataArray) !== range(0, count($varDataArray) - 1));
                        }
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, ($varReturn==true ? 'True' : 'False'));
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
        | ▪ Method Name     : isKeyExistOnSubArray                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2020-08-05                                                                                           |
        | ▪ Description     : Mengecek apakah suatu Pola Key (varArrayPattern) ada pada suatu array (varData) dalam pencarian      |
        |                     multi lapisan                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varArrayPattern ► Pola Key Array (harus bernotasi KEY1::KEY2::KEY3::...)                                 |
        |      ▪ (array)  varData ► Data Array                                                                                     |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function isKeyExistOnSubArray($varUserSession, $varData, $varArrayPattern)
            {         
            $varReturn = false;
            $varArrayTemp=explode('::', $varArrayPattern);
            if(self::isKeyExist($varUserSession, $varArrayTemp[0], $varData)==true)
                {
                $varReturn = true;
                if(is_array($varData[$varArrayTemp[0]])==true)
                    {
                    $varArrayPatternNew='';
                    for($i=1; $i!=count($varArrayTemp); $i++)
                        {
                        if(strcmp($varArrayPatternNew, '')!=0)
                            {
                            $varArrayPatternNew.='::';
                            }
                        $varArrayPatternNew .= $varArrayTemp[$i];
                        }
                    if(strcmp($varArrayPatternNew, '')!=0)
                        {
                        if(self::isKeyExistOnSubArray($varUserSession, $varData[$varArrayTemp[0]], $varArrayPatternNew)==false)
                            {
                            $varReturn = false;
                            }                        
                        }
                    }
                }
            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : isSequentialArray                                                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2020-07-26                                                                                           |
        | ▪ Description     : Mengecek suatu array (varArrayData) termasuk Sequential Array (Array yang tidak memiliki key)        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varUserSession ► User Session                                                                            |
        |      ▪ (array)  varArrayData ► Data Array                                                                                |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function isSequentialArray($varUserSession, array $varDataArray)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Is sequential array');
                try {
                    if (array() === $varDataArray) 
                        {
                        $varReturn = true;
                        }
                    else
                        {
                        $varReturn = !(array_keys($varDataArray) !== range(0, count($varDataArray) - 1));
                        }
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, ($varReturn==true ? 'True' : 'False'));
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
        | ▪ Method Name     : setArrayValue                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-07-10                                                                                           |
        | ▪ Description     : Menyimpan nilai pada suatu array (varDataArray) berdasarkan Pola Key (varArrayPattern)               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (array)   varDataArray ► Data Array                                                                               |
        |      ▪ (string)  varArrayPattern ► Pola Key Array (harus bernotasi KEY1::KEY2::KEY3::...)                                |
        |      ▪ (string)  varValue ► Nilai                                                                                        |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (boolean) varReturn                                                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function setArrayValue(&$varDataArray, $varArrayPattern, $varValue)
            {
            $varArrayTemp=explode('::', $varArrayPattern);
            
            //var_dump($varDataArray);
            
            $varReturn = true;
            switch(count($varArrayTemp))
                {
                case 1:
                    $varDataArray[$varArrayTemp[0]]=$varValue;
                    break;
                case 2:
                    $varDataArray[$varArrayTemp[0]][$varArrayTemp[1]]=$varValue;
                    break;
                case 3:
                    $varDataArray[$varArrayTemp[0]][$varArrayTemp[1]][$varArrayTemp[2]]=$varValue;
                    break;
                case 4:
                    $varDataArray[$varArrayTemp[0]][$varArrayTemp[1]][$varArrayTemp[2]][$varArrayTemp[3]]=$varValue;
                    break;
                case 5:
                    $varDataArray[$varArrayTemp[0]][$varArrayTemp[1]][$varArrayTemp[2]][$varArrayTemp[3]][$varArrayTemp[4]]=$varValue;
                    break;
                case 6:
                    $varDataArray[$varArrayTemp[0]][$varArrayTemp[1]][$varArrayTemp[2]][$varArrayTemp[3]][$varArrayTemp[4]][$varArrayTemp[5]]=$varValue;
                    break;
                case 7:
                    $varDataArray[$varArrayTemp[0]][$varArrayTemp[1]][$varArrayTemp[2]][$varArrayTemp[3]][$varArrayTemp[4]][$varArrayTemp[5]][$varArrayTemp[6]]=$varValue;
                    break;
                case 8:
                    $varDataArray[$varArrayTemp[0]][$varArrayTemp[1]][$varArrayTemp[2]][$varArrayTemp[3]][$varArrayTemp[4]][$varArrayTemp[5]][$varArrayTemp[6]][$varArrayTemp[7]]=$varValue;
                    break;
                case 9:
                    $varDataArray[$varArrayTemp[0]][$varArrayTemp[1]][$varArrayTemp[2]][$varArrayTemp[3]][$varArrayTemp[4]][$varArrayTemp[5]][$varArrayTemp[6]][$varArrayTemp[7]][$varArrayTemp[8]]=$varValue;
                    break;
                case 10:
                    $varDataArray[$varArrayTemp[0]][$varArrayTemp[1]][$varArrayTemp[2]][$varArrayTemp[3]][$varArrayTemp[4]][$varArrayTemp[5]][$varArrayTemp[6]][$varArrayTemp[7]][$varArrayTemp[8]][$varArrayTemp[9]]=$varValue;
                    break;
                default:
                    $varReturn = false;
                    break;
                }
            //var_dump($varDataArray);
            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getOnlyArrayValueWithoutKey                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2020-07-26                                                                                           |
        | ▪ Description     : Mendapatkan nilai array tanpa menyertakan kunci array (varDataArray)                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varDataArray ► Data array yang akan dievaluasi                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getOnlyArrayValueWithoutKey($varUserSession, $varDataArray)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, [], __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Get Array Values Only');
                try {
                    if(self::isAssociativeArray($varUserSession, $varDataArray)==true)
                        {
                        $varReturn = array_values($varDataArray);
                        }
                    else
                        {
                        $varReturn = $varDataArray;
                        }
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