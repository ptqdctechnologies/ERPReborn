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
    class Helper_JavaScriptNEW
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

            return $varReturn;
            }




        public static function getSyntaxCreateZhtObject_InputFile($varUserSession, $varAPIWebToken, $varObjectID, $varValue)
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
                    ['fontSize', '8px'],
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
            $varJSFunctionName = 'JSFuncZhtObjectInputFile_'.$varObjectID;
            $varDOMID_ActionPanel = $varObjectID.'_ZhtActionPanel';
            $varDOMID_DataRecord = $varObjectID.'_ZhtDataRecord';
            $varDOMID_File = $varObjectID.'_ZhtFile';          
            
            echo '<input type="text" id="'.$varObjectID.'" value="'.$varValue.'">';
            echo '<textarea id="'.$varDOMID_DataRecord.'" cols=50 rows=10"></textarea>';
            echo '<input type="file" id="'.$varDOMID_File.'" style="display:none" onchange="javascript:'.$varJSFunctionName.'(this.files); " multiple/>';
            //echo '<button id="'.$varObjectID.'_Button" onclick="document.getElementById(\''.$varDOMID_File.'\').click();">Image Upload</button>';
           
            echo '<div id="'.$varDOMID_ActionPanel.'" ></div>';
                    
            echo '<script type="text/JavaScript">'.
                ''.$varJSFunctionName.'_ReloadActionPanel(); '.

                //-----[ MAIN FUNCTION ]----(START)----
                'document.onreadystatechange = function () {'.
                    'if (document.readyState == "complete") {'.
                        '(function '.$varJSFunctionName.'_Main() {'.
                            'try {'.
                                'if ('.self::getSyntaxFunc_IsJSFileLoaded($varUserSession, 'api-request.js').' == false) {'.
                                    'throw new Error(\'File \' + String.fromCharCode(34) + \'api-request.js\' + String.fromCharCode(34) + \' not loaded\'); '.
                                    '} '.
                                'else {'.
                                    self::setSyntaxFunc_CreateElementSignEligibleToProcess($varUserSession).
                                    '} '.
                                '} '.
                            'catch (varError) {'.
                                'alert (varError); '.
                                '} '.
                            '}) (); '.
                            '} '.
                        '}; '.
                    
                    
                //-----[ MAIN FUNCTION ]----(END)----
                'function '.$varJSFunctionName.'_DeleteFile(varIndex) {'.
                    'let varLocJSONData = JSON.parse(document.getElementById(\''.$varDOMID_DataRecord.'\').value); '.
                    'if (confirm('.
                        '\'Do You Want to delete file \' + String.fromCharCode(34) + varLocJSONData[varIndex].entities.name + String.fromCharCode(34) + \' ? \''.
                        ')) {'.
                        'let varDeletedItem = varLocJSONData.splice((varIndex), 1); '.
  
//                        'alert(JSON.stringify(varDeletedItem[0].recordID)); '.
                    
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
                                            '"recordID" : 268000000014900'.
//                                            '"recordID" : parseInt(JSON.stringify(varDeletedItem[0].recordID))'.
                                            '}'
                                            )
                                        ).
                                    ')'. //.data.message'.
                                '); '.
                            'alert(JSON.stringify(varReturn)); '.
                            'document.getElementById(\''.$varDOMID_DataRecord.'\').value = JSON.stringify(varLocJSONData); '.
                            $varJSFunctionName.'_ReloadActionPanel(); '.
                            '} '.
                        'catch (varError) {'.
                            'alert(varError); '.
                            '} '.
                    
                    
                    
                    
                        '}'.
                    '}'.

                'function '.$varJSFunctionName.'_ReloadActionPanel() {'.
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
                                                //'document.getElementById(\''.$varDOMID_ActionPanel.'_AddButton\').style.visibility = \'hidden\';
                                                //'document.getElementById(\''.$varDOMID_ActionPanel.'_AddButton\').style.visibility = \'hidden\'; '
                                            ]
                                        ],
                                        '/images/Icon/Button/Add-300-16.png'
                                        ).
                                    //'alert(document.getElementById(\''.$varDOMID_ActionPanel.'_AddButton\')); '
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
                                                        'document.getElementById(\''.$varDOMID_File.'\').click(); '.
                                                        'document.getElementById(\''.$varDOMID_ActionPanel.'_AddButton\').style.visibility = \'hidden\'; '
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

                    
                'function '.$varJSFunctionName.'_DataRecordChange(varData) {'.
                    'alert(\'12345\'); '.
                    '} '.

                'function '.$varJSFunctionName.'(varObjFiles) {'.
                    'if (('.self::getSyntaxFunc_CheckElementSignEligibleToProcess($varUserSession).') == true) {'.
                        //---> Proses jika ada file yang diset
                        'if (varObjFiles.length > 0) {'.
                            'var varAccumulatedFiles = 0;'.
                            'var varFileJSONArray = []; '.
                            'for (let i = 0; i < varObjFiles.length; i++) {'.
                                $varJSFunctionName.'_ReadFileFromBrowser(i, varObjFiles[i]); '.
                                '} '.
                    
                            //---> Membaca file-file dari browser
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

                            //---> Proses apabila seluruh file sudah terupload pada browser
                            'function '.$varJSFunctionName.'_AfterReadProcessing() {'.
                                //'if (!document.getElementById(\''.$varObjectID.'\').value) {'.
                                //    'document.getElementById(\''.$varObjectID.'\').value = '.$varJSFunctionName.'_GetLogFileUploadPointerID(); '.
                                //    '}'.
                                //'if (document.getElementById(\''.$varObjectID.'\').value) {'.
                                    /*
                                    'if (!varLocJSONData) {'.
                                        'alert(123345); '.
                                        '}'.
                                    */

                                    /*
                                    'let varLocLastSequence = 0; '.
                                    //---> Gat Previous Data
                                    'let varLocJSONData = '.$varJSFunctionName.'_GetDataList_FileUploadObjectDetail(document.getElementById(\''.$varObjectID.'\').value);'.
                                    'if (!varLocJSONData) {'.
                                        'varLocLastSequence = varLocLastSequence + varLocJSONData.length; '.
                                        'for (let i = 0; i < varLocJSONData.length; i++) {'.
                                            'let varLocJSONDataDetail = varLocJSONData[i]; '.
                                            'alert(varLocJSONDataDetail); '.
                                            '}'.
                                        '}'.
                                    */


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
                                    'document.getElementById(\''.$varObjectID.'\').value = varJSONData.log_FileUpload_Pointer_RefID; '.
                                    'document.getElementById(\''.$varDOMID_DataRecord.'\').value = JSON.stringify(varJSONData.JSONData); '.
                    
                                    ''.$varJSFunctionName.'_ReloadActionPanel(); '.

                                    

                                //    '}'.
                                '}; '.


                            //---> Mengeset Append File
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


                            //---> Mendapatkan List File Upload Object Detail
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
                                            ').data'.
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


                            //---> Get Log File Upload Pointer ID
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

                    

                    
                    
                '</script>';


            }


        //---> Mengecek apakah ZhtObject_SignEligibleToProcess sudah terbentuk atau belum
        public static function getSyntaxFunc_CheckElementSignEligibleToProcess(
            $varUserSession)
            {
            $varReturn = 
                '(function() {'.
                    'varReturn = false; '.
                    'if (document.getElementById(\'ZhtObject_SignEligibleToProcess\') != null) {'.
                        'varReturn = true; '.
                        '}'.
                    'return varReturn; '.
                    '}) ()';
            return $varReturn;
            }


        //---> Membentuk element ZhtObject_SignEligibleToProcess apabila belum didefinisikan
        public static function setSyntaxFunc_CreateElementSignEligibleToProcess(
            $varUserSession)
            {
            $varReturn = 
                'if (document.getElementById(\'ZhtObject_SignEligibleToProcess\') == null) {'.
                    'varNewElement = document.createElement(\'input\'); '.
                    'varNewElement.setAttribute(\'type\', \'text\'); '.
                    'varNewElement.setAttribute(\'id\', \'ZhtObject_SignEligibleToProcess\'); '.
                    'varNewElement.setAttribute(\'name\', \'ZhtObject_SignEligibleToProcess\'); '.
                    'varNewElement.setAttribute(\'value\', true); '.
                    'document.body.appendChild(varNewElement); '.
                    //'alert(document.getElementById(\'ZhtObject_SignEligibleToProcess\')); '.
                    '} ';
            return $varReturn;
            }

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
                                                ').data.data.signExist'.
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

            
            
            
        }
    }