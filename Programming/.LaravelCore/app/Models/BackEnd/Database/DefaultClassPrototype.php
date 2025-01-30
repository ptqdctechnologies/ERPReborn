<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Models                                                                                                    |
| ▪ Name Space : \App\Models\Database                                                                                              |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2020 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Models\Database
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : DefaultClassPrototype                                                                                        |
    | ▪ Description : Menangani Prototype untuk diwariskan ke Class Models Database                                                |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class DefaultClassPrototype //extends \Illuminate\Database\Eloquent\Model
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | Class Properties                                                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        private $varSchemaTableName;


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-09-02                                                                                           |
        | ▪ Creation Date   : 2020-09-02                                                                                           |
        | ▪ Description     : System's Default Constructor                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varFullClassName ► Full Class Name (Include NameSpace)                                                   |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        function __construct($varFullClassName)
            {
            $varTemp = explode('\\', $varFullClassName);
            $this->varSchemaTableName = '"'.str_replace('_', '-', $varTemp[count($varTemp)-2]).'"."'.$varTemp[count($varTemp)-1].'"';
            }

            
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getAllDataRecord                                                                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-09-07                                                                                           |
        | ▪ Creation Date   : 2020-09-07                                                                                           |
        | ▪ Description     : Get all Data Record                                                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (bool)   varStatusAuthenticatedDataOnly ► Status Authenticated Data Only                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getAllDataRecord($varUserSession, bool $varStatusAuthenticatedDataOnly = null)
            {
            $varReturn = 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecutionDataFetch_DataOnly_All(
                    $varUserSession,
                    str_replace('"', '', (explode('.', $this->varSchemaTableName))[0]), 
                    str_replace('"', '', (explode('.', $this->varSchemaTableName))[1]), 
                    $varStatusAuthenticatedDataOnly
                    );

            return $varReturn['data'];
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getFilteredDataRecord                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-10-05                                                                                           |
        | ▪ Creation Date   : 2020-10-05                                                                                           |
        | ▪ Description     : Get Filtered Data Record                                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varFilterCondition ► Filter Condition                                                                    |
        |      ▪ (bool)   varStatusAuthenticatedDataOnly ► Status Authenticated Data Only                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getAllFilteredDataRecord($varUserSession, string $varFilter = null, bool $varStatusAuthenticatedDataOnly = null)
            {
            $varReturn = 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecutionDataFetch_DataOnly_Filtered(
                    $varUserSession,
                    str_replace('"', '', (explode('.', $this->varSchemaTableName))[0]),
                    str_replace('"', '', (explode('.', $this->varSchemaTableName))[1]),
                    $varFilter,
                    $varStatusAuthenticatedDataOnly
                    );

            return $varReturn['data'];
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataEntities                                                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2022-11-21                                                                                           |
        | ▪ Creation Date   : 2022-06-13                                                                                           |
        | ▪ Description     : Get Data Entities                                                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varIDSet ► ID Set                                                                                        |
        |      ▪ (int)    varBranchID ► ID Branch (Optional)                                                                       |
        |      ▪ (string) varFunctionOverideName ► Function Overide Name (Optional)                                                |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataEntities($varUserSession, 
            string $varIDSet, 
            int $varBranchID = null, string $varFunctionOverideName = null)
            {
            if ($varFunctionOverideName)
                {
                $varFunctionName = $varFunctionOverideName;
                }
            else
                {
                $varFunctionName = 
                    ('Func_GetDataEntities_'.str_replace('_Tbl', '', '_'.self::getTableName($varUserSession)));
                }

            $varTemp =
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        self::getSchemaName($varUserSession).'.'.$varFunctionName,
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
                        $varTemp['data'][$i][$varFunctionName]
                        );
                }

            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataRecord                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000002                                                                                       |
        | ▪ Last Update     : 2021-07-06                                                                                           |
        | ▪ Creation Date   : 2021-07-06                                                                                           |
        | ▪ Description     : Get Data Record specific by RecordID (varRecordID)                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varRecordID ► Record ID                                                                                  |
        |      ▪ (int)    varBranchID ► Branch ID                                                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataRecord($varUserSession, int $varRecordID, int $varBranchID = null)
            {
            /*
            $varReturn = \App\Helpers\ZhtHelper\General\Helper_Encode::getHTMLEncode(
                $varUserSession,
                (\App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecutionDataFetch_DataOnly_Specific($varUserSession, $varRecordID))['data']
                );
            */
            try
                {
                $varReturn = 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecutionDataFetch_DataOnly_SpecificWithFacade(
                        $varUserSession, 
                        $varRecordID
                        );
                return $varReturn['data'];
                } 
            catch (\Exception $ex) {
                $varReturn = 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecutionDataFetch_DataOnly_Specific(
                        $varUserSession,
                        $varRecordID
                        );
                return $varReturn['data'];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getSchemaTableName                                                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-09-02                                                                                           |
        | ▪ Creation Date   : 2020-09-02                                                                                           |
        | ▪ Description     : Mendapatkan Nama Skema dan Table                                                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getSchemaTableName($varUserSession)
            {
            $varReturn = $this->varSchemaTableName;
            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getSchemaName                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-09-02                                                                                           |
        | ▪ Creation Date   : 2020-09-02                                                                                           |
        | ▪ Description     : Mendapatkan Nama Skema                                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getSchemaName($varUserSession)
            {
            $varReturn = str_replace('"', '', (explode('.', $this->varSchemaTableName))[0]);
            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getSchemaTableSynchronizeName                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-02-18                                                                                           |
        | ▪ Creation Date   : 2021-02-18                                                                                           |
        | ▪ Description     : Mendapatkan Nama Skema dan Table Synchronize                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getSchemaTableSynchronizeName($varUserSession)
            {
            $varReturn = 
                'SchSysConfig-Synchronize.Func_'.
                str_replace('-', '_', str_replace('SchData-', '', $this->getSchemaName($varUserSession))).
                str_replace('_Tbl', '_', '_'.$this->getTableName($varUserSession));

            return $varReturn;
            }

        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getTableName                                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-09-02                                                                                           |
        | ▪ Creation Date   : 2020-09-02                                                                                           |
        | ▪ Description     : Mendapatkan Nama Table                                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getTableName($varUserSession)
            {
            $varReturn = str_replace('"', '', (explode('.', $this->varSchemaTableName))[1]);
            return $varReturn;
            }

            
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : isRecordDeleted                                                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-09-02                                                                                           |
        | ▪ Creation Date   : 2024-09-02                                                                                           |
        | ▪ Description     : Check Record Deletion                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varRecordID ► Record ID                                                                                  |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function isRecordDeleted($varUserSession, int $varRecordID)
            {
            $varReturn =
                (new \App\Models\Database\SchSysAsset\General())->isRecordDeleted(
                    $varUserSession,
                    $varRecordID
                    );

            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : isRecordIDExist                                                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-09-02                                                                                           |
        | ▪ Creation Date   : 2024-09-02                                                                                           |
        | ▪ Description     : Check ID Existantion                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varRecordID ► Record ID                                                                                  |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function isRecordIDExist($varUserSession, int $varRecordID)
            {
            $varReturn =
                (new \App\Models\Database\SchSysAsset\General())->isExist_RecordID(
                    $varUserSession,
                    $varRecordID
                    );

            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setDataAuthentication                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-09-15                                                                                           |
        | ▪ Creation Date   : 2020-09-15                                                                                           |
        | ▪ Description     : Data Authentication                                                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varRecordID ► Record ID                                                                                  |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataAuthentication($varUserSession, int $varRecordID)
            {
            $varReturn =
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchSysConfig.FuncSys_General_SetRecordAuthentication',
                        [
                            [$varUserSession, 'bigint'],
                            [$varRecordID, 'bigint']
                        ]
                        )
                    );

            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setDataDelete                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0001.0000000                                                                                       |
        | ▪ Last Update     : 2020-11-10                                                                                           |
        | ▪ Creation Date   : 2020-11-10                                                                                           |
        | ▪ Description     : Data Delete                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varRecordID ► Record ID                                                                                  |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataDelete($varUserSession, int $varRecordID)
            {
            $varReturn =
                (new \App\Models\Database\SchSysConfig\General())->setDataDelete(
                    $varUserSession,
                    $varRecordID
                    );

            return
                $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setDataDeleteByRPK                                                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0001.0000000                                                                                       |
        | ▪ Last Update     : 2022-07-29                                                                                           |
        | ▪ Creation Date   : 2022-07-29                                                                                           |
        | ▪ Description     : Data Delete By RPK                                                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varRecordPK ► Record Primary Key                                                                         |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataDeleteByRPK($varUserSession, $varSchemaName, $varTableName, $varRecordPK)
            {
            $varReturn = 
                (new \App\Models\Database\SchSysConfig\General())->setDataDeleteByRPK(
                    $varUserSession, 
                    $varSchemaName,
                    $varTableName,
                    //$this->getSchemaName($varUserSession),
                    //$this->getTableName($varUserSession),
                    $varRecordPK
                    );

            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setDataHide                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0001.0000000                                                                                       |
        | ▪ Last Update     : 2022-03-08                                                                                           |
        | ▪ Creation Date   : 2022-03-08                                                                                           |
        | ▪ Description     : Data Hide                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varRecordID ► Record ID                                                                                  |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataHide($varUserSession, int $varRecordID)
            {
            $varReturn = 
                (new \App\Models\Database\SchSysConfig\General())->setDataHide(
                    $varUserSession,
                    $varRecordID
                    );

            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setEmptyTableAndResetSequence                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-09-11                                                                                           |
        | ▪ Creation Date   : 2020-09-11                                                                                           |
        | ▪ Description     : Menghapus seluruh record data dan mengeset ulang sequence                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setEmptyTableAndResetSequence($varUserSession)
            {
            \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                $varUserSession, 
                "SELECT * FROM \"SchSysConfig\".\"FuncSys_General_SetEmptyTableAndResetSequence\"(
                    '".$this->getSchemaName($varUserSession)."', 
                    '".$this->getTableName($varUserSession)."'
                    )"
                );
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : unsetDataAuthentication                                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-09-15                                                                                           |
        | ▪ Creation Date   : 2020-09-15                                                                                           |
        | ▪ Description     : Data Unauthentication                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varRecordID ► Record ID                                                                                  |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function unsetDataAuthentication($varUserSession, int $varRecordID)
            {
            $varReturn =
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchSysConfig.FuncSys_General_UnsetRecordAuthentication',
                        [
                            [$varUserSession, 'bigint'],
                            [$varRecordID, 'bigint']
                        ]
                        )
                    );

            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : unsetDataDelete                                                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000002                                                                                       |
        | ▪ Last Update     : 2020-09-15                                                                                           |
        | ▪ Creation Date   : 2020-09-15                                                                                           |
        | ▪ Description     : Data Undelete                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varRecordID ► Record ID                                                                                  |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function unsetDataDelete($varUserSession, int $varRecordID)
            {
            $varReturn =
                (new \App\Models\Database\SchSysConfig\General())->unsetDataDelete(
                    $varUserSession, 
                    $varRecordID
                    );

            return
                $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : unsetDataDeleteByRPK                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0001.0000000                                                                                       |
        | ▪ Last Update     : 2022-07-29                                                                                           |
        | ▪ Creation Date   : 2022-07-29                                                                                           |
        | ▪ Description     : Data Delete By RPK                                                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varSchemaName ► Schema Name                                                                              |
        |      ▪ (string) varTableName ► Table Name                                                                                |
        |      ▪ (int)    varRecordPK ► Record Primary Key                                                                         |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function unsetDataDeleteByRPK($varUserSession, string $varSchemaName, string $varTableName, int $varRecordPK)
            {
            $varReturn =
                (new \App\Models\Database\SchSysConfig\General())->unsetDataDeleteByRPK(
                    $varUserSession,
                    $varSchemaName,
                    $varTableName,
                    $varRecordPK
                    );

            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : unsetDataHide                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0001.0000000                                                                                       |
        | ▪ Last Update     : 2022-03-08                                                                                           |
        | ▪ Creation Date   : 2020-03-08                                                                                           |
        | ▪ Description     : Data Show                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varRecordID ► Record ID                                                                                  |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function unsetDataHide($varUserSession, int $varRecordID)
            {
            $varReturn = 
                (new \App\Models\Database\SchSysConfig\General())->unsetDataHide(
                    $varUserSession,
                    $varRecordID
                    );

            return $varReturn;
            }
        }
    }

?>