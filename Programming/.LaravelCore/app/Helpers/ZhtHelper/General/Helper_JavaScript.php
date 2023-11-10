<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Helpers                                                                                                   |
| ▪ Name Space : \App\Helpers\ZhtHelper\General                                                                                    |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2020 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Helpers\ZhtHelper\General
    {

    use Illuminate\Support\Facades\Cache;

    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : Helper_JavaScript                                                                                            |
    | ▪ Description : Menangani JavaScript                                                                                         |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class Helper_JavaScript
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-07-28                                                                                           |
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
        | ▪ Last Update     : 2020-07-28                                                                                           |
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
        | ▪ Method Name     : getSHA256                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-07-28                                                                                           |
        | ▪ Creation Date   : 2020-07-28                                                                                           |
        | ▪ Description     : Mendapatkan SHA256 dari data (varData) dengan Kata Kunci (varKey)                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varUserSession                                                                                           |
        |      ▪ (string) varKey                                                                                                   |
        |      ▪ (string) varData                                                                                                  |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getJSUnixTime($varUserSession)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, false, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Get JavaScript UnixTime');
                try {
                    $varReturn = 
                        '<script type="text/javascript">'.
                            'varUnixTime=new Date().getTime(); '.
                            'document.write(varUnixTime); '.
                        '</script>';
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
        | ▪ Method Name     : getSyntaxFunc_ClientAgent                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-12-23                                                                                           |
        | ▪ Creation Date   : 2020-12-23                                                                                           |
        | ▪ Description     : Mengambil Fungsi Sintaks Agen Client                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession                                                                                           |
        |      ▪ (int)    varOffsetSeconds                                                                                         |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getSyntaxFunc_ClientAgent($varUserSession)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, false, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'set Syntax AJAX Post JSON');
                try {
                    $varReturn = 
                        'function() {'.
                            'return navigator.userAgent; '.
                            '}()';
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
        | ▪ Method Name     : getSyntaxFunc_ClientCurrentDateTimeUTC                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-12-23                                                                                           |
        | ▪ Creation Date   : 2020-12-23                                                                                           |
        | ▪ Description     : Mengambil Fungsi Sintaks Waktu sekarang dalam mode UTC Client                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession                                                                                           |
        |      ▪ (int)    varOffsetSeconds                                                                                         |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getSyntaxFunc_ClientCurrentDateTimeUTC($varUserSession, int $varOffsetSeconds = null)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, false, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Set Syntax Function Client Current Date Time UTC');
                try {
                    $varReturn = 
                        'function() {'.
                            'var varObjDate = new Date(); '.
                            (!$varOffsetSeconds ? '' : 'varObjDate.setSeconds(varObjDate.getSeconds() + '.$varOffsetSeconds.'); ').
                            'return varObjDate.toUTCString(); '.
                            '}()';
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
        | ▪ Method Name     : getSyntaxCreateDOM_DivCustom_ModalBox_ProcessLoad                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2022-08-29                                                                                           |
        | ▪ Creation Date   : 2020-09-06                                                                                           |
        | ▪ Description     : Mendapatkan Syntax Pembuatan DOM Object : Custom Div - Modal Box - Process Load                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession                                                                                           |
        |      ▪ (int)    varOffsetSeconds                                                                                         |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getSyntaxCreateDOM_DivCustom_ModalBox_ProcessLoad($varUserSession, $varID, $varParentID, bool $varSignOpen, string $varMessage = null)
            {
            if(!$varMessage) {
                $varMessage = 'Please wait until the process is complete';
                }

            $varReturn = 
                'function (varLocalSignOpen, varLocalMessage) {'.
                    'try {'.
                        'function zhtInnerFunc_InitShow() {'.
                            'if (document.getElementById(\''.$varID.'_ProcessLoad_Back'.'\') == null) {'.
                                'varMaxZIndex = (parseInt('.self::getSyntaxFunc_MaxZIndex($varUserSession).') + 1); '.
                                self::getSyntaxCreateDOM_Div(
                                    $varUserSession, 
                                    [
                                        'ID' => $varID.'_ProcessLoad_Back',
                                        'ParentID' => $varParentID,
                                        'Style' => [
                                            ['position', 'fixed'],
                                            ['top', '0px'],
                                            ['left', '0px'],
                                            ['height', '100%'],
                                            ['width', '100%'],
                                            ['background', 'center no-repeat #fff']
                                            ]
                                    ], 
                                    ''
                                    ).
                                self::getSyntaxCreateDOM_InputHidden(
                                    $varUserSession,
                                    [
                                        'ID' => $varID.'_ProcessLoad_DataSignShow',
                                        'ParentID' => $varID.'_ProcessLoad_Back',
                                        'Value' => 'OK',
                                        'Style' => [
                                            ['width', '200px'],
                                            ['height', '100px']
                                            ]
                                    ]).
                                    /*
                                    $varUserSession, 
                                    $varID.'_ProcessLoad_DataMessage',
                                    $varID.'_ProcessLoad_Back',
                                    'Oye',
                                    [
                                        'ID' => $varID.'_ProcessLoad_DataMessage',
                                        'ParentID' => $varID.'_ProcessLoad_Back',
                                    ]
                                    ).*/
                                self::getSyntaxCreateDOM_Div(
                                    $varUserSession, 
                                    [
                                        'ID' => $varID.'_ProcessLoad_BackMessage',
                                        'ParentID' => $varID.'_ProcessLoad_Back',
                                        'Style' => [
                                            ['position', 'relative'],
                                            ['width', '100px'],
                                            ['height', '100px'],
                                            ['top', '35%'],
                                            ['margin', 'auto'],
                                            ['background', '#fff'],
                                            ['borderRadius', '50%'],
                                            ['borderLeft', '10px solid blue'],
                                            ['borderTop', '10px solid red'],
                                            ['borderBottom', '10px solid yellow'],
                                            ['animation', 'spin 2s linear infinite'],
                                            ['transform', 'translate(-50%, -50%)']
                                            ]
                                        ], 
                                        ''
                                        ).

                                    self::getSyntaxCreateDOM_Div(
                                        $varUserSession, 
                                        [
                                            'ID' => $varID.'_ProcessLoad_BackMessage',
                                            'ParentID' => $varID.'_ProcessLoad_Back',
                                            'Style' => [
                                                ['position', 'relative'],
                                                ['top', '45%'],
                                                ['textAlign', 'center'],
                                                ['fontFamily', '\\\'Helvetica, Verdana, Arial, Tahoma, Serif\\\''],
                                                ['fontWeight', 'bold'],
                                                ['color', '#212529'],
                                                ['fontSize', '20px'],
                                                ]
                                        ], 
                                        str_replace(' ', '&nbsp', $varMessage)
                                        ).
                                self::getSyntaxCreateDOM_Div(
                                    $varUserSession, 
                                    [
                                        'ID' => $varID.'_ProcessLoad_BackMessageMask',
                                        'ParentID' => $varID.'_ProcessLoad_BackMessage',
                                        'Style' => [
                                            ['position', 'absolute'],
                                            ['top', '0'],
                                            ['left', '0'],
                                            ['valign', 'top'],
                                            ['borderSpacing', '2px'],
                                            ['padding', '5px'],
                                            ['borderRadius', '10px']
                                            ]
                                    ], 
                                    ''
                                    ).
                                'document.getElementById(\''.$varID.'_ProcessLoad_Back'.'\').style.zIndex = (varMaxZIndex + 100); '.
                                'document.getElementById(\''.$varID.'_ProcessLoad_Back'.'\').style.display = \'none\'; '.
                                'document.getElementById(\''.$varID.'_ProcessLoad_Back'.'\').style.visibility = \'hidden\'; '.
                                '}'.
                            '} '.

                        'function zhtInnerFunc_StartShow() {'.
                            'document.getElementById(\''.$varID.'_ProcessLoad_DataSignShow'.'\').value = Boolean(true); '.
                            'document.getElementById(\''.$varID.'_ProcessLoad_Back'.'\').style.display = \'block\'; '.
                            'document.getElementById(\''.$varID.'_ProcessLoad_Back'.'\').style.visibility = \'visible\'; '.
                            '}'.

                        'function zhtInnerFunc_EndShow() {'.
                            'document.getElementById(\''.$varID.'_ProcessLoad_DataSignShow'.'\').value = Boolean(false); '.
                            'document.getElementById(\''.$varID.'_ProcessLoad_Back'.'\').style.display = \'none\'; '.
                            'document.getElementById(\''.$varID.'_ProcessLoad_Back'.'\').style.visibility = \'hidden\'; '.
                            '}'.

                        'zhtInnerFunc_InitShow(); '.
                        'if((varLocalSignOpen == true) == true) {'.
                            'zhtInnerFunc_StartShow(); '.
                            '}'.
                        'else {'.
                            'zhtInnerFunc_EndShow(); '.
                            '}'.
                        '}'.
                    'catch(varError) {'.
                        'alert(\'ERP Reborn Error Notification\n\nInvalid Process\n(\' + varError + \')\'); '.
                        '}'.
                    '} ('.
                        (($varSignOpen === TRUE OR $varSignOpen === FALSE) ? '\''.$varSignOpen.'\'' : 'varSignOpen').
                        ', '.
                        ($varMessage ? '\''.$varMessage.'\'' : 'varMessage').
                        ');'.
                    '';

            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getSyntaxCreateDOM_DivCustom_ModalBox_FilePreview                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-08-18                                                                                           |
        | ▪ Creation Date   : 2022-08-18                                                                                           |
        | ▪ Description     : Mendapatkan Syntax Pembuatan DOM Object : Div                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession (Mandatory) ► User Session                                                                |
        |      ▪ (array)  varArrayProperties (Mandatory) ► DOM Properties                                                          |
        |        Example :                                                                                                         |
        |           ► []                                                                                                           |
        |           ► [ 'ID' => 'MyID' ]                                                                                           |
        |           ► [ 'ID' => 'MyID',                                                                                            |
        |               'ParentID' => ... ,                                                                                        |
        |               'Style' => [                                                                                               |
        |                     ['...', ...]                                                                                         |
        |                  ]                                                                                                       |
        |             ]                                                                                                            |
        |      ▪ (string) varContent (Mandatory) ► Content                                                                         |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
//         */
//         public static function getSyntaxCreateDOM_DivCustom_ModalBox_FilePreview($varUserSession, string $varAPIWebToken, $varID)
//             {
//             $varStyle_TableDataStyle = [
//                 ['fontFamily', '\\\'Helvetica, Verdana, Arial, Tahoma, Serif\\\''],
//                 ['fontWeight', 'bold'],
//                 ['valign', 'top'],
//                 ['color', '#212529'],
//                 ['fontSize', '12px'],
//                 ['textShadow', '2px 2px 5px #ced4da']
//                 ];

//             $varStyle_TableDataPagination = [
//                 ['fontFamily', '\\\'Helvetica, Verdana, Arial, Tahoma, Serif\\\''],
//                 ['fontWeight', 'bold'],
//                 ['valign', 'top'],
//                 ['color', '#212529'],
//                 ['fontSize', '12px'],
//                 ['textShadow', '2px 2px 5px #ced4da']
//                 ];

//             $varReturn = 
//                 'function (varFilePath, varName, varSize, varMIME, varUploadDateTimeTZ) {'.
//                     'try {'.
//                         'var varFilePathArray = varFilePath.split(\'/\'); '.
//                         'var varLocalThumbnailsFolderPath = \'Thumbnails/\' + varFilePathArray[0] + \'/\' + varFilePathArray[2]; '.

//                         //---> zhtInnerFunc_CloseDivModal
//                         'function zhtInnerFunc_CloseDivModal(varObj) {'.
//                             'varNothing = '.
//                                 'function() {'.
//                                     'varObj.parentNode.removeChild(varObj);'.
//                                     '} (); '.
//                             '}; '.

//                         //---> zhtInnerFunc_CheckConvertibleStatus
//                         'function zhtInnerFunc_CheckConvertibleStatus(varLocalFilePath) {'.
//                             'let varLocalData = ('.
//                                 'JSON.parse('.                           
//                                     str_replace(
//                                         '"', 
//                                         '\'', 
//                                         \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
//                                             $varUserSession, 
//                                             $varAPIWebToken, 
//                                             'fileHandling.upload.combined.thumbnails.isConvertible', 
//                                             'latest', 
//                                             '{'.
//                                                 '"parameter" : {'.
//                                                     '"filePath" : varLocalFilePath'.
//                                                     '}'.
//                                             '}'
//                                             )
//                                         ).
//                                     ').data.signConvertibleStatus'.
//                                 '); '.
//                             //'alert(JSON.stringify(varData)); '.
//                             'return varLocalData; '.
//                             '} (varFilePath); '.

//                         //---> zhtInnerFunc_RecreateThumbnails
//                         'function zhtInnerFunc_RecreateThumbnails(varLocalThumbnailsFolderPath, varLocalFilePath) {'.
//                             'varLocalNothing = '.self::getSyntaxCreateDOM_DivCustom_ModalBox_ProcessLoad($varUserSession, $varID, $varID.'_Back', true).
//                             'let varTimestamp = new Date().getTime();'.
//                             'let varLocalImageSource = \'images/Logo/AppObject_System/NoPreviewAvailable.jpg\' + \'?t=\' + varTimestamp; '.
//                             'document.getElementById(\''.$varID.'_DialogContentThumbnailImage'.'\').src = varLocalImageSource; '.
//                             'document.getElementById(\''.$varID.'_DialogContentThumbnailImage'.'\').onload = function() {'.
//                                 'document.getElementById(\''.$varID.'_DialogContentPlcHoldBack'.'\').style.width = 400; '.
//                                 'document.getElementById(\''.$varID.'_DialogContentPlcHoldBack'.'\').style.height = 400; '.
//                                 'document.getElementById(\''.$varID.'_DialogContentThumbnailImage'.'\').style.height = 400; '.
//                                 'document.getElementById(\''.$varID.'_DialogContentThumbnailImage'.'\').style.width = 400; '.
//                                 '} (); '.

// //                                'setTimeout(('.
//                                     'varNothing = function() {'.
//                                         'varLocalNothing = ('.
//                                             'JSON.parse('.                           
//                                                 str_replace(
//                                                     '"', 
//                                                     '\'', 
//                                                     \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
//                                                         $varUserSession, 
//                                                         $varAPIWebToken, 
//                                                         'fileHandling.upload.combined.thumbnails.create', 
//                                                         'latest', 
//                                                         '{'.
//                                                             '"parameter" : {'.
//                                                                 '"filePath" : varLocalFilePath'.
//                                                                 '}'.
//                                                         '}',
//                                                         10000
//                                                         )
//                                                     ).
//                                                 ').data'.
//                                             '); '.
//                                         '} ();'.
// //                                    '), 1); '.
//                             'varLocalNothing = '.self::getSyntaxCreateDOM_DivCustom_ModalBox_ProcessLoad($varUserSession, $varID, $varID.'_Back', false).
//                             '}; '.


//                         //---> zhtInnerFunc_GetThumbnailsMainData
//                         'function zhtInnerFunc_GetThumbnailsMainData(varLocalFilePath) {'.
//                             'varLocalThumbnailsMainData = ('.
//                                 'JSON.parse('.                           
//                                     str_replace(
//                                         '"', 
//                                         '\'', 
//                                         \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
//                                             $varUserSession, 
//                                             $varAPIWebToken, 
//                                             'fileHandling.upload.combined.thumbnails.isExist', 
//                                             'latest', 
//                                             '{'.
//                                                 '"parameter" : {'.
//                                                     '"folderPath" : varLocalFilePath'.
//                                                     '}'.
//                                             '}'
//                                             )
//                                         ).
//                                     ').data'.
//                                 '); '.
//                             'return varLocalThumbnailsMainData; '.
//                             '}; '.


//                         //---> zhtInnerFunc_GetThumbnailsReload
//                         'function zhtInnerFunc_GetThumbnailsReload(varLocalThumbnailsFolderPath, varLocalFilePath) {'.
//                             'varThumbnailsMainData = zhtInnerFunc_GetThumbnailsMainData(varLocalFilePath); '.
//                             'varDataArrayOption = []; '.
//                             'if(varThumbnailsMainData.filesCount == 0) {'.
//                                 'document.getElementById(\''.$varID.'_DialogPaginationTTD'.'\').style.display = \'none\'; '.
//                                 'document.getElementById(\''.$varID.'_DialogPaginationTTD'.'\').style.visibility = \'hidden\'; '.
//                                 'varDataArrayOption.push({'.
//                                     'value: \'\', '.
//                                     'text: 1'.
//                                     '}); '.
//                                 '}'.
//                             'else {'.
//                                 'document.getElementById(\''.$varID.'_DialogPaginationTTD'.'\').style.display = \'block\'; '.
//                                 'document.getElementById(\''.$varID.'_DialogPaginationTTD'.'\').style.visibility = \'visible\'; '.
//                                 'for(i=0, iMax=varThumbnailsMainData.filesCount; i!=iMax; i++) {'.
//                                     'varDataArrayOption.push({'.
//                                         'value: (varThumbnailsMainData.filesList[i]).fullName, '.
//                                         'text: i+1'.
//                                         '}); '.
//                                     '} '.
//                                 '}'.

//                             'document.getElementById(\''.$varID.'_LabelTotalPage'.'\').innerHTML = varThumbnailsMainData.filesCount;'.

//                             'if(document.getElementById(\''.$varID.'_DialogPageSelect\') != null) {'.
//                                 'document.getElementById(\''.$varID.'_DialogPageSelect\').parentNode.removeChild(document.getElementById(\''.$varID.'_DialogPageSelect\')); '.
//                                 '}'.

//                             'if(document.getElementById(\''.$varID.'_DialogPageSelect\') == null) {'.
//                                 'varNothing = '.
//                                     self::getSyntaxCreateDOM_Select(
//                                         $varUserSession, 
//                                         [
//                                             'ID' => $varID.'_DialogPageSelect',
//                                             'ParentID' => $varID.'_DialogPageTTD',
//                                             'Style' => [
//                                                 ['position', 'relative'],
//                                                 ['top', '50%'],
//                                                 ['filter', 'drop-shadow(3px 3px 3px #ced4da)']
//                                                 ]
//                                         ], 
//                                         'varDataArrayOption'
//                                         ).
//                                     '; '.
//                                 //---> Page Select Event
//                                 'document.getElementById(\''.$varID.'_DialogPageSelect'.'\').addEventListener('.
//                                     '\'change\', '.
//                                     'function() {'.
//                                         'zhtInnerFunc_ShowThumbnails('.
//                                             'varLocalThumbnailsFolderPath, '.
//                                             'parseInt(document.getElementById(\''.$varID.'_DialogPageSelect'.'\').options[document.getElementById(\''.$varID.'_DialogPageSelect'.'\').selectedIndex].text), '.
//                                             'document.getElementById(\''.$varID.'_DialogPageSelect'.'\').options[document.getElementById(\''.$varID.'_DialogPageSelect'.'\').selectedIndex].value'.
//                                             '); '.
//                                         '}, '.
//                                     'true); '.
//                                 'document.getElementById(\''.$varID.'_DialogPageSelect'.'\').addEventListener('.
//                                     '\'mouseover\','.
//                                     'function() {'.
//                                         'document.getElementById(\''.$varID.'_DialogPageSelect'.'\').style.transform = \'scale(1.3)\'; '.
//                                         '}, '.
//                                     'false'.
//                                     '); '.
//                                 'document.getElementById(\''.$varID.'_DialogPageSelect'.'\').addEventListener('.
//                                     '\'mouseout\','.
//                                     'function() {'.
//                                         'document.getElementById(\''.$varID.'_DialogPageSelect'.'\').style.transform = \'none\'; '.
//                                         'document.getElementById(\''.$varID.'_DialogPageSelect'.'\').style.transition = \'1.0s ease\'; '.
//                                         '}, '.
//                                     'false'.
//                                     '); '.
//                                 //---> Page Previous Img
//                                 'document.getElementById(\''.$varID.'_PagePreviousImg'.'\').addEventListener('.
//                                     '\'mouseover\','.
//                                     'function() {'.
//                                         'document.getElementById(\''.$varID.'_PagePreviousImg'.'\').style.transform = \'scale(1.3)\'; '.
//                                         '}, '.
//                                     'false'.
//                                     '); '.
//                                 'document.getElementById(\''.$varID.'_PagePreviousImg'.'\').addEventListener('.
//                                     '\'mouseout\','.
//                                     'function() {'.
//                                         'document.getElementById(\''.$varID.'_PagePreviousImg'.'\').style.transform = \'none\'; '.
//                                         'document.getElementById(\''.$varID.'_PagePreviousImg'.'\').style.transition = \'1.0s ease\'; '.
//                                         '}, '.
//                                     'false'.
//                                     '); '.
//                                 'document.getElementById(\''.$varID.'_PagePreviousImg'.'\').addEventListener('.
//                                     '\'click\','.
//                                     'function() {'.
//                                         'if(document.getElementById(\''.$varID.'_DialogPageSelect\').selectedIndex != 0) {'.
//                                             'document.getElementById(\''.$varID.'_DialogPageSelect\').selectedIndex = document.getElementById(\''.$varID.'_DialogPageSelect\').selectedIndex - 1; '.
//                                             'document.getElementById(\''.$varID.'_DialogPageSelect\').dispatchEvent(new Event(\'change\')); '.
//                                             '}'.
//                                         '}'.
//                                     '); '.
//                                 //---> Page Next Img
//                                 'document.getElementById(\''.$varID.'_PageNextImg'.'\').addEventListener('.
//                                     '\'mouseover\','.
//                                     'function() {'.
//                                         'document.getElementById(\''.$varID.'_PageNextImg'.'\').style.transform = \'scale(1.3)\'; '.
//                                         '}, '.
//                                     'false'.
//                                     '); '.
//                                 'document.getElementById(\''.$varID.'_PageNextImg'.'\').addEventListener('.
//                                     '\'mouseout\','.
//                                     'function() {'.
//                                         'document.getElementById(\''.$varID.'_PageNextImg'.'\').style.transform = \'none\'; '.
//                                         'document.getElementById(\''.$varID.'_PageNextImg'.'\').style.transition = \'1.0s ease\'; '.
//                                         '}, '.
//                                     'false'.
//                                     '); '.
//                                 'document.getElementById(\''.$varID.'_PageNextImg'.'\').addEventListener('.
//                                     '\'click\','.
//                                     'function() {'.
//                                         'if(document.getElementById(\''.$varID.'_DialogPageSelect\').selectedIndex != (varThumbnailsMainData.filesCount - 1)) {'.
//                                             'document.getElementById(\''.$varID.'_DialogPageSelect\').selectedIndex = document.getElementById(\''.$varID.'_DialogPageSelect\').selectedIndex + 1; '.
//                                             'document.getElementById(\''.$varID.'_DialogPageSelect\').dispatchEvent(new Event(\'change\')); '.
//                                             '}'.
//                                         '}'.
//                                     '); '.
//                                 '}'.

//                             'return varDataArrayOption;'.
//                             '}; '.


//                         //---> zhtInnerFunc_ShowThumbnails
//                         'function zhtInnerFunc_ShowThumbnails(varLocalThumbnailsFolderPath, varIndex, varPath) {'.
//                             'varThumbnailsFileName = String(varIndex-1).padStart(10, \'0\') + \'.png\'; '.
//                             'varThumbnailsFilePath = varLocalThumbnailsFolderPath + \'/\' + varThumbnailsFileName; '.
//                             'varImageSource = ('.
//                                 'JSON.parse('.                           
//                                     str_replace(
//                                         '"', 
//                                         '\'', 
//                                         \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
//                                             $varUserSession, 
//                                             $varAPIWebToken, 
//                                             'fileHandling.upload.combined.general.getFileContent', 
//                                             'latest', 
//                                             '{'.
//                                                 '"parameter" : {'.
//                                                     '"filePath" : varThumbnailsFilePath'.
//                                                     '}'.
//                                             '}'
//                                             )
//                                         ).
//                                     ').data.contentBase64'.
//                                 '); '.
//                             //'alert(varImageSource); '.
//                             'if(varImageSource == null) {'.
//                                 'varImageSource = \'images/Logo/AppObject_System/NoPreviewAvailable.jpg\'; '.
//                                 '}'.
//                             'else {'.
//                                 'varImageSource = \'data:image/png;base64, \' + varImageSource + \'\'; '.
//                                 '}'.
//                             'varObjImage = new Image(); '.
//                             'varObjImage.src = varImageSource; '.
//                             'varObjImage.onload = function() {'.
//                                 'let varObjImageWidth = varObjImage.naturalWidth; '.
//                                 'let varObjImageHeight = varObjImage.naturalHeight; '.
//                                 'if(varObjImageWidth > varObjImageHeight) {'.
//                                     'varSizeFactor = 400/varObjImageWidth; '.
//                                     '}'.
//                                 'else {'.
//                                     'varSizeFactor = 400/varObjImageHeight; '.
//                                     '}'.
//                                 'varObjImageWidth = varObjImageWidth * varSizeFactor; '.
//                                 'varObjImageHeight = varObjImageHeight * varSizeFactor; '.

//                                 'document.getElementById(\''.$varID.'_DialogContentThumbnailImage'.'\').src = varImageSource; '.
//                                 'document.getElementById(\''.$varID.'_DialogContentThumbnailImage'.'\').onload = function() {'.
//                                     'document.getElementById(\''.$varID.'_DialogContentPlcHoldBack'.'\').style.top = \'50%\'; '.
//                                     'document.getElementById(\''.$varID.'_DialogContentPlcHoldBack'.'\').style.left = \'50%\'; '.
//                                     'document.getElementById(\''.$varID.'_DialogContentPlcHoldBack'.'\').style.transform = \'translate(-50%, -50%)\';'.
//                                     'document.getElementById(\''.$varID.'_DialogContentPlcHoldBack'.'\').style.width = varObjImageWidth; '.
//                                     'document.getElementById(\''.$varID.'_DialogContentPlcHoldBack'.'\').style.height = varObjImageHeight; '.

//                                     'document.getElementById(\''.$varID.'_DialogContentThumbnailImage'.'\').style.width = varObjImageWidth; '.
//                                     'document.getElementById(\''.$varID.'_DialogContentThumbnailImage'.'\').style.height = varObjImageHeight; '.
//                                     '}; '.
//                                 '}; '.
//                             //'alert(varImageSource); '.
//                             '}; '.

//                         //---> Main Code
//                         //'alert(varLocalThumbnailsFolderPath); '.
//                         'varMaxZIndex = (parseInt('.self::getSyntaxFunc_MaxZIndex($varUserSession).') + 1); '.
//                         self::getSyntaxCreateDOM_Div(
//                             $varUserSession, 
//                             [
//                                 'ID' => $varID.'_Back',
//                                 'ParentID' => 'document.body',
//                                 'Style' => [
//                                     ['position', 'absolute'],
//                                     ['top', '0px'],
//                                     ['left', '0px'],
//                                     ['height', '100%'],
//                                     ['width', '100%'],
//                                     ['background', 'rgba(255, 0, 0, 0.3)']
//                                     ]
//                             ], 
//                             ''
//                             ).
//                         'document.getElementById(\''.$varID.'_Back'.'\').style.zIndex = (varMaxZIndex+0); '.
//                         'document.getElementById(\''.$varID.'_Back'.'\').style.height = '.self::getSyntaxFunc_PageHeight($varUserSession).'; '.
//                         'document.getElementById(\''.$varID.'_Back'.'\').style.width = '.self::getSyntaxFunc_PageWidth($varUserSession).'; '.

//                         //---> Dialog
//                         self::getSyntaxCreateDOM_Div(
//                             $varUserSession, 
//                             [
//                                 'ID' => $varID.'_Dialog',
//                                 'ParentID' =>  $varID.'_Back',
//                                 'Style' => [
//                                     ['position', 'absolute'],
//                                     ['top', '50%'],
//                                     ['left', '50%'],
//                                     ['height', '485px'],
//                                     ['width', '835px'],
//                                     ['transform', 'translate(-50%, -50%)']
//                                     ]
//                             ], 
//                             ''
//                             ).
//                         'document.getElementById(\''.$varID.'_Dialog'.'\').style.zIndex = (varMaxZIndex+1); '.

//                         //---> Dialog ---> DialogPreviewPlcHold
//                         self::getSyntaxCreateDOM_Div(
//                             $varUserSession, 
//                             [
//                                 'ID' => $varID.'_DialogPreviewPlcHold',
//                                 'ParentID' =>  $varID.'_Dialog',
//                                 'Style' => [
//                                     ['position', 'absolute'],
//                                     ['top', '0'],
//                                     ['left', '0'],
//                                     ['height', '480px'],
//                                     ['width', '410px'],
//                                     ['background', 'rgba(88, 88, 88, 1.0)'],
//                                     ['border', '2px solid #ced4da'],
//                                     ['boxShadow', '10px 20px 30px #ced4da']
//                                     ]
//                             ], 
//                             ''
//                             ).
//                         'document.getElementById(\''.$varID.'_DialogPreviewPlcHold'.'\').style.zIndex = (varMaxZIndex+2); '.

//                         //---> Dialog ---> DialogIdentityPlcHod
//                         self::getSyntaxCreateDOM_Div(
//                             $varUserSession, 
//                             [
//                                 'ID' => $varID.'_DialogIdentityPlcHod',
//                                 'ParentID' =>  $varID.'_Dialog',
//                                 'Style' => [
//                                     ['position', 'absolute'],
//                                     ['top', '30'],
//                                     ['left', '420px'],
//                                     ['height', '200px'],
//                                     ['width', '410px'],
//                                     ['background', 'rgba(88, 88, 88, 1.0)'],
//                                     ['border', '2px solid #ced4da'],
//                                     ['boxShadow', '10px 20px 30px #ced4da']
//                                     ]
//                             ], 
//                             ''
//                             ).
//                         'document.getElementById(\''.$varID.'_DialogIdentityPlcHod'.'\').style.zIndex = (varMaxZIndex+2); '.

//                         self::getSyntaxCreateDOM_Table(
//                             $varUserSession, 
//                             [
//                             'ID' => $varID.'_DialogIdentityTable',
//                             'ParentID' => $varID.'_DialogIdentityPlcHod'   //,
// //                            'Style' => $varStyle_TableAction
//                             ],
//                             self::getSyntaxCreateDOM_TableHead($varUserSession, 
//                                 [
//                                     'ID' => $varID.'_DialogIdentityTableHead',
//                                     'ParentID' => $varID.'_DialogIdentityTable'
//                                 ],
//                                 ''
//                                 ).
//                             self::getSyntaxCreateDOM_TableBody($varUserSession, 
//                                 [
//                                     'ID' => $varID.'_DialogIdentityTableBody',
//                                     'ParentID' => $varID.'_DialogIdentityTable'
//                                 ],
//                                 (
//                                 //---> File Name
//                                 self::getSyntaxCreateDOM_TableRow(
//                                     $varUserSession, 
//                                     [
//                                     'ID' => 'varObjTTR',
//                                     'ParentID' => $varID.'_DialogIdentityTableBody'
//                                     ],
//                                     (
//                                     self::getSyntaxCreateDOM_TableData(
//                                         $varUserSession, 
//                                         [
//                                         'ID' => 'varObjTTD',
//                                         'ParentID' => 'varObjTTR',
//                                         'Style' => $varStyle_TableDataStyle,
//                                         ],
//                                         'varObjTTD.appendChild(document.createTextNode(\'File Name\')); '
//                                         ).
//                                     self::getSyntaxCreateDOM_TableData(
//                                         $varUserSession, 
//                                         [
//                                         'ID' => 'varObjTTD',
//                                         'ParentID' => 'varObjTTR',
//                                         'Style' => $varStyle_TableDataStyle,
//                                         ],
//                                         'varObjTTD.appendChild(document.createTextNode(\':\')); '
//                                         ).
//                                     self::getSyntaxCreateDOM_TableData(
//                                         $varUserSession, 
//                                         [
//                                         'ID' => 'varObjTTD',
//                                         'ParentID' => 'varObjTTR',
//                                         'Style' => $varStyle_TableDataStyle,
//                                         ],
//                                         'varObjTTD.appendChild(document.createTextNode(varName)); '
//                                         )
//                                     )).
//                                 //---> File Type
//                                 self::getSyntaxCreateDOM_TableRow(
//                                     $varUserSession, 
//                                     [
//                                     'ID' => 'varObjTTR',
//                                     'ParentID' => $varID.'_DialogIdentityTableBody'
//                                     ],
//                                     (
//                                     self::getSyntaxCreateDOM_TableData(
//                                         $varUserSession, 
//                                         [
//                                         'ID' => 'varObjTTD',
//                                         'ParentID' => 'varObjTTR',
//                                         'Style' => $varStyle_TableDataStyle,
//                                         ],
//                                         'varObjTTD.appendChild(document.createTextNode(\'File Type\')); '
//                                         ).
//                                     self::getSyntaxCreateDOM_TableData(
//                                         $varUserSession, 
//                                         [
//                                         'ID' => 'varObjTTD',
//                                         'ParentID' => 'varObjTTR',
//                                         'Style' => $varStyle_TableDataStyle,
//                                         ],
//                                         'varObjTTD.appendChild(document.createTextNode(\':\')); '
//                                         ).
//                                     self::getSyntaxCreateDOM_TableData(
//                                         $varUserSession, 
//                                         [
//                                         'ID' => 'varObjTTD',
//                                         'ParentID' => 'varObjTTR',
//                                         'Style' => $varStyle_TableDataStyle,
//                                         ],
//                                         'varObjTTD.appendChild(document.createTextNode(varMIME)); '
//                                         )
//                                     )).
//                                 //---> File Size
//                                 self::getSyntaxCreateDOM_TableRow(
//                                     $varUserSession, 
//                                     [
//                                     'ID' => 'varObjTTR',
//                                     'ParentID' => $varID.'_DialogIdentityTableBody'
//                                     ],
//                                     (
//                                     self::getSyntaxCreateDOM_TableData(
//                                         $varUserSession, 
//                                         [
//                                         'ID' => 'varObjTTD',
//                                         'ParentID' => 'varObjTTR',
//                                         'Style' => $varStyle_TableDataStyle,
//                                         ],
//                                         'varObjTTD.appendChild(document.createTextNode(\'File Size\')); '
//                                         ).
//                                     self::getSyntaxCreateDOM_TableData(
//                                         $varUserSession, 
//                                         [
//                                         'ID' => 'varObjTTD',
//                                         'ParentID' => 'varObjTTR',
//                                         'Style' => $varStyle_TableDataStyle,
//                                         ],
//                                         'varObjTTD.appendChild(document.createTextNode(\':\')); '
//                                         ).
//                                     self::getSyntaxCreateDOM_TableData(
//                                         $varUserSession, 
//                                         [
//                                         'ID' => 'varObjTTD',
//                                         'ParentID' => 'varObjTTR',
//                                         'Style' => $varStyle_TableDataStyle,
//                                         ],
//                                         'varObjTTD.appendChild(document.createTextNode(varSize + \' byte\')); '
//                                         )
//                                     )).
//                                 //---> File Size
//                                 self::getSyntaxCreateDOM_TableRow(
//                                     $varUserSession, 
//                                     [
//                                     'ID' => 'varObjTTR',
//                                     'ParentID' => $varID.'_DialogIdentityTableBody'
//                                     ],
//                                     (
//                                     self::getSyntaxCreateDOM_TableData(
//                                         $varUserSession, 
//                                         [
//                                         'ID' => 'varObjTTD',
//                                         'ParentID' => 'varObjTTR',
//                                         'Style' => $varStyle_TableDataStyle,
//                                         ],
//                                         'varObjTTD.appendChild(document.createTextNode(\'Upload Date Time\')); '
//                                         ).
//                                     self::getSyntaxCreateDOM_TableData(
//                                         $varUserSession, 
//                                         [
//                                         'ID' => 'varObjTTD',
//                                         'ParentID' => 'varObjTTR',
//                                         'Style' => $varStyle_TableDataStyle,
//                                         ],
//                                         'varObjTTD.appendChild(document.createTextNode(\':\')); '
//                                         ).
//                                     self::getSyntaxCreateDOM_TableData(
//                                         $varUserSession, 
//                                         [
//                                         'ID' => 'varObjTTD',
//                                         'ParentID' => 'varObjTTR',
//                                         'Style' => $varStyle_TableDataStyle,
//                                         ],
//                                         'varObjTTD.appendChild(document.createTextNode(varUploadDateTimeTZ)); '
//                                         )
//                                     ))
//                                 )
//                                 )
//                             ).

//                         //---> Dialog ---> DialogPreviewPlcHold ---> DialogTitlePlcHold
//                         self::getSyntaxCreateDOM_Div(
//                             $varUserSession, 
//                             [
//                                 'ID' => $varID.'_DialogTitlePlcHold',
//                                 'ParentID' =>  $varID.'_DialogPreviewPlcHold',
//                                 'Style' => [
//                                     ['position', 'absolute'],
//                                     ['top', '0px'],
//                                     ['left', '0px'],
//                                     ['height', '30px'],
//                                     ['lineHeight', '30px'],
//                                     ['width', '100%'],
//                                     ['background', '#212529'],
//                                     ['backgroundImage', 'linear-gradient(#000108, #181d57 10%, #000108)'],
//                                     ['fontFamily', '\\\'Helvetica, Verdana, Arial, Tahoma, Serif\\\''],
//                                     ['fontWeight', 'bold'],
//                                     ['color', '#212529'],
//                                     ['textShadow', '2px 2px 5px #ced4da']
//                                     ]
//                             ], 
//                             'FILE PREVIEW'
//                             ).
//                         'document.getElementById(\''.$varID.'_DialogTitlePlcHold'.'\').style.zIndex = (varMaxZIndex+3); '.
//                         'document.getElementById(\''.$varID.'_DialogTitlePlcHold'.'\').setAttribute(\'display\', \'table-cell\'); '.
//                         'document.getElementById(\''.$varID.'_DialogTitlePlcHold'.'\').setAttribute(\'align\', \'center\'); '.
//                         'document.getElementById(\''.$varID.'_DialogTitlePlcHold'.'\').setAttribute(\'vertical-align\', \'middle\'); '.

//                         //---> Dialog ---> DialogPreviewPlcHold ---> DialogContentPlcHold
//                         self::getSyntaxCreateDOM_Div(
//                             $varUserSession, 
//                             [
//                                 'ID' => $varID.'_DialogContentPlcHold',
//                                 'ParentID' =>  $varID.'_DialogPreviewPlcHold',
//                                 'Style' => [
//                                     ['position', 'absolute'],
//                                     ['top', '35px'],
//                                     ['left', '5px'],
//                                     ['height', '400px'],
//                                     ['width', '400px'],
// //                                    ['background', 'blue']
// //                                    ['background', 'rgba(bb, bb, 00, 1.0)']
//                                     ]
//                             ], 
//                             ''
//                             ).
//                         'document.getElementById(\''.$varID.'_DialogContentPlcHold'.'\').style.zIndex = (varMaxZIndex+4); '.

//                         //---> Dialog ---> DialogPreviewPlcHold ---> DialogContentPlcHold ---> DialogContentPlcHoldBack
//                         self::getSyntaxCreateDOM_Div(
//                             $varUserSession, 
//                             [
//                                 'ID' => $varID.'_DialogContentPlcHoldBack',
//                                 'ParentID' =>  $varID.'_DialogContentPlcHold',
//                                 'Style' => [
//                                     ['position', 'absolute'],
//                                     ['top', '50%'],
//                                     ['left', '50%'],
//                                     ['height', '400px'],
//                                     ['width', '400px'],
//                                     ['background', 'white'],
//                                     ['transform', 'translate(-50%, -50%)']
//                                     ]
//                             ], 
//                             ''
//                             ).
//                         'document.getElementById(\''.$varID.'_DialogContentPlcHoldBack'.'\').style.zIndex = (varMaxZIndex+5); '.

//                         'zhtInnerFunc_ShowThumbnails(varLocalThumbnailsFolderPath, 1, \'\'); '.

//                         //---> Dialog ---> DialogPreviewPlcHold ---> DialogContentPlcHold ---> DialogContentPlcHoldBack ---> DialogContentThumbnailImage
//                         self::getSyntaxCreateDOM_Image(
//                             $varUserSession, 
//                             [
//                                 'ID' => $varID.'_DialogContentThumbnailImage',
//                                 'ParentID' =>  $varID.'_DialogContentPlcHoldBack',
//                                 'Height' => 400,
//                                 'Style' => [
//                                     ['position', 'absolute'],
//                                     ['top', '50%'],
//                                     ['left', '50%'],
//                                     ['transform', 'translate(-50%, -50%)']
//                                     ]
//                             ], 
//                             'varImageSource'
//                             ).
//                         'document.getElementById(\''.$varID.'_DialogContentThumbnailImage'.'\').style.zIndex = (varMaxZIndex+6); '.

//                         //---> Dialog ---> DialogPreviewPlcHold ---> DialogButtonPlcHold
//                         self::getSyntaxCreateDOM_Div(
//                             $varUserSession, 
//                             [
//                                 'ID' => $varID.'_DialogButtonPlcHold',
//                                 'ParentID' =>  $varID.'_DialogPreviewPlcHold',
//                                 'Style' => [
//                                     ['position', 'absolute'],
//                                     ['top', '440px'],
//                                     ['left', '0px'],
//                                     ['height', '40px'],
//                                     ['inlineHeight', '40px'],
//                                     ['width', '100%'],
//                                     ['backgroundImage', 'linear-gradient(#000108, #181d57 10%, #000108)'],
//                                     ]
//                             ], 
//                             ''
//                             ).
//                         'document.getElementById(\''.$varID.'_DialogButtonPlcHold'.'\').style.zIndex = (varMaxZIndex+4); '.
//                         'document.getElementById(\''.$varID.'_DialogButtonPlcHold'.'\').setAttribute(\'align\', \'center\'); '.

//                         //---> Dialog ---> DialogPreviewPlcHold ---> DialogButtonPlcHold ---> DialogActionTable
//                         self::getSyntaxCreateDOM_Table(
//                             $varUserSession, 
//                             [
//                             'ID' => $varID.'_DialogActionTable',
//                             'ParentID' => $varID.'_DialogButtonPlcHold',
//                             'Style' => [
//                                 ['position', 'relative'],
//                                 ['top', '50%'],
//                                 ]
// //                            'Style' => $varStyle_TableAction
//                             ],
//                             self::getSyntaxCreateDOM_TableHead($varUserSession, 
//                                 [
//                                     'ID' => $varID.'_DialogActionTableHead',
//                                     'ParentID' => $varID.'_DialogActionTable'
//                                 ],
//                                 ''
//                                 ).
//                             self::getSyntaxCreateDOM_TableBody($varUserSession, 
//                                 [
//                                     'ID' => $varID.'_DialogActionTableBody',
//                                     'ParentID' => $varID.'_DialogActionTable'
//                                 ],
//                                 (
//                                 self::getSyntaxCreateDOM_TableRow(
//                                     $varUserSession, 
//                                     [
//                                     'ID' => $varID.'_DialogActionTTR',
//                                     'ParentID' => $varID.'_DialogActionTableBody'
//                                     ],
//                                     (
//                                     //---> Pagination
//                                     self::getSyntaxCreateDOM_TableData(
//                                         $varUserSession, 
//                                         [
//                                         'ID' => $varID.'_DialogPaginationTTD',
//                                         'ParentID' => $varID.'_DialogActionTTR',
//                                         'Style' => $varStyle_TableDataStyle,
//                                         ],
//                                         (
//                                         self::getSyntaxCreateDOM_Table(
//                                             $varUserSession, 
//                                             [
//                                             'ID' => $varID.'_DialogPaginationTable',
//                                             'ParentID' => $varID.'_DialogPaginationTTD',
//                                             'Style' => [
//                                                 ['position', 'relative'],
//                                                 //['top', '50%'],
//                                                 ['border', '1px solid #ced4da'],
//                                                 ['borderColor', 'ced4da'],
//                                                 ['borderSpacing', '2px'],
//                                                 ['padding', '2px'],
//                                                 ['backgroundImage', 'linear-gradient(#a10e03, #360401 30%, #a10e03)'],
//                                                 ['borderRadius', '10px']
//                                                 ]
//                                             ],
//                                             self::getSyntaxCreateDOM_TableHead($varUserSession, 
//                                                 [
//                                                     'ID' => $varID.'_DialogPaginationTableHead',
//                                                     'ParentID' => $varID.'_DialogPaginationTable'
//                                                 ],
//                                                 ''
//                                                 ).
//                                             self::getSyntaxCreateDOM_TableBody(
//                                                 $varUserSession, 
//                                                 [
//                                                     'ID' => $varID.'_DialogPaginationTableBody',
//                                                     'ParentID' => $varID.'_DialogPaginationTable'
//                                                 ],
//                                                 self::getSyntaxCreateDOM_TableRow(
//                                                     $varUserSession, 
//                                                     [
//                                                     'ID' => $varID.'_DialogPaginationTTR',
//                                                     'ParentID' => $varID.'_DialogPaginationTableBody'
//                                                     ],


//                                                     //---> Page Next
//                                                     self::getSyntaxCreateDOM_TableData(
//                                                         $varUserSession, 
//                                                         [
//                                                         'ID' => $varID.'_DialogPagePreviousTTD',
//                                                         'ParentID' => $varID.'_DialogPaginationTTR',
//                                                         'Style' => $varStyle_TableDataPagination
//                                                         ],
//                                                         ''
//                                                         ).
//                                                     self::getSyntaxCreateDOM_Image(
//                                                         $varUserSession, 
//                                                         [
//                                                             'ID' => $varID.'_PagePreviousImg',
//                                                             'ParentID' =>  $varID.'_DialogPagePreviousTTD',
//                                                             'Height' => 25,
//                                                             'Style' => [
//                                                                 ['position', 'relative'],
//                                                                 ['top', '50%'],
//                                                                 ['left', '0'],
//                                                                 ['filter', 'drop-shadow(3px 3px 3px #ced4da)']
//                                                                 ]
//                                                         ], 
//                                                         '\'images/Icon/Pagination/Previous-300-32.png\''
//                                                         ).
//                                                     //---> Pagination Label1
//                                                     self::getSyntaxCreateDOM_TableData(
//                                                         $varUserSession, 
//                                                         [
//                                                         'ID' => $varID.'_DialogPaginationLabel1TTD',
//                                                         'ParentID' => $varID.'_DialogPaginationTTR',
//                                                         'Style' => $varStyle_TableDataPagination
//                                                         ],
//                                                         (
//                                                         self::getSyntaxCreateDOM_Label(
//                                                             $varUserSession, 
//                                                             [
//                                                             'ID' => $varID.'_LabelPage1',
//                                                             'ParentID' => $varID.'_DialogPaginationLabel1TTD'
//                                                             ],
//                                                             'Page '
//                                                             )
//                                                         )).
//                                                     //---> Page Select
//                                                     self::getSyntaxCreateDOM_TableData(
//                                                         $varUserSession, 
//                                                         [
//                                                         'ID' => $varID.'_DialogPageTTD',
//                                                         'ParentID' => $varID.'_DialogPaginationTTR',
//                                                         'Style' => $varStyle_TableDataPagination
//                                                         ],
//                                                         ''
//                                                         ).
//                                                     //---> Pagination Label2
//                                                     self::getSyntaxCreateDOM_TableData(
//                                                         $varUserSession, 
//                                                         [
//                                                         'ID' => $varID.'_DialogPaginationLabel2TTD',
//                                                         'ParentID' => $varID.'_DialogPaginationTTR',
//                                                         'Style' => $varStyle_TableDataPagination
//                                                         ],
//                                                         (
//                                                         self::getSyntaxCreateDOM_Label(
//                                                             $varUserSession, 
//                                                             [
//                                                             'ID' => $varID.'_LabelPage2',
//                                                             'ParentID' => $varID.'_DialogPaginationLabel2TTD'
//                                                             ],
//                                                             ' of '
//                                                             )
//                                                         )).
//                                                     //---> Pagination Label3
//                                                     self::getSyntaxCreateDOM_TableData(
//                                                         $varUserSession, 
//                                                         [
//                                                         'ID' => $varID.'_DialogPaginationLabel3TTD',
//                                                         'ParentID' => $varID.'_DialogPaginationTTR',
//                                                         'Style' => $varStyle_TableDataStyle,
//                                                         ],
//                                                         (
//                                                         self::getSyntaxCreateDOM_Label(
//                                                             $varUserSession, 
//                                                             [
//                                                             'ID' => $varID.'_LabelTotalPage',
//                                                             'ParentID' => $varID.'_DialogPaginationLabel3TTD'
//                                                             ],
//                                                             ' of '
//                                                             )
//                                                         )).
//                                                     //---> Page Next
//                                                     self::getSyntaxCreateDOM_TableData(
//                                                         $varUserSession, 
//                                                         [
//                                                         'ID' => $varID.'_DialogPageNextTTD',
//                                                         'ParentID' => $varID.'_DialogPaginationTTR',
//                                                         'Style' => $varStyle_TableDataPagination
//                                                         ],
//                                                         ''
//                                                         ).
//                                                     self::getSyntaxCreateDOM_Image(
//                                                         $varUserSession, 
//                                                         [
//                                                             'ID' => $varID.'_PageNextImg',
//                                                             'ParentID' =>  $varID.'_DialogPageNextTTD',
//                                                             'Height' => 25,
//                                                             'Style' => [
//                                                                 ['position', 'relative'],
//                                                                 ['top', '50%'],
//                                                                 ['left', '0'],
//                                                                 ['filter', 'drop-shadow(3px 3px 3px #ced4da)']
//                                                                 ]
//                                                         ], 
//                                                         '\'images/Icon/Pagination/Next-300-32.png\''
//                                                         )


//                                                     )
//                                                 )
//                                             )
//                                         )
//                                         ).
//                                     //---> Recreate Action Button
//                                     self::getSyntaxCreateDOM_TableData(
//                                         $varUserSession, 
//                                         [
//                                         'ID' => $varID.'_DialogRecreateTTD',
//                                         'ParentID' => $varID.'_DialogActionTTR',
//                                         'Style' => $varStyle_TableDataStyle,
//                                         ],
//                                         ''
//                                         ).
//                                     //---> Close Button
//                                     self::getSyntaxCreateDOM_TableData(
//                                         $varUserSession, 
//                                         [
//                                         'ID' => $varID.'_DialogCloseTTD',
//                                         'ParentID' => $varID.'_DialogActionTTR',
//                                         'Style' => $varStyle_TableDataStyle,
//                                         ],
//                                         ''
//                                         )
//                                     ))
//                                 ))
//                             ).
//                         'document.getElementById(\''.$varID.'_DialogActionTable'.'\').style.transform = \'translateY(-50%)\'; '.
// //                        'document.getElementById(\''.$varID.'_DialogActionTable'.'\').onclick = function() {alert(\'xxx\');}(); '.

//                         //---> Dialog ---> DialogPreviewPlcHold ---> DialogButtonPlcHold ---> DialogPageSelect
//                         'varDataArrayOption = zhtInnerFunc_GetThumbnailsReload(varLocalThumbnailsFolderPath, varFilePath); '.

//                         //---> Dialog ---> DialogPreviewPlcHold ---> DialogButtonPlcHold ---> DialogRecreateButton
//                         self::getSyntaxCreateDOM_Button(
//                             $varUserSession, 
//                             [
//                                 'ID' => $varID.'_DialogRecreateButton',
//                                 'ParentID' => $varID.'_DialogRecreateTTD',
//                                 'Style' => [
//                                     ['position', 'relative'],
//                                     ['top', '50%'],
//                                     ]
//                             ], 
//                             'Recreate',
//                             'function() {'.
//                                 'zhtInnerFunc_RecreateThumbnails(varLocalThumbnailsFolderPath, varFilePath); '.
//                                 'zhtInnerFunc_ShowThumbnails(varLocalThumbnailsFolderPath, 1, \'\'); '.
//                                 '}'
//                             ).

//                         //---> Dialog ---> DialogPreviewPlcHold ---> DialogButtonPlcHold ---> DialogCloseButton
//                         self::getSyntaxCreateDOM_Button(
//                             $varUserSession, 
//                             [
//                                 'ID' => $varID.'_DialogCloseButton',
//                                 'ParentID' => $varID.'_DialogCloseTTD',
//                                 'Style' => [
//                                     ['position', 'relative'],
//                                     ['top', '50%'],
//                                     ]
//                             ], 
//                             'Close',
//                             'function() {'.
//                                 'zhtInnerFunc_CloseDivModal(document.getElementById(\''.$varID.'_Back'.'\')); '.
//                                 '}'
//                             ).

//                         //'varNothing = '.self::getSyntaxCreateDOM_DivCustom_ModalBox_ProcessLoad($varUserSession, $varID, $varID.'_Back', false).'; '.

//                         'if(zhtInnerFunc_CheckConvertibleStatus(varFilePath) == false) {'.
//                             'document.getElementById(\''.$varID.'_DialogRecreateTTD'.'\').style.display = \'none\'; '.
//                             'document.getElementById(\''.$varID.'_DialogRecreateTTD'.'\').style.visibility = \'hidden\'; '.
//                             '}'.
//                         '}'.
//                     'catch(varError) {'.
//                         '}'.
//                     '} (varFilePath, varName, varSize, varMIME, varUploadDateTimeTZ); '.
//                     '';
//             return $varReturn;
//             }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getSyntaxCreateDOM_Button                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-08-23                                                                                           |
        | ▪ Creation Date   : 2022-08-23                                                                                           |
        | ▪ Description     : Mendapatkan Syntax Pembuatan DOM Object : Button                                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession (Mandatory) ► User Session                                                                |
        |      ▪ (array)  varArrayProperties (Mandatory) ► DOM Properties                                                          |
        |        Example :                                                                                                         |
        |           ► []                                                                                                           |
        |           ► [ 'ID' => 'MyID' ]                                                                                           |
        |           ► [ 'ID' => 'MyID',                                                                                            |
        |               'ParentID' => ... ,                                                                                        |
        |               'Style' => [                                                                                               |
        |                     ['...', ...]                                                                                         |
        |                  ]                                                                                                       |
        |             ]                                                                                                            |
        |      ▪ (string) varContent (Mandatory) ► Content                                                                         |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getSyntaxCreateDOM_Button($varUserSession, $varArrayProperties, $varText, string $varClickEvent = null)
            {
            $varReturn = '';
            $varObjectID = (
                (\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'ID', $varArrayProperties) == FALSE) ? 
                    'TempObject' : 
                    $varArrayProperties['ID']
                );

            if((\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'Style', $varArrayProperties) == TRUE)) {
                for($i=0, $iMax=count($varArrayProperties['Style']); $i!=$iMax; $i++) {
                    $varReturn .= $varObjectID.'.style.'.$varArrayProperties['Style'][$i][0].' = \''.$varArrayProperties['Style'][$i][1].'\'; ';
                    }
                }
            $varReturn = 
                'var '.$varObjectID.' = document.createElement(\'button\'); '.
                //---> set ID
                $varObjectID.'.id = \''.$varObjectID.'\'; '.
                //---> innerHTML
                $varObjectID.'.innerHTML = \''.$varText.'\'; '.
                //---> innerHTML
                (!$varClickEvent ? '' : 
                    //$varObjectID.'.onclick = function(){alert(\'xxxxxxxxxxxxx\');}; '
                    $varObjectID.'.onclick = '.$varClickEvent.'; '
                    ).
                //---> style
                $varReturn.
                //---> appendChild
                ((\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'ParentID', $varArrayProperties) == FALSE) ? '' : 
                    $varArrayProperties['ParentID'].'.appendChild('.$varObjectID.'); '
                    ).
                //---> remove ID
                ((\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'ID', $varArrayProperties) == TRUE) ? '' : 
                    $varObjectID.'.removeAttribute(\'id\'); ').
                '';

            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getSyntaxCreateDOM_Div                                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-08-23                                                                                           |
        | ▪ Creation Date   : 2022-08-23                                                                                           |
        | ▪ Description     : Mendapatkan Syntax Pembuatan DOM Object : Div                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession (Mandatory) ► User Session                                                                |
        |      ▪ (array)  varArrayProperties (Mandatory) ► DOM Properties                                                          |
        |        Example :                                                                                                         |
        |           ► []                                                                                                           |
        |           ► [ 'ID' => 'MyID' ]                                                                                           |
        |           ► [ 'ID' => 'MyID',                                                                                            |
        |               'ParentID' => ... ,                                                                                        |
        |               'Style' => [                                                                                               |
        |                     ['...', ...]                                                                                         |
        |                  ]                                                                                                       |
        |             ]                                                                                                            |
        |      ▪ (string) varContent (Mandatory) ► Content                                                                         |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getSyntaxCreateDOM_Div($varUserSession, $varArrayProperties, string $varContent)
            {
            $varReturn = '';
            $varObjectID = (
                (\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'ID', $varArrayProperties) == FALSE) ? 
                    'TempObject' : 
                    $varArrayProperties['ID']
                );
            if((\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'Style', $varArrayProperties) == TRUE)) {
                for($i=0, $iMax=count($varArrayProperties['Style']); $i!=$iMax; $i++) {
                    $varReturn .= $varObjectID.'.style.'.$varArrayProperties['Style'][$i][0].' = \''.$varArrayProperties['Style'][$i][1].'\'; ';
                    }                
                }
            $varReturn = 
                'var '.$varObjectID.' = document.createElement(\'div\'); '.
                //---> set ID
                $varObjectID.'.id = \''.$varObjectID.'\'; '.
                //---> innerHTML
                $varObjectID.'.innerHTML = \''.$varContent.'\'; '.
//                ((\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'Value', $varArrayProperties) == FALSE) ? '' : 
//                    ''.$varArrayProperties['ID'].'.setAttribute(\'value\', \''.$varArrayProperties['Value'].'\'); '
//                    ).
                   
                //---> style
                $varReturn.
                //---> appendChild
                ((\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'ParentID', $varArrayProperties) == FALSE) ? '' : 
                    $varArrayProperties['ParentID'].'.appendChild('.$varObjectID.'); '
                    ).
                //---> remove ID
                ((\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'ID', $varArrayProperties) == TRUE) ? '' : 
                    $varObjectID.'.removeAttribute(\'id\'); ').
                '';
      
            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getSyntaxCreateDOM_Select                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-08-27                                                                                           |
        | ▪ Creation Date   : 2022-08-27                                                                                           |
        | ▪ Description     : Mendapatkan Syntax Pembuatan DOM Object : Select                                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession (Mandatory) ► User Session                                                                |
        |      ▪ (array)  varArrayProperties (Mandatory) ► DOM Properties                                                          |
        |        Example :                                                                                                         |
        |           ► []                                                                                                           |
        |           ► [ 'ID' => 'MyID' ]                                                                                           |
        |           ► [ 'ID' => 'MyID',                                                                                            |
        |               'ParentID' => ... ,                                                                                        |
        |               'Style' => [                                                                                               |
        |                     ['...', ...]                                                                                         |
        |                  ]                                                                                                       |
        |             ]                                                                                                            |
        |      ▪ (string) varContent (Mandatory) ► Content                                                                         |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getSyntaxCreateDOM_Select($varUserSession, $varArrayProperties, string $varArrayOptionName = null, array $varArrayOptionPHPOverride = null)
            {
            if(!$varArrayOptionName) {
                $varArrayOptionName = 'varDataArrayOption';
                }
            if(!$varArrayOptionPHPOverride) {
                $varArrayOptionPHPOverride = [];
                }
            
            $varReturn = '';
            $varObjectID = (
                (\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'ID', $varArrayProperties) == FALSE) ? 
                    'TempObject' : 
                    $varArrayProperties['ID']
                );
            if((\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'Style', $varArrayProperties) == TRUE)) {
                for($i=0, $iMax=count($varArrayProperties['Style']); $i!=$iMax; $i++) {
                    $varReturn .= $varObjectID.'.style.'.$varArrayProperties['Style'][$i][0].' = \''.$varArrayProperties['Style'][$i][1].'\'; ';
                    }                
                }

            //---> $varReturnOpt 
            $varReturnOpt = '';
            if(($iMax = count($varArrayOptionPHPOverride)) > 0)
                {
                $varReturnOpt = ''.$varArrayOptionName.' = []; ';
                for($i=0; $i!=$iMax; $i++)
                    {
                    $varReturnOpt .= 
                        $varArrayOptionName.'.push({'.
                            'value: \''.$varArrayOptionPHPOverride[$i][0].'\','.
                            'text: \''.$varArrayOptionPHPOverride[$i][1].'\''.
                            '}); ';
                    //$varReturnOpt .= 
                    //    'ObjOpt = document.getElementById(\''.$varObjectID.'\').appendChild(document.createElement(\'option\')); ';
                    }
                }
            $varReturnOpt .= 
                'for (let i = 0; i < '.$varArrayOptionName.'.length; i++) {'.
                    'var ObjOpt = document.createElement(\'option\'); '.
                    'ObjOpt.value = ('.$varArrayOptionName.'[i]).value; '.
                    'ObjOpt.text = ('.$varArrayOptionName.'[i]).text; '.
                    $varObjectID.'.appendChild(ObjOpt); '.
                    '}';
                
            $varReturn = 
                'function('.$varArrayOptionName.') {'.
                    'var '.$varObjectID.' = document.createElement(\'select\'); '.
                    //---> set ID
                    $varObjectID.'.id = \''.$varObjectID.'\'; '.
                    //---> style
                    $varReturn.
                    $varReturnOpt.
                    //---> appendChild
                    ((\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'ParentID', $varArrayProperties) == FALSE) ? '' : 
                        $varArrayProperties['ParentID'].'.appendChild('.$varObjectID.'); '
                        ).
                    //---> remove ID
                    ((\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'ID', $varArrayProperties) == TRUE) ? '' : 
                        $varObjectID.'.removeAttribute(\'id\'); ').
                    '} ('.$varArrayOptionName.') ';
      
            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getSyntaxCreateDOM_Image                                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-08-24                                                                                           |
        | ▪ Creation Date   : 2022-08-24                                                                                           |
        | ▪ Description     : Mendapatkan Syntax Pembuatan DOM Object : Img                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession (Mandatory) ► User Session                                                                |
        |      ▪ (array)  varArrayProperties (Mandatory) ► DOM Properties                                                          |
        |        Example :                                                                                                         |
        |           ► []                                                                                                           |
        |           ► [ 'ID' => 'MyID' ]                                                                                           |
        |           ► [ 'ID' => 'MyID',                                                                                            |
        |               'ParentID' => ... ,                                                                                        |
        |               'Style' => [                                                                                               |
        |                     ['...', ...]                                                                                         |
        |                  ]                                                                                                       |
        |             ]                                                                                                            |
        |      ▪ (string) varContent (Mandatory) ► Content                                                                         |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getSyntaxCreateDOM_Image($varUserSession, $varArrayProperties, string $varFilePath)
            {
            $varReturn = '';
            $varObjectID = (
                (\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'ID', $varArrayProperties) == FALSE) ? 
                    'TempObject' : 
                    $varArrayProperties['ID']
                );
            if((\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'Style', $varArrayProperties) == TRUE)) {
                for($i=0, $iMax=count($varArrayProperties['Style']); $i!=$iMax; $i++) {
                    $varReturn .= $varObjectID.'.style.'.$varArrayProperties['Style'][$i][0].' = \''.$varArrayProperties['Style'][$i][1].'\'; ';
                    }                
                }

            $varReturn = 
                'var '.$varObjectID.' = document.createElement(\'img\'); '.
                //---> set ID
                $varObjectID.'.id = \''.$varObjectID.'\'; '.
                //---> src
                (!$varFilePath ? '' : 
                    $varObjectID.'.src = '.$varFilePath.'; '
                    ).
                //---> height
                ((\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'Height', $varArrayProperties) == FALSE) ? '' : 
                    $varObjectID.'.height = \''.$varArrayProperties['Height'].'\'; '
                    ).
                //---> width
                ((\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'Width', $varArrayProperties) == FALSE) ? '' : 
                    $varObjectID.'.width = \''.$varArrayProperties['Width'].'\'; '
                    ).
                //---> style
                $varReturn.
                //---> appendChild
                ((\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'ParentID', $varArrayProperties) == FALSE) ? '' : 
                    $varArrayProperties['ParentID'].'.appendChild('.$varObjectID.'); '
                    ).
                //---> remove ID
                ((\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'ID', $varArrayProperties) == TRUE) ? '' : 
                    $varObjectID.'.removeAttribute(\'id\'); ').
                '';

            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getSyntaxCreateDOM_InputHidden                                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0001.0000000                                                                                       |
        | ▪ Last Update     : 2023-01-13                                                                                           |
        | ▪ Creation Date   : 2022-09-05                                                                                           |
        | ▪ Description     : Mendapatkan Syntax Pembuatan DOM Object : Input Hidden                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession (Mandatory) ► User Session                                                                |
        |      ▪ (array)  varArrayProperties (Mandatory) ► DOM Properties                                                          |
        |        Example :                                                                                                         |
        |           ► []                                                                                                           |
        |           ► [ 'ID' => 'MyID' ]                                                                                           |
        |           ► [ 'ID' => 'MyID',                                                                                            |
        |               'ParentID' => ... ,                                                                                        |
        |               'Style' => [                                                                                               |
        |                     ['...', ...]                                                                                         |
        |                  ]                                                                                                       |
        |             ]                                                                                                            |
        |      ▪ (string) varContent (Mandatory) ► Content                                                                         |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getSyntaxCreateDOM_InputHidden($varUserSession, $varArrayProperties)
            {
            $varReturn = '';
            $varObjectID = (
                (\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'ID', $varArrayProperties) == FALSE) ? 
                    'TempObject' : 
                    $varArrayProperties['ID']
                );

            if((\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'Style', $varArrayProperties) == TRUE)) {
                for($i=0, $iMax=count($varArrayProperties['Style']); $i!=$iMax; $i++) {
                    $varReturn .= $varObjectID.'.style.'.$varArrayProperties['Style'][$i][0].' = \''.$varArrayProperties['Style'][$i][1].'\'; ';
                    }
                }
            $varReturn = 
                'var '.$varObjectID.' = document.createElement(\'input\'); '.
                //---> set ID
                $varObjectID.'.id = \''.$varObjectID.'\'; '.
                ''.$varArrayProperties['ID'].'.setAttribute(\'type\', \'hidden\'); '.
                //---> value
                ((\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'Value', $varArrayProperties) == FALSE) ? '' : 
                    ''.$varArrayProperties['ID'].'.setAttribute(\'value\', \''.$varArrayProperties['Value'].'\'); '
                    ).
                //---> style
                $varReturn.
                //---> appendChild
                ((\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'ParentID', $varArrayProperties) == FALSE) ? '' : 
                    $varArrayProperties['ParentID'].'.appendChild('.$varObjectID.'); '
                    ).
                //---> remove ID
                ((\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'ID', $varArrayProperties) == TRUE) ? '' : 
                    $varObjectID.'.removeAttribute(\'id\'); ').
                '';

            return $varReturn;
            }



        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getSyntaxCreateDOM_InputText                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-08-18                                                                                           |
        | ▪ Creation Date   : 2022-08-18                                                                                           |
        | ▪ Description     : Mendapatkan Syntax Pembuatan DOM Object : Input Text                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession (Mandatory) ► User Session                                                                |
        |      ▪ (array)  varArrayProperties (Mandatory) ► DOM Properties                                                          |
        |        Example :                                                                                                         |
        |           ► []                                                                                                           |
        |           ► [ 'ID' => 'MyID' ]                                                                                           |
        |           ► [ 'ID' => 'MyID',                                                                                            |
        |               'ParentID' => ... ,                                                                                        |
        |               'Style' => [                                                                                               |
        |                     ['...', ...]                                                                                         |
        |                  ]                                                                                                       |
        |             ]                                                                                                            |
        |      ▪ (string) varContent (Mandatory) ► Content                                                                         |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getSyntaxCreateDOM_InputText($varUserSession, $varArrayProperties)
            {
            $varReturn = '';
            $varObjectID = (
                (\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'ID', $varArrayProperties) == FALSE) ? 
                    'TempObject' : 
                    $varArrayProperties['ID']
                );

            if((\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'Style', $varArrayProperties) == TRUE)) {
                for($i=0, $iMax=count($varArrayProperties['Style']); $i!=$iMax; $i++) {
                    $varReturn .= $varObjectID.'.style.'.$varArrayProperties['Style'][$i][0].' = \''.$varArrayProperties['Style'][$i][1].'\'; ';
                    }
                }
            $varReturn = 
                'var '.$varObjectID.' = document.createElement(\'input\'); '.
                //---> set ID
                $varObjectID.'.id = \''.$varObjectID.'\'; '.
                ''.$varArrayProperties['ID'].'.setAttribute(\'type\', \'text\'); '.
                //---> value
                ((\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'Value', $varArrayProperties) == FALSE) ? '' : 
                    ''.$varArrayProperties['ID'].'.setAttribute(\'value\', \''.$varArrayProperties['Value'].'\'); '
                    ).
                //---> style
                $varReturn.
                //---> appendChild
                ((\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'ParentID', $varArrayProperties) == FALSE) ? '' : 
                    $varArrayProperties['ParentID'].'.appendChild('.$varObjectID.'); '
                    ).
                //---> remove ID
                ((\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'ID', $varArrayProperties) == TRUE) ? '' : 
                    $varObjectID.'.removeAttribute(\'id\'); ').
                '';

            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getSyntaxCreateDOM_JavaScript                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-08-29                                                                                           |
        | ▪ Creation Date   : 2022-08-29                                                                                           |
        | ▪ Description     : Mendapatkan Syntax Pembuatan DOM Object : JavaScript                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession (Mandatory) ► User Session                                                                |
        |      ▪ (array)  varArrayProperties (Mandatory) ► DOM Properties                                                          |
        |        Example :                                                                                                         |
        |           ► []                                                                                                           |
        |           ► [ 'ID' => 'MyID' ]                                                                                           |
        |           ► [ 'ID' => 'MyID',                                                                                            |
        |               'ParentID' => ... ,                                                                                        |
        |               'Style' => [                                                                                               |
        |                     ['...', ...]                                                                                         |
        |                  ]                                                                                                       |
        |             ]                                                                                                            |
        |      ▪ (string) varContent (Mandatory) ► Content                                                                         |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getSyntaxCreateDOM_JavaScript($varUserSession, $varArrayProperties, string $varText = null)
            {
            if(!$varText) {
                $varText = '';
                }

            $varReturn = '';

            if((\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'Style', $varArrayProperties) == TRUE)) {
                for($i=0, $iMax=count($varArrayProperties['Style']); $i!=$iMax; $i++) {
                    $varReturn .= $varObjectID.'.style.'.$varArrayProperties['Style'][$i][0].' = \''.$varArrayProperties['Style'][$i][1].'\'; ';
                    }
                }

            $varReturn = 
                'varNothing = function () {'.
                    'try {'.
                        'var ObjHead = document.getElementsByTagName(\'head\')[0]; '.
                        'var ObjScript = document.createElement(\'script\'); '.
                        'ObjScript.type = \'text/javascript\'; '.
                        'ObjScript.text = \''.$varText.'\'; '.
                        //'alert(\'Done yah\');'.
                        'ObjHead.appendChild(ObjScript); '.
                        '}'.
                    'catch(varError) {'.
                        'alert(\'ERP Reborn Error Notification\n\nInvalid Object\n(\' + varError + \')\'); '.
                        '}'.
                    '} ();'.
                    '';

            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getSyntaxCreateDOM_Label                                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-08-29                                                                                           |
        | ▪ Creation Date   : 2022-08-29                                                                                           |
        | ▪ Description     : Mendapatkan Syntax Pembuatan DOM Object : Label                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession (Mandatory) ► User Session                                                                |
        |      ▪ (array)  varArrayProperties (Mandatory) ► DOM Properties                                                          |
        |        Example :                                                                                                         |
        |           ► []                                                                                                           |
        |           ► [ 'ID' => 'MyID' ]                                                                                           |
        |           ► [ 'ID' => 'MyID',                                                                                            |
        |               'ParentID' => ... ,                                                                                        |
        |               'Style' => [                                                                                               |
        |                     ['...', ...]                                                                                         |
        |                  ]                                                                                                       |
        |             ]                                                                                                            |
        |      ▪ (string) varContent (Mandatory) ► Content                                                                         |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getSyntaxCreateDOM_Label($varUserSession, $varArrayProperties, string $varCaption = null)
            {
            $varReturn = '';
            $varObjectID = (
                (\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'ID', $varArrayProperties) == FALSE) ? 
                    'TempObject' : 
                    $varArrayProperties['ID']
                );

            if((\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'Style', $varArrayProperties) == TRUE)) {
                for($i=0, $iMax=count($varArrayProperties['Style']); $i!=$iMax; $i++) {
                    $varReturn .= $varObjectID.'.style.'.$varArrayProperties['Style'][$i][0].' = \''.$varArrayProperties['Style'][$i][1].'\'; ';
                    }
                }
            $varReturn = 
                'varNothing = function (varCaption) {'.
                    'var '.$varObjectID.' = document.createElement(\'label\'); '.
                    //---> set ID
                    $varObjectID.'.id = \''.$varObjectID.'\'; '.
                    //---> Caption
                    //$varObjectID.'.innerHTML = \''.$varCaption.'\';'.
                    $varObjectID.'.innerHTML = varCaption;'.
                    //---> style
                    $varReturn.
                    //---> appendChild
                    ((\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'ParentID', $varArrayProperties) == FALSE) ? '' : 
                        $varArrayProperties['ParentID'].'.appendChild('.$varObjectID.'); '
                        ).
                    //---> remove ID
                    ((\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'ID', $varArrayProperties) == TRUE) ? '' : 
                        $varObjectID.'.removeAttribute(\'id\'); ').
                    '} ('.($varCaption ? '\''.$varCaption.'\'' : 'varCaption').');'.
                    ''
                    ;

            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getSyntaxCreateDOM_Table                                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-08-18                                                                                           |
        | ▪ Creation Date   : 2022-08-18                                                                                           |
        | ▪ Description     : Mendapatkan Syntax Pembuatan DOM Object : Table                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession (Mandatory) ► User Session                                                                |
        |      ▪ (array)  varArrayProperties (Mandatory) ► DOM Properties                                                          |
        |        Example :                                                                                                         |
        |           ► []                                                                                                           |
        |           ► [ 'ID' => 'MyID' ]                                                                                           |
        |           ► [ 'ID' => 'MyID',                                                                                            |
        |               'ParentID' => ... ,                                                                                        |
        |               'Style' => [                                                                                               |
        |                     ['...', ...]                                                                                         |
        |                  ]                                                                                                       |
        |             ]                                                                                                            |
        |      ▪ (string) varContent (Mandatory) ► Content                                                                         |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getSyntaxCreateDOM_Table($varUserSession, array $varArrayProperties, string $varContent)
            {
            $varReturn = '';
            $varObjectID = (
                (\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'ID', $varArrayProperties) == FALSE) ? 
                    'TempObject' : 
                    $varArrayProperties['ID']
                );

            if((\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'Style', $varArrayProperties) == TRUE)) {
                for($i=0, $iMax=count($varArrayProperties['Style']); $i!=$iMax; $i++) {
                    $varReturn .= $varObjectID.'.style.'.$varArrayProperties['Style'][$i][0].' = \''.$varArrayProperties['Style'][$i][1].'\'; ';
                    }
                }

            $varReturn = 
                'var '.$varObjectID.' = document.createElement(\'table\');'.
                //---> set ID
                $varObjectID.'.id = \''.$varObjectID.'\'; '.
                //---> content
                $varContent.
                //---> style
                $varReturn.                
                //---> appendChild
                ((\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'ParentID', $varArrayProperties) == FALSE) ? '' : 
                    $varArrayProperties['ParentID'].'.appendChild('.$varObjectID.'); '
                    ).
                //---> remove ID
                ((\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'ID', $varArrayProperties) == TRUE) ? '' : 
                    $varObjectID.'.removeAttribute(\'id\'); ').
                ''
                ;

            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getSyntaxCreateDOM_TableBody                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-08-18                                                                                           |
        | ▪ Creation Date   : 2022-08-18                                                                                           |
        | ▪ Description     : Mendapatkan Syntax Pembuatan DOM Object : Table Body                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession (Mandatory) ► User Session                                                                |
        |      ▪ (array)  varArrayProperties (Mandatory) ► DOM Properties                                                          |
        |        Example :                                                                                                         |
        |           ► []                                                                                                           |
        |           ► [ 'ID' => 'MyID' ]                                                                                           |
        |           ► [ 'ID' => 'MyID',                                                                                            |
        |               'ParentID' => ... ,                                                                                        |
        |               'Style' => [                                                                                               |
        |                     ['...', ...]                                                                                         |
        |                  ]                                                                                                       |
        |             ]                                                                                                            |
        |      ▪ (string) varContent (Mandatory) ► Content                                                                         |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getSyntaxCreateDOM_TableBody($varUserSession, array $varArrayProperties, string $varContent)
            {
            $varReturn = '';
            $varObjectID = (
                (\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'ID', $varArrayProperties) == FALSE) ? 
                    'TempObject' : 
                    $varArrayProperties['ID']
                );

            $varReturn = 
                'var '.$varObjectID.' = document.createElement(\'tbody\');'.
                //---> set ID
                $varObjectID.'.id = \''.$varObjectID.'\'; '.
                //---> content
                $varContent.
                //---> style
                $varReturn.                
                //---> appendChild
                ((\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'ParentID', $varArrayProperties) == FALSE) ? '' : 
                    $varArrayProperties['ParentID'].'.appendChild('.$varObjectID.'); '
                    ).
                //---> remove ID
                ((\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'ID', $varArrayProperties) == TRUE) ? '' : 
                    $varObjectID.'.removeAttribute(\'id\'); ').
                ''
                ;

            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getSyntaxCreateDOM_TableData                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-08-16                                                                                           |
        | ▪ Creation Date   : 2022-08-16                                                                                           |
        | ▪ Description     : Mendapatkan Syntax Pembuatan DOM Object : Table TD                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession (Mandatory) ► User Session                                                                |
        |      ▪ (array)  varArrayProperties (Mandatory) ► DOM Properties                                                          |
        |        Example :                                                                                                         |
        |           ► []                                                                                                           |
        |           ► [ 'ID' => 'MyID' ]                                                                                           |
        |           ► [ 'ID' => 'MyID',                                                                                            |
        |               'ParentID' => ... ,                                                                                        |
        |               'ColSpan' => ... ,                                                                                         |
        |               'RowSpan' => ... ,                                                                                         |
        |               'Style' => [                                                                                               |
        |                     ['backgroundColor', ...],                                                                            |
        |                     ['color', ...],                                                                                      |
        |                     ['fontFamily', ...],                                                                                 |
        |                     ['whiteSpace', ...],                                                                                 |
        |                     ['fontSize', ...],                                                                                   |
        |                     ['textAlign', ...],                                                                                  |
        |                     ['...', ...]                                                                                         |
        |                  ]                                                                                                       |
        |             ]                                                                                                            |
        |      ▪ (string) varContent (Mandatory) ► Content                                                                         |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getSyntaxCreateDOM_TableData($varUserSession, array $varArrayProperties, string $varContent)
            {
            $varReturn = '';
            $varObjectID = (
                (\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'ID', $varArrayProperties) == FALSE) ? 
                    'TempObject' : 
                    $varArrayProperties['ID']
                );

            if((\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'Style', $varArrayProperties) == TRUE)) {
                for($i=0, $iMax=count($varArrayProperties['Style']); $i!=$iMax; $i++) {
                    $varReturn .= $varObjectID.'.style.'.$varArrayProperties['Style'][$i][0].' = \''.$varArrayProperties['Style'][$i][1].'\'; ';
                    }
                }
            $varReturn = 
                'var '.$varObjectID.' = document.createElement(\'td\'); '.
                //---> set ID
                $varObjectID.'.id = \''.$varObjectID.'\'; '.
                //---> content
                $varContent.
                //---> colspan
                ((\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'ColSpan', $varArrayProperties) == FALSE) ? '' : 
                    $varObjectID.'.colSpan = '.$varArrayProperties['ColSpan'].'; '
                    ).
                //---> rowspan
                ((\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'RowSpan', $varArrayProperties) == FALSE) ? '' : 
                    $varObjectID.'.rowSpan = '.$varArrayProperties['RowSpan'].'; '
                    ).
                //---> style
                $varReturn.
                //---> appendChild
                ((\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'ParentID', $varArrayProperties) == FALSE) ? '' : 
                    $varArrayProperties['ParentID'].'.appendChild('.$varObjectID.'); '
                    ).
                //---> remove ID
                ((\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'ID', $varArrayProperties) == TRUE) ? '' : 
                    $varObjectID.'.removeAttribute(\'id\'); ').
                '';
           
            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getSyntaxCreateDOM_TableHead                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-08-18                                                                                           |
        | ▪ Creation Date   : 2022-08-18                                                                                           |
        | ▪ Description     : Mendapatkan Syntax Pembuatan DOM Object : Table Head                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession (Mandatory) ► User Session                                                                |
        |      ▪ (array)  varArrayProperties (Mandatory) ► DOM Properties                                                          |
        |        Example :                                                                                                         |
        |           ► []                                                                                                           |
        |           ► [ 'ID' => 'MyID' ]                                                                                           |
        |           ► [ 'ID' => 'MyID',                                                                                            |
        |               'ParentID' => ... ,                                                                                        |
        |               'Style' => [                                                                                               |
        |                     ['...', ...]                                                                                         |
        |                  ]                                                                                                       |
        |             ]                                                                                                            |
        |      ▪ (string) varContent (Mandatory) ► Content                                                                         |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getSyntaxCreateDOM_TableHead($varUserSession, array $varArrayProperties, string $varContent)
            {
            $varReturn = '';
            $varObjectID = (
                (\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'ID', $varArrayProperties) == FALSE) ? 
                    'TempObject' : 
                    $varArrayProperties['ID']
                );

            $varReturn = 
                'var '.$varObjectID.' = document.createElement(\'thead\');'.
                //---> set ID
                $varObjectID.'.id = \''.$varObjectID.'\'; '.
                //---> content
                $varContent.
                //---> style
                $varReturn.                
                //---> appendChild
                ((\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'ParentID', $varArrayProperties) == FALSE) ? '' : 
                    $varArrayProperties['ParentID'].'.appendChild('.$varObjectID.'); '
                    ).
                //---> remove ID
                ((\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'ID', $varArrayProperties) == TRUE) ? '' : 
                    $varObjectID.'.removeAttribute(\'id\'); ').
                ''
                ;

            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getSyntaxCreateDOM_TableRow                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-08-18                                                                                           |
        | ▪ Creation Date   : 2022-08-18                                                                                           |
        | ▪ Description     : Mendapatkan Syntax Pembuatan DOM Object : Table TR                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession (Mandatory) ► User Session                                                                |
        |      ▪ (array)  varArrayProperties (Mandatory) ► DOM Properties                                                          |
        |        Example :                                                                                                         |
        |           ► []                                                                                                           |
        |           ► [ 'ID' => 'MyID' ]                                                                                           |
        |           ► [ 'ID' => 'MyID',                                                                                            |
        |               'ParentID' => ... ,                                                                                        |
        |               'Style' => [                                                                                               |
        |                     ['...', ...]                                                                                         |
        |                  ]                                                                                                       |
        |             ]                                                                                                            |
        |      ▪ (string) varContent (Mandatory) ► Content                                                                         |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getSyntaxCreateDOM_TableRow($varUserSession, array $varArrayProperties, string $varContent)
            {
            $varReturn = '';
            $varObjectID = (
                (\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'ID', $varArrayProperties) == FALSE) ? 
                    'TempObject' : 
                    $varArrayProperties['ID']
                );

            $varReturn = 
                'var '.$varObjectID.' = document.createElement(\'tr\');'.
                //---> set ID
                $varObjectID.'.id = \''.$varObjectID.'\'; '.
                //---> content
                $varContent.
                //---> style
                $varReturn.                
                //---> appendChild
                ((\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'ParentID', $varArrayProperties) == FALSE) ? '' : 
                    $varArrayProperties['ParentID'].'.appendChild('.$varObjectID.'); '
                    ).
                //---> remove ID
                ((\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'ID', $varArrayProperties) == TRUE) ? '' : 
                    $varObjectID.'.removeAttribute(\'id\'); ').
                ''
                ;

            return $varReturn;
            }

            
        public static function getSyntaxFunc_DOMInputFileContentRead(
            $varUserSession, string $varAPIWebToken,
            string $varUniqueID, string $varDOMReturnObjectID)
            {            
            $varDataAPI = 
                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                    $varUserSession,
                    $varAPIWebToken,
                    'authentication.general.isSessionExist', 
                    'latest', 
                    [
                    'parameter' => [
                        ]
                    ],
                    false
                );
            $varSignAPIWebTokenIsExist = ($varDataAPI['metadata']['HTTPStatusCode'] == 403 ? FALSE : ($varDataAPI['metadata']['HTTPStatusCode'] == 200 ? $varDataAPI['data']['signExist'] : FALSE));


            $varReturn =
                '(async function(varSignAPIWebTokenIsExist, varObj) {'.
                    'var varPromise = new Promise(function(resolve) {'.
                        'var varObjFileList = varObj.files; '.
                        'var varAccumulatedFiles = 0; '.
                        'var varPromisesArray = []; '.
                        'var varDataEntities = []; '.

                        'var varDOMReturn = document.createElement(\'input\'); '.
                        'varDOMReturn.setAttribute(\'id\', \'UniqueID\'); '.
                        'varDOMReturn.setAttribute(\'type\', \'text\'); '.
                        'varDOMReturn.addEventListener(\'change\', function() {'.
                            'document.getElementById(\''.$varDOMReturnObjectID.'\').value = varDOMReturn.value; '.
                            //''.$varReturnName.' = varDOMReturn.value; '.
                            //'alert(\'varReturn NEW : \' + '.$varReturnName.'); '.
                            '});'.
                        'varDOMReturn.value = null; '.

                        'async function JSFuncGetFileRead(varObjCurrentFile, varIndex, varIndexMax) {'.
                            'var varObjFileReader = new FileReader(); '.
                            'varObjFileReader.readAsDataURL(varObjCurrentFile); '.
                            'var varPromise_Level1 = new Promise(function(resolve) {'.
                                'varObjFileReader.onloadend = function(event) {'.
                                    'varDataEntities[varIndex] = \'{\' + '.
                                        'String.fromCharCode(34) + \'index\' + String.fromCharCode(34) + \' : \' + varIndex + \', \' + '.
                                        'String.fromCharCode(34) + \'entities\' + String.fromCharCode(34) + \' : {\' + '.
                                            'String.fromCharCode(34) + \'name\' + String.fromCharCode(34) + \' : \' + String.fromCharCode(34) + (varObjCurrentFile.name) + String.fromCharCode(34) + \', \' + '.
                                            'String.fromCharCode(34) + \'size\' + String.fromCharCode(34) + \' : \' + (varObjCurrentFile.size) + \', \' + '.
                                            'String.fromCharCode(34) + \'MIME\' + String.fromCharCode(34) + \' : \' + String.fromCharCode(34) + ((event.target.result.split(\',\')[0]).match(/[^:\s*]\w+\/[\w-+\d.]+(?=[;| ])/)[0]) + String.fromCharCode(34) + \', \' + '.
                                            'String.fromCharCode(34) + \'extension\' + String.fromCharCode(34) + \' : \' + String.fromCharCode(34) + (varObjCurrentFile.name.split(\'.\').pop().toLowerCase()) + String.fromCharCode(34) + \', \' + '.
                                            'String.fromCharCode(34) + \'lastModifiedDateTimeTZ\' + String.fromCharCode(34) + \' : \' + String.fromCharCode(34) + (varObjCurrentFile.lastModifiedDate) + String.fromCharCode(34) + \', \' + '.
                                            'String.fromCharCode(34) + \'lastModifiedUnixTimestamp\' + String.fromCharCode(34) + \' : \' + (varObjCurrentFile.lastModified) + \', \' + '.
                                            'String.fromCharCode(34) + \'contentBase64\' + String.fromCharCode(34) + \' : \' + String.fromCharCode(34) + (event.target.result.substr(event.target.result.indexOf(\',\') + 1)) + String.fromCharCode(34) + \'\' + '.
                                            '\'}\' + '.
                                        '\'}\'; '.
//                                    'alert(\'varDataEntities[varIndex] : \'+ varDataEntities[varIndex]); '.
//                                    'alert(\'EVENT :\' + event.target.result); '.
                                    'varNewValue = \'[\'; '.
                                    'for(var i = 0; i < varIndexMax; i++) '.
                                        '{'.
                                        'if (i != 0) {'.
                                            'varNewValue = varNewValue + \', \'; '.
                                            '}'.
                                        'varNewValue = varNewValue + varDataEntities[i]; '.
                                        '}; '.
                                    'varNewValue = varNewValue + \']\'; '.
                                    
                                    //'alert(\'varNewValue : \' + varNewValue); '.
                                    'varDOMReturn.value = JSON.stringify(JSON.parse(varNewValue)); '.
                                    'varDOMReturn.dispatchEvent(new Event(\'change\')); '.
                                    //'alert(\'varDOMReturn.value : \' + varDOMReturn.value); '.
                                    //'varDOMReturn.value = JSON.stringify(JSON.parse(varNewValue)); '.
                                    //'varDOMReturn.dispatchEvent(new Event(\'change\')); '.
                                    
                                    //'document.getElementById(\'dataInput_Log_FileContent\').value = JSON.stringify(JSON.parse(varNewValue)); '.
                                    //'document.getElementById(\'dataInput_Log_FileContent\').dispatchEvent(new Event(\'change\')); '.
                                    'resolve(varDataEntities[varIndex]); '.
                                    '}; '.
                                '})'.
                                    '.then(function (value) {'.
                                        '}); '.
                            'await varPromise_Level1; '.
                            'return varPromise_Level1; '.
                            '}; '.

                        'function JSFuncGetDataProcess() {'.
                            'for(var i = 0; i < varObjFileList.length; i++) '.
                                '{'.
                                'varAccumulatedFiles++; '.
                                'JSFuncGetFileRead(varObjFileList[i], i, varObjFileList.length); '.
                                '}'.
                            '}; '.
                    
                        'JSFuncGetDataProcess(); '.
                    
                        'resolve(); '.
                        '})'.
                            '.then(function(value) {}); '.

                    'await varPromise; '.
                    'return varPromise; '.
                    '}) ('.($varSignAPIWebTokenIsExist == TRUE ? 'true' : 'false').', this); '.

                //'alert(\'varReturn : \' + '.$varReturnName.'); '.
                '';























            $varReturnxxx =
                'varReturn = null; '.
                'var varObjFileList = varObj.files; '.
                'var varAccumulatedFiles = 0; '.
                'var varPromisesArray = [];'.


                'var varDOMReturn = document.createElement(\'input\'); '.
                'varDOMReturn.setAttribute(\'id\', \'UniqueID\'); '.
                'varDOMReturn.setAttribute(\'type\', \'text\'); '.
                'varDOMReturn.value = \'12345\'; '.
                //'alert(\'varDOMReturn Value : \' + varDOMReturn.value   ); '.
                
/*
                'async function XXXXJSFuncGetDataProcess() {'.
                    'var varPromise = new Promise(function(resolve) {'.
                        'for(var i = 0; i < varObjFileList.length; i++) '.
                            '{'.
                            'varAccumulatedFiles++; '.
                            //'JSFuncGetFileRead(varObjFileList[i], i); '.
                            //'var varFileProcessPromise = JSFuncGetFileRead(varObjFileList[i], i); '.
                            //'varPromisesArray.push(varFileProcessPromise);'.
                            '}'.
                        'resolve(\'NewREturn\'); '.
                        '}).then(function (value) {alert(\'ccccccc\');});'.
                    'await varPromise; '.
                    'varReturn = \'000000\'; '.
                    'return varPromise; '.
                    '}; '.
*/


/*
                'function JSFuncGetFileRead(varObjCurrentFile, varIndex) {'.
                    'var varObjFileReader = new FileReader();'.
//                    'varObjFileReader.readAsDataURL(varObjCurrentFile); '.
//                    'varObjFileReader.onloadend = function(event) {'.
//                        'alert(varObjFileReader); '.
//                        '}; '.
                    '}; '.
*/


                'function JSFuncGetDataProcess() {'.
                    'for(var i = 0; i < varObjFileList.length; i++) '.
                        '{'.
//                        'varAccumulatedFiles++; '.
//                        //'JSFuncGetFileRead(varObjFileList[i], i); '.
                        '}'.
                    'return \'ffffff\'; '.
                    '}; '.



                '(async function(varSignAPIWebTokenIsExist, varObj) {'.
                    'var varPromise = new Promise(function(resolve) {'.
                        'varReturn = \'88888\'; '.
                        'varReturn = JSFuncGetDataProcess(); '.
//                        'alert(\'x : \' + x);'.
                        'resolve(\'xxxx\'); '.
                        '})'.
                            '.then(function(value) {}); '.
                    'await varPromise; '.
                    'return varPromise; '.

/*
                    'var varReturn = null; '.
                    'var varObjFileList = varObj.files; '.
                    'var varAccumulatedFiles = 0; '.
                    'var varPromisesArray = []; '.

                    'async function JSFuncGetDataReturn() {'.
                        'var varPromise = new Promise(function(resolve) {'.
                            //'JSFuncGetDataProcess(); '.
                            'resolve(); '.
                            '}).then(function (value) {'.
                                'varReturn = 999; '.
                                'alert(varReturn); '.
                                //'return varReturn; '.
                                '}); '.
                        'await varPromise; '.
                        'return varPromise; '.
                        '}; '.
                   'JSFuncGetDataReturn(); '.

 */
 /*
                            'varPromisesArray.push(varFileProcessPromise); '.
                            'alert(varPromisesArray); '.                            
                            'resolve(); '.
                            '}); '.
                        'await Promise.all(varPromisesArray); '.
*/

//                    'return varReturn; '.
                    '}) ('.($varSignAPIWebTokenIsExist == TRUE ? 'true' : 'false').', this); '.
                'alert(\'varReturn : \' + varReturn); '.
//                'alert(\'varReturn : \' + varDOMReturn.value); '.

//                'alert(x.resolve(value)); '.
                '';


            
           $varReturnCoba =
                '(function (ObjReturn) {'.
                    'ObjReturn = {value: \'hello world\' }; '.
                    'alert(ObjReturn.value); '.

                    '(async function() {'.
                          'var varMainPromise = new Promise(function(resolve) {'.
                            'resolve(); '.
                            '}).then(function(value) {'.
                                'ObjReturn = {value: \'xxxxxxxxx\' }; '.
                                'alert(ObjReturn.value); '.
                                '});'.
                        'await varMainPromise; '.
                        'return varMainPromise; '.
                        '}) (); '.


                   '}) ();'.
                   '';
                   
           $varReturnccc =                   
                'varReturn = (function () {'.
                    'var ObjReturn = {value: \'hello world\' }; '.
                    
                    '(async function() {'.
                        'var varMainPromise = new Promise(function(resolve) {'.
                            'alert(\'11111111\'); '.
                            'resolve(); '.
                            '}).then(function(value) {'.
                                'ObjReturn = {value: \'xxxxxxxxx\' }; '.
                                'alert(\'2222222\'); '.
                                '});'.
                        'await varPromise; '.
                        'return varPromise; '.
                        '}) (); '.
                    'return ObjReturn; '.
                    '}) (); '.
                '(async function(varSignAPIWebTokenIsExist, varObj) {'.
                    'var varMainPromise = new Promise(function(resolve) {'.
                        'var varReturn = null; '.
                        'var varObjFileList = varObj.files; '.
                        'var varAccumulatedFiles = 0; '.
                        'var varPromisesArray = [];'.

                        'function SetVarReturn() {'.
                            'varReturn = 123456; '.
                            '}; '.


                        'async function JSFuncGetFileRead(varObjCurrentFile, varIndex) {'.
                            'alert(\'File Index : \' + varIndex); '.

                            'SetVarReturn(); '.
                            'var varPromise = new Promise(function(resolve, reject) {'.
                                'resolve(); '.
                                '}).then(function (value) {'.
                                'varReturn = 888; '.
                                'alert(varReturn); '.
                                '}); '.
                            'await varPromise; '.
                            'alert(\'~~~~~~~~~~~~~~\');'.
                            'return varPromise; '.
                            '}; '.



                        'async function JSFuncGetDataProcess() {'.
                            'var varPromise = new Promise(function(resolve) {'.
                                'for(var i = 0; i < varObjFileList.length; i++) '.
                                    '{'.
                                    'varAccumulatedFiles++; '.
                                    'JSFuncGetFileRead(varObjFileList[i], i); '.
                                    //'var varFileProcessPromise = JSFuncGetFileRead(varObjFileList[i], i); '.
                                    //'varPromisesArray.push(varFileProcessPromise);'.
                                    '}'.
                                '});'.
                            'await varPromise; '.
                            'return varPromise; '.
                            '}; '.


                        'async function JSFuncGetDataReturn() {'.
                            'var varPromise = new Promise(function(resolve) {'.
                                'JSFuncGetDataProcess(); '.
                                'resolve(); '.
                                '}).then(function (value) {'.
                                    'varReturn = 999; '.
                                    'alert(varReturn); '.
                                    'return varReturn; '.
                                    '}); '.
                            'await varPromise; '.
                            'return varPromise; '.
                            '}; '.

                        'JSFuncGetDataReturn(); '.
    //                    'return varReturn;'.
                        'resolve(); '.
                        '}).then(function (value) {'.
                            'alert (\'xyz\'); '.
                            '}); '.
                    'await varMainPromise; '.
                    'return varMainPromise; '.
                    '}) ('.($varSignAPIWebTokenIsExist == TRUE ? 'true' : 'false').', this)';

            
           $varReturnXXX= 
                '(function(varSignAPIWebTokenIsExist, varObj) {'.
                    'var varReturn = null; '.
                    'var varObjFileList = varObj.files; '.
                    'var varAccumulatedFiles = 0; '.
                    'var varPromisesArray = [];'.




                    'async function JSFuncGetFileRead(varObjCurrentFile, varIndex) {'.
                        'alert(\'File Index : \' + varIndex); '.

                        'var varPromise = new Promise(function(resolve, reject) {'.
                            'resolve(); '.
                            '}); '.
                        'await varPromise; '.
                        'alert(\'~~~~~~~~~~~~~~\');'.
                        'return varPromise; '.
                        '}; '.


                   
                    'async function JSFuncGetDataProcess() {'.
                        'var varPromise = new Promise(function(resolve) {'.
                            'for(var i = 0; i < varObjFileList.length; i++) '.
                                '{'.
                                'varAccumulatedFiles++; '.
                                'JSFuncGetFileRead(varObjFileList[i], i); '.
                                //'var varFileProcessPromise = JSFuncGetFileRead(varObjFileList[i], i); '.
                                //'varPromisesArray.push(varFileProcessPromise);'.
                                '}'.
/*
                            'var varFileProcessPromise = JSFuncGetFileRead(varObjFileList[0], 0); '.
                            'varPromisesArray.push(varFileProcessPromise); '.
                            'alert(varPromisesArray); '.                            
                            'resolve(); '.
                            '}); '.
                        'await Promise.all(varPromisesArray); '.
                        'await Promise.all(varPromisesArray)'.
                            '.then(data => {'.
                                'alert(\'before home\');'.
                                'return \'Success\'; '.
 */
                            '});'.
//                        'varReturn = 123456; '.
                        'await varPromise; '.
                        'return varPromise; '.
                        '}; '.


                    'async function JSFuncGetDataReturn() {'.
                        'var varPromise = new Promise(function(resolve) {'.
                            'JSFuncGetDataProcess(); '.
                            'resolve(); '.
                            '}); '.
                        'await varPromise; '.
                        'return varPromise; '.
                        '}; '.

                    'JSFuncGetDataReturn(); '.
                    'return varReturn;'.
                    '}) ('.($varSignAPIWebTokenIsExist == TRUE ? 'true' : 'false').', this)';

            

            
 

            
 

            
 

            
 
 
            
           $varReturnxxx= 
                '(function(varSignAPIWebTokenIsExist, varObj) {'.
                    'var varObjFileList = varObj.files; '.
                    'var varAccumulatedFiles = 0; '.
                    'var varPromisesArray = [];'.
                    
                    'var varSignTerminate = false; '.
                    'var varReturn = null; '.
                    'var varMainPromise; '.

                    '(async function() {'.
                        'var varPromise = new Promise(function(resolve, reject) {'.
                            'varLocalReturn = \'I love You !!\'; '.
                            'resolve(varLocalReturn); '.
                            '});'.
                        'varX = await varPromise; '.
                        'alert(varX);'.
                        'return varLocalReturn;'.
                        '}) (); '.
//                    'JSFuncCore();'.
                    
                    /*
                    'async function JSFuncCore() {'.
                        'var varPromise = new Promise(function(resolve, reject) {'.
                            'resolve(\'I love You !!\'); '.
                            '});'.
                        'varX = await varPromise; '.
                        'alert(varX);'.
                        '}'.
                    'JSFuncCore();'.
                     */

                    //'return varReturn; '.
                    '}) ('.($varSignAPIWebTokenIsExist == TRUE ? 'true' : 'false').', this)';

           
            $varReturnAuhAh = 
                '(function(varSignAPIWebTokenIsExist, varObj) {'.
                    'var varReturn = null; '.
                    'var varSignTerminate = false; '.
                    
                    'varIterationWaitCount = 0; '.
                    'varIterationWaitMax = 3; '.
                    
                    'function FuncBreak() {alert(\'break\'); }'.
                    
                    'async function JSFuncDataProcessing() {'.
                        'var varPromise = new Promise(function(resolve) {'.
                            'varIterationWaitCount++; '.
                            'if(varIterationWaitCount != varIterationWaitMax) {'.
                                'varSignTerminate = false; '.
                                'alert(varIterationWaitCount); '.
                                'setTimeout(JSFuncDataProcessing, 500); '.
                                '} '.
                            'else {'.
                                'varSignTerminate = true; '.
                                'varData = 12345; '.
                                'varReturn = varData; '.
                                'resolve(); '.
                                '}'.
                            '}); '.
                        'await varPromise; '.
                        'FuncBreak(); '.
                        'alert(varReturn); '.
                        '}'.

                    'function JSFuncGetReturnValue() {'.
                        'JSFuncDataProcessing(); '.
                        //'do {} while (varSignTerminate == false); '.
                        'return varReturn; '.
                        '}'.
                    
                    'return JSFuncGetReturnValue(); '.
                    '}) ('.($varSignAPIWebTokenIsExist == TRUE ? 'true' : 'false').', this)';

           
            
            $varReturnZZZ = 
                '(function(varSignAPIWebTokenIsExist, varObj) {'.
                    'var varReturn = null; '.
                    'var varSignTerminate = false; '.
                    'var varIteration = 0; '.
                    'var varWaitIterationCount = 0; '.
                    'var varWaitIterationMax = 3; '.

                    'function JSFuncCoreSetSignTerminate() {'.
                        'varSignTerminate = true; '.
                        'alert(\'varSignTerminate : \' + varSignTerminate); '.
                        '}; '.

                    'function JSFuncSleep(time) {'.
                        'const start = Date.now(); '.
                        'let now = start; '.
                        'while (now - start < time) {'.
                            'now = Date.now(); '.
                            '}'.
                        '}; '.
                    
                    'async function JSFuncAsyncCore() {'.
                        'alert(\'Async Core Func\'); '.
                        'var varPromise = new Promise(function(resolve) {'.
//                            'JSFuncGetFileReader(); '.
                            'JSFuncGetFileReader().then(function (result) {alert(\'xxxx\'); }); '.
                            'resolve(); '.
                            '}); '.
                        'await varPromise; '.
                        '}; '.
                    
                    'async function JSFuncGetFileReader() {'.
                        'var varPromise = new Promise(function(resolve) {'.
                            'alert(\'Async Func\'); '.
                            'var ObjInterval = setInterval(function () {'.
                                    'varIteration++; '.
                                    'alert(\'Iteration : \' +  varIteration); '.
                                    //'alert(\'ObjInterval : \' + ObjInterval); '.
                                    'if(varIteration == 3) {'.
                                        'clearInterval(ObjInterval); '.
                                        'JSFuncCoreSetSignTerminate(); '.
                                        'resolve(); '.
                                        '}'.
                                    '},'.
                                '300'.
                                ');'.
                            //'resolve(); '.
                            '}); '.
                        'await varPromise; '.
//                        'return varPromise.then(function (result) {'.
//                            'alert(result);'.
//                            '});'.
                        'return varPromise; '.
                        '}; '.

                    'return (function() {'.
                        'const varPromise_Level0 = JSFuncAsyncCore(); '.
                        //'await varPromise_Level0; '.
                        'alert(varPromise_Level0); '.
                        'return 123;'.
                        '}) (); '.
                    
/*
                    '(async function() {'.
                        'var varPromise = new Promise(function(resolve) {'.
                            'var ObjInterval = setInterval(function () {'.
                                    'varIteration++; '.
                                    'alert(\'Iteration : \' +  varIteration); '.
                                    'alert(\'ObjInterval : \' + ObjInterval); '.
                                    'if(varIteration == 3) {'.
                                        'clearInterval(ObjInterval); '.
                                        'JSFuncCoreSetSignTerminate(); '.
                                        'resolve(); '.
                                        '}'.
                                    '},'.
                                '300'.
                                ');'.
                            '}); '.
                        'await varPromise; '.
                        'alert(\'HHHHHH\'); '.
//                        'return \'12345\'; '.
                        '}) (); '.
*/
                    
                            
/*
                    'setTimeout('.
                        '(function() {'.
                            'try {'.
                                'alert(\'RETURN\'); '.
                                'return varReturn;'.
                                '}'.
                            'catch(varError) {'.
                                'alert(\'ERP Reborn Error Notification\n\nInvalid Object\n(\' + varError + \')\'); '.
                                '}'.
                            '}'.
                        '), 1);'.
                    //varSignTerminate = false;
                    do
                        {
                        varWaitIterationCount++;
                        alert(\'Looping Wait : \' + varWaitIterationCount);
                        if (varSignTerminate == false)
                            {
                            JSFuncSleep(1000);
                            if (varWaitIterationCount == varWaitIterationMax)
                                {
                                varSignTerminate = true;
                                }
                            }
                        if (varSignTerminate == true)
                            {
                            alert(\'selesai dah : \');
                            return \'TERBAIK\';
                            }


                        if(varSignTerminate == false)
                            {
                            varWaitIterationCount++;
                            alert(\'Looping Wait : \' + varWaitIterationCount);
                            if (varWaitIterationCount == varWaitIterationCountMax)
                                {
                                varSignTerminate = true;
                                }
                            }
                        else
                            {

                            }
                        }
                    while (varSignTerminate == false);
                    '.
*/
 
                    '}) ('.($varSignAPIWebTokenIsExist == TRUE ? 'true' : 'false').', this)';
            
            
            
            $varReturncccc = 
                '(function(varSignAPIWebTokenIsExist, varObj) {'.
                    'var varReturn = null; '.
                    'var varSignTerminate = false; '.

                    'var varObjFileList = varObj.files; '.
                    'var varDataArray = [];'.
                    'var varAccumulatedFiles = 0; '.

                    'alert(\'varSignTerminate 1 : \' + varSignTerminate); '.

                    'function JSFuncCoreSetSignTerminate(varSign) {'.
                        'varSignTerminate = varSign; '.
                        'alert(\'set : \' + varSign); '.
                        '}; '.
                    
                    'function JSFuncFileReader(varObjCurrentFile, varIndex) {'.
                        'var varObjFileReader = new FileReader();'.
                        'varObjFileReader.readAsDataURL(varObjCurrentFile); '.
                        'varObjFileReader.onloadend = function(event) {'.
                            'alert(varObjFileReader); '.
                            '}; '.
                        '}; '.
                    
                    'function JSFuncFileProcess() {'.
                        '(async function() {'.
                            'varPromise_Level0 = new Promise((resolve, reject) => {'.
                                'alert(\'ENTER : JSFuncFileProcess\'); '.
                                'varFilePromisesArray  = []; '. 
                                'async function JSFuncReadFile(varObjCurrentFile, varIndex) {'.
                                    'varPromise_Level1 = new Promise((resolve, reject) => {'.
                                        'var varObjFileReader = new FileReader();'.
                                        'varObjFileReader.onloadend = function(event) {'.
                                            'var varJSONDataBuilderNew = \'{\' + '.
                                                'String.fromCharCode(34) + \'sequence\' + String.fromCharCode(34) + \' : \' + (parseInt(varIndex)+1) + \', \' + '.
                                                'String.fromCharCode(34) + \'name\' + String.fromCharCode(34) + \' : \' + String.fromCharCode(34) + (varObjCurrentFile.name) + String.fromCharCode(34) + \', \' + '.
                                                'String.fromCharCode(34) + \'size\' + String.fromCharCode(34) + \' : \' + (varObjCurrentFile.size) + \', \' + '.
                                                'String.fromCharCode(34) + \'MIME\' + String.fromCharCode(34) + \' : \' + String.fromCharCode(34) + ((event.target.result.split(\',\')[0]).match(/[^:\s*]\w+\/[\w-+\d.]+(?=[;| ])/)[0]) + String.fromCharCode(34) + \', \' + '.
//                                                'String.fromCharCode(34) + \'extension\' + String.fromCharCode(34) + \' : \' + String.fromCharCode(34) + (varObjCurrentFile.name.split(\'.\').pop().toLowerCase()) + String.fromCharCode(34) + \', \' + '.
                                                'String.fromCharCode(34) + \'extension\' + String.fromCharCode(34) + \' : \' + String.fromCharCode(34) + (varObjCurrentFile.name.split(\'.\').pop().toLowerCase()) + String.fromCharCode(34) + \' \' + '.
                                                '\'}\'; '.
                                            'alert(varJSONDataBuilderNew); '.
                                            'resolve(varJSONDataBuilderNew); '.
                                            '}; '.
                                        'varObjFileReader.onerror = reject; '.
                                        'varObjFileReader.readAsDataURL(varObjCurrentFile); '.
                                        '}); '.
                                    'await varPromise_Level1; '.
                                    '}; '.


                                'for(var i = 0; i < varObjFileList.length; i++) '.
                                    '{'.
                                    'varAccumulatedFiles++; '.
//                                    'var varFilePromise = JSFuncReadFile(varObjFileList[i], i).then((varData) => {alert(varData); }); '.

                                    'JSFuncFileReader(varObjFileList[i], i); '.
                    
                                    //'var varFilePromise = JSFuncReadFile(varObjFileList[i], i); '.                    
                                    //'varFilePromisesArray.push(varFilePromise);'.
                                    //'varFilePromise.then(function (varData) {'.
                                    //    'alert(\'xxxx : \' + varData);'.
                                    //    'JSFuncCoreSetSignTerminate(false); '.
                                    //    '});'.
                                    '}'.


                                'alert(\'EXIT : JSFuncFileProcess\'); '.
                                'resolve(null); '.
                                '}); '.
                            'await varPromise_Level0; '.
                            '}) (); '.
                        '}; '.
                                           
                    '(async function() {'.
                        'var varPromise = new Promise(function(resolve, reject) {'.
                            //'varLocalReturn = \'I love You !!\'; '.
                            'JSFuncFileProcess(); '.
                            'JSFuncCoreSetSignTerminate(true); '.
                            //'resolve(varLocalReturn); '.
                            'resolve(null); '.
                            '});'.
                        'await varPromise; '.
                        '}) (); '.

                    'alert(\'varSignTerminate 2 : \' + varSignTerminate);'.                    
                    'alert(\'selesai dah : \');'.

                    'return varSignTerminate; '.
                    '}) ('.($varSignAPIWebTokenIsExist == TRUE ? 'true' : 'false').', this)';








            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
             $varReturnXXX = 
                '(function(varSignAPIWebTokenIsExist, varObj) {'.
                    'var varSignTerminate = false; '.
                    'varReturn = null; '.
                    '(async function() {'.
                        'async function JSFuncAsync() {'.
                            'alert(\'execute JSFuncAsync\');'.
                                'var varAccumulatedFiles = 0; '.
                                'var varObjFileList = varObj.files; '.
                                'var varDataArray = [];'.
                                'var varJSONDataBuilder = \'\'; '.

                                'if ((typeof varObjFileList != \'undefined\') && (varObjFileList.length > 0)) '.
                                    '{'.
                                    'function JSFuncReadFile(varObjCurrentFile, varIndex) {'.
                                    'return new Promise((resolve, reject) => {'.
                                        'var varObjFileReader = new FileReader(); '.
                                        'varObjFileReader.onloadend = function(event) {'.
                                            'var varJSONDataBuilderNew = \'{\' + '.
                                                'String.fromCharCode(34) + \'sequence\' + String.fromCharCode(34) + \' : \' + (parseInt(varIndex)+1) + \', \' + '.
                                                'String.fromCharCode(34) + \'name\' + String.fromCharCode(34) + \' : \' + String.fromCharCode(34) + (varObjCurrentFile.name) + String.fromCharCode(34) + \', \' + '.
                                                'String.fromCharCode(34) + \'size\' + String.fromCharCode(34) + \' : \' + (varObjCurrentFile.size) + \', \' + '.
                                                'String.fromCharCode(34) + \'MIME\' + String.fromCharCode(34) + \' : \' + String.fromCharCode(34) + ((event.target.result.split(\',\')[0]).match(/[^:\s*]\w+\/[\w-+\d.]+(?=[;| ])/)[0]) + String.fromCharCode(34) + \', \' + '.
                                                'String.fromCharCode(34) + \'extension\' + String.fromCharCode(34) + \' : \' + String.fromCharCode(34) + (varObjCurrentFile.name.split(\'.\').pop().toLowerCase()) + String.fromCharCode(34) + \', \' + '.
                                                'String.fromCharCode(34) + \'lastModifiedDateTimeTZ\' + String.fromCharCode(34) + \' : \' + String.fromCharCode(34) + (varObjCurrentFile.lastModifiedDate) + String.fromCharCode(34) + \', \' + '.
                                                'String.fromCharCode(34) + \'lastModifiedUnixTimestamp\' + String.fromCharCode(34) + \' : \' + (varObjCurrentFile.lastModified) + \', \' + '.
                                                'String.fromCharCode(34) + \'contentBase64\' + String.fromCharCode(34) + \' : \' + String.fromCharCode(34) + (event.target.result.substr(event.target.result.indexOf(\',\') + 1)) + String.fromCharCode(34) + \'\' + '.
                                                '\'}\'; '.
                                            'varDataArray[varIndex] = \'{\' + String.fromCharCode(34) + \'entities\' + String.fromCharCode(34) + \' : \' + varJSONDataBuilderNew + \'}\';'.
                                            'if(varAccumulatedFiles == varObjFileList.length) '.
                                                '{'.
                                                'for(var j = 0; j < varObjFileList.length; j++) '.
                                                    '{'.
                                                    'varSignProcess = false;'.
                                                    'do {'.
                                                        'if((varDataArray[j] === undefined) || (varDataArray[j] === null)) {'.
                                                            'varSignProcess = false; '.                                                                
                                                            '}'.
                                                        'else {'.
                                                            'varSignProcess = true; '.     
                                                            '}'.
                                                        'if(varSignProcess == false) {'.
                                                            'sleep(300); '.
                                                            '}'.
                                                        '}'.
                                                    'while (varSignProcess == false);'.
                                                    '}'.
                                                'for(var j = 0; j < varObjFileList.length; j++) '.
                                                    '{'.
                                                    'if(j != 0) {'.
                                                        'varJSONDataBuilder = varJSONDataBuilder + \', \'; '.
                                                        '}'.
                                                    'varJSONDataBuilder = varJSONDataBuilder + varDataArray[j]; '.
                                                    '}'.
                                                'varJSONDataBuilder = \'[\' + varJSONDataBuilder + \']\'; '.
                                                'varReturn = JSON.stringify(JSON.parse(varJSONDataBuilder));'.
                                                'alert(varReturn);'.
                                                'varSignTerminateNormally = true; '.
                                                '}'.
                                            '}; '.
                                        'varObjFileReader.readAsDataURL(varObjCurrentFile); '.
                                        'if(varAccumulatedFiles == varObjFileList.length) {'.
                                            'alert(varReturn); '.
                                            //'varReturn = \'zzzzzzzzzzzzzzzzzzz\';'.
                                            '}'.
                                        '})'.
                                        '}; '.
                                    'for(var i = 0; i < varObjFileList.length; i++) '.
                                        '{'.
                                        'varAccumulatedFiles++; '.
                                        'x = await JSFuncReadFile(varObjFileList[i], i, varObjFileList.length, varAccumulatedFiles); '.
//                                        'alert(x); '.
                                        /*
                                        '(function(varObjCurrentFile, i) {'.
                                            'var varObjFileReader = new FileReader(); '.
                                            'varObjFileReader.onloadend = function(event) {'.
                                                'var varJSONDataBuilderNew = \'{\' + '.
                                                    'String.fromCharCode(34) + \'sequence\' + String.fromCharCode(34) + \' : \' + (parseInt(i)+1) + \', \' + '.
                                                    'String.fromCharCode(34) + \'name\' + String.fromCharCode(34) + \' : \' + String.fromCharCode(34) + (varObjCurrentFile.name) + String.fromCharCode(34) + \', \' + '.
                                                    'String.fromCharCode(34) + \'size\' + String.fromCharCode(34) + \' : \' + (varObjCurrentFile.size) + \', \' + '.
                                                    'String.fromCharCode(34) + \'MIME\' + String.fromCharCode(34) + \' : \' + String.fromCharCode(34) + ((event.target.result.split(\',\')[0]).match(/[^:\s*]\w+\/[\w-+\d.]+(?=[;| ])/)[0]) + String.fromCharCode(34) + \', \' + '.
                                                    'String.fromCharCode(34) + \'extension\' + String.fromCharCode(34) + \' : \' + String.fromCharCode(34) + (varObjCurrentFile.name.split(\'.\').pop().toLowerCase()) + String.fromCharCode(34) + \', \' + '.
                                                    'String.fromCharCode(34) + \'lastModifiedDateTimeTZ\' + String.fromCharCode(34) + \' : \' + String.fromCharCode(34) + (varObjCurrentFile.lastModifiedDate) + String.fromCharCode(34) + \', \' + '.
                                                    'String.fromCharCode(34) + \'lastModifiedUnixTimestamp\' + String.fromCharCode(34) + \' : \' + (varObjCurrentFile.lastModified) + \', \' + '.
                                                    'String.fromCharCode(34) + \'contentBase64\' + String.fromCharCode(34) + \' : \' + String.fromCharCode(34) + (event.target.result.substr(event.target.result.indexOf(\',\') + 1)) + String.fromCharCode(34) + \'\' + '.
                                                    '\'}\'; '.
                                                'varDataArray[i] = \'{\' + String.fromCharCode(34) + \'entities\' + String.fromCharCode(34) + \' : \' + varJSONDataBuilderNew + \'}\';'.
                                                'if(varAccumulatedFiles == varObjFileList.length) '.
                                                    '{'.
                                                    'for(var j = 0; j < varObjFileList.length; j++) '.
                                                        '{'.
                                                        'varSignProcess = false;'.
                                                        'do {'.
                                                            'if((varDataArray[j] === undefined) || (varDataArray[j] === null)) {'.
                                                                'varSignProcess = false; '.                                                                
                                                                '}'.
                                                            'else {'.
                                                                'varSignProcess = true; '.     
                                                                '}'.
                                                            'if(varSignProcess == false) {'.
                                                                'sleep(300); '.
                                                                '}'.
                                                            '}'.
                                                        'while (varSignProcess == false);'.
                                                        '}'.
                                                    'for(var j = 0; j < varObjFileList.length; j++) '.
                                                        '{'.
                                                        'if(j != 0) {'.
                                                            'varJSONDataBuilder = varJSONDataBuilder + \', \'; '.
                                                            '}'.
                                                        'varJSONDataBuilder = varJSONDataBuilder + varDataArray[j]; '.
                                                        '}'.
                                                    'varJSONDataBuilder = \'[\' + varJSONDataBuilder + \']\'; '.
                                                    'varReturn = varJSONDataBuilder;'.
                                                    'varSignTerminateNormally = true; '.
                                                    'alert(varReturn); '.
                                                    'return varReturn;'.
                                                    //'return varJSONDataBuilder;'.
                                                    '}'.
                                                '}; '.
                                            'varObjFileReader.readAsDataURL(varObjCurrentFile); '.
                                            '}) (varObjFileList[i], i); '.
                                         */
                                        '}'.
                                    '}'.
//                                'varReturn = \'xxx\';'.

                            'return varReturn;'.
                            '}'.
                        'async function JSFuncWaitAsyncProcessEnd(){'.
                            'JSFuncAsync(); '.
                            'alert(\'execute pause\'+ varReturn);'.
                            '}'.
                        'await JSFuncWaitAsyncProcessEnd(); '.
                        '}) ();'.
                    'return varReturn; '.
                    '}) ('.($varSignAPIWebTokenIsExist == TRUE ? 'true' : 'false').', this)';
            
                       
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            $varReturn333= 
                '(function(varSignAPIWebTokenIsExist, varObj) {'.
                    'var varObjFileList = varObj.files; '.
                    'var varAccumulatedFiles = 0; '.
                    'var varPromisesArray = [];'.
                    
                    'var varSignTerminate = false; '.
                    'var varReturn = null; '.
                    'var varMainPromise; '.
                    
                    'varPromise = (async function() {'.
                        'varMainPromise =  new Promise((resolve, reject) => {'.
                            'x = (async function() {'.
                                'async function JSFuncReadFile(varObjCurrentFile, varIndex) {'.
                                    'return new Promise((resolve, reject) => {'.
                                        'var varObjFileReader = new FileReader();'.
              //                            'varObjFileReader.onload = function found() {'.
                                        'varObjFileReader.onloadend = function(event) {'.
                                            'var varJSONDataBuilderNew = \'{\' + '.
                                                'String.fromCharCode(34) + \'sequence\' + String.fromCharCode(34) + \' : \' + (parseInt(varIndex)+1) + \', \' + '.
                                                'String.fromCharCode(34) + \'name\' + String.fromCharCode(34) + \' : \' + String.fromCharCode(34) + (varObjCurrentFile.name) + String.fromCharCode(34) + \', \' + '.
                                                'String.fromCharCode(34) + \'size\' + String.fromCharCode(34) + \' : \' + (varObjCurrentFile.size) + \', \' + '.
                                                'String.fromCharCode(34) + \'MIME\' + String.fromCharCode(34) + \' : \' + String.fromCharCode(34) + ((event.target.result.split(\',\')[0]).match(/[^:\s*]\w+\/[\w-+\d.]+(?=[;| ])/)[0]) + String.fromCharCode(34) + \', \' + '.
                                                'String.fromCharCode(34) + \'extension\' + String.fromCharCode(34) + \' : \' + String.fromCharCode(34) + (varObjCurrentFile.name.split(\'.\').pop().toLowerCase()) + String.fromCharCode(34) + \', \' + '.
               //                                   'String.fromCharCode(34) + \'lastModifiedDateTimeTZ\' + String.fromCharCode(34) + \' : \' + String.fromCharCode(34) + (varObjCurrentFile.lastModifiedDate) + String.fromCharCode(34) + \', \' + '.
               //                                   'String.fromCharCode(34) + \'lastModifiedUnixTimestamp\' + String.fromCharCode(34) + \' : \' + (varObjCurrentFile.lastModified) + \', \' + '.
               //                                   'String.fromCharCode(34) + \'contentBase64\' + String.fromCharCode(34) + \' : \' + String.fromCharCode(34) + (event.target.result.substr(event.target.result.indexOf(\',\') + 1)) + String.fromCharCode(34) + \'\' + '.
                                                '\'}\'; '.
                                            'resolve(varObjFileReader.result); '.
                                            '}; '.
                                        //'varObjFileReader.readAsText(varObjCurrentFile);'.
                                        'varNothing = varObjFileReader.readAsDataURL(varObjCurrentFile);'.
                                        '}); '.
                                    '}; '.

                                'for(var i = 0; i < varObjFileList.length; i++) '.
                                    '{'.
                                    'varAccumulatedFiles++; '.
                                    'var varFilePromise = JSFuncReadFile(varObjFileList[i], i);'.
                                    'varPromisesArray.push(varFilePromise);'.
                                    'varFilePromise.then(function (result) {'.
                                        'alert(result);'.
                                        '});'.
                                    '}'.

                                'await Promise.all(varPromisesArray)'.
                                    '.then(data => {'.
                                        'alert(\'before home\');'.
                                        'return \'Success\'; '.
                                    '});'.

                                'alert(\'home\'); '.
                                'resolve(\'MyReturnResolve\'); '.
                                '}) ();'.
//                            'alert(\'x : \' + x); '.
                            '});'.
                        'await varMainPromise;'.
                        'alert(\'varMainPromise : \' + varMainPromise); '.

                        'resolve(\'MyReturnResolve\'); '.
                    
                        //'return varMainPromise; '.
                        '})(); '.

                    //'await(varPromise);'.
                    'alert(\'Promise : \' + varPromise); '.
                    //'return varReturn; '.
                    '}) ('.($varSignAPIWebTokenIsExist == TRUE ? 'true' : 'false').', this)';






        
            $varReturnKacai = 
                '(function(varSignAPIWebTokenIsExist, varObj) {'.
                    'var varObjFileList = varObj.files; '.
                    'var varAccumulatedFiles = 0; '.
                    'var varPromisesArray = [];'.
                    
                    'var varSignTerminate = false; '.
                    'varReturn = null; '.
                    
                    'x = (async function() {'.
                        'return new Promise((resolve, reject) => {'.
                            'async function JSFuncAsync() {'.
                                'alert(\'Async Core\');'.
                                'varReturn = \'abcd\'; '.




                               'for(var i = 0; i < varObjFileList.length; i++) '.
                                    '{'.
                                    'varAccumulatedFiles++; '.
                                    'var varFilePromise = JSFuncReadFile(varObjFileList[i], i);'.
                                    'varPromisesArray.push(varFilePromise);'.
                                    'varFilePromise.then(function (result) {'.
                                        'alert(result);'.
                                        '});'.
                                    '}'.

                                ' async function JSFuncReadFile(varObjCurrentFile, varIndex) {'.
                                    'return new Promise((resolve, reject) => {'.
                                        'var varObjFileReader = new FileReader();'.
            //                            'varObjFileReader.onload = function found() {'.
                                        'varObjFileReader.onloadend = function(event) {'.
                                            'var varJSONDataBuilderNew = \'{\' + '.
                                                'String.fromCharCode(34) + \'sequence\' + String.fromCharCode(34) + \' : \' + (parseInt(varIndex)+1) + \', \' + '.
                                                'String.fromCharCode(34) + \'name\' + String.fromCharCode(34) + \' : \' + String.fromCharCode(34) + (varObjCurrentFile.name) + String.fromCharCode(34) + \', \' + '.
                                                'String.fromCharCode(34) + \'size\' + String.fromCharCode(34) + \' : \' + (varObjCurrentFile.size) + \', \' + '.
                                                'String.fromCharCode(34) + \'MIME\' + String.fromCharCode(34) + \' : \' + String.fromCharCode(34) + ((event.target.result.split(\',\')[0]).match(/[^:\s*]\w+\/[\w-+\d.]+(?=[;| ])/)[0]) + String.fromCharCode(34) + \', \' + '.
                                                'String.fromCharCode(34) + \'extension\' + String.fromCharCode(34) + \' : \' + String.fromCharCode(34) + (varObjCurrentFile.name.split(\'.\').pop().toLowerCase()) + String.fromCharCode(34) + \', \' + '.
             //                                   'String.fromCharCode(34) + \'lastModifiedDateTimeTZ\' + String.fromCharCode(34) + \' : \' + String.fromCharCode(34) + (varObjCurrentFile.lastModifiedDate) + String.fromCharCode(34) + \', \' + '.
             //                                   'String.fromCharCode(34) + \'lastModifiedUnixTimestamp\' + String.fromCharCode(34) + \' : \' + (varObjCurrentFile.lastModified) + \', \' + '.
             //                                   'String.fromCharCode(34) + \'contentBase64\' + String.fromCharCode(34) + \' : \' + String.fromCharCode(34) + (event.target.result.substr(event.target.result.indexOf(\',\') + 1)) + String.fromCharCode(34) + \'\' + '.
                                                '\'}\'; '.
                                            'resolve(varObjFileReader.result);'.
                                            '};'.
                                        //'varObjFileReader.readAsText(varObjCurrentFile);'.
                                        'varNothing = varObjFileReader.readAsDataURL(varObjCurrentFile);'.
                                        '});'.
                                    '}'.

                                'await Promise.all(varPromisesArray).then(fileContents => {'.                        
                                    'alert(\'OK deh\');'.
                                        'varReturn = \'abcd12345\'; '.
                                    'return 1234567;'.
                                    '});'.




                                '}; '.
                            //'async function JSFuncWaitAsyncProcessEnd(){'.
                            'async function JSFuncWaitAsyncProcessEnd(){'.
                                'await JSFuncAsync(); '.
                                'alert(\'Wait Pause : \'+ varReturn);'.
                                'resolve(\'MyReturnResolve\'); '.
                                '}; '.
                            //'await JSFuncWaitAsyncProcessEnd(); '.
                            //'JSFuncWaitAsyncProcessEnd().then({alert \'####\';}); '.
                            'JSFuncWaitAsyncProcessEnd(); '.

                            'alert(\'123\');'.
                            'resolve(\'MyReturnResolve\'); '.
                            '});'.
                        '}) (); '.

                    'alert(x); '.
                    
                    'return varReturn; '.
                    '}) ('.($varSignAPIWebTokenIsExist == TRUE ? 'true' : 'false').', this)';
            
            $varReturn456 = 
                '(function(varSignAPIWebTokenIsExist, varObj) {'.
                    'var varObjFileList = varObj.files; '.
                    'var varAccumulatedFiles = 0; '.
                    'var varPromisesArray = [];'.
                    
                    'var varSignTerminate = false; '.
                    'varReturn = null; '.
                    
                    '(async function() {'.
                        //'return new Promise((resolve, reject) => {'.
                        //    '});'.



                            'async function JSFuncAsync() {'.
                                'alert(\'aSYNC\');'.
                                'varReturn = \'abcd\'; '.

                                'for(var i = 0; i < varObjFileList.length; i++) '.
                                    '{'.
                                    'varAccumulatedFiles++; '.
                                    'var varFilePromise = JSFuncReadFile(varObjFileList[i], i);'.
                                    'varPromisesArray.push(varFilePromise);'.
                                    'varFilePromise.then(function (result) {'.
                                        'alert(result);'.
                                        '});'.
                                    '}'.

                                ' async function JSFuncReadFile(varObjCurrentFile, varIndex) {'.
                                    'return new Promise((resolve, reject) => {'.
                                        'var varObjFileReader = new FileReader();'.
            //                            'varObjFileReader.onload = function found() {'.
                                        'varObjFileReader.onloadend = function(event) {'.
                                            'var varJSONDataBuilderNew = \'{\' + '.
                                                'String.fromCharCode(34) + \'sequence\' + String.fromCharCode(34) + \' : \' + (parseInt(varIndex)+1) + \', \' + '.
                                                'String.fromCharCode(34) + \'name\' + String.fromCharCode(34) + \' : \' + String.fromCharCode(34) + (varObjCurrentFile.name) + String.fromCharCode(34) + \', \' + '.
                                                'String.fromCharCode(34) + \'size\' + String.fromCharCode(34) + \' : \' + (varObjCurrentFile.size) + \', \' + '.
                                                'String.fromCharCode(34) + \'MIME\' + String.fromCharCode(34) + \' : \' + String.fromCharCode(34) + ((event.target.result.split(\',\')[0]).match(/[^:\s*]\w+\/[\w-+\d.]+(?=[;| ])/)[0]) + String.fromCharCode(34) + \', \' + '.
                                                'String.fromCharCode(34) + \'extension\' + String.fromCharCode(34) + \' : \' + String.fromCharCode(34) + (varObjCurrentFile.name.split(\'.\').pop().toLowerCase()) + String.fromCharCode(34) + \', \' + '.
             //                                   'String.fromCharCode(34) + \'lastModifiedDateTimeTZ\' + String.fromCharCode(34) + \' : \' + String.fromCharCode(34) + (varObjCurrentFile.lastModifiedDate) + String.fromCharCode(34) + \', \' + '.
             //                                   'String.fromCharCode(34) + \'lastModifiedUnixTimestamp\' + String.fromCharCode(34) + \' : \' + (varObjCurrentFile.lastModified) + \', \' + '.
             //                                   'String.fromCharCode(34) + \'contentBase64\' + String.fromCharCode(34) + \' : \' + String.fromCharCode(34) + (event.target.result.substr(event.target.result.indexOf(\',\') + 1)) + String.fromCharCode(34) + \'\' + '.
                                                '\'}\'; '.
                                            'resolve(varObjFileReader.result);'.
                                            '};'.
                                        //'varObjFileReader.readAsText(varObjCurrentFile);'.
                                        'varNothing = varObjFileReader.readAsDataURL(varObjCurrentFile);'.
                                        '});'.
                                    '}'.

                                'await Promise.all(varPromisesArray).then(fileContents => {'.                        
                                    'alert(\'OK deh\');'.
                                        'varReturn = \'abcd12345\'; '.
                                    'return 1234567;'.
                                    '});'.



                                '}'.
                            'async function JSFuncWaitAsyncProcessEnd(){'.
                                'await JSFuncAsync(); '.
                                'alert(\'Wait Pause : \'+ varReturn);'.
                                '}'.
                            'await JSFuncWaitAsyncProcessEnd(); '.

                    
                    
                    
                    
                        '}) ();'.
                    'alert(\'x : \' + varReturn); '.
                    'return varReturn; '.
                    '}) ('.($varSignAPIWebTokenIsExist == TRUE ? 'true' : 'false').', this)';
            
            $varReturnCCC = 
                '(function(varSignAPIWebTokenIsExist, varObj) {'.
                    'var varObjFileList = varObj.files; '.
                    'var varAccumulatedFiles = 0; '.
                    'var varPromisesArray = [];'.

                    'for(var i = 0; i < varObjFileList.length; i++) '.
                        '{'.
                        'varAccumulatedFiles++; '.
                        'var varFilePromise = JSFuncReadFile(varObjFileList[i], i);'.
                        'varPromisesArray.push(varFilePromise);'.
                        'varFilePromise.then(function (result) {'.
                            'alert(result);'.
                            '});'.
                        '}'.
                    
                    'function JSFuncReadFile(varObjCurrentFile, varIndex) {'.
                        'return new Promise((resolve, reject) => {'.
                            'var varObjFileReader = new FileReader();'.
//                            'varObjFileReader.onload = function found() {'.
                            'varObjFileReader.onloadend = function(event) {'.
                                'var varJSONDataBuilderNew = \'{\' + '.
                                    'String.fromCharCode(34) + \'sequence\' + String.fromCharCode(34) + \' : \' + (parseInt(varIndex)+1) + \', \' + '.
                                    'String.fromCharCode(34) + \'name\' + String.fromCharCode(34) + \' : \' + String.fromCharCode(34) + (varObjCurrentFile.name) + String.fromCharCode(34) + \', \' + '.
                                    'String.fromCharCode(34) + \'size\' + String.fromCharCode(34) + \' : \' + (varObjCurrentFile.size) + \', \' + '.
                                    'String.fromCharCode(34) + \'MIME\' + String.fromCharCode(34) + \' : \' + String.fromCharCode(34) + ((event.target.result.split(\',\')[0]).match(/[^:\s*]\w+\/[\w-+\d.]+(?=[;| ])/)[0]) + String.fromCharCode(34) + \', \' + '.
                                    'String.fromCharCode(34) + \'extension\' + String.fromCharCode(34) + \' : \' + String.fromCharCode(34) + (varObjCurrentFile.name.split(\'.\').pop().toLowerCase()) + String.fromCharCode(34) + \', \' + '.
 //                                   'String.fromCharCode(34) + \'lastModifiedDateTimeTZ\' + String.fromCharCode(34) + \' : \' + String.fromCharCode(34) + (varObjCurrentFile.lastModifiedDate) + String.fromCharCode(34) + \', \' + '.
 //                                   'String.fromCharCode(34) + \'lastModifiedUnixTimestamp\' + String.fromCharCode(34) + \' : \' + (varObjCurrentFile.lastModified) + \', \' + '.
 //                                   'String.fromCharCode(34) + \'contentBase64\' + String.fromCharCode(34) + \' : \' + String.fromCharCode(34) + (event.target.result.substr(event.target.result.indexOf(\',\') + 1)) + String.fromCharCode(34) + \'\' + '.
                                    '\'}\'; '.
                                'resolve(varObjFileReader.result);'.
                                '};'.
                            //'varObjFileReader.readAsText(varObjCurrentFile);'.
                            'varNothing = varObjFileReader.readAsDataURL(varObjCurrentFile);'.
                            '});'.
                        '}'.
                    
//                    'return Promise.all(varPromisesArray).then(fileContents => {'.                        
//                        'alert(\'OK deh\');'.
//                        'return 1234567;'.
//                        '});'.


                    'Promise.all(varPromisesArray).then(data => {'.
                        'alert(\'OK deh\');'.
                        '});'.
                    'alert(\'OK bro\'); '.

                    
                    
                    
//                    'varReturn = 234;'.
//                    'return varReturn; '.
                    
                    '}) ('.($varSignAPIWebTokenIsExist == TRUE ? 'true' : 'false').', this)';           
            


            
            $varReturn2 = 
                '(function(varSignAPIWebTokenIsExist, varObj, varReturnDOMObject) {'.
                    'var varSignTerminate = false; '.
                    'var varSignTerminateNormally = false; '.
                    'var varReturn = null; '.
                    'if(varSignAPIWebTokenIsExist == false) {'.
                        'alert(\'ERP Reborn Error Notification\n\nAPI Web Token Is Not Exist\'); '.
                        '}'.
                    'else {'.
                        'function funcReturnValue(varValue) {'.
                            'alert(varValue);'.
                            '};'.
                        '(function() {'.
                            'if ((typeof varObj != \'undefined\') && (typeof varReturnDOMObject != \'undefined\')) {'.
                                'var varAccumulatedFiles = 0; '.
                                'var varObjFileList = varObj.files; '.
                                'var varDataArray = [];'.
                                'var varJSONDataBuilder = \'\'; '.
                                'if ((typeof varObjFileList != \'undefined\') && (varObjFileList.length > 0)) '.
                                    '{'.
                                    'for(var i = 0; i < varObjFileList.length; i++) '.
                                        '{'.
                                        'varAccumulatedFiles++; '.
                                        'varX = (function(varObjCurrentFile, i) {'.
                                            'var varObjFileReader = new FileReader(); '.
                                            'var varZ = \'zzz\';'.
                                            'varObjFileReader.onloadend = function(event) {'.
                                                'var varJSONDataBuilderNew = \'{\' + '.
                                                    'String.fromCharCode(34) + \'sequence\' + String.fromCharCode(34) + \' : \' + (parseInt(i)+1) + \', \' + '.
                                                    'String.fromCharCode(34) + \'name\' + String.fromCharCode(34) + \' : \' + String.fromCharCode(34) + (varObjCurrentFile.name) + String.fromCharCode(34) + \', \' + '.
                                                    'String.fromCharCode(34) + \'size\' + String.fromCharCode(34) + \' : \' + (varObjCurrentFile.size) + \', \' + '.
                                                    'String.fromCharCode(34) + \'MIME\' + String.fromCharCode(34) + \' : \' + String.fromCharCode(34) + ((event.target.result.split(\',\')[0]).match(/[^:\s*]\w+\/[\w-+\d.]+(?=[;| ])/)[0]) + String.fromCharCode(34) + \', \' + '.
                                                    'String.fromCharCode(34) + \'extension\' + String.fromCharCode(34) + \' : \' + String.fromCharCode(34) + (varObjCurrentFile.name.split(\'.\').pop().toLowerCase()) + String.fromCharCode(34) + \', \' + '.
                                                    'String.fromCharCode(34) + \'lastModifiedDateTimeTZ\' + String.fromCharCode(34) + \' : \' + String.fromCharCode(34) + (varObjCurrentFile.lastModifiedDate) + String.fromCharCode(34) + \', \' + '.
                                                    'String.fromCharCode(34) + \'lastModifiedUnixTimestamp\' + String.fromCharCode(34) + \' : \' + (varObjCurrentFile.lastModified) + \', \' + '.
                                                    'String.fromCharCode(34) + \'contentBase64\' + String.fromCharCode(34) + \' : \' + String.fromCharCode(34) + (event.target.result.substr(event.target.result.indexOf(\',\') + 1)) + String.fromCharCode(34) + \'\' + '.
                                                    '\'}\'; '.
                                                'varDataArray[i] = \'{\' + String.fromCharCode(34) + \'entities\' + String.fromCharCode(34) + \' : \' + varJSONDataBuilderNew + \'}\';'.
                                                'if(varAccumulatedFiles == varObjFileList.length) '.
                                                    '{'.
                                                    'for(var j = 0; j < varObjFileList.length; j++) '.
                                                        '{'.
                                                        'varSignProcess = false;'.
                                                        'do {'.
                                                            'if((varDataArray[j] === undefined) || (varDataArray[j] === null)) {'.
                                                                'varSignProcess = false; '.                                                                
                                                                '}'.
                                                            'else {'.
                                                                'varSignProcess = true; '.     
                                                                '}'.
                                                            'if(varSignProcess == false) {'.
                                                                'sleep(300); '.
                                                                '}'.
                                                            '}'.
                                                        'while (varSignProcess == false);'.
                                                        '}'.
                                                    'for(var j = 0; j < varObjFileList.length; j++) '.
                                                        '{'.
                                                        'if(j != 0) {'.
                                                            'varJSONDataBuilder = varJSONDataBuilder + \', \'; '.
                                                            '}'.
                                                        'varJSONDataBuilder = varJSONDataBuilder + varDataArray[j]; '.
                                                        '}'.
                                                    'varJSONDataBuilder = \'[\' + varJSONDataBuilder + \']\'; '.
                                                    'varReturn = varJSONDataBuilder;'.
                                                    'varSignTerminateNormally = true; '.
                                    'funcReturnValue(varReturn); '.
                                                    //'alert(varReturn);
                                                    'return varReturn;'.
                                                    //'return varJSONDataBuilder;'.
                                                    '}'.
                                                '}; '.
                                            'varObjFileReader.readAsDataURL(varObjCurrentFile); '.
                                            'return 1234; '.
                                            '}) (varObjFileList[i], i); '.
                                        'alert(varX); '.
                                        '}'.


                                    'setTimeout('.
                                        '(function() {'.
                                            'try {'.
                                                'if(varReturn!=\'\') {'.
                                                    'if(varReturn == \'[object Object]\') {'.
                                                        'alert(\'An internal error has occurred. Please to select file(s) again\'); '.
                                                        '}'.
                                                    'else {'.
                                                        '}'.
                                                    'return varReturn;'.
                                                    '}'.
                                                'else {'.
                                                    '}'.
                                                '}'.
                                            'catch(varError) {'.
                                                'alert(\'ERP Reborn Error Notification\n\nInvalid Object\n(\' + varError + \')\'); '.
                                                '}'.
                                            '}'.
                                        '), 1);'.
                    
                    
                    
                    
                                    '}'.
//                                'varReturn = varLocalReturn; '.
                                '}'.
                            'else {'.
                                'alert(\'ERP Reborn Error Notification\n\nInvalid DOM Objects\'); '.
                                '}'.
                        '}) ()'.
                        '}'.
                    'return varReturn;'.
                    '}) ('.($varSignAPIWebTokenIsExist == TRUE ? 'true' : 'false').', this, document.getElementById(\''.$varDOMReturnObjectID.'\'))';

            return $varReturn;

            
/*
            $varReturn =
                'try {'.
                    'alert(\'abcdefg\'); '.
                    '}'.
                'catch(varError) {'.
                    '}'.
                '';
            return $varReturn;

 */
            }

        public static function getSyntaxFunc_DOMInputFileContentReadOLD(
            $varUserSession, string $varAPIWebToken,
            string $varUniqueID, string $varDOMReturnObjectID)
            {
            $varSignAPIWebTokenIsExist = 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBooleanConvertion(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                        $varUserSession,
                        $varAPIWebToken,
                        'authentication.general.isSessionExist', 
                        'latest', 
                        [
                        'parameter' => [
                            ]
                        ]
                        )['data']['signExist']
                    );
            
            //var_dump($varSignAPIWebTokenIsExist);
                       
            $varReturn =
                'try {'.
//                    'alert(\''.$varUserSession.'\'); '.
                    'varSignExistAPIWebToken = '.($varSignAPIWebTokenIsExist = TRUE ? 'true' : 'false').'; '.
//                    'alert(varSignExistAPIWebToken); '.
                    //'alert(\''.$varAPIWebToken.'\'); '.
                    'if(varSignExistAPIWebToken == false) {'.
                        'alert(\'ERP Reborn Error Notification\n\nAPI Web Token Is Not Exist\'); '.
                        '}'.
                    'else {'.
                        //'alert(\'API Web Token Is Exist\'); '.
                        'var varJSONDataBuilder = \'\'; '.
                        //---> Main Function ( Start )
                        '(function(varObj, varReturnDOMObject) {'.
                            //'alert(\'Masuk\'); '.
                            'if ((typeof varObj != \'undefined\') && (typeof varReturnDOMObject != \'undefined\')) {'.
                                'var varAccumulatedFiles = 0; '.
                                'var varObjFileList = varObj.files; '.
                                'var varReturn = [];'.
                                'if(varObjFileList.length > 0)'.
                                    '{'.
                                    'for(var i = 0; i < varObjFileList.length; i++) '.
                                        '{'.
                                        'varAccumulatedFiles++; '.
                                        '(function(varObjCurrentFile, i) {'.
                                            'var varObjFileReader = new FileReader(); '.
                                            'varObjFileReader.onloadend = function(event) {'.
                                                'var varJSONDataBuilderNew = \'{\' + '.
                                                    'String.fromCharCode(34) + \'sequence\' + String.fromCharCode(34) + \' : \' + (parseInt(i)+1) + \', \' + '.
                                                    'String.fromCharCode(34) + \'name\' + String.fromCharCode(34) + \' : \' + String.fromCharCode(34) + (varObjCurrentFile.name) + String.fromCharCode(34) + \', \' + '.
                                                    'String.fromCharCode(34) + \'size\' + String.fromCharCode(34) + \' : \' + (varObjCurrentFile.size) + \', \' + '.
                                                    'String.fromCharCode(34) + \'MIME\' + String.fromCharCode(34) + \' : \' + String.fromCharCode(34) + ((event.target.result.split(\',\')[0]).match(/[^:\s*]\w+\/[\w-+\d.]+(?=[;| ])/)[0]) + String.fromCharCode(34) + \', \' + '.
                                                    'String.fromCharCode(34) + \'extension\' + String.fromCharCode(34) + \' : \' + String.fromCharCode(34) + (varObjCurrentFile.name.split(\'.\').pop().toLowerCase()) + String.fromCharCode(34) + \', \' + '.
                                                    'String.fromCharCode(34) + \'lastModifiedDateTimeTZ\' + String.fromCharCode(34) + \' : \' + String.fromCharCode(34) + (varObjCurrentFile.lastModifiedDate) + String.fromCharCode(34) + \', \' + '.
                                                    'String.fromCharCode(34) + \'lastModifiedUnixTimestamp\' + String.fromCharCode(34) + \' : \' + (varObjCurrentFile.lastModified) + \', \' + '.
                                                    'String.fromCharCode(34) + \'contentBase64\' + String.fromCharCode(34) + \' : \' + String.fromCharCode(34) + (event.target.result.substr(event.target.result.indexOf(\',\') + 1)) + String.fromCharCode(34) + \'\' + '.
                                                    '\'}\'; '.
                                                //'varReturn[i] = varJSONDataBuilderNew; '.
                                                'varReturn[i] = \'{\' + String.fromCharCode(34) + \'entities\' + String.fromCharCode(34) + \' : \' + varJSONDataBuilderNew + \'}\';'.
                                                'if(varAccumulatedFiles == varObjFileList.length) '.
                                                    '{'.
                                                    'for(var j = 0; j < varObjFileList.length; j++) '.
                                                        '{'.
                                                        'varSignProcess = false;'.
                                                        'do {'.
                                                            'if((varReturn[j] === undefined) || (varReturn[j] === null)) {'.
                                                                'varSignProcess = false; '.                                                                
                                                                '}'.
                                                            'else {'.
                                                                'varSignProcess = true; '.     
                                                                '}'.
                                                            'if(varSignProcess == false) {'.
                                                                'sleep(300); '.
                                                                '}'.
                                                            '}'.
                                                        'while (varSignProcess == false);'.
                                                        '}'.
                                                    'for(var j = 0; j < varObjFileList.length; j++) '.
                                                        '{'.
                                                        'if(j != 0) {'.
                                                            'varJSONDataBuilder = varJSONDataBuilder + \', \'; '.
                                                            '}'.
                                                        'varJSONDataBuilder = varJSONDataBuilder + varReturn[j]; '.
                                                        '}'.
                                                    'varJSONDataBuilder = \'[\' + varJSONDataBuilder + \']\'; '.
                                                    '}'.
                                                    //'alert(varJSONDataBuilder); '.
                                                    'document.getElementById(\''.$varDOMReturnObjectID.'\').value = varJSONDataBuilder; '.

                                                    'varRecordID = (function(varLocalJSONDataBuilder) {'.
                                                        'try {'.
                                                            'varReturn = ('.
                                                                'JSON.parse('.
                                                                    str_replace(
                                                                        '"', 
                                                                        '\'', 
                                                                        \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                                                                            $varUserSession, 
                                                                            $varAPIWebToken, 
                                                                            'transaction.create.dataAcquisition.setLog_FileContent',
                                                                            'latest', 
                                                                            '{'.
                                                                            '"entities" : {'.
                                                                                    '"additionalData" : {'.
                                                                                        '"itemList" : {'.
                                                                                            '"items" : JSON.parse(varLocalJSONDataBuilder)'.
                                                                                            '}'.
                                                                                        '}'.
                                                                                '}'.
                                                                            '}'
                                                                            )
                                                                        ).
                                                                    ').data.recordID'.
                                                                '); '.
                                                            //'alert(varReturn); '.
                                                            'return varReturn;'.
                                                            '}'.
                                                        'catch(varError) {'.
                                                            'alert(\'ERP Reborn Error Notification\n\nInvalid Process\n(\' + varError + \')\'); '.
                                                            '}'.
                                                        //'alert(varLocalJSONDataBuilder); '.
                                                        '}) (varJSONDataBuilder); '.
                                                    'alert(\'Record ID : \' + varRecordID);'.

                                                '}; '.
                                            'varObjFileReader.readAsDataURL(varObjCurrentFile); '.
                                            '}) (varObjFileList[i], i); '.
                                        '}'.
//                                    'alert(varReturn); '.
                                    '}'.
                                '}'.
                            'else {'.
                                'alert(\'ERP Reborn Error Notification\n\nInvalid DOM Objects\'); '.
                                '}'.
                            '}) (this, document.getElementById(\''.$varDOMReturnObjectID.'\'))'.
                        //---> Main Function ( End )
                        '}'.
                    'alert(\'abcdefg\'); '.
                    '}'.
                'catch(varError) {'.
                    '}'.
                '';
            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getSyntaxFunc_DOMInputFileContent                                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000004                                                                                       |
        | ▪ Last Update     : 2023-01-10                                                                                           |
        | ▪ Creation Date   : 2021-07-28                                                                                           |
        | ▪ Description     : Mengambil Fungsi DOM Input File Content                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession (Mandatory) ► User Session                                                                |
        |      ▪ (string) varAPIWebToken (Mandatory) ► API Web Token                                                               |
        |      ▪ (string) varUniqueID (Mandatory) ► Penanda Unik untuk DOM (Tidak boleh terduplikasi)                              |
        |      ▪ (string) varDOMReturnID (Mandatory) ► DOMReturnID                                                                 |
        |      ▪ (string) varDOMReturnIDAction (Mandatory) ► DOMReturnIDAction                                                     |
        |      ▪ (string) varDOMActionPanel (Mandatory) ► DOMActionPanel                                                           |
        |      ▪ (string) varDOMAction (Mandatory) ► DOMAction                                                                     |
        |      ▪ (string) varAction (Optional) ► Action                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getSyntaxFunc_DOMInputFileContent(
            $varUserSession, string $varAPIWebToken, 
            string $varUniqueID, string $varDOMReturnID, string $varDOMReturnIDAction, string $varDOMActionPanel, string $varDOMAction, string $varAction = null)
            {
                    
            // dd($varDOMReturnID);
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, false, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Get DOM Input Files Content');
                try {
                    if(!$varAction)
                        {
                        $varAction = 'OverWrite';
                        }
                        
                    $varStyle_TableAction =
                        [
                            ['width', '100px'],
                            ['border', '1px solid #ced4da']
                        ];

                    $varStyle_TableActionPanelHead =
                        [
                            ['backgroundColor', '#E9ECEF'],
                            ['color', '#212529'],
                            ['fontFamily', '\\\'verdana\\\''],
                            ['whiteSpace', 'nowrap'],
                            ['fontSize', '11px'],
                            ['textAlign', 'center'],
                            ['border', '1px solid #ced4da']
                        ];
                    
                    $varStyle_TableActionPanelBody =
                        [
                            ['backgroundColor', '#E9ECEF'],
                            ['color', '#000000'],
                            ['fontFamily', '\\\'verdana\\\''],
                            ['whiteSpace', 'nowrap'],
                            ['fontSize', '13px'],
                            ['textAlign', 'left'],
                            ['border', '1px solid #ced4da'],
                            ['padding', '8px 10px']
                        ];

                    $varReturn =
                        'try {'.

                            //     'varSignExistAPIWebToken = function () {'.
                            //         'try {'.
                            //             'varReturn = ('.
                            //                 'JSON.parse('.                           
                            //                     str_replace(
                            //                         '"', 
                            //                         '\'', 
                            //                         \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                            //                             $varUserSession, 
                            //                             $varAPIWebToken, 
                            //                             'authentication.general.isSessionExist', 
                            //                             'latest', 
                            //                             '{'.
                            //                                 '"parameter" : null'.
                            //                             '}'
                            //                             )
                            //                         ).
                            //                     ').data.signExist'. //.data.contentBase64'.
                            //                 '); '.
                            //             'return varReturn; '.
                            //             '} '.
                            //         'catch(varError) {'.
                            //             //'alert(\'ERP Reborn Error Notification\n\nInvalid Process\n(\' + varError + \')\'); '.
                            //             'return false; '.
                            //             '}'.
                            //         '} (); '.
                                    
                            //     'return varSignExistAPIWebToken; '.

                            
                            'varSignExistAPIWebToken = false; '.
                            'if(\''. $varAPIWebToken .'\' != \'\') {'.
                                'varSignExistAPIWebToken = true; '.
                            '}'.

                            'if(varSignExistAPIWebToken == false) {'.
                                'alert(\'ERP Reborn Error Notification\n\nAPI Web Token Is Not Exist\'); '.
                                '}'.
                            'else {'.
                                'try {'.
                                    'document.getElementById(\'zhtSysObjDOMText_'.$varUniqueID.'_MainData\').value = document.getElementById(\'zhtSysObjDOMText_'.$varUniqueID.'_MainData\').value; '.
                                    '} '.
                                'catch(varError) {'.
                                    //---> Main Action (Start)
                                    //self::getSyntaxCreateDOM_InputText(
                                    self::getSyntaxCreateDOM_InputHidden(
                                        $varUserSession, 
                                        [
                                            'ID' => 'zhtSysObjDOMText_'.$varUniqueID.'_MainData',
                                            'ParentID' => 'document.body',
                                            'Value' => '',
                                            'Style' => [
                                                ['width', '200px'],
                                                ['height', '100px']
                                                ]
                                        ]).
                                    //---> Penambahan Script
                                    self::getSyntaxCreateDOM_JavaScript(
                                        $varUserSession, 
                                        [],
                                        self::setEscapeForEscapeSequenceOnSyntaxLiteral(
                                            $varUserSession, 
                                            (
                                            //---> JSFunc_LockObject_...
                                            'function JSFunc_LockObject_'.$varUniqueID.'() {'.
                                                'try {'.
                                                    'document.getElementById(\'zhtSysObjDOMTable_'.$varUniqueID.'_ActionPanel\').disabled = false; '.
                                                    'document.getElementById(\'zhtSysObjDOMTable_'.$varUniqueID.'_ActionPanel\').style.visibility = \'hidden\'; '.
                                                    //'document.getElementById(\'zhtSysObjDOMTable_'.$varUniqueID.'_ActionPanel\').style.display = \'none\'; '.
                                                    '} '.
                                                'catch(varError) {'.
                                                    'alert(\'ERP Reborn Error Notification\n\nInvalid Process\n(\' + varError + \')\'); '.
                                                    '}'.
                                                '}'.

                                            //---> JSFunc_UnlockObject_...
                                            'function JSFunc_UnlockObject_'.$varUniqueID.'() {'.
                                                'try {'.
                                                    'document.getElementById(\'zhtSysObjDOMTable_'.$varUniqueID.'_ActionPanel\').disabled = true; '.
                                                    'document.getElementById(\'zhtSysObjDOMTable_'.$varUniqueID.'_ActionPanel\').style.visibility = \'visible\'; '.
                                                    //'document.getElementById(\'zhtSysObjDOMTable_'.$varUniqueID.'_ActionPanel\').style.display = \'inline\'; '.
                                                    '} '.
                                                'catch(varError) {'.
                                                    'alert(\'ERP Reborn Error Notification\n\nInvalid Process\n(\' + varError + \')\'); '.
                                                    '}'.
                                                '}'.

                                            //---> JSFunc_GetActionPanel_Reload_...
                                            'function JSFunc_GetActionPanel_Reload_'.$varUniqueID.'(varURLDelete) {'.
                                                'try {'.
                                                    'var XHR = new XMLHttpRequest(); '.
                                                    'XHR.onreadystatechange = function() {'.
                                                        'if (XHR.readyState == XMLHttpRequest.DONE) {'.
                                                        //'if (XHR.readyState == 4 && XHR.status == 200) {'.
                                                            'alert(\'Record has been deleted\'); '.
                                                            //'alert(varURLDelete); '.
                                                            'JSFunc_ObjDOMTable_ActionPanel_Show_'.$varUniqueID.'(); '.
                                                            '}'.
                                                        '}; '.
                                                    'XHR.open(\'GET\', varURLDelete, true); '.
                                                    'XHR.send(null); '.
                                                    '}'.
                                                'catch(varError) {'.
                                                    'alert(\'ERP Reborn Error Notification\n\nInvalid Process\n(\' + varError + \')\'); '.
                                                    '}'.
                                                '}'.
                                                
                                            //---> JSFunc_GetActionPanel_CommitFromOutside_...
                                            'function JSFunc_GetActionPanel_CommitFromOutside_'.$varUniqueID.'() {'.
                                                'try {'.
                                                    //'if(document.getElementById(\''.$varDOMReturnIDAction.'\').value != null) {'.
                                                    'if(document.getElementById(\''.$varDOMReturnIDAction.'\') != null) {'.
                                                        'JSFunc_GetActionPanel_Commit_'.$varUniqueID.'(); '.
                                                    '}'.                                               

                                                    // 'alert(\'Test Commit Berhasil dieksekusi\'); '.
                                                    '}'.
                                                'catch(varError) {'.
                                                    'alert(\'ERP Reborn Error Notification\n\nInvalid Process\n(\' + varError + \')\'); '.
                                                    '}'.
                                                '}'.

                                            //---> JSFunc_GetActionPanel_Commit_...
                                            'function JSFunc_GetActionPanel_Commit_'.$varUniqueID.'() {'.
                                                'try {'.
                                                    
                                                    'varReturn = ('.
                                                        'JSON.parse('.
                                                            str_replace(
                                                                '"', 
                                                                '\'', 
                                                                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                                                                    $varUserSession, 
                                                                    $varAPIWebToken, 
                                                                    'fileHandling.upload.archive.general.setFilesFromStagingArea', 
                                                                    'latest',
                                                                    '{'.
                                                                        '"parameter" : {'.
                                                                            '"log_FileUpload_Pointer_RefID" : JSFunc_MainData_GetData_FileUploadPointerRefID_'.$varUniqueID.'(), '.
                                                                            '"rotateLog_FileUploadStagingArea_RefRPK" : JSFunc_MainData_GetData_FileUploadStagingAreaRefRPK_'.$varUniqueID.'(), '.
                                                                            '"deleteCandidate_Log_FileUpload_ObjectDetail_RefArrayID" : JSFunc_MainData_GetData_DeleteCandidateFileUploadObjectDetailRefArrayID_'.$varUniqueID.'()'.
                                                                            '}'.
                                                                    '}'
                                                                    )
                                                                ).
                                                            ').data.log_FileUpload_Pointer_RefID'.
                                                        '); '.
                                                    //'alert(JSON.stringify(varReturn)); '.
                                                    'document.getElementById(\''.$varDOMReturnID.'\').value = JSON.stringify(varReturn); '.
                                                    'JSFunc_MainData_SetData_FileUploadPointerRefID_'.$varUniqueID.'(varReturn); '.
                                                    'JSFunc_MainData_SetData_FileUploadStagingAreaRefRPK_'.$varUniqueID.'(null); '.
    //                                                'JSFunc_MainData_InitData_'.$varUniqueID.'(document.getElementById(\''.$varDOMReturnID.'\').value, null, []); '.
                                                    //'alert(\'Committed File(s) Upload Complete\'); '.
                                                    'varNothing = JSFunc_ObjDOMTable_ActionPanel_Show_'.$varUniqueID.'(); '.
                                                '}'.

                                                    

                                                'catch(varError) {'.
                                                    // 'alert(\'ERP Reborn Error Notification\n\nInvalid Processn\n(\' + varError + \')\'); '.
                                                    '}'.
    //                                            'varNothing = '.self::getSyntaxCreateDOM_DivCustom_ModalBox_ProcessLoad($varUserSession, $varUniqueID, 'document.body', false).
                                                '}'.

                                            //---> JSFunc_MainData_InitData_...
                                            'function JSFunc_MainData_InitData_'.$varUniqueID.'(log_FileUpload_Pointer_RefID, rotateLog_FileUploadStagingArea_RefRPK, deleteCandidate_Log_FileUpload_ObjectDetail_RefArrayID) {'.
                                                'try {'.
                                                    'if(JSFunc_MainData_GetData_'.$varUniqueID.'() == null) {'.
                                                        //---> Main Template
                                                        'varJSONData = \'{\' + '.
                                                            'String.fromCharCode(34) + \'header\' + String.fromCharCode(34) + \' : {\' + '.
                                                                'String.fromCharCode(34) + \'log_FileUpload_Pointer_RefID\' + String.fromCharCode(34) + \' : \' + ((log_FileUpload_Pointer_RefID == \'\') ? null : log_FileUpload_Pointer_RefID) + \', \' + '.
                                                                'String.fromCharCode(34) + \'rotateLog_FileUploadStagingArea_RefRPK\' + String.fromCharCode(34) + \' : \' + ((rotateLog_FileUploadStagingArea_RefRPK == \'\') ? null : rotateLog_FileUploadStagingArea_RefRPK) + \', \' + '.
                                                                'String.fromCharCode(34) + \'deleteCandidate_Log_FileUpload_ObjectDetail_RefArrayID\' + String.fromCharCode(34) + \' : \' + ((deleteCandidate_Log_FileUpload_ObjectDetail_RefArrayID == \'\') ? \'[]\' : deleteCandidate_Log_FileUpload_ObjectDetail_RefArrayID) + \', \' + '.
                                                                'String.fromCharCode(34) + \'signNeedToCommit\' + String.fromCharCode(34) + \' : false\' + \', \' + '.
                                                                'String.fromCharCode(34) + \'signNeedToCommit_Archive\' + String.fromCharCode(34) + \' : false\' + '.
                                                                '\'}, \' + '.
                                                            'String.fromCharCode(34) + \'data\' + String.fromCharCode(34) + \' : {\' + '.
                                                                'String.fromCharCode(34) + \'masterFileRecord\' + String.fromCharCode(34) + \' : {\' + '.
                                                                    '\'}\' + '.
                                                               '\'}\' + '.
                                                            '\'}\';'.
                                                        'JSFunc_MainData_SetData_'.$varUniqueID.'(JSON.stringify(JSON.parse(varJSONData))); '.
                                                        //---> Update MasterFileRecord From Database
                                                        'varDataJSONMasterFileRecord = null;'.
                                                        // 'if(document.getElementById(\''.$varDOMReturnIDAction.'\').value != \'\' || document.getElementById(\''.$varDOMReturnID.'\').value != \'\') {'.
                                                        //     'varDataJSONMasterFileRecord = JSFunc_MainData_GetDataFromDatabase_MasterFileRecord_'.$varUniqueID.'(); '.
                                                        // '}'.



                                                        // 'console.log(varDataJSONMasterFileRecord); '.
                                                        
                                                        'JSFunc_MainData_SetData_MasterFileRecord_'.$varUniqueID.'(varDataJSONMasterFileRecord); '.
                                                        '}'.
                                                    '}'.
                                                'catch(varError) {'.
                                                    'alert(\'ERP Reborn Error Notification\n\nInvalid Process\n(\' + varError + \')\'); '.
                                                    '}'.
                                                '}'.

                                            //---> JSFunc_MainData_GetData_...
                                            'function JSFunc_MainData_GetData_'.$varUniqueID.'() {'.
                                                'varReturn = null; '.
                                                'try {'.
                                                    'if(document.getElementById(\'zhtSysObjDOMText_'.$varUniqueID.'_MainData\').value != \'\') {'.
                                                        'varReturn = JSON.parse(document.getElementById(\'zhtSysObjDOMText_'.$varUniqueID.'_MainData\').value); '.
                                                        '}'.
                                                    '}'.
                                                'catch(varError) {'.
                                                    'alert(\'ERP Reborn Error Notification\n\nInvalid Process\n(\' + varError + \')\'); '.
                                                    '}'.
                                                'return varReturn; '.
                                                '}'.

                                            //---> JSFunc_MainData_SetData_...
                                            'function JSFunc_MainData_SetData_'.$varUniqueID.'(varDataJSON) {'.
                                                'try {'.
                                                    'document.getElementById(\'zhtSysObjDOMText_'.$varUniqueID.'_MainData\').value = varDataJSON;'.
                                                    '}'.
                                                'catch(varError) {'.
                                                    'alert(\'ERP Reborn Error Notification\n\nInvalid Process\n(\' + varError + \')\'); '.
                                                    '}'.
                                                '}'.

                                            //---> JSFunc_MainData_GetData_FileUploadPointerRefID_...
                                            'function JSFunc_MainData_GetData_FileUploadPointerRefID_'.$varUniqueID.'() {'.
                                                'varReturn = null; '.
                                                'try {'.
                                                    'varData = JSFunc_MainData_GetData_'.$varUniqueID.'(); '.
                                                    'varReturn = varData.header.log_FileUpload_Pointer_RefID; '.
                                                    '}'.
                                                'catch(varError) {'.
                                                    'alert(\'ERP Reborn Error Notification\n\nInvalid Process\n(\' + varError + \')\'); '.
                                                    '}'.
                                                'return varReturn; '.
                                                '}'.

                                            //---> JSFunc_MainData_SetData_FileUploadPointerRefID_...
                                            'function JSFunc_MainData_SetData_FileUploadPointerRefID_'.$varUniqueID.'(varDataID) {'.
                                                'try {'.
                                                    'varDataJSON = JSFunc_MainData_GetData_'.$varUniqueID.'(); '.
                                                    'varDataJSON.header.log_FileUpload_Pointer_RefID = varDataID; '.
                                                    'JSFunc_MainData_SetData_'.$varUniqueID.'(JSON.stringify(varDataJSON)); '.
                                                    '}'.
                                                'catch(varError) {'.
                                                    'alert(\'ERP Reborn Error Notification\n\nInvalid Process\n(\' + varError + \')\'); '.
                                                    '}'.
                                                '}'.

                                            //---> JSFunc_MainData_GetData_FileUploadStagingAreaRefRPK_
                                            'function JSFunc_MainData_GetData_FileUploadStagingAreaRefRPK_'.$varUniqueID.'() {'.
                                                'varReturn = null; '.
                                                'try {'.
                                                    'varData = JSFunc_MainData_GetData_'.$varUniqueID.'(); '.
                                                    'varReturn = varData.header.rotateLog_FileUploadStagingArea_RefRPK; '.
                                                    '}'.
                                                'catch(varError) {'.
                                                    'alert(\'ERP Reborn Error Notification\n\nInvalid Process\n(\' + varError + \')\'); '.
                                                    '}'.
                                                'return varReturn; '.
                                                '}'.

                                            //---> JSFunc_MainData_SetData_FileUploadStagingAreaRefRPK_...
                                            'function JSFunc_MainData_SetData_FileUploadStagingAreaRefRPK_'.$varUniqueID.'(varDataRPK) {'.
                                                'try {'.
                                                    'varDataJSON = JSFunc_MainData_GetData_'.$varUniqueID.'(); '.
                                                    'varDataJSON.header.rotateLog_FileUploadStagingArea_RefRPK = varDataRPK; '.
                                                    'JSFunc_MainData_SetData_'.$varUniqueID.'(JSON.stringify(varDataJSON)); '.
                                                    '}'.
                                                'catch(varError) {'.
                                                    'alert(\'ERP Reborn Error Notification\n\nInvalid Process\n(\' + varError + \')\'); '.
                                                    '}'.
                                                '}'.

                                            //---> JSFunc_MainData_GetData_SignNeedToCommit_...
                                            'function JSFunc_MainData_GetData_SignNeedToCommit_'.$varUniqueID.'() {'.
                                                'varReturn = null; '.
                                                'try {'.
                                                    'varData = JSFunc_MainData_GetData_'.$varUniqueID.'(); '.
                                                    'varReturn = varData.header.signNeedToCommit; '.
                                                    '}'.
                                                'catch(varError) {'.
                                                    'alert(\'ERP Reborn Error Notification\n\nInvalid Process\n(\' + varError + \')\'); '.
                                                    '}'.
                                                'return varReturn; '.
                                                '}'.

                                            //---> JSFunc_MainData_SetData_SignNeedToCommit_...
                                            'function JSFunc_MainData_SetData_SignNeedToCommit_'.$varUniqueID.'(varStatus) {'.
                                                'try {'.
                                                    'varDataJSON = JSFunc_MainData_GetData_'.$varUniqueID.'(); '.
                                                    'varDataJSON.header.signNeedToCommit = varStatus; '.
                                                    'JSFunc_MainData_SetData_'.$varUniqueID.'(JSON.stringify(varDataJSON)); '.
                                                    '}'.
                                                'catch(varError) {'.
                                                    'alert(\'ERP Reborn Error Notification\n\nInvalid Process\n(\' + varError + \')\'); '.
                                                    '}'.
                                                '}'.

                                            //---> JSFunc_MainData_GetData_DeleteCandidateFileUploadObjectDetailRefArrayID_...
                                            'function JSFunc_MainData_GetData_DeleteCandidateFileUploadObjectDetailRefArrayID_'.$varUniqueID.'() {'.
                                                'varReturn = JSON.parse(\'[]\'); '.
                                                'try {'.
                                                    'varData = JSFunc_MainData_GetData_'.$varUniqueID.'(); '.
                                                    'varReturn = varData.header.deleteCandidate_Log_FileUpload_ObjectDetail_RefArrayID; '.
                                                    'if(varReturn == null) {'.
                                                        'varReturn = JSON.parse(\'[]\'); '.
                                                        '}'.
                                                    '}'.
                                                'catch(varError) {'.
                                                    'alert(\'ERP Reborn Error Notification\n\nInvalid Process\n(\' + varError + \')\'); '.
                                                    '}'.
                                                'return varReturn; '.
                                                '}'.

                                            //---> JSFunc_MainData_SetData_DeleteCandidateFileUploadObjectDetailRefArrayID_...
                                            'function JSFunc_MainData_SetData_DeleteCandidateFileUploadObjectDetailRefArrayID_'.$varUniqueID.'(varDataArrayID) {'.
                                                'try {'.
                                                    // 'console.log(varDataArrayID);'.
                                                    'varDataJSON = JSFunc_MainData_GetData_'.$varUniqueID.'(); '.
                                                    'varDataJSONDeleteCandidate = varDataJSON.header.deleteCandidate_Log_FileUpload_ObjectDetail_RefArrayID; '.
                                                    'if (varDataArrayID === undefined || varDataArrayID.length == 0) {'.
                                                        'varDataJSONDeleteCandidate = []; '. //JSON.parse(\'[]\'); '.
                                                        '}'.
                                                    'else {'.
                                                        'varDataJSONDeleteCandidate.push(varDataArrayID); '.
                                                        '}'.
                                                    'varDataJSON.header.deleteCandidate_Log_FileUpload_ObjectDetail_RefArrayID = varDataJSONDeleteCandidate; '.
                                                    'JSFunc_MainData_SetData_'.$varUniqueID.'(JSON.stringify(varDataJSON)); '.
                                                    '}'.
                                                'catch(varError) {'.
                                                    'alert(\'ERP Reborn Error Notification\n\nInvalid Process\n(\' + varError + \')\'); '.
                                                    '}'.
                                                '}'.

                                            //---> JSFunc_FileDownload_...
                                            'function JSFunc_FileDownload_'.$varUniqueID.'(varFilePath, varMIME, varFileName) {'.
                                                'try {'.
                                                    'varBase64Data = ('.
                                                        'JSON.parse('.                           
                                                            str_replace(
                                                                '"', 
                                                                '\'', 
                                                                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                                                                    $varUserSession, 
                                                                    $varAPIWebToken, 
                                                                    'fileHandling.upload.combined.general.getFileContent', 
                                                                    'latest', 
                                                                    '{'.
                                                                        '"parameter" : {'.
                                                                            '"filePath" : varFilePath'.
                                                                            '}'.
                                                                    '}'
                                                                    )
                                                                ).
                                                            ').data.contentBase64'.
                                                        '); '.
                                                    'varObjDownloadLink = document.createElement(\'a\'); '.
                                                    'varObjDownloadLink.href = \'data:text/plain;base64,\' + varBase64Data; '.
                                                    'varObjDownloadLink.download = varFileName; '.
                                                    'varObjDownloadLink.click(); '.
                                                    // 'varObjDownloadLink.parentNode.removeChild(varObjDownloadLink); '.
                                                    '}'.
                                                'catch(varError) {'.
                                                    'alert(\'ERP Reborn Error Notification\n\nInvalid Process\n(\' + varError + \')\'); '.
                                                    '}'.
                                                '}'.

                                            //---> JSFunc_FilePreview_...
    //                                         'function JSFunc_FilePreview_'.$varUniqueID.'(varFilePath, varName, varSize, varMIME, varUploadDateTimeTZ) {'.
    //                                             'try {'.
    // //                                                'alert(varFilePath);'.
    //                                                 'varReturn = ('.
    //                                                     'JSON.parse('.                           
    //                                                         str_replace(
    //                                                             '"', 
    //                                                             '\'', 
    //                                                             \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
    //                                                                 $varUserSession, 
    //                                                                 $varAPIWebToken, 
    //                                                                 'fileHandling.upload.combined.general.getFileContent', 
    //                                                                 'latest', 
    //                                                                 '{'.
    //                                                                     '"parameter" : {'.
    //                                                                         '"filePath" : varFilePath'.
    //                                                                         '}'.
    //                                                                 '}'
    //                                                                 )
    //                                                             ).
    //                                                         ').data.contentBase64'.
    //                                                     '); '.
    //                                                 'varNothing = '.
    //                                                     self::getSyntaxCreateDOM_DivCustom_ModalBox_FilePreview(
    //                                                         $varUserSession,
    //                                                         $varAPIWebToken,
    //                                                         'ObjDivModalBox_'.$varUniqueID
    //                                                         ).
    //                                                     '; '.
    //                                                 '}'.
    //                                             'catch(varError) {'.
    //                                                 'alert(\'ERP Reborn Error Notification\n\nInvalid Process\n(\' + varError + \')\'); '.
    //                                                 '}'.
    //                                             '}'.

                                            //---> JSFunc_MainData_GetData_MasterFileRecord_...
                                            'function JSFunc_MainData_GetData_MasterFileRecord_'.$varUniqueID.'() {'.
                                                'varReturn = null; '.
                                                'try {'.
                                                    'varData = JSFunc_MainData_GetData_'.$varUniqueID.'(); '.
                                                    'varReturn = varData.data.masterFileRecord; '.
                                                    '}'.
                                                'catch(varError) {'.
                                                    'alert(\'ERP Reborn Error Notification\n\nInvalid Process\n(\' + varError + \')\'); '.
                                                    '}'.
                                                'return varReturn; '.
                                                '}'.

                                            //---> JSFunc_MainData_SetData_MasterFileRecord_...
                                            'function JSFunc_MainData_SetData_MasterFileRecord_'.$varUniqueID.'(varDataJSONMasterFileRecord) {'.
                                                'try {'.
                                                    'varDataJSON = JSFunc_MainData_GetData_'.$varUniqueID.'(); '.
                                                    'varDataJSON.data.masterFileRecord = varDataJSONMasterFileRecord; '.
                                                    'JSFunc_MainData_SetData_'.$varUniqueID.'(JSON.stringify(varDataJSON)); '.
                                                    '}'.
                                                'catch(varError) {'.
                                                    'alert(\'ERP Reborn Error Notification\n\nInvalid Process\n(\' + varError + \')\'); '.
                                                    '}'.
                                                '}'.

                                            //---> JSFunc_MainData_GetDataFromDatabase_MasterFileRecord_...
                                            'function JSFunc_MainData_GetDataFromDatabase_MasterFileRecord_'.$varUniqueID.'() {'.
                                                'varReturn = null; '.
                                                'try {'.
                                                    'varReturn = ('.
                                                        'JSON.parse('.
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
                                                                            '"log_FileUpload_Pointer_RefID" : JSFunc_MainData_GetData_FileUploadPointerRefID_'.$varUniqueID.'(), '.
                                                                            '"rotateLog_FileUploadStagingArea_RefRPK" : JSFunc_MainData_GetData_FileUploadStagingAreaRefRPK_'.$varUniqueID.'(), '.
                                                                            '"deleteCandidate_Log_FileUpload_ObjectDetail_RefArrayID" : JSFunc_MainData_GetData_DeleteCandidateFileUploadObjectDetailRefArrayID_'.$varUniqueID.'()'.
                                                                            '}'.
                                                                    '}'
                                                                    )
                                                                ).
                                                            ').data'.
                                                        ').data; '.
                                                    '}'.
                                                'catch(varError) {'.
                                                    'alert(\'ERP Reborn Error Notification\n\n Invalid Process\n(\' + varError + \')\'); '.
                                                    '}'.

                                                // 'console.log(varReturn); '.
                                                'return varReturn; '.
                                            '}'.

                                            //---> JSFunc_ObjDOMTable_ActionPanel_Show_...
                                            'function JSFunc_ObjDOMTable_ActionPanel_Show_'.$varUniqueID.'() {'.
                                                'try {'.
                                                    //---> Ambil varDataJSONMasterFileRecord dari database
                                                    
                                                    'varDataJSONMasterFileRecord = null; '.
                                                    'if(document.getElementById(\''.$varDOMReturnIDAction.'\').value != \'\' || document.getElementById(\''.$varDOMReturnID.'\').value != \'\') {'.
                                                        'varDataJSONMasterFileRecord = JSFunc_MainData_GetDataFromDatabase_MasterFileRecord_'.$varUniqueID.'(); '.
                                                    '}'.
        //                                            'varDataJSONMasterFileRecord = JSFunc_MainData_GetData_MasterFileRecord_'.$varUniqueID.'(); '.
                                                    // 'console.log(varDataJSONMasterFileRecord); '.

                                                    //---> Update varDataJSONMasterFileRecord di Main Data
                                                    'JSFunc_MainData_SetData_MasterFileRecord_'.$varUniqueID.'(varDataJSONMasterFileRecord); '.

                                                    //---> SignNeedToCommit Reinit
                                                    'JSFunc_MainData_SetData_SignNeedToCommit_'.$varUniqueID.'(false); '.
                                                    'if((JSFunc_MainData_GetData_DeleteCandidateFileUploadObjectDetailRefArrayID_'.$varUniqueID.'() == \'\') == false) { '.
                                                        'JSFunc_MainData_SetData_SignNeedToCommit_'.$varUniqueID.'(true); '.
                                                        '}'.
                                                    'if(JSFunc_MainData_GetData_SignNeedToCommit_'.$varUniqueID.'() == false) {'.
                                                        'if(varDataJSONMasterFileRecord != null) '.
                                                            '{'.
                                                            'for(i=0, iMax = varDataJSONMasterFileRecord.length; i != iMax; i++)'.
                                                                '{'.
                                                                'if(varDataJSONMasterFileRecord[i][\'signExistOnArchive\'] == false) {'.
                                                                    'JSFunc_MainData_SetData_SignNeedToCommit_'.$varUniqueID.'(true); '.
                                                                    '}'.
                                                                '}'.
                                                            '}'.
                                                        '}'.

                                                    //---> Object Table
                                                    'if(document.getElementById(\'zhtSysObjDOMTable_'.$varUniqueID.'_ActionPanel\') != null)'.
                                                        '{'.
                                                        'document.getElementById(\'zhtSysObjDOMTable_'.$varUniqueID.'_ActionPanel\').remove(); '.
                                                        '}'.

                                                    self::getSyntaxCreateDOM_Table(
                                                        $varUserSession, 
                                                        [
                                                        'ID' => 'zhtSysObjDOMTable_'.$varUniqueID.'_ActionPanel',
                                                        'ParentID' => 'document.getElementById(\''.$varDOMActionPanel.'\')',
                                                        'Style' => $varStyle_TableAction
                                                        ],
                                                        (
                                                        //---> Table Head
                                                        self::getSyntaxCreateDOM_TableHead(
                                                            $varUserSession, 
                                                            [
                                                            'ID' => 'varObjTHead',
                                                            'ParentID' => 'zhtSysObjDOMTable_'.$varUniqueID.'_ActionPanel'
                                                            ],
                                                            (
                                                            self::getSyntaxCreateDOM_TableRow(
                                                                $varUserSession, 
                                                                [
                                                                'ID' => 'varObjTTR',
                                                                'ParentID' => 'varObjTHead'
                                                                ], 
                                                                (
                                                                self::getSyntaxCreateDOM_TableData(
                                                                    $varUserSession, 
                                                                    [
                                                                    'ID' => 'varObjTTD',
                                                                    'ParentID' => 'varObjTTR',
                                                                    'Style' => $varStyle_TableActionPanelHead,
                                                                    'RowSpan' => 2
                                                                    ],
                                                                    'varObjTTD.appendChild(document.createTextNode(\'NO\')); '
                                                                    ).
                                                                self::getSyntaxCreateDOM_TableData(
                                                                    $varUserSession, 
                                                                    [
                                                                    'ID' => 'varObjTTD',
                                                                    'ParentID' => 'varObjTTR',
                                                                    'Style' => $varStyle_TableActionPanelHead,
                                                                    'RowSpan' => 2
                                                                    ],
                                                                    'varObjTTD.appendChild(document.createTextNode(\'FILE NAME\')); '
                                                                    ).
                                                                self::getSyntaxCreateDOM_TableData(
                                                                    $varUserSession, 
                                                                    [
                                                                    'ID' => 'varObjTTD',
                                                                    'ParentID' => 'varObjTTR',
                                                                    'Style' => $varStyle_TableActionPanelHead,
                                                                    'RowSpan' => 2
                                                                    ],
                                                                    'varObjTTD.appendChild(document.createTextNode(\'SIZE\')); '
                                                                    ).
                                                                self::getSyntaxCreateDOM_TableData(
                                                                    $varUserSession, 
                                                                    [
                                                                    'ID' => 'varObjTTD',
                                                                    'ParentID' => 'varObjTTR',
                                                                    'Style' => $varStyle_TableActionPanelHead,
                                                                    'RowSpan' => 2
                                                                    ],
                                                                    'varObjTTD.appendChild(document.createTextNode(\'UPLOAD DATE & TIME\')); '
                                                                    ).
                                                                self::getSyntaxCreateDOM_TableData(
                                                                    $varUserSession, 
                                                                    [
                                                                    'ID' => 'varObjTTD',
                                                                    'ParentID' => 'varObjTTR',
                                                                    'Style' => $varStyle_TableActionPanelHead,
                                                                    'ColSpan' => 4
                                                                    ],
                                                                    'varObjTTD.appendChild(document.createTextNode(\'ACTION\')); '
                                                                    )
                                                                )
                                                                ).
                                                            self::getSyntaxCreateDOM_TableRow(
                                                                $varUserSession, 
                                                                [
                                                                'ID' => 'varObjTTR',
                                                                'ParentID' => 'varObjTHead'
                                                                ], 
                                                                (
                                                                self::getSyntaxCreateDOM_TableData(
                                                                    $varUserSession, 
                                                                    [
                                                                    'ID' => 'varObjTTD',
                                                                    'ParentID' => 'varObjTTR',
                                                                    'Style' => $varStyle_TableActionPanelHead,
                                                                    ],
                                                                    'varObjTTD.appendChild(document.createTextNode(\'DELETE\')); '
                                                                    ).
                                                                // self::getSyntaxCreateDOM_TableData(
                                                                //     $varUserSession, 
                                                                //     [
                                                                //     'ID' => 'varObjTTD',
                                                                //     'ParentID' => 'varObjTTR',
                                                                //     'Style' => $varStyle_TableActionPanelHead,
                                                                //     ],
                                                                //     'varObjTTD.appendChild(document.createTextNode(\'SAVE\')); '
                                                                //     ).
                                                                // self::getSyntaxCreateDOM_TableData(
                                                                //     $varUserSession, 
                                                                //     [
                                                                //     'ID' => 'varObjTTD',
                                                                //     'ParentID' => 'varObjTTR',
                                                                //     'Style' => $varStyle_TableActionPanelHead,
                                                                //     ],
                                                                //     'varObjTTD.appendChild(document.createTextNode(\'PREVIEW\')); '
                                                                //     ).
                                                                self::getSyntaxCreateDOM_TableData(
                                                                    $varUserSession, 
                                                                    [
                                                                    'ID' => 'varObjTTD',
                                                                    'ParentID' => 'varObjTTR',
                                                                    'Style' => $varStyle_TableActionPanelHead,
                                                                    ],
                                                                    'varObjTTD.appendChild(document.createTextNode(\'DOWNLOAD\')); '
                                                                    )
                                                                )
                                                                )
                                                            )
                                                            ).
                                                        //---> Table Body
                                                        self::getSyntaxCreateDOM_TableBody(
                                                            $varUserSession, 
                                                            [
                                                            'ID' => 'varObjTHead',
                                                            'ParentID' => 'zhtSysObjDOMTable_'.$varUniqueID.'_ActionPanel'
                                                            ],
                                                            (

                                                            'if(varDataJSONMasterFileRecord == null) {'.
                                                                'varDataJSONMasterFileRecord = ['.
                                                                    '{'.
                                                                    '\'sequence\' : \'\', '.
                                                                    '\'signExistOnArchive\' : \'\', '.
                                                                    '\'recordReference\' : \'\', '.
                                                                    '\'name\' : \'\', '.
                                                                    '\'size\' : \'\', '.
                                                                    '\'MIME\' : \'\', '.
                                                                    '\'extension\' : \'\', '.
                                                                    '\'lastModifiedDateTimeTZ\' : \'\', '.
                                                                    '\'lastModifiedUnixTimestamp\' : \'\', '.
                                                                    '\'hashMethod_RefID\' : \'\', '.
                                                                    '\'contentBase64Hash\' : \'\', '.
                                                                    '\'uploadDateTimeTZ\' : \'\', '.
                                                                    '\'filePath\' : \'\', '.
                                                                    '\'URLDelete\' : \'\' '.
                                                                    '}'.
                                                                    '];'.
                                                                '}'.

                                                            'if(varDataJSONMasterFileRecord != null) '.
                                                                '{'.
                                                                '; '.
                                                                'for(i=0, iMax = varDataJSONMasterFileRecord.length; i != iMax; i++)'.
                                                                    '{'.
                                                                    'varFilePath = varDataJSONMasterFileRecord[i][\'filePath\']; '.
                                                                    'if(!varFilePath) {'.
                                                                        'varTRID = null; '.
                                                                        '}'.
                                                                    'else {'.
                                                                        'varFilePath = varFilePath.replace(/[^a-zA-Z0-9]/g, \'_\'); '.
                                                                        'varTRID = \'Sys_ObjDOMTR_'.$varUniqueID.'_\' + varFilePath; '.
                                                                        '}'.
                                                                    self::getSyntaxCreateDOM_TableRow(
                                                                        $varUserSession, 
                                                                        [
                                                                        'ID' => 'varObjTTR',
                                                                        'ParentID' => 'varObjTHead'
                                                                        ], 
                                                                        (
                                                                        self::getSyntaxCreateDOM_TableData(
                                                                            $varUserSession, 
                                                                            [
                                                                            'ID' => 'varObjTTD',
                                                                            'ParentID' => 'varObjTTR',
                                                                            'Style' => array_merge(
                                                                                $varStyle_TableActionPanelBody,
                                                                                [
                                                                                    ['textAlign', 'center']
                                                                                ]
                                                                                ),
                                                                            ],
                                                                            'varObjTTD.appendChild(document.createTextNode(varDataJSONMasterFileRecord[i][\'sequence\'])); '
                                                                            ).
                                                                        self::getSyntaxCreateDOM_TableData(
                                                                            $varUserSession, 
                                                                            [
                                                                            'ID' => 'varObjTTD',
                                                                            'ParentID' => 'varObjTTR',
                                                                            'Style' => $varStyle_TableActionPanelBody,
                                                                            ],
                                                                            'varObjTTD.appendChild(document.createTextNode(varDataJSONMasterFileRecord[i][\'name\'])); '
                                                                            ).
                                                                        self::getSyntaxCreateDOM_TableData(
                                                                            $varUserSession, 
                                                                            [
                                                                            'ID' => 'varObjTTD',
                                                                            'ParentID' => 'varObjTTR',
                                                                            'Style' => array_merge(
                                                                                $varStyle_TableActionPanelBody,
                                                                                [
                                                                                    ['textAlign', 'right']
                                                                                ]
                                                                                ),
                                                                            ],
                                                                            'varObjTTD.appendChild(document.createTextNode(varDataJSONMasterFileRecord[i][\'size\'])); '
                                                                            ).
                                                                        self::getSyntaxCreateDOM_TableData(
                                                                            $varUserSession, 
                                                                            [
                                                                            'ID' => 'varObjTTD',
                                                                            'ParentID' => 'varObjTTR',
                                                                            'Style' => $varStyle_TableActionPanelBody,
                                                                            ],
                                                                            'varObjTTD.appendChild(document.createTextNode(varDataJSONMasterFileRecord[i][\'uploadDateTimeTZ\'])); '
                                                                            ).
                                                                        self::getSyntaxCreateDOM_TableData(
                                                                            $varUserSession, 
                                                                            [
                                                                            'ID' => 'varObjTTD',
                                                                            'ParentID' => 'varObjTTR',
                                                                            'Style' => array_merge(
                                                                                $varStyle_TableActionPanelBody,
                                                                                [
                                                                                    ['textAlign', 'center']
                                                                                ]
                                                                                ),
                                                                            ],
                                                                            (
                                                                            'var varObjA = document.createElement(\'a\'); '.
                                                                                'varFilePath = varFilePath.replace(/[^a-zA-Z0-9]/g, \'/\'); '.
                                                                                'varURLDelete = varDataJSONMasterFileRecord[i][\'URLDelete\']; '.
                                                                                'if(varDataJSONMasterFileRecord[i][\'sequence\'] != \'\') {'.
                                                                                    'if(varDataJSONMasterFileRecord[i][\'signExistOnArchive\'] == true) {'.
                                                                                        'varObjA.href = \'javascript:'.
                                                                                            'JSFunc_MainData_SetData_DeleteCandidateFileUploadObjectDetailRefArrayID_'.$varUniqueID.'(\' + varDataJSONMasterFileRecord[i][\'recordReference\'] + \'); '.
                                                                                            'JSFunc_ObjDOMTable_ActionPanel_Show_'.$varUniqueID.'(); '.
                                                                                            '\'; '.
                                                                                        '}'.
                                                                                    'else {'.
                                                                                        'varObjA.href = \'javascript:'.
                                                                                            '(function(varURLDelete) {'.
                                                                                                    'JSFunc_GetActionPanel_Reload_'.$varUniqueID.'(varURLDelete); '.
                                                                                                '})(\\\'\' + varURLDelete + \'\\\');'.
                                                                                            '\'; '.
                                                                                        '}'.
                                                                                    'varObjA.innerHTML = \'Delete\'; '.
                                                                                    '}'.
                                                                            'varObjTTD.appendChild(varObjA); '
                                                                            )
                                                                            ).
                                                                        // 'if(i == 0) '.
                                                                        //     '{'.
                                                                        //     self::getSyntaxCreateDOM_TableData(
                                                                        //         $varUserSession, 
                                                                        //         [
                                                                        //         'ID' => 'varObjTTD',
                                                                        //         'ParentID' => 'varObjTTR',
                                                                        //         'RowSpan' => 'iMax',
                                                                        //         'Style' => array_merge(
                                                                        //             $varStyle_TableActionPanelBody,
                                                                        //             [
                                                                        //                 ['textAlign', 'center']
                                                                        //             ]
                                                                        //             ),
                                                                        //         ],
                                                                        //         (
                                                                        //         'if (JSFunc_MainData_GetData_SignNeedToCommit_'.$varUniqueID.'() == true) {'.
                                                                        //             'var varObjA = document.createElement(\'a\'); '.
                                                                        //                 'varObjA.href = \'javascript:'.
                                                                        //                     '(function() {'.
                                                                        //                         self::setEscapeForEscapeSequenceOnSyntaxLiteral(
                                                                        //                             $varUserSession,
                                                                        //                             (
                                                                        //                             'varNothing = '.
                                                                        //                             self::getSyntaxCreateDOM_DivCustom_ModalBox_ProcessLoad($varUserSession, $varUniqueID, 'document.body', true)
                                                                        //                             )
                                                                        //                             ).
                                                                        //                         'setTimeout('.
                                                                        //                             '(function() {'.
                                                                        //                                 'JSFunc_GetActionPanel_Commit_'.$varUniqueID.'(); '.
                                                                        //                                 self::setEscapeForEscapeSequenceOnSyntaxLiteral(
                                                                        //                                     $varUserSession,
                                                                        //                                     (
                                                                        //                                     'varNothing = '.
                                                                        //                                     self::getSyntaxCreateDOM_DivCustom_ModalBox_ProcessLoad($varUserSession, $varUniqueID, 'document.body', false)
                                                                        //                                     )
                                                                        //                                     ).
                                                                        //                                 'JSFunc_MainData_SetData_DeleteCandidateFileUploadObjectDetailRefArrayID_'.$varUniqueID.'([]); '.
                                                                        //                                 'JSFunc_ObjDOMTable_ActionPanel_Show_'.$varUniqueID.'(); '.
                                                                        //                                 '}'.
                                                                        //                             '), 50);'.
                                                                        //                         '})();'.
                                                                        //                     '\'; '.
                                                                        //                 'varObjA.innerHTML = \'Commit\'; '.
                                                                        //             'varObjTTD.appendChild(varObjA); '.
                                                                        //             '}'
                                                                        //         )
                                                                        //         ).
                                                                        //     '}'.
                                                                        // self::getSyntaxCreateDOM_TableData(
                                                                        //     $varUserSession, 
                                                                        //     [
                                                                        //     'ID' => 'varObjTTD',
                                                                        //     'ParentID' => 'varObjTTR',
                                                                        //     'Style' => array_merge(
                                                                        //         $varStyle_TableActionPanelBody,
                                                                        //         [
                                                                        //             ['textAlign', 'center']
                                                                        //         ]
                                                                        //         ),
                                                                        //     ],
                                                                        //     (
                                                                        //     'if (varDataJSONMasterFileRecord[i][\'filePath\'] != \'\') {'.
                                                                        //         'var varFileName = varDataJSONMasterFileRecord[i][\'name\']; '.
                                                                        //         'var varObjA = document.createElement(\'a\'); '.
                                                                        //             'varObjA.href = \'javascript:'.
                                                                        //                 '(function(varFilePath, varName, varSize, varMIME, varUploadDateTimeTZ) {'.
                                                                        //                     'JSFunc_FilePreview_'.$varUniqueID.'(varFilePath, varName, varSize, varMIME, varUploadDateTimeTZ); '.
                                                                        //                     '}) ('.
                                                                        //                         '\\\'\' + varDataJSONMasterFileRecord[i][\'filePath\'] + \'\\\','.
                                                                        //                         ' \\\'\' + varFileName.replace(/\'/g, \'\\\\\\\'\') + \'\\\', '.
                                                                        //                         ' \\\'\' + varDataJSONMasterFileRecord[i][\'size\'] + \'\\\', '.
                                                                        //                         ' \\\'\' + varDataJSONMasterFileRecord[i][\'MIME\'] + \'\\\', '.
                                                                        //                         ' \\\'\' + varDataJSONMasterFileRecord[i][\'uploadDateTimeTZ\'] + \'\\\''.
                                                                        //                         ');'.
                                                                        //                 '\'; '.
                                                                        //             'varObjA.innerHTML = \'Preview\'; '.
                                                                        //         'varObjTTD.appendChild(varObjA); '.
                                                                        //         '}'
                                                                        //     )
                                                                        //     ).
                                                                        self::getSyntaxCreateDOM_TableData(
                                                                            $varUserSession, 
                                                                            [
                                                                            'ID' => 'varObjTTD',
                                                                            'ParentID' => 'varObjTTR',
                                                                            'Style' => array_merge(
                                                                                $varStyle_TableActionPanelBody,
                                                                                [
                                                                                    ['textAlign', 'center']
                                                                                ]
                                                                                ),
                                                                            ],
                                                                            (
                                                                            'if (varDataJSONMasterFileRecord[i][\'filePath\'] != \'\') {'.
                                                                                'var varObjA = document.createElement(\'a\'); '.
                                                                                    'varFileName = varDataJSONMasterFileRecord[i][\'name\'];'.
                                                                                    'varObjA.href = \'javascript:'.
                                                                                        '(function(varFilePath, varMIME, varFileName) {'.
                                                                                                'JSFunc_FileDownload_'.$varUniqueID.'(varFilePath, varMIME, varFileName); '.
                                                                                            '})(\\\'\' + varDataJSONMasterFileRecord[i][\'filePath\'] + \'\\\', \\\'\' + varDataJSONMasterFileRecord[i][\'MIME\'] + \'\\\', \\\'\' + varFileName.replace(/\'/g, \'\\\\\\\'\') + \'\\\');'.
                                                                                        '\'; '.
                                                                                    'varObjA.innerHTML = \'Download\'; '.
                                                                                'varObjTTD.appendChild(varObjA); '.
                                                                                '}'
                                                                            )
                                                                            ).
                                                                        ''
                                                                        )
                                                                        ).
                                                                    '}'.
                                                                '}'
                                                            )
                                                            )
                                                        )
                                                        ).
                                                    '}'.
                                                'catch(varError) {'.
                                                    'alert(\'ERP Reborn Error Notification\n\nInvalid Process\n(\' + varError + \')\'); '.
                                                    '}'.
                                                '}; '.

                                            'JSFunc_MainData_InitData_'.$varUniqueID.'(document.getElementById(\''.$varDOMReturnID.'\').value, null, []); '.
                                            'JSFunc_ObjDOMTable_ActionPanel_Show_'.$varUniqueID.'(); '.
                                            ''
                                            )
                                            )
                                        ).
                                    'ObjHead.appendChild(ObjScript); '.
                                    '} '.
                                    //---> Main Action (End)
                                //---> Main Function ( Start )
                                '(function(varObj, varReturnDOMObject) {'.
                                    //'alert(\'Masuk\'); '.
                                    'varNothing = '.self::getSyntaxCreateDOM_DivCustom_ModalBox_ProcessLoad($varUserSession, $varUniqueID, 'document.body', true).
                                    'if ((typeof varObj != \'undefined\') && (typeof varReturnDOMObject != \'undefined\')) {'.
                                        'var varObjFileList = varObj.files; '.
                                        'if(varObjFileList.length > 0)'.
                                            '{'.
                                            'try {'.
                                                //---> Nonaktifkan Element
                                                'varObj.disabled = true; '.
                                                'varReturnDOMObject.disabled = true; '.
                                                'JSFunc_LockObject_'.$varUniqueID.'(); '.

                                                'var varReturn = \'\'; '.
                                                'var varStagingTag = \''. \App\Helpers\ZhtHelper\System\Helper_Environment::getFrontEndConfigEnvironment($varUserSession, 'TAG_DATA_SEPARATOR_FILE_STAGING_AREA').$varAction.'::\'; '.

                                                'var varAccumulatedFiles = 0; '.
                                                'var varJSONDataBuilder = \'\'; '.

                                                //---> Inner Function : Mengurutkan Ulang Sequence dan Mencari Last Sequence
                                                'function innerFuncGetLastSequence(varRotateLog_FileUploadStagingArea_RefRPK)'.
                                                    '{'.
                                                    'varReturn = (JSON.parse('.str_replace('"', '\'', \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                                                        $varUserSession, 
                                                        $varAPIWebToken, 
                                                        'fileHandling.upload.stagingArea.general.resetSequence', 
                                                        'latest', 
                                                        '{'.
                                                            '"parameter" : {'.
                                                                '"rotateLog_FileUploadStagingArea_RefRPK" : varRotateLog_FileUploadStagingArea_RefRPK'.
                                                                '}'.
                                                        '}'
                                                        )).').data.lastSequence); '.
                                                    'return varReturn;'.
                                                    '}'.

                                                //---> Inner Function : Mendapatkan New ID untuk RotateLog_FileUploadStagingArea_RefRPK
                                                'function innerFuncGetNewID()'.
                                                    '{'.
                                                    'varReturn = parseInt(JSON.parse('.str_replace('"', '\'', \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                                                        $varUserSession, 
                                                        $varAPIWebToken, 
                                                        'fileHandling.upload.stagingArea.general.getNewID', 
                                                        'latest', 
                                                        '{'.
                                                            '"applicationKey" : "'.$varAPIWebToken.'"'.
                                                        '}'
                                                        )).').data.recordRPK); '.
                                                    'return varReturn;'.
                                                    '}'.

                                                //---> Mendapatkan RotateLog_FileUploadStagingArea_RefRPK
                                                'if(JSFunc_MainData_GetData_FileUploadStagingAreaRefRPK_'.$varUniqueID.'() == null) {'.
                                                    'JSFunc_MainData_SetData_FileUploadStagingAreaRefRPK_'.$varUniqueID.'('.
                                                        'innerFuncGetNewID()'.
                                                        '); '.
                                                    '}'.

                                                'JSFunc_MainData_InitData_'.$varUniqueID.'('.
                                                    'varReturnDOMObject.value, '.
                                                    'JSFunc_MainData_GetData_FileUploadStagingAreaRefRPK_'.$varUniqueID.'(), '.
                                                    'JSFunc_MainData_GetData_DeleteCandidateFileUploadObjectDetailRefArrayID_'.$varUniqueID.'()'.
                                                    '); '.

                                                'var'.$varUniqueID.'_ObjJSONMasterFileRecord = JSFunc_MainData_GetData_MasterFileRecord_'.$varUniqueID.'(); '.
                                                'varPreviousListFileCount = ((var'.$varUniqueID.'_ObjJSONMasterFileRecord == undefined) ? 0 : Object.keys(var'.$varUniqueID.'_ObjJSONMasterFileRecord).length); '.
                                                //'alert(varPreviousListFileCount); '.

                                                //---> Mendapatkan Last sequence
                                                'varLastSequence = innerFuncGetLastSequence(JSFunc_MainData_GetData_FileUploadStagingAreaRefRPK_'.$varUniqueID.'());'.
                                                //'alert(varLastSequence); '.

                                                'var var'.$varUniqueID.'_ObjJSONMasterFileRecord = JSFunc_MainData_GetData_MasterFileRecord_'.$varUniqueID.'(); '.
                                                'for(var i = 0; i < varObjFileList.length; i++) '.
                                                    '{'.
                                                    '(function(varObjCurrentFile, i) {'.
                                                        'var varObjFileReader = new FileReader(); '.
                                                        'varObjFileReader.onloadend = function(event) {'.
                                                            'varAccumulatedFiles++; '.
                                                            'if(varAccumulatedFiles != 1) {'.
                                                                'varJSONDataBuilder = varJSONDataBuilder + \', \'; '.
                                                                '}'.
                                                            //'alert(JSON.stringify(varObjCurrentFile.size));'.
                                                            'var varJSONDataBuilderNew = \'{\' + '.
                                                                'String.fromCharCode(34) + \'log_FileUpload_Pointer_RefID\' + String.fromCharCode(34) + \' : \' + (varReturnDOMObject.getAttribute(\'value\') == \'\' ? \'null\' : parseInt(varReturnDOMObject.getAttribute(\'value\'))) + \', \' + '.
                                                                'String.fromCharCode(34) + \'rotateLog_FileUploadStagingArea_RefRPK\' + String.fromCharCode(34) + \' : \' + (JSFunc_MainData_GetData_FileUploadStagingAreaRefRPK_'.$varUniqueID.'()) + \', \' + '.
                                                                'String.fromCharCode(34) + \'sequence\' + String.fromCharCode(34) + \' : \' + (i+1+varLastSequence) + \', \' + '.
                                                                'String.fromCharCode(34) + \'name\' + String.fromCharCode(34) + \' : \' + String.fromCharCode(34) + (varObjCurrentFile.name) + String.fromCharCode(34) + \', \' + '.
                                                                'String.fromCharCode(34) + \'size\' + String.fromCharCode(34) + \' : \' + (varObjCurrentFile.size) + \', \' + '.
                                                                'String.fromCharCode(34) + \'MIME\' + String.fromCharCode(34) + \' : \' + String.fromCharCode(34) + ((event.target.result.split(\',\')[0]).match(/[^:\s*]\w+\/[\w-+\d.]+(?=[;| ])/)[0]) + String.fromCharCode(34) + \', \' + '.
                                                                'String.fromCharCode(34) + \'extension\' + String.fromCharCode(34) + \' : \' + String.fromCharCode(34) + (varObjCurrentFile.name.split(\'.\').pop().toLowerCase()) + String.fromCharCode(34) + \', \' + '.
                                                                'String.fromCharCode(34) + \'lastModifiedDateTimeTZ\' + String.fromCharCode(34) + \' : \' + String.fromCharCode(34) + (varObjCurrentFile.lastModifiedDate) + String.fromCharCode(34) + \', \' + '.
                                                                'String.fromCharCode(34) + \'lastModifiedUnixTimestamp\' + String.fromCharCode(34) + \' : \' + (varObjCurrentFile.lastModified) + \', \' + '.
                                                                'String.fromCharCode(34) + \'contentBase64\' + String.fromCharCode(34) + \' : \' + String.fromCharCode(34) + (event.target.result.substr(event.target.result.indexOf(\',\') + 1)) + String.fromCharCode(34) + \'\' + '.
                                                                '\'}\'; '.
                                                            //'alert(varJSONDataBuilderNew); '.
                                                            'var var'.$varUniqueID.'_ObjDOMInputTemp = document.createElement(\'INPUT\'); '.
                                                            'var'.$varUniqueID.'_ObjDOMInputTemp.setAttribute(\'type\', \'text\'); '.
                                                            'var'.$varUniqueID.'_ObjDOMInputTemp.setAttribute(\'value\', varJSONDataBuilderNew);'.
                                                            'varJSONDataBuilder = varJSONDataBuilder + varJSONDataBuilderNew; '.

                                                            'var varNothing = '.str_replace('"', '\'', \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                                                                $varUserSession, 
                                                                $varAPIWebToken, 
                                                                'fileHandling.upload.stagingArea.localStorage.setFileThenCopyToCloudStorage', 
                                                                'latest', 
                                                                '{'.
                                                                    '"parameter" : JSON.parse(var'.$varUniqueID.'_ObjDOMInputTemp.getAttribute(\'value\'))'.
                                                                '}'
                                                                )).';'.
                                                            //'alert(varNothing); '.

                                                            //---> Jika semua file sudah terupload pada Staging Area
                                                            'if(varAccumulatedFiles == varObjFileList.length) '.
                                                                '{'.
                                                                'var varNothing = '.str_replace('"', '\'', \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                                                                    $varUserSession, 
                                                                    $varAPIWebToken, 
                                                                    'fileHandling.upload.stagingArea.localStorage.deleteDirectory', 
                                                                    'latest', 
                                                                    '{'.
                                                                        '"parameter" : {'.
                                                                            '"rotateLog_FileUploadStagingArea_RefRPK" : + JSFunc_MainData_GetData_FileUploadStagingAreaRefRPK_'.$varUniqueID.'()'.
                                                                            '}'.
                                                                    '}'
                                                                    )).';'.
                                                                //'alert(varNothing); '.
                                                                // 'var'.$varUniqueID.'_ObjJSONMasterFileRecord = null;'.
                                                                // 'if(document.getElementById(\''.$varDOMReturnIDAction.'\').value != \'\' || document.getElementById(\''.$varDOMReturnID.'\').value != \'\') {'.
                                                                //     'var'.$varUniqueID.'_ObjJSONMasterFileRecord = JSFunc_MainData_GetDataFromDatabase_MasterFileRecord_'.$varUniqueID.'();'.
                                                                // '}'.


                                                                // 'console.log(var'.$varUniqueID.'_ObjJSONMasterFileRecord); '.
                                                                

                                                                // 'alert(var'.$varUniqueID.'_ObjJSONMasterFileRecord); '.

                                                                // 'if((parseInt(varPreviousListFileCount) + parseInt(varObjFileList.length)) == (parseInt(Object.keys(var'.$varUniqueID.'_ObjJSONMasterFileRecord).length)))'.
                                                                //     '{'.
                                                                //     'alert(\'All new file(s) uploaded successfully\'); '.
                                                                //     '}'.
                                                                // 'else'.
                                                                //     '{'.
                                                                //     'varFailedUploadFiles = (parseInt(varPreviousListFileCount) + parseInt(varObjFileList.length)) - (parseInt(Object.keys(var'.$varUniqueID.'_ObjJSONMasterFileRecord).length)); '.
                                                                //     'alert(varFailedUploadFiles + \' new file(s) failed to upload\'); '.
                                                                //     '}'.

                                //                                'if(varFailedUploadFiles == parseInt(varObjFileList.length)) {'.
                                //                                    '}'.

                                                                //'alert(\'Previous List File Count : \'+ varPreviousListFileCount + \', TryUploadList : \' + varObjFileList.length + \', MFR : \' + Object.keys(var'.$varUniqueID.'_ObjJSONMasterFileRecord).length); '.


                                                                'varReturn = JSFunc_MainData_GetData_FileUploadStagingAreaRefRPK_'.$varUniqueID.'(); '.

                                                                'JSFunc_ObjDOMTable_ActionPanel_Show_'.$varUniqueID.'(); '.

                                                                //---> Aktifasi kembali Element
                                                                'varObj.disabled = false; '.
                                                                'varReturnDOMObject.disabled = false; '.
                                                                'JSFunc_UnlockObject_'.$varUniqueID.'(); '.
                                                                'varNothing = '.self::getSyntaxCreateDOM_DivCustom_ModalBox_ProcessLoad($varUserSession, $varUniqueID, 'document.body', false).
                                                                '}'.
                                                            '}; '.
                                                        'varObjFileReader.readAsDataURL(varObjCurrentFile); '.
                                                        '}) (varObjFileList[i], i); '.
                                                    '} '.
                                                'setTimeout('.
                                                    '(function() {'.
                                                        'try {'.
                                                            'if(varReturn!=\'\') {'.
                                                                'if(varReturn == \'[object Object]\') {'.
                                                                    'varObj.value=null; '.
                                                                    'varReturnDOMObject.value = (varReturnDOMObject.value.split(varStagingTag))[0]; '.
                                                                    'alert(\'An internal error has occurred. Please to select file(s) again\'); '.
                                                                    '}'.
                                                                'else {'.
                                                                    //'varReturnDOMObject.value = (varReturnDOMObject.value.split(varStagingTag))[0] + varStagingTag + varReturn; '.
                                                                    'varReturnDOMObject.value = varReturnDOMObject.value; '.
                                                                    '}'.
                                                                //'varReturnDOMObject.value = varReturn; '.
                                                                'return varReturn;'.
                                                                '}'.
                                                            'else {'.
                                                                //'varReturnDOMObject.value = \'\'; '.
                                                                '}'.
                                                            '}'.
                                                        'catch(varError) {'.
                                                            'alert(\'ERP Reborn Error Notification\n\nInvalid Object\n(\' + varError + \')\'); '.
                                                            '}'.
                                                        '}'.
                                                    '), 1);'.
                                                '}'.
                                            'catch(varError) {'.
                                                'alert(\'ERP Reborn Error Notification\n\nInvalid Process\n(\' + varError + \')\'); '.
                                                '}'.
                                            '}'.
                                        '}'.
                                    'else {'.
                                        'alert(\'ERP Reborn Error Notification\n\nInvalid DOM Objects\'); '.
                                        '}'.
                                    '}) (this, document.getElementById(\''.$varDOMReturnID.'\'))'.

                                //---> Main Function ( End )
                                //'alert(\'ocrehhhhh\'); '.
                                '}'.
                            '} '.
                        'catch(varError) {'.
                            '}';
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
        | ▪ Method Name     : getSyntaxFunc_MD5                                                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-12-24                                                                                           |
        | ▪ Creation Date   : 2020-12-24                                                                                           |
        | ▪ Description     : Mengambil Fungsi Sintaks MD5                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession                                                                                           |
        |      ▪ (string) varJSONObjectName                                                                                        |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getSyntaxFunc_MD5($varUserSession, string $varJSONObjectName)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, false, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Set Syntax Function Client Current Date Time UTC');
                try {
                    $varReturn = 
                        'function() {'.
                            'return btoa(CryptoJS.MD5(JSON.stringify('.$varJSONObjectName.')));'.
                            '}()';
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
        | ▪ Method Name     : getSyntaxFunc_MaxZIndex                                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-08-22                                                                                           |
        | ▪ Creation Date   : 2022-08-22                                                                                           |
        | ▪ Description     : Mendapatkan Z Index Tertinggi dari Body HTML                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession                                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getSyntaxFunc_MaxZIndex($varUserSession)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, false, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Set Syntax Function Client Current Date Time UTC');
                try {
                    $varReturn = 
                        'function() {'.
                            'var varMaxZIndex = 0; '.
                            'const varAllObjElement = Array.from(document.querySelectorAll(\'body *\')); '.
                            'varAllObjElement.map((ObjCurrentElement, varIndex) => {'.
                                'varCurrentZIndex = (ObjCurrentElement.style.zIndex == \'\' ? 0 : ObjCurrentElement.style.zIndex); '.
                                //'alert(varCurrentZIndex);'.   
                                'if (varCurrentZIndex > varMaxZIndex) {'.
                                    'varMaxZIndex = varCurrentZIndex; '.
                                    '}'.
                                '});'.
                            //'alert(varMaxZIndex);'.
                            'return varMaxZIndex; '.
                            '}()';
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
        | ▪ Method Name     : getSyntaxFunc_PageHeight                                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-08-23                                                                                           |
        | ▪ Creation Date   : 2022-08-23                                                                                           |
        | ▪ Description     : Menndapatkan Tinggi Halaman                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession                                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getSyntaxFunc_PageHeight($varUserSession)
            {
            $varReturn = 
                'function() {'.
                    'varPageHeight = 0; '.
                    'if(varPageHeight < window.pageYOffset) {'.
                        'varPageHeight = window.pageYOffset; '.
                        '}'.
                    'if(varPageHeight < window.innerHeight) {'.
                        'varPageHeight = window.innerHeight; '.
                        '}'.
                    'if(varPageHeight < document.body.clientHeight) {'.
                        'varPageHeight = document.body.clientHeight; '.
                        '}'.
                    'if(varPageHeight < document.body.offsetHeight) {'.
                        'varPageHeight = document.body.offsetHeight; '.
                        '}'.
                    'return varPageHeight + \'px\'; '.
                    '}(); ';
            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getSyntaxFunc_PageWidth                                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-08-23                                                                                           |
        | ▪ Creation Date   : 2022-08-23                                                                                           |
        | ▪ Description     : Menndapatkan Lebar Halaman                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession                                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getSyntaxFunc_PageWidth($varUserSession)
            {
            $varReturn = 
                'function() {'.
                    'varPageWidth = 0; '.
                    'if(varPageWidth < window.pageXOffset) {'.
                        'varPageWidth = window.pageXOffset; '.
                        '}'.
                    'if(varPageWidth < window.innerWidth) {'.
                        'varPageWidth = window.innerWidth; '.
                        '}'.
                    'if(varPageWidth < document.body.clientWidth) {'.
                        'varPageWidth = document.body.clientWidth; '.
                        '}'.
                    'if(varPageWidth < document.body.offsetWidth) {'.
                        'varPageWidth = document.body.offsetWidth; '.
                        '}'.
                    'return varPageWidth + \'px\'; '.
                    '}(); ';
            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getSyntaxFunc_UniqueID                                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-12-24                                                                                           |
        | ▪ Creation Date   : 2020-12-24                                                                                           |
        | ▪ Description     : Mengambil Fungsi Sintaks Unique ID                                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession                                                                                           |
        |      ▪ (string) varAPIWebToken                                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getSyntaxFunc_UniqueID($varUserSession, $varAPIWebToken)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, false, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Set Syntax Function Back End Unique ID');
                try {
                    $varReturn = 
                        'function() {'.
                            'var varAJAXUniqIDReturn = null; '.
                            '$.ajax({'.
                                //'url: "ajax.aspx?ajaxid=4&UserID=" + UserID + "&EmailAddress=" + encodeURIComponent(EmailAddress),'.
                                'url: "'.\App\Helpers\ZhtHelper\System\Helper_Environment::getFrontEndConfigEnvironment($varUserSession, 'URL_BACKEND_API_UNIQUE_ID').'", '.
                                'async : false, '.
                                'type : "POST", '.
                                'headers: {"Authorization":"Bearer '.$varAPIWebToken.'"}, '.
                                'success: function(varDataResponse) {'.
                                    'varAJAXUniqIDReturn = JSON.stringify(varDataResponse)'.
                                    '},'.
                                'error: function(varDataResponse, varTextStatus) {'.
                                    //'varAJAXUniqIDReturn = JSON.stringify(varDataResponse)'.
                                    '}'.
                                '});'.
                            //'alert(varAJAXUniqIDReturn); '.
                            'return varAJAXUniqIDReturn; '.
                            '}()';
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
            
            
            
        public static function getSyntaxFunc_UniqIDOLD($varUserSession, string $varJSONObjectName)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, false, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Set Syntax Function Client Current Date Time UTC');
                try {
                    $varReturn = 
                        'function() {'.
                            
                            
                            
                            
                            'return btoa(CryptoJS.MD5(JSON.stringify('.$varJSONObjectName.')));'.
                            '}()';
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
*/

        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setLibrary                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2023-03-30                                                                                           |
        | ▪ Creation Date   : 2020-12-31                                                                                           |
        | ▪ Description     : Mengeset Library JQuery                                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession                                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function setLibrary($varUserSession, $varParameter = null)
            {
            $varJSParameter = 'false';
            if ($varParameter == null) {
                $varJSParameter = 'true';
                }
                
            $varReturn = 
                '<script src = "js/zht-js/core.js" type="text/javascript"></script>'.
                '<script>new zht_JSCore('.$varJSParameter.');</script>'.
                '';
            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setEscapeForEscapeSequenceOnSyntaxLiteral                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-08-12                                                                                           |
        | ▪ Creation Date   : 2022-08-12                                                                                           |
        | ▪ Description     : Mengeset Escape Sequence untuk Escape Sequence yang ada pada Syntax Literal                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession                                                                                           |
        |      ▪ (string) varData                                                                                                  |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function setEscapeForEscapeSequenceOnSyntaxLiteral($varUserSession, $varData)
            {
            $varReturn = $varData;
                        
            $varReturn = implode('\\\\', explode('\\', $varReturn));
            $varReturn = implode('\\\n', explode('\n', $varReturn));
            $varReturn = implode("\\'", (explode("'", $varReturn)));
            $varReturn = implode("\\'", (explode("@@@", $varReturn)));


            
            
            //$varReturn = implode('\\\'', (explode('\'', $varReturn)));
            //$varReturn = implode('\\\'', (explode($varCustomPattern, $varReturn)));
            //
            //$varReturn = implode("\\\'", (explode("\'", $varReturn)));
            //
            //$varReturn = implode('\\\'', (explode('\\\'', $varReturn)));
            return $varReturn;
            }


        public static function setEscapeForEscapeSequenceOnSyntaxLiteralTaggingPreparation($varUserSession, $varData)
            {
            $varReturn = $varData;
            //$varReturn = implode('@@@', (explode("\'", $varReturn)));
            //$varReturn = str_replace('@@@', "\'", $varReturn);
            //$varReturn = implode("@@@", (explode("'", $varReturn)));
            //$varReturn = str_replace("@@@", "\\", $varReturn);

            $varReturn = implode("@@@", (explode("\"", $varReturn)));
            return $varReturn;
            }

        }
    }