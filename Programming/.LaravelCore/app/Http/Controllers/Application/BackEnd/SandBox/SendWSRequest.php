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

/*            $varUserName = 'teguh.pratama';
            $varUserPassword = 'teguhpratama789';
            
            $varAPI = [
                'service' => 'authentication',
                'class' => 'general', 
                'subClass' => 'getUserAuthentication', 
                'version' => 'latest'
                ];
            $varData = [
                'userName' => $varUserName,
                'userPassword' => $varUserPassword
                ];

            $ObjEngine = new \App\Http\Controllers\Application\BackEnd\System\Core\Engines\API\Authentication\Controller_Main();
            $varDataSend = $ObjEngine->getUserAuthentication(
                $varUserSession, 
                $varAPI, 
                $varData
                );          */
            
            $ObjEngine = new \App\Http\Controllers\Application\BackEnd\System\Authentication\Controller_Main();
            $varDataSend = $ObjEngine->getUserAuthentication();
              
/*            $varAPI = [
                'service' => 'core',
                'class' => 'API', 
                'subClass' => 'setNotificationSuccess', 
                'version' => 'latest'
                ];
            $varData = [
                'HTTPStatusCode' => 403,
                'message' => 'Failed'
                ];
            $varDataSend = (new \App\Http\Controllers\Application\BackEnd\System\Core\Controller_Main())->setNotificationSuccess($varData);
*/            
            echo "<br>Tunggu data masuk<br>";
            

            
            var_dump($varDataSend);
            echo "<br>Finish";
            }
        }
    }