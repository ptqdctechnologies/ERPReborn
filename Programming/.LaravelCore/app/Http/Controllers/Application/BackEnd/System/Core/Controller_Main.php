<?php

namespace App\Http\Controllers\Application\BackEnd\System\Core
    {
    use Illuminate\Http\Request;
 
    class Controller_Main extends \App\Http\Controllers\Controller
        {
        public function __construct()
            {
            //$this->middleware(\App\Http\Middleware\Application\BackEnd\RequestHandler_General::class, ['except' => [], 'userSession:000000']);
            $this->middleware(\App\Http\Middleware\Application\BackEnd\RequestHandler_General::class);
            
            //$this->middleware(\App\Http\Middleware\Application\BackEnd\RequestHandler_General::class, ['userSession:000000']);
            //$this->middleware('userSession:000000');

            //$this->varUserSession = 0000;

            $this->middleware(\App\Http\Middleware\Application\BackEnd\RequestHandler_General::class, ['varUserSession:000000']);

            //$this->middleware(\App\Http\Middleware\Application\BackEnd\RequestHandler_General::class, ['except' => [], $this->varUserSession]);
            
            
            //$this->middleware('role:editor');
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