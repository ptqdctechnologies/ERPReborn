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
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'authentication.general.setLogout', 
                'latest'
                );
            var_dump($varData);            
            }


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataCreateBloodAglutinogenType()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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
            var_dump($varData);
            }


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataDeleteBloodAglutinogenType()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataDeleteBusinessDocument()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataDeleteBusinessDocumentType()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataDeleteBusinessDocumentVersion()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataDeleteCitizenFamilyCard()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataDeleteCitizenFamilyCardMember()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataDeleteCitizenIdentity()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataDeleteCitizenIdentityCard()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataDeleteCountry()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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

            
        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataDeleteCountryAdministrativeAreaLevel1()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataDeleteCountryAdministrativeAreaLevel2()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataDeleteCountryAdministrativeAreaLevel3()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataDeleteCountryAdministrativeAreaLevel4()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataDeleteCurrency()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataDeleteCurrencyExchangeRateCentralBank()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataDeleteCurrencyExchangeRateTax()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataDeleteDayOffGovernmentPolicy()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataDeleteDayOffNational()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataDeleteDayOffRegional()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataDeleteGoodsModel()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataDeleteGoodsType()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataDeleteInstitution()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataDeleteInstitutionBranch()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataDeletePeriod()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataDeletePerson()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataDeletePersonAccountEMail()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataDeletePersonAccountSocialMedia()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataDeletePersonGender()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataDeleteProduct()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataDeleteProductType()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataDeleteQuantityUnit()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataDeleteReligion()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataDeleteSocialMedia()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataDeleteTradeMark()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataDeleteBudget()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataDeleteCodeOfAccounting()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.accounting.setCodeOfAccounting', 
                'latest', 
                [
                'recordID' => 65000000000001
                ]
                );
            var_dump($varData);
            }


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataDeleteJournal()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataDeleteJournalDetail()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataDeleteLayoutStructure()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataDeleteLayoutStructureCodeOfAccounting()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataDeleteBudgetGroup()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataDeleteBudgetLine()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataDeleteBudgetSection()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataDeleteBudgetType()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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

            
        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataDeleteCustomer()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataDeleteAdvance()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataDeleteAdvanceDetail()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataDeleteGoodsIdentity()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataDeleteBusinessTripCostComponent()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataDeleteEmployee()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataDeleteLog_FingerPrintMachine_Attendance()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataDeleteLog_FingerPrintMachine_AttendanceFetch()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataDeleteMapper_FingerPrintUserToPerson()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataDeleteOrganizationalDepartment()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataDeletePersonBusinessTrip()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataDeletePersonBusinessTripSequence()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataDeletePersonBusinessTripSequenceDetail()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataDeletePersonWorkAbsencePermit()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataDeletePersonWorkAbsenceReplacement()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataDeletePersonWorkArriveDepartPermit()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataDeletePersonWorkTimeSheet()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataDeletePersonWorkTimeSheetActivity()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataDeleteWorkAbsencePermit()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataDeleteWorkAbsencePermitType()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataDeleteWorkArriveDepartPermit()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataDeleteWorkDay()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataDeleteWorkTimeAssignation()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataDeleteWorkTimeEpoch()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataDeleteWorkTimeSchedule()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataDeleteProject()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataDeleteProjectSection()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataDeletePurchaseOrder()
            {
            //---Parameter Set---
            $varAPIWebToken = '9eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.project.setPurchaseOrder', 
                'latest', 
                [
                '9recordID' => 985000000000001
                ]
                );
            var_dump($varData);
            }


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataDeletePurchaseOrderDetail()
            {
            //---Parameter Set---
            $varAPIWebToken = '9eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.project.setPurchaseOrderDetail', 
                'latest', 
                [
                '9recordID' => 986000000000001
                ]
                );
            var_dump($varData);
            }


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataDeletePurchaseRequisition()
            {
            //---Parameter Set---
            $varAPIWebToken = '9eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.project.setProjectSection', 
                'latest', 
                [
                '9recordID' => 983000000000001
                ]
                );
            var_dump($varData);
            }


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataDeletePurchaseRequisitionDetail()
            {
            //---Parameter Set---
            $varAPIWebToken = '9eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.project.setPurchaseRequisitionDetail', 
                'latest', 
                [
                '9recordID' => 984000000000001
                ]
                );
            var_dump($varData);
            }


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataDeleteSupplier()
            {
            //---Parameter Set---
            $varAPIWebToken = '9eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.delete.project.setSupplier', 
                'latest', 
                [
                '9recordID' => 9126000000000001
                ]
                );
            var_dump($varData);
            }

        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataInitializeBloodAglutinogenType()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataInitializeBusinessDocumentType()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataInitializeCitizenIdentity()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataInitializeCountry()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataInitializeCountryAdministrativeAreaLevel1()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataInitializeCountryAdministrativeAreaLevel2()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataInitializeCountryAdministrativeAreaLevel3()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataInitializeCountryAdministrativeAreaLevel4()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataInitializeCurrency()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataInitializeDayOffGovernmentPolicy()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataInitializeDayOffNational()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataInitializeGoodsModel()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataInitializeGoodsType()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataInitializePeriod()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataInitializePerson()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataInitializePersonAccountEMail()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataInitializePersonGender()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataInitializeProductType()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataInitializeReligion()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataInitializeTradeMark()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataSynchronizeProject()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataUndeleteBloodAglutinogenType()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_setDataUpdateBloodAglutinogenType()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.update.master.setBloodAglutinogenType', 
                'latest', 
                [
                'recordID' => 27000000000001,
                'entities' => [
                    'type' => 'xx'                    
                    ]
                ]
                );
            var_dump($varData);
            }


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_getDataListBloodAglutinogenType()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_getDataListBusinessDocument()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_getDataListBusinessDocumentType()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_getDataListCitizenIdentity()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_getDataListCountry()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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

            
        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_getDataListCountryAdministrativeAreaLevel1()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_getDataListCountryAdministrativeAreaLevel2()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_getDataListCountryAdministrativeAreaLevel3()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_getDataListCountryAdministrativeAreaLevel4()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_getDataListCurrency()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_getDataListGoodsModel()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_getDataListPeriod()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_getDataListPerson()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_getDataListPersonAccountEMail()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_getDataListPersonGender()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_getDataListProductType()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_getDataListQuantityUnit()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_getDataListReligion()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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


        /*--------------------*/
        /* API Stage : Stable */
        /*--------------------*/
        public function APIGateway_getDataListTradeMark()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNjI2OTA1NH0.NjJJegg6WRVQ3LHksbKcni92MkyzjfYpxzrFvgLu2FQ';
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