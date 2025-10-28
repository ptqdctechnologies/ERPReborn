<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : API Engine Controller                                                                                             |
| ▪ Name Space : \App\Http\Controllers\Application\BackEnd\System\DataWarehouse\Engines\synchronize\acquisition                    |
|                \setLog_Device_PersonAccess\v1                                                                                    |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2021 - 2025 Zheta (teguhpjs@gmail.com)                                                                              |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\BackEnd\System\DataWarehouse\Engines\synchronize\acquisition\setLog_Device_PersonAccess\v1
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : setLog_Device_PersonAccess                                                                                   |
    | ▪ Description : Menangani API dataWarehouse.synchronize.acquisition.setLog_Device_PersonAccess Version 1                     |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class setLog_Device_PersonAccess extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-05-03                                                                                           |
        | ▪ Creation Date   : 2021-05-03                                                                                           |
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
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : main                                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-05-03                                                                                           |
        | ▪ Creation Date   : 2021-05-03                                                                                           |
        | ▪ Description     : Fungsi Utama Engine                                                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (array)  varData ► Data                                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        function main($varUserSession, $varData)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Synchronize Log_Device_PersonAccess Data (version 1)');
                try {
                    //-----[ MAIN CODE ]----------------------------------------------------------------------------( START POINT )-----
                    try {
                        if (!$this->setAttendanceDeviceLog($varUserSession))
                            {
                            throw new \Exception();
                            }
                        else
                            {
                            $varDataSend = [
                                "message" => "Data Synchronization Successful"
                                ];
                            }

                        $varReturn =
                            \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Success(
                                $varUserSession,
                                $varDataSend
                                );
                        }

                    catch (\Exception $ex) {
                        $varErrorMessage = $ex->getMessage();
                        $varReturn = 
                            \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Fail(
                                $varUserSession,
                                500,
                                'Synchronization Process Failed'.($varErrorMessage ? ' ('.$varErrorMessage.')' : '')
                                );
                        }
                    //-----[ MAIN CODE ]------------------------------------------------------------------------------( END POINT )-----
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Success');
                    }

                catch (\Exception $ex) {
                    $varReturn =
                        \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Fail(
                            $varUserSession,
                            401,
                            $ex->getMessage()
                            );

                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Failed, '. $ex->getMessage());
                    }
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
                }

            catch (\Exception $ex) {
                }

            return
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setAttendanceDeviceLog                                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-05-03                                                                                           |
        | ▪ Creation Date   : 2021-05-03                                                                                           |
        | ▪ Description     : Mengeset Tax Exchange Rate                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (array)  varData ► Data                                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        private function setAttendanceDeviceLog(int $varUserSession)
            {
            $varReturn = true;

            try {
                $varAPIWebToken = (new \App\Models\Database\SchSysConfig\General())->getAPIWebToken_SysEngine($varUserSession);
                
                $varList =
                    [
                        //---> Finger Print : HO Ruang Server
                        [
                        'GoodsIdentity_RefID' => 17000000000003,
                        'Device' => 'ALBox_FP800',
                        'HostIP' => '192.168.1.204',
                        'HostPort' => 4370,
                        'SerialNumber' => '2065682450035',
                        'TimeZoneOffset' => '+07'
                        ],
                        //---> Finger Print : PJO Medan
                        /*
                        [
                        'GoodsIdentity_RefID' => 17000000000005,
                        'Device' => 'ALBox_FP800',
                        'HostIP' => '192.168.10.225',
                        'HostPort' => 4370,
                        'SerialNumber' => '0011142201014',
                        'TimeZoneOffset' => '+07'
                        ],
                        */
                        //---> Finger Print : HO Lantai 4
                        [
                        'GoodsIdentity_RefID' => 17000000000006,
                        'Device' => 'Solution.x601',
                        'HostIP' => '192.168.0.14',
                        //'HostIP' => '192.168.1.203',
                        'HostPort' => 4370,
                        'SerialNumber' => 'AEYU202860040',
                        'TimeZoneOffset' => '+07'
                        ],
                        //---> Finger Print : HO Lantai 3
                        [
                        'GoodsIdentity_RefID' => 17000000000007,
                        'Device' => 'Solution.x601',
                        'HostIP' => '192.168.0.13',
                        //'HostIP' => '192.168.1.201',
                        'HostPort' => 4370,
                        'SerialNumber' => 'AEYU202860056',
                        'TimeZoneOffset' => '+07'
                        ],
                        //---> Finger Print : Gudang Tiga Raksa
                        [
                        'GoodsIdentity_RefID' => 17000000000009,
                        'Device' => 'Solution.x601',
                        'HostIP' => '192.168.20.5',
                        'HostPort' => 4370,
                        'SerialNumber' => 'AEYU221060096',
                        'TimeZoneOffset' => '+07'
                        ],
/*
                        //---> Swing Barrier Gate : HO Lantai 1
                        [
                        'GoodsIdentity_RefID' => 17000000000008,
                        'Device' => 'Goodwin.ServoSW01',
                        'HostIP' => NULL,
                        'HostPort' => NULL,
                        'SerialNumber' => NULL,
                        'TimeZoneOffset' => '+07'
                        ]*/
                    ];

                for ($i=0; $i!=count($varList); $i++)
                    {
                    switch ($varList[$i]['Device'])
                        {
                        case 'ALBox_FP800':
                            {
                            $this->getAttendanceDeviceLog_ALBox_FP800(
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
                            $this->getAttendanceDeviceLog_Solution_x601(
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
                        case 'Goodwin.ServoSW01':
                            {
                            $this->getAttendanceDeviceLog_Goodwin_ServoSW01(
                                $varUserSession,
                                $varAPIWebToken,
                                $varList[$i]['GoodsIdentity_RefID'],
                                $varList[$i]['TimeZoneOffset']
                                );
                            break;
                            }
                        default:
                            {
                            break;
                            }
                        }
                    }
                }

            catch (\Exception $ex) {
                $varReturn = false;                
                }

            return
                $varReturn;
            }


        private function getAttendanceDeviceLog_Goodwin_ServoSW01(int $varUserSession, string $varAPIWebToken, int $varGoodsIdentity_RefID, string $varTimeZoneOffset)
            {
            try {
                //--->
                if (!($varLastRecordDateTimeTZ = (new \App\Models\Database\SchData_Warehouse_Acquisition\General())->getDevicePersonAccess_LastRecordDateTimeTZ($varUserSession, $varGoodsIdentity_RefID, '+07')))
                    {
                    $varLastRecordDateTimeTZ = '1970-01-01 00:00:00 +00';
                    }

                //--->
                $varData = 
                    \App\Helpers\ZhtHelper\System\BackEnd\Helper_APICall::setCallAPIGateway(
                        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                        $varAPIWebToken, 
                        'instruction.device.swingBarrierGate.Goodwin.ServoSW01.getDataAttendance', 
                        'latest', 
                        [
                        'entities' => [
                            'timeZoneOffset' => $varTimeZoneOffset,
                            'startDateTime' => '2000-01-01'
                            ]
                        ]
                        )['data'];

                //--->
                $varLog_Device_PersonAccessFetch_RefID = 
                    (new \App\Models\Database\SchData_Warehouse_Acquisition\TblLog_Device_PersonAccessFetch())->setDataInsert(
                        $varUserSession, 
                        null, 
                        (new \App\Models\Database\SchSysConfig\General())->getCurrentYear($varUserSession), 
                        11000000000003,
                        //null,

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
                        (new \App\Models\Database\SchData_Warehouse_Acquisition\TblLog_Device_PersonAccess())->setDataInsert(
                            $varUserSession, 
                            null, 
                            substr($varData[$i]['dateTimeTZ'], 0, 4), 
                            11000000000003,
                            //null,

                            $varLog_Device_PersonAccessFetch_RefID, 
                            $varData[$i]['dateTimeTZ'], 
                            $varData[$i]['ID'], 
                            null
                            );
                        }
                    }
                } 
            catch (Exception $ex) {
                }
            }


        private function getAttendanceDeviceLog_Solution_x601(int $varUserSession, string $varAPIWebToken, int $varGoodsIdentity_RefID, string $varHostIP, int $varHostPort, string $varSerialNumber, string $varTimeZoneOffset)
            {
            try {
                //--->
//                if(!($varLastRecordDateTimeTZ = (new \App\Models\Database\SchData_OLTP_DataAcquisition\General())->getDevicePersonAccess_LastRecordDateTimeTZ($varUserSession, $varGoodsIdentity_RefID, '+07')))
//                    {
//                    $varLastRecordDateTimeTZ = '1970-01-01 00:00:00 +00';
//                    }

                //---> Reinitializing $varTimeZoneOffset
                if (!$varTimeZoneOffset) {
                    $varTimeZoneOffset = '+07';
                    }

                //---> Get Device Data
                $varData = 
                    \App\Helpers\ZhtHelper\System\BackEnd\Helper_APICall::setCallAPIGateway(
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
                        ],
                        FALSE
                        );
                
                if ($varData['metadata']['HTTPStatusCode'] == 200) {
                    //---> Set Data Synchronization
                    (new \App\Models\Database\SchData_Warehouse_Acquisition\TblLog_Device_PersonAccess())->setDataSynchronize(
                        $varUserSession, 
                        $varGoodsIdentity_RefID, 
                        json_encode($varData['data'])
                        );
                    }
                } 
            catch (\Exception $ex) {
                }
            }


        private function getAttendanceDeviceLog_ALBox_FP800(int $varUserSession, string $varAPIWebToken, int $varGoodsIdentity_RefID, string $varHostIP, int $varHostPort, string $varSerialNumber, string $varTimeZoneOffset)
            {
            try {
//                if(!($varLastRecordDateTimeTZ = (new \App\Models\Database\SchData_OLTP_DataAcquisition\General())->getDevicePersonAccess_LastRecordDateTimeTZ($varUserSession, $varGoodsIdentity_RefID, '+07')))
//                    {
//                    $varLastRecordDateTimeTZ = '1970-01-01 00:00:00 +00';
//                    }

                //---> Reinitializing $varTimeZoneOffset
                if (!$varTimeZoneOffset) {
                    $varTimeZoneOffset = '+07';
                    }

                //---> Get Device Data
                $varData =
                    \App\Helpers\ZhtHelper\System\BackEnd\Helper_APICall::setCallAPIGateway(
                        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                        $varAPIWebToken, 
                        'instruction.device.fingerprintAttendance.ALBox.FP800.getDataAttendance', 
                        'latest', 
                        [
                        'entities' => [
                            'IPAddress' => $varHostIP,
                            'port' => $varHostPort, 
                            'serialNumber' => $varSerialNumber,
                            'timeZoneOffset' => $varTimeZoneOffset,
                            'startDateTime' => '2000-01-01'
                            ]
                        ],
                        FALSE
                        );

                //---> Set Data Synchronization
                if ($varData['metadata']['HTTPStatusCode'] == 200) {
                    //---> Get Data Synchronization
                    (new \App\Models\Database\SchData_Warehouse_Acquisition\TblLog_Device_PersonAccess())->setDataSynchronize(
                        $varUserSession, 
                        $varGoodsIdentity_RefID, 
                        json_encode($varData['data'])
                        );                    
                    }
                } 
            catch (\Exception $ex) {
                }
            }
        }
    }

?>