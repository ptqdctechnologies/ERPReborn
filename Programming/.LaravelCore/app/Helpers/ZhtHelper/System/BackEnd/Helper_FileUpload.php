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
        public static function setUploadData($varUserSession, string $varID, string $varSysPartitionRemovableRecordKeyRefType = null)
            {
            $varData= explode(\App\Helpers\ZhtHelper\System\Helper_Environment::getBackEndConfigEnvironment($varUserSession, 'TAG_DATA_SEPARATOR_FILE_STAGING_AREA'), $varID);
            $varPointer_RefID = $varData[0];
            $varStagingArea_RefRPK = $varData[1];
            $varBranch_RefID = (\App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken($varUserSession))['branchID'];
            
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
                (new \App\Models\Database\SchData_OLTP_DataAcquisition\TblLog_FileUpload_ObjectDetail())->setDataInsert(
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
                    $varBufferData[$i]['LastModifiedUnixTimestamp']
                    );
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
           
            return $varPointer_RefID;
            }
        }
    }