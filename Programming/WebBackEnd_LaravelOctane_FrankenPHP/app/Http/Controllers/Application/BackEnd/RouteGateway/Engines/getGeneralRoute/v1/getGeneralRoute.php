<?php

/*
┌──────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────┐
│ ▪ Category   : Route Controller                                                                                                          │
│ ▪ Name Space : \App\Http\Controllers\Application\BackEnd\RouteGateway\Engines\getGeneralRoute\v1                                         │
├──────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────┤
│ ▪ Copyleft 🄯 2025 Zheta (teguhpjs@gmail.com)                                                                                             │
└──────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────┘
*/

namespace
    App\Http\Controllers\Application\BackEnd\RouteGateway\Engines\getGeneralRoute\v1
        {
        /*
        ┌───────────────┬──────────────────────────────────────────────────────────────────────────────────────────────────────────────────┐
        │ ▪ Class Name  │ getGeneralRoute                                                                                                  │
        │ ▪ Description │ Menangani Route General Version 1                                                                                │
        └───────────────┴──────────────────────────────────────────────────────────────────────────────────────────────────────────────────┘
        */
        class
            getGeneralRoute extends \App\Http\Controllers\Controller
                {
                /*
                ┌───────────────────┬──────────────────────────────────────────────────────────────────────────────────────────────────────┐
                │ ▪ Method Name     │ main                                                                                                 │
                ├───────────────────┼──────────────────────────────────────────────────────────────────────────────────────────────────────┤
                │ ▪ Version         │ 1.0000.0000000                                                                                       │
                │ ▪ Last Update     │ 2025-12-17                                                                                           │
                │ ▪ Creation Date   │ 2025-12-17                                                                                           │
                │ ▪ Description     │ Fungsi Utama Engine                                                                                  │
                ├───────────────────┴──────────────────────────────────────────────────────────────────────────────────────────────────────┤
                │ ▪ Input Variable  :                                                                                                      │
                │      ▪ (mixed)  varUserSession ► User Session                                                                            │
                |      ▪ (array)  varData ► Data                                                                                           |
                │      ------------------------------                                                                                      │
                │ ▪ Output Variable :                                                                                                      │
                │      ▪ (string) varReturn                                                                                                │
                ├──────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────┤
                │ ▪ Linked Function :                                                                                                      │
                │      ▪                                                                                                                   │
                └──────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────┘
                */
                public function
                    main (
                        //$varUserSession, $varData
                        )
                            {
                            $varUserSession = 111;
                            $varSQLQuery = '
                                SELECT
                                    *
                                FROM
                                    "SchData-OLTP-Finance"."Func_GetReport_DocForm_AdvanceToAdvanceSettlementSummary"(
                                        \'Q000062\'::VARCHAR,
                                        \'235\'::VARCHAR,
                                        164000000000559::BIGINT,
                                        \'2025-02-25\'::VARCHAR,
                                        \'2025-03-04\'::VARCHAR
                                        );
                                ';
                            $varSQLQuery = '
                                SELECT
                                    "SchData-OLTP-Finance"."Func_GetReport_DocForm_Advance"(
                                        11000000000004::bigint,
                                        76000000000637::bigint
                                            );
                                ';

                            $varData =
                                \App\Http\Helpers\ZhtHelper\BackEnd\Database\Helper_PostgreSQL::getQueryExecution(
                                    $varUserSession,
                                    $varSQLQuery
                                    );
                            /*
                            dd($varData);
                    
                            $varReturn = [
                                'xxx' => 123
                                ];
                            */
                            
                            $varReturn = $varData;
                            
                            return
                                \App\Http\Helpers\ZhtHelper\General\Utilities\Helper_EncodeDecode::getJSONEncode (
                                    $varUserSession,
                                    $varReturn
                                    );
                            //echo "xxx";
                            }
                }
        }