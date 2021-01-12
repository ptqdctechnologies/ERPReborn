<?php

namespace SDK\AlBox\FingerprintAttendance\FP800
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
            $this->varSDKPath = getcwd().'/../vendor/SDK/AlBox/FingerprintAttendance/FP800';
            $this->varHostIP = $varHostIP;
            $this->varHostPort = $varHostPort;
            $this->varDeviceSerialNumber = $varDeviceSerialNumber;
            //echo "init";
            }

        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataAttendance                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-01-12                                                                                           |
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
            $varTimeOutInSeconds=3;
            $varReturn = null;
            try {
                if(!$varTimeZoneOffset) {
                    $varTimeZoneOffset = '+07';
                    }
                if(!$varCutOffStartDateTime) {
                    $varCutOffStartDateTime = '1970-01-01 00:00:00';
                    }

//                $Connect = fsockopen($this->varHostIP, "80", $errno, $errstr, $varTimeOutInSeconds);
                $Connect = @fsockopen($this->varHostIP, $this->varHostPort, $errno, $errstr, $varTimeOutInSeconds);
                //$Key="0";
                //if($Connect) 
                if($errno == 110) 
                    {
                    throw new \Exception("Connection Failed");
                    }
                else
                    {
                    require_once($this->varSDKPath.'/Original/am05zk.php');
                    $ObjFP = new \am05zk($this->varHostIP, $this->varHostPort);
                    if($ObjFP->connect())
                        {
                        $SN = $ObjFP->get_serial_number();
                        $varAttendaceRecord = $ObjFP->get_attendance(true);
                        var_dump($varAttendaceRecord);
                        }
                    
                    echo "OK";
/*                    $varSOAPRequest=
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
                        }*/
                    }
//                else
  //                  {
    //                throw new \Exception("Connection Failed");
      //              }
                } 
            catch (\Exception $ex) {
                throw new \Exception("Connection Timeout");
                }
            return $varReturn;
            }
        }
    }