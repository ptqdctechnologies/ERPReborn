<?php

namespace zhtSDK\Device\ALBox\FingerprintAttendance\FP800
    {
    class zhtSDK //extends AbstractHasDispatcher implements ClientInterface
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Class Attributes                                                                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        private $varSDKPath;
        private $varUserSession;
        private $varHostIP;
        private $varHostPort;
        private $varTimeOutInSeconds;
        private $ObjLib;
        private $varDeviceSerialNumber;
                
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2021-08-20                                                                                           |
        | ▪ Description     : System's Default Constructor                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varHostIP ► Host IP                                                                                      |
        |      ▪ (int)    varHostPort ► Host Port                                                                                  |
        |      ▪ (string) varDeviceSerialNumber ► Device Serial Number                                                             |
        |      ▪ (int)    varTimeOutInSeconds ► TimeOut In Seconds                                                                 |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function __construct($varUserSession, string $varHostIP, int $varHostPort, string $varDeviceSerialNumber, int $varTimeOutInSeconds = null)
            {
            $this->init(
                $varUserSession,
                $varHostIP,
                $varHostPort,
                $varDeviceSerialNumber,
                $varTimeOutInSeconds
                );
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : init                                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2021-08-20                                                                                           |
        | ▪ Description     : System's Init                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varHostIP ► Host IP                                                                                      |
        |      ▪ (int)    varHostPort ► Host Port                                                                                  |
        |      ▪ (string) varDeviceSerialNumber ► Device Serial Number                                                             |
        |      ▪ (int)    varTimeOutInSeconds ► TimeOut In Seconds                                                                 |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        private function init($varUserSession, string $varHostIP, int $varHostPort, string $varDeviceSerialNumber, int $varTimeOutInSeconds = null)
            {
            if (!$varTimeOutInSeconds) {
                $varTimeOutInSeconds=3;
                }
            $this->varUserSession = $varUserSession;
            $this->varSDKPath = getcwd().'/../vendor/zhtSDK/Device/ALBox/FingerprintAttendance/FP800';
            $this->varHostIP = $varHostIP;
            $this->varHostPort = $varHostPort;
            $this->varDeviceSerialNumber = $varDeviceSerialNumber;
            $this->varTimeOutInSeconds = $varTimeOutInSeconds;
            
            \App\Helpers\ZhtHelper\General\Helper_SystemParameter::setTimeOut_ExecutionTime($varUserSession, 300);

            require_once($this->varSDKPath.'/Compatible/GitHub_am05mhz_am05zk/am05zk.php');
            $this->ObjLib = new \am05zk($this->varHostIP, $this->varHostPort);
            }

            
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataAttendance                                                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2021-08-20                                                                                           |
        | ▪ Description     : Mendapatkan Seluruh Data                                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varTimeZoneOffset ► Time Zone Offset                                                                     |
        |      ▪ (string) varCutOffStartDateTime ► CutOff Start Date Time                                                          |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataAttendance(string $varTimeZoneOffset = null, $varCutOffStartDateTime = null)
            {
            $varReturn = null;
            try {
                if(!$varTimeZoneOffset) {
                    $varTimeZoneOffset = '+07';
                    }
                if(!$varCutOffStartDateTime) {
                    $varCutOffStartDateTime = '1970-01-01 00:00:00';
                    }

                $Connect = @fsockopen($this->varHostIP, $this->varHostPort, $errno, $errstr, $this->varTimeOutInSeconds);
                //$Key="0";
                if($errno == 110) 
                    {
                    throw new \Exception("Connection Failed");
                    }
                else
                    {
                    if($this->ObjLib->connect())
                        {
                        $varAttendaceRecord = $this->ObjLib->get_attendance(true);
                        $j=0;
                        for($i=0; $i!=count($varAttendaceRecord); $i++)
                            {
                            if(!empty($varAttendaceRecord[$i]['time']))
                                {
                                if(strtotime($varCutOffStartDateTime) <= strtotime($varAttendaceRecord[$i]['time']))
                                //echo strtotime($varCutOffStartDateTime)." ---> ".strtotime($varAttendaceRecord[$i]['time'])."<br>";
                                    {
                                    $varReturn[$j] = [
                                        'ID' =>  (int) $varAttendaceRecord[$i]['uid'],
                                        'userName' =>  (int) $varAttendaceRecord[$i]['user'],
                                        'dateTimeTZ' => $varAttendaceRecord[$i]['time'].'.000000 '.$varTimeZoneOffset,
                                        'status' => (int) $varAttendaceRecord[$i]['status']
                                        ];
                                    $j++;
                                    }
                                }
                            }
                        }
                    }
                } 
            catch (\Exception $ex) {
                throw new \Exception("Connection Timeout in ".$varTimeOutInSeconds." seconds");
                }
            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDeviceSerialNumber                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-01-13                                                                                           |
        | ▪ Description     : Mendapatkan Nomor Seri Alat                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDeviceSerialNumber()
            {
            $varReturn = null;
            try {
                $Connect = @fsockopen($this->varHostIP, $this->varHostPort, $errno, $errstr, $this->varTimeOutInSeconds);
                if($errno == 110) 
                    {
                    throw new \Exception("Connection Failed");
                    }
                else
                    {
                    if($this->ObjLib->connect())
                        {
                        $varReturn = str_replace('~SerialNumber=', '', $this->ObjLib->get_serial_number());
                        $varReturn = preg_replace('/[\x00-\x1F\x7F]/', '', $varReturn);
                        }
                    }                
                } 
            catch (\Exception $ex) {
                }
            return $varReturn;
            }
        }
    }