<?php

namespace App\Http\Controllers\Application\FrontEnd\System
    {
    use Illuminate\Http\Request;
    use Illuminate\Http\Response;
 
    class Controller_JQueryAPI extends \App\Http\Controllers\Controller
        {
        public function __construct()
            {
            }

        public function setRequest()
            {
//            echo "xxx";

//            echo \App\Helpers\
            
            
            
            
            
            
            
            $varUserSession = 000000;
          
            $varDataReceive = \App\Helpers\ZhtHelper\System\Helper_HTTPRequest::getRequest($varUserSession);

/*            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                //\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                111,
                $varDataReceive['APIWebToken'], 
                $varDataReceive['APIKey'], 
                $varDataReceive['APIVersion'], 
                $varDataReceive['data']
                );
 */
            return response()->json($varDataReceive);
            //return response()->json($varData);
//            return response()->json(['xxx' => \App\Helpers\ZhtHelper\System\Helper_Environment::getFrontEndConfigEnvironment($varUserSession, 'URL_BACKEND_API_GATEWAY')]);
            }   
        }   
    }