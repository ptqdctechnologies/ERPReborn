<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Helpers                                                                                                   |
| ▪ Name Space : \App\Helpers\ZhtHelper\General                                                                                    |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2024 Zheta (teguhpjs@gmail.com)                                                                                     |
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
        | ▪ Last Update     : 2024-08-15                                                                                           |
        | ▪ Creation Date   : 2024-08-15                                                                                           |
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
        | ▪ Last Update     : 2024-08-15                                                                                           |
        | ▪ Creation Date   : 2024-08-15                                                                                           |
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

            if ((\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'Style', $varArrayProperties) == TRUE)) {
                for ($i=0, $iMax=count($varArrayProperties['Style']); $i!=$iMax; $i++) {
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

            return
                $varReturn;
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
      
            return
                $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getSyntaxCreateDOM_DivCustom_InputFile                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-09-03                                                                                           |
        | ▪ Creation Date   : 2024-09-03                                                                                           |
        | ▪ Description     : Mendapatkan Syntax Pembuatan DOM Object : Custom Div - Input File                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession (Mandatory) ► User Session                                                                |
        |      ▪ (mixed)  varAPIWebToken (Mandatory) ► API Web Token                                                               |
        |      ▪ (string) varObjectID (Mandatory) ► Object ID                                                                      |
        |      ▪ (int)    varValue (Mandatory) ► Value                                                                             |
        |      ▪ (string) varObjectReturnID (Optional) ► Object Return ID                                                          |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Example :                                                                                                              |
        |       ▪ ---> Without Return Value to Outside DOM Object                                                                  |
        |         echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::getSyntaxCreateDOM_DivCustom_InputFile(                   |
        |                   App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),                            |
        |                   $varAPIWebToken,                                                                                       |
        |                   'dataInput_Log_FileUpload',                                                                            |
        |                   91000000000001                                                                                         |
        |                   );                                                                                                     |
        |                                                                                                                          |
        |       ▪ ---> With Return Value to Outside DOM Object                                                                     |
        |         echo '<input type=\'text\' id=\'dataInput_Return\'>';                                                            |
        |         echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::getSyntaxCreateDOM_DivCustom_InputFile(                   |
        |                   \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),                           |
        |                   $varAPIWebToken,                                                                                       |
        |                   'dataInput_Log_FileUpload',                                                                            |
        |                   91000000000001,                                                                                        |
        |                   'dataInput_Return'                                                                                     |
        |                   );                                                                                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getSyntaxCreateDOM_DivCustom_InputFile($varUserSession, $varAPIWebToken, string $varObjectID, int $varValue = null, string $varObjectReturnID = null)
            {
            $varStyle_TableAction =
                [
                    ['width', '100px'],
                    ['border', '1px solid #ced4da']
                ];

            $varStyle_TableActionPanelHead =
                [
                    ['backgroundColor', '#E9ECEF'],
                    ['color', '#212529'],
                    ['fontFamily', '\\\'Arial\\\', \\\'verdana\\\''],
                    ['whiteSpace', 'nowrap'],
                    ['fontSize', '9px'],
                    ['fontWeigh', 'bold'],
                    ['textAlign', 'center'],
                    ['border', '1px solid #ced4da']
                ];

            $varStyle_TableActionPanelBody =
                [
                    ['backgroundColor', '#E9ECEF'],
                    ['color', '#000000'],
                    ['fontFamily', '\\\'Arial\\\', \\\'verdana\\\''],
                    ['whiteSpace', 'nowrap'],
                    ['fontSize', '8px'],
                    ['textAlign', 'left'],
                    ['border', '1px solid #ced4da'],
                    ['padding', '1px 2px']
                ];
            
            $varArrayProperties =
                [ 
                    'ID' => $varObjectID
                ];
            $varReturn = '';
            $varObjectID = (
                (\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'ID', $varArrayProperties) == FALSE) ? 
                    'TempObject' : 
                    $varArrayProperties['ID']
                );
            $varBasePath = 'Archive';
            $varJSFunctionName = 'JSFuncZhtObjectInputFile_'.$varObjectID;
            $varDOMID_ActionPanel = $varObjectID.'_ZhtActionPanel';
            $varDOMID_DataRecord = $varObjectID.'_ZhtDataRecord';
            $varDOMID_File = $varObjectID.'_ZhtFile';

            $varReturn =
                '<div id="'.$varDOMID_ActionPanel.'" style="display:inline-block">'.
                    '<input type="text" id="'.$varObjectID.'" value="'.$varValue.'" style="display:none">'.
//                    '<input type="text" id="'.$varObjectID.'" value="'.$varValue.'" >'.
                    '<textarea id="'.$varDOMID_DataRecord.'" cols=50 rows=10 style="display:none"></textarea>'.
                    '<input type="file" id="'.$varDOMID_File.'" style="display:none" onchange="javascript:'.$varJSFunctionName.'_AddFiles(this.files); ; " multiple/>'.
                '</div>';
            
            $varReturn .=
                '<script type="text/JavaScript">'.
                    /*
                    +--------------------------------------------------------------------------------------------------------------------------+
                    | ▪ Method Name     : _Main                                                                                                |
                    +--------------------------------------------------------------------------------------------------------------------------+
                    | ▪ Description     : Prosedur utama                                                                                       |
                    +--------------------------------------------------------------------------------------------------------------------------+
                    */
                    'function '.$varJSFunctionName.'_Main(varID) {'.
                        'if (document.readyState == \'complete\') {'.
                            'try {'.
                                'if ('.self::getSyntaxFunc_IsJSFileLoaded($varUserSession, 'api-request.js').' == false) {'.
                                    'throw new Error(\'File \' + String.fromCharCode(34) + \'api-request.js\' + String.fromCharCode(34) + \' not loaded\'); '.
                                    '} '.
                                'else {'.
                                    'let varSignEligible = '.$varJSFunctionName.'_CheckIDExistantion(varID); '.
                                    'if (varSignEligible == true ) {'.
                                        //---> Pengesetan Object ZhtObject_SignEligibleToProcess
                                        'if (document.getElementById(\'ZhtObject_SignEligibleToProcess\') == null) {'.
                                            'varNewElement = document.createElement(\'input\'); '.
                                            'varNewElement.setAttribute(\'type\', \'text\'); '.
                                            'varNewElement.setAttribute(\'id\', \'ZhtObject_SignEligibleToProcess\'); '.
                                            'varNewElement.setAttribute(\'name\', \'ZhtObject_SignEligibleToProcess\'); '.
                                            'varNewElement.setAttribute(\'value\', true); '.
                                            'varNewElement.setAttribute(\'hidden\', true); '.
                                            'document.body.appendChild(varNewElement); '.
                                            '} '.

                                        'setTimeout(function() {'.
                                            $varJSFunctionName.'_InitDataRecord(varID); '.
                                            '}, 1);'.
                                        '}'.
                                    'else {'.
                                        'alert(\'Record with ID \' + varID + \' is not eligible to process.\' + String.fromCharCode(13) + \'ID will set to null\'); '.
                                        'document.getElementById(\''.$varObjectID.'\').value = \'\'; '.
                                        'setTimeout(function() {'.
                                            $varJSFunctionName.'_InitDataRecord(varID); '.
                                            '}, 1);'.
                                        '}'.
                                    '} '.
                                '} '.
                            'catch (varError) {'.
                                'alert (varError); '.
                                '} '.
                            '}'.
                        'else {'.
                            'setTimeout(function() {'.
                                $varJSFunctionName.'_Main(varID); '.
                                '}, 1);'.
                            '}'.
                        '}; '.

                    'setTimeout(function() {'.
                        $varJSFunctionName.'_Main(document.getElementById(\''.$varObjectID.'\').value); '.
                        '}, 1);'.

                    /*
                    +--------------------------------------------------------------------------------------------------------------------------+
                    | ▪ Method Name     : _CheckIDExistantion                                                                                  |
                    +--------------------------------------------------------------------------------------------------------------------------+
                    | ▪ Description     : • Mengecek apakah ID Log File Upload Pointer (varID) merupakan Record yang valid                     |
                    |                     • Apabila varID tidak valid, maka akan diset menjadi null                                            |
                    +--------------------------------------------------------------------------------------------------------------------------+
                    */
                    'function '.$varJSFunctionName.'_CheckIDExistantion(varID) {'.
                        'let varReturn = false; '.
                        'if (varID) {'.
                            'if ((Number.isInteger(parseInt(varID))) === true) {'.
                                'try {'.
                                    'varID = parseInt(varID); '.
                                    'varJSON = ('.
                                        'JSON.parse('.
                                            str_replace(
                                                '"', 
                                                '\'', 
                                                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                                                    $varUserSession, 
                                                    $varAPIWebToken, 
                                                    'dataWarehouse.dataCheck.recordIDExistantion.acquisition.getFileUpload_Pointer', 
                                                    'latest',
                                                    '{'.
                                                        '"parameter" : {'.
                                                            '"recordID" : varID'.
                                                            '}'.
                                                    '}'
                                                    )
                                                ).
                                            ').data.data[0].signExist'.
                                        '); '.
                                    '}'.
                                'catch (varError) {'.
                                    '}'.
                                'finally {'.
                                    'varReturn = varJSON; '.
                                    '}'.
                                '}'.
                            '}'.
                        'else {'.
                            'varReturn = true; '.
                            '}'.

                        'return varReturn; '.
                        '}'.


                    /*
                    +--------------------------------------------------------------------------------------------------------------------------+
                    | ▪ Method Name     : _InitDataRecord                                                                                      |
                    +--------------------------------------------------------------------------------------------------------------------------+
                    | ▪ Description     : • Mencari list file tersimpan berdasarkan ID Log File Upload Pointer (varID) dan menyimpannya        |
                    |                       kedalam Data Record DOM                                                                            |
                    +--------------------------------------------------------------------------------------------------------------------------+
                    */
                    'function '.$varJSFunctionName.'_InitDataRecord(varID) {'.
                        'if (document.readyState == \'complete\') {'.
                            'if ((Number.isInteger(parseInt(varID))) === true) {'.
                                'varID = parseInt(varID); '.
                                'try {'.
                                    'varJSON = ('.
                                        'JSON.parse('.
                                            str_replace(
                                                '"', 
                                                '\'', 
                                                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                                                    $varUserSession, 
                                                    $varAPIWebToken, 
                                                    'fileHandling.archive.general.getFileList', 
                                                    'latest',
                                                    '{'.
                                                        '"parameter" : {'.
                                                            '"log_FileUpload_Pointer_RefID" : varID'.
                                                            '}'.
                                                    '}'
                                                    )
                                                ).
                                            ').data.data'.
                                        '); '.

                                    'let varJSONReturn = \'\'; '.
                                    'for (let i=0, iMax = varJSON.length; i != iMax; i++) {'.
                                        'if (varJSONReturn != \'\') {'.
                                            'varJSONReturn = varJSONReturn + \', \'; '.
                                            '}'.
                                        'varJSONReturn = varJSONReturn + \'{\' + '.
                                            'String.fromCharCode(34) + \'recordID\' + String.fromCharCode(34) + \' : \' + varJSON[i].log_FileUpload_ObjectDetail_RefID + \', \' + '. 
                                            'String.fromCharCode(34) + \'entities\' + String.fromCharCode(34) + \' : {\' + '. 
                                                'String.fromCharCode(34) + \'sequence\' + String.fromCharCode(34) + \' : \' + (i+1) + \', \' + '.
                                                'String.fromCharCode(34) + \'name\' + String.fromCharCode(34) + \' : \' + String.fromCharCode(34) + varJSON[i].name + String.fromCharCode(34) + \', \' + '.
                                                'String.fromCharCode(34) + \'size\' + String.fromCharCode(34) + \' : \' + varJSON[i].size + \', \' + '.
                                                'String.fromCharCode(34) + \'MIME\' + String.fromCharCode(34) + \' : \' + String.fromCharCode(34) + varJSON[i].MIME + String.fromCharCode(34) + \', \' + '.
                                                'String.fromCharCode(34) + \'extension\' + String.fromCharCode(34) + \' : \' + String.fromCharCode(34) + varJSON[i].extension + String.fromCharCode(34) + \', \' + '.
                                                'String.fromCharCode(34) + \'lastModifiedDateTimeTZ\' + String.fromCharCode(34) + \' : \' + String.fromCharCode(34) + varJSON[i].lastModifiedDateTimeTZ + String.fromCharCode(34) + \', \' + '.
                                                'String.fromCharCode(34) + \'lastModifiedUnixTimestamp\' + String.fromCharCode(34) + \' : \' + varJSON[i].lastModifiedUnixTimestamp + \', \' + '.
                                                'String.fromCharCode(34) + \'hashMethod_RefID\' + String.fromCharCode(34) + \' : \' + varJSON[i].hashMethod_RefID + \', \' + '.
                                                'String.fromCharCode(34) + \'contentBase64Hash\' + String.fromCharCode(34) + \' : \' + String.fromCharCode(34) + varJSON[i].contentBase64Hash + String.fromCharCode(34) + \', \' + '.
                                                'String.fromCharCode(34) + \'dataCompression_RefID\' + String.fromCharCode(34) + \' : \' + (varJSON[i].dataCompression_RefID == 0 ? \'null\' : varJSON[i].dataCompression_RefID) + \', \' + '.
                                                'String.fromCharCode(34) + \'signNewFile\' + String.fromCharCode(34) + \' : \' + false + \', \' + '.
                                                'String.fromCharCode(34) + \'filePath\' + String.fromCharCode(34) + \' : \' + String.fromCharCode(34) + \'/\' + varJSON[i].log_FileUpload_Object_RefID + \'/\' + varJSON[i].log_FileUpload_ObjectDetail_RefID + String.fromCharCode(34) + \', \' + '.
                                                'String.fromCharCode(34) + \'uploadDateTimeTZ\' + String.fromCharCode(34) + \' : \' + String.fromCharCode(34) + varJSON[i].uploadDateTimeTZ + String.fromCharCode(34) + \', \' + '.
                                                'String.fromCharCode(34) + \'newEntrySequence\' + String.fromCharCode(34) + \' : \' + \'null\' + '.
                                                '\'}\' + '.
                                            '\'}\';'.
                                        '}'.
                                    'varJSONReturn = \'[\' + varJSONReturn + \']\'; '.
                                    'document.getElementById(\''.$varDOMID_DataRecord.'\').value = JSON.stringify(JSON.parse(varJSONReturn)); '.
                                    ''.$varJSFunctionName.'_ShowFileList(); '.
                                    '} '.
                                'catch (varError) {'.
                                    'varReturn = null; '.
                                    'alert(\'Files Append Process Failed\'); '.
                                    '} '.
                                '}'.
                            'else {'.
                                ''.$varJSFunctionName.'_ShowFileList(); '.
                                '}'.
                            '}'.
                        'else {'.
                            'setTimeout(function() {'.
                                $varJSFunctionName.'_InitDataRecord(document.getElementById(\''.$varObjectID.'\').value); '.
                                '}, 1);'.
                            '}'.
                        '}'.
                    
                    /*
                    +--------------------------------------------------------------------------------------------------------------------------+
                    | ▪ Method Name     : _AddFiles                                                                                            |
                    +--------------------------------------------------------------------------------------------------------------------------+
                    | ▪ Description     : • Penambahan file-file baru kedalam database, file storage, dan Data Record DOM                      |
                    +--------------------------------------------------------------------------------------------------------------------------+
                    */
                    'function '.$varJSFunctionName.'_AddFiles(varObjFiles) {'.
                        /*
                        +--------------------------------------------------------------------------------------------------------------+
                        | ▪ Method Name     : Sub Function _CheckSignEligibleToProcess                                                 |
                        +--------------------------------------------------------------------------------------------------------------+
                        | ▪ Description     : • Mengecek apakah ZhtObject_SignEligibleToProcess sudah terbentuk atau belum             |
                        +--------------------------------------------------------------------------------------------------------------+
                        */
                        'function '.$varJSFunctionName.'_CheckSignEligibleToProcess() {'.
                            'let varReturn = false; '.
                            'if (document.getElementById(\'ZhtObject_SignEligibleToProcess\') != null) {'.
                                'varReturn = true; '.
                                '}'.
                            'return varReturn; '.
                            '} '.

                        'if ('.$varJSFunctionName.'_CheckSignEligibleToProcess() == true) {'.
                            //---> Proses jika ada file yang diset
                            'if (varObjFiles.length > 0) {'.
                                'var varAccumulatedFiles = 0;'.
                                'var varFileJSONArray = []; '.
                                'for (let i = 0; i < varObjFiles.length; i++) {'.
                                    $varJSFunctionName.'_ReadFileFromBrowser(i, varObjFiles[i]); '.
                                    '} '.

                                /*
                                +--------------------------------------------------------------------------------------------------------------+
                                | ▪ Method Name     : Sub Function _ReadFileFromBrowser                                                        |
                                +--------------------------------------------------------------------------------------------------------------+
                                | ▪ Description     : • Membaca file-file dari browser                                                         |
                                +--------------------------------------------------------------------------------------------------------------+
                                */
                                'function '.$varJSFunctionName.'_ReadFileFromBrowser(varIndex, varObjFile) {'.
                                    'var varObjFileReader = new FileReader();'.
                                    'varObjFileReader.onloadend = (function(event) {'.
                                        'var varArrayBuffer = this.result; '.
                                        'varFileJSONArray[varIndex] = '.
                                            '\'{\' + '.
                                            //'String.fromCharCode(34) + \'sequence\' + String.fromCharCode(34) + \' : \' + (varIndex+1) + \', \' + '.
                                            'String.fromCharCode(34) + \'name\' + String.fromCharCode(34) + \' : \' + String.fromCharCode(34) + (varObjFile.name) + String.fromCharCode(34) + \', \' + '.
                                            'String.fromCharCode(34) + \'size\' + String.fromCharCode(34) + \' : \' + (varObjFile.size) + \', \' + '.
                                            'String.fromCharCode(34) + \'MIME\' + String.fromCharCode(34) + \' : \' + String.fromCharCode(34) + ((event.target.result.split(\',\')[0]).match(/[^:\s*]\w+\/[\w-+\d.]+(?=[;| ])/)[0]) + String.fromCharCode(34) + \', \' + '.
                                            'String.fromCharCode(34) + \'extension\' + String.fromCharCode(34) + \' : \' + String.fromCharCode(34) + (varObjFile.name.split(\'.\').pop().toLowerCase()) + String.fromCharCode(34) + \', \' + '.
                                            'String.fromCharCode(34) + \'lastModifiedDateTimeTZ\' + String.fromCharCode(34) + \' : \' + String.fromCharCode(34) + (varObjFile.lastModifiedDate) + String.fromCharCode(34) + \', \' + '.
                                            'String.fromCharCode(34) + \'lastModifiedUnixTimestamp\' + String.fromCharCode(34) + \' : \' + (varObjFile.lastModified) + \', \' + '.
                                            'String.fromCharCode(34) + \'contentBase64\' + String.fromCharCode(34) + \' : \' + String.fromCharCode(34) + (event.target.result.substr(event.target.result.indexOf(\',\') + 1)) + String.fromCharCode(34) + \'\' + '.
                                            '\'}\'; '.
                                        'varAccumulatedFiles++; '.

                                        //---> Proses bila seluruh file sudah terbaca saat upload
                                        'if (varAccumulatedFiles == varObjFiles.length) {'.
                                            ''.$varJSFunctionName.'_AfterReadProcessing(); '.
                                            '} '.
                                        '}); '.
                                    'varObjFileReader.readAsDataURL(varObjFile); '.
                                    '} '.


                                /*
                                +--------------------------------------------------------------------------------------------------------------+
                                | ▪ Method Name     : Sub Function _AfterReadProcessing                                                        |
                                +--------------------------------------------------------------------------------------------------------------+
                                | ▪ Description     : • Proses apabila seluruh file sudah terupload pada browser                               |
                                +--------------------------------------------------------------------------------------------------------------+
                                */
                                'function '.$varJSFunctionName.'_AfterReadProcessing() {'.
                                    //---> Get New Data
                                    'let varJSONData = \'\'; '.
                                    'for (let i = 0; i < varFileJSONArray.length; i++) {'.
                                        'if (varJSONData != \'\') {'.
                                            'varJSONData = varJSONData + \', \'; '.
                                            '} '.
                                        'varJSONData = varJSONData + '.
                                            '\'{\' + '.
                                            'String.fromCharCode(34) + \'entities\' + String.fromCharCode(34) + \' : \' + '.
                                            'varFileJSONArray[i] + '.
                                            '\'}\''.
                                            '; '.
                                        //'alert(varJSONData); '.
                                        '} '.
                                    'varJSONData = \'[\' + varJSONData + \']\'; '.
                                    'varJSONData = JSON.parse(varJSONData); '.
                                    //'alert(varJSONData); '.

                                    'varJSONData = '.$varJSFunctionName.'_SetFilesAppend(document.getElementById(\''.$varObjectID.'\').value, varJSONData); '.

                                    'try {'.
                                        'document.getElementById(\''.$varObjectID.'\').value = varJSONData.log_FileUpload_Pointer_RefID; '.
                                        'document.getElementById(\''.$varDOMID_DataRecord.'\').value = JSON.stringify(varJSONData.JSONData); '.
                                        'document.getElementById(\''.$varDOMID_File.'\').value = \'\'; '.

                                        ($varObjectReturnID ? 
                                            self::getSyntaxFunc_SetDOMValue(
                                                $varUserSession,
                                                $varObjectReturnID,
                                                'document.getElementById(\''.$varObjectID.'\').value'
                                                ).'; '
                                            //'alert(document.getElementById(\''.$varObjectReturnID.'\').constructor.name); ' 
                                            : 
                                            '' 
                                            ).

                                        '}'.
                                    'catch (varError) {'.
                                        '}'.
                                    'finally {'.
                                        ''.$varJSFunctionName.'_ShowFileList(); '.
                                        '}'.
                                    '}; '.


                                /*
                                +--------------------------------------------------------------------------------------------------------------+
                                | ▪ Method Name     : Sub Function _SetFilesAppend                                                             |
                                +--------------------------------------------------------------------------------------------------------------+
                                | ▪ Description     : • Mengeset Append File                                                                   |
                                +--------------------------------------------------------------------------------------------------------------+
                                */
                                'function '.$varJSFunctionName.'_SetFilesAppend(varLocLogFileUploadPointerRefID, varLocJSONData) {'.
                                    'try {'.
                                        'varReturn = ('.
                                            'JSON.parse('.
                                                str_replace(
                                                    '"', 
                                                    '\'', 
                                                    \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                                                        $varUserSession, 
                                                        $varAPIWebToken, 
                                                        'fileHandling.upload.general.setFilesAppend', 
                                                        'latest',
                                                        '{'.
                                                            '"parameter" : {'.
                                                                '"log_FileUpload_Pointer_RefID" : (!varLocLogFileUploadPointerRefID ? null : parseInt(varLocLogFileUploadPointerRefID)), '.
                                                                '"additionalData" : {'.
                                                                    '"itemList" : {'.
                                                                        '"items" : varLocJSONData'.
                                                                        '} '.
                                                                    '} '.
                                                                '}, '.
                                                            '"SQLStatement" : {'.
                                                                '"pick" : null, '.
                                                                '"sort" : null, '.
                                                                '"filter" : null, '.
                                                                '"paging" : null'.
                                                                '}'.
                                                        '}'
                                                        )
                                                    ).
                                                ').data.data[0]'.
                                            '); '.
                                        '} '.
                                    'catch (varError) {'.
                                        'varReturn = null; '.
                                        'alert(\'Files Append Process Failed\'); '.
                                        '} '.
                                    'finally {'.
                                        'return varReturn; '.
                                        '}'.
                                    '}; '.


                                /*
                                +--------------------------------------------------------------------------------------------------------------+
                                | ▪ Method Name     : Sub Function _GetDataList_FileUploadObjectDetail                                         |
                                +--------------------------------------------------------------------------------------------------------------+
                                | ▪ Description     : • Mendapatkan List File Upload Object Detail                                             |
                                +--------------------------------------------------------------------------------------------------------------+
                                */
                                'function '.$varJSFunctionName.'_GetDataList_FileUploadObjectDetail(varFileUploadObjectPointerID) {'.
                                    'try {'.
                                        'varReturn = ('.
                                            'JSON.parse('.
                                                str_replace(
                                                    '"', 
                                                    '\'', 
                                                    \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                                                        $varUserSession, 
                                                        $varAPIWebToken, 
                                                        'dataWarehouse.read.dataList.acquisition.getFileUpload_ObjectDetail', 
                                                        'latest',
                                                        '{'.
                                                            '"parameter" : {'.
                                                                '"log_FileUpload_Pointer_RefID" : parseInt(varFileUploadObjectPointerID) '.
                                                                '}, '.
                                                            '"SQLStatement" : {'.
                                                                '"pick" : null, '.
                                                                '"sort" : null, '.
                                                                '"filter" : null, '.
                                                                '"paging" : null'.
                                                                '}'.
                                                        '}'
                                                        )
                                                    ).
                                                ').data.data'.
                                            '); '.
                                        '} '.
                                    'catch (varError) {'.
                                        'varReturn = null; '.
                                        'alert(\'File Upload Object Detail List cann\\\'t be retrieved\'); '.
                                        '} '.
                                    'finally {'.
                                        'return varReturn; '.
                                        '}'.
                                    '}; '.


                                /*
                                +--------------------------------------------------------------------------------------------------------------+
                                | ▪ Method Name     : Sub Function _GetLogFileUploadPointerID                                                  |
                                +--------------------------------------------------------------------------------------------------------------+
                                | ▪ Description     : • Get Log File Upload Pointer ID                                                         |
                                +--------------------------------------------------------------------------------------------------------------+
                                */
                                'function '.$varJSFunctionName.'_GetLogFileUploadPointerID() {'.
                                    'try {'.
                                        'varReturn = ('.
                                            'JSON.parse('.
                                                str_replace(
                                                    '"', 
                                                    '\'', 
                                                    \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                                                        $varUserSession, 
                                                        $varAPIWebToken, 
                                                        'dataWarehouse.create.acquisition.setLog_FileUpload_Pointer', 
                                                        'latest',
                                                        '{'.
                                                            '"parameter" : {'.
                                                                '}'.
                                                        '}'
                                                        )
                                                    ).
                                                ').data.recordID'.
                                            '); '.
                                        '} '.
                                    'catch (varError) {'.
                                        'varReturn = null; '.
                                        'alert(\'Log File Upload Pointer ID cann\\\'t be initilized\'); '.
                                        '} '.
                                    'finally {'.
                                        //'alert(varReturn); '.
                                        'return varReturn; '.
                                        '}' .
                                    '}'.
                                '}'.
                            '} '.
                        'else {'.
                            'alert(\'ZhtObject was not initialized correctly\'); '.
                            '} '.
                        '}; '.


                    /*
                    +--------------------------------------------------------------------------------------------------------------------------+
                    | ▪ Method Name     : _DownloadFile                                                                                        |
                    +--------------------------------------------------------------------------------------------------------------------------+
                    | ▪ Description     : • Mendownload File                                                                                   |
                    +--------------------------------------------------------------------------------------------------------------------------+
                    */
                    'function '.$varJSFunctionName.'_DownloadFile(varFilePath, varMIME, varFileName) {'.
                        'varFilePath = \''.$varBasePath.'\' + varFilePath; '.

                        'try {'.
                            'varBase64Data = ('.
                                'JSON.parse('.                           
                                    str_replace(
                                        '"', 
                                        '\'', 
                                        \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                                            $varUserSession, 
                                            $varAPIWebToken, 
                                            'fileHandling.archive.general.getFileContent', 
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

                            'let varObjDownloadLink = document.createElement(\'a\'); '.
                            'varObjDownloadLink.href = \'data:\' + varMIME + \';base64,\' + varBase64Data; '.
                            'varObjDownloadLink.download = varFileName; '.
                            'varObjDownloadLink.click(); '.
                            //'varObjDownloadLink.parentNode.removeChild(varObjDownloadLink); '.
                            '}'.
                        'catch(varError) {'.
                            'alert(\'ERP Reborn Error Notification\n\nInvalid Process\n(\' + varError + \')\'); '.
                            '}'.
                        '}'.


                    /*
                    +--------------------------------------------------------------------------------------------------------------------------+
                    | ▪ Method Name     : _DeleteFile                                                                                          |
                    +--------------------------------------------------------------------------------------------------------------------------+
                    | ▪ Description     : • Meghapus File                                                                                      |
                    +--------------------------------------------------------------------------------------------------------------------------+
                    */
                    'function '.$varJSFunctionName.'_DeleteFile(varIndex) {'.
                        'let varLocJSONData = JSON.parse(document.getElementById(\''.$varDOMID_DataRecord.'\').value); '.
                        'if (confirm('.
                            '\'Do You Want to delete file \' + String.fromCharCode(34) + varLocJSONData[varIndex].entities.name + String.fromCharCode(34) + \' ? \''.
                            ')) {'.
                            'let varDeletedItem = varLocJSONData.splice((varIndex), 1); '.
                            'try {'.
                                'varReturn = ('.
                                    'JSON.parse('.
                                        str_replace(
                                            '"', 
                                            '\'', 
                                            \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                                                $varUserSession, 
                                                $varAPIWebToken, 
                                                'fileHandling.archive.general.setFileDelete', 
                                                'latest',
                                                '{'.
                                                '"recordID" : parseInt(JSON.stringify(varDeletedItem[0].recordID))'.
                                                '}'
                                                )
                                            ).
                                        ').metadata.HTTPStatusCode'.
                                    '); '.
                                'if (parseInt(varReturn) == 200) {'.
                                    'if (JSON.stringify(varLocJSONData) == \'[]\') {'.
                                        'document.getElementById(\''.$varDOMID_DataRecord.'\').value = \'\'; '.                                    
                                        '}'.
                                    'else {'.
                                        'document.getElementById(\''.$varDOMID_DataRecord.'\').value = JSON.stringify(varLocJSONData); '.
                                        '}'.
                                    $varJSFunctionName.'_ShowFileList(); '.
                                    '}'.
                                'else {'.
                                    'alert(\'File deletion failed\'); '.
                                    '}'.
                                '} '.
                            'catch (varError) {'.
                                'alert(\'An error occurred in the file deletion process\'); '.
                                '} '.
                            '}'.
                        '}'.


                    /*
                    +--------------------------------------------------------------------------------------------------------------------------+
                    | ▪ Method Name     : _ShowFileList                                                                                        |
                    +--------------------------------------------------------------------------------------------------------------------------+
                    | ▪ Description     : • Menampilkam Daftar File                                                                            |
                    +--------------------------------------------------------------------------------------------------------------------------+
                    */
                    'function '.$varJSFunctionName.'_ShowFileList() {'.
                        //---> Object Table
                        'if (document.getElementById(\''.$varDOMID_ActionPanel.'_Table'.'\') != null) {'.
                            'document.getElementById(\''.$varDOMID_ActionPanel.'_Table'.'\').remove(); '.
                            '}'.
                    
                        self::getSyntaxCreateDOM_Table(
                            $varUserSession, 
                            [
                            'ID' => $varDOMID_ActionPanel.'_Table',
                            'ParentID' => 'document.getElementById(\''.$varDOMID_ActionPanel.'\')',
                            'Style' => $varStyle_TableAction
                            ],
                            (
                            //---> Table Head
                            self::getSyntaxCreateDOM_TableHead(
                                $varUserSession, 
                                [
                                'ID' => $varDOMID_ActionPanel.'_THead',
                                'ParentID' => $varDOMID_ActionPanel.'_Table'
                                ],
                                (
                                self::getSyntaxCreateDOM_TableRow(
                                    $varUserSession, 
                                    [
                                    'ID' => $varDOMID_ActionPanel.'_TTR',
                                    'ParentID' => $varDOMID_ActionPanel.'_THead'
                                    ], 
                                    (
                                    self::getSyntaxCreateDOM_TableData(
                                        $varUserSession, 
                                        [
                                        'ID' => $varDOMID_ActionPanel.'_TTD',
                                        'ParentID' => $varDOMID_ActionPanel.'_TTR',
                                        'Style' => $varStyle_TableActionPanelHead,
                                        'RowSpan' => 2
                                        ],
                                        $varDOMID_ActionPanel.'_TTD'.'.appendChild(document.createTextNode(\'NO\')); '
                                        ).
                                    self::getSyntaxCreateDOM_TableData(
                                        $varUserSession, 
                                        [
                                        'ID' => $varDOMID_ActionPanel.'_TTD',
                                        'ParentID' => $varDOMID_ActionPanel.'_TTR',
                                        'Style' => $varStyle_TableActionPanelHead,
                                        'RowSpan' => 2
                                        ],
                                        $varDOMID_ActionPanel.'_TTD'.'.appendChild(document.createTextNode(\'NAME\')); '
                                        ).
                                    self::getSyntaxCreateDOM_TableData(
                                        $varUserSession, 
                                        [
                                        'ID' => $varDOMID_ActionPanel.'_TTD',
                                        'ParentID' => $varDOMID_ActionPanel.'_TTR',
                                        'Style' => $varStyle_TableActionPanelHead,
                                        'RowSpan' => 2
                                        ],
                                        $varDOMID_ActionPanel.'_TTD'.'.appendChild(document.createTextNode(\'SIZE\')); '
                                        ).
                                    self::getSyntaxCreateDOM_TableData(
                                        $varUserSession, 
                                        [
                                        'ID' => $varDOMID_ActionPanel.'_TTD',
                                        'ParentID' => $varDOMID_ActionPanel.'_TTR',
                                        'Style' => $varStyle_TableActionPanelHead,
                                        'RowSpan' => 2
                                        ],
                                        $varDOMID_ActionPanel.'_TTD'.'.appendChild(document.createTextNode(\'UPLOAD DATETIME\')); '
                                        ).
                                    self::getSyntaxCreateDOM_TableData(
                                        $varUserSession, 
                                        [
                                        'ID' => $varDOMID_ActionPanel.'_TTD',
                                        'ParentID' => $varDOMID_ActionPanel.'_TTR',
                                        'Style' => $varStyle_TableActionPanelHead,
                                        'RowSpan' => 1,
                                        'ColSpan' => 2
                                        ],
                                        $varDOMID_ActionPanel.'_TTD'.'.appendChild(document.createTextNode(\'ACTION\')); '
                                        )
                                    )
                                    ).
                                self::getSyntaxCreateDOM_TableRow(
                                    $varUserSession, 
                                    [
                                    'ID' => $varDOMID_ActionPanel.'_TTR',
                                    'ParentID' => $varDOMID_ActionPanel.'_THead'
                                    ], 
                                    (
                                    self::getSyntaxCreateDOM_TableData(
                                        $varUserSession, 
                                        [
                                        'ID' => $varDOMID_ActionPanel.'_TTD',
                                        'ParentID' => $varDOMID_ActionPanel.'_TTR',
                                        'Style' => $varStyle_TableActionPanelHead,
                                        'RowSpan' => 1,
                                        'ColSpan' => 2
                                        ],
                                        (
                                        self::getSyntaxCreateDOM_Image(
                                            $varUserSession,
                                            [
                                            'ID' => $varDOMID_ActionPanel.'_AddButton',
                                            'ParentID' => $varDOMID_ActionPanel.'_TTD',
                                            'Title' => 'Add File(s)',
                                            'AddEventListener' => [
                                                'click' => 
                                                    'document.getElementById(\''.$varDOMID_File.'\').click(); '
                                                ]
                                            ],
                                            '/images/Icon/Button/Add-300-16.png'
                                            ).
                                        'if (document.getElementById(\''.$varDOMID_ActionPanel.'_AddButton\') != null) {'.
                                            'document.getElementById(\''.$varDOMID_ActionPanel.'_AddButton\').addEventListener('.
                                                '\'click\', '.
                                                'function() {'.
                                                    '}'.
                                                '); '.
                                            '}'
                                        )
                                        )
                                    )
                                    )
                                )
                                ).
                            //---> Table Body
                            self::getSyntaxCreateDOM_TableBody(
                                $varUserSession, 
                                [
                                'ID' => $varDOMID_ActionPanel.'_TBody',
                                'ParentID' => $varDOMID_ActionPanel.'_Table'
                                ],
                                'try {'.
                                    'for (let i=0, iMax = (JSON.parse(document.getElementById(\''.$varDOMID_DataRecord.'\').value)).length; i != iMax; i++) {'.
                                        //' alert (JSON.stringify(    (JSON.parse(document.getElementById(\''.$varDOMID_DataRecord.'\').value))[i]   )    ); '.

                                        self::getSyntaxCreateDOM_TableRow(
                                            $varUserSession, 
                                            [
                                            'ID' => 'varObjTTR',
                                            'ParentID' => $varDOMID_ActionPanel.'_TBody'
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
                                                'varObjTTD.appendChild(document.createTextNode((i+1))); '
                                                ).
                                            self::getSyntaxCreateDOM_TableData(
                                                $varUserSession, 
                                                [
                                                'ID' => 'varObjTTD',
                                                'ParentID' => 'varObjTTR',
                                                'Style' => array_merge(
                                                    $varStyle_TableActionPanelBody,
                                                    [
                                                        ['textAlign', 'left']
                                                    ]
                                                    ),
                                                ],
                                                'varObjTTD.appendChild('.
                                                    'document.createTextNode('.
                                                        '(JSON.parse(document.getElementById(\''.$varDOMID_DataRecord.'\').value))[i].entities.name'.
                                                        ')'.
                                                    '); '
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
                                                'varObjTTD.appendChild('.
                                                    'document.createTextNode('.
                                                        '(JSON.parse(document.getElementById(\''.$varDOMID_DataRecord.'\').value))[i].entities.size'.
                                                        ')'.
                                                    '); '
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
                                                'varObjTTD.appendChild('.
                                                    'document.createTextNode('.
                                                        '(JSON.parse(document.getElementById(\''.$varDOMID_DataRecord.'\').value))[i].entities.uploadDateTimeTZ'.
                                                        ')'.
                                                    '); '
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
                                                self::getSyntaxCreateDOM_Image(
                                                    $varUserSession,
                                                    [
                                                    'ID' => $varDOMID_ActionPanel.'_DeleteButton',
                                                    'ParentID' => 'varObjTTD',
                                                    'Title' => 'Delete File',
                                                    'AddEventListener' => [
                                                        'click' =>
                                                            //'alert(i); '
                                                            $varJSFunctionName.'_DeleteFile(i); '
                                                            //'document.getElementById(\''.$varDOMID_File.'\').click(); '.
                                                            //'document.getElementById(\''.$varDOMID_ActionPanel.'_AddButton\').style.visibility = \'hidden\'; '
                                                        ]
                                                    ],
                                                    '/images/Icon/Button/Delete-300-16.png'
                                                    )
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
                                                self::getSyntaxCreateDOM_Image(
                                                    $varUserSession,
                                                    [
                                                    'ID' => $varDOMID_ActionPanel.'_DownloadButton',
                                                    'ParentID' => 'varObjTTD',
                                                    'Title' => 'Download File',
                                                    'AddEventListener' => [
                                                        'click' => 
                                                            $varJSFunctionName.'_DownloadFile('.
                                                                '(JSON.parse(document.getElementById(\''.$varDOMID_DataRecord.'\').value))[i].entities.filePath,'.
                                                                '(JSON.parse(document.getElementById(\''.$varDOMID_DataRecord.'\').value))[i].entities.MIME,'.
                                                                '(JSON.parse(document.getElementById(\''.$varDOMID_DataRecord.'\').value))[i].entities.name'.
                                                                '); '
                                                        ]
                                                    ],
                                                    '/images/Icon/Button/Download-300-16.png'
                                                    )
                                                )
                                                )
                                            )
                                            ).
                                        '}'.
                                    '}'.
                                'catch (varError) {'.
                                    '}'
                                )
                            )
                            ).
                        '} '.
                '</script>';

            return
                $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getSyntaxCreateDOM_Image                                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2024-08-27                                                                                           |
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
        |           ► [ 'ID' => 'MyID',                                                                                            |
        |               'ParentID' => ... ,                                                                                        |
        |               'Style' => [                                                                                               |
        |                     ['...', ...]                                                                                         |
        |                  ]                                                                                                       |
        |               'AddEventListerner' => [                                                                                   |
        |                  'click' => 'alert(\'OK\'); '                                                                            |
        |                  ...                                                                                                     |
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
            if ((\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'Style', $varArrayProperties) == TRUE)) {
                for ($i=0, $iMax=count($varArrayProperties['Style']); $i!=$iMax; $i++) {
                    $varReturn .= $varObjectID.'.style.'.$varArrayProperties['Style'][$i][0].' = \''.$varArrayProperties['Style'][$i][1].'\'; ';
                    }                
                }

            //---> Add Event Listener
            $varReturnAddEventListener = '';
            if (\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'AddEventListener', $varArrayProperties) == TRUE) {
                foreach ($varArrayProperties['AddEventListener'] as $key => $value) {
                    $varReturnAddEventListener = 
                        $varObjectID.'.addEventListener(\''.$key.'\', function() {'.$value.'}); '
                        ;
                    //dd($varReturnAddEventListener);
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
                //---> title
                ((\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'Title', $varArrayProperties) == FALSE) ? '' : 
                    $varObjectID.'.title = \''.$varArrayProperties['Title'].'\'; '
                    ).
                //---> style
                $varReturn.
                $varReturnAddEventListener.
                //---> appendChild
                ((\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'ParentID', $varArrayProperties) == FALSE) ? '' : 
                    $varArrayProperties['ParentID'].'.appendChild('.$varObjectID.'); '
                    ).
                //---> remove ID
                ((\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'ID', $varArrayProperties) == TRUE) ? '' : 
                    $varObjectID.'.removeAttribute(\'id\'); ').
                '';

            return
                $varReturn;
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

            if ((\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'Style', $varArrayProperties) == TRUE)) {
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

            return
                $varReturn;
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

            if ((\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'Style', $varArrayProperties) == TRUE)) {
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

            return
                $varReturn;
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

            return
                $varReturn;
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
            if (!$varArrayOptionName) {
                $varArrayOptionName = 'varDataArrayOption';
                }
            if (!$varArrayOptionPHPOverride) {
                $varArrayOptionPHPOverride = [];
                }
            
            $varReturn = '';
            $varObjectID = (
                (\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'ID', $varArrayProperties) == FALSE) ? 
                    'TempObject' : 
                    $varArrayProperties['ID']
                );
            if ((\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'Style', $varArrayProperties) == TRUE)) {
                for ($i=0, $iMax=count($varArrayProperties['Style']); $i!=$iMax; $i++) {
                    $varReturn .= $varObjectID.'.style.'.$varArrayProperties['Style'][$i][0].' = \''.$varArrayProperties['Style'][$i][1].'\'; ';
                    }                
                }

            //---> $varReturnOpt 
            $varReturnOpt = '';
            if (($iMax = count($varArrayOptionPHPOverride)) > 0)
                {
                $varReturnOpt = ''.$varArrayOptionName.' = []; ';
                for ($i=0; $i!=$iMax; $i++)
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
      
            return
                $varReturn;
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

            return
                $varReturn;
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

            return
                $varReturn;
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

            return
                $varReturn;
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

            return
                $varReturn;
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

            return
                $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getSyntaxFunc_SetDOMValue                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-09-03                                                                                           |
        | ▪ Creation Date   : 2024-09-03                                                                                           |
        | ▪ Description     : Mendapatkan Syntax Set DOM Value                                                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession (Mandatory) ► User Session                                                                |
        |      ▪ (string) varObjectID (Mandatory) ► ID Object                                                                      |
        |      ▪ (string) varValue (Mandatory) ► Value                                                                             |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getSyntaxFunc_SetDOMValue($varUserSession, string $varObjectID, string $varValue)
            {
            $varReturn = 
                '(function(varValue) {'.
                    'try {'.
                        'switch (document.getElementById(\''.$varObjectID.'\').constructor.name) {'.
                            'case \'HTMLInputElement\' : '.
                            'case \'HTMLTextAreaElement\' : '.
                                'document.getElementById(\''.$varObjectID.'\').value = varValue; '.
                                'break; '.
                            'case \'HTMLDivElement\' : '.
                            'case \'HTMLLabelElement\' : '.
                                'document.getElementById(\''.$varObjectID.'\').innerHTML = varValue; '.
                                'break; '.
                            'default : '.
                                'alert(\'Value can not be set\'); '.
                                'break; '.
                            '}'.
                        '}'.
                    'catch (varError) {'.
                        '}'.
                    '}) ('.$varValue.')';

            return
                $varReturn;
            }



////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
        //---> Mengecek apakah File JS sudah diupload atau belum
        public static function getSyntaxFunc_IsJSFileLoaded(
            $varUserSession,
            $varFileName)
            {
            switch($varFileName) {
                case 'api-request.js':
                    $varClassName = 'zht_IsJSFileLoaded_ZhtJSApiRequest()';
                    break;
                case 'core.js':
                    $varClassName = 'zht_IsJSFileLoaded_ZhtJSCore()';
                    break;
                default :
                    $varClassName = 'zht_IsJSFileLoaded_NothingClass()';
                    break;
                }

            $varReturn =
                '(function (varClassName) {'.
                    'varReturn = false; '.
                    'try {'.
                        'varObj = new '.$varClassName.'; '.
                        'varReturn = true; '.
                        '}'.
                    'catch(varError) {'.
                        '}'.
                    'finally {'.
                        //'alert(\'varClassName : \' + varClassName); '.
                        'return varReturn; '.
                        '}'.
                    '}) (\''.$varClassName.'\')';
            return $varReturn;
            }

 
        public static function getSyntaxFunc_IsClassLoaded(
            $varUserSession,
            $varClassName)
            {
            $varReturn =
                'function() {'.
                    'varReturn = false; '.
                    'try {'.
                        'varObj = new '.$varClassName.((!stristr($varClassName, '(')) ? '()' : '').'; '.
                        'varReturn = true; '.
                        '}'.
                    'catch(varError) {'.
                        '}'.
                    'return varReturn; '.
                    '} ()';
            return $varReturn;
            }


        public static function getSyntaxFunc_SetMessage(
            $varUserSession,
            bool $varThreatMessageAsPHPData = true, string $varMessage)
            {
            $varReturn = 
                'function (varMessage) {'.
                    'return String.fromCharCode(13) + \''.(basename(__FILE__, '.php').' ► ').'\' + varMessage; '.
                    '} ('.($varThreatMessageAsPHPData === true ? '\''.$varMessage.'\'': $varMessage).')';
            return $varReturn;
            }
            
        public static function getSyntaxFunc_IsExist_APIWebToken(
            $varUserSession,
            $varAPIWebToken)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, false, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'set Syntax AJAX Post JSON');
                try {
                    $varReturn =
                        'function(varAPIWebToken) {'.
                            'varReturn = false; '.
                            'try {'.
                                'if ('.self::getSyntaxFunc_IsClassLoaded($varUserSession, 'zht_JSAPI').' === true) {'.
                                    'try {'.
                                        'varReturn = ('.
                                            'JSON.parse('.
                                                str_replace(
                                                    '"', 
                                                    '\'', 
                                                    \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                                                        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                                                        $varAPIWebToken, 
                                                        'authentication.general.isSessionExist', 
                                                        'latest', 
                                                        '{'.
                                                            '"parameter" : null'.
                                                        '}'
                                                        )
                                                    ).
                                                ').data.signExist'.
                                            '); '.
                                        '}'.
                                    'catch(varError) {'.
                                        'alert('.self::getSyntaxFunc_SetMessage($varUserSession, true, 'API with key \' + String.fromCharCode(34) + \'authentication.general.isSessionExist\' + String.fromCharCode(34) + \' encountered an Error').'); '.
                                        '}'.
                                    '}'.
                                'else {'.
                                    'throw new Error('.self::getSyntaxFunc_SetMessage($varUserSession, true, 'JavaScript Class zht_JSAPIRequest is not loaded').'); '.
                                    '}'.
                                '} '.
                            'catch(varError) {'.
                                'alert(varError); '.
                                '} '.
                            'finally {'.
                                'return varReturn; '.
                                '} '.
                            '} (\''.$varAPIWebToken.'\');';
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
        | ▪ Method Name     : getJSEscapeUnicode                                                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-05-06                                                                                           |
        | ▪ Creation Date   : 2024-05-06                                                                                           |
        | ▪ Description     : Mendapatkan Escape String untuk String yang mengandung Unicode (varData)                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varUserSession                                                                                           |
        |      ▪ (string) varData                                                                                                  |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getJSEscapeUnicode($varUserSession, $varData)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, false, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'get Escape Unicode');
                try {
                    $varReturn = 
                        'function(varData) {'.
                            'varStr = JSON.stringify(varData) + "";'.
                            'varStr = varStr.replace(/[^\0-~]/g, function(ch) {return "\\\\u" + ("000" + ch.charCodeAt().toString(16)).slice(-4);}); '.
                            //'alert(varStr); '.
                            'return varStr; '.
                            '}('.$varData.'); ';
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
        | ▪ Method Name     : getJSUnescapeUnicode                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-05-06                                                                                           |
        | ▪ Creation Date   : 2024-05-06                                                                                           |
        | ▪ Description     : Mendapatkan Unsscape String untuk String yang mengandung Escape String Unicode (varData)             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varUserSession                                                                                           |
        |      ▪ (string) varEscapedData                                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getJSUnescapeUnicode($varUserSession, $varEscapedData)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, false, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'get Escape Unicode');
                try {
                    $varReturn = 
                        'function(varData) {'.
                            'varStr = '.
                                'varData.replace(/\\\\u[\dA-F]{4}/gi, '.
                                    'function (match) {'.
                                    'return String.fromCharCode(parseInt(match.replace(/\\\\u/g, ""), 16)); '.
                                    '}); '.
                            'alert(varStr); '.
                            'return varStr; '.
                            '}('.$varEscapedData.'); ';
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
                    '} (); ';
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