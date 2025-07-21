PROJECT "ERPReborn" 
    {
    database_type: 'PostgreSQL'
    Note: 'ERP Reborn'
    }

TABLE "SchSysConfig"."TblAppObject_API"
    {
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" bigint [not null, unique, pk]
    "Sys_Data_Annotation" varchar(1024)
    "Sys_Data_Entry_LoginSession_RefID" bigint
    "Sys_Data_Entry_DateTimeTZ" timestamptz
    "Sys_Data_Edit_LoginSession_RefID" bigint
    "Sys_Data_Edit_DateTimeTZ" timestamptz
    "Sys_Data_Delete_LoginSession_RefID" bigint
    "Sys_Data_Delete_DateTimeTZ" timestamptz
    "Sys_Data_Hidden_LoginSession_RefID" bigint
    "Sys_Data_Hidden_DateTimeTZ" timestamptz
    "Sys_Data_Authentication_LoginSession_RefID" bigint
    "Sys_Data_Authentication_DateTimeTZ" timestamptz
    "Sys_Data_Validity_StartDateTimeTZ" timestamptz
    "Sys_Data_Validity_FinishDateTimeTZ" timestamptz
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "APIKey" varchar(256)
    "MutuallyExclusiveSign" boolean
    "ProcessTimeout" bigint
    }


TABLE "SchSysConfig"."TblAppObject_InstitutionBranch"
    {
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" bigint [not null, unique, pk]
    "Sys_Data_Annotation" varchar(1024)
    "Sys_Data_Entry_LoginSession_RefID" bigint
    "Sys_Data_Entry_DateTimeTZ" timestamptz
    "Sys_Data_Edit_LoginSession_RefID" bigint
    "Sys_Data_Edit_DateTimeTZ" timestamptz
    "Sys_Data_Delete_LoginSession_RefID" bigint
    "Sys_Data_Delete_DateTimeTZ" timestamptz
    "Sys_Data_Hidden_LoginSession_RefID" bigint
    "Sys_Data_Hidden_DateTimeTZ" timestamptz
    "Sys_Data_Authentication_LoginSession_RefID" bigint
    "Sys_Data_Authentication_DateTimeTZ" timestamptz
    "Sys_Data_Validity_StartDateTimeTZ" timestamptz
    "Sys_Data_Validity_FinishDateTimeTZ" timestamptz
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "AppObject_InstitutionRegional_RefID" bigint
    "Name" varchar(128)
    "InstitutionBranch_RefID" bigint
    }


TABLE "SchSysConfig"."TblAppObject_InstitutionCompany"
    {
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" bigint [not null, unique, pk]
    "Sys_Data_Annotation" varchar(1024)
    "Sys_Data_Entry_LoginSession_RefID" bigint
    "Sys_Data_Entry_DateTimeTZ" timestamptz
    "Sys_Data_Edit_LoginSession_RefID" bigint
    "Sys_Data_Edit_DateTimeTZ" timestamptz
    "Sys_Data_Delete_LoginSession_RefID" bigint
    "Sys_Data_Delete_DateTimeTZ" timestamptz
    "Sys_Data_Hidden_LoginSession_RefID" bigint
    "Sys_Data_Hidden_DateTimeTZ" timestamptz
    "Sys_Data_Authentication_LoginSession_RefID" bigint
    "Sys_Data_Authentication_DateTimeTZ" timestamptz
    "Sys_Data_Validity_StartDateTimeTZ" timestamptz
    "Sys_Data_Validity_FinishDateTimeTZ" timestamptz
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "Name" varchar(128)
    }