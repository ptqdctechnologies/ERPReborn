<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Helpers                                                                                                   |
| ▪ Name Space : \App\Helpers\ZhtHelper\Logger                                                                                     |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2020 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/

namespace App\Helpers\ZhtHelper\Logger
    {


    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : SystemLog                                                                                                    |
    | ▪ Description : Menangani Log Sistem                                                                                         |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class Helper_SystemLog
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | Class Properties                                                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        private static $varNameSpace;
        private static $varDataLogErrorMaxSize;
        private static $varDataLogOutputMaxSize;
        private static $varDataLogErrorIndentantionTab;
        private static $varDataLogOutputIndentantionTab;
        private static $varTraceEnabled = null;


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
            self::init();
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
            self::$varNameSpace = get_class();
            self::$varDataLogErrorMaxSize = 100;
            self::$varDataLogOutputMaxSize = 100;
            self::$varDataLogErrorIndentantionTab = 5;
            self::$varDataLogOutputIndentantionTab = 5;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : isTraceEnabled                                                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Description     : Cek apakah trace logging aktif. Default OFF. Hidupkan via env SYSLOG_TRACE_ENABLED=true.            |
        |                     Hasil di-memoize untuk seumur hidup proses agar overhead pengecekan env minimal.                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (bool) varReturn                                                                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        private static function isTraceEnabled()
            {
            if (self::$varTraceEnabled === null)
                {
                self::$varTraceEnabled = filter_var(env('SYSLOG_TRACE_ENABLED', false), FILTER_VALIDATE_BOOLEAN);
                }
            return self::$varTraceEnabled;
            }


        private static function getCurrentOutputIndentation($varUserSession)
            {
            self::setAutoInit();

            $varDataSession =
                \App\Helpers\ZhtHelper\General\Helper_Session::get(
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getApplicationID()
                    );

            $varReturn =
                $varDataSession['Log']['Specific'][$varUserSession]['OutputIndentation'];

            return
                $varReturn;
            }
            
            
        public static function setLogOutputMethodProcessHeader($varUserSession, $varClassName, $varMethodName, $varCustomMessage=null)
            {
            if (!self::isTraceEnabled())
                {
                return [
                    'ClassName'            => $varClassName,
                    'MethodName'           => $varMethodName,
                    'Message'              => $varCustomMessage,
                    'LogOutputIndentation' => 0,
                    'Status'               => null,
                    'StatusMessage'        => null,
                    ];
                }

            self::setAutoInit();

            $varData['ClassName'] = $varClassName;
            $varData['MethodName'] = $varMethodName;
            $varData['Message'] = $varCustomMessage;
            \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogIndentationIncrease($varUserSession);
            \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutput($varUserSession, $varClassName, '('.$varMethodName.' - SubProcess) '.($varCustomMessage ? $varCustomMessage : ''));
            $varData['LogOutputIndentation'] = self::getCurrentOutputIndentation($varUserSession);
            return $varData;
            }


        public static function setLogOutputMethodProcessStatus($varUserSession, &$varData, $varStatus, $varCustomMessage=null)
            {
            if (!self::isTraceEnabled())
                {
                $varData['Status'] = $varStatus;
                $varData['StatusMessage'] = $varCustomMessage;
                return;
                }

            self::setAutoInit();

            $varData['Status'] = $varStatus;
            $varData['StatusMessage'] = $varCustomMessage;
            }


        public static function setLogOutputMethodProcessFooter($varUserSession, &$varData)
            {
            if (!self::isTraceEnabled())
                {
                return;
                }

            self::setAutoInit();

            $varDataSession = \App\Helpers\ZhtHelper\General\Helper_Session::get(\App\Helpers\ZhtHelper\System\Helper_Environment::getApplicationID());
            $varDataArray=explode('#', $varDataSession['Log']['Specific'][$varUserSession]['Output'][count($varDataSession['Log']['Specific'][$varUserSession]['Output'])-1]);
            if (strcmp(($varDataArray[1].'#'.$varDataArray[2]), ('['.$varData['ClassName'].']#['.str_repeat('&nbsp;', $varData['LogOutputIndentation']).'('.$varData['MethodName'].' - SubProcess) '.($varData['Message']?$varData['Message']:'').']')) == 0)
                {
                self::setLastLogOuputAppend($varUserSession, $varData['Status'].($varData['StatusMessage'] ? ', '.$varData['StatusMessage'] : ''));
                }
            else
                {
                //self::setLastLogOuputAppend($varUserSession, 'On process');
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutput($varUserSession, $varData['ClassName'], '('.$varData['MethodName'].' - SubProcess) '.($varData['Message'] ? $varData['Message'] : '').' (Closed Normally) ► '.$varData['Status'].($varData['StatusMessage'] ? ', '.$varData['StatusMessage'] : ''));
                }
            \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogIndentationDecrease($varUserSession);
            }
            
            
            
            

/*        public static function setLogOutputMethodSubHeaderAppend($varUserSession, $varLastIndentation, $varMessage=null)
            {
            $varDataSession = \App\Helpers\ZhtHelper\General\Helper_Session::get(\App\Helpers\ZhtHelper\System\Helper_Environment::getApplicationID());
            
            echo "<br>".self::getCurrentOutputIndentation($varUserSession);
            
            if($varLastIndentation == self::getCurrentOutputIndentation($varUserSession))
                {
                $varData=$varDataSession['Log']['Specific'][$varUserSession]['Output'][count($varDataSession['Log']['Specific'][$varUserSession]['Output'])-1];
                $varDataSession['Log']['Specific'][$varUserSession]['Output'][count($varDataSession['Log']['Specific'][$varUserSession]['Output'])-1] = substr($varData, 0, strlen($varData)-1).' ► '.$varMessage.']';
                }
            else
                {
                $varData=$varDataSession['Log']['Specific'][$varUserSession]['Output'][count($varDataSession['Log']['Specific'][$varUserSession]['Output'])-1];
                $varDataSession['Log']['Specific'][$varUserSession]['Output'][count($varDataSession['Log']['Specific'][$varUserSession]['Output'])-1] = substr($varData, 0, strlen($varData)-1).' ► '.$varMessage.']';
                }
            //---> Data Store
            \App\Helpers\ZhtHelper\General\Helper_Session::set(\App\Helpers\ZhtHelper\System\Helper_Environment::getApplicationID(), $varDataSession);
            }
*/            
            
            
            


        public static function setLogOutputMethodHeader($varUserSession, $varReturnInitialValue, $varClassName, $varMethodName, $varCustomMessage=null)
            {
            if (!self::isTraceEnabled())
                {
                return $varReturnInitialValue;
                }

            \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogIndentationIncrease($varUserSession);
            \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutput($varUserSession, $varClassName, '('.$varMethodName.') '.($varCustomMessage ? $varCustomMessage : 'Entry Point'));
            return $varReturnInitialValue;
            }

        public static function setLogOutputMethodFooter($varUserSession, &$varReturn, $varClassName, $varMethodName, $varCustomMessage=null)
            {
            if (!self::isTraceEnabled())
                {
                return $varReturn;
                }

            $varDataSession =
                \App\Helpers\ZhtHelper\General\Helper_Session::get(
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getApplicationID()
                    );
            if (!$varDataSession)
                {
                $varBack2Step =
                    explode(
                        '#',
                        str_replace(
                            ']',
                            '',
                            $varDataSession['Log']['Specific'][$varUserSession]['Output'][count($varDataSession['Log']['Specific'][$varUserSession]['Output'])-2]
                            )
                        );

                if ((strcmp($varBack2Step[1], '['.$varClassName)==0) AND (strcmp(substr($varBack2Step[2],1,strlen($varBack2Step[2])-1), (str_repeat('&nbsp;', \App\Helpers\ZhtHelper\General\Helper_Array::getArrayValue($varDataSession, 'Log::Specific::'.$varUserSession.'::OutputIndentation')).'('.$varMethodName.') Entry Point'))==0))
                    {  
                    $varRemovedElement = array_pop($varDataSession['Log']['Specific'][$varUserSession]['Output']);
                    $varRemovedElement = str_replace(' - SubProcess)', ')', str_replace(str_repeat('&nbsp;', self::$varDataLogOutputIndentantionTab).'(', '(', $varRemovedElement));
                    array_pop($varDataSession['Log']['Specific'][$varUserSession]['Output']);
                    array_push($varDataSession['Log']['Specific'][$varUserSession]['Output'], $varRemovedElement);
                    //---> Data Store
                    \App\Helpers\ZhtHelper\General\Helper_Session::set(\App\Helpers\ZhtHelper\System\Helper_Environment::getApplicationID(), $varDataSession);
                    }
                else
                    {
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutput($varUserSession, $varClassName, '('.$varMethodName.') '.($varCustomMessage ? $varCustomMessage : 'Exit Point'));                
                    }
                }
            
            \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogIndentationDecrease($varUserSession);
            return $varReturn;
            }

            
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getLogError                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-07-10                                                                                           |
        | ▪ Description     : Mendapatkan data Log Error sesuai User Session tertentu (varUserSession)                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getLogError($varUserSession)
            {
            self::setAutoInit();         

            $varDataSession = \App\Helpers\ZhtHelper\General\Helper_Session::get(\App\Helpers\ZhtHelper\System\Helper_Environment::getApplicationID());

            if(\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExistOnSubArray($varUserSession, $varDataSession, 'Log::Specific::'.$varUserSession.'::Error')==false)
                {
                $varDataSession['Log']['Specific'][$varUserSession]['Error']=[];
                }
            
            $varReturn = '';
            for($i=count($varDataSession['Log']['Specific'][$varUserSession]['Error']); $i!=0; $i--)
                {
                $varReturn .= $varDataSession['Log']['Specific'][$varUserSession]['Error'][$i-1].'<br>';
                }
            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getLogOutput                                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2020-07-13                                                                                           |
        | ▪ Description     : Mendapatkan data Log Output sesuai User Session tertentu (varUserSession)                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getLogOutput($varUserSession)
            {
            self::setAutoInit();       

            $varDataSession = \App\Helpers\ZhtHelper\General\Helper_Session::get(\App\Helpers\ZhtHelper\System\Helper_Environment::getApplicationID());

            if(\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExistOnSubArray($varUserSession, $varDataSession, 'Log::Specific::'.$varUserSession.'::Output')==false)
                {
                $varDataSession['Log']['Specific'][$varUserSession]['Output']=[];
                $varDataSession['Log']['Specific'][$varUserSession]['OutputIndentation']=0;
                }

            $varReturn =   '<table>';
            for($i=count($varDataSession['Log']['Specific'][$varUserSession]['Output']); $i!=0; $i--)
                {
                $varReturn .= '<tr>';
                $varData= explode(']#[', substr($varDataSession['Log']['Specific'][$varUserSession]['Output'][$i-1], 1, strlen($varDataSession['Log']['Specific'][$varUserSession]['Output'][$i-1])-2));
                for($j=0; $j!=count($varData); $j++)
                    {
                    $varReturn .= '<td nowrap style="color:'.($j==1?'red':'blue').'; '.($j==1?'font-weight: bold; ':'').($j==2?'font-style: italic; ':'').'font-size:10px;">';
                    $varReturn .= ($j==0?'▪ '.'('.$i.') ':'');
                    $varReturn .= ($j==2?'► ':'');
                    $varReturn .= $varData[$j];
                    $varReturn .= '</td>';
                    }
                $varReturn .= '</tr>';
                }            
            $varReturn .=  '</table>';
            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setAutoInit                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-07-20                                                                                           |
        | ▪ Description     : Pengesetan Automatic Init                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (boolean) varReturn                                                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function setAutoInit()
            {
            $varReturn = false;
            try {
                //---> Cek apakah session sudah terbentuk
                //if(!\App\Helpers\ZhtHelper\General\Helper_Session::isExist(\App\Helpers\ZhtHelper\System\Helper_Environment::getApplicationID()))
                if(\App\Helpers\ZhtHelper\General\Helper_Session::isExist(\App\Helpers\ZhtHelper\System\Helper_Environment::getApplicationID())==false)
                    {
                    \App\Helpers\ZhtHelper\System\Helper_Registry::setAutoInit();
                    self::init();
                    } 
                $varReturn = true;
                } 
            catch (\Exception $ex) {
                }
            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setLastLogOuputAppend                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-07-13                                                                                           |
        | ▪ Description     : Menambah pesan tambahan (varMessage) pada Log Output terakhir sesuai User Session (varUserSession)   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varMessage ► Pesan tambahan yang akan ditambahkan pada output                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function setLastLogOuputAppend($varUserSession, $varMessage=null)
            {
            if (!self::isTraceEnabled())
                {
                return;
                }

            $varDataSession = \App\Helpers\ZhtHelper\General\Helper_Session::get(\App\Helpers\ZhtHelper\System\Helper_Environment::getApplicationID());
            $varData=$varDataSession['Log']['Specific'][$varUserSession]['Output'][count($varDataSession['Log']['Specific'][$varUserSession]['Output'])-1];
            $varDataSession['Log']['Specific'][$varUserSession]['Output'][count($varDataSession['Log']['Specific'][$varUserSession]['Output'])-1] = substr($varData, 0, strlen($varData)-1).' ► '.$varMessage.']';
            //---> Data Store
            \App\Helpers\ZhtHelper\General\Helper_Session::set(\App\Helpers\ZhtHelper\System\Helper_Environment::getApplicationID(), $varDataSession);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setLogError                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-07-10                                                                                           |
        | ▪ Description     : Menyimpan data Log Error (varMessage) sesuai User Session tertentu (varUserSession) dengan penanda   |
        |                     khusus (varCallerID)                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varCallerID ► ID Penanda Khusus Caller                                                                   |
        |      ▪ (string) varMessage ► Pesan Error                                                                                 |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function setLogError($varUserSession, $varCallerID, $varMessage=null)
            {
            if (!self::isTraceEnabled())
                {
                return;
                }

            self::setAutoInit();

            $varDataSession = \App\Helpers\ZhtHelper\General\Helper_Session::get(\App\Helpers\ZhtHelper\System\Helper_Environment::getApplicationID());

            if(\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExistOnSubArray($varUserSession, $varDataSession, 'Log::Specific::'.$varUserSession.'::Error')==false)
                {
                $varDataSession['Log']['Specific'][$varUserSession]['Error']=[];
                $varDataSession['Log']['Specific'][$varUserSession]['ErrorIndentation']=0;
                }
                
            if(count($varDataSession['Log']['Specific'][$varUserSession]['Error']) == self::$varDataLogErrorMaxSize)
                {
                array_shift($varDataSession['Log']['Specific'][$varUserSession]['Error']);
                }
            array_push($varDataSession['Log']['Specific'][$varUserSession]['Error'], \App\Helpers\ZhtHelper\System\Helper_Environment::getApplicationDateTimeTZ().' ['.$varCallerID.'] '.$varMessage);

            //---> Data Store
            \App\Helpers\ZhtHelper\General\Helper_Session::set(\App\Helpers\ZhtHelper\System\Helper_Environment::getApplicationID(), $varDataSession);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setLogOutput                                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2020-07-20                                                                                           |
        | ▪ Description     : Menyimpan data Log Output (varMessage) sesuai User Session tertentu (varUserSession) dengan penanda  |
        |                     khusus (varCallerID)                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varCallerID ► ID Penanda Khusus Caller                                                                   |
        |      ▪ (string) varMessage ► Pesan Output                                                                                |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function setLogOutput($varUserSession, $varCallerID, $varMessage=null)
            {
            if (!self::isTraceEnabled())
                {
                return;
                }

            self::setAutoInit();

            $varDataSession = \App\Helpers\ZhtHelper\General\Helper_Session::get(\App\Helpers\ZhtHelper\System\Helper_Environment::getApplicationID());

            if(\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExistOnSubArray($varUserSession, $varDataSession, 'Log::Specific::'.$varUserSession.'::Output')==false)
                {
                $varDataSession['Log']['Specific'][$varUserSession]['Output']=[];
                }
                
            if(count($varDataSession['Log']['Specific'][$varUserSession]['Output']) == self::$varDataLogOutputMaxSize)
                {
                array_shift($varDataSession['Log']['Specific'][$varUserSession]['Output']);
                }
            array_push($varDataSession['Log']['Specific'][$varUserSession]['Output'], '['.\App\Helpers\ZhtHelper\System\Helper_Environment::getApplicationDateTimeTZ().']#['.$varCallerID.']#['.str_repeat('&nbsp;', ($varDataSession['Log']['Specific'][$varUserSession]['OutputIndentation']<0?0:$varDataSession['Log']['Specific'][$varUserSession]['OutputIndentation'])).$varMessage.']');

            //---> Data Store
            \App\Helpers\ZhtHelper\General\Helper_Session::set(\App\Helpers\ZhtHelper\System\Helper_Environment::getApplicationID(), $varDataSession);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setLogIndentationIncrease                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2020-07-20                                                                                           |
        | ▪ Description     : Menambahkan indentasi untuk Log Output sesuai User Session (varUserSession)                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function setLogIndentationIncrease($varUserSession)
            {
            if (!self::isTraceEnabled())
                {
                return;
                }

            self::setAutoInit();
            self::init();

            $varDataSession = \App\Helpers\ZhtHelper\General\Helper_Session::get(\App\Helpers\ZhtHelper\System\Helper_Environment::getApplicationID());
            if(\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExistOnSubArray($varUserSession, $varDataSession, 'Log::Specific::'.$varUserSession.'::OutputIndentation')==false)
                {
                \App\Helpers\ZhtHelper\General\Helper_Array::setArrayValue($varDataSession, 'Log::Specific::'.$varUserSession.'::OutputIndentation', -self::$varDataLogOutputIndentantionTab);
                $varDataSession['Log']['Specific'][$varUserSession]['OutputIndentation']=-self::$varDataLogOutputIndentantionTab;
                //var_dump($varDataSession);
                }
            $varOutputIndentation = \App\Helpers\ZhtHelper\General\Helper_Array::getArrayValue($varDataSession, 'Log::Specific::'.$varUserSession.'::OutputIndentation') + self::$varDataLogOutputIndentantionTab;
            \App\Helpers\ZhtHelper\General\Helper_Array::setArrayValue($varDataSession, 'Log::Specific::'.$varUserSession.'::OutputIndentation', $varOutputIndentation);
            \App\Helpers\ZhtHelper\General\Helper_Session::set(\App\Helpers\ZhtHelper\System\Helper_Environment::getApplicationID(), $varDataSession);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setLogIndentationDecrease                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-07-10                                                                                           |
        | ▪ Description     : Mengurangi indentasi untuk Log Output sesuai User Session (varUserSession)                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function setLogIndentationDecrease($varUserSession)
            {
            if (!self::isTraceEnabled())
                {
                return;
                }

            self::setAutoInit();

            $varDataSession = \App\Helpers\ZhtHelper\General\Helper_Session::get(\App\Helpers\ZhtHelper\System\Helper_Environment::getApplicationID());
            $varOutputIndentation = \App\Helpers\ZhtHelper\General\Helper_Array::getArrayValue($varDataSession, 'Log::Specific::'.$varUserSession.'::OutputIndentation') - self::$varDataLogOutputIndentantionTab;
            \App\Helpers\ZhtHelper\General\Helper_Array::setArrayValue($varDataSession, 'Log::Specific::'.$varUserSession.'::OutputIndentation', $varOutputIndentation);            
            \App\Helpers\ZhtHelper\General\Helper_Session::set(\App\Helpers\ZhtHelper\System\Helper_Environment::getApplicationID(), $varDataSession);
            }
        }
    }

?>
