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
    //use Illuminate\Http\Response;
    
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : Helper_HTTPResponse                                                                                          |
    | ▪ Description : Menangani segala hal yang terkait HTTP Response dari Aplikasi                                                |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class Helper_HTTPResponse
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getResponse                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000003                                                                                       |
        | ▪ Last Update     : 2020-08-03                                                                                           |
        | ▪ Description     : Mendapatkan Response HTTP dari API (digunakan oleh client/frontend untuk dikirim ke backend)         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varUserSession ► User Session                                                                            |
        |      ▪ (string) varURL ► Alamat host yang dituju                                                                         |
        |      ▪ (string) varData ► Data yang akan dikirimkan                                                                      |
        |      ▪ (string) varMethod ► Metode HTTP Request                                                                          |
        |      ▪ (int)    varPort ► Port HTTP Request                                                                              |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getResponse($varUserSession, $varURL, $varData=null, $varMethod=null, int $varPort=null, int $varTTL=null, array $varHeaders=null)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Get HTTP Response');
                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    if(!$varPort)
                        {
                        $varPort = 80;
                        }
                    //---> Cek apakah port tujuan terbuka
                    if (\App\Helpers\ZhtHelper\General\Helper_Network::isPortOpen($varUserSession, $varURL, $varPort)==false)
                        {
                        throw new \Exception('Port is closed');
                        }
                    //---> Pengecekan Method
                    if(!$varMethod)
                        {
                        $varMethod = 'POST';
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
                    //---> Pengecekan Header
                    if(!$varHeaders)
                        {
                        //---> API AUTH
                        if(strcmp($varURL, \App\Helpers\ZhtHelper\System\Helper_Environment::getFrontEndConfigEnvironment($varUserSession, 'URL_BACKEND_API_AUTH'))==0)
                            {
                            $varHeaders=[
                                'User-Agent' => $_SERVER['HTTP_USER_AGENT'],
                                'Date' => \App\Helpers\ZhtHelper\General\Helper_HTTPHeader::generateDate($varUserSession),
                                'Expires' => \App\Helpers\ZhtHelper\General\Helper_HTTPHeader::generateExpires($varUserSession, (10*60)),
                                'Content-Type' => \App\Helpers\ZhtHelper\General\Helper_HTTPHeader::generateContentType($varUserSession, json_encode($varData)),
                                'Content-MD5' => \App\Helpers\ZhtHelper\General\Helper_HTTPHeader::generateContentMD5($varUserSession, json_encode($varData)),
                                //'Authorization' => 'bearer '.\App\Helpers\ZhtHelper\General\Helper_HTTPAuthentication::getJSONWebToken(000000, 'Teguh Pratama', \App\Helpers\ZhtHelper\System\Helper_Environment::getBackEndConfigEnvironment($varUserSession, 'HTTP_AUTH_KEY')),
                                'X-Request-ID' => \App\Helpers\ZhtHelper\General\Helper_RandomNumber::getUniqueID($varUserSession)
                                ];                            
                            }
                        //---> API selainnya
                        else
                            {
                            $varHeaders=[
                                'User-Agent' => $_SERVER['HTTP_USER_AGENT'],
                                'Date' => \App\Helpers\ZhtHelper\General\Helper_HTTPHeader::generateDate($varUserSession),
                                'Expires' => \App\Helpers\ZhtHelper\General\Helper_HTTPHeader::generateExpires($varUserSession, (10*60)),
                                'Content-Type' => \App\Helpers\ZhtHelper\General\Helper_HTTPHeader::generateContentType($varUserSession, json_encode($varData)),
                                'Content-MD5' => \App\Helpers\ZhtHelper\General\Helper_HTTPHeader::generateContentMD5($varUserSession, json_encode($varData)),
                                'Authorization' => 'bearer '.\App\Helpers\ZhtHelper\General\Helper_HTTPAuthentication::getJSONWebToken(000000, 'Teguh Pratama', \App\Helpers\ZhtHelper\System\Helper_Environment::getBackEndConfigEnvironment($varUserSession, 'HTTP_AUTH_KEY')),
                                'X-Request-ID' => \App\Helpers\ZhtHelper\General\Helper_RandomNumber::getUniqueID($varUserSession)
                                ];                            
                            }
                        }
                    //---> Main process
                    $varReturn = \App\Helpers\ZhtHelper\System\Helper_HTTPRequest::setRequest($varUserSession, $varURL, $varMethod, $varData, $varPort, $varHeaders);
                    //---- ( MAIN CODE ) ----------------------------------------------------------------------- [ END POINT ] -----
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
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    $varReturn = response()->json($varDataSend);
                    //$varReturn = response()->;
                    $varReturn->header('xxx', 'yahhhhh xxxxxx');
                    echo "<br><br>MY RETURN ON setResponse : "; var_dump($varReturn); echo "<br><br>";
                    //---- ( MAIN CODE ) ----------------------------------------------------------------------- [ END POINT ] -----
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
        | ▪ Method Name     : setResponse_BodyContent                                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-08-12                                                                                           |
        | ▪ Description     : Mendapatkan Body Content dari HTTP Response                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varUserSession ► User Session                                                                            |
        |      ▪ (mixed)  varObjResponse ► Objek HTTP Response                                                                     |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (mixed)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getResponse_BodyContent($varUserSession, $varObjResponse)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Get Body Content of HTTP Response');
                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    $varReturn = $varObjResponse->getBody()->getContents();
                    //---- ( MAIN CODE ) ----------------------------------------------------------------------- [ END POINT ] -----
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
        | ▪ Method Name     : setResponse_Header                                                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-08-12                                                                                           |
        | ▪ Description     : Mendapatkan Header dari HTTP Response                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varUserSession ► User Session                                                                            |
        |      ▪ (mixed)  varObjResponse ► Objek HTTP Response                                                                     |
        |      ▪ (string) varKey ► Nama Kunci Header                                                                               |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (mixed)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getResponse_Header($varUserSession, $varObjResponse, $varKey=null)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Get Header of HTTP Response');
                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    if(!$varKey)
                        {
                        $varReturn = $varObjResponse->getHeaders();
                        }
                    else
                        {
                        if ($varObjResponse->hasHeader($varKey)==true)
                            {
                            $varReturn = $varObjResponse->getHeader($varKey);
                            if(count($varReturn)==1)
                                {
                                $varReturn = $varReturn[0];
                                }
                            }
                        }
                    //---- ( MAIN CODE ) ----------------------------------------------------------------------- [ END POINT ] -----
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
        | ▪ Method Name     : setResponse_HTTPStatusCode                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-08-12                                                                                           |
        | ▪ Description     : Mendapatkan Header dari HTTP Response                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varUserSession ► User Session                                                                            |
        |      ▪ (mixed)  varObjResponse ► Objek HTTP Response                                                                     |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (int)    varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getResponse_HTTPStatusCode($varUserSession, $varObjResponse)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Get Status Code of HTTP Response');
                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    $varReturn = $varObjResponse->getStatusCode();
                    //---- ( MAIN CODE ) ----------------------------------------------------------------------- [ END POINT ] -----
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
        }
    }