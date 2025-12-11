<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Helpers                                                                                                   |
| ▪ Name Space : \App\Http\Helpers\ZhtHelper\General\System                                                                        |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2020 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/

namespace App\Http\Helpers\ZhtHelper\General\System
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : Helper_HTTPError                                                                                             |
    | ▪ Description : Menangani segala hal yang terkait HTTP Error dari Aplikasi                                                   |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class Helper_HTTPError
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.000000                                                                                        |
        | ▪ Last Update     : 2020-08-21                                                                                           |
        | ▪ Creation Date   : 2020-08-21                                                                                           |
        | ▪ Description     : System's Default Constructor                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function __construct()
            {
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __destruct                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-08-21                                                                                           |
        | ▪ Creation Date   : 2020-08-21                                                                                           |
        | ▪ Description     : System's Default Destructor                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function __destruct()
            {
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setHTTPErrorPageDisplay                                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-08-21                                                                                           |
        | ▪ Creation Date   : 2020-08-21                                                                                           |
        | ▪ Description     : Mengeset tampilan halaman customized HTTP Error                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varErrorCode ► HTTP Error Status Code                                                                    |
        |      ▪ (string) varErrorMessage ► HTTP Error Message                                                                     |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function setHTTPErrorPageDisplay($varUserSession, int $varErrorCode, string $varErrorMessage=null)
            {
            $varDefaultIconPathFile = '/images/Logo-Application.png';
            
            if ($varErrorMessage)
                {
                try {
                    $varArrayErrorMessage = explode('►', $varErrorMessage);
                    $varArrayErrorMessage[1] = '<b><i>'.$varArrayErrorMessage[1].'</i></b>';
                    $varErrorMessage = implode('►', $varArrayErrorMessage);                    
                    }
                catch (\Exception $ex) {
                    $varErrorMessage = '►'.'<b><i>'.$varErrorMessage.'</i></b>';
                    }
                }

            $varData = [
                'StatusCodeDescription' => ''
                ];

            switch($varErrorCode)
                {
                case 400:
                    {
                    $varData['StatusCodeDescription'] = 'Bad Request';
                    break;
                    }
                case 401:
                    {
                    $varData['StatusCodeDescription'] = 'Unauthorized';
                    break;
                    }
                case 404:
                    {
                    $varData['StatusCodeDescription'] = 'Not Found';
                    break;
                    }
                case 408:
                    {
                    $varData['StatusCodeDescription'] = 'Request Timeout';
                    break;
                    }
                case 422:
                    {
                    $varData['StatusCodeDescription'] = 'Unprocessable Entity';
                    break;
                    }
                case 500: {
                    $varData['StatusCodeDescription'] = 'Internal Server Error';
                    break;
                    }
                default: 
                    {
                    $varData['StatusCodeDescription'] = '';
                    break;
                    }
                }

            $varReturn = 
                '<!DOCTYPE html>'.
                    '<html>'.
                        '<head>'.
                            '<link rel="apple-touch-icon" sizes="180x180" href="/images/apple-touch-icon.png">'.
                            '<link rel="icon" type="image/png" sizes="32x32" href="/images/favicon-32x32.png">'.
                            '<link rel="icon" type="image/png" sizes="16x16" href="/images/favicon-16x16.png">'.
                            '<link rel="manifest" href="/images/site.webmanifest">'.
                            '<title>HTTP Error '.$varErrorCode.'</title>'.
                        '</head>'.
                        '<body>'.
                            '<div style="width:800px; position:absolute; top:50%; left:50%; transform:translate(-50%,-50%)">'.
                                '<table border=\'0\' cellspacing="0" cellpadding="5" style="border-collapse: collapse;">'.
                                    '<tr>'.
                                        '<td rowspan=\'2\'>'.
                                            '<img src="'.$varDefaultIconPathFile.'">'.
                                        '</td>'.
                                        '<td valign="bottom">'.
                                            '<table border=\'0\' cellspacing="0" cellpadding="0" style="border-collapse: collapse;">'.
                                                '<tr>'.
                                                    '<td>'.
                                                        '<font style="family:courier,arial,helvetica" size=10px"><b>Error '.$varErrorCode.'</b></font>'.
                                                    '</td>'.
                                                '</tr>'.
                                                '<tr>'.
                                                    '<td>'.
                                                        '<font style="family:courier,arial,helvetica" size=2px"><i>'.$varData['StatusCodeDescription'].'</i></font>'.
                                                    '</td>'.
                                                '</tr>'.
                                            '</table>'.
                                        '</td>'.
                                    '</tr>'.
                                    '<tr>'.
                                        '<td valign="top">'.
                                            '<font style="family:courier,arial,helvetica" size="5px">'.$varErrorMessage.'</font>'.
                                        '</td>'.
                                    '</tr>'.
                                '</table>'.
                            '</div>'.
                        '</body>'.
                    '</html>';

            echo
                $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setResponse                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-08-13                                                                                           |
        | ▪ Creation Date   : 2020-08-13                                                                                           |
        | ▪ Description     : Mengeset halaman untuk menampilkan error dari HTTP                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varHTTPStatusCode ► HTTP Status Code                                                                     |
        |      ▪ (string) varHTTPMessage ► HTTP Message                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (mixed)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function setResponse($varUserSession, int $varHTTPStatusCode, string $varHTTPMessage=null)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Set Error Page of HTTP');
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    $varDataSeparatorTag = \App\Helpers\ZhtHelper\System\Helper_Environment::getBackEndConfigEnvironment($varUserSession, 'TAG_DATA_SEPARATOR');
                    $varMessageHeading = '('.\App\Helpers\ZhtHelper\General\Helper_DateTime::getGMTDateTime($varUserSession, 'd M Y H:i:s').' GMT) '.\App\Helpers\ZhtHelper\System\Helper_Environment::getApplicationID().' Error Message ► ';
                    if(!$varHTTPMessage)
                        {
                        $varHTTPMessage = '';
                        }
                    $varReturn = abort($varHTTPStatusCode, $varMessageHeading.$varHTTPMessage);

                    //---- ( MAIN CODE ) ----------------------------------------------------------------------- [ END POINT ] -----
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Success');
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
            return \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }
        }
    }

?>