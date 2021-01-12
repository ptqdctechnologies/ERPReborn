<?php

namespace SDK\Solution\FingerprintAttendance\x601
    {
    class SDK //extends AbstractHasDispatcher implements ClientInterface
        {
        private $varUserSession;
        private $varHostIP;
        private $varHostPort;
        private $varDeviceSerialNumber;
        private $varSDKPath;
                
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-01-12                                                                                           |
        | ▪ Description     : System's Default Constructor                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varHostIP ► Host IP                                                                                      |
        |      ▪ (int)    varHostPort ► Host Port                                                                                  |
        |      ▪ (string) varDeviceSerialNumber ► Device Serial Number                                                             |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function __construct($varUserSession, string $varHostIP, int $varHostPort, string $varDeviceSerialNumber)
            {
            $this->varUserSession = $varUserSession;
            $this->varSDKPath = getcwd().'/../vendor/SDK/Solution/FingerprintAttendance/x601';
            $this->varHostIP = $varHostIP;
            $this->varHostPort = $varHostPort;
            $this->varDeviceSerialNumber = $varDeviceSerialNumber;
            //echo "init";
            }

        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getAllData                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-01-12                                                                                           |
        | ▪ Description     : Mendapatkan Seluruh Data                                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varTimeZoneOffset ► Time Zone Offset                                                                     |
        |      ▪ (string) varStartDateTime ► Start Date Time                                                                       |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getAllData(string $varTimeZoneOffset = null, $varStartDateTime = null)
            {
            $varReturn = null;
            try {
                if(!$varTimeZoneOffset) {
                    $varTimeZoneOffset = '+07';
                    }
                if(!$varStartDateTime) {
                    $varStartDateTime = '1970-01-01 00:00:00';
                    }

                $Connect = fsockopen($this->varHostIP, "80", $errno, $errstr, 1);
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
                            $varDataPIN = (Parse_Data($varData,"<PIN>","</PIN>"))*1;
                            $varDataDateTime = Parse_Data($varData,"<DateTime>","</DateTime>");
                            $varDataVerified = (Parse_Data($varData,"<Verified>","</Verified>"))*1;
                            $varDataStatus = (Parse_Data($varData,"<Status>","</Status>"))*1;
                            if(!empty($varDataPIN))
                                {
                                if(strtotime($varStartDateTime) <= strtotime($varDataDateTime))
                                    {                                    
                                    //echo $varDataPIN.'-->'.$varDataDateTime.'-->'.$varDataVerified.'-->'.$varDataStatus;
                                    //echo "<br>----------------<br>";
                                    $varReturn[$j]=[
                                        'ID' =>  $varDataPIN,
                                        'dateTimeTZ' => $varDataDateTime.'.000000 '.$varTimeZoneOffset,
                                        'signVerified' => $varDataVerified,
                                        'signStatus' => $varDataStatus
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
                throw new \Exception("Connection Timeout");
                }
            return $varReturn;
            }
        }
    }