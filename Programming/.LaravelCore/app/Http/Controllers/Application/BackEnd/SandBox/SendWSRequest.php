<?php

namespace App\Http\Controllers\Application\BackEnd\SandBox
    {
    use Illuminate\Http\Request;
 
    class SendWSRequest extends \App\Http\Controllers\Controller
        {
        public function __construct()
            {
            //$this->middleware(\App\Http\Middleware\Application\BackEnd\RequestHandler_General::class);
            }
            
        public function SendRequest()
            {
            $varUserSession = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();

            \App\Helpers\ZhtHelper\General\Helper_Session::delete(\App\Helpers\ZhtHelper\System\Helper_Environment::getApplicationID());

            $varAPIVersion = 1;
            $varUserName = 'teguh.pratama';
            $varUserPassword = 'teguhpratama789';
            
            $varAPI = [
                'authentication', 
                'getUserAuthentication', 
                $varAPIVersion
                ];
            $varData = [
                $varUserName,
                $varUserPassword
                ];

            $ObjEngine = new \App\Http\Controllers\Application\BackEnd\System\Core\Engines\API\Authentication\Controller_Main();
            $varDataSend = $ObjEngine->getUserAuthentication(
                $varUserSession, 
                $varAPI, 
                $varData
                );          
            echo "<br>Tunggu data masuk<br>";
            var_dump($varDataSend);
            echo "<br>Finish";
            }
        }
    }