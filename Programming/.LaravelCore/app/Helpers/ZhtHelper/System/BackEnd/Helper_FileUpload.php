<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Helpers                                                                                                   |
| ▪ Name Space : \App\Helpers\ZhtHelper\System\BackEnd                                                                             |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2021 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Helpers\ZhtHelper\System\BackEnd
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : Helper_FileUpload                                                                                            |
    | ▪ Description : Menangani segala parameter yang terkait File Upload                                                          |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class Helper_FileUpload
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setUploadPointer                                                                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-07-27                                                                                           |
        | ▪ Description     : Mengeset Upload Pointer                                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varID ► Data ID                                                                                          |
        |      ▪ (string) varSysPartitionRemovableRecordKeyRefType ► System Partition Removable Record Key Reference Type          |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (int)    varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function setUploadPointer($varUserSession, string $varID = null, string $varSysPartitionRemovableRecordKeyRefType = null)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Create directory');
                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    if($varID)
                        {
                        $varData= explode(\App\Helpers\ZhtHelper\System\Helper_Environment::getBackEndConfigEnvironment($varUserSession, 'TAG_DATA_SEPARATOR_FILE_STAGING_AREA'), $varID);
                        $varPointer_RefID = $varData[0];
                        $varStagingArea_Action = explode('::', $varData[1])[0];
                        $varStagingArea_RefRPK = explode('::', $varData[1])[1];
                        $varBranch_RefID = (\App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken($varUserSession))['branchID'];

                        switch($varStagingArea_Action)
                            {
                            case 'OverWrite':
                                {
                                //---> Penambahan Data pada TblLog_FileUpload_Object
                                $varObject_RefID = (new \App\Models\Database\SchData_OLTP_DataAcquisition\TblLog_FileUpload_Object)->setDataInsert(
                                    $varUserSession, 
                                    null, 
                                    $varSysPartitionRemovableRecordKeyRefType,
                                    $varBranch_RefID, 
                                    $varStagingArea_RefRPK
                                    )['SignRecordID'];

                                //---> Penambahan Data pada TblLog_FileUpload_ObjectDetail
                                $varBufferData = (new \App\Models\Database\SchSysConfig\General())->getDataList_RotateLog_FileUploadStagingAreaDetail(
                                    $varUserSession, 
                                    $varStagingArea_RefRPK
                                    );
                                for($i=0; $i!=count($varBufferData); $i++)
                                    {
                                    $varObjectDetail_RefID = (new \App\Models\Database\SchData_OLTP_DataAcquisition\TblLog_FileUpload_ObjectDetail())->setDataInsert(
                                        $varUserSession, 
                                        null, 
                                        $varSysPartitionRemovableRecordKeyRefType, 
                                        $varBranch_RefID, 
                                        $varObject_RefID, 
                                        $varBufferData[$i]['Sequence'], 
                                        $varBufferData[$i]['Name'], 
                                        $varBufferData[$i]['Size'], 
                                        $varBufferData[$i]['MIME'], 
                                        $varBufferData[$i]['Extension'], 
                                        $varBufferData[$i]['LastModifiedDateTimeTZ'], 
                                        $varBufferData[$i]['LastModifiedUnixTimestamp'],
                                        null
                                        )['SignRecordID'];

                                    //---> Pemindahan File dari Staging Area ke Archive
                                    \App\Helpers\ZhtHelper\CloudStorage\Helper_MinIO::moveFile(
                                        $varUserSession, 
                                        'StagingArea/'.$varStagingArea_RefRPK.'/'.$varBufferData[$i]['Sys_RPK'], 
                                        'Archive/'.$varObject_RefID.'/'.$varObjectDetail_RefID
                                        );
                                    }
                                break;
                                }
                            default:
                                {
                                break;
                                }
                            }

                        //---> Penambahan atau Update Data pada TblLog_FileUpload_Pointer
                        if(!$varPointer_RefID)
                            {
                            $varPointer_RefID = (new \App\Models\Database\SchData_OLTP_DataAcquisition\TblLog_FileUpload_Pointer())->setDataInsert(
                                $varUserSession, 
                                null, 
                                $varSysPartitionRemovableRecordKeyRefType, 
                                $varBranch_RefID, 
                                $varObject_RefID
                                )['SignRecordID'];
                            }
                        else {
                            (new \App\Models\Database\SchData_OLTP_DataAcquisition\TblLog_FileUpload_Pointer())->setDataUpdate(
                                $varUserSession, 
                                $varPointer_RefID, 
                                null, 
                                $varSysPartitionRemovableRecordKeyRefType, 
                                $varBranch_RefID, 
                                $varObject_RefID
                                );
                            }
                        $varReturn = $varPointer_RefID;
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