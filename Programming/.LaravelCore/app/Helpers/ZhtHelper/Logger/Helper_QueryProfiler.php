<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Helpers                                                                                                   |
| ▪ Name Space : \App\Helpers\ZhtHelper\Logger                                                                                     |
|                                                                                                                                  |
| ▪ Description : Request-scoped database query profiler. Captures duration of each DB call made through Helper_PostgreSQL          |
|                 (both Laravel-facade and raw pg_* paths) and exposes an aggregated snapshot for the audit/Loki sink in the        |
|                 terminate middleware.                                                                                             |
+----------------------------------------------------------------------------------------------------------------------------------+
*/

namespace App\Helpers\ZhtHelper\Logger
    {

    class Helper_QueryProfiler
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | Class Properties                                                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        private static $varEnabled       = null;
        private static $varCaptureSQL    = null;
        private static $varMaxSQLLength  = null;
        private static $varMaxEntries    = null;
        private static $varEntries       = [];
        private static $varTotalCount    = 0;
        private static $varTotalDuration = 0.0;


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : isEnabled                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Description     : Cek apakah profiler aktif. Memoized ke property statik untuk seumur hidup proses.                    |
        |                     Default ON. Matikan via env DB_QUERY_PROFILER_ENABLED=false.                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (bool) varReturn                                                                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function isEnabled()
            {
            if (self::$varEnabled === null)
                {
                self::$varEnabled       = filter_var(env('DB_QUERY_PROFILER_ENABLED', true), FILTER_VALIDATE_BOOLEAN);
                self::$varCaptureSQL    = filter_var(env('DB_QUERY_PROFILER_CAPTURE_SQL', true), FILTER_VALIDATE_BOOLEAN);
                self::$varMaxSQLLength  = (int) env('DB_QUERY_PROFILER_SQL_MAX_LENGTH', 4096);
                self::$varMaxEntries    = (int) env('DB_QUERY_PROFILER_MAX_ENTRIES', 500);
                }

            return self::$varEnabled;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : record                                                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Description     : Catat satu eksekusi query ke buffer request-scoped.                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varSource ► Origin tag (pgsql|laravel)                                                                   |
        |      ▪ (string) varSQL ► Query text (boleh kosong bila capture sql dimatikan)                                            |
        |      ▪ (float)  varDurationMs ► Durasi eksekusi dalam milidetik                                                          |
        |      ▪ (bool)   varSuccess ► Status sukses                                                                                |
        |      ▪ (string) varError ► Pesan error opsional                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function record($varSource, $varSQL, $varDurationMs, $varSuccess = true, $varError = null)
            {
            if (!self::isEnabled())
                {
                return;
                }

            self::$varTotalCount++;
            self::$varTotalDuration += $varDurationMs;

            //---> Bounded buffer. Drop oldest entries once cap reached (still counted in totals).
            if (count(self::$varEntries) >= self::$varMaxEntries)
                {
                array_shift(self::$varEntries);
                }

            $varSQLTrimmed = null;
            if (self::$varCaptureSQL && $varSQL !== null)
                {
                $varSQLTrimmed = preg_replace('/\s+/', ' ', trim((string) $varSQL));
                if (self::$varMaxSQLLength > 0 && strlen($varSQLTrimmed) > self::$varMaxSQLLength)
                    {
                    $varSQLTrimmed = substr($varSQLTrimmed, 0, self::$varMaxSQLLength).'…';
                    }
                }

            self::$varEntries[] = [
                'source'      => $varSource,
                'sql'         => $varSQLTrimmed,
                'duration_ms' => round((float) $varDurationMs, 3),
                'success'     => (bool) $varSuccess,
                'error'       => $varError,
                ];
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getSnapshot                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Description     : Kembalikan aggregated snapshot untuk emit ke Loki.                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array) varReturn                                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getSnapshot()
            {
            $varCount       = self::$varTotalCount;
            $varDurations   = array_column(self::$varEntries, 'duration_ms');
            $varBufferedMax = (count($varDurations) > 0) ? max($varDurations) : 0.0;
            $varBufferedMin = (count($varDurations) > 0) ? min($varDurations) : 0.0;

            return [
                'enabled'           => self::isEnabled(),
                'total_count'       => $varCount,
                'total_duration_ms' => round(self::$varTotalDuration, 3),
                'avg_duration_ms'   => $varCount > 0 ? round(self::$varTotalDuration / $varCount, 3) : 0.0,
                'buffered_entries'  => count(self::$varEntries),
                'buffered_max_ms'   => round($varBufferedMax, 3),
                'buffered_min_ms'   => round($varBufferedMin, 3),
                'queries'           => self::$varEntries,
                ];
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : reset                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Description     : Kosongkan buffer. Wajib dipanggil di awal setiap request bila berjalan di worker yang reuse           |
        |                     proses (Laravel Octane / FrankenPHP).                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function reset()
            {
            self::$varEntries       = [];
            self::$varTotalCount    = 0;
            self::$varTotalDuration = 0.0;
            }
        }
    }
