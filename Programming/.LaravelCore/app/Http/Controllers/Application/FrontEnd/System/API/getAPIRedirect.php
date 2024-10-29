<?php

namespace App\Http\Controllers\Application\FrontEnd\System\API
    {
    use Illuminate\Http\Request;
    use Illuminate\Http\Response;
 
    class getAPIRedirect extends \App\Http\Controllers\Controller
        {
        public function __construct()
            {
            }
        
        public function main(Request $varRequest)
            {
            $varAPIWebToken = \App\Helpers\ZhtHelper\System\Helper_Environment::getAPIWebToken_System();

            $varData = null;
            try {
                /*
                $varData = 
                    \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                        $varAPIWebToken, 
                        ($varRequest->all())[0],
                        ($varRequest->all())[1],
                        ($varRequest->all())[2],
                        FALSE,
                        FALSE
                        );
                */
                $varData = 
                    \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                        $varAPIWebToken, 
                        ($varRequest->all())['metadata']['API']['key'],
                        ($varRequest->all())['metadata']['API']['version'],
                        ($varRequest->all())['data'],
                        FALSE,
                        FALSE
                        );
                }
            catch (\Exception $ex) {
                }

            //$varReturn = response()->json($varData);
            
            $varReturn = 
                \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONEncode(
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                    $varData
                    );
            
            return
                $varReturn;
            }
        }
    }