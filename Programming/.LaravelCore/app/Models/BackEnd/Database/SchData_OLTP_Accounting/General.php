<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Models                                                                                                    |
| ▪ Name Space : \App\Models\Database\SchData_OLTP_Accounting                                                                      |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2021 - 2024 Zheta (teguhpjs@gmail.com)                                                                              |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Models\Database\SchData_OLTP_Accounting {
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
        public function getDataEntities_Underlying_JournalDetail(
            $varUserSession,
            string $varIDSet
        ) {
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

                for ($i = 0; $i != count($varTemp['data']); $i++) {
                    $varReturn[$i] =
                        \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                            $varUserSession,
                            $varTemp['data'][$i][explode('.', $varFunctionName)[1]]
                        );
                }

                return
                    $varReturn;
            } catch (\Exception $ex) {
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
            $varUserSession,
            int $varBranchID,
            string $varEffectiveDateTimeTZ = null,
            string $varPickStatement = null,
            string $varSortStatement = null,
            string $varFilterStatement = null,
            string $varPagingStatement = null
        ) {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Accounting.Func_GetDataList_ChartOfAccount',
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
            } catch (\Exception $ex) {
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
            $varUserSession,
            int $varBranchID,
            string $varEffectiveDateTimeTZ = null,
            string $varPickStatement = null,
            string $varSortStatement = null,
            string $varFilterStatement = null,
            string $varPagingStatement = null
        ) {
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
            } catch (\Exception $ex) {
                return
                    [];
            }
        }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataList_JournalDetail_LatestVersion                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2026-02-26                                                                                           |
        | ▪ Creation Date   : 2026-02-26                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Detail Journal Versi Terakhir                                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varJournal_RefID ► Journal ID                                                                            |
        |        ------------------------------                                                                                    |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_JournalDetail_LatestVersion(
            $varUserSession,
            int $varJournal_RefID = null
        ) {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Accounting.Func_GetDataList_JournalDetail',
                            [
                                [$varJournal_RefID, 'bigint'],
                            ]
                        )
                    );

                // Extract the result data from the database query response
                $resultArray = $varReturn['data'];
                $varReturn['data'] = [];

                // Initialize variables for data restructuring
                $sys_ID = null;
                $idxArray1 = 0;
                $idxArray2 = 0;

                // Iterate through the result array to group data by Sys_ID
                foreach ($resultArray as $key => $value) {
                    // Check if this is a new supplier (different Sys_ID)
                    if ($sys_ID != $value["Journal_RefID"]) {
                        // Reset nested index
                        $idxArray2 = 0;
                        // Populate Journal Detail information
                        $varReturn['data'][$idxArray1]['sys_ID'] = $value["Journal_RefID"];
                        $varReturn['data'][$idxArray1]['bankAccount_RefID'] = $value["BankAccount_RefID"];
                        $varReturn['data'][$idxArray1]['bankAcronym'] = $value["BankAcronym"];
                        $varReturn['data'][$idxArray1]['bankAccountNumber'] = $value["BankAccountNumber"];
                        $varReturn['data'][$idxArray1]['bankAccountName'] = $value["BankAccountName"];
                        $varReturn['data'][$idxArray1]['journalDateTimeTZ'] = $value["JournalDateTimeTZ"];
                        $varReturn['data'][$idxArray1]['businessDocument_RefID'] = $value["BusinessDocumentJournal_RefID"];
                        $varReturn['data'][$idxArray1]['businessDocumentNumber'] = $value["DocumentNumber"];
                        $varReturn['data'][$idxArray1]['transaction_RefID'] = $value["Transaction_RefID"];
                        $varReturn['data'][$idxArray1]['transactionValue'] = $value["TransactionValue"];
                        $varReturn['data'][$idxArray1]['transactionUnpaid'] = $value["TransactionUnpaid"];
                        $varReturn['data'][$idxArray1]['transactionType'] = $value["Journal_AccountingEntryRecordType_RefID"];
                        $varReturn['data'][$idxArray1]['variance'] = $value["Variance"];
                        $varReturn['data'][$idxArray1]['entities'][$idxArray2]['sys_ID'] = $value["Sys_ID"];
                        $varReturn['data'][$idxArray1]['entities'][$idxArray2]['chartOfAccount_RefID'] = $value["ChartOfAccount_RefID"];
                        $varReturn['data'][$idxArray1]['entities'][$idxArray2]['chartOfAccountCode'] = $value["ChartOfAccountCode"];
                        $varReturn['data'][$idxArray1]['entities'][$idxArray2]['chartOfAccountName'] = $value["ChartOfAccountName"];
                        $varReturn['data'][$idxArray1]['entities'][$idxArray2]['amountCurrency_RefID'] = $value["AmountCurrency_RefID"];
                        $varReturn['data'][$idxArray1]['entities'][$idxArray2]['amountCurrencyValue'] = $value["AmountCurrencyValue"];
                        $varReturn['data'][$idxArray1]['entities'][$idxArray2]['amountCurrencyExchangeRate'] = $value["AmountCurrencyExchangeRate"];
                        $varReturn['data'][$idxArray1]['entities'][$idxArray2]['combinedBudget_RefID'] = $value["CombinedBudget_RefID"];
                        $varReturn['data'][$idxArray1]['entities'][$idxArray2]['combinedBudgetCode'] = $value["CombinedBudgetCode"];
                        $varReturn['data'][$idxArray1]['entities'][$idxArray2]['combinedBudgetName'] = $value["CombinedBudgetName"];
                        $varReturn['data'][$idxArray1]['entities'][$idxArray2]['quantityUnit_RefID'] = $value["QuantityUnit_RefID"];
                        $varReturn['data'][$idxArray1]['entities'][$idxArray2]['quantity'] = $value["Quantity"];
                        $varReturn['data'][$idxArray1]['entities'][$idxArray2]['accountingEntryRecordType_RefID'] = $value["AccountingEntryRecordType_RefID"];
                        $varReturn['data'][$idxArray1]['entities'][$idxArray2]['businessDocument_RefID'] = $value["BusinessDocument_RefID"];
                        $varReturn['data'][$idxArray1]['entities'][$idxArray2]['businessDocumentNumber'] = $value["BusinessDocumentNumber"];
                        $varReturn['data'][$idxArray1]['entities'][$idxArray2]['beneficiaryOrSenderBankAccount_RefID'] = $value["BeneficiaryOrSenderBankAccount_RefID"];
                        $varReturn['data'][$idxArray1]['entities'][$idxArray2]['beneficiaryOrSenderBankAccountAcronym'] = $value["BeneficiaryOrSenderBankAccountAcronym"];
                        $varReturn['data'][$idxArray1]['entities'][$idxArray2]['beneficiaryOrSenderBankAccountNumber'] = $value["BeneficiaryOrSenderBankAccountNumber"];
                        $varReturn['data'][$idxArray1]['entities'][$idxArray2]['beneficiaryOrSenderBankAccountName'] = $value["BeneficiaryOrSenderBankAccountName"];

                        // Update current Sys_ID for the next iteration
                        $sys_ID = $value["Journal_RefID"];

                        // Increment main array index for the next Journal
                        $idxArray1++;
                    } else {
                        // Journal Detail berbeda: buat entry entities baru
                        $idxArray2++;
                        $varReturn['data'][$idxArray1 - 1]['entities'][$idxArray2]['sys_ID'] = $value["Sys_ID"];
                        $varReturn['data'][$idxArray1 - 1]['entities'][$idxArray2]['chartOfAccount_RefID'] = $value["ChartOfAccount_RefID"];
                        $varReturn['data'][$idxArray1 - 1]['entities'][$idxArray2]['chartOfAccountCode'] = $value["ChartOfAccountCode"];
                        $varReturn['data'][$idxArray1 - 1]['entities'][$idxArray2]['chartOfAccountName'] = $value["ChartOfAccountName"];
                        $varReturn['data'][$idxArray1 - 1]['entities'][$idxArray2]['amountCurrency_RefID'] = $value["AmountCurrency_RefID"];
                        $varReturn['data'][$idxArray1 - 1]['entities'][$idxArray2]['amountCurrencyValue'] = $value["AmountCurrencyValue"];
                        $varReturn['data'][$idxArray1 - 1]['entities'][$idxArray2]['amountCurrencyExchangeRate'] = $value["AmountCurrencyExchangeRate"];
                        $varReturn['data'][$idxArray1 - 1]['entities'][$idxArray2]['combinedBudget_RefID'] = $value["CombinedBudget_RefID"];
                        $varReturn['data'][$idxArray1 - 1]['entities'][$idxArray2]['combinedBudgetCode'] = $value["CombinedBudgetCode"];
                        $varReturn['data'][$idxArray1 - 1]['entities'][$idxArray2]['combinedBudgetName'] = $value["CombinedBudgetName"];
                        $varReturn['data'][$idxArray1 - 1]['entities'][$idxArray2]['quantityUnit_RefID'] = $value["QuantityUnit_RefID"];
                        $varReturn['data'][$idxArray1 - 1]['entities'][$idxArray2]['quantity'] = $value["Quantity"];
                        $varReturn['data'][$idxArray1 - 1]['entities'][$idxArray2]['accountingEntryRecordType_RefID'] = $value["AccountingEntryRecordType_RefID"];
                        $varReturn['data'][$idxArray1 - 1]['entities'][$idxArray2]['businessDocument_RefID'] = $value["BusinessDocument_RefID"];
                        $varReturn['data'][$idxArray1 - 1]['entities'][$idxArray2]['businessDocumentNumber'] = $value["BusinessDocumentNumber"];
                        $varReturn['data'][$idxArray1 - 1]['entities'][$idxArray2]['beneficiaryOrSenderBankAccount_RefID'] = $value["BeneficiaryOrSenderBankAccount_RefID"];
                        $varReturn['data'][$idxArray1 - 1]['entities'][$idxArray2]['beneficiaryOrSenderBankAccountAcronym'] = $value["BeneficiaryOrSenderBankAccountAcronym"];
                        $varReturn['data'][$idxArray1 - 1]['entities'][$idxArray2]['beneficiaryOrSenderBankAccountNumber'] = $value["BeneficiaryOrSenderBankAccountNumber"];
                        $varReturn['data'][$idxArray1 - 1]['entities'][$idxArray2]['beneficiaryOrSenderBankAccountName'] = $value["BeneficiaryOrSenderBankAccountName"];
                    }
                }

                return
                    $varReturn;
            } catch (\Exception $ex) {
                return [];
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
            $varUserSession,
            int $varBranchID,
            string $varEffectiveDateTimeTZ = null,
            string $varPickStatement = null,
            string $varSortStatement = null,
            string $varFilterStatement = null,
            string $varPagingStatement = null
        ) {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Accounting.Func_GetDataListJSON_ChartOfAccount',
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

                $varReturn['data'] =
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        $varReturn['data'][0]['Func_GetDataListJSON_ChartOfAccount']
                    );

                return
                    $varReturn['data'];
            } catch (\Exception $ex) {
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
            $varUserSession,
            int $varBranchID,
            string $varEffectiveDateTimeTZ = null,
            string $varPickStatement = null,
            string $varSortStatement = null,
            string $varFilterStatement = null,
            string $varPagingStatement = null
        ) {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Accounting.Func_GetDataListJSON_ChartOfAccountLinkage',
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

                $varReturn['data'] =
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        $varReturn['data'][0]['Func_GetDataListJSON_ChartOfAccountLinkage']
                    );

                return
                    $varReturn['data'];
            } catch (\Exception $ex) {
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
            $varUserSession,
            int $varBranchID,
            string $varEffectiveDateTimeTZ = null,
            string $varPickStatement = null,
            string $varSortStatement = null,
            string $varFilterStatement = null,
            string $varPagingStatement = null
        ) {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Accounting.Func_GetDataListJSON_CombinedChartOfAccount',
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

                $varReturn['data'] =
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        $varReturn['data'][0]['Func_GetDataListJSON_CombinedChartOfAccount']
                    );

                return
                    $varReturn['data'];
            } catch (\Exception $ex) {
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
            $varUserSession,
            int $varBranchID,
            string $varEffectiveDateTimeTZ = null
        ) {
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
            } catch (\Exception $ex) {
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
            $varUserSession,
            int $varBranchID,
            string $varEffectiveDateTimeTZ = null
        ) {
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
            } catch (\Exception $ex) {
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
            $varUserSession,
            int $varBranchID,
            string $varEffectiveDateTimeTZ = null
        ) {
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
            } catch (\Exception $ex) {
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
            $varUserSession,
            int $varBranchID,
            string $varEffectiveDateTimeTZ = null
        ) {
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
            } catch (\Exception $ex) {
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
            $varUserSession,
            int $varSysBranch_RefID
        ) {
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
            } catch (\Exception $ex) {
                return [];
            }
        }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataPickList_Journal_LatestVersion                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-12-19                                                                                           |
        | ▪ Creation Date   : 2025-12-19                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Journal Versi Terakhir                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_Journal_LatestVersion(
            $varUserSession,
            int $varSysBranch_RefID
        ) {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Accounting.Func_GetDataPickList_Journal',
                            [
                                [$varSysBranch_RefID, 'bigint']
                            ]
                        )
                    );

                return
                    $varReturn;
            } catch (\Exception $ex) {
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
            $varUserSession,
            int $varSysBranch_RefID
        ) {
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
            } catch (\Exception $ex) {
                return [];
            }
        }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataPickList_DepreciationRateYears_LatestVersion                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-11-04                                                                                           |
        | ▪ Creation Date   : 2025-11-04                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Depreciation Rate & Years Versi Terakhir                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_DepreciationRateYears_LatestVersion(
            $varUserSession,
            int $varSysBranch_RefID,
            int $varAssetCategory_RefID = null,
            int $varDepreciationMethod_RefID = null
        ) {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Accounting.Func_GetDataPickList_DepreciationRateYears',
                            [
                                [$varSysBranch_RefID, 'bigint'],
                                [$varAssetCategory_RefID, 'bigint'],
                                [$varDepreciationMethod_RefID, 'bigint']
                            ]
                        )
                    );

                return
                    $varReturn;
            } catch (\Exception $ex) {
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
            $varUserSession,
            int $varBranchID,
            string $varEffectiveDateTimeTZ = null
        ) {
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
            } catch (\Exception $ex) {
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
            $varUserSession,
            int $varBranchID,
            string $varEffectiveDateTimeTZ = null
        ) {
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
            } catch (\Exception $ex) {
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
            $varUserSession,
            int $varBranchID,
            string $varEffectiveDateTimeTZ = null
        ) {
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
            } catch (\Exception $ex) {
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
            $varUserSession,
            int $varBranchID,
            string $varEffectiveDateTimeTZ = null
        ) {
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
            } catch (\Exception $ex) {
                return
                    [];
            }
        }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getReport_Form_DataList_ChartOfAccount                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2026-07-09                                                                                           |
        | ▪ Creation Date   : 2026-07-09                                                                                           |
        | ▪ Description     : Mendapatkan Laporan Form - Daftar Chart Of Account                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varEffectiveDate ► Effective Date                                                                        |
        |      ------------------------------                                                                                      |
        |      ▪ (int)    varPagination_PageSize ► Pagination Page Size                                                            |
        |      ▪ (int)    varPagination_PageShow ► Pagination Page Show                                                            |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varFullCode ► Full Code                                                                                  |
        |      ▪ (string) varFullName ► Full Name                                                                                  |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getReport_Form_DataList_ChartOfAccount(
            $varUserSession,
            int $varSysBranch_RefID,
            string $verEffectiveDate = null,
            int $varPagination_PageSize = null,
            int $varPagination_PageShow = null,
            string $varFullCode = null,
            string $varFullName = null
        ) {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Accounting.Func_GetReport_DataList_ChartOfAccount',
                            [
                                [$varUserSession, 'bigint'],
                                [$varSysBranch_RefID, 'bigint'],

                                [$verEffectiveDate, 'date'],

                                [$varPagination_PageSize, 'bigint'],
                                [$varPagination_PageShow, 'bigint'],

                                [$varFullCode, 'varchar'],
                                [$varFullName, 'varchar']
                            ]
                        )
                    );

                $varReturn['data'] =
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        $varReturn['data'][0]['Func_GetReport_DataList_ChartOfAccount']
                    );

                return
                    $varReturn;
            } catch (\Exception $ex) {
                return
                    [];
            }
        }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getReport_Form_DataPickList_ChartOfAccount                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2026-07-09                                                                                           |
        | ▪ Creation Date   : 2026-07-09                                                                                           |
        | ▪ Description     : Mendapatkan Laporan Form - Daftar Pilihan Chart Of Account                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varEffectiveDate ► Effective Date                                                                        |
        |      ------------------------------                                                                                      |
        |      ▪ (int)    varPagination_PageSize ► Pagination Page Size                                                            |
        |      ▪ (int)    varPagination_PageShow ► Pagination Page Show                                                            |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varFullCode ► Full Code                                                                                  |
        |      ▪ (string) varFullName ► Full Name                                                                                  |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getReport_Form_DataPickList_ChartOfAccount(
            $varUserSession,
            int $varSysBranch_RefID,
            string $verEffectiveDate = null,
            int $varPagination_PageSize = null,
            int $varPagination_PageShow = null,
            string $varFullCode = null,
            string $varFullName = null
        ) {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Accounting.Func_GetReport_DataPickList_ChartOfAccount',
                            [
                                [$varUserSession, 'bigint'],
                                [$varSysBranch_RefID, 'bigint'],

                                [$verEffectiveDate, 'date'],

                                [$varPagination_PageSize, 'bigint'],
                                [$varPagination_PageShow, 'bigint'],

                                [$varFullCode, 'varchar'],
                                [$varFullName, 'varchar']
                            ]
                        )
                    );

                $varReturn['data'] =
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        $varReturn['data'][0]['Func_GetReport_DataPickList_ChartOfAccount']
                    );

                return
                    $varReturn;
            } catch (\Exception $ex) {
                return
                    [];
            }
        }

        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getReport_Form_DataPickList_ChartOfAccountNonHeader                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2026-07-28                                                                                           |
        | ▪ Creation Date   : 2026-07-28                                                                                           |
        | ▪ Description     : Mendapatkan Laporan Form - Daftar Pilihan Chart Of Account Non Header                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varEffectiveDate ► Effective Date                                                                        |
        |      ------------------------------                                                                                      |
        |      ▪ (int)    varPagination_PageSize ► Pagination Page Size                                                            |
        |      ▪ (int)    varPagination_PageShow ► Pagination Page Show                                                            |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varFullCode ► Full Code                                                                                  |
        |      ▪ (string) varFullName ► Full Name                                                                                  |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getReport_Form_DataPickList_ChartOfAccountNonHeader(
            $varUserSession,
            int $varSysBranch_RefID,
            string $verEffectiveDate = null,
            int $varPagination_PageSize = null,
            int $varPagination_PageShow = null,
            string $varFullCode_DEFAULT = null,
            string $varFullName_DEFAULT = null,
            string $varFullCode_CUSTOM = null,
            string $varFullName_CUSTOM = null
        ) {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Accounting.Func_GetReport_DataPickList_ChartOfAccountNonHeader',
                            [
                                [$varUserSession, 'bigint'],
                                [$varSysBranch_RefID, 'bigint'],

                                [$verEffectiveDate, 'date'],

                                [$varPagination_PageSize, 'bigint'],
                                [$varPagination_PageShow, 'bigint'],

                                [$varFullCode_DEFAULT, 'varchar'],
                                [$varFullName_DEFAULT, 'varchar'],
                                [$varFullCode_CUSTOM, 'varchar'],
                                [$varFullName_CUSTOM, 'varchar']
                            ]
                        )
                    );

                $varReturn['data'] =
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        $varReturn['data'][0]['Func_GetReport_DataPickList_ChartOfAccountNonHeader']
                    );

                return
                    $varReturn;
            } catch (\Exception $ex) {
                return
                    [];
            }
        }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getReport_Form_Resume_BalanceSheet                                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2026-08-14                                                                                           |
        | ▪ Creation Date   : 2026-08-14                                                                                           |
        | ▪ Description     : Mendapatkan Laporan Resume - Nerace (Balance Sheet)                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varStartDate ► Start Date                                                                                |
        |      ▪ (string) varFinishDate ► Finish Date                                                                              |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getReport_Form_Resume_BalanceSheet(
            $varUserSession,
            int $varSysBranch_RefID,
            string $varStartDate,
            string $varFinishDate
        ) {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Accounting.Func_GetReport_Resume_BalanceSheet',
                            [
                                [$varUserSession, 'bigint'],
                                [$varSysBranch_RefID, 'bigint'],

                                [$varStartDate, 'date'],
                                [$varFinishDate, 'date']
                            ]
                        )
                    );

                $varReturn['data'] =
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        $varReturn['data'][0]['Func_GetReport_Resume_BalanceSheet']
                    );

                return
                    $varReturn;
            } catch (\Exception $ex) {
                return
                    [];
            }
        }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getReport_Form_Resume_GeneralLedger                                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2026-08-11                                                                                           |
        | ▪ Creation Date   : 2026-08-11                                                                                           |
        | ▪ Description     : Mendapatkan Laporan Resume - Buku Besar (General Ledger)                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ------------------------------                                                                                      |
        |      ▪ (int)    varSysID ► Record ID                                                                                     |
        |      ▪ (string) varStartDate ► Start Date                                                                                |
        |      ▪ (string) varFinishDate ► Finish Date                                                                              |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getReport_Form_Resume_GeneralLedger(
            $varUserSession,
            int $varSysBranch_RefID,
            int $varSysID,
            string $varStartDate,
            string $varFinishDate
        ) {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Accounting.Func_GetReport_Resume_GeneralLedger',
                            [
                                [$varUserSession, 'bigint'],
                                [$varSysBranch_RefID, 'bigint'],

                                [$varSysID, 'bigint'],
                                [$varStartDate, 'date'],
                                [$varFinishDate, 'date']
                            ]
                        )
                    );


                $varReturn['data'] =
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        $varReturn['data'][0]['Func_GetReport_Resume_GeneralLedger']
                    );

                return
                    $varReturn;
            } catch (\Exception $ex) {
                return
                    [];
            }
        }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getReport_Form_Resume_ProfitLoss                                                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2026-08-13                                                                                           |
        | ▪ Creation Date   : 2026-08-13                                                                                           |
        | ▪ Description     : Mendapatkan Laporan Resume - Laba Rugi (Profit Loss)                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varStartDate ► Start Date                                                                                |
        |      ▪ (string) varFinishDate ► Finish Date                                                                              |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getReport_Form_Resume_ProfitLoss(
            $varUserSession,
            int $varSysBranch_RefID,
            string $varStartDate,
            string $varFinishDate
        ) {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Accounting.Func_GetReport_Resume_ProfitLoss',
                            [
                                [$varUserSession, 'bigint'],
                                [$varSysBranch_RefID, 'bigint'],

                                [$varStartDate, 'date'],
                                [$varFinishDate, 'date']
                            ]
                        )
                    );

                $varReturn['data'] =
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        $varReturn['data'][0]['Func_GetReport_Resume_ProfitLoss']
                    );

                return
                    $varReturn;
            } catch (\Exception $ex) {
                return
                    [];
            }
        }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getReport_Form_Resume_TrialBalance                                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2026-08-14                                                                                           |
        | ▪ Creation Date   : 2026-08-14                                                                                           |
        | ▪ Description     : Mendapatkan Laporan Resume - Nerace Saldo (Trial Balance)                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varStartDate ► Start Date                                                                                |
        |      ▪ (string) varFinishDate ► Finish Date                                                                              |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getReport_Form_Resume_TrialBalance(
            $varUserSession,
            int $varSysBranch_RefID,
            string $varStartDate,
            string $varFinishDate
        ) {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Accounting.Func_GetReport_Resume_TrialBalance',
                            [
                                [$varUserSession, 'bigint'],
                                [$varSysBranch_RefID, 'bigint'],

                                [$varStartDate, 'date'],
                                [$varFinishDate, 'date']
                            ]
                        )
                    );

                $varReturn['data'] =
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        $varReturn['data'][0]['Func_GetReport_Resume_TrialBalance']
                    );

                return
                    $varReturn;
            } catch (\Exception $ex) {
                return
                    [];
            }
        }


    }
}
