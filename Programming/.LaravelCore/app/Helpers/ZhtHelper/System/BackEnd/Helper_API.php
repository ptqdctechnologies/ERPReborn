<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Helpers                                                                                                   |
| ▪ Name Space : \App\Helpers\ZhtHelper\System\BackEnd                                                                             |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2020 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Helpers\ZhtHelper\System\BackEnd
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : Helper_API                                                                                                   |
    | ▪ Description : Menangani segala parameter yang terkait API                                                                  |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class Helper_API
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getAPIIdentityFromClassFullName                                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0001.0000000                                                                                       |
        | ▪ Last Update     : 2020-09-03                                                                                           |
        | ▪ Description     : Mendapatkan API Identity (Key and Version) dari ClassFullName (varFullClassName)                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varFullClassName ► Full Class Name (include namespace)                                                   |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (int)    varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getAPIIdentityFromClassFullName($varUserSession, string $varFullClassName)
            {
            $APIData = 
                explode(
                    '\\',
                    explode(
                        '\Engines',
                        explode(
                            'App\\Http\\Controllers\\Application\\BackEnd\\System\\',
                            $varFullClassName
                            )[1]
                        )[0].
                    explode(
                        '\Engines',
                        explode(
                            'App\\Http\\Controllers\\Application\\BackEnd\\System\\',
                            $varFullClassName
                            )[1]
                        )[1]
                    );
            array_pop($APIData);
            
            $varReturn['Version'] =
                str_replace('v', '', array_pop($APIData));
            
            $varReturn['Key'] =
                \App\Helpers\ZhtHelper\General\Helper_String::getLowerCaseFirstCharacter(
                    $varUserSession,
                    implode('.', $APIData)
                    );

            return
                $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getAPILatestVersion                                                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0001.0000000                                                                                       |
        | ▪ Last Update     : 2020-09-03                                                                                           |
        | ▪ Description     : Mendapatkan API Latest Version berdasarkan API Key (varAPIKey)                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varAPIKey ► API Key                                                                                      |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (int)    varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getAPILatestVersion($varUserSession, $varAPIKey)
            {
            $varAPIKeyData = explode('.', $varAPIKey);
            $varAPIService = \App\Helpers\ZhtHelper\General\Helper_String::getUpperCaseFirstCharacter($varUserSession, array_shift($varAPIKeyData));
            $varAPIStructure = implode('.', $varAPIKeyData);
            
            $varFileVersionHeader = 'v';
            $varFolderArray = \App\Helpers\ZhtHelper\General\Helper_File::getFilesListInFolder($varUserSession, getcwd().'/./../app/Http/Controllers/Application/BackEnd/System/'.$varAPIService.'/Engines/'.str_replace('.', '/', $varAPIStructure));
            $varLastVersion = 0;

            for ($i=0; $i!=count($varFolderArray); $i++)
                {
                $varCheckVersion = str_replace($varFileVersionHeader, '', $varFolderArray[$i]);
                if($varLastVersion < $varCheckVersion)
                    {
                    $varLastVersion = $varCheckVersion;
                    }
                }

            $varReturn =
                $varLastVersion;

            return
                $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getEngineDataSend_DataCreate                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-11-06                                                                                           |
        | ▪ Description     : Mendapatkan Engine Data Send untuk Data Create                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (array)  varDataSend ► Data Send                                                                                  |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (int)    varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getEngineDataSend_DataCreate($varUserSession, array $varDataSend)
            {
            //---> Capture Process
            $varReturnProcess = NULL;
            if (\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist(
                $varUserSession,
                'data',
                $varDataSend
                ) == TRUE)
                    {
                    $varReturnProcess = $varDataSend['process'];
                    $varDataSend = $varDataSend['data'][0];
                    }
            
            if (\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'SignRecordID', $varDataSend) == TRUE)
                {
                if ($varDataSend['SignRecordID'])
                    {
                    $varBusinessDocument = 
                        (\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist(
                            $varUserSession,
                            'AdditionalData',
                            $varDataSend
                            ) 
                            ?   (
                                    (
                                    !is_null($varDataSend['AdditionalData'])
                                    ) 
                                    ?
                                        (\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist(
                                            $varUserSession,
                                            'general',
                                            (\App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                                                $varUserSession,
                                                $varDataSend['AdditionalData']
                                                )
                                            )
                                            ) 
                                            ?   (
                                                    (
                                                    !is_null($varDataSend['AdditionalData'])
                                                    ) 
                                                    ?
                                                        (\App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                                                            $varUserSession,
                                                            $varDataSend['AdditionalData']
                                                            )
                                                        )['general']
                                                    : null
                                                )
                                            : null
                                        )
                                    : null
                                )
                            : null
                        );

                    if (\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist(
                        $varUserSession,
                        'documentDateTimeTZ',
                        $varBusinessDocument
                        ) === TRUE) { 
                        $varBusinessDocument['documentDateTimeTZ'] =
                            str_replace('T', ' ', $varBusinessDocument['documentDateTimeTZ']);
                        };

                    $varReturn = [
                        'process' => (
                            $varReturnProcess === NULL ? 
                                [
                                'DBMS' => [
                                    'executionInterval' => NULL,
                                    'startDateTimeTZ' => NULL,
                                    'finishDateTimeTZ' => NULL
                                    ]
                                ]
                                :
                                $varReturnProcess
                                ),
                        'message' => 'Data Insertion Was Successful (New Record ID : '.$varDataSend['SignRecordID'].')',
                        'recordID' => $varDataSend['SignRecordID'],
                        'businessDocument' => $varBusinessDocument
                        ];

                    return
                        $varReturn;

                    }
                else
                    {
                    throw new \Exception('Data Insertion Failed');
                    }
                }
            else
                {
                throw new \Exception('Data Insertion Failed');
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getEngineDataSend_DataDelete                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-11-10                                                                                           |
        | ▪ Description     : Mendapatkan Engine Data Send untuk Data Delete                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (array)  varDataSend ► Data Send                                                                                  |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (int)    varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getEngineDataSend_DataDelete($varUserSession, array $varDataSend)
            {
            if(((bool)$varDataSend['data'][0]['FuncSys_General_SetRecordDelete']) == TRUE)
                {
                $varReturn = [
                    'message' => 'Data Deletion Successful'
                    ];
                return $varReturn;
                }
            else
                {
                throw new \Exception('Data Deletion Failed');
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getEngineDataSend_DataDeleteByRPK                                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-07-29                                                                                           |
        | ▪ Creation Date   : 2022-07-29                                                                                           |
        | ▪ Description     : Mendapatkan Engine Data Send untuk Data Delete By RPK                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (array)  varDataSend ► Data Send                                                                                  |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (int)    varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getEngineDataSend_DataDeleteByRPK($varUserSession, array $varDataSend)
            {
            if (((bool) $varDataSend['data'][0]['FuncSys_General_SetRecordDeleteByRPK']) == TRUE)
                {
                $varReturn = [
                    'message' => 'Data Deletion Successful'
                    ];
                return $varReturn;
                }
            else
                {
                throw new \Exception('Data Deletion Failed');
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getEngineDataSend_DataHide                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-03-08                                                                                           |
        | ▪ Description     : Mendapatkan Engine Data Send untuk Data Hide                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (array)  varDataSend ► Data Send                                                                                  |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (int)    varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getEngineDataSend_DataHide($varUserSession, array $varDataSend)
            {
            if(((bool)$varDataSend['data'][0]['FuncSys_General_SetRecordHide']) == TRUE)
                {
                $varReturn = [
                    'message' => 'Data Hiding Successful'
                    ];
                return $varReturn;
                }
            else
                {
                throw new \Exception('Data Hiding Failed');
                }
            }

            
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getEngineDataSend_DataInitialize                                                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-11-10                                                                                           |
        | ▪ Description     : Mendapatkan Engine Data Send untuk Data Initialize                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (array)  varDataSend ► Data Send                                                                                  |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (int)    varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getEngineDataSend_DataInitialize($varUserSession, array $varDataSend)
            {
            if ( 1 == 1 )
                {
                //---> Capture Process
                $varReturnProcess = NULL;
                if (\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist(
                    $varUserSession,
                    'data',
                    $varDataSend
                    ) == TRUE)
                        {
                        $varReturnProcess = $varDataSend['process'];
                        $varDataSend = $varDataSend['data'][0];
                        }
                
                $varReturn = [
                    'process' => (
                        $varReturnProcess === NULL ? 
                            [
                            'DBMS' => [
                                'executionInterval' => NULL,
                                'startDateTimeTZ' => NULL,
                                'finishDateTimeTZ' => NULL
                                ]
                            ]
                            :
                            $varReturnProcess
                            ),
                    'message' => 'Data Initialization Successful'
                    ];

                return
                    $varReturn;
                }
            else
                {
                throw new \Exception('Data Initialization Failed');
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getEngineDataSend_DataRead                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2021-02-05                                                                                           |
        | ▪ Description     : Mendapatkan Engine Data Send untuk Data Read                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (array)  varDataSend ► Data Send                                                                                  |
        |      ------------------------------                                                                                      |
        |      ▪ (bool)   varSignConvertPHPArrayToJSONCamelCase ► Sign Comvert PHP Array to JSON CamelCase                         |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (int)    varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getEngineDataSend_DataRead($varUserSession, $varDataSend, bool $varSignConvertPHPArrayToJSONCamelCase = TRUE)
            {
            if (is_array($varDataSend) == FALSE)
                {
                throw
                    new \Exception('Data Read Failed');
                }
            else
                {
                if (count($varDataSend) == 0)
                    {
                    //$varReturn = [];
                    throw
                        new \Exception('Empty Data Result');
                    }
                else
                    {
//$varSignConvertPHPArrayToJSONCamelCase = FALSE;
                    //$varReturn = \App\Helpers\ZhtHelper\General\Helper_Array::getArrayKeyRename_CamelCase($varUserSession, $varDataSend);
                    if ($varSignConvertPHPArrayToJSONCamelCase == TRUE)
                        {
                        $varReturn = 
                            \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                                $varUserSession, 
                                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                                    $varUserSession,
                                    'SchSysAsset.Func_General_JSONArray_ConvertKeysToCamelCase',
                                    [
                                        [
                                        \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONEncode(
                                            $varUserSession,
                                            $varDataSend
                                            ),
                                        'json'
                                        ]
                                    ]
                                    )
                                );
                        //dd($varReturn);

                        $varReturn['data'] =
                            \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                                $varUserSession,
                                $varReturn['data'][0]['Func_General_JSONArray_ConvertKeysToCamelCase']
                                );

                        $varReturn =
                            $varReturn['data'];
                        }
                    else
                        {
                        $varReturn =
                            $varDataSend;
                        }
                    
                    /*
                    $varReturn = 
                        \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONEncode(
                            $varUserSession,
                            $varDataSend
                            );
                    */
                    //dd($varReturn);
                    }

                return
                    $varReturn;
                }
/*
            if($varDataSend)
                {
                if(is_array($varDataSend) == FALSE)
                    {
                    throw new \Exception('Data Read Failed');
                    }
                else
                    {
                    if(count($varDataSend)==0)
                        {
                        $varReturn = [];
                        }
                    else
                        {
                        $varReturn = \App\Helpers\ZhtHelper\General\Helper_Array::getArrayKeyRename_CamelCase($varUserSession, $varDataSend);
                        }
                    }
                return $varReturn;
                }
            else
                {
                throw new \Exception('Data Read Failed');
                }            
 */
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getEngineDataSend_DataShow                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-03-08                                                                                           |
        | ▪ Description     : Mendapatkan Engine Data Send untuk Data Hide                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (array)  varDataSend ► Data Send                                                                                  |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (int)    varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getEngineDataSend_DataShow($varUserSession, array $varDataSend)
            {
            if(((bool)$varDataSend['data'][0]['FuncSys_General_UnsetRecordHide']) == TRUE)
                {
                $varReturn = [
                    'message' => 'Data Showing Successful'
                    ];
                return $varReturn;
                }
            else
                {
                throw new \Exception('Data Showing Failed');
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getEngineDataSend_DataSynchronize                                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-11-16                                                                                           |
        | ▪ Description     : Mendapatkan Engine Data Send untuk Data Synchronize                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (array)  varDataSend ► Data Send                                                                                  |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (int)    varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getEngineDataSend_DataSynchronize($varUserSession, array $varDataSend)
            {
            if( 1 == 1 )
                {
                $varReturn = [
                    'message' => 'Data Synchronization Successful'
                    ];

                return
                    $varReturn;
                }
            else
                {
                throw
                    new \Exception('Data Synchronization Failed');
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getEngineDataSend_DataUndelete                                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-11-10                                                                                           |
        | ▪ Description     : Mendapatkan Engine Data Send untuk Data Undelete                                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (array)  varDataSend ► Data Send                                                                                  |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (int)    varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getEngineDataSend_DataUndelete($varUserSession, array $varDataSend)
            {
            if(((bool)$varDataSend['data'][0]['FuncSys_General_UnsetRecordDelete']) == TRUE)
                {
                $varReturn = [
                    'message' => 'Cancellation of Data Delete Successful'
                    ];
                return $varReturn;
                }
            else
                {
                throw new \Exception('Data Undelete Failed');
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getEngineDataSend_DataUndeleteByRPK                                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-07-29                                                                                           |
        | ▪ Creation Date   : 2022-07-29                                                                                           |
        | ▪ Description     : Mendapatkan Engine Data Send untuk Data Undelete                                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (array)  varDataSend ► Data Send                                                                                  |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (int)    varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getEngineDataSend_DataUndeleteByRPK($varUserSession, array $varDataSend)
            {
            if(((bool)$varDataSend['data'][0]['FuncSys_General_UnsetRecordDeleteByRPK']) == TRUE)
                {
                $varReturn = [
                    'message' => 'Cancellation of Data Delete Successful'
                    ];
                return $varReturn;
                }
            else
                {
                throw new \Exception('Data Undelete Failed');
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getEngineDataSend_DataUpdate                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-11-06                                                                                           |
        | ▪ Description     : Mendapatkan Engine Data Send untuk Data Update                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (array)  varDataSend ► Data Send                                                                                  |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (int)    varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getEngineDataSend_DataUpdate($varUserSession, array $varDataSend)
            {
            //---> Capture Process
            $varReturnProcess = NULL;
            if (\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist(
                $varUserSession,
                'data',
                $varDataSend
                ) == TRUE)
                    {
                    $varReturnProcess = $varDataSend['process'];
                    $varDataSend = $varDataSend['data'][0];
                    }

            if (\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'SignRecordID', $varDataSend) == TRUE)
                {
                if ($varDataSend['SignRecordID'])
                    {
                    /*
                    $varBusinessDocument = 
                        (\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist(
                            $varUserSession,
                            'AdditionalData',
                            $varDataSend
                            ) 
                            ?   (
                                    (
                                    !is_null($varDataSend['AdditionalData'])
                                    ) 
                                    ?
                                        (\App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                                            $varUserSession,
                                            $varDataSend['AdditionalData']
                                            )
                                        )['general']
                                    : null
                                )
                            : null
                        );
                    */

                    //$varDataSend['AdditionalData'] = null;
                    //$varDataSend['AdditionalData'] = '{"general" : {"businessDocumentType_RefID":77000000000057, "documentDateTimeTZ":"2022-12-13T00:00:00+07:00"}}';
                    
                    $varBusinessDocument = 
                        (\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist(
                            $varUserSession,
                            'AdditionalData',
                            $varDataSend
                            ) 
                            ?   (
                                    (
                                    !is_null($varDataSend['AdditionalData'])
                                    ) 
                                    ?
                                        (\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist(
                                            $varUserSession,
                                            'general',
                                            (\App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                                                $varUserSession,
                                                $varDataSend['AdditionalData']
                                                )
                                            )
                                            ) 
                                            ?   (
                                                    (
                                                    !is_null($varDataSend['AdditionalData'])
                                                    ) 
                                                    ?
                                                        (\App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                                                            $varUserSession,
                                                            $varDataSend['AdditionalData']
                                                            )
                                                        )['general']
                                                    : null
                                                )
                                            : null
                                        )
                                    : null
                                )
                            : null
                        );

                    if (\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist(
                        $varUserSession,
                        'documentDateTimeTZ',
                        $varBusinessDocument
                        ) === TRUE) { 
                        $varBusinessDocument['documentDateTimeTZ'] =
                            str_replace('T', ' ', $varBusinessDocument['documentDateTimeTZ']);
                        };
                    
                    $varReturn = [
                        0 => [
                            'process' => (
                                $varReturnProcess === NULL ? 
                                    [
                                    'DBMS' => [
                                        'executionInterval' => NULL,
                                        'startDateTimeTZ' => NULL,
                                        'finishDateTimeTZ' => NULL
                                        ]
                                    ]
                                    :
                                    $varReturnProcess
                                    ),
                            'message' => 'Data Update Was Successful (Record ID : '.$varDataSend['SignRecordID'].')',
                            'recordID' => $varDataSend['SignRecordID'],
                            'businessDocument' => $varBusinessDocument
                            ]

                        ];

                    return
                        $varReturn;
                    }
                else
                    {
                    throw
                        new \Exception('Data Update Failed');
                    }
                }
            else
                {
                throw
                    new \Exception('Data Update Failed');
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getEngineDataSend_DataUpdateException                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-06-29                                                                                           |
        | ▪ Description     : Mendapatkan Engine Data Send untuk Data Update Exception                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (array)  varDataSend ► Data Send                                                                                  |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (int)    varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getEngineDataSend_DataUpdateException($varUserSession, $ObjException)
            {
            $varErrorMessage =
                $ObjException->getMessage();

            switch($varErrorMessage)
                {
                case 'Undefined array key "Data"':
                    {
                    $varReturn =
                        \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Fail(
                            $varUserSession,
                            500,
                            'Update Failed'
                            );

                    break;
                    }
                default:
                    {
                    $varReturn =
                        \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Fail(
                            $varUserSession,
                            500,
                            'Invalid SQL Syntax'.($varErrorMessage ? ' ('.$varErrorMessage.')' : '')
                            );
                    }
                }

            return
                $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getEngineDataSend_FileUpload                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-07-21                                                                                           |
        | ▪ Description     : Mendapatkan Engine Data Send untuk File Upload                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (array)  varDataSend ► Data Send                                                                                  |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (int)    varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getEngineDataSend_FileUpload($varUserSession, array $varDataSend)
            {
            if (\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'SignRecordID', $varDataSend) == TRUE)
                {
                if ($varDataSend['SignRecordID'])
                    {
                    $varReturn = [
                        'message' => 'Upload File to Staging Area Was Successful (Rotate Record RPK : '.$varDataSend['SignRecordID'].')',
                        'recordRPK' => $varDataSend['SignRecordID']
                        ];
                    return $varReturn;
                    }
                else
                    {
                    throw new \Exception('File Upload Failed');
                    }
                }
            else
                {
                throw new \Exception('Data Insertion Failed');
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setCallAPIEngine                                                                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0001.0000001                                                                                       |
        | ▪ Last Update     : 2020-09-02                                                                                           |
        | ▪ Description     : Memanggil API Engine                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (array)  varAPIKey ► API Key                                                                                      |
        |      ▪ (array)  varAPIVersion ► API Version                                                                              |
        |      ▪ (array)  varData ► Data yang akan diproses                                                                        |
        |      ▪ (string) varFunctionName ► Nama Fungsi yang akan dipanggil                                                        |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (mixed)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function setCallAPIEngine($varUserSession, $varAPIKey, $varAPIVersion, array $varData, string $varFunctionName=null, array $varRealDataRequest=null)
            {
            $varErrorMessage = null;

/*
//------------< BLOCKING >------------------
if (strcmp($varAPIKey, 'transaction.read.dataList.finance.getAdvance')==0)
    {
    $varAPIExecutionStartDateTime = (new \DateTime());
    }
//------------< BLOCKING >------------------
*/

            //dd($varAPIKey);            

            $varAPIKeyData = explode('.', $varAPIKey);
            $varAPIService =
                \App\Helpers\ZhtHelper\General\Helper_String::getUpperCaseFirstCharacter(
                    $varUserSession,
                    array_shift($varAPIKeyData)
                    );
            $varAPIStructure = implode('.', $varAPIKeyData);

            //---> Cek Nama Fungsi yang akan dieksekusi
            if (!$varFunctionName)
                {
                //---> Bila Null, maka disamakan dengan nama fungsi parent yang menginisiasi objek ini
                $varFunctionName =
                    debug_backtrace()[1]['function'];
                }

            //---> Latest Version Translation
            if (strcmp($varAPIVersion, 'latest') == 0)
                {
                $varAPIVersion =
                    self::getAPILatestVersion(
                        $varUserSession,
                        $varAPIKey
                        );
                }

            //---> Main Process
            $varClass = (
                'App\\Http\\Controllers\\Application\\BackEnd\\System\\'.
                $varAPIService.
                '\\Engines\\'.
                str_replace('.', '\\', $varAPIStructure).
                '\\v'.
                $varAPIVersion.
                '\\'.
                $varAPIKeyData[count($varAPIKeyData)-1]
                );

            $varMainPath = explode('\\', $varClass);
            array_pop($varMainPath);
            $varMainPath =
                '/./../'.
                str_replace(
                    'App/',
                    'app/',
                    str_replace(
                        '\\',
                        '/',
                        implode(
                            '\\',
                            $varMainPath
                            )
                        )
                    );            
            
            $varFilePath = 
                \App\Helpers\ZhtHelper\General\Helper_File::getAutoMatchFilePath(
                    $varUserSession,
                    getcwd(),
                    '/./../'.str_replace('App/', 'app/', str_replace('\\', '/', $varClass)).'.php'
                    );

            if (!$varFilePath)
                {
                //throw new \Exception('API with Key `'.$varAPIKey.'` version `'.$varAPIVersion.'` does not found');
                $varErrorMessage =
                    'API with Key `'.$varAPIKey.'` version `'.$varAPIVersion.'` does not found';

                $varReturn =
                    \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Fail(
                        $varUserSession,
                        401,
                        $varErrorMessage
                        );
                }
            else
                {    
                if ($varRealDataRequest)
                    {
                    $varFilePathJSONValidation = 
                        \App\Helpers\ZhtHelper\General\Helper_File::getAutoMatchFilePath(
                            $varUserSession,
                            getcwd(),
                            $varMainPath.'/JSONRequestSchema.json'
                            );

                    if (!$varFilePathJSONValidation)
                        {
                        $varErrorMessage = 
                            'JSON Request Contract for API with Key `'.$varAPIKey.'` version `'.$varAPIVersion.'` does not found';

                        $varReturn = 
                            \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Fail(
                                $varUserSession,
                                401,
                                $varErrorMessage
                                );
                        }

                    $varJSONSchemaValidationStatus =
                        \App\Helpers\ZhtHelper\General\Helper_JSON::getSchemaValidationFromFile(
                            $varUserSession,
                            \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONEncode(
                                $varUserSession,
                                $varRealDataRequest
                                ),
                            $varFilePathJSONValidation
                            );

                    if ($varJSONSchemaValidationStatus == false)
                        {
                        $varErrorMessage =
                            'JSON Request incompatible with API\'s Contract ('.$varAPIKey.' version '.$varAPIVersion.')';

                        $varReturn =
                            \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Fail(
                                $varUserSession,
                                400,
                                $varErrorMessage
                                );
                        }                
                    }
                
/*
if(strcmp($varAPIKey, 'environment.general.session.getData')==0)
    {
    //$varErrorMessage = 'test'.json_encode($varRealDataRequest);
    //$varErrorMessage = 'test'.\App\Helpers\ZhtHelper\General\Helper_Encode::getJSONEncode($varUserSession, $varRealDataRequest);
    //$varErrorMessage = 'test'.$varFilePathJSONValidation;
//    $varJSONSchemaValidationStatus = \App\Helpers\ZhtHelper\General\Helper_JSON::getSchemaValidationFromFile($varUserSession, \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONEncode($varUserSession, $varRealDataRequest), $varFilePathJSONValidation);
    $varErrorMessage = 'test '.($varJSONSchemaValidationStatus==true ? 'Udah OK' : 'Engga OK Banget');

/*                    $varJSONRequestSchema = new \Swaggest\JsonSchema\Schema();
                    $varJSONRequestSchema->import($varFilePathJSONValidation);
                    $varJSONRequestSchema->in(json_decode(\App\Helpers\ZhtHelper\General\Helper_Encode::getJSONEncode($varUserSession, $varRealDataRequest)));
$varErrorMessage = 'test '.json_encode($varJSONRequestSchema->import($varFilePathJSONValidation));
$varErrorMessage = 'test '.json_encode($varJSONRequestSchema->in(json_decode(\App\Helpers\ZhtHelper\General\Helper_Encode::getJSONEncode($varUserSession, $varRealDataRequest))));
$varErrorMessage = 'test '.json_encode($varJSONRequestSchema->validate());
    $varReturn = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Fail($varUserSession, 401, $varErrorMessage);
    }
*/

                if (!$varErrorMessage)
                    {
                    require_once($varFilePath);

                    $varReturn = (
                        new $varClass()
                        )->{$varFunctionName}($varUserSession, $varData);
                    }
                }

/*
//------------< BLOCKING >------------------
if (strcmp($varAPIKey, 'transaction.read.dataList.finance.getAdvance')==0)
    {
    //dd($varAPIKey);
    //dd('$varClass : '.$varClass.', $varFunctionName : '.$varFunctionName.', $varUserSession : '.$varUserSession.'');
    dd (
        \App\Helpers\ZhtHelper\General\Helper_DateTime::getDifferenceOfDateTimeTZString(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            \App\Helpers\ZhtHelper\General\Helper_DateTime::getTimeStampTZConvert_PHPDateTimeToDateTimeTZString(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), $varAPIExecutionStartDateTime),
            \App\Helpers\ZhtHelper\General\Helper_DateTime::getTimeStampTZConvert_PHPDateTimeToDateTimeTZString(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), (new \DateTime())),
            )
        );
    }
//------------< BLOCKING >------------------
*/

            //var_dump($varFunctionName);
            //var_dump($varReturn);
            return
                $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setEngineResponseDataReturn_Fail                                                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-08-27                                                                                           |
        | ▪ Description     : Mendapatkan Fail Engine Return HTTP Response                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varHTTPErrorCode ► Error Code HTTP Response                                                              |
        |      ▪ (string) varHTTPErrorMessage ► Error Message HTTP Response                                                        |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (int)    varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function setEngineResponseDataReturn_Fail($varUserSession, int $varHTTPErrorCode, string $varHTTPErrorMessage = null)
            {
            if (!$varHTTPErrorMessage)
                {
                $varHTTPErrorMessage = '';
                }

            $varReturn = [
                "metadata" => [
                    "successStatus" => false
                    ],
                "data" => [
                    "code" => $varHTTPErrorCode,
                    "message" => $varHTTPErrorMessage
                    ]
                ];

            return
                $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setEngineResponseDataReturn_Success                                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0001.0000000                                                                                       |
        | ▪ Last Update     : 2020-09-03                                                                                           |
        | ▪ Description     : Mendapatkan Success Engine Return HTTP Response                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (array)  varData ► Data yang akan dikirim oleh HTTP Response                                                      |
        |      ▪ (array)  varAPIIdentity ► API Identity (Key & Version)                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (int)    varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function setEngineResponseDataReturn_Success($varUserSession, array $varData, array $varAPIIdentity = null)
            {
            if (!$varAPIIdentity)
                {
                $APIKey = null;
                $APIVersion = null;
                }
            else
                {
                $APIKey = $varAPIIdentity['Key'];
                $APIVersion = $varAPIIdentity['Version'];
                }
            
            $varReturn = [
                "metadata" => [
                    "APIResponse" =>
                        [
                        'key' => $APIKey,
                        'version' => $APIVersion,
                        ],
                    "successStatus" => true
                    ],
                "data" => $varData
                ];

            return
                $varReturn;
            }


        public static function getUserLoginSessionIDByAPIWebToken($varUserSession, string $varAPIWebToken = null)
            {
                if (!$varAPIWebToken) {
                    try {
                        //---> Initializing : varAPIWebToken
                        $varDataHeader =
                            \App\Helpers\ZhtHelper\System\Helper_HTTPRequest::getHeader($varUserSession);

                        $varAPIWebToken =
                            str_replace(
                                'Bearer ', 
                                '', 
                                $varDataHeader['authorization'][0]
                                );
                        
                        //---> Initializing : varReturn
                        $varReturn = 
                            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_ByAPIWebToken(
                                $varUserSession,
                                $varAPIWebToken
                                );
                        }

                    catch (\Exception $ex) {
                        }
                    
                    return
                        $varReturn;
                    }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getUserLoginSessionEntityByAPIWebToken                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0001.0000001                                                                                       |
        | ▪ Last Update     : 2025-09-16                                                                                           |
        | ▪ Creation Date   : 2020-10-06                                                                                           |
        | ▪ Description     : Mendapatkan API User Login Identity berdasarkan APIWebToken                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varAPIWebToken ► API WebToken                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (int)    varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getUserLoginSessionEntityByAPIWebToken($varUserSession, string $varAPIWebToken = null)
            {
//------------< BLOCKING >------------------
    $varAPIExecutionStartDateTime = (new \DateTime());
//------------< BLOCKING >------------------

            $varReturn = [
                'APIWebToken' => '',
                'userLoginSessionID' => '',
                'userID' => null,
                'userRoleID' => null,
                'branchID' => null,
                'sessionStartDateTimeTZ' => null,
                'sessionAutoStartDateTimeTZ' => null,
                'sessionAutoFinishDateTimeTZ' => null,
                'userIdentities' => null,
                'environment' => null
                ];

            try {
                //---> Initializing : varAPIWebToken
                if (!$varAPIWebToken) {
                    try {
                        $varDataHeader =
                            \App\Helpers\ZhtHelper\System\Helper_HTTPRequest::getHeader($varUserSession);

                        $varAPIWebToken =
                            str_replace(
                                'Bearer ', 
                                '', 
                                $varDataHeader['authorization'][0]
                                );
                        }

                    catch (\Exception $ex) {
                        //$varReturn['userLoginSessionID'] = $varUserSession;
                        //$varAPIWebToken = \App\Helpers\ZhtHelper\System\Helper_Environment::getAPIWebToken_System();
                        }
                    }

                //---> Initializing : varReturn
                $varReturn = [
                    'APIWebToken' => $varAPIWebToken,
                    'userLoginSessionID' => $varReturn['userLoginSessionID'],
                    'userID' => null,
                    'userRoleID' => null,
                    'branchID' => null,
                    'sessionStartDateTimeTZ' => null,
                    'sessionAutoStartDateTimeTZ' => null,
                    'sessionAutoFinishDateTimeTZ' => null,
                    'userIdentities' => null,
                    'userAccessPrivileges' => null,
                    'environment' => null
                    ];
                }

            catch (Exception $ex) {
                }

            //---> Get Value From Cache
            if (\App\Helpers\ZhtHelper\Cache\Helper_Redis::isExpired(
                $varUserSession,
                'ERPReborn::APIWebToken::'.$varAPIWebToken
                ) == false) {
                $varData = (
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue(
                            $varUserSession,
                            'ERPReborn::APIWebToken::'.$varAPIWebToken
                            )
                        )
                    );

                $varReturn['userLoginSessionID'] = $varData['userLoginSession_RefID'];
                $varReturn['userID'] = $varData['user_RefID'];
                $varReturn['userRoleID'] = $varData['userRole_RefID'];
                $varReturn['branchID'] = $varData['branch_RefID'];
                $varReturn['sessionStartDateTimeTZ'] = $varData['sessionStartDateTimeTZ'];
                $varReturn['sessionAutoStartDateTimeTZ'] = $varData['sessionAutoStartDateTimeTZ'];
                $varReturn['sessionAutoFinishDateTimeTZ'] = $varData['sessionAutoFinishDateTimeTZ'];

                if (\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'userIdentities', $varData)) {
                    $varReturn['userIdentities'] = 
                        //null;
                        self::getUserIdentity(
                            $varUserSession,
                            $varData['userIdentities']['LDAPUserID']
                            ); //---> Data Diambil dari DB (Lebih update bila ada perubahan data)
                        //$varData['userIdentities']; //---> Data Diambil dari Redis (Lebih responsif tapi tidak adaptif)                    
                    }
                }
            //---> Get Value From Database
            else
                {
                if ((new \App\Models\Database\SchSysConfig\General())->isExist_APIWebToken($varUserSession, $varAPIWebToken) == true)
                    {
                    //---> Jika $varAPIWebToken merupakan Web Token System (SysEngine)
                    if (strcmp($varAPIWebToken, \App\Helpers\ZhtHelper\System\Helper_Environment::getAPIWebToken_System()) == 0) 
                        {
                        $varReturn['userLoginSessionID'] = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
                        $varReturn['branchID'] = 11000000000001;
                        }
                    /*
                    else
                        {
                        $varData = 
                            \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                                $varUserSession,
                                \App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue(
                                    $varUserSession,
                                    'ERPReborn::APIWebToken::'.$varAPIWebToken
                                    )
                                );
                        //dd($varData['userIdentities']['LDAPUserID']);

                        $varReturn['userLoginSessionID'] = $varData['userLoginSession_RefID'];
                        $varReturn['userID'] = $varData['user_RefID'];
                        $varReturn['userRoleID'] = $varData['userRole_RefID'];
                        $varReturn['branchID'] = $varData['branch_RefID'];
                        $varReturn['sessionStartDateTimeTZ'] = $varData['sessionStartDateTimeTZ'];
                        $varReturn['sessionAutoStartDateTimeTZ'] = $varData['sessionAutoStartDateTimeTZ'];
                        $varReturn['sessionAutoFinishDateTimeTZ'] = $varData['sessionAutoFinishDateTimeTZ'];
                        //---> Bila $varReturn['userIdentities'] diambil Redis, data tidak terupdate apabila ada perubahan pada database 

                        //if(\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'userPrivilegesMenu', $varData))
                        //    {
                        //    $varReturn['userPrivilegesMenu'] = \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode($varUserSession, $varData['userPrivilegesMenu']);
                        //    }
                        //$varReturn['environment'] = $varData['environment'];
                        if (\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'environment', $varData)) {
                            $varReturn['environment'] = $varData['environment'];
                            }
                        }
                    */
/*
//------------< BLOCKING >------------------
    dd (
        \App\Helpers\ZhtHelper\General\Helper_DateTime::getDateTimeStringWithTimeZoneDifferenceInterval(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            \App\Helpers\ZhtHelper\General\Helper_DateTime::getTimeStampTZConvert_PHPDateTimeToDateTimeTZString(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), $varAPIExecutionStartDateTime),
            \App\Helpers\ZhtHelper\General\Helper_DateTime::getTimeStampTZConvert_PHPDateTimeToDateTimeTZString(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), (new \DateTime())),
            )
        );
//------------< BLOCKING >------------------
*/
                    }
                }





            return
                $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getUserIdentity                                                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-03-30                                                                                           |
        | ▪ Creation Date   : 2023-03-30                                                                                           |
        | ▪ Description     : Mendapatkan User Identity dari LDAP User ID                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varLDAPUserID ► LDAP User ID                                                                             |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (int)    varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getUserIdentity($varUserSession, string $varLDAPUserID = null)
            {
            //$varLDAPUserID = 'teguh.pratama';
            $varData =
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession,
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchSysConfig.FuncSys_General_GetUserIdentityByLDAPUserID',
                        [
                            [$varLDAPUserID, 'varchar']
                        ]
                        )
                    )['data'][0];
            //dd($varData);
            
            $varReturn = [
                'user_RefID' => $varData['User_RefID'],
                'LDAPUserID' => $varLDAPUserID,
                'person_RefID' => $varData['Person_RefID'],
                'personName' => $varData['PersonName'],
                'worker_RefID' => $varData['Worker_RefID'],
                'workerIdentityNumber' => $varData['WorkerIdentityNumber'],
                'workerCareerInternal_RefID' => $varData['WorkerCareerInternal_RefID'],
                'workerType_RefID' => $varData['WorkerType_RefID'],
                'workerTypeName' => $varData['WorkerTypeName'],
                'organizationalDepartment_RefID' => $varData['OrganizationalDepartment_RefID'],
                'organizationalDepartmentName' => $varData['OrganizationalDepartmentName'],
                'organizationalJobPosition_RefID' => $varData['OrganizationalJobPosition_RefID'],
                'organizationalJobPositionName' => $varData['OrganizationalJobPositionName']
                ];

            return
                $varReturn;
            }
        }
    }