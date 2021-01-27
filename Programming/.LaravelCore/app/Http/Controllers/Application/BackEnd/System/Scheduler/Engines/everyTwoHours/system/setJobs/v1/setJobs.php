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
            $this->getAttendance($varUserSession);
            }

        private function getAttendance(int $varUserSession)
            {
            $varList = [/*
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
                    ],*/
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
            
            $varAPIWebToken = (new \App\Models\Database\SchSysConfig\General())->getAPIWebToken_SysEngine($varUserSession);
            
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
                        'startDateTime' => '2021-01-01'
                        ]
                    ]
                    );
                var_dump($varData);
                //var_dump(json_encode($varData));

//$x = (new \App\Models\Database\SchSysConfig\General())->getCurrentYear($varUserSession);
//$x = (new \App\Models\Database\SchSysConfig\General())->getCurrentDateTimeTZ ($varUserSession);
//dd();


/*                
                $varLog_Device_PersonAccessFetch_RefID = (new \App\Models\Database\SchSysConfig\TblLog_Device_PersonAccessFetch())->setDataInsert(
                    $varUserSession, 
                    null, 
                    (new \App\Models\Database\SchSysConfig\General())->getCurrentYear($varUserSession), 
                    11000000000003, 
                    $varGoodsIdentity_RefID, 
                    //'NOW()'
                    (new \App\Models\Database\SchSysConfig\General())->getCurrentDateTimeTZ ($varUserSession)
                    )['SignRecordID'];
                var_dump($varLog_Device_PersonAccessFetch_RefID);
*/

                

                
                } 
            catch (\Exception $ex) {
                }
            }

        private function getAttendance_ALBox_FP800(int $varUserSession, string $varAPIWebToken, int $varGoodsIdentity_RefID, string $varHostIP, int $varHostPort, string $varSerialNumber, string $varTimeZoneOffset)
            {
            try {
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
                        'startDateTime' => '2021-01-01'
                        ]
                    ]
                    );
                var_dump($varData);                
                } 
            catch (\Exception $ex) {
                }
            }
        }
    }