<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Models                                                                                                    |
| ▪ Name Space : \App\Models\Database\SchData_OLTP_Budgeting                                                                       |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2021 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Models\Database\SchData_OLTP_Budgeting
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : General                                                                                                      |
    | ▪ Description : Menangani Models Database ► SchData_OLTP_Budgeting ► Non Specific Table                                      |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class General
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataEntities_BudgetOwner                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-10-19                                                                                           |
        | ▪ Creation Date   : 2022-10-19                                                                                           |
        | ▪ Description     : Get Data Entities - Budget Owner                                                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysID ► System Record ID                                                                              |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataEntities_BudgetOwner($varUserSession, 
            string $varIDSet)
            {
            try {
                $varFunctionName='SchData-OLTP-Budgeting.Func_GetDataEntities_BudgetExpenseOwner';
                $varTemp = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
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

                for ($i=0; $i!=count($varTemp['Data']); $i++)
                    {
                    $varReturn[$i] = \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession, 
                        $varTemp['Data'][$i][explode('.', $varFunctionName)[1]]);
                    }
                return $varReturn;
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataEntities_CombinedBudget                                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-10-19                                                                                           |
        | ▪ Creation Date   : 2022-10-19                                                                                           |
        | ▪ Description     : Get Data Entities - Combined Budget                                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysID ► System Record ID                                                                              |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataEntities_CombinedBudget($varUserSession, 
            string $varIDSet)
            {
            try {
                $varFunctionName='SchData-OLTP-Budgeting.Func_GetDataEntities_CombinedBudget';
                $varTemp = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
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

                for ($i=0; $i!=count($varTemp['Data']); $i++)
                    {
                    $varReturn[$i] = \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession, 
                        $varTemp['Data'][$i][explode('.', $varFunctionName)[1]]);
                    }
                return $varReturn;
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataEntities_CombinedBudgetSection                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-10-19                                                                                           |
        | ▪ Creation Date   : 2022-10-19                                                                                           |
        | ▪ Description     : Get Data Entities - Combined Budget Section                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysID ► System Record ID                                                                              |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataEntities_CombinedBudgetSection($varUserSession, 
            string $varIDSet)
            {
            try {
                $varFunctionName='SchData-OLTP-Budgeting.Func_GetDataEntities_CombinedBudgetSection';
                $varTemp = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
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

                for ($i=0; $i!=count($varTemp['Data']); $i++)
                    {
                    $varReturn[$i] = \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession, 
                        $varTemp['Data'][$i][explode('.', $varFunctionName)[1]]);
                    }
                return $varReturn;
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataEntities_CombinedBudgetSubSectionLevel1                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-10-20                                                                                           |
        | ▪ Creation Date   : 2022-10-20                                                                                           |
        | ▪ Description     : Get Data Entities - Combined Budget Sub Section Level 1                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysID ► System Record ID                                                                              |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataEntities_CombinedBudgetSubSectionLevel1($varUserSession, 
            string $varIDSet)
            {
            try {
                $varFunctionName='SchData-OLTP-Budgeting.Func_GetDataEntities_CombinedBudgetSubSectionLevel1';
                $varTemp = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
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

                for ($i=0; $i!=count($varTemp['Data']); $i++)
                    {
                    $varReturn[$i] = \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession, 
                        $varTemp['Data'][$i][explode('.', $varFunctionName)[1]]);
                    }
                return $varReturn;
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataEntities_CombinedBudgetSubSectionLevel2                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-10-20                                                                                           |
        | ▪ Creation Date   : 2022-10-20                                                                                           |
        | ▪ Description     : Get Data Entities - Combined Budget Sub Section Level 2                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysID ► System Record ID                                                                              |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataEntities_CombinedBudgetSubSectionLevel2($varUserSession, 
            string $varIDSet)
            {
            try {
                $varFunctionName='SchData-OLTP-Budgeting.Func_GetDataEntities_CombinedBudgetSubSectionLevel2';
                $varTemp = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
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

                for ($i=0; $i!=count($varTemp['Data']); $i++)
                    {
                    $varReturn[$i] = \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession, 
                        $varTemp['Data'][$i][explode('.', $varFunctionName)[1]]);
                    }
                return $varReturn;
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataList_Budget                                                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Creation Date   : 2021-05-28                                                                                           |
        | ▪ Last Update     : 2021-05-28                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Budget                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varBranchID ► Branch ID                                                                                  |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_Budget($varUserSession, int $varBranchID, 
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchData-OLTP-Budgeting.Func_GetDataList_Budget',
                        [
                            [$varBranchID, 'bigint'],
                            [$varPickStatement, 'varchar'],
                            [$varSortStatement, 'varchar'],
                            [$varFilterStatement, 'varchar'],
                            [$varPagingStatement, 'varchar']
                        ]
                        )
                    );
                return $varReturn['Data'];
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataList_BudgetExpense                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Creation Date   : 2021-06-15                                                                                           |
        | ▪ Last Update     : 2021-06-15                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Budget Expense                                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varBranchID ► Branch ID                                                                                  |
        |      ▪ (int)    varBudget_RefID ► Budget Reference ID                                                                    |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_BudgetExpense($varUserSession, int $varBranchID, 
            int $varBudget_RefID, 
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchData-OLTP-Budgeting.Func_GetDataList_BudgetExpense',
                        [
                            [$varBranchID, 'bigint'],
                            [$varBudget_RefID, 'bigint'],
                            [$varPickStatement, 'varchar'],
                            [$varSortStatement, 'varchar'],
                            [$varFilterStatement, 'varchar'],
                            [$varPagingStatement, 'varchar']
                        ]
                        )
                    );                
                return $varReturn['Data'];
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataList_BudgetExpenseLineCeiling                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Creation Date   : 2021-06-17                                                                                           |
        | ▪ Last Update     : 2021-06-17                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Budget Expense Line Ceiling (Pagu Anggaran Mata Anggaran Belanja)                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varBranchID ► Branch ID                                                                                  |
        |      ▪ (int)    varBudgetExpenseLine_RefID ► Budget Expense Line Reference ID                                            |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_BudgetExpenseLineCeiling($varUserSession, int $varBranchID, 
            int $varBudgetExpenseLine_RefID, 
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchData-OLTP-Budgeting.Func_GetDataList_BudgetExpenseLineCeiling',
                        [
                            [$varBranchID, 'bigint'],
                            [$varBudgetExpenseLine_RefID, 'bigint'],
                            [$varPickStatement, 'varchar'],
                            [$varSortStatement, 'varchar'],
                            [$varFilterStatement, 'varchar'],
                            [$varPagingStatement, 'varchar']
                        ]
                        )
                    );                
                return $varReturn['Data'];
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataList_BudgetExpenseLineCeilingObjects                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Creation Date   : 2021-06-17                                                                                           |
        | ▪ Last Update     : 2021-06-17                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Budget Expense Line Ceiling Objects (Objek Pagu Mata Anggaran Belanja)            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varBranchID ► Branch ID                                                                                  |
        |      ▪ (int)    varBudgetExpenseLineCeiling_RefID ► Budget Expense Line Ceiling Reference ID                             |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_BudgetExpenseCeilingObjects($varUserSession, int $varBranchID, 
            int $varBudgetExpenseLineCeiling_RefID, 
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchData-OLTP-Budgeting.Func_GetDataList_BudgetExpenseLineCeilingObjects',
                        [
                            [$varBranchID, 'bigint' ],
                            [$varBudgetExpenseLineCeiling_RefID, 'bigint' ],
                            [$varPickStatement, 'varchar'],
                            [$varSortStatement, 'varchar'],
                            [$varFilterStatement, 'varchar'],
                            [$varPagingStatement, 'varchar']
                        ]
                        )
                    );                
                return $varReturn['Data'];
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataList_BudgetExpenseGroup                                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Creation Date   : 2021-06-15                                                                                           |
        | ▪ Last Update     : 2021-06-15                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Budget Expense Group                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varBranchID ► Branch ID                                                                                  |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_BudgetExpenseGroup($varUserSession, int $varBranchID, 
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchData-OLTP-Budgeting.Func_GetDataList_BudgetExpenseGroup',
                        [
                            [$varBranchID, 'bigint' ],
                            [$varPickStatement, 'varchar'],
                            [$varSortStatement, 'varchar'],
                            [$varFilterStatement, 'varchar'],
                            [$varPagingStatement, 'varchar']
                        ]
                        )
                    );
                return $varReturn['Data'];
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataList_BudgetExpenseLine                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Creation Date   : 2021-06-15                                                                                           |
        | ▪ Last Update     : 2021-06-15                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Budget Expense Line                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varBranchID ► Branch ID                                                                                  |
        |      ▪ (int)    varBudgetSection_RefID ► Budget Section Reference ID                                                     |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_BudgetExpenseLine($varUserSession, int $varBranchID, 
            int $varBudgetSection_RefID, 
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchData-OLTP-Budgeting.Func_GetDataList_BudgetExpenseLine',
                        [
                            [$varBranchID, 'bigint' ],
                            [$varBudgetSection_RefID, 'bigint' ],
                            [$varPickStatement, 'varchar'],
                            [$varSortStatement, 'varchar'],
                            [$varFilterStatement, 'varchar'],
                            [$varPagingStatement, 'varchar']
                        ]
                        )
                    );                
                return $varReturn['Data'];
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataList_BudgetExpenseOwner                                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Creation Date   : 2021-08-26                                                                                           |
        | ▪ Last Update     : 2021-08-26                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Budget Expense Owner                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varBranchID ► Branch ID                                                                                  |
        |      ▪ (string) varDateTimeTZ ► DateTimeTZ                                                                               |
        |      ▪ (string) varBackwardInterval ► Backward Interval                                                                  |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_BudgetExpenseOwner($varUserSession, int $varBranchID, 
            string $varDateTimeTZ = null, string $varBackwardInterval = null,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchData-OLTP-Budgeting.Func_GetDataList_BudgetExpenseOwner',
                        [
                            [$varBranchID, 'bigint' ],
                            [$varDateTimeTZ, 'timestamptz' ],
                            [$varBackwardInterval, 'interval' ],
                            [$varPickStatement, 'varchar'],
                            [$varSortStatement, 'varchar'],
                            [$varFilterStatement, 'varchar'],
                            [$varPagingStatement, 'varchar']
                        ]
                        )
                    );                
                return $varReturn['Data'];
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataList_CombinedBudget                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Creation Date   : 2021-10-12                                                                                           |
        | ▪ Last Update     : 2021-10-12                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Budget                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varBranchID ► Branch ID                                                                                  |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_CombinedBudget($varUserSession, int $varBranchID, 
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchData-OLTP-Budgeting.Func_GetDataList_CombinedBudget',
                        [
                            [$varBranchID, 'bigint' ],
                            [$varPickStatement, 'varchar'],
                            [$varSortStatement, 'varchar'],
                            [$varFilterStatement, 'varchar'],
                            [$varPagingStatement, 'varchar']
                        ]
                        )
                    );
                return $varReturn['Data'];
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataList_CombinedBudgetSection                                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Creation Date   : 2021-10-11                                                                                           |
        | ▪ Last Update     : 2021-10-11                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Seksi Anggaran Gabungan                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varBranchID ► Branch ID                                                                                  |
        |      ▪ (int)    varCombinedBudgetOwner_RefID ► Combined Budget Owner ID                                                  |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_CombinedBudgetSection($varUserSession, int $varBranchID,
            int $varCombinedBudget_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchData-OLTP-Budgeting.Func_GetDataList_CombinedBudgetSection',
                        [
                            [$varBranchID, 'bigint'],
                            [$varCombinedBudget_RefID, 'bigint'],
                            [$varPickStatement, 'varchar'],
                            [$varSortStatement, 'varchar'],
                            [$varFilterStatement, 'varchar'],
                            [$varPagingStatement, 'varchar']
                        ]
                        )
                    );
                return $varReturn['Data'];
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataList_CombinedBudgetSectionDetail                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Creation Date   : 2021-10-11                                                                                           |
        | ▪ Last Update     : 2021-10-11                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Perincian Seksi Anggaran Gabungan                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varBranchID ► Branch ID                                                                                  |
        |      ▪ (int)    varCombinedBudgetOwner_RefID ► Combined Budget Owner ID                                                  |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_CombinedBudgetSectionDetail($varUserSession, int $varBranchID,
            int $varCombinedBudgetSection_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchData-OLTP-Budgeting.Func_GetDataList_CombinedBudgetSectionDetail',
                        [
                            [$varBranchID, 'bigint'],
                            [$varCombinedBudgetSection_RefID, 'bigint'],
                            [$varPickStatement, 'varchar'],
                            [$varSortStatement, 'varchar'],
                            [$varFilterStatement, 'varchar'],
                            [$varPagingStatement, 'varchar']
                        ]
                        )
                    );
                return $varReturn['Data'];
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataPickList_Budget                                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Creation Date   : 2021-12-16                                                                                           |
        | ▪ Last Update     : 2021-12-16                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Anggaran                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varBranchID ► Branch ID                                                                                  |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_Budget($varUserSession, int $varBranchID)
            {
            try {
                $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchData-OLTP-Budgeting.Func_GetDataPickList_Budget',
                        [
                            [$varBranchID, 'bigint' ]
                        ]
                        )
                    );
                return $varReturn['Data'];
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataPickList_BudgetExpense                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Creation Date   : 2021-12-16                                                                                           |
        | ▪ Last Update     : 2021-12-16                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Anggaran Belanja                                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varBranchID ► Branch ID                                                                                  |
        |      ▪ (int)    varBudget_RefID ► Budget Reference ID                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_BudgetExpense($varUserSession, int $varBranchID,
            int $varBudget_RefID = null)
            {
            try {
                $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchData-OLTP-Budgeting.Func_GetDataPickList_BudgetExpense',
                        [
                            [$varBranchID, 'bigint' ],
                            [$varBudget_RefID, 'bigint' ]
                        ]
                        )
                    );
                return $varReturn['Data'];
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataPickList_BudgetExpenseGroup                                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Creation Date   : 2021-12-21                                                                                           |
        | ▪ Last Update     : 2021-12-21                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Kelompok Anggaran Belanja                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varBranchID ► Branch ID                                                                                  |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_BudgetExpenseGroup($varUserSession, int $varBranchID)
            {
            try {
                $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchData-OLTP-Budgeting.Func_GetDataPickList_BudgetExpenseGroup',
                        [
                            [$varBranchID, 'bigint' ]
                        ]
                        )
                    );
                return $varReturn['Data'];
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataPickList_BudgetExpenseLine                                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Creation Date   : 2021-12-22                                                                                           |
        | ▪ Last Update     : 2021-12-22                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Mata Anggaran Belanja                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varBranchID ► Branch ID                                                                                  |
        |      ▪ (int)    varBudgetExpense_RefID ► Budget Expense Reference ID                                                     |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_BudgetExpenseLine($varUserSession, int $varBranchID,
            int $varBudgetExpense_RefID = null)
            {
            try {
                $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchData-OLTP-Budgeting.Func_GetDataPickList_BudgetExpenseLine',
                        [
                            [$varBranchID, 'bigint' ],
                            [$varBudgetExpense_RefID, 'bigint' ]
                        ]
                        )
                    );
                return $varReturn['Data'];
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataPickList_BudgetExpenseLineCeiling                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Creation Date   : 2021-12-22                                                                                           |
        | ▪ Last Update     : 2021-12-22                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Pagu Mata Anggaran Belanja                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varBranchID ► Branch ID                                                                                  |
        |      ▪ (int)    varBudgetExpenseLine_RefID ► Budget Expense Line Reference ID                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_BudgetExpenseLineCeiling($varUserSession, int $varBranchID,
            int $varBudgetExpenseLine_RefID = null)
            {
            try {
                $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchData-OLTP-Budgeting.Func_GetDataPickList_BudgetExpenseLineCeiling',
                        [
                            [$varBranchID, 'bigint' ],
                            [$varBudgetExpenseLine_RefID, 'bigint' ]
                        ]
                        )
                    );
                return $varReturn['Data'];
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataPickList_BudgetExpenseLineCeilingObjects                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Creation Date   : 2021-12-22                                                                                           |
        | ▪ Last Update     : 2021-12-22                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Pagu Mata Anggaran Belanja                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varBranchID ► Branch ID                                                                                  |
        |      ▪ (int)    varBudgetExpenseLineCeiling_RefID ► Budget Expense Line Ceiling Reference ID                             |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_BudgetExpenseLineCeilingObjects($varUserSession, int $varBranchID,
            int $varBudgetExpenseLineCeiling_RefID = null)
            {
            try {
                $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchData-OLTP-Budgeting.Func_GetDataPickList_BudgetExpenseLineCeilingObjects',
                        [
                            [$varBranchID, 'bigint' ],
                            [$varBudgetExpenseLineCeiling_RefID, 'bigint' ]
                        ]
                        )
                    );
                return $varReturn['Data'];
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataPickList_CombinedBudget                                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Creation Date   : 2021-08-26                                                                                           |
        | ▪ Last Update     : 2021-08-26                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Pemilik Anggaran Gabungan                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varBranchID ► Branch ID                                                                                  |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_CombinedBudget($varUserSession, int $varBranchID)
            {
            try {
                $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchData-OLTP-Budgeting.Func_GetDataPickList_CombinedBudget',
                        [
                            [$varBranchID, 'bigint' ]
                        ]
                        )
                    );
                return $varReturn['Data'];
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataPickList_CombinedBudgetSectionDetail                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Creation Date   : 2022-03-09                                                                                           |
        | ▪ Last Update     : 2022-03-09                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Perincian Seksi Anggaran Gabungan                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varBranchID ► Branch ID                                                                                  |
        |      ▪ (int)    varCombinedBudgetSection_RefID ► Combined Budget Section Reference ID                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_CombinedBudgetSectionDetail($varUserSession, int $varBranchID,
            int $varCombinedBudgetSection_RefID)
            {
            try {
                $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchData-OLTP-Budgeting.Func_GetDataPickList_CombinedBudgetSectionDetail',
                        [
                            [$varBranchID, 'bigint' ],
                            [$varCombinedBudgetSection_RefID, 'bigint' ]
                        ]
                        )
                    );
                return $varReturn['Data'];
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataPickList_CombinedBudgetSection                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Creation Date   : 2021-10-11                                                                                           |
        | ▪ Last Update     : 2021-10-11                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Section Anggaran Gabungan                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varBranchID ► Branch ID                                                                                  |
        |      ▪ (int)    varCombinedBudgetOwner_RefID ► Combined Budget Owner Reference ID                                        |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_CombinedBudgetSection($varUserSession, int $varBranchID,
            int $varCombinedBudgetOwner_RefID)
            {
            try {
                $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchData-OLTP-Budgeting.Func_GetDataPickList_CombinedBudgetSection',
                        [
                            [$varBranchID, 'bigint' ],
                            [$varCombinedBudgetOwner_RefID, 'bigint' ]
                        ]
                        )
                    );
                return $varReturn['Data'];
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataReportFormResume_CombinedBudgetSectionSegmentedDetail                                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Creation Date   : 2021-10-11                                                                                           |
        | ▪ Last Update     : 2021-10-11                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Seksi Anggaran Gabungan Terperinci Tersegmentasi                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varBranchID ► Branch ID                                                                                  |
        |      ▪ (int)    varCombinedBudgetSection_RefID ► Combined Budget Section ID                                              |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataReportFormResume_CombinedBudgetSectionSegmentedDetail($varUserSession, int $varBranchID,
            int $varCombinedBudgetSection_RefID
            )
            {
            try {
                $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchData-OLTP-Budgeting.Func_GetRptFormRsm_CombinedBudgetSectionSegmentedDetail',
                        [
                            [$varBranchID, 'bigint'],
                            [$varCombinedBudgetSection_RefID, 'bigint']
                        ]
                        )
                    );
                return $varReturn['Data'];
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataReportFormResume_CombinedBudgetSectionUnsegmentedDetail                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Creation Date   : 2021-10-11                                                                                           |
        | ▪ Last Update     : 2021-10-11                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Seksi Anggaran Gabungan Terperinci Tanpa Segmentasi                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varBranchID ► Branch ID                                                                                  |
        |      ▪ (int)    varCombinedBudgetSection_RefID ► Combined Budget Section ID                                              |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataReportFormResume_CombinedBudgetSectionUnsegmentedDetail($varUserSession, int $varBranchID,
            int $varCombinedBudgetSection_RefID
            )
            {
            try {
                $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchData-OLTP-Budgeting.Func_GetRptFormRsm_CombinedBudgetSectionUnsegmentedDetail',
                        [
                            [$varBranchID, 'bigint'],
                            [$varCombinedBudgetSection_RefID, 'bigint']
                        ]
                        )
                    );
                return $varReturn['Data'];
                }
            catch (\Exception $ex) {
                return [];
                }
            }
        }
    }