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

    use Exception;

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
        public static function setHTTPHeader_JSONResponse()
            {
            require_once (
                \App\Helpers\ZhtHelper\General\Helper_File::getAutoMatchSystemFilePath(
                    getcwd(),
                    '/../app/FilesInclude/HTTP_JSONResponse/Header.php'
                    )
                );
            }

        public static function setHTTPFooter_JSONResponse()
            {
            require_once (
                \App\Helpers\ZhtHelper\General\Helper_File::getAutoMatchSystemFilePath(
                    getcwd(),
                    '/../app/FilesInclude/HTTP_JSONResponse/Footer.php'
                    )
                );            
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getResponse                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000004                                                                                       |
        | ▪ Last Update     : 2025-01-06                                                                                           |
        | ▪ Creation Date   : 2020-08-03                                                                                           |
        | ▪ Description     : Mendapatkan Response HTTP dari API (digunakan oleh client/frontend untuk dikirim ke backend)         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varURL ► Alamat host yang dituju                                                                         |
        |      ▪ (string) varData ► Data yang akan dikirimkan                                                                      |
        |      ▪ (string) varMethod ► Metode HTTP Request                                                                          |
        |      ▪ (int)    varPort ► Port HTTP Request                                                                              |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getResponse(
            $varUserSession,
            $varURL, $varData = null, $varMethod = null, int $varPort = null, int $varTTL = null, array $varHeaders = null)
            {
//------------< BLOCKING >------------------
    $varAPIExecutionStartDateTime = (new \DateTime());
//------------< BLOCKING >------------------

            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);

            try {
                $varSysDataProcess =
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__,
                        'Get HTTP Response'
                        );

                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    //---> Reinisialisasi varPort
                    if (!$varPort) {
                        $varPort = (
                            (\App\Helpers\ZhtHelper\General\Helper_Network::isHTTPS($varUserSession)) == TRUE ? 
                            443 : 
                            80
                            );
                        }

                    //---> Cek apakah port tujuan terbuka
                    if (\App\Helpers\ZhtHelper\General\Helper_Network::isPortOpen($varUserSession, $varURL, $varPort) == false) {
                        throw new \Exception('Port is closed');
                        }

                    //---> Pengecekan Method
                    if (!$varMethod) {
                        $varMethod = 'POST';
                        }
                        
                    //---> Pengecekan data
                    if (!$varData) {
                        $varData=[];                 
                        }

                    if (!is_array($varData)) {
                        throw new Exception('Data must be an array');
                        }

                    //---> Pengecekan TTL
                    if (!$varTTL) {
                        $varTTL = 300;
                        }

                    //---> Overide TTL untuk API tertentu
                    if (\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExistOnSubArray($varUserSession, $varData, 'metadata::API::key') == true)
                        {
                        if (
                            (strcmp($varData['metadata']['API']['key'], 'transaction.synchronize.dataAcquisition.setLog_Device_PersonAccess') == 0)
                            )
                            {
                            $varTTL = 300;
                            }
                        }

                    //---> Set TTL
                    ini_set('max_execution_time', $varTTL);

//dd($varURL);
//dd($varData['header']['URL']);

                    //---> Pengecekan Header
                    if (!$varHeaders)
                        {
                        //---> API AUTH
                        if (strcmp($varURL, \App\Helpers\ZhtHelper\System\Helper_Environment::getFrontEndConfigEnvironment($varUserSession, 'URL_BACKEND_API_AUTH'))==0)
                            {
                            $varHeaders = [
                                'User-Agent' => (empty($_SERVER['HTTP_USER_AGENT'])? 'Non Browser' : $_SERVER['HTTP_USER_AGENT']),
                                'Agent-DateTime' => \App\Helpers\ZhtHelper\General\Helper_HTTPHeader::generateDate($varUserSession),
                                'Expires' => \App\Helpers\ZhtHelper\General\Helper_HTTPHeader::generateExpires($varUserSession, (10*60)),
                                'Content-Type' => \App\Helpers\ZhtHelper\General\Helper_HTTPHeader::generateContentType($varUserSession, json_encode($varData)),
                                'X-Content-MD5' => \App\Helpers\ZhtHelper\General\Helper_HTTPHeader::generateContentMD5(
                                    $varUserSession, 
                                    json_encode(
                                        \App\Helpers\ZhtHelper\General\Helper_Array::setRemoveElementByKey(
                                            \App\Helpers\ZhtHelper\General\Helper_HTTPHeader::generateDate($varUserSession), 
                                            'header', 
                                            $varData
                                            )
                                        )
                                    ),
                                'X-Request-ID' => \App\Helpers\ZhtHelper\General\Helper_RandomNumber::getUniqueID($varUserSession)
                                ];                            
                            //dd($varHeaders);
                            }
                        //---> API selainnya (Via Gateway)
                        else
                            {
//dd($varData['metadata']['API']['APIWebToken']);                            
//var_dump($varData['header']);

/*                            
                            $x =
                                json_encode(
                                    \App\Helpers\ZhtHelper\General\Helper_Array::setRemoveElementByKey(
                                                \App\Helpers\ZhtHelper\General\Helper_HTTPHeader::generateDate($varUserSession), 
                                                'header', 
                                                $varData
                                                )
                                    );
                            dd($x);
*/
                            
                            $varHeaders = [
                                'Authorization' => (((\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'header', $varData) == true) && (\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'authorization', $varData['header']) == true)) ? $varData['header']['authorization'] : null),
                                'User-Agent' => (empty($_SERVER['HTTP_USER_AGENT'])? 'Non Browser' : $_SERVER['HTTP_USER_AGENT']),
                                'Agent-DateTime' => \App\Helpers\ZhtHelper\General\Helper_HTTPHeader::generateDate($varUserSession),
                                'Expires' => \App\Helpers\ZhtHelper\General\Helper_HTTPHeader::generateExpires($varUserSession, (10*60)),
                                'Content-Type' => 
                                    \App\Helpers\ZhtHelper\General\Helper_HTTPHeader::generateContentType(
                                        $varUserSession,
                                        json_encode($varData)
                                        ),
//                                'X-Content-MD5' => \App\Helpers\ZhtHelper\General\Helper_HTTPHeader::generateContentMD5($varUserSession, json_encode($varData)),
                                'X-Content-MD5' => 
                                    \App\Helpers\ZhtHelper\General\Helper_HTTPHeader::generateContentMD5(
                                        $varUserSession, 
                                        json_encode(
                                            \App\Helpers\ZhtHelper\General\Helper_Array::setRemoveElementByKey(
                                                \App\Helpers\ZhtHelper\General\Helper_HTTPHeader::generateDate($varUserSession), 
                                                'header', 
                                                $varData
                                                )
                                            )
                                        ),
                                'X-Request-ID' => 
                                    \App\Helpers\ZhtHelper\General\Helper_RandomNumber::getUniqueID($varUserSession)
//                                'X-URL' => $varData['header']['URL']
                                ];

/*                            
                            if (\App\Helpers\ZhtHelper\General\Helper_Array::isElementExist($varUserSession, $varElement, $varData) == TRUE)
                                {                                
                                }
*/
                            $varData =
                                \App\Helpers\ZhtHelper\General\Helper_Array::setRemoveElementByKey(
                                    \App\Helpers\ZhtHelper\General\Helper_HTTPHeader::generateDate($varUserSession), 
                                    'header', 
                                    $varData);
                            }
                        }

                    //---> Main process
                    //dd($varData);
                    //dd($varURL);
                    //dd($varData);
                    $varReturn = 
                        \App\Helpers\ZhtHelper\System\Helper_HTTPRequest::setRequest(
                            $varUserSession,
                            $varURL,
                            $varMethod,
                            $varData,
                            $varPort,
                            $varHeaders
                            );
                    //dd($varReturn);

/*
//------------< BLOCKING >------------------
    dd (
        \App\Helpers\ZhtHelper\General\Helper_DateTime::getDifferenceOfDateTimeTZString(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            \App\Helpers\ZhtHelper\General\Helper_DateTime::getConvertPHPDateTimeToDateTimeTZString(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), $varAPIExecutionStartDateTime),
            \App\Helpers\ZhtHelper\General\Helper_DateTime::getConvertPHPDateTimeToDateTimeTZString(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), (new \DateTime())),
            )
        );
//------------< BLOCKING >------------------
*/

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

            return
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
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
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (array)  varDataSend ► Data yang akan dikirimkan                                                                  |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function setResponse($varUserSession, $varDataSend)
            {
            if ($varDataSend['metadata']['successStatus'] == false)
                {
                abort(
                    $varDataSend['data']['code'], $varDataSend['data']['message']
                    );
                }
            else
                {
//                $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, (response()->json([])), __CLASS__, __FUNCTION__);
                $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, [], __CLASS__, __FUNCTION__);

                try {
                    $varSysDataProcess =
                        \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__,
                            'Set HTTP Response'
                            );

                    try {
                        //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                        //$varReturn = response()->json($varDataSend);
                        //dd($varDataSend);
                        $varReturn = $varDataSend;
                        
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

                return
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setResponse_BodyContent                                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2020-08-25                                                                                           |
        | ▪ Description     : Mendapatkan Body Content dari HTTP Response                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
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
                    //$varObjResponseArray = ((array) $varObjResponse);

                    $varGuzzleMode = TRUE;
                    if (stristr(json_encode(((array) $varObjResponse)), 'GuzzleHttp') === FALSE) {
                        $varGuzzleMode = FALSE;
                        }
//dd($varObjResponse);
//dd($varGuzzleMode);

                    //---> Jika $varObjResponse dari Guzzle
                    try {
                        $varReturn =
                            $varObjResponse->getBody()->getContents();                        
                        }

                    //---> Jika $varObjResponse bukan dari Guzzle
                    catch (\Exception $ex) {
                        $varReturn =
                            $varObjResponse->getContent();
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
        | ▪ Method Name     : getResponse_Header                                                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2020-08-25                                                                                           |
        | ▪ Description     : Mendapatkan Header dari HTTP Response                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
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
                        //---> Guzzle Mode
                        try {
                            $varReturn = $varObjResponse->getHeaders();                        
                            } 
                        //---> Non Guzzle Mode
                        catch (\Exception $ex) {
                            try {
                                $varReturn = $varObjResponse->headers->all();
                                } 
                            catch (\Exception $ex) {
                                }
                            }
                        }
                    else
                        {
                        //---> Guzzle Mode
                        try {
                            if ($varObjResponse->hasHeader($varKey)==true)
                                {
                                $varReturn = $varObjResponse->getHeader($varKey);
                                if(count($varReturn)==1)
                                    {
                                    $varReturn = $varReturn[0];
                                    }
                                }                            
                            } 
                        //---> Non Guzzle Mode
                        catch (\Exception $ex) {
                            try {
                                $varReturn = $varObjResponse->headers->get($varKey);
                                if(is_string($varReturn)==TRUE)
                                    {
                                    $varReturn = $varReturn[0];
                                    }
                                elseif(count($varReturn)==1)
                                    {
                                    $varReturn = $varReturn[0];
                                    }
                                } 
                            catch (\Exception $ex) {
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
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2020-08-25                                                                                           |
        | ▪ Description     : Mendapatkan Header dari HTTP Response                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
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
                    //---> Guzzle Mode
                    try {
                        $varReturn = $varObjResponse->getStatusCode();
                        } 
                    //---> Non Guzzle Mode
                    catch (\Exception $ex) {
                        try {
                            $varReturn = $varObjResponse->status();
                            } 
                        catch (\Exception $ex) {
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
        }
    }