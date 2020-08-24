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

/*        public function SendRequest()
            {
            $varUserSession = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
            \App\Helpers\ZhtHelper\General\Helper_Session::delete(\App\Helpers\ZhtHelper\System\Helper_Environment::getApplicationID());
//$varSQL="SELECT NOW();";
$varSQL="
    SELECT 
        * 
    FROM 
        \"SchSysConfig\".\"Func_TblRotateLog_APIRequest_SET\"( 
            NOW()::timestamptz, 
            'http://172.28.0.3/api/auth'::varchar, 
            'Mozilla/5.0 (X11; Fedora; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.135 Safari/537.36'::varchar, 
            '172.28.0.4'::cidr
            )      
";
\App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution($varUserSession, $varSQL);
var_dump($varSQL);
            }*/

            
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