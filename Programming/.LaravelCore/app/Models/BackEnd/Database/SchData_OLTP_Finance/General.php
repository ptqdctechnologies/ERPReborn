<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Models                                                                                                    |
| ▪ Name Space : \App\Models\Database\SchData_OLTP_Finance                                                                         |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2021 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Models\Database\SchData_OLTP_Finance
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : General                                                                                                      |
    | ▪ Description : Menangani Models Database ► SchData_OLTP_Finance ► Non Specific Table                                        |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class General
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataEntities_Underlying_PaymentDetail                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-07-15                                                                                           |
        | ▪ Creation Date   : 2022-07-15                                                                                           |
        | ▪ Description     : Get Data Entities - Underlying - Payment Detail                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysID ► System Record ID                                                                              |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataEntities_Underlying_PaymentDetail(
            $varUserSession,
            string $varIDSet)
            {
            try {
                $varFunctionName = 'SchData-OLTP-Finance.Func_GetDataEntities_Underlying_PaymentDetail';

                $varTemp =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            $varFunctionName,
                                [
                                    [$varUserSession, 'bigint'],
                                    [$varIDSet, 'bigint[]']
                                ]
                            )
                        );

                for ($i=0; $i!=count($varTemp['data']); $i++)
                    {
                    $varReturn[$i] =
                        \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                            $varUserSession,
                            $varTemp['data'][$i][explode('.', $varFunctionName)[1]]);
                    }

                return $varReturn;
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataEntities_Underlying_PaymentInstructionDetail                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-09-30                                                                                           |
        | ▪ Creation Date   : 2022-09-30                                                                                           |
        | ▪ Description     : Get Data Entities - Underlying - Payment InstructionDetail                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysID ► System Record ID                                                                              |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataEntities_Underlying_PaymentInstructionDetail(
            $varUserSession,
            string $varIDSet)
            {
            try {
                $varFunctionName = 'SchData-OLTP-Finance.Func_GetDataEntities_Underlying_PaymentInstructionDetail';

                $varTemp =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            $varFunctionName,
                                [
                                    [$varUserSession, 'bigint'],
                                    [$varIDSet, 'bigint[]']
                                ]
                            )
                        );

                for ($i=0; $i!=count($varTemp['data']); $i++)
                    {
                    $varReturn[$i] =
                        \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                            $varUserSession,
                            $varTemp['data'][$i][explode('.', $varFunctionName)[1]]);
                    }

                return $varReturn;
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataList_Advance_AllVersion                                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2024-10-16                                                                                           |
        | ▪ Creation Date   : 2024-10-16                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Uang Muka (Advance) Semua Versi                                                   |
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
        public function getDataList_Advance_AllVersion(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetDataList_Advance',
                            [
                                [$varSysBranch_RefID, 'bigint'],

                                [TRUE, 'boolean'],

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
        | ▪ Method Name     : getReport_Form_DataList_Advance_LatestVersion                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-11-05                                                                                           |
        | ▪ Creation Date   : 2025-11-05                                                                                           |
        | ▪ Description     : Mendapatkan Laporan Form - Daftar Uang Muka (Advance) Versi Terakhir                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ------------------------------                                                                                      |
        |      ▪ (int)    varPagination_PageSize ► Pagination Page Size                                                            |
        |      ▪ (int)    varPagination_PageShow ► Pagination Page Show                                                            |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varBusinessDocumentNumber ► Business Document Number                                                     |
        |      ▪ (int)    varCombinedBudget_RefID ► Combined Budget Reference ID                                                   |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getReport_Form_DataList_Advance_LatestVersion(
            $varUserSession, int $varSysBranch_RefID,
            int $varPagination_PageSize = null, int $varPagination_PageShow = null,
            string $varBusinessDocumentNumber = null, int $varCombinedBudget_RefID = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetReport_DataList_Advance',
                            [
                                [$varSysBranch_RefID, 'bigint'],

                                [$varPagination_PageSize, 'bigint'],
                                [$varPagination_PageShow, 'bigint'],

                                [$varBusinessDocumentNumber, 'varchar'],
                                [$varCombinedBudget_RefID, 'bigint']
                            ]
                            )
                        );

                $varReturn['data'] =
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        $varReturn['data'][0]['Func_GetReport_DataList_Advance']
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
        | ▪ Method Name     : getReport_Form_DataList_AdvanceSettlement_LatestVersion                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-11-05                                                                                           |
        | ▪ Creation Date   : 2025-11-05                                                                                           |
        | ▪ Description     : Mendapatkan Laporan Form - Daftar Uang Muka (Advance) Versi Terakhir                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ------------------------------                                                                                      |
        |      ▪ (int)    varPagination_PageSize ► Pagination Page Size                                                            |
        |      ▪ (int)    varPagination_PageShow ► Pagination Page Show                                                            |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varBusinessDocumentNumber ► Business Document Number                                                     |
        |      ▪ (int)    varCombinedBudget_RefID ► Combined Budget Reference ID                                                   |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getReport_Form_DataList_AdvanceSettlement_LatestVersion(
            $varUserSession, int $varSysBranch_RefID,
            int $varPagination_PageSize = null, int $varPagination_PageShow = null,
            string $varBusinessDocumentNumber = null, int $varCombinedBudget_RefID = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetReport_DataList_AdvanceSettlement',
                            [
                                [$varSysBranch_RefID, 'bigint'],

                                [$varPagination_PageSize, 'bigint'],
                                [$varPagination_PageShow, 'bigint'],

                                [$varBusinessDocumentNumber, 'varchar'],
                                [$varCombinedBudget_RefID, 'bigint']
                            ]
                            )
                        );

                $varReturn['data'] =
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        $varReturn['data'][0]['Func_GetReport_DataList_AdvanceSettlement']
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
        | ▪ Method Name     : getDataList_Advance_LatestVersion                                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2024-10-16                                                                                           |
        | ▪ Creation Date   : 2022-05-31                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Uang Muka (Advance) Versi Terakhir                                                |
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
        public function getDataList_Advance_LatestVersion(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetDataList_Advance',
                            [
                                [$varSysBranch_RefID, 'bigint'],

                                [FALSE, 'boolean'],

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
        | ▪ Method Name     : getDataList_AdvanceDetail                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-06-02                                                                                           |
        | ▪ Creation Date   : 2022-06-02                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Advance                                                                           |
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
        public function getDataList_AdvanceDetail(
            $varUserSession, int $varSysBranch_RefID,
            int $varAdvance_RefID = null,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetDataList_AdvanceDetail',
                            [
                                [$varSysBranch_RefID, 'bigint' ],

                                [$varAdvance_RefID, 'bigint'],

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
        | ▪ Method Name     : getDataList_AdvanceDetailComplex                                                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-06-02                                                                                           |
        | ▪ Creation Date   : 2022-06-02                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Advance                                                                           |
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
        public function getDataList_AdvanceDetailComplex(
            $varUserSession, int $varSysBranch_RefID,
            int $varAdvance_RefID = null,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetDataList_AdvanceDetailComplex',
                            [
                                [$varSysBranch_RefID, 'bigint' ],

                                [$varAdvance_RefID, 'bigint'],

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
        | ▪ Method Name     : getDataList_ReimbursementDetail_LatestVersion                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2025-08-18                                                                                           |
        | ▪ Creation Date   : 2025-08-18                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Detail Reimbursement Versi Terakhir                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varReimbursement_RefID ► Reimbursement ID                                                                |
        |        ------------------------------                                                                                    |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_ReimbursementDetail_LatestVersion(
            $varUserSession, int $varReimbursement_RefID = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetDataList_ReimbursementDetail',
                            [
                                [$varReimbursement_RefID, 'bigint' ],
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
        | ▪ Method Name     : getDataList_CreditNoteDetail_LatestVersion                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2025-08-25                                                                                           |
        | ▪ Creation Date   : 2025-08-25                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Detail Credit Note Versi Terakhir                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varCreditNote_RefID ► CreditNote ID                                                                      |
        |        ------------------------------                                                                                    |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_CreditNoteDetail_LatestVersion(
            $varUserSession, int $varCreditNote_RefID = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetDataList_CreditNoteDetail',
                            [
                                [$varCreditNote_RefID, 'bigint' ],
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
        | ▪ Method Name     : getDataList_DebitNoteDetail_LatestVersion                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2025-09-03                                                                                           |
        | ▪ Creation Date   : 2025-09-03                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Detail Debit Note Versi Terakhir                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varDebitNote_RefID ► DebitNote ID                                                                        |
        |        ------------------------------                                                                                    |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_DebitNoteDetail_LatestVersion(
            $varUserSession, int $varDebitNote_RefID = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetDataList_DebitNoteDetail',
                            [
                                [$varDebitNote_RefID, 'bigint' ],
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
        | ▪ Method Name     : getDataList_LoanDetail_LatestVersion                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2025-09-12                                                                                           |
        | ▪ Creation Date   : 2025-09-12                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Detail Credit Note Versi Terakhir                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varLoan_RefID ► Loan ID                                                                      |
        |        ------------------------------                                                                                    |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_LoanDetail_LatestVersion(
            $varUserSession, int $varLoan_RefID = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetDataList_LoanDetail',
                            [
                                [$varLoan_RefID, 'bigint' ],
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
        | ▪ Method Name     : getDataList_LoanSettlementDetail_LatestVersion                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2025-09-18                                                                                           |
        | ▪ Creation Date   : 2025-09-18                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Detail Credit Note Versi Terakhir                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varLoanSettlement_RefID ► LoanSettlement ID                                                              |
        |        ------------------------------                                                                                    |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_LoanSettlementDetail_LatestVersion(
            $varUserSession, int $varLoanSettlement_RefID = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetDataList_LoanSettlementDetail',
                            [
                                [$varLoanSettlement_RefID, 'bigint' ],
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
        | ▪ Method Name     : getDataList_PaymentInstructionDetail_LatestVersion                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2025-11-13                                                                                           |
        | ▪ Creation Date   : 2025-10-15                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Detail Credit Note Versi Terakhir                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varPaymentInstruction_RefID ► PaymentInstruction ID                                                      |
        |        ------------------------------                                                                                    |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_PaymentInstructionDetail_LatestVersion(
            $varUserSession, int $varPaymentInstruction_RefID = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetDataList_PaymentInstructionDetail_NEW',
                            [
                                [$varPaymentInstruction_RefID, 'bigint' ],
                            ]
                            )
                        );
                    $resultArray = $varReturn['data'];

                    // Description: Generate API.
                    $varReturn['data'] = [];
                    $idxArray = 0;
                    foreach ($resultArray as $key => $value) {
                        $varReturn['data'][$idxArray]['documentNumber'] = $value["DocumentNumber"];
                        $varReturn['data'][$idxArray]['date'] = $value["Date"];
                        $varReturn['data'][$idxArray]['po_Number'] = $value["PO_Number"];
                        $varReturn['data'][$idxArray]['currency_RefID'] = $value["Currency_RefID"];
                        $varReturn['data'][$idxArray]['currencySymbol'] = $value["CurrencySymbol"];
                        $varReturn['data'][$idxArray]['currencyValue'] = $value["CurrencyValue"];
                        $varReturn['data'][$idxArray]['currencyExchangeRate'] = $value["CurrencyExchangeRate"];
                        $varReturn['data'][$idxArray]['log_FileUpload_Pointer_RefID'] = $value["Log_FileUpload_Pointer_RefID"];
                        $varReturn['data'][$idxArray]['supplierInvoiceNumber'] = $value["SupplierInvoiceNumber"];
                        $varReturn['data'][$idxArray]['supplierBank_Name'] = $value["SupplierBank_Name"];
                        $varReturn['data'][$idxArray]['supplierBank_Account'] = $value["SupplierBank_Account"];
                        $varReturn['data'][$idxArray]['supplierBank_AccountName'] = $value["SupplierBank_AccountName"];
                        $varReturn['data'][$idxArray]['receiptStatus'] = $value["ReceiptStatus"];
                        $varReturn['data'][$idxArray]['contractStatus'] = $value["ContractStatus"];
                        $varReturn['data'][$idxArray]['vatStatus'] = $value["VatStatus"];
                        $varReturn['data'][$idxArray]['vatValue'] = $value["VatValue"];
                        $varReturn['data'][$idxArray]['vatNumber'] = $value["VatNumber"];
                        $varReturn['data'][$idxArray]['fatPatDoStatus'] = $value["FatPatDoStatus"];
                        $varReturn['data'][$idxArray]['assetStatus'] = $value["AssetStatus"];
                        $varReturn['data'][$idxArray]['assetCategory'] = $value["AssetCategory"];
                        $varReturn['data'][$idxArray]['depreciationMethod'] = $value["DepreciationMethod"];
                        $varReturn['data'][$idxArray]['depreciationRate'] = $value["DepreciationRate"];
                        $varReturn['data'][$idxArray]['depreciationCOA_RefID'] = $value["DepreciationCOA_RefID"];
                        $varReturn['data'][$idxArray]['depreciationCOA_Code'] = $value["DepreciationCOA_Code"];
                        $varReturn['data'][$idxArray]['depreciationCOA_Name'] = $value["DepreciationCOA_Name"];
                        $varReturn['data'][$idxArray]['deduction'] = $value["Deduction"];
                        $varReturn['data'][$idxArray]['totalAP'] = $value["TotalAP"];
                        $varReturn['data'][$idxArray]['notes'] = $value["Notes"];
                        $varReturn['data'][$idxArray]['combinedBudgetSectionDetail_RefID'] = $value["CombinedBudgetSectionDetail_RefID"];
                        $varReturn['data'][$idxArray]['product_RefID'] = $value["Product_RefID"];
                        $varReturn['data'][$idxArray]['productName'] = $value["ProductName"];
                        $varReturn['data'][$idxArray]['productCode'] = $value["ProductCode"];
                        $varReturn['data'][$idxArray]['quantity'] = $value["Quantity"];
                        $varReturn['data'][$idxArray]['uom'] = $value["UOM"];
                        $varReturn['data'][$idxArray]['productUnitPriceCurrencyValue'] = $value["ProductUnitPriceCurrencyValue"];
                        $varReturn['data'][$idxArray]['productUnitPriceCurrencyExchangeRate'] = $value["ProductUnitPriceCurrencyExchangeRate"];
                        $varReturn['data'][$idxArray]['productUnitPriceBaseCurrencyValue'] = $value["ProductUnitPriceBaseCurrencyValue"];
                        $varReturn['data'][$idxArray]['wht'] = $value["WHT"];
                        $varReturn['data'][$idxArray]['total'] = $value["Total"];
                        $varReturn['data'][$idxArray]['chartOfAccount_RefID'] = $value["ChartOfAccount_RefID"];
                        $varReturn['data'][$idxArray]['chartOfAccountCode'] = $value["ChartOfAccountCode"];
                        $varReturn['data'][$idxArray]['chartOfAccountName'] = $value["ChartOfAccountName"];
                        $varReturn['data'][$idxArray]['businessDocument_RefID'] = $value["BusinessDocument_RefID"];
                        $varReturn['data'][$idxArray]['dateUpdate'] = $value["DateUpdate"];
                        $varReturn['data'][$idxArray]['supplier_RefID'] = $value["Supplier_RefID"];
                        $varReturn['data'][$idxArray]['supplierName'] = $value["SupplierName"];
                        $varReturn['data'][$idxArray]['supplierCode'] = $value["SupplierCode"];
                        $varReturn['data'][$idxArray]['purchaseOrderDetail_RefID'] = $value["PurchaseOrderDetail_RefID"];
                        $varReturn['data'][$idxArray]['purchaseOrderDetailQuantity'] = $value["PurchaseOrderDetailQuantity"];
                        $varReturn['data'][$idxArray]['purchaseOrderDetailPrice'] = $value["PurchaseOrderDetailPrice"];
                        $varReturn['data'][$idxArray]['paymentTerm'] = $value["PaymentTerm"];
                        $varReturn['data'][$idxArray]['purchaseOrderDeliveryTo'] = json_decode($value["PurchaseOrderDeliveryTo"]);
                        $varReturn['data'][$idxArray]['depreciationYears'] = $value["DepreciationYears"];
                        $varReturn['data'][$idxArray]['assetCategoryName'] = $value["AssetCategoryName"];
                        $varReturn['data'][$idxArray]['assetCategoryCode'] = $value["AssetCategoryCode"];
                        $varReturn['data'][$idxArray]['sys_ID'] = $value["Sys_ID"];
                        $varReturn['data'][$idxArray]['paymentInstruction_RefID'] = $value["PaymentInstruction_RefID"];
                        $varReturn['data'][$idxArray]['assetCategory_RefID'] = $value["AssetCategory_RefID"];
                        $varReturn['data'][$idxArray]['depreciationMethod_RefID'] = $value["DepreciationMethod_RefID"];
                        $varReturn['data'][$idxArray]['depreciationAssetCategory_RefID'] = $value["DepreciationAssetCategory_RefID"];
                        $varReturn['data'][$idxArray]['supplierAddress'] = $value["SupplierAddress"];
                        $varReturn['data'][$idxArray]['supplierBank_Code'] = $value["SupplierBank_Code"];
                        $varReturn['data'][$idxArray]['supplierBank_AccountNumber'] = $value["SupplierBank_AccountNumber"];
                        $varReturn['data'][$idxArray]['quantityUnit_RefID'] = $value["QuantityUnit_RefID"];
                        $varReturn['data'][$idxArray]['productUnitPriceCurrency_RefID'] = $value["ProductUnitPriceCurrency_RefID"];
                        $idxArray++;
                    }

                return
                    $varReturn['data'];
                }

            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataList_AdvancePayment_AllVersion                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-10-24                                                                                           |
        | ▪ Creation Date   : 2024-10-24                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pembayaran Uang Muka (Advance Payment) Semua Versi                                |
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
        public function getDataList_AdvancePayment_AllVersion(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetDataList_AdvancePayment',
                            [
                                [$varSysBranch_RefID, 'bigint'],

                                [TRUE, 'boolean'],

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
        | ▪ Method Name     : getDataList_AdvancePayment_LatestVersion                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-10-24                                                                                           |
        | ▪ Creation Date   : 2024-10-24                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pembayaran Uang Muka (Advance Payment) Versi Terakhir                             |
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
        public function getDataList_AdvancePayment_LatestVersion(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetDataList_AdvancePayment',
                            [
                                [$varSysBranch_RefID, 'bigint'],

                                [FALSE, 'boolean'],

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
        | ▪ Method Name     : getDataList_AdvanceSettlement_AllVersion                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-10-24                                                                                           |
        | ▪ Creation Date   : 2024-10-24                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pertanggungjawaban Uang Muka (Advance Settlement) Semua Versi                     |
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
        public function getDataList_AdvanceSettlement_AllVersion(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetDataList_AdvanceSettlement',
                            [
                                [$varSysBranch_RefID, 'bigint'],

                                [TRUE, 'boolean'],

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
        | ▪ Method Name     : getDataList_AdvanceSettlement_LatestVersion                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-10-24                                                                                           |
        | ▪ Creation Date   : 2024-10-24                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pertangungjawaban Uang Muka (Advance Settlement) Versi Terakhir                   |
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
        public function getDataList_AdvanceSettlement_LatestVersion(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetDataList_AdvanceSettlement',
                            [
                                [$varSysBranch_RefID, 'bigint'],

                                [FALSE, 'boolean'],

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
        | ▪ Method Name     : getDataList_CreditNote_AllVersion                                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-10-24                                                                                           |
        | ▪ Creation Date   : 2024-10-24                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Nota Kredit (Credit Note) Semua Versi                                             |
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
        public function getDataList_CreditNote_AllVersion(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetDataList_CreditNote',
                            [
                                [$varSysBranch_RefID, 'bigint'],

                                [TRUE, 'boolean'],

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
        | ▪ Method Name     : getDataList_CreditNote_LatestVersion                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-10-24                                                                                           |
        | ▪ Creation Date   : 2024-10-24                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Nota Kredit (Credit Note) Versi Terakhir                                          |
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
        public function getDataList_CreditNote_LatestVersion(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetDataList_CreditNote',
                            [
                                [$varSysBranch_RefID, 'bigint'],

                                [FALSE, 'boolean'],

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
        | ▪ Method Name     : getDataList_DebitNote_AllVersion                                                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-10-24                                                                                           |
        | ▪ Creation Date   : 2024-10-24                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Nota Debit (Debit Note) Semua Versi                                               |
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
        public function getDataList_DebitNote_AllVersion(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetDataList_DebitNote',
                            [
                                [$varSysBranch_RefID, 'bigint'],

                                [TRUE, 'boolean'],

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
        | ▪ Method Name     : getDataList_DebitNote_LatestVersion                                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-10-24                                                                                           |
        | ▪ Creation Date   : 2024-10-24                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Nota Debit (Debit Note) Versi Terakhir                                            |
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
        public function getDataList_DebitNote_LatestVersion(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetDataList_DebitNote',
                            [
                                [$varSysBranch_RefID, 'bigint'],

                                [FALSE, 'boolean'],

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
        | ▪ Method Name     : getDataList_Payment_AllVersion                                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-10-24                                                                                           |
        | ▪ Creation Date   : 2024-10-24                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pembayaran (Payment) Semua Versi                                                  |
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
        public function getDataList_Payment_AllVersion(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetDataList_Payment',
                            [
                                [$varSysBranch_RefID, 'bigint'],

                                [TRUE, 'boolean'],

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
        | ▪ Method Name     : getDataList_Payment_LatestVersion                                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-10-24                                                                                           |
        | ▪ Creation Date   : 2024-10-24                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pembayaran (Payment) Versi Terakhir                                               |
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
        public function getDataList_Payment_LatestVersion(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetDataList_Payment',
                            [
                                [$varSysBranch_RefID, 'bigint'],

                                [FALSE, 'boolean'],

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
        | ▪ Method Name     : getDataList_PaymentInstruction_AllVersion                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-10-24                                                                                           |
        | ▪ Creation Date   : 2024-10-24                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Instruksi Pembayaran (PaymentInstruction) Semua Versi                             |
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
        public function getDataList_PaymentInstruction_AllVersion(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetDataList_PaymentInstruction',
                            [
                                [$varSysBranch_RefID, 'bigint'],

                                [TRUE, 'boolean'],

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
        | ▪ Method Name     : getDataList_PaymentInstruction_LatestVersion                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-10-24                                                                                           |
        | ▪ Creation Date   : 2024-10-24                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Instruksi Pembayaran (PaymentInstruction) Versi Terakhir                          |
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
        public function getDataList_PaymentInstruction_LatestVersion(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetDataList_PaymentInstruction',
                            [
                                [$varSysBranch_RefID, 'bigint'],

                                [FALSE, 'boolean'],

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
        | ▪ Method Name     : getDataList_PurchaseInvoiceBillingPurpose                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2022-04-21                                                                                           |
        | ▪ Creation Date   : 2022-04-14                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Tujuan Penagihan Invoice Pembelian                                                |
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
        public function getDataList_PurchaseInvoiceBillingPurpose(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetDataList_PurchaseInvoiceBillingPurpose',
                            [
                                [null, 'bigint'],
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
        | ▪ Method Name     : getDataListJSON_Advance_AllVersion                                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-10-16                                                                                           |
        | ▪ Creation Date   : 2024-10-11                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Advance Semua Versi                                                               |
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
        public function getDataListJSON_Advance_AllVersion(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetDataListJSON_Advance',
                            [
                                [$varSysBranch_RefID, 'bigint' ],

                                [TRUE, 'boolean'],

                                [$varPickStatement, 'varchar'],
                                [$varSortStatement, 'varchar'],
                                [$varFilterStatement, 'varchar'],
                                [$varPagingStatement, 'varchar']
                            ]
                            )
                        );

                $varReturn['data'] =
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        $varReturn['data'][0]['Func_GetDataListJSON_Advance']
                        );

                $varReturn['rowCount'] =
                    count($varReturn['data']);

                return
                    $varReturn;
                }

            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataListJSON_Advance_LatestVersion                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-10-16                                                                                           |
        | ▪ Creation Date   : 2024-10-11                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Advance Versi Terakhir                                                            |
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
        public function getDataListJSON_Advance_LatestVersion(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetDataListJSON_Advance',
                            [
                                [$varSysBranch_RefID, 'bigint' ],

                                [FALSE, 'boolean'],

                                [$varPickStatement, 'varchar'],
                                [$varSortStatement, 'varchar'],
                                [$varFilterStatement, 'varchar'],
                                [$varPagingStatement, 'varchar']
                            ]
                            )
                        );

                $varReturn['data'] =
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        $varReturn['data'][0]['Func_GetDataListJSON_Advance']
                        );

                $varReturn['rowCount'] =
                    count($varReturn['data']);

                return
                    $varReturn;
                }

            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataListJSON_AdvancePayment_AllVersion                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-10-16                                                                                           |
        | ▪ Creation Date   : 2024-10-16                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Advance Payment Semua Versi                                                       |
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
        public function getDataListJSON_AdvancePayment_AllVersion(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetDataListJSON_AdvancePayment',
                            [
                                [$varSysBranch_RefID, 'bigint' ],

                                [TRUE, 'boolean'],

                                [$varPickStatement, 'varchar'],
                                [$varSortStatement, 'varchar'],
                                [$varFilterStatement, 'varchar'],
                                [$varPagingStatement, 'varchar']
                            ]
                            )
                        );

                $varReturn['data'] =
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        $varReturn['data'][0]['Func_GetDataListJSON_AdvancePayment']
                        );

                $varReturn['rowCount'] =
                    count($varReturn['data']);

                return
                    $varReturn;
                }

            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataListJSON_AdvancePayment_LatestVersion                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-10-16                                                                                           |
        | ▪ Creation Date   : 2024-10-16                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Advance Payment Versi Terakhir                                                    |
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
        public function getDataListJSON_AdvancePayment_LatestVersion(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetDataListJSON_AdvancePayment',
                            [
                                [$varSysBranch_RefID, 'bigint' ],

                                [FALSE, 'boolean'],

                                [$varPickStatement, 'varchar'],
                                [$varSortStatement, 'varchar'],
                                [$varFilterStatement, 'varchar'],
                                [$varPagingStatement, 'varchar']
                            ]
                            )
                        );

                $varReturn['data'] =
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        $varReturn['data'][0]['Func_GetDataListJSON_AdvancePayment']
                        );

                $varReturn['rowCount'] =
                    count($varReturn['data']);

                return
                    $varReturn;
                }

            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataListJSON_AdvanceSettlement_AllVersion                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-10-16                                                                                           |
        | ▪ Creation Date   : 2024-10-16                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Advance Settlement Semua Versi                                                    |
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
        public function getDataListJSON_AdvanceSettlement_AllVersion(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetDataListJSON_AdvanceSettlement',
                            [
                                [$varSysBranch_RefID, 'bigint' ],

                                [TRUE, 'boolean'],

                                [$varPickStatement, 'varchar'],
                                [$varSortStatement, 'varchar'],
                                [$varFilterStatement, 'varchar'],
                                [$varPagingStatement, 'varchar']
                            ]
                            )
                        );

                $varReturn['data'] =
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        $varReturn['data'][0]['Func_GetDataListJSON_AdvanceSettlement']
                        );

                $varReturn['rowCount'] =
                    count($varReturn['data']);

                return
                    $varReturn;
                }

            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataListJSON_AdvanceSettlement_LatestVersion                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-10-16                                                                                           |
        | ▪ Creation Date   : 2024-10-16                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Advance Settlement Versi Terakhir                                                 |
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
        public function getDataListJSON_AdvanceSettlement_LatestVersion(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetDataListJSON_AdvanceSettlement',
                            [
                                [$varSysBranch_RefID, 'bigint' ],

                                [FALSE, 'boolean'],

                                [$varPickStatement, 'varchar'],
                                [$varSortStatement, 'varchar'],
                                [$varFilterStatement, 'varchar'],
                                [$varPagingStatement, 'varchar']
                            ]
                            )
                        );

                $varReturn['data'] =
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        $varReturn['data'][0]['Func_GetDataListJSON_AdvanceSettlement']
                        );

                $varReturn['rowCount'] =
                    count($varReturn['data']);

                return
                    $varReturn;
                }

            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataList_AdvanceSettlementDetail                                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-08-12                                                                                           |
        | ▪ Creation Date   : 2025-05-15                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Advance                                                                           |
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
        public function getDataList_AdvanceSettlementDetail(
            $varUserSession, int $varSysBranch_RefID,
            int $varAdvanceSettlement_RefID = null,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                       $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetDataList_AdvanceSettlementDetails',
                            [
                                [$varAdvanceSettlement_RefID, 'bigint']
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
        | ▪ Method Name     : getDataListJSON_CreditNote_AllVersion                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-10-17                                                                                           |
        | ▪ Creation Date   : 2024-10-17                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Credit Note Semua Versi                                                           |
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
        public function getDataListJSON_CreditNote_AllVersion(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetDataListJSON_CreditNote',
                            [
                                [$varSysBranch_RefID, 'bigint' ],

                                [TRUE, 'boolean'],

                                [$varPickStatement, 'varchar'],
                                [$varSortStatement, 'varchar'],
                                [$varFilterStatement, 'varchar'],
                                [$varPagingStatement, 'varchar']
                            ]
                            )
                        );

                $varReturn['data'] =
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        $varReturn['data'][0]['Func_GetDataListJSON_CreditNote']
                        );

                $varReturn['rowCount'] =
                    count($varReturn['data']);

                return
                    $varReturn;
                }

            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataListJSON_CreditNote_LatestVersion                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-10-17                                                                                           |
        | ▪ Creation Date   : 2024-10-17                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Credit Note Versi Terakhir                                                        |
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
        public function getDataListJSON_CreditNote_LatestVersion(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetDataListJSON_CreditNote',
                            [
                                [$varSysBranch_RefID, 'bigint' ],

                                [FALSE, 'boolean'],

                                [$varPickStatement, 'varchar'],
                                [$varSortStatement, 'varchar'],
                                [$varFilterStatement, 'varchar'],
                                [$varPagingStatement, 'varchar']
                            ]
                            )
                        );

                $varReturn['data'] =
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        $varReturn['data'][0]['Func_GetDataListJSON_CreditNote']
                        );

                $varReturn['rowCount'] =
                    count($varReturn['data']);

                return
                    $varReturn;
                }

            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataListJSON_DebitNote_AllVersion                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-10-17                                                                                           |
        | ▪ Creation Date   : 2024-10-17                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Debit Note Semua Versi                                                            |
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
        public function getDataListJSON_DebitNote_AllVersion(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetDataListJSON_DebitNote',
                            [
                                [$varSysBranch_RefID, 'bigint' ],

                                [TRUE, 'boolean'],

                                [$varPickStatement, 'varchar'],
                                [$varSortStatement, 'varchar'],
                                [$varFilterStatement, 'varchar'],
                                [$varPagingStatement, 'varchar']
                            ]
                            )
                        );

                $varReturn['data'] =
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        $varReturn['data'][0]['Func_GetDataListJSON_DebitNote']
                        );

                $varReturn['rowCount'] =
                    count($varReturn['data']);

                return
                    $varReturn;
                }

            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataListJSON_DebitNote_LatestVersion                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-10-17                                                                                           |
        | ▪ Creation Date   : 2024-10-17                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Debit Note Versi Terakhir                                                         |
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
        public function getDataListJSON_DebitNote_LatestVersion(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetDataListJSON_DebitNote',
                            [
                                [$varSysBranch_RefID, 'bigint' ],

                                [FALSE, 'boolean'],

                                [$varPickStatement, 'varchar'],
                                [$varSortStatement, 'varchar'],
                                [$varFilterStatement, 'varchar'],
                                [$varPagingStatement, 'varchar']
                            ]
                            )
                        );

                $varReturn['data'] =
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        $varReturn['data'][0]['Func_GetDataListJSON_DebitNote']
                        );

                $varReturn['rowCount'] =
                    count($varReturn['data']);

                return
                    $varReturn;
                }

            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataListJSON_Payment_AllVersion                                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-10-17                                                                                           |
        | ▪ Creation Date   : 2024-10-17                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Payment Semua Versi                                                               |
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
        public function getDataListJSON_Payment_AllVersion(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetDataListJSON_Payment',
                            [
                                [$varSysBranch_RefID, 'bigint' ],

                                [TRUE, 'boolean'],

                                [$varPickStatement, 'varchar'],
                                [$varSortStatement, 'varchar'],
                                [$varFilterStatement, 'varchar'],
                                [$varPagingStatement, 'varchar']
                            ]
                            )
                        );

                $varReturn['data'] =
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        $varReturn['data'][0]['Func_GetDataListJSON_Payment']
                        );

                $varReturn['rowCount'] =
                    count($varReturn['data']);

                return
                    $varReturn;
                }

            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataListJSON_Payment_LatestVersion                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-10-17                                                                                           |
        | ▪ Creation Date   : 2024-10-17                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Payment Versi Terakhir                                                            |
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
        public function getDataListJSON_Payment_LatestVersion(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetDataListJSON_Payment',
                            [
                                [$varSysBranch_RefID, 'bigint' ],

                                [FALSE, 'boolean'],

                                [$varPickStatement, 'varchar'],
                                [$varSortStatement, 'varchar'],
                                [$varFilterStatement, 'varchar'],
                                [$varPagingStatement, 'varchar']
                            ]
                            )
                        );

                $varReturn['data'] =
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        $varReturn['data'][0]['Func_GetDataListJSON_Payment']
                        );

                $varReturn['rowCount'] =
                    count($varReturn['data']);

                return
                    $varReturn;
                }

            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataListJSON_PaymentFunding                                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-04-10                                                                                           |
        | ▪ Creation Date   : 2025-04-10                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Payment Funding                                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ------------------------------                                                                                      |
        |      ▪ (int)    varPayment_RefID ► Payment Reference ID                                                                  |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataListJSON_PaymentFunding(
            $varUserSession, int $varSysBranch_RefID,
            int $varPayment_RefID = null,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetDataListJSON_PaymentFunding',
                            [
                                [$varSysBranch_RefID, 'bigint'],

                                [$varPayment_RefID, 'bigint'],

                                [$varPickStatement, 'varchar'],
                                [$varSortStatement, 'varchar'],
                                [$varFilterStatement, 'varchar'],
                                [$varPagingStatement, 'varchar']
                            ]
                            )
                        );

                $varReturn['data'] =
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        $varReturn['data'][0]['Func_GetDataListJSON_PaymentFunding']
                        );

                $varReturn['rowCount'] =
                    count($varReturn['data']);

                return
                    $varReturn;
                }

            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataListJSON_PaymentFundingDestination                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-04-10                                                                                           |
        | ▪ Creation Date   : 2025-04-10                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Payment Funding Destination                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ------------------------------                                                                                      |
        |      ▪ (int)    varEntity_RefID ► Entity Reference ID                                                                    |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataListJSON_PaymentFundingDestination(
            $varUserSession, int $varSysBranch_RefID,
            int $varEntity_RefID = null,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetDataListJSON_PaymentFundingDestination',
                            [
                                [$varSysBranch_RefID, 'bigint'],

                                [$varEntity_RefID, 'bigint'],

                                [$varPickStatement, 'varchar'],
                                [$varSortStatement, 'varchar'],
                                [$varFilterStatement, 'varchar'],
                                [$varPagingStatement, 'varchar']
                            ]
                            )
                        );

                $varReturn['data'] =
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        $varReturn['data'][0]['Func_GetDataListJSON_PaymentFundingDestination']
                        );

                $varReturn['rowCount'] =
                    count($varReturn['data']);

                return
                    $varReturn;
                }

            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataListJSON_PaymentFundingSource                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-04-10                                                                                           |
        | ▪ Creation Date   : 2025-04-10                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Payment Funding Source                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ------------------------------                                                                                      |
        |      ▪ (int)    varEntity_RefID ► Entity Reference ID                                                                    |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataListJSON_PaymentFundingSource(
            $varUserSession, int $varSysBranch_RefID,
            int $varEntity_RefID = null,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetDataListJSON_PaymentFundingSource',
                            [
                                [$varSysBranch_RefID, 'bigint'],

                                [$varEntity_RefID, 'bigint'],

                                [$varPickStatement, 'varchar'],
                                [$varSortStatement, 'varchar'],
                                [$varFilterStatement, 'varchar'],
                                [$varPagingStatement, 'varchar']
                            ]
                            )
                        );

                $varReturn['data'] =
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        $varReturn['data'][0]['Func_GetDataListJSON_PaymentFundingSource']
                        );

                $varReturn['rowCount'] =
                    count($varReturn['data']);

                return
                    $varReturn;
                }

            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataListJSON_PaymentInstruction_AllVersion                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-10-17                                                                                           |
        | ▪ Creation Date   : 2024-10-17                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Payment Instruction Semua Versi                                                   |
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
        public function getDataListJSON_PaymentInstruction_AllVersion(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetDataListJSON_PaymentInstruction',
                            [
                                [$varSysBranch_RefID, 'bigint' ],

                                [TRUE, 'boolean'],

                                [$varPickStatement, 'varchar'],
                                [$varSortStatement, 'varchar'],
                                [$varFilterStatement, 'varchar'],
                                [$varPagingStatement, 'varchar']
                            ]
                            )
                        );

                $varReturn['data'] =
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        $varReturn['data'][0]['Func_GetDataListJSON_PaymentInstruction']
                        );

                $varReturn['rowCount'] =
                    count($varReturn['data']);

                return
                    $varReturn;
                }

            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataListJSON_PaymentInstruction_LatestVersion                                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-10-17                                                                                           |
        | ▪ Creation Date   : 2024-10-17                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Payment Instruction Versi Terakhir                                                |
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
        public function getDataListJSON_PaymentInstruction_LatestVersion(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetDataListJSON_PaymentInstruction',
                            [
                                [$varSysBranch_RefID, 'bigint' ],

                                [FALSE, 'boolean'],

                                [$varPickStatement, 'varchar'],
                                [$varSortStatement, 'varchar'],
                                [$varFilterStatement, 'varchar'],
                                [$varPagingStatement, 'varchar']
                            ]
                            )
                        );

                $varReturn['data'] =
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        $varReturn['data'][0]['Func_GetDataListJSON_PaymentInstruction']
                        );

                $varReturn['rowCount'] =
                    count($varReturn['data']);

                return
                    $varReturn;
                }

            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataListJSON_PurchaseInvoice                                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-10-25                                                                                           |
        | ▪ Creation Date   : 2024-10-25                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Faktiur Pembelian (Purchase Invoice)                                              |
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
        public function getDataListJSON_PurchaseInvoice(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetDataListJSON_PurchaseInvoice',
                            [
                                [$varSysBranch_RefID, 'bigint' ],

                                [$varPickStatement, 'varchar'],
                                [$varSortStatement, 'varchar'],
                                [$varFilterStatement, 'varchar'],
                                [$varPagingStatement, 'varchar']
                            ]
                            )
                        );

                $varReturn['data'] =
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        $varReturn['data'][0]['Func_GetDataListJSON_PurchaseInvoice']
                        );

                $varReturn['rowCount'] =
                    count($varReturn['data']);

                return
                    $varReturn;
                }

            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataListJSON_SalesInvoice_AllVersion                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-10-28                                                                                           |
        | ▪ Creation Date   : 2024-10-28                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Faktur Penjualan (Sales Invoice) Semua Versi                                      |
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
        public function getDataListJSON_SalesInvoice_AllVersion(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetDataListJSON_SalesInvoice',
                            [
                                [$varSysBranch_RefID, 'bigint' ],

                                [TRUE, 'boolean'],

                                [$varPickStatement, 'varchar'],
                                [$varSortStatement, 'varchar'],
                                [$varFilterStatement, 'varchar'],
                                [$varPagingStatement, 'varchar']
                            ]
                            )
                        );

                $varReturn['data'] =
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        $varReturn['data'][0]['Func_GetDataListJSON_SalesInvoice']
                        );

                $varReturn['rowCount'] =
                    count($varReturn['data']);

                return
                    $varReturn;
                }

            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataListJSON_SalesInvoice_LatestVersion                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-10-17                                                                                           |
        | ▪ Creation Date   : 2024-10-17                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Faktur Penjualan (Sales Invoice) Versi Terakhir                                   |
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
        public function getDataListJSON_SalesInvoice_LatestVersion(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetDataListJSON_SalesInvoice',
                            [
                                [$varSysBranch_RefID, 'bigint' ],

                                [FALSE, 'boolean'],

                                [$varPickStatement, 'varchar'],
                                [$varSortStatement, 'varchar'],
                                [$varFilterStatement, 'varchar'],
                                [$varPagingStatement, 'varchar']
                            ]
                            )
                        );

                $varReturn['data'] =
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        $varReturn['data'][0]['Func_GetDataListJSON_SalesInvoice']
                        );

                $varReturn['rowCount'] =
                    count($varReturn['data']);

                return
                    $varReturn;
                }

            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataListJSON_SalesInvoiceRequisition_AllVersion                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-10-28                                                                                           |
        | ▪ Creation Date   : 2024-10-28                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Faktur Permintaan Penjualan (Sales Invoice Requisition) Semua Versi               |
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
        public function getDataListJSON_SalesInvoiceRequisition_AllVersion(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetDataListJSON_SalesInvoiceRequisition',
                            [
                                [$varSysBranch_RefID, 'bigint' ],

                                [TRUE, 'boolean'],

                                [$varPickStatement, 'varchar'],
                                [$varSortStatement, 'varchar'],
                                [$varFilterStatement, 'varchar'],
                                [$varPagingStatement, 'varchar']
                            ]
                            )
                        );

                $varReturn['data'] =
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        $varReturn['data'][0]['Func_GetDataListJSON_SalesInvoiceRequisition']
                        );

                $varReturn['rowCount'] =
                    count($varReturn['data']);

                return
                    $varReturn;
                }

            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataListJSON_SalesInvoiceRequisition_LatestVersion                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-10-17                                                                                           |
        | ▪ Creation Date   : 2024-10-17                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Permintaan Faktur Penjualan (Sales Invoice Requisition) Versi Terakhir            |
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
        public function getDataListJSON_SalesInvoiceRequisition_LatestVersion(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetDataListJSON_SalesInvoiceRequisition',
                            [
                                [$varSysBranch_RefID, 'bigint' ],

                                [FALSE, 'boolean'],

                                [$varPickStatement, 'varchar'],
                                [$varSortStatement, 'varchar'],
                                [$varFilterStatement, 'varchar'],
                                [$varPagingStatement, 'varchar']
                            ]
                            )
                        );

                $varReturn['data'] =
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        $varReturn['data'][0]['Func_GetDataListJSON_SalesInvoiceRequisition']
                        );

                $varReturn['rowCount'] =
                    count($varReturn['data']);

                return
                    $varReturn;
                }

            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataPickList_Advance_AllVersion                                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2024-10-16                                                                                           |
        | ▪ Creation Date   : 2022-05-31                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Advance Semua Versi                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_Advance_AllVersion(
            $varUserSession, int $varSysBranch_RefID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetDataPickList_Advance',
                            [
                                [$varSysBranch_RefID, 'bigint'],

                                [TRUE, 'boolean']
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
        | ▪ Method Name     : getDataPickList_Advance_LatestVersion                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2024-10-16                                                                                           |
        | ▪ Creation Date   : 2022-05-31                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Advance Versi Terakhir                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_Advance_LatestVersion(
            $varUserSession, int $varSysBranch_RefID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetDataPickList_Advance',
                            [
                                [$varSysBranch_RefID, 'bigint'],

                                [FALSE, 'boolean']
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
        | ▪ Method Name     : getDataPickList_AdvancePayment_AllVersion                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-10-16                                                                                           |
        | ▪ Creation Date   : 2024-10-16                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Advance Payment Semua Versi                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_AdvancePayment_AllVersion(
            $varUserSession, int $varSysBranch_RefID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetDataPickList_AdvancePayment',
                            [
                                [$varSysBranch_RefID, 'bigint'],

                                [TRUE, 'boolean']
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
        | ▪ Method Name     : getDataPickList_AdvancePayment_LatestVersion                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-10-16                                                                                           |
        | ▪ Creation Date   : 2024-10-16                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Advance Payment Versi Terakhir                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_AdvancePayment_LatestVersion(
            $varUserSession, int $varSysBranch_RefID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetDataPickList_AdvancePayment',
                            [
                                [$varSysBranch_RefID, 'bigint'],

                                [FALSE, 'boolean']
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
        | ▪ Method Name     : getDataPickList_AdvanceSettlement_AllVersion                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-10-16                                                                                           |
        | ▪ Creation Date   : 2024-10-16                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Advance Settlement Semua Versi                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_AdvanceSettlement_AllVersion(
            $varUserSession, int $varSysBranch_RefID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetDataPickList_AdvanceSettlement',
                            [
                                [$varSysBranch_RefID, 'bigint'],

                                [TRUE, 'boolean']
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
        | ▪ Method Name     : getDataPickList_AdvanceSettlement_LatestVersion                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-10-16                                                                                           |
        | ▪ Creation Date   : 2024-10-16                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Advance Settlement Versi Terakhir                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_AdvanceSettlement_LatestVersion(
            $varUserSession, int $varSysBranch_RefID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetDataPickList_AdvanceSettlement',
                            [
                                [$varSysBranch_RefID, 'bigint'],

                                [FALSE, 'boolean']
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
        | ▪ Method Name     : getDataPickList_CreditNote_AllVersion                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-10-17                                                                                           |
        | ▪ Creation Date   : 2024-10-17                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Credit Note Semua Versi                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_CreditNote_AllVersion(
            $varUserSession, int $varSysBranch_RefID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetDataPickList_CreditNote',
                            [
                                [$varSysBranch_RefID, 'bigint'],

                                [TRUE, 'boolean']
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
        | ▪ Method Name     : getDataPickList_CreditNote_LatestVersion                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-08-21                                                                                           |
        | ▪ Creation Date   : 2025-08-21                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Credit Note Versi Terakhir                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_CreditNote_LatestVersion(
            $varUserSession, int $varSysBranch_RefID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetDataPickList_CreditNote_NEW',
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
        | ▪ Method Name     : getDataPickList_DebitNote_LatestVersion                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-08-28                                                                                           |
        | ▪ Creation Date   : 2025-08-28                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Debit Note Versi Terakhir                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_DebitNote_LatestVersion(
            $varUserSession, int $varSysBranch_RefID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetDataPickList_DebitNote_NEW',
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
        | ▪ Method Name     : getDataPickList_Loan_LatestVersion                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-09-12                                                                                           |
        | ▪ Creation Date   : 2025-09-12                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Credit Note Versi Terakhir                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_Loan_LatestVersion(
            $varUserSession, int $varSysBranch_RefID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetDataPickList_Loan',
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
        | ▪ Method Name     : getDataPickList_LoanSettlement_LatestVersion                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-09-16                                                                                           |
        | ▪ Creation Date   : 2025-09-16                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Credit Note Versi Terakhir                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_LoanSettlement_LatestVersion(
            $varUserSession, int $varSysBranch_RefID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetDataPickList_LoanSettlement',
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
        | ▪ Method Name     : getDataPickList_DebitNote_AllVersion                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-10-17                                                                                           |
        | ▪ Creation Date   : 2024-10-17                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Debit Note Semua Versi                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_DebitNote_AllVersion(
            $varUserSession, int $varSysBranch_RefID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetDataPickList_DebitNote',
                            [
                                [$varSysBranch_RefID, 'bigint'],

                                [TRUE, 'boolean']
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
        | ▪ Method Name     : getDataPickList_DebitNote_LatestVersion                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-10-17                                                                                           |
        | ▪ Creation Date   : 2024-10-17                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Debit Note Versi Terakhir                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_DebitNote_LatestVersion_OLD(
            $varUserSession, int $varSysBranch_RefID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetDataPickList_DebitNote',
                            [
                                [$varSysBranch_RefID, 'bigint'],

                                [FALSE, 'boolean']
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
        | ▪ Method Name     : getDataPickList_Payment_AllVersion                                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-10-17                                                                                           |
        | ▪ Creation Date   : 2024-10-17                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Payment Semua Versi                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_Payment_AllVersion(
            $varUserSession, int $varSysBranch_RefID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetDataPickList_Payment',
                            [
                                [$varSysBranch_RefID, 'bigint'],

                                [TRUE, 'boolean']
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
        | ▪ Method Name     : getDataPickList_Payment_LatestVersion                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-10-17                                                                                           |
        | ▪ Creation Date   : 2024-10-17                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Payment Versi Terakhir                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_Payment_LatestVersion(
            $varUserSession, int $varSysBranch_RefID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetDataPickList_Payment',
                            [
                                [$varSysBranch_RefID, 'bigint'],

                                [FALSE, 'boolean']
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
        | ▪ Method Name     : getDataPickList_PaymentFundingDestination                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-05-11                                                                                           |
        | ▪ Creation Date   : 2025-05-11                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Tujuan Pembiayaan Dana                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ------------------------------                                                                                      |
        |      ▪ (int)    varEnyity_RefID ► Entity Reference ID                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_PaymentFundingDestination(
            $varUserSession, int $varSysBranch_RefID,
            int $varEntity = null
            )
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetDataPickList_PaymentFundingDestination',
                            [
                                [$varSysBranch_RefID, 'bigint'],

                                [$varEntity, 'bigint']
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
        | ▪ Method Name     : getDataPickList_PaymentFundingSource                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-05-11                                                                                           |
        | ▪ Creation Date   : 2025-05-11                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Sumber Dana Pembiayaan                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ------------------------------                                                                                      |
        |      ▪ (int)    varEnyity_RefID ► Entity Reference ID                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_PaymentFundingSource(
            $varUserSession, int $varSysBranch_RefID,
            int $varEntity = null
            )
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetDataPickList_PaymentFundingSource',
                            [
                                [$varSysBranch_RefID, 'bigint'],

                                [$varEntity, 'bigint']
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
        | ▪ Method Name     : getDataPickList_PaymentInstruction_AllVersion                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-10-17                                                                                           |
        | ▪ Creation Date   : 2024-10-17                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Payment Instruction Semua Versi                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_PaymentInstruction_AllVersion(
            $varUserSession, int $varSysBranch_RefID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetDataPickList_PaymentInstruction',
                            [
                                [$varSysBranch_RefID, 'bigint'],

                                [TRUE, 'boolean']
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
        | ▪ Method Name     : getDataPickList_PaymentInstruction_LatestVersion                                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-10-14                                                                                           |
        | ▪ Creation Date   : 2024-10-17                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Payment Instruction Versi Terakhir                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_PaymentInstruction_LatestVersion(
            $varUserSession, int $varSysBranch_RefID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetDataPickList_PaymentInstruction_New',
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
        | ▪ Method Name     : getDataPickList_PurchaseInvoice                                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-10-25                                                                                           |
        | ▪ Creation Date   : 2024-10-25                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Faktur Pembelian (Purchase Invoice)                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_PurchaseInvoice(
            $varUserSession, int $varSysBranch_RefID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetDataPickList_PurchaseInvoice',
                            [
                                [$varSysBranch_RefID, 'bigint'],
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
        | ▪ Method Name     : getDataPickList_PurchaseInvoiceBillingPurpose                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-04-14                                                                                           |
        | ▪ Creation Date   : 2022-04-14                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Tujuan Penagihan Invoice Pemasok                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_PurchaseInvoiceBillingPurpose(
            $varUserSession, int $varSysBranch_RefID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetDataPickList_PurchaseInvoiceBillingPurpose',
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
        | ▪ Method Name     : getDataPickList_SalesInvoice_AllVersion                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-10-28                                                                                           |
        | ▪ Creation Date   : 2024-10-28                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Faktur Penjualan (Sales Invoice) Semua Versi                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_SalesInvoice_AllVersion(
            $varUserSession, int $varSysBranch_RefID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetDataPickList_SalesInvoice',
                            [
                                [$varSysBranch_RefID, 'bigint'],

                                [TRUE, 'boolean']
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
        | ▪ Method Name     : getDataPickList_SalesInvoice_LatestVersion                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-10-28                                                                                           |
        | ▪ Creation Date   : 2024-10-28                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Faktur Penjualan (Sales Invoice) Versi Terakhir                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_SalesInvoice_LatestVersion(
            $varUserSession, int $varSysBranch_RefID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetDataPickList_SalesInvoice',
                            [
                                [$varSysBranch_RefID, 'bigint'],

                                [FALSE, 'boolean']
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
        | ▪ Method Name     : getDataPickList_SalesInvoiceRequisition_AllVersion                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-10-28                                                                                           |
        | ▪ Creation Date   : 2024-10-28                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Permintaan Faktur Penjualan (Sales Invoice Requisition) Semua Versi  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_SalesInvoiceRequisition_AllVersion(
            $varUserSession, int $varSysBranch_RefID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetDataPickList_SalesInvoiceRequisition',
                            [
                                [$varSysBranch_RefID, 'bigint'],

                                [TRUE, 'boolean']
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
        | ▪ Method Name     : getDataPickList_SalesInvoiceRequisition_LatestVersion                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-10-28                                                                                           |
        | ▪ Creation Date   : 2024-10-28                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Permintaan Faktur Penjualan (Sales Invoice Requisition) Versi        |
        |                     Terakhir                                                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_SalesInvoiceRequisition_LatestVersion(
            $varUserSession, int $varSysBranch_RefID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetDataPickList_SalesInvoiceRequisition',
                            [
                                [$varSysBranch_RefID, 'bigint'],

                                [FALSE, 'boolean']
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
        | ▪ Method Name     : getDataPickListJSON_Advance_LatestVersion                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2024-10-16                                                                                           |
        | ▪ Creation Date   : 2022-05-31                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Advance Versi Terakhir                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickListJSON_Advance_LatestVersion(
            $varUserSession, int $varSysBranch_RefID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetDataPickListJSON_Advance',
                            [
                                [$varSysBranch_RefID, 'bigint'],

                                [FALSE, 'boolean']
                            ]
                            )
                        );

                $varReturn['data'] =
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        $varReturn['data'][0]['Func_GetDataPickListJSON_Advance']
                        );

                $varReturn['rowCount'] =
                    count($varReturn['data']);

                return
                    $varReturn;
                }

            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataPickList_Reimbursement_LatestVersion                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2025-08-14                                                                                           |
        | ▪ Creation Date   : 2025-08-14                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Reimbursement Versi Terakhir                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_Reimbursement_LatestVersion(
            $varUserSession, int $varSysBranch_RefID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetDataPickList_Reimbursement',
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
        | ▪ Method Name     : getDataPickListJSON_PaymentFundingSource                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-05-11                                                                                           |
        | ▪ Creation Date   : 2025-05-11                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Sumber Dana Pembiayaan                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ------------------------------                                                                                      |
        |      ▪ (int)    varEnyity_RefID ► Entity Reference ID                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickListJSON_PaymentFundingSource(
            $varUserSession, int $varSysBranch_RefID,
            int $varEntity = null
            )
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetDataPickListJSON_PaymentFundingSource',
                            [
                                [$varSysBranch_RefID, 'bigint'],

                                [$varEntity, 'bigint']
                            ]
                            )
                        );

                $varReturn['data'] =
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        $varReturn['data'][0]['Func_GetDataPickListJSON_PaymentFundingSource']
                        );

                $varReturn['rowCount'] =
                    count($varReturn['data']);

                return
                    $varReturn;
                }

            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataPickList_PaymentFundingDestination                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-05-11                                                                                           |
        | ▪ Creation Date   : 2025-05-11                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Tujuan Pembiayaan Dana                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ------------------------------                                                                                      |
        |      ▪ (int)    varEnyity_RefID ► Entity Reference ID                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickListJSON_PaymentFundingDestination(
            $varUserSession, int $varSysBranch_RefID,
            int $varEntity = null
            )
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetDataPickListJSON_PaymentFundingDestination',
                            [
                                [$varSysBranch_RefID, 'bigint'],

                                [$varEntity, 'bigint']
                            ]
                            )
                        );

                $varReturn['data'] =
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        $varReturn['data'][0]['Func_GetDataPickListJSON_PaymentFundingDestination']
                        );

                $varReturn['rowCount'] =
                    count($varReturn['data']);

                return
                    $varReturn;
                }

            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getReport_Form_DocumentForm_Advance                                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2025-08-01                                                                                           |
        | ▪ Creation Date   : 2022-06-15                                                                                           |
        | ▪ Description     : Mendapatkan Laporan Form - Form Dokumen Uang Muka (Advance)                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ▪ (int)    varSysID ► Record ID                                                                                     |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getReport_Form_DocumentForm_Advance(
            $varUserSession, int $varSysBranch_RefID,
            int $varSysID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetReport_DocForm_Advance',
                            [
                                [$varSysBranch_RefID, 'bigint' ],
                                [$varSysID, 'bigint' ]
                            ]
                            )
                        );

                $varReturn['data'] =
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        $varReturn['data'][0]['Func_GetReport_DocForm_Advance']
                        );

                //$varReturn['rowCount'] =
                //    count($varReturn['data']);

                return
                    $varReturn;
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getReport_Form_DocumentForm_AdvancePayment                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-11-03                                                                                           |
        | ▪ Creation Date   : 2023-11-03                                                                                           |
        | ▪ Description     : Mendapatkan Laporan Form - Form Dokumen Pembayaran Uang Muka (Advance Payment)                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ▪ (int)    varSysID ► Record ID                                                                                     |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getReport_Form_DocumentForm_AdvancePayment(
            $varUserSession, int $varSysBranch_RefID,
            int $varSysID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetReport_DocForm_AdvancePayment',
                            [
                                [$varSysBranch_RefID, 'bigint' ],
                                [$varSysID, 'bigint' ]
                            ]
                            )
                        );

                return [
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        $varReturn['data'][0]['Func_GetReport_DocForm_AdvancePayment'])
                    ]
                    ;
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getReport_Form_DocumentForm_AdvanceSettlement                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-11-03                                                                                           |
        | ▪ Creation Date   : 2023-11-03                                                                                           |
        | ▪ Description     : Mendapatkan Laporan Form - Form Dokumen Pertanggungjawaban Uang Muka (Advance Settlement)            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ▪ (int)    varSysID ► Record ID                                                                                     |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getReport_Form_DocumentForm_AdvanceSettlement(
            $varUserSession, int $varSysBranch_RefID,
            int $varSysID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetReport_DocForm_AdvanceSettlement',
                            [
                                [$varSysBranch_RefID, 'bigint' ],
                                [$varSysID, 'bigint' ]
                            ]
                            )
                        );

                return [
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        $varReturn['data'][0]['Func_GetReport_DocForm_AdvanceSettlement'])
                    ]
                    ;
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getReport_Form_DocumentForm_AdvanceSettlementSummary                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-07-17                                                                                           |
        | ▪ Creation Date   : 2025-07-17                                                                                           |
        | ▪ Description     : Mendapatkan Laporan Form - Form Dokumen Permintaan Pembelian (Purchase Requisition)                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ▪ (string)    varCombinedBudgetCode ► Combined Budget Code                                                          |
        |      ▪ (string)    varCombinedBudgetSectionCode ► Combined Budget Section Code                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getReport_Form_DocumentForm_AdvanceSettlementSummary(
            $varUserSession, int $varSysBranch_RefID, string  $varCombinedBudgetCode = null, string $varCombinedBudgetSectionCode = null, int $varSupplier_RefID = null
            )
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetReport_DocForm_AdvanceSettlementSummary',
                            [
                                [$varCombinedBudgetCode, 'varchar' ],
                                [$varCombinedBudgetSectionCode, 'varchar' ],
                            ]
                            )
                        );
                return $varReturn;
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getReport_Form_DocumentForm_ReimbursementSummary                                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-08-11                                                                                           |
        | ▪ Creation Date   : 2025-08-11                                                                                           |
        | ▪ Description     : Mendapatkan Laporan Form - Form Dokumen Reimbursement                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ▪ (string)    varCombinedBudgetCode ► Combined Budget Code                                                          |
        |      ▪ (int)    varVendor_RefID ► Vendor ID                                                                              |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getReport_Form_DocumentForm_ReimbursementSummary(
            $varUserSession, int $varSysBranch_RefID, string  $varCombinedBudgetCode = null, int $varVendor_RefID = null
            )
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetReport_DocForm_ReimbursementSummary',
                            [
                                [$varCombinedBudgetCode, 'varchar' ],
                                [$varVendor_RefID, 'bigint' ],
                            ]
                            )
                        );
                return $varReturn;
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getReport_Form_DocumentForm_CreditNoteSummary                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-08-19                                                                                           |
        | ▪ Creation Date   : 2025-08-19                                                                                           |
        | ▪ Description     : Mendapatkan Laporan Form - Form Dokumen CreditNote                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ▪ (string)    varCombinedBudgetCode ► Combined Budget Code                                                          |
        |      ▪ (string)    varCombinedBudgetSectionCode ► CombinedBudgetSectionCode                                              |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getReport_Form_DocumentForm_CreditNoteSummary(
            $varUserSession, int $varSysBranch_RefID, string  $varCombinedBudgetCode = null, string $varCombinedBudgetSectionCode = null
            )
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetReport_DocForm_CreditNoteSummary',
                            [
                                [$varCombinedBudgetCode, 'varchar' ],
                                [$varCombinedBudgetSectionCode, 'varchar' ],
                            ]
                            )
                        );
                return $varReturn;
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getReport_Form_DocumentForm_DebitNoteSummary                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-08-28                                                                                           |
        | ▪ Creation Date   : 2025-08-28                                                                                           |
        | ▪ Description     : Mendapatkan Laporan Form - Form Dokumen Debit Note                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ▪ (string)    varCombinedBudgetCode ► Combined Budget Code                                                          |
        |      ▪ (string)    varCombinedBudgetSectionCode ► CombinedBudgetSectionCode                                              |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getReport_Form_DocumentForm_DebitNoteSummary(
            $varUserSession, int $varSysBranch_RefID, string  $varCombinedBudgetCode = null, string $varCombinedBudgetSectionCode = null
            )
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetReport_DocForm_DebitNoteSummary',
                            [
                                [$varCombinedBudgetCode, 'varchar' ],
                                [$varCombinedBudgetSectionCode, 'varchar' ],
                            ]
                            )
                        );
                return $varReturn;
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getReport_Form_DocumentForm_LoanSummary                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-09-15                                                                                           |
        | ▪ Creation Date   : 2025-09-15                                                                                           |
        | ▪ Description     : Mendapatkan Laporan Form - Form Dokumen Loan                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ▪ (string)    varCombinedBudgetCode ► Combined Budget Code                                                          |
        |      ▪ (int)    varCreditor_RefID ► Creditor_RefID                                                                       |
        |      ▪ (int)    varDebitor_RefID ► Debitor_RefID                                                                         |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getReport_Form_DocumentForm_LoanSummary(
            $varUserSession, int $varSysBranch_RefID, string  $varCombinedBudgetCode = null, int $varCreditor_RefID = null, int $varDebitor_RefID = null
            )
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetReport_DocForm_LoanSummary',
                            [
                                [$varCombinedBudgetCode, 'varchar' ],
                                [$varCreditor_RefID, 'bigint' ],
                                [$varDebitor_RefID, 'bigint' ],
                            ]
                            )
                        );
                return $varReturn;
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getReport_Form_DocumentForm_LoanSettlementSummary                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-09-25                                                                                           |
        | ▪ Creation Date   : 2025-09-25                                                                                           |
        | ▪ Description     : Mendapatkan Laporan Form - Form Dokumen Loan Settlement                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ▪ (string)    varCombinedBudgetCode ► Combined Budget Code                                                          |
        |      ▪ (string)    varCombinedBudgetSectionCode ► Combined Budget Section Code                                           |
        |      ▪ (int)    varCreditor_RefID ► Creditor_RefID                                                                       |
        |      ▪ (int)    varDebitor_RefID ► Debitor_RefID                                                                         |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getReport_Form_DocumentForm_LoanSettlementSummary(
            $varUserSession, int $varSysBranch_RefID, string  $varCombinedBudgetCode = null, string  $varCombinedBudgetSectionCode = null, int $varCreditor_RefID = null, int $varDebitor_RefID = null
            )
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetReport_DocForm_LoanSettlementSummary',
                            [
                                [$varCombinedBudgetCode, 'varchar' ],
                                [$varCombinedBudgetSectionCode, 'varchar' ],
                                [$varCreditor_RefID, 'bigint' ],
                                [$varDebitor_RefID, 'bigint' ],
                            ]
                            )
                        );

                return $varReturn;
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getReport_Form_DocumentForm_LoanToLoanSettlementSummary                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-09-29                                                                                           |
        | ▪ Creation Date   : 2025-09-29                                                                                           |
        | ▪ Description     : Mendapatkan Laporan Form - Form Dokumen Loan To Loan Settlement                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ▪ (string)    varCombinedBudgetCode ► Combined Budget Code                                                          |
        |      ▪ (string)    varCombinedBudgetSectionCode ► CombinedBudgetSectionCode                                              |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getReport_Form_DocumentForm_LoanToLoanSettlementSummary(
            $varUserSession, int $varSysBranch_RefID, string  $varCombinedBudgetCode = null, string $varCombinedBudgetSectionCode = null
            )
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetReport_DocForm_LoanToLoanSettlementSummary',
                            [
                                [$varCombinedBudgetCode, 'varchar' ],
                                [$varCombinedBudgetSectionCode, 'varchar' ],
                            ]
                            )
                        );
                return $varReturn;
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getReport_Form_DocumentForm_ReimbursementToDebitNoteSummary                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-08-28                                                                                           |
        | ▪ Creation Date   : 2025-08-28                                                                                           |
        | ▪ Description     : Mendapatkan Laporan Form - Form Dokumen Reimbursement To Debit Note                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ▪ (string)    varCombinedBudgetCode ► Combined Budget Code                                                          |
        |      ▪ (string)    varCombinedBudgetSectionCode ► CombinedBudgetSectionCode                                              |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getReport_Form_DocumentForm_ReimbursementToDebitNoteSummary(
            $varUserSession, int $varSysBranch_RefID, string  $varCombinedBudgetCode = null, string $varCombinedBudgetSectionCode = null
            )
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetReport_DocForm_ReimbursementToDNSummary',
                            [
                                [$varCombinedBudgetCode, 'varchar' ],
                                [$varCombinedBudgetSectionCode, 'varchar' ],
                            ]
                            )
                        );
                return $varReturn;
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getReport_Form_DocumentForm_AdvanceToAdvanceSettlementSummary                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-10-30                                                                                           |
        | ▪ Creation Date   : 2025-07-30                                                                                           |
        | ▪ Description     : Mendapatkan Laporan Form - Form Dokumen Advance To Advance Settlement Summary                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ▪ (string)    varCombinedBudgetCode ► Combined Budget Code                                                          |
        |      ▪ (string)    varCombinedBudgetSectionCode ► Combined Budget Section Code                                           |
        |      ▪ (int)    varRequesterWorkerJobsPosition_RefID ► RequesterWorkerJobsPosition_RefID                                 |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getReport_Form_DocumentForm_AdvanceToAdvanceSettlementSummary(
            $varUserSession, int $varSysBranch_RefID, string  $varCombinedBudgetCode = null, string $varCombinedBudgetSectionCode = null, int $varRequesterWorkerJobsPosition_RefID = null, string  $varStartDate = null, string  $varEndDate = null,
            )
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetReport_DocForm_AdvanceToAdvanceSettlementSummary',
                            [
                                [$varCombinedBudgetCode, 'varchar' ],
                                [$varCombinedBudgetSectionCode, 'varchar' ],
                                [$varRequesterWorkerJobsPosition_RefID, 'bigint' ],
                                [$varStartDate, 'varchar'],
                                [$varEndDate, 'varchar'],
                            ]
                            )
                        );
                return $varReturn;
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getReport_Form_DocumentForm_PaymentInstructionSummary                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-11-12                                                                                           |
        | ▪ Creation Date   : 2025-11-12                                                                                           |
        | ▪ Description     : Mendapatkan Laporan Form - Form Dokumen Advance To Advance Settlement Summary                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ▪ (string)    varCombinedBudgetCode ► Combined Budget Code                                                          |
        |      ▪ (string)    varCombinedBudgetSectionCode ► Combined Budget Section Code                                           |
        |      ▪ (int)    varSupplier_RefID ► Supplier_RefID                                                                       |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getReport_Form_DocumentForm_PaymentInstructionSummary(
            $varUserSession, int $varSysBranch_RefID, string  $varCombinedBudgetCode = null, string $varCombinedBudgetSectionCode = null, int $varSupplier_RefID = null, string  $varStartDate = null, string  $varEndDate = null,
            )
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetReport_DocForm_PaymentInstructionSummary',
                            [
                                [$varCombinedBudgetCode, 'varchar' ],
                                [$varCombinedBudgetSectionCode, 'varchar' ],
                                [$varSupplier_RefID, 'bigint' ],
                                [$varStartDate, 'varchar'],
                                [$varEndDate, 'varchar'],
                            ]
                            )
                        );
                return $varReturn;
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getReport_Form_DocumentForm_DebitNote                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-06-15                                                                                           |
        | ▪ Creation Date   : 2022-06-15                                                                                           |
        | ▪ Description     : Mendapatkan Laporan Form - Form Dokumen Nota Debit (Debit Note)                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ▪ (int)    varSysID ► Record ID                                                                                     |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getReport_Form_DocumentForm_DebitNote(
            $varUserSession, int $varSysBranch_RefID,
            int $varSysID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetReport_DocForm_DebitNote',
                            [
                                [$varSysBranch_RefID, 'bigint' ],
                                [$varSysID, 'bigint' ]
                            ]
                            )
                        );

                return [
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        $varReturn['data'][0]['Func_GetReport_DocForm_DebitNote'])
                    ]
                    ;
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getReport_Form_DocumentForm_AdvanceSummary                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-06-15                                                                                           |
        | ▪ Creation Date   : 2022-06-15                                                                                           |
        | ▪ Description     : Mendapatkan Laporan Form - Form Dokumen Uang Muka (Advance)                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ▪ (int)    varSysID ► Record ID                                                                                     |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getReport_Form_DocumentForm_AdvanceSummary(
            $varUserSession, int $varSysBranch_RefID,
            int $budgetID = null, int $subBudgetID = null, int $workID = null, int $productID = null, int $beneficiaryID = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetReport_AdvanceSummary',
                            [
                                [$varSysBranch_RefID, 'bigint' ],

                                [$budgetID, 'bigint'],
                                [$subBudgetID, 'bigint'],
                                [$workID, 'bigint'],
                                [$productID, 'bigint'],
                                [$beneficiaryID, 'bigint']
                            ]
                            )
                        );

                    return ($varReturn['data']);

                }
            catch (\Exception $ex) {
                return [];
                }
            }

        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getReport_Form_DocumentForm_AdvanceSummary_Detail                                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-06-15                                                                                           |
        | ▪ Creation Date   : 2022-06-15                                                                                           |
        | ▪ Description     : Mendapatkan Laporan Form - Form Dokumen Uang Muka (Advance)                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ▪ (int)    varSysID ► Record ID                                                                                     |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getReport_Form_DocumentForm_AdvanceSummary_Detail(
            $varUserSession, int $varSysBranch_RefID,
            int $varSysID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetReport_AdvanceSummary_Detail',
                            [
                                [$varSysBranch_RefID, 'bigint' ],
                                [$varSysID, 'bigint' ]
                            ]
                            )
                        );
                return [
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        $varReturn['data'][0]['Func_GetReport_AdvanceSummary_Detail'])
                    ];
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getReport_Form_DocumentForm_Payment                                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-11-06                                                                                           |
        | ▪ Creation Date   : 2023-11-06                                                                                           |
        | ▪ Description     : Mendapatkan Laporan Form - Form Dokumen Pembayaran (Payment)                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ▪ (int)    varSysID ► Record ID                                                                                     |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getReport_Form_DocumentForm_Payment(
            $varUserSession, int $varSysBranch_RefID,
            int $varSysID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetReport_DocForm_Payment',
                            [
                                [$varSysBranch_RefID, 'bigint' ],
                                [$varSysID, 'bigint' ]
                            ]
                            )
                        );

                return [
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        $varReturn['data'][0]['Func_GetReport_DocForm_Payment'])
                    ];
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getReport_Form_DocumentForm_PaymentInstruction                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-05-19                                                                                           |
        | ▪ Creation Date   : 2023-05-19                                                                                           |
        | ▪ Description     : Mendapatkan Laporan Form - Form Dokumen Instruksi Pembayaran (Payment Instruction)                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ▪ (int)    varSysID ► Record ID                                                                                     |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getReport_Form_DocumentForm_PaymentInstruction(
            $varUserSession, int $varSysBranch_RefID,
            int $varSysID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Finance.Func_GetReport_DocForm_PaymentInstruction',
                            [
                                [$varSysBranch_RefID, 'bigint' ],
                                [$varSysID, 'bigint' ]
                            ]
                            )
                        );

                return [
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        $varReturn['data'][0]['Func_GetReport_DocForm_PaymentInstruction'])
                    ];
                }
            catch (\Exception $ex) {
                return [];
                }
            }
        }
    }
