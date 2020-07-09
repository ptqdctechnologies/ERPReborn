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
    | ▪ Class Name  : Session                                                                                                      |
    | ▪ Description : Menangani Session                                                                                            |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class ArrayHandler
        {
        private static $varNameSpace;
        
        public static function isKeyExist($varKey, $varData)
            {
            $varReturn = false;
            if (array_key_exists($varKey, $varData))
                {
                $varReturn = true;
                }
            return $varReturn;
            }
            
        public static function isKeyExistOnSubArray($varSubKey, $varData)
            {         
            //$varSubKey harus bernotasi KEY1::KEY2::KEY3::...
            
            //echo $varSubKey.'<br>';
            //var_dump($varData);
            //echo '<br>';
            
            $varReturn = false;
            $varArrayTemp=explode('::', $varSubKey);
            if(self::isKeyExist($varArrayTemp[0], $varData)==true)
                {
                $varReturn = true;
                if(is_array($varData[$varArrayTemp[0]])==true)
                    {
                    $varSubKeyNew='';
                    for($i=1; $i!=count($varArrayTemp); $i++)
                        {
                        if(strcmp($varSubKeyNew, '')!=0)
                            {
                            $varSubKeyNew.='::';
                            }
                        $varSubKeyNew .= $varArrayTemp[$i];
                        }
                    if(strcmp($varSubKeyNew, '')!=0)
                        {
                        if(self::isKeyExistOnSubArray($varSubKeyNew, $varData[$varArrayTemp[0]])==false)
                            {
                            $varReturn = false;
                            }                        
                        }
                    }
                }
            return $varReturn;
            }
            
/*        public static function isKeyExistOnSubArray($needle, $array)
            {
            foreach ($array as $key => $value) 
                {
                if ($key === $needle) 
                    {
                    return $value;
                    }
                if (is_array($value)) 
                    {
                    if ($x = self::isKeyExistOnSubArray($key, $value)) 
                        {
                        return $x;
                        }
                    }
                }
            return false;
            }*/
        }
    }