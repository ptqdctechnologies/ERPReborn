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
            
        public static function setLogOutput($varMessage)
            {
            if(count(self::$varDataLogOutput) == self::$varDataLogOutputMaxSize)
                {
                array_shift(self::$varDataLogOutput);
                }
            array_push(self::$varDataLogOutput, $varMessage);
            }
        }
    }

?>