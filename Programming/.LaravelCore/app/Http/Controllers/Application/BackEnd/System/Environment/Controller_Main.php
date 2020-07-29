<?php

namespace App\Http\Controllers\Application\BackEnd\System\Environment
    {
    //use Illuminate\Http\Request;
 
    class Controller_Main extends \App\Http\Controllers\Controller
        {
        public function __construct()
            {
            }

        public function getJSUnixTime()
            {
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::getJSUnixTime(000000);
            }
        }
    }
