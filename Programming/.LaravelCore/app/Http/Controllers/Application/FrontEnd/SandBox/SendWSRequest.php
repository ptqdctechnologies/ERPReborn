<?php

namespace App\Http\Controllers\Application\FrontEnd\SandBox
    {
    use Illuminate\Http\Request;
 
    class SendWSRequest extends \App\Http\Controllers\Controller
        {
        public function __construct()
            {
            }

        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIAuthentication_SetLogin()
            {
            //---Parameter Set---
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIAuthentication(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                'teguh.pratama', 
                'teguhpratama789'
                );
            var_dump($varData);
            }


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_GetSessionData()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwMzY5NTU1NX0.Jm6CYvXA5AKO5yuDbbFvp0IgFdrZuEKnuBul4yc1-W0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'environment.general.session.getData', 
                'latest', 
                [
                ]
                );
            var_dump($varData);
            }


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_SetLoginBranchAndUserRole()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwMzY5NTU1NX0.Jm6CYvXA5AKO5yuDbbFvp0IgFdrZuEKnuBul4yc1-W0';
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwMzY5OTQ5MH0.aP8v2hl2xGva29s7qOdEP2UQEaS0YQn3vmpMfp2HtqE';
            $varBranchID = 11000000000004;
            $varUserRoleID = 95000000000007;
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'authentication.general.setLoginBranchAndUserRole', 
                'latest', 
                [
                    'branchID' => $varBranchID,
                    'userRoleID' => $varUserRoleID
                ]
                );
            var_dump($varData);            
            }


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_SetLogout()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwMzY5NTU1NX0.Jm6CYvXA5AKO5yuDbbFvp0IgFdrZuEKnuBul4yc1-W0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'authentication.general.setLogout', 
                'latest'
                );
            var_dump($varData);            
            }


        /*------------------------*/
        /* API Stage : Not Stable */
        /*------------------------*/
        public function APIGateway_getDataListCountry()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwMzY5NTU1NX0.Jm6CYvXA5AKO5yuDbbFvp0IgFdrZuEKnuBul4yc1-W0';
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwMzY5OTQ5MH0.aP8v2hl2xGva29s7qOdEP2UQEaS0YQn3vmpMfp2HtqE';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.read.master.getDataListCountry', 
                'latest', 
                [
                'SQLStatement' => [
                    'pick' => '*',
                    'sort' => null,
//                    'filter' => '"InternationalName" ILIKE \'%nesia%\'; DROP table',
                    'filter' => '"InternationalName" ILIKE \'%nesia%\'',
                    'paging' => null
                    ]
                ]
                );
            var_dump($varData);
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