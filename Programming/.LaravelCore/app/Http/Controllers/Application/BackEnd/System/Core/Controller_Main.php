<?php

namespace App\Http\Controllers\Application\BackEnd\System\Core
    {
    use Illuminate\Http\Request;
 
    class Controller_Main extends \App\Http\Controllers\Controller
        {
        public function __construct()
            {
            $this->middleware(\App\Http\Middleware\Application\BackEnd\RequestHandler_General::class);
            }

        public function init()
            {
            }
        
        public function getUserAuthentication($varUserName, $varUserPassword)
            {
            echo '<br>'.$varUserName;
            echo '<br>'.$varUserPassword;
            }
        }
    }
 

?>