<?php

namespace App\Http\Controllers\Application\BackEnd\SandBox
    {
    use Illuminate\Http\Request;
    use Illuminate\Http\Response;
 
    class Controller_Main extends \App\Http\Controllers\Controller
        {
        public function __construct()
            {
            //$this->middleware(\App\Http\Middleware\Application\BackEnd\RequestHandler_General::class);
            }
        
        public function webServices()
            {           
            $varDataReceive = \App\Helpers\ZhtHelper\System\Helper_HTTPRequest::getRequest(000000);
            
            //\App\Helpers\ZhtHelper\System\Helper_HTTPRequest::getHeader(000000);
            
            
            //echo "<br>Data Masuk : ";
            //var_dump($varDataReceive);
            //echo "<br>";
            
            $varDataSend = ['message' => 'Sukses alhamdulillah'];
            
            //\App\Helpers\ZhtHelper\System\Helper_HTTPRequest::setResponse(000000, $varDataSend);
            
            //return response()->json(['name' => 'Virat Gandhi', 'state' => 'Gujarat']);
            return \App\Helpers\ZhtHelper\System\Helper_HTTPRequest::setResponse(000000, $varDataSend);
            }

        public function testSDK()
            {
            $varUserSession=0;
            $x = new \SDK\Solution\FingerprintAttendance\x601\SDK($varUserSession, '192.168.1.203', 4370, 'AEYU202860040');
            $y = $x->getAllData('+07', '2021-01-11');
          
            dd($y);
            
            
//            $x = new \SDK\Goodwin\SwingGateBarrier\ServoSW01\SDK();
            
            }

        public function testMinIO()
            {
            \App\Helpers\ZhtHelper\General\Helper_Session::delete(\App\Helpers\ZhtHelper\System\Helper_Environment::getApplicationID());
            $varUserSession=0;
            
            //\App\Helpers\ZhtHelper\CloudStorage\Helper_MinIO::test();
            $x = (new \App\Models\CloudStorage\DefaultClassPrototype())->getBucketName($varUserSession);
            var_dump($x);
            echo '<br>~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~<br>';
            //$x = (new \App\Models\CloudStorage\DefaultClassPrototype())->($varUserSession);
            //echo \App\Helpers\ZhtHelper\CloudStorage\Helper_MinIO::deleteFile($varUserSession, 'MyImages/Logo-Application.png');
            //echo \App\Helpers\ZhtHelper\CloudStorage\Helper_MinIO::getFileURL($varUserSession, 'MyImages/Logo-Application.png');
            //\App\Helpers\ZhtHelper\CloudStorage\Helper_MinIO::isFileExist($varUserSession, 'MyImages/Logo-Application.png');
//            $x = \App\Helpers\ZhtHelper\CloudStorage\Helper_MinIO::getFileInfo($varUserSession, 'MyImages/Logo-Application.png');

/*            echo \App\Helpers\ZhtHelper\CloudStorage\Helper_MinIO::putFile($varUserSession, './../public/images/Logo-Application.png', 'MyImages/Logo-Application.png');
            echo \App\Helpers\ZhtHelper\CloudStorage\Helper_MinIO::putFile($varUserSession, './../public/images/Logo-Application.png', 'MyImages2/Logo-Application2.png');
            echo \App\Helpers\ZhtHelper\CloudStorage\Helper_MinIO::putFile($varUserSession, './../public/images/Logo-Application.png', 'MyImages2/MyImages2B/Logo-Application2B.png');
            $x = \App\Helpers\ZhtHelper\CloudStorage\Helper_MinIO::getFileList($varUserSession);
            var_dump($x);*/
            
            //$x = \App\Helpers\ZhtHelper\CloudStorage\Helper_MinIO::getAllDataRecord($varUserSession);
            //$x = \Illuminate\Support\Facades\DB::select('SELECT 1;');
            //$x = \Illuminate\Support\Facades\DB::
            
            //$x = (new \App\Models\Database\SchData_OLTP_Master\TblCitizenIdentity())->getAllDataRecord($varUserSession);
            //$x = (new \App\Models\Database\SchData_OLTP_Master\TblCountry())->getAllDataRecord($varUserSession);
            //$x = (new \App\Models\Database\SchSysConfig\TblLog_UserLoginSession)->getAllDataRecord($varUserSession);
            
            //$x = (new \App\Models\CloudStorage\DefaultClassPrototype())->getDataRecord($varUserSession, 'MyImages/Logo-Application.png');
            
            //$x = (new \App\Models\Database\SchSysConfig\TblDBObject_Schema())->setEmptyTableAndResetSequence($varUserSession);
            //$x = (new \App\Models\Database\SchSysConfig\TblDBObject_Schema())->getAllDataRecord($varUserSession);
            //$x = (new \App\Models\Database\SchSysConfig\TblDBObject_Table())->getAllDataRecord($varUserSession);
            $x = (new \App\Models\Database\SchData_OLTP_Budgeting\TblBudget())->getAllDataRecord($varUserSession, false);
            var_dump($x);
            }
            
            
            
            
            
        public function testModelDatabase()
            {
            \App\Helpers\ZhtHelper\General\Helper_Session::delete(\App\Helpers\ZhtHelper\System\Helper_Environment::getApplicationID());
            $varUserSession=4000000000399;
            $varUserSession=4000000000016;
//            $x = (new \App\Models\Database\SchData_OLTP_Master\TblBloodAglutinogenType())->getTableName($varUserSession);            
//            echo $x."<br>";
//            $x = (new \App\Models\Database\SchData_OLTP_Master\TblBloodAglutinogenType())->getSchemaName($varUserSession);            
//            echo $x."<br>";
//            echo '<br>~~~~~~~~<br>';

//            $x = (new \App\Models\Database\SchSysConfig\TblLog_UserLoginSession())->getDataRecord($varUserSession, 6000000000001);
//            var_dump($x);
            
//            echo '<br>~~~~~~~~<br>';
            //$x = (new \App\Models\Database\SchSysConfig\TblLog_UserLoginSession())->getAllDataRecord($varUserSession);
//            $x = (new \App\Models\Database\SchSysConfig\TblLog_UserLoginSession())->getDataRecord($varUserSession, 6000000000120);
//            var_dump($x);

//$x = (new \App\Models\Database\SchSysConfig\TblLog_UserLoginSession())->getAllFilteredDataRecord($varUserSession, '"APIWebToken" = \'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwMTg4MTQ4Mn0.0KJAcBDlk57gHYwRo69GCsxxZtqTpv5tU2emJdS-y-4\'');

            //$x = (new \App\Models\Database\SchSysConfig\General())->setUserSessionLogout($varUserSession, 6000000000141);

//SELECT * FROM "SchSysConfig"."FuncSys_General_GetBranchAccessListByUserID"(1::bigint)            
/*            $varData = (new \App\Models\Database\SchSysConfig\General())->getDataList_BranchAccess($varUserSession);
            
            for($i=0; $i!=count($varData); $i++)
                {
                $varDataUserRole = (new \App\Models\Database\SchSysConfig\General())->getDataList_UserRole($varUserSession, $varData[$i]['Sys_ID']);
                $varReturnUserRole = null;
                for($j=0; $j!=count($varDataUserRole); $j++)
                    {
                    if(!$varDataUserRole[$j]['Sys_ID'])
                        {
                        continue;
                        }
                    $varReturnUserRole[$j]=[
                        'UserRole_RefID' => $varDataUserRole[$j]['Sys_ID'],
                        'UserRoleName' => $varDataUserRole[$j]['UserRoleName'],
                        ];  
                    }
                $varReturn[$i]=[
                    'Branch_RefID' => $varData[$i]['Sys_ID'],
                    'BranchName' => $varData[$i]['BranchName'],
                    'UserRole' => $varReturnUserRole
                    ];
                }
            
            var_dump($varReturn);
            echo "<br><br>";
            
            
            */
            /*for($i=0; $i!=count($varData); $i++)
                {
                $varReturn[$i]=[
                    'Branch_RefID' => $varData[$i]['Sys_ID'],
                    'UserRoleName' => $varData[$i]['UserRoleName'],
                    'UserRole_RefID' => []
                    ];
                }
            
            var_dump($varReturn);*/
            //var_dump($varData);

//            $x = ((new \App\Models\Database\SchSysConfig\General())->getUserIDByName($varUserSession, 'teguh.pratama'));
            //
            
            //$x = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::isValid_SQLSyntax($varUserSession, 'SELECT NOW();');
            //$x = (new \App\Models\Database\SchSysConfig\General())->isValid_SQLSyntax($varUserSession, 'SELECT NOW();');
            
            //$x= (new \App\Models\Database\SchData_OLTP_Master\General())->getDataListCountry($varUserSession, 11000000000004, NULL, NULL, 'DROP ');
            
            
            //$x = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution($varUserSession, 'SELECT NOW();');
            
            
            //$x = \App\Helpers\ZhtHelper\General\Helper_Array::getArrayKeyRename_LowerFirstCharacter($varUserSession, ['AAA' => 'aaa', 'BBB' => 'bbb']);
            //$x = \App\Helpers\ZhtHelper\General\Helper_Array::getArrayKeyRename_LowerFirstCharacter($varUserSession, $x);
//            $x = \App\Helpers\ZhtHelper\General\Helper_Array::getArrayKeyRename_CamelCase($varUserSession, $x);
            //$x = \App\Helpers\ZhtHelper\Database\Helper_SQLValidation::isSecure_FilterStatement($varUserSession, 'WHERE (3 < (3+1)) OR "dfg" = "dfg" OR (\'fff = 123\') = (\'fff = 123\') OR ( "xxx" ILIKE \'myWord\' OR "xxx" ILIKE \'myWord123%\' OR "xxx" ILIKE \'%myWord456\' OR "xxx" LIKE \'%myWord789%\' OR \'zzz\' ILIKE \'ZZZ\' OR "AAA" ILIKE "AAA" OR "BBB" LIKE "BBB") OR 1=1 OR 3 = (1+2) OR "x"=89 OR (("x" > 2) AND ("x" < 25))');
            //$x = \App\Helpers\ZhtHelper\Database\Helper_SQLValidation::isSecure_FilterStatement($varUserSession, 'WHERE "dfg" = "dfg" OR (\'fff = 123\') = (\'fff = 123\') OR ( "xxx" ILIKE \'myWord\' OR "xxx" ILIKE \'myWord123%\' OR "xxx" ILIKE \'%myWord456\' OR "xxx" LIKE \'%myWord789%\' OR \'zzz\' ILIKE \'ZZZ\' OR "AAA" ILIKE "AAA" OR "BBB" LIKE "BBB")');
            //$x = \App\Helpers\ZhtHelper\Database\Helper_SQLValidation::isSecure_FilterStatement($varUserSession, 'WHERE "zzz2" NOT   LIKE "xxxx2" AND \'zzz\' NOT   LIKE \'xxxx\' AND "xxx" ILIKE "xxx" OR \'1234\' ILIKE (\'12\' || \'34\') OR "AAA" || \'xxx\' LIKE "AAA"');
            //$x = \App\Helpers\ZhtHelper\Database\Helper_SQLValidation::isSecure_FilterStatement($varUserSession, '"xxx" = 105; DROP TABLE "xxx"."yyy";');
            //$x = \App\Helpers\ZhtHelper\Database\Helper_SQLValidation::isSecure_FilterStatement($varUserSession, '"xxx" = 105');
            //$x= (new \App\Models\Database\SchData_OLTP_Master\General())->getDataListCurrency($varUserSession, 11000000000004, NULL, NULL, 'DROP ');
            //$x= (new \App\Models\Database\SchData_OLTP_Master\General())->getDataList_PersonAccountEMail($varUserSession, 11000000000004, 25000000000241, NULL, NULL, NULL);
            
            //$x= (new \App\Models\Database\SchSysConfig\General())->setDataDelete($varUserSession, 27000000000028);
            
            //$x= (new \App\Models\Database\SchData_OLTP_Master\TblBloodAglutinogenType())->setDataInitialize($varUserSession);
            
            //$x= (new \App\Models\Database\SchData_OLTP_Project\TblProject())->setDataSynchronize($varUserSession);
            
            //
            //$varBuffer= (new \App\Models\Database\SchSysConfig\General())->getMenuByUserRoleIDAndBranchID($varUserSession, 95000000000003, 11000000000004);
//            $x = \App\Helpers\ZhtHelper\System\Helper_Environment::setApplicationUserRolePrivilegesMenu($varUserSession, 95000000000003, 11000000000004);
            $x = \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONEncode(
                $varUserSession, 
                \App\Helpers\ZhtHelper\System\Helper_Environment::getApplicationUserRolePrivilegesMenu($varUserSession, 95000000000003, 11000000000004)
                );
            
            //$x= (new \App\Models\Database\SchSysConfig\TblLog_UserLoginSession())->getDataRecord($varUserSession, 6000000000316);
            
            var_dump($x);

            }
            
            
        public function testJQuery()
            {
            $varUserSession=4000000000016;
            echo \App\Helpers\ZhtHelper\General\Helper_JQuery::setCallAPI($varUserSession);
            }
            
            
        public function testRedis()
            {
            \App\Helpers\ZhtHelper\General\Helper_Session::delete(\App\Helpers\ZhtHelper\System\Helper_Environment::getApplicationID());
            $varUserSession=0;

            $varKey = 'ERPReborn::APIWebToken::eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwMTQ1NTcxMH0.KfZQ_diR-r3eiEKgyfsQSUhasCgDi_9thgN3CRF3C6c';
            echo "<br>~~~~~~~<br>".\App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue($varUserSession, $varKey);


            
/*            
$varAPIWebToken='eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwMjczMDUxMH0.nVXe1M51rpPxH8zkOvA7kW-R9ADkVVRDK_OFRJJCrVw';
$varData = \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode($varUserSession, \App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue($varUserSession, 'ERPReborn::APIWebToken::'.$varAPIWebToken));
var_dump($varData);
echo "<br>";
echo "<br>";
$x = \App\Helpers\ZhtHelper\Cache\Helper_Redis::getTTL($varUserSession, 'ERPReborn::APIWebToken::'.$varAPIWebToken);
var_dump($x);
echo "<br>";
echo "<br>";
$varData['userRole_RefID']=777;
\App\Helpers\ZhtHelper\Cache\Helper_Redis::setValueRenewal($varUserSession, 'ERPReborn::APIWebToken::'.$varAPIWebToken, \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONEncode($varUserSession, $varData));


$varData = \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode($varUserSession, \App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue($varUserSession, 'ERPReborn::APIWebToken::'.$varAPIWebToken));
var_dump($varData);
echo "<br>";
echo "<br>";
$x = \App\Helpers\ZhtHelper\Cache\Helper_Redis::getTTL($varUserSession, 'ERPReborn::APIWebToken::'.$varAPIWebToken);
var_dump($x);
*/
/*
$varAPIWebToken='eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwMjczMDUxMH0.nVXe1M51rpPxH8zkOvA7kW-R9ADkVVRDK_OFRJJCrVw';
$varData = \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode($varUserSession, (new \App\Models\Cache\General\APIWebToken())->getDataRecord($varUserSession, $varAPIWebToken));
var_dump($varData);
echo "<br><br>";

$varData['userRole_RefID']=8888;
(new \App\Models\Cache\General\APIWebToken())->setDataUpdate($varUserSession, $varAPIWebToken, \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONEncode($varUserSession, $varData));
$varData = \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode($varUserSession, (new \App\Models\Cache\General\APIWebToken())->getDataRecord($varUserSession, $varAPIWebToken));
var_dump($varData);

echo "<br>";
echo "<br>";
$x = \App\Helpers\ZhtHelper\Cache\Helper_Redis::getTTL($varUserSession, 'ERPReborn::APIWebToken::'.$varAPIWebToken);
var_dump($x);
*/









//echo "<br>";
//$x = \App\Helpers\ZhtHelper\Cache\Helper_Redis::getTTL($varUserSession, 'ERPReborn::APIWebToken::'.$varAPIWebToken);
//var_dump($x);
            
            
            

            
//            $x = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecutionDataFetch_DataOnly_Specific($varUserSession, 6000000000001);
//            $x = (new \App\Models\Database\SchSysConfig\TblLog_UserLoginSession())->getDataRecord($varUserSession, 6000000000001);
            //$x = (new \App\Models\Database\SchSysConfig\TblLog_UserLoginSession())->getAllDataRecord($varUserSession);            
            //$x = (new \App\Models\Database\SchSysConfig\TblLog_UserLoginSession())->getTableName($varUserSession);            

//            $x = \App\Helpers\ZhtHelper\Cache\Helper_Redis::getKeyList($varUserSession, 'ERPReborn::*');
//            
//            $x = (new \App\Models\Cache\General\APIWebToken())->getAllDataRecord($varUserSession);
//            var_dump($x);
            
            //echo (new \App\Models\Database\SchSysConfig\TblRotateLog_API())->getSchemaTableName($varUserSession);
            
//            echo '<br>~~~~~~~~<br>';
//            echo \App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue($varUserSession, 'ERPReborn::APIWebToken::eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTU5OTAyMjUyN30.u2Re2mLnb8XhmJmxTseNOtWzTv2vwM5lySIg0KB1BS0');
            
//            $x = new \App\Models\Cache\General\APIWebToken();
//            $x->setDataInsert($varUserSession, 'xxxx', 'varValue', 10);
            
//$x = new \App\Models\Database\SchSysConfig\TblLog_UserLoginSession();
//$y = $x->getDataRecord(000000, 6000000000013);
//var_dump($y);
//            $x = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecutionDataFetch_RecordDataOnly($varUserSession, 6000000000013);
//            var_dump($x);

//            $varKey = 'ERPReborn::APIWebToken::eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTU5ODg1NTk2NH0.BHiM9jFqxX_wUegqcdDin3sDjEJjAwg9df0oM0GhtF8';
    //                    echo "<br>~~~~~~~<br>".\App\Helpers\ZhtHelper\Cache\Helper_Redis::getTTL($varUserSession, $varKey);

            
/*$x = new \App\Models\Cache\General\APIWebToken();
$x->setDataInsert($varUserSession, 'xxx', 'xxxValue', 10);
echo "<br>~~~~~~~~~~~~~~~~~~~~~<br>";
echo $x->getDataRecord($varUserSession, 'xxx');
for($i=0; $i!=2; $i++)
    {
    echo "<br>".$x->getDataTTL($varUserSession, 'xxx');
    sleep(1);
    }

echo "<br>~~~~~~~~~~~~~~~~~~~~~<br>";
$x->setDataTTLRenewal($varUserSession, 'xxx', 20);
for($i=0; $i!=2; $i++)
    {
    echo "<br>".$x->getDataTTL($varUserSession, 'xxx');
    sleep(1);
    }
*/

//$x->setKeyHeader($varUserSession, $varClassName)

            
//            $ObjModel = new \App\Models\Database\SchSysConfig\TblLog_UserLoginSession();
//            $user = $ObjModel->   ->hydrate(
//            $user = DB::select(
//                "SELECT * FROM \"SchSysConfig\".\"FuncSys_General_GetUnixTime\"('2019-01-01 00:00:00 +07')"
//                );
//                );
/*            $x = 
                $ObjModel->hydrate(
                    \Illuminate\Support\Facades\DB::select('SELECT NOW();')
                    );
            var_dump($x);
*/
/*            $varUserSession=0;
            echo \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                $varUserSession, 
                'SchSysConfig.Func_TblLog_UserLoginSession_SET', 
                [111, null, null, null, 222, 'SysEngine', 'eyJhbGciOiJIUzI1NiIsI', null, 444, 95000000000001, '2018-01-01 00:00:00+07', '9999-12-31 23:59:59+07', null, null],
                ['bigint', 'bigint', 'character varying', 'character varying', 'bigint', 'character varying', 'character varying', 'json', 'bigint', 'bigint', 'timestamp with time zone', 'timestamp with time zone', 'timestamp with time zone', 'timestamp with time zone']
                );
*/            
  
            //echo \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getCurrentYear(000);
            
//            echo substr('(NOW() + \'5 minutes\'::interval)', 0, 1); 
//            echo substr('(NOW() + \'5 minutes\'::interval)', strlen('(NOW() + \'5 minutes\'::interval)')-1, 1); 
/*            $varSQLQuery = '
            SELECT
                CASE
                    WHEN (COUNT("Sys_RPK") = 0) THEN 
                        TRUE
                    ELSE
                        FALSE
                END AS "SignValid"
            FROM 
                "SchSysConfig"."TblLog_UserLoginSession"
            WHERE
                "SessionStartDateTimeTZ" <= NOW()
                AND
                "SessionFinishDateTimeTZ" >= NOW()
                AND
                "APIWebToken" LIKE \'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTU5ODU5Nzg0OX0.nujH2-2GRILaG_ahWQ-mxsFNydpWHahNIJ0an5HDi9A\'
                ';
            $x = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(000, $varSQLQuery);
            var_dump($x['Data'][0]['SignValid']);
            
            if($x['Data'][0]['SignValid']==true)
                {
                echo "lanjut";
                }
            else
                {
                echo "ulang";
                }*/
            
            
            
/*
--                "SessionStartDateTimeTZ" <= NOW()
  --              AND
    --            "SessionFinishDateTimeTZ" >= NOW()
      --          AND
*/
            
            
/*            echo "TEST REDIS<br><br>";
            $varUserSession = 000000;
            
//            echo \App\Helpers\ZhtHelper\General\Helper_HTTPAuthentication::getJSONWebToken($varUserSession, 'SysAdmin', '10006000000000002');
            
            
            \App\Helpers\ZhtHelper\Cache\Helper_Redis::setValue($varUserSession, 'MyKey', '{Myvalue}', 5);
            for($i=0; $i!=3; $i++)
                {
                sleep(1);
                echo "<br>".\App\Helpers\ZhtHelper\Cache\Helper_Redis::getTTL($varUserSession, 'MyKey')."-->".\App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue($varUserSession, 'MyKey');
                }
            echo "<br>~~~~~~~~~~~";
            \App\Helpers\ZhtHelper\Cache\Helper_Redis::setValue($varUserSession, 'MyKey', '{New Myvalue}', 5);
            for($i=0; $i!=10; $i++)
                {
                sleep(1);
                echo "<br>".\App\Helpers\ZhtHelper\Cache\Helper_Redis::getTTL($varUserSession, 'MyKey')."-->".\App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue($varUserSession, 'MyKey');
                }
*/
 
            //echo "<br>". \App\Helpers\ZhtHelper\Cache\Helper_Redis::getStatusAvailability($varUserSession);
            //echo "<br>".\Illuminate\Support\Facades\Redis::ttl('MyKey');
            //echo \App\Helpers\ZhtHelper\Cache\Helper_Redis::getTTL($varUserSession, 'MyKey');
            //var_dump(\App\Helpers\ZhtHelper\Cache\Helper_Redis::getInfo($varUserSession));
            }
            

        public function test()
            {
//---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
$varUserSession = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();

$varDataReceive = \App\Helpers\ZhtHelper\System\Helper_HTTPRequest::getRequest($varUserSession);

$varAPIKey = 'authentication.general.setLogin';
//$varAPIVersion = $varDataReceive['metadata']['API']['version'];
$varAPIVersion = 'latest';

$varData = [
    'userName' => 'teguh.pratama',
    'userPassword' => 'teguhpratama789'
    ];

//---> Method Call
$varDataSend = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setCallAPIEngine($varUserSession, $varAPIKey, $varAPIVersion, $varData, 'setLogin');

var_dump($varDataSend);

            //\App\Helpers\ZhtHelper\General\Helper_Session::delete(\App\Helpers\ZhtHelper\System\Helper_Environment::getApplicationID());            
            //echo \App\Helpers\ZhtHelper\General\Helper_RandomNumber::getUniqueID(000000);
            
            //echo \App\Helpers\ZhtHelper\General\Helper_HTTPHeader::getGMTDateTime();
            //\App\Helpers\ZhtHelper\General\Helper_File::getAutoMatchFilePath(000000, getcwd().'/', '/config/Application/BackEnd/environment.txt');
            //echo "xxx : ".\App\Helpers\ZhtHelper\System\Helper_Environment::getBackEndConfigEnvironment(000000, 'LDAP_BASEDN');
            //echo "yyy";
            //echo \App\Helpers\ZhtHelper\General\Helper_HTTPAuthentication::getJSONWebToken(000000, 'Teguh Pratama', 'secret');
            }



            

        public function testWS()
            {
            \App\Helpers\ZhtHelper\General\Helper_Session::delete(\App\Helpers\ZhtHelper\System\Helper_Environment::getApplicationID());

         
            
            
            
            // create digest auth
//            $auth = \Intervention\HttpAuth\HttpAuth::make();
  //          $auth->digest();
    //        $auth->realm('Secure');
  //          $auth->username('admin');
//            $auth->password('secret');
            
//            var_dump($auth);
            
//            $auth->secure();
            
            $varDataArray = [
                'System' => [],
                'Data' => []
                ];
            //$x = \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONEncode(000000, $varDataArray);
            $x = \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(000000, \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONEncode(000000, $varDataArray));
            var_dump($x);
            
            echo "<br>--------------------------------------------<br>";
            $x = \App\Helpers\ZhtHelper\System\Helper_HTTPRequest::getResponse(
                000000, 
                'http://172.28.0.3/api/webservices', 
                'POST', 
                $varDataArray,
                80
                );
            
            
           
            echo "<br>--------------------------------------------<br>";
            echo "<br>Tunggu data masuk<br>";
            var_dump($x);
            echo "<br>Finish";
            
            //$x = \App\Helpers\ZhtHelper\General\Helper_LDAP::getAuthenticationBySAMAccountName(000000, '192.168.1.23', 389, 'DC=qdc-files,DC=qdc,DC=co,DC=id', 'teguh.pratama', 'teguhpratama789');
            \App\Helpers\ZhtHelper\General\Helper_DateTime::getUnixTimeByJavaScript(000000);
            }




























            
        public function testEncrypt()
            {
            \App\Helpers\ZhtHelper\General\Helper_Session::delete(\App\Helpers\ZhtHelper\System\Helper_Environment::getApplicationID());
            
            \App\Helpers\ZhtHelper\System\Helper_HTTPRequest::getEncryptedURLParameter([]);
            
//            $x = \App\Helpers\ZhtHelper\General\Helper_Compression::getBZip2Decompress(00000, \App\Helpers\ZhtHelper\General\Helper_Compression::getBZip2Compress(00000, 'Ini contoh datanya'));
//            $x = \App\Helpers\ZhtHelper\General\Helper_Compression::getZLibDecompress(00000, \App\Helpers\ZhtHelper\General\Helper_Compression::getZLibCompress(00000, 'Ini contoh datanya'));
//            echo $x;
//            echo \App\Helpers\ZhtHelper\General\Helper_Array::isSequentialArray(000000, [1,2,3]);
            
            $ServiceName = 'service.core.userAuthentication';
            $ServiceAction = 'get';
            
            $dll='Lorem ipsum dolor sit amet, enim non in erat in diam leo, ligula nec odio nibh sit rhoncus viverra, vitae et arcu massa et molestie leo, erat massa. Error nonummy, et adipiscing lectus malesuada integer cursus dignissim, ut dolor tincidunt volutpat interdum arcu eget. Et cras, dolor mauris amet consequat pulvinar erat. Magnis id ad hac lacus amet vulputate, laoreet imperdiet sed quam, eros accumsan lobortis, tempor libero commodo odio non. Aliquam curabitur sit enim vivamus est a, ac ac dapibus lectus nisl quisque nisl, rutrum turpis vel felis eleifend, metus nunc ac leo. Sit eleifend amet libero commodo, elit tellus sed mollis venenatis feugiat, pede ut vel quaerat mauris. Mi quis nulla vel, neque nisl bibendum, quis odio est sem amet, nulla sed, urna wisi. Sagittis donec condimentum. Fames aliquet sunt, nonummy nulla doloribus, nam nullam gravida, vitae exercitation malesuada faucibus pellentesque donec. Taciti magna, non non vel, at sollicitudin congue enim suspendisse. Pede ut tellus adipiscing duis non fusce, lobortis mi consequat purus, quis non felis velit, etiam tellus non ipsum vitae lorem lorem, et metus mauris. Nec felis. Volutpat dui dignissim quisque quis eu, curae suscipit, commodo ultrices, sed parturient lacinia justo wisi totam, orci nam. Nisl excepturi sit dolor viverra suscipit asperiores. Morbi ut lacus proin viverra posuere, sociis ultrices, odio nullam quis, egestas suscipit eros. Mauris dignissim nulla nonummy. Diam ultrices adipiscing nibh mi dui, aliquam libero pulvinar dapibus, sociosqu aut sodales, ultricies elementum, ut inceptos. Odio ullamcorper tincidunt aenean rhoncus, ut aliquet interdum sint tortor vestibulum adipisicing, cursus eum, facilisis nibh varius magna a. Praesent odio, sit purus est, nam justo sed. Id lorem tempor, tristique amet commodo lectus lorem dictum natoque, augue suscipit eros vel turpis, habitant consectetuer eros. Vestibulum magna, proin blandit mauris mauris fames nibh, in aliquam lectus semper ipsum, justo cursus laoreet dui turpis in. Dolor ultricies sit, placerat per imperdiet nisl eget lacinia sit, amet vestibulum delectus nisl odio, aliquam mi, non quisque. Lorem vehicula amet dictumst, orci lorem. Laoreet enim, quam et aliquam, rutrum in beatae nullam, eget arcu mattis vitae vestibulum neque. Molestie tincidunt, libero convallis quis sodales, aenean lacus lobortis erat id amet sapien. Dolor cursus, auctor augue cursus. Quibusdam mauris augue, eleifend massa nulla sollicitudin sed lacus. Felis dui viverra nulla totam risus, fermentum magna natoque vel fusce augue erat, pretium ut enim ipsum in cursus, massa diam arcu eu. Pellentesque cras egestas et pede morbi nec, pellentesque dolor sollicitudin, orci bibendum quam scelerisque tincidunt mi, metus in. Ante duis turpis et, pulvinar duis. Faucibus est, aut ligula mauris congue. Pede non odio. Aliquam vivamus dapibus sed, elit posuere integer eros, quis sit consequuntur in. Nulla scelerisque.';
            
            
            //$varURLParameterPlain = '/'.$ServiceName.'/'.$ServiceAction.'/teguhpratama789';
            $varURLParameterPlain = $ServiceName.'/'.$ServiceAction.'/teguhpratama789/'.$dll;
            echo '<br>URL Parameter Plain : <br>'.$varURLParameterPlain;
            echo "<br>-------------------------------------------------------------------------------------------";
            $varURLParameterPlainEncapsulated = \App\Helpers\ZhtHelper\System\Helper_HTTPRequest::getURLEncapsulation(000000, $varURLParameterPlain);
            echo '<br>URL Parameter Encapsulation : <br>'.$varURLParameterPlainEncapsulated;
            echo "<br>-------------------------------------------------------------------------------------------";
            $varURLParameterPlainDecapsulated = \App\Helpers\ZhtHelper\System\Helper_HTTPRequest::getURLDecapsulation(000000, $varURLParameterPlainEncapsulated);
            echo '<br>URL Parameter Decapsulation : <br>'.$varURLParameterPlainDecapsulated;
            }





        public function testNEW()
            {

            \App\Helpers\ZhtHelper\General\Helper_Session::delete(\App\Helpers\ZhtHelper\System\Helper_Environment::getApplicationID());
//            \App\Helpers\ZhtHelper\System\Helper_Registry::init();
            echo "<br>xxxxxxxxxxxxxxxxxxxxx<br>";
            echo \App\Helpers\ZhtHelper\General\Helper_Array::isSequentialArray(000000, [1,2,3]);
            echo "<br>xxxxxxxxxxxxxxxxxxxxx<br>";
            echo \App\Helpers\ZhtHelper\General\Helper_Array::isSequentialArray(000000, ['a'=>1, 'b'=>2, 'c'=>3]);
            echo "<br>xxxxxxxxxxxxxxxxxxxxx<br>";
            $x=\App\Helpers\ZhtHelper\General\Helper_Array::getOnlyArrayValueWithoutKey(000000, ['a'=>1, 'b'=>2, 'c'=>3]);
            echo "<br>xxxxxxxxxxxxxxxxxxxxx<br>";
            echo \App\Helpers\ZhtHelper\General\Helper_Encryption::getBase64Decode(000000, \App\Helpers\ZhtHelper\General\Helper_Encryption::getBase64Encode(000000, 'Pesan Rahasia'));
            echo "<br>xxxxxxxxxxxxxxxxxxxxx<br>";
//            echo \App\Helpers\ZhtHelper\General\Helper_Encryption::getOpenSSLEncode(000000, 'Ini data rahasianya', 'AES-128-CTR', 'Kunci Enkripsiku', 0, '1234567891011121');
            echo \App\Helpers\ZhtHelper\General\Helper_Encryption::getOpenSSLDecode(000000, \App\Helpers\ZhtHelper\General\Helper_Encryption::getOpenSSLEncode(000000, 'Ini data rahasianya', 'AES-128-CTR', 'Kunci Enkripsiku', 0, '1234567891011121'), 'AES-128-CTR', 'Kunci Enkripsiku', 0, '1234567891011121');
            }





        public function testxxx()
            {
            echo "<br>".time()."<br>";

            
            
            
            \App\Helpers\ZhtHelper\General\Helper_Session::delete(\App\Helpers\ZhtHelper\System\Helper_Environment::getApplicationID());
            

            echo \App\Helpers\ZhtHelper\General\Helper_Array::isAssociativeArray(000000, [1,2,3]);
            
            
            
            //$varDataSession = \App\Helpers\ZhtHelper\General\Session::get(\App\Helpers\ZhtHelper\System\Environment::getApplicationID());         

            
//            echo \App\Helpers\ZhtHelper\General\ArrayHandler::getArrayValue($varDataSession, 'Registry::Global::Environment::Application::Name');

            echo "<br>----------------<br>";

//            var_dump($varDataSession);
            echo "<br>----------------<br>";







//            \App\Helpers\ZhtHelper\System\Registry::setSpecificRegistry(0, 'Zzz::Xxx', '$varValue');
//            echo \App\Helpers\ZhtHelper\System\Registry::getSpecificRegistry(0, 'Zzz::Xxx');
            
            
//            \App\Helpers\ZhtHelper\Logger\SystemLog::setLogOutut(000000, 'Helper::ZhtHelper', 'xxxx');
//            \App\Helpers\ZhtHelper\Logger\SystemLog::setLogOutput(000000, 'Helper::ZhtHelper', 'yyyy');
            
//            \App\Helpers\ZhtHelper\Logger\SystemLog::setLogError(000000, 'Helper::ZhtHelper', 'Error yyyy');



            //\App\Helpers\ZhtHelper\System\Registry::init();
            //echo "<br>-----------";
            //echo \App\Helpers\ZhtHelper\General\Session::isExist(\App\Helpers\ZhtHelper\System\Environment::getApplicationID());
            //echo "-----------";
            
            
            
            
            
            
//            \App\Helpers\ZhtHelper\Logger\SystemLog::setLogOutput('Helper::ZhtHelper', 000000, 'xxxx');
//            echo \App\Helpers\ZhtHelper\Logger\SystemLog::getLogOutput('Log::Helper::ZhtHelper', 000000);








            //$varRegistry['Registry']['Global']['Environment']['Database']['Type']='PostgreSQL';

            echo \App\Helpers\ZhtHelper\General\Helper_Hash::getMD5(000000, 'xxxxxxxxxxxxxx');
            
            \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::init(000000);
            \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getStatusAvailability(000000);
            $x = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(000000, "SELECT 1 AS xxx");
            echo \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getDateTimeTZ(000000);


            

            
            //var_dump(\App\Helpers\ZhtHelper\Cache\Helper_Redis::getDateTimeTZ());
            var_dump(\App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue(000000, 'myKey2'));
            \App\Helpers\ZhtHelper\Cache\Helper_Redis::setValue(000000, 'myKey2', 'myValue', 1);
            \App\Helpers\ZhtHelper\Cache\Helper_Redis::isExist(000000, 'myKey2');
            echo "<br><br>Delete:";
            \App\Helpers\ZhtHelper\Cache\Helper_Redis::delete(000000, 'myKey2');
            echo "<br><br>TTL:";
            var_dump(\App\Helpers\ZhtHelper\Cache\Helper_Redis::getTTL(000000, 'myKey2'));
            echo "<br><br>GetValue:";
            var_dump(\App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue(000000, 'myKey2'));
            echo "<br><br>DateTime:";
            var_dump(\App\Helpers\ZhtHelper\Cache\Helper_Redis::getDateTime(000000));
            echo "<br><br>Info:";
            var_dump(\App\Helpers\ZhtHelper\Cache\Helper_Redis::getInfo(000000));
            //var_dump($x);
            
            //phpinfo();
            
            
            
            echo "<br>"; echo "<br>"; echo "<br>";
            echo "weleh";

            echo "weleh";
            
            
            
//            var_dump(\App\Helpers\ZhtHelper\General\Session::get('ERPReborn'));
  //          echo \App\Helpers\ZhtHelper\General\Session::delete('ERPReborn');
    //        echo "Terhapuskah";
      //      var_dump(\App\Helpers\ZhtHelper\General\Session::get('ERPReborn'));     
            echo "<br>".time()."<br>";

            
            }
        }
    }
 
?>