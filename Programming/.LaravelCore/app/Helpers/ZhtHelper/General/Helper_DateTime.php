<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Helpers                                                                                                   |
| ▪ Name Space : \App\Helpers\ZhtHelper\General                                                                                    |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2020 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Helpers\ZhtHelper\General
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : Helper_DateTime                                                                                              |
    | ▪ Description : Menangani Tanggal dan Waktu                                                                                  |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class Helper_DateTime
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | Class Properties                                                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        private static $varNameSpace;


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-07-17                                                                                           |
        | ▪ Creation Date   : 2020-07-17                                                                                           |
        | ▪ Description     : System's Default Constructor                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function __construct()
            {
            }

            
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __destruct                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-07-17                                                                                           |
        | ▪ Creation Date   : 2020-07-17                                                                                           |
        | ▪ Description     : System's Default Destructor                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function __destruct()
            {
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : init                                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-07-13                                                                                           |
        | ▪ Creation Date   : 2020-07-13                                                                                           |
        | ▪ Description     : Inisialisasi                                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function init()
            {
            self::$varNameSpace=get_class();
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDateConvertion_YYYYMMDDToDDMMYYYY                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-05-03                                                                                           |
        | ▪ Creation Date   : 2023-05-03                                                                                           |
        | ▪ Description     : Mengkonversi Tanggal dari Format YYYY-MM-DD ke DD-MM-YYYY                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ------------------------------                                                                                      |
        |      ▪ (mixed)  varOriginalDate ► Original Date                                                                          |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (int)    varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getDateConvertion_YYYYMMDDToDDMMYYYY($varUserSession, $varOriginalDate)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Get Date Convertion From YYYY-MM-DD To DD-MM-YYYY');
                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    $varTimeStamp = strtotime($varOriginalDate);
                    $varNewDate = date("d-m-Y", $varTimeStamp);
                    $varReturn = $varNewDate;
                    //---- ( MAIN CODE ) ----------------------------------------------------------------------- [ END POINT ] -----
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Success');
                    } 
                catch (\Exception $ex) {
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Failed, '. $ex->getMessage());
                    }
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
                }
            catch (\Exception $ex) {
                }
            return \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getCurrentDateTimeString                                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-05-04                                                                                           |
        | ▪ Creation Date   : 2021-05-04                                                                                           |
        | ▪ Description     : Mendapatkan Waktu Saat Ini                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getCurrentDateTimeString($varUserSession)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);

            try {
                $varSysDataProcess =
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__,
                        'Get Current Date Time'
                        );

                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                        $varReturn = 
                            self::getDateTimeFromUnixTime($varUserSession, self::getUnixTime($varUserSession)).
                            '.'.
                            self::getMicroTime($varUserSession);

                    //---- ( MAIN CODE ) ----------------------------------------------------------------------- [ END POINT ] -----
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Success');
                    } 

                catch (\Exception $ex) {
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Failed, '. $ex->getMessage());
                    }

                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
                }

            catch (\Exception $ex) {
                }

            return
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getCurrentDateTimeStringWithTimeZone                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-09-12                                                                                           |
        | ▪ Creation Date   : 2025-09-12                                                                                           |
        | ▪ Description     : Mendapatkan Waktu Saat Ini beserta Time Zone nya                                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getCurrentDateTimeStringWithTimeZone($varUserSession)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);

            try {
                $varSysDataProcess =
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__,
                        'Get Current Date Time With Time Zone'
                        );

                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                        $varReturn = 
                            self::getDateTimeFromUnixTime($varUserSession, self::getUnixTime($varUserSession)).
                            '.'.
                            self::getMicroTime($varUserSession).
                            (
                                (
                                (((int) self::getTimeZoneOffset($varUserSession)) >= 0) ?
                                    '+' : '-'
                                ).
                                str_pad(self::getTimeZoneOffset($varUserSession), 2, '0', STR_PAD_LEFT)
                            )
                            ;

                    //---- ( MAIN CODE ) ----------------------------------------------------------------------- [ END POINT ] -----
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Success');
                    } 

                catch (\Exception $ex) {
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Failed, '. $ex->getMessage());
                    }

                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
                }

            catch (\Exception $ex) {
                }

            return
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDateFromIndonesianDateString                                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-02-02                                                                                           |
        | ▪ Creation Date   : 2021-02-02                                                                                           |
        | ▪ Description     : Mengkonversi Tanggal dalam format Indonesia kedalam Data Tanggal                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ------------------------------                                                                                      |
        |      ▪ (stirng) varIndonesianDateString ► Tanggal Format Indonesia                                                       |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getDateFromIndonesianDateString($varUserSession, string $varIndonesianDateString)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Convert Indonesia Date to Date');
                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    $varReturn = explode(' ', trim($varIndonesianDateString));
                    $varReturn = 
                        str_pad((int) trim($varReturn[2]), 4, '0', STR_PAD_LEFT).
                        '-'.
                        (strcmp((string) trim($varReturn[1]), 'Januari')==0 ? '01' : 
                            ((strcmp((string) trim($varReturn[1]), 'Februari')==0 || strcmp((string) trim($varReturn[1]), 'Pebruari')==0) ? '02' : 
                                (strcmp((string) trim($varReturn[1]), 'Maret')==0 ? '03' : 
                                    (strcmp((string) trim($varReturn[1]), 'April')==0 ? '04' : 
                                        (strcmp((string) trim($varReturn[1]), 'Mei')==0 ? '05' : 
                                            (strcmp((string) trim($varReturn[1]), 'Juni')==0 ? '06' : 
                                                (strcmp((string) trim($varReturn[1]), 'Juli')==0 ? '07' : 
                                                    (strcmp((string) trim($varReturn[1]), 'Agustus')==0 ? '08' : 
                                                        (strcmp((string) trim($varReturn[1]), 'September')==0 ? '09' : 
                                                            (strcmp((string) trim($varReturn[1]), 'Oktober')==0 ? '10' : 
                                                                (strcmp((string) trim($varReturn[1]), 'November')==0 ? '11' : 
                                                                    (strcmp((string) trim($varReturn[1]), 'Desember')==0 ? '12' : 
                                                                        ''
                        )))))))))))).
                        '-'.
                        str_pad((int) trim($varReturn[0]), 2, '0', STR_PAD_LEFT);
                    //---- ( MAIN CODE ) ----------------------------------------------------------------------- [ END POINT ] -----
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Success');
                    } 
                catch (\Exception $ex) {
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Failed, '. $ex->getMessage());
                    }
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
                }
            catch (\Exception $ex) {
                }
            return \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }

                
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDateTimeFromUnixTime                                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000002                                                                                       |
        | ▪ Last Update     : 2020-08-03                                                                                           |
        | ▪ Creation Date   : 2020-08-03                                                                                           |
        | ▪ Description     : Mendapatkan tanggal dan waktu dari UnixTime (varUnixTime)                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ------------------------------                                                                                      |
        |      ▪ (float)  varUnixTime ► Unix Time                                                                                  |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getDateTimeFromUnixTime($varUserSession, float $varUnixTime, $varDateTimeFormat=null)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Convert UnixTime `'.$varUnixTime.'` to DateTime');
                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    if(!$varDateTimeFormat)
                        {
                        $varDateTimeFormat = 'Y-m-d H:i:s';
                        }
                    $varReturn = date($varDateTimeFormat, $varUnixTime);
                    //---- ( MAIN CODE ) ----------------------------------------------------------------------- [ END POINT ] -----
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Success');
                    } 
                catch (\Exception $ex) {
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Failed, '. $ex->getMessage());
                    }
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
                }
            catch (\Exception $ex) {
                }
            return \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getConvertPHPDateTimeToDateTimeTZString                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-09-12                                                                                           |
        | ▪ Creation Date   : 2025-09-12                                                                                           |
        | ▪ Description     : Mengkonversi PHP Date Time ke Date Time String With Timezone                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varStartDateTimeTZ ► Start DateTimeTZ                                                                    |
        |      ▪ (string) varFinishDateTimeTZ ► Finish DateTimeTZ                                                                  |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getConvertPHPDateTimeToDateTimeTZString(
            $varUserSession, \DateTime $varPHPDateTime,
            int $varTimzZoneOffset = null
            )
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);

            try {
                $varSysDataProcess =
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__,
                        'Get Convertion PHP Date Time to Date Time With Time Zone String'
                        );

                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                        if ($varTimzZoneOffset === null) {
                            $varTimzZoneOffset = self::getTimeZoneOffset($varUserSession);
                            }

                        $varReturn = (
                            $varPHPDateTime->format('Y-m-d H:i:s.u').
                            ($varTimzZoneOffset >= 0 ? '+' : '-').
                            str_pad($varTimzZoneOffset, 2, '0', STR_PAD_LEFT)                
                            );

                    //---- ( MAIN CODE ) ----------------------------------------------------------------------- [ END POINT ] -----
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Success');
                    }

                catch (\Exception $ex) {
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Failed, '. $ex->getMessage());
                    }

                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
                }

            catch (\Exception $ex) {
                }

            return
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getAdditionOfDateTimeTZStringWithIntervalString                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-09-15                                                                                           |
        | ▪ Creation Date   : 2025-09-15                                                                                           |
        | ▪ Description     : Mendapatkan Penambahan Antara DateTimeTZ String dengan Interval String                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varDateTimeTZString ► Date Time TZ                                                                       |
        |      ▪ (string) varIntervalString ► Interval                                                                             |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getAdditionOfDateTimeTZStringWithIntervalString($varUserSession, string $varDateTimeTZString, string $varIntervalString)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);

            try {
                $varSysDataProcess =
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__,
                        'Get Addition of DateTimeTZ String With Interval String'
                        );

                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    $varData = explode(' ', $varDateTimeTZString);

                    try {
                        $varTimeZone =
                            '-'.explode('-', $varData[count($varData)-1])[1];            
                        } 
                    catch (\Exception $ex) {
                        $varTimeZone = 
                            '+'.explode('+', $varData[count($varData)-1])[1];
                        }

                    $varData = [
                        'Date' => $varData[0],
                        'Time' => substr($varData[1], 0, (strlen($varData[1])-strlen($varTimeZone))),
                        'OffsetZone' => $varTimeZone
                        ];

                    $varReturn = new \DateTime();
                    $varReturn->setTimestamp(
                        strtotime($varData['Date'].' 00:00:00')
                        );

                    //dd($varData['Time']);
                    $varTemp = explode(':', $varData['Time']);
                    //dd($varTemp);
                    $varDateTimeTZMicroSeconds = (
                        ((float) $varTemp[0] * (60 * 60 * 1000000)) +
                        ((float) $varTemp[1] * (60 * 1000000)) +
                        ((float) $varTemp[2] * (1 * 1000000))
                        );
                    //dd($varDateTimeTZMicroSeconds);

                    //dd($varIntervalString);
                    $varTemp = explode(':', $varIntervalString);
                    //dd($varTemp);
                    $varIntervalInMicroSeconds = (
                        ((float) $varTemp[0] * (60 * 60 * 1000000)) +
                        ((float) $varTemp[1] * (60 * 1000000)) +
                        ((float) (explode('.', $varTemp[2])[0]) * (1 * 1000000)) +
                        ((float) (explode('.', $varTemp[2])[1]))
                        );
                    //dd($varIntervalInMicroSeconds);

                    $varAdditionalMicroSecond = (
                        $varDateTimeTZMicroSeconds + 
                        $varIntervalInMicroSeconds
                        );

                    $varReturn->add(new \DateInterval(
                        'PT'.
                        (
                        (($varAdditionalMicroSecond - ($varAdditionalMicroSecond % 1000000)) / 1000000)
                        //(($varFinishDateTime_MicroSeconds > 1) ? 1 : 0)
                        ).
                        'S'
                        ));

                    $varReturn = (
                        $varReturn->format('Y-m-d H:i:s').'.'.
                        str_pad(($varAdditionalMicroSecond % 1000000), 6, '0', STR_PAD_RIGHT).
                        $varTimeZone
                        );

                    //---- ( MAIN CODE ) ----------------------------------------------------------------------- [ END POINT ] -----
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Success');
                    }

                catch (\Exception $ex) {
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Failed, '. $ex->getMessage());
                    }

                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
                }

            catch (\Exception $ex) {
                }

            return
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getAdditionOfIntervalString                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-09-16                                                                                           |
        | ▪ Creation Date   : 2025-09-16                                                                                           |
        | ▪ Description     : Mendapatkan Penjumlahan Antara Dua Data Interval String                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ------------------------------                                                                                      |
        |      ▪ (string) $varFirstIntervalString ► Interval                                                                       |
        |      ▪ (string) $varSecondIntervalString ► Interval                                                                      |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getAdditionOfIntervalString($varUserSession, string $varFirstIntervalString, string $varSecondIntervalString)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);

            try {
                $varSysDataProcess =
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__,
                        'Get Addition of Interval String'
                        );

                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                        $varTemp = explode(':', $varFirstIntervalString);
                        $varFirstIntervalInSeconds = (
                            ((float) $varTemp[0] * (60 * 60 * 1000000)) +
                            ((float) $varTemp[1] * (60 * 1000000)) +
                            ((float) $varTemp[2] * (1 * 1000000))
                            );

                        $varTemp = explode(':', $varSecondIntervalString);
                        $varSecondIntervalInSeconds = (
                            ((float) $varTemp[0] * (60 * 60 * 1000000)) +
                            ((float) $varTemp[1] * (60 * 1000000)) +
                            ((float) $varTemp[2] * (1 * 1000000))
                            );

                        $varReturn =
                            $varFirstIntervalInSeconds + $varSecondIntervalInSeconds;

                        $varHoursDifference = (int) (($varReturn - (((int) $varReturn) % (60 * 60 * 1000000))) / (60 * 60 * 1000000));
                        $varReturn = $varReturn - ($varHoursDifference * (60 * 60 * 1000000));

                        $varMinutesDifference = (int) (($varReturn - (((int) $varReturn) % (60 * 1000000))) / (60 * 1000000));
                        $varReturn = $varReturn - ($varMinutesDifference * (60 * 1000000));

                        $varSecondsDifference = (int) (($varReturn - (((int) $varReturn) % (1000000))) / (1000000));

                        $varMicroSecondsDifference = $varReturn;

                        $varReturn = (
                            str_pad($varHoursDifference, 2, '0', STR_PAD_LEFT).':'.
                            str_pad($varMinutesDifference, 2, '0', STR_PAD_LEFT).':'.
                            str_pad($varSecondsDifference, 2, '0', STR_PAD_LEFT).'.'.
                            str_pad($varMicroSecondsDifference, 6, '0', STR_PAD_LEFT)
                            );

                    //---- ( MAIN CODE ) ----------------------------------------------------------------------- [ END POINT ] -----
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Success');
                    }

                catch (\Exception $ex) {
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Failed, '. $ex->getMessage());
                    }

                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
                }

            catch (\Exception $ex) {
                }

            return
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDifferenceOfIntervalString                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-09-15                                                                                           |
        | ▪ Creation Date   : 2025-09-15                                                                                           |
        | ▪ Description     : Mendapatkan Selisih Antara Dua Data Interval String                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ------------------------------                                                                                      |
        |      ▪ (string) $varFirstIntervalString ► Interval                                                                       |
        |      ▪ (string) $varSecondIntervalString ► Interval                                                                      |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getDifferenceOfIntervalString($varUserSession, string $varFirstIntervalString, string $varSecondIntervalString)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);

            try {
                $varSysDataProcess =
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__,
                        'Get Difference of Interval String'
                        );

                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                        $varTemp = explode(':', $varFirstIntervalString);
                        $varFirstIntervalInSeconds = (
                            ((float) $varTemp[0] * (60 * 60 * 1000000)) +
                            ((float) $varTemp[1] * (60 * 1000000)) +
                            ((float) $varTemp[2] * (1 * 1000000))
                            );

                        $varTemp = explode(':', $varSecondIntervalString);
                        $varSecondIntervalInSeconds = (
                            ((float) $varTemp[0] * (60 * 60 * 1000000)) +
                            ((float) $varTemp[1] * (60 * 1000000)) +
                            ((float) $varTemp[2] * (1 * 1000000))
                            );

                        $varReturn = (
                            ($varFirstIntervalInSeconds > $varSecondIntervalInSeconds) ?
                                ($varFirstIntervalInSeconds - $varSecondIntervalInSeconds) :
                                ($varSecondIntervalInSeconds - $varFirstIntervalInSeconds)
                            );

                        $varHoursDifference = (int) (($varReturn - (((int) $varReturn) % (60 * 60 * 1000000))) / (60 * 60 * 1000000));
                        $varReturn = $varReturn - ($varHoursDifference * (60 * 60 * 1000000));

                        $varMinutesDifference = (int) (($varReturn - (((int) $varReturn) % (60 * 1000000))) / (60 * 1000000));
                        $varReturn = $varReturn - ($varMinutesDifference * (60 * 1000000));

                        $varSecondsDifference = (int) (($varReturn - (((int) $varReturn) % (1000000))) / (1000000));

                        $varMicroSecondsDifference = $varReturn;

                        $varReturn = (
                            str_pad($varHoursDifference, 2, '0', STR_PAD_LEFT).':'.
                            str_pad($varMinutesDifference, 2, '0', STR_PAD_LEFT).':'.
                            str_pad($varSecondsDifference, 2, '0', STR_PAD_LEFT).'.'.
                            str_pad($varMicroSecondsDifference, 6, '0', STR_PAD_LEFT)
                            );

                    //---- ( MAIN CODE ) ----------------------------------------------------------------------- [ END POINT ] -----
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Success');
                    }

                catch (\Exception $ex) {
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Failed, '. $ex->getMessage());
                    }

                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
                }

            catch (\Exception $ex) {
                }

            return
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDifferenceOfDateTimeTZString                                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-09-12                                                                                           |
        | ▪ Creation Date   : 2025-09-12                                                                                           |
        | ▪ Description     : Mendapatkan Interval Date Time String With Timezone                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varStartDateTimeTZ ► Start DateTimeTZ                                                                    |
        |      ▪ (string) varFinishDateTimeTZ ► Finish DateTimeTZ                                                                  |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getDifferenceOfDateTimeTZString($varUserSession, string $varStartDateTimeTZ, string $varFinishDateTimeTZ)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);

            try {
                $varSysDataProcess =
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__,
                        'Get Date Time With Time Zone String Difference Interval'
                        );

                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                        $varStartDateTimeArray = explode('.', $varStartDateTimeTZ);
                        $varStartDateTimeArray = explode('.', $varStartDateTimeTZ);
                        $varFinishDateTimeArray = explode('.', $varFinishDateTimeTZ);

                        try {
                            $varStartDateTimeOffset = (1 * (float) explode('+', $varStartDateTimeArray[1])[1]);
                            $varStartDateTimeMicroSecond = ((float) ('0.'.explode('+', $varStartDateTimeArray[1])[0]));
                            }
                        catch (\Exception $ex) {
                            try {
                                $varStartDateTimeOffset = (-1 * (float) explode('-', $varStartDateTimeArray[1])[1]);
                                $varStartDateTimeMicroSecond = ((float) ('0.'.explode('-', $varStartDateTimeArray[1])[0]));
                                }
                            catch (\Exception $ex) {
                                $varStartDateTimeOffset = (float) 0;
                                $varStartDateTimeMicroSecond = (float) 0;
                                }
                            }

                        try {
                            $varFinishDateTimeOffset = (1 * (float) explode('+', $varFinishDateTimeArray[1])[1]);
                            $varFinishDateTimeMicroSecond = ((float) ('0.'.explode('+', $varFinishDateTimeArray[1])[0]));
                            }
                        catch (\Exception $ex) {
                            try {
                                $varFinishDateTimeOffset = (-1 * (float) explode('-', $varFinishDateTimeArray[1])[1]);
                                $varFinishDateTimeMicroSecond = ((float) ('0.'.explode('-', $varFinishDateTimeArray[1])[0]));
                                }
                            catch (\Exception $ex) {
                                $varFinishDateTimeOffset = (float) 0;
                                $varFinishDateTimeMicroSecond = (float) 0;
                                }
                            }

                        $varUniversalSecondsDifference = (
                                    (
                                        ((((float) (self::getUnixTime($varUserSession, $varFinishDateTimeArray[0]) + ($varFinishDateTimeOffset * 3600))) + $varFinishDateTimeMicroSecond) * 1000000)
                                        -
                                        ((((float) (self::getUnixTime($varUserSession, $varStartDateTimeArray[0]) + ($varStartDateTimeOffset * 3600))) + $varStartDateTimeMicroSecond) * 1000000)
                                    ) / 1000000
                            );
                        //dd($varUniversalSecondsDifference);

                        $varIntervalRemain = $varUniversalSecondsDifference;
                        $varHoursDifference = ((int) $varIntervalRemain - ((int) $varIntervalRemain % 3600)) / 3600;
                        $varIntervalRemain = $varIntervalRemain - ($varHoursDifference * 3600);
                        $varMinutesDifference = ((int) $varIntervalRemain - ((int) $varIntervalRemain % 60)) / 60;
                        $varIntervalRemain = $varIntervalRemain - ($varMinutesDifference * 60);
                        $varSecondsDifference = (int) $varIntervalRemain;
                        
                        try {
                            $varMicroSecondsDifference = (explode('.', $varUniversalSecondsDifference)[1]);
                            }
                         catch (\Exception $ex) {
                            $varMicroSecondsDifference = 0;
                            }

                        $varReturn = (
                            str_pad($varHoursDifference, 2, '0', STR_PAD_LEFT).':'.
                            str_pad($varMinutesDifference, 2, '0', STR_PAD_LEFT).':'.
                            str_pad($varSecondsDifference, 2, '0', STR_PAD_LEFT).'.'.
                            str_pad($varMicroSecondsDifference, 6, '0', STR_PAD_RIGHT)
                            );
                    //---- ( MAIN CODE ) ----------------------------------------------------------------------- [ END POINT ] -----
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Success');
                    }

                catch (\Exception $ex) {
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Failed, '. $ex->getMessage());
                    }

                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
                }

            catch (\Exception $ex) {
                }

            return
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDateTimeStringDifference                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-05-04                                                                                           |
        | ▪ Creation Date   : 2021-05-04                                                                                           |
        | ▪ Description     : Mendapatkan Waktu Saat Ini                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varStartDateTimeTZ ► Start DateTimeTZ                                                                    |
        |      ▪ (string) varFinishDateTimeTZ ► Finish DateTimeTZ                                                                  |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getDateTimeStringDifference($varUserSession, string $varStartDateTimeTZ, string $varFinishDateTimeTZ)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);

            try {
                $varSysDataProcess =
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__,
                        'Get Date Time String Difference'
                        );

                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    $varStartDateTimeArray = explode('.', $varStartDateTimeTZ);
                    $varFinishDateTimeArray = explode('.', $varFinishDateTimeTZ);

                    $varUniversalSecondsDifference = (
                        self::getUnixTime($varUserSession, $varFinishDateTimeArray[0]) 
                        -
                        self::getUnixTime($varUserSession, $varStartDateTimeArray[0])
                        );

                    $varSecondsRemain = $varUniversalSecondsDifference;
                    $varHoursDifference = ($varSecondsRemain - ($varSecondsRemain % 3600))/3600;
                    $varSecondsRemain = $varSecondsRemain - ($varHoursDifference*3600);
                    $varMinutesDifference = ($varSecondsRemain - ($varSecondsRemain % 60))/60;
                    $varSecondsRemain = $varSecondsRemain - ($varMinutesDifference*60);
                    $varSecondsDifference = $varSecondsRemain;       
                    
                    $varReturn = 
                        str_pad($varHoursDifference, 2, '0', STR_PAD_LEFT).':'.
                        str_pad($varMinutesDifference, 2, '0', STR_PAD_LEFT).':'.
                        str_pad($varSecondsDifference, 2, '0', STR_PAD_LEFT).'.'.
                        explode('.', number_format($varUniversalSecondsDifference + ((float)('0.'.$varFinishDateTimeArray[1]) - (float)('0.'.$varStartDateTimeArray[0])), 6, '.', ','))[1];
                    //---- ( MAIN CODE ) ----------------------------------------------------------------------- [ END POINT ] -----
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Success');
                    }

                catch (\Exception $ex) {
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Failed, '. $ex->getMessage());
                    }

                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
                }

            catch (\Exception $ex) {
                }

            return
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getGMTDateTime                                                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-08-03                                                                                           |
        | ▪ Creation Date   : 2020-08-03                                                                                           |
        | ▪ Description     : Mendapatkan tanggal dan waktu GMT saat ini                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varDateTimeFormat ► Format penulisan waktu                                                               |
        |      ▪ (int)    varUnixTime ► Waktu Unix                                                                                 |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getGMTDateTime($varUserSession, $varDateTimeFormat=null, int $varUnixTime=null)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'get current GMT DateTime');
                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    if (!$varDateTimeFormat)
                        {
                        $varDateTimeFormat = 'Y-m-d H:i:s';
                        }
                    if (!$varUnixTime)
                        {
                        $varReturn = gmdate($varDateTimeFormat);
                        }
                    else
                        {
                        $varReturn = gmdate($varDateTimeFormat, $varUnixTime);
                        }
                    //---- ( MAIN CODE ) ----------------------------------------------------------------------- [ END POINT ] -----
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Success');
                    } 
                catch (\Exception $ex) {
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Failed, '. $ex->getMessage());
                    }
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
                }
            catch (\Exception $ex) {
                }
            return \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getMicroTime                                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-07-26                                                                                           |
        | ▪ Creation Date   : 2020-07-26                                                                                           |
        | ▪ Description     : Mendapatkan MicroTime                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varUserSession                                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getMicroTime($varUserSession)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Get MicroTime');
                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    $varMicroDate = microtime();
                    $varDateArray = explode(" ", $varMicroDate);
                    $varMicroSecond = substr($varDateArray[0], 2, 6);
                    $varReturn=$varMicroSecond;
                    //$varReturn=$varMicroDate;
                    //---- ( MAIN CODE ) ----------------------------------------------------------------------- [ END POINT ] -----
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Success');
                    } 
                catch (\Exception $ex) {
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Failed, '. $ex->getMessage());
                    }
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
                }
            catch (\Exception $ex) {
                }
            return \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getTimeIntervalFromUnixTime                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-09-02                                                                                           |
        | ▪ Creation Date   : 2020-09-02                                                                                           |
        | ▪ Description     : Mendapatkan interval waktu dari UnixTime (varUnixTime)                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ------------------------------                                                                                      |
        |      ▪ (float)  varUnixTime ► Unix Time                                                                                  |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getTimeIntervalFromUnixTime($varUserSession, float $varUnixTime)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Get Time Interval from UnixTime');
                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    $varSecond = explode('.', (string) $varUnixTime)[0];
                    $varMicroSecond = substr(explode('.', (string) $varUnixTime)[1], 0, 6);
                    $varReturn = str_pad((string) floor($varSecond/(60*60)), 2, '0', STR_PAD_LEFT).':'.str_pad((string) floor(($varSecond-floor($varSecond/(60*60)))/60), 2, '0', STR_PAD_LEFT).':'.str_pad((string) ($varSecond-floor(($varSecond-floor($varSecond/(60*60)))/60)), 2, '0', STR_PAD_LEFT).($varMicroSecond>0 ? '.'.$varMicroSecond: '');
                    //---- ( MAIN CODE ) ----------------------------------------------------------------------- [ END POINT ] -----
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Success');
                    } 
                catch (\Exception $ex) {
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Failed, '. $ex->getMessage());
                    }
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
                }
            catch (\Exception $ex) {
                }
            return \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getTimeStampTZConvert_GMTToOtherTimeZone                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-08-25                                                                                           |
        | ▪ Creation Date   : 2020-08-25                                                                                           |
        | ▪ Description     : Mendapatkan konversi Time Stamp with Time Zone dari GMT berdasarkan offset Time Zone                 |
        |                     (varTimeZoneOffset)                                                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varGMTDateTime ► GMT Date Time                                                                           |
        |      ▪ (int)    varTimeZoneOffset ► Time Zone Offset                                                                     |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (int)    varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getTimeStampTZConvert_GMTToOtherTimeZone($varUserSession, string $varGMTDateTime, int $varTimeZoneOffset)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Get TimeStamp with TimeZone convertion from GMT to other Time Zone');
                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    $varReturn = \App\Helpers\ZhtHelper\General\Helper_DateTime::getGMTDateTime($varUserSession, 'Y-m-d H:i:s', \App\Helpers\ZhtHelper\General\Helper_DateTime::getUnixTime($varUserSession, $varGMTDateTime)+($varTimeZoneOffset*60*60)).($varTimeZoneOffset>=0?'+':'-').str_pad($varTimeZoneOffset, 2, '0', STR_PAD_LEFT);
                    //---- ( MAIN CODE ) ----------------------------------------------------------------------- [ END POINT ] -----
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Success');
                    } 
                catch (\Exception $ex) {
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Failed, '. $ex->getMessage());
                    }
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
                }
            catch (\Exception $ex) {
                }
            return \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getTimeZoneOffset                                                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-08-25                                                                                           |
        | ▪ Creation Date   : 2020-08-25                                                                                           |
        | ▪ Description     : Mendapatkan Time Zone Offset dari suatu Zone (varZone)                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varZone ► Zone                                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (int)    varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getTimeZoneOffset($varUserSession, $varZone=null)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Get Time Zone Offset of '.($varZone ? $varZone : 'Asia/Jakarta'));
                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    if(!$varZone)
                        {
                        $varZone = 'Asia/Jakarta';
                        }
                    $varLocalDateTimeZone = new \DateTimeZone($varZone);
                    $varDateTimeLocal = new \DateTime("now", $varLocalDateTimeZone);
                    $varTimeOffset = ($varLocalDateTimeZone->getOffset($varDateTimeLocal))/(60*60);
                    $varReturn =  $varTimeOffset;
                    //---- ( MAIN CODE ) ----------------------------------------------------------------------- [ END POINT ] -----
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Success');
                    }
                catch (\Exception $ex) {
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Failed, '. $ex->getMessage());
                    }
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
                }
            catch (\Exception $ex) {
                }
            return \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getUnixTime                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2020-08-03                                                                                           |
        | ▪ Creation Date   : 2020-08-03                                                                                           |
        | ▪ Description     : Mendapatkan UnixTime                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varDateTimeString ► Date Time String                                                                     |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (int)    varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getUnixTime($varUserSession, string $varDateTimeString=null)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Get UnixTime');
                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    if(!$varDateTimeString)
                        {
                        $varReturn=time();
                        }
                    else
                        {
                        try {
                            $varMicroSecond = str_replace(' ', '', (explode('-', (explode('+', (explode('.', $varDateTimeString))[1]))[0]))[0]);                            
                            } 
                        catch (\Exception $ex) {
                            $varMicroSecond = null;
                            }
                        $varReturn=strtotime($varDateTimeString).(!$varMicroSecond ? '': '.'.$varMicroSecond);
                        //$varReturn=strtotime($varDateTimeString);
                        }
                    //---- ( MAIN CODE ) ----------------------------------------------------------------------- [ END POINT ] -----
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Success');
                    } 
                catch (\Exception $ex) {
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Failed, '. $ex->getMessage());
                    }
//$varReturn=strtotime($varDateTimeString);
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
                }
            catch (\Exception $ex) {
                }
            return \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getUnixTimeByJavaScript                                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-07-29                                                                                           |
        | ▪ Creation Date   : 2020-07-29                                                                                           |
        | ▪ Description     : Mendapatkan UnixTime melalui Java Script                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (int)    varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getUnixTimeByJavaScript($varUserSession)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Get UnixTime By JavaScript');
                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    $varReturn = (int) file_get_contents(
                        \App\Helpers\ZhtHelper\General\Helper_Network::getCurrentProtocol($varUserSession).
                        'localhost/getJSUnixTime');
                    //---- ( MAIN CODE ) ----------------------------------------------------------------------- [ END POINT ] -----
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Success');
                    } 
                catch (\Exception $ex) {
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Failed, '. $ex->getMessage());
                    }
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
                }
            catch (\Exception $ex) {
                }
            return \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }
        }
    }