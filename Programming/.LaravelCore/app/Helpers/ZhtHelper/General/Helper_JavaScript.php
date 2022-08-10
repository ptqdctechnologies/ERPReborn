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
                    
                    $varReturn =
                        'try {'.
                            //---> Pendefinisian varObjDOMInputMasterFileRecord
                            'try {'.
                                'var'.$varUniqueID.'_ObjDOMInputMasterFileRecord.setAttribute(\'value\', var'.$varUniqueID.'_ObjDOMInputMasterFileRecord.getAttribute(\'value\')); '.
                                '}'.
                            'catch(varError) {'.
                                //'alert(\'var'.$varUniqueID.'_ObjDOMInputMasterFileRecord belum didefinisikan\');'.
                                'var'.$varUniqueID.'_ObjDOMInputMasterFileRecord = document.createElement(\'INPUT\'); '.
                                'var'.$varUniqueID.'_ObjDOMInputMasterFileRecord.setAttribute(\'type\', \'text\'); '.
                                'var'.$varUniqueID.'_ObjDOMInputMasterFileRecord.setAttribute(\'visibility\', \'visible\'); '.
                                'var'.$varUniqueID.'_ObjDOMInputMasterFileRecord.setAttribute(\'display\', \'block\'); '.
                                'var'.$varUniqueID.'_ObjDOMInputMasterFileRecord.setAttribute(\'value\', \'[]\'); '.
                                //--->
                                'var'.$varUniqueID.'_ObjDOMInputRotateLog_FileUploadStagingArea_RefRPK = document.createElement(\'INPUT\'); '.
                                'var'.$varUniqueID.'_ObjDOMInputRotateLog_FileUploadStagingArea_RefRPK.setAttribute(\'type\', \'text\'); '.
                                'var'.$varUniqueID.'_ObjDOMInputRotateLog_FileUploadStagingArea_RefRPK.setAttribute(\'value\', \'\'); '.
                                //--->
                                'var'.$varUniqueID.'_ObjDOMInputDeleteCandidate_Log_FileUpload_ObjectDetail_RefArrayID = document.createElement(\'INPUT\'); '.
                                'var'.$varUniqueID.'_ObjDOMInputDeleteCandidate_Log_FileUpload_ObjectDetail_RefArrayID.setAttribute(\'type\', \'text\'); '.
                                'var'.$varUniqueID.'_ObjDOMInputDeleteCandidate_Log_FileUpload_ObjectDetail_RefArrayID.setAttribute(\'value\', \'[]\'); '.

                                                        
                                'var'.$varUniqueID.'_ObjInputDeleteCandidate_Log_FileUpload_ObjectDetail_RefArrayID = JSON.parse(var'.$varUniqueID.'_ObjDOMInputDeleteCandidate_Log_FileUpload_ObjectDetail_RefArrayID.getAttribute(\'value\'));'.
//                                'var'.$varUniqueID.'_ObjInputDeleteCandidate_Log_FileUpload_ObjectDetail_RefArrayID.push(12000000000111); '.
//                                'var'.$varUniqueID.'_ObjInputDeleteCandidate_Log_FileUpload_ObjectDetail_RefArrayID.push(12000000000112); '.
//                                'var'.$varUniqueID.'_ObjInputDeleteCandidate_Log_FileUpload_ObjectDetail_RefArrayID = \'[\' + var'.$varUniqueID.'_ObjInputDeleteCandidate_Log_FileUpload_ObjectDetail_RefArrayID + \']\'; '.
//                                'var'.$varUniqueID.'_ObjInputDeleteCandidate_Log_FileUpload_ObjectDetail_RefArrayID = var'.$varUniqueID.'_ObjInputDeleteCandidate_Log_FileUpload_ObjectDetail_RefArrayID; '.
//                                'var'.$varUniqueID.'_ObjInputDeleteCandidate_Log_FileUpload_ObjectDetail_RefArrayID = JSON.stringify(var'.$varUniqueID.'_ObjInputDeleteCandidate_Log_FileUpload_ObjectDetail_RefArrayID); '.
                                'var'.$varUniqueID.'_ObjInputDeleteCandidate_Log_FileUpload_ObjectDetail_RefArrayID = \'[]\'; '.
                            
                            
//                                'alert(var'.$varUniqueID.'_ObjInputDeleteCandidate_Log_FileUpload_ObjectDetail_RefArrayID); '.
//                            12000000000111
                                '}'.
                            
                            '(function(varObj, varReturnDOMObject) {'.
                                'if ((typeof varObj != \'undefined\') && (typeof varReturnDOMObject != \'undefined\')) {'.
                                    'var varObjFileList = varObj.files; '.
                                    'if(varObjFileList.length > 0)'.
                                        '{'.
                                        'try {'.
                                            'varObj.disabled = true; '.
                                            'varReturnDOMObject.disabled = true; '.
                                            'var varReturn = \'\'; '.
                                            'var varStagingTag = \''. \App\Helpers\ZhtHelper\System\Helper_Environment::getFrontEndConfigEnvironment($varUserSession, 'TAG_DATA_SEPARATOR_FILE_STAGING_AREA').$varAction.'::\'; '.

                                            'var varAccumulatedFiles = 0; '.
                                            'var varJSONDataBuilder = \'\'; '.
                            
                                            //---> Pendefinisian Inner Function
                                            //---> Inner Function : Panel Action
                                            'function innerFuncGetActionPanel(varLog_FileUpload_Pointer_RefID, varRotateLog_FileUploadStagingArea_RefRPK, varDeleteCandidate_Log_FileUpload_ObjectDetail_RefArrayID)'.
                                                '{'.
//                                            'alert(\'innerFuncGetActionPanel : \' + varRotateLog_FileUploadStagingArea_RefRPK); '.
                                                'varJSONData = var'.$varUniqueID.'_ObjDOMInputMasterFileRecord.getAttribute(\'value\'); '.
//'alert(JSON.parse(varJSONData));'.
//'innerFuncGetMasterFileRecord(varLog_FileUpload_Pointer_RefID, varRotateLog_FileUploadStagingArea_RefRPK, varDeleteCandidate_Log_FileUpload_ObjectDetail_RefArrayID); '.
//                                                'varObjectData = JSON.parse(JSON.stringify(varJSONData)); '.
                                                'varObjectData = JSON.parse(varJSONData); '.

                                                'var'.$varUniqueID.'_ObjDOMTable_Action = document.createElement(\'table\'); '.
                                                'var'.$varUniqueID.'_ObjDOMTable_Action.style.width = \'100px\'; '.
//                                                'var'.$varUniqueID.'_ObjDOMTable_Action.style.borderCollapse = \'collapse\'; '.
                                                'var'.$varUniqueID.'_ObjDOMTable_Action.style.border = \'1px solid black\'; '.

                                                'var varObjTHead = document.createElement(\'thead\'); '.
                                                    'var tr = document.createElement(\'tr\');'.
                                                        'var td = document.createElement(\'td\'); '.
                                                            'td.style.backgroundColor = \'#292630\'; '.
                                                            'td.style.color = \'#FFFFFF\'; '.
                                                            'td.style.fontFamily = \'verdana\'; '.
                                                            'td.style.whiteSpace = \'nowrap\'; '.
                                                            'td.style.fontSize = \'10px\'; '.
                                                            'td.style.textAlign = \'center\'; '.
                                                            'td.appendChild(document.createTextNode(\'NO\'));'.
                                                    'tr.appendChild(td); '.
                                                        'var td = document.createElement(\'td\'); '.
                                                            'td.style.backgroundColor = \'#292630\'; '.
                                                            'td.style.color = \'#FFFFFF\'; '.
                                                            'td.style.fontFamily = \'verdana\'; '.
                                                            'td.style.whiteSpace = \'nowrap\'; '.
                                                            'td.style.fontSize = \'10px\'; '.
                                                            'td.style.textAlign = \'center\'; '.
                                                            'td.appendChild(document.createTextNode(\'FILE NAME\'));'.
                                                    'tr.appendChild(td); '.
                                                        'var td = document.createElement(\'td\'); '.
                                                            'td.style.backgroundColor = \'#292630\'; '.
                                                            'td.style.color = \'#FFFFFF\'; '.
                                                            'td.style.fontFamily = \'verdana\'; '.
                                                            'td.style.whiteSpace = \'nowrap\'; '.
                                                            'td.style.fontSize = \'10px\'; '.
                                                            'td.style.textAlign = \'center\'; '.
                                                            'td.appendChild(document.createTextNode(\'SIZE\'));'.
                                                    'tr.appendChild(td); '.
                                                        'var td = document.createElement(\'td\'); '.
                                                            'td.style.backgroundColor = \'#292630\'; '.
                                                            'td.style.color = \'#FFFFFF\'; '.
                                                            'td.style.fontFamily = \'verdana\'; '.
                                                            'td.style.whiteSpace = \'nowrap\'; '.
                                                            'td.style.fontSize = \'10px\'; '.
                                                            'td.style.textAlign = \'center\'; '.
                                                            'td.appendChild(document.createTextNode(\'DELETE\'));'.
                                                    'tr.appendChild(td); '.
                                                'varObjTHead.appendChild(tr); '.
                                                'var'.$varUniqueID.'_ObjDOMTable_Action.appendChild(varObjTHead); '.



                                                'var varObjTBody = document.createElement(\'tbody\'); '.
                                                'for(i=0; i != varObjectData.length; i++)'.
                                                    '{'.
                                                    'var tr = document.createElement(\'tr\');'.
                                                        'var td = document.createElement(\'td\'); '.
                                                            'td.style.backgroundColor = \'#fadbb4\'; '.
                                                            'td.style.fontFamily = \'tahoma,verdana\'; '.
                                                            'td.style.whiteSpace = \'nowrap\'; '.
                                                            'td.style.fontSize = \'10px\'; '.
                                                            'td.style.textAlign = \'center\'; '.
                                                            'td.appendChild(document.createTextNode(varObjectData[i][\'sequence\']));'.
                                                    'tr.appendChild(td); '.
                                                        'var td = document.createElement(\'td\'); '.
                                                            'td.style.backgroundColor = \'#fadbb4\'; '.
                                                            'td.style.fontFamily = \'tahoma,verdana\'; '.
                                                            'td.style.whiteSpace = \'nowrap\'; '.
                                                            'td.style.fontSize = \'10px\'; '.
                                                            'td.style.textAlign = \'left\'; '.
                                                            'td.appendChild(document.createTextNode(varObjectData[i][\'name\']));'.
                                                    'tr.appendChild(td); '.
                                                        'var td = document.createElement(\'td\'); '.
                                                            'td.style.backgroundColor = \'#fadbb4\'; '.
                                                            'td.style.fontFamily = \'tahoma,verdana\'; '.
                                                            'td.style.whiteSpace = \'nowrap\'; '.
                                                            'td.style.fontSize = \'10px\'; '.
                                                            'td.style.textAlign = \'right\'; '.
                                                            'td.appendChild(document.createTextNode(varObjectData[i][\'size\']));'.
                                                    'tr.appendChild(td); '.
                                                        'var td = document.createElement(\'td\'); '.
                                                            'td.style.backgroundColor = \'#fadbb4\'; '.
                                                            'td.style.fontFamily = \'tahoma,verdana\'; '.
                                                            'td.style.whiteSpace = \'nowrap\'; '.
                                                            'td.style.fontSize = \'10px\'; '.
                                                            'td.style.textAlign = \'right\'; '.
                                                            'var varObjA = document.createElement(\'a\'); '.
                                                                'varURLDelete = varObjectData[i][\'URLDelete\']; '.
                                                                'varObjA.href = \'javascript:(function(varURLDelete) {'.
                                                                    'var XHR = new XMLHttpRequest(); '.
//                                                                    'XHR.onreadystatechange = function() {'.
//                                                                        'if (XHR.readyState == XMLHttpRequest.DONE) {'.
//                                                                            'alert(XHR.responseText);'. 
//                                                                            '}'. 
//                                                                        '}'.
                                                                    'XHR.open(\\\'GET\\\', \\\'\' + varURLDelete + \'\\\', true); '.
                                                                    'XHR.send(null); '.
                                                                    'alert(\\\'Record has been deleted\\\'); '.
                                                                    '} )(varURLDelete)\'; '.
                                                                'varObjA.innerHTML =  \'Delete\'; '.
                                                            'td.appendChild(varObjA); '.
                                                    'tr.appendChild(td); '.

                                                    'varObjTBody.appendChild(tr); '.
                                                    '}'.
                                                'var'.$varUniqueID.'_ObjDOMTable_Action.appendChild(varObjTBody); '.
                                                'document.getElementById(\''.$varDOMActionPanel.'\').appendChild(var'.$varUniqueID.'_ObjDOMTable_Action);'.
                            
                            
                            
                            
                            
                            
                            
                                                '}'.
//                                            'innerFuncGetMasterFileRecord(varLog_FileUpload_Pointer_RefID, varRotateLog_FileUploadStagingArea_RefRPK, []); '.
                                            //---> Inner Function : Mendapatkan Master File Record
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
                                                '}'.
                                            //---> Inner Function : Mengurutkan Ulang Sequence dan Mencari Last Sequence
                                            'function innerFuncGetLastSequence()'.
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
                                            'if(var'.$varUniqueID.'_ObjDOMInputRotateLog_FileUploadStagingArea_RefRPK.getAttribute(\'value\') == \'\') {'.
                                                'varRotateLog_FileUploadStagingArea_RefRPK = innerFuncGetNewID();'.
                                                'var'.$varUniqueID.'_ObjDOMInputRotateLog_FileUploadStagingArea_RefRPK.setAttribute(\'value\', varRotateLog_FileUploadStagingArea_RefRPK); '.
                                                '}'.
                                            'else {'.
                                                'varRotateLog_FileUploadStagingArea_RefRPK = parseInt(var'.$varUniqueID.'_ObjDOMInputRotateLog_FileUploadStagingArea_RefRPK.getAttribute(\'value\')); '.
                                                '}'.
                                            //'alert(varRotateLog_FileUploadStagingArea_RefRPK); '.

                                            'var'.$varUniqueID.'_ObjJSONMasterFileRecord = innerFuncGetMasterFileRecord(varReturnDOMObject.value, varRotateLog_FileUploadStagingArea_RefRPK, var'.$varUniqueID.'_ObjInputDeleteCandidate_Log_FileUpload_ObjectDetail_RefArrayID);'.
                                            'varPreviousListFileCount = ((var'.$varUniqueID.'_ObjJSONMasterFileRecord == undefined) ? 0 : Object.keys(var'.$varUniqueID.'_ObjJSONMasterFileRecord).length); '.
                            
                                            //---> Mendapatkan Last sequence
                                            'varLastSequence = innerFuncGetLastSequence();'.
                                            //'alert(varLastSequence); '.

                                            'var var'.$varUniqueID.'_ObjJSONMasterFileRecord = JSON.parse(var'.$varUniqueID.'_ObjDOMInputMasterFileRecord.getAttribute(\'value\')); '.
                                            'for(var i = 0; i < varObjFileList.length; i++)'.
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
                                                            'String.fromCharCode(34) + \'rotateLog_FileUploadStagingArea_RefRPK\' + String.fromCharCode(34) + \' : \' + (varRotateLog_FileUploadStagingArea_RefRPK) + \', \' + '.
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
                                                                        '"rotateLog_FileUploadStagingArea_RefRPK" : + varRotateLog_FileUploadStagingArea_RefRPK'.
                                                                        '}'.
                                                                '}'
                                                                )).';'.
                                                            //'alert(varNothing); '.

                            
                                                            
                            
                                                            'var'.$varUniqueID.'_ObjJSONMasterFileRecord = innerFuncGetMasterFileRecord(varReturnDOMObject.value, varRotateLog_FileUploadStagingArea_RefRPK, var'.$varUniqueID.'_ObjInputDeleteCandidate_Log_FileUpload_ObjectDetail_RefArrayID);'.
                                                            //'alert(JSON.stringify(var'.$varUniqueID.'_ObjJSONMasterFileRecord));'.
                                                        
                                                            //'alert(varObjFileList.length); '.
                                                            //'alert(Object.keys(var'.$varUniqueID.'_ObjJSONMasterFileRecord).length); '.
                            
                                                            'if((parseInt(varPreviousListFileCount) + parseInt(varObjFileList.length)) == (parseInt(Object.keys(var'.$varUniqueID.'_ObjJSONMasterFileRecord).length)))'.
                                                                '{'.
                                                                'alert(\'All new file(s) uploaded successfully\'); '.
                                                                '}'.
                                                            'else'.
                                                                '{'.
                                                                'varFailedUploadFiles = (parseInt(varPreviousListFileCount) + parseInt(varObjFileList.length)) - (parseInt(Object.keys(var'.$varUniqueID.'_ObjJSONMasterFileRecord).length)); '.
                                                                'alert(varFailedUploadFiles + \' new file(s) failed to upload\'); '.
                                                                '}'.
                                                            //'alert(\'Previous List File Count : \'+ varPreviousListFileCount + \', TryUploadList : \' + varObjFileList.length + \', MFR : \' + Object.keys(var'.$varUniqueID.'_ObjJSONMasterFileRecord).length); '.
                            
                            
                                                            //'varReturn = varJSONDataBuilder; '.
                                                            'varReturn = varRotateLog_FileUploadStagingArea_RefRPK; '.
                                                            'varObj.disabled = false; '.
                                                            'varReturnDOMObject.disabled = false; '.
                                                            //'alert(varObj.value); '.
                                                            'var'.$varUniqueID.'_ObjDOMInputMasterFileRecord.setAttribute(\'value\', (JSON.stringify(var'.$varUniqueID.'_ObjJSONMasterFileRecord))); '.
                                                            //'alert(JSON.parse(var'.$varUniqueID.'_ObjJSONMasterFileRecord)); '.
                                                            //'alert((var'.$varUniqueID.'_ObjDOMInputMasterFileRecord.getAttribute(\'value\'))); '.
                                                            'document.getElementById(\''.$varDOMAction.'\').innerHTML = var'.$varUniqueID.'_ObjDOMInputMasterFileRecord.getAttribute(\'value\');'.
                                                            //'alert(document.getElementById(\''.$varDOMAction.'\').innerHTML)'.
                                                            'innerFuncGetActionPanel(varReturnDOMObject.value, varRotateLog_FileUploadStagingArea_RefRPK, var'.$varUniqueID.'_ObjInputDeleteCandidate_Log_FileUpload_ObjectDetail_RefArrayID); '.
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
                                                                'varReturnDOMObject.value = (varReturnDOMObject.value.split(varStagingTag))[0] + varStagingTag + varReturn; '.
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
        | ▪ Method Name     : getSyntaxFunc_UniqueID                                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-12-24                                                                                           |
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
        }
    }