<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Helpers                                                                                                   |
| ▪ Name Space : \App\Helpers\ZhtHelper\System                                                                                     |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2020 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Helpers\ZhtHelper\System
    {
    //use Illuminate\Http\Request;
    use Illuminate\Http\Response;
    
    class Helper_HTTPRequest
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getRequest                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-07-27                                                                                           |
        | ▪ Description     : Mendapatkan Request HTTP dari Requester (digunakan oleh backend untuk diolah sebelum dikirim kembali |
        |                     ke client/frontend)                                                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varUserSession ► User Session                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getRequest($varUserSession)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Get HTTP Request');
                try {
                    $varDataReceive = request()->json()->all();
                    $varReturn = $varDataReceive;
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Success');
                    }
                catch (\Exception $ex) {
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Failed, '. $ex->getMessage());
                    }
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
                } 
            catch (\Exception $ex) {
                }
            return \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);            
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getResponse                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2020-07-26                                                                                           |
        | ▪ Description     : Mendapatkan Response HTTP dari API (digunakan oleh client/frontend untuk dikirim ke backend)         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varUserSession ► User Session                                                                            |
        |      ▪ (string) varURL ► Alamat host yang dituju                                                                         |
        |      ▪ (string) varMethod ► Metode HTTP Request                                                                          |
        |      ▪ (int)    varPort ► Port HTTP Request                                                                              |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getResponse($varUserSession, $varURL, $varMethod, $varData=null, int $varPort=null, int $varTTL=null)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Get HTTP Response');
                try {
                    //---> Cek apakah port tujuan terbuka
                    if (\App\Helpers\ZhtHelper\General\Helper_Network::isPortOpen($varUserSession, $varURL, $varPort)==false)
                        {
                        throw new \Exception('Port is closed');
                        }
                    //---> Pengecekan data
                    if(!$varData)
                        {
                        $varData=[];                 
                        }
                    if(!is_array($varData))
                        {
                        throw new Exception('Data must be an array');
                        }
                    //---> Pengecekan TTL
                    if(!$varTTL)
                        {
                        $varTTL = 300;
                        }
                    ini_set('max_execution_time', $varTTL);
                    //---> Main process
                    $varReturn = self::setRequest($varUserSession, $varURL, $varMethod, $varData);
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Success');
                    } 
                catch (\Exception $ex) {
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Failed, '. $ex->getMessage());
                    }               
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
                } 
            catch (\Exception $ex) {
                }
            return \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setRequest                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2020-07-26                                                                                           |
        | ▪ Description     : Mengeset Request HTTP                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varUserSession ► User Session                                                                            |
        |      ▪ (string) varURL ► Alamat host yang dituju                                                                         |
        |      ▪ (string) varMethod ► Metode HTTP Request                                                                          |
        |      ▪ (int)    varPort ► Port HTTP Request                                                                              |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        private static function setRequest($varUserSession, $varURL, $varMethod, $varData=null, $varPort=null)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Send HTTP Request');
                try {
                    $ObjClient = new \GuzzleHttp\Client();
                    $varResponse = $ObjClient->request(
                        $varMethod,
                        $varURL,
                        [
                        'verify' => false,
                        'headers' => [
                                'Content-Type' => 'application/json',
                                ],
                        'auth' => [
                                'userHTTP', 
                                'PassHTTP',
                                'digest'
                                ],
                        'body' =>  json_encode($varData, true)
                        ]
                        );
                    $varResponseContents = $varResponse->getBody()->getContents();
                    //var_dump($varResponseContents);
                    $varReturn = $varResponseContents;
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Success');
                    } 
                catch (\Exception $ex) {
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Failed, '. $ex->getMessage());
                    }
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
                } 
            catch (\Exception $ex) {
                }
            return \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setResponse                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-07-27                                                                                           |
        | ▪ Description     : Mengeset Response HTTP untuk Requester (digunakan oleh backend untuk dikirim ke client/frontend)     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varUserSession ► User Session                                                                            |
        |      ▪ (array)  varDataSend ► Data yang akan dikirim kan                                                                 |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function setResponse($varUserSession, $varDataSend)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, (response()->json([])), __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Set HTTP Response');
                try {
                    $varReturn = response()->json($varDataSend);
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Success');
                    }          
                catch (\Exception $ex) {
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Failed, '. $ex->getMessage());
                    }
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
                } 
            catch (\Exception $ex) {
                }
            return \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }


        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        public static function getEncryptedURLParameter(array $varDataArray)
            {
            //echo "<br>".$_SERVER['REQUEST_TIME']."<br>";
            echo \App\Helpers\ZhtHelper\System\Helper_Environment::getApplicationDateTimeTZ();
            //echo "<br>".$_SERVER['REQUEST_TIME']."<br>";
            }

            
        public static function getURLDecapsulation($varUserSession, $varEncapsulatedData)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogIndentationIncrease($varUserSession);
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutput($varUserSession, __CLASS__, '('.__FUNCTION__.') Get URL decapsulation');
                try {
                    $varData = 
                        \App\Helpers\ZhtHelper\General\Helper_Compression::getZLibDecompress(
                            $varUserSession, 
                            \App\Helpers\ZhtHelper\General\Helper_Encode::getBase64DecodeWithoutSlashCharacter(
                                $varUserSession, 
                                $varEncapsulatedData
                                )
                            )
                            ;
                    var_dump($varData);
                    $varDataArrayTemp = explode('/', $varData);
                    echo "<br>xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx<br>";
                    var_dump($varDataArrayTemp);
                    $varStoredHash = $varDataArrayTemp[0];
                    array_shift($varDataArrayTemp);

                    echo "<br>xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx<br>";
                    var_dump($varDataArrayTemp);
                    $varData = implode('/', $varDataArrayTemp);

                    echo "<br>xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx<br>";
                    $varCheckedHash = self::getURLEncapsulationShadow($varUserSession, $varData);

                    if(strcmp($varStoredHash, $varCheckedHash)==0)
                        {
                        echo "HASHING SUKSES";
                        }
                    else {
                        throw new \Exception('Invalid shadow');
                        }

                    $varReturn = $varData;
                    } 
                catch (\Exception $ex) {
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLastLogOuputAppend($varUserSession, 'Failed, '.$ex->getMessage());
                    }
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
                } 
            catch (\Exception $ex) {
                }
            return \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }


        public static function getURLEncapsulation($varUserSession, $varData, $varTTLInSeconds=null)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                try {
                    if(!$varTTLInSeconds)
                        {
                        $varTTLInSeconds = 10;
                        }
                    $varSeeder=\App\Helpers\ZhtHelper\General\Helper_Encode::getBase64EncodeWithoutSlashCharacter(000000, random_bytes(6));
                    echo "<br>".$varSeeder;
                    $varExpiredTime = (\App\Helpers\ZhtHelper\General\Helper_DateTime::getUnixTime()+$varTTLInSeconds);
                    $varData = $varSeeder.'/'.$varExpiredTime.'/'.$varData;
                    $varData = self::getURLEncapsulationShadow($varUserSession, $varData).'/'.$varData;
                    echo "<br><br>".$varData;

                    $varCipherMode = 'AES-128-CTR';
                    $varEncryptionKey = 'Kunci Enkripsiku'; 
                    $varOptions = 0; 
                    $varInitialVector = '1234567891011121';
                    $varReturn =
                        \App\Helpers\ZhtHelper\General\Helper_Encode::getBase64EncodeWithoutSlashCharacter(
                            $varUserSession,    
                            \App\Helpers\ZhtHelper\General\Helper_Compression::getZLibCompress(
                                $varUserSession, 
                                $varData
                                )
                            );
                    echo "<br> Normal : ".strlen($varData);
                    echo "<br> Full Encap : ".strlen($varReturn);
                    } 
                catch (\Exception $ex) {
                    }
                } 
            catch (\Exception $ex) {
                }
            return \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }
            
        private static function getURLEncapsulationShadow($varUserSession, $varData, $varDataSeparator=null)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                try {
                    if(!$varDataSeparator)
                        {
                        $varDataSeparator='[DataSeparator]';
                        }
                    $varDataArrayTemp = explode('/', $varData);
                    $varHashData='';
                    for($i=0; $i!=count($varDataArrayTemp); $i++)
                        {
                        if($i!=0)
                            {
                            $varHashData.=$varDataSeparator;
                            }
                        $varHashData.=$varDataArrayTemp[$i];
                        $varHashData=\App\Helpers\ZhtHelper\General\Helper_Hash::getMD5(00000, $varHashData);
                        //echo '<br>'.$varHashData;
                        }
                    $varReturn = $varHashData;                    
                    } 
                catch (\Exception $ex) {
                    }
                } 
            catch (\Exception $ex) {
                }
            return \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }
        }
    }