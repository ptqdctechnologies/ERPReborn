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
        public function getDataEntities_Underlying_PaymentDetail($varUserSession, 
            string $varIDSet)
            {
            try {
                $varFunctionName='SchData-OLTP-Finance.Func_GetDataEntities_Underlying_PaymentDetail';
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
        public function getDataEntities_Underlying_PaymentInstructionDetail($varUserSession, 
            string $varIDSet)
            {
            try {
                $varFunctionName='SchData-OLTP-Finance.Func_GetDataEntities_Underlying_PaymentInstructionDetail';
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
        | ▪ Method Name     : getDataList_Advance                                                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-05-31                                                                                           |
        | ▪ Creation Date   : 2022-05-31                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Advance                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ------------------------------                                                                                      |
        |      ▪ (int)    varAdvance_RefID ► Advance Reference ID                                                                  |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_Advance(
            $varUserSession, int $varSysBranch_RefID, 
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchData-OLTP-Finance.Func_GetDataList_Advance',
                        [
                            [$varSysBranch_RefID, 'bigint' ],

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
                $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
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
                return $varReturn['Data'];
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataList_InvoiceSupplierBillingPurpose                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2022-04-21                                                                                           |
        | ▪ Creation Date   : 2022-04-14                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Tujuan Penagihan Invoice Pemasok                                                  |
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
        public function getDataList_InvoiceSupplierBillingPurpose(
            $varUserSession, int $varSysBranch_RefID, 
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchData-OLTP-Finance.Func_GetDataList_InvoiceSupplierBillingPurpose',
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
                return $varReturn['Data'];
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataPickList_Advance                                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-05-31                                                                                           |
        | ▪ Creation Date   : 2022-05-31                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Advance                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_Advance(
            $varUserSession, int $varSysBranch_RefID)
            {
            try {
                $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchData-OLTP-Finance.Func_GetDataPickList_Advance',
                        [
                            [$varSysBranch_RefID, 'bigint' ]
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
        | ▪ Method Name     : getDataPickList_InvoiceSupplierBillingPurpose                                                        |
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
        public function getDataPickList_InvoiceSupplierBillingPurpose(
            $varUserSession, int $varSysBranch_RefID)
            {
            try {
                $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchData-OLTP-Finance.Func_GetDataPickList_InvoiceSupplierBillingPurpose',
                        [
                            [$varSysBranch_RefID, 'bigint' ]
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
        | ▪ Method Name     : getReport_Form_DocumentForm_Advance                                                                  |
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
        public function getReport_Form_DocumentForm_Advance(
            $varUserSession, int $varSysBranch_RefID, 
            int $varSysID)
            {
            try {
                $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
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
                //dd($varReturn['Data'][0]['Func_GetReport_DocForm_Advance']);
                return [
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession, 
                        $varReturn['Data'][0]['Func_GetReport_DocForm_Advance'])
                    ]
                    ;
                }
            catch (\Exception $ex) {
                return [];
                }
            }
        

        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getReport_Form_DocumentForm_Advance                                                                  |
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
                $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
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

                    return ($varReturn['Data']);

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
                $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
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
                //dd($varReturn['Data'][0]['Func_GetReport_DocForm_Advance']);
                return [
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession, 
                        $varReturn['Data'][0]['Func_GetReport_DocForm_PaymentInstruction'])
                    ]
                    ;
                }
            catch (\Exception $ex) {
                return [];
                }
            }
        }
    }