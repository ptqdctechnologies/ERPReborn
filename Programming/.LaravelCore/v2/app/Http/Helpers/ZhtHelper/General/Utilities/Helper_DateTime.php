<?php

/*
┌──────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────┐
│ ▪ Category   : Laravel Helpers                                                                                                           │
│ ▪ Name Space : \App\Http\Helpers\ZhtHelper\General\Utilities                                                                             │
├──────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────┤
│ ▪ Copyleft 🄯 2020 - 2025 Zheta (teguhpjs@gmail.com)                                                                                      │
└──────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────┘
*/

namespace
    App\Http\Helpers\ZhtHelper\General\Utilities
        {
        /*
        ┌───────────────┬──────────────────────────────────────────────────────────────────────────────────────────────────────────────────┐
        │ ▪ Class Name  │ Helper_DateTime                                                                                                  │
        │ ▪ Description │ Menangani segala hal yang terkait Tanggal dan Waktu                                                              │
        └───────────────┴──────────────────────────────────────────────────────────────────────────────────────────────────────────────────┘
        */
        class
            Helper_DateTime
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
                │ ▪ Last Update     │ 2025-12-11                                                                                           │
                │ ▪ Creation Date   │ 2025-12-11                                                                                           │
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
                │ ▪ Last Update     │ 2025-12-11                                                                                           │
                │ ▪ Creation Date   │ 2025-12-11                                                                                           │
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
                │ ▪ Method Name     │ getDifferenceOfDateTimeTZString                                                                      │
                ├───────────────────┼──────────────────────────────────────────────────────────────────────────────────────────────────────┤
                │ ▪ Version         │ 1.0000.0000001                                                                                       │
                │ ▪ Last Update     │ 2025-12-16                                                                                           │
                │ ▪ Creation Date   │ 2025-09-12                                                                                           │
                │ ▪ Description     │ Mendapatkan Interval Date Time String With Timezone                                                  │
                ├───────────────────┴──────────────────────────────────────────────────────────────────────────────────────────────────────┤
                │ ▪ Input Variable  :                                                                                                      │
                │      ▪ varUserSession (mixed - Mandatory) ► User Session                                                                 │
                │      ▪ varStartDateTimeTZ (string - Mandatory) ► Start DateTimeTZ                                                        │
                │      ▪ varFinishDateTimeTZ (string - Mandatory) ► Finish DateTimeTZ                                                      │
                │      ------------------------------                                                                                      │
                │ ▪ Output Variable :                                                                                                      │
                │      ▪ varReturn (string)                                                                                                │
                ├──────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────┤
                │ ▪ Linked Function :                                                                                                      │
                │      ▪                                                                                                                   │
                └──────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────┘
                */
                public static function
                    getDifferenceOfDateTimeTZString (
                        mixed $varUserSession,
                        string $varStartDateTimeTZ, string $varFinishDateTimeTZ
                        )
                            {
                            //-----[ DATA INITIALIZATION ]-------------------------------------------------------------------( START )-----
                                //---> Initializing : varReturn
                                    $varReturn =
                                        (string) null;

                                //---> Initializing : varStartDateTimeTZ
                                    $varStartDateTimeTZ =
                                        str_replace (
                                            'T',
                                            ' ',
                                            $varStartDateTimeTZ
                                            );

                                //---> Initializing : varFinishDateTimeTZ
                                    $varFinishDateTimeTZ =
                                        str_replace (
                                            'T',
                                            ' ',
                                            $varFinishDateTimeTZ
                                            );

                                //---> Initializing : varStartDateTimeArray
                                    $varStartDateTimeArray =
                                        explode (
                                            '.',
                                            $varStartDateTimeTZ
                                            );

                                //---> Initializing : varFinishDateTimeArray
                                    $varFinishDateTimeArray =
                                        explode (
                                            '.',
                                            $varFinishDateTimeTZ
                                            );

                            //-----[ DATA INITIALIZATION ]-------------------------------------------------------------------(  END  )-----

                            //-----[ DATA PROCESS ]--------------------------------------------------------------------------( START )-----
                                try {
                                    //---> Initializing : varStartDateTimeOffset, varStartDateTimeMicroSecond
                                        try {
                                            $varStartDateTimeOffset = (
                                                1 * (float) explode('+', $varStartDateTimeArray[1])[1]
                                                );

                                            $varStartDateTimeMicroSecond = (
                                                (float) ('0.'.explode('+', $varStartDateTimeArray[1])[0])
                                                );
                                            }

                                        catch (\Exception $ex) {
                                            try {
                                                $varStartDateTimeOffset = (
                                                    -1 * (float) explode('-', $varStartDateTimeArray[1])[1]
                                                    );

                                                $varStartDateTimeMicroSecond = (
                                                    (float) ('0.'.explode('-', $varStartDateTimeArray[1])[0])
                                                    );
                                                }

                                            catch (\Exception $ex) {
                                                $varStartDateTimeOffset = (
                                                    (float) 0
                                                    );

                                                $varStartDateTimeMicroSecond = (
                                                    (float) 0
                                                    );
                                                }
                                            }

                                    //---> Initializing : varFinishDateTimeOffset, varFinishDateTimeMicroSecond
                                        try {
                                            $varFinishDateTimeOffset = (
                                                1 * (float) explode('+', $varFinishDateTimeArray[1])[1]
                                                );

                                            $varFinishDateTimeMicroSecond = (
                                                (float) ('0.'.explode('+', $varFinishDateTimeArray[1])[0])
                                                );
                                            }

                                        catch (\Exception $ex) {
                                            try {
                                                $varFinishDateTimeOffset = (
                                                    -1 * (float) explode('-', $varFinishDateTimeArray[1])[1]
                                                    );

                                                $varFinishDateTimeMicroSecond = (
                                                    (float) ('0.'.explode('-', $varFinishDateTimeArray[1])[0])
                                                    );
                                                }

                                            catch (\Exception $ex) {
                                                $varFinishDateTimeOffset = (float) 0;

                                                $varFinishDateTimeMicroSecond = (float) 0;
                                                }
                                            }

                                    //---> Initializing : varUniversalSecondsDifference
                                        $varUniversalSecondsDifference = (
                                                (
                                                    ((((float) (self::getUnixTime($varUserSession, $varFinishDateTimeArray[0]) + ($varFinishDateTimeOffset * 3600))) + $varFinishDateTimeMicroSecond) * 1000000)
                                                    -
                                                    ((((float) (self::getUnixTime($varUserSession, $varStartDateTimeArray[0]) + ($varStartDateTimeOffset * 3600))) + $varStartDateTimeMicroSecond) * 1000000)
                                                ) / 1000000
                                            );
                                        //dd($varUniversalSecondsDifference);

                                    //---> Initializing : varIntervalRemain
                                        $varIntervalRemain =
                                            $varUniversalSecondsDifference;

                                    //---> Initializing : varHoursDifference, varMinutesDifference, varSecondsDifference, varMicroSecondsDifference
                                        $varHoursDifference = (
                                            ((int) $varIntervalRemain - ((int) $varIntervalRemain % 3600)) / 3600
                                            );

                                        $varIntervalRemain = (
                                            $varIntervalRemain - ($varHoursDifference * 3600)
                                            );

                                        $varMinutesDifference = (
                                            ((int) $varIntervalRemain - ((int) $varIntervalRemain % 60)) / 60
                                            );

                                        $varIntervalRemain = (
                                            $varIntervalRemain - ($varMinutesDifference * 60)
                                            );

                                        $varSecondsDifference = (
                                            (int) $varIntervalRemain
                                            );

                                        try {
                                            $varMicroSecondsDifference = (
                                                explode (
                                                    '.',
                                                    $varUniversalSecondsDifference
                                                    )[1]
                                                );
                                            }

                                        catch (\Exception $ex) {
                                            $varMicroSecondsDifference =
                                                0;
                                            }

                                    //---> Reinitializing : varReturn
                                        $varReturn = (
                                            str_pad ($varHoursDifference, 2, '0', STR_PAD_LEFT).':'.
                                            str_pad ($varMinutesDifference, 2, '0', STR_PAD_LEFT).':'.
                                            str_pad ($varSecondsDifference, 2, '0', STR_PAD_LEFT).'.'.
                                            str_pad ($varMicroSecondsDifference, 6, '0', STR_PAD_RIGHT)
                                            );
                                    }

                                catch (\Exception $ex) {
                                    }
                            //-----[ DATA PROCESS ]--------------------------------------------------------------------------(  END  )-----

                            //-----[ DATA RETURN ]---------------------------------------------------------------------------( START )-----
                                return
                                    $varReturn;
                            //-----[ DATA RETURN ]---------------------------------------------------------------------------(  END  )-----
                            }


                /*
                ┌───────────────────┬──────────────────────────────────────────────────────────────────────────────────────────────────────┐
                │ ▪ Method Name     │ getGMTDateTime                                                                                       │
                ├───────────────────┼──────────────────────────────────────────────────────────────────────────────────────────────────────┤
                │ ▪ Version         │ 1.0000.0000001                                                                                       │
                │ ▪ Last Update     │ 2025-12-16                                                                                           │
                │ ▪ Creation Date   │ 2020-08-03                                                                                           │
                │ ▪ Description     │ Mendapatkan tanggal dan waktu GMT (Time Zone Offset 0) saat ini                                      │
                ├───────────────────┴──────────────────────────────────────────────────────────────────────────────────────────────────────┤
                │ ▪ Input Variable  :                                                                                                      │
                │      ▪ varUserSession (mixed - Mandatory) ► User Session                                                                 │
                │      ------------------------------                                                                                      │
                │      ▪ varDateTimeFormat (string - Optional) ► Format penulisan waktu                                                    │
                │      ▪ varUnixTime (int - Optional) ► Waktu Unix                                                                         │
                │ ▪ Output Variable :                                                                                                      │
                │      ▪ (string) varReturn                                                                                                │
                ├──────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────┤
                │ ▪ Linked Function :                                                                                                      │
                │      ▪                                                                                                                   │
                └──────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────┘
                */
                public static function
                    getGMTDateTime (
                        mixed $varUserSession,
                        string $varDateTimeFormat = null, int $varUnixTime = null
                        )
                            {
                            //-----[ DATA INITIALIZATION ]-------------------------------------------------------------------( START )-----
                                //---> Initializing : varReturn
                                    $varReturn =
                                        (string) null;
                            //-----[ DATA INITIALIZATION ]-------------------------------------------------------------------(  END  )-----

                            //-----[ DATA PROCESS ]--------------------------------------------------------------------------( START )-----
                                try {
                                    if (!$varDateTimeFormat)
                                        {
                                        $varDateTimeFormat =
                                            'Y-m-d H:i:s';
                                        }
                                    if (!$varUnixTime)
                                        {
                                        $varReturn =
                                            gmdate (
                                                $varDateTimeFormat
                                                );
                                        }
                                    else
                                        {
                                        $varReturn =
                                            gmdate (
                                                $varDateTimeFormat,
                                                $varUnixTime
                                                );
                                        }

                                    }

                                catch (\Exception $ex) {
                                    }

                            //---> Data Return
                                return
                                    $varReturn;
                            }


                /*
                ┌───────────────────┬──────────────────────────────────────────────────────────────────────────────────────────────────────┐
                │ ▪ Method Name     │ getTimeStampTZConvert_PHPDateTimeToDateTimeTZString                                                  │
                ├───────────────────┼──────────────────────────────────────────────────────────────────────────────────────────────────────┤
                │ ▪ Version         │ 1.0000.0000001                                                                                       │
                │ ▪ Last Update     │ 2025-12-16                                                                                           │
                │ ▪ Creation Date   │ 2025-09-12                                                                                           │
                │ ▪ Description     │ Mengkonversi PHP Date Time ke Date Time String With Timezone                                         │
                ├───────────────────┴──────────────────────────────────────────────────────────────────────────────────────────────────────┤
                │ ▪ Input Variable  :                                                                                                      │
                │      ▪ varUserSession (mixed - Mandatory) ► User Session                                                                 │
                │      ▪ varPHPDateTime (\DateTime - Mandatory) ► PHP DateTime                                                             │
                │      ------------------------------                                                                                      │
                │      ▪ varTimeZoneOffset (int - Optional) ► Time Zone Offset                                                             │
                │ ▪ Output Variable :                                                                                                      │
                │      ▪ varReturn (string)                                                                                                │
                ├──────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────┤
                │ ▪ Linked Function :                                                                                                      │
                │      ▪                                                                                                                   │
                └──────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────┘
                */
                public static function
                    getTimeStampTZConvert_PHPDateTimeToDateTimeTZString (
                        mixed $varUserSession, \DateTime $varPHPDateTime,
                        int $varTimeZoneOffset = null
                        )
                            {
                            //---> Data Initialization
                                $varReturn =
                                    (string) null;

                            //---> Data Process
                                try {
                                    if ($varTimeZoneOffset === null) {
                                        $varTimeZoneOffset =
                                            self::getTimeZoneOffset (
                                                $varUserSession
                                                );

                                        $varReturn = (
                                            $varPHPDateTime->format ('Y-m-d H:i:s.u').
                                            (
                                                (
                                                    (
                                                    (int) explode (
                                                        ':',
                                                        $varTimeZoneOffset
                                                        )[0]
                                                    ) * 1
                                                ) >= 0 
                                            ?
                                            '+'
                                            :
                                            '-'
                                            ).
                                            $varTimeZoneOffset
                                            );
                                        }
                                    }

                                catch (\Exception $ex) {
                                    }

                            //---> Data Return
                                return
                                    $varReturn;
                            }


                /*
                ┌───────────────────┬──────────────────────────────────────────────────────────────────────────────────────────────────────┐
                │ ▪ Method Name     │ getTimeZoneOffset                                                                                    │
                ├───────────────────┼──────────────────────────────────────────────────────────────────────────────────────────────────────┤
                │ ▪ Version         │ 1.0000.0000001                                                                                       │
                │ ▪ Last Update     │ 2025-12-16                                                                                           │
                │ ▪ Creation Date   │ 2025-09-22                                                                                           │
                │ ▪ Description     │ Mendapatkan Time Zone Offset dari suatu Zone (varZone)                                               │
                ├───────────────────┴──────────────────────────────────────────────────────────────────────────────────────────────────────┤
                │ ▪ Input Variable  :                                                                                                      │
                │      ▪ varUserSession (mixed) ► User Session                                                                             │
                │      ------------------------------                                                                                      │
                │      ▪ varZone (string) ► Zone                                                                                           │
                │ ▪ Output Variable :                                                                                                      │
                │      ▪ varReturn (string)                                                                                                │
                ├──────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────┤
                │ ▪ Linked Function :                                                                                                      │
                │      ▪                                                                                                                   │
                └──────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────┘
                */
                public static function
                    getTimeZoneOffset (
                        mixed $varUserSession,
                        string $varZone = null
                        )
                            {
                            //---> Data Initialization
                                $varReturn =
                                    (string) null;

                            //---> Data Process
                                try {
                                    if (!$varZone)
                                        {
                                        $varZone =
                                            'Asia/Jakarta';
                                        }
                                    else
                                        {
                                        try {
                                            $varTemp =
                                                explode (
                                                    ':',
                                                    $varZone
                                                    );

                                            $varReturn = (
                                                str_pad($varTemp[0], 2, '0', STR_PAD_LEFT).
                                                ':'.
                                                str_pad($varTemp[1], 2, '0', STR_PAD_LEFT)
                                                );
                                            } 

                                        catch (\Exception $ex) {
                                            try {
                                                $varReturn = (
                                                    str_pad (
                                                        ((int) ($varTemp[0]) * 1),
                                                        2,
                                                        '0',
                                                        STR_PAD_LEFT
                                                        ).
                                                    ':'.
                                                    '00'
                                                    );                                    
                                                }

                                            catch (\Exception $ex) {
                                                $varReturn = null;
                                                }
                                            }
                                        }

                                    if ($varReturn == null) {
                                        $varLocalDateTimeZone =
                                            new \DateTimeZone(
                                               $varZone
                                               );

                                        $varDateTimeLocal =
                                            new \DateTime (
                                               "now",
                                               $varLocalDateTimeZone
                                               );

                                        $varRemainInSeconds =
                                            ($varLocalDateTimeZone->getOffset($varDateTimeLocal));

                                        //$varRemainInSeconds += (30 * 60);

                                        $varHoursTimeOffset = 
                                            (int) ($varRemainInSeconds / (60*60));

                                        $varRemainInSeconds = 
                                            $varRemainInSeconds - ($varHoursTimeOffset * (60 * 60));

                                        $varMinutesTimeOffset = 
                                            (int) ($varRemainInSeconds / 60);

                                        $varRemainInSeconds = 
                                            $varRemainInSeconds - ($varMinutesTimeOffset * (60));

                                        $varReturn = (
                                            str_pad ($varHoursTimeOffset, 2, '0', STR_PAD_LEFT).
                                            ':'.
                                            str_pad ($varMinutesTimeOffset, 2, '0', STR_PAD_LEFT)
                                            );
                                        }
                                    }
                                catch (\Exception $ex) {
                                    }

                            //---> Data Return
                                return
                                    $varReturn;
                            }


                /*
                ┌───────────────────┬──────────────────────────────────────────────────────────────────────────────────────────────────────┐
                │ ▪ Method Name     │ getUnixTime                                                                                          │
                ├───────────────────┼──────────────────────────────────────────────────────────────────────────────────────────────────────┤
                │ ▪ Version         │ 1.0000.0000002                                                                                       │
                │ ▪ Last Update     │ 2025-12-16                                                                                           │
                │ ▪ Creation Date   │ 2020-08-03                                                                                           │
                │ ▪ Description     │ Mendapatkan UnixTime                                                                                 │
                ├───────────────────┴──────────────────────────────────────────────────────────────────────────────────────────────────────┤
                │ ▪ Input Variable  :                                                                                                      │
                │      ▪ varUserSession (mixed - Mandatory) ► User Session                                                                 │
                │      ------------------------------                                                                                      │
                │      ▪ varDateTimeString (string - Optional) ► Date Time String                                                          │
                │ ▪ Output Variable :                                                                                                      │
                │      ▪ varReturn (int)                                                                                                   │
                ├──────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────┤
                │ ▪ Linked Function :                                                                                                      │
                │      ▪                                                                                                                   │
                └──────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────┘
                */
                public static function
                    getUnixTime (
                        mixed $varUserSession,
                        string $varDateTimeString = null
                        )
                            {
                            //---> Data Initialization
                                $varReturn =
                                    (int) null;

                            //---> Data Process
                                try {
                                    if (!$varDateTimeString)
                                        {
                                        $varReturn = time();
                                        }
                                    else
                                        {
                                        try {
                                            $varMicroSecond =
                                                str_replace (
                                                    ' ',
                                                    '',
                                                    (
                                                    explode (
                                                        '-',
                                                        (
                                                        explode (
                                                            '+',
                                                            (
                                                            explode (
                                                                '.',
                                                                $varDateTimeString
                                                                )
                                                            )[1]
                                                            )
                                                        )[0]
                                                        )
                                                    )[0]
                                                    );                            
                                            }

                                        catch (\Exception $ex) {
                                            $varMicroSecond = null;
                                            }

                                        $varReturn =
                                            strtotime (
                                                $varDateTimeString
                                                ).
                                            (
                                            !$varMicroSecond
                                            ? 
                                            ''
                                            :
                                            '.'.
                                            $varMicroSecond
                                            );
                                        //$varReturn=strtotime($varDateTimeString);
                                        }
                                    }

                                catch (\Exception $ex) {
                                    }

                            //---> Data Return
                                return
                                    $varReturn;
                            }
                }
        }