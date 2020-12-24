<?php

namespace App\Http\Controllers\Application\BackEnd\System\Core
    {
    //use Illuminate\Http\Request;
 
    class Controller_Main_APISystem extends \App\Http\Controllers\Controller
        {
        public function __construct()
            {
            }
        
        public function init()
            {
            }
            
        public function getUniqueID()
            {
            $varUserSession=1;
            $varReturn = json_encode(\App\Helpers\ZhtHelper\General\Helper_RandomNumber::getUniqueID($varUserSession));
            return $varReturn;
            }
            
        }
    }