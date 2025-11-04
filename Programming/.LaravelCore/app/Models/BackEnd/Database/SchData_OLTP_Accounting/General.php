<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Models                                                                                                    |
| ▪ Name Space : \App\Models\Database\SchData_OLTP_Accounting                                                                      |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2021 - 2024 Zheta (teguhpjs@gmail.com)                                                                              |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Models\Database\SchData_OLTP_Accounting
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : General                                                                                                      |
    | ▪ Description : Menangani Models Database ► SchData_OLTP_Accounting ► Non Specific Table                                     |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class General
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataEntities_Underlying_JournalDetail                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-10-07                                                                                           |
        | ▪ Creation Date   : 2022-10-07                                                                                           |
        | ▪ Description     : Get Data Entities - Underlying - JournalDetail                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysID ► System Record ID                                                                              |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataEntities_Underlying_JournalDetail($varUserSession, 
            string $varIDSet)
            {
            try {
                $varFunctionName = 'SchData-OLTP-Accounting.Func_GetDataEntities_Underlying_JournalDetail';
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
                
                for ($i=0; $i!=count($varTemp['data']); $i++) {
                    $varReturn[$i] =
                        \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                            $varUserSession, 
                            $varTemp['data'][$i][explode('.', $varFunctionName)[1]]
                            );
                    }

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
        | ▪ Method Name     : getDataList_ChartOfAccount                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-08-22                                                                                           |
        | ▪ Creation Date   : 2023-08-22                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Chart Of Account (COA)                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varBranchID ► Branch ID                                                                                  |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varEffectiveDateTimeTZ ► Effective DateTimeTZ                                                            |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_ChartOfAccount(
            $varUserSession, int $varBranchID, 
            string $varEffectiveDateTimeTZ = null, 
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession, 
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Accounting.Func_GetDataList_ChartOfAccount',
                            [
                                [$varBranchID, 'bigint' ],

                                [$varEffectiveDateTimeTZ, 'timestamptz' ],

                                [$varPickStatement, 'varchar'],
                                [$varSortStatement, 'varchar'],
                                [$varFilterStatement, 'varchar'],
                                [$varPagingStatement, 'varchar']
                            ]
                            )
                        );

                return
                    $varReturn['data'];
                }

            catch (\Exception $ex) {
                return
                    [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataList_CodeOfAccountingLinkage                                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-05-02                                                                                           |
        | ▪ Creation Date   : 2024-05-02                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Chart Of Account (COA) Linkage                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varBranchID ► Branch ID                                                                                  |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varEffectiveDateTimeTZ ► Effective DateTimeTZ                                                            |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_ChartOfAccountLinkage(
            $varUserSession, int $varBranchID, 
            string $varEffectiveDateTimeTZ = null, 
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession, 
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Accounting.Func_GetDataList_ChartOfAccountLinkage',
                            [
                                [$varBranchID, 'bigint'],

                                [$varEffectiveDateTimeTZ, 'timestamptz'],

                                [$varPickStatement, 'varchar'],
                                [$varSortStatement, 'varchar'],
                                [$varFilterStatement, 'varchar'],
                                [$varPagingStatement, 'varchar']
                            ]
                            )
                        );

                return
                    $varReturn['data'];
                }

            catch (\Exception $ex) {
                return
                    [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataListJSON_ChartOfAccount                                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-11-12                                                                                           |
        | ▪ Creation Date   : 2024-11-12                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Chart Of Account (COA)                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varBranchID ► Branch ID                                                                                  |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varEffectiveDateTimeTZ ► Effective DateTimeTZ                                                            |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataListJSON_ChartOfAccount(
            $varUserSession, int $varBranchID, 
            string $varEffectiveDateTimeTZ = null, 
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession, 
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Accounting.Func_GetDataListJSON_ChartOfAccount',
                            [
                                [$varBranchID, 'bigint' ],

                                [$varEffectiveDateTimeTZ, 'timestamptz' ],

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
                        $varReturn['data'][0]['Func_GetDataListJSON_ChartOfAccount']
                        );

                return
                    $varReturn['data'];
                }

            catch (\Exception $ex) {
                return
                    [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataListJSON_ChartOfAccountLinkage                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-11-12                                                                                           |
        | ▪ Creation Date   : 2024-11-12                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Chart Of Account (COA) Linkage                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varBranchID ► Branch ID                                                                                  |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varEffectiveDateTimeTZ ► Effective DateTimeTZ                                                            |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataListJSON_ChartOfAccountLinkage(
            $varUserSession, int $varBranchID, 
            string $varEffectiveDateTimeTZ = null, 
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession, 
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Accounting.Func_GetDataListJSON_ChartOfAccountLinkage',
                            [
                                [$varBranchID, 'bigint' ],

                                [$varEffectiveDateTimeTZ, 'timestamptz' ],

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
                        $varReturn['data'][0]['Func_GetDataListJSON_ChartOfAccountLinkage']
                        );

                return
                    $varReturn['data'];
                }

            catch (\Exception $ex) {
                return
                    [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataListJSON_CombinedChartOfAccount                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-11-12                                                                                           |
        | ▪ Creation Date   : 2024-11-12                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Combined Code Of Accounting (COA)                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varBranchID ► Branch ID                                                                                  |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varEffectiveDateTimeTZ ► Effective DateTimeTZ                                                            |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataListJSON_CombinedChartOfAccount(
            $varUserSession, int $varBranchID, 
            string $varEffectiveDateTimeTZ = null, 
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession, 
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Accounting.Func_GetDataListJSON_CombinedChartOfAccount',
                            [
                                [$varBranchID, 'bigint' ],

                                [$varEffectiveDateTimeTZ, 'timestamptz' ],

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
                        $varReturn['data'][0]['Func_GetDataListJSON_CombinedChartOfAccount']
                        );

                return
                    $varReturn['data'];
                }

            catch (\Exception $ex) {
                return
                    [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataPickList_ChartOfAccount                                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-10-13                                                                                           |
        | ▪ Creation Date   : 2022-10-13                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Bagan Akun                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varBranchID ► Branch ID                                                                                  |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varEffectiveDateTimeTZ ► Effective DateTimeTZ                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_ChartOfAccount(
            $varUserSession, int $varBranchID, 
            string $varEffectiveDateTimeTZ = null)
            {
            try {
                $varReturn = 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession, 
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Accounting.Func_GetDataPickList_ChartOfAccount',
                            [
                                [$varBranchID, 'bigint'],
                                [$varEffectiveDateTimeTZ, 'timestamptz']
                            ]
                            )
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
        | ▪ Method Name     : getDataPickList_ChartOfAccountLinkage                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-10-13                                                                                           |
        | ▪ Creation Date   : 2022-10-13                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Bagan Akun Tertaut                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varBranchID ► Branch ID                                                                                  |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varEffectiveDateTimeTZ ► Effective DateTimeTZ                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_ChartOfAccountLinkage(
            $varUserSession, int $varBranchID, 
            string $varEffectiveDateTimeTZ = null)
            {
            try {
                $varReturn = 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession, 
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Accounting.Func_GetDataPickList_ChartOfAccountLinkage',
                            [
                                [$varBranchID, 'bigint'],

                                [$varEffectiveDateTimeTZ, 'timestamptz']
                            ]
                            )
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
        | ▪ Method Name     : getDataPickList_CombinedChartOfAccount                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-11-12                                                                                           |
        | ▪ Creation Date   : 2024-11-12                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Gabungan Bagan Akun                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varBranchID ► Branch ID                                                                                  |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varEffectiveDateTimeTZ ► Effective DateTimeTZ                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_CombinedChartOfAccount(
            $varUserSession, int $varBranchID, 
            string $varEffectiveDateTimeTZ = null)
            {
            try {
                $varReturn = 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession, 
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Accounting.Func_GetDataPickList_CombinedChartOfAccount',
                            [
                                [$varBranchID, 'bigint'],
                                [$varEffectiveDateTimeTZ, 'timestamptz']
                            ]
                            )
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
        | ▪ Method Name     : getDataPickListJSON_ChartOfAccount                                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-10-13                                                                                           |
        | ▪ Creation Date   : 2022-10-13                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Bagan Akun                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varBranchID ► Branch ID                                                                                  |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varEffectiveDateTimeTZ ► Effective DateTimeTZ                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickListJSON_ChartOfAccount(
            $varUserSession, int $varBranchID, 
            string $varEffectiveDateTimeTZ = null)
            {
            try {
                $varReturn = 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession, 
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Accounting.Func_GetDataPickListJSON_ChartOfAccount',
                            [
                                [$varBranchID, 'bigint'],
                                [$varEffectiveDateTimeTZ, 'timestamptz']
                            ]
                            )
                        );

                $varReturn['data'] = 
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        $varReturn['data'][0]['Func_GetDataPickListJSON_ChartOfAccount']
                        );

                $varReturn['rowCount'] =
                    count($varReturn['data']);

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
        | ▪ Method Name     : getDataPickList_AssetCategory_LatestVersion                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-11-04                                                                                           |
        | ▪ Creation Date   : 2025-11-04                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Asset Category Versi Terakhir                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_AssetCategory_LatestVersion(
            $varUserSession, int $varSysBranch_RefID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Accounting.Func_GetDataPickList_AssetCategory',
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
        | ▪ Method Name     : getDataPickList_DepreciationMethod_LatestVersion                                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-11-04                                                                                           |
        | ▪ Creation Date   : 2025-11-04                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Depreciation Method Versi Terakhir                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_DepreciationMethod_LatestVersion(
            $varUserSession, int $varSysBranch_RefID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Accounting.Func_GetDataPickList_DepreciationMethod',
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
        | ▪ Method Name     : getDataPickListJSON_ChartOfAccountLinkage                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-10-13                                                                                           |
        | ▪ Creation Date   : 2022-10-13                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Bagan Akun Tertaut                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varBranchID ► Branch ID                                                                                  |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varEffectiveDateTimeTZ ► Effective DateTimeTZ                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickListJSON_ChartOfAccountLinkage(
            $varUserSession, int $varBranchID, 
            string $varEffectiveDateTimeTZ = null)
            {
            try {
                $varReturn = 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession, 
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Accounting.Func_GetDataPickListJSON_ChartOfAccountLinkage',
                            [
                                [$varBranchID, 'bigint'],

                                [$varEffectiveDateTimeTZ, 'timestamptz']
                            ]
                            )
                        );

                $varReturn['data'] = 
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        $varReturn['data'][0]['Func_GetDataPickListJSON_ChartOfAccountLinkage']
                        );

                $varReturn['rowCount'] =
                    count($varReturn['data']);

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
        | ▪ Method Name     : getDataPickListJSON_CombinedChartOfAccount                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-11-12                                                                                           |
        | ▪ Creation Date   : 2024-11-12                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Gabungan Bagan Akun                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varBranchID ► Branch ID                                                                                  |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varEffectiveDateTimeTZ ► Effective DateTimeTZ                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickListJSON_CombinedChartOfAccount(
            $varUserSession, int $varBranchID, 
            string $varEffectiveDateTimeTZ = null)
            {
            try {
                $varReturn = 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession, 
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Accounting.Func_GetDataPickListJSON_CombinedChartOfAccount',
                            [
                                [$varBranchID, 'bigint'],
                                [$varEffectiveDateTimeTZ, 'timestamptz']
                            ]
                            )
                        );

                $varReturn['data'] = 
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        $varReturn['data'][0]['Func_GetDataPickListJSON_CombinedChartOfAccount']
                        );

                $varReturn['rowCount'] =
                    count($varReturn['data']);

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
        | ▪ Method Name     : getDataPickListJSON_CombinedChartOfAccountHeader                                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-11-12                                                                                           |
        | ▪ Creation Date   : 2024-11-12                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Gabungan Bagan Akun Header                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varBranchID ► Branch ID                                                                                  |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varEffectiveDateTimeTZ ► Effective DateTimeTZ                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickListJSON_CombinedChartOfAccountHeader(
            $varUserSession, int $varBranchID, 
            string $varEffectiveDateTimeTZ = null)
            {
            try {
                $varReturn = 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession, 
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Accounting.Func_GetDataPickListJSON_CombinedChartOfAccount_Header',
                            [
                                [$varBranchID, 'bigint'],
                                [$varEffectiveDateTimeTZ, 'timestamptz']
                            ]
                            )
                        );

                $varReturn['data'] = 
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        $varReturn['data'][0]['Func_GetDataPickListJSON_CombinedChartOfAccount_Header']
                        );

                $varReturn['rowCount'] =
                    count($varReturn['data']);

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
        | ▪ Method Name     : getDataPickListJSON_CombinedChartOfAccountNonHeader                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-11-12                                                                                           |
        | ▪ Creation Date   : 2024-11-12                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Gabungan Bagan Akun Header                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varBranchID ► Branch ID                                                                                  |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varEffectiveDateTimeTZ ► Effective DateTimeTZ                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickListJSON_CombinedChartOfAccountNonHeader(
            $varUserSession, int $varBranchID, 
            string $varEffectiveDateTimeTZ = null)
            {
            try {
                $varReturn = 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession, 
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Accounting.Func_GetDataPickListJSON_CombinedChartOfAccount_NonHeader',
                            [
                                [$varBranchID, 'bigint'],
                                [$varEffectiveDateTimeTZ, 'timestamptz']
                            ]
                            )
                        );

                $varReturn['data'] = 
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        $varReturn['data'][0]['Func_GetDataPickListJSON_CombinedChartOfAccount_NonHeader']
                        );

                $varReturn['rowCount'] =
                    count($varReturn['data']);

                return
                    $varReturn;
                }

            catch (\Exception $ex) {
                return
                    [];
                }
            }

        }
    }