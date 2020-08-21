<?php

namespace App\Http\Controllers\Application\FrontEnd\SandBox
    {
    use Illuminate\Http\Request;
 
    class SendWSRequest extends \App\Http\Controllers\Controller
        {
        public function __construct()
            {
            }


        public function SendAuthRequest()
            {
\App\Helpers\ZhtHelper\General\Helper_Session::delete(\App\Helpers\ZhtHelper\System\Helper_Environment::getApplicationID());
            $varUserSession = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Send Authentication Request');
                try {

                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    $varDataArray = [
                        'metadata' => [
                            'API' => [
                                'version' => 'latest'
                                ]
                            ],
                        'data' => [
                            'userName' => 'teguh.pratama',
                            'userPassword' => 'teguhpratama789'
                            ]
                        ];
                    $varResponseData = \App\Helpers\ZhtHelper\System\Helper_HTTPResponse::getResponse(
                        $varUserSession, 
                        \App\Helpers\ZhtHelper\System\Helper_Environment::getFrontEndConfigEnvironment($varUserSession, 'URL_BACKEND_API_AUTH'),
                        $varDataArray
                        );
                    
                    if($varResponseData['metadata']['HTTPStatusCode']==200)
                        {
                        var_dump($varResponseData);
                        }
                    else
                        {
                        echo $varResponseData['data']['message'];
                        }
                    
                    
//phpinfo();
//                    echo "RESPON DATA : ";
//                    echo "<br>~~~~~~~~~~~~~~~~~~~~~~~<br>";
//                    $x = \App\Helpers\ZhtHelper\General\Helper_File::getFilesListInFolder($varUserSession, getcwd().'/./../app/Http/Controllers/Application/BackEnd/System/Authentication/Engines/general/getUserAuthentication');
//                    var_dump($x);
//                    echo "<br>~~~~~~~~~~~~~~~~~~~~~~~<br>";
//                    var_dump(headers_list());

                    //---- ( MAIN CODE ) ----------------------------------------------------------------------- [ END POINT ] -----
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Success');
                    } 
                catch (\Exception $ex) {
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Failed, '. $ex->getMessage());
                    }
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
                } 
            catch (\Exception $ex) {
                }
            \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }

            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            

        public function SendRequest()
            {
            $varUserSession=000000;
            $varDataArray = [
                'System' => [],
                'Data' => []
                ];

            $x = \App\Helpers\ZhtHelper\System\Helper_HTTPResponse::getResponse(
                $varUserSession, 
                \App\Helpers\ZhtHelper\System\Helper_Environment::getFrontEndConfigEnvironment($varUserSession, 'URL_BACKEND_API_GATEWAY'),                  
                $varDataArray
                );
            echo "<br>Tunggu data masuk<br>";
            var_dump($x);
            echo "<br>Finish";
            }
        }
    }