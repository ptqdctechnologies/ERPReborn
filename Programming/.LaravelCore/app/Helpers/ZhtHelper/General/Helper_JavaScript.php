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
        | ▪ Method Name     : getSyntaxCreateDOM_Div                                                                               |
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
        */
        public static function getSyntaxCreateDOM_DivCustom_ModalBox_FilePreview($varUserSession, $varID)
            {
            $varStyle_TableDataStyle = [
                ['fontFamily', '\\\'Helvetica, Verdana, Arial, Tahoma, Serif\\\''],
                ['fontWeight', 'bold'],
                ['color', '#ffffff'],
                ['fontSize', '12px'],
                ['textShadow', '2px 2px 5px #000000']
                ];
            $varReturn = 
                'varObjTemp = '.
                    'function (varName, varSize, varMIME, varUploadDateTimeTZ) {'.
                        //'alert(varName); '.
                        'varMaxZIndex = (parseInt('.self::getSyntaxFunc_MaxZIndex($varUserSession).') + 1); '.
                        self::getSyntaxCreateDOM_Div(
                            $varUserSession, 
                            [
                                'ID' => $varID.'_Back',
                                'ParentID' => 'document.body',
                                'Style' => [
                                    ['position', 'absolute'],
                                    ['top', '0px'],
                                    ['left', '0px'],
                                    ['height', '100%'],
                                    ['width', '100%'],
                                    ['background', 'rgba(255, 0, 0, 0.3)']
                                   ]
                            ], 
                            ''
                            ).
                        'document.getElementById(\''.$varID.'_Back'.'\').style.zIndex = (varMaxZIndex+0); '.
                        'document.getElementById(\''.$varID.'_Back'.'\').style.height = '.self::getSyntaxFunc_PageHeight($varUserSession).'; '.
                        'document.getElementById(\''.$varID.'_Back'.'\').style.width = '.self::getSyntaxFunc_PageWidth($varUserSession).'; '.

                        //---> Dialog
                        self::getSyntaxCreateDOM_Div(
                            $varUserSession, 
                            [
                                'ID' => $varID.'_Dialog',
                                'ParentID' =>  $varID.'_Back',
                                'Style' => [
                                    ['position', 'absolute'],
                                    ['top', '50%'],
                                    ['left', '50%'],
                                    ['height', '470px'],
                                    ['width', '835px'],
//                                    ['width', '410px'],
//                                    ['background', 'rgba(88, 88, 88, 1.0)']
                                    ]
                            ], 
                            ''
                            ).
                        'document.getElementById(\''.$varID.'_Dialog'.'\').style.zIndex = (varMaxZIndex+1); '.
                        'document.getElementById(\''.$varID.'_Dialog'.'\').style.transform = \'translate(-50%, -50%)\';'.
//                        'document.getElementById(\''.$varID.'_Dialog'.'\').style.border = \'2px solid #555500\'; '.
//                        'document.getElementById(\''.$varID.'_Dialog'.'\').style.border = \'2px solid #ffff00\'; '.
//                        'document.getElementById(\''.$varID.'_Dialog'.'\').style.boxShadow=\'10px 20px 30px #333333\'; '.

                        //---> Dialog ---> DialogPreviewPlcHod
                        self::getSyntaxCreateDOM_Div(
                            $varUserSession, 
                            [
                                'ID' => $varID.'_DialogPreviewPlcHod',
                                'ParentID' =>  $varID.'_Dialog',
                                'Style' => [
                                    ['position', 'absolute'],
                                    ['top', '0'],
                                    ['left', '0'],
                                    ['height', '470px'],
                                    ['width', '410px'],
                                    ['background', 'rgba(88, 88, 88, 1.0)']
                                    ]
                            ], 
                            ''
                            ).
                        'document.getElementById(\''.$varID.'_DialogPreviewPlcHod'.'\').style.zIndex = (varMaxZIndex+2); '.
//                        'document.getElementById(\''.$varID.'_DialogPreviewPlcHod'.'\').style.transform = \'translate(-50%, -50%)\';'.
                        'document.getElementById(\''.$varID.'_DialogPreviewPlcHod'.'\').style.border = \'2px solid #ffff00\'; '.
                        'document.getElementById(\''.$varID.'_DialogPreviewPlcHod'.'\').style.boxShadow=\'10px 20px 30px #333333\'; '.

                        //---> Dialog ---> DialogIdentityPlcHod
                        self::getSyntaxCreateDOM_Div(
                            $varUserSession, 
                            [
                                'ID' => $varID.'_DialogIdentityPlcHod',
                                'ParentID' =>  $varID.'_Dialog',
                                'Style' => [
                                    ['position', 'absolute'],
                                    ['top', '30'],
                                    ['left', '420px'],
                                    ['height', '200px'],
                                    ['width', '410px'],
                                    ['background', 'rgba(88, 88, 88, 1.0)']
                                    ]
                            ], 
                            ''
                            ).
                        'document.getElementById(\''.$varID.'_DialogIdentityPlcHod'.'\').style.zIndex = (varMaxZIndex+2); '.
                        'document.getElementById(\''.$varID.'_DialogIdentityPlcHod'.'\').style.border = \'2px solid #ffff00\'; '.
                        'document.getElementById(\''.$varID.'_DialogIdentityPlcHod'.'\').style.boxShadow=\'10px 20px 30px #333333\'; '.

                        self::getSyntaxCreateDOM_Table(
                            $varUserSession, 
                            [
                            'ID' => $varID.'_DialogIdentityTable',
                            'ParentID' => $varID.'_DialogIdentityPlcHod'   //,
//                            'Style' => $varStyle_TableAction
                            ],
                            self::getSyntaxCreateDOM_TableHead($varUserSession, 
                                [
                                    'ID' => $varID.'_DialogIdentityTableHead',
                                    'ParentID' => $varID.'_DialogIdentityTable'
                                ],
                                ''
                                ).
                            self::getSyntaxCreateDOM_TableBody($varUserSession, 
                                [
                                    'ID' => $varID.'_DialogIdentityTableBody',
                                    'ParentID' => $varID.'_DialogIdentityTable'
                                ],
                                (
                                //---> File Name
                                self::getSyntaxCreateDOM_TableRow(
                                    $varUserSession, 
                                    [
                                    'ID' => 'varObjTTR',
                                    'ParentID' => $varID.'_DialogIdentityTableBody'
                                    ],
                                    (
                                    self::getSyntaxCreateDOM_TableData(
                                        $varUserSession, 
                                        [
                                        'ID' => 'varObjTTD',
                                        'ParentID' => 'varObjTTR',
                                        'Style' => $varStyle_TableDataStyle,
                                        ],
                                        'varObjTTD.appendChild(document.createTextNode(\'File Name\')); '
                                        ).
                                    self::getSyntaxCreateDOM_TableData(
                                        $varUserSession, 
                                        [
                                        'ID' => 'varObjTTD',
                                        'ParentID' => 'varObjTTR',
                                        'Style' => $varStyle_TableDataStyle,
                                        ],
                                        'varObjTTD.appendChild(document.createTextNode(\':\')); '
                                        ).
                                    self::getSyntaxCreateDOM_TableData(
                                        $varUserSession, 
                                        [
                                        'ID' => 'varObjTTD',
                                        'ParentID' => 'varObjTTR',
                                        'Style' => $varStyle_TableDataStyle,
                                        ],
                                        'varObjTTD.appendChild(document.createTextNode(varName)); '
                                        )
                                    )).
                                //---> File Type
                                self::getSyntaxCreateDOM_TableRow(
                                    $varUserSession, 
                                    [
                                    'ID' => 'varObjTTR',
                                    'ParentID' => $varID.'_DialogIdentityTableBody'
                                    ],
                                    (
                                    self::getSyntaxCreateDOM_TableData(
                                        $varUserSession, 
                                        [
                                        'ID' => 'varObjTTD',
                                        'ParentID' => 'varObjTTR',
                                        'Style' => $varStyle_TableDataStyle,
                                        ],
                                        'varObjTTD.appendChild(document.createTextNode(\'File Type\')); '
                                        ).
                                    self::getSyntaxCreateDOM_TableData(
                                        $varUserSession, 
                                        [
                                        'ID' => 'varObjTTD',
                                        'ParentID' => 'varObjTTR',
                                        'Style' => $varStyle_TableDataStyle,
                                        ],
                                        'varObjTTD.appendChild(document.createTextNode(\':\')); '
                                        ).
                                    self::getSyntaxCreateDOM_TableData(
                                        $varUserSession, 
                                        [
                                        'ID' => 'varObjTTD',
                                        'ParentID' => 'varObjTTR',
                                        'Style' => $varStyle_TableDataStyle,
                                        ],
                                        'varObjTTD.appendChild(document.createTextNode(varMIME)); '
                                        )
                                    )).
                                //---> File Size
                                self::getSyntaxCreateDOM_TableRow(
                                    $varUserSession, 
                                    [
                                    'ID' => 'varObjTTR',
                                    'ParentID' => $varID.'_DialogIdentityTableBody'
                                    ],
                                    (
                                    self::getSyntaxCreateDOM_TableData(
                                        $varUserSession, 
                                        [
                                        'ID' => 'varObjTTD',
                                        'ParentID' => 'varObjTTR',
                                        'Style' => $varStyle_TableDataStyle,
                                        ],
                                        'varObjTTD.appendChild(document.createTextNode(\'File Size\')); '
                                        ).
                                    self::getSyntaxCreateDOM_TableData(
                                        $varUserSession, 
                                        [
                                        'ID' => 'varObjTTD',
                                        'ParentID' => 'varObjTTR',
                                        'Style' => $varStyle_TableDataStyle,
                                        ],
                                        'varObjTTD.appendChild(document.createTextNode(\':\')); '
                                        ).
                                    self::getSyntaxCreateDOM_TableData(
                                        $varUserSession, 
                                        [
                                        'ID' => 'varObjTTD',
                                        'ParentID' => 'varObjTTR',
                                        'Style' => $varStyle_TableDataStyle,
                                        ],
                                        'varObjTTD.appendChild(document.createTextNode(varSize + \' byte\')); '
                                        )
                                    )).
                                //---> File Size
                                self::getSyntaxCreateDOM_TableRow(
                                    $varUserSession, 
                                    [
                                    'ID' => 'varObjTTR',
                                    'ParentID' => $varID.'_DialogIdentityTableBody'
                                    ],
                                    (
                                    self::getSyntaxCreateDOM_TableData(
                                        $varUserSession, 
                                        [
                                        'ID' => 'varObjTTD',
                                        'ParentID' => 'varObjTTR',
                                        'Style' => $varStyle_TableDataStyle,
                                        ],
                                        'varObjTTD.appendChild(document.createTextNode(\'Upload Date Time\')); '
                                        ).
                                    self::getSyntaxCreateDOM_TableData(
                                        $varUserSession, 
                                        [
                                        'ID' => 'varObjTTD',
                                        'ParentID' => 'varObjTTR',
                                        'Style' => $varStyle_TableDataStyle,
                                        ],
                                        'varObjTTD.appendChild(document.createTextNode(\':\')); '
                                        ).
                                    self::getSyntaxCreateDOM_TableData(
                                        $varUserSession, 
                                        [
                                        'ID' => 'varObjTTD',
                                        'ParentID' => 'varObjTTR',
                                        'Style' => $varStyle_TableDataStyle,
                                        ],
                                        'varObjTTD.appendChild(document.createTextNode(varUploadDateTimeTZ)); '
                                        )
                                    ))
                                )
                                )
                            ).




                        //---> Dialog ---> DialogPreviewPlcHod ---> DialogTitlePlcHold
                        self::getSyntaxCreateDOM_Div(
                            $varUserSession, 
                            [
                                'ID' => $varID.'_DialogTitlePlcHold',
                                'ParentID' =>  $varID.'_DialogPreviewPlcHod',
                                'Style' => [
                                    ['position', 'absolute'],
                                    ['top', '0px'],
                                    ['left', '0px'],
                                    ['height', '30px'],
                                    ['lineHeight', '30px'],
                                    ['width', '100%'],
                                    ['background', '#ffffff'],
                                    ['backgroundImage', 'linear-gradient(#000108, #181d57 10%, #000108)'],
                                    ['fontFamily', '\\\'Helvetica, Verdana, Arial, Tahoma, Serif\\\''],
                                    ['fontWeight', 'bold'],
                                    ['color', '#ffffff'],
                                    ['textShadow', '2px 2px 5px #000000']
                                    ]
                            ], 
                            'FILE PREVIEW'
                            ).
                        'document.getElementById(\''.$varID.'_DialogTitlePlcHold'.'\').style.zIndex = (varMaxZIndex+3); '.
                        'document.getElementById(\''.$varID.'_DialogTitlePlcHold'.'\').setAttribute(\'display\', \'table-cell\'); '.
                        'document.getElementById(\''.$varID.'_DialogTitlePlcHold'.'\').setAttribute(\'align\', \'center\'); '.
                        'document.getElementById(\''.$varID.'_DialogTitlePlcHold'.'\').setAttribute(\'vertical-align\', \'middle\'); '.

                        //---> Dialog ---> DialogPreviewPlcHod ---> DialogContentPlcHold
                        self::getSyntaxCreateDOM_Div(
                            $varUserSession, 
                            [
                                'ID' => $varID.'_DialogContentPlcHold',
                                'ParentID' =>  $varID.'_DialogPreviewPlcHod',
                                'Style' => [
                                    ['position', 'absolute'],
                                    ['top', '35px'],
                                    ['left', '5px'],
                                    ['height', '400px'],
                                    ['width', '400px'],
                                    ['background', 'blue']
//                                    ['background', 'rgba(bb, bb, 00, 1.0)']
                                    ]
                            ], 
                            ''
                            ).
                        'document.getElementById(\''.$varID.'_DialogContentPlcHold'.'\').style.zIndex = (varMaxZIndex+4); '.

                        //---> Dialog ---> DialogPreviewPlcHod ---> DialogContentPlcHold ---> DialogContentDefaultImage
                        self::getSyntaxCreateDOM_Image(
                            $varUserSession, 
                            [
                                'ID' => $varID.'_DialogContentDefaultImage',
                                'ParentID' =>  $varID.'_DialogContentPlcHold',
                                'Height' => 400
                            ], 
                            'images/Logo/AppObject_System/NoPreviewAvailable.jpg'
                            ).
                        'document.getElementById(\''.$varID.'_DialogContentDefaultImage'.'\').style.zIndex = (varMaxZIndex+5); '.

                        //---> Dialog ---> DialogPreviewPlcHod ---> DialogButtonPlcHold
                        self::getSyntaxCreateDOM_Div(
                            $varUserSession, 
                            [
                                'ID' => $varID.'_DialogButtonPlcHold',
                                'ParentID' =>  $varID.'_DialogPreviewPlcHod',
                                'Style' => [
                                    ['position', 'absolute'],
                                    ['top', '440px'],
                                    ['left', '0px'],
                                    ['height', '30px'],
                                    ['inlineHeight', '30px'],
                                    ['width', '100%'],
                                    ['backgroundImage', 'linear-gradient(#000108, #181d57 10%, #000108)'],
                                    ]
                            ], 
                            ''
                            ).
                        'document.getElementById(\''.$varID.'_DialogButtonPlcHold'.'\').style.zIndex = (varMaxZIndex+4); '.
//                        'document.getElementById(\''.$varID.'_DialogButtonPlcHold'.'\').setAttribute(\'display\', \'table-cell\'); '.
                        'document.getElementById(\''.$varID.'_DialogButtonPlcHold'.'\').setAttribute(\'align\', \'center\'); '.
//                        'document.getElementById(\''.$varID.'_DialogButtonPlcHold'.'\').setAttribute(\'vertical-align\', \'middle\'); '.
                    
                        //---> Dialog ---> DialogPreviewPlcHod ---> DialogButtonPlcHold ---> DialogCloseButton
                        self::getSyntaxCreateDOM_Button(
                            $varUserSession, 
                            [
                                'ID' => $varID.'_DialogCloseButton',
                                'ParentID' => $varID.'_DialogButtonPlcHold',
                                'Style' => [
                                    ['position', 'relative'],
                                    ['top', '50%'],
                                    ]
                            ], 
                            'Close',
                            'function() {'.
                                'document.getElementById(\''.$varID.'_Back'.'\').parentNode.removeChild(document.getElementById(\''.$varID.'_Back'.'\'));'.
//                                'alert(\'xxxxxxxxxxxxx\');'.
                                '}'
                            ).
                        'document.getElementById(\''.$varID.'_DialogCloseButton'.'\').style.transform = \'translateY(-50%)\'; '.


                    
                        '} (varName, varSize, varMIME, varUploadDateTimeTZ); '.
                        '';
            return $varReturn;
            }


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
                    $varObjectID.'.src = \''.$varFilePath.'\'; '
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


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getSyntaxFunc_DOMInputFileContent                                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000003                                                                                       |
        | ▪ Last Update     : 2022-08-05                                                                                           |
        | ▪ Creation Date   : 2021-07-28                                                                                           |
        | ▪ Description     : Mengambil Fungsi DOM Input File Content                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession (Mandatory) ► User Session                                                                |
        |      ▪ (string) varAPIWebToken (Mandatory) ► API Web Token                                                               |
        |      ▪ (string) varUniqueID (Mandatory) ► Penanda Unik untuk DOM (Tidak boleh terduplikasi)                              |
        |      ▪ (string) varDOMReturnID (Mandatory) ► DOMReturnID                                                                 |
        |      ▪ (string) varDOMAction (Mandatory) ► DOMAction                                                                     |
        |      ▪ (string) varAction (Optional) ► Action                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getSyntaxFunc_DOMInputFileContent(
            $varUserSession, string $varAPIWebToken, 
            string $varUniqueID, string $varDOMReturnID, string $varDOMActionPanel, string $varDOMAction, string $varAction = null)
            {
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
                            ['border', '1px solid black']
                        ];

                    $varStyle_TableActionPanelHead =
                        [
                            ['backgroundColor', '#292630'],
                            ['color', '#FFFFFF'],
                            ['fontFamily', '\\\'verdana\\\''],
                            ['whiteSpace', 'nowrap'],
                            ['fontSize', '10px'],
                            ['textAlign', 'center']
                        ];
                    
                    $varStyle_TableActionPanelBody =
                        [
                            ['backgroundColor', '#FADBB4'],
                            ['color', '#000000'],
                            ['fontFamily', '\\\'verdana\\\''],
                            ['whiteSpace', 'nowrap'],
                            ['fontSize', '10px'],
                            ['textAlign', 'left']
                        ];
                    
                    $varReturn =
                        'try {'.
                            //---> Pendefinisian varObjDOMInputMasterFileRecord
                            'try {'.
                                'document.getElementById(\'zhtSysObjDOMText_'.$varUniqueID.'_MainData\').value = document.getElementById(\'zhtSysObjDOMText_'.$varUniqueID.'_MainData\').value; '.
                                //'var'.$varUniqueID.'_ObjDOMInputMainData.setAttribute(\'value\', var'.$varUniqueID.'_ObjDOMInputMainData.getAttribute(\'value\')); '.
                                '}'.
                            'catch(varError) {'.
                                self::getSyntaxCreateDOM_InputText(
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
                                'var ObjHead = document.getElementsByTagName(\'head\')[0]; '.
                                'var ObjScript = document.createElement(\'script\'); '.
                                'ObjScript.type = \'text/javascript\'; '.
                                'ObjScript.text = \''.
                                    self::setEscapeForEscapeSequenceOnSyntaxLiteral(
                                        $varUserSession, 
                                        (                           
                                        //---> JSFunc_LockObject_...
                                        'function JSFunc_LockObject_'.$varUniqueID.'() {'.
                                            'document.getElementById(\'zhtSysObjDOMTable_'.$varUniqueID.'_ActionPanel\').disabled = false; '.
                                            'document.getElementById(\'zhtSysObjDOMTable_'.$varUniqueID.'_ActionPanel\').style.visibility = \'hidden\'; '.
                                            //'document.getElementById(\'zhtSysObjDOMTable_'.$varUniqueID.'_ActionPanel\').style.display = \'none\'; '.
                                            '}'.

                                        //---> JSFunc_UnlockObject_...
                                        'function JSFunc_UnlockObject_'.$varUniqueID.'() {'.
                                            'document.getElementById(\'zhtSysObjDOMTable_'.$varUniqueID.'_ActionPanel\').disabled = true; '.
                                            'document.getElementById(\'zhtSysObjDOMTable_'.$varUniqueID.'_ActionPanel\').style.visibility = \'visible\'; '.
                                            //'document.getElementById(\'zhtSysObjDOMTable_'.$varUniqueID.'_ActionPanel\').style.display = \'inline\'; '.
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
                                            'catch(err) {'.
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
                                                'alert(\'Committed File(s) Upload Complete\'); '.
                                                'JSFunc_ObjDOMTable_ActionPanel_Show_'.$varUniqueID.'(); '.
                                                '}'.
                                            'catch(err) {'.
                                                '}'.
                                            '}'.

                                        //---> JSFunc_MainData_InitData_...
                                        'function JSFunc_MainData_InitData_'.$varUniqueID.'(log_FileUpload_Pointer_RefID, rotateLog_FileUploadStagingArea_RefRPK, deleteCandidate_Log_FileUpload_ObjectDetail_RefArrayID) {'.
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
                                                'varDataJSONMasterFileRecord = JSFunc_MainData_GetDataFromDatabase_MasterFileRecord_'.$varUniqueID.'(); '.
                                                'JSFunc_MainData_SetData_MasterFileRecord_'.$varUniqueID.'(varDataJSONMasterFileRecord); '.
                                                '}'.
                                            '}'.

                                        //---> JSFunc_MainData_GetData_...
                                        'function JSFunc_MainData_GetData_'.$varUniqueID.'() {'.
                                            'varReturn = null; '.
                                            'try {'.
                                                'varReturn = JSON.parse(document.getElementById(\'zhtSysObjDOMText_'.$varUniqueID.'_MainData\').value); '.
                                                '}'.
                                            'catch (varError) {'.
                                                '}'.
                                            'return varReturn; '.
                                            '}'.

                                        //---> JSFunc_MainData_SetData_...
                                        'function JSFunc_MainData_SetData_'.$varUniqueID.'(varDataJSON) {'.
                                            'try {'.
                                                'document.getElementById(\'zhtSysObjDOMText_'.$varUniqueID.'_MainData\').value = varDataJSON;'.
                                                '}'.
                                            'catch (varError) {'.
                                                '}'.
                                            '}'.

                                        //---> JSFunc_MainData_GetData_FileUploadPointerRefID_...
                                        'function JSFunc_MainData_GetData_FileUploadPointerRefID_'.$varUniqueID.'() {'.
                                            'varReturn = null; '.
                                            'try {'.
                                                'varData = JSFunc_MainData_GetData_'.$varUniqueID.'(); '.
                                                'varReturn = varData.header.log_FileUpload_Pointer_RefID; '.
                                                '}'.
                                            'catch (varError) {'.
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
                                            'catch (varError) {'.
                                                '}'.
                                            '}'.

                                        //---> JSFunc_MainData_GetData_FileUploadStagingAreaRefRPK_
                                        'function JSFunc_MainData_GetData_FileUploadStagingAreaRefRPK_'.$varUniqueID.'() {'.
                                            'varReturn = null; '.
                                            'try {'.
                                                'varData = JSFunc_MainData_GetData_'.$varUniqueID.'(); '.
                                                'varReturn = varData.header.rotateLog_FileUploadStagingArea_RefRPK; '.
                                                '}'.
                                            'catch (varError) {'.
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
                                            'catch (varError) {'.
                                                '}'.
                                            '}'.

                                        //---> JSFunc_MainData_GetData_SignNeedToCommit_...
                                        'function JSFunc_MainData_GetData_SignNeedToCommit_'.$varUniqueID.'() {'.
                                            'varReturn = null; '.
                                            'try {'.
                                                'varData = JSFunc_MainData_GetData_'.$varUniqueID.'(); '.
                                                'varReturn = varData.header.signNeedToCommit; '.
                                                '}'.
                                            'catch (varError) {'.
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
                                            'catch (varError) {'.
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
                                            'catch (varError) {'.
                                                '}'.
                                            'return varReturn; '.
                                            '}'.

                                        //---> JSFunc_MainData_SetData_DeleteCandidateFileUploadObjectDetailRefArrayID_...
                                        'function JSFunc_MainData_SetData_DeleteCandidateFileUploadObjectDetailRefArrayID_'.$varUniqueID.'(varDataArrayID) {'.
                                            'try {'.
                                                'varDataJSON = JSFunc_MainData_GetData_'.$varUniqueID.'(); '.
                                                'varDataJSONDeleteCandidate = varDataJSON.header.deleteCandidate_Log_FileUpload_ObjectDetail_RefArrayID; '.
                                                'varDataJSONDeleteCandidate.push(varDataArrayID); '.                            
                                                'varDataJSON.header.deleteCandidate_Log_FileUpload_ObjectDetail_RefArrayID = varDataJSONDeleteCandidate; '.
                                                'JSFunc_MainData_SetData_'.$varUniqueID.'(JSON.stringify(varDataJSON)); '.
                                                '}'.
                                            'catch (varError) {'.
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
                                                'varObjDownloadLink.parentNode.removeChild(varObjDownloadLink); '.
                                                '}'.
                                            'catch (varError) {'.
                                                '}'.
                                            '}'.

                                        //---> JSFunc_FilePreview_...
                                        'function JSFunc_FilePreview_'.$varUniqueID.'(varFilePath, varName, varSize, varMIME, varUploadDateTimeTZ) {'.
                                            'try {'.
//                                                'alert(varFilePath);'.
                                                'varReturn = ('.
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
                                                self::getSyntaxCreateDOM_DivCustom_ModalBox_FilePreview(
                                                    $varUserSession,
                                                    'ObjDivModalBox_'.$varUniqueID
                                                    ).
                                                '}'.
                                            'catch (varError) {'.
                                                '}'.
                                            '}'.

                                        //---> JSFunc_MainData_GetData_MasterFileRecord_...
                                        'function JSFunc_MainData_GetData_MasterFileRecord_'.$varUniqueID.'() {'.
                                            'varReturn = null; '.
                                            'try {'.
                                                'varData = JSFunc_MainData_GetData_'.$varUniqueID.'(); '.
                                                'varReturn = varData.data.masterFileRecord; '.
                                                '}'.
                                            'catch (varError) {'.
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
                                            'catch (varError) {'.
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
                                            'catch (varError) {'.
                                                '}'.
                                            'return varReturn; '.
                                            '}'.

                                        //---> JSFunc_ObjDOMTable_ActionPanel_Show_...
                                        'function JSFunc_ObjDOMTable_ActionPanel_Show_'.$varUniqueID.'() {'.                            
                                            //---> Ambil varDataJSONMasterFileRecord dari database
                                            'varDataJSONMasterFileRecord = JSFunc_MainData_GetDataFromDatabase_MasterFileRecord_'.$varUniqueID.'(); '.
//                                            'varDataJSONMasterFileRecord = JSFunc_MainData_GetData_MasterFileRecord_'.$varUniqueID.'(); '.

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
                                                        self::getSyntaxCreateDOM_TableData(
                                                            $varUserSession, 
                                                            [
                                                            'ID' => 'varObjTTD',
                                                            'ParentID' => 'varObjTTR',
                                                            'Style' => $varStyle_TableActionPanelHead,
                                                            ],
                                                            'varObjTTD.appendChild(document.createTextNode(\'SAVE\')); '
                                                            ).
                                                        self::getSyntaxCreateDOM_TableData(
                                                            $varUserSession, 
                                                            [
                                                            'ID' => 'varObjTTD',
                                                            'ParentID' => 'varObjTTR',
                                                            'Style' => $varStyle_TableActionPanelHead,
                                                            ],
                                                            'varObjTTD.appendChild(document.createTextNode(\'PREVIEW\')); '
                                                            ).
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
                                                                'if(i == 0) '.
                                                                    '{'.
                                                                    self::getSyntaxCreateDOM_TableData(
                                                                        $varUserSession, 
                                                                        [
                                                                        'ID' => 'varObjTTD',
                                                                        'ParentID' => 'varObjTTR',
                                                                        'RowSpan' => 'iMax',
                                                                        'Style' => array_merge(
                                                                            $varStyle_TableActionPanelBody,
                                                                            [
                                                                                ['textAlign', 'center']
                                                                            ]
                                                                            ),
                                                                        ],
                                                                        (
                                                                        'if (JSFunc_MainData_GetData_SignNeedToCommit_'.$varUniqueID.'() == true) {'.
                                                                            'var varObjA = document.createElement(\'a\'); '.
                                                                                'varObjA.href = \'javascript:'.
                                                                                    '(function() {'.
                                                                                            'JSFunc_GetActionPanel_Commit_'.$varUniqueID.'(); '.
                                                                                        '})();'.
                                                                                    '\'; '.
                                                                                'varObjA.innerHTML = \'Commit\'; '.
                                                                            'varObjTTD.appendChild(varObjA); '.
                                                                            '}'
                                                                        )
                                                                        ).
                                                                    '}'.
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
                                                                        'var varFileName = varDataJSONMasterFileRecord[i][\'name\']; '.
                                                                        'var varObjA = document.createElement(\'a\'); '.
                                                                            'varObjA.href = \'javascript:'.
                                                                                '(function(varFilePath, varName, varSize, varMIME, varUploadDateTimeTZ) {'.
                                                                                    'JSFunc_FilePreview_'.$varUniqueID.'(varFilePath, varName, varSize, varMIME, varUploadDateTimeTZ); '.
                                                                                    '}) ('.
                                                                                        '\\\'\' + varDataJSONMasterFileRecord[i][\'filePath\'] + \'\\\','.
                                                                                        ' \\\'\' + varFileName.replace(/\'/g, \'\\\\\\\'\') + \'\\\', '.
                                                                                        ' \\\'\' + varDataJSONMasterFileRecord[i][\'size\'] + \'\\\', '.
                                                                                        ' \\\'\' + varDataJSONMasterFileRecord[i][\'MIME\'] + \'\\\', '.
                                                                                        ' \\\'\' + varDataJSONMasterFileRecord[i][\'uploadDateTimeTZ\'] + \'\\\''.
                                                                                        ');'.
                                                                                '\'; '.
                                                                            'varObjA.innerHTML = \'Preview\'; '.
                                                                        'varObjTTD.appendChild(varObjA); '.
                                                                        '}'
                                                                    )
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
                                            '}; '.
                                        'JSFunc_MainData_InitData_'.$varUniqueID.'(document.getElementById(\''.$varDOMReturnID.'\').value, null, []); '.
                                        'JSFunc_ObjDOMTable_ActionPanel_Show_'.$varUniqueID.'(); '.
                                        ''
                                        )
                                        ).
                                    '\'; '.
                                'ObjHead.appendChild(ObjScript); '.
                            
//                                'alert(document.getElementById(\'zhtSysObjDOMText_Upload_MainData\')); '.
                            
//                                'var'.$varUniqueID.'_ObjDOMTable_ActionPanel = document.createElement(\'DIV\'); '.
//                                'var'.$varUniqueID.'_ObjDOMTable_ActionPanel.id = \'zhtSysObjDOMDiv_'.$varUniqueID.'_ActionPanel\';'.
                                '}'.
                            
                            //---> Main Function
                            '(function(varObj, varReturnDOMObject) {'.
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
                            
                                            //---> Pendefinisian Inner Function
                            
/*                                            //---> Inner Function : Mendapatkan Master File Record
                                            'function innerFuncGetMasterFileRecord(varLog_FileUpload_Pointer_RefID, varRotateLog_FileUploadStagingArea_RefRPK, varDeleteCandidate_Log_FileUpload_ObjectDetail_RefArrayID)'.
                                                '{'.
                                                'varReturn = ('.
                                                    'JSON.parse('.str_replace('"', '\'', \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                                                        $varUserSession, 
                                                        $varAPIWebToken, 
                                                        'fileHandling.upload.combined.general.getMasterFileRecord', 
                                                        'latest', 
                                                        '{'.
                                                            '"parameter" : {'.
                                                                '"log_FileUpload_Pointer_RefID" : ((varLog_FileUpload_Pointer_RefID == null) ? null : parseInt(varLog_FileUpload_Pointer_RefID)), '.
                                                                '"rotateLog_FileUploadStagingArea_RefRPK" : varRotateLog_FileUploadStagingArea_RefRPK, '.
                                                                '"deleteCandidate_Log_FileUpload_ObjectDetail_RefArrayID" : []'.
                                                                '}'.
                                                        '}'
                                                        )).').data'.
                                                    '); '.
                                                'return JSON.parse(JSON.stringify(varReturn.data));'.
                                                '}'.*/

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
                            
                                                            'var'.$varUniqueID.'_ObjJSONMasterFileRecord = JSFunc_MainData_GetDataFromDatabase_MasterFileRecord_'.$varUniqueID.'();'.

                                                            'if((parseInt(varPreviousListFileCount) + parseInt(varObjFileList.length)) == (parseInt(Object.keys(var'.$varUniqueID.'_ObjJSONMasterFileRecord).length)))'.
                                                                '{'.
                                                                'alert(\'All new file(s) uploaded successfully\'); '.
                                                                '}'.
                                                            'else'.
                                                                '{'.
                                                                'varFailedUploadFiles = (parseInt(varPreviousListFileCount) + parseInt(varObjFileList.length)) - (parseInt(Object.keys(var'.$varUniqueID.'_ObjJSONMasterFileRecord).length)); '.
                                                                'alert(varFailedUploadFiles + \' new file(s) failed to upload\'); '.
                                                                '}'.
                            
                            //                                'if(varFailedUploadFiles == parseInt(varObjFileList.length)) {'.
                            //                                    '}'.
                            
                                                            //'alert(\'Previous List File Count : \'+ varPreviousListFileCount + \', TryUploadList : \' + varObjFileList.length + \', MFR : \' + Object.keys(var'.$varUniqueID.'_ObjJSONMasterFileRecord).length); '.

                            
                                                            'varReturn = JSFunc_MainData_GetData_FileUploadStagingAreaRefRPK_'.$varUniqueID.'(); '.

                                                            'JSFunc_ObjDOMTable_ActionPanel_Show_'.$varUniqueID.'(); '.

                                                            //---> Aktifasi kembali Element
                                                            'varObj.disabled = false; '.
                                                            'varReturnDOMObject.disabled = false; '.
                                                            'JSFunc_UnlockObject_'.$varUniqueID.'(); '.
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
                                                '), 500);'.
                                            '}'.
                                        'catch(varError) {'.
                                            'alert(\'ERP Reborn Error Notification\n\nInvalid Process\n(\' + varError + \')\'); '.
                                            '}'.
                                        '}'.
                                    '}'.
                                'else {'.
                                    'alert(\'ERP Reborn Error Notification\n\nInvalid DOM Objects\'); '.
                                    '}'.
                                '})(this, document.getElementById(\''.$varDOMReturnID.'\'))'.
                            //---> Fungsi Utama ( End )
                            '}'.
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
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-12-31                                                                                           |
        | ▪ Description     : Mengeset Library JQuery                                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession                                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function setLibrary($varUserSession)
            {
            $varReturn = 
                '<script src = "js/zht-js/core.js" type="text/javascript"></script>'.
                '<script>new zht_JSCore();</script>'.
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