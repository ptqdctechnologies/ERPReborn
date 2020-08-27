<?php

namespace App\Models\PostgreSQL\SchSysConfig
    {
    class TblLog_UserLoginSession extends \Illuminate\Database\Eloquent\Model
        {
        public function setUpdate(
            $varUserSession, 
            int $varSysIDSession, int $varSysID, string $varSysDataAnnotation = null, int $varSysPartitionRemovableRecordKeyRefType = null, int $varSysBranchRefID = null,
            string $varUser_Name = null, int $varUser_RefID = null, string $varAPIWebToken = null, string $varOptionsList = null, int $varBranch_RefID = null, int $varUserRole_RefID = null, string $varSessionStartDateTimeTZ = null, string $varSessionFinishDateTimeTZ = null, string $varSessionAutoStartDateTimeTZ = null, string $varSessionAutoFinishDateTimeTZ = null)
            {
            $varSQL = "
                SELECT 
                    \"SignRecordID\" AS \"Sys_RPK\"
                FROM 
                    \"SchSysConfig\".\"Func_TblLog_UserLoginSession_SET\"(
                        ".(\App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getStringLiteralConvertForBigInteger($varSysIDSession))."::bigint, 
                        ".(\App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getStringLiteralConvertForBigInteger($varSysID))."::bigint, 
                        ".(\App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getStringLiteralConvertForVarChar($varSysDataAnnotation))."::varchar, 
                        ".(\App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getStringLiteralConvertForVarChar($varSysPartitionRemovableRecordKeyRefType))."::varchar, 
                        ".(\App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getStringLiteralConvertForBigInteger($varSysBranchRefID))."::bigint, 

                        ".(\App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getStringLiteralConvertForVarChar($varUserSession, $varUser_Name))."::varchar, 
                        ".(\App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getStringLiteralConvertForVarChar($varUserSession, $varAPIWebToken))."::varchar, 
                        ".(\App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getStringLiteralConvertForVarChar($varUserSession, $varOptionsList))."::json, 
                        ".(\App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getStringLiteralConvertForBigInteger($varUserSession, $varBranch_RefID))."::bigint, 
                        ".(\App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getStringLiteralConvertForBigInteger($varUserSession, $varUserRole_RefID))."::bigint, 
                        ".(\App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getStringLiteralConvertForVarChar($varUserSession, $varSessionStartDateTimeTZ))."::timestamptz, 
                        ".(\App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getStringLiteralConvertForVarChar($varUserSession, $varSessionFinishDateTimeTZ))."::timestamptz, 
                        ".(\App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getStringLiteralConvertForVarChar($varUserSession, $varSessionAutoStartDateTimeTZ))."::timestamptz, 
                        ".(\App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getStringLiteralConvertForVarChar($varUserSession, $varSessionAutoFinishDateTimeTZ))."::timestamptz
                        );
                ";
            }
        
        public function setInsert(
            $varUserSession, 
            int $varSysIDSession, string $varSysDataAnnotation = null, int $varSysPartitionRemovableRecordKeyRefType = null, int $varSysBranchRefID = null,
            string $varUser_Name = null, int $varUser_RefID = null, string $varAPIWebToken = null, string $varOptionsList = null, int $varBranch_RefID = null, int $varUserRole_RefID = null, string $varSessionStartDateTimeTZ = null, string $varSessionFinishDateTimeTZ = null, string $varSessionAutoStartDateTimeTZ = null, string $varSessionAutoFinishDateTimeTZ = null)
            {
            $varSQL = "
                SELECT 
                    \"SignRecordID\" AS \"Sys_RPK\"
                FROM 
                    \"SchSysConfig\".\"Func_TblLog_UserLoginSession_SET\"(
                        ".(\App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getStringLiteralConvertForBigInteger($varUserSession, $varSysIDSession))."::bigint, 
                        null::bigint, 
                        ".(\App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getStringLiteralConvertForVarChar($varUserSession, $varSysDataAnnotation))."::varchar, 
                        ".(\App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getStringLiteralConvertForVarChar($varUserSession, $varSysPartitionRemovableRecordKeyRefType))."::varchar, 
                        ".(\App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getStringLiteralConvertForBigInteger($varUserSession, $varSysBranchRefID))."::bigint, 

                        ".(\App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getStringLiteralConvertForVarChar($varUserSession, $varUser_Name))."::varchar, 
                        ".(\App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getStringLiteralConvertForVarChar($varUserSession, $varAPIWebToken))."::varchar, 
                        ".(\App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getStringLiteralConvertForVarChar($varUserSession, $varOptionsList))."::json, 
                        ".(\App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getStringLiteralConvertForBigInteger($varUserSession, $varBranch_RefID))."::bigint, 
                        ".(\App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getStringLiteralConvertForBigInteger($varUserSession, $varUserRole_RefID))."::bigint, 
                        ".(\App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getStringLiteralConvertForVarChar($varUserSession, $varSessionStartDateTimeTZ))."::timestamptz, 
                        ".(\App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getStringLiteralConvertForVarChar($varUserSession, $varSessionFinishDateTimeTZ))."::timestamptz, 
                        ".(\App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getStringLiteralConvertForVarChar($varUserSession, $varSessionAutoStartDateTimeTZ))."::timestamptz, 
                        ".(\App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getStringLiteralConvertForVarChar($varUserSession, $varSessionAutoFinishDateTimeTZ))."::timestamptz
                        );
                ";
            $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution($varUserSession, $varSQL);
            return $varReturn;
            }
        }
    }

?>