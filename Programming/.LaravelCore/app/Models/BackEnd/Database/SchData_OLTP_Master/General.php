<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Models                                                                                                    |
| ▪ Name Space : \App\Models\Database\SchData_OLTP_Master                                                                          |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2020 - 2024 Zheta (teguhpjs@gmail.com)                                                                              |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Models\Database\SchData_OLTP_Master
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : General                                                                                                      |
    | ▪ Description : Menangani Models Database ► SchData_OLTP_Master ► Non Specific Table                                         |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class General //extends \Illuminate\Database\Eloquent\Model
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getBusinessDocumentLastVersionByBusDocType                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-09-19                                                                                           |
        | ▪ Creation Date   : 2023-09-19                                                                                           |
        | ▪ Description     : Get Business Document Last Version By Bus Doc Type                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ▪ (string) varFormNumberKeyword ► Form Number Keyword                                                               |
        |      ▪ (int)    varApproverEntity_RefID ► Approver Entity Reference ID                                                   |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getBusinessDocumentLastVersionByBusDocType(
            $varUserSession, int $BusinessDocumentTypeID)
            {
            $varReturn =
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession,
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchData-OLTP-Master.Func_General_GetBusinessDocumentLastVersionByBusDocType',
                        [
                            [$BusinessDocumentTypeID, 'bigint']
                        ]
                        )
                    );

            return $varReturn['data'];
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getBusinessDocumentLastVersionByFormNumberKeyword                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-09-19                                                                                           |
        | ▪ Creation Date   : 2023-09-19                                                                                           |
        | ▪ Description     : Get Business Document Last Version By Form Number Keyword                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ▪ (string) varFormNumberKeyword ► Form Number Keyword                                                               |
        |      ▪ (int)    varApproverEntity_RefID ► Approver Entity Reference ID                                                   |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getBusinessDocumentLastVersionByFormNumberKeyword(
            $varUserSession, int $varSysBranch_RefID,
            string $varFormNumberKeyword, int $varApproverEntity_RefID = null)
            {
            $varReturn =
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession,
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchData-OLTP-Master.Func_General_GetBusinessDocumentLastVersionByFormNumber',
                        [
                            [$varFormNumberKeyword, 'varchar'],
                            [$varApproverEntity_RefID, 'bigint']
                        ]
                        )
                    );

            return $varReturn['data'];
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getIDTranslation_BusinessDocumentVersionToBusinessDocumentForm                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-09-21                                                                                           |
        | ▪ Creation Date   : 2023-09-21                                                                                           |
        | ▪ Description     : Get ID Translation : Busines Document Version ID To Business Document Form ID                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ▪ (int)    varBusinessDocumentVersionID ► Business Document Version ID                                              |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getIDTranslation_BusinessDocumentVersionToBusinessDocumentForm(
            $varUserSession, int $varSysBranch_RefID,
            int $varBusinessDocumentVersionID = null)
            {
            $varReturn =
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession,
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchData-OLTP-Master.Func_GetIDTranslation_BusinessDocVersionToBusinessDocForm',
                        [
                            ['{'.$varBusinessDocumentVersionID.'}', 'bigint[]']
                        ]
                        )
                    );

            return $varReturn['data'];
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataEntities_CountryAdministrativeArea                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-06-27                                                                                           |
        | ▪ Creation Date   : 2022-06-27                                                                                           |
        | ▪ Description     : Get Data Entities - Country Administrative Area                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ------------------------------                                                                                      |
        |      ▪ (int)    varSysID ► System Record ID                                                                              |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataEntities_CountryAdministrativeArea(
            $varUserSession,
            string $varIDSet)
            {
            try {
                $varFunctionName = 'SchData-OLTP-Master.Func_GetDataEntities_CountryAdministrativeArea';

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
                            $varTemp['data'][$i][explode('.', $varFunctionName)[1]]
                            );
                    }

                return $varReturn;
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataEntities_Entity                                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-09-26                                                                                           |
        | ▪ Creation Date   : 2022-09-26                                                                                           |
        | ▪ Description     : Get Data Entities                                                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ------------------------------                                                                                      |
        |      ▪ (int)    varSysID ► System Record ID                                                                              |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataEntities_Entity(
            $varUserSession,
            string $varIDSet)
            {
            try {
                $varFunctionName = 'SchData-OLTP-Master.Func_GetDataEntities_Entity';

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
                            $varTemp['data'][$i][explode('.', $varFunctionName)[1]]
                            );
                    }
                return $varReturn;
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataEntities_EntityContactNumber                                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-11-11                                                                                           |
        | ▪ Creation Date   : 2022-11-11                                                                                           |
        | ▪ Description     : Get Data Nomor Kontak Entitas                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ------------------------------                                                                                      |
        |      ▪ (int)    varSysID ► System Record ID                                                                              |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataEntities_EntityContactNumber(
            $varUserSession,
            string $varIDSet)
            {
            try {
                $varFunctionName = 'SchData-OLTP-Master.Func_GetDataEntities_EntityContactNumber';

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
                            $varTemp['data'][$i][explode('.', $varFunctionName)[1]]
                            );
                    }

                return $varReturn;
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getData_CentralBankCurrencyExchangtMiddleRateByCurrencyISOCode                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-02-09                                                                                           |
        | ▪ Creation Date   : 2021-02-09                                                                                           |
        | ▪ Description     : Mendapatkan Kurs Tengah Bank Sentral berdasarkan ISO Code Mata Uang                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varDateTimeTZ ► Date Time TimeZone                                                                       |
        |      ▪ (string) varCurrencyISOCode ► Currency ISO Code                                                                   |
        |      ▪ (string) varBaseCurrencyISOCode ► Base Currency ISO Code (Optional)                                               |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (float)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getData_CentralBankCurrencyExchangtMiddleRateByCurrencyISOCode(
            $varUserSession,
            string $varDateTimeTZ, string $varCurrencyISOCode, string $varBaseCurrencyISOCode = null)
            {
            try {
                if(!$varBaseCurrencyISOCode)
                    {
                    $varBaseCurrencyISOCode = 'IDR';
                    }

                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_General_GetCurrencyExchangeRateCentralBankByISOCode',
                            [
                                [$varDateTimeTZ, 'timestamptz'],
                                [$varBaseCurrencyISOCode, 'varchar'],
                                [$varCurrencyISOCode, 'varchar']
                            ]
                            )
                        );

                return $varReturn['data'][0]['Func_General_GetCurrencyExchangeRateCentralBankByISOCode'];
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataList_AccountingEntryRecordType                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-10-13                                                                                           |
        | ▪ Creation Date   : 2022-10-13                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Accounting Entry Record Type                                                      |
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
        public function getDataList_AccountingEntryRecordType(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataList_AccountingEntryRecordType',
                            [
                                [$varSysBranch_RefID, 'bigint'],

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
        | ▪ Method Name     : getDataList_Bank                                                                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-11-26                                                                                           |
        | ▪ Creation Date   : 2021-11-26                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Bank                                                                              |
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
        public function getDataList_Bank(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null
            )
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataList_Bank',
                            [
                                [$varSysBranch_RefID, 'bigint'],

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
        | ▪ Method Name     : getDataList_BankAccount                                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2022-10-14                                                                                           |
        | ▪ Creation Date   : 2021-11-26                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Akun Bank                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ------------------------------                                                                                      |
        |      ▪ (int)    varBank_RefID ► Bank Reference ID                                                                        |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_BankAccount(
            $varUserSession, int $varSysBranch_RefID,
            int $varBank_RefID = null,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null
            )
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataList_BankAccount',
                            [
                                [$varSysBranch_RefID, 'bigint'],

                                [$varBank_RefID, 'bigint'],

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
        | ▪ Method Name     : getDataList_BankBranch                                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-10-13                                                                                           |
        | ▪ Creation Date   : 2022-10-13                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Cabang Bank                                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ------------------------------                                                                                      |
        |      ▪ (int)    varBank_RefID ► Bank Reference ID                                                                        |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_BankBranch(
            $varUserSession, int $varSysBranch_RefID,
            int $varBank_RefID = null,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null
            )
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataList_BankBranch',
                            [
                                [$varSysBranch_RefID, 'bigint'],

                                [$varBank_RefID, 'bigint'],

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
        | ▪ Method Name     : getDataList_BloodAglutinogenType                                                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-10-28                                                                                           |
        | ▪ Creation Date   : 2020-10-28                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Jenis Aglutinogen Darah                                                           |
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
        public function getDataList_BloodAglutinogenType(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null
            )
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataList_BloodAglutinogenType',
                            [
                                [$varSysBranch_RefID, 'bigint'],

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
        | ▪ Method Name     : getDataList_BudgetOrigin                                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0001.0000000                                                                                       |
        | ▪ Last Update     : 2021-08-13                                                                                           |
        | ▪ Creation Date   : 2021-08-13                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Asal Anggaran                                                                     |
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
        public function getDataList_BudgetOrigin(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null
            )
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataList_BudgetOrigin',
                            [
                                [$varSysBranch_RefID, 'bigint'],

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
        | ▪ Method Name     : getDataList_BusinessDocument                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0001.0000000                                                                                       |
        | ▪ Last Update     : 2020-10-28                                                                                           |
        | ▪ Creation Date   : 2020-10-28                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Dokumen Bisnis                                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ------------------------------                                                                                      |
        |      ▪ (int)    varBusinessDocumentType_RefID ► Business Document Type Reference ID                                      |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_BusinessDocument(
            $varUserSession, int $varSysBranch_RefID,
            int $varBusinessDocumentType_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null
            )
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataList_BusinessDocument',
                            [
                                [$varSysBranch_RefID, 'bigint'],

                                [$varBusinessDocumentType_RefID, 'bigint'],

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
        | ▪ Method Name     : getDataList_BusinessDocumentType                                                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-10-28                                                                                           |
        | ▪ Creation Date   : 2020-10-28                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Jenis Dokumen Bisnis                                                              |
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
        public function getDataList_BusinessDocumentType(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null
            )
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataList_BusinessDocumentType',
                            [
                                [$varSysBranch_RefID, 'bigint'],

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
        | ▪ Method Name     : getDataList_BusinessDocumentVersion                                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-07-06                                                                                           |
        | ▪ Creation Date   : 2021-07-06                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Versi Dokumen Bisnis                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ------------------------------                                                                                      |
        |      ▪ (int)    varBusinessDocument_RefID ► Business Document Reference ID                                               |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_BusinessDocumentVersion(
            $varUserSession, int $varSysBranch_RefID,
            int $varBusinessDocument_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null
            )
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataList_BusinessDocumentVersion',
                            [
                                [$varSysBranch_RefID, 'bigint'],

                                [$varBusinessDocument_RefID, 'bigint'],

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
        | ▪ Method Name     : getDataList_CitizenGender                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-08-12                                                                                           |
        | ▪ Creation Date   : 2021-08-12                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Jenis Kelamin Penduduk                                                            |
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
        public function getDataList_CitizenGender(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null
            )
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataList_CitizenGender',
                            [
                                [$varSysBranch_RefID, 'bigint'],

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
        | ▪ Method Name     : getDataList_CitizenIdentity                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-10-28                                                                                           |
        | ▪ Creation Date   : 2020-10-28                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Identitas Kependudukan                                                            |
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
        public function getDataList_CitizenIdentity(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null
            )
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataList_CitizenIdentity',
                            [
                                [$varSysBranch_RefID, 'bigint'],

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
        | ▪ Method Name     : getDataList_ContactNumberType                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0001.0000000                                                                                       |
        | ▪ Last Update     : 2022-11-09                                                                                           |
        | ▪ Creation Date   : 2022-11-09                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Jenis Nomor Kontak                                                                |
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
        public function getDataList_ContactNumberType(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null
            )
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataList_ContactNumberType',
                            [
                                [$varSysBranch_RefID, 'bigint'],

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
        | ▪ Method Name     : getDataList_Country                                                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0001.0000000                                                                                       |
        | ▪ Last Update     : 2020-10-20                                                                                           |
        | ▪ Creation Date   : 2020-10-20                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Negara                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_Country(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null
            )
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataList_Country',
                            [
                                [$varSysBranch_RefID, 'bigint'],

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
        | ▪ Method Name     : getDataList_CountryAdministrativeArea                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-05-16                                                                                           |
        | ▪ Creation Date   : 2025-05-16                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Wilayah Administrasi Negara (Negara, Propinsi, Kota/Kabupaten, Kecamatan, dan     |
        |                     Kota/Desa)                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_CountryAdministrativeArea(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null
            )
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataList_CountryAdministrativeArea',
                            [
                                [$varSysBranch_RefID, 'bigint'],

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
        | ▪ Method Name     : getDataList_CountryAdministrativeAreaLevel1                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0001.0000000                                                                                       |
        | ▪ Last Update     : 2020-10-20                                                                                           |
        | ▪ Creation Date   : 2020-10-20                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Propinsi (Daerah Tingkat 1)                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ------------------------------                                                                                      |
        |      ▪ (int)    varCountry_RefID ► Country Reference ID                                                                  |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_CountryAdministrativeAreaLevel1(
            $varUserSession, int $varSysBranch_RefID,
            int $varCountry_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null
            )
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataList_CountryAdministrativeAreaLevel1',
                            [
                                [$varSysBranch_RefID, 'bigint'],

                                [$varCountry_RefID, 'bigint'],

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
        | ▪ Method Name     : getDataList_CountryAdministrativeAreaLevel2                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-10-28                                                                                           |
        | ▪ Creation Date   : 2020-10-28                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Kabupaten/Kota (Daerah Tingkat 2)                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ------------------------------                                                                                      |
        |      ▪ (int)    varCountryAdministrativeAreaLevel1_RefID ► Country Administrative Area Level 1 Reference ID              |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_CountryAdministrativeAreaLevel2(
            $varUserSession, int $varSysBranch_RefID,
            int $varCountryAdministrativeAreaLevel1_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null
            )
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataList_CountryAdministrativeAreaLevel2',
                            [
                                [$varSysBranch_RefID, 'bigint'],

                                [$varCountryAdministrativeAreaLevel1_RefID, 'bigint'],

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
        | ▪ Method Name     : getDataList_CountryAdministrativeAreaLevel3                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-10-28                                                                                           |
        | ▪ Creation Date   : 2020-10-28                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Kecamatan (Daerah Tingkat 3)                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ------------------------------                                                                                      |
        |      ▪ (int)    varCountryAdministrativeAreaLevel2_RefID ► Country Administrative Area Level 2 Reference ID              |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_CountryAdministrativeAreaLevel3(
            $varUserSession, int $varSysBranch_RefID,
            int $varCountryAdministrativeAreaLevel2_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null
            )
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataList_CountryAdministrativeAreaLevel3',
                            [
                                [$varSysBranch_RefID, 'bigint'],

                                [$varCountryAdministrativeAreaLevel2_RefID, 'bigint'],

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
        | ▪ Method Name     : getDataList_CountryAdministrativeAreaLevel4                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-10-28                                                                                           |
        | ▪ Creation Date   : 2020-10-28                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Kelurahan/Desa (Daerah Tingkat 4)                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ------------------------------                                                                                      |
        |      ▪ (int)    varCountryAdministrativeAreaLevel3_RefID ► Country Administrative Area Level 3 Reference ID              |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_CountryAdministrativeAreaLevel4(
            $varUserSession, int $varSysBranch_RefID,
            int $varCountryAdministrativeAreaLevel3_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null
            )
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataList_CountryAdministrativeAreaLevel4',
                            [
                                [$varSysBranch_RefID, 'bigint'],

                                [$varCountryAdministrativeAreaLevel3_RefID, 'bigint'],

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
        | ▪ Method Name     : getDataList_Currency                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-10-28                                                                                           |
        | ▪ Creation Date   : 2020-10-28                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Mata Uang                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_Currency(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null
            )
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataList_Currency',
                            [
                                [$varSysBranch_RefID, 'bigint'],

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
        | ▪ Method Name     : getDataList_EntityBankAccount                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0001.0000000                                                                                       |
        | ▪ Last Update     : 2023-06-08                                                                                           |
        | ▪ Creation Date   : 2023-06-08                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Akun Bank Entitas                                                                 |
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
        public function getDataList_EntityBankAccount(
            $varUserSession, int $varSysBranch_RefID,
            int $varEntity_RefID = null,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null
            )
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataList_EntityBankAccount',
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

                return
                    $varReturn;
                }

            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataList_EntityContactNumber                                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0001.0000000                                                                                       |
        | ▪ Last Update     : 2022-11-10                                                                                           |
        | ▪ Creation Date   : 2022-11-10                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Nomor Kontak Entitas                                                              |
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
        public function getDataList_EntityContactNumber(
            $varUserSession, int $varSysBranch_RefID,
            int $varEntity_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null
            )
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataList_EntityContactNumber',
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

                return
                    $varReturn;
                }

            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataList_GoodsModel                                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-10-28                                                                                           |
        | ▪ Creation Date   : 2020-10-28                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Model Barang                                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ------------------------------                                                                                      |
        |      ▪ (int)    varTradeMark_RefID ► Trade Mark Reference ID                                                             |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_GoodsModel(
            $varUserSession, int $varSysBranch_RefID,
            int $varTradeMark_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null
            )
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataList_GoodsModel',
                            [
                                [$varSysBranch_RefID, 'bigint'],

                                [$varTradeMark_RefID, 'bigint'],

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
        | ▪ Method Name     : getDataList_Institution                                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-03-07                                                                                           |
        | ▪ Creation Date   : 2022-03-07                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Institusi                                                                         |
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
        public function getDataList_Institution(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null
            )
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataList_Institution',
                            [
                                [$varSysBranch_RefID, 'bigint'],

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
        | ▪ Method Name     : getDataList_InstitutionType                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-03-07                                                                                           |
        | ▪ Creation Date   : 2022-03-07                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Jenis Institusi                                                                   |
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
        public function getDataList_InstitutionType(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null
            )
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataList_InstitutionType',
                            [
                                [$varSysBranch_RefID, 'bigint'],

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
        | ▪ Method Name     : getDataList_PaymentDisbursementMethod                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-11-03                                                                                           |
        | ▪ Creation Date   : 2022-11-03                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Metode Pencairan Pembayaran                                                       |
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
        public function getDataList_PaymentDisbursementMethod(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null
            )
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataList_PaymentDisbursementMethod',
                            [
                                [$varSysBranch_RefID, 'bigint'],

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
        | ▪ Method Name     : getDataList_PaymentMethod                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-03-04                                                                                           |
        | ▪ Creation Date   : 2022-03-04                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Payment Method                                                                    |
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
        public function getDataList_PaymentMethod(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null
            )
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataList_PaymentMethod',
                            [
                                [$varSysBranch_RefID, 'bigint'],

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
        | ▪ Method Name     : getDataList_PaymentTerm                                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-03-04                                                                                           |
        | ▪ Creation Date   : 2022-03-04                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Payment Term                                                                      |
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
        public function getDataList_PaymentTerm(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null
            )
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataList_PaymentTerm',
                            [
                                [$varSysBranch_RefID, 'bigint'],

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
        | ▪ Method Name     : getDataList_TermOfPayment                                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-02-28                                                                                           |
        | ▪ Creation Date   : 2025-02-28                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Payment Term                                                                      |
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
        public function getDataList_TermOfPayment(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null
            )
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataList_PaymentTerm',
                            [
                                [$varSysBranch_RefID, 'bigint'],

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
        | ▪ Method Name     : getDataList_Period                                                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-11-02                                                                                           |
        | ▪ Creation Date   : 2020-11-02                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Periode Waktu                                                                     |
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
        public function getDataList_Period(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null
            )
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataList_Period',
                            [
                                [$varSysBranch_RefID, 'bigint'],

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
        | ▪ Method Name     : getDataList_Person                                                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-11-02                                                                                           |
        | ▪ Creation Date   : 2020-11-02                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Orang                                                                             |
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
        public function getDataList_Person(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null
            )
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataList_Person',
                            [
                                [$varSysBranch_RefID, 'bigint'],

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
        | ▪ Method Name     : getDataList_PersonAccountEMail                                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-11-02                                                                                           |
        | ▪ Creation Date   : 2020-11-02                                                                                           |
        | ▪ Description     : Mendapatkan Daftar E-Mail Perorangan                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ------------------------------                                                                                      |
        |      ▪ (int)    varPerson_RefID ► Person Reference ID                                                                    |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_PersonAccountEMail(
            $varUserSession, int $varSysBranch_RefID,
            int $varPerson_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null
            )
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataList_PersonAccountEMail',
                            [
                                [$varSysBranch_RefID, 'bigint'],

                                [$varPerson_RefID, 'bigint'],

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
        | ▪ Method Name     : getDataList_PersonGender                                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-11-02                                                                                           |
        | ▪ Creation Date   : 2020-11-02                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Jenis Kelamin Orang                                                               |
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
        public function getDataList_PersonGender(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null
            )
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataList_PersonGender',
                            [
                                [$varSysBranch_RefID, 'bigint'],

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
        | ▪ Method Name     : getDataList_Product                                                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-12-28                                                                                           |
        | ▪ Creation Date   : 2022-12-28                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Jenis Produk                                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varDateTime ► Date Time                                                                                  |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_Product(
            $varUserSession, int $varSysBranch_RefID,
            string $varDateTime = null,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null
            )
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataList_Product',
                            [
                                [$varSysBranch_RefID, 'bigint'],

                                [$varDateTime, 'timestamptz'],

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
        | ▪ Method Name     : getDataList_ProductType                                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-11-02                                                                                           |
        | ▪ Creation Date   : 2020-11-02                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Jenis Produk                                                                      |
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
        public function getDataList_ProductType(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null
            )
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataList_ProductType',
                            [
                                [$varSysBranch_RefID, 'bigint'],

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
        | ▪ Method Name     : getDataList_QuantityUnit                                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-11-02                                                                                           |
        | ▪ Creation Date   : 2020-11-02                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Unit Kuantitas                                                                    |
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
        public function getDataList_QuantityUnit(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null
            )
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataList_QuantityUnit',
                            [
                                [$varSysBranch_RefID, 'bigint'],

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
        | ▪ Method Name     : getDataList_Religion                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-11-02                                                                                           |
        | ▪ Creation Date   : 2020-11-02                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Agama                                                                             |
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
        public function getDataList_Religion(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null
            )
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataList_Religion',
                            [
                                [$varSysBranch_RefID, 'bigint'],

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
        | ▪ Method Name     : getDataList_TradeMark                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-10-28                                                                                           |
        | ▪ Creation Date   : 2020-10-28                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Merk Dagang                                                                       |
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
        public function getDataList_TradeMark(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null
            )
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataList_TradeMark',
                            [
                                [$varSysBranch_RefID, 'bigint'],

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
        | ▪ Method Name     : getDataList_TransactionAdditionalCostType                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-04-18                                                                                           |
        | ▪ Creation Date   : 2022-04-18                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Jenis Biaya Tambahan Transksi                                                     |
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
        public function getDataList_TransactionAdditionalCostType(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null
            )
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataList_TransactionAdditionalCostType',
                            [
                                [$varSysBranch_RefID, 'bigint'],

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
        | ▪ Method Name     : getDataList_VehicleType                                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-11-03                                                                                           |
        | ▪ Creation Date   : 2022-11-03                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Jenis Kendaraan                                                                   |
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
        public function getDataList_VehicleType(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null
            )
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataList_VehicleType',
                            [
                                [$varSysBranch_RefID, 'bigint'],

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
        | ▪ Method Name     : getDataListJSON_Bank                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-05-19                                                                                           |
        | ▪ Creation Date   : 2025-05-19                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Negara                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataListJSON_Bank(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null
            )
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataListJSON_Bank',
                            [
                                [$varSysBranch_RefID, 'bigint'],

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
                        $varReturn['data'][0]['Func_GetDataListJSON_Bank']
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
        | ▪ Method Name     : getDataListJSON_BusinessDocument                                                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-08-12                                                                                           |
        | ▪ Creation Date   : 2024-08-12                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Dokumen Bisnis                                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ------------------------------                                                                                      |
        |      ▪ (int)    varBusinessDocumentType_RefID ► Business Document Type Reference ID                                      |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataListJSON_BusinessDocument(
            $varUserSession, int $varSysBranch_RefID,
            int $varBusinessDocumentType_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataListJSON_BusinessDocument',
                            [
                                [$varSysBranch_RefID, 'bigint'],

                                [$varBusinessDocumentType_RefID, 'bigint'],

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
                        $varReturn['data'][0]['Func_GetDataListJSON_BusinessDocument']
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
        | ▪ Method Name     : getDataListJSON_Country                                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0001.0000000                                                                                       |
        | ▪ Last Update     : 2025-05-16                                                                                           |
        | ▪ Creation Date   : 2025-05-16                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Negara                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataListJSON_Country(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null
            )
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataListJSON_Country',
                            [
                                [$varSysBranch_RefID, 'bigint'],

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
                        $varReturn['data'][0]['Func_GetDataListJSON_Country']
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
        | ▪ Method Name     : getDataListJSON_CountryAdministrativeArea                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0001.0000000                                                                                       |
        | ▪ Last Update     : 2025-05-16                                                                                           |
        | ▪ Creation Date   : 2025-05-16                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Wilayah Administrasi Negara (Negara, Propinsi, Kota/Kabupaten, Kecamatan, dan     |
        |                     Kota/Desa)                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataListJSON_CountryAdministrativeArea(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null
            )
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataListJSON_CountryAdministrativeArea',
                            [
                                [$varSysBranch_RefID, 'bigint'],

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
                        $varReturn['data'][0]['Func_GetDataListJSON_CountryAdministrativeArea']
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
        | ▪ Method Name     : getDataListJSON_CountryAdministrativeAreaLevel1                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0001.0000000                                                                                       |
        | ▪ Last Update     : 2020-10-20                                                                                           |
        | ▪ Creation Date   : 2020-10-20                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Propinsi (Daerah Tingkat 1)                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ------------------------------                                                                                      |
        |      ▪ (int)    varCountry_RefID ► Country Reference ID                                                                  |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataListJSON_CountryAdministrativeAreaLevel1(
            $varUserSession, int $varSysBranch_RefID,
            int $varCountry_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null
            )
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataListJSON_CountryAdministrativeAreaLevel1',
                            [
                                [$varSysBranch_RefID, 'bigint'],

                                [$varCountry_RefID, 'bigint'],

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
                        $varReturn['data'][0]['Func_GetDataListJSON_CountryAdministrativeAreaLevel1']
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
        | ▪ Method Name     : getDataListJSON_PersonGender                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-08-09                                                                                           |
        | ▪ Creation Date   : 2024-08-09                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Jenis Kelamin Orang                                                               |
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
        public function getDataListJSON_PersonGender(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataListJSON_PersonGender',
                            [
                                [$varSysBranch_RefID, 'bigint'],

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
                        $varReturn['data'][0]['Func_GetDataListJSON_PersonGender']
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
        | ▪ Method Name     : getDataListJSON_Product                                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-08-09                                                                                           |
        | ▪ Creation Date   : 2024-08-09                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Jenis Produk                                                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varDateTime ► Date Time                                                                                  |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataListJSON_Product(
            $varUserSession, int $varSysBranch_RefID,
            string $varDateTime = null,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataListJSON_Product',
                            [
                                [$varSysBranch_RefID, 'bigint'],

                                [$varDateTime, 'timestamptz'],

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
                        $varReturn['data'][0]['Func_GetDataListJSON_Product']
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
        | ▪ Method Name     : getDataPickList_AccountingEntryRecordType                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-10-13                                                                                           |
        | ▪ Creation Date   : 2022-10-13                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Accounting Entry Record Type                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_AccountingEntryRecordType(
            $varUserSession, int $varSysBranch_RefID
            )
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataPickList_AccountingEntryRecordType',
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
        | ▪ Method Name     : getDataPickList_Bank                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-11-26                                                                                           |
        | ▪ Creation Date   : 2021-11-26                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Bank                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_Bank(
            $varUserSession, int $varSysBranch_RefID
            )
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataPickList_Bank',
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
        | ▪ Method Name     : getDataPickList_BankAccount                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-11-26                                                                                           |
        | ▪ Creation Date   : 2021-11-26                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Akun Bank                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ------------------------------                                                                                      |
        |      ▪ (int)    varBank_RefID ► Bank Reference ID                                                                        |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_BankAccount(
            $varUserSession, int $varSysBranch_RefID,
            int $varBank_RefID = null
            )
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataPickList_BankAccount',
                            [
                                [$varSysBranch_RefID, 'bigint'],

                                [$varBank_RefID, 'bigint']
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
        | ▪ Method Name     : getDataPickList_BankBranch                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-10-13                                                                                           |
        | ▪ Creation Date   : 2022-10-13                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Akun Bank                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ------------------------------                                                                                      |
        |      ▪ (int)    varBank_RefID ► Bank Reference ID                                                                        |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_BankBranch(
            $varUserSession, int $varSysBranch_RefID,
            int $varBank_RefID = null
            )
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataPickList_BankBranch',
                            [
                                [$varSysBranch_RefID, 'bigint'],

                                [$varBank_RefID, 'bigint']
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
        | ▪ Method Name     : getDataPickList_BusinessDocumentFormLatestVersion                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-04-09                                                                                           |
        | ▪ Creation Date   : 2025-04-09                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Versi Terakhir Form Dokumen Bisnis                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ------------------------------                                                                                      |
        |      ▪ (int)    varBusinessDocumentType_RefID ► Business Document Type Reference ID                                      |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_BusinessDocumentFormLatestVersion(
            $varUserSession, int $varSysBranch_RefID,
            int $varBusinessDocumentType_RefID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataPickList_BusinessDocumentLatestVersion',
                            [
                                [$varSysBranch_RefID, 'bigint'],

                                [$varBusinessDocumentType_RefID, 'bigint']
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
        | ▪ Method Name     : getDataPickList_BusinessDocumentLatestVersion                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-04-09                                                                                           |
        | ▪ Creation Date   : 2025-04-09                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Versi Terakhir Dokumen Bisnis                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ------------------------------                                                                                      |
        |      ▪ (int)    varBusinessDocumentType_RefID ► Business Document Type Reference ID                                      |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_BusinessDocumentLatestVersion(
            $varUserSession, int $varSysBranch_RefID,
            int $varBusinessDocumentType_RefID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataPickList_BusinessDocumentLatestVersion',
                            [
                                [$varSysBranch_RefID, 'bigint'],

                                [$varBusinessDocumentType_RefID, 'bigint']
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
        | ▪ Method Name     : getDataPickList_ContactNumberType                                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-11-09                                                                                           |
        | ▪ Creation Date   : 2022-11-09                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Contact Number Type                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_ContactNumberType(
            $varUserSession, int $varSysBranch_RefID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataPickList_ContactNumberType',
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
        | ▪ Method Name     : getDataPickList_Country                                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-06-02                                                                                           |
        | ▪ Creation Date   : 2022-06-02                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Country                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_Country(
            $varUserSession, int $varSysBranch_RefID
            )
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataPickList_Country',
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
        | ▪ Method Name     : getDataPickList_CountryAdministrativeAreaLevel1                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-06-07                                                                                           |
        | ▪ Creation Date   : 2022-06-07                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Country Administrative Area Level 1                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ------------------------------                                                                                      |
        |      ▪ (int)    varCountry_RefID ► Country Reference ID                                                                  |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_CountryAdministrativeAreaLevel1(
            $varUserSession, int $varSysBranch_RefID,
            int $varCountry_RefID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataPickList_CountryAdministrativeAreaLevel1',
                            [
                                [$varSysBranch_RefID, 'bigint'],

                                [$varCountry_RefID, 'bigint']
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
        | ▪ Method Name     : getDataPickList_CountryAdministrativeAreaLevel2                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-06-09                                                                                           |
        | ▪ Creation Date   : 2022-06-09                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Country Administrative Area Level 2                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ------------------------------                                                                                      |
        |      ▪ (int)    varCountryAdministrativeAreaLevel1_RefID ► Country Administrative Area Level 1 Reference ID              |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_CountryAdministrativeAreaLevel2(
            $varUserSession, int $varSysBranch_RefID,
            int $varCountryAdministrativeAreaLevel1_RefID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataPickList_CountryAdministrativeAreaLevel2',
                            [
                                [$varSysBranch_RefID, 'bigint'],

                                [$varCountryAdministrativeAreaLevel1_RefID, 'bigint']
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
        | ▪ Method Name     : getDataPickList_CountryAdministrativeAreaLevel3                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-06-09                                                                                           |
        | ▪ Creation Date   : 2022-06-09                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Country Administrative Area Level 3                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ------------------------------                                                                                      |
        |      ▪ (int)    varCountryAdministrativeAreaLevel2_RefID ► Country Administrative Area Level 2 Reference ID              |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_CountryAdministrativeAreaLevel3(
            $varUserSession, int $varSysBranch_RefID,
            int $varCountryAdministrativeAreaLevel2_RefID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataPickList_CountryAdministrativeAreaLevel3',
                            [
                                [$varSysBranch_RefID, 'bigint'],

                                [$varCountryAdministrativeAreaLevel2_RefID, 'bigint']
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
        | ▪ Method Name     : getDataPickList_CountryAdministrativeAreaLevel4                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-06-09                                                                                           |
        | ▪ Creation Date   : 2022-06-09                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Country Administrative Area Level 4                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ------------------------------                                                                                      |
        |      ▪ (int)    varCountryAdministrativeAreaLevel3_RefID ► Country Administrative Area Level 3 Reference ID              |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_CountryAdministrativeAreaLevel4(
            $varUserSession, int $varSysBranch_RefID,
            int $varCountryAdministrativeAreaLevel3_RefID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataPickList_CountryAdministrativeAreaLevel4',
                            [
                                [$varSysBranch_RefID, 'bigint'],

                                [$varCountryAdministrativeAreaLevel3_RefID, 'bigint']
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
        | ▪ Method Name     : getDataPickList_BudgetOrigin                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-08-19                                                                                           |
        | ▪ Creation Date   : 2021-08-19                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Asal Anggaran                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_BudgetOrigin(
            $varUserSession, int $varSysBranch_RefID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataPickList_BudgetOrigin',
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
        | ▪ Method Name     : getDataPickList_EntityBankAccount                                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-06-09                                                                                           |
        | ▪ Creation Date   : 2023-06-09                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Akun Bank Entitas                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ------------------------------                                                                                      |
        |      ▪ (int)    varEntity_RefID ► Entity Reference ID                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_EntityBankAccount(
            $varUserSession, int $varSysBranch_RefID,
            int $varEntity_RefID = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataPickList_EntityBankAccount',
                            [
                                [$varSysBranch_RefID, 'bigint'],

                                [$varEntity_RefID, 'bigint']
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
        | ▪ Method Name     : getDataPickList_EntityContactNumber                                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-06-09                                                                                           |
        | ▪ Creation Date   : 2023-06-09                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Nomor Kontak Entitas                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ------------------------------                                                                                      |
        |      ▪ (int)    varEntity_RefID ► Entity Reference ID                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_EntityContactNumber(
            $varUserSession, int $varSysBranch_RefID,
            int $varEntity_RefID = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataPickList_EntityContactNumber',
                            [
                                [$varSysBranch_RefID, 'bigint'],

                                [$varEntity_RefID, 'bigint']
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
        | ▪ Method Name     : getDataPickList_Institution                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-03-07                                                                                           |
        | ▪ Creation Date   : 2022-03-07                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Institusi                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_Institution(
            $varUserSession, int $varSysBranch_RefID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataPickList_Institution',
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
        | ▪ Method Name     : getDataPickList_InstitutionType                                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-03-07                                                                                           |
        | ▪ Creation Date   : 2022-03-07                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Jenis Institusi                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_InstitutionType(
            $varUserSession, int $varSysBranch_RefID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataPickList_InstitutionType',
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
        | ▪ Method Name     : getDataPickList_PaymentDisbursementMethod                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-11-03                                                                                           |
        | ▪ Creation Date   : 2022-11-03                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Payment Disbursement Method                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_PaymentDisbursementMethod(
            $varUserSession, int $varSysBranch_RefID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataPickList_PaymentDisbursementMethod',
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
        | ▪ Method Name     : getDataPickList_PaymentMethod                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-03-04                                                                                           |
        | ▪ Creation Date   : 2022-03-04                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Payment Method                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_PaymentMethod(
            $varUserSession, int $varSysBranch_RefID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataPickList_PaymentMethod',
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
        | ▪ Method Name     : getDataPickList_PaymentTerm                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-03-04                                                                                           |
        | ▪ Creation Date   : 2022-03-04                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Payment Term                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_PaymentTerm(
            $varUserSession, int $varSysBranch_RefID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataPickList_PaymentTerm',
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
        | ▪ Method Name     : getDataPickList_Person                                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-01-17                                                                                           |
        | ▪ Creation Date   : 2022-01-17                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Person                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_Person(
            $varUserSession, int $varSysBranch_RefID
            )
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataPickList_Person',
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
        | ▪ Method Name     : getDataPickList_Product                                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-12-28                                                                                           |
        | ▪ Creation Date   : 2022-12-28                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Product                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varvarDateTime ► Date Time                                                                               |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_Product(
            $varUserSession, int $varSysBranch_RefID,
            string $varDateTime = null
            )
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataPickList_Product',
                            [
                                [$varSysBranch_RefID, 'bigint'],

                                [$varDateTime, 'timestamptz']
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
        | ▪ Method Name     : getDataPickList_TransactionAdditionalCostType                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-09-22                                                                                           |
        | ▪ Creation Date   : 2022-09-22                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Transaction Additional Cost Type                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_TransactionAdditionalCostType(
            $varUserSession, int $varSysBranch_RefID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataPickList_TransactionAdditionalCostType',
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
        | ▪ Method Name     : getDataPickList_VehicleType                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-11-03                                                                                           |
        | ▪ Creation Date   : 2022-11-03                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Vehicle Type                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_VehicleType(
            $varUserSession, int $varSysBranch_RefID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataPickList_VehicleType',
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
        | ▪ Method Name     : getDataPickListJSON_Bank                                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-05-19                                                                                           |
        | ▪ Creation Date   : 2025-05-19                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Bank                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickListJSON_Bank(
            $varUserSession, int $varSysBranch_RefID
            )
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataPickListJSON_Bank',
                            [
                                [$varSysBranch_RefID, 'bigint']
                            ]
                            )
                        );

                $varReturn['data'] =
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        $varReturn['data'][0]['Func_GetDataPickListJSON_Bank']
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
        | ▪ Method Name     : getDataPickListJSON_BusinessDocumentFormLatestVersion                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-04-09                                                                                           |
        | ▪ Creation Date   : 2025-04-09                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Versi Terakhir Form Dokumen Bisnis                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ------------------------------                                                                                      |
        |      ▪ (int)    varBusinessDocumentType_RefID ► Business Document Type Reference ID                                      |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickListJSON_BusinessDocumentFormLatestVersion(
            $varUserSession, int $varSysBranch_RefID,
            int $varBusinessDocumentType_RefID
            )
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataPickListJSON_BusinessDocumentFormLatestVersion',
                            [
                                [$varSysBranch_RefID, 'bigint'],

                                [$varBusinessDocumentType_RefID, 'bigint']
                            ]
                            )
                        );

                $varReturn['data'] =
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        $varReturn['data'][0]['Func_GetDataPickListJSON_BusinessDocumentFormLatestVersion']
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
        | ▪ Method Name     : getDataPickListJSON_BusinessDocumentLatestVersion                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-04-09                                                                                           |
        | ▪ Creation Date   : 2025-04-09                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Versi Terakhir Dokumen Bisnis                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ------------------------------                                                                                      |
        |      ▪ (int)    varBusinessDocumentType_RefID ► Business Document Type Reference ID                                      |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickListJSON_BusinessDocumentLatestVersion(
            $varUserSession, int $varSysBranch_RefID,
            int $varBusinessDocumentType_RefID
            )
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataPickListJSON_BusinessDocumentLatestVersion',
                            [
                                [$varSysBranch_RefID, 'bigint'],

                                [$varBusinessDocumentType_RefID, 'bigint']
                            ]
                            )
                        );

                $varReturn['data'] =
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        $varReturn['data'][0]['Func_GetDataPickListJSON_BusinessDocumentLatestVersion']
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
        | ▪ Method Name     : getDataPickListJSON_Country                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-06-02                                                                                           |
        | ▪ Creation Date   : 2022-06-02                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Country                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickListJSON_Country(
            $varUserSession, int $varSysBranch_RefID
            )
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataPickListJSON_Country',
                            [
                                [$varSysBranch_RefID, 'bigint']
                            ]
                            )
                        );

                $varReturn['data'] =
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        $varReturn['data'][0]['Func_GetDataPickListJSON_Country']
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
        | ▪ Method Name     : getDataResume_BusinessDocumentFormAndLinkageFileUpload                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-04-03                                                                                           |
        | ▪ Creation Date   : 2024-04-03                                                                                           |
        | ▪ Description     : Mendapatkan Resume File Upload Form Dokumen Bisnis Beserta Dokumen Terkait Lainnya                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ------------------------------                                                                                      |
        |      ▪ (int)    varBusinessDocumentForm_RefID ► Business Document Form Reference ID                                      |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataResume_BusinessDocumentFormAndLinkageFileUpload(
            $varUserSession, int $varSysBranch_RefID,
            int $varBusinessDocumentForm_RefID = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataResume_BusinessDocumentFileUpload',
                            [
                                [NULL, 'bigint'],

                                [$varBusinessDocumentForm_RefID, 'bigint'],

                                [TRUE, 'boolean']
                            ]
                            )
                    );

                return
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        $varReturn['data'][0]['Func_GetDataResume_BusinessDocumentFileUpload']
                        );
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataResume_BusinessDocumentFormSelfFileUpload                                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-04-03                                                                                           |
        | ▪ Creation Date   : 2024-04-03                                                                                           |
        | ▪ Description     : Mendapatkan Resume File Upload Form Dokumen Bisnis                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ------------------------------                                                                                      |
        |      ▪ (int)    varBusinessDocumentForm_RefID ► Business Document Form Reference ID                                      |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataResume_BusinessDocumentFormSelfFileUpload(
            $varUserSession, int $varSysBranch_RefID,
            int $varBusinessDocumentForm_RefID = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataResume_BusinessDocumentFileUpload',
                            [
                                [NULL, 'bigint'],

                                [$varBusinessDocumentForm_RefID, 'bigint']
                            ]
                            )
                    );

                return
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        $varReturn['data'][0]['Func_GetDataResume_BusinessDocumentFileUpload']
                        );
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataResume_EntityContactNumber                                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-11-11                                                                                           |
        | ▪ Creation Date   : 2022-11-11                                                                                           |
        | ▪ Description     : Mendapatkan Resume Nomor Kontak Entitas                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ------------------------------                                                                                      |
        |      ▪ (int)    varEntity_RefID ► Entity Reference ID                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataResume_EntityContactNumber(
            $varUserSession, int $varSysBranch_RefID,
            int $varEntity_RefID = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetDataResume_EntityContactNumber',
                            [
                                [$varSysBranch_RefID, 'bigint'],

                                [$varEntity_RefID, 'bigint']
                            ]
                            )
                    );

                return
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        $varReturn['data'][0]['Func_GetDataResume_EntityContactNumber']
                        );
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getBusinessDocumentLastVersionByFormNumber                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-09-21                                                                                           |
        | ▪ Creation Date   : 2023-09-21                                                                                           |
        | ▪ Description     : Mendapatkan Versi Terakhir Dokumen Bisnis Berdasarkan Form Number                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ------------------------------                                                                                      |
        |      ▪ (int)    varFormNumber ► Form Number                                                                              |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getBusinessDocumentLastVersionByFormNumber(
            $varUserSession, int $varSysBranch_RefID,
            string $varFormNumber = null, int $varApproverEntity_RefID = null)
            {
            try {
                $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession,
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchData-OLTP-Master.Func_General_GetBusinessDocumentLastVersionByFormNumber',
                        [
                            [$varFormNumber, 'varchar'],
                            [$varApproverEntity_RefID, 'bigint']
                        ]
                        )
                    );

                $varReturn = \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode($varUserSession, $varReturn['data'][0]['Func_GetReport_Resume_BusinessDocumentDispositionHistory']);

                return $varReturn;
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getReport_Form_Resume_BusinessDocumentDispositionHistory                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-08-23                                                                                           |
        | ▪ Creation Date   : 2023-08-23                                                                                           |
        | ▪ Description     : Mendapatkan Report - Dokumen Form - LogBusinessDocumentWorkFlowPathHistory                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ------------------------------                                                                                      |
        |      ▪ (int)    varBusinessDocument_RefID ► Business Document ID                                                         |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getReport_Form_Resume_BusinessDocumentDispositionHistory(
            $varUserSession, int $varSysBranch_RefID,
            int $varBusinessDocument_RefID = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetReport_Resume_BusinessDocumentDispositionHistory',
                            [
                                [$varSysBranch_RefID, 'bigint'],

                                [$varBusinessDocument_RefID, 'bigint']
                            ]
                            )
                        );

                $varReturn =
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode($varUserSession, $varReturn['data'][0]['Func_GetReport_Resume_BusinessDocumentDispositionHistory']);

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
        | ▪ Method Name     : getReport_Form_Resume_BusinessDocumentIssuanceDisposition                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0001.0000000                                                                                       |
        | ▪ Last Update     : 2025-10-30                                                                                           |
        | ▪ Creation Date   : 2023-06-20                                                                                           |
        | ▪ Description     : Mendapatkan Laporan Form - Disposisi Penerbitan Dokumen Bisnis                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ▪ (int)    varSysID ► Record ID                                                                                     |
        |      ------------------------------                                                                                      |
        |      ▪ (int)    varPagination_PageSize ► Pagination Page Size                                                            |
        |      ▪ (int)    varPagination_PageShow ► Pagination Page Show                                                            |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varBusinessDocumentNumber ► Business Document Number                                                     |
        |      ▪ (int)    varBusinessDocumentType_RefID ► Business Document Type Reference ID                                      |
        |      ▪ (int)    varCombinedBudget_RefID ► Combined Budget Reference ID                                                   |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getReport_Form_Resume_BusinessDocumentIssuanceDisposition(
            $varUserSession, int $varSysBranch_RefID,
            int $varSysID,
            int $varPagination_PageSize = null, int $varPagination_PageShow = null,
            string $varBusinessDocumentNumber = null, int $varBusinessDocumentType_RefID = null, int $varCombinedBudget_RefID = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetReport_Resume_BusDocIssuanceDisposition',
                            [
                                [$varSysBranch_RefID, 'bigint'],
                                [$varSysID, 'bigint'],

                                [$varPagination_PageSize, 'bigint'],
                                [$varPagination_PageShow, 'bigint'],

                                [$varBusinessDocumentNumber, 'varchar'],
                                [$varBusinessDocumentType_RefID, 'bigint'],
                                [$varCombinedBudget_RefID, 'bigint']
                            ]
                            )
                        );
               
                $varReturn['data'] = 
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        $varReturn['data'][0]['Func_GetReport_Resume_BusDocIssuanceDisposition']
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
        | ▪ Method Name     : getReport_Form_Resume_BusinessDocumentIssuanceDispositionCount                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-06-20                                                                                           |
        | ▪ Creation Date   : 2023-06-20                                                                                           |
        | ▪ Description     : Mendapatkan Laporan Form - Resume - Penghitungan Disposisi Penerbitan Dokumen Bisnis                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ▪ (int)    varSysID ► Record ID                                                                                     |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getReport_Form_Resume_BusinessDocumentIssuanceDispositionCount(
            $varUserSession, int $varSysBranch_RefID,
            int $varSysID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetReport_Resume_BusinessDocumentIssuanceDispositionCount',
                            [
                                [$varSysBranch_RefID, 'bigint'],
                                [$varSysID, 'bigint']
                            ]
                            )
                        );

                return [
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        $varReturn['data'][0]['Func_GetReport_Resume_BusinessDocumentIssuanceDispositionCount'])
                    ];
                }

            catch (\Exception $ex) {
                return
                    [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getReport_Form_Resume_BusinessDocumentFilterByDocumentTypeID                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-06-20                                                                                           |
        | ▪ Creation Date   : 2023-06-20                                                                                           |
        | ▪ Description     : Mendapatkan Laporan Form - Disposisi Penerbitan Dokumen Bisnis                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ▪ (int)    varSysID ► Record ID                                                                                     |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getReport_Form_Resume_BusinessDocumentFilterByDocumentTypeID(
            $varUserSession, int $varSysBranch_RefID, int $varSysID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetReport_Resume_BusinessDocumentFilterByDocumentTypeID',
                            [
                                [$varSysBranch_RefID, 'bigint'],
                                [$varSysID, 'bigint']
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
        | ▪ Method Name     : getReport_Form_DocumentForm_AllDocumentType                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-09-15                                                                                           |
        | ▪ Creation Date   : 2023-09-15                                                                                           |
        | ▪ Description     : Mendapatkan Laporan Form - Form Semua Jenis Dokumen                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ▪ (int)    varSysID ► Record ID                                                                                     |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getReport_Form_DocumentForm_AllDocumentType(
            $varUserSession, int $varSysBranch_RefID,
            int $varSysID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetReport_DocForm_AllType',
                            [
                                [$varSysBranch_RefID, 'bigint'],
                                [$varSysID, 'bigint']
                            ]
                            )
                        );

                return [
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        $varReturn['data'][0]['Func_GetReport_DocForm_AllType'])
                    ];
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getReport_Form_DocumentForm_CitizenIdentity                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-06-08                                                                                           |
        | ▪ Creation Date   : 2023-06-08                                                                                           |
        | ▪ Description     : Mendapatkan Laporan Form - Form Dokumen Identitas Penduduk                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ▪ (int)    varSysID ► Record ID                                                                                     |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getReport_Form_DocumentForm_CitizenIdentity(
            $varUserSession, int $varSysBranch_RefID,
            int $varSysID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetReport_DocForm_CitizenIdentity',
                            [
                                [$varSysBranch_RefID, 'bigint'],
                                [$varSysID, 'bigint']
                            ]
                            )
                        );

                return [
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        $varReturn['data'][0]['Func_GetReport_DocForm_CitizenIdentity'])
                    ];
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getReport_Form_DocumentForm_Person                                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-05-24                                                                                           |
        | ▪ Creation Date   : 2023-05-24                                                                                           |
        | ▪ Description     : Mendapatkan Laporan Form - Form Dokumen Profil Orang (Person Profile)                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ▪ (int)    varSysID ► Record ID                                                                                     |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getReport_Form_DocumentForm_Person(
            $varUserSession, int $varSysBranch_RefID,
            int $varSysID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_GetReport_DocForm_Person',
                            [
                                [$varSysBranch_RefID, 'bigint'],
                                [$varSysID, 'bigint']
                            ]
                            )
                        );

                return [
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        $varReturn['data'][0]['Func_GetReport_DocForm_Person'])
                    ];
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getFileExtensionOfMIME                                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-08-25                                                                                           |
        | ▪ Creation Date   : 2022-08-25                                                                                           |
        | ▪ Description     : Mendapatkan Ekstensi File dari MIME                                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getFileExtensionOfMIME(
            $varUserSession,
            string $varMIME)
            {
            $varReturn =
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession,
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchData-OLTP-Master.Func_General_GetFileExtensionOfMIME',
                        [
                            [$varMIME, 'varchar']
                        ]
                        )
                    );

            return $varReturn['data'][0]['Func_General_GetFileExtensionOfMIME'];
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getIDOfMIME                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-08-26                                                                                           |
        | ▪ Creation Date   : 2022-08-26                                                                                           |
        | ▪ Description     : Get ID Of MIME                                                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varMIME ► MIME Type                                                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (int)    varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getIDOfMIME(
            $varUserSession,
            string $varMIME)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_General_GetIDOfMIME',
                            [
                                [$varMIME, 'varchar']
                            ]
                            )
                        );

                return $varReturn['data'][0]['Func_General_GetIDOfMIME'];
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getBusinessDocumentByRecordID                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-09-27                                                                                           |
        | ▪ Creation Date   : 2022-09-27                                                                                           |
        | ▪ Description     : Get Business Document Entity By Reord ID                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varRecordID ► Record ID                                                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (int)    varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getBusinessDocumentByRecordID(
            $varUserSession,
            int $varRecordID)
            {
            try {
                $varData =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_General_GetBusinessDocumentEntityByRecordID',
                            [
                                [$varRecordID, 'bigint']
                            ]
                            )
                        );

                $varReturn = [
                    'fullDocumentNumber' =>
                        $varData['data'][0]['DocumentTypeName'].
                        ' No : '.
                        $varData['data'][0]['DocumentNumber'].
                        ' (Version : '.
                        $varData['data'][0]['Version'].
                        ')',
                    'businessDocumentType_RefID' => $varData['data'][0]['BusinessDocumentType_RefID'],
                    'businessDocument_RefID' => $varData['data'][0]['BusinessDocument_RefID'],
                    'businessDocumentVersion_RefID' => $varData['data'][0]['BusinessDocumentVersion_RefID'],
                    'documentTypeName' => $varData['data'][0]['DocumentTypeName'],
                    'documentNumber' => $varData['data'][0]['DocumentNumber'],
                    'version' => $varData['data'][0]['Version'],
                    'documentDateTimeTZ' => $varData['data'][0]['DocumentDateTimeTZ']
                    ];

                return $varReturn;
                }

            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : isBusinessDocumentFinalApproved                                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-03-16                                                                                           |
        | ▪ Creation Date   : 2023-03-16                                                                                           |
        | ▪ Description     : Mengecek Status Final Approve pada Dokumen Bisnis                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ------------------------------                                                                                      |
        |      ▪ (int)    varBusinessDocument_RefID ► Business Document Reference ID                                               |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function isBusinessDocumentFinalApproved(
            $varUserSession, int $varSysBranch_RefID,
            int $varBusinessDocument_RefID = null)
            {
            try {
                $varData =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Master.Func_General_IsBusinessDocumentFinalApproved',
                            [
                                [$varBusinessDocument_RefID, 'bigint']
                            ]
                            )
                        );

                $varReturn = [
                    'status' => $varData['data'][0]['Func_General_IsBusinessDocumentFinalApproved']
                    ];

                return
                    $varReturn;
                }

            catch (\Exception $ex) {
                return [];
                }
            }
        }
    }
