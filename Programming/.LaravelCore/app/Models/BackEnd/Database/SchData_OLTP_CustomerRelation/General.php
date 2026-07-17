<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Models                                                                                                    |
| ▪ Name Space : \App\Models\Database\SchData_OLTP_CustomerRelation                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2020 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Models\Database\SchData_OLTP_CustomerRelation
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : General                                                                                                      |
    | ▪ Description : Menangani Models Database ► SchData_OLTP_CustomerRelation ► Non Specific Table                               |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class General //extends \Illuminate\Database\Eloquent\Model
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataList_Customer                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Creation Date   : 2021-02-16                                                                                           |
        | ▪ Last Update     : 2021-02-16                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pelanggan                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ------------------------------                                                                                      |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_Customer(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession, 
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-CustomerRelation.Func_GetDataList_Customer',
                            [
                                [$varSysBranch_RefID, 'bigint' ],

                                [$varPickStatement, 'varchar'],
                                [$varSortStatement, 'varchar'],
                                [$varFilterStatement, 'varchar'],
                                [$varPagingStatement, 'varchar']
                            ]
                            )
                        );                

                return
                    $varReturn;
                }

            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataList_SalesOrder                                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Creation Date   : 2021-05-27                                                                                           |
        | ▪ Last Update     : 2021-05-27                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Sales Order                                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ------------------------------                                                                                      |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_SalesOrder(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession, 
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-CustomerRelation.Func_GetDataList_SalesOrder',
                            [
                                [$varSysBranch_RefID, 'bigint' ],

                                [$varPickStatement, 'varchar'],
                                [$varSortStatement, 'varchar'],
                                [$varFilterStatement, 'varchar'],
                                [$varPagingStatement, 'varchar']
                            ]
                            )
                        );                

                return
                    $varReturn;
                }

            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataPickList_Customer                                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-10-12                                                                                           |
        | ▪ Creation Date   : 2022-10-12                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Customer                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_Customer(
            $varUserSession, int $varSysBranch_RefID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession, 
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-CustomerRelation.Func_GetDataPickList_Customer',
                            [
                                [$varSysBranch_RefID, 'bigint' ]
                            ]
                            )
                        );

                return
                    $varReturn;
                }

            catch (\Exception $ex) {
                return [];
                }
            }
        
        

        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataPickList_SalesContract_LatestVersion                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2026-06-15                                                                                           |
        | ▪ Creation Date   : 2026-06-15                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Sales Contract Versi Terakhir                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_SalesContract_LatestVersion(
            $varUserSession, int $varSysBranch_RefID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-CustomerRelation.Func_GetDataPickList_SalesContract',
                            [
                                [$varSysBranch_RefID, 'bigint']
                            ]
                            )
                        );

                return
                    $varReturn;
                }

            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataList_SalesContractDetail_LatestVersion                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2026-06-15                                                                                           |
        | ▪ Creation Date   : 2026-06-15                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Detail Sales Contract Versi Terakhir                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSalesContract_RefID ► Sales Contract ID                                                               |
        |        ------------------------------                                                                                    |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_SalesContractDetail_LatestVersion(
            $varUserSession, int $varSalesContract_RefID = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-CustomerRelation.Func_GetDataList_SalesContractDetail',
                            [
                                [$varSalesContract_RefID, 'bigint' ],
                            ]
                            )
                        );

                return
                    $varReturn;
                }

            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getReport_Form_DataList_SalesContract_LatestVersion                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2026-07-17                                                                                           |
        | ▪ Creation Date   : 2026-07-17                                                                                           |
        | ▪ Description     : Mendapatkan Laporan Form - Daftar Kontrak Penjualan (Sales Contract) Versi Terakhir                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ------------------------------                                                                                      |
        |      ▪ (int)    varPagination_PageSize ► Pagination Page Size                                                            |
        |      ▪ (int)    varPagination_PageShow ► Pagination Page Show                                                            |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varBusinessDocumentNumber ► Business Document Number                                                     |
        |      ▪ (string) varDocumentDateStart ► Business Document Start Date                                                      |
        |      ▪ (string) varDocumentDateFinish ► Business Document Finish Date                                                    |
        |      ▪ (string) varRequesterName ► Requester Name                                                                        |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getReport_Form_DataList_SalesContract_LatestVersion(
            $varUserSession, int $varSysBranch_RefID,
            int $varPagination_PageSize = null, int $varPagination_PageShow = null,
            string $varBusinessDocumentNumber = null, string $varDocumentDateStart = null, string $varDocumentDateFinish = null, string $varRequesterName = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-CustomerRelation.Func_GetReport_DataList_SalesContract',
                            [
                                [$varUserSession, 'bigint'],
                                [$varSysBranch_RefID, 'bigint'],

                                [$varPagination_PageSize, 'bigint'],
                                [$varPagination_PageShow, 'bigint'],

                                [$varBusinessDocumentNumber, 'varchar'],
                                [$varDocumentDateStart, 'date'],
                                [$varDocumentDateFinish, 'date'],
                                [$varRequesterName, 'varchar']
                            ]
                            )
                        );

                $varReturn['data'] =
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        $varReturn['data'][0]['Func_GetReport_DataList_SalesContract']
                        );

                return
                     $varReturn;
                }

            catch (\Exception $ex) {
                return
                    [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getReport_Form_DataPickList_SalesContract_LatestVersion                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2026-07-17                                                                                           |
        | ▪ Creation Date   : 2026-07-17                                                                                           |
        | ▪ Description     : Mendapatkan Laporan Form - Daftar Pilihan Kontrak Penjualan (Sales Contract) Versi Terakhir          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ------------------------------                                                                                      |
        |      ▪ (int)    varPagination_PageSize ► Pagination Page Size                                                            |
        |      ▪ (int)    varPagination_PageShow ► Pagination Page Show                                                            |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varBusinessDocumentNumber ► Business Document Number                                                     |
        |      ▪ (string) varDocumentDateStart ► Document Date Start                                                               |
        |      ▪ (string) varDocumentDateFinish ► Document Date Finish                                                             |
        |      ▪ (string) varRequesterName ► Requester Name                                                                        |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getReport_Form_DataPickList_SalesContract_LatestVersion(
            $varUserSession, int $varSysBranch_RefID,
            int $varPagination_PageSize = null, int $varPagination_PageShow = null,
            string $varBusinessDocumentNumber = null, string $varDocumentDateStart = null, string $varDocumentDateFinish = null, string $varRequesterName = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-CustomerRelation.Func_GetReport_DataPickList_SalesContract',
                            [
                                [$varUserSession, 'bigint'],
                                [$varSysBranch_RefID, 'bigint'],

                                [$varPagination_PageSize, 'bigint'],
                                [$varPagination_PageShow, 'bigint'],

                                [$varBusinessDocumentNumber, 'varchar'],
                                [$varDocumentDateStart, 'date'],
                                [$varDocumentDateFinish, 'date'],
                                [$varRequesterName, 'varchar']
                            ]
                            )
                        );

                $varReturn['data'] =
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        $varReturn['data'][0]['Func_GetReport_DataPickList_SalesContract']
                        );

                return
                     $varReturn;
                }

            catch (\Exception $ex) {
                return
                    [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getReport_Form_DocumentForm_SalesContractSummary                                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2026-07-16                                                                                           |
        | ▪ Creation Date   : 2026-06-17                                                                                           |
        | ▪ Description     : Mendapatkan Laporan Form - Form Dokumen Sales Contract                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ▪ (string)    varCombinedBudgetCode ► Combined Budget Code                                                          |
        |      ▪ (string)    varStartDate ► Start Date                                                                             |
        |      ▪ (string)    varEndDate ► End Date                                                                                 |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getReport_Form_DocumentForm_SalesContractSummary(
		$varUserSession, int $varSysBranch_RefID, string  $varCombinedBudgetCode = null, string  $varStartDate = null, string  $varEndDate = null,
		array $varPagingStatement = null
            )
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-CustomerRelation.Func_GetReport_DocForm_SalesContractSummary',
                            [
                                [$varCombinedBudgetCode, 'varchar' ],
                                [$varStartDate, 'varchar'],
                                [$varEndDate, 'varchar'],
                                [$varPagingStatement['limit'], 'varchar'],
                                [$varPagingStatement['offset'], 'bigint']
                            ]
                            )
                        );
	            $varReturn['totalRecords'] = $varReturn['data'][0]['TotalRecords'];

                return $varReturn;
                }
            catch (\Exception $ex) {
                return [];
                }
            }
        }
    }