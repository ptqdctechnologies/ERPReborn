<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Models                                                                                                    |
| ▪ Name Space : \App\Models\Database\SchData_OLTP_Taxation                                                                        |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2022 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Models\Database\SchData_OLTP_Taxation
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : General                                                                                                      |
    | ▪ Description : Menangani Models Database ► SchData_OLTP_Taxation ► Non Specific Table                                       |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class General
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataList_TaxType                                                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-03-16                                                                                           |
        | ▪ Creation Date   : 2022-03-16                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Jenis Pajak                                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varBranchID ► Branch ID                                                                                  |
        |        ----------------------------------------                                                                          |
        |        ----------------------------------------                                                                          |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_TaxType(
            $varUserSession, int $varBranchID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Taxation.Func_GetDataList_TaxType',
                            [
                                [$varBranchID, 'bigint' ],
                                [$varPickStatement, 'varchar'],
                                [$varSortStatement, 'varchar'],
                                [$varFilterStatement, 'varchar'],
                                [$varPagingStatement, 'varchar']
                            ]
                            )
                        );

                return $varReturn['data'];
                }
            catch (\Exception $ex) {
                return [];
                }
            }


            /*
            +--------------------------------------------------------------------------------------------------------------------------+
            | ▪ Method Name     : getDataList_Vat                                                                                  |
            +--------------------------------------------------------------------------------------------------------------------------+
            | ▪ Version         : 1.0000.0000000                                                                                       |
            | ▪ Last Update     : 2025-02-28                                                                                           |
            | ▪ Creation Date   : 2025-02-28                                                                                           |
            | ▪ Description     : Mendapatkan Daftar Persentase Pajak                                                                       |
            +--------------------------------------------------------------------------------------------------------------------------+
            | ▪ Input Variable  :                                                                                                      |
            |      ▪ (mixed)  varUserSession ► User Session                                                                            |
            |      ▪ (int)    varBranchID ► Branch ID                                                                                  |
            |        ----------------------------------------                                                                          |
            |        ----------------------------------------                                                                          |
            |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
            |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
            |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
            |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
            | ▪ Output Variable :                                                                                                      |
            |      ▪ (array)  varReturn                                                                                                |
            +--------------------------------------------------------------------------------------------------------------------------+
            */
            public function getDataList_Vat(
                $varUserSession, int $varBranchID,
                string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
                {
                try {
                    $varReturn =
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                            $varUserSession,
                            \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                                $varUserSession,
                                'SchData-OLTP-Taxation.Func_GetDataList_Vat',
                                [
                                    // [$varBranchID, 'bigint' ],
                                    // [$varPickStatement, 'varchar'],
                                    // [$varSortStatement, 'varchar'],
                                    // [$varFilterStatement, 'varchar'],
                                    // [$varPagingStatement, 'varchar']
                                ]
                                )
                            );

                    return $varReturn['data'];
                    }
                catch (\Exception $ex) {
                    return [];
                    }
                }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataPickList_TaxType                                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-03-16                                                                                           |
        | ▪ Creation Date   : 2022-03-16                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Jenis Pajak                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varBranchID ► Branch ID                                                                                  |
        |        ----------------------------------------                                                                          |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_TaxType(
            $varUserSession, int $varBranchID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Taxation.Func_GetDataPickList_TaxType',
                            [
                                [$varBranchID, 'bigint' ]
                            ]
                            )
                        );

                return $varReturn['data'];
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getReport_Form_DocumentForm_TransactionTax                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Creation Date   : 2022-06-30                                                                                           |
        | ▪ Last Update     : 2022-06-30                                                                                           |
        | ▪ Description     : Mendapatkan Laporan Form - Form Dokumen Pajak Transaksi (Transaction Tax)                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |        ----------------------------------------                                                                          |
        |      ▪ (int)    varSysID ► Record ID                                                                                     |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getReport_Form_DocumentForm_TransactionTax(
            $varUserSession, int $varSysBranch_RefID,
            int $varSysID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Taxation.Func_GetReport_DocForm_TransactionTax',
                            [
                                [$varSysBranch_RefID, 'bigint' ],

                                [$varSysID, 'bigint' ]
                            ]
                            )
                        );

                return [
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        $varReturn['data'][0]['Func_GetReport_DocForm_TransactionTax'])
                    ];
                }
            catch (\Exception $ex) {
                return [];
                }
            }
        }
    }
