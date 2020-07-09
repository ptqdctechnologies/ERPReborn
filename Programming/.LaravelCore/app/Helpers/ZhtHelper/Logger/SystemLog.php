<?php

namespace App\Helpers\ZhtHelper\Logger
    {
    class SystemLog
        {
        private static $varNameSpace;
        private static $varDataLogOutput;
        private static $varDataLogOutputMaxSize;
        
        public static function init()
            {
            self::$varNameSpace=get_class();
            self::$varDataLogOutput=[];
            self::$varDataLogOutputMaxSize=10;
            }
            
        public static function setLogError($varLastMessageCount=null)
            {

            }

        public static function setLogOutput($varCallerID, $varUserSession, $varMessage)
            {
            //---> Cek apakah session sudah terbentuk
            if(!\App\Helpers\ZhtHelper\General\Session::isExist(\App\Helpers\ZhtHelper\System\Environment::getApplicationID()))
                {
                \App\Helpers\ZhtHelper\System\Registry::init();
                self::init();
                }            

            $varDataSession = \App\Helpers\ZhtHelper\General\Session::get(\App\Helpers\ZhtHelper\System\Environment::getApplicationID());

            if(\App\Helpers\ZhtHelper\General\ArrayHandler::isKeyExistOnSubArray('Log::Specific::'.$varUserSession.'::Output', $varDataSession)==false)
                {
                $varDataSession['Log']['Specific'][$varUserSession]['Output']=[];
                }
                
            if(count($varDataSession['Log']['Specific'][$varUserSession]['Output']) == self::$varDataLogOutputMaxSize)
                {
                array_shift($varDataSession['Log']['Specific'][$varUserSession]['Output']);
                }
            array_push($varDataSession['Log']['Specific'][$varUserSession]['Output'], \App\Helpers\ZhtHelper\System\Environment::getApplicationDateTimeTZ().' ['.$varCallerID.'] '.$varMessage);
                
            //var_dump($varDataSession);
            
            \App\Helpers\ZhtHelper\General\Session::set(\App\Helpers\ZhtHelper\System\Environment::getApplicationID(), $varDataSession);
            }

        public static function getLogOutput($varUserSession)
            {
            //---> Cek apakah session sudah terbentuk
            if(!\App\Helpers\ZhtHelper\General\Session::isExist(\App\Helpers\ZhtHelper\System\Environment::getApplicationID()))
                {
                \App\Helpers\ZhtHelper\System\Registry::init();
                self::init();
                }            

            $varDataSession = \App\Helpers\ZhtHelper\General\Session::get(\App\Helpers\ZhtHelper\System\Environment::getApplicationID());

            if(\App\Helpers\ZhtHelper\General\ArrayHandler::isKeyExistOnSubArray('Log::Specific::'.$varUserSession.'::Output', $varDataSession)==false)
                {
                $varDataSession['Log']['Specific'][$varUserSession]['Output']=[];
                }
            
            for($i=count($varDataSession['Log']['Specific'][$varUserSession]['Output']); $i!=0; $i--)
                {
                echo $varDataSession['Log']['Specific'][$varUserSession]['Output'][$i-1].'<br>';
                }
            
            //var_dump($varDataSession['Log']['Specific'][$varUserSession]['Output']);
            }


















            
        public static function setLogOutputOLD($varSubKey, $varUserSession, $varMessage)
            {
            //---> Cek apakah session sudah terbentuk
            if(!\App\Helpers\ZhtHelper\General\Session::isExist(\App\Helpers\ZhtHelper\System\Environment::getApplicationID()))
                {
                \App\Helpers\ZhtHelper\System\Registry::init();
                self::init();
                }
            $varData = \App\Helpers\ZhtHelper\General\Session::get(\App\Helpers\ZhtHelper\System\Environment::getApplicationID());
            //$varSubKey='Log::Specific::'.$varUserSession.'::Output::'.$varSubKey;

            $varDataLogOutput = self::getLogOutput('Log::Specific::'.$varUserSession.'::Output::'.$varSubKey, $varUserSession);
            if(!$varDataLogOutput)
                {
                $varDataLogOutput=[];
                }
            if(count($varDataLogOutput) == self::$varDataLogOutputMaxSize)
                {
                array_shift($varDataLogOutput);
                }
            array_push($varDataLogOutput, $varMessage);

            $varArrayTemp=explode('::', $varSubKey);
            switch(count($varArrayTemp))
                {
                case 1:
                    $varData['Log']['Specific'][$varUserSession]['Output'][$varArrayTemp[0]]=$varDataLogOutput;
                    break;
                case 2:
                    $varData['Log']['Specific'][$varUserSession]['Output'][$varArrayTemp[0]][$varArrayTemp[1]]=$varDataLogOutput;
                    break;
                case 3:
                    $varData['Log']['Specific'][$varUserSession]['Output'][$varArrayTemp[0]][$varArrayTemp[1]][$varArrayTemp[2]]=$varDataLogOutput;
                    break;
                case 4:
                    $varData['Log']['Specific'][$varUserSession]['Output'][$varArrayTemp[0]][$varArrayTemp[1]][$varArrayTemp[2]][$varArrayTemp[3]]=$varDataLogOutput;
                    break;
                case 5:
                    $varData['Log']['Specific'][$varUserSession]['Output'][$varArrayTemp[0]][$varArrayTemp[1]][$varArrayTemp[2]][$varArrayTemp[3]][$varArrayTemp[4]]=$varDataLogOutput;
                    break;
                case 6:
                    $varData['Log']['Specific'][$varUserSession]['Output'][$varArrayTemp[0]][$varArrayTemp[1]][$varArrayTemp[2]][$varArrayTemp[3]][$varArrayTemp[4]][$varArrayTemp[5]]=$varDataLogOutput;
                    break;
                }

//            var_dump($varSubKey);
            
            var_dump($varData);
            
            \App\Helpers\ZhtHelper\General\Session::set(\App\Helpers\ZhtHelper\System\Environment::getApplicationID(), $varData);
            
/*            $varRegistry = \App\Helpers\ZhtHelper\General\Session::get(\App\Helpers\ZhtHelper\System\Environment::getApplicationID());

            $varArrayTemp=explode('::', $varSubKey);
            switch(count($varArrayTemp))
                {
                case 1:
                    $varRegistry['Log']['Specific'][$varUserSession][$varArrayTemp[0]]=$varValue;
                    break;
                case 2:
                    $varRegistry['Log']['Specific'][$varUserSession][$varArrayTemp[0]][$varArrayTemp[1]]=$varValue;
                    break;
                case 3:
                    $varRegistry['Log']['Specific'][$varUserSession][$varArrayTemp[0]][$varArrayTemp[1]][$varArrayTemp[2]]=$varValue;
                    break;
                case 4:
                    $varRegistry['Log']['Specific'][$varUserSession][$varArrayTemp[0]][$varArrayTemp[1]][$varArrayTemp[2]][$varArrayTemp[3]]=$varValue;
                    break;
                case 5:
                    $varRegistry['Log']['Specific'][$varUserSession][$varArrayTemp[0]][$varArrayTemp[1]][$varArrayTemp[2]][$varArrayTemp[3]][$varArrayTemp[4]]=$varValue;
                    break;
                case 6:
                    $varRegistry['Log']['Specific'][$varUserSession][$varArrayTemp[0]][$varArrayTemp[1]][$varArrayTemp[2]][$varArrayTemp[3]][$varArrayTemp[4]][$varArrayTemp[5]]=$varValue;
                    break;
                }
*/

//            if(count(self::$varDataLogOutput) == self::$varDataLogOutputMaxSize)
  //              {
    //            array_shift(self::$varDataLogOutput);
      //          }
        //    array_push(self::$varDataLogOutput, $varMessage);
            }

        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getSpecificUserSession                                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-07-09                                                                                           |
        | ▪ Description     : Mendapatkan data Registry Spesifik (varValue) berdasarkan Parameter Kunci (varKey), Sub Parameter    |
        |                     Kunci (varSubKey), dan User Session (varUserSession)                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varKey                                                                                                   |
        |      ▪ (string) varSubKey                                                                                                |
        |      ▪ (string) varUserSession                                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varValue                                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getLogOutputOLD($varSubKey, $varUserSession)
            {
            //---> Cek apakah session sudah terbentuk
            if(!\App\Helpers\ZhtHelper\General\Session::isExist(\App\Helpers\ZhtHelper\System\Environment::getApplicationID()))
                {
                \App\Helpers\ZhtHelper\System\Registry::init();
                }              
            
            $varData = \App\Helpers\ZhtHelper\General\Session::get(\App\Helpers\ZhtHelper\System\Environment::getApplicationID());
            
            $varReturn=null;
            if(\App\Helpers\ZhtHelper\General\ArrayHandler::isKeyExistOnSubArray($varSubKey, $varData)==true)
                {
                $varArrayTemp=explode('::', $varSubKey);

                switch(count($varArrayTemp))
                    {
                    case 1:
                        $varReturn = $varData['Log']['Specific'][$varUserSession][$varArrayTemp[0]];
                        break;
                    case 2:
                        $varReturn = $varData['Log']['Specific'][$varUserSession][$varArrayTemp[0]][$varArrayTemp[1]];
                        break;
                    case 3:
                        $varReturn = $varData['Log']['Specific'][$varUserSession][$varArrayTemp[0]][$varArrayTemp[1]][$varArrayTemp[2]];
                        break;
                    case 4:
                        $varReturn = $varData['Log']['Specific'][$varUserSession][$varArrayTemp[0]][$varArrayTemp[1]][$varArrayTemp[2]][$varArrayTemp[3]];
                        break;
                    case 5:
                        $varReturn = $varData['Log']['Specific'][$varUserSession][$varArrayTemp[0]][$varArrayTemp[1]][$varArrayTemp[2]][$varArrayTemp[3]][$varArrayTemp[4]];
                        break;
                    case 6:
                        $varReturn = $varData['Log']['Specific'][$varUserSession][$varArrayTemp[0]][$varArrayTemp[1]][$varArrayTemp[2]][$varArrayTemp[3]][$varArrayTemp[4]][$varArrayTemp[5]];
                        break;
                    }
                }
            return $varReturn;
            }            
        }
    }

?>