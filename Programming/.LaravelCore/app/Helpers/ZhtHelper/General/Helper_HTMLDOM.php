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
        private static $varHTMLInternalSystemTag = 'zhtSysInternalObject';
        
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


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setButton                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-06-03                                                                                           |
        | ▪ Creation Date   : 2022-06-03                                                                                           |
        | ▪ Description     : Mengeset Objek DOM Button                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varID ► Object ID & Name                                                                                 |
        |      ▪ (string) varCaption ► Caption                                                                                     |
        |      ▪ (string) varJSEvent ► JavaScript Event                                                                            |
        |      ▪ (string) varCSS ► CSS                                                                                             |
        |      ▪ (string) varExtraProperties ► Extra Properties                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */  
        public static function setButton($varUserSession, 
            string $varID, string $varCaption = '', string $varJSEvent = '', string $varCSS = '', string $varExtraProperties = '')
            {
            $varReturn = 
                '<input '.
                    'type="button" '.
                    'value="'.$varCaption.'"'.
                    $varJSEvent.' '.
                    $varCSS.' '.
                    $varExtraProperties.
                    '>';
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
        |      ▪ (string) varExtraProperties ► Extra Properties                                                                    |
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
                $varReturn .= '<option label="'.$varValue[$i]['Text'].'" data-id="'.$varValue[$i]['ID'].'" value="'.$varValue[$i]['Text'].'">';
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
        | ▪ Method Name     : setDiv                                                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-06-03                                                                                           |
        | ▪ Creation Date   : 2022-06-03                                                                                           |
        | ▪ Description     : Mengeset Objek DOM Div                                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varID ► Object ID & Name                                                                                 |
        |      ▪ (string) varContent ► Content                                                                                     |
        |      ▪ (string) varJSEvent ► JavaScript Event                                                                            |
        |      ▪ (string) varCSS ► CSS                                                                                             |
        |      ▪ (string) varExtraProperties ► Extra Properties                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */            
        public static function setDiv($varUserSession, 
            string $varID, $varContent = '', string $varJSEvent = '', string $varCSS = '', string $varExtraProperties = '')
            {
            $varReturn = 
                '<div '.
                    $varJSEvent.' '.
                    $varCSS.' '.
                    $varExtraProperties.
                    '>'.
                        $varContent.
                '</div>';
            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setInputHidden                                                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-06-03                                                                                           |
        | ▪ Creation Date   : 2022-06-03                                                                                           |
        | ▪ Description     : Mengeset Objek DOM Input Hidden                                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varID ► Object ID & Name                                                                                 |
        |      ▪ (mixed)  varValue ► Object Value                                                                                  |
        |      ▪ (string) varJSEvent ► JavaScript Event                                                                            |
        |      ▪ (string) varCSS ► CSS                                                                                             |
        |      ▪ (string) varExtraProperties ► Extra Properties                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */            
        public static function setInputHidden($varUserSession, 
            string $varID, $varValue = '', string $varJSEvent = '', string $varCSS = '', string $varExtraProperties = '')
            {
            $varReturn = 
                '<input '.
                    'type="hidden" '.
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
        |      ▪ (string) varExtraProperties ► Extra Properties                                                                    |
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
        |      ▪ (string) varExtraProperties ► Extra Properties                                                                    |
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


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setInputTextWithBoundedSuggestion                                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-06-03                                                                                           |
        | ▪ Creation Date   : 2022-06-03                                                                                           |
        | ▪ Description     : Mengeset Objek DOM Input Text dengan Suggestion yang mengikat                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varID ► Object ID & Name                                                                                 |
        |      ▪ (mixed)  varValue ► Object Value                                                                                  |
        |      ▪ (array)  varDataListValue ► Data List Value                                                                       |
        |      ▪ (string) varJSEvent ► JavaScript Event                                                                            |
        |      ▪ (string) varCSS ► CSS                                                                                             |
        |      ▪ (string) varExtraProperties ► Extra Properties                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */ 
        public static function setInputTextWithBoundedSuggestion($varUserSession, 
            string $varID, $varValue = '', array $varDataListValue = [], string $varJSEvent = '', string $varCSS = '', string $varExtraProperties = '')
            {
            $varJSEvent_InputText = 
                'onChange="javascript: '.
                    'for (var i=0; i!=4; i++) '.
                        '{'.
                        'var varSignFound = false; '.
                        'if((document.getElementById(\''.$varID.'_'.self::$varHTMLInternalSystemTag.'_DataList\').options[i].value) == (document.getElementById(\''.$varID.'_'.self::$varHTMLInternalSystemTag.'_InputText\').value))'.
                            '{'.
                            'varSignFound = true;'.
                            'document.getElementById(\''.$varID.'\').value = document.getElementById(\''.$varID.'_'.self::$varHTMLInternalSystemTag.'_DataList\').options[i].getAttribute(\'data-id\');'.
                            'break; '.
                            '};'.
                        '}; '.
                    'if (varSignFound == false)'.
                        '{'.
                        'document.getElementById(\''.$varID.'\').value = \'\'; '.
                        'document.getElementById(\''.$varID.'_'.self::$varHTMLInternalSystemTag.'_InputText'.'\').value = \'\'; '.
                        'window.alert(\'You entered invalid data. Please fill in the correct data\'); '.
                        '};'.
                    '"';

            $varJSEvent_ButtonClear = 
                'onClick="javascript: '.
                    'document.getElementById(\''.$varID.'\').value = \'\'; '.
                    'document.getElementById(\''.$varID.'_'.self::$varHTMLInternalSystemTag.'_InputText'.'\').value = \'\';'.
                    '"';

            $varReturn = 
                self::setDiv($varUserSession, $varID,
                    self::setInputHidden($varUserSession, $varID, $varValue).
                    self::setInputText($varUserSession, $varID.'_'.self::$varHTMLInternalSystemTag.'_InputText', '', $varJSEvent_InputText, $varCSS, 'list="'.$varID.'_'.self::$varHTMLInternalSystemTag.'_DataList'.'" '.$varExtraProperties).
                    self::setDataList($varUserSession, $varID.'_'.self::$varHTMLInternalSystemTag.'_DataList', $varDataListValue).
                    self::setButton($varUserSession, $varID.'_'.self::$varHTMLInternalSystemTag.'_ButtonClear', 'Hapus Inputan', $varJSEvent_ButtonClear)
                    );
            
            return $varReturn;
            }
            
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setInputTextWithSuggestion                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-06-03                                                                                           |
        | ▪ Creation Date   : 2022-06-03                                                                                           |
        | ▪ Description     : Mengeset Objek DOM Input Text dengan Suggestion yang tidak mengikat                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varID ► Object ID & Name                                                                                 |
        |      ▪ (mixed)  varValue ► Object Value                                                                                  |
        |      ▪ (array)  varDataListValue ► Data List Value                                                                       |
        |      ▪ (string) varJSEvent ► JavaScript Event                                                                            |
        |      ▪ (string) varCSS ► CSS                                                                                             |
        |      ▪ (string) varExtraProperties ► Extra Properties                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */ 
        public static function setInputTextWithSuggestion($varUserSession, 
            string $varID, $varValue = '', array $varDataListValue = [], string $varJSEvent = '', string $varCSS = '', string $varExtraProperties = '')
            {
            $varJSEvent_InputText = 
                'onKeyUp="javascript:'.
                    'document.getElementById(\''.$varID.'\').value = document.getElementById(\''.$varID.'_'.self::$varHTMLInternalSystemTag.'_InputText'.'\').value;'.
                '"';

            $varJSEvent_ButtonClear = 
                'onClick="javascript: '.
                    'document.getElementById(\''.$varID.'\').value = \'\'; '.
                    'document.getElementById(\''.$varID.'_'.self::$varHTMLInternalSystemTag.'_InputText'.'\').value = \'\';'.
                    '"';
            
            $varCSS_DataList = 
                'style="color:blue;"';
            
            $varReturn = 
                self::setDiv($varUserSession, $varID,
                    self::setInputHidden($varUserSession, $varID, $varValue).
                    self::setInputText($varUserSession, $varID.'_'.self::$varHTMLInternalSystemTag.'_InputText', $varValue, $varJSEvent_InputText, $varCSS, 'list="'.$varID.'_'.self::$varHTMLInternalSystemTag.'_DataList'.'" '.$varExtraProperties).
                    self::setDataList($varUserSession, $varID.'_'.self::$varHTMLInternalSystemTag.'_DataList', $varDataListValue, '', $varCSS_DataList).
                    self::setButton($varUserSession, $varID.'_'.self::$varHTMLInternalSystemTag.'_ButtonClear', 'Hapus Inputan', $varJSEvent_ButtonClear)
                    );
            
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
        |      ▪ (string) varExtraProperties ► Extra Properties                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */            
        public static function setSelect($varUserSession, 
            string $varID, $varValue = '', array $varDataListValue = [], string $varJSEvent = '', string $varCSS = '', string $varExtraProperties = '')
            {
            $varArrayID = [];
            for($i=0; $i!=count($varDataListValue); $i++)
                {
                array_push($varArrayID, $varDataListValue[$i]['ID']);
                }
                        
            $varReturn = '';
            for($i=0; $i!=count($varDataListValue); $i++)
                {
                $varReturn .= 
                    '<option value="'.$varDataListValue[$i]['ID'].'" '.
                        (($varValue == $varDataListValue[$i]['ID']) ? 'selected' : '').
                        '>'.
                            $varDataListValue[$i]['Text'].
                    '</option>';
                }
            $varReturn = 
                '<option value="" '.((\App\Helpers\ZhtHelper\General\Helper_Array::isElementExist($varUserSession, $varValue, $varArrayID) == FALSE) ? 'selected' : '').'>---No Selected Data---</option>'.
                $varReturn;
            
            $varJSEvent='OnChange="javascript:document.getElementById(\''.$varID.'\').value = document.getElementById(\''.$varID.'_'.self::$varHTMLInternalSystemTag.'_Select\').value;"';
            
            $varReturn = 
                self::setInputText($varUserSession, $varID, $varValue).
                '<select '.
                    'id="'.$varID.'_'.self::$varHTMLInternalSystemTag.'_Select" '.
                    'name="'.$varID.'_'.self::$varHTMLInternalSystemTag.'_Select" '.
                    $varJSEvent.' '.
                    $varCSS.' '.
                    $varExtraProperties.
                '>'.
                    $varReturn.
                '</select>';
            
            return $varReturn;
            }



        }
    }