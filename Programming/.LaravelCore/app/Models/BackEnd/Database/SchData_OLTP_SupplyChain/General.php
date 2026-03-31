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
        | ▪ Method Name     : getDataEntities_Delivery                                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-06-27                                                                                           |
        | ▪ Creation Date   : 2022-06-27                                                                                           |
        | ▪ Description     : Get Data Entities - Delivery                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysID ► System Record ID                                                                              |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataEntities_Delivery(
            $varUserSession,
            string $varIDSet)
            {
            try {
                $varFunctionName = 'SchData-OLTP-SupplyChain.Func_GetDataEntities_Delivery';
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
                }

            catch (\Exception $ex) {
                return
                    [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataList_PurchaseRequisitionDetail                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-07-19                                                                                           |
        | ▪ Creation Date   : 2022-07-19                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Advance                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |        ------------------------------                                                                                    |
        |      ▪ (int)    varPurchaseRequisition_RefID ► Purchase Requisition Reference ID                                         |
        |        ------------------------------                                                                                    |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_PurchaseRequisitionDetail(
            $varUserSession, int $varSysBranch_RefID,
            int $varPurchaseRequisition_RefID = null,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetDataList_PurchaseRequisitionDetail',
                            [
                                [$varSysBranch_RefID, 'bigint' ],

                                [$varPurchaseRequisition_RefID, 'bigint'],

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
        | ▪ Method Name     : getDataList_DeliveryDestination                                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2022-04-21                                                                                           |
        | ▪ Creation Date   : 2022-04-13                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Tujuan Pengiriman                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |        ------------------------------                                                                                    |
        |      ▪ (int)    varDeliveryDestinationType_RefID ► Delivery Destination Type Reference ID                                |
        |        ------------------------------                                                                                    |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_DeliveryDestination(
            $varUserSession, int $varSysBranch_RefID,
            int $varDeliveryDestinationType_RefID = null,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetDataList_DeliveryDestination',
                            [
                                [null, 'bigint'],
                                [$varSysBranch_RefID, 'bigint'],

                                [$varDeliveryDestinationType_RefID, 'bigint'],

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
        | ▪ Method Name     : Func_GetDataList_DeliveryDestinationType                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-04-12                                                                                           |
        | ▪ Creation Date   : 2022-04-12                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Jenis Tujuan Pengiriman                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |        ------------------------------                                                                                    |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_DeliveryDestinationType(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetDataList_DeliveryDestinationType',
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
        | ▪ Method Name     : getDataList_DeliveryOrder_AllVersion                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2024-10-17                                                                                           |
        | ▪ Creation Date   : 2022-03-10                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pesanan Pengiriman (Delivery Order) Semua Versi                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |        ------------------------------                                                                                    |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_DeliveryOrder_AllVersion(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetDataList_DeliveryOrder',
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
        | ▪ Method Name     : getDataList_DeliveryOrder_LatestVersion                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2025-04-09                                                                                           |
        | ▪ Creation Date   : 2022-03-10                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pesanan Pengiriman (DO) Versi Terakhir                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |        ------------------------------                                                                                    |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_DeliveryOrder_LatestVersion(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetDataList_DeliveryOrder',
                            [
                                [$varSysBranch_RefID, 'bigint' ],

                                [FALSE, 'boolean'],
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
        | ▪ Method Name     : getDataList_DeliveryOrderDetail_LatestVersion                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2026-03-26                                                                                           |
        | ▪ Creation Date   : 2025-03-27                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Detail Pesanan Pengiriman (DO) Versi Terakhir                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varDeliveryOrder_RefID ► Delivery Order ID                                                               |
        |        ------------------------------                                                                                    |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_DeliveryOrderDetail_LatestVersion(
            $varUserSession, int $varDeliveryOrder_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetDataList_DeliveryOrderDetail_New',
                            [
                                [$varDeliveryOrder_RefID, 'bigint' ]
                            ]
                            )
                        );
                        $collection = collect($varReturn['data']);
                        /*
                            Contact Number Type:
                            - 223000000000002 (Mobile Phone)
                            - 223000000000004 (Office Phone)
                            - 223000000000005 (Faximile)
                        */
                        $unique = $collection->unique(function (array $item) {
                            return $item['DeliveryOrderDetail_ID'].$item['ContactNumberType_RefID_TblPerson'];
                        })->whereIn('ContactNumberType_RefID_TblPerson', [223000000000002, 223000000000004, 223000000000005])->toArray();

                        // get contact number list
                        $contactNumbers = [];
                        foreach ($unique as $value2) {
                            if (array_key_exists($value2['DeliveryOrderDetail_ID'], $contactNumbers)) {
                                $contactNumbers[$value2['DeliveryOrderDetail_ID']] += [$value2['ContactNumberType_RefID_TblPerson'] => $value2['ContactNumber_TblPerson']];
                            } else {
                                $contactNumbers[$value2['DeliveryOrderDetail_ID']] = [$value2['ContactNumberType_RefID_TblPerson'] => $value2['ContactNumber_TblPerson']];
                            }
                        }

                        $unique2 = $collection->unique('DeliveryOrderDetail_ID')->toArray();
                        $resultArray = $unique2;

                        // Menjumlahkan Quantity WarehouseInboundOrderDetail berdasarkan ID DO Detail tersebut.
                        $qtyWarehouseInboundOrderDetail = [];
                        $listIdDODetail = [];
                        foreach ($resultArray as $key => $value) {
                            if (in_array($value["DeliveryOrderDetail_ID"], $listIdDODetail)) {
                                $qtyWarehouseInboundOrderDetail[$value["DeliveryOrderDetail_ID"]]["Qty"] = (float) $qtyWarehouseInboundOrderDetail[$value["DeliveryOrderDetail_ID"]]["Qty"] + (float) $value["Quantity_TblWarehouseInboundOrderDetail"];
                            } else {
                                array_push($listIdDODetail, $value["DeliveryOrderDetail_ID"]);
                                $qtyWarehouseInboundOrderDetail[$value["DeliveryOrderDetail_ID"]]["DeliveryOrderDetail_ID"] = $value["DeliveryOrderDetail_ID"];
                                $qtyWarehouseInboundOrderDetail[$value["DeliveryOrderDetail_ID"]]["Qty"] = $value["Quantity_TblWarehouseInboundOrderDetail"];
                            }
                        }

                        $varReturn['rowCount'] = count($unique2);
                        $varReturn['data'] = [];
                        $idxArray = 0;
                        foreach ($resultArray as $key => $value) {
                            $varReturn['data'][$idxArray]['sys_ID'] = $value["Sys_ID"];
                            $varReturn['data'][$idxArray]['sys_PID'] = $value["Sys_PID"];
                            $varReturn['data'][$idxArray]['sys_SID'] = $value["Sys_SID"];
                            $varReturn['data'][$idxArray]['sys_RPK'] = $value["Sys_RPK"];
                            $varReturn['data'][$idxArray]['sys_Branch_RefID'] = $value["Sys_Branch_RefID"];
                            $varReturn['data'][$idxArray]['sys_BaseBranch_RefID'] = $value["Sys_BaseBranch_RefID"];
                            $varReturn['data'][$idxArray]['sys_BaseCurrency_RefID'] = $value["Sys_BaseCurrency_RefID"];
                            $varReturn['data'][$idxArray]['sys_Data_Entry_DateTimeTZ'] = $value["Sys_Data_Entry_DateTimeTZ"];
                            $varReturn['data'][$idxArray]['sys_Data_Edit_DateTimeTZ'] = $value["Sys_Data_Edit_DateTimeTZ"];
                            $varReturn['data'][$idxArray]['log_FileUpload_Pointer_RefID'] = $value["Log_FileUpload_Pointer_RefID"];
                            $varReturn['data'][$idxArray]['businessDocument_RefID'] = $value["BusinessDocument_RefID"];
                            $varReturn['data'][$idxArray]['documentNumber'] = $value["DocumentNumber"];
                            $varReturn['data'][$idxArray]['businessDocumentVersion_RefID'] = $value["BusinessDocumentVersion_RefID"];
                            $varReturn['data'][$idxArray]['version'] = $value["Version"];
                            $varReturn['data'][$idxArray]['documentDateTimeTZ'] = $value["DocumentDateTimeTZ"];
                            $varReturn['data'][$idxArray]['annotation'] = $value["Annotation"];
                            $varReturn['data'][$idxArray]['deliveryFrom_RefID'] = $value["DeliveryFrom_RefID"];
                            $varReturn['data'][$idxArray]['deliveryFrom_NonRefID'] = json_decode($value["DeliveryFrom_NonRefID"]);
                            $varReturn['data'][$idxArray]['deliveryTo_RefID'] = $value["DeliveryTo_RefID"];
                            $varReturn['data'][$idxArray]['deliveryTo_NonRefID'] = json_decode($value["DeliveryTo_NonRefID"]);
                            $varReturn['data'][$idxArray]['deliveryDateTimeTZ'] = $value["DeliveryDateTimeTZ"];
                            $varReturn['data'][$idxArray]['transporter_RefID'] = $value["Transporter_RefID"];
                            $varReturn['data'][$idxArray]['stockMovementRequester_RefID'] = $value["StockMovementRequester_RefID"];
                            if ($value["StockMovementStatus"] === 0) {
                                $varReturn['data'][$idxArray]['stockMovementStatus'] = 'RENT';
                            } elseif ($value["StockMovementStatus"] === 1) {
                                $varReturn['data'][$idxArray]['stockMovementStatus'] = 'PERMANENT';
                            } else {
                                $varReturn['data'][$idxArray]['stockMovementStatus'] = null;
                            }
                            if ($value["Type"] === 0) {
                                $varReturn['data'][$idxArray]['type'] = 'PURCHASE_ORDER';
                            } elseif ($value["Type"] === 1) {
                                $varReturn['data'][$idxArray]['type'] = 'INTERNAL_USE';
                            } elseif ($value["Type"] === 2) {
                                $varReturn['data'][$idxArray]['type'] = 'STOCK_MOVEMENT';
                            } else {
                                $varReturn['data'][$idxArray]['type'] = null;
                            }
                            $varReturn['data'][$idxArray]['stockMovementRequesterName'] = $value["StockMovementRequesterName"];
                            $varReturn['data'][$idxArray]['stockMovementRequesterPosition'] = $value["StockMovementRequesterPosition"];
                            $varReturn['data'][$idxArray]['remarks'] = $value["Remarks"];
                            $varReturn['data'][$idxArray]['qtyReq'] = $value["QtyReq"];
                            $varReturn['data'][$idxArray]['reference_ID'] = $value["UnderlyingDetail_RefID"];
                            $varReturn['data'][$idxArray]['product_RefID'] = $value["Product_RefID"];
                            $varReturn['data'][$idxArray]['deliveryOrder_RefID'] = $value["DeliveryOrder_RefID"];
                            $varReturn['data'][$idxArray]['deliveryOrderDetail_ID'] = $value["DeliveryOrderDetail_ID"];
                            $varReturn['data'][$idxArray]['notes'] = $value["Note"];
                            $varReturn['data'][$idxArray]['productName'] = $value["ProductName"];
                            $varReturn['data'][$idxArray]['productCode'] = $value["ProductCode"];
                            $varReturn['data'][$idxArray]['entity_RefID'] = $value["Entity_RefID"];
                            if ((($value["UnderlyingDetail_RefID"] / 1000000000000) % 10000) === 86) {
                                $varReturn['data'][$idxArray]['quantity'] = $value["Quantity_TblPurchaseOrderDetail"];
                                $varReturn['data'][$idxArray]['quantityUnit_RefID'] = $value["QuantityUnit_RefID_TblPurchaseOrderDetail"];
                                $varReturn['data'][$idxArray]['productUnitPriceCurrency_RefID'] = $value["ProductUnitPriceCurrency_RefID_TblPurchaseOrderDetail"];
                                $varReturn['data'][$idxArray]['productUnitPriceBaseCurrencyValue'] = $value["ProductUnitPriceFinalCurrencyValue_TblPurchaseOrderDetail"];
                                $varReturn['data'][$idxArray]['productUnitPriceFinalCurrency_RefID'] = $value["ProductUnitPriceFinalCurrency_RefID_TblPurchaseOrderDetail"];
                                $varReturn['data'][$idxArray]['productUnitPriceCurrencyExchangeRate'] = $value["ProductUnitPriceCurrencyExchangeRate_TblPurchaseOrderDetail"];
                                $varReturn['data'][$idxArray]['priceCurrency_RefID'] = $value["PriceCurrency_RefID_TblPurchaseOrderDetail"];
                                $varReturn['data'][$idxArray]['priceBaseCurrencyValue'] = $value["PriceBaseCurrencyValue_TblPurchaseOrderDetail"];
                                $varReturn['data'][$idxArray]['quantityUnitName'] = $value["QuantityUnitName_TblQuantityUnit_TblPurchaseOrderDetail"];
                                $varReturn['data'][$idxArray]['productUnitPriceCurrencyISOCode'] = $value["ISOCode_TblCurrency_TblPurchaseOrderDetail"];
                                $varReturn['data'][$idxArray]['combinedBudgetSectionDetail_RefID'] = $value["CombinedBudgetSectionDetail_RefID_TblPurchaseRequisitionDetail"];
                                $varReturn['data'][$idxArray]['combinedBudgetCode'] = $value["CombinedBudgetCode_New"];
                                $varReturn['data'][$idxArray]['combinedBudgetName'] = $value["CombinedBudgetName_New"];
                                $varReturn['data'][$idxArray]['combinedBudgetSectionCode'] = $value["CombinedBudgetSectionCode_New"];
                                $varReturn['data'][$idxArray]['combinedBudgetSectionName'] = $value["CombinedBudgetSectionName_New"];
                                $varReturn['data'][$idxArray]['combinedBudget_RefID'] = $value["CombinedBudget_RefID_New"];
                                $varReturn['data'][$idxArray]['combinedBudgetSection_RefID'] = $value["CombinedBudgetSection_RefID_New"];
                            } elseif ((($value["UnderlyingDetail_RefID"] / 1000000000000) % 10000) === 169) {
                                $varReturn['data'][$idxArray]['quantity'] = $value["Quantity_TblCombinedBudget"];
                                $varReturn['data'][$idxArray]['quantityUnit_RefID'] = $value["QuantityUnit_RefID_TblCombinedBudget"];
                                $varReturn['data'][$idxArray]['productUnitPriceCurrency_RefID'] = $value["ProductUnitPriceCurrency_RefID_TblCombinedBudget"];
                                $varReturn['data'][$idxArray]['productUnitPriceBaseCurrencyValue'] = $value["ProductUnitPriceBaseCurrencyValue_TblCombinedBudget"];
                                $varReturn['data'][$idxArray]['productUnitPriceFinalCurrency_RefID'] = $value["ProductUnitPriceFinalCurrency_RefID_TblCombinedBudget"];
                                $varReturn['data'][$idxArray]['productUnitPriceCurrencyExchangeRate'] = $value["ProductUnitPriceCurrencyExchangeRate_TblCombinedBudget"];
                                $varReturn['data'][$idxArray]['priceCurrency_RefID'] = $value["PriceCurrency_RefID_TblCombinedBudget"];
                                $varReturn['data'][$idxArray]['priceBaseCurrencyValue'] = $value["PriceBaseCurrencyValue_TblCombinedBudget"];
                                $varReturn['data'][$idxArray]['quantityUnitName'] = $value["QuantityUnitName_TblCombinedBudget"];
                                $varReturn['data'][$idxArray]['productUnitPriceCurrencyISOCode'] = $value["ISOCode_TblCombinedBudget"];
                                $varReturn['data'][$idxArray]['combinedBudgetSectionDetail_RefID'] = $value["CombinedBudgetSectionDetail_RefID_TblCombinedBudget"];
                                $varReturn['data'][$idxArray]['combinedBudgetCode'] = $value["CombinedBudgetCode_TblCombinedBudget"];
                                $varReturn['data'][$idxArray]['combinedBudgetName'] = $value["CombinedBudgetName_TblCombinedBudget"];
                                $varReturn['data'][$idxArray]['combinedBudgetSectionCode'] = $value["CombinedBudgetSectionCode_TblCombinedBudget"];
                                $varReturn['data'][$idxArray]['combinedBudgetSectionName'] = $value["CombinedBudgetSectionName_TblCombinedBudget"];
                                $varReturn['data'][$idxArray]['combinedBudget_RefID'] = $value["CombinedBudget_RefID_TblCombinedBudget"];
                                $varReturn['data'][$idxArray]['combinedBudgetSection_RefID'] = $value["CombinedBudgetSection_RefID_TblCombinedBudget"];
                            } elseif ((($value["UnderlyingDetail_RefID"] / 1000000000000) % 10000) === 173) {
                                $varReturn['data'][$idxArray]['quantity'] = $value["Type"] === 1 || $value["Type"] === 2 ? $value["Quantity_TblWarehouseInboundDetail"] - ($value["Quantity_WarehouseOutboundDetail"] + $value["QtyReq"]) : 0;
                                $varReturn['data'][$idxArray]['quantityUnit_RefID'] = $value["QuantityUnit_RefID_TblWarehouseInboundDetail"];
                                $varReturn['data'][$idxArray]['productUnitPriceCurrency_RefID'] = $value["ProductUnitPriceCurrency_RefID_TblWarehouseInboundDetail"];
                                $varReturn['data'][$idxArray]['productUnitPriceBaseCurrencyValue'] = $value["ProductUnitPriceBaseCurrencyValue_TblWarehouseInboundDetail"];
                                $varReturn['data'][$idxArray]['productUnitPriceFinalCurrency_RefID'] = $value["ProductUnitPriceFinalCurrency_RefID_TblWarehouseInboundDetail"];
                                $varReturn['data'][$idxArray]['productUnitPriceCurrencyExchangeRate'] = $value["ProductUnitPriceCurrencyExchangeRate_TblWarehouseInboundDetail"];
                                $varReturn['data'][$idxArray]['priceCurrency_RefID'] = $value["PriceCurrency_RefID_TblWarehouseInboundDetail"];
                                $varReturn['data'][$idxArray]['priceBaseCurrencyValue'] = $value["PriceBaseCurrencyValue_TblWarehouseInboundDetail"];
                                $varReturn['data'][$idxArray]['quantityUnitName'] = $value["QuantityUnitName_StockMove"];
                                $varReturn['data'][$idxArray]['productUnitPriceCurrencyISOCode'] = $value["ISOCode_StockMove"];
                                $varReturn['data'][$idxArray]['combinedBudgetSectionDetail_RefID'] = $value["CombinedBudgetSectionDetail_RefID_StockMove"];
                                $varReturn['data'][$idxArray]['combinedBudgetCode'] = $value["CombinedBudgetCode_StockMove"];
                                $varReturn['data'][$idxArray]['combinedBudgetName'] = $value["CombinedBudgetName_StockMove"];
                                $varReturn['data'][$idxArray]['combinedBudgetSectionCode'] = $value["CombinedBudgetSectionCode_StockMove"];
                                $varReturn['data'][$idxArray]['combinedBudgetSectionName'] = $value["CombinedBudgetSectionName_StockMove"];
                                $varReturn['data'][$idxArray]['combinedBudget_RefID'] = $value["CombinedBudget_RefID_StockMove"];
                                $varReturn['data'][$idxArray]['combinedBudgetSection_RefID'] = $value["CombinedBudgetSection_RefID_StockMove"];
                            } else {
                                $varReturn['data'][$idxArray]['quantity'] = null;
                                $varReturn['data'][$idxArray]['quantityUnit_RefID'] = null;
                                $varReturn['data'][$idxArray]['productUnitPriceCurrency_RefID'] = null;
                                $varReturn['data'][$idxArray]['productUnitPriceBaseCurrencyValue'] = null;
                                $varReturn['data'][$idxArray]['productUnitPriceFinalCurrency_RefID'] = null;
                                $varReturn['data'][$idxArray]['productUnitPriceCurrencyExchangeRate'] = null;
                                $varReturn['data'][$idxArray]['priceCurrency_RefID'] = null;
                                $varReturn['data'][$idxArray]['priceBaseCurrencyValue'] = null;
                                $varReturn['data'][$idxArray]['quantityUnitName'] = null;
                                $varReturn['data'][$idxArray]['productUnitPriceCurrencyISOCode'] = null;
                                $varReturn['data'][$idxArray]['combinedBudgetSectionDetail_RefID'] = null;
                                $varReturn['data'][$idxArray]['combinedBudgetCode'] = null;
                                $varReturn['data'][$idxArray]['combinedBudgetName'] = null;
                                $varReturn['data'][$idxArray]['combinedBudgetSectionCode'] = null;
                                $varReturn['data'][$idxArray]['combinedBudgetSectionName'] = null;
                                $varReturn['data'][$idxArray]['combinedBudget_RefID'] = null;
                                $varReturn['data'][$idxArray]['combinedBudgetSection_RefID'] = null;
                            }
                            $varReturn['data'][$idxArray]['businessDocumentType_RefID'] = $value["BusinessDocumentType_RefID"];
                            $varReturn['data'][$idxArray]['businessDocumentType_Name'] = $value["BusinessDocumentType_Name"];
                            $varReturn['data'][$idxArray]['sys_PID_TblPurchaseRequisitionDetail'] = $value["Sys_PID_TblPurchaseRequisitionDetail"];
                            $varReturn['data'][$idxArray]['requesterWorkerJobsPosition_RefID'] = $value["RequesterWorkerJobsPosition_RefID"];
                            $varReturn['data'][$idxArray]['requesterWorkerName'] = $value["RequesterWorkerName"];
                            if ((($value["Transporter_RefID"] / 1000000000000) % 10000) === 164) {
                                $varReturn['data'][$idxArray]['transporterCode'] = $value["TransporterCode_TblWorkerCareerInternal"];
                                $varReturn['data'][$idxArray]['transporterName'] = $value["TransporterName_TblWorkerCareerInternal"];
                                $varReturn['data'][$idxArray]['transporterAddress'] = $value["TransporterAddress_TblWorkerCareerInternal"];
                                $varReturn['data'][$idxArray]['transporterContactPerson'] = $value["TransporterContactPerson_TblWorkerCareerInternal"];
                                if (array_key_exists($value["DeliveryOrderDetail_ID"], $contactNumbers)) {
                                        $varReturn['data'][$idxArray]['transporterHandphone'] = array_key_exists(223000000000002, $contactNumbers[$value["DeliveryOrderDetail_ID"]]) ? $contactNumbers[$value["DeliveryOrderDetail_ID"]][223000000000002] : null;
                                        $varReturn['data'][$idxArray]['transporterPhone'] = array_key_exists(223000000000004, $contactNumbers[$value["DeliveryOrderDetail_ID"]]) ? $contactNumbers[$value["DeliveryOrderDetail_ID"]][223000000000004] : null;
                                        $varReturn['data'][$idxArray]['transporterFax'] = array_key_exists(223000000000005, $contactNumbers[$value["DeliveryOrderDetail_ID"]]) ? $contactNumbers[$value["DeliveryOrderDetail_ID"]][223000000000005] : null;
                                }
                            } elseif ((($value["Transporter_RefID"] / 1000000000000) % 10000) === 284) {
                                $varReturn['data'][$idxArray]['transporterCode'] = $value["TransporterCode_TblTransporter"];
                                if ((($value["Entity_RefID"] / 1000000000000) % 10000) === 124) {
                                    $varReturn['data'][$idxArray]['transporterName'] = $value["TransporterName_TblInstitutionBranch"];
                                    $varReturn['data'][$idxArray]['transporterAddress'] = $value["TransporterAddress_TblInstitutionBranch"];
                                    $varReturn['data'][$idxArray]['transporterContactPerson'] = $value["TransporterContactPerson_TblInstitutionBranch"];
                                    if (array_key_exists($value["DeliveryOrderDetail_ID"], $contactNumbers)) {
                                        $varReturn['data'][$idxArray]['transporterHandphone'] = array_key_exists(223000000000002, $contactNumbers[$value["DeliveryOrderDetail_ID"]]) ? $contactNumbers[$value["DeliveryOrderDetail_ID"]][223000000000002] : null;
                                        $varReturn['data'][$idxArray]['transporterPhone'] = array_key_exists(223000000000004, $contactNumbers[$value["DeliveryOrderDetail_ID"]]) ? $contactNumbers[$value["DeliveryOrderDetail_ID"]][223000000000004] : null;
                                        $varReturn['data'][$idxArray]['transporterFax'] = array_key_exists(223000000000005, $contactNumbers[$value["DeliveryOrderDetail_ID"]]) ? $contactNumbers[$value["DeliveryOrderDetail_ID"]][223000000000005] : null;
                                    }
                                } elseif ((($value["Entity_RefID"] / 1000000000000) % 10000) === 25) {
                                    $varReturn['data'][$idxArray]['transporterName'] = $value["TransporterName_TblPerson"];
                                    $varReturn['data'][$idxArray]['transporterAddress'] = $value["TransporterAddress_TblPerson"];
                                    $varReturn['data'][$idxArray]['transporterContactPerson'] = $value["TransporterContactPerson_TblPerson"];
                                    if (array_key_exists($value["DeliveryOrderDetail_ID"], $contactNumbers)) {
                                        $varReturn['data'][$idxArray]['transporterHandphone'] = array_key_exists(223000000000002, $contactNumbers[$value["DeliveryOrderDetail_ID"]]) ? $contactNumbers[$value["DeliveryOrderDetail_ID"]][223000000000002] : null;
                                        $varReturn['data'][$idxArray]['transporterPhone'] = array_key_exists(223000000000004, $contactNumbers[$value["DeliveryOrderDetail_ID"]]) ? $contactNumbers[$value["DeliveryOrderDetail_ID"]][223000000000004] : null;
                                        $varReturn['data'][$idxArray]['transporterFax'] = array_key_exists(223000000000005, $contactNumbers[$value["DeliveryOrderDetail_ID"]]) ? $contactNumbers[$value["DeliveryOrderDetail_ID"]][223000000000005] : null;
                                    }
                                } else {
                                    $varReturn['data'][$idxArray]['transporterName'] = null;
                                    $varReturn['data'][$idxArray]['transporterAddress'] = null;
                                    $varReturn['data'][$idxArray]['transporterContactPerson'] = null;
                                    $varReturn['data'][$idxArray]['transporterHandphone'] = null;
                                    $varReturn['data'][$idxArray]['transporterPhone'] = null;
                                    $varReturn['data'][$idxArray]['transporterFax'] = null;
                                }
                            } else {
                                $varReturn['data'][$idxArray]['transporterCode'] = null;
                                $varReturn['data'][$idxArray]['transporterName'] = null;
                                $varReturn['data'][$idxArray]['transporterAddress'] = null;
                                $varReturn['data'][$idxArray]['transporterContactPerson'] = null;
                                $varReturn['data'][$idxArray]['transporterHandphone'] = null;
                                $varReturn['data'][$idxArray]['transporterPhone'] = null;
                                $varReturn['data'][$idxArray]['transporterFax'] = null;
                            }
                            $varReturn['data'][$idxArray]['qtyAvail'] = in_array($value["DeliveryOrderDetail_ID"], $listIdDODetail) ? round($value["QtyReq"] - $qtyWarehouseInboundOrderDetail[$value["DeliveryOrderDetail_ID"]]["Qty"], 2) : null;
                            $varReturn['data'][$idxArray]['purchaseOrderNumber'] = $value["DocumentNumber_TblPurchaseOrder"];
                            $varReturn['data'][$idxArray]['qtyBudget'] = $value["Quantity_CombinedBudget_New"];
                            $varReturn['data'][$idxArray]['qtyAvailBudget'] = $value["QtyAvailBudget"];
                            $varReturn['data'][$idxArray]['priceBudget'] = $value["UnitPriceCurrencyValue_CombinedBudget_New"];
                            $varReturn['data'][$idxArray]['qtyStock'] = $value["Type"] === 1 ? $value["Quantity_TblWarehouseInboundDetail"] - ($value["Quantity_WarehouseOutboundDetail"] + $value["QtyReq"]) : 0;
                            $varReturn['data'][$idxArray]['stockPrice'] = $value["StockPrice"];
                            $varReturn['data'][$idxArray]['workStructure_RefID'] = $value["WorkStructure_RefID"];
                            $varReturn['data'][$idxArray]['workCode'] = $value["WorkCode"];
                            $varReturn['data'][$idxArray]['workName'] = $value["WorkName"];
                            $varReturn['data'][$idxArray]['orderSequence'] = $idxArray + 1;
                            $idxArray++;
                        }

                return
                    $varReturn;
                }

            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataList_MaterialServiceRequisition_AllVersion                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-08-08                                                                                           |
        | ▪ Creation Date   : 2024-08-08                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Permintaan Pembelian (PR) Semua Versi                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |        ------------------------------                                                                                    |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |        ------------------------------                                                                                    |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_MaterialServiceRequisition_AllVersion(
            $varUserSession,
            int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetDataList_MaterialServiceRequisition',
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
        | ▪ Method Name     : getDataList_MaterialServiceRequisition_LatestVersion                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-08-08                                                                                           |
        | ▪ Creation Date   : 2024-08-08                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Permintaan Pembelian (PR) Versi Terakhir                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |        ------------------------------                                                                                    |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |        ------------------------------                                                                                    |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_MaterialServiceRequisition_LatestVersion(
            $varUserSession,
            int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetDataList_MaterialServiceRequisition',
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
        | ▪ Method Name     : getDataList_OrderPicking_AllVersion                                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-10-24                                                                                           |
        | ▪ Creation Date   : 2024-10-24                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pengambilan Barang Pesanan (Order Picking) Semua Versi                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |        ------------------------------                                                                                    |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |        ------------------------------                                                                                    |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_OrderPicking_AllVersion(
            $varUserSession,
            int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetDataList_OrderPicking',
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
        | ▪ Method Name     : getDataList_OrderPicking_LatestVersion                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-10-24                                                                                           |
        | ▪ Creation Date   : 2024-10-24                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pengambilan Barang Pesanan (Order Picking) Semua Versi                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |        ------------------------------                                                                                    |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |        ------------------------------                                                                                    |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_OrderPicking_LatestVersion(
            $varUserSession,
            int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetDataList_OrderPicking',
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
        | ▪ Method Name     : getDataList_OrderPickingRequisition_AllVersion                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-10-24                                                                                           |
        | ▪ Creation Date   : 2024-10-24                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Permintaan Pengambilan Barang Pesanan (Order Picking Requisition) Semua Versi     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |        ------------------------------                                                                                    |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |        ------------------------------                                                                                    |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_OrderPickingRequisition_AllVersion(
            $varUserSession,
            int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetDataList_OrderPickingRequisition',
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
        | ▪ Method Name     : getDataList_OrderPickingRequisition_LatestVersion                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-10-24                                                                                           |
        | ▪ Creation Date   : 2024-10-24                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Permintaan Pengambilan Barang Pesanan (Order Picking Requisition) Semua Versi     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |        ------------------------------                                                                                    |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |        ------------------------------                                                                                    |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_OrderPickingRequisition_LatestVersion(
            $varUserSession,
            int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetDataList_OrderPickingRequisition',
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
        | ▪ Method Name     : getDataList_PurchaseOrder_AllVersion                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2024-10-16                                                                                           |
        | ▪ Creation Date   : 2022-03-07                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pesanan Pembelian (Purcase Order) Semua Versi                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |        ------------------------------                                                                                    |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |        ------------------------------                                                                                    |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_PurchaseOrder_AllVersion(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetDataList_PurchaseOrder',
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
        | ▪ Method Name     : getDataList_PurchaseOrder_LatestVersion                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2024-10-16                                                                                           |
        | ▪ Creation Date   : 2022-03-07                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pesanan Pembelian (Purcase Order) Versi Terakhir                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |        ------------------------------                                                                                    |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |        ------------------------------                                                                                    |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_PurchaseOrder_LatestVersion(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetDataList_PurchaseOrder',
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
        | ▪ Method Name     : getDataList_PurchaseOrderDetail_LatestVersion                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2026-03-16                                                                                           |
        | ▪ Creation Date   : 2025-03-05                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Detail Pesanan Pembelian (Purchase Order Detail) Versi Terakhir                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varPurchaseOrder_RefID ► Purchase Order ID                                                               |
        |        ------------------------------                                                                                    |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_PurchaseOrderDetail_LatestVersion(
            $varUserSession, int $varPurchaseOrder_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetDataList_PurchaseOrderDetail',
                            [
                                [$varPurchaseOrder_RefID, 'bigint' ],
                            ]
                            )
		            );
                    $resultArray = $varReturn['data'];

                    // Description: Generate API.
                    $varReturn['data'] = [];
                    $idxArray = 0;
                    foreach ($resultArray as $key => $value) {
                        $varReturn['data'][$idxArray]['sys_ID'] = $value["Sys_ID"];
                        $varReturn['data'][$idxArray]['sys_PID'] = $value["Sys_PID"];
                        $varReturn['data'][$idxArray]['sys_SID'] = $value["Sys_SID"];
                        $varReturn['data'][$idxArray]['sys_RPK'] = $value["Sys_RPK"];
                        $varReturn['data'][$idxArray]['sys_Branch_RefID'] = $value["Sys_Branch_RefID"];
                        $varReturn['data'][$idxArray]['sys_BaseCurrency_RefID'] = $value["Sys_BaseCurrency_RefID"];
                        $varReturn['data'][$idxArray]['purchaseOrder_RefID'] = $value["PurchaseOrder_RefID"];
                        $varReturn['data'][$idxArray]['businessDocument_RefID'] = $value["BusinessDocument_RefID"];
                        $varReturn['data'][$idxArray]['documentNumber'] = $value["DocumentNumber"];
                        $varReturn['data'][$idxArray]['log_FileUpload_Pointer_RefID'] = $value["Log_FileUpload_Pointer_RefID"];
                        $varReturn['data'][$idxArray]['supplier_RefID'] = $value["Supplier_RefID"];
                        $varReturn['data'][$idxArray]['supplierCode'] = $value["SupplierCode"];
                        if ((($value["Entity_RefIDTblSupplier"] / 1000000000000) % 10000) === 124) {
                            $varReturn['data'][$idxArray]['supplierAddress'] = $value["SupplierAddressTblInstitution"];
                            $varReturn['data'][$idxArray]['supplierName'] = $value["SupplierNameTblInstitution"];
                        } elseif ((($value["Entity_RefIDTblSupplier"] / 1000000000000) % 10000) === 25) {
                            $varReturn['data'][$idxArray]['supplierName'] = $value["SupplierNameTblPerson"];
                            $varReturn['data'][$idxArray]['supplierAddress'] = $value["SupplierAddressTblPerson"];
                        } else {
                            $varReturn['data'][$idxArray]['supplierName'] = null;
                            $varReturn['data'][$idxArray]['supplierAddress'] = null;
                        }
                        $varReturn['data'][$idxArray]['paymentNotes'] = $value["PaymentNotes"];
                        $varReturn['data'][$idxArray]['internalNotes'] = $value["InternalNotes"];
                        $varReturn['data'][$idxArray]['downPayment'] = $value["DownPayment"];
                        $varReturn['data'][$idxArray]['termOfPayment_RefID'] = $value["TermOfPayment_RefID"];
                        $varReturn['data'][$idxArray]['deliveryTo_RefID'] = $value["DeliveryTo_RefID"];
                        $varReturn['data'][$idxArray]['deliveryTo_NonRefID'] = json_decode($value["DeliveryTo_NonRefID"]);
                        $varReturn['data'][$idxArray]['vatRatio'] = $value["VatRatio"];
                        $varReturn['data'][$idxArray]['remarks'] = $value["Remarks"];
                        $varReturn['data'][$idxArray]['productCode'] = $value["ProductCode"];
                        $varReturn['data'][$idxArray]['productName'] = $value["ProductName"];
                        $varReturn['data'][$idxArray]['quantity'] = $value["Quantity"];
                        $varReturn['data'][$idxArray]['quantityUnit_RefID'] = $value["QuantityUnit_RefID"];
                        $varReturn['data'][$idxArray]['productUnitPriceCurrency_RefID'] = $value["ProductUnitPriceCurrency_RefID"];
                        $varReturn['data'][$idxArray]['productUnitPriceCurrencyValue'] = $value["ProductUnitPriceCurrencyValue"];
                        $varReturn['data'][$idxArray]['productUnitPriceCurrencyExchangeRate'] = $value["ProductUnitPriceCurrencyExchangeRate"];
                        $varReturn['data'][$idxArray]['productUnitPriceBaseCurrencyValue'] = $value["ProductUnitPriceBaseCurrencyValue"];
                        $varReturn['data'][$idxArray]['note'] = $value["Note"];
                        $varReturn['data'][$idxArray]['tariffCurrencyValue'] = $value["TariffCurrencyValue"];
                        $varReturn['data'][$idxArray]['businessDocumentTypeName'] = $value["BusinessDocumentTypeName"];
                        $varReturn['data'][$idxArray]['combinedBudget_RefID'] = $value["CombinedBudget_RefID"];
                        $varReturn['data'][$idxArray]['date'] = $value["Date"];
                        $varReturn['data'][$idxArray]['dateUpdate'] = $value["DateUpdate"];
                        $varReturn['data'][$idxArray]['qtyPR'] = $value["QtyPR"];
                        $varReturn['data'][$idxArray]['quantityUnitName'] = $value["QuantityUnitName"];
                        $varReturn['data'][$idxArray]['quantityUnitPrice'] = $value["QuantityUnitPrice"];
                        $varReturn['data'][$idxArray]['productUnitPriceCurrencyISOCode'] = $value["ProductUnitPriceCurrencyISOCode"];
                        $varReturn['data'][$idxArray]['purchaseRequisitionDetail_RefID'] = $value["PurchaseRequisitionDetail_RefID"];
                        $varReturn['data'][$idxArray]['termOfPaymentName'] = $value["TermOfPaymentName"];
                        $varReturn['data'][$idxArray]['productUnitPriceDiscountCurrency_RefID'] = $value["ProductUnitPriceDiscountCurrency_RefID"];
                        $varReturn['data'][$idxArray]['productUnitPriceDiscountCurrencyValue'] = $value["ProductUnitPriceDiscountCurrencyValue"];
                        $varReturn['data'][$idxArray]['productUnitPriceDiscountCurrencyExchangeRate'] = $value["ProductUnitPriceDiscountCurrencyExchangeRate"];
                        $varReturn['data'][$idxArray]['transactionTax_RefID'] = $value["TransactionTax_RefID"];
                        $varReturn['data'][$idxArray]['transactionTaxDetail_RefID'] = $value["TransactionTaxDetail_RefID"];
                        $varReturn['data'][$idxArray]['quantity_TblDeliveryOrderDetail'] = $value["Quantity_TblDeliveryOrderDetail"];
                        $varReturn['data'][$idxArray]['qtyAvail'] = round((float) $value["Quantity"] - (float) $value["Quantity_TblDeliveryOrderDetail"], 2);
                        $varReturn['data'][$idxArray]['deliveryDateTimeTZ'] = $value["DeliveryDateTimeTZ"];
                        $varReturn['data'][$idxArray]['purchaseRequisitionNumber'] = $value["PurchaseRequisitionNumber"];
                        $varReturn['data'][$idxArray]['product_RefID'] = $value["Product_RefID"];
                        $varReturn['data'][$idxArray]['combinedBudgetCode'] = $value["CombinedBudgetCode"];
                        $varReturn['data'][$idxArray]['combinedBudgetName'] = $value["CombinedBudgetName"];
                        $varReturn['data'][$idxArray]['combinedBudgetSectionCode'] = $value["CombinedBudgetSectionCode"];
                        $varReturn['data'][$idxArray]['combinedBudgetSectionName'] = $value["CombinedBudgetSectionName"];
                        $varReturn['data'][$idxArray]['combinedBudgetSectionDetail_RefID'] = $value["CombinedBudgetSectionDetail_RefID"];
                        $varReturn['data'][$idxArray]['asset'] = $value["Asset"];
                        $varReturn['data'][$idxArray]['workStructure_RefID'] = $value["WorkStructure_RefID"];
                        $varReturn['data'][$idxArray]['workCode'] = $value["WorkCode"];
                        $varReturn['data'][$idxArray]['workName'] = $value["WorkName"];
                        $idxArray++;
                    }

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
        | ▪ Method Name     : getDataList_PurchaseRequisition_AllVersion                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2024-10-16                                                                                           |
        | ▪ Creation Date   : 2022-03-07                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Permintaan Pembelian (Purchase Request) Semua Versi                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |        ------------------------------                                                                                    |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |        ------------------------------                                                                                    |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_PurchaseRequisition_AllVersion(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetDataList_PurchaseRequisition',
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
        | ▪ Method Name     : getDataList_PurchaseRequisition_LatestVersion                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2024-10-16                                                                                           |
        | ▪ Creation Date   : 2022-03-07                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Permintaan Pembelian (Purchase Request) Versi Terakhir                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |        ------------------------------                                                                                    |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |        ------------------------------                                                                                    |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_PurchaseRequisition_LatestVersion(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetDataList_PurchaseRequisition',
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
        | ▪ Method Name     : getDataList_Supplier                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-10-16                                                                                           |
        | ▪ Creation Date   : 2022-03-01                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pemasok                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |        ------------------------------                                                                                    |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_Supplier(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetDataList_Supplier_New',
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
        | ▪ Method Name     : getDataList_Transporter                                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-05-14                                                                                           |
        | ▪ Creation Date   : 2025-05-14                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Gudang                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |        ------------------------------                                                                                    |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_Transporter(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetDataList_Transporter',
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
        | ▪ Method Name     : getDataList_Warehouse                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-03-01                                                                                           |
        | ▪ Creation Date   : 2022-03-01                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Gudang                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |        ------------------------------                                                                                    |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_Warehouse(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetDataList_Warehouse',
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
        | ▪ Method Name     : getDataList_WarehouseInboundOrder_AllVersion                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2024-10-24                                                                                           |
        | ▪ Creation Date   : 2022-03-08                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Penerimaan Barang Gudang (Warehouse Inbound Order) Semua Versi                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |        ------------------------------                                                                                    |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_WarehouseInboundOrder_AllVersion(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetDataList_WarehouseInboundOrder',
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
        | ▪ Method Name     : getDataList_WarehouseInboundOrder_LatestVersion                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2025-03-17                                                                                           |
        | ▪ Creation Date   : 2022-03-08                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Penerimaan Barang Gudang (Warehouse Inbound Order) Versi Terakhir                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |        ------------------------------                                                                                    |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_WarehouseInboundOrder_LatestVersion(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetDataList_WarehouseInboundOrder',
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
        | ▪ Method Name     : getDataList_WarehouseInboundOrderDetail_LatestVersion                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2025-10-31                                                                                           |
        | ▪ Creation Date   : 2025-05-20                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Warehouse Inbound Order Detail Versi Terakhir                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varWarehouseInboundOrder_RefID ► Warehouse Inbound Order                                                 |
        |        ------------------------------                                                                                    |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_WarehouseInboundOrderDetail_LatestVersion(
            $varUserSession, int $varWarehouseInboundOrder_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetDataList_WarehouseInboundOrderDetail',
                            [
                                [$varWarehouseInboundOrder_RefID, 'bigint' ],
                            ]
                            )
		    	);
                $resultArray = $varReturn['data'];

                // Menjumlahkan Quantity Material Receive Detail berdasarkan ID DO Detail yg sama.
                $arrayQtyMR = [];
                $listPidDoDetail = [];
                foreach ($resultArray as $key => $value) {
                    if (in_array($value["Sys_PID_DO_Detail"], $listPidDoDetail)) {
                        $arrayQtyMR[$value["Sys_PID_DO_Detail"]]["QtyMR"] = (float) $arrayQtyMR[$value["Sys_PID_DO_Detail"]]["QtyMR"] + (float) $value["Quantity"];
                    } else {
                        array_push($listPidDoDetail, $value["Sys_PID_DO_Detail"]);
                        $arrayQtyMR[$value["Sys_PID_DO_Detail"]]["Sys_PID_DO_Detail"] = $value["Sys_PID_DO_Detail"];
                        $arrayQtyMR[$value["Sys_PID_DO_Detail"]]["QtyMR"] = $value["Quantity"];
                    }
                }

                $varReturn['data'] = [];
                $idxArray = 0;
                foreach ($resultArray as $key => $value) {
                    $varReturn['data'][$idxArray]['businessDocumentVersion_RefID'] = $value["BusinessDocumentVersion_RefID"];
                    $varReturn['data'][$idxArray]['log_FileUpload_Pointer_RefID'] = $value["Log_FileUpload_Pointer_RefID"];
                    $varReturn['data'][$idxArray]['requesterWorkerJobsPosition_RefID'] = $value["RequesterWorkerJobsPosition_RefID"];
                    $varReturn['data'][$idxArray]['deliveryFrom_RefID'] = $value["DeliveryFrom_RefID"];
                    $varReturn['data'][$idxArray]['deliveryFrom_NonRefID'] = json_decode($value["DeliveryFrom_NonRefID"]);
                    $varReturn['data'][$idxArray]['deliveryTo_RefID'] = $value["DeliveryTo_RefID"];
                    $varReturn['data'][$idxArray]['deliveryTo_NonRefID'] = json_decode($value["DeliveryTo_NonRefID"]);
                    $varReturn['data'][$idxArray]['date'] = $value["Date"];
                    $varReturn['data'][$idxArray]['remarks'] = $value["Remarks"];
                    $varReturn['data'][$idxArray]['sys_PID'] = $value["Sys_PID"];
                    $varReturn['data'][$idxArray]['sys_SID'] = $value["Sys_SID"];
                    $varReturn['data'][$idxArray]['sys_RPK'] = $value["Sys_RPK"];
                    $varReturn['data'][$idxArray]['sys_BaseCurrency_RefID'] = $value["Sys_BaseCurrency_RefID"];
                    $varReturn['data'][$idxArray]['product_RefID'] = $value["Product_RefID"];
                    $varReturn['data'][$idxArray]['productName'] = $value["ProductName"];
                    $varReturn['data'][$idxArray]['productCode'] = $value["ProductCode"];
                    $varReturn['data'][$idxArray]['quantity'] = (float) $value["Quantity"];
                    $varReturn['data'][$idxArray]['quantityUnit_RefID'] = $value["QuantityUnit_RefID"];
                    $varReturn['data'][$idxArray]['warehouseInboundOrder_RefID'] = $value["WarehouseInboundOrder_RefID"];
                    $varReturn['data'][$idxArray]['note'] = $value["Note"];
                    $varReturn['data'][$idxArray]['qtyDO'] = (float) $value["QtyDO"];
                    $varReturn['data'][$idxArray]['qtyAvailableDO'] = in_array($value["Sys_PID_DO_Detail"], $listPidDoDetail) ? $value["QtyDO"] - $arrayQtyMR[$value["Sys_PID_DO_Detail"]]["QtyMR"] : null;
                    $varReturn['data'][$idxArray]['sys_ID'] = $value["Sys_ID"];
                    $varReturn['data'][$idxArray]['businessDocument_RefID'] = $value["BusinessDocument_RefID"];
                    $varReturn['data'][$idxArray]['businessDocumentNumber'] = $value["BusinessDocumentNumber"];
                    $varReturn['data'][$idxArray]['businessDocumentTypeName'] = $value["BusinessDocumentTypeName"];
                    $varReturn['data'][$idxArray]['dateUpdate'] = $value["DateUpdate"];
                    $varReturn['data'][$idxArray]['quantityUnitName'] = $value["QuantityUnitName"];
                    $varReturn['data'][$idxArray]['deliveryOrderDetail_RefID'] = $value["DeliveryOrderDetail_RefID"];
                    $varReturn['data'][$idxArray]['combinedBudget_RefID'] = $value["CombinedBudget_RefID"];
                    $varReturn['data'][$idxArray]['combinedBudgetName'] = $value["CombinedBudgetName"];
                    $varReturn['data'][$idxArray]['combinedBudgetCode'] = $value["CombinedBudgetCode"];
                    $varReturn['data'][$idxArray]['combinedBudgetSectionName'] = $value["CombinedBudgetSectionName"];
                    $varReturn['data'][$idxArray]['combinedBudgetSectionCode'] = $value["CombinedBudgetSectionCode"];
                    $varReturn['data'][$idxArray]['deliveryDateTimeTZ'] = $value["DeliveryDateTimeTZ"];
                    $varReturn['data'][$idxArray]['transporter_RefID'] = $value["Transporter_RefID"];
                    $varReturn['data'][$idxArray]['deliveryOrderNumber'] = $value["DeliveryOrderNumber"];
                    $varReturn['data'][$idxArray]['receiveDateTimeTZ'] = $value["ReceiveDateTimeTZ"];
                    $varReturn['data'][$idxArray]['warehouse_RefID'] = $value["Warehouse_RefID"];
                    $varReturn['data'][$idxArray]['warehouseName'] = $value["WarehouseName"];
                    $varReturn['data'][$idxArray]['warehouseAddress'] = $value["WarehouseAddress"];
                    $varReturn['data'][$idxArray]['combinedBudgetSectionDetail_RefID'] = $value["CombinedBudgetSectionDetail_RefID"];
                    $idxArray++;
                }

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
        | ▪ Method Name     : getDataList_WarehouseOutboundOrderDetail_LatestVersion                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2025-10-03                                                                                           |
        | ▪ Creation Date   : 2025-10-03                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Warehouse Outbound Order Detail Versi Terakhir                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varWarehouseOutboundOrder_RefID ► Warehouse Outbound Order                                               |
        |        ------------------------------                                                                                    |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_WarehouseOutboundOrderDetail_LatestVersion(
            $varUserSession, int $varWarehouseOutboundOrder_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetDataList_WarehouseOutboundOrderDetail',
                            [
                                [$varWarehouseOutboundOrder_RefID, 'bigint' ],
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
        | ▪ Method Name     : getDataList_StockDetail_LatestVersion                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2025-10-01                                                                                           |
        | ▪ Creation Date   : 2025-10-01                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Stock Inbound Order Detail Versi Terakhir                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varCombinedBudget_RefID ► CombinedBudget Reference ID                                                    |
        |      ▪ (int)    varWarehouse_RefID ► Warehouse Reference ID                                                              |
        |        ------------------------------                                                                                    |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_StockDetail_LatestVersion(
            $varUserSession, int $varCombinedBudget_RefID = null, int $varWarehouse_RefID = null,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetDataList_StockDetail',
                            [
                                [$varCombinedBudget_RefID, 'bigint' ],
                                [$varWarehouse_RefID, 'bigint' ],
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
        | ▪ Method Name     : getDataList_WarehouseOutboundOrder_AllVersion                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2024-10-24                                                                                           |
        | ▪ Creation Date   : 2022-03-08                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pengeluaran Barang Gudang (Warehouse Outbound Order) Semua Versi                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |        ------------------------------                                                                                    |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_WarehouseOutboundOrder_AllVersion(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetDataList_WarehouseOutboundOrder',
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

                return
                    $varReturn;
                }

            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataList_WarehouseOutboundOrder_LatestVersion                                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2024-10-24                                                                                           |
        | ▪ Creation Date   : 2022-03-08                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pengeluaran Barang Gudang (Warehouse Outbound Order) Versi Terakhir               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |        ------------------------------                                                                                    |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_WarehouseOutboundOrder_LatestVersion(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetDataList_WarehouseOutboundOrder',
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

                return
                    $varReturn;
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
        | ▪ Last Update     : 2022-03-01                                                                                           |
        | ▪ Creation Date   : 2022-03-01                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Jenis Gudang                                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |        ------------------------------                                                                                    |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_WarehouseType(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetDataList_WarehouseType',
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
        | ▪ Method Name     : getDataListJSON_DeliveryDestination                                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2024-09-11                                                                                           |
        | ▪ Creation Date   : 2024-09-11                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Tujuan Pengiriman                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |        ------------------------------                                                                                    |
        |      ▪ (int)    varDeliveryDestinationType_RefID ► Delivery Destination Type Reference ID                                |
        |        ------------------------------                                                                                    |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataListJSON_DeliveryDestination(
            $varUserSession, int $varSysBranch_RefID,
            int $varDeliveryDestinationType_RefID = null,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetDataListJSON_DeliveryDestination',
                            [
                                [null, 'bigint'],
                                [$varSysBranch_RefID, 'bigint'],

                                [$varDeliveryDestinationType_RefID, 'bigint'],

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
                        $varReturn['data'][0]['Func_GetDataListJSON_DeliveryDestination']
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
        | ▪ Method Name     : getDataListJSON_MaterialServiceRequisition_AllVersion                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2024-10-16                                                                                           |
        | ▪ Creation Date   : 2024-08-12                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Permintaan Material dan Service (Materal Service Requsition) Semua Versi          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |        ------------------------------                                                                                    |
        |        ------------------------------                                                                                    |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataListJSON_MaterialServiceRequisition_AllVersion(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetDataListJSON_MaterialServiceRequisition',
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
                        $varReturn['data'][0]['Func_GetDataListJSON_MaterialServiceRequisition']
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
        | ▪ Method Name     : getDataListJSON_MaterialServiceRequisition_LatestVersion                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2024-10-16                                                                                           |
        | ▪ Creation Date   : 2024-08-12                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Permintaan Material dan Service (Materal Service Requsition) Versi Terakhir       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |        ------------------------------                                                                                    |
        |        ------------------------------                                                                                    |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataListJSON_MaterialServiceRequisition_LatestVersion(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetDataListJSON_MaterialServiceRequisition',
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
                        $varReturn['data'][0]['Func_GetDataListJSON_MaterialServiceRequisition']
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
        | ▪ Method Name     : getDataListJSON_MaterialServiceRequisitionDetail                                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-09-09                                                                                           |
        | ▪ Creation Date   : 2024-09-09                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Perincian Permintaan Material dan Service (Materal Service Requsition Detail)     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |        ------------------------------                                                                                    |
        |      ▪ (int)    varPurchaseRequisition_RefID ► Purchase Requisition Reference ID                                         |
        |        ------------------------------                                                                                    |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataListJSON_MaterialServiceRequisitionDetail(
            $varUserSession, int $varSysBranch_RefID,
            int $varMaterialServiceRequisition_RefID = null,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetDataListJSON_MaterialServiceRequisitionDetail',
                            [
                                [$varSysBranch_RefID, 'bigint' ],

                                [$varMaterialServiceRequisition_RefID, 'bigint' ],

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
                        $varReturn['data'][0]['Func_GetDataListJSON_MaterialServiceRequisitionDetail']
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
        | ▪ Method Name     : getDataListJSON_OrderPicking_AllVersion                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-10-24                                                                                           |
        | ▪ Creation Date   : 2024-10-24                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pengambilan Barang Pesanan (Order Picking) Semua Versi                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |        ------------------------------                                                                                    |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataListJSON_OrderPicking_AllVersion(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetDataListJSON_OrderPicking',
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
                        $varReturn['data'][0]['Func_GetDataListJSON_OrderPicking']
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
        | ▪ Method Name     : getDataListJSON_OrderPicking_LatestVersion                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-10-24                                                                                           |
        | ▪ Creation Date   : 2024-10-24                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pengambilan Barang Pesanan (Order Picking) Versi Terakhir                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |        ------------------------------                                                                                    |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataListJSON_OrderPicking_LatestVersion(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetDataListJSON_OrderPicking',
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
                        $varReturn['data'][0]['Func_GetDataListJSON_OrderPicking']
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
        | ▪ Method Name     : getDataListJSON_OrderPickingRequisition_AllVersion                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-09-11                                                                                           |
        | ▪ Creation Date   : 2024-09-11                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Permintaan Pengambilan Barang Pesanan (Order Picking Requisition) Semua Versi     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |        ------------------------------                                                                                    |
        |        ------------------------------                                                                                    |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataListJSON_OrderPickingRequisition_AllVersion(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetDataListJSON_OrderPickingRequisition',
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
                        $varReturn['data'][0]['Func_GetDataListJSON_OrderPickingRequisition']
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
        | ▪ Method Name     : getDataListJSON_OrderPickingRequisition_LatestVersion                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-09-11                                                                                           |
        | ▪ Creation Date   : 2024-09-11                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Permintaan Pengambilan Barang Pesanan (Order Picking Requisition) Versi Terakhir  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |        ------------------------------                                                                                    |
        |        ------------------------------                                                                                    |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataListJSON_OrderPickingRequisition_LatestVersion(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetDataListJSON_OrderPickingRequisition',
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
                        $varReturn['data'][0]['Func_GetDataListJSON_OrderPickingRequisition']
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
        | ▪ Method Name     : getDataListJSON_OrderPickingRequisitionDetail                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-09-09                                                                                           |
        | ▪ Creation Date   : 2024-09-09                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Perincian Pengambilan Barang Pesanan (Order Picking Detail)                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |        ------------------------------                                                                                    |
        |      ▪ (int)    varOrderPickingRequisition_RefID ► Order Picking Requisition Reference ID                                |
        |        ------------------------------                                                                                    |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataListJSON_OrderPickingRequisitionDetail(
            $varUserSession, int $varSysBranch_RefID,
            int $varOrderPickingRequisition_RefID = null,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetDataListJSON_OrderPickingRequisitionDetail',
                            [
                                [$varSysBranch_RefID, 'bigint'],

                                [$varOrderPickingRequisition_RefID, 'bigint'],

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
                        $varReturn['data'][0]['Func_GetDataListJSON_OrderPickingRequisitionDetail']
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
        | ▪ Method Name     : getDataListJSON_PurchaseOrder_AllVersion                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2024-10-16                                                                                           |
        | ▪ Creation Date   : 2024-09-11                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pesanan Pembelian (Purchase Order) Semua Versi                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |        ------------------------------                                                                                    |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataListJSON_PurchaseOrder_AllVersion(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetDataListJSON_PurchaseOrder',
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
                        $varReturn['data'][0]['Func_GetDataListJSON_PurchaseOrder']
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
        | ▪ Method Name     : getDataListJSON_PurchaseOrder_LatestVersion                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2024-10-16                                                                                           |
        | ▪ Creation Date   : 2024-09-11                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pesanan Pembelian (Purchase Order) Versi Terakhir                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |        ------------------------------                                                                                    |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataListJSON_PurchaseOrder_LatestVersion(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetDataListJSON_PurchaseOrder',
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
                        $varReturn['data'][0]['Func_GetDataListJSON_PurchaseOrder']
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
        | ▪ Method Name     : getDataListJSON_PurchaseRequisition_AllVersion                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2024-10-16                                                                                           |
        | ▪ Creation Date   : 2024-08-12                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Permintaan Pembelian (PR) Semua Versi                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |        ------------------------------                                                                                    |
        |        ------------------------------                                                                                    |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataListJSON_PurchaseRequisition_AllVersion(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetDataListJSON_PurchaseRequisition',
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
                        $varReturn['data'][0]['Func_GetDataListJSON_PurchaseRequisition']
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
        | ▪ Method Name     : getDataListJSON_PurchaseRequisition_LatestVersion                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2024-10-16                                                                                           |
        | ▪ Creation Date   : 2024-08-12                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Permintaan Pembelian (PR) Versi Terakhir                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |        ------------------------------                                                                                    |
        |        ------------------------------                                                                                    |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataListJSON_PurchaseRequisition_LatestVersion(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetDataListJSON_PurchaseRequisition',
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
                        $varReturn['data'][0]['Func_GetDataListJSON_PurchaseRequisition']
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
        | ▪ Method Name     : getDataListJSON_PurchaseRequisitionDetail                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2026-03-16                                                                                           |
        | ▪ Creation Date   : 2024-09-09                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Perincian Permintaan Pembelian (Purchase Requisition Detail)                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |        ------------------------------                                                                                    |
        |      ▪ (int)    varPurchaseRequisition_RefID ► Purchase Requisition Reference ID                                         |
        |        ------------------------------                                                                                    |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataListJSON_PurchaseRequisitionDetail(
            $varUserSession, int $varSysBranch_RefID,
            int $varPurchaseRequisition_RefID = null,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetDataList_PurchaseRequisitionDetail_New',
                            [
                                [$varPurchaseRequisition_RefID, 'bigint' ],
                            ]
                            )
                        );
                        $resultArray = $varReturn['data'];

                        // Description: Generate API.
                        $varReturn['data'] = [];
                        $idxArray = 0;
                        foreach ($resultArray as $key => $value) {
                            $varReturn['data'][$idxArray]['sys_ID'] = $value["Sys_ID"];
                            $varReturn['data'][$idxArray]['sys_PID'] = $value["Sys_PID"];
                            $varReturn['data'][$idxArray]['sys_SID'] = $value["Sys_SID"];
                            $varReturn['data'][$idxArray]['sys_RPK'] = $value["Sys_RPK"];
                            $varReturn['data'][$idxArray]['sys_Branch_RefID'] = $value["Sys_Branch_RefID"];
                            $varReturn['data'][$idxArray]['sys_BaseCurrency_RefID'] = $value["Sys_BaseCurrency_RefID"];
                            $varReturn['data'][$idxArray]['sys_BaseCurrencyISOCode'] = $value["Sys_BaseCurrencyISOCode"];
                            $varReturn['data'][$idxArray]['sys_BaseCurrencySymbol'] = $value["Sys_BaseCurrencySymbol"];
                            $varReturn['data'][$idxArray]['combinedBudgetSectionDetail_RefID'] = $value["CombinedBudgetSectionDetail_RefID"];
                            $varReturn['data'][$idxArray]['product_RefID'] = $value["Product_RefID"];
                            $varReturn['data'][$idxArray]['productName'] = $value["ProductName"];
                            $varReturn['data'][$idxArray]['productCode'] = $value["ProductCode"];
                            $varReturn['data'][$idxArray]['quantity'] = (float) $value["Quantity"];
                            $varReturn['data'][$idxArray]['quantityUnit_RefID'] = $value["QuantityUnit_RefID"];
                            $varReturn['data'][$idxArray]['quantityUnitName'] = $value["QuantityUnitName"];
                            $varReturn['data'][$idxArray]['productUnitPriceCurrency_RefID'] = $value["ProductUnitPriceCurrency_RefID"];
                            $varReturn['data'][$idxArray]['productUnitPriceCurrencyValue'] = $value["ProductUnitPriceCurrencyValue"];
                            $varReturn['data'][$idxArray]['productUnitPriceCurrencyExchangeRate'] = $value["ProductUnitPriceCurrencyExchangeRate"];
                            $varReturn['data'][$idxArray]['productUnitPriceBaseCurrencyValue'] = $value["ProductUnitPriceBaseCurrencyValue"];
                            $varReturn['data'][$idxArray]['productUnitPriceCurrencyISOCode'] = $value["ProductUnitPriceCurrencyISOCode"];
                            $varReturn['data'][$idxArray]['productUnitPriceCurrencySymbol'] = $value["ProductUnitPriceCurrencySymbol"];
                            $varReturn['data'][$idxArray]['priceCurrency_RefID'] = $value["PriceCurrency_RefID"];
                            $varReturn['data'][$idxArray]['priceCurrencyValue'] = $value["PriceCurrencyValue"];
                            $varReturn['data'][$idxArray]['priceCurrencyExchangeRate'] = $value["PriceCurrencyExchangeRate"];
                            $varReturn['data'][$idxArray]['priceBaseCurrencyValue'] = $value["PriceBaseCurrencyValue"];
                            $varReturn['data'][$idxArray]['priceCurrencyISOCode'] = $value["PriceCurrencyISOCode"];
                            $varReturn['data'][$idxArray]['priceCurrencySymbol'] = $value["PriceCurrencySymbol"];
                            $varReturn['data'][$idxArray]['combinedBudgetCode'] = $value["CombinedBudgetCode"];
                            $varReturn['data'][$idxArray]['combinedBudgetName'] = $value["CombinedBudgetName"];
                            $varReturn['data'][$idxArray]['combinedBudget_RefID'] = $value["CombinedBudget_RefID"];
                            $varReturn['data'][$idxArray]['combinedBudgetSection_RefID'] = $value["CombinedBudgetSection_RefID"];
                            $varReturn['data'][$idxArray]['combinedBudgetSectionCode'] = $value["CombinedBudgetSectionCode"];
                            $varReturn['data'][$idxArray]['combinedBudgetSectionName'] = $value["CombinedBudgetSectionName"];
                            $varReturn['data'][$idxArray]['combinedBudget_Product_RefID'] = $value["CombinedBudget_Product_RefID"];
                            $varReturn['data'][$idxArray]['combinedBudget_Quantity'] = $value["CombinedBudget_Quantity"];
                            $varReturn['data'][$idxArray]['combinedBudget_UnitPriceBaseCurrencyValue'] = $value["CombinedBudget_UnitPriceBaseCurrencyValue"];
                            $varReturn['data'][$idxArray]['combinedBudget_PriceBaseCurrencyValue'] = $value["CombinedBudget_PriceBaseCurrencyValue"];
                            $varReturn['data'][$idxArray]['combinedBudgetSubSectionLevel1_RefID'] = $value["CombinedBudgetSubSectionLevel1_RefID"];
                            $varReturn['data'][$idxArray]['combinedBudgetSubSectionLevel1Name'] = $value["CombinedBudgetSubSectionLevel1Name"];
                            $varReturn['data'][$idxArray]['combinedBudgetSubSectionLevel2_RefID'] = $value["CombinedBudgetSubSectionLevel2_RefID"];
                            $varReturn['data'][$idxArray]['combinedBudgetSubSectionLevel2Name'] = $value["CombinedBudgetSubSectionLevel2Name"];
                            $varReturn['data'][$idxArray]['log_FileUpload_Pointer_RefID'] = $value["Log_FileUpload_Pointer_RefID"];
                            $varReturn['data'][$idxArray]['deliveryDateTimeTZ'] = $value["DeliveryDateTimeTZ"];
                            $varReturn['data'][$idxArray]['deliveryTo_RefID'] = $value["DeliveryTo_RefID"];
                            $varReturn['data'][$idxArray]['deliveryTo_NonRefID'] = $value["DeliveryTo_NonRefID"];
                            $varReturn['data'][$idxArray]['remarks'] = $value["Remarks"];
                            $varReturn['data'][$idxArray]['notes'] = $value["Notes"];
                            $varReturn['data'][$idxArray]['purchaseRequisition_RefID'] = $value["PurchaseRequisition_RefID"];
                            $varReturn['data'][$idxArray]['materialServiceRequisitionDetail_RefID'] = $value["MaterialServiceRequisitionDetail_RefID"];
                            $varReturn['data'][$idxArray]['materialServiceRequisition_RefID'] = $value["MaterialServiceRequisition_RefID"];
                            $varReturn['data'][$idxArray]['businessDocument_RefID'] = $value["BusinessDocument_RefID"];
                            $varReturn['data'][$idxArray]['documentNumber'] = $value["DocumentNumber"];
                            $varReturn['data'][$idxArray]['businessDocumentTypeName'] = $value["BusinessDocumentTypeName"];
                            $varReturn['data'][$idxArray]['date'] = $value["Date"];
                            $varReturn['data'][$idxArray]['dateUpdate'] = $value["DateUpdate"];
                            if ((($value["DeliveryTo_RefID"] / 1000000000000) % 10000) === 126) {
                                $varReturn['data'][$idxArray]['deliveryToCode'] = $value["Code_TblSupplier"];
                                $varReturn['data'][$idxArray]['deliveryToName'] = $value["Name_TblInstitutionBranch"];
                            } elseif ((($value["DeliveryTo_RefID"] / 1000000000000) % 10000) === 173) {
                                $varReturn['data'][$idxArray]['deliveryToName'] = $value["Name_TblWarehouse"];
                                $varReturn['data'][$idxArray]['deliveryToCode'] = $value["Code_TblWarehouse"];
                            } else {
                                $varReturn['data'][$idxArray]['deliveryToName'] = null;
                                $varReturn['data'][$idxArray]['deliveryToCode'] = null;
                            }
			    $varReturn['data'][$idxArray]['qtyAvail'] = round((float) $value["Quantity"] - (float) $value["Quantity_TblPurchaseOrderDetail"], 2);
			    $varReturn['data'][$idxArray]['asset'] = $value["Asset"];
                            $varReturn['data'][$idxArray]['workStructure_RefID'] = $value["WorkStructure_RefID"];
                            $varReturn['data'][$idxArray]['workCode'] = $value["WorkCode"];
                            $varReturn['data'][$idxArray]['workName'] = $value["WorkName"];
                            $varReturn['data'][$idxArray]['orderSequence'] = $value["OrderSequence"];
                            $idxArray++;
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
        | ▪ Method Name     : getDataListJSON_Transporter                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-05-14                                                                                           |
        | ▪ Creation Date   : 2025-05-14                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Transporter                                                                       |
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
        public function getDataListJSON_Transporter(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetDataListJSON_Transporter',
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
                        $varReturn['data'][0]['Func_GetDataListJSON_Transporter']
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
        | ▪ Method Name     : getDataPickList_DeliveryDestination                                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-04-12                                                                                           |
        | ▪ Creation Date   : 2022-04-12                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Tujuan Pengiriman                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_DeliveryDestination(
            $varUserSession, int $varSysBranch_RefID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetDataPickList_DeliveryDestination',
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
        | ▪ Method Name     : getDataPickList_DeliveryDestinationType                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-04-12                                                                                           |
        | ▪ Creation Date   : 2022-04-12                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Jenis Tujuan Pengiriman                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_DeliveryDestinationType(
            $varUserSession, int $varSysBranch_RefID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetDataPickList_DeliveryDestinationType',
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
        | ▪ Method Name     : getDataPickList_DeliveryOrder_AllVersion                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2024-10-17                                                                                           |
        | ▪ Creation Date   : 2022-03-10                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Pesanan Pengiriman (Delivery Order) Semua Versi                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_DeliveryOrder_AllVersion(
            $varUserSession, int $varSysBranch_RefID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetDataPickList_DeliveryOrder',
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
        | ▪ Method Name     : getDataPickList_DeliveryOrder_LatestVersion                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2024-10-17                                                                                           |
        | ▪ Creation Date   : 2022-03-10                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Pesanan Pengiriman (Delivery Order) Versi Terakhir                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_DeliveryOrder_LatestVersion(
            $varUserSession, int $varSysBranch_RefID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetDataPickList_DeliveryOrder_New',
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
        | ▪ Method Name     : getDataPickList_MaterialServiceRequisition_AllVersion                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2024-10-16                                                                                           |
        | ▪ Creation Date   : 2024-08-13                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Permintaan Material dan Service (Material Service Requsition) Semua  |
        |                     Versi                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_MaterialServiceRequisition_AllVersion(
            $varUserSession, int $varSysBranch_RefID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetDataPickList_MaterialServiceRequisition',
                            [
                                [$varSysBranch_RefID, 'bigint' ],

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
        | ▪ Method Name     : getDataPickList_MaterialServiceRequisition_LatestVersion                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2024-10-16                                                                                           |
        | ▪ Creation Date   : 2024-08-13                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Permintaan Material dan Service (Material Service Requsition) Versi  |
        |                     Terakhir                                                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_MaterialServiceRequisition_LatestVersion(
            $varUserSession, int $varSysBranch_RefID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetDataPickList_MaterialServiceRequisition',
                            [
                                [$varSysBranch_RefID, 'bigint' ],

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
        | ▪ Method Name     : getDataPickList_OrderPicking_AllVersion                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-10-16                                                                                           |
        | ▪ Creation Date   : 2024-10-16                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Pengambilan Barang Pesanan (Order Picking) Semua Versi               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_OrderPicking_AllVersion(
            $varUserSession, int $varSysBranch_RefID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetDataPickList_OrderPicking',
                            [
                                [$varSysBranch_RefID, 'bigint' ],

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
        | ▪ Method Name     : getDataPickList_OrderPicking_LatestVersion                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-10-16                                                                                           |
        | ▪ Creation Date   : 2024-10-16                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Pengambilan Barang Pesanan (Order Picking) Versi Terakhir            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_OrderPicking_LatestVersion(
            $varUserSession, int $varSysBranch_RefID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetDataPickList_OrderPicking',
                            [
                                [$varSysBranch_RefID, 'bigint' ],

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
        | ▪ Method Name     : getDataPickList_OrderPickingRequisition_AllVersion                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-10-16                                                                                           |
        | ▪ Creation Date   : 2024-10-16                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Pengambilan Barang Pesanan (Order Picking Requisition) Semua Versi   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_OrderPickingRequisition_AllVersion(
            $varUserSession, int $varSysBranch_RefID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetDataPickList_OrderPickingRequisition',
                            [
                                [$varSysBranch_RefID, 'bigint' ],

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
        | ▪ Method Name     : getDataPickList_OrderPicking_LatestVersion                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-10-16                                                                                           |
        | ▪ Creation Date   : 2024-10-16                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Pengambilan Barang Pesanan (Order Picking Requisition) Versi         |
        |                     Terakhir                                                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_OrderPickingRequisition_LatestVersion(
            $varUserSession, int $varSysBranch_RefID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetDataPickList_OrderPickingRequisition',
                            [
                                [$varSysBranch_RefID, 'bigint' ],

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
        | ▪ Method Name     : getDataPickList_PurchaseOrder_AllVersion                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2024-10-16                                                                                           |
        | ▪ Creation Date   : 2022-03-07                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Pesanan Pembelian (Purchase Order) Semua Versi                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_PurchaseOrder_AllVersion(
            $varUserSession, int $varSysBranch_RefID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetDataPickList_PurchaseOrder',
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
        | ▪ Method Name     : getDataPickList_PurchaseOrder_LatestVersion                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2025-07-22                                                                                           |
        | ▪ Creation Date   : 2022-03-07                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Pesanan Pembelian (Purchase Order) Versi Terakhir                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_PurchaseOrder_LatestVersion(
            $varUserSession, int $varSysBranch_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetDataPickList_PurchaseOrder_New',
                            [
                                [$varSysBranch_RefID, 'bigint'],

                                [$varPickStatement, 'varchar'],
                                [$varSortStatement, 'varchar'],
                                [$varFilterStatement, 'varchar'],
                                [$varPagingStatement, 'varchar']
                            ]
                            )
                        );
                $varReturn['totalRecords'] = $varReturn['data'][0]['TotalRecords'];

                return
                    $varReturn;
                }

            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataPickList_PurchaseOrderAdditionalCostType                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-04-18                                                                                           |
        | ▪ Creation Date   : 2022-04-18                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Jenis Biaya Tambahan Pesanan Pembelian (PO)                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_PurchaseOrderAdditionalCostType(
            $varUserSession, int $varSysBranch_RefID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetDataPickList_PurchaseOrderAdditionalCostType',
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
        | ▪ Method Name     : getDataPickList_PurchaseRequisition_AllVersion                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2024-10-16                                                                                           |
        | ▪ Creation Date   : 2022-03-07                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Permintaan Pembelian (Purchase Requisition) Semua Versi              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_PurchaseRequisition_AllVersion(
            $varUserSession, int $varSysBranch_RefID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetDataPickList_PurchaseRequisition',
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
        | ▪ Method Name     : getDataPickList_PurchaseRequisition_LatestVersion                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2025-06-12                                                                                           |
        | ▪ Creation Date   : 2022-03-07                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Permintaan Pembelian (Purchase Requisition) Versi Terakhir           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_PurchaseRequisition_LatestVersion(
            $varUserSession, int $varSysBranch_RefID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetDataPickList_PurchaseRequisitionNew',
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
        | ▪ Method Name     : getDataPickList_Supplier                                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-10-12                                                                                           |
        | ▪ Creation Date   : 2022-10-12                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Pemasok                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_Supplier(
            $varUserSession, int $varSysBranch_RefID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetDataPickList_Supplier',
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
        | ▪ Method Name     : getDataPickList_Warehouse                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-03-02                                                                                           |
        | ▪ Creation Date   : 2022-03-02                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Gudang                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_Warehouse(
            $varUserSession, int $varSysBranch_RefID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetDataPickList_Warehouse',
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
        | ▪ Method Name     : getDataPickList_WarehouseInboundOrder                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-11-19                                                                                           |
        | ▪ Creation Date   : 2025-06-04                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Gudang                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_WarehouseInboundOrder(
            $varUserSession, int $varSysBranch_RefID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetDataPickList_WarehouseInboundOrder_New',
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
        | ▪ Method Name     : getDataPickList_WarehouseOutboundOrder                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-10-03                                                                                           |
        | ▪ Creation Date   : 2025-10-03                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Gudang                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_WarehouseOutboundOrder(
            $varUserSession, int $varSysBranch_RefID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetDataList_WarehouseOutboundOrder_New',
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
        | ▪ Method Name     : getDataPickList_Transporter                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-05-14                                                                                           |
        | ▪ Creation Date   : 2025-05-14                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Transporter                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_Transporter(
            $varUserSession, int $varSysBranch_RefID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetDataPickList_Transporter',
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
        | ▪ Method Name     : getDataPickList_WarehouseInboundOrder_AllVersion                                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2024-10-24                                                                                           |
        | ▪ Creation Date   : 2022-03-08                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Penerimaan Barang Gudang (Warehouse Inbound Order) Semua Versi       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_WarehouseInboundOrder_AllVersion(
            $varUserSession, int $varSysBranch_RefID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetDataPickList_WarehouseInboundOrder',
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
        | ▪ Method Name     : getDataPickList_WarehouseInboundOrder_LatestVersion                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2024-10-24                                                                                           |
        | ▪ Creation Date   : 2022-03-08                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Penerimaan Barang Gudang (Warehouse Inbound Order) Versi Terakhir    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_WarehouseInboundOrder_LatestVersion(
            $varUserSession, int $varSysBranch_RefID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetDataPickList_WarehouseInboundOrder',
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
        | ▪ Method Name     : getDataPickList_WarehouseOutboundOrder_AllVersion                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2024-10-24                                                                                           |
        | ▪ Creation Date   : 2022-03-08                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Pengeluaran Barang Gudang (Warehouse Outbound Order) Semua Versi     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_WarehouseOutboundOrder_AllVersion(
            $varUserSession, int $varSysBranch_RefID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetDataPickList_WarehouseOutboundOrder',
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
        | ▪ Method Name     : getDataPickList_WarehouseOutboundOrder_LatestVersion                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2024-10-24                                                                                           |
        | ▪ Creation Date   : 2022-03-08                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Pengeluaran Barang Gudang (Warehouse Outbound Order) Versi Terakhir  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_WarehouseOutboundOrder_LatestVersion(
            $varUserSession, int $varSysBranch_RefID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetDataPickList_WarehouseOutboundOrder',
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
        | ▪ Method Name     : getDataPickList_WarehouseType                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-03-02                                                                                           |
        | ▪ Creation Date   : 2022-03-02                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Jenis Gudang                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_WarehouseType(
            $varUserSession, int $varSysBranch_RefID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetDataPickList_WarehouseType',
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
        | ▪ Method Name     : getDataPickListJSON_Transporter                                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-05-14                                                                                           |
        | ▪ Creation Date   : 2025-05-14                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Data Transporter                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickListJSON_Transporter(
            $varUserSession, int $varSysBranch_RefID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetDataPickListJSON_Transporter',
                            [
                                [$varSysBranch_RefID, 'bigint']
                            ]
                            )
                        );

                $varReturn['data'] =
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        $varReturn['data'][0]['Func_GetDataPickListJSON_Transporter']
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
        | ▪ Method Name     : getReport_Form_DocumentForm_PurchaseOrder                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-04-08                                                                                           |
        | ▪ Creation Date   : 2022-04-08                                                                                           |
        | ▪ Description     : Mendapatkan Laporan Form - Form Dokumen Pesanan Pembelian (Purchase Order)                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ▪ (int)    varSysID ► Record ID                                                                                     |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getReport_Form_DocumentForm_PurchaseOrder(
            $varUserSession, int $varSysBranch_RefID,
            int $varSysID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetReport_DocForm_PurchaseOrder',
                            [
                                [$varSysBranch_RefID, 'bigint' ],
                                [$varSysID, 'bigint' ]
                            ]
                            )
                        );

                return [
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        $varReturn['data'][0]['Func_GetReport_DocForm_PurchaseOrder'])
                    ];
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getReport_Form_DocumentForm_PurchaseOrderAdditionalCost                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-05-19                                                                                           |
        | ▪ Creation Date   : 2023-05-19                                                                                           |
        | ▪ Description     : Mendapatkan Laporan Form - Form Dokumen Biaya Tambahan Pesanan Pembelian (Purchase Order Additional  |
        |                     Cost)                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ▪ (int)    varSysID ► Record ID                                                                                     |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getReport_Form_DocumentForm_PurchaseOrderAdditionalCost(
            $varUserSession, int $varSysBranch_RefID,
            int $varSysID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetReport_DocForm_PurchaseOrderAdditionalCost',
                            [
                                [$varSysBranch_RefID, 'bigint' ],
                                [$varSysID, 'bigint' ]
                            ]
                            )
                        );

                return [
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        $varReturn['data'][0]['Func_GetReport_DocForm_PurchaseOrderAdditionalCost'])
                    ];
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getReport_Form_DocumentForm_PurchaseOrderPaymentTerm                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-05-19                                                                                           |
        | ▪ Creation Date   : 2023-05-19                                                                                           |
        | ▪ Description     : Mendapatkan Laporan Form - Form Dokumen Ketentuan Pembayaran Pesanan Pembelian (Purchase Order       |
        |                     Payment Term)                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ▪ (int)    varSysID ► Record ID                                                                                     |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getReport_Form_DocumentForm_PurchaseOrderPaymentTerm(
            $varUserSession, int $varSysBranch_RefID,
            int $varSysID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetReport_DocForm_PurchaseOrderPaymentTerm',
                            [
                                [$varSysBranch_RefID, 'bigint' ],
                                [$varSysID, 'bigint' ]
                            ]
                            )
                        );

                return [
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        $varReturn['data'][0]['Func_GetReport_DocForm_PurchaseOrderPaymentTerm'])
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
        | ▪ Last Update     : 2022-04-08                                                                                           |
        | ▪ Creation Date   : 2022-04-08                                                                                           |
        | ▪ Description     : Mendapatkan Laporan Form - Form Dokumen Permintaan Pembelian (Purchase Requisition)                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ▪ (int)    varSysID ► Record ID                                                                                     |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getReport_Form_DocumentForm_PurchaseRequisition(
            $varUserSession, int $varSysBranch_RefID,
            int $varSysID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetReport_DocForm_PurchaseRequisition',
                            [
                                [$varSysBranch_RefID, 'bigint' ],
                                [$varSysID, 'bigint' ]
                            ]
                            )
                        );

                return [
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        $varReturn['data'][0]['Func_GetReport_DocForm_PurchaseRequisition'])
                    ];
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getReport_Form_DocumentForm_PurchaseRequisitionSummary                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-12-26                                                                                           |
        | ▪ Creation Date   : 2025-04-30                                                                                           |
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
        public function getReport_Form_DocumentForm_PurchaseRequisitionSummary(
            $varUserSession, int $varSysBranch_RefID, string  $varCombinedBudgetCode = null, string $varCombinedBudgetSectionCode = null, string  $varStartDate = null, string  $varEndDate = null
            )
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetReport_DocForm_PurchaseRequisitionSummary',
                            [
                                [$varCombinedBudgetCode, 'varchar' ],
                                [$varCombinedBudgetSectionCode, 'varchar' ],
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
        | ▪ Method Name     : getReport_Form_DocumentForm_PurchaseOrderSummary                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-07-10                                                                                           |
        | ▪ Creation Date   : 2025-07-10                                                                                           |
        | ▪ Description     : Mendapatkan Laporan Form - Form Dokumen PurchaseOrder                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ▪ (string)    varCombinedBudgetCode ► Combined Budget Code                                                          |
        |      ▪ (string)    varCombinedBudgetSectionCode ► Combined Budget Section Code                                           |
        |      ▪ (int)    varSupplier_RefID ► Supplier ID                                                                        |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getReport_Form_DocumentForm_PurchaseOrderSummary(
            $varUserSession, int $varSysBranch_RefID, string  $varCombinedBudgetCode = null, string $varCombinedBudgetSectionCode = null, int $varSupplier_RefID = null
            )
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetReport_DocForm_PurchaseOrderSummary',
                            [
                                [$varCombinedBudgetCode, 'varchar' ],
                                [$varCombinedBudgetSectionCode, 'varchar' ],
                                [$varSupplier_RefID, 'bigint' ],
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
        | ▪ Method Name     : getReport_Form_DocumentForm_PurchaseOrderToPaymentInstructionSummary                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2026-03-31                                                                                           |
        | ▪ Creation Date   : 2026-03-27                                                                                           |
        | ▪ Description     : Mendapatkan Laporan Form - Form Dokumen Purchase Order To Payment Instruction Summary                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ▪ (string)    varCombinedBudgetCode ► Combined Budget Code                                                          |
        |      ▪ (string)    varCombinedBudgetSectionCode ► Combined Budget Section Code                                           |
        |      ▪ (int)    varRequesterWorkerJobsPosition_RefID ► RequesterWorkerJobsPosition_RefID                                 |
        |      ▪ (int)    varBeneficiaryWorkerJobsPosition_RefID ► BeneficiaryWorkerJobsPosition_RefID                             |
        |      ▪ (int)    varStartDate ► StartDate                                                                                 |
        |      ▪ (int)    varEndDate ► EndDate                                                                                     |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getReport_Form_DocumentForm_PurchaseOrderToPaymentInstructionSummary(
            $varUserSession, int $varSysBranch_RefID, string  $varCombinedBudgetCode = null, string $varCombinedBudgetSectionCode = null, int $varSupplier_RefID = null, int $varPurchaseOrder_RefID = null, int $varAccountPayable_RefID = null, string  $varStartDate = null, string  $varEndDate = null,
            )
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetReport_DocForm_PurchaseOrderToPISummary',
                            [
                                [$varCombinedBudgetCode, 'varchar' ],
                                [$varCombinedBudgetSectionCode, 'varchar' ],
                                [$varSupplier_RefID, 'bigint' ],
                                [$varPurchaseOrder_RefID, 'bigint' ],
                                [$varAccountPayable_RefID, 'bigint' ],
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
        | ▪ Method Name     : getReport_Form_DocumentForm_PurchaseRequisitionToPurchaseOrderSummary                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-07-21                                                                                           |
        | ▪ Creation Date   : 2025-07-21                                                                                           |
        | ▪ Description     : Mendapatkan Laporan Form - Form Dokumen PurchaseOrder                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ▪ (string)    varCombinedBudgetCode ► Combined Budget Code                                                          |
        |      ▪ (string)    varCombinedBudgetSectionCode ► Combined Budget Section Code                                           |
        |      ▪ (int)    varSupplier_RefID ► Supplier ID                                                                        |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getReport_Form_DocumentForm_PurchaseRequisitionToPurchaseOrderSummary(
            $varUserSession, int $varSysBranch_RefID, string  $varCombinedBudgetCode = null, string $varCombinedBudgetSectionCode = null, int $varSupplier_RefID = null
            )
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetReport_DocForm_PR_To_PO_Summary',
                            [
                                [$varCombinedBudgetCode, 'varchar' ],
                                [$varCombinedBudgetSectionCode, 'varchar' ],
                                [$varSupplier_RefID, 'bigint' ],
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
        | ▪ Method Name     : getReport_Form_DocumentForm_DeliveryOrderSummary                                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2026-02-12                                                                                           |
        | ▪ Creation Date   : 2025-07-08                                                                                           |
        | ▪ Description     : Mendapatkan Laporan Form - Form Dokumen DeliveryOrder                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ▪ (string)    varCombinedBudgetCode ► Combined Budget Code                                                          |
        |      ▪ (string)    varCombinedBudgetSectionCode ► Combined Budget Section Code                                           |
        |      ▪ (int)    varWarehouse_RefID ► Warehouse ID                                                                        |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getReport_Form_DocumentForm_DeliveryOrderSummary(
            $varUserSession, int $varSysBranch_RefID, string  $varCombinedBudgetCode = null, string $varCombinedBudgetSectionCode = null, int $varWarehouse_RefID = null, string  $varStartDate = null, string  $varEndDate = null
            )
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetReport_DocForm_DeliveryOrderSummary',
                            [
                                [$varCombinedBudgetCode, 'varchar' ],
                                [$varCombinedBudgetSectionCode, 'varchar' ],
                                [$varWarehouse_RefID, 'bigint' ],
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
        | ▪ Method Name     : getReport_Form_DocumentForm_DeliveryOrderToWarehouseInboundOrderSummary                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-08-05                                                                                           |
        | ▪ Creation Date   : 2025-08-05                                                                                           |
        | ▪ Description     : Mendapatkan Laporan Form - Form Dokumen Delivery Order To Warehouse Inbound Order                    |
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
        public function getReport_Form_DocumentForm_DeliveryOrderToWarehouseInboundOrderSummary(
            $varUserSession, int $varSysBranch_RefID, string  $varCombinedBudgetCode = null, string $varCombinedBudgetSectionCode = null
            )
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetReport_DocForm_DeliveryOrderToWarehouseInboundOrder',
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
        | ▪ Method Name     : getReport_Form_DocumentForm_WarehouseInboundOrderSummary                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2026-02-13                                                                                           |
        | ▪ Creation Date   : 2025-08-01                                                                                           |
        | ▪ Description     : Mendapatkan Laporan Form - Form Dokumen PurchaseOrder                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ▪ (string)    varCombinedBudgetCode ► Combined Budget Code                                                          |
        |      ▪ (int)    varDeliveryFrom_RefID ► Delivery From RefID                                                              |
        |      ▪ (int)    varDeliveryTo_RefID ► Delivery To RefID                                                                  |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getReport_Form_DocumentForm_WarehouseInboundOrderSummary(
            $varUserSession, int $varSysBranch_RefID, string  $varCombinedBudgetCode = null, int $varDeliveryFrom_RefID = null, int $varDeliveryTo_RefID = null, string  $varStartDate = null, string  $varEndDate = null
            )
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetReport_DocForm_WarehouseInboundOrderSummary',
                            [
                                [$varCombinedBudgetCode, 'varchar' ],
                                [$varDeliveryFrom_RefID, 'bigint' ],
                                [$varDeliveryTo_RefID, 'bigint' ],
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
        | ▪ Method Name     : getReport_Form_DocumentForm_WarehouseInboundOrder                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-04-08                                                                                           |
        | ▪ Creation Date   : 2022-04-08                                                                                           |
        | ▪ Description     : Mendapatkan Laporan Form - Form Dokumen Perintah Penerimaan Barang Gudang (Warehouse Inbound Order)  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ▪ (int)    varSysID ► Record ID                                                                                     |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getReport_Form_DocumentForm_WarehouseInboundOrder(
            $varUserSession, int $varSysBranch_RefID,
            int $varSysID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetReport_DocForm_WarehouseInboundOrder',
                            [
                                [$varSysBranch_RefID, 'bigint' ],
                                [$varSysID, 'bigint' ]
                            ]
                            )
                        );

                return [
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        $varReturn['data'][0]['Func_GetReport_DocForm_WarehouseInboundOrder'])
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
        | ▪ Last Update     : 2022-04-08                                                                                           |
        | ▪ Creation Date   : 2022-04-08                                                                                           |
        | ▪ Description     : Mendapatkan Laporan Form - Form Dokumen Perintah Pengeluaran Barang Gudang (Warehouse Outbound       |
        |                     Order)                                                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ▪ (int)    varSysID ► Record ID                                                                                     |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getReport_Form_DocumentForm_WarehouseOutboundOrder(
            $varUserSession, int $varSysBranch_RefID,
            int $varSysID)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetReport_DocForm_WarehouseOutboundOrder',
                            [
                                [$varSysBranch_RefID, 'bigint' ],
                                [$varSysID, 'bigint' ]
                            ]
                            )
                        );

                return [
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        $varReturn['data'][0]['Func_GetReport_DocForm_WarehouseOutboundOrder'])
                    ];
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getReport_Form_Resume_PurchaseOrderProductPriceHistory                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-08-25                                                                                           |
        | ▪ Creation Date   : 2023-08-25                                                                                           |
        | ▪ Description     : Mendapatkan Laporan Form - Riwayat Harga Produk Perintah Pembelian                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ▪ (int)    varSysID ► Record ID                                                                                     |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getReport_Form_Resume_PurchaseOrderProductPriceHistory(
            $varUserSession, int $varSysBranch_RefID,
            int $varSysID,
            string $varBusinessDocumentNumber = null, int $varBusinessDocumentType_RefID = null, int $varCombinedBudget_RefID = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetReport_Resume_PurchaseOrderProductPriceHistory',
                            [
                                [$varSysBranch_RefID, 'bigint'],
                                [$varSysID, 'bigint'],

                                [$varBusinessDocumentNumber, 'varchar'],
                                [$varBusinessDocumentType_RefID, 'bigint'],
                                [$varCombinedBudget_RefID, 'bigint']
                            ]
                            )
                        );

                return [
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        $varReturn['data'][0]['Func_GetReport_Resume_PurchaseOrderProductPriceHistory'])
                    ];
                }
            catch (\Exception $ex) {
                return [];
                }
            }

        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getReport_Form_Resume_PurchaseRequisitonToPurchaseOrder                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-07-04                                                                                           |
        | ▪ Creation Date   : 2025-07-04                                                                                           |
        | ▪ Description     : Mendapatkan Laporan Form - Purcase Requsition To Purchase Order                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |        ------------------------------                                                                                    |
        |        ------------------------------                                                                                    |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |        ------------------------------                                                                                    |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getReport_Form_Resume_PurchaseRequisitonToPurchaseOrder(
            $varUserSession, int $varSysBranch_RefID,
            int $varCombinedBudget_RefID = null, int $varCombinedBudgetSection_RefID = null,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetReport_Resume_PurchaseRequisitionToPurchaseOrder',
                            [
                                [$varSysBranch_RefID, 'bigint'],

                                [$varCombinedBudget_RefID, 'bigint'],
                                [$varCombinedBudgetSection_RefID, 'bigint'],

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
        | ▪ Method Name     : getReport_Form_ResumeJSON_PurchaseRequisitonToPurchaseOrder                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-07-04                                                                                           |
        | ▪ Creation Date   : 2025-07-04                                                                                           |
        | ▪ Description     : Mendapatkan Laporan Form - Purcase Requsition To Purchase Order                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |        ------------------------------                                                                                    |
        |        ------------------------------                                                                                    |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |      ▪ (int)    varSysBranch_RefID ► Branch ID                                                                           |
        |        ------------------------------                                                                                    |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getReport_Form_ResumeJSON_PurchaseRequisitonToPurchaseOrder(
            $varUserSession, int $varSysBranch_RefID,
            int $varCombinedBudget_RefID = null, int $varCombinedBudgetSection_RefID = null,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-SupplyChain.Func_GetReport_ResumeJSON_PurchaseRequisitionToPurchaseOrder',
                            [
                                [$varSysBranch_RefID, 'bigint'],

                                [$varCombinedBudget_RefID, 'bigint'],
                                [$varCombinedBudgetSection_RefID, 'bigint'],

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
                        $varReturn['data'][0]['Func_GetReport_ResumeJSON_PurchaseRequisitionToPurchaseOrder']
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
