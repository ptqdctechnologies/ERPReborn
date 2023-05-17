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
        | ▪ Method Name     : getArrayKeyRename_CamelCase                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-10-19                                                                                           |
        | ▪ Description     : Mengganti seluruh karakter Array Key dengan Mode Camel Case                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (array)  varDataArray ► Data array                                                                                |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getArrayKeyRename_CamelCase($varUserSession, array $varArray = null)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Rename Array Key to Camel Case');
                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    if(is_array($varArray)==true)
                        {
                        foreach($varArray as $key => $value) 
                            {
                            if((strcmp(substr($key, 0, 1), strtoupper(substr($key, 0, 1)))==0) AND (strcmp(substr($key, 1, 1), strtoupper(substr($key, 1, 1)))==0))
                                {
                                $varReturn[$key] = (is_array($value)==TRUE ? self::getArrayKeyRename_CamelCase($varUserSession, $value) : $value);
                                }
                            else
                                {
                                $varReturn[strtolower(substr($key, 0, 1)).substr($key, 1, (strlen($key) - 1))] = (is_array($value)==TRUE ? self::getArrayKeyRename_CamelCase($varUserSession, $value) : $value);
                                }
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
        | ▪ Method Name     : getArrayKeyRename_LowerAllCharacters                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-10-12                                                                                           |
        | ▪ Description     : Mengganti seluruh karakter Array Key dengan Huruf Non Kapital                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (array)  varDataArray ► Data array                                                                                |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getArrayKeyRename_LowerAllCharacters($varUserSession, array $varArray)
            {
            $varReturn = self::getArrayKeyRename_Engine($varUserSession, $varArray, 10);
            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getArrayKeyRename_LowerFirstCharacter                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-10-12                                                                                           |
        | ▪ Description     : Mengganti karakter pertama Array Key dengan Huruf Non Kapital                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (array)  varDataArray ► Data array                                                                                |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getArrayKeyRename_LowerFirstCharacter($varUserSession, array $varArray)
            {
            $varReturn = self::getArrayKeyRename_Engine($varUserSession, $varArray, 25);
            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getArrayKeyRename_UpperAllCharacters                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-10-12                                                                                           |
        | ▪ Description     : Mengganti seluruh karakter Array Key dengan Huruf Kapital                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (array)  varDataArray ► Data array                                                                                |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getArrayKeyRename_UpperAllCharacters($varUserSession, array $varArray)
            {
            $varReturn = self::getArrayKeyRename_Engine($varUserSession, $varArray, 15);
            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getArrayKeyRename_UpperFirstCharacter                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-10-12                                                                                           |
        | ▪ Description     : Mengganti karakter pertama Array Key dengan Huruf Kapital                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (array)  varDataArray ► Data array                                                                                |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getArrayKeyRename_UpperFirstCharacter($varUserSession, array $varArray)
            {
            $varReturn = self::getArrayKeyRename_Engine($varUserSession, $varArray, 20);
            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getArrayKeyRename_Engine                                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-10-12                                                                                           |
        | ▪ Description     : Engine Penggantian karakter pertama Array Key                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (array)  varDataArray ► Data array                                                                                |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        private static function getArrayKeyRename_Engine($varUserSession, array $array, $case = 10, $useMB = false, $mbEnc = 'UTF-8') 
            {
            /*
            define('ARRAY_KEY_FC_LOWERCASE', 30); //FOO => FOO, Bar => bar
            define('ARRAY_KEY_FC_LOWERCASE', 25); //FOO => fOO
            define('ARRAY_KEY_FC_UPPERCASE', 20); //foo => Foo
            define('ARRAY_KEY_UPPERCASE', 15); //foo => FOO
            define('ARRAY_KEY_LOWERCASE', 10); //FOO => foo
            define('ARRAY_KEY_USE_MULTIBYTE', true); //use mutlibyte functions
            */
            $newArray = array();

            //for more speed define the runtime created functions in the global namespace

            //get function
            if($useMB === false) {
                $function = 'strToUpper'; //default
                switch($case) {
                    //first-char-to-lowercase
                    case 25:
                        //maybee lcfirst is not callable
                        if(!function_exists('lcfirst'))
                            $function = create_function('$input', '
                                return strToLower($input[0]) . substr($input, 1, (strLen($input) - 1));
                            ');
                        else $function = 'lcfirst';
                        break;

                    //first-char-to-uppercase               
                    case 20:
                        $function = 'ucfirst';
                        break;

                    //lowercase
                    case 10:
                        $function = 'strToLower';
                }
            } else {
                //create functions for multibyte support
                switch($case) {
                    //first-char-to-lowercase
                    case 25:
                        $function = create_function('$input', '
                            return mb_strToLower(mb_substr($input, 0, 1, \'' . $mbEnc . '\')) .
                                mb_substr($input, 1, (mb_strlen($input, \'' . $mbEnc . '\') - 1), \'' . $mbEnc . '\');
                        ');

                        break;

                    //first-char-to-uppercase
                    case 20:
                        $function = create_function('$input', '
                            return mb_strToUpper(mb_substr($input, 0, 1, \'' . $mbEnc . '\')) .
                                mb_substr($input, 1, (mb_strlen($input, \'' . $mbEnc . '\') - 1), \'' . $mbEnc . '\');
                        ');

                        break;

                    //uppercase
                    case 15:
                        $function = create_function('$input', '
                            return mb_strToUpper($input, \'' . $mbEnc . '\');
                        ');
                        break;

                    //lowercase
                    default: //case 10:
                        $function = create_function('$input', '
                            return mb_strToLower($input, \'' . $mbEnc . '\');
                        ');
                }
            }

            //loop array
            foreach($array as $key => $value) {
                if(is_array($value)) //$value is an array, handle keys too
                    $newArray[$function($key)] = self::getArrayKeyRename_Engine($varUserSession, $value, $case, $useMB);
                elseif(is_string($key))
                    $newArray[$function($key)] = $value;
                else $newArray[$key] = $value; //$key is not a string
            } //end loop

            return $newArray;
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


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : isAssociativeArray                                                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2020-07-26                                                                                           |
        | ▪ Description     : Mengecek suatu array (varArrayData) termasuk Associative Array (Array yang memiliki key)             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
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
        | ▪ Method Name     : isElementExist                                                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-10-15                                                                                           |
        | ▪ Description     : Mengecek apakah suatu Element (varElement) ada pada suatu array (varData) dalam satu lapis pencarian |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varElement ► Element                                                                                     |
        |      ▪ (array)  varData ► Data Array                                                                                     |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function isElementExist($varUserSession, $varElement, $varData)
            {
            $varReturn = false;
                       
            if(is_array($varData))
                {
                if (in_array($varElement, $varData))
                    {
                    $varReturn = true;
//                    echo "array ".$varElement;
//                    var_dump($varData);
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
                       
            if(is_array($varData))
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
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
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
        | ▪ Method Name     : replaceArrayValue                                                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-05-16                                                                                           |
        | ▪ Creation Date   : 2023-05-16                                                                                           |
        | ▪ Description     : Mengganti seluruh Array Value dengan Value Lain                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (array)  varDataArray ► Data array                                                                                |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function replaceArrayValue($varArray, $varFind, $varReplace)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Relace All Array Value With Other Value');
                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    if(is_array($varArray)==true)
                        {
                        foreach($varArray as $key => $value) 
                            {
                            $varReturn[$key] = (
                                is_array($value)==TRUE ? 
                                    self::replaceArrayValue($value, $varFind, $varReplace) : 
                                    ($value == $varFind ?
                                        $varReplace :
                                        $value
                                        )
                                    );
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
        | ▪ Method Name     : setRemoveElementByKey                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2020-07-26                                                                                           |
        | ▪ Description     : Mengecek suatu array (varArrayData) termasuk Sequential Array (Array yang tidak memiliki key)        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varRemoveKey ► Remove Key                                                                                |
        |      ▪ (array)  varArrayData ► Data Array                                                                                |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function setRemoveElementByKey($varUserSession, string $varRemoveKey, array $varDataArray)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Set Remove Element By Key');
                try {
                    foreach($varDataArray as $varKey => $varValue) {
                        if(strcmp($varKey, $varRemoveKey)==0)
                            {
                            continue;
                            }
                        $varReturn[$varKey]=$varValue;
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
        }
    }