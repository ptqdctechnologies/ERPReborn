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

                $ObjEngine = new \App\Http\Controllers\Application\BackEnd\System\Core\Engines\API\Authentication\Controller_Main();
                $varDataSend = $ObjEngine->getUserAuthentication($varUserSession, $varAPIVersion, [$varUserName, $varUserPassword]);

            
            
/*            $varDataArray = [
                'metadata' => [
                    'APIVersion' => 1
                    ],
                'data' => [
                    'userName' => 'teguh.pratama',
                    'userPassword' => 'teguhpratama789'
                    ]
                ];
            
            $x = \App\Helpers\ZhtHelper\System\Helper_HTTPResponse::getResponse(
                $varUserSession, 
                'http://172.28.0.3/api/auth',
                $varDataArray
                );*/
            echo "<br>Tunggu data masuk<br>";
            //var_dump($x);
            echo "<br>Finish";
            }
        }
    }