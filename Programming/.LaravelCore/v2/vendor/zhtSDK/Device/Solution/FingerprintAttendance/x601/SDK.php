<?php

namespace zhtSDK\Device\Solution\FingerprintAttendance\x601
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
        private $varDeviceSerialNumber;

                
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000002                                                                                       |
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
            $this->init($varUserSession, $varHostIP, $varHostPort, $varDeviceSerialNumber, $varTimeOutInSeconds);
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
        private function init($varUserSession, string $varHostIP, int $varHostPort, string $varDeviceSerialNumber, int $varTimeOutInSeconds)
            {
            if(!$varTimeOutInSeconds) {
                $varTimeOutInSeconds=3;
                }
            $this->varUserSession = $varUserSession;
            $this->varSDKPath = getcwd().'/../vendor/zhtSDK/Device/Solution/FingerprintAttendance/x601';
            $this->varHostIP = $varHostIP;
            $this->varHostPort = $varHostPort;
            $this->varDeviceSerialNumber = $varDeviceSerialNumber;
            $this->varTimeOutInSeconds = $varTimeOutInSeconds;

            \App\Helpers\ZhtHelper\General\Helper_SystemParameter::setTimeOut_ExecutionTime($varUserSession, 300);
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


//                $Connect = fsockopen($this->varHostIP, "80", $errno, $errstr, 10);
                $Connect = fsockopen($this->varHostIP, "80", $errno, $errstr, $this->varTimeOutInSeconds);
                $Key="0";
                if($Connect) {
                    $varSOAPRequest=
                        "<GetAttLog>".
                            "<ArgComKey xsi:type=\"xsd:integer\">".
                                $Key.
                            "</ArgComKey>".
                            "<Arg>".
                                "<PIN xsi:type=\"xsd:integer\">".
                                    "All".
                                "</PIN>".
                            "</Arg>".
                        "</GetAttLog>";
                    $varNewLine="\r\n";
                    fputs($Connect, "POST /iWsService HTTP/1.0".$varNewLine);
                    fputs($Connect, "Content-Type: text/xml".$varNewLine);
                    fputs($Connect, "Content-Length: ".strlen($varSOAPRequest).$varNewLine.$varNewLine);
                    fputs($Connect, $varSOAPRequest.$varNewLine);
                    $varDataBuffer = "";
                    while($Response = fgets($Connect, 1024)) {
                        $varDataBuffer = $varDataBuffer.$Response;
                        }
                    if(strcmp($varDataBuffer, "")!=0)
                        {
                        require_once($this->varSDKPath.'/Original/parse.php');
                        $varDataBuffer = Parse_Data($varDataBuffer,"<GetAttLogResponse>","</GetAttLogResponse>");
                        $varDataBuffer = explode("\r\n",$varDataBuffer);
                        $j=0;
                        for($i=0; $i<count($varDataBuffer); $i++) {
                            $varData = Parse_Data($varDataBuffer[$i],"<Row>","</Row>");
                            $varDataPIN = Parse_Data($varData,"<PIN>","</PIN>");
                            $varDataDateTime = Parse_Data($varData,"<DateTime>","</DateTime>");
                            $varDataVerified = Parse_Data($varData,"<Verified>","</Verified>");
                            $varDataStatus = Parse_Data($varData,"<Status>","</Status>");
                            if(!empty($varDataPIN))
                                {
                                if(strtotime($varCutOffStartDateTime) <= strtotime($varDataDateTime))
                                    {                                    
                                    //echo $varDataPIN.'-->'.$varDataDateTime.'-->'.$varDataVerified.'-->'.$varDataStatus;
                                    //echo "<br>----------------<br>";
                                    $varReturn[$j]=[
                                        'ID' =>  (int) $varDataPIN,
                                        'dateTimeTZ' => $varDataDateTime.'.000000 '.$varTimeZoneOffset,
                                        'signVerified' => (int) $varDataVerified,
                                        'signStatus' => (int) $varDataStatus
                                        ];
                                    $j++;
                                    }
                                }
                            }
                        }
                    }
                else
                    {
                    throw new \Exception("Connection Failed");
                    }
                } 
            catch (\Exception $ex) {
                throw new \Exception("Connection Timeout in ".$varTimeOutInSeconds." seconds");
                }
            return $varReturn;
            }
        }
    }