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
    | ▪ Class Name  : Helper_HTTPRequest                                                                                           |
    | ▪ Description : Menangani segala hal yang terkait HTTP Request dari Aplikasi                                                 |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class Helper_HTTPRequest
        {
        public static function getHeader($varUserSession)
            {
            $varHeader = null;
                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    $varHeader = request()->header();
                    //var_dump($varHeader);                
                    //---- ( MAIN CODE ) ----------------------------------------------------------------------- [ END POINT ] -----
                    } 
                catch (\Exception $ex) {
                    }
            return $varHeader;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getRequest                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2025-01-08                                                                                           |
        | ▪ Creation date   : 2020-07-27                                                                                           |
        | ▪ Description     : Mendapatkan Request HTTP dari Requester (digunakan oleh backend untuk diolah sebelum dikirim kembali |
        |                     ke client/frontend)                                                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getRequest($varUserSession, &$varObjRequest = null)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Get HTTP Request');
                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                        //---> Guzzle Mode
                        if (!$varObjRequest)
                            {
                            //$varDataReceive = request()->json()->all();
                            $varDataReceive = json_decode((request()->getContent()), TRUE);
                            }
                        //---> Non Guzzle Mode
                        else
                            {
                            //$varDataReceive = \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode($varUserSession, $varObjRequest->getContent());
                            $varDataReceive = $varObjRequest->getContent();
                            }

                        $varReturn = $varDataReceive;
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
public static function getRequest_HeaderAPIWebToken($varUserSession)
    {
    $x = self::getHeader($varUserSession);
    $y = $x->bearerToken();
    return '123456';
    }
*/

        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getRequest_Header                                                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-08-25                                                                                           |
        | ▪ Description     : Mendapatkan Header dari HTTP Request                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (mixed)  varObjRequest ► Objek HTTP Request                                                                       |
        |      ▪ (string) varKey ► Nama Kunci Header                                                                               |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (mixed)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getRequest_Header($varUserSession, $varObjRequest, $varKey = null)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Get Header of HTTP Request');
                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    if (!$varKey)
                        {
                        //---> Non Guzzle Mode
                        $varReturn = $varObjRequest->header();
                        }
                    else
                        {
                        //---> Non Guzzle Mode
                        $varReturn = $varObjRequest->header($varKey);
                        if (is_string($varReturn)==TRUE)
                            {
                            $varReturn = $varReturn[0];
                            }
                        elseif (count($varReturn)==1)
                            {
                            $varReturn = $varReturn[0];
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
        | ▪ Method Name     : setRequest                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2020-07-26                                                                                           |
        | ▪ Description     : Mengeset Request HTTP                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varURL ► Alamat host yang dituju                                                                         |
        |      ▪ (string) varMethod ► Metode HTTP Request                                                                          |
        |      ▪ (int)    varPort ► Port HTTP Request                                                                              |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */  
        public static function setRequest(
            $varUserSession, 
            $varURL, $varMethod, $varData = null, $varPort = null, $varHeaders = null)
            {
//------------< BLOCKING >------------------
    $varAPIExecutionStartDateTime = (new \DateTime());
//------------< BLOCKING >------------------
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);

            try {
                $varSysDataProcess =
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__,
                        'Send HTTP Request'
                        );

                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    $varResponseData = '';

                    $ObjClient =
                        new \GuzzleHttp\Client();

                    try {
                        //dd($varMethod);
                        //dd($varURL);
                        //dd($varHeaders);
                        //dd(json_encode($varData, true));
                        $varResponse =
                            $ObjClient->request(
                                $varMethod,
                                $varURL,
                                [
                                'verify' => false,
                                'headers' => $varHeaders, 
                                'body' => json_encode($varData, true)//,
                                //'timeout' => 5,
                                //'connect_timeout' => 2
                                ]
                                );
                        //dd($varResponse);
                        //dd($varData);

/*
//------------< BLOCKING >------------------
    dd (
        \App\Helpers\ZhtHelper\General\Helper_DateTime::getDifferenceOfDateTimeTZString(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            \App\Helpers\ZhtHelper\General\Helper_DateTime::getTimeStampTZConvert_PHPDateTimeToDateTimeTZString(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), $varAPIExecutionStartDateTime),
            \App\Helpers\ZhtHelper\General\Helper_DateTime::getTimeStampTZConvert_PHPDateTimeToDateTimeTZString(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), (new \DateTime())),
            )
        );
//------------< BLOCKING >------------------
*/

/*


                            
 $varReturn = $varObjResponse->getBody()->getContents();                        
                        } 
                    //---> Jika $varObjResponse bukan dari Guzzle
                    catch (\Exception $ex) {
                        $varReturn = $varObjResponse->getContent();
 */




//dd($varURL);
//dd($varResponse);
                        //---> Inisialisasi : varHTTPStatusCode
                        $varHTTPStatusCode = 
                            \App\Helpers\ZhtHelper\System\Helper_HTTPResponse::getResponse_HTTPStatusCode(
                                $varUserSession,
                                $varResponse
                                );
                        //dd($varHTTPStatusCode);

//dd($varURL);

                        
                        //---> Tanpa Menggunakan HTTPS Proxy
                        if (stristr($varURL, 'getAPIRedirect') == FALSE)
                            {
                            //---> Jika Backend Process Sukses
                            if ($varHTTPStatusCode == 200)
                                {
                                //---> Initializing : varResponseData
                                    $varResponseData =
                                        \App\Helpers\ZhtHelper\System\Helper_HTTPResponse::getResponse_BodyContent(
                                            $varUserSession,
                                            $varResponse
                                            );
                                    //dd($varResponseData);

                                //---> Initializing : varDataHeaderMD5
                                    $varDataHeaderMD5 =
                                        \App\Helpers\ZhtHelper\System\Helper_HTTPResponse::getResponse_Header(
                                            $varUserSession,
                                            $varResponse,
                                            'X-Content-MD5'
                                            );
                                    //dd($varDataHeaderMD5);
    //dd($varObjResponse->getContent);

    //dd($varResponse);
    //dd(((array) $varResponseData)[0]);
                                if (strcmp($varDataHeaderMD5, \App\Helpers\ZhtHelper\General\Helper_HTTPHeader::generateContentMD5($varUserSession, $varResponseData)) == 0)
                                    {
                                    //---> Based on Core\Engines\APIResponsvarResponseDatae\setNotificationSuccess\v1\setNotificationSuccess
                                    $varData = (json_decode($varResponseData, TRUE));
                                    $varResponseContents = [
                                        'metadata' => [
                                            'HTTPStatusCode' => $varHTTPStatusCode,
                                            'APIResponse' => $varData['metadata']['APIResponse'],
                                            'successStatus' => ($varHTTPStatusCode = 200 ? true : false)
                                            ],
                                        'data' => $varData['data']
                                        ];
                                    }
                                else
                                    {
    //                                $varResponseContents = \App\Helpers\ZhtHelper\System\API\Response\Helper_APIResponse::getResponse($varUserSession, ['authentication', 'getErrorNotification', 'v1'] , $varHTTPStatusCode, 'Data integrity check failed');
                                    //---> Based on Core\Engines\APIResponse\setNotificationFailure\v1\setNotificationFailure
                                    
                                    $varResponseContents = [
                                        'metadata' => [
                                            'HTTPStatusCode' => $varHTTPStatusCode,
                                            'APIResponse' => [
                                                'key' => 'core.general.notification',
                                                'version' => 1
                                                ],
                                            'successStatus' => ($varHTTPStatusCode = 200 ? true : false)
                                            ],
                                        'data' => [
                                            'message' => 'Data integrity check failed (MD5 Payload Inconsistency)',
                                            'md5' => $varDataHeaderMD5,
                                            //'Response' =>  ((array) $varResponseData)[0],
                                            'response' => (
                                                ($varDataHeaderMD5 === NULL) ?
                                                    (
                                                    str_replace(
                                                        "\n",
                                                        "",
                                                        explode(
                                                            '<!DOCTYPE html>',
                                                            ((array) $varResponseData)[0]
                                                            )[0]
                                                        )                                            
                                                    )
                                                    :
                                                    (
                                                    ((array) $varResponseData)[0]
                                                    )
                                                )
                                            
                                            
                                            



    //'ccc' => \App\Helpers\ZhtHelper\General\Helper_HTTPHeader::generateContentMD5($varUserSession, $varResponseData)

    //                                        'message' => 'Data integrity check failed (MD5 Payload Inconsistency)'
                                            ]
                                        ];
                                    //echo abort(403, 'xxxxx');
                                    //echo \App\Helpers\ZhtHelper\System\Helper_HTTPError::setThrowNewErrorFromEngine($varUserSession, 422, null);
                                    //echo "~~~~~~~~~~~~~~~~~~~~~~~~";
                                    //echo \App\Helpers\ZhtHelper\System\Helper_HTTPError::setResponse($varUserSession, 422, '$varHTTPMessage');
                                    }
                                }
                            //---> Jika Backend Process Gagal
                            else
                                {
    //                            $varResponseContents = \App\Helpers\ZhtHelper\System\API\Response\Helper_APIResponse::getResponse($varUserSession, ['authentication', 'getErrorNotification', 'v1'] , $varHTTPStatusCode, 'Authentication process failed');
                                //---> Based on Core\Engines\APIResponse\setNotificationFailure\v1\setNotificationFailure
                                $varResponseContents = [
                                    'metadata' => [
                                        'HTTPStatusCode' => $varHTTPStatusCode,
                                        'APIResponse' => [
                                            'key' => 'core.general.notification',
                                            'version' => 1
                                            ],
                                        'successStatus' => ($varHTTPStatusCode = 200 ? true : false)
                                        ],
                                    'data' => [
                                        'message' => 'Authentication process failed'
                                        ]
                                    ];                                
                                }
                            //dd($varResponseData);
                            }
                        //---> Bila Menggunakan HTTPS Proxy
                        else {
                            $varResponseData =
                                \App\Helpers\ZhtHelper\System\Helper_HTTPResponse::getResponse_BodyContent(
                                    $varUserSession,
                                    $varResponse
                                    );

                            $varData = (json_decode($varResponseData, TRUE));
                            $varResponseContents = [
                                'metadata' => [
                                    'HTTPStatusCode' => $varData['metadata']['HTTPStatusCode'],
                                    'APIResponse' => $varData['metadata']['APIResponse'],
                                    'successStatus' => ($varData['metadata']['HTTPStatusCode'] = 200 ? true : false)
                                    ],
                                'data' => $varData['data']
                                ];
                            //dd($varResponseData);
                            }
                        }

                    catch (\GuzzleHttp\Exception\BadResponseException $ex) {


                        $response = $ex->getResponse();
                        //dd($response);

                        //---> Initializing : varHTTPStatusCode
                            $varHTTPStatusCode =
                                $response->getStatusCode();
                            //dd($varHTTPStatusCode);
                        
                        //---> Initializing : responseBodyAsString                        
                            $response->getBody()->rewind();
                            $responseBodyAsString =
                                $response->getBody()->getContents();
    
                            //---> Remove Sfdump Script dan Style From responseBodyAsString
                                $responseBodyAsString =
                                     \App\Helpers\ZhtHelper\General\Helper_Laravel::setRemoveSFDumpFromHTTPRequestResponseBody(
                                        $varUserSession,
                                        $responseBodyAsString
                                        );

                        //$varResponseContents = \App\Helpers\ZhtHelper\System\Helper_APIResponse::getNotification_FailureMessage_v1($varUserSession, $varHTTPStatusCode, $responseBodyAsString);

                        //---> Initializing : varResponseContents 
                            $varResponseContents = [
                                'metadata' => [
                                    'HTTPStatusCode' => $varHTTPStatusCode,
                                    'APIResponse' => [
                                        'key' => 'core.general.notification',
                                        'version' => 1
                                        ],
                                    ],
                                'data' => [
                                    'message' => $responseBodyAsString
                                    ]
                                ]; 
                        }
                    //\App\Helpers\ZhtHelper\General\Helper_HTTPAuthentication::getJSONWebToken(000000, 'admin', 'secretkey');                  
                    
                    $varReturn =
                        $varResponseContents;
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
        | ▪ Method Name     : setRequest                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2020-08-12                                                                                           |
        | ▪ Description     : Mengeset Ulang Nilai Header pada Request HTTP (Digunakan bila Request sudah terbentuk)               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (mixed)  varObjRequest ► Objek Request                                                                            |
        |      ▪ (string) varKey ► Nama Header                                                                                     |
        |      ▪ (mixed)  varPort ► Nilai Header                                                                                   |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function setRequest_Header($varUserSession, &$varObjRequest, string $varKey, $varValue)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Set Specific Header on HTTP Request');
                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    $varObjRequest->headers->set($varKey, $varValue);
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
