<?php

namespace App\Http\Controllers\Application\BackEnd\SandBox
    {
    use Illuminate\Http\Request;
    use Illuminate\Http\Response;
 
    class Controller_Main extends \App\Http\Controllers\Controller
        {
        public function __construct()
            {
            //$this->middleware(\App\Http\Middleware\Application\BackEnd\RequestHandler_General::class);
            }
            
        public function testAja()
            {
            $varUserSession = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
            $varAPIWebToken = 'xxx';

                $varData = 
                    (new \App\Models\Database\SchData_OLTP_Master\General())->getBusinessDocumentByRecordID(
                        $varUserSession, 
                        14485000000000002
                        );
                dd($varData);

            
/*            
                $varData = 
                    (new \App\Models\Database\SchData_OLTP_DataAcquisition\General())->getList_LogFileUploadObjectByExistantion(
                        $varUserSession, 
                        11000000000004,
//                        (\App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken($varUserSession))['branchID'],

                        94000000000107
                        );
                dd($varData);
*/
                
/*
//            $x = is_file('TestPDF.pdf');
            $filename = 'TestPDF.pdf';
            $handle = fopen($filename, "r");
            $contents = fread($handle, filesize($filename));
            fclose($handle);

if (stristr($contents, "/Encrypt")) 
{echo " (Suspected Enrypted PDF File !)";}
else
{echo " OK ";}  
*/            
            //dd($contents);
            
            
            
 //           echo phpinfo();

/*
            \App\Helpers\ZhtHelper\General\Helper_ImageProcessing::getConvertDataContent_ImageToPNG(
                    $varUserSession, 
                    (new \App\Models\CloudStorage\System\General())->getFileContent(
                        $varUserSession,
                        'Archive/92000000000132/12000000000158'
                        //'Archive/92000000000131/12000000000157'
                        //'Archive/92000000000097/12000000000108'
                        ),
                    300,
                    300
                    );
*/
            
/*
            \App\Helpers\ZhtHelper\General\Helper_ImageProcessing::getConvertDataContent_PDFToPNG(
                    $varUserSession, 
                    (new \App\Models\CloudStorage\System\General())->getFileContent(
                        $varUserSession,
                        'Archive/92000000000133/12000000000159'
                        //'Archive/92000000000131/12000000000157'
                        //'Archive/92000000000097/12000000000108'
                        ),
                    300,
                    300
                    );
*/

/*
$x = \App\Helpers\ZhtHelper\General\Helper_FileConvert::getConvertDataContent_OfficeToPDF(
    $varUserSession,
    (new \App\Models\CloudStorage\System\General())->getFileContent(
        $varUserSession,
        'Archive/92000000000134/12000000000160'
        )
    );
//dd();
*/

/*
$varDataBAse64 = (new \App\Models\CloudStorage\System\General())->getFileContent(
    $varUserSession, 
    'Archive/92000000000097/12000000000108'
    );
dd($varDataBAse64);
*/


/*
            $MyObjMinIOClient = new \Aws\S3\S3Client([
                'version' => 'latest',
                'region' => \App\Helpers\ZhtHelper\System\Helper_Environment::getLaravelEnvironment('MINIO_REGION'),
                'endpoint' => \App\Helpers\ZhtHelper\System\Helper_Environment::getLaravelEnvironment('MINIO_ENDPOINT'),
                'use_path_style_endpoint' => true,
                'credentials' => [
                    'key'    => \App\Helpers\ZhtHelper\System\Helper_Environment::getLaravelEnvironment('MINIO_KEY'),
                    'secret' => \App\Helpers\ZhtHelper\System\Helper_Environment::getLaravelEnvironment('MINIO_SECRET'),                            
                    ]                        
                ]);
            $varResult = $MyObjMinIOClient->getObject([
                'Bucket' => 'erp-reborn',
                'Key'    => 'Archive/92000000000097/12000000000108'
                ]);
            $x = (string) $varResult['Body'];
            //$x = $varResult['Body'];
*/
            
            //dd($x);

/*        $x = str_replace(
            '"', 
            '\\\\\\\'', 
            \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                $varUserSession, 
                $varAPIWebToken, 
                'fileHandling.upload.combined.general.getMasterFileRecord', 
                'latest', 
                '{'.
                '"log_FileUpload_Pointer_RefID" : ((varLog_FileUpload_Pointer_RefID == null) ? null : parseInt(varLog_FileUpload_Pointer_RefID)), '.
                '"rotateLog_FileUploadStagingArea_RefRPK" : varRotateLog_FileUploadStagingArea_RefRPK, '.
                '"deleteCandidate_Log_FileUpload_ObjectDetail_RefArrayID" : []'.
                '}'
                )
            );*/
            
/*
$x1 = 
\App\Helpers\ZhtHelper\General\Helper_JavaScript::setEscapeForEscapeSequenceOnSyntaxLiteral(
    $varUserSession, 
    str_replace(
        '"', 
        '\'', 
        \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
            $varUserSession, 
            $varAPIWebToken, 
            'fileHandling.upload.combined.general.getMasterFileRecord', 
            'latest', 
            '{'.
                '"parameter" : {'.
                    '"log_FileUpload_Pointer_RefID" : null, '.
                    '"rotateLog_FileUploadStagingArea_RefRPK" : 880, '.
                    '"deleteCandidate_Log_FileUpload_ObjectDetail_RefArrayID" : []'.
                    '}'.
            '}'
            )
        )
    );

$x = 
                                                        \App\Helpers\ZhtHelper\General\Helper_JavaScript::setEscapeForEscapeSequenceOnSyntaxLiteral(
                                                            $varUserSession, 
                                                            str_replace(
                                                                '"', 
                                                                '\'', 
                                                                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                                                                    $varUserSession, 
                                                                    $varAPIWebToken, 
                                                                    'fileHandling.upload.combined.general.getMasterFileRecord', 
                                                                    'latest', 
                                                                    '{'.
                                                                        '"parameter" : {'.
                                                                            '"log_FileUpload_Pointer_RefID" : ((varJSONData.header.log_FileUpload_Pointer_RefID == null) ? null : parseInt(varJSONData.header.log_FileUpload_Pointer_RefID)), '.
                                                                            '"rotateLog_FileUploadStagingArea_RefRPK" : varJSONData.header.rotateLog_FileUploadStagingArea_RefRPK, '.
                                                                            '"deleteCandidate_Log_FileUpload_ObjectDetail_RefArrayID" : varJSONData.header.deleteCandidate_Log_FileUpload_ObjectDetail_RefArrayID '.
                                                                            '}'.
                                                                    '}'
                                                                    )
                                                                )
                                                            )
;

        dd($x);
*/
/*            
 $curl= curl_init();
 curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
 curl_setopt($curl, CURLOPT_URL, 'http://172.28.0.3/gatewayOfGetMethod/eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2NjAyNjY4MTF9.ZTQ3YTYxNjhlNDRiNmU5OGNiMzZlMGFhOTEwODRmNTcwZDM2NDI3YjAzYjQwZGFmNTEwNDY3NzIyZTgxYTAyYg/b09e77b311561ea265086901ef99d01a5c65cba369b6d210a67b569b8066a116/eyJoZWFkZXIiOnsiYXV0aG9yaXphdGlvbiI6IkJlYXJlciBleUpoYkdjaU9pSklVekkxTmlJc0luUjVjQ0k2SWtwWFZDSjkuZXlKc2IyZG5aV1JKYmtGeklqb2ljM2x6WVdSdGFXNGlMQ0pwWVhRaU9qRTJOakF5TmpZNE1URjkuWlRRM1lUWXhOamhsTkRSaU5tVTVPR05pTXpabE1HRmhPVEV3T0RSbU5UY3daRE0yTkRJM1lqQXpZalF3WkdGbU5URXdORFkzTnpJeVpUZ3hZVEF5WWcifSwibWV0YWRhdGEiOnsiQVBJIjp7ImtleSI6InRyYW5zYWN0aW9uLmRlbGV0ZS5zeXNDb25maWcuc2V0Um90YXRlTG9nX0ZpbGVVcGxvYWRTdGFnaW5nQXJlYURldGFpbCIsInZlcnNpb24iOiJsYXRlc3QifX0sImRhdGEiOnsicmVjb3JkUEsiOjY2M319');
 $res = curl_exec($curl);
 curl_close($curl);
 dd($res);

 //$jo = json_decode($res);
 echo $jo;
*/

/*
var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
       // Typical action to be performed when the document is ready:
       document.getElementById("demo").innerHTML = xhttp.responseText;
    }
};
xhttp.open("GET", "filename", true);
xhttp.send();            
*/          
            
            
            
            
            
            
           // \App\Helpers\ZhtHelper\System\Helper_Environment::getAPIWebToken_ByUserSessionID($varUserSession);
/*            
            $x = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::getURL_APICallByGetMethod(
                $varUserSession, 
                \App\Helpers\ZhtHelper\System\Helper_Environment::getAPIWebToken_ByUserSessionID($varUserSession),
                //'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2NTk1ODMwNzV9.ZDdmYjI0ZGM0OTJiMjAwZmE1OTQ1ZmQ3ODQzZTE5MmQ2MWEyZGU2OTliMWRiMmQwMzA3MzRlMDU3YmIyM2Y1Zg', 
                'fileHandling.upload.combined.general.getMasterFileRecord', 
                'latest', 
                [
                'parameter' => [
                    'archiveRecordID' => NULL,
                    'stagingAreaRecordPK' => 124
                    ]
                ],
                NULL,
                TRUE
                );
*/

            
/*            
            $x = 
                (new \App\Models\Database\SchSysConfig\TblRotateLog_APIRequestByGet_Signature())->setDataInsert(
                    $varUserSession, 
                    'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2NTk1ODMwNzV9.ZDdmYjI0ZGM0OTJiMjAwZmE1OTQ1ZmQ3ODQzZTE5MmQ2MWEyZGU2OTliMWRiMmQwMzA3MzRlMDU3YmIyM2Y1Zg', 
                    '{}', 
                    '5 minutes'
                    );
 * 
 */
//            dd($x);

/*
            $varSignFileAlreadyExist = 
                (new \App\Models\Database\SchSysAsset\General())->getData_FileUpload_IsFileAlreadyExist(
                    $varUserSession, 
                    NULL,
                    124,
                    
            'ContohTextFile.txt',
            9,
            'text/plain',
            'txt',
            1626667110901,
            '7a72456de33e0238bf52ae01fd13c068722eb557980350b0ec9c0526fa5608ae'
            );
            dd($varSignFileAlreadyExist);
*/            
            
//            (new \App\Models\Database\SchSysConfig\TblRotateLog_FileUploadStagingAreaDetail())->setDataInsert($varUserSession, $varSysDataAnnotation)
            
            /*
            
            $x = \App\Helpers\ZhtHelper\General\Helper_Hash::getSHA256($varUserSession, 
                \App\Helpers\ZhtHelper\General\Helper_Encode::getBase64Decode(
                    $varUserSession,
                    base64_encode('test aja')
                    )
                );*/
//            $x = (new \App\Models\Database\SchSysAsset\General())->getHash_SHA256($varUserSession, 'test aja');
//            dd($x);
            
            //$varTempArray = \Illuminate\Support\Facades\Storage::disk('local')->files('Application/Upload/StagingArea/69');
            //var_dump($varTempArray);
            
            
//            $varFilePath = 'Application/Upload/StagingArea';
//            $varFilePath = 'Application';
//            $x = \App\Helpers\ZhtHelper\LocalStorage\Helper_LocalStorage::getSubDirectoriesListOnDirectory($varUserSession, $varFilePath);
/*            $x = \App\Helpers\ZhtHelper\LocalStorage\Helper_LocalStorage::getFilesListOnDirectory($varUserSession, $varFilePath);
 */
            
//            $x = \App\Helpers\ZhtHelper\CloudStorage\Helper_MinIO::getFilesList($varUserSession, 'StagingArea/1');
            //$x = \App\Helpers\ZhtHelper\CloudStorage\Helper_MinIO::getSubDirectoriesListOnDirectory($varUserSession, 'StagingArea');
          
            //var_dump($x);
            
            //$x = (new \App\Models\LocalStorage\DefaultClassPrototype())->;

            //echo \App\Helpers\ZhtHelper\LocalStorage\Helper_LocalStorage::getBasePath($varUserSession);
            //echo "<br><br>";
            //echo \App\Helpers\ZhtHelper\LocalStorage\Helper_LocalStorage::getBasePath($varUserSession).'Application/Upload/StagingArea/';
            
            
            //$varCheck = null;
            //$varCheck = 456;
            
            //$NewValue = ((!$varCheck) ? NULL : (int) 123);
            
            //echo $NewValue;
            
            //var_dump(\App\Helpers\ZhtHelper\System\Helper_Environment::getAPIWebToken_System());
 //           echo "~~~~~~~~~~~~~~~~~~~";
            }

        public function testHTMLDOM()
            {
            $varUserSession = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();

            
            echo
                "<style>
datalist {
  position: absolute;
  background-color: white;
  border: 1px solid blue;
  border-radius: 0 0 5px 5px;
  border-top: none;
  font-family: sans-serif;
  width: 350px;
  padding: 5px;

}

option {
  background-color: white;
  padding: 4px;
  color: blue;
  margin-bottom: 1px;
   font-size: 18px;
  cursor: pointer;
}

option:hover, .active{
    background-color: lightblue;
    }
                </style>";

            /*
            echo 
                "<style>
                body {
                  background-color: linen;
                    }

                h1 {
                  color: maroon;
                  margin-left: 40px;
                    }
                    
                datalist {
                    position: absolute;
                    background-color: white;
                    border: 1px solid blue;
                    border-radius: 0 0 5px 5px;
                    border-top: none;
                    font-size: 5px;
                    font-family: sans-serif;
                    width: 350px;
                    padding: 5px;
                    max-height: 10rem;
                    overflow-y: auto
                    }

                option {
                    background-color: white;
                    padding: 4px;
                    color: blue;
                    margin-bottom: 1px;
                    font-size: 5px;
                    cursor: pointer;
                    }



                </style>";
*/            
            echo "Test HTML DOM<br>";
/*
                option:hover, .active{
                    background-color: lightblue;
                    font-size: 5px;
                    }
 */            
            
            
//            echo \App\Helpers\ZhtHelper\General\Helper_HTMLDOM::setLabel($varUserSession, 'MyLabel', 'MyLabelValue');
//            echo \App\Helpers\ZhtHelper\General\Helper_HTMLDOM::setInputText($varUserSession, 'MyID', 'MyValue');
            
            
            /*
            echo \App\Helpers\ZhtHelper\General\Helper_HTMLDOM::setSelect($varUserSession, 'MyListID', '001',
                [
                    ['ID' => '001', 'Text' => '001 Name'],
                    ['ID' => '002', 'Text' => '002 Name'],
                    ['ID' => '003', 'Text' => '003 Name'],
                    ['ID' => '004', 'Text' => '004 Name']
                ]
                );
            
            echo "<br>-----------------------------------------<br>";
          */

            echo \App\Helpers\ZhtHelper\General\Helper_HTMLDOM::setInputTextWithBoundedSuggestion($varUserSession, 'MyInputTextWithListID', 
                'xxx',
                [
                    ['ID' => '001', 'Text' => '001 Name'],
                    ['ID' => '002', 'Text' => '002 Name'],
                    ['ID' => '003', 'Text' => '003 Name'],
                    ['ID' => '004', 'Text' => '004 Name']
                ]
                );

            echo "Done";
            }
            
            
        public function testTelegramBot()
            {
            \BotMan\BotMan\Drivers\DriverManager::loadDriver(\BotMan\Drivers\Telegram\TelegramDriver::class);
            
            $config = [
                // Your driver-specific configuration
                "telegram" => [
                    "token" => "TOKEN_TELEGRAM_KAMU"
                    ]
                ];
            $botman = \BotMan\BotMan\BotManFactory::create($config, new \BotMan\BotMan\Cache\LaravelCache());
            
            $botman->hears(
                '/start|start|mulai', 
                function (\BotMan\BotMan\Messages\Conversations\Conve $bot) {
                    $user = $bot->getUser();
                    $bot->reply('Assalamualaikum , Selamat datang di Hadits Telegram Bot!. ');
                    $bot->startConversation(new  ExampleConversation());
                    }
                )->stopsConversation();
            
//            $botman->listen();

           
            
            echo "OK";
            }

        public function testEMail()
            {
            $varUserSession = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
            $varBranchID = 11000000000004;

            $template = file_get_contents('https://raw.githubusercontent.com/leemunroe/responsive-html-email-template/master/email.html');

            $varData = [
                'SystemParameter' => [
                    'DSN' => 'gmail+smtp://zhtfw.mail.exchange:Pr4tr14n4@default',
                    'HTMLContent' => true
                    ],
                'Header' => [
                    'From' => [
                        'zhtfw.mail.exchange@gmail.com'
                        ],
                    'To' => [
                        'teguhpjs@gmail.com',
                        'teguh.pratama@qdc.co.id'
                        ],
                    'CC' => [
                        ],
                    'BCC' => [
                        ],
                    'Subject' => 'Test aja ya'
                    ],
                'Body' => [
                    'Content' => base64_encode($template)
                    ]
                ];


            \App\Helpers\ZhtHelper\System\BackEnd\Helper_EMail::Send(
                $varUserSession, 
                $varData
                );
            
/*
            $varGoogleDSN = 'gmail+smtp://zhtfw.mail.exchange:Pr4tr14n4@default';
            
                      

            
            $ObjEMail = (new \Symfony\Component\Mime\Email())
                ->from('zhtfw.mail.exchange@gmail.com')
                ->to('teguhpjs@gmail.com')
                ->subject('Time for Symfony Mailer!')
                ->html($template)
                ;
            
            //$ObjMailer->send($ObjEMail);
*/
            }

            
        public function testExcel()
            {
            $varUserSession = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
            $varBranchID = 11000000000004;
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2Mjk0MjM5NzF9.J1D3Jwk-50BXUEHg6nmxLcgHqZnntx6ENMOcaXnzsOY';
            $varTimeZoneOffset = '+07';
            
            $varJSON = '{"sys_ID" : 48000000000001, "sys_Branch_RefID" : 11000000000004, "documentNumber" : "Timesheet/QDC/2026/000007", "documentDateTimeTZ" : "2026-01-01T00:00:00.012345", "startDateTimeTZ" : "2026-01-01T00:00:00+07:00", "finishDateTimeTZ" : "2026-01-14T00:00:00+07:00", "minActivitiesStartDateTimeTZ" : "2026-01-01T07:00:00+07:00", "maxActivitiesFinishateTimeTZ" : "2026-01-08T13:00:00+07:00", "person_RefID" : 25000000000439, "personName" : "Teguh Pratama Januzir Sukin", "details" : [{"sys_ID" : 50000000000002, "sys_Branch_RefID" : 11000000000004, "startDateTimeTZ" : "2026-01-01T07:00:00+07:00", "finishDateTimeTZ" : "2026-01-03T13:00:00+07:00", "activity" : "Kegiatan ABCD dan EFGH", "projectSectionItem_RefID" : null},{"sys_ID" : 50000000000003, "sys_Branch_RefID" : 11000000000004, "startDateTimeTZ" : "2026-01-04T07:00:00+07:00", "finishDateTimeTZ" : "2026-01-08T13:00:00+07:00", "activity" : "Kegiatan PQR dan XYZ", "projectSectionItem_RefID" : null}]}';

            var_dump(
                    \App\Helpers\ZhtHelper\General\Helper_JSON::setDateTimeTZNormalizationFromArray($varUserSession, json_decode($varJSON, true))
                );
            
            echo "OK";
            
            

/*           
            
//            ob_start();
            $x = (new \zhtSDK\Software\Excel\Maatwebsite\zhtSDK($varUserSession))->exportFromArray(
                'DataTest.xlsx',
                [
                    ['a', 'b', 'c'],
                    [1, 2, 3],
                    [4, 5, 6],
                    [7, 8, 9]                    
                ]
                );
//            ob_end_clean();
//            echo "xxx";
//            if (ob_get_contents() || ob_get_length()) {
//                ob_end_clean(); //or ob_end_flush();
//                }
            
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Cache-Control: must-revalidate');
            header('Expires: 0');
            header('Pragma: public');
            header('Content-Disposition: attachment; filename="xxx.xlsx"');	
            echo base64_decode(base64_encode($x), TRUE);

 */
/*            if (ob_get_contents() || ob_get_length()) {
              ob_end_clean(); //or ob_end_flush();
            }
	exit();
  */          
            //return $x;
            
            }

        public function testUpload()
            {
            $varUserSession = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
            $varBranchID = 11000000000004;
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2Mjk0MjM5NzF9.J1D3Jwk-50BXUEHg6nmxLcgHqZnntx6ENMOcaXnzsOY';
            $varTimeZoneOffset = '+07';
        

            $x = (new \zhtSDK\Device\Goodwin\SwingGateBarrier\ServoSW01\zhtSDK(
                    $varUserSession,
                    ))->getDataAttendanceFromLocalDatabase(
                        '/zhtConf/tmp/download/SwingBarrierGate.mdb',
                        '"SchData-OLTP-DataAcquisition"."TblTemp_Device_SwingGateBarrier_CheckInOut"',
                        '+07',
                        '2021-01-01 00:00:00'
                        );
/*
            $x = \App\Helpers\ZhtHelper\System\BackEnd\Helper_APICall::setCallAPIGateway(
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
                )['data'];*/
            var_dump($x);
            
            /*
            $varData = \App\Helpers\ZhtHelper\System\BackEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                //'instruction.device.fingerprintAttendance.ALBox.FP800.getDataAttendance', 
                'instruction.device.fingerprintAttendance.Solution.x601.getDataAttendance', 
                'latest', 
                [
                'entities' => [
                    //'IPAddress' => '192.168.1.204',
                    'IPAddress' => '192.168.1.203',
                    //'IPAddress' => '192.168.1.201',
                    'port' => 4370, 
                    //'serialNumber' => '2065682450035',
                    'serialNumber' => 'AEYU202860040',
                    //'serialNumber' => 'AEYU202860056',
                    'timeZoneOffset' => '+07',
                    'startDateTime' => '2021-01-01'
                    ]
                ]
                );
            var_dump(json_encode($varData));
*/
            /*
            $x = (new \App\Models\Database\SchData_OLTP_Master\General())->getDataPickList_BudgetOrigin(
                $varUserSession, 
                $varBranchID
                );
            dd($x);
            */
            }
            
        public function testUploadx()
            {
            $varUserSession = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();

            //$x = \App\Helpers\ZhtHelper\CloudStorage\Helper_MinIO::isBucketExist($varUserSession, 'erp-reborn');
            
            //$x = \App\Helpers\ZhtHelper\CloudStorage\Helper_MinIO::createBucket($varUserSession, 'xxx');
            $x = \App\Helpers\ZhtHelper\CloudStorage\Helper_MinIO::deleteBucket($varUserSession, 'xxx');
            dd($x);
            
            
            /*
            $ObjMinIO = new \Aws\S3\S3Client([
                'version' => 'latest',
                'region'  => 'us-east-1',
                'endpoint' => 'http://172.28.0.7:9000',
                'use_path_style_endpoint' => true,
                'credentials' => [
                    'key'    => \App\Helpers\ZhtHelper\System\Helper_Environment::getLaravelEnvironment('MINIO_KEY'),
                    'secret' => \App\Helpers\ZhtHelper\System\Helper_Environment::getLaravelEnvironment('MINIO_SECRET'),
                    ],
                'bucket' => \App\Helpers\ZhtHelper\System\Helper_Environment::getLaravelEnvironment('MINIO_BUCKET')
                ]);*/
/*            $varRemoteFilePath = '/StagingArea';
            
            $ObjMinIO = \Illuminate\Support\Facades\Storage::createS3Driver([
                'driver' => 's3',
//                'endpoint' => \App\Helpers\ZhtHelper\System\Helper_Environment::getLaravelEnvironment('MINIO_ENDPOINT'),
                'endpoint' => 'http://172.28.0.9:9000',
                'key'    => \App\Helpers\ZhtHelper\System\Helper_Environment::getLaravelEnvironment('MINIO_KEY'),
                'secret' => \App\Helpers\ZhtHelper\System\Helper_Environment::getLaravelEnvironment('MINIO_SECRET'),
                'region' => \App\Helpers\ZhtHelper\System\Helper_Environment::getLaravelEnvironment('MINIO_REGION'),
                'bucket' => \App\Helpers\ZhtHelper\System\Helper_Environment::getLaravelEnvironment('MINIO_BUCKET')
                ]);
            
            $varRotateLog_FileUploadStagingArea_RefRPK = 8;
            $varSignRecordID = 8;*/
/*            (new \App\Models\CloudStorage\DefaultClassPrototype())->copyFileToCloud(
                $varUserSession, 
                \App\Helpers\ZhtHelper\LocalStorage\Helper_LocalStorage::getBasePath($varUserSession).'Application/Upload/StagingArea/'.$varRotateLog_FileUploadStagingArea_RefRPK.'/'.$varSignRecordID, 
                'StagingArea/'.$varRotateLog_FileUploadStagingArea_RefRPK.'/'.$varSignRecordID
                );
*/
            
            $varLocalFilePath = \App\Helpers\ZhtHelper\LocalStorage\Helper_LocalStorage::getBasePath($varUserSession).'Application/Upload/StagingArea/'.$varRotateLog_FileUploadStagingArea_RefRPK.'/'.$varSignRecordID;
            $varRemoteFilePath = 'StagingArea/'.$varRotateLog_FileUploadStagingArea_RefRPK.'/'.$varSignRecordID;

            //dd(file_get_contents($varLocalFilePath));

            $x = $ObjMinIO->put($varRemoteFilePath, file_get_contents($varLocalFilePath));
            dd($x);
            
            
            //\Illuminate\Support\Facades\Storage::directories()
            //dd($ObjMinIO->);            
            dd($ObjMinIO->exists($varRemoteFilePath));
            
            
            
   //         dd($ObjMinIO->ex  ($varRemoteFilePath));
            //dd($ObjMinIO->getConfig());
            
            
/*            $ObjMinIO = \Illuminate\Support\Facades\Storage::createS3Driver([
                'driver' => 's3',
                'endpoint' => \App\Helpers\ZhtHelper\System\Helper_Environment::getLaravelEnvironment('MINIO_ENDPOINT'),
                'key'    => \App\Helpers\ZhtHelper\System\Helper_Environment::getLaravelEnvironment('MINIO_KEY'),
                'secret' => \App\Helpers\ZhtHelper\System\Helper_Environment::getLaravelEnvironment('MINIO_SECRET'),
                'region' => \App\Helpers\ZhtHelper\System\Helper_Environment::getLaravelEnvironment('MINIO_REGION'),
                'bucket' => \App\Helpers\ZhtHelper\System\Helper_Environment::getLaravelEnvironment('MINIO_BUCKET')
                ]);

            \Symfony\Component\HttpFoundation\Session\Storage::disk('s3')->
            
            dd($ObjMinIO);
*/

            
            /*$x = \App\Helpers\ZhtHelper\CloudStorage\Helper_MinIO::moveFile(
                $varUserSession, 
                'StagingArea/'.'1'.'/'.'1', 
                'Archive/'.'1'.'/'.'1'
                );*/
            //$x = (new \App\Models\Database\SchSysConfig\General)->getDataList_RotateLog_FileUploadStagingAreaDetail($varUserSession, 6);
/*            
            $x = (new \App\Models\Database\SchData_OLTP_Master\TblCitizenFamilyCard())->setDataInsert(
                $varUserSession, 
                null, 
                null, 
                12300001, 
                null, 
                'CardNumber', 
                '2021-01-01', 
                'CardSerialNumber'
                );
            
            
            dd($x);
            
*/            
            
            
            /*
            $varBufferData = (new \App\Models\Database\SchSysConfig\General())->getDataList_RotateLog_FileUploadStagingAreaDetail(
                    $varUserSession, 
                    203
                    );
             
             */
            /*
                for($i=0; $i!=count($varBufferData); $i++)
                    {
                    $x = (new \App\Models\Database\SchData_OLTP_DataAcquisition\TblLog_FileUpload_ObjectDetail())->setDataInsert(
                        $varUserSession, 
                        null, 
                        '2021', 
                        11, 
                        22, 
                        $varBufferData[$i]['Sequence'], 
                        $varBufferData[$i]['Name'], 
                        $varBufferData[$i]['Size'], 
                        $varBufferData[$i]['MIME'], 
                        $varBufferData[$i]['Extension'], 
                        $varBufferData[$i]['LastModifiedDateTimeTZ'], 
                        $varBufferData[$i]['LastModifiedUnixTimestamp']
                        );
                    var_dump($x);
                    }
            */
            //dd($x);
            
            
            //echo (new \App\Models\Database\SchSysConfig\General())->getYearByDate($varUserSession, '2021-01-01');
            echo "<br><br>";
            
            /*
            $varPointer_RefID = (new \App\Models\Database\SchData_OLTP_DataAcquisition\TblLog_FileUpload_Object)->setDataInsert(
                    $varUserSession, 
                    null, 
                    '2020',
                    1,
                    111
                    )['SignRecordID'];
            dd($varPointer_RefID);*/
  
//            echo (new \App\Models\Database\SchSysConfig\General())->getCurrentYear($varUserSession);
            
            
//            $x = \App\Helpers\ZhtHelper\CloudStorage\Helper_MinIO::getFileList($varUserSession, 'StagingFiles');
            
//            $x = \App\Helpers\ZhtHelper\LocalStorage\Helper_LocalStorage::isFileExist($varUserSession, 'Upload/StagingFiles/32', 'Application/');
//            $x = \App\Helpers\ZhtHelper\LocalStorage\Helper_LocalStorage::isFileExist($varUserSession, 'Application/Upload/StagingFiles/32');

//            $x = \App\Helpers\ZhtHelper\LocalStorage\Helper_LocalStorage::getBasePath($varUserSession);
                       
//            $x = \App\Helpers\ZhtHelper\CloudStorage\Helper_MinIO::putFile($varUserSession, \App\Helpers\ZhtHelper\LocalStorage\Helper_LocalStorage::getBasePath($varUserSession).'Application/Upload/StagingFiles/999.txt', 'StagingFiles/999.txt');

//            $x = \App\Helpers\ZhtHelper\LocalStorage\Helper_LocalStorage::isFileExist($varUserSession, 'Upload/StagingFiles/32');

            
            //$x = \Illuminate\Support\Facades\Storage::disk('local')->exists('Application/Upload/StagingFiles/32');
            
            //$x = \App\Helpers\ZhtHelper\CloudStorage\Helper_MinIO::putFile($varUserSession, , 'StagingFiles')
            
            //\Illuminate\Support\Facades\Storage::disk('local')->put('Upload\StagingFiles\file.txt', 'Contents');
            
            //\App\Helpers\ZhtHelper\LocalStorage\Helper_LocalStorage::createFile($varUserSession, 'xxx', 'Upload/StagingFiles/999.txt');
            
            //$x = \App\Models\CloudStorage\DefaultClassPrototype::createFile($varUserSession, '', 'StagingFiles');
            //dd($x);
  
            
            //(new \App\Models\CloudStorage\DefaultClassPrototype())->createFile($varUserSession, '', 'xxx', 'erp-reborn');
            
            
            $PathFile = getcwd().'/../../Project/ERPReborn-PermanentStorage/MinIO/StagingFiles/ContohTextFile.txt';
            echo $PathFile;
            echo "<br>";
            echo is_file($PathFile);
            
            
            /*
            echo '<script language="javascript">'.
                    'function xxx(varObj)'.
                        '{'.
                        'var varObjFileList = varObj.files; '.                        
                        'var varAccumulatedFiles = 0; '.
                        'var varJSONDataBuilder = ""; '.

                        'for(var i = 0; i < varObjFileList.length; i++)'.
                            '{'.
                            '(function(varObjCurrentFile, i) {'.
                                'var varObjFileReader = new FileReader(); '.
                                'varObjFileReader.onloadend = function(event) {'.
                                    'varAccumulatedFiles++; '.
                                    'if(varAccumulatedFiles != 1) {'.
                                        'varJSONDataBuilder = varJSONDataBuilder + ", "; '.
                                        '}'.
                                    //'var varFileName = varObjCurrentFile.name; '.
                                    //'alert(varFileName.replace(/\'/g, "\\\\\'")); '.
                                    'varJSONDataBuilder = varJSONDataBuilder + "{\"index\" : " + (i) +", \"name\" : \"" + (varObjCurrentFile.name   ) + "\", \"size\" : \"" + (varObjCurrentFile.size) + "\", \"MIME\" : \"" + ((event.target.result.split(",")[0]).match(/[^:\s*]\w+\/[\w-+\d.]+(?=[;| ])/)[0]) + "\", \"extension\" : \"" + (varObjCurrentFile.name.split(\'.\').pop().toLowerCase()) + "\", \"contentBase64\" : \"" + (event.target.result.substr(event.target.result.indexOf(\',\') + 1)) + "\"}"; '. 
                                    'if(varAccumulatedFiles == varObjFileList.length) '.
                                        '{'.
                                        'varJSONDataBuilder = "{\"fileCount\" : " + varObjFileList.length + ", \"dataFiles\" : [ " + varJSONDataBuilder + " ] }";'.
                                        'document.getElementById("MyDiv").innerHTML = varJSONDataBuilder; '.
                                        'alert("done");'.
                                        '}'.
                                    '}; '.
                                'varObjFileReader.readAsDataURL(varObjCurrentFile);'.
                                '})(varObjFileList[i], i);'.
                            '}'.
                        '}'.
                    '</script>';

            echo '<form id="upload-form" action="handler.php" method="POST">';
            echo    '<input id="file-select-input" multiple="multiple" type="file" onChange="javascript:xxx(this);" />';
            echo    '<div id="MyDiv" />';
            echo    '<button id="upload-button">Upload</button>';
            echo '</form>';
            
             */
            }


            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            



        public function testPDF()
            {
            //echo is_file(getcwd().'/fonts/arial-unicode-ms.ttf');
            
//            \TCPDF_FONTS::addTTFfont(getcwd().'/fonts/arial-unicode-ms.ttf', 'TrueTypeUnicode', '', 32);           
            
            $pdf = new \TCPDF();
            
            $pdf->setFontSubsetting(true);
            \TCPDF_FONTS::addTTFfont(getcwd().'/fonts/ARIALUNI.TTF', 'TrueTypeUnicode', '', 32);            

$pdf->SetFont('dejavusans', '', 12); // several fonts in TCPDF/fonts work
$pdf->SetFont('freeserif', '', 12); // several fonts in TCPDF/fonts work
$pdf->AddPage();
//$txt = <<<EOD
//$txt
//EOD;



$txt = <<<EOD
﷼
مرحبا يا عالم
hello world
EOD;

$txt = '﷼';
$txt = <<<EOD
$txt

EOD;


//$pdf->setRTL(true); // optional here, depends on the desired BASE direction
//$pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0); // 'C' for centered
$pdf->MultiCell(100, 100, $txt, 1);
$pdf->Output('hello_world_in_Arabic.pdf', 'I');
            
            

/*            
            $varUserSession = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
            
            
            $x = new \zhtSDK\Software\PDF\TCPDF\zhtSDK($varUserSession);
            
            $ObjPDF = \App\Helpers\ZhtHelper\Report\Helper_PDF::init($varUserSession);
            
            $ObjPDF->SetCreator(PDF_CREATOR);
            $ObjPDF->SetAuthor('Our Code World');
            $ObjPDF->AddPage();
            $ObjPDF->Write(0, \App\Helpers\ZhtHelper\System\Helper_Environment::getLaravelEnvironment('APP_NAME'));
  */              

            //echo is_file(getcwd().'/../vendor/elibyy/tcpdf-laravel/src/TCPDF.php');
            
            //$ObjPDF = \App\Helpers\ZhtHelper\Report\Helper_PDF::init($varUserSession);
            
            //$ObjPDF->SetTitle('Hello World');
            //$ObjPDF->AddPage();
           // $ObjPDF->Write(0, 'Hello World');
            
            //echo $varReturn = \App\Helpers\ZhtHelper\Report\Helper_PDF::getDataStream($varUserSession, $ObjPDF);
            
            //$varReturn = \App\Helpers\ZhtHelper\System\BackEnd\Helper_APIReport::getJSONEncode_PDFData($varUserSession, $ObjPDF);
            
            //echo $varReturn = \App\Helpers\ZhtHelper\System\BackEnd\Helper_APIReport::getJSONDecode_PDFData($varUserSession, $varReturn);
            
            
            //$varReturn = \App\Helpers\ZhtHelper\Report\Helper_PDF::getDataStream($varUserSession, $ObjPDF);
            //\App\Helpers\ZhtHelper\Report\Helper_PDF::setDataStreamToDisplay($varUserSession, $varReturn, 'xxx.pdf');
            }
            
            
        public function testClass()
            {
            $varUserSession = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
            $varBranchID = 11000000000004;
            
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2MjQ1ODQyMjZ9.YKkMFb_cTmXXPhEPd2ZdvlyGMs3_wHcMAgIpRb1kZoY';

            $x = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecutionDataFetch_DataOnly_Specific($varUserSession, 4000000000001);

            //$x = (new \App\Models\Database\SchSysConfig\General())->isSet_UserSessionBranchAndUserRole($varUserSession, $varAPIWebToken);
            
            //$x = (new \App\Models\Database\SchData_OLTP_Master\TblCountry())->getDataRecord($varUserSession, $varBranchID);
            //$x = (new \App\Models\Database\SchData_OLTP_Budgeting\General())->getDataList_Budget($varUserSession, $varBranchID);
            //$x = (new \App\Models\Database\SchData_OLTP_Budgeting\General())->getDataList_BudgetExpenseCeilingObjects($varUserSession, $varBranchID, 106000000000001);
            /*$x = (new \App\Models\Database\SchData_OLTP_Budgeting\TblBudget())->setDataInsert(
                $varUserSession, 
                null, 
                null,
                $varBranchID,
                'Budget Non Project 2019',
                '2019-01-01 00:00:00 +07',
                '2019-12-31 23:59:00 +07'
                );*/

            var_dump($x);
            
            
            
            /*          
            $x = (new \zhtSDK\Device\Goodwin\SwingGateBarrier\ServoSW01\zhtSDK(
                    $varUserSession,
                    ))->getDataAttendanceFromLocalDatabase(
                        '/zhtConf/tmp/download/SwingBarrierGate.mdb',
                        '"SchData-OLTP-DataAcquisition"."TblTemp_Device_SwingGateBarrier_CheckInOut"',
                        '+07',
                        '2021-01-01 00:00:00'
                        );
            var_dump($x);*/
            }

            
           
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
        public function webServices()
            {           
            $varDataReceive = \App\Helpers\ZhtHelper\System\Helper_HTTPRequest::getRequest(000000);
            
            //\App\Helpers\ZhtHelper\System\Helper_HTTPRequest::getHeader(000000);
            
            
            //echo "<br>Data Masuk : ";
            //var_dump($varDataReceive);
            //echo "<br>";
            
            $varDataSend = ['message' => 'Sukses alhamdulillah'];
            
            //\App\Helpers\ZhtHelper\System\Helper_HTTPRequest::setResponse(000000, $varDataSend);
            
            //return response()->json(['name' => 'Virat Gandhi', 'state' => 'Gujarat']);
            return \App\Helpers\ZhtHelper\System\Helper_HTTPRequest::setResponse(000000, $varDataSend);
            }

            

        public function testSDK()
            {
            $varUserSession = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();

            $x = (new \App\Models\Database\SchData_OLTP_Master\General())->getData_CentralBankCurrencyExchangtMiddleRateByCurrencyISOCode($varUserSession, '2021-01-01', 'AUD', 'ID2');
            dd($x);
            
            
            
                $varAPIWebToken = (new \App\Models\Database\SchSysConfig\General())->getAPIWebToken_SysEngine($varUserSession);
                $varCurrentDateTimeTZ = (new \App\Models\Database\SchSysConfig\General())->getCurrentDateTimeTZ($varUserSession);

/*
                //---> Pengambilan Data dari Online
                $varDataOnline = \App\Helpers\ZhtHelper\System\BackEnd\Helper_APICall::setCallAPIGateway(
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                    $varAPIWebToken, 
                    'instruction.server.internal.webBackEnd.webSiteScraper.www_bi_go_id.getDataCurrentExhangeRate',
                    'latest', 
                    [
                    ]
                    );
                
                
                if($varDataOnline['metadata']['HTTPStatusCode']==200)
                    {
                    
                    //throw new \Exception(json_encode($varDataOnline['metadata']['HTTPStatusCode']));

                    for($i=0; $i!=count($varDataOnline['data']); $i++)
                        {
                        (new \App\Models\Database\SchData_OLTP_Master\TblCurrencyExchangeRateCentralBank())->setDataImport(
                            $varUserSession, 
                            $varDataOnline['data'][$i]['validStartDateTimeTZ'],
                            $varDataOnline['data'][$i]['ISOCode'],
                            $varDataOnline['data'][$i]['exchangeRateBuy'],
                            $varDataOnline['data'][$i]['exchangeRateSell']
                            );
                        }
                    }

*/
            
//$x = (new \App\Models\Database\SchData_OLTP_Master\TblCurrency())->getCurrencyIDByISOCode($varUserSession, 'USD');
//var_dump($x);
            //$x = (new \App\Models\Cache\General\APIWebToken())->getAllDataRecord($varUserSession);
            //dd($x);
            
            /*
                        $varURL = 'https://www.bi.go.id/id/statistik/informasi-kurs/transaksi-bi/Default.aspx';
                        $ch = curl_init($varURL);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                        $varResponse = curl_exec($ch);
                        curl_close($ch);
            
                        $varDate = \App\Helpers\ZhtHelper\General\Helper_DateTime::getDateFromIndonesianDateString($varUserSession, explode('</span>', explode('Update Terakhir&nbsp;<span>', explode('<table', $varResponse)[1])[1])[0]);
                        $varData['Validity']['StartDateTimeTZ'] = $varDate.' 00:00:00 +07';
                        $varData['Validity']['FinishDateTimeTZ'] = $varDate.' 23:59:59 +07';
                        
                        $varResponse = explode('<tr>', explode('<tbody>', explode('</table', explode('<table', $varResponse)[2])[0])[1]);
                        for ($i=1; $i!=count($varResponse); $i++)
                            {
                            $varResponseSplit = explode('<td', $varResponse[$i]);
                            $varISOCode = trim(explode('<', explode('class="text-right">', $varResponseSplit[1])[1])[0]);
                            $varBaseCurrencyRatio = (int) trim(explode('<', explode('class="text-right">', $varResponseSplit[2])[1])[0]);
                            $varExchangeRateSell = number_format((((float) str_replace(',', '.', str_replace('.', '', trim(explode('<', explode('class="text-right">', $varResponseSplit[3])[1])[0])))) / $varBaseCurrencyRatio), 2, '.', '');
                            $varExchangeRateBuy = number_format((((float) str_replace(',', '.', str_replace('.', '', trim(explode('<', explode('class="text-right">', $varResponseSplit[4])[1])[0])))) / $varBaseCurrencyRatio), 2, '.', '');
                            $varExchangeRateMiddle = number_format((((float) $varExchangeRateSell + (float) $varExchangeRateBuy) / 2), 2, '.', '');
                            var_dump($varISOCode).' ---> '.var_dump($varExchangeRateSell).' ---> '.var_dump($varExchangeRateBuy).' ---> '.var_dump($varExchangeRateMiddle);
//                            dd($varResponseSplit[2]);
                            echo "<br><br>---------------<br><br>";
                            }
            */

/*
                        $varPathFile = '/zhtConf/tmp/download/Kurs-BI-20130102-20200203/Kurs-BI-USD.html';
                        if(is_file($varPathFile)==true)
                            {
                            $varResponse = file_get_contents($varPathFile);
                            
                            $varISOCode = trim(explode('</span>', explode('MATA UANG', $varResponse)[1])[0]);
                            
                            
                                                       
                            $varResponse = explode('<tr>', explode('<tbody>', explode('</table', explode('<table', $varResponse)[1])[0])[1]);
                           
                            for ($i=2; $i!=count($varResponse); $i++)
                                {
                                $varResponseSplit = explode('<td', $varResponse[$i]); 
                                //$varBaseCurrencyRatio = (int) trim(explode('<', explode('class="text-right">', $varResponseSplit[1])[0])[0]);
                                $varBaseCurrencyRatio = (int) trim(explode('>', explode('</', $varResponseSplit[1])[0])[1]);
                                $varExchangeRateSell = number_format(((float) str_replace(',', '.', str_replace('.', '', trim(explode('>', explode('</', $varResponseSplit[2])[0])[1]))) / $varBaseCurrencyRatio), 2, '.', '');
                                $varExchangeRateBuy = number_format(((float) str_replace(',', '.', str_replace('.', '', trim(explode('>', explode('</', $varResponseSplit[3])[0])[1]))) / $varBaseCurrencyRatio), 2, '.', '');
                                $varExchangeRateMiddle = number_format((((float) $varExchangeRateSell + (float) $varExchangeRateBuy) / 2), 2, '.', '');
                                $varStartDateTimeTZ = \App\Helpers\ZhtHelper\General\Helper_DateTime::getDateFromIndonesianDateString($varUserSession, trim(explode('>', explode('</', $varResponseSplit[4])[0])[1])).' 00:00:00 +07';
//                                var_dump($varISOCode).' ---> '.var_dump($varExchangeRateSell).' ---> '.var_dump($varExchangeRateBuy).' ---> '.var_dump($varExchangeRateMiddle);
  //                              echo "<br><br>---------------<br><br>";
                                $varData[count($varResponse)-$i-1] = [
                                    'ValidStartDateTimeTZ' => $varStartDateTimeTZ,
                                    'ValidFinishDateTimeTZ' => '9999-12-31 23:59:59 +07',
                                    'ExchangeRateBuy' => $varExchangeRateBuy,
                                    'ExchangeRateSell' => $varExchangeRateSell
                                    ]; 
                                }
                            for($i=0; $i!=(count($varData)-1); $i++)
                                {
                                $varData[$i]['ValidFinishDateTimeTZ'] = date('Y-m-d H:i:s', (\App\Helpers\ZhtHelper\General\Helper_DateTime::getUnixTime($varUserSession, $varData[$i+1]['ValidStartDateTimeTZ']) - 1)).' +07';
                                }
                                
                                
                            dd($varData);
                            //dd($varResponse);
                            }
                        
                        //$varResponse = explode('<table', $varResponse)[2];

                        
                        //dd($varResponse);
            
                        //dd($varData);
            
            
*/            
            
            
            
            
            
            
            
//var_dump(openssl_get_cert_locations());
            
//$client = new \GuzzleHttp\Client();
//$res = $client->request('GET', 'https://fiskal.kemenkeu.go.id/informasi-publik/kurs-pajak?date=02-01-2013');
//echo $res->getStatusCode();

//CURLOPT_SSL_VERIFYPEER => 0,
/*
$varDate =  '02-01-2013'; 
$varDate =  '02-12-2013'; 
$varURL = 'https://fiskal.kemenkeu.go.id/informasi-publik/kurs-pajak?date='.$varDate;
$ch = curl_init($varURL);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
$varResponse = curl_exec($ch);
curl_close($ch);

$varReturn=null;
$varResponse = (explode('<!-- FOOTER -->', (explode('<h1 class="jumbo-header">Kurs Pajak</h1>', $varResponse))[1]))[0];
$varReturn['KMK']['Number'] = (string) explode('</strong></p>', explode('<p><strong>', (explode('Tanggal Berlaku:', $varResponse))[0])[1])[0];
$varReturn['KMK']['StartDateTime'] = \App\Helpers\ZhtHelper\General\Helper_DateTime::getDateFromIndonesianDateString($varUserSession, trim(explode('-', trim(explode('</i>', explode('<i> Tanggal Berlaku:', $varResponse)[1])[0]))[0]));
$varReturn['KMK']['FinishDateTime'] = \App\Helpers\ZhtHelper\General\Helper_DateTime::getDateFromIndonesianDateString($varUserSession, trim(explode('-', trim(explode('</i>', explode('<i> Tanggal Berlaku:', $varResponse)[1])[0]))[1]));
$varResponse = explode('<tr>', explode('</tbody>', explode('<tbody>', (explode('<div class="table-responsive">', $varResponse))[1])[1])[0]);

//var_dump($varResponse[1]);

for($i=0; $i!=25; $i++)
    {
    $varISOCode = explode(')</td>', explode('(', explode('<td', $varResponse[$i+1])[2])[1])[0];
    $varExchangeRate = number_format((float) str_replace(',', '.', str_replace('.', '', explode('>', explode('</', explode('div', explode('<td', $varResponse[$i+1])[3])[1])[0])[1])), 2, '.', '');
    $varReturn['ExchangeRate'][$varISOCode] = number_format((float) $varExchangeRate * (strcmp($varISOCode, 'JPY')==0 ? (1/1000) : 1), 2, '.', '');
    }


/*
$varReturn['ExchangeRate']['USD'] = number_format((float) str_replace(',', '.', str_replace('.', '', explode('>', explode('</', explode('div', $varResponse[1])[1])[0])[1])), 2, '.', '');
$varReturn['ExchangeRate']['AUD'] = number_format((float) str_replace(',', '.', str_replace('.', '', explode('>', explode('</', explode('div', $varResponse[2])[1])[0])[1])), 2, '.', '');
$varReturn['ExchangeRate']['CAD'] = number_format((float) str_replace(',', '.', str_replace('.', '', explode('>', explode('</', explode('div', $varResponse[3])[1])[0])[1])), 2, '.', '');
$varReturn['ExchangeRate']['DKK'] = number_format((float) str_replace(',', '.', str_replace('.', '', explode('>', explode('</', explode('div', $varResponse[4])[1])[0])[1])), 2, '.', '');
$varReturn['ExchangeRate']['HKD'] = number_format((float) str_replace(',', '.', str_replace('.', '', explode('>', explode('</', explode('div', $varResponse[5])[1])[0])[1])), 2, '.', '');
$varReturn['ExchangeRate']['MYR'] = number_format((float) str_replace(',', '.', str_replace('.', '', explode('>', explode('</', explode('div', $varResponse[6])[1])[0])[1])), 2, '.', '');
$varReturn['ExchangeRate']['NZD'] = number_format((float) str_replace(',', '.', str_replace('.', '', explode('>', explode('</', explode('div', $varResponse[7])[1])[0])[1])), 2, '.', '');
$varReturn['ExchangeRate']['NOK'] = number_format((float) str_replace(',', '.', str_replace('.', '', explode('>', explode('</', explode('div', $varResponse[8])[1])[0])[1])), 2, '.', '');
$varReturn['ExchangeRate']['GBP'] = number_format((float) str_replace(',', '.', str_replace('.', '', explode('>', explode('</', explode('div', $varResponse[9])[1])[0])[1])), 2, '.', '');
$varReturn['ExchangeRate']['SGD'] = number_format((float) str_replace(',', '.', str_replace('.', '', explode('>', explode('</', explode('div', $varResponse[10])[1])[0])[1])), 2, '.', '');
$varReturn['ExchangeRate']['SEK'] = number_format((float) str_replace(',', '.', str_replace('.', '', explode('>', explode('</', explode('div', $varResponse[11])[1])[0])[1])), 2, '.', '');
$varReturn['ExchangeRate']['CHF'] = number_format((float) str_replace(',', '.', str_replace('.', '', explode('>', explode('</', explode('div', $varResponse[12])[1])[0])[1])), 2, '.', '');
$varReturn['ExchangeRate']['JPY'] = number_format((float) str_replace(',', '.', str_replace('.', '', explode('>', explode('</', explode('div', $varResponse[13])[1])[0])[1])), 2, '.', '');
$varReturn['ExchangeRate']['JPY'] = number_format($varReturn['ExchangeRate']['JPY'] / 100, 2, '.', '');
$varReturn['ExchangeRate']['MMK'] = number_format((float) str_replace(',', '.', str_replace('.', '', explode('>', explode('</', explode('div', $varResponse[14])[1])[0])[1])), 2, '.', '');
$varReturn['ExchangeRate']['INR'] = number_format((float) str_replace(',', '.', str_replace('.', '', explode('>', explode('</', explode('div', $varResponse[15])[1])[0])[1])), 2, '.', '');
$varReturn['ExchangeRate']['KWD'] = number_format((float) str_replace(',', '.', str_replace('.', '', explode('>', explode('</', explode('div', $varResponse[16])[1])[0])[1])), 2, '.', '');
$varReturn['ExchangeRate']['PKR'] = number_format((float) str_replace(',', '.', str_replace('.', '', explode('>', explode('</', explode('div', $varResponse[17])[1])[0])[1])), 2, '.', '');
$varReturn['ExchangeRate']['PHP'] = number_format((float) str_replace(',', '.', str_replace('.', '', explode('>', explode('</', explode('div', $varResponse[18])[1])[0])[1])), 2, '.', '');
$varReturn['ExchangeRate']['SAR'] = number_format((float) str_replace(',', '.', str_replace('.', '', explode('>', explode('</', explode('div', $varResponse[19])[1])[0])[1])), 2, '.', '');
$varReturn['ExchangeRate']['LKR'] = number_format((float) str_replace(',', '.', str_replace('.', '', explode('>', explode('</', explode('div', $varResponse[20])[1])[0])[1])), 2, '.', '');
$varReturn['ExchangeRate']['THB'] = number_format((float) str_replace(',', '.', str_replace('.', '', explode('>', explode('</', explode('div', $varResponse[21])[1])[0])[1])), 2, '.', '');
$varReturn['ExchangeRate']['BND'] = number_format((float) str_replace(',', '.', str_replace('.', '', explode('>', explode('</', explode('div', $varResponse[22])[1])[0])[1])), 2, '.', '');
$varReturn['ExchangeRate']['EUR'] = number_format((float) str_replace(',', '.', str_replace('.', '', explode('>', explode('</', explode('div', $varResponse[23])[1])[0])[1])), 2, '.', '');
$varReturn['ExchangeRate']['CNY'] = number_format((float) str_replace(',', '.', str_replace('.', '', explode('>', explode('</', explode('div', $varResponse[24])[1])[0])[1])), 2, '.', '');
$varReturn['ExchangeRate']['KRW'] = number_format((float) str_replace(',', '.', str_replace('.', '', explode('>', explode('</', explode('div', $varResponse[25])[1])[0])[1])), 2, '.', '');
*/

// do anything you want with your response
//

//dd($varReturn);





            //---Parameter Set---
            //\App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::
//            (new \App\Models\Database\SchSysConfig\General::class)->
            
  //          SELECT "SchSysConfig"."FuncSys_General_GetAPIWebToken_SysEngine"()
            //---Core---
            
 
 //           $varUserSession = \App\Helpers\ZhtHelper\System\Helper_Environment::getFrontEndConfigEnvironment(0, 'USER_SESSION_ID_SYSTEM');
  //          $varAPIWebToken = (new \App\Models\Database\SchSysConfig\General())->getAPIWebToken_SysEngine($varUserSession);
            
            
            
//            dd((new \App\Models\Cache\General\APIWebToken())->getAllDataRecord($varUserSession));
//            (new \App\Models\Cache\General\APIWebToken())->setDataExpireAt($varUserSession, $varAPIWebToken, '2021-01-25 14:10:00');

//$varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYxMTY0OTg4MH0.b8sC25pQR8WIebqTxKUIvP4WATtKMJwGA81yh1DZhsg';
//dd((new \App\Models\Cache\General\APIWebToken())->getAllDataRecord($varUserSession));

            
            //(new \App\Http\Controllers\Application\BackEnd\System\Scheduler\Engines\everyMinute\system\setJobs\v1\setJobs())->setAPIWebTokenSysEngine(000);
            
            
//            $x = \App\Helpers\ZhtHelper\Cache\Helper_Redis::getAllRecord(0, 'ERPReborn::APIWebToken::');
//            dd($x);
            
/*
            $x = \App\Helpers\ZhtHelper\System\BackEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                //(new \App\Models\Database\SchSysConfig\General())->getAPIWebToken_SysEngine($varUserSession),
                'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYxMTY0OTg4MH0.b8sC25pQR8WIebqTxKUIvP4WATtKMJwGA81yh1DZhsg',
                'environment.general.session.getUserPrivilegesMenu', 
                'latest', 
                [
                ]
                );
            dd($x);
*/

//            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYxMTY0OTg4MH0.b8sC25pQR8WIebqTxKUIvP4WATtKMJwGA81yh1DZhsg';
/*
$x = (new \App\Models\Database\SchSysConfig\General())->getCurrentYear($varUserSession);
//$x = (new \App\Models\Database\SchSysConfig\General())->getCurrentDateTimeTZ($varUserSession);
dd($x);
            
            
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYxMTY1NTkwN30.YAzgSdGcWbh10uJufmVbjyO2J3bhBoMg7ZDVkqxqD1Q';
            $varAPIWebToken = (new \App\Models\Database\SchSysConfig\General())->getAPIWebToken_SysEngine($varUserSession);
            //dd($varAPIWebToken);
//$varDataSession = \App\Helpers\ZhtHelper\General\Helper_Session::get(\App\Helpers\ZhtHelper\System\Helper_Environment::getApplicationID());
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\BackEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'instruction.device.fingerprintAttendance.Solution.x601.getDataAttendance', 
                'latest', 
                [
                'entities' => [
                    'IPAddress' => '192.168.1.203',
                    'port' => 4370, 
                    'serialNumber' => 'AEYU202860040',
                    'timeZoneOffset' => '+07',
                    'startDateTime' => '2021-01-01'
                    ]
                ]
                );
//echo "xxx";
            var_dump(json_encode($varData));
            
*/            
            
/*    
            //---Parameter Set---
            $varAPIWebToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYxMTY1NTkwN30.YAzgSdGcWbh10uJufmVbjyO2J3bhBoMg7ZDVkqxqD1Q';
            $varAPIWebToken = (new \App\Models\Database\SchSysConfig\General())->getAPIWebToken_SysEngine($varUserSession);
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\BackEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.read.master.getDataListTradeMark', 
                'latest', 
                [
                'SQLStatement' => [
                    'pick' => null,
                    'sort' => null,
                    'filter' => null,
                    'paging' => null
                    ]
                ]
                );
            var_dump($varData);
            
*/            
            
            
            
            
            
            
            
/*
        echo "Contacting Machine...\n";

    $KEY='';
    
    $Connect = fsockopen('192.168.16.111', 80, $errno, $errstr, 3);
    if($Connect) {
        $soap_request="<?xml version=\"1.0\" standalone=\"no\"?><SOAP-ENV:Envelope xmlns:SOAP-ENV=\"http://schemas.xmlsoap.org/soap/envelope/\"><SOAP-ENV:Body><GetUserTemplate><ArgComKey xsi:type=\"xsd:integer\">".$KEY."</ArgComKey><Arg><PIN xsi:type=\"xsd:integer\">1</PIN><FingerID xsi:type=\"xsd:integer\">1</FingerID></Arg></GetUserTemplate></SOAP-ENV:Body></SOAP-ENV:Envelope>";
        $newLine="\r\n";
        fputs($Connect, "POST /iWsService HTTP/1.0".$newLine);
        fputs($Connect, "Content-Type: text/xml".$newLine);
        fputs($Connect, "Content-Length: ".strlen($soap_request).$newLine.$newLine);
        fputs($Connect, $soap_request.$newLine);
        $buffer="";
        while($Response=fgets($Connect, 1024)){
            $buffer=$buffer.$Response;
            }
        } 
    else 
        die("Koneksi Gagal\n");

    print_r($buffer);


*/
            
            
            
            
            
            
//            $x = new \zhtSDK\Device\Solution\FingerprintAttendance\x601\zhtSDK($varUserSession, '192.168.1.203', 4370, 'AEYU202860040');
//            $x = new \zhtSDK\Device\ALBox\FingerprintAttendance\FP800\zhtSDK($varUserSession, '192.168.10.225', 4370, '0011142201014');
//            $x = new \zhtSDK\Device\ALBox\FingerprintAttendance\FP800\zhtSDK($varUserSession, '192.168.1.204', 4370, '2065682450035');
//            $y = $x->getDataAttendance('+07', '2020-01-01');
//            var_dump($y);
//            $y = $x->getDeviceSerialNumber();

//            $x = new \zhtSDK\Device\Goodwin\SwingGateBarrier\ServoSW01\zhtSDK($varUserSession, '192.168.16.111', 4370);
//            $x = new \zhtSDK\Device\Goodwin\SwingGateBarrier\ServoSW01\zhtSDK($varUserSession, '192.168.16.112', 14370);
//            echo  $x->getDeviceSerialNumber()."<br><br>";
//            echo  $x->getDeviceTime()."<br><br>";
            
            
//$x = new \zhtSDK\Device\Solution\FingerprintAttendance\x601\zhtSDK($varUserSession, '192.168.16.111', 4370, 'AEYU202860040');   
//$x = new \zhtSDK\Device\ALBox\FingerprintAttendance\FP800\zhtSDK($varUserSession, '192.168.16.111', 4370, '0011142201014');
//$y = $x->getDeviceSerialNumber();

//            $y = $x->getDataAttendance();
//            var_dump($y);

            echo "Done";
            }

        public function testMinIO()
            {
            \App\Helpers\ZhtHelper\General\Helper_Session::delete(\App\Helpers\ZhtHelper\System\Helper_Environment::getApplicationID());
            $varUserSession=0;
            
            //\App\Helpers\ZhtHelper\CloudStorage\Helper_MinIO::test();
            $x = (new \App\Models\CloudStorage\DefaultClassPrototype())->getBucketName($varUserSession);
            var_dump($x);
            echo '<br>~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~<br>';
            //$x = (new \App\Models\CloudStorage\DefaultClassPrototype())->($varUserSession);
            //echo \App\Helpers\ZhtHelper\CloudStorage\Helper_MinIO::deleteFile($varUserSession, 'MyImages/Logo-Application.png');
            //echo \App\Helpers\ZhtHelper\CloudStorage\Helper_MinIO::getFileURL($varUserSession, 'MyImages/Logo-Application.png');
            //\App\Helpers\ZhtHelper\CloudStorage\Helper_MinIO::isFileExist($varUserSession, 'MyImages/Logo-Application.png');
//            $x = \App\Helpers\ZhtHelper\CloudStorage\Helper_MinIO::getFileInfo($varUserSession, 'MyImages/Logo-Application.png');

/*            echo \App\Helpers\ZhtHelper\CloudStorage\Helper_MinIO::putFile($varUserSession, './../public/images/Logo-Application.png', 'MyImages/Logo-Application.png');
            echo \App\Helpers\ZhtHelper\CloudStorage\Helper_MinIO::putFile($varUserSession, './../public/images/Logo-Application.png', 'MyImages2/Logo-Application2.png');
            echo \App\Helpers\ZhtHelper\CloudStorage\Helper_MinIO::putFile($varUserSession, './../public/images/Logo-Application.png', 'MyImages2/MyImages2B/Logo-Application2B.png');
            $x = \App\Helpers\ZhtHelper\CloudStorage\Helper_MinIO::getFileList($varUserSession);
            var_dump($x);*/
            
            //$x = \App\Helpers\ZhtHelper\CloudStorage\Helper_MinIO::getAllDataRecord($varUserSession);
            //$x = \Illuminate\Support\Facades\DB::select('SELECT 1;');
            //$x = \Illuminate\Support\Facades\DB::
            
            //$x = (new \App\Models\Database\SchData_OLTP_Master\TblCitizenIdentity())->getAllDataRecord($varUserSession);
            //$x = (new \App\Models\Database\SchData_OLTP_Master\TblCountry())->getAllDataRecord($varUserSession);
            //$x = (new \App\Models\Database\SchSysConfig\TblLog_UserLoginSession)->getAllDataRecord($varUserSession);
            
            //$x = (new \App\Models\CloudStorage\DefaultClassPrototype())->getDataRecord($varUserSession, 'MyImages/Logo-Application.png');
            
            //$x = (new \App\Models\Database\SchSysConfig\TblDBObject_Schema())->setEmptyTableAndResetSequence($varUserSession);
            //$x = (new \App\Models\Database\SchSysConfig\TblDBObject_Schema())->getAllDataRecord($varUserSession);
            //$x = (new \App\Models\Database\SchSysConfig\TblDBObject_Table())->getAllDataRecord($varUserSession);
            $x = (new \App\Models\Database\SchData_OLTP_Budgeting\TblBudget())->getAllDataRecord($varUserSession, false);
            var_dump($x);
            }
            
            
            
            
            
        public function testModelDatabase()
            {
            \App\Helpers\ZhtHelper\General\Helper_Session::delete(\App\Helpers\ZhtHelper\System\Helper_Environment::getApplicationID());
            $varUserSession=4000000000399;
            $varUserSession=4000000000016;
//            $x = (new \App\Models\Database\SchData_OLTP_Master\TblBloodAglutinogenType())->getTableName($varUserSession);            
//            echo $x."<br>";
//            $x = (new \App\Models\Database\SchData_OLTP_Master\TblBloodAglutinogenType())->getSchemaName($varUserSession);            
//            echo $x."<br>";
//            echo '<br>~~~~~~~~<br>';

//            $x = (new \App\Models\Database\SchSysConfig\TblLog_UserLoginSession())->getDataRecord($varUserSession, 6000000000001);
//            var_dump($x);
            
//            echo '<br>~~~~~~~~<br>';
            //$x = (new \App\Models\Database\SchSysConfig\TblLog_UserLoginSession())->getAllDataRecord($varUserSession);
//            $x = (new \App\Models\Database\SchSysConfig\TblLog_UserLoginSession())->getDataRecord($varUserSession, 6000000000120);
//            var_dump($x);

//$x = (new \App\Models\Database\SchSysConfig\TblLog_UserLoginSession())->getAllFilteredDataRecord($varUserSession, '"APIWebToken" = \'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwMTg4MTQ4Mn0.0KJAcBDlk57gHYwRo69GCsxxZtqTpv5tU2emJdS-y-4\'');

            //$x = (new \App\Models\Database\SchSysConfig\General())->setUserSessionLogout($varUserSession, 6000000000141);

//SELECT * FROM "SchSysConfig"."FuncSys_General_GetBranchAccessListByUserID"(1::bigint)            
/*            $varData = (new \App\Models\Database\SchSysConfig\General())->getDataList_BranchAccess($varUserSession);
            
            for($i=0; $i!=count($varData); $i++)
                {
                $varDataUserRole = (new \App\Models\Database\SchSysConfig\General())->getDataList_UserRole($varUserSession, $varData[$i]['Sys_ID']);
                $varReturnUserRole = null;
                for($j=0; $j!=count($varDataUserRole); $j++)
                    {
                    if(!$varDataUserRole[$j]['Sys_ID'])
                        {
                        continue;
                        }
                    $varReturnUserRole[$j]=[
                        'UserRole_RefID' => $varDataUserRole[$j]['Sys_ID'],
                        'UserRoleName' => $varDataUserRole[$j]['UserRoleName'],
                        ];  
                    }
                $varReturn[$i]=[
                    'Branch_RefID' => $varData[$i]['Sys_ID'],
                    'BranchName' => $varData[$i]['BranchName'],
                    'UserRole' => $varReturnUserRole
                    ];
                }
            
            var_dump($varReturn);
            echo "<br><br>";
            
            
            */
            /*for($i=0; $i!=count($varData); $i++)
                {
                $varReturn[$i]=[
                    'Branch_RefID' => $varData[$i]['Sys_ID'],
                    'UserRoleName' => $varData[$i]['UserRoleName'],
                    'UserRole_RefID' => []
                    ];
                }
            
            var_dump($varReturn);*/
            //var_dump($varData);

//            $x = ((new \App\Models\Database\SchSysConfig\General())->getUserIDByName($varUserSession, 'teguh.pratama'));
            //
            
            //$x = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::isValid_SQLSyntax($varUserSession, 'SELECT NOW();');
            //$x = (new \App\Models\Database\SchSysConfig\General())->isValid_SQLSyntax($varUserSession, 'SELECT NOW();');
            
            //$x= (new \App\Models\Database\SchData_OLTP_Master\General())->getDataListCountry($varUserSession, 11000000000004, NULL, NULL, 'DROP ');
            
            
            //$x = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution($varUserSession, 'SELECT NOW();');
            
            
            //$x = \App\Helpers\ZhtHelper\General\Helper_Array::getArrayKeyRename_LowerFirstCharacter($varUserSession, ['AAA' => 'aaa', 'BBB' => 'bbb']);
            //$x = \App\Helpers\ZhtHelper\General\Helper_Array::getArrayKeyRename_LowerFirstCharacter($varUserSession, $x);
//            $x = \App\Helpers\ZhtHelper\General\Helper_Array::getArrayKeyRename_CamelCase($varUserSession, $x);
            //$x = \App\Helpers\ZhtHelper\Database\Helper_SQLValidation::isSecure_FilterStatement($varUserSession, 'WHERE (3 < (3+1)) OR "dfg" = "dfg" OR (\'fff = 123\') = (\'fff = 123\') OR ( "xxx" ILIKE \'myWord\' OR "xxx" ILIKE \'myWord123%\' OR "xxx" ILIKE \'%myWord456\' OR "xxx" LIKE \'%myWord789%\' OR \'zzz\' ILIKE \'ZZZ\' OR "AAA" ILIKE "AAA" OR "BBB" LIKE "BBB") OR 1=1 OR 3 = (1+2) OR "x"=89 OR (("x" > 2) AND ("x" < 25))');
            //$x = \App\Helpers\ZhtHelper\Database\Helper_SQLValidation::isSecure_FilterStatement($varUserSession, 'WHERE "dfg" = "dfg" OR (\'fff = 123\') = (\'fff = 123\') OR ( "xxx" ILIKE \'myWord\' OR "xxx" ILIKE \'myWord123%\' OR "xxx" ILIKE \'%myWord456\' OR "xxx" LIKE \'%myWord789%\' OR \'zzz\' ILIKE \'ZZZ\' OR "AAA" ILIKE "AAA" OR "BBB" LIKE "BBB")');
            //$x = \App\Helpers\ZhtHelper\Database\Helper_SQLValidation::isSecure_FilterStatement($varUserSession, 'WHERE "zzz2" NOT   LIKE "xxxx2" AND \'zzz\' NOT   LIKE \'xxxx\' AND "xxx" ILIKE "xxx" OR \'1234\' ILIKE (\'12\' || \'34\') OR "AAA" || \'xxx\' LIKE "AAA"');
            //$x = \App\Helpers\ZhtHelper\Database\Helper_SQLValidation::isSecure_FilterStatement($varUserSession, '"xxx" = 105; DROP TABLE "xxx"."yyy";');
            //$x = \App\Helpers\ZhtHelper\Database\Helper_SQLValidation::isSecure_FilterStatement($varUserSession, '"xxx" = 105');
            //$x= (new \App\Models\Database\SchData_OLTP_Master\General())->getDataListCurrency($varUserSession, 11000000000004, NULL, NULL, 'DROP ');
            //$x= (new \App\Models\Database\SchData_OLTP_Master\General())->getDataList_PersonAccountEMail($varUserSession, 11000000000004, 25000000000241, NULL, NULL, NULL);
            
            //$x= (new \App\Models\Database\SchSysConfig\General())->setDataDelete($varUserSession, 27000000000028);
            
            //$x= (new \App\Models\Database\SchData_OLTP_Master\TblBloodAglutinogenType())->setDataInitialize($varUserSession);
            
            //$x= (new \App\Models\Database\SchData_OLTP_Project\TblProject())->setDataSynchronize($varUserSession);
            
            //
            //$varBuffer= (new \App\Models\Database\SchSysConfig\General())->getMenuByUserRoleIDAndBranchID($varUserSession, 95000000000003, 11000000000004);
//            $x = \App\Helpers\ZhtHelper\System\Helper_Environment::setApplicationUserRolePrivilegesMenu($varUserSession, 95000000000003, 11000000000004);
            $x = \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONEncode(
                $varUserSession, 
                \App\Helpers\ZhtHelper\System\Helper_Environment::getApplicationUserRolePrivilegesMenu($varUserSession, 95000000000003, 11000000000004)
                );
            
            //$x= (new \App\Models\Database\SchSysConfig\TblLog_UserLoginSession())->getDataRecord($varUserSession, 6000000000316);
            
            var_dump($x);

            }
            
            
        public function testJQuery()
            {
            $varUserSession=4000000000016;
            echo \App\Helpers\ZhtHelper\General\Helper_JQuery::setCallAPI($varUserSession);
            }
            
            
        public function testRedis()
            {
            \App\Helpers\ZhtHelper\General\Helper_Session::delete(\App\Helpers\ZhtHelper\System\Helper_Environment::getApplicationID());
            $varUserSession=0;

            $varKey = 'ERPReborn::APIWebToken::eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoic3lzYWRtaW4iLCJpYXQiOjE2NzQwMjk4NTF9.ZmMwOTQ3ZTUyYTBmMjJlOGMyNTY1MDExMGYzNWNlYzc0ZjdkNjgyNDFjZTE3MjBiYmY3ZjA1ZjNmYzJkNDc1ZA';
            echo "<br>~~~~~~~<br>".\App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue($varUserSession, $varKey);


            
/*            
$varAPIWebToken='eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwMjczMDUxMH0.nVXe1M51rpPxH8zkOvA7kW-R9ADkVVRDK_OFRJJCrVw';
$varData = \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode($varUserSession, \App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue($varUserSession, 'ERPReborn::APIWebToken::'.$varAPIWebToken));
var_dump($varData);
echo "<br>";
echo "<br>";
$x = \App\Helpers\ZhtHelper\Cache\Helper_Redis::getTTL($varUserSession, 'ERPReborn::APIWebToken::'.$varAPIWebToken);
var_dump($x);
echo "<br>";
echo "<br>";
$varData['userRole_RefID']=777;
\App\Helpers\ZhtHelper\Cache\Helper_Redis::setValueRenewal($varUserSession, 'ERPReborn::APIWebToken::'.$varAPIWebToken, \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONEncode($varUserSession, $varData));


$varData = \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode($varUserSession, \App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue($varUserSession, 'ERPReborn::APIWebToken::'.$varAPIWebToken));
var_dump($varData);
echo "<br>";
echo "<br>";
$x = \App\Helpers\ZhtHelper\Cache\Helper_Redis::getTTL($varUserSession, 'ERPReborn::APIWebToken::'.$varAPIWebToken);
var_dump($x);
*/
/*
$varAPIWebToken='eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTYwMjczMDUxMH0.nVXe1M51rpPxH8zkOvA7kW-R9ADkVVRDK_OFRJJCrVw';
$varData = \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode($varUserSession, (new \App\Models\Cache\General\APIWebToken())->getDataRecord($varUserSession, $varAPIWebToken));
var_dump($varData);
echo "<br><br>";

$varData['userRole_RefID']=8888;
(new \App\Models\Cache\General\APIWebToken())->setDataUpdate($varUserSession, $varAPIWebToken, \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONEncode($varUserSession, $varData));
$varData = \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode($varUserSession, (new \App\Models\Cache\General\APIWebToken())->getDataRecord($varUserSession, $varAPIWebToken));
var_dump($varData);

echo "<br>";
echo "<br>";
$x = \App\Helpers\ZhtHelper\Cache\Helper_Redis::getTTL($varUserSession, 'ERPReborn::APIWebToken::'.$varAPIWebToken);
var_dump($x);
*/









//echo "<br>";
//$x = \App\Helpers\ZhtHelper\Cache\Helper_Redis::getTTL($varUserSession, 'ERPReborn::APIWebToken::'.$varAPIWebToken);
//var_dump($x);
            
            
            

            
//            $x = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecutionDataFetch_DataOnly_Specific($varUserSession, 6000000000001);
//            $x = (new \App\Models\Database\SchSysConfig\TblLog_UserLoginSession())->getDataRecord($varUserSession, 6000000000001);
            //$x = (new \App\Models\Database\SchSysConfig\TblLog_UserLoginSession())->getAllDataRecord($varUserSession);            
            //$x = (new \App\Models\Database\SchSysConfig\TblLog_UserLoginSession())->getTableName($varUserSession);            

//            $x = \App\Helpers\ZhtHelper\Cache\Helper_Redis::getKeyList($varUserSession, 'ERPReborn::*');
//            
//            $x = (new \App\Models\Cache\General\APIWebToken())->getAllDataRecord($varUserSession);
//            var_dump($x);
            
            //echo (new \App\Models\Database\SchSysConfig\TblRotateLog_API())->getSchemaTableName($varUserSession);
            
//            echo '<br>~~~~~~~~<br>';
//            echo \App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue($varUserSession, 'ERPReborn::APIWebToken::eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTU5OTAyMjUyN30.u2Re2mLnb8XhmJmxTseNOtWzTv2vwM5lySIg0KB1BS0');
            
//            $x = new \App\Models\Cache\General\APIWebToken();
//            $x->setDataInsert($varUserSession, 'xxxx', 'varValue', 10);
            
//$x = new \App\Models\Database\SchSysConfig\TblLog_UserLoginSession();
//$y = $x->getDataRecord(000000, 6000000000013);
//var_dump($y);
//            $x = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecutionDataFetch_RecordDataOnly($varUserSession, 6000000000013);
//            var_dump($x);

//            $varKey = 'ERPReborn::APIWebToken::eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTU5ODg1NTk2NH0.BHiM9jFqxX_wUegqcdDin3sDjEJjAwg9df0oM0GhtF8';
    //                    echo "<br>~~~~~~~<br>".\App\Helpers\ZhtHelper\Cache\Helper_Redis::getTTL($varUserSession, $varKey);

            
/*$x = new \App\Models\Cache\General\APIWebToken();
$x->setDataInsert($varUserSession, 'xxx', 'xxxValue', 10);
echo "<br>~~~~~~~~~~~~~~~~~~~~~<br>";
echo $x->getDataRecord($varUserSession, 'xxx');
for($i=0; $i!=2; $i++)
    {
    echo "<br>".$x->getDataTTL($varUserSession, 'xxx');
    sleep(1);
    }

echo "<br>~~~~~~~~~~~~~~~~~~~~~<br>";
$x->setDataTTLRenewal($varUserSession, 'xxx', 20);
for($i=0; $i!=2; $i++)
    {
    echo "<br>".$x->getDataTTL($varUserSession, 'xxx');
    sleep(1);
    }
*/

//$x->setKeyHeader($varUserSession, $varClassName)

            
//            $ObjModel = new \App\Models\Database\SchSysConfig\TblLog_UserLoginSession();
//            $user = $ObjModel->   ->hydrate(
//            $user = DB::select(
//                "SELECT * FROM \"SchSysConfig\".\"FuncSys_General_GetUnixTime\"('2019-01-01 00:00:00 +07')"
//                );
//                );
/*            $x = 
                $ObjModel->hydrate(
                    \Illuminate\Support\Facades\DB::select('SELECT NOW();')
                    );
            var_dump($x);
*/
/*            $varUserSession=0;
            echo \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                $varUserSession, 
                'SchSysConfig.Func_TblLog_UserLoginSession_SET', 
                [111, null, null, null, 222, 'SysEngine', 'eyJhbGciOiJIUzI1NiIsI', null, 444, 95000000000001, '2018-01-01 00:00:00+07', '9999-12-31 23:59:59+07', null, null],
                ['bigint', 'bigint', 'character varying', 'character varying', 'bigint', 'character varying', 'character varying', 'json', 'bigint', 'bigint', 'timestamp with time zone', 'timestamp with time zone', 'timestamp with time zone', 'timestamp with time zone']
                );
*/            
  
            //echo \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getCurrentYear(000);
            
//            echo substr('(NOW() + \'5 minutes\'::interval)', 0, 1); 
//            echo substr('(NOW() + \'5 minutes\'::interval)', strlen('(NOW() + \'5 minutes\'::interval)')-1, 1); 
/*            $varSQLQuery = '
            SELECT
                CASE
                    WHEN (COUNT("Sys_RPK") = 0) THEN 
                        TRUE
                    ELSE
                        FALSE
                END AS "SignValid"
            FROM 
                "SchSysConfig"."TblLog_UserLoginSession"
            WHERE
                "SessionStartDateTimeTZ" <= NOW()
                AND
                "SessionFinishDateTimeTZ" >= NOW()
                AND
                "APIWebToken" LIKE \'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoidGVndWgucHJhdGFtYSIsImlhdCI6MTU5ODU5Nzg0OX0.nujH2-2GRILaG_ahWQ-mxsFNydpWHahNIJ0an5HDi9A\'
                ';
            $x = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(000, $varSQLQuery);
            var_dump($x['Data'][0]['SignValid']);
            
            if($x['Data'][0]['SignValid']==true)
                {
                echo "lanjut";
                }
            else
                {
                echo "ulang";
                }*/
            
            
            
/*
--                "SessionStartDateTimeTZ" <= NOW()
  --              AND
    --            "SessionFinishDateTimeTZ" >= NOW()
      --          AND
*/
            
            
/*            echo "TEST REDIS<br><br>";
            $varUserSession = 000000;
            
//            echo \App\Helpers\ZhtHelper\General\Helper_HTTPAuthentication::getJSONWebToken($varUserSession, 'SysAdmin', '10006000000000002');
            
            
            \App\Helpers\ZhtHelper\Cache\Helper_Redis::setValue($varUserSession, 'MyKey', '{Myvalue}', 5);
            for($i=0; $i!=3; $i++)
                {
                sleep(1);
                echo "<br>".\App\Helpers\ZhtHelper\Cache\Helper_Redis::getTTL($varUserSession, 'MyKey')."-->".\App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue($varUserSession, 'MyKey');
                }
            echo "<br>~~~~~~~~~~~";
            \App\Helpers\ZhtHelper\Cache\Helper_Redis::setValue($varUserSession, 'MyKey', '{New Myvalue}', 5);
            for($i=0; $i!=10; $i++)
                {
                sleep(1);
                echo "<br>".\App\Helpers\ZhtHelper\Cache\Helper_Redis::getTTL($varUserSession, 'MyKey')."-->".\App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue($varUserSession, 'MyKey');
                }
*/
 
            //echo "<br>". \App\Helpers\ZhtHelper\Cache\Helper_Redis::getStatusAvailability($varUserSession);
            //echo "<br>".\Illuminate\Support\Facades\Redis::ttl('MyKey');
            //echo \App\Helpers\ZhtHelper\Cache\Helper_Redis::getTTL($varUserSession, 'MyKey');
            //var_dump(\App\Helpers\ZhtHelper\Cache\Helper_Redis::getInfo($varUserSession));
            }
            

        public function test()
            {
//---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
$varUserSession = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();

$varDataReceive = \App\Helpers\ZhtHelper\System\Helper_HTTPRequest::getRequest($varUserSession);

$varAPIKey = 'authentication.general.setLogin';
//$varAPIVersion = $varDataReceive['metadata']['API']['version'];
$varAPIVersion = 'latest';

$varData = [
    'userName' => 'teguh.pratama',
    'userPassword' => 'teguhpratama789'
    ];

//---> Method Call
$varDataSend = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setCallAPIEngine($varUserSession, $varAPIKey, $varAPIVersion, $varData, 'setLogin');

var_dump($varDataSend);

            //\App\Helpers\ZhtHelper\General\Helper_Session::delete(\App\Helpers\ZhtHelper\System\Helper_Environment::getApplicationID());            
            //echo \App\Helpers\ZhtHelper\General\Helper_RandomNumber::getUniqueID(000000);
            
            //echo \App\Helpers\ZhtHelper\General\Helper_HTTPHeader::getGMTDateTime();
            //\App\Helpers\ZhtHelper\General\Helper_File::getAutoMatchFilePath(000000, getcwd().'/', '/config/Application/BackEnd/environment.txt');
            //echo "xxx : ".\App\Helpers\ZhtHelper\System\Helper_Environment::getBackEndConfigEnvironment(000000, 'LDAP_BASEDN');
            //echo "yyy";
            //echo \App\Helpers\ZhtHelper\General\Helper_HTTPAuthentication::getJSONWebToken(000000, 'Teguh Pratama', 'secret');
            }



            

        public function testWS()
            {
            \App\Helpers\ZhtHelper\General\Helper_Session::delete(\App\Helpers\ZhtHelper\System\Helper_Environment::getApplicationID());

         
            
            
            
            // create digest auth
//            $auth = \Intervention\HttpAuth\HttpAuth::make();
  //          $auth->digest();
    //        $auth->realm('Secure');
  //          $auth->username('admin');
//            $auth->password('secret');
            
//            var_dump($auth);
            
//            $auth->secure();
            
            $varDataArray = [
                'System' => [],
                'Data' => []
                ];
            //$x = \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONEncode(000000, $varDataArray);
            $x = \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(000000, \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONEncode(000000, $varDataArray));
            var_dump($x);
            
            echo "<br>--------------------------------------------<br>";
            $x = \App\Helpers\ZhtHelper\System\Helper_HTTPRequest::getResponse(
                000000, 
                'http://172.28.0.3/api/webservices', 
                'POST', 
                $varDataArray,
                80
                );
            
            
           
            echo "<br>--------------------------------------------<br>";
            echo "<br>Tunggu data masuk<br>";
            var_dump($x);
            echo "<br>Finish";
            
            //$x = \App\Helpers\ZhtHelper\General\Helper_LDAP::getAuthenticationBySAMAccountName(000000, '192.168.1.23', 389, 'DC=qdc-files,DC=qdc,DC=co,DC=id', 'teguh.pratama', 'teguhpratama789');
            \App\Helpers\ZhtHelper\General\Helper_DateTime::getUnixTimeByJavaScript(000000);
            }




























            
        public function testEncrypt()
            {
            \App\Helpers\ZhtHelper\General\Helper_Session::delete(\App\Helpers\ZhtHelper\System\Helper_Environment::getApplicationID());
            
            \App\Helpers\ZhtHelper\System\Helper_HTTPRequest::getEncryptedURLParameter([]);
            
//            $x = \App\Helpers\ZhtHelper\General\Helper_Compression::getBZip2Decompress(00000, \App\Helpers\ZhtHelper\General\Helper_Compression::getBZip2Compress(00000, 'Ini contoh datanya'));
//            $x = \App\Helpers\ZhtHelper\General\Helper_Compression::getZLibDecompress(00000, \App\Helpers\ZhtHelper\General\Helper_Compression::getZLibCompress(00000, 'Ini contoh datanya'));
//            echo $x;
//            echo \App\Helpers\ZhtHelper\General\Helper_Array::isSequentialArray(000000, [1,2,3]);
            
            $ServiceName = 'service.core.userAuthentication';
            $ServiceAction = 'get';
            
            $dll='Lorem ipsum dolor sit amet, enim non in erat in diam leo, ligula nec odio nibh sit rhoncus viverra, vitae et arcu massa et molestie leo, erat massa. Error nonummy, et adipiscing lectus malesuada integer cursus dignissim, ut dolor tincidunt volutpat interdum arcu eget. Et cras, dolor mauris amet consequat pulvinar erat. Magnis id ad hac lacus amet vulputate, laoreet imperdiet sed quam, eros accumsan lobortis, tempor libero commodo odio non. Aliquam curabitur sit enim vivamus est a, ac ac dapibus lectus nisl quisque nisl, rutrum turpis vel felis eleifend, metus nunc ac leo. Sit eleifend amet libero commodo, elit tellus sed mollis venenatis feugiat, pede ut vel quaerat mauris. Mi quis nulla vel, neque nisl bibendum, quis odio est sem amet, nulla sed, urna wisi. Sagittis donec condimentum. Fames aliquet sunt, nonummy nulla doloribus, nam nullam gravida, vitae exercitation malesuada faucibus pellentesque donec. Taciti magna, non non vel, at sollicitudin congue enim suspendisse. Pede ut tellus adipiscing duis non fusce, lobortis mi consequat purus, quis non felis velit, etiam tellus non ipsum vitae lorem lorem, et metus mauris. Nec felis. Volutpat dui dignissim quisque quis eu, curae suscipit, commodo ultrices, sed parturient lacinia justo wisi totam, orci nam. Nisl excepturi sit dolor viverra suscipit asperiores. Morbi ut lacus proin viverra posuere, sociis ultrices, odio nullam quis, egestas suscipit eros. Mauris dignissim nulla nonummy. Diam ultrices adipiscing nibh mi dui, aliquam libero pulvinar dapibus, sociosqu aut sodales, ultricies elementum, ut inceptos. Odio ullamcorper tincidunt aenean rhoncus, ut aliquet interdum sint tortor vestibulum adipisicing, cursus eum, facilisis nibh varius magna a. Praesent odio, sit purus est, nam justo sed. Id lorem tempor, tristique amet commodo lectus lorem dictum natoque, augue suscipit eros vel turpis, habitant consectetuer eros. Vestibulum magna, proin blandit mauris mauris fames nibh, in aliquam lectus semper ipsum, justo cursus laoreet dui turpis in. Dolor ultricies sit, placerat per imperdiet nisl eget lacinia sit, amet vestibulum delectus nisl odio, aliquam mi, non quisque. Lorem vehicula amet dictumst, orci lorem. Laoreet enim, quam et aliquam, rutrum in beatae nullam, eget arcu mattis vitae vestibulum neque. Molestie tincidunt, libero convallis quis sodales, aenean lacus lobortis erat id amet sapien. Dolor cursus, auctor augue cursus. Quibusdam mauris augue, eleifend massa nulla sollicitudin sed lacus. Felis dui viverra nulla totam risus, fermentum magna natoque vel fusce augue erat, pretium ut enim ipsum in cursus, massa diam arcu eu. Pellentesque cras egestas et pede morbi nec, pellentesque dolor sollicitudin, orci bibendum quam scelerisque tincidunt mi, metus in. Ante duis turpis et, pulvinar duis. Faucibus est, aut ligula mauris congue. Pede non odio. Aliquam vivamus dapibus sed, elit posuere integer eros, quis sit consequuntur in. Nulla scelerisque.';
            
            
            //$varURLParameterPlain = '/'.$ServiceName.'/'.$ServiceAction.'/teguhpratama789';
            $varURLParameterPlain = $ServiceName.'/'.$ServiceAction.'/teguhpratama789/'.$dll;
            echo '<br>URL Parameter Plain : <br>'.$varURLParameterPlain;
            echo "<br>-------------------------------------------------------------------------------------------";
            $varURLParameterPlainEncapsulated = \App\Helpers\ZhtHelper\System\Helper_HTTPRequest::getURLEncapsulation(000000, $varURLParameterPlain);
            echo '<br>URL Parameter Encapsulation : <br>'.$varURLParameterPlainEncapsulated;
            echo "<br>-------------------------------------------------------------------------------------------";
            $varURLParameterPlainDecapsulated = \App\Helpers\ZhtHelper\System\Helper_HTTPRequest::getURLDecapsulation(000000, $varURLParameterPlainEncapsulated);
            echo '<br>URL Parameter Decapsulation : <br>'.$varURLParameterPlainDecapsulated;
            }





        public function testNEW()
            {

            \App\Helpers\ZhtHelper\General\Helper_Session::delete(\App\Helpers\ZhtHelper\System\Helper_Environment::getApplicationID());
//            \App\Helpers\ZhtHelper\System\Helper_Registry::init();
            echo "<br>xxxxxxxxxxxxxxxxxxxxx<br>";
            echo \App\Helpers\ZhtHelper\General\Helper_Array::isSequentialArray(000000, [1,2,3]);
            echo "<br>xxxxxxxxxxxxxxxxxxxxx<br>";
            echo \App\Helpers\ZhtHelper\General\Helper_Array::isSequentialArray(000000, ['a'=>1, 'b'=>2, 'c'=>3]);
            echo "<br>xxxxxxxxxxxxxxxxxxxxx<br>";
            $x=\App\Helpers\ZhtHelper\General\Helper_Array::getOnlyArrayValueWithoutKey(000000, ['a'=>1, 'b'=>2, 'c'=>3]);
            echo "<br>xxxxxxxxxxxxxxxxxxxxx<br>";
            echo \App\Helpers\ZhtHelper\General\Helper_Encryption::getBase64Decode(000000, \App\Helpers\ZhtHelper\General\Helper_Encryption::getBase64Encode(000000, 'Pesan Rahasia'));
            echo "<br>xxxxxxxxxxxxxxxxxxxxx<br>";
//            echo \App\Helpers\ZhtHelper\General\Helper_Encryption::getOpenSSLEncode(000000, 'Ini data rahasianya', 'AES-128-CTR', 'Kunci Enkripsiku', 0, '1234567891011121');
            echo \App\Helpers\ZhtHelper\General\Helper_Encryption::getOpenSSLDecode(000000, \App\Helpers\ZhtHelper\General\Helper_Encryption::getOpenSSLEncode(000000, 'Ini data rahasianya', 'AES-128-CTR', 'Kunci Enkripsiku', 0, '1234567891011121'), 'AES-128-CTR', 'Kunci Enkripsiku', 0, '1234567891011121');
            }





        public function testxxx()
            {
            echo "<br>".time()."<br>";

            
            
            
            \App\Helpers\ZhtHelper\General\Helper_Session::delete(\App\Helpers\ZhtHelper\System\Helper_Environment::getApplicationID());
            

            echo \App\Helpers\ZhtHelper\General\Helper_Array::isAssociativeArray(000000, [1,2,3]);
            
            
            
            //$varDataSession = \App\Helpers\ZhtHelper\General\Session::get(\App\Helpers\ZhtHelper\System\Environment::getApplicationID());         

            
//            echo \App\Helpers\ZhtHelper\General\ArrayHandler::getArrayValue($varDataSession, 'Registry::Global::Environment::Application::Name');

            echo "<br>----------------<br>";

//            var_dump($varDataSession);
            echo "<br>----------------<br>";







//            \App\Helpers\ZhtHelper\System\Registry::setSpecificRegistry(0, 'Zzz::Xxx', '$varValue');
//            echo \App\Helpers\ZhtHelper\System\Registry::getSpecificRegistry(0, 'Zzz::Xxx');
            
            
//            \App\Helpers\ZhtHelper\Logger\SystemLog::setLogOutut(000000, 'Helper::ZhtHelper', 'xxxx');
//            \App\Helpers\ZhtHelper\Logger\SystemLog::setLogOutput(000000, 'Helper::ZhtHelper', 'yyyy');
            
//            \App\Helpers\ZhtHelper\Logger\SystemLog::setLogError(000000, 'Helper::ZhtHelper', 'Error yyyy');



            //\App\Helpers\ZhtHelper\System\Registry::init();
            //echo "<br>-----------";
            //echo \App\Helpers\ZhtHelper\General\Session::isExist(\App\Helpers\ZhtHelper\System\Environment::getApplicationID());
            //echo "-----------";
            
            
            
            
            
            
//            \App\Helpers\ZhtHelper\Logger\SystemLog::setLogOutput('Helper::ZhtHelper', 000000, 'xxxx');
//            echo \App\Helpers\ZhtHelper\Logger\SystemLog::getLogOutput('Log::Helper::ZhtHelper', 000000);








            //$varRegistry['Registry']['Global']['Environment']['Database']['Type']='PostgreSQL';

            echo \App\Helpers\ZhtHelper\General\Helper_Hash::getMD5(000000, 'xxxxxxxxxxxxxx');
            
            \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::init(000000);
            \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getStatusAvailability(000000);
            $x = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(000000, "SELECT 1 AS xxx");
            echo \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getDateTimeTZ(000000);


            

            
            //var_dump(\App\Helpers\ZhtHelper\Cache\Helper_Redis::getDateTimeTZ());
            var_dump(\App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue(000000, 'myKey2'));
            \App\Helpers\ZhtHelper\Cache\Helper_Redis::setValue(000000, 'myKey2', 'myValue', 1);
            \App\Helpers\ZhtHelper\Cache\Helper_Redis::isExist(000000, 'myKey2');
            echo "<br><br>Delete:";
            \App\Helpers\ZhtHelper\Cache\Helper_Redis::delete(000000, 'myKey2');
            echo "<br><br>TTL:";
            var_dump(\App\Helpers\ZhtHelper\Cache\Helper_Redis::getTTL(000000, 'myKey2'));
            echo "<br><br>GetValue:";
            var_dump(\App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue(000000, 'myKey2'));
            echo "<br><br>DateTime:";
            var_dump(\App\Helpers\ZhtHelper\Cache\Helper_Redis::getDateTime(000000));
            echo "<br><br>Info:";
            var_dump(\App\Helpers\ZhtHelper\Cache\Helper_Redis::getInfo(000000));
            //var_dump($x);
            
            //phpinfo();
            
            
            
            echo "<br>"; echo "<br>"; echo "<br>";
            echo "weleh";

            echo "weleh";
            
            
            
//            var_dump(\App\Helpers\ZhtHelper\General\Session::get('ERPReborn'));
  //          echo \App\Helpers\ZhtHelper\General\Session::delete('ERPReborn');
    //        echo "Terhapuskah";
      //      var_dump(\App\Helpers\ZhtHelper\General\Session::get('ERPReborn'));     
            echo "<br>".time()."<br>";

            
            }
        }
    }
 
?>