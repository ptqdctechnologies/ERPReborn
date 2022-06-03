<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Helpers                                                                                                   |
| ▪ Name Space : \App\Helpers\ZhtHelper\General                                                                                    |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2022 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Helpers\ZhtHelper\General
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : Helper_HTMLDOM                                                                                               |
    | ▪ Description : Menangani HTML Document Object Model (DOM)                                                                   |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class Helper_HTMLDOM
        {
        private $varHTMLInternalSystemTag = 'zhtSysInternalObject';
        
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-06-03                                                                                           |
        | ▪ Creation Date   : 2022-06-03                                                                                           |
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
        | ▪ Last Update     : 2022-06-03                                                                                           |
        | ▪ Creation Date   : 2022-06-03                                                                                           |
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


        public static function setInputTextWithDataList($varUserSession, 
            string $varID, $varValue = '', array $varDataListValue = [], string $varJSEvent = '', string $varCSS = '', string $varExtraProperties = '')
            {
            $varReturn = 
                self::setInputText($varUserSession, $varID, $varValue, $varJSEvent, $varCSS, 'list="'.$varID.'_ZhtSys_DataList" '.$varExtraProperties).
                self::setDataList($varUserSession, $varID.'_ZhtSys_DataList', $varDataListValue)
                ;
            
            return $varReturn;
            }
            
            
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setDataList                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-06-03                                                                                           |
        | ▪ Creation Date   : 2022-06-03                                                                                           |
        | ▪ Description     : Mengeset Objek DOM Datalist                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varID ► Object ID & Name                                                                                 |
        |      ▪ (array)  varValue ► Object Value                                                                                  |
        |      ▪ (string) varJSEvent ► JavaScript Event                                                                            |
        |      ▪ (string) varCSS ► CSS                                                                                             |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */            
        public static function setDataList($varUserSession, 
            string $varID, array $varValue = [], string $varJSEvent = '', string $varCSS = '', string $varExtraProperties = '')
            {
            $varReturn = '';
            
            for($i=0; $i!=count($varValue); $i++)
                {
//                $varReturn .= '<option value='.$varValue[$i]['Text'].'>';
//                
                $varReturn .= '<option label="'.$varValue[$i]['Text'].'" data-id="'.$varValue[$i]['ID'].'" value="'.$varValue[$i]['Text'].'">';
//                
//                $varReturn .= 
//                    '<option value="'.$varValue[$i]['ID'].'">'.
//                        $varValue[$i]['Text'].
//                    '</option>';
                }
            
            $varReturn = 
                '<datalist '.
                    'id="'.$varID.'" '.
                    'name="'.$varID.'" '.
                    $varJSEvent.' '.
                    $varCSS.' '.
                    $varExtraProperties.
                '>'.
                    $varReturn.
                '</datalist>';
            
            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setSelect                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-06-03                                                                                           |
        | ▪ Creation Date   : 2022-06-03                                                                                           |
        | ▪ Description     : Mengeset Objek DOM Select                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varID ► Object ID & Name                                                                                 |
        |      ▪ (mixed)  varValue ► Object Value                                                                                  |
        |      ▪ (array)  varDataListValue ► Data List Value                                                                       |
        |      ▪ (string) varJSEvent ► JavaScript Event                                                                            |
        |      ▪ (string) varCSS ► CSS                                                                                             |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */            
        public static function setSelect($varUserSession, 
            string $varID, $varValue = '', array $varDataListValue = [], string $varJSEvent = '', string $varCSS = '', string $varExtraProperties = '')
            {
            $varReturn = '';
            
            for($i=0; $i!=count($varDataListValue); $i++)
                {
                $varReturn .= 
                    '<option value="'.$varDataListValue[$i]['ID'].'">'.
                        $varDataListValue[$i]['Text'].
                    '</option>';
                }
            
            $varReturn = 
                self::setInputText($varUserSession, $varID, $varValue).
                '<select '.
                    'id="'.$varID.'" '.
                    'name="'.$varID.'" '.
                    $varJSEvent.' '.
                    $varCSS.' '.
                    $varExtraProperties.
                '>'.
                    $varReturn.
                '</select>';
            
            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setInputText                                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-06-03                                                                                           |
        | ▪ Creation Date   : 2022-06-03                                                                                           |
        | ▪ Description     : Mengeset Objek DOM Input Text                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varID ► Object ID & Name                                                                                 |
        |      ▪ (mixed)  varValue ► Object Value                                                                                  |
        |      ▪ (string) varJSEvent ► JavaScript Event                                                                            |
        |      ▪ (string) varCSS ► CSS                                                                                             |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */            
        public static function setInputText($varUserSession, 
            string $varID, $varValue = '', string $varJSEvent = '', string $varCSS = '', string $varExtraProperties = '')
            {
            $varReturn = 
                '<input '.
                    'type="text" '.
                    'id="'.$varID.'" '.
                    'name="'.$varID.'" '.
                    'value="'.$varValue.'" '.
                    $varJSEvent.' '.
                    $varCSS.' '.
                    $varExtraProperties.
                '>';
            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setLabel                                                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-06-03                                                                                           |
        | ▪ Creation Date   : 2022-06-03                                                                                           |
        | ▪ Description     : Mengeset Objek DOM Label                                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varID ► Object ID & Name                                                                                 |
        |      ▪ (mixed)  varValue ► Object Value                                                                                  |
        |      ▪ (string) varJSEvent ► JavaScript Event                                                                            |
        |      ▪ (string) varCSS ► CSS                                                                                             |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */            
        public static function setLabel($varUserSession, 
            string $varID, $varValue = '', string $varJSEvent = '', string $varCSS = '', string $varExtraProperties = '')
            {
            $varReturn = 
                '<label '.
                    $varJSEvent.' '.
                    $varCSS.' '.
                    $varExtraProperties.
                    '>'.
                        $varValue.
                '</label>';
            return $varReturn;
            }





        }
    }