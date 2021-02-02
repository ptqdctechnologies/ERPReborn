<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : API Engine Controller                                                                                             |
| ▪ Name Space : \App\Http\Controllers\Application\BackEnd\System\Scheduler\Engines\everyTwoHours\system\setJobs\v1                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2021 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\BackEnd\System\Scheduler\Engines\everyTwoHours\system\setJobs\v1
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : setJobs                                                                                                      |
    | ▪ Description : Menangani API scheduler.everyTwoHours.system.setJobs Version 1                                               |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class setJobs extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | Class Properties                                                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        private $varAPIIdentity;


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-01-26                                                                                           |
        | ▪ Description     : System's Default Constructor                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        function __construct()
            {
            $this->varAPIIdentity = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getAPIIdentityFromClassFullName(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), __CLASS__);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : loadAllJobs                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-01-26                                                                                           |
        | ▪ Description     : loadAllJobs                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function loadAllJobs(int $varUserSession)
            {
            /*
            ..... Call all functions will be loaded .....
            */
            //$this->getAttendance($varUserSession);
            $this->getTaxExchangeRate($varUserSession);
            }

        private function getTaxExchangeRate(int $varUserSession)
            {
            $varAPIWebToken = (new \App\Models\Database\SchSysConfig\General())->getAPIWebToken_SysEngine($varUserSession);

            $varCurrentDate = (new \App\Models\Database\SchSysConfig\General())->getCurrentDateTimeTZ($varUserSession);
//            $varCurrentDate = substr((new \App\Models\Database\SchSysConfig\General())->getCurrentDateTimeTZ($varUserSession), 0, 10).' 00:00:00';
//            $varCurrentDate = '2017-01-01';
//            $varCurrentDate = '2011-01-01';
//            $varCurrentDate = '2021-01-01';
            $varCurrentDate = '2013-01-02 00:00:00 +07';
 //           echo $varCurrentDate;
 //           echo "\n\n";
            

            $varCurrenDateTimeTZUnixTime = \App\Helpers\ZhtHelper\General\Helper_DateTime::getUnixTime($varUserSession, $varCurrentDate);
            //echo date("Y-m-d H:i:s +07", $varCurrenDateTimeTZUnixTime);
            //echo "\n";

            for($i=0; $i!=(7*52); $i++)
                {
                echo date("Y-m-d H:i:s +07", $varCurrenDateTimeTZUnixTime);
                $varCurrentDate = date("Y-m-d H:i:s +07", $varCurrenDateTimeTZUnixTime);
                echo "\n";
//                echo '
//
//                    ';                

                try
                    {
                    $varData = \App\Helpers\ZhtHelper\System\BackEnd\Helper_APICall::setCallAPIGateway(
                        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                        $varAPIWebToken, 
                        'instruction.server.externalServer.webSiteScraper.fiskal_kemenkeu_go_id.getDataExhangeRate',
                        'latest', 
                        [
                        'entities' => [
                            'date' => substr($varCurrentDate, 0, 10)
                            ]
                        ]
                        );
//                    var_dump($varData);
                    

                    $varKMKNumber = $varData['data']['KMK']['number'];
                    $varValidStartDateTimeTZ = $varData['data']['KMK']['startDateTimeTZ'];
                    $varValidFinishDateTimeTZ = $varData['data']['KMK']['finishDateTimeTZ'];

                    foreach($varData['data']['exchangeRate'] as $varISOCode => $varExchangeRate) {
                        (new \App\Models\Database\SchData_OLTP_Master\TblCurrencyExchangeRateTax())->setDataImport($varUserSession, substr($varCurrentDate, 0, 10), $varISOCode, $varExchangeRate, $varValidStartDateTimeTZ, $varValidFinishDateTimeTZ, $varKMKNumber);
                        }

                    } 
                catch (\Exception $ex) {

                    }




                $varCurrenDateTimeTZUnixTime+=(7*24*60*60);
                }
            
/*            
            try
                {
                $varData = \App\Helpers\ZhtHelper\System\BackEnd\Helper_APICall::setCallAPIGateway(
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                    $varAPIWebToken, 
                    'instruction.server.externalServer.webSiteScraper.fiskal_kemenkeu_go_id.getDataExhangeRate',
                    'latest', 
                    [
                    'entities' => [
                        'date' => $varCurrentDate
                        ]
                    ]
                    );
                
                $varKMKNumber = $varData['data']['KMK']['number'];
                $varValidStartDateTimeTZ = $varData['data']['KMK']['startDateTimeTZ'];
                $varValidFinishDateTimeTZ = $varData['data']['KMK']['finishDateTimeTZ'];
                
                foreach($varData['data']['exchangeRate'] as $varISOCode => $varExchangeRate) {
                    (new \App\Models\Database\SchData_OLTP_Master\TblCurrencyExchangeRateTax())->setDataImport($varUserSession, $varCurrentDate, $varISOCode, $varExchangeRate, $varValidStartDateTimeTZ, $varValidFinishDateTimeTZ, $varKMKNumber);
                    }
                
                } 
            catch (\Exception $ex) {

                }
            

//            (new \App\Models\Database\SchData_OLTP_Master\TblCurrencyExchangeRateTax())->setDataImport($varUserSession, 'USD', $varCurrentDate, $varExchangeRate);
            
            
*/            
            //\App\Helpers\ZhtHelper\General\Helper_DateTime::
            }
            
        private function getAttendance(int $varUserSession)
            {
            $varAPIWebToken = (new \App\Models\Database\SchSysConfig\General())->getAPIWebToken_SysEngine($varUserSession);
            
            $varList = [
                    //---> Finger Print HO Ruang Server
                    [
                    'GoodsIdentity_RefID' => 17000000000003,
                    'Device' => 'ALBox_FP800',
                    'HostIP' => '192.168.1.204',
                    'HostPort' => 4370,
                    'SerialNumber' => '2065682450035',
                    'TimeZoneOffset' => '+07'
                    ],
                    //---> Finger Print PJO Medan
                    [
                    'GoodsIdentity_RefID' => 17000000000005,
                    'Device' => 'ALBox_FP800',
                    'HostIP' => '192.168.10.225',
                    'HostPort' => 4370,
                    'SerialNumber' => '0011142201014',
                    'TimeZoneOffset' => '+07'
                    ],
                    //---> Finger Print HO Lantai 4
                    [
                    'GoodsIdentity_RefID' => 17000000000006,
                    'Device' => 'Solution.x601',
                    'HostIP' => '192.168.1.203',
                    'HostPort' => 4370,
                    'SerialNumber' => 'AEYU202860040',
                    'TimeZoneOffset' => '+07'
                    ],
                    //---> Finger Print HO Lantai 3
                    [
                    'GoodsIdentity_RefID' => 17000000000007,
                    'Device' => 'Solution.x601',
                    'HostIP' => '192.168.1.201',
                    'HostPort' => 4370,
                    'SerialNumber' => 'AEYU202860056',
                    'TimeZoneOffset' => '+07'
                    ]
                ];
            
            for($i=0; $i!=count($varList); $i++)
                {
                switch($varList[$i]['Device'])
                    {
                    case 'ALBox_FP800':
                        {
                        $this->getAttendance_ALBox_FP800(
                            $varUserSession,
                            $varAPIWebToken,
                            $varList[$i]['GoodsIdentity_RefID'],
                            $varList[$i]['HostIP'],
                            $varList[$i]['HostPort'],
                            $varList[$i]['SerialNumber'],
                            $varList[$i]['TimeZoneOffset']
                            );
                        break;
                        }
                    case 'Solution.x601':
                        {
                        $this->getAttendance_Solution_x601(
                            $varUserSession,
                            $varAPIWebToken,
                            $varList[$i]['GoodsIdentity_RefID'],
                            $varList[$i]['HostIP'],
                            $varList[$i]['HostPort'],
                            $varList[$i]['SerialNumber'],
                            $varList[$i]['TimeZoneOffset']
                            );
                        break;
                        }
                    }
                }
            
            }
        
        private function getAttendance_Solution_x601(int $varUserSession, string $varAPIWebToken, int $varGoodsIdentity_RefID, string $varHostIP, int $varHostPort, string $varSerialNumber, string $varTimeZoneOffset)
            {
            try {
                //--->
                if(!($varLastRecordDateTimeTZ = (new \App\Models\Database\SchSysConfig\General())->getDevicePersonAccess_LastRecordDateTimeTZ($varUserSession, $varGoodsIdentity_RefID, '+07')))
                    {
                    $varLastRecordDateTimeTZ = '1970-01-01 00:00:00 +00';
                    }
                
                //--->
                $varData = \App\Helpers\ZhtHelper\System\BackEnd\Helper_APICall::setCallAPIGateway(
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                    $varAPIWebToken, 
                    'instruction.device.fingerprintAttendance.Solution.x601.getDataAttendance', 
                    'latest', 
                    [
                    'entities' => [
                        'IPAddress' => $varHostIP,
                        'port' => $varHostPort, 
                        'serialNumber' => $varSerialNumber,
                        'timeZoneOffset' => $varTimeZoneOffset,
                        'startDateTime' => '2000-01-01'
                        ]
                    ]
                    )['data'];

                //--->
                $varLog_Device_PersonAccessFetch_RefID = (new \App\Models\Database\SchSysConfig\TblLog_Device_PersonAccessFetch())->setDataInsert(
                    $varUserSession, 
                    null, 
                    (new \App\Models\Database\SchSysConfig\General())->getCurrentYear($varUserSession), 
                    11000000000003, 
                    $varGoodsIdentity_RefID, 
                    (new \App\Models\Database\SchSysConfig\General())->getCurrentDateTimeTZ ($varUserSession)
                    )['SignRecordID'];

                //--->
                for($i=0; $i!=count($varData); $i++)
                    {
                    if((\App\Helpers\ZhtHelper\General\Helper_DateTime::getUnixTime($varUserSession, $varLastRecordDateTimeTZ)) < (\App\Helpers\ZhtHelper\General\Helper_DateTime::getUnixTime($varUserSession, $varData[$i]['dateTimeTZ'])))
                        {
                        //echo "\nxxx ".$varData[$i]['dateTimeTZ'];
                        //echo "\n ---> ".\App\Helpers\ZhtHelper\General\Helper_DateTime::getUnixTime($varUserSession, $varLastRecordDateTimeTZ)." ---> ".\App\Helpers\ZhtHelper\General\Helper_DateTime::getUnixTime($varUserSession, $varData[$i]['dateTimeTZ']);
                        (new \App\Models\Database\SchSysConfig\TblLog_Device_PersonAccess())->setDataInsert(
                            $varUserSession, 
                            null, 
                            substr($varData[$i]['dateTimeTZ'], 0, 4), 
                            11000000000003, 
                            $varLog_Device_PersonAccessFetch_RefID, 
                            $varData[$i]['dateTimeTZ'], 
                            $varData[$i]['ID'], 
                            null
                            );                
                        }
                    }
                } 
            catch (\Exception $ex) {
                }
            }

        private function getAttendance_ALBox_FP800(int $varUserSession, string $varAPIWebToken, int $varGoodsIdentity_RefID, string $varHostIP, int $varHostPort, string $varSerialNumber, string $varTimeZoneOffset)
            {
            try {
                if(!($varLastRecordDateTimeTZ = (new \App\Models\Database\SchSysConfig\General())->getDevicePersonAccess_LastRecordDateTimeTZ($varUserSession, $varGoodsIdentity_RefID, '+07')))
                    {
                    $varLastRecordDateTimeTZ = '1970-01-01 00:00:00 +00';
                    }

                $varData = \App\Helpers\ZhtHelper\System\BackEnd\Helper_APICall::setCallAPIGateway(
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                    $varAPIWebToken, 
                    'instruction.device.fingerprintAttendance.ALBox.FP800.getDataAttendance', 
                    'latest', 
                    [
                    'entities' => [
                        'IPAddress' => $varHostIP,
                        'port' => $varHostPort, 
                        'serialNumber' => $varSerialNumber,
                        'timeZoneOffset' => '+07',
                        'startDateTime' => '2000-01-01'
                        ]
                    ]
                    )['data'];

                //--->
                $varLog_Device_PersonAccessFetch_RefID = (new \App\Models\Database\SchSysConfig\TblLog_Device_PersonAccessFetch())->setDataInsert(
                    $varUserSession, 
                    null, 
                    (new \App\Models\Database\SchSysConfig\General())->getCurrentYear($varUserSession), 
                    11000000000003, 
                    $varGoodsIdentity_RefID, 
                    (new \App\Models\Database\SchSysConfig\General())->getCurrentDateTimeTZ ($varUserSession)
                    )['SignRecordID'];

                //--->
                for($i=0; $i!=count($varData); $i++)
                    {
                    if((\App\Helpers\ZhtHelper\General\Helper_DateTime::getUnixTime($varUserSession, $varLastRecordDateTimeTZ)) < (\App\Helpers\ZhtHelper\General\Helper_DateTime::getUnixTime($varUserSession, $varData[$i]['dateTimeTZ'])))
                        {
                        //echo "\nxxx ".$varData[$i]['dateTimeTZ'];
                        //echo "\n ---> ".\App\Helpers\ZhtHelper\General\Helper_DateTime::getUnixTime($varUserSession, $varLastRecordDateTimeTZ)." ---> ".\App\Helpers\ZhtHelper\General\Helper_DateTime::getUnixTime($varUserSession, $varData[$i]['dateTimeTZ']);
                        (new \App\Models\Database\SchSysConfig\TblLog_Device_PersonAccess())->setDataInsert(
                            $varUserSession, 
                            null, 
                            substr($varData[$i]['dateTimeTZ'], 0, 4), 
                            11000000000003, 
                            $varLog_Device_PersonAccessFetch_RefID, 
                            $varData[$i]['dateTimeTZ'], 
                            $varData[$i]['ID'], 
                            null
                            );                
                        }
                    }
                } 
            catch (\Exception $ex) {
                }
            }
        }
    }