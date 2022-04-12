<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Models                                                                                                    |
| ▪ Name Space : \App\Models\Database\SchData_OLTP_SupplyChain                                                                     |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2022 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Models\Database\SchData_OLTP_SupplyChain
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : General                                                                                                      |
    | ▪ Description : Menangani Models Database ► SchData_OLTP_SupplyChain ► Non Specific Table                                    |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class General
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : Func_GetDataList_DeliveryDestinationType                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Creation Date   : 2022-04-12                                                                                           |
        | ▪ Last Update     : 2022-04-12                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Jenis Tujuan Pengiriman                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranchRefID ► Branch ID                                                                            |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_DeliveryDestinationType($varUserSession, int $varSysBranchRefID, 
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchData-OLTP-SupplyChain.Func_GetDataList_DeliveryDestinationType',
                        [
                            [$varSysBranchRefID, 'bigint' ],
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
        | ▪ Method Name     : getDataList_DeliveryOrder                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Creation Date   : 2022-03-10                                                                                           |
        | ▪ Last Update     : 2022-03-10                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pesanan Pengiriman (DO)                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranchRefID ► Branch ID                                                                            |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_DeliveryOrder($varUserSession, int $varSysBranchRefID, 
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchData-OLTP-SupplyChain.Func_GetDataList_DeliveryOrder',
                        [
                            [$varSysBranchRefID, 'bigint' ],
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
        | ▪ Method Name     : getDataList_PurchaseOrder                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Creation Date   : 2022-03-07                                                                                           |
        | ▪ Last Update     : 2022-03-07                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pesanan Pembelian (PO)                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranchRefID ► Branch ID                                                                            |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_PurchaseOrder($varUserSession, int $varSysBranchRefID, 
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchData-OLTP-SupplyChain.Func_GetDataList_PurchaseOrder',
                        [
                            [$varSysBranchRefID, 'bigint' ],
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
        | ▪ Method Name     : getDataList_PurchaseRequisition                                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Creation Date   : 2022-03-07                                                                                           |
        | ▪ Last Update     : 2022-03-07                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Permintaan Pembelian (PR)                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranchRefID ► Branch ID                                                                            |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_PurchaseRequisition($varUserSession, int $varSysBranchRefID, 
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchData-OLTP-SupplyChain.Func_GetDataList_PurchaseRequisition',
                        [
                            [$varSysBranchRefID, 'bigint' ],
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
        | ▪ Method Name     : getDataList_Warehouse                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Creation Date   : 2022-03-01                                                                                           |
        | ▪ Last Update     : 2022-03-01                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Gudang                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranchRefID ► Branch ID                                                                            |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_Warehouse($varUserSession, int $varSysBranchRefID, 
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchData-OLTP-SupplyChain.Func_GetDataList_Warehouse',
                        [
                            [$varSysBranchRefID, 'bigint' ],
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
        | ▪ Method Name     : getDataList_WarehouseInboundOrder                                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Creation Date   : 2022-03-08                                                                                           |
        | ▪ Last Update     : 2022-03-08                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Penerimaan Barang Gudang                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranchRefID ► Branch ID                                                                            |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_WarehouseInboundOrder($varUserSession, int $varSysBranchRefID, 
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchData-OLTP-SupplyChain.Func_GetDataList_WarehouseInboundOrder',
                        [
                            [$varSysBranchRefID, 'bigint' ],
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
        | ▪ Method Name     : getDataList_WarehouseOutboundOrder                                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Creation Date   : 2022-03-08                                                                                           |
        | ▪ Last Update     : 2022-03-08                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pengeluaran Barang Gudang                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranchRefID ► Branch ID                                                                            |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_WarehouseOutboundOrder($varUserSession, int $varSysBranchRefID, 
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchData-OLTP-SupplyChain.Func_GetDataList_WarehouseOutboundOrder',
                        [
                            [$varSysBranchRefID, 'bigint' ],
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
        | ▪ Method Name     : getDataList_WarehouseType                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Creation Date   : 2022-03-01                                                                                           |
        | ▪ Last Update     : 2022-03-01                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Jenis Gudang                                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranchRefID ► Branch ID                                                                            |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_WarehouseType($varUserSession, int $varSysBranchRefID, 
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchData-OLTP-SupplyChain.Func_GetDataList_WarehouseType',
                        [
                            [$varSysBranchRefID, 'bigint' ],
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
        | ▪ Method Name     : getDataPickList_DeliveryDestinationType                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Creation Date   : 2022-04-12                                                                                           |
        | ▪ Last Update     : 2022-04-12                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Jenis Tujuan Pengiriman                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranchRefID ► Branch ID                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_DeliveryDestinationType(
            $varUserSession, int $varSysBranchRefID)
            {
            try {
                $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchData-OLTP-SupplyChain.Func_GetDataPickList_DeliveryDestinationType',
                        [
                            [$varSysBranchRefID, 'bigint' ]
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
        | ▪ Method Name     : getDataPickList_DeliveryOrder                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Creation Date   : 2022-03-10                                                                                           |
        | ▪ Last Update     : 2022-03-10                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Pesanan Pengiriman (DO)                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranchRefID ► Branch ID                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_DeliveryOrder(
            $varUserSession, int $varSysBranchRefID)
            {
            try {
                $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchData-OLTP-SupplyChain.Func_GetDataPickList_DeliveryOrder',
                        [
                            [$varSysBranchRefID, 'bigint' ]
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
        | ▪ Method Name     : getDataPickList_PurchaseOrder                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Creation Date   : 2022-03-07                                                                                           |
        | ▪ Last Update     : 2022-03-07                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Pesanan Pembelian (PO)                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranchRefID ► Branch ID                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_PurchaseOrder(
            $varUserSession, int $varSysBranchRefID)
            {
            try {
                $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchData-OLTP-SupplyChain.Func_GetDataPickList_PurchaseOrder',
                        [
                            [$varSysBranchRefID, 'bigint' ]
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
        | ▪ Method Name     : getDataPickList_PurchaseRequisition                                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Creation Date   : 2022-03-07                                                                                           |
        | ▪ Last Update     : 2022-03-07                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Permintaan Pembelian (PR)                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranchRefID ► Branch ID                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_PurchaseRequisition(
            $varUserSession, int $varSysBranchRefID)
            {
            try {
                $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchData-OLTP-SupplyChain.Func_GetDataPickList_PurchaseRequisition',
                        [
                            [$varSysBranchRefID, 'bigint' ]
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
        | ▪ Method Name     : getDataPickList_Warehouse                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Creation Date   : 2022-03-02                                                                                           |
        | ▪ Last Update     : 2022-03-02                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Gudang                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranchRefID ► Branch ID                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_Warehouse(
            $varUserSession, int $varSysBranchRefID)
            {
            try {
                $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchData-OLTP-SupplyChain.Func_GetDataPickList_Warehouse',
                        [
                            [$varSysBranchRefID, 'bigint' ]
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
        | ▪ Method Name     : getDataPickList_WarehouseInboundOrder                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Creation Date   : 2022-03-08                                                                                           |
        | ▪ Last Update     : 2022-03-08                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Penerimaan Barang Gudang                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranchRefID ► Branch ID                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_WarehouseInboundOrder(
            $varUserSession, int $varSysBranchRefID)
            {
            try {
                $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchData-OLTP-SupplyChain.Func_GetDataPickList_WarehouseInboundOrder',
                        [
                            [$varSysBranchRefID, 'bigint' ]
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
        | ▪ Method Name     : getDataPickList_WarehouseOutboundOrder                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Creation Date   : 2022-03-08                                                                                           |
        | ▪ Last Update     : 2022-03-08                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Pengeluaran Barang Gudang                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranchRefID ► Branch ID                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_WarehouseOutboundOrder(
            $varUserSession, int $varSysBranchRefID)
            {
            try {
                $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchData-OLTP-SupplyChain.Func_GetDataPickList_WarehouseOutboundOrder',
                        [
                            [$varSysBranchRefID, 'bigint' ]
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
        | ▪ Method Name     : getDataPickList_WarehouseType                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Creation Date   : 2022-03-02                                                                                           |
        | ▪ Last Update     : 2022-03-02                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Jenis Gudang                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranchRefID ► Branch ID                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_WarehouseType(
            $varUserSession, int $varSysBranchRefID)
            {
            try {
                $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchData-OLTP-SupplyChain.Func_GetDataPickList_WarehouseType',
                        [
                            [$varSysBranchRefID, 'bigint' ]
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
        | ▪ Method Name     : getReport_Form_DocumentForm_PurchaseOrder                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Creation Date   : 2022-04-08                                                                                           |
        | ▪ Last Update     : 2022-04-08                                                                                           |
        | ▪ Description     : Mendapatkan Laporan Form - Form Dokumen Pesanan Pembelian (Purchase Order)                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysID ► Record ID                                                                                     |
        |      ▪ (int)    varSysBranchRefID ► Branch ID                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getReport_Form_DocumentForm_PurchaseOrder(
            $varUserSession, int $varSysID, int $varSysBranchRefID)
            {
            try {
                $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchData-OLTP-SupplyChain.Func_GetReport_DocForm_PurchaseOrder',
                        [
                            [$varSysBranchRefID, 'bigint' ],
                            [$varSysID, 'bigint' ]
                        ]
                        )
                    );
                return [
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession, 
                        $varReturn['Data'][0]['Func_GetReport_DocForm_PurchaseOrder'])
                    ];
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getReport_Form_DocumentForm_PurchaseRequisition                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Creation Date   : 2022-04-08                                                                                           |
        | ▪ Last Update     : 2022-04-08                                                                                           |
        | ▪ Description     : Mendapatkan Laporan Form - Form Dokumen Permintaan Pembelian (Purchase Requisition)                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysID ► Record ID                                                                                     |
        |      ▪ (int)    varSysBranchRefID ► Branch ID                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getReport_Form_DocumentForm_PurchaseRequisition(
            $varUserSession, int $varSysID, int $varSysBranchRefID)
            {
            try {
                $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchData-OLTP-SupplyChain.Func_GetReport_DocForm_PurchaseRequisition',
                        [
                            [$varSysBranchRefID, 'bigint' ],
                            [$varSysID, 'bigint' ]
                        ]
                        )
                    );
                return [
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession, 
                        $varReturn['Data'][0]['Func_GetReport_DocForm_PurchaseRequisition'])
                    ];
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getReport_Form_DocumentForm_WarehouseInboundOrder                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Creation Date   : 2022-04-08                                                                                           |
        | ▪ Last Update     : 2022-04-08                                                                                           |
        | ▪ Description     : Mendapatkan Laporan Form - Form Dokumen Perintah Penerimaan Barang Gudang (Warehouse Inbound Order)  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysID ► Record ID                                                                                     |
        |      ▪ (int)    varSysBranchRefID ► Branch ID                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getReport_Form_DocumentForm_WarehouseInboundOrder(
            $varUserSession, int $varSysID, int $varSysBranchRefID)
            {
            try {
                $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchData-OLTP-SupplyChain.Func_GetReport_DocForm_WarehouseInboundOrder',
                        [
                            [$varSysBranchRefID, 'bigint' ],
                            [$varSysID, 'bigint' ]
                        ]
                        )
                    );
                return [
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession, 
                        $varReturn['Data'][0]['Func_GetReport_DocForm_WarehouseInboundOrder'])
                    ];
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getReport_Form_DocumentForm_WarehouseOutboundOrder                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Creation Date   : 2022-04-08                                                                                           |
        | ▪ Last Update     : 2022-04-08                                                                                           |
        | ▪ Description     : Mendapatkan Laporan Form - Form Dokumen Perintah Pengeluaran Barang Gudang (Warehouse Outbound       |
        |                     Order)                                                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysID ► Record ID                                                                                     |
        |      ▪ (int)    varSysBranchRefID ► Branch ID                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getReport_Form_DocumentForm_WarehouseOutboundOrder(
            $varUserSession, int $varSysID, int $varSysBranchRefID)
            {
            try {
                $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchData-OLTP-SupplyChain.Func_GetReport_DocForm_WarehouseOutboundOrder',
                        [
                            [$varSysBranchRefID, 'bigint' ],
                            [$varSysID, 'bigint' ]
                        ]
                        )
                    );
                return [
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession, 
                        $varReturn['Data'][0]['Func_GetReport_DocForm_WarehouseOutboundOrder'])
                    ];
                }
            catch (\Exception $ex) {
                return [];
                }
            }
        }
    }