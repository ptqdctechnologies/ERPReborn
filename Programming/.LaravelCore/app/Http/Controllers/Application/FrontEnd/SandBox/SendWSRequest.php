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
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNTQ5MzYyNn0.OA4a1rDH8gf7Vl5AqT53Xa1KEiIn327SMT44KzQ0e8M';
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
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNTQ5MzYyNn0.OA4a1rDH8gf7Vl5AqT53Xa1KEiIn327SMT44KzQ0e8M';
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
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNTQ5MzYyNn0.OA4a1rDH8gf7Vl5AqT53Xa1KEiIn327SMT44KzQ0e8M';
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
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNTQ5MzYyNn0.OA4a1rDH8gf7Vl5AqT53Xa1KEiIn327SMT44KzQ0e8M';
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
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNTQ5MzYyNn0.OA4a1rDH8gf7Vl5AqT53Xa1KEiIn327SMT44KzQ0e8M';
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
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNTQ5MzYyNn0.OA4a1rDH8gf7Vl5AqT53Xa1KEiIn327SMT44KzQ0e8M';
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
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNTQ5MzYyNn0.OA4a1rDH8gf7Vl5AqT53Xa1KEiIn327SMT44KzQ0e8M';
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
        public function APIGateway_setDataDeleteCitizenIdentity()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNTQ5MzYyNn0.OA4a1rDH8gf7Vl5AqT53Xa1KEiIn327SMT44KzQ0e8M';
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
        public function APIGateway_setDataDeleteCountry()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNTQ5MzYyNn0.OA4a1rDH8gf7Vl5AqT53Xa1KEiIn327SMT44KzQ0e8M';
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
        public function APIGateway_setDataInitializeBloodAglutinogenType()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNTQ5MzYyNn0.OA4a1rDH8gf7Vl5AqT53Xa1KEiIn327SMT44KzQ0e8M';
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
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNTQ5MzYyNn0.OA4a1rDH8gf7Vl5AqT53Xa1KEiIn327SMT44KzQ0e8M';
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
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNTQ5MzYyNn0.OA4a1rDH8gf7Vl5AqT53Xa1KEiIn327SMT44KzQ0e8M';
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
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNTQ5MzYyNn0.OA4a1rDH8gf7Vl5AqT53Xa1KEiIn327SMT44KzQ0e8M';
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
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNTQ5MzYyNn0.OA4a1rDH8gf7Vl5AqT53Xa1KEiIn327SMT44KzQ0e8M';
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
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNTQ5MzYyNn0.OA4a1rDH8gf7Vl5AqT53Xa1KEiIn327SMT44KzQ0e8M';
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
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNTQ5MzYyNn0.OA4a1rDH8gf7Vl5AqT53Xa1KEiIn327SMT44KzQ0e8M';
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
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNTQ5MzYyNn0.OA4a1rDH8gf7Vl5AqT53Xa1KEiIn327SMT44KzQ0e8M';
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
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNTQ5MzYyNn0.OA4a1rDH8gf7Vl5AqT53Xa1KEiIn327SMT44KzQ0e8M';
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
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNTQ5MzYyNn0.OA4a1rDH8gf7Vl5AqT53Xa1KEiIn327SMT44KzQ0e8M';
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
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNTQ5MzYyNn0.OA4a1rDH8gf7Vl5AqT53Xa1KEiIn327SMT44KzQ0e8M';
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
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNTQ5MzYyNn0.OA4a1rDH8gf7Vl5AqT53Xa1KEiIn327SMT44KzQ0e8M';
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
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNTQ5MzYyNn0.OA4a1rDH8gf7Vl5AqT53Xa1KEiIn327SMT44KzQ0e8M';
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
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNTQ5MzYyNn0.OA4a1rDH8gf7Vl5AqT53Xa1KEiIn327SMT44KzQ0e8M';
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
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNTQ5MzYyNn0.OA4a1rDH8gf7Vl5AqT53Xa1KEiIn327SMT44KzQ0e8M';
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
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNTQ5MzYyNn0.OA4a1rDH8gf7Vl5AqT53Xa1KEiIn327SMT44KzQ0e8M';
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
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNTQ5MzYyNn0.OA4a1rDH8gf7Vl5AqT53Xa1KEiIn327SMT44KzQ0e8M';
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
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNTQ5MzYyNn0.OA4a1rDH8gf7Vl5AqT53Xa1KEiIn327SMT44KzQ0e8M';
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
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNTQ5MzYyNn0.OA4a1rDH8gf7Vl5AqT53Xa1KEiIn327SMT44KzQ0e8M';
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
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNTQ5MzYyNn0.OA4a1rDH8gf7Vl5AqT53Xa1KEiIn327SMT44KzQ0e8M';
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
        public function APIGateway_setDataUndeleteBloodAglutinogenType()
            {
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNTQ5MzYyNn0.OA4a1rDH8gf7Vl5AqT53Xa1KEiIn327SMT44KzQ0e8M';
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
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNTQ5MzYyNn0.OA4a1rDH8gf7Vl5AqT53Xa1KEiIn327SMT44KzQ0e8M';
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
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNTQ5MzYyNn0.OA4a1rDH8gf7Vl5AqT53Xa1KEiIn327SMT44KzQ0e8M';
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
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNTQ5MzYyNn0.OA4a1rDH8gf7Vl5AqT53Xa1KEiIn327SMT44KzQ0e8M';
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
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNTQ5MzYyNn0.OA4a1rDH8gf7Vl5AqT53Xa1KEiIn327SMT44KzQ0e8M';
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
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNTQ5MzYyNn0.OA4a1rDH8gf7Vl5AqT53Xa1KEiIn327SMT44KzQ0e8M';
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
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNTQ5MzYyNn0.OA4a1rDH8gf7Vl5AqT53Xa1KEiIn327SMT44KzQ0e8M';
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
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNTQ5MzYyNn0.OA4a1rDH8gf7Vl5AqT53Xa1KEiIn327SMT44KzQ0e8M';
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
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNTQ5MzYyNn0.OA4a1rDH8gf7Vl5AqT53Xa1KEiIn327SMT44KzQ0e8M';
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
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNTQ5MzYyNn0.OA4a1rDH8gf7Vl5AqT53Xa1KEiIn327SMT44KzQ0e8M';
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
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNTQ5MzYyNn0.OA4a1rDH8gf7Vl5AqT53Xa1KEiIn327SMT44KzQ0e8M';
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
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNTQ5MzYyNn0.OA4a1rDH8gf7Vl5AqT53Xa1KEiIn327SMT44KzQ0e8M';
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
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNTQ5MzYyNn0.OA4a1rDH8gf7Vl5AqT53Xa1KEiIn327SMT44KzQ0e8M';
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
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNTQ5MzYyNn0.OA4a1rDH8gf7Vl5AqT53Xa1KEiIn327SMT44KzQ0e8M';
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
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNTQ5MzYyNn0.OA4a1rDH8gf7Vl5AqT53Xa1KEiIn327SMT44KzQ0e8M';
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
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNTQ5MzYyNn0.OA4a1rDH8gf7Vl5AqT53Xa1KEiIn327SMT44KzQ0e8M';
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
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNTQ5MzYyNn0.OA4a1rDH8gf7Vl5AqT53Xa1KEiIn327SMT44KzQ0e8M';
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
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNTQ5MzYyNn0.OA4a1rDH8gf7Vl5AqT53Xa1KEiIn327SMT44KzQ0e8M';
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
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNTQ5MzYyNn0.OA4a1rDH8gf7Vl5AqT53Xa1KEiIn327SMT44KzQ0e8M';
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
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNTQ5MzYyNn0.OA4a1rDH8gf7Vl5AqT53Xa1KEiIn327SMT44KzQ0e8M';
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
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwNTQ5MzYyNn0.OA4a1rDH8gf7Vl5AqT53Xa1KEiIn327SMT44KzQ0e8M';
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