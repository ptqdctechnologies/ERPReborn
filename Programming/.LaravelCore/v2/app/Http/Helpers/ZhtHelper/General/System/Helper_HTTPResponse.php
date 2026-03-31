<?php

/*
┌──────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────┐
│ ▪ Category   : Laravel Helpers                                                                                                           │
│ ▪ Name Space : \App\Http\Helpers\ZhtHelper\General\System                                                                                │
├──────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────┤
│ ▪ Copyleft 🄯 2020 - 2025 Zheta (teguhpjs@gmail.com)                                                                                      │
└──────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────┘
*/

namespace
    App\Http\Helpers\ZhtHelper\General\System
        {
        /*
        ┌───────────────┬──────────────────────────────────────────────────────────────────────────────────────────────────────────────────┐
        │ ▪ Class Name  │ Helper_HTTPResponse                                                                                               │
        │ ▪ Description │ Menangani segala hal yang terkait HTTP Error dari System                                                         │
        └───────────────┴──────────────────────────────────────────────────────────────────────────────────────────────────────────────────┘
        */
        class
            Helper_HTTPResponse
                {
                /*
                ┌──────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────┐
                │ Class Property Declaration                                                                                               │
                └──────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────┘
                */


                /*
                ┌───────────────────┬──────────────────────────────────────────────────────────────────────────────────────────────────────┐
                │ ▪ Method Name     │ __construct                                                                                          │
                ├───────────────────┼──────────────────────────────────────────────────────────────────────────────────────────────────────┤
                │ ▪ Version         │ 1.0000.0000000                                                                                       │
                │ ▪ Last Update     │ 2025-12-17                                                                                           │
                │ ▪ Creation Date   │ 2025-12-17                                                                                           │
                │ ▪ Description     │ System's Default Constructor                                                                         │
                ├───────────────────┴──────────────────────────────────────────────────────────────────────────────────────────────────────┤
                │ ▪ Input Variable  :                                                                                                      │
                │      ▪ (void)                                                                                                            │
                │ ▪ Output Variable :                                                                                                      │
                │      ▪ (void)                                                                                                            │
                └──────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────┘
                */
                public function
                    __construct (
                        )
                            {
                            }


                /*
                ┌───────────────────┬──────────────────────────────────────────────────────────────────────────────────────────────────────┐
                │ ▪ Method Name     │ __destruct                                                                                           │
                ├───────────────────┼──────────────────────────────────────────────────────────────────────────────────────────────────────┤
                │ ▪ Version         │ 1.0000.0000000                                                                                       │
                │ ▪ Last Update     │ 2025-12-17                                                                                           │
                │ ▪ Creation Date   │ 2025-12-17                                                                                           │
                │ ▪ Description     │ System's Default Destructor                                                                          │
                ├───────────────────┴──────────────────────────────────────────────────────────────────────────────────────────────────────┤
                │ ▪ Input Variable  :                                                                                                      │
                │      ▪ (void)                                                                                                            │
                │ ▪ Output Variable :                                                                                                      │
                │      ▪ (void)                                                                                                            │
                └──────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────┘
                */
                public function
                    __destruct (
                        )
                            {
                            }


                /*
                ┌───────────────────┬──────────────────────────────────────────────────────────────────────────────────────────────────────┐
                │ ▪ Method Name     │ getResponse                                                                                          │
                ├───────────────────┼──────────────────────────────────────────────────────────────────────────────────────────────────────┤
                │ ▪ Version         │ 1.0000.0000005                                                                                       │
                │ ▪ Last Update     │ 2025-12-23                                                                                           │
                │ ▪ Creation Date   │ 2024-08-30                                                                                           │
                │ ▪ Description     │ Mendapatkan Response HTTP dari API (digunakan oleh client/frontend untuk dikirim ke backend)         │
                ├───────────────────┴──────────────────────────────────────────────────────────────────────────────────────────────────────┤
                │ ▪ Input Variable  :                                                                                                      │
                │      ▪ varUserSession (mixed - Mandatory) ► User Session                                                                 │
                │      ▪ varURL (string - Mandatory) ► Alamat host yang dituju                                                             │
                │      ▪ varData (array - Mandatory) ► Data yang akan dikirimkan                                                           │
                │      ▪ varMethod (string - Mandatory) ► Metode HTTP Request                                                              │
                │      ------------------------------                                                                                      │
                │      ▪ varPort (int - Optional) ► Port HTTP Request                                                                      │
                │ ▪ Output Variable :                                                                                                      │
                │      ▪ varReturn (string)                                                                                                │
                ├──────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────┤
                │ ▪ Linked Function :                                                                                                      │
                │      ▪                                                                                                                   │
                └──────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────┘
                */
                public static function
                    getResponse (
                        mixed $varUserSession,
                        string $varURL, array $varData = null, string $varMethod = null, int $varPort = null, int $varTTL = null, array $varHeaders = null
                        )
                            {
                            //-----[ DATA INITIALIZATION ]-------------------------------------------------------------------( START )-----
                                //---> Initializing : varReturn
                                    $varReturn =
                                        (string) null;

                                //---> Reinitializing : varPort
                                    if (!$varPort) {
                                        $varPort = (
                                            ((\App\Http\Helpers\ZhtHelper\General\Utilities\Helper_Network::isHTTPS ($varUserSession)) === true)
                                            ?
                                            443
                                            : 
                                            80
                                            );
                                        }

                                //---> Reinitializing : varMethod
                                    if (!$varMethod) {
                                        $varMethod =
                                            'POST';
                                        }

                                //---> Reinitializing : varData
                                    if (!$varData) {
                                        $varData =
                                            [];                 
                                        }

                                //---> Reinitializing : TTL
                                    if (!$varTTL) {
                                        $varTTL =
                                            300;
                                        }

                                    //---> Overide TTL untuk API Key tertentu
                                        if (
                                            \App\Http\Helpers\ZhtHelper\General\Utilities\Helper_Array::isKeyExist (
                                                $varUserSession,
                                                'metadata',
                                                $varData
                                                ) == true
                                            )
                                            {
                                            if (
                                                \App\Http\Helpers\ZhtHelper\General\Utilities\Helper_Array::isKeyExist (
                                                    $varUserSession,
                                                    'API',
                                                    $varData['metadata']
                                                    ) == true
                                                )
                                                {
                                                if (
                                                    \App\Http\Helpers\ZhtHelper\General\Utilities\Helper_Array::isKeyExist (
                                                        $varUserSession,
                                                        'key',
                                                        $varData['metadata']['API']
                                                        ) == true
                                                    )
                                                    {
                                                    if (strcmp (
                                                            $varData['metadata']['API']['key'],
                                                            'transaction.synchronize.dataAcquisition.setLog_Device_PersonAccess'
                                                            ) == 0
                                                        )
                                                        {
                                                        $varTTL =
                                                            300;
                                                        }
                                                    }
                                                }
                                            }
                            //-----[ DATA INITIALIZATION ]-------------------------------------------------------------------(  END  )-----

                            //-----[ DATA PROCESS ]--------------------------------------------------------------------------( START )-----
                                try {
                                    //---> Exception Conditional : Port must Open
                                        if (\App\Http\Helpers\ZhtHelper\General\Utilities\Helper_Network::isPortOpen (
                                                $varUserSession,
                                                $varURL,
                                                $varPort
                                                ) == false
                                            ) {
                                            throw
                                                new \Exception ('Port is closed');
                                            }

                                    //---> Exception Conditional : varData Must Array
                                        if (!is_array($varData)) {
                                            throw
                                                new \Exception ('Data must be an array');
                                            }

                                    //---> Initializing : Maximum Execution Time
                                        ini_set(
                                            'max_execution_time',
                                            $varTTL
                                            );

                                    //---> Initializing : varHeaders
                                        if (!$varHeaders)
                                            {
                                            //
                                            //---> API AUTH
                                            if (strstr($varURL, '/api/auth')) {
                                                $varHeaders = [
                                                    'User-Agent' => (
                                                        empty ($_SERVER['HTTP_USER_AGENT'])
                                                        ?
                                                        'Non Browser'
                                                        :
                                                        $_SERVER['HTTP_USER_AGENT']
                                                        )
                                                    ];
                                                }
                                            //---> API GATEWAY
                                            elseif (strstr($varURL, '/api/gateway')) {
                                                $varHeaders = [
                                                    'Authorization' => (
                                                        (
                                                            (\App\Http\Helpers\ZhtHelper\General\Utilities\Helper_Array::isKeyExist (
                                                                $varUserSession,
                                                                'header',
                                                                $varData
                                                                ) == true
                                                            ) 
                                                        &&
                                                            (\App\Http\Helpers\ZhtHelper\General\Utilities\Helper_Array::isKeyExist (
                                                                $varUserSession,
                                                                'authorization',
                                                                $varData['header']
                                                                ) == true
                                                            )
                                                        )
                                                        ?
                                                        $varData['header']['authorization']
                                                        :
                                                        null
                                                        ),
                                                    'User-Agent' => (
                                                        empty ($_SERVER['HTTP_USER_AGENT'])
                                                        ?
                                                        'Non Browser'
                                                        :
                                                        $_SERVER['HTTP_USER_AGENT']
                                                        ),
                                                    'Agent-DateTime' => \App\Http\Helpers\ZhtHelper\General\System\Helper_HTTPHeader::generateDate($varUserSession)
                                                    ];
                                                }
                                            dd($varHeaders);
                                            }
                                        else {
                                            }

                                    }
                                catch (\Exception $ex) {
                                    }
                            //-----[ DATA PROCESS ]--------------------------------------------------------------------------(  END  )-----

                            //-----[ DATA RETURN ]---------------------------------------------------------------------------( START )-----
                                return
                                    $varReturn;
                            //-----[ DATA RETURN ]---------------------------------------------------------------------------(  END  )-----
                            }
                }
        }