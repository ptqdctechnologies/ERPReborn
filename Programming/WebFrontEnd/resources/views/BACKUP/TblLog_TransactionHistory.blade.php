-- FOREIGN TABLE: SchData-Warehouse-Log.TblLog_TransactionHistory

-- DROP FOREIGN TABLE IF EXISTS "SchData-Warehouse-Log"."TblLog_TransactionHistory";

CREATE FOREIGN TABLE IF NOT EXISTS "SchData-Warehouse-Log"."TblLog_TransactionHistory"(
    "Sys_PID" bigint OPTIONS (column_name 'Sys_PID'),
    "Sys_SID" bigint OPTIONS (column_name 'Sys_SID'),
    "Sys_RPK" bigint OPTIONS (column_name 'Sys_RPK') NOT NULL,
    "Sys_Data_Annotation" character varying(1024) OPTIONS (column_name 'Sys_Data_Annotation') COLLATE pg_catalog."default",
    "Sys_Data_Entry_LoginSession_RefID" bigint OPTIONS (column_name 'Sys_Data_Entry_LoginSession_RefID'),
    "Sys_Data_Entry_DateTimeTZ" timestamp with time zone OPTIONS (column_name 'Sys_Data_Entry_DateTimeTZ'),
    "Sys_Data_Edit_LoginSession_RefID" bigint OPTIONS (column_name 'Sys_Data_Edit_LoginSession_RefID'),
    "Sys_Data_Edit_DateTimeTZ" timestamp with time zone OPTIONS (column_name 'Sys_Data_Edit_DateTimeTZ'),
    "Sys_Data_Delete_LoginSession_RefID" bigint OPTIONS (column_name 'Sys_Data_Delete_LoginSession_RefID'),
    "Sys_Data_Delete_DateTimeTZ" timestamp with time zone OPTIONS (column_name 'Sys_Data_Delete_DateTimeTZ'),
    "Sys_Data_Hidden_LoginSession_RefID" bigint OPTIONS (column_name 'Sys_Data_Hidden_LoginSession_RefID'),
    "Sys_Data_Hidden_DateTimeTZ" timestamp with time zone OPTIONS (column_name 'Sys_Data_Hidden_DateTimeTZ'),
    "Sys_Data_Authentication_LoginSession_RefID" bigint OPTIONS (column_name 'Sys_Data_Authentication_LoginSession_RefID'),
    "Sys_Data_Authentication_DateTimeTZ" timestamp with time zone OPTIONS (column_name 'Sys_Data_Authentication_DateTimeTZ'),
    "Sys_Partition_RemovableRecord_Key_RefID" bigint OPTIONS (column_name 'Sys_Partition_RemovableRecord_Key_RefID'),
    "Sys_Branch_RefID" bigint OPTIONS (column_name 'Sys_Branch_RefID'),
    "Sys_BaseCurrency_RefID" bigint OPTIONS (column_name 'Sys_BaseCurrency_RefID'),
    "Sys_DataIntegrityShadow" character varying(32) OPTIONS (column_name 'Sys_DataIntegrityShadow') COLLATE pg_catalog."default",
    "Source_RefPID" bigint OPTIONS (column_name 'Source_RefPID'),
    "Source_RefSID" bigint OPTIONS (column_name 'Source_RefSID'),
    "Source_RefRPK" bigint OPTIONS (column_name 'Source_RefRPK'),
    "Source_EntryDateTimeTZ" timestamp with time zone OPTIONS (column_name 'Source_EntryDateTimeTZ'),
    "Content" json OPTIONS (column_name 'Content')
)
    SERVER "dbERPReborn-Data-Warehouse"
    OPTIONS (schema_name 'SchLog', table_name 'TblLog_TransactionHistory');

ALTER FOREIGN TABLE "SchData-Warehouse-Log"."TblLog_TransactionHistory"
    OWNER TO "SysAdmin";