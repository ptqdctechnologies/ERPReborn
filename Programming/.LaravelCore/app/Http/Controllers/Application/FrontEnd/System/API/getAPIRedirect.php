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
        
        public function main()
            {
            $varAPIWebToken = \App\Helpers\ZhtHelper\System\Helper_Environment::getAPIWebToken_System();
            
            $varData = 
                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                    $varAPIWebToken, 
                    'dataWarehouse.dataCheck.recordIDExistantion.acquisition.getFileUpload_Pointer', 
                    'latest', 
                    [
                    'parameter' => [
                        'recordID' => 91000000000001
                        ]
                    ]
                    );

            $varData = [
                'metadata' => [
                    'APIResponse' => [
                        'key' => $varData['metadata']['APIResponse']['key'],
                        'version' => $varData['metadata']['APIResponse']['version']
                        ],
                    'successStatus' => ($varData['metadata']['HTTPStatusCode'] == 200 ? true : false)
                    ],
                'data' => $varData['data']
                ];
            
            return $varData;
            
            
/*            
            $x = request()->json()->all();
            dd($x);
            echo "OK";
            //dd($varRequest->post());

 */
            }
        }
    }