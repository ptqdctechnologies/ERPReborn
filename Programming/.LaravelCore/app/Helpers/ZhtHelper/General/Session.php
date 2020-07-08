<?php

namespace App\Helpers\ZhtHelper\General
    {
    use Illuminate\Http\Request;
    
    class Session
        {
        private static $varNameSpace;
        
        public static function init()
            {
            self::$varNameSpace=get_class();
            }

        public static function set($varKey, $varValue)
            {
            session([$varKey => $varValue]);
            }
            
        public static function get($varKey)
            {
            $varReturn = session($varKey);
            return $varReturn;
            }
            
        public static function destroy($varKey)
            {
            session()->forget($varKey);
            }
            
        }
    }