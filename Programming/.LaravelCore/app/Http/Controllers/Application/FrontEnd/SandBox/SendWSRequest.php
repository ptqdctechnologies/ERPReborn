<?php

namespace App\Http\Controllers\Application\FrontEnd\SandBox
    {
    use Illuminate\Http\Request;
 
    class SendWSRequest extends \App\Http\Controllers\Controller
        {
        public function __construct()
            {
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : authentication.general.setLogin                                                                          |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIAuthentication_setLogin()
            {
            //---Parameter Set---
            $varUserID = 'sysadmin';
            $varUserPassword = 'sysadmin1234';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIAuthentication(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varUserID, 
                $varUserPassword
                );
            var_dump($varData);
            }
        public function APIAuthenticationJQuery_setLogin()
            {
            //---Parameter Set---
            $varUserName = 'sysadmin';
            $varUserPassword = 'sysadmin1234';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_UserName" value="'.$varUserName.'">';
            echo '<input type="text" id="dataInput_UserPassword" value="'.$varUserPassword.'">';
            //---Core---          
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIAuthenticationJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                '{'.
                    '"userName" : document.getElementById("dataInput_UserName").value, '.
                    '"userPassword" : document.getElementById("dataInput_UserPassword").value '.
                '}'
                ); 
            
            echo "<button type='button' onclick='javascript: var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : environment.general.session.getData                                                                      |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_getSessionData()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
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
        public function APIGatewayJQuery_getSessionData()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'environment.general.session.getData', 
                'latest', 
                '{'.
                '}'
                );            
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : environment.general.session.getUserPrivilegesMenu                                                        |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_getSessionUserPrivilegesMenu()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'environment.general.session.getUserPrivilegesMenu', 
                'latest', 
                [
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_getSessionUserPrivilegesMenu()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'environment.general.session.getUserPrivilegesMenu', 
                'latest', 
                '{'.
                '}'
                );            
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : environment.general.session.setUserSessionSysEngine                                                      |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setUserSessionSysEngine()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'environment.general.session.setUserSessionSysEngine', 
                'latest', 
                [
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setUserSessionSysEngine()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'environment.general.session.setUserSessionSysEngine', 
                'latest', 
                '{'.
                '}'
                );            
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : authentication.general.setLoginBranchAndUserRole                                                         |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setLoginBranchAndUserRole()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
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
            //var_dump($varData);
            var_dump(json_encode($varData));
            }
        public function APIGatewayJQuery_setLoginBranchAndUserRole()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_BranchID" value="11000000000004">';
            echo '<input type="text" id="dataInput_UserRoleID" value="95000000000007">';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'authentication.general.setLoginBranchAndUserRole', 
                'latest', 
                '{'.
                    '"branchID" : parseInt(document.getElementById("dataInput_BranchID").value), '.
                    '"userRoleID" : parseInt(document.getElementById("dataInput_UserRoleID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : authentication.general.setLogout                                                                         |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setLogout()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'authentication.general.setLogout', 
                'latest'
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setLogout()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'authentication.general.setLogout', 
                'latest', 
                '{'.
                '}'
                );            
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : scheduler.everyDay.system.setJobs                                                                        |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_callSchedulerEveryDay()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'scheduler.everyDay.system.setJobs', 
                'latest',
                [
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_callSchedulerEveryDay()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'scheduler.everyDay.system.setJobs', 
                'latest', 
                '{'.
                '}'
                );            
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }

    
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : scheduler.everyHour.system.setJobs                                                                       |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_callSchedulerEveryHour()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'scheduler.everyHour.system.setJobs', 
                'latest',
                [
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_callSchedulerEveryHour()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'scheduler.everyHour.system.setJobs', 
                'latest', 
                '{'.
                '}'
                );            
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : scheduler.everyMinute.system.setJobs                                                                     |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_callSchedulerEveryMinute()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'scheduler.everyMinute.system.setJobs', 
                'latest',
                [
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_callSchedulerEveryMinute()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'scheduler.everyMinute.system.setJobs', 
                'latest', 
                '{'.
                '}'
                );            
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : scheduler.everyMonth.system.setJobs                                                                      |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_callSchedulerEveryMonth()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'scheduler.everyMonth.system.setJobs', 
                'latest',
                [
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_callSchedulerEveryMonth()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'scheduler.everyMonth.system.setJobs', 
                'latest', 
                '{'.
                '}'
                );            
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : scheduler.everyTwoHours.system.setJobs                                                                   |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_callSchedulerEveryTwoHours()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'scheduler.everyTwoHours.system.setJobs', 
                'latest',
                [
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_callSchedulerEveryTwoHours()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'scheduler.everyTwoHours.system.setJobs', 
                'latest', 
                '{'.
                '}'
                );            
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : scheduler.everyWeek.system.setJobs                                                                       |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_callSchedulerEveryWeek()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'scheduler.everyWeek.system.setJobs', 
                'latest',
                [
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_callSchedulerEveryWeek()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'scheduler.everyWeek.system.setJobs', 
                'latest', 
                '{'.
                '}'
                );            
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : scheduler.everyYear.system.setJobs                                                                       |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_callSchedulerEveryYear()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'scheduler.everyYear.system.setJobs', 
                'latest',
                [
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_callSchedulerEveryYear()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'scheduler.everyYear.system.setJobs', 
                'latest', 
                '{'.
                '}'
                );            
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.create.master.setBloodAglutinogenType                                                        |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataCreateBloodAglutinogenType()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.create.master.setBloodAglutinogenType', 
                'latest', 
                [
                'entities' => [
                    'type' => 'xx'
                    ]
                ]
                );
            var_dump(json_encode($varData));
            }
        public function APIGatewayJQuery_setDataCreateBloodAglutinogenType()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_Type" value="xx">';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.create.master.setBloodAglutinogenType', 
                'latest', 
                '{'.
                    '"entities" : {'.
                        '"type" : document.getElementById("dataInput_Type").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.create.master.setBusinessDocumentType                                                        |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataCreateBusinessDocumentType()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.create.master.setBusinessDocumentType', 
                'latest', 
                [
                'entities' => [
                    'name' => 'New Business Document Type Data'
                    ]
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataCreateBusinessDocumentType()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_Name" value="New Business Document Type Data">';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.create.master.setBusinessDocumentType', 
                'latest', 
                '{'.
                    '"entities" : {'.
                        '"name" : document.getElementById("dataInput_Name").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.create.master.setDayOffGovernmentPolicy                                                      |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataCreateDayOffGovernmentPolicy()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.create.master.setDayOffGovernmentPolicy', 
                'latest', 
                [
                'entities' => [
                    'country_RefID' => 20000000000078,
                    'name' => 'Pilkada Nasional',
                    'validStartDate' => '2020-12-09',
                    'validFinishDate' => '2020-12-09'
                    ]
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataCreateDayOffGovernmentPolicy()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_Country_RefID" value=20000000000078>';
            echo '<input type="text" id="dataInput_Name" value="Pilkada Nasional">';
            echo '<input type="text" id="dataInput_ValidStartDate" value="2020-12-09">';
            echo '<input type="text" id="dataInput_ValidFinishDate" value="2020-12-09">';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.create.master.setDayOffGovernmentPolicy', 
                'latest', 
                '{'.
                    '"entities" : {'.
                        '"country_RefID" : parseInt(document.getElementById("dataInput_Country_RefID").value), '.
                        '"name" : document.getElementById("dataInput_Name").value, '.
                        '"validStartDate" : document.getElementById("dataInput_ValidStartDate").value, '.
                        '"validFinishDate" : document.getElementById("dataInput_ValidFinishDate").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.create.customerRelation.setCustomer                                                          |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataCreateCustomer()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.create.customerRelation.setCustomer', 
                'latest', 
                [
                'entities' => [
                    'entity_RefID' => 124000000000002,
                    'code' => 'IMD'
                    ]
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataCreateCustomer()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_Entity_RefID" value=124000000000002>';
            echo '<input type="text" id="dataInput_Code" value="IMD">';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.create.customerRelation.setCustomer', 
                'latest', 
                '{'.
                    '"entities" : {'.
                        '"entity_RefID" : parseInt(document.getElementById("dataInput_Entity_RefID").value), '.
                        '"code" : document.getElementById("dataInput_Code").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.create.customerRelation.setSalesOrder                                                        |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataCreateSalesOrder()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.create.customerRelation.setSalesOrder', 
                'latest', 
                [
                'entities' => [
                    'businessDocumentVersion_RefID' => 75000000000004,
                    'customer_RefID' => 125000000000005
                    ]
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataCreateSalesOrder()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_BusinessDocumentVersion_RefID" value=75000000000004>';
            echo '<input type="text" id="dataInput_Customer_RefID" value=125000000000005>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.create.customerRelation.setSalesOrder', 
                'latest', 
                '{'.
                    '"entities" : {'.
                        '"businessDocumentVersion_RefID" : parseInt(document.getElementById("dataInput_BusinessDocumentVersion_RefID").value), '.
                        '"customer_RefID" : parseInt(document.getElementById("dataInput_Customer_RefID").value)'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.create.master.setDayOffNational                                                              |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataCreateDayOffNational()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.create.master.setDayOffNational', 
                'latest', 
                [
                'entities' => [
                    'country_RefID' => 20000000000078,
                    'name' => 'Tahun Baru 2021',
                    'validStartDate' => '2021-01-01',
                    'validFinishDate' => '2021-01-01'
                    ]
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataCreateDayOffNational()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_Country_RefID" value=20000000000078>';
            echo '<input type="text" id="dataInput_Name" value="Tahun Baru 2021">';
            echo '<input type="text" id="dataInput_ValidStartDate" value="2021-01-01">';
            echo '<input type="text" id="dataInput_ValidFinishDate" value="2021-01-01">';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.create.master.setDayOffNational', 
                'latest', 
                '{'.
                    '"entities" : {'.
                        '"country_RefID" : parseInt(document.getElementById("dataInput_Country_RefID").value), '.
                        '"name" : document.getElementById("dataInput_Name").value, '.
                        '"validStartDate" : document.getElementById("dataInput_ValidStartDate").value, '.
                        '"validFinishDate" : document.getElementById("dataInput_ValidFinishDate").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.create.master.setGoodsModel                                                                  |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataCreateGoodsModel()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.create.master.setGoodsModel', 
                'latest', 
                [
                'entities' => [
                    'tradeMark_RefID' => 15000000000001,
                    'goodsType_RefID' => 102000000000001,
                    'modelName' => 'New Model Name',
                    'modelNumber' => 'New Model Number'
                    ]
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataCreateGoodsModel()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_TradeMark_RefID" value=15000000000001>';
            echo '<input type="text" id="dataInput_GoodsType_RefID" value=102000000000001>';
            echo '<input type="text" id="dataInput_ModelName" value="New Model Name">';
            echo '<input type="text" id="dataInput_ModelNumber" value="New Model Number">';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.create.master.setGoodsModel', 
                'latest', 
                '{'.
                    '"entities" : {'.
                        '"tradeMark_RefID" : parseInt(document.getElementById("dataInput_TradeMark_RefID").value), '.
                        '"goodsType_RefID" : parseInt(document.getElementById("dataInput_GoodsType_RefID").value), '.
                        '"modelName" : document.getElementById("dataInput_ModelName").value, '.
                        '"modelNumber" : document.getElementById("dataInput_ModelNumber").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.create.master.setGoodsType                                                                   |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataCreateGoodsType()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.create.master.setGoodsType', 
                'latest', 
                [
                'entities' => [
                    'name' => 'New Goods Type Name'
                    ]
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataCreateGoodsType()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_Name" value="New Goods Type Name">';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.create.master.setGoodsType', 
                'latest', 
                '{'.
                    '"entities" : {'.
                        '"name" : document.getElementById("dataInput_Name").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.create.master.setInstitution                                                                 |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataCreateInstitution()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.create.master.setInstitution', 
                'latest', 
                [
                'entities' => [
                    'name' => 'New Institution Name',
                    'institutionType_RefID' => 141000000000003
                    ]
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataCreateInstitution()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_Name" value="New Institution Name">';
            echo '<input type="text" id="dataInput_InstitutionType_RefID" value=141000000000003>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.create.master.setInstitution', 
                'latest', 
                '{'.
                    '"entities" : {'.
                        '"name" : document.getElementById("dataInput_Name").value, '.
                        '"institutionType_RefID" : parseInt(document.getElementById("dataInput_InstitutionType_RefID").value)'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.create.master.setInstitutionBranch                                                           |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataCreateInstitutionBranch()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.create.master.setInstitutionBranch', 
                'latest', 
                [
                'entities' => [
                    'institution_RefID' => 123000000000062,
                    'name' => 'New Institution Branch Name',
                    'address' => 'Address',
                    'countryAdministrativeAreaLevel_RefID' => null,
                    'postalCode' => '12345',
                    ]
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataCreateInstitutionBranch()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_Institution_RefID" value=123000000000062>';
            echo '<input type="text" id="dataInput_Name" value="New Institution Name">';
            echo '<input type="text" id="dataInput_Address" value="Address">';
            echo '<input type="text" id="dataInput_CountryAdministrativeAreaLevel_RefID" value=null>';
            echo '<input type="text" id="dataInput_PostalCode" value="12345">';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.create.master.setInstitutionBranch', 
                'latest', 
                '{'.
                    '"entities" : {'.
                        '"institution_RefID" : parseInt(document.getElementById("dataInput_Institution_RefID").value), '.
                        '"name" : document.getElementById("dataInput_Name").value, '.
                        '"address" : document.getElementById("dataInput_Address").value, '.
                        '"countryAdministrativeAreaLevel_RefID" : parseInt(document.getElementById("dataInput_CountryAdministrativeAreaLevel_RefID").value), '.
                        '"postalCode" : document.getElementById("dataInput_PostalCode").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.create.master.setInstitutionType                                                             |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataCreateInstitutionType()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.create.master.setInstitutionType', 
                'latest', 
                [
                'entities' => [
                    'name' => 'New Institution Type Name',
                    'prefix' => 'Prefix',
                    'suffix' => 'Suffix',
                    ]
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataCreateInstitutionType()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_Name" value="New Institution Type Name">';
            echo '<input type="text" id="dataInput_Prefix" value="Prefix">';
            echo '<input type="text" id="dataInput_Suffix" value="Suffix">';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.create.master.setInstitutionType', 
                'latest', 
                '{'.
                    '"entities" : {'.
                        '"name" : document.getElementById("dataInput_Name").value, '.
                        '"prefix" : document.getElementById("dataInput_Prefix").value, '.
                        '"suffix" : document.getElementById("dataInput_Suffix").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.create.master.setPeriod                                                                      |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataCreatePeriod()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.create.master.setPeriod', 
                'latest', 
                [
                'entities' => [
                    'name' => 'New Period Name'
                    ]
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataCreatePeriod()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_Name" value="New Period Name">';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.create.master.setPeriod', 
                'latest', 
                '{'.
                    '"entities" : {'.
                        '"name" : document.getElementById("dataInput_Name").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.create.master.setPerson                                                                      |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataCreatePerson()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.create.master.setPerson', 
                'latest', 
                [
                'entities' => [
                    'name' => 'New Person Name',
                    'photo_RefJSON' => null
                    ]
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataCreatePerson()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_Name" value="New Person Name">';
            echo '<input type="text" id="dataInput_Photo_RefJSON" value="">';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.create.master.setPerson', 
                'latest', 
                '{'.
                    '"entities" : {'.
                        '"name" : document.getElementById("dataInput_Name").value, '.
                        '"photo_RefJSON" : document.getElementById("dataInput_Photo_RefJSON").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.create.master.setPersonAccountEMail                                                          |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataCreatePersonAccountEMail()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.create.master.setPersonAccountEMail', 
                'latest', 
                [
                'entities' => [
                    'person_RefID' => 25000000000001,
                    'account' => 'xyz@gmail.com'
                    ]
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataCreatePersonAccountEMail()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_Person_RefID" value=25000000000001>';
            echo '<input type="text" id="dataInput_Account" value="xyz@gmail.com">';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.create.master.setPersonAccountEMail', 
                'latest', 
                '{'.
                    '"entities" : {'.
                        '"person_RefID" : parseInt(document.getElementById("dataInput_Person_RefID").value), '.
                        '"account" : document.getElementById("dataInput_Account").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.create.master.setPersonGender                                                                |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataCreatePersonGender()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.create.master.setPersonGender', 
                'latest', 
                [
                'entities' => [
                    'name' => 'New Person Gender Name'
                    ]
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataCreatePersonGender()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_Name" value="New Person Gender Name">';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.create.master.setPersonGender', 
                'latest', 
                '{'.
                    '"entities" : {'.
                        '"name" : document.getElementById("dataInput_Name").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.create.master.setProduct                                                                     |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataCreateProduct()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.create.master.setProduct', 
                'latest', 
                [
                'entities' => [
                    'code' => 'New Product Code',
                    'name' => 'New Product Name',
                    'productType_RefID' => 87000000000001,
                    'quantityUnit_RefID' => 73000000000001
                    ]
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataCreateProduct()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_Code" value="New Product Code">';
            echo '<input type="text" id="dataInput_Name" value="New Product Name">';
            echo '<input type="text" id="dataInput_ProductType_RefID" value=87000000000001>';
            echo '<input type="text" id="dataInput_QuantityUnit_RefID" value=73000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.create.master.setProduct', 
                'latest', 
                '{'.
                    '"entities" : {'.
                        '"code" : document.getElementById("dataInput_Code").value, '.
                        '"name" : document.getElementById("dataInput_Name").value, '.
                        '"productType_RefID" : parseInt(document.getElementById("dataInput_ProductType_RefID").value), '.
                        '"quantityUnit_RefID" : parseInt(document.getElementById("dataInput_QuantityUnit_RefID").value)'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.create.master.setProductType                                                                 |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataCreateProductType()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.create.master.setProductType', 
                'latest', 
                [
                'entities' => [
                    'name' => 'New Product Type Name'
                    ]
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataCreateProductType()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_Name" value="New Product Type Name">';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.create.master.setProductType', 
                'latest', 
                '{'.
                    '"entities" : {'.
                        '"name" : document.getElementById("dataInput_Name").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.create.master.setQuantityUnit                                                                |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataCreateQuantityUnit()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.create.master.setQuantityUnit', 
                'latest', 
                [
                'entities' => [
                    'name' => 'New Quantity Unit Data'
                    ]
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataCreateQuantityUnit()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_Name" value="New Quantity Unit Data">';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.create.master.setQuantityUnit', 
                'latest', 
                '{'.
                    '"entities" : {'.
                        '"name" : document.getElementById("dataInput_Name").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.create.master.setReligion                                                                    |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataCreateReligion()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.create.master.setReligion', 
                'latest', 
                [
                'entities' => [
                    'name' => 'New Religion Data'
                    ]
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataCreateReligion()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_Name" value="New Religion Data">';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.create.master.setReligion', 
                'latest', 
                '{'.
                    '"entities" : {'.
                        '"name" : document.getElementById("dataInput_Name").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.create.master.setTradeMark                                                                   |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataCreateTradeMark()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.create.master.setTradeMark', 
                'latest', 
                [
                'entities' => [
                    'name' => 'New Trade Mark Data'
                    ]
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataCreateTradeMark()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_Name" value="New Trade Mark Data">';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.create.master.setTradeMark', 
                'latest', 
                '{'.
                    '"entities" : {'.
                        '"name" : document.getElementById("dataInput_Name").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.master.setBloodAglutinogenType                                                        |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeleteBloodAglutinogenType()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.master.setBloodAglutinogenType', 
                'latest', 
                [
                'recordID' => 27000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeleteBloodAglutinogenType()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=27000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.master.setBloodAglutinogenType', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.master.setBusinessDocument                                                            |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeleteBusinessDocument()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.master.setBusinessDocument', 
                'latest', 
                [
                'recordID' => 74000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeleteBusinessDocument()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=74000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.master.setBusinessDocument', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.master.setBusinessDocumentNumbering                                                   |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeleteBusinessDocumentNumbering()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.master.setBusinessDocumentNumbering', 
                'latest', 
                [
                'recordID' => 128000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeleteBusinessDocumentNumbering()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=128000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.master.setBusinessDocumentNumbering', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.master.setBusinessDocumentNumberingFormat                                             |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeleteBusinessDocumentNumberingFormat()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.master.setBusinessDocumentNumberingFormat', 
                'latest', 
                [
                'recordID' => 127000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeleteBusinessDocumentNumberingFormat()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=127000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.master.setBusinessDocumentNumberingFormat', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.master.setBusinessDocumentType                                                        |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeleteBusinessDocumentType()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.master.setBusinessDocumentType', 
                'latest', 
                [
                'recordID' => 77000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeleteBusinessDocumentType()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=77000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.master.setBusinessDocumentType', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.master.setBusinessDocumentVersion                                                     |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeleteBusinessDocumentVersion()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.master.setBusinessDocumentVersion', 
                'latest', 
                [
                'recordID' => 75000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeleteBusinessDocumentVersion()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=75000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.master.setBusinessDocumentVersion', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.master.setCitizenFamilyCard                                                           |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeleteCitizenFamilyCard()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.master.setCitizenFamilyCard', 
                'latest', 
                [
                'recordID' => 30000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeleteCitizenFamilyCard()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=30000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.master.setCitizenFamilyCard', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.master.setCitizenFamilyCardMember                                                     |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeleteCitizenFamilyCardMember()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.master.setCitizenFamilyCardMember', 
                'latest', 
                [
                'recordID' => 89000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeleteCitizenFamilyCardMember()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=89000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.master.setCitizenFamilyCardMember', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.master.setCitizenIdentity                                                             |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeleteCitizenIdentity()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.master.setCitizenIdentity', 
                'latest', 
                [
                'recordID' => 28000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeleteCitizenIdentity()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=28000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.master.setCitizenIdentity', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.master.setCitizenIdentityCard                                                         |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeleteCitizenIdentityCard()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.master.setCitizenIdentityCard', 
                'latest', 
                [
                'recordID' => 29000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeleteCitizenIdentityCard()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=29000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.master.setCitizenIdentityCard', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.master.setCountry                                                                     |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeleteCountry()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.master.setCountry', 
                'latest', 
                [
                'recordID' => 20000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeleteCountry()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=20000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.master.setCountry', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.master.setCountryAdministrativeAreaLevel1                                             |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeleteCountryAdministrativeAreaLevel1()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.master.setCountryAdministrativeAreaLevel1', 
                'latest', 
                [
                'recordID' => 21000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeleteCountryAdministrativeAreaLevel1()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=21000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.master.setCountryAdministrativeAreaLevel1', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.master.setCountryAdministrativeAreaLevel2                                             |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeleteCountryAdministrativeAreaLevel2()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.master.setCountryAdministrativeAreaLevel2', 
                'latest', 
                [
                'recordID' => 22000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeleteCountryAdministrativeAreaLevel2()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=22000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.master.setCountryAdministrativeAreaLevel2', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.master.setCountryAdministrativeAreaLevel3                                             |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeleteCountryAdministrativeAreaLevel3()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.master.setCountryAdministrativeAreaLevel3', 
                'latest', 
                [
                'recordID' => 23000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeleteCountryAdministrativeAreaLevel3()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=23000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.master.setCountryAdministrativeAreaLevel3', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.master.setCountryAdministrativeAreaLevel4                                             |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeleteCountryAdministrativeAreaLevel4()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.master.setCountryAdministrativeAreaLevel4', 
                'latest', 
                [
                'recordID' => 24000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeleteCountryAdministrativeAreaLevel4()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=24000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.master.setCountryAdministrativeAreaLevel4', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.master.setCurrency                                                                    |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeleteCurrency()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.master.setCurrency', 
                'latest', 
                [
                'recordID' => 62000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeleteCurrency()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=62000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.master.setCurrency', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.master.setCurrencyExchangeRateCentralBank                                             |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeleteCurrencyExchangeRateCentralBank()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.master.setCurrencyExchangeRateCentralBank', 
                'latest', 
                [
                'recordID' => 64000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeleteCurrencyExchangeRateCentralBank()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=64000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.master.setCurrencyExchangeRateCentralBank', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.master.setCurrencyExchangeRateTax                                                     |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeleteCurrencyExchangeRateTax()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.master.setCurrencyExchangeRateTax', 
                'latest', 
                [
                'recordID' => 63000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeleteCurrencyExchangeRateTax()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=63000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.master.setCurrencyExchangeRateTax', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.master.setDayOffGovernmentPolicy                                                      |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeleteDayOffGovernmentPolicy()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.master.setDayOffGovernmentPolicy', 
                'latest', 
                [
                'recordID' => 39000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeleteDayOffGovernmentPolicy()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=39000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.master.setDayOffGovernmentPolicy', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.master.setDayOffNational                                                              |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeleteDayOffNational()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.master.setDayOffNational', 
                'latest', 
                [
                'recordID' => 37000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeleteDayOffNational()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=37000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.master.setDayOffNational', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.master.setDayOffRegional                                                              |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeleteDayOffRegional()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.master.setDayOffRegional', 
                'latest', 
                [
                'recordID' => 38000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeleteDayOffRegional()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=38000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.master.setDayOffRegional', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.master.setGoodsModel                                                                  |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeleteGoodsModel()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.master.setGoodsModel', 
                'latest', 
                [
                'recordID' => 16000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeleteGoodsModel()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=16000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.master.setGoodsModel', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.master.setGoodsType                                                                   |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeleteGoodsType()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.master.setGoodsType', 
                'latest', 
                [
                'recordID' => 102000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeleteGoodsType()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=102000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.master.setGoodsType', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.master.setInstitution                                                                 |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeleteInstitution()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.master.setInstitution', 
                'latest', 
                [
                'recordID' => 123000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeleteInstitution()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=123000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.master.setInstitution', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.master.setInstitutionBranch                                                           |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeleteInstitutionBranch()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.master.setInstitutionBranch', 
                'latest', 
                [
                'recordID' => 124000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeleteInstitutionBranch()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=124000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.master.setInstitutionBranch', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.master.setPeriod                                                                      |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeletePeriod()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.master.setPeriod', 
                'latest', 
                [
                'recordID' => 59000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeletePeriod()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=59000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.master.setPeriod', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.master.setPerson                                                                      |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeletePerson()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.master.setPerson', 
                'latest', 
                [
                'recordID' => 25000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeletePerson()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=25000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.master.setPerson', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.master.setPersonAccountEMail                                                          |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeletePersonAccountEMail()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.master.setPersonAccountEMail', 
                'latest', 
                [
                'recordID' => 53000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeletePersonAccountEMail()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=53000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.master.setPersonAccountEMail', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.master.setPersonAccountEMail                                                          |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeletePersonAccountSocialMedia()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.master.setPersonAccountSocialMedia', 
                'latest', 
                [
                'recordID' => 52000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeletePersonAccountSocialMedia()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=52000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.master.setPersonAccountSocialMedia', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.master.setPersonGender                                                                |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeletePersonGender()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.master.setPersonGender', 
                'latest', 
                [
                'recordID' => 90000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeletePersonGender()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=90000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.master.setPersonGender', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.master.setProduct                                                                     |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeleteProduct()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.master.setProduct', 
                'latest', 
                [
                'recordID' => 88000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeleteProduct()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=88000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.master.setProduct', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.master.setProductType                                                                 |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeleteProductType()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.master.setProductType', 
                'latest', 
                [
                'recordID' => 87000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeleteProductType()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=87000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.master.setProductType', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.master.setQuantityUnit                                                                |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeleteQuantityUnit()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.master.setQuantityUnit', 
                'latest', 
                [
                'recordID' => 73000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeleteQuantityUnit()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=73000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.master.setQuantityUnit', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.master.setReligion                                                                    |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeleteReligion()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.master.setReligion', 
                'latest', 
                [
                'recordID' => 26000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeleteReligion()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=26000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.master.setReligion', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.master.setSocialMedia                                                                 |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeleteSocialMedia()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.master.setSocialMedia', 
                'latest', 
                [
                'recordID' => 51000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeleteSocialMedia()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=51000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.master.setSocialMedia', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.master.setTradeMark                                                                   |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeleteTradeMark()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.master.setTradeMark', 
                'latest', 
                [
                'recordID' => 15000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeleteTradeMark()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=15000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.master.setTradeMark', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.accounting.setCodeOfAccounting                                                        |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeleteCodeOfAccounting()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.accounting.setCodeOfAccounting', 
                'latest', 
                [
                'recordID' => 65000000000002
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeleteCodeOfAccounting()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=65000000000002>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.accounting.setCodeOfAccounting', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.accounting.setJournal                                                                 |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeleteJournal()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.accounting.setJournal', 
                'latest', 
                [
                'recordID' => 68000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeleteJournal()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=68000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.accounting.setJournal', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.accounting.setJournalDetail                                                           |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeleteJournalDetail()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.accounting.setJournalDetail', 
                'latest', 
                [
                'recordID' => 69000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeleteJournalDetail()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=69000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.accounting.setJournalDetail', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.accounting.setLayoutStructure                                                           |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeleteLayoutStructure()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.accounting.setLayoutStructure', 
                'latest', 
                [
                'recordID' => 66000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeleteLayoutStructure()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=66000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.accounting.setLayoutStructure', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.accounting.setLayoutStructureCodeOfAccounting                                         |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeleteLayoutStructureCodeOfAccounting()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.accounting.setLayoutStructureCodeOfAccounting', 
                'latest', 
                [
                'recordID' => 67000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeleteLayoutStructureCodeOfAccounting()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=67000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.accounting.setLayoutStructureCodeOfAccounting', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.budgeting.setBudget                                                                   |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeleteBudget()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.budgeting.setBudget', 
                'latest', 
                [
                'recordID' => 103000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeleteBudget()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=103000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.budgeting.setBudget', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.budgeting.setBudgetGroup                                                              |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeleteBudgetGroup()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.budgeting.setBudgetGroup', 
                'latest', 
                [
                'recordID' => 109000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeleteBudgetGroup()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=109000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.budgeting.setBudgetGroup', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.budgeting.setBudgetLine                                                               |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeleteBudgetLine()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.budgeting.setBudgetLine', 
                'latest', 
                [
                'recordID' => 105000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeleteBudgetLine()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=105000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.budgeting.setBudgetLine', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.budgeting.setBudgetSection                                                            |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeleteBudgetSection()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.budgeting.setBudgetSection', 
                'latest', 
                [
                'recordID' => 104000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeleteBudgetSection()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=104000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.budgeting.setBudgetSection', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.budgeting.setBudgetType                                                               |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeleteBudgetType()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.budgeting.setBudgetType', 
                'latest', 
                [
                'recordID' => 108000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeleteBudgetType()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=108000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.budgeting.setBudgetType', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }

            
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.customerRelation.setCustomer                                                          |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeleteCustomer()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.customerRelation.setCustomer', 
                'latest', 
                [
                'recordID' => 125000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeleteCustomer()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=125000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.customerRelation.setCustomer', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.finance.setAdvance                                                                    |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeleteAdvance()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.finance.setAdvance', 
                'latest', 
                [
                'recordID' => 76000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeleteAdvance()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=76000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.finance.setAdvance', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.finance.setAdvanceDetail                                                              |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeleteAdvanceDetail()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.finance.setAdvanceDetail', 
                'latest', 
                [
                'recordID' => 82000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeleteAdvanceDetail()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=82000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.finance.setAdvanceDetail', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.fixedAsset.setGoodsIdentity                                                           |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeleteGoodsIdentity()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.fixedAsset.setGoodsIdentity', 
                'latest', 
                [
                'recordID' => 17000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeleteGoodsIdentity()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=17000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.fixedAsset.setGoodsIdentity', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.humanResource.setBusinessTripCostComponent                                            |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeleteBusinessTripCostComponent()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.humanResource.setBusinessTripCostComponent', 
                'latest', 
                [
                'recordID' => 81000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeleteBusinessTripCostComponent()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=81000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.humanResource.setBusinessTripCostComponent', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.humanResource.setEmployee                                                             |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeleteEmployee()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.humanResource.setEmployee', 
                'latest', 
                [
                'recordID' => 32000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeleteEmployee()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=32000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.humanResource.setEmployee', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.humanResource.setLog_FingerPrintMachine_Attendance                                    |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeleteLog_FingerPrintMachine_Attendance()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.humanResource.setLog_FingerPrintMachine_Attendance', 
                'latest', 
                [
                'recordID' => 19000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeleteLog_FingerPrintMachine_Attendance()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=19000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.humanResource.setLog_FingerPrintMachine_Attendance', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.humanResource.setLog_FingerPrintMachine_AttendanceFetch                               |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeleteLog_FingerPrintMachine_AttendanceFetch()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.humanResource.setLog_FingerPrintMachine_AttendanceFetch', 
                'latest', 
                [
                'recordID' => 18000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeleteLog_FingerPrintMachine_AttendanceFetch()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=18000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.humanResource.setLog_FingerPrintMachine_AttendanceFetch', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.humanResource.setMapper_FingerPrintUserToPerson                                       |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeleteMapper_FingerPrintUserToPerson()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.humanResource.setMapper_FingerPrintUserToPerson', 
                'latest', 
                [
                'recordID' => 31000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeleteMapper_FingerPrintUserToPerson()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=31000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.humanResource.setMapper_FingerPrintUserToPerson', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.humanResource.setOrganizationalDepartment                                             |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeleteOrganizationalDepartment()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.humanResource.setOrganizationalDepartment', 
                'latest', 
                [
                'recordID' => 111000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeleteOrganizationalDepartment()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=111000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.humanResource.setOrganizationalDepartment', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.humanResource.setPersonBusinessTrip                                                   |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeletePersonBusinessTrip()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.humanResource.setPersonBusinessTrip', 
                'latest', 
                [
                'recordID' => 78000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeletePersonBusinessTrip()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=78000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.humanResource.setPersonBusinessTrip', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.humanResource.setPersonBusinessTripSequence                                           |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeletePersonBusinessTripSequence()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.humanResource.setPersonBusinessTripSequence', 
                'latest', 
                [
                'recordID' => 79000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeletePersonBusinessTripSequence()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=79000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.humanResource.setPersonBusinessTripSequence', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.humanResource.setPersonBusinessTripSequenceDetail                                     |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeletePersonBusinessTripSequenceDetail()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.humanResource.setPersonBusinessTripSequenceDetail', 
                'latest', 
                [
                'recordID' => 80000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeletePersonBusinessTripSequenceDetail()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=80000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.humanResource.setPersonBusinessTripSequenceDetail', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.humanResource.setPersonWorkAbsencePermit                                              |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeletePersonWorkAbsencePermit()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.humanResource.setPersonWorkAbsencePermit', 
                'latest', 
                [
                'recordID' => 44000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeletePersonWorkAbsencePermit()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=44000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.humanResource.setPersonWorkAbsencePermit', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.humanResource.setPersonWorkAbsenceReplacement                                         |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeletePersonWorkAbsenceReplacement()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.humanResource.setPersonWorkAbsenceReplacement', 
                'latest', 
                [
                'recordID' => 45000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeletePersonWorkAbsenceReplacement()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=45000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.humanResource.setPersonWorkAbsenceReplacement', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.humanResource.setPersonWorkArriveDepartPermit                                         |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeletePersonWorkArriveDepartPermit()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.humanResource.setPersonWorkArriveDepartPermit', 
                'latest', 
                [
                'recordID' => 43000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeletePersonWorkArriveDepartPermit()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=43000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.humanResource.setPersonWorkArriveDepartPermit', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.humanResource.setPersonWorkTimeSheet                                                  |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeletePersonWorkTimeSheet()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.humanResource.setPersonWorkTimeSheet', 
                'latest', 
                [
                'recordID' => 48000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeletePersonWorkTimeSheet()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=48000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.humanResource.setPersonWorkTimeSheet', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.humanResource.setPersonWorkTimeSheetActivity                                          |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeletePersonWorkTimeSheetActivity()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.humanResource.setPersonWorkTimeSheetActivity', 
                'latest', 
                [
                'recordID' => 50000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeletePersonWorkTimeSheetActivity()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=50000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.humanResource.setPersonWorkTimeSheetActivity', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.humanResource.setWorkAbsencePermit                                                    |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeleteWorkAbsencePermit()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.humanResource.setWorkAbsencePermit', 
                'latest', 
                [
                'recordID' => 42000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeleteWorkAbsencePermit()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=42000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.humanResource.setWorkAbsencePermit', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.humanResource.setWorkAbsencePermitType                                                |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeleteWorkAbsencePermitType()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.humanResource.setWorkAbsencePermitType', 
                'latest', 
                [
                'recordID' => 41000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeleteWorkAbsencePermitType()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=41000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.humanResource.setWorkAbsencePermitType', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.humanResource.setWorkArriveDepartPermit                                               |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeleteWorkArriveDepartPermit()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.humanResource.setWorkArriveDepartPermit', 
                'latest', 
                [
                'recordID' => 40000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeleteWorkArriveDepartPermit()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=40000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.humanResource.setWorkArriveDepartPermit', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.humanResource.setWorkDay                                                              |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeleteWorkDay()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.humanResource.setWorkDay', 
                'latest', 
                [
                'recordID' => 34000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeleteWorkDay()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=34000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.humanResource.setWorkDay', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.humanResource.setWorkTimeAssignation                                                  |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeleteWorkTimeAssignation()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.humanResource.setWorkTimeAssignation', 
                'latest', 
                [
                'recordID' => 36000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeleteWorkTimeAssignation()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=36000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.humanResource.setWorkTimeAssignation', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.humanResource.setWorkTimeEpoch                                                        |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeleteWorkTimeEpoch()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.humanResource.setWorkTimeEpoch', 
                'latest', 
                [
                'recordID' => 33000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeleteWorkTimeEpoch()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=33000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.humanResource.setWorkTimeEpoch', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.humanResource.setWorkTimeSchedule                                                     |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeleteWorkTimeSchedule()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.humanResource.setWorkTimeSchedule', 
                'latest', 
                [
                'recordID' => 35000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeleteWorkTimeSchedule()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=35000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.humanResource.setWorkTimeSchedule', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.project.setProject                                                                    |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeleteProject()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.project.setProject', 
                'latest', 
                [
                'recordID' => 46000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeleteProject()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=46000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.project.setProject', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.project.setProjectSection                                                             |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeleteProjectSection()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.project.setProjectSection', 
                'latest', 
                [
                'recordID' => 110000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeleteProjectSection()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=110000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.project.setProjectSection', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.supplyChain.setPurchaseOrder                                                          |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeletePurchaseOrder()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.supplyChain.setPurchaseOrder', 
                'latest', 
                [
                'recordID' => 85000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeletePurchaseOrder()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=85000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.supplyChain.setPurchaseOrder', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.supplyChain.setPurchaseOrderDetail                                                    |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeletePurchaseOrderDetail()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.supplyChain.setPurchaseOrderDetail', 
                'latest', 
                [
                'recordID' => 86000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeletePurchaseOrderDetail()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=86000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.supplyChain.setPurchaseOrderDetail', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.supplyChain.setPurchaseRequisition                                                    |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeletePurchaseRequisition()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.supplyChain.setPurchaseRequisition', 
                'latest', 
                [
                'recordID' => 83000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeletePurchaseRequisition()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=83000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.supplyChain.setPurchaseRequisition', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.supplyChain.setPurchaseRequisitionDetail                                              |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeletePurchaseRequisitionDetail()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.supplyChain.setPurchaseRequisitionDetail', 
                'latest', 
                [
                'recordID' => 84000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeletePurchaseRequisitionDetail()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=84000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.supplyChain.setPurchaseRequisitionDetail', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.supplyChain.setSupplier                                                               |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeleteSupplier()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.supplyChain.setSupplier', 
                'latest', 
                [
                'recordID' => 126000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeleteSupplier()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=126000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.supplyChain.setSupplier', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.sysConfig.setDBObject_Schema                                                          |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeleteDBObject_Schema()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.sysConfig.setDBObject_Schema', 
                'latest', 
                [
                'recordID' => 2000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeleteDBObject_Schema()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=2000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.sysConfig.setDBObject_Schema', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.sysConfig.setDBObject_Table                                                           |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeleteDBObject_Table()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.sysConfig.setDBObject_Table', 
                'latest', 
                [
                'recordID' => 3000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeleteDBObject_Table()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=3000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.sysConfig.setDBObject_Table', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.sysConfig.setDBObject_User                                                            |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeleteDBObject_User()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.sysConfig.setDBObject_User', 
                'latest', 
                [
                'recordID' => 4000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeleteDBObject_User()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=4000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.sysConfig.setDBObject_User', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.sysConfig.setLog_UserLoginSession                                                     |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeleteLog_UserLoginSession()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.sysConfig.setLog_UserLoginSession', 
                'latest', 
                [
                'recordID' => 6000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeleteLog_UserLoginSession()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=6000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.sysConfig.setLog_UserLoginSession', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.delete.sysConfig.setRotateLog_API                                                            |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataDeleteRotateLog_API()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.sysConfig.setRotateLog_API', 
                'latest', 
                [
                'recordID' => 122000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataDeleteRotateLog_API()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=122000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.delete.sysConfig.setRotateLog_API', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.initialize.master.setBloodAglutinogenType                                                    |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataInitializeBloodAglutinogenType()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.initialize.master.setBloodAglutinogenType', 
                'latest', 
                [
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataInitializeBloodAglutinogenType()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.initialize.master.setBloodAglutinogenType', 
                'latest', 
                '{'.
                '}'
                );            
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.initialize.master.setBusinessDocumentType                                                    |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataInitializeBusinessDocumentType()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.initialize.master.setBusinessDocumentType', 
                'latest', 
                [
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataInitializeBusinessDocumentType()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.initialize.master.setBusinessDocumentType', 
                'latest', 
                '{'.
                '}'
                );            
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.initialize.master.setCitizenIdentity                                                         |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataInitializeCitizenIdentity()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.initialize.master.setCitizenIdentity', 
                'latest', 
                [
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataInitializeCitizenIdentity()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.initialize.master.setCitizenIdentity', 
                'latest', 
                '{'.
                '}'
                );            
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.initialize.master.setCountry                                                                 |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataInitializeCountry()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.initialize.master.setCountry', 
                'latest', 
                [
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataInitializeCountry()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.initialize.master.setCountry', 
                'latest', 
                '{'.
                '}'
                );            
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.initialize.master.setCountryAdministrativeAreaLevel1                                         |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataInitializeCountryAdministrativeAreaLevel1()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.initialize.master.setCountryAdministrativeAreaLevel1', 
                'latest', 
                [
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataInitializeCountryAdministrativeAreaLevel1()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.initialize.master.setCountryAdministrativeAreaLevel1', 
                'latest', 
                '{'.
                '}'
                );            
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.initialize.master.setCountryAdministrativeAreaLevel2                                         |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataInitializeCountryAdministrativeAreaLevel2()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.initialize.master.setCountryAdministrativeAreaLevel2', 
                'latest', 
                [
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataInitializeCountryAdministrativeAreaLevel2()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.initialize.master.setCountryAdministrativeAreaLevel2', 
                'latest', 
                '{'.
                '}'
                );            
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.initialize.master.setCountryAdministrativeAreaLevel3                                         |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataInitializeCountryAdministrativeAreaLevel3()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.initialize.master.setCountryAdministrativeAreaLevel3', 
                'latest', 
                [
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataInitializeCountryAdministrativeAreaLevel3()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.initialize.master.setCountryAdministrativeAreaLevel3', 
                'latest', 
                '{'.
                '}'
                );            
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.initialize.master.setCountryAdministrativeAreaLevel4                                         |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataInitializeCountryAdministrativeAreaLevel4()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.initialize.master.setCountryAdministrativeAreaLevel4', 
                'latest', 
                [
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataInitializeCountryAdministrativeAreaLevel4()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.initialize.master.setCountryAdministrativeAreaLevel4', 
                'latest', 
                '{'.
                '}'
                );            
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.initialize.master.setCurrency                                                                |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataInitializeCurrency()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.initialize.master.setCurrency', 
                'latest', 
                [
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataInitializeCurrency()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.initialize.master.setCurrency', 
                'latest', 
                '{'.
                '}'
                );            
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.initialize.master.setDayOffGovernmentPolicy                                                  |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataInitializeDayOffGovernmentPolicy()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.initialize.master.setDayOffGovernmentPolicy', 
                'latest', 
                [
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataInitializeDayOffGovernmentPolicy()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.initialize.master.setDayOffGovernmentPolicy', 
                'latest', 
                '{'.
                '}'
                );            
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.initialize.master.setDayOffNational                                                          |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataInitializeDayOffNational()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.initialize.master.setDayOffNational', 
                'latest', 
                [
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataInitializeDayOffNational()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.initialize.master.setDayOffNational', 
                'latest', 
                '{'.
                '}'
                );            
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.initialize.master.setGoodsModel                                                              |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataInitializeGoodsModel()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.initialize.master.setGoodsModel', 
                'latest', 
                [
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataInitializeGoodsModel()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.initialize.master.setGoodsModel', 
                'latest', 
                '{'.
                '}'
                );            
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.initialize.master.setGoodsType                                                               |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataInitializeGoodsType()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.initialize.master.setGoodsType', 
                'latest', 
                [
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataInitializeGoodsType()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.initialize.master.setGoodsType', 
                'latest', 
                '{'.
                '}'
                );            
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.initialize.master.setPeriod                                                                  |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataInitializePeriod()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.initialize.master.setPeriod', 
                'latest', 
                [
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataInitializePeriod()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.initialize.master.setPeriod', 
                'latest', 
                '{'.
                '}'
                );            
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.initialize.master.setPerson                                                                  |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataInitializePerson()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.initialize.master.setPerson', 
                'latest', 
                [
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataInitializePerson()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.initialize.master.setPerson', 
                'latest', 
                '{'.
                '}'
                );            
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.initialize.master.setPersonAccountEMail                                                      |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataInitializePersonAccountEMail()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.initialize.master.setPersonAccountEMail', 
                'latest', 
                [
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataInitializePersonAccountEMail()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.initialize.master.setPersonAccountEMail', 
                'latest', 
                '{'.
                '}'
                );            
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.initialize.master.setPersonGender                                                            |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataInitializePersonGender()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.initialize.master.setPersonGender', 
                'latest', 
                [
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataInitializePersonGender()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.initialize.master.setPersonGender', 
                'latest', 
                '{'.
                '}'
                );            
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.initialize.master.setProductType                                                             |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataInitializeProductType()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.initialize.master.setProductType', 
                'latest', 
                [
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataInitializeProductType()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.initialize.master.setProductType', 
                'latest', 
                '{'.
                '}'
                );            
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.initialize.master.setReligion                                                                |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataInitializeReligion()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.initialize.master.setReligion', 
                'latest', 
                [
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataInitializeReligion()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.initialize.master.setReligion', 
                'latest', 
                '{'.
                '}'
                );            
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.initialize.master.setTradeMark                                                               |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataInitializeTradeMark()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.initialize.master.setTradeMark', 
                'latest', 
                [
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataInitializeTradeMark()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.initialize.master.setTradeMark', 
                'latest', 
                '{'.
                '}'
                );            
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.synchronize.master.setCurrencyExchangeRateCentralBank                                        |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataSynchronizeCurrencyExchangeRateCentralBank()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.synchronize.master.setCurrencyExchangeRateCentralBank', 
                'latest', 
                [
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataSynchronizeCurrencyExchangeRateCentralBank()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.synchronize.master.setCurrencyExchangeRateCentralBank', 
                'latest', 
                '{'.
                '}'
                );            
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.synchronize.master.setCurrencyExchangeRateTax                                                |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataSynchronizeCurrencyExchangeRateTax()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.synchronize.master.setCurrencyExchangeRateTax', 
                'latest', 
                [
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataSynchronizeCurrencyExchangeRateTax()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.synchronize.master.setCurrencyExchangeRateTax', 
                'latest', 
                '{'.
                '}'
                );            
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.synchronize.master.setProduct                                                                |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataSynchronizeProduct()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.synchronize.master.setProduct', 
                'latest', 
                [
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataSynchronizeProduct()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.synchronize.master.setProduct', 
                'latest', 
                '{'.
                '}'
                );            
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.synchronize.project.setProject                                                               |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataSynchronizeProject()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.synchronize.project.setProject', 
                'latest', 
                [
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataSynchronizeProject()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.synchronize.project.setProject', 
                'latest', 
                '{'.
                '}'
                );            
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.synchronize.production.setBillOfMaterial                                                     |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataSynchronizeBillOfMaterial()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.synchronize.production.setBillOfMaterial', 
                'latest', 
                [
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataSynchronizeBillOfMaterial()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.synchronize.production.setBillOfMaterial', 
                'latest', 
                '{'.
                '}'
                );            
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.synchronize.production.setBillOfMaterialDetail                                               |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataSynchronizeBillOfMaterialDetail()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.synchronize.production.setBillOfMaterialDetail', 
                'latest', 
                [
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataSynchronizeBillOfMaterialDetail()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.synchronize.production.setBillOfMaterialDetail', 
                'latest', 
                '{'.
                '}'
                );            
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.synchronize.production.setMaterialProductAssembly                                            |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataSynchronizeMaterialProductAssembly()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.synchronize.production.setMaterialProductAssembly', 
                'latest', 
                [
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataSynchronizeMaterialProductAssembly()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.synchronize.production.setMaterialProductAssembly', 
                'latest', 
                '{'.
                '}'
                );            
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.synchronize.production.setMaterialProductComponent                                           |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataSynchronizeMaterialProductComponent()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.synchronize.production.setMaterialProductComponent', 
                'latest', 
                [
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataSynchronizeMaterialProductComponent()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.synchronize.production.setMaterialProductComponent', 
                'latest', 
                '{'.
                '}'
                );            
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }

            
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.synchronize.dataAcquisition.setLog_Device_PersonAccess                                       |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataSynchronizeLog_Device_PersonAccess()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.synchronize.dataAcquisition.setLog_Device_PersonAccess', 
                'latest', 
                [
                ]
                );
            var_dump($varData);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.synchronize.customerRelation.setSalesContract                                                |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataSynchronizeSalesContract()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.synchronize.customerRelation.setSalesContract', 
                'latest', 
                [
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataSynchronizeSalesContract()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.synchronize.customerRelation.setSalesContract', 
                'latest', 
                '{'.
                '}'
                );            
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.synchronize.customerRelation.setSalesOrder                                                   |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataSynchronizeSalesOrder()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.synchronize.customerRelation.setSalesOrder', 
                'latest', 
                [
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataSynchronizeSalesOrder()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.synchronize.customerRelation.setSalesOrder', 
                'latest', 
                '{'.
                '}'
                );            
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.synchronize.customerRelation.setSalesOrderDetail                                             |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataSynchronizeSalesOrderDetail()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.synchronize.customerRelation.setSalesOrderDetail', 
                'latest', 
                [
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataSynchronizeSalesOrderDetail()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.synchronize.customerRelation.setSalesOrderDetail', 
                'latest', 
                '{'.
                '}'
                );            
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.synchronize.master.setBusinessDocument                                                       |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataSynchronizeBusinessDocument()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.synchronize.master.setBusinessDocument', 
                'latest', 
                [
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataSynchronizeBusinessDocument()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.synchronize.master.setBusinessDocument', 
                'latest', 
                '{'.
                '}'
                );            
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.synchronize.master.setBusinessDocumentVersion                                                |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataSynchronizeBusinessDocumentVersion()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.synchronize.master.setBusinessDocumentVersion', 
                'latest', 
                [
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataSynchronizeBusinessDocumentVersion()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.synchronize.master.setBusinessDocumentVersion', 
                'latest', 
                '{'.
                '}'
                );            
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.undelete.master.setBloodAglutinogenType                                                      |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataUndeleteBloodAglutinogenType()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.undelete.master.setBloodAglutinogenType', 
                'latest', 
                [
                'recordID' => 27000000000026
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataUndeleteBloodAglutinogenType()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=27000000000026>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.undelete.master.setBloodAglutinogenType', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.undelete.master.setBusinessDocument                                                          |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataUndeleteBusinessDocument()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.undelete.master.setBusinessDocument', 
                'latest', 
                [
                'recordID' => 74000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataUndeleteBusinessDocument()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=74000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.undelete.master.setBusinessDocument', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.undelete.master.setBusinessDocument                                                          |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataUndeleteBusinessDocumentNumbering()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.undelete.master.setBusinessDocumentNumbering', 
                'latest', 
                [
                'recordID' => 128000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataUndeleteBusinessDocumentNumbering()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=128000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.undelete.master.setBusinessDocumentNumbering', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.undelete.master.setBusinessDocument                                                          |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataUndeleteBusinessDocumentType()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.undelete.master.setBusinessDocumentType', 
                'latest', 
                [
                'recordID' => 77000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataUndeleteBusinessDocumentType()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=77000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.undelete.master.setBusinessDocumentType', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.undelete.master.setBusinessDocumentVersion                                                   |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataUndeleteBusinessDocumentVersion()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.undelete.master.setBusinessDocumentVersion', 
                'latest', 
                [
                'recordID' => 75000000000001
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataUndeleteBusinessDocumentVersion()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=75000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.undelete.master.setBusinessDocumentVersion', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value)'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.update.customerRelation.setCustomer                                                          |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataUpdateCustomer()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.update.customerRelation.setCustomer', 
                'latest', 
                [
                'recordID' => 125000000000001,
                'entities' => [
                    'entity_RefID' => 124000000000002,
                    'code' => 'IMD'
                    ]
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataUpdateCustomer()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=125000000000001>';
            echo '<input type="text" id="dataInput_Entity_RefID" value=124000000000002>';
            echo '<input type="text" id="dataInput_Code" value="IMD">';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.update.customerRelation.setCustomer', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value), '.
                    '"entities" : {'.
                        '"entity_RefID" : parseInt(document.getElementById("dataInput_Entity_RefID").value), '.
                        '"code" : document.getElementById("dataInput_Code").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.update.customerRelation.setSalesOrder                                                        |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataUpdateSalesOrder()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.update.customerRelation.setSalesOrder', 
                'latest', 
                [
                'recordID' => 129000000000001,
                'entities' => [
                    'businessDocumentVersion_RefID' => 75000000000004,
                    'customer_RefID' => 125000000000005
                    ]
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataUpdateSalesOrder()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=129000000000001>';
            echo '<input type="text" id="dataInput_BusinessDocumentVersion_RefID" value=75000000000004>';
            echo '<input type="text" id="dataInput_Customer_RefID" value=125000000000005>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.update.customerRelation.setSalesOrder', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value), '.
                    '"entities" : {'.
                        '"businessDocumentVersion_RefID" : parseInt(document.getElementById("dataInput_BusinessDocumentVersion_RefID").value), '.
                        '"customer_RefID" : parseInt(document.getElementById("dataInput_Customer_RefID").value)'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.update.master.setBloodAglutinogenType                                                        |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataUpdateBloodAglutinogenType()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.update.master.setBloodAglutinogenType', 
                'latest', 
                [
                'recordID' => 27000000000001,
                'entities' => [
                    'type' => 'AB'                    
                    ]
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataUpdateBloodAglutinogenType()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=27000000000001>';
            echo '<input type="text" id="dataInput_Type" value="AB">';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.update.master.setBloodAglutinogenType', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value), '.
                    '"entities" : {'.
                        '"type" : document.getElementById("dataInput_Type").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.update.master.setBloodAglutinogenType                                                        |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataUpdateBusinessDocumentType()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.update.master.setBusinessDocumentType', 
                'latest', 
                [
                'recordID' => 77000000000057,
                'entities' => [
                    'name' => 'Update Existing Business Document Type Data'
                    ]
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataUpdateBusinessDocumentType()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=77000000000057>';
            echo '<input type="text" id="dataInput_Name" value="Update Existing Business Document Type Data">';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.update.master.setBusinessDocumentType', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value), '.
                    '"entities" : {'.
                        '"name" : document.getElementById("dataInput_Name").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.update.master.setDayOffGovernmentPolicy                                                      |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataUpdateDayOffGovernmentPolicy()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.update.master.setDayOffGovernmentPolicy', 
                'latest', 
                [
                'recordID' => 39000000000001,
                'entities' => [
                    'country_RefID' => 20000000000078,
                    'name' => 'Pilkada Nasional',
                    'validStartDate' => '2020-12-09',
                    'validFinishDate' => '2020-12-09'
                    ]
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataUpdateDayOffGovernmentPolicy()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=39000000000001>';
            echo '<input type="text" id="dataInput_Country_RefID" value=20000000000078>';
            echo '<input type="text" id="dataInput_Name" value="Pilkada Nasional">';
            echo '<input type="text" id="dataInput_ValidStartDate" value="2020-12-09">';
            echo '<input type="text" id="dataInput_ValidFinishDate" value="2020-12-09">';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.update.master.setDayOffGovernmentPolicy', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value), '.
                    '"entities" : {'.
                        '"country_RefID" : parseInt(document.getElementById("dataInput_Country_RefID").value), '.
                        '"name" : document.getElementById("dataInput_Name").value, '.
                        '"validStartDate" : document.getElementById("dataInput_ValidStartDate").value, '.
                        '"validFinishDate" : document.getElementById("dataInput_ValidFinishDate").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.update.master.setDayOffGovernmentPolicy                                                      |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataUpdateDayOffNational()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.update.master.setDayOffNational', 
                'latest', 
                [
                'recordID' => 37000000000001,
                'entities' => [
                    'country_RefID' => 20000000000078,
                    'name' => 'Tahun Baru 2021',
                    'validStartDate' => '2021-01-01',
                    'validFinishDate' => '2021-01-01'
                    ]
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataUpdateDayOffNational()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=37000000000001>';
            echo '<input type="text" id="dataInput_Country_RefID" value=20000000000078>';
            echo '<input type="text" id="dataInput_Name" value="Tahun Baru 2021">';
            echo '<input type="text" id="dataInput_ValidStartDate" value="2021-01-01">';
            echo '<input type="text" id="dataInput_ValidFinishDate" value="2021-01-01">';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.update.master.setDayOffNational', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value), '.
                    '"entities" : {'.
                        '"country_RefID" : parseInt(document.getElementById("dataInput_Country_RefID").value), '.
                        '"name" : document.getElementById("dataInput_Name").value, '.
                        '"validStartDate" : document.getElementById("dataInput_ValidStartDate").value, '.
                        '"validFinishDate" : document.getElementById("dataInput_ValidFinishDate").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.update.master.setGoodsModel                                                                  |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataUpdateGoodsModel()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.update.master.setGoodsModel', 
                'latest', 
                [
                'recordID' => 16000000000001,
                'entities' => [
                    'tradeMark_RefID' => 15000000000001,
                    'goodsType_RefID' => 102000000000001,
                    'modelName' => 'Update Model Name',
                    'modelNumber' => 'Update Model Number'
                    ]
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataUpdateGoodsModel()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=16000000000001>';
            echo '<input type="text" id="dataInput_TradeMark_RefID" value=15000000000001>';
            echo '<input type="text" id="dataInput_GoodsType_RefID" value=102000000000001>';
            echo '<input type="text" id="dataInput_ModelName" value="Update Model Name">';
            echo '<input type="text" id="dataInput_ModelNumber" value="Update Model Number">';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.update.master.setGoodsModel', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value), '.
                    '"entities" : {'.
                        '"tradeMark_RefID" : parseInt(document.getElementById("dataInput_TradeMark_RefID").value), '.
                        '"goodsType_RefID" : parseInt(document.getElementById("dataInput_GoodsType_RefID").value), '.
                        '"modelName" : document.getElementById("dataInput_ModelName").value, '.
                        '"modelNumber" : document.getElementById("dataInput_ModelNumber").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.update.master.setGoodsType                                                                   |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataUpdateGoodsType()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.update.master.setGoodsType', 
                'latest', 
                [
                'recordID' => 102000000000001,
                'entities' => [
                    'name' => 'Update Goods Type Name'
                    ]
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataUpdateGoodsType()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=102000000000001>';
            echo '<input type="text" id="dataInput_Name" value="Update Goods Type Name">';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.update.master.setGoodsType', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value), '.
                    '"entities" : {'.
                        '"name" : document.getElementById("dataInput_Name").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }

            
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.update.master.setInstitution                                                                 |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataUpdateInstitution()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.update.master.setInstitution', 
                'latest', 
                [
                'recordID' => 123000000000001,
                'entities' => [
                    'name' => 'New Institution Name',
                    'institutionType_RefID' => 141000000000003
                    ]
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataUpdateInstitution()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=123000000000001>';
            echo '<input type="text" id="dataInput_Name" value="New Institution Name">';
            echo '<input type="text" id="dataInput_InstitutionType_RefID" value=141000000000003>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.update.master.setInstitution', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value), '.
                    '"entities" : {'.
                        '"name" : document.getElementById("dataInput_Name").value, '.
                        '"institutionType_RefID" : parseInt(document.getElementById("dataInput_InstitutionType_RefID").value)'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.create.master.setInstitutionBranch                                                           |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataUpdateInstitutionBranch()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.update.master.setInstitutionBranch', 
                'latest', 
                [
                'recordID' => 124000000000001,
                'entities' => [
                    'institution_RefID' => 123000000000062,
                    'name' => 'New Institution Branch Name',
                    'address' => 'Address',
                    'countryAdministrativeAreaLevel_RefID' => null,
                    'postalCode' => '12345',
                    ]
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataUpdateInstitutionBranch()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=124000000000001>';
            echo '<input type="text" id="dataInput_Institution_RefID" value=123000000000062>';
            echo '<input type="text" id="dataInput_Name" value="New Institution Name">';
            echo '<input type="text" id="dataInput_Address" value="Address">';
            echo '<input type="text" id="dataInput_CountryAdministrativeAreaLevel_RefID" value=null>';
            echo '<input type="text" id="dataInput_PostalCode" value="12345">';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.update.master.setInstitutionBranch', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value), '.
                    '"entities" : {'.
                        '"institution_RefID" : parseInt(document.getElementById("dataInput_Institution_RefID").value), '.
                        '"name" : document.getElementById("dataInput_Name").value, '.
                        '"address" : document.getElementById("dataInput_Address").value, '.
                        '"countryAdministrativeAreaLevel_RefID" : parseInt(document.getElementById("dataInput_CountryAdministrativeAreaLevel_RefID").value), '.
                        '"postalCode" : document.getElementById("dataInput_PostalCode").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.update.master.setInstitutionType                                                             |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataUpdateInstitutionType()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.update.master.setInstitutionType', 
                'latest', 
                [
                'recordID' => 141000000000001,
                'entities' => [
                    'name' => 'Update Institution Type Name',
                    'prefix' => 'Prefix',
                    'suffix' => 'Suffix',
                    ]
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataUpdateInstitutionType()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=141000000000001>';
            echo '<input type="text" id="dataInput_Name" value="Update Update Institution Type Name">';
            echo '<input type="text" id="dataInput_Prefix" value="Prefix">';
            echo '<input type="text" id="dataInput_Suffix" value="Suffix">';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.update.master.setInstitutionType', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value), '.
                    '"entities" : {'.
                        '"name" : document.getElementById("dataInput_Name").value, '.
                        '"prefix" : document.getElementById("dataInput_Prefix").value, '.
                        '"suffix" : document.getElementById("dataInput_Suffix").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }           
            
            
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.update.master.setPeriod                                                                      |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataUpdatePeriod()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.update.master.setPeriod', 
                'latest', 
                [
                'recordID' => 59000000000001,
                'entities' => [
                    'name' => 'Update Period Name'
                    ]
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataUpdatePeriod()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=59000000000001>';
            echo '<input type="text" id="dataInput_Name" value="Update Period Name">';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.update.master.setPeriod', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value), '.
                    '"entities" : {'.
                        '"name" : document.getElementById("dataInput_Name").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.update.master.setPerson                                                                      |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataUpdatePerson()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.update.master.setPerson', 
                'latest', 
                [
                'recordID' => 25000000000001,
                'entities' => [
                    'name' => 'Update Person Name',
                    'photo_RefJSON' => null
                    ]
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataUpdatePerson()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=25000000000001>';
            echo '<input type="text" id="dataInput_Name" value="Update Person Name">';
            echo '<input type="text" id="dataInput_Photo_RefJSON" value="">';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.update.master.setPerson', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value), '.
                    '"entities" : {'.
                        '"name" : document.getElementById("dataInput_Name").value, '.
                        '"photo_RefJSON" : document.getElementById("dataInput_Photo_RefJSON").value'.
                    
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.update.master.setPersonAccountEMail                                                          |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataUpdatePersonAccountEMail()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.update.master.setPersonAccountEMail', 
                'latest', 
                [
                'recordID' => 53000000000001,
                'entities' => [
                    'person_RefID' => 25000000000001,
                    'account' => 'xyz@gmail.com'
                    ]
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataUpdatePersonAccountEMail()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=53000000000001>';
            echo '<input type="text" id="dataInput_Person_RefID" value=25000000000001>';
            echo '<input type="text" id="dataInput_Account" value="xyz@gmail">';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.update.master.setPersonAccountEMail', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value), '.
                    '"entities" : {'.
                        '"person_RefID" : parseInt(document.getElementById("dataInput_Person_RefID").value), '.
                        '"account : document.getElementById("dataInput_Account").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.update.master.setPersonGender                                                                |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataUpdatePersonGender()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.update.master.setPersonGender', 
                'latest', 
                [
                'recordID' => 90000000000001,
                'entities' => [
                    'name' => 'Update Existing Name'
                    ]
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataUpdatePersonGender()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=90000000000001>';
            echo '<input type="text" id="dataInput_Name" value="Update Existing Name">';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.update.master.setPersonGender', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value), '.
                    '"entities" : {'.
                        '"name" : document.getElementById("dataInput_Name").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.update.master.setProduct                                                                     |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataUpdateProduct()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.update.master.setProduct', 
                'latest', 
                [
                'recordID' => 88000000000001,
                'entities' => [
                    'code' => 'Update Existing Code',
                    'name' => 'Update Existing Name',
                    'productType_RefID' => 87000000000001,
                    'quantityUnit_RefID' => 73000000000001
                    ]
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataUpdateProduct()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=88000000000001>';
            echo '<input type="text" id="dataInput_Code" value="Update Existing Code">';
            echo '<input type="text" id="dataInput_Name" value="Update Existing Name">';
            echo '<input type="text" id="dataInput_ProductType_RefID" value=87000000000001>';
            echo '<input type="text" id="dataInput_QuantityUnit_RefID" value=73000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.update.master.setProduct', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value), '.
                    '"entities" : {'.
                        '"code" : document.getElementById("dataInput_Code").value, '.
                        '"name" : document.getElementById("dataInput_Name").value, '.
                        '"productType_RefID" : parseInt(document.getElementById("dataInput_ProductType_RefID").value), '.
                        '"quantityUnit_RefID" : parseInt(document.getElementById("dataInput_QuantityUnit_RefID").value)'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.update.master.setProductType                                                                 |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataUpdateProductType()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.update.master.setProductType', 
                'latest', 
                [
                'recordID' => 87000000000001,
                'entities' => [
                    'name' => 'Update Existing Name'
                    ]
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataUpdateProductType()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=87000000000001>';
            echo '<input type="text" id="dataInput_Name" value="Update Existing Name">';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.update.master.setProductType', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value), '.
                    '"entities" : {'.
                        '"name" : document.getElementById("dataInput_Name").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.update.master.setQuantityUnit                                                                |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataUpdateQuantityUnit()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.update.master.setQuantityUnit', 
                'latest', 
                [
                'recordID' => 73000000000001,
                'entities' => [
                    'name' => 'Update Existing Quantity Unit Data'
                    ]
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataUpdateQuantityUnit()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=73000000000001>';
            echo '<input type="text" id="dataInput_Name" value="Update Existing Quantity Unit Data">';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.update.master.setQuantityUnit', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value), '.
                    '"entities" : {'.
                        '"name" : document.getElementById("dataInput_Name").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.update.master.setReligion                                                                    |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataUpdateReligion()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.update.master.setReligion', 
                'latest', 
                [
                'recordID' => 26000000000001,
                'entities' => [
                    'name' => 'Update Existing Religion Data'
                    ]
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataUpdateReligion()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=26000000000001>';
            echo '<input type="text" id="dataInput_Name" value="Update Existing Religion Data">';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.update.master.setReligion', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value), '.
                    '"entities" : {'.
                        '"name" : document.getElementById("dataInput_Name").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.update.master.setTradeMark                                                                   |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_setDataUpdateTradeMark()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.update.master.setTradeMark', 
                'latest', 
                [
                'recordID' => 15000000000001,
                'entities' => [
                    'name' => 'Update Existing Trade Mark Data'
                    ]
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_setDataUpdateTradeMark()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=15000000000001>';
            echo '<input type="text" id="dataInput_Name" value="Update Existing Trade Mark Data">';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.update.master.setTradeMark', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value), '.
                    '"entities" : {'.
                        '"name" : document.getElementById("dataInput_Name").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.read.master.getDataCurrencyExchangeCentralBankMiddleRateByCurrencyISOCode                    |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_getDataCurrencyExchangeCentralBankMiddleRateByCurrencyISOCode()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.read.master.getDataCurrencyExchangeCentralBankMiddleRateByCurrencyISOCode', 
                'latest', 
                [
                'entities' => [
                    'dateTimeTZ' => '2021-01-01 00:00:00 +07',
                    'currencyISOCode' => 'AUD',
                    'baseCurrencyISOCode' => 'IDR'
                    ]
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_getDataCurrencyExchangeCentralBankMiddleRateByCurrencyISOCode()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_DateTimeTZ" value="2021-01-01 00:00:00 +07">';
            echo '<input type="text" id="dataInput_CurrencyISOCode" value="AUD">';
            echo '<input type="text" id="dataInput_BaseCurrencyISOCode" value="IDR">';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.read.master.getDataCurrencyExchangeCentralBankMiddleRateByCurrencyISOCode', 
                'latest', 
                '{'.
                    '"entities" : {'.
                        '"dateTimeTZ" : document.getElementById("dataInput_DateTimeTZ").value, '.
                        '"currencyISOCode" : document.getElementById("dataInput_CurrencyISOCode").value, '.
                        '"baseCurrencyISOCode" : document.getElementById("dataInput_BaseCurrencyISOCode").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.read.customerRelation.getDataListCustomer                                                    |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_getDataListCustomer()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.read.customerRelation.getDataListCustomer', 
                'latest', 
                [
                'SQLStatement' => [
                    'pick' => null,
                    'sort' => null,
                    'filter' => null,
                    'paging' => null
                    ]
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_getDataListCustomer()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<table border="1" style="border-collapse: collapse;">';
            echo '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">SQL Statement</p></td></tr>';
            echo '<tr><td>Pick</td><td><input type="text" id="dataInput_SQLStatement_pick" value=""></td></tr>';
            echo '<tr><td>Sort</td><td><input type="text" id="dataInput_SQLStatement_sort" value=""></td></tr>';
            echo '<tr><td>Filter</td><td><input type="text" id="dataInput_SQLStatement_filter" value=""></td></tr>';
            echo '<tr><td>Paging</td><td> <input type="text" id="dataInput_SQLStatement_paging" value=""></td></tr>';
            echo '</table>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.read.customerRelation.getDataListCustomer', 
                'latest', 
                '{'.
                    '"SQLStatement" : {'.
                        '"pick" : document.getElementById("dataInput_SQLStatement_pick").value, '.
                        '"sort" : document.getElementById("dataInput_SQLStatement_sort").value, '.
                        '"filter" : document.getElementById("dataInput_SQLStatement_filter").value, '.
                        '"paging" : document.getElementById("dataInput_SQLStatement_paging").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.read.master.getDataListBloodAglutinogenType                                                  |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_getDataListBloodAglutinogenType()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.read.master.getDataListBloodAglutinogenType', 
                'latest', 
                [
                'SQLStatement' => [
                    'pick' => null,
                    'sort' => null,
                    'filter' => null,
                    'paging' => null
                    ]
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_getDataListBloodAglutinogenType()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<table border="1" style="border-collapse: collapse;">';
            echo '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">SQL Statement</p></td></tr>';
            echo '<tr><td>Pick</td><td><input type="text" id="dataInput_SQLStatement_pick" value=""></td></tr>';
            echo '<tr><td>Sort</td><td><input type="text" id="dataInput_SQLStatement_sort" value=""></td></tr>';
            echo '<tr><td>Filter</td><td><input type="text" id="dataInput_SQLStatement_filter" value=""></td></tr>';
            echo '<tr><td>Paging</td><td> <input type="text" id="dataInput_SQLStatement_paging" value=""></td></tr>';
            echo '</table>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.read.master.getDataListBloodAglutinogenType', 
                'latest', 
                '{'.
                    '"SQLStatement" : {'.
                        '"pick" : document.getElementById("dataInput_SQLStatement_pick").value, '.
                        '"sort" : document.getElementById("dataInput_SQLStatement_sort").value, '.
                        '"filter" : document.getElementById("dataInput_SQLStatement_filter").value, '.
                        '"paging" : document.getElementById("dataInput_SQLStatement_paging").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.read.master.getDataListBusinessDocument                                                      |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_getDataListBusinessDocument()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.read.master.getDataListBusinessDocument', 
                'latest', 
                [
                'businessDocumentType_RefID' => 77000000000002,
                'SQLStatement' => [
                    'pick' => null,
                    'sort' => null,
                    'filter' => null,
                    'paging' => null
                    ]
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_getDataListBusinessDocument()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_BusinessDocumentType_RefID" value=77000000000002>';
            echo '<table border="1" style="border-collapse: collapse;">';
            echo '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">SQL Statement</p></td></tr>';
            echo '<tr><td>Pick</td><td><input type="text" id="dataInput_SQLStatement_pick" value=""></td></tr>';
            echo '<tr><td>Sort</td><td><input type="text" id="dataInput_SQLStatement_sort" value=""></td></tr>';
            echo '<tr><td>Filter</td><td><input type="text" id="dataInput_SQLStatement_filter" value=""></td></tr>';
            echo '<tr><td>Paging</td><td> <input type="text" id="dataInput_SQLStatement_paging" value=""></td></tr>';
            echo '</table>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.read.master.getDataListBusinessDocument', 
                'latest', 
                '{'.
                    '"businessDocumentType_RefID" : parseInt(document.getElementById("dataInput_BusinessDocumentType_RefID").value), '.
                    '"SQLStatement" : {'.
                        '"pick" : document.getElementById("dataInput_SQLStatement_pick").value, '.
                        '"sort" : document.getElementById("dataInput_SQLStatement_sort").value, '.
                        '"filter" : document.getElementById("dataInput_SQLStatement_filter").value, '.
                        '"paging" : document.getElementById("dataInput_SQLStatement_paging").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.read.master.getDataListBusinessDocumentType                                                  |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_getDataListBusinessDocumentType()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.read.master.getDataListBusinessDocumentType', 
                'latest', 
                [
                'SQLStatement' => [
                    'pick' => null,
                    'sort' => null,
                    'filter' => null,
                    'paging' => null
                    ]
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_getDataListBusinessDocumentType()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<table border="1" style="border-collapse: collapse;">';
            echo '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">SQL Statement</p></td></tr>';
            echo '<tr><td>Pick</td><td><input type="text" id="dataInput_SQLStatement_pick" value=""></td></tr>';
            echo '<tr><td>Sort</td><td><input type="text" id="dataInput_SQLStatement_sort" value=""></td></tr>';
            echo '<tr><td>Filter</td><td><input type="text" id="dataInput_SQLStatement_filter" value=""></td></tr>';
            echo '<tr><td>Paging</td><td> <input type="text" id="dataInput_SQLStatement_paging" value=""></td></tr>';
            echo '</table>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.read.master.getDataListBusinessDocumentType', 
                'latest', 
                '{'.
                    '"SQLStatement" : {'.
                        '"pick" : document.getElementById("dataInput_SQLStatement_pick").value, '.
                        '"sort" : document.getElementById("dataInput_SQLStatement_sort").value, '.
                        '"filter" : document.getElementById("dataInput_SQLStatement_filter").value, '.
                        '"paging" : document.getElementById("dataInput_SQLStatement_paging").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.read.master.getDataListCitizenIdentity                                                       |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_getDataListCitizenIdentity()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.read.master.getDataListCitizenIdentity', 
                'latest', 
                [
                'SQLStatement' => [
                    'pick' => null,
                    'sort' => null,
                    'filter' => null,
                    'paging' => null
                    ]
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_getDataListCitizenIdentity()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<table border="1" style="border-collapse: collapse;">';
            echo '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">SQL Statement</p></td></tr>';
            echo '<tr><td>Pick</td><td><input type="text" id="dataInput_SQLStatement_pick" value=""></td></tr>';
            echo '<tr><td>Sort</td><td><input type="text" id="dataInput_SQLStatement_sort" value=""></td></tr>';
            echo '<tr><td>Filter</td><td><input type="text" id="dataInput_SQLStatement_filter" value=""></td></tr>';
            echo '<tr><td>Paging</td><td> <input type="text" id="dataInput_SQLStatement_paging" value=""></td></tr>';
            echo '</table>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.read.master.getDataListCitizenIdentity', 
                'latest', 
                '{'.
                    '"SQLStatement" : {'.
                        '"pick" : document.getElementById("dataInput_SQLStatement_pick").value, '.
                        '"sort" : document.getElementById("dataInput_SQLStatement_sort").value, '.
                        '"filter" : document.getElementById("dataInput_SQLStatement_filter").value, '.
                        '"paging" : document.getElementById("dataInput_SQLStatement_paging").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.read.master.getDataListCountry                                                               |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_getDataListCountry()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.read.master.getDataListCountry', 
                'latest', 
                [
                'SQLStatement' => [
                    'pick' => null,
                    'sort' => null,
                    'filter' => null,
                    'paging' => null
                    ]
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_getDataListCountry()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<table border="1" style="border-collapse: collapse;">';
            echo '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">SQL Statement</p></td></tr>';
            echo '<tr><td>Pick</td><td><input type="text" id="dataInput_SQLStatement_pick" value=""></td></tr>';
            echo '<tr><td>Sort</td><td><input type="text" id="dataInput_SQLStatement_sort" value=""></td></tr>';
            echo '<tr><td>Filter</td><td><input type="text" id="dataInput_SQLStatement_filter" value=""></td></tr>';
            echo '<tr><td>Paging</td><td> <input type="text" id="dataInput_SQLStatement_paging" value=""></td></tr>';
            echo '</table>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.read.master.getDataListCountry', 
                'latest', 
                '{'.
                    '"SQLStatement" : {'.
                        '"pick" : document.getElementById("dataInput_SQLStatement_pick").value, '.
                        '"sort" : document.getElementById("dataInput_SQLStatement_sort").value, '.
                        '"filter" : document.getElementById("dataInput_SQLStatement_filter").value, '.
                        '"paging" : document.getElementById("dataInput_SQLStatement_paging").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.read.master.getDataListCountryAdministrativeAreaLevel1                                       |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_getDataListCountryAdministrativeAreaLevel1()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.read.master.getDataListCountryAdministrativeAreaLevel1', 
                'latest', 
                [
                'country_RefID' => 20000000000078,
                'SQLStatement' => [
                    'pick' => null,
                    'sort' => null,
                    'filter' => null,
                    'paging' => null
                    ]
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_getDataListCountryAdministrativeAreaLevel1()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_Country_RefID" value=20000000000078>';
            echo '<table border="1" style="border-collapse: collapse;">';
            echo '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">SQL Statement</p></td></tr>';
            echo '<tr><td>Pick</td><td><input type="text" id="dataInput_SQLStatement_pick" value=""></td></tr>';
            echo '<tr><td>Sort</td><td><input type="text" id="dataInput_SQLStatement_sort" value=""></td></tr>';
            echo '<tr><td>Filter</td><td><input type="text" id="dataInput_SQLStatement_filter" value=""></td></tr>';
            echo '<tr><td>Paging</td><td> <input type="text" id="dataInput_SQLStatement_paging" value=""></td></tr>';
            echo '</table>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.read.master.getDataListCountryAdministrativeAreaLevel1', 
                'latest', 
                '{'.
                    '"country_RefID" : parseInt(document.getElementById("dataInput_Country_RefID").value), '.
                    '"SQLStatement" : {'.
                        '"pick" : document.getElementById("dataInput_SQLStatement_pick").value, '.
                        '"sort" : document.getElementById("dataInput_SQLStatement_sort").value, '.
                        '"filter" : document.getElementById("dataInput_SQLStatement_filter").value, '.
                        '"paging" : document.getElementById("dataInput_SQLStatement_paging").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.read.master.getDataListCountryAdministrativeAreaLevel2                                       |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_getDataListCountryAdministrativeAreaLevel2()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.read.master.getDataListCountryAdministrativeAreaLevel2', 
                'latest', 
                [
                'countryAdministrativeAreaLevel1_RefID' => 21000000000013,
                'SQLStatement' => [
                    'pick' => null,
                    'sort' => null,
                    'filter' => null,
                    'paging' => null
                    ]
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_getDataListCountryAdministrativeAreaLevel2()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_CountryAdministrativeAreaLevel1_RefID" value=21000000000013>';
            echo '<table border="1" style="border-collapse: collapse;">';
            echo '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">SQL Statement</p></td></tr>';
            echo '<tr><td>Pick</td><td><input type="text" id="dataInput_SQLStatement_pick" value=""></td></tr>';
            echo '<tr><td>Sort</td><td><input type="text" id="dataInput_SQLStatement_sort" value=""></td></tr>';
            echo '<tr><td>Filter</td><td><input type="text" id="dataInput_SQLStatement_filter" value=""></td></tr>';
            echo '<tr><td>Paging</td><td> <input type="text" id="dataInput_SQLStatement_paging" value=""></td></tr>';
            echo '</table>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.read.master.getDataListCountryAdministrativeAreaLevel2', 
                'latest', 
                '{'.
                    '"countryAdministrativeAreaLevel1_RefID" : parseInt(document.getElementById("dataInput_CountryAdministrativeAreaLevel1_RefID").value), '.
                    '"SQLStatement" : {'.
                        '"pick" : document.getElementById("dataInput_SQLStatement_pick").value, '.
                        '"sort" : document.getElementById("dataInput_SQLStatement_sort").value, '.
                        '"filter" : document.getElementById("dataInput_SQLStatement_filter").value, '.
                        '"paging" : document.getElementById("dataInput_SQLStatement_paging").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.read.master.getDataListCountryAdministrativeAreaLevel3                                       |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_getDataListCountryAdministrativeAreaLevel3()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.read.master.getDataListCountryAdministrativeAreaLevel3', 
                'latest', 
                [
                'countryAdministrativeAreaLevel2_RefID' => 22000000000192,
                'SQLStatement' => [
                    'pick' => null,
                    'sort' => null,
                    'filter' => null,
                    'paging' => null
                    ]
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_getDataListCountryAdministrativeAreaLevel3()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_CountryAdministrativeAreaLevel2_RefID" value=22000000000192>';
            echo '<table border="1" style="border-collapse: collapse;">';
            echo '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">SQL Statement</p></td></tr>';
            echo '<tr><td>Pick</td><td><input type="text" id="dataInput_SQLStatement_pick" value=""></td></tr>';
            echo '<tr><td>Sort</td><td><input type="text" id="dataInput_SQLStatement_sort" value=""></td></tr>';
            echo '<tr><td>Filter</td><td><input type="text" id="dataInput_SQLStatement_filter" value=""></td></tr>';
            echo '<tr><td>Paging</td><td> <input type="text" id="dataInput_SQLStatement_paging" value=""></td></tr>';
            echo '</table>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.read.master.getDataListCountryAdministrativeAreaLevel3', 
                'latest', 
                '{'.
                    '"countryAdministrativeAreaLevel2_RefID" : parseInt(document.getElementById("dataInput_CountryAdministrativeAreaLevel2_RefID").value), '.
                    '"SQLStatement" : {'.
                        '"pick" : document.getElementById("dataInput_SQLStatement_pick").value, '.
                        '"sort" : document.getElementById("dataInput_SQLStatement_sort").value, '.
                        '"filter" : document.getElementById("dataInput_SQLStatement_filter").value, '.
                        '"paging" : document.getElementById("dataInput_SQLStatement_paging").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.read.master.getDataListCountryAdministrativeAreaLevel4                                       |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_getDataListCountryAdministrativeAreaLevel4()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.read.master.getDataListCountryAdministrativeAreaLevel4', 
                'latest', 
                [
                'countryAdministrativeAreaLevel3_RefID' => 23000000002670,
                'SQLStatement' => [
                    'pick' => null,
                    'sort' => null,
                    'filter' => null,
                    'paging' => null
                    ]
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_getDataListCountryAdministrativeAreaLevel4()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_CountryAdministrativeAreaLevel3_RefID" value=23000000002670>';
            echo '<table border="1" style="border-collapse: collapse;">';
            echo '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">SQL Statement</p></td></tr>';
            echo '<tr><td>Pick</td><td><input type="text" id="dataInput_SQLStatement_pick" value=""></td></tr>';
            echo '<tr><td>Sort</td><td><input type="text" id="dataInput_SQLStatement_sort" value=""></td></tr>';
            echo '<tr><td>Filter</td><td><input type="text" id="dataInput_SQLStatement_filter" value=""></td></tr>';
            echo '<tr><td>Paging</td><td> <input type="text" id="dataInput_SQLStatement_paging" value=""></td></tr>';
            echo '</table>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.read.master.getDataListCountryAdministrativeAreaLevel4', 
                'latest', 
                '{'.
                    '"countryAdministrativeAreaLevel3_RefID" : parseInt(document.getElementById("dataInput_CountryAdministrativeAreaLevel3_RefID").value), '.
                    '"SQLStatement" : {'.
                        '"pick" : document.getElementById("dataInput_SQLStatement_pick").value, '.
                        '"sort" : document.getElementById("dataInput_SQLStatement_sort").value, '.
                        '"filter" : document.getElementById("dataInput_SQLStatement_filter").value, '.
                        '"paging" : document.getElementById("dataInput_SQLStatement_paging").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.read.master.getDataListCurrency                                                              |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_getDataListCurrency()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.read.master.getDataListCurrency', 
                'latest', 
                [
                'SQLStatement' => [
                    'pick' => null,
                    'sort' => null,
                    'filter' => null,
                    'paging' => null
                    ]
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_getDataListCurrency()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<table border="1" style="border-collapse: collapse;">';
            echo '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">SQL Statement</p></td></tr>';
            echo '<tr><td>Pick</td><td><input type="text" id="dataInput_SQLStatement_pick" value=""></td></tr>';
            echo '<tr><td>Sort</td><td><input type="text" id="dataInput_SQLStatement_sort" value=""></td></tr>';
            echo '<tr><td>Filter</td><td><input type="text" id="dataInput_SQLStatement_filter" value=""></td></tr>';
            echo '<tr><td>Paging</td><td> <input type="text" id="dataInput_SQLStatement_paging" value=""></td></tr>';
            echo '</table>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.read.master.getDataListCurrency', 
                'latest', 
                '{'.
                    '"SQLStatement" : {'.
                        '"pick" : document.getElementById("dataInput_SQLStatement_pick").value, '.
                        '"sort" : document.getElementById("dataInput_SQLStatement_sort").value, '.
                        '"filter" : document.getElementById("dataInput_SQLStatement_filter").value, '.
                        '"paging" : document.getElementById("dataInput_SQLStatement_paging").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.read.master.getDataListGoodsModel                                                            |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_getDataListGoodsModel()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.read.master.getDataListGoodsModel', 
                'latest', 
                [
                'tradeMark_RefID' => 15000000000002,
                'SQLStatement' => [
                    'pick' => null,
                    'sort' => null,
                    'filter' => null,
                    'paging' => null
                    ]
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_getDataListGoodsModel()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_TradeMark_RefID" value=15000000000002>';
            echo '<table border="1" style="border-collapse: collapse;">';
            echo '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">SQL Statement</p></td></tr>';
            echo '<tr><td>Pick</td><td><input type="text" id="dataInput_SQLStatement_pick" value=""></td></tr>';
            echo '<tr><td>Sort</td><td><input type="text" id="dataInput_SQLStatement_sort" value=""></td></tr>';
            echo '<tr><td>Filter</td><td><input type="text" id="dataInput_SQLStatement_filter" value=""></td></tr>';
            echo '<tr><td>Paging</td><td> <input type="text" id="dataInput_SQLStatement_paging" value=""></td></tr>';
            echo '</table>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.read.master.getDataListGoodsModel', 
                'latest', 
                '{'.
                    '"tradeMark_RefID" : parseInt(document.getElementById("dataInput_TradeMark_RefID").value), '.
                    '"SQLStatement" : {'.
                        '"pick" : document.getElementById("dataInput_SQLStatement_pick").value, '.
                        '"sort" : document.getElementById("dataInput_SQLStatement_sort").value, '.
                        '"filter" : document.getElementById("dataInput_SQLStatement_filter").value, '.
                        '"paging" : document.getElementById("dataInput_SQLStatement_paging").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.read.master.getDataListPeriod                                                                |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_getDataListPeriod()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.read.master.getDataListPeriod', 
                'latest', 
                [
                'SQLStatement' => [
                    'pick' => null,
                    'sort' => null,
                    'filter' => null,
                    'paging' => null
                    ]
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_getDataListPeriod()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<table border="1" style="border-collapse: collapse;">';
            echo '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">SQL Statement</p></td></tr>';
            echo '<tr><td>Pick</td><td><input type="text" id="dataInput_SQLStatement_pick" value=""></td></tr>';
            echo '<tr><td>Sort</td><td><input type="text" id="dataInput_SQLStatement_sort" value=""></td></tr>';
            echo '<tr><td>Filter</td><td><input type="text" id="dataInput_SQLStatement_filter" value=""></td></tr>';
            echo '<tr><td>Paging</td><td> <input type="text" id="dataInput_SQLStatement_paging" value=""></td></tr>';
            echo '</table>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.read.master.getDataListPeriod', 
                'latest', 
                '{'.
                    '"SQLStatement" : {'.
                        '"pick" : document.getElementById("dataInput_SQLStatement_pick").value, '.
                        '"sort" : document.getElementById("dataInput_SQLStatement_sort").value, '.
                        '"filter" : document.getElementById("dataInput_SQLStatement_filter").value, '.
                        '"paging" : document.getElementById("dataInput_SQLStatement_paging").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.read.master.getDataListPerson                                                                |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_getDataListPerson()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.read.master.getDataListPerson', 
                'latest', 
                [
                'SQLStatement' => [
                    'pick' => null,
                    'sort' => null,
                    'filter' => null,
                    'paging' => null
                    ]
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_getDataListPerson()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<table border="1" style="border-collapse: collapse;">';
            echo '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">SQL Statement</p></td></tr>';
            echo '<tr><td>Pick</td><td><input type="text" id="dataInput_SQLStatement_pick" value=""></td></tr>';
            echo '<tr><td>Sort</td><td><input type="text" id="dataInput_SQLStatement_sort" value=""></td></tr>';
            echo '<tr><td>Filter</td><td><input type="text" id="dataInput_SQLStatement_filter" value=""></td></tr>';
            echo '<tr><td>Paging</td><td> <input type="text" id="dataInput_SQLStatement_paging" value=""></td></tr>';
            echo '</table>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.read.master.getDataListPerson', 
                'latest', 
                '{'.
                    '"SQLStatement" : {'.
                        '"pick" : document.getElementById("dataInput_SQLStatement_pick").value, '.
                        '"sort" : document.getElementById("dataInput_SQLStatement_sort").value, '.
                        '"filter" : document.getElementById("dataInput_SQLStatement_filter").value, '.
                        '"paging" : document.getElementById("dataInput_SQLStatement_paging").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.read.master.getDataListPersonAccountEMail                                                    |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_getDataListPersonAccountEMail()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.read.master.getDataListPersonAccountEMail', 
                'latest', 
                [
                'person_RefID' => 25000000000241,
                'SQLStatement' => [
                    'pick' => null,
                    'sort' => null,
                    'filter' => null,
                    'paging' => null
                    ]
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_getDataListPersonAccountEMail()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_Person_RefID" value=25000000000241>';
            echo '<table border="1" style="border-collapse: collapse;">';
            echo '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">SQL Statement</p></td></tr>';
            echo '<tr><td>Pick</td><td><input type="text" id="dataInput_SQLStatement_pick" value=""></td></tr>';
            echo '<tr><td>Sort</td><td><input type="text" id="dataInput_SQLStatement_sort" value=""></td></tr>';
            echo '<tr><td>Filter</td><td><input type="text" id="dataInput_SQLStatement_filter" value=""></td></tr>';
            echo '<tr><td>Paging</td><td> <input type="text" id="dataInput_SQLStatement_paging" value=""></td></tr>';
            echo '</table>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.read.master.getDataListPersonAccountEMail', 
                'latest', 
                '{'.
                    '"person_RefID" : parseInt(document.getElementById("dataInput_Person_RefID").value), '.
                    '"SQLStatement" : {'.
                        '"pick" : document.getElementById("dataInput_SQLStatement_pick").value, '.
                        '"sort" : document.getElementById("dataInput_SQLStatement_sort").value, '.
                        '"filter" : document.getElementById("dataInput_SQLStatement_filter").value, '.
                        '"paging" : document.getElementById("dataInput_SQLStatement_paging").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.read.master.getDataListPersonGender                                                          |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_getDataListPersonGender()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.read.master.getDataListPersonGender', 
                'latest', 
                [
                'SQLStatement' => [
                    'pick' => null,
                    'sort' => null,
                    'filter' => null,                    
//                    'filter' => '; drop table',
                    'paging' => null
                    ]
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_getDataListPersonGender()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<table border="1" style="border-collapse: collapse;">';
            echo '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">SQL Statement</p></td></tr>';
            echo '<tr><td>Pick</td><td><input type="text" id="dataInput_SQLStatement_pick" value=""></td></tr>';
            echo '<tr><td>Sort</td><td><input type="text" id="dataInput_SQLStatement_sort" value=""></td></tr>';
            echo '<tr><td>Filter</td><td><input type="text" id="dataInput_SQLStatement_filter" value=""></td></tr>';
            echo '<tr><td>Paging</td><td> <input type="text" id="dataInput_SQLStatement_paging" value=""></td></tr>';
            echo '</table>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.read.master.getDataListPersonGender', 
                'latest', 
                '{'.
                    '"SQLStatement" : {'.
                        '"pick" : document.getElementById("dataInput_SQLStatement_pick").value, '.
                        '"sort" : document.getElementById("dataInput_SQLStatement_sort").value, '.
                        '"filter" : document.getElementById("dataInput_SQLStatement_filter").value, '.
                        '"paging" : document.getElementById("dataInput_SQLStatement_paging").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.read.master.getDataListProductType                                                           |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_getDataListProductType()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.read.master.getDataListProductType', 
                'latest', 
                [
                'SQLStatement' => [
                    'pick' => null,
                    'sort' => null,
                    'filter' => null,                    
                    'paging' => null
                    ]
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_getDataListProductType()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<table border="1" style="border-collapse: collapse;">';
            echo '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">SQL Statement</p></td></tr>';
            echo '<tr><td>Pick</td><td><input type="text" id="dataInput_SQLStatement_pick" value=""></td></tr>';
            echo '<tr><td>Sort</td><td><input type="text" id="dataInput_SQLStatement_sort" value=""></td></tr>';
            echo '<tr><td>Filter</td><td><input type="text" id="dataInput_SQLStatement_filter" value=""></td></tr>';
            echo '<tr><td>Paging</td><td> <input type="text" id="dataInput_SQLStatement_paging" value=""></td></tr>';
            echo '</table>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.read.master.getDataListProductType', 
                'latest', 
                '{'.
                    '"SQLStatement" : {'.
                        '"pick" : document.getElementById("dataInput_SQLStatement_pick").value, '.
                        '"sort" : document.getElementById("dataInput_SQLStatement_sort").value, '.
                        '"filter" : document.getElementById("dataInput_SQLStatement_filter").value, '.
                        '"paging" : document.getElementById("dataInput_SQLStatement_paging").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.read.master.getDataListQuantityUnit                                                          |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_getDataListQuantityUnit()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.read.master.getDataListQuantityUnit', 
                'latest', 
                [
                'SQLStatement' => [
                    'pick' => null,
                    'sort' => null,
                    'filter' => null,                    
                    'paging' => null
                    ]
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_getDataListQuantityUnit()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<table border="1" style="border-collapse: collapse;">';
            echo '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">SQL Statement</p></td></tr>';
            echo '<tr><td>Pick</td><td><input type="text" id="dataInput_SQLStatement_pick" value=""></td></tr>';
            echo '<tr><td>Sort</td><td><input type="text" id="dataInput_SQLStatement_sort" value=""></td></tr>';
            echo '<tr><td>Filter</td><td><input type="text" id="dataInput_SQLStatement_filter" value=""></td></tr>';
            echo '<tr><td>Paging</td><td> <input type="text" id="dataInput_SQLStatement_paging" value=""></td></tr>';
            echo '</table>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.read.master.getDataListQuantityUnit', 
                'latest', 
                '{'.
                    '"SQLStatement" : {'.
                        '"pick" : document.getElementById("dataInput_SQLStatement_pick").value, '.
                        '"sort" : document.getElementById("dataInput_SQLStatement_sort").value, '.
                        '"filter" : document.getElementById("dataInput_SQLStatement_filter").value, '.
                        '"paging" : document.getElementById("dataInput_SQLStatement_paging").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.read.master.getDataListReligion                                                              |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_getDataListReligion()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.read.master.getDataListReligion', 
                'latest', 
                [
                'SQLStatement' => [
                    'pick' => null,
                    'sort' => null,
                    'filter' => null,                    
                    'paging' => null
                    ]
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_getDataListReligion()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<table border="1" style="border-collapse: collapse;">';
            echo '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">SQL Statement</p></td></tr>';
            echo '<tr><td>Pick</td><td><input type="text" id="dataInput_SQLStatement_pick" value=""></td></tr>';
            echo '<tr><td>Sort</td><td><input type="text" id="dataInput_SQLStatement_sort" value=""></td></tr>';
            echo '<tr><td>Filter</td><td><input type="text" id="dataInput_SQLStatement_filter" value=""></td></tr>';
            echo '<tr><td>Paging</td><td> <input type="text" id="dataInput_SQLStatement_paging" value=""></td></tr>';
            echo '</table>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.read.master.getDataListReligion', 
                'latest', 
                '{'.
                    '"SQLStatement" : {'.
                        '"pick" : document.getElementById("dataInput_SQLStatement_pick").value, '.
                        '"sort" : document.getElementById("dataInput_SQLStatement_sort").value, '.
                        '"filter" : document.getElementById("dataInput_SQLStatement_filter").value, '.
                        '"paging" : document.getElementById("dataInput_SQLStatement_paging").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.read.master.getDataListTradeMark                                                             |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_getDataListTradeMark()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.read.master.getDataListTradeMark', 
                'latest', 
                [
                'SQLStatement' => [
                    'pick' => null,
                    'sort' => null,
                    'filter' => null,
                    'paging' => null
                    ]
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_getDataListTradeMark()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<table border="1" style="border-collapse: collapse;">';
            echo '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">SQL Statement</p></td></tr>';
            echo '<tr><td>Pick</td><td><input type="text" id="dataInput_SQLStatement_pick" value=""></td></tr>';
            echo '<tr><td>Sort</td><td><input type="text" id="dataInput_SQLStatement_sort" value=""></td></tr>';
            echo '<tr><td>Filter</td><td><input type="text" id="dataInput_SQLStatement_filter" value=""></td></tr>';
            echo '<tr><td>Paging</td><td> <input type="text" id="dataInput_SQLStatement_paging" value=""></td></tr>';
            echo '</table>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.read.master.getDataListTradeMark', 
                'latest', 
                '{'.
                    '"SQLStatement" : {'.
                        '"pick" : document.getElementById("dataInput_SQLStatement_pick").value, '.
                        '"sort" : document.getElementById("dataInput_SQLStatement_sort").value, '.
                        '"filter" : document.getElementById("dataInput_SQLStatement_filter").value, '.
                        '"paging" : document.getElementById("dataInput_SQLStatement_paging").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.read.customerRelation.getDataListSalesOrder                                                  |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_getDataListSalesOrder()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.read.customerRelation.getDataListSalesOrder', 
                'latest', 
                [
                'SQLStatement' => [
                    'pick' => null,
                    'sort' => null,
                    'filter' => null,
                    'paging' => null
                    ]
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_getDataListSalesOrder()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<table border="1" style="border-collapse: collapse;">';
            echo '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">SQL Statement</p></td></tr>';
            echo '<tr><td>Pick</td><td><input type="text" id="dataInput_SQLStatement_pick" value=""></td></tr>';
            echo '<tr><td>Sort</td><td><input type="text" id="dataInput_SQLStatement_sort" value=""></td></tr>';
            echo '<tr><td>Filter</td><td><input type="text" id="dataInput_SQLStatement_filter" value=""></td></tr>';
            echo '<tr><td>Paging</td><td> <input type="text" id="dataInput_SQLStatement_paging" value=""></td></tr>';
            echo '</table>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.read.customerRelation.getDataListSalesOrder', 
                'latest', 
                '{'.
                    '"SQLStatement" : {'.
                        '"pick" : document.getElementById("dataInput_SQLStatement_pick").value, '.
                        '"sort" : document.getElementById("dataInput_SQLStatement_sort").value, '.
                        '"filter" : document.getElementById("dataInput_SQLStatement_filter").value, '.
                        '"paging" : document.getElementById("dataInput_SQLStatement_paging").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.read.production.getDataListMaterialProductAssembly                                           |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_getDataListMaterialProductAssembly()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.read.production.getDataListMaterialProductAssembly', 
                'latest', 
                [
                'SQLStatement' => [
                    'pick' => null,
                    'sort' => null,
                    'filter' => null,
                    'paging' => null
                    ]
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_getDataListMaterialProductAssembly()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<table border="1" style="border-collapse: collapse;">';
            echo '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">SQL Statement</p></td></tr>';
            echo '<tr><td>Pick</td><td><input type="text" id="dataInput_SQLStatement_pick" value=""></td></tr>';
            echo '<tr><td>Sort</td><td><input type="text" id="dataInput_SQLStatement_sort" value=""></td></tr>';
            echo '<tr><td>Filter</td><td><input type="text" id="dataInput_SQLStatement_filter" value=""></td></tr>';
            echo '<tr><td>Paging</td><td> <input type="text" id="dataInput_SQLStatement_paging" value=""></td></tr>';
            echo '</table>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.read.production.getDataListMaterialProductAssembly', 
                'latest', 
                '{'.
                    '"SQLStatement" : {'.
                        '"pick" : document.getElementById("dataInput_SQLStatement_pick").value, '.
                        '"sort" : document.getElementById("dataInput_SQLStatement_sort").value, '.
                        '"filter" : document.getElementById("dataInput_SQLStatement_filter").value, '.
                        '"paging" : document.getElementById("dataInput_SQLStatement_paging").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.read.production.getDataListMaterialProductComponent                                          |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_getDataListMaterialProductComponent()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.read.production.getDataListMaterialProductComponent', 
                'latest', 
                [
                'SQLStatement' => [
                    'pick' => null,
                    'sort' => null,
                    'filter' => null,
                    'paging' => null
                    ]
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_getDataListMaterialProductComponent()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<table border="1" style="border-collapse: collapse;">';
            echo '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">SQL Statement</p></td></tr>';
            echo '<tr><td>Pick</td><td><input type="text" id="dataInput_SQLStatement_pick" value=""></td></tr>';
            echo '<tr><td>Sort</td><td><input type="text" id="dataInput_SQLStatement_sort" value=""></td></tr>';
            echo '<tr><td>Filter</td><td><input type="text" id="dataInput_SQLStatement_filter" value=""></td></tr>';
            echo '<tr><td>Paging</td><td> <input type="text" id="dataInput_SQLStatement_paging" value=""></td></tr>';
            echo '</table>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.read.production.getDataListMaterialProductComponent', 
                'latest', 
                '{'.
                    '"SQLStatement" : {'.
                        '"pick" : document.getElementById("dataInput_SQLStatement_pick").value, '.
                        '"sort" : document.getElementById("dataInput_SQLStatement_sort").value, '.
                        '"filter" : document.getElementById("dataInput_SQLStatement_filter").value, '.
                        '"paging" : document.getElementById("dataInput_SQLStatement_paging").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.read.project.getDataListProject                                                              |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_getDataListProject()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.read.project.getDataListProject', 
                'latest', 
                [
                'SQLStatement' => [
                    'pick' => null,
                    'sort' => null,
                    'filter' => null,
                    'paging' => null
                    ]
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_getDataListProject()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<table border="1" style="border-collapse: collapse;">';
            echo '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">SQL Statement</p></td></tr>';
            echo '<tr><td>Pick</td><td><input type="text" id="dataInput_SQLStatement_pick" value=""></td></tr>';
            echo '<tr><td>Sort</td><td><input type="text" id="dataInput_SQLStatement_sort" value=""></td></tr>';
            echo '<tr><td>Filter</td><td><input type="text" id="dataInput_SQLStatement_filter" value=""></td></tr>';
            echo '<tr><td>Paging</td><td> <input type="text" id="dataInput_SQLStatement_paging" value=""></td></tr>';
            echo '</table>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.read.project.getDataListProject', 
                'latest', 
                '{'.
                    '"SQLStatement" : {'.
                        '"pick" : document.getElementById("dataInput_SQLStatement_pick").value, '.
                        '"sort" : document.getElementById("dataInput_SQLStatement_sort").value, '.
                        '"filter" : document.getElementById("dataInput_SQLStatement_filter").value, '.
                        '"paging" : document.getElementById("dataInput_SQLStatement_paging").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : transaction.read.project.getDataListProjectSectionItem                                                   |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_getDataListProjectSectionItem()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.read.project.getDataListProjectSectionItem', 
                'latest', 
                [
                'project_RefID' => 46000000000001,
                'SQLStatement' => [
                    'pick' => null,
                    'sort' => null,
                    'filter' => null,
                    'paging' => null
                    ]
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_getDataListProjectSectionItem()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_Project_RefID" value=46000000000001>';
            echo '<table border="1" style="border-collapse: collapse;">';
            echo '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">SQL Statement</p></td></tr>';
            echo '<tr><td>Pick</td><td><input type="text" id="dataInput_SQLStatement_pick" value=""></td></tr>';
            echo '<tr><td>Sort</td><td><input type="text" id="dataInput_SQLStatement_sort" value=""></td></tr>';
            echo '<tr><td>Filter</td><td><input type="text" id="dataInput_SQLStatement_filter" value=""></td></tr>';
            echo '<tr><td>Paging</td><td> <input type="text" id="dataInput_SQLStatement_paging" value=""></td></tr>';
            echo '</table>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.read.project.getDataListProjectSectionItem', 
                'latest', 
                '{'.
                    '"project_RefID" : parseInt(document.getElementById("dataInput_Project_RefID").value), '.
                    '"SQLStatement" : {'.
                        '"pick" : document.getElementById("dataInput_SQLStatement_pick").value, '.
                        '"sort" : document.getElementById("dataInput_SQLStatement_sort").value, '.
                        '"filter" : document.getElementById("dataInput_SQLStatement_filter").value, '.
                        '"paging" : document.getElementById("dataInput_SQLStatement_paging").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : instruction.device.fingerprintAttendance.ALBox.FP800.getDataAttendance                                   |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_getDeviceALBoxFP800_AttendanceData()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'instruction.device.fingerprintAttendance.ALBox.FP800.getDataAttendance', 
                'latest', 
                [
                'entities' => [
                    'IPAddress' => '192.168.1.204',
                    'port' => 4370, 
                    'serialNumber' => '2065682450035',
                    'timeZoneOffset' => '+07',
                    'startDateTime' => '2021-01-01'
                    ]
                ]
                );
            var_dump($varData);
            }
        public function APIGatewayJQuery_getDeviceALBoxFP800_AttendanceData()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_IPAddress" value="192.168.1.204">';
            echo '<input type="text" id="dataInput_Port" value=4370>';
            echo '<input type="text" id="dataInput_SerialNumber" value="2065682450035">';
            echo '<input type="text" id="dataInput_TimeZoneOffset" value="+07">';
            echo '<input type="text" id="dataInput_StartDateTime" value="2021-01-01">';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'instruction.device.fingerprintAttendance.ALBox.FP800.getDataAttendance', 
                'latest', 
                '{'.
                    '"entities" : {'.
                        '"IPAddress" : document.getElementById("dataInput_IPAddress").value, '.
                        '"port" : parseInt(document.getElementById("dataInput_Port").value), '.
                        '"serialNumber" : document.getElementById("dataInput_SerialNumber").value, '.
                        '"timeZoneOffset" : document.getElementById("dataInput_TimeZoneOffset").value, '.
                        '"startDateTime" : document.getElementById("dataInput_StartDateTime").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : instruction.device.swingBarrierGate.Goodwin.ServoSW01.getDataAttendance                                  |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_getDeviceGoodwinServoSW01_AttendanceData()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'instruction.device.swingBarrierGate.Goodwin.ServoSW01.getDataAttendance', 
                'latest', 
                [
                'entities' => [
                    'timeZoneOffset' => '+07',
                    'startDateTime' => '2021-01-01'
                    ]
                ]
                );
            var_dump(json_encode($varData));
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : instruction.device.fingerprintAttendance.solution.x601.getDataAttendance                                 |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_getDeviceSolutionX601_AttendanceData()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'instruction.device.fingerprintAttendance.Solution.x601.getDataAttendance', 
                'latest', 
                [
                'entities' => [
                    'IPAddress' => '192.168.1.203',
                    'port' => 4370, 
                    'serialNumber' => 'AEYU202860040',
                    'timeZoneOffset' => '+07',
                    'startDateTime' => '2021-01-01'
                    ]
                ]
                );
            var_dump(json_encode($varData));
            }
        public function APIGatewayJQuery_getDeviceSolutionX601_AttendanceData()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_IPAddress" value="192.168.1.203">';
            echo '<input type="text" id="dataInput_Port" value=4370>';
            echo '<input type="text" id="dataInput_SerialNumber" value="AEYU202860040">';
            echo '<input type="text" id="dataInput_TimeZoneOffset" value="+07">';
            echo '<input type="text" id="dataInput_StartDateTime" value="2021-01-01">';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'instruction.device.fingerprintAttendance.Solution.x601.getDataAttendance', 
                'latest', 
                '{'.
                    '"entities" : {'.
                        '"IPAddress" : document.getElementById("dataInput_IPAddress").value, '.
                        '"port" : parseInt(document.getElementById("dataInput_Port").value), '.
                        '"serialNumber" : document.getElementById("dataInput_SerialNumber").value, '.
                        '"timeZoneOffset" : document.getElementById("dataInput_TimeZoneOffset").value, '.
                        '"startDateTime" : document.getElementById("dataInput_StartDateTime").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : instruction.server.internal.webBackEnd.webSiteScraper.fiskal_kemenkeu_go_id.getDataExhangeRate           |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_getWebSiteScraper_TaxExchangeRateData()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'instruction.server.internal.webBackEnd.webSiteScraper.fiskal_kemenkeu_go_id.getDataExhangeRate',
                'latest', 
                [
                'entities' => [
                    'date' => '2014-01-01'
                    ]
                ]
                );
            var_dump(json_encode($varData));
            }
        public function APIGatewayJQuery_getWebSiteScraper_TaxExchangeRateData()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_Date" value="2014-01-01">';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'instruction.server.internal.webBackEnd.webSiteScraper.fiskal_kemenkeu_go_id.getDataExhangeRate',
                'latest', 
                '{'.
                    '"entities" : {'.
                        '"date" : document.getElementById("dataInput_Date").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }
            

        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : instruction.server.internal.webBackEnd.webSiteScraper.www_bi_go_id.getDataCurrentExhangeRate             |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_getWebSiteScraper_CentralBankExchangeRateData()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                
                'instruction.server.internal.webBackEnd.webSiteScraper.www_bi_go_id.getDataCurrentExhangeRate',
                'latest', 
                [
                ]
                );
            var_dump(json_encode($varData));
            }
        public function APIGatewayJQuery_getWebSiteScraper_CentralBankExchangeRateData()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'instruction.server.internal.webBackEnd.webSiteScraper.www_bi_go_id.getDataCurrentExhangeRate',
                'latest', 
                '{'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ API Key     : instruction.server.internal.webBackEnd.webSiteScraper.www_bi_go_id.                                      |
        |                 getDataExchangeRateTimeSeriesFromOfflineFile                                                             |
        | ▪ API Version : 1                                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function APIGateway_getWebSiteScraper_CentralBankExchangeRateTimeSeriesDataFromOfflineFile()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'instruction.server.internal.webBackEnd.webSiteScraper.www_bi_go_id.getDataExchangeRateTimeSeriesFromOfflineFile',
                'latest', 
                [
                'entities' => [
                    'pathFile' => '/zhtConf/tmp/download/Kurs-BI-20100104-20210204/Kurs-Transaksi-BI-JPY.html'
                    ]
                ]
                );
            var_dump(json_encode($varData));
            }
        public function APIGatewayJQuery_getWebSiteScraper_CentralBankExchangeRateTimeSeriesDataFromOfflineFile()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjIwODIyNzJ9.MmnjYBX-JAwTr5-EAcRjAhh9K3gMRURZ4X9BngM9sq0';
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_PathFile" size="100" value="/zhtConf/tmp/download/Kurs-BI-20100104-20210204/Kurs-Transaksi-BI-JPY.html">';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'instruction.server.internal.webBackEnd.webSiteScraper.www_bi_go_id.getDataExchangeRateTimeSeriesFromOfflineFile',
                'latest', 
                '{'.
                    '"entities" : {'.
                        '"pathFile" : document.getElementById("dataInput_PathFile").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Click Me</button>";
            dd($varJQueryFunction);
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