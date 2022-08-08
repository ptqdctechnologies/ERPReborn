<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : API Engine Controller                                                                                             |
| ▪ Name Space : \App\Http\Controllers\Application\BackEnd\System\FileHandling\Engines\upload\archive\general\setFilesFromStagingArea\v1      |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2022 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\BackEnd\System\FileHandling\Engines\upload\archive\general\setFilesFromStagingArea\v1
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : setFilesFromStagingArea                                                                                                     |
    | ▪ Description : Menangani API fileHandling.upload.stagingArea.general.setFilesFromStagingArea Version 1                                     |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class setFilesFromStagingArea extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-07-21                                                                                           |
        | ▪ Description     : System's Default Constructor                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        function __construct()
            {
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : main                                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-08-05                                                                                           |
        | ▪ Creation Date   : 2022-08-05                                                                                           |
        | ▪ Description     : Fungsi Utama Engine                                                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (array)  varData ► Data                                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        function main($varUserSession, $varData)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Create RotateLog File Upload Staging Area Data (version 1)');
                try {
                    //---- ( MAIN CODE ) ------------------------------------------------------------------------- [ START POINT ] -----
                    try {
                        $varDataSend = 
                            \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getEngineDataSend_DataRead(
                                $varUserSession,
                                $this->dataProcessing(
                                    $varUserSession,
                                    $varData['parameter']['log_FileUpload_Pointer_RefID'],
                                    $varData['parameter']['stagingAreaRecordPK'],
                                    $varData['parameter']['deleteCandidate_Log_FileUpload_ObjectDetail_RefArrayID']
                                    )
                                );
                        $varReturn = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Success($varUserSession, $varDataSend);
                        } 
                    catch (\Exception $ex) {
                        $varErrorMessage = $ex->getMessage();
                        $varReturn = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Fail($varUserSession, 500, 'Invalid SQL Syntax'.($varErrorMessage ? ' ('.$varErrorMessage.')' : ''));
                        }
                    //---- ( MAIN CODE ) --------------------------------------------------------------------------- [ END POINT ] -----
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Success');
                    } 
                catch (\Exception $ex) {
                    $varReturn = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Fail($varUserSession, 401, $ex->getMessage());
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
        | ▪ Method Name     : dataProcessing                                                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-08-05                                                                                           |
        | ▪ Creation Date   : 2022-08-05                                                                                           |
        | ▪ Description     : Fungsi Pemrosesan Data                                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session (Mandatory)                                                                |
        |      ▪ (int)    varLogFileUploadPointerRefID ► Log File Upload Pointer Reference  ID (Mandatory)                         |
        |      ▪ (int)    varStagingAreaRecordPK ► Staging Area Record Primary Key (Mandatory)                                     |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        private function dataProcessing($varUserSession, int $varLogFileUploadPointerRefID = null, int $varStagingAreaRecordPK = null, array $varDeleteCandidate_RefIDArray = null)
            {
            //---> Penyusunan JSON dari MasterFileRecord yang berasal dari Staging Area
            $varSQL = '
                SELECT
                    "SubSQL"."JSONData",
                    "SubSQL"."FilePath"
                FROM
                    (
                    SELECT
                        JSON_BUILD_OBJECT(
                            \'itemList\',
                                JSON_BUILD_OBJECT(
                                    \'items\', "SubSQL"."JSONData"
                                    )
                            )::json AS "JSONData",
                        "SubSQL"."FilePath"
                    FROM
                        (
                        SELECT
                            (
                            \'[\' || 
                            STRING_AGG(
                                "SubSQL"."JSONData"::varchar,
                                \',\'
                                ) ||
                            \']\'
                            )::json AS "JSONData",
                            (
                            \'[\' || 
                            STRING_AGG(
                                (\'"\' || "SubSQL"."FilePath" || \'"\')::varchar,
                                \',\'
                                ) ||
                            \']\'
                            )::json AS "FilePath"
                        FROM
                            (
                            SELECT 
                                JSON_BUILD_OBJECT(
                                    \'recordID\', NULL,
                                    \'entities\',
                                        JSON_BUILD_OBJECT(
                                            \'log_FileUpload_Object_RefID\', null,
                                            \'rotateLog_FileUploadStagingArea_RefRPK\', "RecordReference",
                                            \'sequence\', "Sequence",
                                            \'name\', "Name",
                                            \'size\', "Size",
                                            \'MIME\', "MIME",
                                            \'extension\', "Extension",
                                            \'lastModifiedDateTimeTZ\', "LastModifiedDateTimeTZ",
                                            \'lastModifiedUnixTimestamp\', "LastModifiedUnixTimestamp",
                                            \'hashMethod_RefID\', "HashMethod_RefID",
                                            \'contentBase64Hash\', "ContentBase64Hash",
                                            \'dataCompression_RefID\', NULL,
                                            \'stagingAreaFilePath\', "FilePath"
                                            )
                                    ) AS "JSONData",
                                "FilePath",
                                ROW_NUMBER () OVER (
                                    ORDER BY
                                        "Sequence" ASC
                                    ) AS "OrderSequence"
                            FROM
                                (
                                SELECT
                                    *
                                FROM
                                    "SchSysAsset"."Func_GetData_FileUpload_MasterFileRecord"(
                                        NULL, 
                                        '.$varStagingAreaRecordPK.'::bigint, 
                                        '.
                                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getSQLSyntax_Source_NumberArrayToBigIntArray(
                                            $varUserSession, 
                                            $varDeleteCandidate_RefIDArray).
                                        '::bigint[]
                                        )
                                WHERE
                                    "SignExistOnArchive" = FALSE
                                ) AS "SubSQL"
                            ) AS "SubSQL"
                        ) AS "SubSQL"
                    ) AS "SubSQL"
                ';
            
            $varJSON_Log_FileUpload_ObjectDetail = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                $varUserSession, 
                $varSQL
                )['Data'][0]['JSONData'];
            //dd($varJSON_Log_FileUpload_ObjectDetail);


            //---> Pemasukan Data pada TblLog_FileUpload_Object dan TblLog_FileUpload_ObjectDetail
            $varSysID_Log_FileUpload_Object = 
                (new \App\Models\Database\SchData_OLTP_DataAcquisition\TblLog_FileUpload_Object())->setDataInsert(
                    $varUserSession, 
                    null,
                    null,
                    (\App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken($varUserSession))['branchID'],
                    \App\Helpers\ZhtHelper\General\Helper_SystemParameter::getApplicationParameter_BaseCurrencyID($varUserSession, (\App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken($varUserSession))['branchID'], 'Env.System.BaseCurrency.ID'),

                    $varStagingAreaRecordPK,
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession, 
                        $varJSON_Log_FileUpload_ObjectDetail)
                    )['SignRecordID'];
            //dd($varSysID_Log_FileUpload_Object);


            //---> Mencari Data Path Pemindahan lalu memindahkan File dari Staging Area ke Archive Cloud
            $varSQL = '
                SELECT
                    "StagingAreaFilePath",
                    "ArchiveFilePath"
                FROM 
                    "SchData-OLTP-DataAcquisition"."Func_GetDataList_Log_FileUpload_ObjectDetail"(
                        11000000000004::bigint, 
                        '.$varSysID_Log_FileUpload_Object.'::bigint
                        )
                ORDER BY
                    "Sequence" ASC
                ';
            $varData = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                $varUserSession, 
                $varSQL
                )['Data'];
            
            for($i=0, $iMax=count($varData); $i!=$iMax; $i++)
                {
                //var_dump($varData[$i]);
/*                (new \App\Models\CloudStorage\System\General())->moveFile(
                    $varUserSession, 
                    $varData[$i]['StagingAreaFilePath'], 
                    $varData[$i]['ArchiveFilePath']
                    );*/
                }
            //dd($varData);

            (new \App\Models\Database\SchData_OLTP_DataAcquisition\TblLog_FileUpload_PointerHistory())->setDataInsert(
                $varUserSession, 
                null,
                null,
                (\App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken($varUserSession))['branchID'],
                \App\Helpers\ZhtHelper\General\Helper_SystemParameter::getApplicationParameter_BaseCurrencyID($varUserSession, (\App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken($varUserSession))['branchID'], 'Env.System.BaseCurrency.ID'),

                $varLog_FileUpload_Object_RefID, 
                $varDeleteCandidate_RefIDArray
                );
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                



/*
            $varMasterFileRecord = 
                (new \App\Models\Database\SchSysAsset\General())->getData_FileUpload_MasterFileRecord(
                    $varUserSession,
                    $varArchiveRecordID,
                    $varStagingAreaRecordPK,
                    $varDeleteCandidate_RefIDArray
                    )['Data'];
            for($i=0, $iMax=count($varMasterFileRecord); $i!=$iMax; $i++)
                {
                
                }
            dd($varMasterFileRecord);
*/            
            }
        }
    }