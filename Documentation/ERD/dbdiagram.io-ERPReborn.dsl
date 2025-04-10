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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "APIKey" varchar(256)
    "MutuallyExclusiveSign" boolean
    "ProcessTimeout" bigint
    }
Ref: "SchSysConfig"."TblAppObject_API"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_API"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_API"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_API"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_API"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_API"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_API"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_API"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_API"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_API"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_API"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_API"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_API"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_API"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_API"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_API"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "AppObject_InstitutionRegional_RefID" bigint
    "Name" varchar(128)
    "InstitutionBranch_RefID" bigint
    }
Ref: "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_InstitutionBranch"."AppObject_InstitutionRegional_RefID" > "SchSysConfig"."TblAppObject_InstitutionRegional"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_InstitutionBranch"."AppObject_InstitutionRegional_RefID" > "SchSysConfig"."TblAppObject_InstitutionRegional"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_InstitutionBranch"."InstitutionBranch_RefID" > "SchData-OLTP-Master"."TblInstitutionBranch"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_InstitutionBranch"."InstitutionBranch_RefID" > "SchData-OLTP-Master"."TblInstitutionBranch"."Sys_SID"



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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "Name" varchar(128)
    }
Ref: "SchSysConfig"."TblAppObject_InstitutionCompany"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_InstitutionCompany"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_InstitutionCompany"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_InstitutionCompany"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_InstitutionCompany"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_InstitutionCompany"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_InstitutionCompany"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_InstitutionCompany"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_InstitutionCompany"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_InstitutionCompany"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_InstitutionCompany"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_InstitutionCompany"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_InstitutionCompany"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_InstitutionCompany"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_InstitutionCompany"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_InstitutionCompany"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchSysConfig"."TblAppObject_InstitutionRegional"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "AppObject_InstitutionCompany_RefID" bigint
    "Name" varchar(128)
    }
Ref: "SchSysConfig"."TblAppObject_InstitutionRegional"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_InstitutionRegional"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_InstitutionRegional"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_InstitutionRegional"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_InstitutionRegional"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_InstitutionRegional"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_InstitutionRegional"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_InstitutionRegional"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_InstitutionRegional"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_InstitutionRegional"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_InstitutionRegional"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_InstitutionRegional"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_InstitutionRegional"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_InstitutionRegional"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_InstitutionRegional"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_InstitutionRegional"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchSysConfig"."TblAppObject_Menu"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "Key" varchar(256)
    "Caption" varchar(256)
    }
Ref: "SchSysConfig"."TblAppObject_Menu"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_Menu"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_Menu"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_Menu"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_Menu"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_Menu"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_Menu"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_Menu"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_Menu"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_Menu"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_Menu"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_Menu"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_Menu"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_Menu"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_Menu"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_Menu"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchSysConfig"."TblAppObject_MenuAction"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "Menu_RefID" bigint
    "Key" varchar(256)
    "Caption" varchar(256)
    "URLPath" varchar(256)
    }
Ref: "SchSysConfig"."TblAppObject_MenuAction"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_MenuAction"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_MenuAction"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_MenuAction"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_MenuAction"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_MenuAction"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_MenuAction"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_MenuAction"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_MenuAction"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_MenuAction"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_MenuAction"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_MenuAction"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_MenuAction"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_MenuAction"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_MenuAction"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_MenuAction"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchSysConfig"."TblAppObject_MenuGroup"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "Name" varchar(256)
    "IconSource" varchar(64)
    }
Ref: "SchSysConfig"."TblAppObject_MenuGroup"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_MenuGroup"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_MenuGroup"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_MenuGroup"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_MenuGroup"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_MenuGroup"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_MenuGroup"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_MenuGroup"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_MenuGroup"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_MenuGroup"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_MenuGroup"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_MenuGroup"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_MenuGroup"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_MenuGroup"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_MenuGroup"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_MenuGroup"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchSysConfig"."TblAppObject_MenuGroupMember"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "MenuGroup_RefID" bigint
    "Menu_RefID" bigint
    }
Ref: "SchSysConfig"."TblAppObject_MenuGroupMember"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_MenuGroupMember"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_MenuGroupMember"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_MenuGroupMember"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_MenuGroupMember"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_MenuGroupMember"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_MenuGroupMember"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_MenuGroupMember"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_MenuGroupMember"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_MenuGroupMember"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_MenuGroupMember"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_MenuGroupMember"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_MenuGroupMember"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_MenuGroupMember"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_MenuGroupMember"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_MenuGroupMember"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchSysConfig"."TblAppObject_Module"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "Name" varchar(256)
    }
Ref: "SchSysConfig"."TblAppObject_Module"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_Module"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_Module"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_Module"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_Module"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_Module"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_Module"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_Module"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_Module"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_Module"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_Module"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_Module"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_Module"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_Module"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_Module"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_Module"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchSysConfig"."TblAppObject_ModuleReport"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "AppObject_Module_RefID" bigint
    "Name" varchar(256)
    "Title" varchar(256)
    "URLSegment" varchar(512)
    }
Ref: "SchSysConfig"."TblAppObject_ModuleReport"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_ModuleReport"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_ModuleReport"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_ModuleReport"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_ModuleReport"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_ModuleReport"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_ModuleReport"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_ModuleReport"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_ModuleReport"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_ModuleReport"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_ModuleReport"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_ModuleReport"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_ModuleReport"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_ModuleReport"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_ModuleReport"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_ModuleReport"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchSysConfig"."TblAppObject_Parameter"
    {
    "Sys_Branch_RefID" bigint
    "Key" varchar(256)
    "Value" varchar(256)
    }
Ref: "SchSysConfig"."TblAppObject_Parameter"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_Parameter"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"



TABLE "SchSysConfig"."TblAppObject_UserRole"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "Name" varchar(256)
    }
Ref: "SchSysConfig"."TblAppObject_UserRole"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_UserRole"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_UserRole"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_UserRole"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_UserRole"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_UserRole"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_UserRole"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_UserRole"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_UserRole"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_UserRole"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_UserRole"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_UserRole"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_UserRole"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_UserRole"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_UserRole"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_UserRole"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchSysConfig"."TblAppObject_UserRoleDelegation"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "SourceMapper_UserToLUserRole_RefID" bigint
    "DestinationUser_RefID" bigint
    "SignMutualExclusive" boolean
    "ValidStartDateTimeTZ" timestamptz
    "ValidFinishDateTimeTZ" timestamptz
    }
Ref: "SchSysConfig"."TblAppObject_UserRoleDelegation"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_UserRoleDelegation"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_UserRoleDelegation"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_UserRoleDelegation"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_UserRoleDelegation"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_UserRoleDelegation"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_UserRoleDelegation"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_UserRoleDelegation"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_UserRoleDelegation"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_UserRoleDelegation"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_UserRoleDelegation"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_UserRoleDelegation"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_UserRoleDelegation"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_UserRoleDelegation"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_UserRoleDelegation"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_UserRoleDelegation"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchSysConfig"."TblAppObject_UserRoleGroup"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "OrganizationalDepartment_RefID" bigint
    "Name" varchar(256)
    "IconSource" varchar(64)
    }
Ref: "SchSysConfig"."TblAppObject_UserRoleGroup"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_UserRoleGroup"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_UserRoleGroup"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_UserRoleGroup"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_UserRoleGroup"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_UserRoleGroup"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_UserRoleGroup"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_UserRoleGroup"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_UserRoleGroup"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_UserRoleGroup"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_UserRoleGroup"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_UserRoleGroup"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_UserRoleGroup"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_UserRoleGroup"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_UserRoleGroup"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_UserRoleGroup"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchSysConfig"."TblAppObject_UserRoleGroupMember"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "UserRoleGroup_RefID" bigint
    "UserRole_RefID" bigint
    }
Ref: "SchSysConfig"."TblAppObject_UserRoleGroupMember"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_UserRoleGroupMember"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_UserRoleGroupMember"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_UserRoleGroupMember"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_UserRoleGroupMember"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_UserRoleGroupMember"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_UserRoleGroupMember"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_UserRoleGroupMember"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_UserRoleGroupMember"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_UserRoleGroupMember"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_UserRoleGroupMember"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_UserRoleGroupMember"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_UserRoleGroupMember"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_UserRoleGroupMember"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_UserRoleGroupMember"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_UserRoleGroupMember"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchSysConfig"."TblAppObject_UserRolePrivileges"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "UserRole_RefID" bigint
    "MenuAction_RefID" bigint
    "SignAccess" boolean
    }
Ref: "SchSysConfig"."TblAppObject_UserRolePrivileges"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_UserRolePrivileges"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_UserRolePrivileges"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_UserRolePrivileges"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_UserRolePrivileges"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_UserRolePrivileges"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_UserRolePrivileges"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_UserRolePrivileges"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_UserRolePrivileges"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_UserRolePrivileges"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_UserRolePrivileges"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_UserRolePrivileges"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_UserRolePrivileges"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_UserRolePrivileges"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_UserRolePrivileges"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_UserRolePrivileges"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchSysConfig"."TblAppObject_UserRolePrivilegesMenu"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "UserRole_RefID" bigint
    "Menu_RefID" bigint
    }
Ref: "SchSysConfig"."TblAppObject_UserRolePrivilegesMenu"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_UserRolePrivilegesMenu"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_UserRolePrivilegesMenu"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_UserRolePrivilegesMenu"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_UserRolePrivilegesMenu"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_UserRolePrivilegesMenu"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_UserRolePrivilegesMenu"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_UserRolePrivilegesMenu"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_UserRolePrivilegesMenu"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_UserRolePrivilegesMenu"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_UserRolePrivilegesMenu"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_UserRolePrivilegesMenu"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_UserRolePrivilegesMenu"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_UserRolePrivilegesMenu"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_UserRolePrivilegesMenu"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_UserRolePrivilegesMenu"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchSysConfig"."TblAppObject_WorkFlow"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "StartWorkFlowNode_RefID" bigint
    "FinishWorkFlowNode_RefID" bigint
    "CurrentWorkFlowVersion_RefID" bigint
    "DataInitialization" json
    "Remarks" varchar(512)
    }
Ref: "SchSysConfig"."TblAppObject_WorkFlow"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_WorkFlow"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_WorkFlow"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_WorkFlow"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_WorkFlow"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_WorkFlow"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_WorkFlow"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_WorkFlow"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_WorkFlow"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_WorkFlow"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_WorkFlow"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_WorkFlow"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_WorkFlow"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_WorkFlow"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_WorkFlow"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_WorkFlow"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchSysConfig"."TblAppObject_WorkFlowEdge"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "WorkFlowVersion_RefID" bigint
    "PreviousWorkFlowNode_RefID" bigint
    "NextWorkFlowNode_RefID" bigint
    "ApproverEntity_RefID" bigint
    "Remarks" varchar(512)
    }
Ref: "SchSysConfig"."TblAppObject_WorkFlowEdge"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowEdge"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowEdge"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowEdge"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowEdge"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowEdge"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowEdge"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowEdge"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowEdge"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowEdge"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowEdge"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowEdge"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowEdge"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowEdge"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowEdge"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowEdge"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchSysConfig"."TblAppObject_WorkFlowNode"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    }
Ref: "SchSysConfig"."TblAppObject_WorkFlowNode"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowNode"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowNode"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowNode"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowNode"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowNode"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowNode"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowNode"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowNode"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowNode"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowNode"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowNode"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowNode"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowNode"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowNode"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowNode"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchSysConfig"."TblAppObject_WorkFlowPath"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "WorkFlowVersion_RefID" bigint
    "KeyID" varchar(32)
    "SubmitterEntity_RefID" bigint
    "Path" json
    }
Ref: "SchSysConfig"."TblAppObject_WorkFlowPath"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowPath"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowPath"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowPath"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowPath"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowPath"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowPath"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowPath"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowPath"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowPath"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowPath"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowPath"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowPath"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowPath"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowPath"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowPath"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchSysConfig"."TblAppObject_WorkFlowPathAction"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "Name" varchar(256)
    }
Ref: "SchSysConfig"."TblAppObject_WorkFlowPathAction"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowPathAction"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowPathAction"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowPathAction"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowPathAction"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowPathAction"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowPathAction"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowPathAction"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowPathAction"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowPathAction"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowPathAction"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowPathAction"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowPathAction"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowPathAction"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowPathAction"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowPathAction"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchSysConfig"."TblAppObject_WorkFlowPathSequence"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
	"WorkFlowPath_RefID" bigint
    "Sequence" smallint
    "ApproverEntity_RefID" bigint
    "WorkFlowEdge_RefID" bigint
    "PreviousWorkFlowNode_RefID" bigint
    "NextWorkFlowNode_RefID" bigint
    }
Ref: "SchSysConfig"."TblAppObject_WorkFlowPathSequence"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowPathSequence"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowPathSequence"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowPathSequence"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowPathSequence"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowPathSequence"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowPathSequence"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowPathSequence"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowPathSequence"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowPathSequence"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowPathSequence"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowPathSequence"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowPathSequence"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowPathSequence"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowPathSequence"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowPathSequence"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowPathSequence"."WorkFlowPath_RefID" > "SchSysConfig"."TblAppObject_WorkFlowPath"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowPathSequence"."WorkFlowPath_RefID" > "SchSysConfig"."TblAppObject_WorkFlowPath"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowPathSequence"."ApproverEntity_RefID" > "SchData-OLTP-HumanResource"."TblWorkerCareerInternal"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowPathSequence"."ApproverEntity_RefID" > "SchData-OLTP-HumanResource"."TblWorkerCareerInternal"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowPathSequence"."WorkFlowEdge_RefID" > "SchSysConfig"."TblAppObject_WorkFlowEdge"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowPathSequence"."WorkFlowEdge_RefID" > "SchSysConfig"."TblAppObject_WorkFlowEdge"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowPathSequence"."PreviousWorkFlowNode_RefID" > "SchSysConfig"."TblAppObject_WorkFlowNode"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowPathSequence"."PreviousWorkFlowNode_RefID" > "SchSysConfig"."TblAppObject_WorkFlowNode"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowPathSequence"."NextWorkFlowNode_RefID" > "SchSysConfig"."TblAppObject_WorkFlowNode"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowPathSequence"."NextWorkFlowNode_RefID" > "SchSysConfig"."TblAppObject_WorkFlowNode"."Sys_SID"



TABLE "SchSysConfig"."TblAppObject_WorkFlowPathSequenceRemapping"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
	"Sys_DataIntegrityShadow" varchar(32)
	"PreviousWorkFlowPathSequence_RefID" bigint
	"CurrentWorkFlowPathSequence_RefID" bigint
    "Remarks" varchar(512)
    }
Ref: "SchSysConfig"."TblAppObject_WorkFlowPathSequenceRemapping"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowPathSequenceRemapping"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowPathSequenceRemapping"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowPathSequenceRemapping"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowPathSequenceRemapping"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowPathSequenceRemapping"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowPathSequenceRemapping"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowPathSequenceRemapping"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowPathSequenceRemapping"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowPathSequenceRemapping"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowPathSequenceRemapping"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowPathSequenceRemapping"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowPathSequenceRemapping"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowPathSequenceRemapping"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowPathSequenceRemapping"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowPathSequenceRemapping"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowPathSequenceRemapping"."PreviousWorkFlowPathSequence_RefID" > "SchSysConfig"."TblAppObject_WorkFlowPathSequence"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowPathSequenceRemapping"."PreviousWorkFlowPathSequence_RefID" > "SchSysConfig"."TblAppObject_WorkFlowPathSequence"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowPathSequenceRemapping"."CurrentWorkFlowPathSequence_RefID" > "SchSysConfig"."TblAppObject_WorkFlowPathSequence"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowPathSequenceRemapping"."CurrentWorkFlowPathSequence_RefID" > "SchSysConfig"."TblAppObject_WorkFlowPathSequence"."Sys_SID"



TABLE "SchSysConfig"."TblAppObject_WorkFlowVersion"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
	"WorkFlow_RefID" bigint
    "Version" smallint
    "DataInitialization" json
    "Remarks" varchar(512)
    }
Ref: "SchSysConfig"."TblAppObject_WorkFlowVersion"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowVersion"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowVersion"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowVersion"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowVersion"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowVersion"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowVersion"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowVersion"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowVersion"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowVersion"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowVersion"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowVersion"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowVersion"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowVersion"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowVersion"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowVersion"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowVersion"."WorkFlow_RefID" > "SchSysConfig"."TblAppObject_WorkFlow"."Sys_PID"
Ref: "SchSysConfig"."TblAppObject_WorkFlowVersion"."WorkFlow_RefID" > "SchSysConfig"."TblAppObject_WorkFlow"."Sys_SID"



TABLE "SchSysConfig"."TblDBObject_FieldRelation"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "TableID" bigint
	"FieldName" varchar(256)
    "Reference_TableID" bigint
    "Reference_FieldName" varchar
    }
Ref: "SchSysConfig"."TblDBObject_FieldRelation"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_FieldRelation"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblDBObject_FieldRelation"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_FieldRelation"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblDBObject_FieldRelation"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_FieldRelation"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblDBObject_FieldRelation"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_FieldRelation"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblDBObject_FieldRelation"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_FieldRelation"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblDBObject_FieldRelation"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_FieldRelation"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig"."TblDBObject_FieldRelation"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_FieldRelation"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchSysConfig"."TblDBObject_FieldRelation"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_FieldRelation"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchSysConfig"."TblDBObject_FieldRelation"."TableID" > "SchSysConfig"."TblDBObject_Table"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_FieldRelation"."TableID" > "SchSysConfig"."TblDBObject_Table"."Sys_SID"



TABLE "SchSysConfig"."TblDBObject_ForeignObject"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "ForeignDatabaseHost" inet
    "ForeignDatabasePort" integer
    "ForeignDatabaseName" varchar(256)
    "ForeignSchema" varchar(256)
    "ForeignTable" varchar(256)
    }
Ref: "SchSysConfig"."TblDBObject_ForeignObject"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_ForeignObject"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblDBObject_ForeignObject"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_ForeignObject"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblDBObject_ForeignObject"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_ForeignObject"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblDBObject_ForeignObject"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_ForeignObject"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblDBObject_ForeignObject"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_ForeignObject"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblDBObject_ForeignObject"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_ForeignObject"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig"."TblDBObject_ForeignObject"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_ForeignObject"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchSysConfig"."TblDBObject_ForeignObject"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_ForeignObject"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchSysConfig"."TblDBObject_Index"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "Table_RefID" bigint
    "SpecificTableName" varchar(128)
    "Name" varchar(128)
    "Element" varchar[]
    }
Ref: "SchSysConfig"."TblDBObject_Index"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_Index"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblDBObject_Index"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_Index"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblDBObject_Index"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_Index"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblDBObject_Index"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_Index"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblDBObject_Index"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_Index"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblDBObject_Index"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_Index"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig"."TblDBObject_Index"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_Index"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchSysConfig"."TblDBObject_Index"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_Index"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchSysConfig"."TblDBObject_Index"."Table_RefID" > "SchSysConfig"."TblDBObject_Table"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_Index"."Table_RefID" > "SchSysConfig"."TblDBObject_Table"."Sys_SID"



TABLE "SchSysConfig"."TblDBObject_LastModified"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "Table_RefID" bigint
    "LastEntryDateTimeTZ" timestamptz
    "LastEditDateTimeTZ" timestamptz
    "LastDeleteDateTimeTZ" timestamptz
    "LastHiddenDateTimeTZ" timestamptz
    }
Ref: "SchSysConfig"."TblDBObject_LastModified"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_LastModified"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblDBObject_LastModified"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_LastModified"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblDBObject_LastModified"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_LastModified"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblDBObject_LastModified"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_LastModified"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblDBObject_LastModified"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_LastModified"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblDBObject_LastModified"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_LastModified"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig"."TblDBObject_LastModified"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_LastModified"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchSysConfig"."TblDBObject_LastModified"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_LastModified"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchSysConfig"."TblDBObject_LastModified"."Table_RefID" > "SchSysConfig"."TblDBObject_Table"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_LastModified"."Table_RefID" > "SchSysConfig"."TblDBObject_Table"."Sys_SID"



TABLE "SchSysConfig"."TblDBObject_Parameter"
    {
    "Key" varchar(256)
    "Value" varchar(256)
    }



TABLE "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "Key" varchar(128)
    }
Ref: "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Parameter"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "Parameter" varchar(128)
    }
Ref: "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Parameter"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Parameter"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Parameter"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Parameter"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Parameter"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Parameter"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Parameter"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Parameter"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Parameter"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Parameter"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Parameter"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Parameter"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Parameter"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Parameter"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Parameter"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Parameter"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchSysConfig"."TblDBObject_Schema"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "Name" varchar(128)
    }
Ref: "SchSysConfig"."TblDBObject_Schema"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_Schema"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblDBObject_Schema"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_Schema"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblDBObject_Schema"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_Schema"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblDBObject_Schema"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_Schema"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblDBObject_Schema"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_Schema"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblDBObject_Schema"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_Schema"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig"."TblDBObject_Schema"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_Schema"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchSysConfig"."TblDBObject_Schema"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_Schema"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchSysConfig"."TblDBObject_Table"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
	"Schema_RefID" bigint
    "Name" varchar(128)
    "Partition_RemovableRecord_Parameter_RefID" bigint
    }
Ref: "SchSysConfig"."TblDBObject_Table"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_Table"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblDBObject_Table"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_Table"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblDBObject_Table"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_Table"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblDBObject_Table"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_Table"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblDBObject_Table"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_Table"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblDBObject_Table"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_Table"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig"."TblDBObject_Table"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_Table"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchSysConfig"."TblDBObject_Table"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_Table"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchSysConfig"."TblDBObject_Table"."Schema_RefID" > "SchSysConfig"."TblDBObject_Schema"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_Table"."Schema_RefID" > "SchSysConfig"."TblDBObject_Schema"."Sys_SID"
Ref: "SchSysConfig"."TblDBObject_Table"."Partition_RemovableRecord_Parameter_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Parameter"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_Table"."Partition_RemovableRecord_Parameter_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Parameter"."Sys_SID"



TABLE "SchSysConfig"."TblDBObject_User"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
	"PersonName" varchar(256)
    "UserName" varchar(128)
    "EncryptedPassword" bytea
    "PasswordShadow" varchar(32)
    }
Ref: "SchSysConfig"."TblDBObject_User"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_User"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblDBObject_User"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_User"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblDBObject_User"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_User"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblDBObject_User"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_User"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblDBObject_User"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_User"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblDBObject_User"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_User"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig"."TblDBObject_User"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_User"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchSysConfig"."TblDBObject_User"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchSysConfig"."TblDBObject_User"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchSysConfig"."TblEMailDistribution_Recipient"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
	"AppObject_ModuleReport_RefID" bigint
    "EntityEMailAccount_RefID" bigint
    "ScheduleTimeZone" smallint
    }
Ref: "SchSysConfig"."TblEMailDistribution_Recipient"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblEMailDistribution_Recipient"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblEMailDistribution_Recipient"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblEMailDistribution_Recipient"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblEMailDistribution_Recipient"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblEMailDistribution_Recipient"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblEMailDistribution_Recipient"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblEMailDistribution_Recipient"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblEMailDistribution_Recipient"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblEMailDistribution_Recipient"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblEMailDistribution_Recipient"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig"."TblEMailDistribution_Recipient"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig"."TblEMailDistribution_Recipient"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig"."TblEMailDistribution_Recipient"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchSysConfig"."TblEMailDistribution_Recipient"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchSysConfig"."TblEMailDistribution_Recipient"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchSysConfig"."TblEMailDistribution_Recipient"."AppObject_ModuleReport_RefID" > "SchSysConfig"."TblAppObject_ModuleReport"."Sys_PID"
Ref: "SchSysConfig"."TblEMailDistribution_Recipient"."AppObject_ModuleReport_RefID" > "SchSysConfig"."TblAppObject_ModuleReport"."Sys_SID"
Ref: "SchSysConfig"."TblEMailDistribution_Recipient"."EntityEMailAccount_RefID" > "SchData-OLTP-Master"."TblEntityEMailAccount"."Sys_PID"
Ref: "SchSysConfig"."TblEMailDistribution_Recipient"."EntityEMailAccount_RefID" > "SchData-OLTP-Master"."TblEntityEMailAccount"."Sys_SID"



TABLE "SchSysConfig"."TblEMailDistribution_Schedule"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
	"AppObject_ModuleReport_RefID" bigint
    "Period_RefID" bigint
    "PeriodStartDateScheduleOffset" interval 
    }
Ref: "SchSysConfig"."TblEMailDistribution_Schedule"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblEMailDistribution_Schedule"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblEMailDistribution_Schedule"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblEMailDistribution_Schedule"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblEMailDistribution_Schedule"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblEMailDistribution_Schedule"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblEMailDistribution_Schedule"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblEMailDistribution_Schedule"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblEMailDistribution_Schedule"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblEMailDistribution_Schedule"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblEMailDistribution_Schedule"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig"."TblEMailDistribution_Schedule"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig"."TblEMailDistribution_Schedule"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig"."TblEMailDistribution_Schedule"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchSysConfig"."TblEMailDistribution_Schedule"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchSysConfig"."TblEMailDistribution_Schedule"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchSysConfig"."TblEMailDistribution_Schedule"."AppObject_ModuleReport_RefID" > "SchSysConfig"."TblAppObject_ModuleReport"."Sys_PID"
Ref: "SchSysConfig"."TblEMailDistribution_Schedule"."AppObject_ModuleReport_RefID" > "SchSysConfig"."TblAppObject_ModuleReport"."Sys_SID"
Ref: "SchSysConfig"."TblEMailDistribution_Schedule"."Period_RefID" > "SchData-OLTP-Master"."TblPeriod"."Sys_PID"
Ref: "SchSysConfig"."TblEMailDistribution_Schedule"."Period_RefID" > "SchData-OLTP-Master"."TblPeriod"."Sys_SID"



TABLE "SchSysConfig"."TblEmailDistribution_Recipient"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
	"AppObject_ModuleReport_RefID" bigint
	"EntityEmailAccount_RefID" bigint
	"ScheduleTimeZone" smallint 
    }
Ref: "SchSysConfig"."TblEmailDistribution_Recipient"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblEmailDistribution_Recipient"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblEmailDistribution_Recipient"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblEmailDistribution_Recipient"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblEmailDistribution_Recipient"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblEmailDistribution_Recipient"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblEmailDistribution_Recipient"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblEmailDistribution_Recipient"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblEmailDistribution_Recipient"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblEmailDistribution_Recipient"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblEmailDistribution_Recipient"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig"."TblEmailDistribution_Recipient"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig"."TblEmailDistribution_Recipient"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig"."TblEmailDistribution_Recipient"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchSysConfig"."TblEmailDistribution_Recipient"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchSysConfig"."TblEmailDistribution_Recipient"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchSysConfig"."TblEmailDistribution_Recipient"."AppObject_ModuleReport_RefID" > "SchSysConfig"."TblAppObject_ModuleReport"."Sys_PID"
Ref: "SchSysConfig"."TblEmailDistribution_Recipient"."AppObject_ModuleReport_RefID" > "SchSysConfig"."TblAppObject_ModuleReport"."Sys_SID"
Ref: "SchSysConfig"."TblEmailDistribution_Recipient"."EntityEmailAccount_RefID" > "SchData-OLTP-Master"."TblEntityEMailAccount"."Sys_PID"
Ref: "SchSysConfig"."TblEmailDistribution_Recipient"."EntityEmailAccount_RefID" > "SchData-OLTP-Master"."TblEntityEMailAccount"."Sys_SID"



TABLE "SchSysConfig"."TblEmailDistribution_Schedule"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
	"AppObject_ModuleReport_RefID" bigint
    "Period_RefID" bigint
    "PeriodStartDateScheduleOffset" interval
    }
Ref: "SchSysConfig"."TblEmailDistribution_Schedule"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblEmailDistribution_Schedule"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblEmailDistribution_Schedule"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblEmailDistribution_Schedule"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblEmailDistribution_Schedule"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblEmailDistribution_Schedule"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblEmailDistribution_Schedule"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblEmailDistribution_Schedule"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblEmailDistribution_Schedule"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblEmailDistribution_Schedule"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblEmailDistribution_Schedule"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig"."TblEmailDistribution_Schedule"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig"."TblEmailDistribution_Schedule"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig"."TblEmailDistribution_Schedule"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchSysConfig"."TblEmailDistribution_Schedule"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchSysConfig"."TblEmailDistribution_Schedule"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchSysConfig"."TblEmailDistribution_Schedule"."AppObject_ModuleReport_RefID" > "SchSysConfig"."TblAppObject_ModuleReport"."Sys_PID"
Ref: "SchSysConfig"."TblEmailDistribution_Schedule"."AppObject_ModuleReport_RefID" > "SchSysConfig"."TblAppObject_ModuleReport"."Sys_SID"
Ref: "SchSysConfig"."TblEmailDistribution_Schedule"."Period_RefID" > "SchData-OLTP-Master"."TblPeriod"."Sys_PID"
Ref: "SchSysConfig"."TblEmailDistribution_Schedule"."Period_RefID" > "SchData-OLTP-Master"."TblPeriod"."Sys_SID"



TABLE "SchSysConfig"."TblLDAPObject_User"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
	"UserID" varchar
    "UserName" varchar
    }
Ref: "SchSysConfig"."TblLDAPObject_User"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblLDAPObject_User"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblLDAPObject_User"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblLDAPObject_User"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblLDAPObject_User"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblLDAPObject_User"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblLDAPObject_User"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblLDAPObject_User"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblLDAPObject_User"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblLDAPObject_User"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblLDAPObject_User"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig"."TblLDAPObject_User"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig"."TblLDAPObject_User"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig"."TblLDAPObject_User"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchSysConfig"."TblLDAPObject_User"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchSysConfig"."TblLDAPObject_User"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchSysConfig"."TblLog_BusinessDocumentWorkFlowPath"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
	"BusinessDocument_RefID" bigint
    "LastLog_BusinessDocumentWorkFlowPathHistory_RefID" bigint
    "SignActive" boolean
    }
Ref: "SchSysConfig"."TblLog_BusinessDocumentWorkFlowPath"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblLog_BusinessDocumentWorkFlowPath"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblLog_BusinessDocumentWorkFlowPath"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblLog_BusinessDocumentWorkFlowPath"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblLog_BusinessDocumentWorkFlowPath"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblLog_BusinessDocumentWorkFlowPath"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblLog_BusinessDocumentWorkFlowPath"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblLog_BusinessDocumentWorkFlowPath"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblLog_BusinessDocumentWorkFlowPath"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblLog_BusinessDocumentWorkFlowPath"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblLog_BusinessDocumentWorkFlowPath"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig"."TblLog_BusinessDocumentWorkFlowPath"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig"."TblLog_BusinessDocumentWorkFlowPath"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig"."TblLog_BusinessDocumentWorkFlowPath"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchSysConfig"."TblLog_BusinessDocumentWorkFlowPath"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchSysConfig"."TblLog_BusinessDocumentWorkFlowPath"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchSysConfig"."TblLog_BusinessDocumentWorkFlowPath"."BusinessDocument_RefID" > "SchData-OLTP-Master"."TblBusinessDocument"."Sys_PID"
Ref: "SchSysConfig"."TblLog_BusinessDocumentWorkFlowPath"."BusinessDocument_RefID" > "SchData-OLTP-Master"."TblBusinessDocument"."Sys_SID"
Ref: "SchSysConfig"."TblLog_BusinessDocumentWorkFlowPath"."LastLog_BusinessDocumentWorkFlowPathHistory_RefID" > "SchSysConfig"."TblLog_BusinessDocumentWorkFlowPathHistory"."Sys_PID"
Ref: "SchSysConfig"."TblLog_BusinessDocumentWorkFlowPath"."LastLog_BusinessDocumentWorkFlowPathHistory_RefID" > "SchSysConfig"."TblLog_BusinessDocumentWorkFlowPathHistory"."Sys_SID"



TABLE "SchSysConfig"."TblLog_BusinessDocumentWorkFlowPathHistory"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
	"Log_BusinessDocumentWorkFlowPath_RefID" bigint
	"BusinessDocumentVersion_RefID" bigint
	"WorkFlowPath_RefID" bigint
	"WorkFlowPathAction_RefID" bigint
	"ApprovalStepSequence" smallint
	"ApproverEntity_RefID" bigint
	"Remarks" varchar(256)
    }
Ref: "SchSysConfig"."TblLog_BusinessDocumentWorkFlowPathHistory"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblLog_BusinessDocumentWorkFlowPathHistory"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblLog_BusinessDocumentWorkFlowPathHistory"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblLog_BusinessDocumentWorkFlowPathHistory"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblLog_BusinessDocumentWorkFlowPathHistory"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblLog_BusinessDocumentWorkFlowPathHistory"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblLog_BusinessDocumentWorkFlowPathHistory"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblLog_BusinessDocumentWorkFlowPathHistory"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblLog_BusinessDocumentWorkFlowPathHistory"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblLog_BusinessDocumentWorkFlowPathHistory"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblLog_BusinessDocumentWorkFlowPathHistory"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig"."TblLog_BusinessDocumentWorkFlowPathHistory"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig"."TblLog_BusinessDocumentWorkFlowPathHistory"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig"."TblLog_BusinessDocumentWorkFlowPathHistory"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchSysConfig"."TblLog_BusinessDocumentWorkFlowPathHistory"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchSysConfig"."TblLog_BusinessDocumentWorkFlowPathHistory"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchSysConfig"."TblLog_BusinessDocumentWorkFlowPathHistory"."Log_BusinessDocumentWorkFlowPath_RefID" > "SchSysConfig"."TblLog_BusinessDocumentWorkFlowPath"."Sys_PID"
Ref: "SchSysConfig"."TblLog_BusinessDocumentWorkFlowPathHistory"."Log_BusinessDocumentWorkFlowPath_RefID" > "SchSysConfig"."TblLog_BusinessDocumentWorkFlowPath"."Sys_SID"
Ref: "SchSysConfig"."TblLog_BusinessDocumentWorkFlowPathHistory"."BusinessDocumentVersion_RefID" > "SchData-OLTP-Master"."TblBusinessDocumentVersion"."Sys_PID"
Ref: "SchSysConfig"."TblLog_BusinessDocumentWorkFlowPathHistory"."BusinessDocumentVersion_RefID" > "SchData-OLTP-Master"."TblBusinessDocumentVersion"."Sys_SID"
Ref: "SchSysConfig"."TblLog_BusinessDocumentWorkFlowPathHistory"."WorkFlowPath_RefID" > "SchSysConfig"."TblAppObject_WorkFlowPath"."Sys_PID"
Ref: "SchSysConfig"."TblLog_BusinessDocumentWorkFlowPathHistory"."WorkFlowPath_RefID" > "SchSysConfig"."TblAppObject_WorkFlowPath"."Sys_SID"
Ref: "SchSysConfig"."TblLog_BusinessDocumentWorkFlowPathHistory"."WorkFlowPathAction_RefID" > "SchSysConfig"."TblAppObject_WorkFlowPathAction"."Sys_PID"
Ref: "SchSysConfig"."TblLog_BusinessDocumentWorkFlowPathHistory"."WorkFlowPathAction_RefID" > "SchSysConfig"."TblAppObject_WorkFlowPathAction"."Sys_SID"
Ref: "SchSysConfig"."TblLog_BusinessDocumentWorkFlowPathHistory"."ApproverEntity_RefID" > "SchData-OLTP-HumanResource"."TblWorkerCareerInternal"."Sys_PID"
Ref: "SchSysConfig"."TblLog_BusinessDocumentWorkFlowPathHistory"."ApproverEntity_RefID" > "SchData-OLTP-HumanResource"."TblWorkerCareerInternal"."Sys_SID"



TABLE "SchSysConfig"."TblLog_EMailDistributionSchedule"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
	"EMailDistribution_Schedule_RefID" bigint
	"SendScheduleDateTime" timestamp
	"SendExpiredScheduleDateTime" timestamp
    }
Ref: "SchSysConfig"."TblLog_EMailDistributionSchedule"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblLog_EMailDistributionSchedule"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblLog_EMailDistributionSchedule"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblLog_EMailDistributionSchedule"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblLog_EMailDistributionSchedule"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblLog_EMailDistributionSchedule"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblLog_EMailDistributionSchedule"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblLog_EMailDistributionSchedule"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblLog_EMailDistributionSchedule"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblLog_EMailDistributionSchedule"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblLog_EMailDistributionSchedule"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig"."TblLog_EMailDistributionSchedule"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig"."TblLog_EMailDistributionSchedule"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig"."TblLog_EMailDistributionSchedule"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchSysConfig"."TblLog_EMailDistributionSchedule"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchSysConfig"."TblLog_EMailDistributionSchedule"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchSysConfig"."TblLog_EMailDistributionSchedule"."EMailDistribution_Schedule_RefID" > "SchSysConfig"."TblEMailDistribution_Schedule"."Sys_PID"
Ref: "SchSysConfig"."TblLog_EMailDistributionSchedule"."EMailDistribution_Schedule_RefID" > "SchSysConfig"."TblEMailDistribution_Schedule"."Sys_SID"



TABLE "SchSysConfig"."TblLog_EMailDistributionScheduleAttachment"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
	"Log_EMailDistributionScheduleRecipient_RefID" bigint
	"URLParameter" varchar(512)
    }
Ref: "SchSysConfig"."TblLog_EMailDistributionScheduleAttachment"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblLog_EMailDistributionScheduleAttachment"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblLog_EMailDistributionScheduleAttachment"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblLog_EMailDistributionScheduleAttachment"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblLog_EMailDistributionScheduleAttachment"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblLog_EMailDistributionScheduleAttachment"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblLog_EMailDistributionScheduleAttachment"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblLog_EMailDistributionScheduleAttachment"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblLog_EMailDistributionScheduleAttachment"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblLog_EMailDistributionScheduleAttachment"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblLog_EMailDistributionScheduleAttachment"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig"."TblLog_EMailDistributionScheduleAttachment"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig"."TblLog_EMailDistributionScheduleAttachment"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig"."TblLog_EMailDistributionScheduleAttachment"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchSysConfig"."TblLog_EMailDistributionScheduleAttachment"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchSysConfig"."TblLog_EMailDistributionScheduleAttachment"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchSysConfig"."TblLog_EMailDistributionScheduleAttachment"."Log_EMailDistributionScheduleRecipient_RefID" > "SchSysConfig"."TblLog_EMailDistributionScheduleRecipient"."Sys_PID"
Ref: "SchSysConfig"."TblLog_EMailDistributionScheduleAttachment"."Log_EMailDistributionScheduleRecipient_RefID" > "SchSysConfig"."TblLog_EMailDistributionScheduleRecipient"."Sys_SID"



TABLE "SchSysConfig"."TblLog_EMailDistributionScheduleRecipient"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
	"Log_EMailDistributionSchedule_RefID" bigint
    "EntityEMailAccount_RefID" bigint
    "SendScheduleDateTimeTZ" timestamptz
    "SendExpiredScheduleDateTimeTZ" timestamptz
    "SendDateTimeTZ" timestamptz
    }
Ref: "SchSysConfig"."TblLog_EMailDistributionScheduleRecipient"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblLog_EMailDistributionScheduleRecipient"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblLog_EMailDistributionScheduleRecipient"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblLog_EMailDistributionScheduleRecipient"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblLog_EMailDistributionScheduleRecipient"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblLog_EMailDistributionScheduleRecipient"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblLog_EMailDistributionScheduleRecipient"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblLog_EMailDistributionScheduleRecipient"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblLog_EMailDistributionScheduleRecipient"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblLog_EMailDistributionScheduleRecipient"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblLog_EMailDistributionScheduleRecipient"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig"."TblLog_EMailDistributionScheduleRecipient"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig"."TblLog_EMailDistributionScheduleRecipient"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig"."TblLog_EMailDistributionScheduleRecipient"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchSysConfig"."TblLog_EMailDistributionScheduleRecipient"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchSysConfig"."TblLog_EMailDistributionScheduleRecipient"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchSysConfig"."TblLog_EMailDistributionScheduleRecipient"."Log_EMailDistributionSchedule_RefID" > "SchSysConfig"."TblLog_EMailDistributionSchedule"."Sys_PID"
Ref: "SchSysConfig"."TblLog_EMailDistributionScheduleRecipient"."Log_EMailDistributionSchedule_RefID" > "SchSysConfig"."TblLog_EMailDistributionSchedule"."Sys_SID"
Ref: "SchSysConfig"."TblLog_EMailDistributionScheduleRecipient"."EntityEMailAccount_RefID" > "SchData-OLTP-Master"."TblEntityEMailAccount"."Sys_PID"
Ref: "SchSysConfig"."TblLog_EMailDistributionScheduleRecipient"."EntityEMailAccount_RefID" > "SchData-OLTP-Master"."TblEntityEMailAccount"."Sys_SID"



TABLE "SchSysConfig"."TblLog_UserLoginSession"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "User_RefID" bigint
    "APIWebToken" varchar
    "OptionsList" json
    "Branch_RefID" bigint
    "UserRole_RefID" bigint
    "SessionStartDateTimeTZ" timestamptz
    "SessionFinishDateTimeTZ" timestamptz
    "SessionAutoStartDateTimeTZ" timestamptz
    "SessionAutoFinishDateTimeTZ" timestamptz
    "LDAPUserID" varchar(128)
    }
Ref: "SchSysConfig"."TblLog_UserLoginSession"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblLog_UserLoginSession"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblLog_UserLoginSession"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblLog_UserLoginSession"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblLog_UserLoginSession"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblLog_UserLoginSession"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblLog_UserLoginSession"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblLog_UserLoginSession"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblLog_UserLoginSession"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblLog_UserLoginSession"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblLog_UserLoginSession"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig"."TblLog_UserLoginSession"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig"."TblLog_UserLoginSession"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig"."TblLog_UserLoginSession"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchSysConfig"."TblLog_UserLoginSession"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchSysConfig"."TblLog_UserLoginSession"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchSysConfig"."TblLog_UserLoginSession"."User_RefID" > "SchSysConfig"."TblDBObject_User"."Sys_PID"
Ref: "SchSysConfig"."TblLog_UserLoginSession"."User_RefID" > "SchSysConfig"."TblDBObject_User"."Sys_SID"
Ref: "SchSysConfig"."TblLog_UserLoginSession"."Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig"."TblLog_UserLoginSession"."Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchSysConfig"."TblLog_UserLoginSession"."UserRole_RefID" > "SchSysConfig"."TblAppObject_UserRole"."Sys_PID"
Ref: "SchSysConfig"."TblLog_UserLoginSession"."UserRole_RefID" > "SchSysConfig"."TblAppObject_UserRole"."Sys_SID"



TABLE "SchSysConfig"."TblMapper_BusinessDocumentTypeToWorkFlow"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "BusinessDocumentType_RefID" bigint
    "CombinedBudget_RefID" bigint
    "WorkFlow_RefID" bigint
    }
Ref: "SchSysConfig"."TblMapper_BusinessDocumentTypeToWorkFlow"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblMapper_BusinessDocumentTypeToWorkFlow"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblMapper_BusinessDocumentTypeToWorkFlow"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblMapper_BusinessDocumentTypeToWorkFlow"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblMapper_BusinessDocumentTypeToWorkFlow"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblMapper_BusinessDocumentTypeToWorkFlow"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblMapper_BusinessDocumentTypeToWorkFlow"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblMapper_BusinessDocumentTypeToWorkFlow"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblMapper_BusinessDocumentTypeToWorkFlow"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblMapper_BusinessDocumentTypeToWorkFlow"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblMapper_BusinessDocumentTypeToWorkFlow"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig"."TblMapper_BusinessDocumentTypeToWorkFlow"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig"."TblMapper_BusinessDocumentTypeToWorkFlow"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig"."TblMapper_BusinessDocumentTypeToWorkFlow"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchSysConfig"."TblMapper_BusinessDocumentTypeToWorkFlow"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchSysConfig"."TblMapper_BusinessDocumentTypeToWorkFlow"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchSysConfig"."TblMapper_BusinessDocumentTypeToWorkFlow"."BusinessDocumentType_RefID" > "SchData-OLTP-Master"."TblBusinessDocumentType"."Sys_PID"
Ref: "SchSysConfig"."TblMapper_BusinessDocumentTypeToWorkFlow"."BusinessDocumentType_RefID" > "SchData-OLTP-Master"."TblBusinessDocumentType"."Sys_SID"
Ref: "SchSysConfig"."TblMapper_BusinessDocumentTypeToWorkFlow"."CombinedBudget_RefID" > "SchData-OLTP-Budgeting"."TblBudget"."Sys_PID"
Ref: "SchSysConfig"."TblMapper_BusinessDocumentTypeToWorkFlow"."CombinedBudget_RefID" > "SchData-OLTP-Budgeting"."TblBudget"."Sys_SID"
Ref: "SchSysConfig"."TblMapper_BusinessDocumentTypeToWorkFlow"."CombinedBudget_RefID" > "SchData-OLTP-Project"."TblProject"."Sys_PID"
Ref: "SchSysConfig"."TblMapper_BusinessDocumentTypeToWorkFlow"."CombinedBudget_RefID" > "SchData-OLTP-Project"."TblProject"."Sys_SID"
Ref: "SchSysConfig"."TblMapper_BusinessDocumentTypeToWorkFlow"."WorkFlow_RefID" > "SchSysConfig"."TblAppObject_WorkFlow"."Sys_PID"
Ref: "SchSysConfig"."TblMapper_BusinessDocumentTypeToWorkFlow"."WorkFlow_RefID" > "SchSysConfig"."TblAppObject_WorkFlow"."Sys_SID"



TABLE "SchSysConfig"."TblMapper_LDAPUserToPerson"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "LDAPUser_RefID" bigint
    "Person_RefID" bigint
    }
Ref: "SchSysConfig"."TblMapper_LDAPUserToPerson"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblMapper_LDAPUserToPerson"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblMapper_LDAPUserToPerson"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblMapper_LDAPUserToPerson"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblMapper_LDAPUserToPerson"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblMapper_LDAPUserToPerson"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblMapper_LDAPUserToPerson"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblMapper_LDAPUserToPerson"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblMapper_LDAPUserToPerson"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblMapper_LDAPUserToPerson"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblMapper_LDAPUserToPerson"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig"."TblMapper_LDAPUserToPerson"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig"."TblMapper_LDAPUserToPerson"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig"."TblMapper_LDAPUserToPerson"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchSysConfig"."TblMapper_LDAPUserToPerson"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchSysConfig"."TblMapper_LDAPUserToPerson"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchSysConfig"."TblMapper_LDAPUserToPerson"."LDAPUser_RefID" > "SchSysConfig"."TblLDAPObject_User"."Sys_PID"
Ref: "SchSysConfig"."TblMapper_LDAPUserToPerson"."LDAPUser_RefID" > "SchSysConfig"."TblLDAPObject_User"."Sys_SID"
Ref: "SchSysConfig"."TblMapper_LDAPUserToPerson"."Person_RefID" > "SchData-OLTP-Master"."TblPerson"."Sys_PID"
Ref: "SchSysConfig"."TblMapper_LDAPUserToPerson"."Person_RefID" > "SchData-OLTP-Master"."TblPerson"."Sys_SID"



TABLE "SchSysConfig"."TblMapper_UserToLDAPUser"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "User_RefID" bigint
    "LDAPUserID" varchar(256)
    "EncryptedPassword" bytea
    "PasswordShadow" varchar(32)
    }
Ref: "SchSysConfig"."TblMapper_UserToLDAPUser"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblMapper_UserToLDAPUser"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblMapper_UserToLDAPUser"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblMapper_UserToLDAPUser"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblMapper_UserToLDAPUser"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblMapper_UserToLDAPUser"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblMapper_UserToLDAPUser"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblMapper_UserToLDAPUser"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblMapper_UserToLDAPUser"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblMapper_UserToLDAPUser"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblMapper_UserToLDAPUser"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig"."TblMapper_UserToLDAPUser"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig"."TblMapper_UserToLDAPUser"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig"."TblMapper_UserToLDAPUser"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchSysConfig"."TblMapper_UserToLDAPUser"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchSysConfig"."TblMapper_UserToLDAPUser"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchSysConfig"."TblMapper_UserToLDAPUser"."User_RefID" > "SchSysConfig"."TblDBObject_User"."Sys_PID"
Ref: "SchSysConfig"."TblMapper_UserToLDAPUser"."User_RefID" > "SchSysConfig"."TblDBObject_User"."Sys_SID"



TABLE "SchSysConfig"."TblMapper_UserToUserRole"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "User_RefID" bigint
    "UserRole_RefID" bigint
    "CallProjectSyntax" varchar(256)
    "ValidStartDateTimeTZ" timestamptz
    "ValidFinishDateTimeTZ" timestamptz
    }
Ref: "SchSysConfig"."TblMapper_UserToUserRole"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblMapper_UserToUserRole"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblMapper_UserToUserRole"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblMapper_UserToUserRole"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblMapper_UserToUserRole"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblMapper_UserToUserRole"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblMapper_UserToUserRole"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblMapper_UserToUserRole"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblMapper_UserToUserRole"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig"."TblMapper_UserToUserRole"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig"."TblMapper_UserToUserRole"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig"."TblMapper_UserToUserRole"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig"."TblMapper_UserToUserRole"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig"."TblMapper_UserToUserRole"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchSysConfig"."TblMapper_UserToUserRole"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchSysConfig"."TblMapper_UserToUserRole"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchSysConfig"."TblMapper_UserToUserRole"."User_RefID" > "SchSysConfig"."TblDBObject_User"."Sys_PID"
Ref: "SchSysConfig"."TblMapper_UserToUserRole"."User_RefID" > "SchSysConfig"."TblDBObject_User"."Sys_SID"
Ref: "SchSysConfig"."TblMapper_UserToUserRole"."UserRole_RefID" > "SchSysConfig"."TblAppObject_UserRole"."Sys_PID"
Ref: "SchSysConfig"."TblMapper_UserToUserRole"."UserRole_RefID" > "SchSysConfig"."TblAppObject_UserRole"."Sys_SID"



TABLE "SchData-OLTP-Master"."TblAccountingEntryRecordType"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "Name" varchar(8)
    "Acronym" varchar(1)
    }
Ref: "SchData-OLTP-Master"."TblAccountingEntryRecordType"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblAccountingEntryRecordType"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblAccountingEntryRecordType"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblAccountingEntryRecordType"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblAccountingEntryRecordType"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblAccountingEntryRecordType"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblAccountingEntryRecordType"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblAccountingEntryRecordType"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblAccountingEntryRecordType"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblAccountingEntryRecordType"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblAccountingEntryRecordType"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblAccountingEntryRecordType"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblAccountingEntryRecordType"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblAccountingEntryRecordType"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblAccountingEntryRecordType"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblAccountingEntryRecordType"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-Master"."TblBank"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "Name" varchar(64)
    "Acronym" varchar(16)
    }
Ref: "SchData-OLTP-Master"."TblBank"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBank"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBank"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBank"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBank"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBank"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBank"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBank"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBank"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBank"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBank"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBank"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBank"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBank"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBank"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBank"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-Master"."TblBankAccount"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "Bank_RefID" bigint
    "AccountNumber" varchar(32)
    "Name" varchar(64)
    "Entity_RefID" bigint
    }
Ref: "SchData-OLTP-Master"."TblBankAccount"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBankAccount"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBankAccount"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBankAccount"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBankAccount"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBankAccount"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBankAccount"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBankAccount"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBankAccount"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBankAccount"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBankAccount"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBankAccount"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBankAccount"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBankAccount"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBankAccount"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBankAccount"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBankAccount"."Bank_RefID" > "SchData-OLTP-Master"."TblBank"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBankAccount"."Bank_RefID" > "SchData-OLTP-Master"."TblBank"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBankAccount"."Entity_RefID" > "SchData-OLTP-Master"."TblInstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBankAccount"."Entity_RefID" > "SchData-OLTP-Master"."TblInstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBankAccount"."Entity_RefID" > "SchData-OLTP-Master"."TblPerson"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBankAccount"."Entity_RefID" > "SchData-OLTP-Master"."TblPerson"."Sys_SID"



TABLE "SchData-OLTP-Master"."TblBankBranch"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "Bank_RefID" bigint
    "Name" varchar(64)
    "Address" varchar(512)
    "CountryAdministrativeArea_RefID" bigint
    "PostalCode" varchar(5)
    }
Ref: "SchData-OLTP-Master"."TblBankBranch"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBankBranch"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBankBranch"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBankBranch"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBankBranch"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBankBranch"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBankBranch"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBankBranch"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBankBranch"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBankBranch"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBankBranch"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBankBranch"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBankBranch"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBankBranch"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBankBranch"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBankBranch"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBankBranch"."Bank_RefID" > "SchData-OLTP-Master"."TblBank"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBankBranch"."Bank_RefID" > "SchData-OLTP-Master"."TblBank"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBankBranch"."CountryAdministrativeArea_RefID" > "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel1"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBankBranch"."CountryAdministrativeArea_RefID" > "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel1"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBankBranch"."CountryAdministrativeArea_RefID" > "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel2"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBankBranch"."CountryAdministrativeArea_RefID" > "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel2"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBankBranch"."CountryAdministrativeArea_RefID" > "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel3"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBankBranch"."CountryAdministrativeArea_RefID" > "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel3"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBankBranch"."CountryAdministrativeArea_RefID" > "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel4"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBankBranch"."CountryAdministrativeArea_RefID" > "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel4"."Sys_SID"



TABLE "SchData-OLTP-Master"."TblBloodAglutinogenType"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "Type" varchar(2)
    }
Ref: "SchData-OLTP-Master"."TblBloodAglutinogenType"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBloodAglutinogenType"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBloodAglutinogenType"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBloodAglutinogenType"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBloodAglutinogenType"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBloodAglutinogenType"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBloodAglutinogenType"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBloodAglutinogenType"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBloodAglutinogenType"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBloodAglutinogenType"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBloodAglutinogenType"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBloodAglutinogenType"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBloodAglutinogenType"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBloodAglutinogenType"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBloodAglutinogenType"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBloodAglutinogenType"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-Master"."TblBudgetOrigin"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
	"Name" varchar(128)
    }
Ref: "SchData-OLTP-Master"."TblBudgetOrigin"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBudgetOrigin"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBudgetOrigin"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBudgetOrigin"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBudgetOrigin"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBudgetOrigin"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBudgetOrigin"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBudgetOrigin"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBudgetOrigin"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBudgetOrigin"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBudgetOrigin"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBudgetOrigin"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBudgetOrigin"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBudgetOrigin"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBudgetOrigin"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBudgetOrigin"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-Master"."TblBusinessDocument"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
	"BusinessDocumentType_RefID" bigint
    "DocumentNumber" varchar(64)
    "CancelationBusinessDocument_RefID" bigint
    }
Ref: "SchData-OLTP-Master"."TblBusinessDocument"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBusinessDocument"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBusinessDocument"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBusinessDocument"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBusinessDocument"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBusinessDocument"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBusinessDocument"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBusinessDocument"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBusinessDocument"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBusinessDocument"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBusinessDocument"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBusinessDocument"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBusinessDocument"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBusinessDocument"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBusinessDocument"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBusinessDocument"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBusinessDocument"."BusinessDocumentType_RefID" > "SchData-OLTP-Master"."TblBusinessDocumentType"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBusinessDocument"."BusinessDocumentType_RefID" > "SchData-OLTP-Master"."TblBusinessDocumentType"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBusinessDocument"."CancelationBusinessDocument_RefID" > "SchData-OLTP-Master"."TblBusinessDocumentType"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBusinessDocument"."CancelationBusinessDocument_RefID" > "SchData-OLTP-Master"."TblBusinessDocumentType"."Sys_SID"



TABLE "SchData-OLTP-Master"."TblBusinessDocumentLinkage"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
	"Table_RefID" bigint
    "BottomUpLinkField" varchar(256)
    "PreviousLinkField" varchar(256)
    "BusinessDocumentVersionField" varchar(256)
    "FileUploadPointerFields" varchar[]
    "ExplorationSchema" json
    }
Ref: "SchData-OLTP-Master"."TblBusinessDocumentLinkage"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentLinkage"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentLinkage"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentLinkage"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentLinkage"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentLinkage"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentLinkage"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentLinkage"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentLinkage"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentLinkage"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentLinkage"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentLinkage"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentLinkage"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentLinkage"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentLinkage"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentLinkage"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentLinkage"."Table_RefID" > "SchSysConfig"."TblDBObject_Table"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentLinkage"."Table_RefID" > "SchSysConfig"."TblDBObject_Table"."Sys_SID"



TABLE "SchData-OLTP-Master"."TblBusinessDocumentNumbering"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
	"BusinessDocumentNumberingFormat_RefID" bigint
    "ValidStartDate" date
    "ValidFinishDate" date
    "LastSequenceNumber" bigint
    "LastRequestDocumentNumber" varchar(128)
    "LastRequestDocumentDate" date
    }
Ref: "SchData-OLTP-Master"."TblBusinessDocumentNumbering"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentNumbering"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentNumbering"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentNumbering"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentNumbering"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentNumbering"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentNumbering"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentNumbering"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentNumbering"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentNumbering"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentNumbering"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentNumbering"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentNumbering"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentNumbering"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentNumbering"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentNumbering"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentNumbering"."BusinessDocumentNumberingFormat_RefID" > "SchData-OLTP-Master"."TblBusinessDocumentNumberingFormat"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentNumbering"."BusinessDocumentNumberingFormat_RefID" > "SchData-OLTP-Master"."TblBusinessDocumentNumberingFormat"."Sys_SID"



TABLE "SchData-OLTP-Master"."TblBusinessDocumentNumberingFormat"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
	"BusinessDocumentType_RefID" bigint
    "Period_RefID" bigint
    "ValidStartDate" date
    "ValidFinishDate" date
    "NumberingFormat" varchar(256)
    }
Ref: "SchData-OLTP-Master"."TblBusinessDocumentNumberingFormat"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentNumberingFormat"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentNumberingFormat"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentNumberingFormat"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentNumberingFormat"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentNumberingFormat"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentNumberingFormat"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentNumberingFormat"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentNumberingFormat"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentNumberingFormat"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentNumberingFormat"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentNumberingFormat"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentNumberingFormat"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentNumberingFormat"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentNumberingFormat"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentNumberingFormat"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentNumberingFormat"."BusinessDocumentType_RefID" > "SchData-OLTP-Master"."TblBusinessDocumentType"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentNumberingFormat"."BusinessDocumentType_RefID" > "SchData-OLTP-Master"."TblBusinessDocumentType"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentNumberingFormat"."Period_RefID" > "SchData-OLTP-Master"."TblPeriod"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentNumberingFormat"."Period_RefID" > "SchData-OLTP-Master"."TblPeriod"."Sys_SID"



TABLE "SchData-OLTP-Master"."TblBusinessDocumentType"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
	"Name" varchar(256)
    }
Ref: "SchData-OLTP-Master"."TblBusinessDocumentType"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentType"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentType"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentType"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentType"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentType"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentType"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentType"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentType"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentType"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentType"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentType"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentType"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentType"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentType"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentType"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-Master"."TblBusinessDocumentVersion"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
	"BusinessDocument_RefID" bigint
    "Version" smallint
    "DocumentDateTimeTZ" timestamptz
    "Annotation" varchar(2048)
    "DocumentOwner_RefID" bigint
    }
Ref: "SchData-OLTP-Master"."TblBusinessDocumentVersion"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentVersion"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentVersion"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentVersion"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentVersion"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentVersion"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentVersion"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentVersion"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentVersion"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentVersion"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentVersion"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentVersion"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentVersion"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentVersion"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentVersion"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentVersion"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentVersion"."BusinessDocument_RefID" > "SchData-OLTP-Master"."TblBusinessDocument"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblBusinessDocumentVersion"."BusinessDocument_RefID" > "SchData-OLTP-Master"."TblBusinessDocument"."Sys_SID"



TABLE "SchData-OLTP-Master"."TblCitizenFamilyCard"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
	"Log_FileUpload_Pointer_RefID" bigint
    "CardNumber" varchar(64)
    "IssuedDate" date
    "AddressCountryAdministrativeAreaLevel1_RefID" bigint
    "AddressCountryAdministrativeAreaLevel2_RefID" bigint
    "AddressCountryAdministrativeAreaLevel3_RefID" bigint
    "AddressCountryAdministrativeAreaLevel4_RefID" bigint
    "Address" varchar(128)
    "AddressHamletNumber" smallint
    "AddressNeighbourhoodNumber" smallint
    "PostalCode" varchar(5)
    "CardSerialNumber" varchar(64)
    }
Ref: "SchData-OLTP-Master"."TblCitizenFamilyCard"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenFamilyCard"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenFamilyCard"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenFamilyCard"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenFamilyCard"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenFamilyCard"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenFamilyCard"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenFamilyCard"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenFamilyCard"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenFamilyCard"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenFamilyCard"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenFamilyCard"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenFamilyCard"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenFamilyCard"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenFamilyCard"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenFamilyCard"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenFamilyCard"."Log_FileUpload_Pointer_RefID" > "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Pointer"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenFamilyCard"."Log_FileUpload_Pointer_RefID" > "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Pointer"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenFamilyCard"."AddressCountryAdministrativeAreaLevel1_RefID" > "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel1"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenFamilyCard"."AddressCountryAdministrativeAreaLevel1_RefID" > "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel1"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenFamilyCard"."AddressCountryAdministrativeAreaLevel2_RefID" > "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel2"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenFamilyCard"."AddressCountryAdministrativeAreaLevel2_RefID" > "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel2"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenFamilyCard"."AddressCountryAdministrativeAreaLevel3_RefID" > "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel3"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenFamilyCard"."AddressCountryAdministrativeAreaLevel3_RefID" > "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel3"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenFamilyCard"."AddressCountryAdministrativeAreaLevel4_RefID" > "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel4"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenFamilyCard"."AddressCountryAdministrativeAreaLevel4_RefID" > "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel4"."Sys_SID"



TABLE "SchData-OLTP-Master"."TblCitizenFamilyCardMember"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
	"CitizenFamilyCard_RefID" bigint
    "CitizenIdentity_RefID" bigint
    }
Ref: "SchData-OLTP-Master"."TblCitizenFamilyCardMember"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenFamilyCardMember"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenFamilyCardMember"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenFamilyCardMember"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenFamilyCardMember"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenFamilyCardMember"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenFamilyCardMember"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenFamilyCardMember"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenFamilyCardMember"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenFamilyCardMember"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenFamilyCardMember"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenFamilyCardMember"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenFamilyCardMember"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenFamilyCardMember"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenFamilyCardMember"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenFamilyCardMember"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenFamilyCardMember"."CitizenFamilyCard_RefID" > "SchData-OLTP-Master"."TblCitizenFamilyCard"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenFamilyCardMember"."CitizenFamilyCard_RefID" > "SchData-OLTP-Master"."TblCitizenFamilyCard"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenFamilyCardMember"."CitizenIdentity_RefID" > "SchData-OLTP-Master"."TblCitizenIdentity"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenFamilyCardMember"."CitizenIdentity_RefID" > "SchData-OLTP-Master"."TblCitizenIdentity"."Sys_SID"



TABLE "SchData-OLTP-Master"."TblCitizenFamilyRelationship"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
	"Name" varchar(256)
    }
Ref: "SchData-OLTP-Master"."TblCitizenFamilyRelationship"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenFamilyRelationship"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenFamilyRelationship"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenFamilyRelationship"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenFamilyRelationship"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenFamilyRelationship"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenFamilyRelationship"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenFamilyRelationship"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenFamilyRelationship"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenFamilyRelationship"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenFamilyRelationship"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenFamilyRelationship"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenFamilyRelationship"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenFamilyRelationship"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenFamilyRelationship"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenFamilyRelationship"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-Master"."TblCitizenGender"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
	"Name" varchar(256)
    }
Ref: "SchData-OLTP-Master"."TblCitizenGender"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenGender"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenGender"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenGender"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenGender"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenGender"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenGender"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenGender"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenGender"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenGender"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenGender"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenGender"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenGender"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenGender"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenGender"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenGender"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-Master"."TblCitizenIdentity"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
	"Person_RefID" bigint
	"Name" varchar(256)
	"IdentityNumber" varchar(64)
	"CitizenGender_RefID" bigint
	"BirthPlace_RefID" bigint
	"BirthDateTime" timestamp
	"BloodAglutinogenType_RefID" bigint
	"Religion_RefID" bigint
	"CitizenProfession_RefID" bigint
	"CitizenMaritalStatus_RefID" bigint
	"AddressCountryAdministrativeAreaLevel1_RefID" bigint
	"AddressCountryAdministrativeAreaLevel2_RefID" bigint
	"AddressCountryAdministrativeAreaLevel3_RefID" bigint
	"AddressCountryAdministrativeAreaLevel4_RefID" bigint
	"Address" varchar(128)
	"AddressHamletNumber" smallint
	"AddressNeighbourhoodNumber" smallint
    }
Ref: "SchData-OLTP-Master"."TblCitizenIdentity"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenIdentity"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenIdentity"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenIdentity"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenIdentity"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenIdentity"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenIdentity"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenIdentity"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenIdentity"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenIdentity"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenIdentity"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenIdentity"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenIdentity"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenIdentity"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenIdentity"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenIdentity"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenIdentity"."Person_RefID" > "SchData-OLTP-Master"."TblPerson"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenIdentity"."Person_RefID" > "SchData-OLTP-Master"."TblPerson"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenIdentity"."CitizenGender_RefID" > "SchData-OLTP-Master"."TblCitizenGender"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenIdentity"."CitizenGender_RefID" > "SchData-OLTP-Master"."TblCitizenGender"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenIdentity"."BirthPlace_RefID" > "SchData-OLTP-Master"."TblCountry"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenIdentity"."BirthPlace_RefID" > "SchData-OLTP-Master"."TblCountry"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenIdentity"."BirthPlace_RefID" > "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel1"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenIdentity"."BirthPlace_RefID" > "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel1"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenIdentity"."BirthPlace_RefID" > "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel2"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenIdentity"."BirthPlace_RefID" > "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel2"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenIdentity"."BirthPlace_RefID" > "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel3"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenIdentity"."BirthPlace_RefID" > "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel3"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenIdentity"."BirthPlace_RefID" > "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel4"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenIdentity"."BirthPlace_RefID" > "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel4"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenIdentity"."BloodAglutinogenType_RefID" > "SchData-OLTP-Master"."TblBloodAglutinogenType"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenIdentity"."BloodAglutinogenType_RefID" > "SchData-OLTP-Master"."TblBloodAglutinogenType"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenIdentity"."Religion_RefID" > "SchData-OLTP-Master"."TblReligion"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenIdentity"."Religion_RefID" > "SchData-OLTP-Master"."TblReligion"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenIdentity"."CitizenProfession_RefID" > "SchData-OLTP-Master"."TblCitizenProfession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenIdentity"."CitizenProfession_RefID" > "SchData-OLTP-Master"."TblCitizenProfession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenIdentity"."CitizenMaritalStatus_RefID" > "SchData-OLTP-Master"."TblCitizenMaritalStatus"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenIdentity"."CitizenMaritalStatus_RefID" > "SchData-OLTP-Master"."TblCitizenMaritalStatus"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenIdentity"."AddressCountryAdministrativeAreaLevel1_RefID" > "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel1"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenIdentity"."AddressCountryAdministrativeAreaLevel1_RefID" > "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel1"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenIdentity"."AddressCountryAdministrativeAreaLevel2_RefID" > "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel2"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenIdentity"."AddressCountryAdministrativeAreaLevel2_RefID" > "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel2"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenIdentity"."AddressCountryAdministrativeAreaLevel3_RefID" > "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel3"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenIdentity"."AddressCountryAdministrativeAreaLevel3_RefID" > "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel3"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenIdentity"."AddressCountryAdministrativeAreaLevel4_RefID" > "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel4"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenIdentity"."AddressCountryAdministrativeAreaLevel4_RefID" > "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel4"."Sys_SID"



TABLE "SchData-OLTP-Master"."TblCitizenIdentityCard"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
	"Log_FileUpload_Pointer_RefID" bigint
    "CitizenIdentity_RefID" bigint
    "IssuedDate" date
    "ExpirationDate" date
    }
Ref: "SchData-OLTP-Master"."TblCitizenIdentityCard"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenIdentityCard"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenIdentityCard"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenIdentityCard"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenIdentityCard"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenIdentityCard"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenIdentityCard"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenIdentityCard"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenIdentityCard"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenIdentityCard"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenIdentityCard"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenIdentityCard"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenIdentityCard"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenIdentityCard"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenIdentityCard"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenIdentityCard"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenIdentityCard"."Log_FileUpload_Pointer_RefID" > "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Pointer"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenIdentityCard"."Log_FileUpload_Pointer_RefID" > "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Pointer"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenIdentityCard"."CitizenIdentity_RefID" > "SchData-OLTP-Master"."TblCitizenIdentity"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenIdentityCard"."CitizenIdentity_RefID" > "SchData-OLTP-Master"."TblCitizenIdentity"."Sys_SID"



TABLE "SchData-OLTP-Master"."TblCitizenMaritalStatus"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
	"Name" varchar(256)
    }
Ref: "SchData-OLTP-Master"."TblCitizenMaritalStatus"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenMaritalStatus"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenMaritalStatus"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenMaritalStatus"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenMaritalStatus"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenMaritalStatus"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenMaritalStatus"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenMaritalStatus"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenMaritalStatus"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenMaritalStatus"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenMaritalStatus"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenMaritalStatus"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenMaritalStatus"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenMaritalStatus"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenMaritalStatus"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenMaritalStatus"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-Master"."TblCitizenProfession"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
	"Name" varchar(256)
    }
Ref: "SchData-OLTP-Master"."TblCitizenProfession"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenProfession"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenProfession"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenProfession"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenProfession"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenProfession"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenProfession"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenProfession"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenProfession"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenProfession"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenProfession"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenProfession"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenProfession"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenProfession"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCitizenProfession"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCitizenProfession"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-Master"."TblContactNumberType"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
	"Name" varchar(256)
    }
Ref: "SchData-OLTP-Master"."TblContactNumberType"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblContactNumberType"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblContactNumberType"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblContactNumberType"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblContactNumberType"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblContactNumberType"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblContactNumberType"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblContactNumberType"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblContactNumberType"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblContactNumberType"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblContactNumberType"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblContactNumberType"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblContactNumberType"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblContactNumberType"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblContactNumberType"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblContactNumberType"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-Master"."TblCountry"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
	"InternationalName" varchar(256)
    "IndonesianName" varchar(256)
    }
Ref: "SchData-OLTP-Master"."TblCountry"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCountry"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCountry"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCountry"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCountry"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCountry"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCountry"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCountry"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCountry"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCountry"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCountry"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCountry"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCountry"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCountry"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCountry"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCountry"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel1"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
	"Country_RefID" bigint
    "Name" varchar(256)
    }
Ref: "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel1"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel1"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel1"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel1"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel1"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel1"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel1"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel1"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel1"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel1"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel1"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel1"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel1"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel1"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel1"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel1"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel1"."Country_RefID" > "SchData-OLTP-Master"."TblCountry"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel1"."Country_RefID" > "SchData-OLTP-Master"."TblCountry"."Sys_SID"



TABLE "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel2"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
	"CountryAdministrativeAreaLevel1_RefID" bigint
    "Name" varchar(256)
    }
Ref: "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel2"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel2"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel2"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel2"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel2"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel2"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel2"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel2"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel2"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel2"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel2"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel2"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel2"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel2"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel2"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel2"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel2"."CountryAdministrativeAreaLevel1_RefID" > "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel1"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel2"."CountryAdministrativeAreaLevel1_RefID" > "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel1"."Sys_SID"



TABLE "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel3"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
	"CountryAdministrativeAreaLevel2_RefID" bigint
    "Name" varchar(256)
    }
Ref: "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel3"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel3"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel3"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel3"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel3"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel3"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel3"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel3"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel3"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel3"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel3"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel3"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel3"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel3"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel3"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel3"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel3"."CountryAdministrativeAreaLevel2_RefID" > "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel2"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel3"."CountryAdministrativeAreaLevel2_RefID" > "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel2"."Sys_SID"



TABLE "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel4"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
	"CountryAdministrativeAreaLevel3_RefID" bigint
    "Name" varchar(256)
    }
Ref: "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel4"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel4"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel4"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel4"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel4"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel4"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel4"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel4"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel4"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel4"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel4"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel4"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel4"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel4"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel4"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel4"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel4"."CountryAdministrativeAreaLevel3_RefID" > "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel3"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel4"."CountryAdministrativeAreaLevel3_RefID" > "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel3"."Sys_SID"



TABLE "SchData-OLTP-Master"."TblCurrency"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "ISOCode" varchar(3)
    "Name" varchar(128)
    "Symbol" varchar(4)
    }
Ref: "SchData-OLTP-Master"."TblCurrency"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCurrency"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCurrency"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCurrency"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCurrency"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCurrency"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCurrency"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCurrency"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCurrency"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCurrency"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCurrency"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCurrency"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCurrency"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCurrency"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCurrency"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCurrency"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-Master"."TblCurrencyExchangeRateCentralBank"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
	"Currency_RefID" bigint
    "ExchangeRateBuy" numeric(20,5)
    "ExchangeRateSell" numeric(20,5)
    "ValidStartDateTimeTZ" timestamptz
    "ValidFinishDateTimeTZ" timestamptz
    }
Ref: "SchData-OLTP-Master"."TblCurrencyExchangeRateCentralBank"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCurrencyExchangeRateCentralBank"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCurrencyExchangeRateCentralBank"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCurrencyExchangeRateCentralBank"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCurrencyExchangeRateCentralBank"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCurrencyExchangeRateCentralBank"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCurrencyExchangeRateCentralBank"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCurrencyExchangeRateCentralBank"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCurrencyExchangeRateCentralBank"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCurrencyExchangeRateCentralBank"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCurrencyExchangeRateCentralBank"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCurrencyExchangeRateCentralBank"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCurrencyExchangeRateCentralBank"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCurrencyExchangeRateCentralBank"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCurrencyExchangeRateCentralBank"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCurrencyExchangeRateCentralBank"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCurrencyExchangeRateCentralBank"."Currency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCurrencyExchangeRateCentralBank"."Currency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-Master"."TblCurrencyExchangeRateTax"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
	"Currency_RefID" bigint
    "ExchangeRate" numeric(20,5)
    "ValidStartDateTimeTZ" timestamptz
    "ValidFinishDateTimeTZ" timestamptz
    "RegulatorDocumentNumber" varchar
    }
Ref: "SchData-OLTP-Master"."TblCurrencyExchangeRateTax"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCurrencyExchangeRateTax"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCurrencyExchangeRateTax"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCurrencyExchangeRateTax"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCurrencyExchangeRateTax"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCurrencyExchangeRateTax"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCurrencyExchangeRateTax"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCurrencyExchangeRateTax"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCurrencyExchangeRateTax"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCurrencyExchangeRateTax"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCurrencyExchangeRateTax"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCurrencyExchangeRateTax"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCurrencyExchangeRateTax"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCurrencyExchangeRateTax"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCurrencyExchangeRateTax"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCurrencyExchangeRateTax"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblCurrencyExchangeRateTax"."Currency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblCurrencyExchangeRateTax"."Currency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-Master"."TblDataCompression"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
	"Name" varchar(256)
    }
Ref: "SchData-OLTP-Master"."TblDataCompression"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblDataCompression"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblDataCompression"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblDataCompression"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblDataCompression"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblDataCompression"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblDataCompression"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblDataCompression"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblDataCompression"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblDataCompression"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblDataCompression"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblDataCompression"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblDataCompression"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblDataCompression"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblDataCompression"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblDataCompression"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-Master"."TblDayOffGovernmentPolicy"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
	"Country_RefID" bigint
    "Name" varchar(256)
    "ValidStartDate" date
    "ValidFinishDate" date
    }
Ref: "SchData-OLTP-Master"."TblDayOffGovernmentPolicy"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblDayOffGovernmentPolicy"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblDayOffGovernmentPolicy"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblDayOffGovernmentPolicy"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblDayOffGovernmentPolicy"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblDayOffGovernmentPolicy"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblDayOffGovernmentPolicy"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblDayOffGovernmentPolicy"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblDayOffGovernmentPolicy"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblDayOffGovernmentPolicy"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblDayOffGovernmentPolicy"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblDayOffGovernmentPolicy"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblDayOffGovernmentPolicy"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblDayOffGovernmentPolicy"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblDayOffGovernmentPolicy"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblDayOffGovernmentPolicy"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblDayOffGovernmentPolicy"."Country_RefID" > "SchData-OLTP-Master"."TblCountry"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblDayOffGovernmentPolicy"."Country_RefID" > "SchData-OLTP-Master"."TblCountry"."Sys_SID"



TABLE "SchData-OLTP-Master"."TblDayOffNational"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
	"Country_RefID" bigint
    "Name" varchar(256)
    "ValidStartDate" date
    "ValidFinishDate" date
    }
Ref: "SchData-OLTP-Master"."TblDayOffNational"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblDayOffNational"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblDayOffNational"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblDayOffNational"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblDayOffNational"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblDayOffNational"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblDayOffNational"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblDayOffNational"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblDayOffNational"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblDayOffNational"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblDayOffNational"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblDayOffNational"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblDayOffNational"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblDayOffNational"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblDayOffNational"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblDayOffNational"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblDayOffNational"."Country_RefID" > "SchData-OLTP-Master"."TblCountry"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblDayOffNational"."Country_RefID" > "SchData-OLTP-Master"."TblCountry"."Sys_SID"



TABLE "SchData-OLTP-Master"."TblDayOffRegional"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
	"Regional_RefID" bigint
    "Name" varchar(256)
    "ValidStartDate" date
    "ValidFinishDate" date
    }
Ref: "SchData-OLTP-Master"."TblDayOffRegional"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblDayOffRegional"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblDayOffRegional"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblDayOffRegional"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblDayOffRegional"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblDayOffRegional"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblDayOffRegional"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblDayOffRegional"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblDayOffRegional"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblDayOffRegional"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblDayOffRegional"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblDayOffRegional"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblDayOffRegional"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblDayOffRegional"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblDayOffRegional"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblDayOffRegional"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblDayOffRegional"."Regional_RefID" > "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel1"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblDayOffRegional"."Regional_RefID" > "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel1"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblDayOffRegional"."Regional_RefID" > "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel2"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblDayOffRegional"."Regional_RefID" > "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel2"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblDayOffRegional"."Regional_RefID" > "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel3"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblDayOffRegional"."Regional_RefID" > "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel3"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblDayOffRegional"."Regional_RefID" > "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel4"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblDayOffRegional"."Regional_RefID" > "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel4"."Sys_SID"



TABLE "SchData-OLTP-Master"."TblEntityBankAccount"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
	"Entity_RefID" bigint
    "BankAccount_RefID" bigint
    }
Ref: "SchData-OLTP-Master"."TblEntityBankAccount"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblEntityBankAccount"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblEntityBankAccount"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblEntityBankAccount"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblEntityBankAccount"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblEntityBankAccount"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblEntityBankAccount"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblEntityBankAccount"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblEntityBankAccount"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblEntityBankAccount"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblEntityBankAccount"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblEntityBankAccount"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblEntityBankAccount"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblEntityBankAccount"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblEntityBankAccount"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblEntityBankAccount"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblEntityBankAccount"."Entity_RefID" > "SchData-OLTP-Master"."TblInstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblEntityBankAccount"."Entity_RefID" > "SchData-OLTP-Master"."TblInstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblEntityBankAccount"."Entity_RefID" > "SchData-OLTP-Master"."TblPerson"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblEntityBankAccount"."Entity_RefID" > "SchData-OLTP-Master"."TblPerson"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblEntityBankAccount"."BankAccount_RefID" > "SchData-OLTP-Master"."TblBankAccount"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblEntityBankAccount"."BankAccount_RefID" > "SchData-OLTP-Master"."TblBankAccount"."Sys_SID"



TABLE "SchData-OLTP-Master"."TblEntityContactNumber"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
	"Entity_RefID" bigint
    "ContactNumberType_RefID" bigint
    "ContactNumber" varchar(32)
    }
Ref: "SchData-OLTP-Master"."TblEntityContactNumber"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblEntityContactNumber"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblEntityContactNumber"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblEntityContactNumber"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblEntityContactNumber"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblEntityContactNumber"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblEntityContactNumber"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblEntityContactNumber"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblEntityContactNumber"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblEntityContactNumber"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblEntityContactNumber"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblEntityContactNumber"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblEntityContactNumber"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblEntityContactNumber"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblEntityContactNumber"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblEntityContactNumber"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblEntityContactNumber"."Entity_RefID" > "SchData-OLTP-Master"."TblInstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblEntityContactNumber"."Entity_RefID" > "SchData-OLTP-Master"."TblInstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblEntityContactNumber"."Entity_RefID" > "SchData-OLTP-Master"."TblPerson"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblEntityContactNumber"."Entity_RefID" > "SchData-OLTP-Master"."TblPerson"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblEntityContactNumber"."ContactNumberType_RefID" > "SchData-OLTP-Master"."TblContactNumberType"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblEntityContactNumber"."ContactNumberType_RefID" > "SchData-OLTP-Master"."TblContactNumberType"."Sys_SID"



TABLE "SchData-OLTP-Master"."TblEntityEMailAccount"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
	"Entity_RefID" bigint
    "Account" varchara(256)
    }
Ref: "SchData-OLTP-Master"."TblEntityEMailAccount"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblEntityEMailAccount"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblEntityEMailAccount"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblEntityEMailAccount"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblEntityEMailAccount"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblEntityEMailAccount"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblEntityEMailAccount"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblEntityEMailAccount"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblEntityEMailAccount"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblEntityEMailAccount"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblEntityEMailAccount"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblEntityEMailAccount"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblEntityEMailAccount"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblEntityEMailAccount"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblEntityEMailAccount"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblEntityEMailAccount"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblEntityEMailAccount"."Entity_RefID" > "SchData-OLTP-Master"."TblInstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblEntityEMailAccount"."Entity_RefID" > "SchData-OLTP-Master"."TblInstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblEntityEMailAccount"."Entity_RefID" > "SchData-OLTP-Master"."TblPerson"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblEntityEMailAccount"."Entity_RefID" > "SchData-OLTP-Master"."TblPerson"."Sys_SID"




TABLE "SchData-OLTP-Master"."TblEntitySocialMediaAccount"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
	"Entity_RefID" bigint
	"SocialMedia_RefID" bigint
    "Account" varchar(256)
    }
Ref: "SchData-OLTP-Master"."TblEntitySocialMediaAccount"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblEntitySocialMediaAccount"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblEntitySocialMediaAccount"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblEntitySocialMediaAccount"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblEntitySocialMediaAccount"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblEntitySocialMediaAccount"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblEntitySocialMediaAccount"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblEntitySocialMediaAccount"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblEntitySocialMediaAccount"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblEntitySocialMediaAccount"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblEntitySocialMediaAccount"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblEntitySocialMediaAccount"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblEntitySocialMediaAccount"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblEntitySocialMediaAccount"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblEntitySocialMediaAccount"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblEntitySocialMediaAccount"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblEntitySocialMediaAccount"."Entity_RefID" > "SchData-OLTP-Master"."TblInstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblEntitySocialMediaAccount"."Entity_RefID" > "SchData-OLTP-Master"."TblInstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblEntitySocialMediaAccount"."Entity_RefID" > "SchData-OLTP-Master"."TblPerson"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblEntitySocialMediaAccount"."Entity_RefID" > "SchData-OLTP-Master"."TblPerson"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblEntitySocialMediaAccount"."SocialMedia_RefID" > "SchData-OLTP-Master"."TblSocialMedia"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblEntitySocialMediaAccount"."SocialMedia_RefID" > "SchData-OLTP-Master"."TblSocialMedia"."Sys_SID"



TABLE "SchData-OLTP-Master"."TblGoodsModel"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
	"TradeMark_RefID" bigint
    "GoodsType_RefID" bigint
    "ModelName" varchar(256)
    "ModelNumber" varchar(256)
    }
Ref: "SchData-OLTP-Master"."TblGoodsModel"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblGoodsModel"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblGoodsModel"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblGoodsModel"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblGoodsModel"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblGoodsModel"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblGoodsModel"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblGoodsModel"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblGoodsModel"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblGoodsModel"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblGoodsModel"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblGoodsModel"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblGoodsModel"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblGoodsModel"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblGoodsModel"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblGoodsModel"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblGoodsModel"."TradeMark_RefID" > "SchData-OLTP-Master"."TblTradeMark"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblGoodsModel"."TradeMark_RefID" > "SchData-OLTP-Master"."TblTradeMark"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblGoodsModel"."GoodsType_RefID" > "SchData-OLTP-Master"."TblGoodsType"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblGoodsModel"."GoodsType_RefID" > "SchData-OLTP-Master"."TblGoodsType"."Sys_SID"



TABLE "SchData-OLTP-Master"."TblGoodsType"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
	"Name" varchar(256)
    }
Ref: "SchData-OLTP-Master"."TblGoodsType"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblGoodsType"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblGoodsType"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblGoodsType"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblGoodsType"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblGoodsType"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblGoodsType"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblGoodsType"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblGoodsType"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblGoodsType"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblGoodsType"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblGoodsType"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblGoodsType"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblGoodsType"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblGoodsType"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblGoodsType"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-Master"."TblHashMethod"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
	"Name" varchar(256)
    }
Ref: "SchData-OLTP-Master"."TblHashMethod"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblHashMethod"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblHashMethod"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblHashMethod"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblHashMethod"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblHashMethod"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblHashMethod"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblHashMethod"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblHashMethod"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblHashMethod"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblHashMethod"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblHashMethod"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblHashMethod"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblHashMethod"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblHashMethod"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblHashMethod"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-Master"."TblInstitution"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
	"Name" varchar(256)
    "InstitutionType_RefID" bigint
    }
Ref: "SchData-OLTP-Master"."TblInstitution"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblInstitution"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblInstitution"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblInstitution"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblInstitution"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblInstitution"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblInstitution"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblInstitution"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblInstitution"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblInstitution"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblInstitution"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblInstitution"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblInstitution"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblInstitution"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblInstitution"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblInstitution"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblInstitution"."InstitutionType_RefID" > "SchData-OLTP-Master"."TblInstitutionType"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblInstitution"."InstitutionType_RefID" > "SchData-OLTP-Master"."TblInstitutionType"."Sys_SID"



TABLE "SchData-OLTP-Master"."TblInstitutionBranch"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
	"Institution_RefID" bigint
    "Name" varchar(256)
    "Address" varchar(512)
    "CountryAdministrativeArea_RefID" bigint
    "PostalCode" varchar(5)
    }
Ref: "SchData-OLTP-Master"."TblInstitutionBranch"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblInstitutionBranch"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblInstitutionBranch"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblInstitutionBranch"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblInstitutionBranch"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblInstitutionBranch"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblInstitutionBranch"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblInstitutionBranch"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblInstitutionBranch"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblInstitutionBranch"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblInstitutionBranch"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblInstitutionBranch"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblInstitutionBranch"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblInstitutionBranch"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblInstitutionBranch"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblInstitutionBranch"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblInstitutionBranch"."Institution_RefID" > "SchData-OLTP-Master"."TblInstitution"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblInstitutionBranch"."Institution_RefID" > "SchData-OLTP-Master"."TblInstitution"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblInstitutionBranch"."CountryAdministrativeArea_RefID" > "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel1"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblInstitutionBranch"."CountryAdministrativeArea_RefID" > "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel1"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblInstitutionBranch"."CountryAdministrativeArea_RefID" > "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel2"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblInstitutionBranch"."CountryAdministrativeArea_RefID" > "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel2"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblInstitutionBranch"."CountryAdministrativeArea_RefID" > "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel3"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblInstitutionBranch"."CountryAdministrativeArea_RefID" > "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel3"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblInstitutionBranch"."CountryAdministrativeArea_RefID" > "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel4"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblInstitutionBranch"."CountryAdministrativeArea_RefID" > "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel4"."Sys_SID"



TABLE "SchData-OLTP-Master"."TblInstitutionType"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
	"Name" varchar(256)
    "Prefix" varchar(16)
    "Suffix" varchar(16)
    }
Ref: "SchData-OLTP-Master"."TblInstitutionType"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblInstitutionType"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblInstitutionType"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblInstitutionType"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblInstitutionType"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblInstitutionType"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblInstitutionType"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblInstitutionType"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblInstitutionType"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblInstitutionType"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblInstitutionType"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblInstitutionType"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblInstitutionType"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblInstitutionType"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblInstitutionType"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblInstitutionType"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-Master"."TblMIME"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
	"MIME" varchar(128)
    "FileExtension" varchar(16)
    "Name" varchar(128)
    "Annotation" varchar(128)
    }
Ref: "SchData-OLTP-Master"."TblMIME"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblMIME"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblMIME"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblMIME"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblMIME"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblMIME"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblMIME"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblMIME"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblMIME"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblMIME"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblMIME"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblMIME"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblMIME"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblMIME"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblMIME"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblMIME"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-Master"."TblPaymentDisbursementMethod"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
	"Name" varchar(32)
    }
Ref: "SchData-OLTP-Master"."TblPaymentDisbursementMethod"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblPaymentDisbursementMethod"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblPaymentDisbursementMethod"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblPaymentDisbursementMethod"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblPaymentDisbursementMethod"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblPaymentDisbursementMethod"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblPaymentDisbursementMethod"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblPaymentDisbursementMethod"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblPaymentDisbursementMethod"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblPaymentDisbursementMethod"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblPaymentDisbursementMethod"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblPaymentDisbursementMethod"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblPaymentDisbursementMethod"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblPaymentDisbursementMethod"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblPaymentDisbursementMethod"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblPaymentDisbursementMethod"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-Master"."TblPaymentMethod"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
	"Name" varchar(64)
    "Acronym" varchar(8)
    }
Ref: "SchData-OLTP-Master"."TblPaymentMethod"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblPaymentMethod"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblPaymentMethod"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblPaymentMethod"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblPaymentMethod"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblPaymentMethod"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblPaymentMethod"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblPaymentMethod"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblPaymentMethod"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblPaymentMethod"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblPaymentMethod"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblPaymentMethod"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblPaymentMethod"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblPaymentMethod"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblPaymentMethod"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblPaymentMethod"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-Master"."TblPaymentSource"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
	"Name" varchar(128)
    "BankAccount_RefID" bigint
    }
Ref: "SchData-OLTP-Master"."TblPaymentSource"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblPaymentSource"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblPaymentSource"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblPaymentSource"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblPaymentSource"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblPaymentSource"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblPaymentSource"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblPaymentSource"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblPaymentSource"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblPaymentSource"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblPaymentSource"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblPaymentSource"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblPaymentSource"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblPaymentSource"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblPaymentSource"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblPaymentSource"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblPaymentSource"."BankAccount_RefID" > "SchData-OLTP-Master"."TblBankAccount"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblPaymentSource"."BankAccount_RefID" > "SchData-OLTP-Master"."TblBankAccount"."Sys_SID"



TABLE "SchData-OLTP-Master"."TblPaymentTerm"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
	"Name" varchar(64)
    "Acronym" varchar(20)
    }
Ref: "SchData-OLTP-Master"."TblPaymentTerm"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblPaymentTerm"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblPaymentTerm"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblPaymentTerm"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblPaymentTerm"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblPaymentTerm"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblPaymentTerm"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblPaymentTerm"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblPaymentTerm"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblPaymentTerm"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblPaymentTerm"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblPaymentTerm"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblPaymentTerm"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblPaymentTerm"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblPaymentTerm"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblPaymentTerm"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-Master"."TblPeriod"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
	"Name" varchar(256)
    }
Ref: "SchData-OLTP-Master"."TblPeriod"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblPeriod"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblPeriod"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblPeriod"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblPeriod"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblPeriod"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblPeriod"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblPeriod"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblPeriod"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblPeriod"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblPeriod"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblPeriod"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblPeriod"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblPeriod"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblPeriod"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblPeriod"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-Master"."TblPerson"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
	"Name" varchar
    "Photo_RefID" bigint
    }
Ref: "SchData-OLTP-Master"."TblPerson"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblPerson"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblPerson"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblPerson"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblPerson"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblPerson"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblPerson"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblPerson"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblPerson"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblPerson"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblPerson"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblPerson"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblPerson"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblPerson"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblPerson"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblPerson"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-Master"."TblPersonGender"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
	"Name" varchar(256)
    }
Ref: "SchData-OLTP-Master"."TblPersonGender"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblPersonGender"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblPersonGender"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblPersonGender"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblPersonGender"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblPersonGender"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblPersonGender"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblPersonGender"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblPersonGender"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblPersonGender"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblPersonGender"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblPersonGender"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblPersonGender"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblPersonGender"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblPersonGender"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblPersonGender"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-Master"."TblProduct"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
	"Name" varchar(256)
    "ProductType_RefID" bigint
    "QuantityUnit_RefID" bigint
    "ValidStartDateTimeTZ" timestamptz
    "ValidFinishDateTimeTZ" timestamptz
    "Code" varchar(32)
    }
Ref: "SchData-OLTP-Master"."TblProduct"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblProduct"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblProduct"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblProduct"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblProduct"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblProduct"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblProduct"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblProduct"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblProduct"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblProduct"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblProduct"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblProduct"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblProduct"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblProduct"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblProduct"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblProduct"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblProduct"."ProductType_RefID" > "SchData-OLTP-Master"."TblProductType"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblProduct"."ProductType_RefID" > "SchData-OLTP-Master"."TblProductType"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblProduct"."QuantityUnit_RefID" > "SchData-OLTP-Master"."TblQuantityUnit"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblProduct"."QuantityUnit_RefID" > "SchData-OLTP-Master"."TblQuantityUnit"."Sys_SID"



TABLE "SchData-OLTP-Master"."TblProductType"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
	"Name" varchar(256)
    }
Ref: "SchData-OLTP-Master"."TblProductType"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblProductType"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblProductType"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblProductType"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblProductType"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblProductType"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblProductType"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblProductType"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblProductType"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblProductType"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblProductType"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblProductType"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblProductType"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblProductType"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblProductType"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblProductType"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-Master"."TblQuantityUnit"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
	"Name" varchar(256)
    }
Ref: "SchData-OLTP-Master"."TblQuantityUnit"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblQuantityUnit"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblQuantityUnit"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblQuantityUnit"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblQuantityUnit"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblQuantityUnit"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblQuantityUnit"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblQuantityUnit"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblQuantityUnit"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblQuantityUnit"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblQuantityUnit"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblQuantityUnit"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblQuantityUnit"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblQuantityUnit"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblQuantityUnit"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblQuantityUnit"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-Master"."TblQuantityUnitConvertion"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
	"BaseQuantityUnit_RefID" bigint
    "ConvertionQuantityUnit_RefID" bigint
    "ConvertionScale" numeric(20,10)
    "Product_RefID" bigint
    }
Ref: "SchData-OLTP-Master"."TblQuantityUnitConvertion"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblQuantityUnitConvertion"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblQuantityUnitConvertion"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblQuantityUnitConvertion"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblQuantityUnitConvertion"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblQuantityUnitConvertion"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblQuantityUnitConvertion"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblQuantityUnitConvertion"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblQuantityUnitConvertion"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblQuantityUnitConvertion"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblQuantityUnitConvertion"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblQuantityUnitConvertion"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblQuantityUnitConvertion"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblQuantityUnitConvertion"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblQuantityUnitConvertion"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblQuantityUnitConvertion"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblQuantityUnitConvertion"."BaseQuantityUnit_RefID" > "SchData-OLTP-Master"."TblQuantityUnit"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblQuantityUnitConvertion"."BaseQuantityUnit_RefID" > "SchData-OLTP-Master"."TblQuantityUnit"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblQuantityUnitConvertion"."ConvertionQuantityUnit_RefID" > "SchData-OLTP-Master"."TblQuantityUnit"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblQuantityUnitConvertion"."ConvertionQuantityUnit_RefID" > "SchData-OLTP-Master"."TblQuantityUnit"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblQuantityUnitConvertion"."Product_RefID" > "SchData-OLTP-Master"."TblProduct"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblQuantityUnitConvertion"."Product_RefID" > "SchData-OLTP-Master"."TblProduct"."Sys_SID"



TABLE "SchData-OLTP-Master"."TblReligion"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
	"Name" varchar(64)
    }
Ref: "SchData-OLTP-Master"."TblReligion"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblReligion"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblReligion"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblReligion"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblReligion"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblReligion"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblReligion"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblReligion"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblReligion"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblReligion"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblReligion"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblReligion"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblReligion"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblReligion"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblReligion"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblReligion"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-Master"."TblSocialMedia"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
	"Name" varchar(256)
	"Website" varchar(256)
    }
Ref: "SchData-OLTP-Master"."TblSocialMedia"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblSocialMedia"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblSocialMedia"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblSocialMedia"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblSocialMedia"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblSocialMedia"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblSocialMedia"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblSocialMedia"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblSocialMedia"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblSocialMedia"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblSocialMedia"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblSocialMedia"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblSocialMedia"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblSocialMedia"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblSocialMedia"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblSocialMedia"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-Master"."TblTradeMark"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
	"Name" varchar(256)
    }
Ref: "SchData-OLTP-Master"."TblTradeMark"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblTradeMark"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblTradeMark"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblTradeMark"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblTradeMark"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblTradeMark"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblTradeMark"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblTradeMark"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblTradeMark"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblTradeMark"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblTradeMark"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblTradeMark"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblTradeMark"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblTradeMark"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblTradeMark"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblTradeMark"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-Master"."TblTransactionAdditionalCostType"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
	"Name" varchar(256)
    }
Ref: "SchData-OLTP-Master"."TblTransactionAdditionalCostType"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblTransactionAdditionalCostType"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblTransactionAdditionalCostType"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblTransactionAdditionalCostType"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblTransactionAdditionalCostType"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblTransactionAdditionalCostType"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblTransactionAdditionalCostType"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblTransactionAdditionalCostType"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblTransactionAdditionalCostType"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblTransactionAdditionalCostType"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblTransactionAdditionalCostType"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblTransactionAdditionalCostType"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblTransactionAdditionalCostType"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblTransactionAdditionalCostType"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblTransactionAdditionalCostType"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblTransactionAdditionalCostType"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-Master"."TblVehicleType"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
	"Name" varchar(256)
    }
Ref: "SchData-OLTP-Master"."TblVehicleType"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblVehicleType"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblVehicleType"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblVehicleType"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblVehicleType"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblVehicleType"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblVehicleType"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblVehicleType"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblVehicleType"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblVehicleType"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblVehicleType"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblVehicleType"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblVehicleType"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblVehicleType"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Master"."TblVehicleType"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Master"."TblVehicleType"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-Accounting"."TblChartOfAccount"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "Code" varchar
    "Name" varchar(256)
    "Currency_RefID" bigint
    "ValidStartDateTimeTZ" timestamptz
    "ValidFinishDateTimeTZ" timestamptz
    }
Ref: "SchData-OLTP-Accounting"."TblChartOfAccount"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblChartOfAccount"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblChartOfAccount"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblChartOfAccount"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblChartOfAccount"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblChartOfAccount"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblChartOfAccount"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblChartOfAccount"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblChartOfAccount"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblChartOfAccount"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblChartOfAccount"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblChartOfAccount"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblChartOfAccount"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblChartOfAccount"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblChartOfAccount"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblChartOfAccount"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblChartOfAccount"."Currency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblChartOfAccount"."Currency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-Accounting"."TblChartOfAccountLinkage"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "ChartOfAccount_RefID" bigint
    "Linkage_RefID" bigint
    "Code" varchar(20)
    "Name" varchar(256)
    "FullName" varchar(256)
    "Currency_RefID" bigint
    "ValidStartDateTimeTZ" timestamptz
    "ValidFinishDateTimeTZ" timestamptz
    "SignOtherThing" boolean
    }
Ref: "SchData-OLTP-Accounting"."TblChartOfAccountLinkage"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblChartOfAccountLinkage"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblChartOfAccountLinkage"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblChartOfAccountLinkage"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblChartOfAccountLinkage"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblChartOfAccountLinkage"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblChartOfAccountLinkage"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblChartOfAccountLinkage"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblChartOfAccountLinkage"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblChartOfAccountLinkage"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblChartOfAccountLinkage"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblChartOfAccountLinkage"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblChartOfAccountLinkage"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblChartOfAccountLinkage"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblChartOfAccountLinkage"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblChartOfAccountLinkage"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblChartOfAccountLinkage"."ChartOfAccount_RefID" > "SchData-OLTP-Accounting"."TblChartOfAccount"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblChartOfAccountLinkage"."ChartOfAccount_RefID" > "SchData-OLTP-Accounting"."TblChartOfAccount"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblChartOfAccountLinkage"."Linkage_RefID" > "SchData-OLTP-HumanResource"."TblWorker"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblChartOfAccountLinkage"."Linkage_RefID" > "SchData-OLTP-HumanResource"."TblWorker"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblChartOfAccountLinkage"."Linkage_RefID" > "SchData-OLTP-CustomerRelation"."TblCustomer"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblChartOfAccountLinkage"."Linkage_RefID" > "SchData-OLTP-CustomerRelation"."TblCustomer"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblChartOfAccountLinkage"."Linkage_RefID" > "SchData-OLTP-SupplyChain"."TblSupplier"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblChartOfAccountLinkage"."Linkage_RefID" > "SchData-OLTP-SupplyChain"."TblSupplier"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblChartOfAccountLinkage"."Linkage_RefID" > "SchData-OLTP-Master"."TblEntityBankAccount"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblChartOfAccountLinkage"."Linkage_RefID" > "SchData-OLTP-Master"."TblEntityBankAccount"."Sys_SID"



TABLE "SchData-OLTP-Accounting"."TblChartOfAccountLinkageSchema"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "ParentChartOfAccount_RefID" bigint
    "LinkageSchemaTable" varchar(256)
    "SignLinkageBoundMandatory" boolean
    "AdditionalLinkageFields" json
    }
Ref: "SchData-OLTP-Accounting"."TblChartOfAccountLinkageSchema"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblChartOfAccountLinkageSchema"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblChartOfAccountLinkageSchema"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblChartOfAccountLinkageSchema"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblChartOfAccountLinkageSchema"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblChartOfAccountLinkageSchema"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblChartOfAccountLinkageSchema"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblChartOfAccountLinkageSchema"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblChartOfAccountLinkageSchema"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblChartOfAccountLinkageSchema"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblChartOfAccountLinkageSchema"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblChartOfAccountLinkageSchema"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblChartOfAccountLinkageSchema"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblChartOfAccountLinkageSchema"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblChartOfAccountLinkageSchema"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblChartOfAccountLinkageSchema"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblChartOfAccountLinkageSchema"."ParentChartOfAccount_RefID" > "SchData-OLTP-Accounting"."TblChartOfAccount"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblChartOfAccountLinkageSchema"."ParentChartOfAccount_RefID" > "SchData-OLTP-Accounting"."TblChartOfAccount"."Sys_SID"



TABLE "SchData-OLTP-Accounting"."TblEndingBalance"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "EndPeriodDateTimeTZ" timestamptz
    "ChartOfAccount_RefID" bigint
    "InhouseCurrencyExchangeRateReference" numeric(20,2)
    "InhouseCurrencyExchangeRateTransaction" numeric(20,2)
    "InhouseCurrencyValue" numeric(20,2)
    "InhouseBaseCurrencyValue" numeric(20,2)
    "AuditedCurrencyExchangeRateTransaction" numeric(20,2)
    "AuditedCurrencyValue" numeric(20,2)
    "AuditedBaseCurrencyValue" numeric(20,2)
    }
Ref: "SchData-OLTP-Accounting"."TblEndingBalance"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblEndingBalance"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblEndingBalance"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblEndingBalance"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblEndingBalance"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblEndingBalance"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblEndingBalance"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblEndingBalance"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblEndingBalance"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblEndingBalance"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblEndingBalance"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblEndingBalance"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblEndingBalance"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblEndingBalance"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblEndingBalance"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblEndingBalance"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblEndingBalance"."ChartOfAccount_RefID" > "SchData-OLTP-Accounting"."TblChartOfAccount"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblEndingBalance"."ChartOfAccount_RefID" > "SchData-OLTP-Accounting"."TblChartOfAccount"."Sys_SID"



TABLE "SchData-OLTP-Accounting"."TblEndingBalanceAudited"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "EndPeriodDateTimeTZ" timestamptz
    "ChartOfAccount_RefID" bigint
    "AuditedCurrencyExchangeRateTransaction" numeric(20,2)
    "AuditedCurrencyValue" numeric(20,2)
    "AuditedBaseCurrencyValue" numeric(20,2)
    }
Ref: "SchData-OLTP-Accounting"."TblEndingBalanceAudited"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblEndingBalanceAudited"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblEndingBalanceAudited"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblEndingBalanceAudited"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblEndingBalanceAudited"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblEndingBalanceAudited"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblEndingBalanceAudited"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblEndingBalanceAudited"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblEndingBalanceAudited"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblEndingBalanceAudited"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblEndingBalanceAudited"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblEndingBalanceAudited"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblEndingBalanceAudited"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblEndingBalanceAudited"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblEndingBalanceAudited"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblEndingBalanceAudited"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblEndingBalanceAudited"."ChartOfAccount_RefID" > "SchData-OLTP-Accounting"."TblChartOfAccount"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblEndingBalanceAudited"."ChartOfAccount_RefID" > "SchData-OLTP-Accounting"."TblChartOfAccount"."Sys_SID"



TABLE "SchData-OLTP-Accounting"."TblJournal"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "JournalCode" varchar(20)
    "JournalDateTimeTZ" timestamptz
    "PosterWorkerJobsPosition_RefID" bigint
    "PostingDateTimeTZ" timestamptz
    "Annotation" varchar(512)
    }
Ref: "SchData-OLTP-Accounting"."TblJournal"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblJournal"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblJournal"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblJournal"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblJournal"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblJournal"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblJournal"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblJournal"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblJournal"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblJournal"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblJournal"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblJournal"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblJournal"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblJournal"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblJournal"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblJournal"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-Accounting"."TblJournalDetail"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "Journal_RefID" bigint
    "JournalDetailDateTimeTZ" timestamptz
    "ChartOfAccountLinkage_RefID" bigint
    "Underlying_RefID" bigint
    "AccountingEntryRecordType_RefID" bigint
    "AmountCurrency_RefID" bigint
    "AmountCurrencyValue" numeric(20,2)
    "AmountCurrencyExchangeRate" numeric(20,2)
    "AmountBaseCurrencyValue" numeric(20,2)
    "QuantityUnit_RefID" bigint
    "Quantity" numeric(10,2)
    "Annotation" varchar(512)
    "CodeOfBudgeting_RefID" bigint
    }
Ref: "SchData-OLTP-Accounting"."TblJournalDetail"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblJournalDetail"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblJournalDetail"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblJournalDetail"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblJournalDetail"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblJournalDetail"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblJournalDetail"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblJournalDetail"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblJournalDetail"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblJournalDetail"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblJournalDetail"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblJournalDetail"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblJournalDetail"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblJournalDetail"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblJournalDetail"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblJournalDetail"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblJournalDetail"."Journal_RefID" > "SchData-OLTP-Accounting"."TblJournal"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblJournalDetail"."Journal_RefID" > "SchData-OLTP-Accounting"."TblJournal"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblJournalDetail"."ChartOfAccountLinkage_RefID" > "SchData-OLTP-Accounting"."TblChartOfAccountLinkage"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblJournalDetail"."ChartOfAccountLinkage_RefID" > "SchData-OLTP-Accounting"."TblChartOfAccountLinkage"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblJournalDetail"."AccountingEntryRecordType_RefID" > "SchData-OLTP-Master"."TblAccountingEntryRecordType"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblJournalDetail"."AccountingEntryRecordType_RefID" > "SchData-OLTP-Master"."TblAccountingEntryRecordType"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblJournalDetail"."AmountCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblJournalDetail"."AmountCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblJournalDetail"."QuantityUnit_RefID" > "SchData-OLTP-Master"."TblQuantityUnit"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblJournalDetail"."QuantityUnit_RefID" > "SchData-OLTP-Master"."TblQuantityUnit"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblJournalDetail"."CodeOfBudgeting_RefID" > "SchData-OLTP-Budgeting"."TblCodeOfBudgeting"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblJournalDetail"."CodeOfBudgeting_RefID" > "SchData-OLTP-Budgeting"."TblCodeOfBudgeting"."Sys_SID"



TABLE "SchData-OLTP-Accounting"."TblLayoutStructure"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "Name" varchar(128)
    "BaseCurrency_RefID" bigint
    "ValidStartDateTime" timestamptz
    "ValidFinishDateTime" timestamptz
    "SQLBuilder" varchar(1048576)
    }
Ref: "SchData-OLTP-Accounting"."TblLayoutStructure"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblLayoutStructure"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblLayoutStructure"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblLayoutStructure"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblLayoutStructure"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblLayoutStructure"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblLayoutStructure"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblLayoutStructure"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblLayoutStructure"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblLayoutStructure"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblLayoutStructure"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblLayoutStructure"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblLayoutStructure"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblLayoutStructure"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblLayoutStructure"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblLayoutStructure"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-Accounting"."TblLayoutStructureChartOfAccount"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "LayoutStructure_RefID" bigint
    "ChartOfAccount_RefID" bigint
    "ParentChartOfAccount_RefID" bigint
    "Sequence" smallint
    }
Ref: "SchData-OLTP-Accounting"."TblLayoutStructureChartOfAccount"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblLayoutStructureChartOfAccount"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblLayoutStructureChartOfAccount"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblLayoutStructureChartOfAccount"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblLayoutStructureChartOfAccount"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblLayoutStructureChartOfAccount"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblLayoutStructureChartOfAccount"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblLayoutStructureChartOfAccount"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblLayoutStructureChartOfAccount"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblLayoutStructureChartOfAccount"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblLayoutStructureChartOfAccount"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblLayoutStructureChartOfAccount"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblLayoutStructureChartOfAccount"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblLayoutStructureChartOfAccount"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Accounting"."TblLayoutStructureChartOfAccount"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Accounting"."TblLayoutStructureChartOfAccount"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-Budgeting"."TblBudget"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "BusinessDocumentVersion_RefID" bigint
    "Name" varchar(256)
    "ValidStartDateTimeTZ" timestamptz
    "ValidFinishDateTimeTZ" timestamptz
    "Code" varchar(32)
    }
Ref: "SchData-OLTP-Budgeting"."TblBudget"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblBudget"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblBudget"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblBudget"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblBudget"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblBudget"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblBudget"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblBudget"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblBudget"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblBudget"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblBudget"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblBudget"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblBudget"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblBudget"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblBudget"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblBudget"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblBudget"."BusinessDocumentVersion_RefID" > "SchData-OLTP-Master"."TblBusinessDocumentVersion"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblBudget"."BusinessDocumentVersion_RefID" > "SchData-OLTP-Master"."TblBusinessDocumentVersion"."Sys_SID"



TABLE "SchData-OLTP-Budgeting"."TblBudgetExpense"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "Budget_RefID" bigint
    "BudgetExpenseGroup_RefID" bigint
    "BudgetExpenseOwner_RefID" bigint
    }
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpense"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpense"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpense"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpense"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpense"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpense"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpense"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpense"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpense"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpense"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpense"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpense"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpense"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpense"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpense"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpense"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpense"."Budget_RefID" > "SchData-OLTP-Budgeting"."TblBudget"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpense"."Budget_RefID" > "SchData-OLTP-Budgeting"."TblBudget"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpense"."BudgetExpenseGroup_RefID" > "SchData-OLTP-Budgeting"."TblBudgetExpenseGroup"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpense"."BudgetExpenseGroup_RefID" > "SchData-OLTP-Budgeting"."TblBudgetExpenseGroup"."Sys_SID"



TABLE "SchData-OLTP-Budgeting"."TblBudgetExpenseGroup"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "Name" varchar(64)
    "ValidStartDateTimeTZ" timestamptz
    "ValidFinishDateTimeTZ" timestamptz
    "Code" varchar(32)
    }
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseGroup"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseGroup"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseGroup"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseGroup"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseGroup"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseGroup"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseGroup"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseGroup"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseGroup"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseGroup"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseGroup"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseGroup"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseGroup"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseGroup"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseGroup"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseGroup"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-Budgeting"."TblBudgetExpenseLine"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "BudgetExpense_RefID" bigint
    "Name" varchar(128)
    "Code" varchar(20)
    }
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseLine"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseLine"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseLine"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseLine"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseLine"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseLine"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseLine"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseLine"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseLine"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseLine"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseLine"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseLine"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseLine"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseLine"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseLine"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseLine"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseLine"."BudgetExpense_RefID" > "SchData-OLTP-Budgeting"."TblBudgetExpense"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseLine"."BudgetExpense_RefID" > "SchData-OLTP-Budgeting"."TblBudgetExpense"."Sys_SID"



TABLE "SchData-OLTP-Budgeting"."TblBudgetExpenseLineCeiling"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "BudgetExpenseLine_RefID" bigint
    "ValidStartDateTimeTZ" timestamptz
    "ValidFinishDateTimeTZ" timestamptz
    "AmountCurrency_RefID" bigint
    "AmountCurrencyValue" numeric(20,2)
    "AmountCurrencyExchangeRate" numeric(20,2)
    "AmountBaseCurrencyValue" numeric(20,2)
    }
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseLineCeiling"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseLineCeiling"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseLineCeiling"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseLineCeiling"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseLineCeiling"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseLineCeiling"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseLineCeiling"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseLineCeiling"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseLineCeiling"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseLineCeiling"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseLineCeiling"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseLineCeiling"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseLineCeiling"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseLineCeiling"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseLineCeiling"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseLineCeiling"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseLineCeiling"."BudgetExpenseLine_RefID" > "SchData-OLTP-Budgeting"."TblBudgetExpenseLine"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseLineCeiling"."BudgetExpenseLine_RefID" > "SchData-OLTP-Budgeting"."TblBudgetExpenseLine"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseLineCeiling"."AmountCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseLineCeiling"."AmountCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-Budgeting"."TblBudgetExpenseLineCeilingObjects"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "BudgetExpenseLineCeiling_RefID" bigint
    "Product_RefID" bigint
    "Quantity" numeric(20,2)
    "QuantityUnit_RefID" bigint
    "ProductUnitPriceCurrency_RefID" bigint
    "ProductUnitPriceCurrencyValue" numeric(20,2)
    "ProductUnitPriceCurrencyExchangeRate" numeric(20,2)
    "ProductUnitPriceBaseCurrencyValue" numeric(20,2)
    }
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseLineCeilingObjects"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseLineCeilingObjects"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseLineCeilingObjects"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseLineCeilingObjects"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseLineCeilingObjects"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseLineCeilingObjects"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseLineCeilingObjects"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseLineCeilingObjects"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseLineCeilingObjects"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseLineCeilingObjects"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseLineCeilingObjects"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseLineCeilingObjects"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseLineCeilingObjects"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseLineCeilingObjects"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseLineCeilingObjects"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseLineCeilingObjects"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseLineCeilingObjects"."BudgetExpenseLineCeiling_RefID" > "SchData-OLTP-Budgeting"."TblBudgetExpenseLineCeiling"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseLineCeilingObjects"."BudgetExpenseLineCeiling_RefID" > "SchData-OLTP-Budgeting"."TblBudgetExpenseLineCeiling"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseLineCeilingObjects"."Product_RefID" > "SchData-OLTP-Master"."TblProduct"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseLineCeilingObjects"."Product_RefID" > "SchData-OLTP-Master"."TblProduct"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseLineCeilingObjects"."QuantityUnit_RefID" > "SchData-OLTP-Master"."TblQuantityUnit"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseLineCeilingObjects"."QuantityUnit_RefID" > "SchData-OLTP-Master"."TblQuantityUnit"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseLineCeilingObjects"."ProductUnitPriceCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetExpenseLineCeilingObjects"."ProductUnitPriceCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-Budgeting"."TblBudgetType"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "Type" varchar(64)
    }
Ref: "SchData-OLTP-Budgeting"."TblBudgetType"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetType"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetType"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetType"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetType"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetType"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetType"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetType"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetType"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetType"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetType"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetType"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetType"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetType"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetType"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblBudgetType"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-Budgeting"."TblCodeOfBudgeting"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "Code" varchar(20)
    "Name" varchar(128)
    "ValidStartDateTimeTZ" timestamptz
    "ValidFinishDateTimeTZ" timestamptz
    }
Ref: "SchData-OLTP-Budgeting"."TblCodeOfBudgeting"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblCodeOfBudgeting"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblCodeOfBudgeting"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblCodeOfBudgeting"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblCodeOfBudgeting"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblCodeOfBudgeting"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblCodeOfBudgeting"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblCodeOfBudgeting"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblCodeOfBudgeting"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblCodeOfBudgeting"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblCodeOfBudgeting"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblCodeOfBudgeting"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblCodeOfBudgeting"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblCodeOfBudgeting"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblCodeOfBudgeting"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblCodeOfBudgeting"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-Budgeting"."TblCombinedBudgetSectionDetail"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "Name" varchar(256)
    "Version" smallint
    "CombinedBudget_RefID" bigint
    "CombinedBudgetSection_RefID" bigint
    "CombinedBudgetSubSectionLevel1_RefID" bigint
    "CombinedBudgetSubSectionLevel2_RefID" bigint
    "CombinedBudgetCode" varchar(32)
    "CombinedBudgetSectionCode" varchar(32)
    "CombinedBudgetName" varchar(256)
    "CombinedBudgetSectionName" varchar(256)
    "CombinedBudgetSubSectionLevel1Name" varchar(256)
    "CombinedBudgetSubSectionLevel2Name" varchar(256)
    "Product_RefID" bigint
    "ProductName" varchar(256)
    "Description" varchar(256)
    "Quantity" numeric(20,2)
    "QuantityUnit_RefID" bigint
    "UnitPriceCurrency_RefID" bigint
    "UnitPriceCurrencyValue" numeric(20,2)
    "UnitPriceCurrencyExchangeRate" numeric(20,2)
    "UnitPriceBaseCurrencyValue" numeric(20,2)
    "PriceBaseCurrencyValue" numeric(20,2)
    }
Ref: "SchData-OLTP-Budgeting"."TblCombinedBudgetSectionDetail"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblCombinedBudgetSectionDetail"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblCombinedBudgetSectionDetail"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblCombinedBudgetSectionDetail"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblCombinedBudgetSectionDetail"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblCombinedBudgetSectionDetail"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblCombinedBudgetSectionDetail"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblCombinedBudgetSectionDetail"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblCombinedBudgetSectionDetail"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblCombinedBudgetSectionDetail"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblCombinedBudgetSectionDetail"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblCombinedBudgetSectionDetail"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblCombinedBudgetSectionDetail"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblCombinedBudgetSectionDetail"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblCombinedBudgetSectionDetail"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblCombinedBudgetSectionDetail"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblCombinedBudgetSectionDetail"."CombinedBudget_RefID" > "SchData-OLTP-Project"."TblProject"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblCombinedBudgetSectionDetail"."CombinedBudget_RefID" > "SchData-OLTP-Project"."TblProject"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblCombinedBudgetSectionDetail"."CombinedBudget_RefID" > "SchData-OLTP-Budgeting"."TblBudget"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblCombinedBudgetSectionDetail"."CombinedBudget_RefID" > "SchData-OLTP-Budgeting"."TblBudget"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblCombinedBudgetSectionDetail"."CombinedBudgetSection_RefID" > "SchData-OLTP-Project"."TblProjectSectionItem"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblCombinedBudgetSectionDetail"."CombinedBudgetSection_RefID" > "SchData-OLTP-Project"."TblProjectSectionItem"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblCombinedBudgetSectionDetail"."CombinedBudgetSection_RefID" > "SchData-OLTP-Budgeting"."TblBudgetExpenseLineCeiling"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblCombinedBudgetSectionDetail"."CombinedBudgetSection_RefID" > "SchData-OLTP-Budgeting"."TblBudgetExpenseLineCeiling"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblCombinedBudgetSectionDetail"."CombinedBudgetSubSectionLevel1_RefID" > "SchData-OLTP-Project"."TblProjectSectionItemWork"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblCombinedBudgetSectionDetail"."CombinedBudgetSubSectionLevel1_RefID" > "SchData-OLTP-Project"."TblProjectSectionItemWork"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblCombinedBudgetSectionDetail"."CombinedBudgetSubSectionLevel1_RefID" > "SchData-OLTP-Budgeting"."TblBudgetExpenseLineCeilingObjects"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblCombinedBudgetSectionDetail"."CombinedBudgetSubSectionLevel1_RefID" > "SchData-OLTP-Budgeting"."TblBudgetExpenseLineCeilingObjects"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblCombinedBudgetSectionDetail"."CombinedBudgetSubSectionLevel2_RefID" > "SchData-OLTP-Production"."TblMaterialProductComponent"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblCombinedBudgetSectionDetail"."CombinedBudgetSubSectionLevel2_RefID" > "SchData-OLTP-Production"."TblMaterialProductComponent"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblCombinedBudgetSectionDetail"."Product_RefID" > "SchData-OLTP-Master"."TblProduct"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblCombinedBudgetSectionDetail"."Product_RefID" > "SchData-OLTP-Master"."TblProduct"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblCombinedBudgetSectionDetail"."QuantityUnit_RefID" > "SchData-OLTP-Master"."TblQuantityUnit"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblCombinedBudgetSectionDetail"."QuantityUnit_RefID" > "SchData-OLTP-Master"."TblQuantityUnit"."Sys_SID"
Ref: "SchData-OLTP-Budgeting"."TblCombinedBudgetSectionDetail"."UnitPriceCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Budgeting"."TblCombinedBudgetSectionDetail"."UnitPriceCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-CustomerRelation"."TblCustomer"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "Entity_RefID" bigint
    "Code" varchar(10)
    }
Ref: "SchData-OLTP-CustomerRelation"."TblCustomer"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblCustomer"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblCustomer"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblCustomer"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblCustomer"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblCustomer"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblCustomer"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblCustomer"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblCustomer"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblCustomer"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblCustomer"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblCustomer"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblCustomer"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblCustomer"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblCustomer"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblCustomer"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblCustomer"."Entity_RefID" > "SchData-OLTP-Master"."TblInstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblCustomer"."Entity_RefID" > "SchData-OLTP-Master"."TblInstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblCustomer"."Entity_RefID" > "SchData-OLTP-Master"."TblPerson"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblCustomer"."Entity_RefID" > "SchData-OLTP-Master"."TblPerson"."Sys_SID"



TABLE "SchData-OLTP-CustomerRelation"."TblProspectiveCustomer"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "Name" varchar(128)
    "Company" varchar(128)
    "Phone" varchar(256)
    "E-Mail" varchar(128)
    }
Ref: "SchData-OLTP-CustomerRelation"."TblProspectiveCustomer"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblProspectiveCustomer"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblProspectiveCustomer"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblProspectiveCustomer"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblProspectiveCustomer"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblProspectiveCustomer"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblProspectiveCustomer"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblProspectiveCustomer"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblProspectiveCustomer"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblProspectiveCustomer"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblProspectiveCustomer"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblProspectiveCustomer"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblProspectiveCustomer"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblProspectiveCustomer"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblProspectiveCustomer"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblProspectiveCustomer"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-CustomerRelation"."TblSalesContract"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "OLDBusinessDocumentVersion_RefID" bigint
    "OLDSalesOrder_RefID" bigint
    "BusinessDocumentVersion_RefID" bigint
    "SalesOrder_RefID" bigint
    }
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContract"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContract"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContract"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContract"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContract"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContract"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContract"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContract"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContract"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContract"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContract"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContract"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContract"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContract"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContract"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContract"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContract"."BusinessDocumentVersion_RefID" > "SchData-OLTP-Master"."TblBusinessDocumentVersion"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContract"."BusinessDocumentVersion_RefID" > "SchData-OLTP-Master"."TblBusinessDocumentVersion"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContract"."SalesOrder_RefID" > "SchData-OLTP-CustomerRelation"."TblSalesOrder"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContract"."SalesOrder_RefID" > "SchData-OLTP-CustomerRelation"."TblSalesOrder"."Sys_SID"



TABLE "SchData-OLTP-CustomerRelation"."TblSalesContractAddendum"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "SalesContract_RefID" bigint
    }
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContractAddendum"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContractAddendum"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContractAddendum"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContractAddendum"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContractAddendum"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContractAddendum"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContractAddendum"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContractAddendum"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContractAddendum"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContractAddendum"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContractAddendum"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContractAddendum"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContractAddendum"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContractAddendum"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContractAddendum"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContractAddendum"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContractAddendum"."SalesContract_RefID" > "SchData-OLTP-CustomerRelation"."TblSalesContract"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContractAddendum"."SalesContract_RefID" > "SchData-OLTP-CustomerRelation"."TblSalesContract"."Sys_SID"



TABLE "SchData-OLTP-CustomerRelation"."TblSalesContractAddendumDetail"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "SalesContractAddendum_RefID" bigint
    "SubTotalCurrency_RefID" bigint
    "SubTotalCurrencyExchangeRate" numeric(20,2)
    "SubTotalCurrencyValue" numeric(20,2)
    "SubTotalBaseCurrencyValue" numeric(20,2)
    "DiscountCurrency_RefID" bigint
    "DiscountCurrencyExchangeRate" numeric(20,2)
    "DiscountCurrencyValue" numeric(20,2)
    "DiscountBaseCurrencyValue" numeric(20,2)
    "TaxRate" numeric(20,2)
    "TaxCurrency_RefID" bigint
    "TaxCurrencyExchangeRate" numeric(20,2)
    "TaxCurrencyValue" numeric(20,2)
    "TaxBaseCurrencyValue" numeric(20,2)
    "TotalAmountCurrency_RefID" bigint
    "TotalAmountCurrencyExchangeRate" numeric(20,2)
    "TotalAmountCurrencyValue" numeric(20,2)
    "TotalAmountBaseCurrencyValue" numeric(20,2)
    }
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContractAddendumDetail"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContractAddendumDetail"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContractAddendumDetail"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContractAddendumDetail"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContractAddendumDetail"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContractAddendumDetail"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContractAddendumDetail"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContractAddendumDetail"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContractAddendumDetail"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContractAddendumDetail"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContractAddendumDetail"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContractAddendumDetail"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContractAddendumDetail"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContractAddendumDetail"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContractAddendumDetail"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContractAddendumDetail"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContractAddendumDetail"."SalesContractAddendum_RefID" > "SchData-OLTP-CustomerRelation"."TblSalesContractAddendum"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContractAddendumDetail"."SalesContractAddendum_RefID" > "SchData-OLTP-CustomerRelation"."TblSalesContractAddendum"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContractAddendumDetail"."SubTotalCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContractAddendumDetail"."SubTotalCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContractAddendumDetail"."DiscountCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContractAddendumDetail"."DiscountCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContractAddendumDetail"."TaxCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContractAddendumDetail"."TaxCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContractAddendumDetail"."TotalAmountCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContractAddendumDetail"."TotalAmountCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-CustomerRelation"."TblSalesContractDetail"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "SalesContract_RefID" bigint
    "SubTotalCurrency_RefID" bigint
    "SubTotalCurrencyValue" numeric(20,2)
    "SubTotalCurrencyExchangeRate" numeric(20,2)
    "SubTotalBaseCurrencyValue" numeric(20,2)
    "DiscountCurrency_RefID" bigint
    "DiscountCurrencyValue" numeric(20,2)
    "DiscountCurrencyExchangeRate" numeric(20,2)
    "DiscountBaseCurrencyValue" numeric(20,2)
    "TaxRate" numeric(20,2)
    "TaxCurrency_RefID" bigint
    "TaxCurrencyValue" numeric(20,2)
    "TaxCurrencyExchangeRate" numeric(20,2)
    "TaxBaseCurrencyValue" numeric(20,2)
    "TotalAmountCurrency_RefID" bigint
    "TotalAmountCurrencyValue" numeric(20,2)
    "TotalAmountCurrencyExchangeRate" numeric(20,2)
    "TotalAmountBaseCurrencyValue" numeric(20,2)
    }
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContractDetail"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContractDetail"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContractDetail"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContractDetail"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContractDetail"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContractDetail"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContractDetail"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContractDetail"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContractDetail"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContractDetail"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContractDetail"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContractDetail"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContractDetail"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContractDetail"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContractDetail"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContractDetail"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContractDetail"."SalesContract_RefID" > "SchData-OLTP-CustomerRelation"."TblSalesContract"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContractDetail"."SalesContract_RefID" > "SchData-OLTP-CustomerRelation"."TblSalesContract"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContractDetail"."SubTotalCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContractDetail"."SubTotalCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContractDetail"."DiscountCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContractDetail"."DiscountCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContractDetail"."TaxCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContractDetail"."TaxCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContractDetail"."TotalAmountCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesContractDetail"."TotalAmountCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"


TABLE "SchData-OLTP-CustomerRelation"."TblSalesOrder"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "BusinessDocumentVersion_RefID" bigint
    "Log_FileUpload_Pointer_RefID" bigint
    "RequesterWorkerJobsPosition_RefID" bigint
    "Customer_RefID" bigint
    "Project_RefID" bigint
    "Remarks" varchar(512)
    }
Ref: "SchData-OLTP-CustomerRelation"."TblSalesOrder"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesOrder"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesOrder"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesOrder"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesOrder"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesOrder"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesOrder"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesOrder"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesOrder"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesOrder"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesOrder"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesOrder"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesOrder"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesOrder"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesOrder"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesOrder"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-CustomerRelation"."TblSalesOrderDetail"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "SalesOrder_RefID" bigint
    "Product_RefID" bigint
    "Quantity" numeric(20,2)
    "QuantityUnit_RefID" bigint
    "ProductUnitPriceCurrency_RefID" bigint
    "ProductUnitPriceCurrencyValue" numeric(20,2)
    "ProductUnitPriceCurrencyExchangeRate" numeric(20,2)
    "ProductUnitPriceBaseCurrencyValue" numeric(20,2)
    "PriceCurrency_RefID" bigint
    "PriceCurrencyValue" numeric(20,2)
    "PriceCurrencyExchangeRate" numeric(20,2)
    "PriceBaseCurrencyValue" numeric(20,2)
    "Remarks" varchar(512)
    }
Ref: "SchData-OLTP-CustomerRelation"."TblSalesOrderDetail"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesOrderDetail"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesOrderDetail"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesOrderDetail"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesOrderDetail"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesOrderDetail"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesOrderDetail"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesOrderDetail"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesOrderDetail"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesOrderDetail"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesOrderDetail"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesOrderDetail"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesOrderDetail"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesOrderDetail"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesOrderDetail"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesOrderDetail"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesOrderDetail"."SalesOrder_RefID" > "SchData-OLTP-CustomerRelation"."TblSalesOrder"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesOrderDetail"."SalesOrder_RefID" > "SchData-OLTP-CustomerRelation"."TblSalesOrder"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesOrderDetail"."Product_RefID" > "SchData-OLTP-Master"."TblProduct"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesOrderDetail"."Product_RefID" > "SchData-OLTP-Master"."TblProduct"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesOrderDetail"."QuantityUnit_RefID" > "SchData-OLTP-Master"."TblQuantityUnit"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesOrderDetail"."QuantityUnit_RefID" > "SchData-OLTP-Master"."TblQuantityUnit"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesOrderDetail"."ProductUnitPriceCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesOrderDetail"."ProductUnitPriceCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesOrderDetail"."PriceCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesOrderDetail"."PriceCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-CustomerRelation"."TblSalesQuotation"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "ProspectiveCustomer_RefID" bigint
    "SalesTender_RefID" bigint
    }
Ref: "SchData-OLTP-CustomerRelation"."TblSalesQuotation"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesQuotation"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesQuotation"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesQuotation"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesQuotation"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesQuotation"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesQuotation"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesQuotation"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesQuotation"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesQuotation"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesQuotation"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesQuotation"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesQuotation"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesQuotation"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesQuotation"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesQuotation"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesQuotation"."ProspectiveCustomer_RefID" > "SchData-OLTP-CustomerRelation"."TblProspectiveCustomer"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesQuotation"."ProspectiveCustomer_RefID" > "SchData-OLTP-CustomerRelation"."TblProspectiveCustomer"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesQuotation"."SalesTender_RefID" > "SchData-OLTP-CustomerRelation"."TblSalesTender"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesQuotation"."SalesTender_RefID" > "SchData-OLTP-CustomerRelation"."TblSalesTender"."Sys_SID"



TABLE "SchData-OLTP-CustomerRelation"."TblSalesTender"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "ProspectiveCustomer_RefID" bigint
    }
Ref: "SchData-OLTP-CustomerRelation"."TblSalesTender"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesTender"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesTender"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesTender"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesTender"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesTender"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesTender"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesTender"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesTender"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesTender"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesTender"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesTender"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesTender"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesTender"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesTender"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesTender"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesTender"."ProspectiveCustomer_RefID" > "SchData-OLTP-CustomerRelation"."TblProspectiveCustomer"."Sys_PID"
Ref: "SchData-OLTP-CustomerRelation"."TblSalesTender"."ProspectiveCustomer_RefID" > "SchData-OLTP-CustomerRelation"."TblProspectiveCustomer"."Sys_SID"



TABLE "SchData-OLTP-DataAcquisition"."TblLog_FileContent"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    }
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileContent"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileContent"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileContent"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileContent"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileContent"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileContent"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileContent"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileContent"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileContent"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileContent"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileContent"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileContent"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileContent"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileContent"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileContent"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileContent"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-DataAcquisition"."TblLog_FileContentDetail"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "Log_FileContent_RefID" bigint
    "Sequence" smallint
    "Name" varchar(256)
    "Size" bigint
    "MIME" varchar(128)
    "Extension" varchar(32)
    "LastModifiedDateTimeTZ" varchar(128)
    "LastModifiedUnixTimestamp" bigint
    "ContentBase64" varchar
    }
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileContentDetail"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileContentDetail"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileContentDetail"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileContentDetail"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileContentDetail"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileContentDetail"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileContentDetail"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileContentDetail"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileContentDetail"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileContentDetail"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileContentDetail"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileContentDetail"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileContentDetail"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileContentDetail"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileContentDetail"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileContentDetail"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileContentDetail"."Log_FileContent_RefID" > "SchData-OLTP-DataAcquisition"."TblLog_FileContent"."Sys_PID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileContentDetail"."Log_FileContent_RefID" > "SchData-OLTP-DataAcquisition"."TblLog_FileContent"."Sys_SID"



TABLE "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Object"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "RotateLog_FileUploadStagingArea_RefRPK" bigint
    }
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Object"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Object"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Object"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Object"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Object"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Object"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Object"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Object"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Object"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Object"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Object"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Object"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Object"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Object"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Object"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Object"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_ObjectDetail"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "Log_FileUpload_Object_RefID" bigint
    "RotateLog_FileUploadStagingAreaDetail_RefRPK" bigint
    "Sequence" smallint
    "Name" varchar(256)
    "Size" bigint
    "MIME" varchar(128)
    "Extension" varchar(32)
    "LastModifiedDateTimeTZ" varchar(128)
    "LastModifiedUnixTimestamp" bigint
    "HashMethod_RefID" bigint
    "ContentBase64Hash" varchar
    "DataCompression_RefID" bigint
    "StagingAreaFilePath" varchar(256)
    }
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_ObjectDetail"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_ObjectDetail"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_ObjectDetail"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_ObjectDetail"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_ObjectDetail"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_ObjectDetail"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_ObjectDetail"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_ObjectDetail"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_ObjectDetail"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_ObjectDetail"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_ObjectDetail"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_ObjectDetail"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_ObjectDetail"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_ObjectDetail"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_ObjectDetail"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_ObjectDetail"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_ObjectDetail"."Log_FileUpload_Object_RefID" > "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Object"."Sys_PID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_ObjectDetail"."Log_FileUpload_Object_RefID" > "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Object"."Sys_SID"



TABLE "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Pointer"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "Log_FileUpload_PointerHistory_RefID" bigint
    }
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Pointer"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Pointer"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Pointer"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Pointer"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Pointer"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Pointer"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Pointer"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Pointer"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Pointer"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Pointer"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Pointer"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Pointer"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Pointer"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Pointer"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Pointer"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Pointer"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Pointer"."Log_FileUpload_PointerHistory_RefID" > "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_PointerHistory"."Sys_PID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Pointer"."Log_FileUpload_PointerHistory_RefID" > "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_PointerHistory"."Sys_SID"



TABLE "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_PointerHistory"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "Log_FileUpload_Pointer_RefID" bigint
    }
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_PointerHistory"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_PointerHistory"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_PointerHistory"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_PointerHistory"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_PointerHistory"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_PointerHistory"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_PointerHistory"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_PointerHistory"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_PointerHistory"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_PointerHistory"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_PointerHistory"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_PointerHistory"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_PointerHistory"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_PointerHistory"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_PointerHistory"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_PointerHistory"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_PointerHistory"."Log_FileUpload_Pointer_RefID" > "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Pointer"."Sys_PID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_PointerHistory"."Log_FileUpload_Pointer_RefID" > "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Pointer"."Sys_SID"



TABLE "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_PointerHistoryDetail"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "Log_FileUpload_PointerHistory_RefID" bigint
    "Log_FileUpload_Object_RefID" bigint
    }
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_PointerHistoryDetail"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_PointerHistoryDetail"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_PointerHistoryDetail"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_PointerHistoryDetail"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_PointerHistoryDetail"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_PointerHistoryDetail"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_PointerHistoryDetail"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_PointerHistoryDetail"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_PointerHistoryDetail"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_PointerHistoryDetail"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_PointerHistoryDetail"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_PointerHistoryDetail"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_PointerHistoryDetail"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_PointerHistoryDetail"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_PointerHistoryDetail"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_PointerHistoryDetail"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_PointerHistoryDetail"."Log_FileUpload_PointerHistory_RefID" > "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_PointerHistory"."Sys_PID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_PointerHistoryDetail"."Log_FileUpload_PointerHistory_RefID" > "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_PointerHistory"."Sys_SID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_PointerHistoryDetail"."Log_FileUpload_Object_RefID" > "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Object"."Sys_PID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_PointerHistoryDetail"."Log_FileUpload_Object_RefID" > "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Object"."Sys_SID"



TABLE "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Thumbnail"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "Log_FileUpload_ObjectDetail_RefID" bigint
    "MIME_RefID" bigint
    "FilesCount" smallint
    }
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Thumbnail"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Thumbnail"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Thumbnail"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Thumbnail"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Thumbnail"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Thumbnail"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Thumbnail"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Thumbnail"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Thumbnail"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Thumbnail"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Thumbnail"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Thumbnail"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Thumbnail"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Thumbnail"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Thumbnail"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Thumbnail"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Thumbnail"."Log_FileUpload_ObjectDetail_RefID" > "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_ObjectDetail"."Sys_PID"
Ref: "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Thumbnail"."Log_FileUpload_ObjectDetail_RefID" > "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_ObjectDetail"."Sys_SID"



TABLE "SchData-OLTP-DataAcquisition"."TblTemp_Device_SwingGateBarrier_CheckInOut"
    {
    "ID" bigint
    "CheckTime" timestamp
    "UserID" bigint
    "CardSerialNumber" varchar(64) 
    }



TABLE "SchData-OLTP-Finance"."TblAdvance"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "BusinessDocumentVersion_RefID" bigint
    "Log_FileUpload_Pointer_RefID" bigint
    "RequesterWorkerJobsPosition_RefID" bigint
    "BeneficiaryWorkerJobsPosition_RefID" bigint
    "BeneficiaryBankAccount_RefID" bigint
    "InternalNotes" varchar(256)
    "Remarks" varchar(512)
    }
Ref: "SchData-OLTP-Finance"."TblAdvance"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblAdvance"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblAdvance"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblAdvance"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblAdvance"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblAdvance"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblAdvance"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblAdvance"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblAdvance"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblAdvance"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblAdvance"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblAdvance"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblAdvance"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblAdvance"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblAdvance"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblAdvance"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblAdvance"."BusinessDocumentVersion_RefID" > "SchData-OLTP-Master"."TblBusinessDocumentVersion"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblAdvance"."BusinessDocumentVersion_RefID" > "SchData-OLTP-Master"."TblBusinessDocumentVersion"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblAdvance"."Log_FileUpload_Pointer_RefID" > "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Pointer"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblAdvance"."Log_FileUpload_Pointer_RefID" > "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Pointer"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblAdvance"."RequesterWorkerJobsPosition_RefID" > "SchData-OLTP-HumanResource"."TblWorkerCareerInternal"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblAdvance"."RequesterWorkerJobsPosition_RefID" > "SchData-OLTP-HumanResource"."TblWorkerCareerInternal"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblAdvance"."BeneficiaryWorkerJobsPosition_RefID" > "SchData-OLTP-HumanResource"."TblWorkerCareerInternal"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblAdvance"."BeneficiaryWorkerJobsPosition_RefID" > "SchData-OLTP-HumanResource"."TblWorkerCareerInternal"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblAdvance"."BeneficiaryBankAccount_RefID" > "SchData-OLTP-Master"."TblBankAccount"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblAdvance"."BeneficiaryBankAccount_RefID" > "SchData-OLTP-Master"."TblBankAccount"."Sys_SID"



TABLE "SchData-OLTP-Finance"."TblAdvanceDetail"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "Advance_RefID" bigint
    "CombinedBudgetSectionDetail_RefID" bigint
    "Product_RefID" bigint
    "Quantity" numeric(20,2)
    "QuantityUnit_RefID" bigint
    "ProductUnitPriceCurrency_RefID" bigint
    "ProductUnitPriceCurrencyValue" numeric(20,2)
    "ProductUnitPriceCurrencyExchangeRate" numeric(20,2)
    "ProductUnitPriceBaseCurrencyValue" numeric(20,2)
    "PriceCurrency_RefID" bigint
    "PriceCurrencyValue" numeric(20,2)
    "PriceCurrencyExchangeRate" numeric(20,2)
    "PriceBaseCurrencyValue" numeric(20,2)
    "Remarks" varchar(256)
    }
Ref: "SchData-OLTP-Finance"."TblAdvanceDetail"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblAdvanceDetail"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblAdvanceDetail"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblAdvanceDetail"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblAdvanceDetail"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblAdvanceDetail"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblAdvanceDetail"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblAdvanceDetail"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblAdvanceDetail"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblAdvanceDetail"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblAdvanceDetail"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblAdvanceDetail"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblAdvanceDetail"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblAdvanceDetail"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblAdvanceDetail"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblAdvanceDetail"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblAdvanceDetail"."Advance_RefID" > "SchData-OLTP-Finance"."TblAdvance"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblAdvanceDetail"."Advance_RefID" > "SchData-OLTP-Finance"."TblAdvance"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblAdvanceDetail"."CombinedBudgetSectionDetail_RefID" > "SchData-OLTP-Budgeting"."TblCombinedBudgetSectionDetail"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblAdvanceDetail"."CombinedBudgetSectionDetail_RefID" > "SchData-OLTP-Budgeting"."TblCombinedBudgetSectionDetail"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblAdvanceDetail"."Product_RefID" > "SchData-OLTP-Master"."TblProduct"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblAdvanceDetail"."Product_RefID" > "SchData-OLTP-Master"."TblProduct"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblAdvanceDetail"."QuantityUnit_RefID" > "SchData-OLTP-Master"."TblQuantityUnit"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblAdvanceDetail"."QuantityUnit_RefID" > "SchData-OLTP-Master"."TblQuantityUnit"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblAdvanceDetail"."ProductUnitPriceCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblAdvanceDetail"."ProductUnitPriceCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblAdvanceDetail"."PriceCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblAdvanceDetail"."PriceCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-Finance"."TblAdvancePayment"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "BusinessDocumentVersion_RefID" bigint
    "Log_FileUpload_Pointer_RefID" bigint
    "RequesterWorkerJobsPosition_RefID" bigint
    "Remarks" varchar(512)
    }
Ref: "SchData-OLTP-Finance"."TblAdvancePayment"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblAdvancePayment"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblAdvancePayment"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblAdvancePayment"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblAdvancePayment"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblAdvancePayment"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblAdvancePayment"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblAdvancePayment"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblAdvancePayment"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblAdvancePayment"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblAdvancePayment"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblAdvancePayment"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblAdvancePayment"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblAdvancePayment"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblAdvancePayment"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblAdvancePayment"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblAdvancePayment"."BusinessDocumentVersion_RefID" > "SchData-OLTP-Master"."TblBusinessDocumentVersion"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblAdvancePayment"."BusinessDocumentVersion_RefID" > "SchData-OLTP-Master"."TblBusinessDocumentVersion"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblAdvancePayment"."Log_FileUpload_Pointer_RefID" > "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Pointer"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblAdvancePayment"."Log_FileUpload_Pointer_RefID" > "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Pointer"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblAdvancePayment"."RequesterWorkerJobsPosition_RefID" > "SchData-OLTP-HumanResource"."TblWorkerCareerInternal"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblAdvancePayment"."RequesterWorkerJobsPosition_RefID" > "SchData-OLTP-HumanResource"."TblWorkerCareerInternal"."Sys_SID"


TABLE "SchData-OLTP-Finance"."TblAdvancePaymentDetail"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "AdvancePayment_RefID" bigint
    "AdvanceDetail_RefID" bigint
    "AmountCurrency_RefID" bigint
    "AmountCurrencyValue" numeric(20,2)
    "AmountCurrencyExchangeRate" numeric(20,2)
    "AmountBaseCurrencyValue" numeric(20,2)
    "Remarks" varchar(512)
    }
Ref: "SchData-OLTP-Finance"."TblAdvancePaymentDetail"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblAdvancePaymentDetail"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblAdvancePaymentDetail"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblAdvancePaymentDetail"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblAdvancePaymentDetail"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblAdvancePaymentDetail"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblAdvancePaymentDetail"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblAdvancePaymentDetail"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblAdvancePaymentDetail"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblAdvancePaymentDetail"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblAdvancePaymentDetail"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblAdvancePaymentDetail"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblAdvancePaymentDetail"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblAdvancePaymentDetail"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblAdvancePaymentDetail"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblAdvancePaymentDetail"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblAdvancePaymentDetail"."AdvancePayment_RefID" > "SchData-OLTP-Finance"."TblAdvancePayment"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblAdvancePaymentDetail"."AdvancePayment_RefID" > "SchData-OLTP-Finance"."TblAdvancePayment"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblAdvancePaymentDetail"."AdvanceDetail_RefID" > "SchData-OLTP-Finance"."TblAdvanceDetail"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblAdvancePaymentDetail"."AdvanceDetail_RefID" > "SchData-OLTP-Finance"."TblAdvanceDetail"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblAdvancePaymentDetail"."AmountCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblAdvancePaymentDetail"."AmountCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-Finance"."TblAdvanceSettlement"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "BusinessDocumentVersion_RefID" bigint
    "Log_FileUpload_Pointer_RefID" bigint
    "RequesterWorkerJobsPosition_RefID" bigint
    "Remarks" varchar(512)
    }
Ref: "SchData-OLTP-Finance"."TblAdvanceSettlement"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblAdvanceSettlement"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblAdvanceSettlement"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblAdvanceSettlement"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblAdvanceSettlement"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblAdvanceSettlement"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblAdvanceSettlement"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblAdvanceSettlement"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblAdvanceSettlement"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblAdvanceSettlement"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblAdvanceSettlement"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblAdvanceSettlement"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblAdvanceSettlement"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblAdvanceSettlement"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblAdvanceSettlement"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblAdvanceSettlement"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblAdvanceSettlement"."BusinessDocumentVersion_RefID" > "SchData-OLTP-Master"."TblBusinessDocumentVersion"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblAdvanceSettlement"."BusinessDocumentVersion_RefID" > "SchData-OLTP-Master"."TblBusinessDocumentVersion"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblAdvanceSettlement"."Log_FileUpload_Pointer_RefID" > "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Pointer"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblAdvanceSettlement"."Log_FileUpload_Pointer_RefID" > "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Pointer"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblAdvanceSettlement"."RequesterWorkerJobsPosition_RefID" > "SchData-OLTP-HumanResource"."TblWorkerCareerInternal"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblAdvanceSettlement"."RequesterWorkerJobsPosition_RefID" > "SchData-OLTP-HumanResource"."TblWorkerCareerInternal"."Sys_SID"



TABLE "SchData-OLTP-Finance"."TblAdvanceSettlementDetail"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "AdvanceSettlement_RefID" bigint
    "AdvanceDetail_RefID" bigint
    "Product_RefID" bigint
    "Quantity" numeric(20,2)
    "QuantityUnit_RefID" bigint
    "ExpenseClaimProductUnitPriceCurrency_RefID" bigint
    "ExpenseClaimProductUnitPriceCurrencyValue" numeric(20,2)
    "ExpenseClaimProductUnitPriceCurrencyExchangeRate" numeric(20,2)
    "ExpenseClaimProductUnitPriceBaseCurrencyValue" numeric(20,2)
    "ExpenseClaimPriceCurrency_RefID" bigint
    "ExpenseClaimPriceCurrencyValue" numeric(20,2)
    "ExpenseClaimPriceCurrencyExchangeRate" numeric(20,2)
    "ExpenseClaimPriceBaseCurrencyValue" numeric(20,2)
    "ReturnProductUnitPriceCurrency_RefID" bigint
    "ReturnProductUnitPriceCurrencyValue" numeric(20,2)
    "ReturnProductUnitPriceCurrencyExchangeRate" numeric(20,2)
    "ReturnProductUnitPriceBaseCurrencyValue" numeric(20,2)
    "ReturnPriceCurrency_RefID" bigint
    "ReturnPriceCurrencyValue" numeric(20,2)
    "ReturnPriceCurrencyExchangeRate" numeric(20,2)
    "ReturnPriceBaseCurrencyValue" numeric(20,2)
    "Remarks" varchar(512)
    }
Ref: "SchData-OLTP-Finance"."TblAdvanceSettlementDetail"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblAdvanceSettlementDetail"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblAdvanceSettlementDetail"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblAdvanceSettlementDetail"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblAdvanceSettlementDetail"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblAdvanceSettlementDetail"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblAdvanceSettlementDetail"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblAdvanceSettlementDetail"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblAdvanceSettlementDetail"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblAdvanceSettlementDetail"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblAdvanceSettlementDetail"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblAdvanceSettlementDetail"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblAdvanceSettlementDetail"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblAdvanceSettlementDetail"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblAdvanceSettlementDetail"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblAdvanceSettlementDetail"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblAdvanceSettlementDetail"."AdvanceSettlement_RefID" > "SchData-OLTP-Finance"."TblAdvanceSettlement"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblAdvanceSettlementDetail"."AdvanceSettlement_RefID" > "SchData-OLTP-Finance"."TblAdvanceSettlement"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblAdvanceSettlementDetail"."AdvanceDetail_RefID" > "SchData-OLTP-Finance"."TblAdvanceDetail"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblAdvanceSettlementDetail"."AdvanceDetail_RefID" > "SchData-OLTP-Finance"."TblAdvanceDetail"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblAdvanceSettlementDetail"."Product_RefID" > "SchData-OLTP-Master"."TblProduct"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblAdvanceSettlementDetail"."Product_RefID" > "SchData-OLTP-Master"."TblProduct"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblAdvanceSettlementDetail"."QuantityUnit_RefID" > "SchData-OLTP-Master"."TblQuantityUnit"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblAdvanceSettlementDetail"."QuantityUnit_RefID" > "SchData-OLTP-Master"."TblQuantityUnit"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblAdvanceSettlementDetail"."ExpenseClaimProductUnitPriceCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblAdvanceSettlementDetail"."ExpenseClaimProductUnitPriceCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblAdvanceSettlementDetail"."ExpenseClaimPriceCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblAdvanceSettlementDetail"."ExpenseClaimPriceCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblAdvanceSettlementDetail"."ReturnProductUnitPriceCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblAdvanceSettlementDetail"."ReturnProductUnitPriceCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblAdvanceSettlementDetail"."ReturnPriceCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblAdvanceSettlementDetail"."ReturnPriceCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
	
	

TABLE "SchData-OLTP-Finance"."TblBankAccountMutation"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "BankAccount_RefID" bigint
    "Log_FileUpload_Pointer_RefID" bigint
    "Remarks" varchar(512)
    }
Ref: "SchData-OLTP-Finance"."TblBankAccountMutation"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblBankAccountMutation"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblBankAccountMutation"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblBankAccountMutation"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblBankAccountMutation"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblBankAccountMutation"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblBankAccountMutation"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblBankAccountMutation"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblBankAccountMutation"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblBankAccountMutation"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblBankAccountMutation"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblBankAccountMutation"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblBankAccountMutation"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblBankAccountMutation"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblBankAccountMutation"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblBankAccountMutation"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblBankAccountMutation"."BankAccount_RefID" > "SchData-OLTP-Master"."TblBankAccount"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblBankAccountMutation"."BankAccount_RefID" > "SchData-OLTP-Master"."TblBankAccount"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblBankAccountMutation"."Log_FileUpload_Pointer_RefID" > "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Pointer"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblBankAccountMutation"."Log_FileUpload_Pointer_RefID" > "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Pointer"."Sys_SID"



TABLE "SchData-OLTP-Finance"."TblBankAccountMutationDetail"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "BankAccountMutation_RefID" bigint
    "MutationDateTimeTZ" timestamptz
    "AccountingEntryRecordType_RefID" bigint
    "AmountCurrency_RefID" bigint
    "AmountCurrencyValue" numeric(20,2)
    "AmountCurrencyExchangeRate" numeric(20,2)
    "AmountBaseCurrencyValue" numeric(20,2)
    "Description" varchar(512)
    }
Ref: "SchData-OLTP-Finance"."TblBankAccountMutationDetail"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblBankAccountMutationDetail"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblBankAccountMutationDetail"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblBankAccountMutationDetail"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblBankAccountMutationDetail"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblBankAccountMutationDetail"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblBankAccountMutationDetail"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblBankAccountMutationDetail"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblBankAccountMutationDetail"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblBankAccountMutationDetail"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblBankAccountMutationDetail"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblBankAccountMutationDetail"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblBankAccountMutationDetail"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblBankAccountMutationDetail"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblBankAccountMutationDetail"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblBankAccountMutationDetail"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblBankAccountMutationDetail"."BankAccountMutation_RefID" > "SchData-OLTP-Finance"."TblBankAccountMutationDetail"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblBankAccountMutationDetail"."BankAccountMutation_RefID" > "SchData-OLTP-Finance"."TblBankAccountMutationDetail"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblBankAccountMutationDetail"."AccountingEntryRecordType_RefID" > "SchData-OLTP-Master"."TblAccountingEntryRecordType"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblBankAccountMutationDetail"."AccountingEntryRecordType_RefID" > "SchData-OLTP-Master"."TblAccountingEntryRecordType"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblBankAccountMutationDetail"."AmountCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblBankAccountMutationDetail"."AmountCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"


TABLE "SchData-OLTP-Finance"."TblCashFlowActivityType"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "Name" varchar
    }
Ref: "SchData-OLTP-Finance"."TblCashFlowActivityType"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblCashFlowActivityType"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblCashFlowActivityType"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblCashFlowActivityType"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblCashFlowActivityType"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblCashFlowActivityType"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblCashFlowActivityType"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblCashFlowActivityType"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblCashFlowActivityType"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblCashFlowActivityType"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblCashFlowActivityType"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblCashFlowActivityType"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblCashFlowActivityType"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblCashFlowActivityType"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblCashFlowActivityType"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblCashFlowActivityType"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-Finance"."TblCashFlowPlan"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "Name" varchar
    }
Ref: "SchData-OLTP-Finance"."TblCashFlowPlan"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblCashFlowPlan"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblCashFlowPlan"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblCashFlowPlan"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblCashFlowPlan"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblCashFlowPlan"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblCashFlowPlan"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblCashFlowPlan"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblCashFlowPlan"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblCashFlowPlan"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblCashFlowPlan"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblCashFlowPlan"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblCashFlowPlan"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblCashFlowPlan"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblCashFlowPlan"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblCashFlowPlan"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-Finance"."TblCashFlowPlanDetail"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "CashFlowPlan_RefID" bigint
    "CashFlowPlanItem_RefID" bigint
    "CashFlowActivityType_RefID" bigint
    "CashFlowStreamType_RefID" bigint
    "AmountCurrency_RefID" bigint
    "AmountCurrencyValue" numeric(20,2)
    "AmountCurrencyExchangeRate" numeric(20,2)
    "AmountBaseCurrencyValue" numeric(20,2)
    "ScheduledDateTimeTZ" timestamptz
    "RealizationDateTimeTZ" timestamptz
    "Remarks" varchar(256)
    }
Ref: "SchData-OLTP-Finance"."TblCashFlowPlanDetail"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblCashFlowPlanDetail"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblCashFlowPlanDetail"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblCashFlowPlanDetail"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblCashFlowPlanDetail"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblCashFlowPlanDetail"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblCashFlowPlanDetail"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblCashFlowPlanDetail"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblCashFlowPlanDetail"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblCashFlowPlanDetail"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblCashFlowPlanDetail"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblCashFlowPlanDetail"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblCashFlowPlanDetail"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblCashFlowPlanDetail"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblCashFlowPlanDetail"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblCashFlowPlanDetail"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblCashFlowPlanDetail"."CashFlowPlan_RefID" > "SchData-OLTP-Finance"."TblCashFlowPlan"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblCashFlowPlanDetail"."CashFlowPlan_RefID" > "SchData-OLTP-Finance"."TblCashFlowPlan"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblCashFlowPlanDetail"."CashFlowActivityType_RefID" > "SchData-OLTP-Finance"."TblCashFlowActivityType"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblCashFlowPlanDetail"."CashFlowActivityType_RefID" > "SchData-OLTP-Finance"."TblCashFlowActivityType"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblCashFlowPlanDetail"."CashFlowStreamType_RefID" > "SchData-OLTP-Finance"."TblCashFlowStreamType"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblCashFlowPlanDetail"."CashFlowStreamType_RefID" > "SchData-OLTP-Finance"."TblCashFlowStreamType"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblCashFlowPlanDetail"."AmountCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblCashFlowPlanDetail"."AmountCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-Finance"."TblCashFlowStreamType"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "Name" varchar
    }
Ref: "SchData-OLTP-Finance"."TblCashFlowStreamType"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblCashFlowStreamType"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblCashFlowStreamType"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblCashFlowStreamType"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblCashFlowStreamType"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblCashFlowStreamType"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblCashFlowStreamType"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblCashFlowStreamType"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblCashFlowStreamType"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblCashFlowStreamType"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblCashFlowStreamType"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblCashFlowStreamType"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblCashFlowStreamType"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblCashFlowStreamType"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblCashFlowStreamType"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblCashFlowStreamType"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-Finance"."TblCreditNote"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "BusinessDocumentVersion_RefID" bigint
    "Log_FileUpload_Pointer_RefID" bigint
    "RequesterWorkerJobsPosition_RefID" bigint
    "Remarks" varchar(512)
    }
Ref: "SchData-OLTP-Finance"."TblCreditNote"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblCreditNote"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblCreditNote"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblCreditNote"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblCreditNote"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblCreditNote"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblCreditNote"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblCreditNote"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblCreditNote"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblCreditNote"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblCreditNote"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblCreditNote"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblCreditNote"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblCreditNote"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblCreditNote"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblCreditNote"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblCreditNote"."BusinessDocumentVersion_RefID" > "SchData-OLTP-Master"."TblBusinessDocumentVersion"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblCreditNote"."BusinessDocumentVersion_RefID" > "SchData-OLTP-Master"."TblBusinessDocumentVersion"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblCreditNote"."Log_FileUpload_Pointer_RefID" > "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Pointer"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblCreditNote"."Log_FileUpload_Pointer_RefID" > "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Pointer"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblCreditNote"."RequesterWorkerJobsPosition_RefID" > "SchData-OLTP-HumanResource"."TblWorkerCareerInternal"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblCreditNote"."RequesterWorkerJobsPosition_RefID" > "SchData-OLTP-HumanResource"."TblWorkerCareerInternal"."Sys_SID"


TABLE "SchData-OLTP-Finance"."TblCreditNoteDetail"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "CreditNote_RefID" bigint
    "Remarks" varchar(512)
    }
Ref: "SchData-OLTP-Finance"."TblCreditNoteDetail"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblCreditNoteDetail"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblCreditNoteDetail"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblCreditNoteDetail"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblCreditNoteDetail"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblCreditNoteDetail"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblCreditNoteDetail"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblCreditNoteDetail"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblCreditNoteDetail"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblCreditNoteDetail"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblCreditNoteDetail"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblCreditNoteDetail"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblCreditNoteDetail"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblCreditNoteDetail"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblCreditNoteDetail"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblCreditNoteDetail"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblCreditNoteDetail"."CreditNote_RefID" > "SchData-OLTP-Finance"."TblCreditNote"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblCreditNoteDetail"."CreditNote_RefID" > "SchData-OLTP-Finance"."TblCreditNote"."Sys_SID"



TABLE "SchData-OLTP-Finance"."TblDebitNote"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
	"Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "BusinessDocumentVersion_RefID" bigint
    "Log_FileUpload_Pointer_RefID" bigint
    "RequesterWorkerJobsPosition_RefID" bigint
    "Remarks" varchar(512)
    }
Ref: "SchData-OLTP-Finance"."TblDebitNote"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblDebitNote"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblDebitNote"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblDebitNote"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblDebitNote"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblDebitNote"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblDebitNote"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblDebitNote"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblDebitNote"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblDebitNote"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblDebitNote"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblDebitNote"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblDebitNote"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblDebitNote"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblDebitNote"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblDebitNote"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblDebitNote"."BusinessDocumentVersion_RefID" > "SchData-OLTP-Master"."TblBusinessDocumentVersion"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblDebitNote"."BusinessDocumentVersion_RefID" > "SchData-OLTP-Master"."TblBusinessDocumentVersion"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblDebitNote"."Log_FileUpload_Pointer_RefID" > "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Pointer"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblDebitNote"."Log_FileUpload_Pointer_RefID" > "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Pointer"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblDebitNote"."RequesterWorkerJobsPosition_RefID" > "SchData-OLTP-HumanResource"."TblWorkerCareerInternal"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblDebitNote"."RequesterWorkerJobsPosition_RefID" > "SchData-OLTP-HumanResource"."TblWorkerCareerInternal"."Sys_SID"


TABLE "SchData-OLTP-Finance"."TblDebitNoteDetail"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "DebitNote_RefID" bigint
    "PaymentInstruction_RefID" bigint
    "Product_RefID" bigint
    "Quantity" numeric(20,2)
    "QuantityUnit_RefID" bigint
    "ProductUnitPriceCurrency_RefID" bigint
    "ProductUnitPriceCurrencyValue" numeric(20,2)
    "ProductUnitPriceCurrencyExchangeRate" numeric(20,2)
    "ProductUnitPriceBaseCurrencyValue" numeric(20,2)
    "PriceCurrency_RefID" bigint
    "PriceCurrencyValue" numeric(20,2)
    "PriceCurrencyExchangeRate" numeric(20,2)
    "PriceBaseCurrencyValue" numeric(20,2)
    "Remarks" varchar(512)
    }
Ref: "SchData-OLTP-Finance"."TblDebitNoteDetail"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblDebitNoteDetail"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblDebitNoteDetail"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblDebitNoteDetail"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblDebitNoteDetail"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblDebitNoteDetail"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblDebitNoteDetail"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblDebitNoteDetail"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblDebitNoteDetail"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblDebitNoteDetail"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblDebitNoteDetail"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblDebitNoteDetail"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblDebitNoteDetail"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblDebitNoteDetail"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblDebitNoteDetail"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblDebitNoteDetail"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblDebitNoteDetail"."DebitNote_RefID" > "SchData-OLTP-Finance"."TblDebitNote"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblDebitNoteDetail"."DebitNote_RefID" > "SchData-OLTP-Finance"."TblDebitNote"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblDebitNoteDetail"."PaymentInstruction_RefID" > "SchData-OLTP-Finance"."TblPaymentInstruction"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblDebitNoteDetail"."PaymentInstruction_RefID" > "SchData-OLTP-Finance"."TblPaymentInstruction"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblDebitNoteDetail"."Product_RefID" > "SchData-OLTP-Master"."TblProduct"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblDebitNoteDetail"."Product_RefID" > "SchData-OLTP-Master"."TblProduct"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblDebitNoteDetail"."QuantityUnit_RefID" > "SchData-OLTP-Master"."TblQuantityUnit"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblDebitNoteDetail"."QuantityUnit_RefID" > "SchData-OLTP-Master"."TblQuantityUnit"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblDebitNoteDetail"."ProductUnitPriceCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblDebitNoteDetail"."ProductUnitPriceCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblDebitNoteDetail"."PriceCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblDebitNoteDetail"."PriceCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-Finance"."TblPayment"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "BusinessDocumentVersion_RefID" bigint
    "Log_FileUpload_Pointer_RefID" bigint
    "RequesterWorkerJobsPosition_RefID" bigint
    "Remarks" varchar(512)
    }
Ref: "SchData-OLTP-Finance"."TblPayment"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPayment"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPayment"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPayment"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPayment"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPayment"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPayment"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPayment"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPayment"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPayment"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPayment"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPayment"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPayment"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPayment"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPayment"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPayment"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPayment"."BusinessDocumentVersion_RefID" > "SchData-OLTP-Master"."TblBusinessDocumentVersion"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPayment"."BusinessDocumentVersion_RefID" > "SchData-OLTP-Master"."TblBusinessDocumentVersion"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPayment"."Log_FileUpload_Pointer_RefID" > "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Pointer"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPayment"."Log_FileUpload_Pointer_RefID" > "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Pointer"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPayment"."RequesterWorkerJobsPosition_RefID" > "SchData-OLTP-HumanResource"."TblWorkerCareerInternal"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPayment"."RequesterWorkerJobsPosition_RefID" > "SchData-OLTP-HumanResource"."TblWorkerCareerInternal"."Sys_SID"



TABLE "SchData-OLTP-Finance"."TblPaymentDetail"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "Payment_RefID" bigint
    "Underlying_RefID" bigint
    "AmountCurrency_RefID" bigint
    "AmountCurrencyValue" numeric(20,2)
    "AmountCurrencyExchangeRate" numeric(20,2)
    "AmountBaseCurrencyValue" numeric(20,2)
    "Remarks" varchar(512)
    }
Ref: "SchData-OLTP-Finance"."TblPaymentDetail"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPaymentDetail"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPaymentDetail"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPaymentDetail"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPaymentDetail"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPaymentDetail"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPaymentDetail"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPaymentDetail"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPaymentDetail"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPaymentDetail"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPaymentDetail"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPaymentDetail"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPaymentDetail"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPaymentDetail"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPaymentDetail"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPaymentDetail"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPaymentDetail"."Payment_RefID" > "SchData-OLTP-Finance"."TblPayment"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPaymentDetail"."Payment_RefID" > "SchData-OLTP-Finance"."TblPayment"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPaymentDetail"."Underlying_RefID" > "SchData-OLTP-Finance"."TblAdvancePaymentDetail"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPaymentDetail"."Underlying_RefID" > "SchData-OLTP-Finance"."TblAdvancePaymentDetail"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPaymentDetail"."Underlying_RefID" > "SchData-OLTP-Finance"."TblPaymentInstructionDetail"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPaymentDetail"."Underlying_RefID" > "SchData-OLTP-Finance"."TblPaymentInstructionDetail"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPaymentDetail"."AmountCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPaymentDetail"."AmountCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-Finance"."TblPaymentFunding"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "Payment_RefID" bigint
    "Log_FileUpload_Pointer_RefID" bigint
    "PaymentMethod_RefID" bigint
    "AmountCurrency_RefID" bigint
    "AmountCurrencyValue" numeric(20,2)
    "AmountCurrencyExchangeRate" numeric(20,2)
    "AmountBaseCurrencyValue" numeric(20,2)
    "FundSource_RefID" bigint
    "PaidDateTimeTZ" timestamptz
    "PayerWorkerJobsPosition_RefID" bigint
    "Remarks" varchar(512)
    }
Ref: "SchData-OLTP-Finance"."TblPaymentFunding"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPaymentFunding"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPaymentFunding"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPaymentFunding"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPaymentFunding"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPaymentFunding"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPaymentFunding"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPaymentFunding"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPaymentFunding"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPaymentFunding"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPaymentFunding"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPaymentFunding"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPaymentFunding"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPaymentFunding"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPaymentFunding"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPaymentFunding"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPaymentFunding"."Payment_RefID" > "SchData-OLTP-Finance"."TblPayment"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPaymentFunding"."Payment_RefID" > "SchData-OLTP-Finance"."TblPayment"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPaymentFunding"."Log_FileUpload_Pointer_RefID" > "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Pointer"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPaymentFunding"."Log_FileUpload_Pointer_RefID" > "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Pointer"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPaymentFunding"."PaymentMethod_RefID" > "SchData-OLTP-Master"."TblPaymentMethod"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPaymentFunding"."PaymentMethod_RefID" > "SchData-OLTP-Master"."TblPaymentMethod"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPaymentFunding"."AmountCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPaymentFunding"."AmountCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPaymentFunding"."FundSource_RefID" > "SchData-OLTP-Master"."TblBankAccount"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPaymentFunding"."FundSource_RefID" > "SchData-OLTP-Master"."TblBankAccount"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPaymentFunding"."FundSource_RefID" > "SchData-OLTP-Finance"."TblPettyCash"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPaymentFunding"."FundSource_RefID" > "SchData-OLTP-Finance"."TblPettyCash"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPaymentFunding"."PayerWorkerJobsPosition_RefID" > "SchData-OLTP-HumanResource"."TblWorkerCareerInternal"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPaymentFunding"."PayerWorkerJobsPosition_RefID" > "SchData-OLTP-HumanResource"."TblWorkerCareerInternal"."Sys_SID"



TABLE "SchData-OLTP-Finance"."TblPaymentInstruction"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "BusinessDocumentVersion_RefID" bigint
    "Log_FileUpload_Pointer_RefID" bigint
    "RequesterWorkerJobsPosition_RefID" bigint
    "Remarks" varchar(512)
    }
Ref: "SchData-OLTP-Finance"."TblPaymentInstruction"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPaymentInstruction"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPaymentInstruction"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPaymentInstruction"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPaymentInstruction"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPaymentInstruction"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPaymentInstruction"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPaymentInstruction"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPaymentInstruction"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPaymentInstruction"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPaymentInstruction"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPaymentInstruction"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPaymentInstruction"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPaymentInstruction"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPaymentInstruction"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPaymentInstruction"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPaymentInstruction"."BusinessDocumentVersion_RefID" > "SchData-OLTP-Master"."TblBusinessDocumentVersion"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPaymentInstruction"."BusinessDocumentVersion_RefID" > "SchData-OLTP-Master"."TblBusinessDocumentVersion"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPaymentInstruction"."Log_FileUpload_Pointer_RefID" > "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Pointer"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPaymentInstruction"."Log_FileUpload_Pointer_RefID" > "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Pointer"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPaymentInstruction"."RequesterWorkerJobsPosition_RefID" > "SchData-OLTP-HumanResource"."TblWorkerCareerInternal"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPaymentInstruction"."RequesterWorkerJobsPosition_RefID" > "SchData-OLTP-HumanResource"."TblWorkerCareerInternal"."Sys_SID"



TABLE "SchData-OLTP-Finance"."TblPaymentInstructionDetail"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "PaymentInstruction_RefID" bigint
    "Underlying_RefID" bigint
    "AmountCurrency_RefID" bigint
    "AmountCurrencyValue" numeric(20,2)
    "AmountCurrencyExchangeRate" numeric(20,2)
    "AmountBaseCurrencyValue" numeric(20,2)
    "Remarks" varchar(512)
    }
Ref: "SchData-OLTP-Finance"."TblPaymentInstructionDetail"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPaymentInstructionDetail"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPaymentInstructionDetail"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPaymentInstructionDetail"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPaymentInstructionDetail"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPaymentInstructionDetail"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPaymentInstructionDetail"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPaymentInstructionDetail"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPaymentInstructionDetail"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPaymentInstructionDetail"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPaymentInstructionDetail"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPaymentInstructionDetail"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPaymentInstructionDetail"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPaymentInstructionDetail"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPaymentInstructionDetail"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPaymentInstructionDetail"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPaymentInstructionDetail"."PaymentInstruction_RefID" > "SchData-OLTP-Finance"."TblPaymentInstruction"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPaymentInstructionDetail"."PaymentInstruction_RefID" > "SchData-OLTP-Finance"."TblPaymentInstruction"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPaymentInstructionDetail"."Underlying_RefID" > "SchData-OLTP-Finance"."TblPurchaseInvoice"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPaymentInstructionDetail"."Underlying_RefID" > "SchData-OLTP-Finance"."TblPurchaseInvoice"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPaymentInstructionDetail"."AmountCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPaymentInstructionDetail"."AmountCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-Finance"."TblPettyCash"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "Name" varchar
    }
Ref: "SchData-OLTP-Finance"."TblPettyCash"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPettyCash"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPettyCash"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPettyCash"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPettyCash"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPettyCash"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPettyCash"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPettyCash"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPettyCash"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPettyCash"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPettyCash"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPettyCash"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPettyCash"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPettyCash"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPettyCash"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPettyCash"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-Finance"."TblPurchaseInvoice"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "Log_FileUpload_Pointer_RefID" bigint
    "Supplier_RefID" bigint
    "DocumentNumber" varchar(64)
    "DocumentDateTimeTZ" timestamptz
    "SalesOrderNumber" varchar(256)
    "PaymentDueDateTimeTZ" timestamptz
    "PreferredPaymentMethod_RefID" bigint
    "PreferredBankAccount_RefID" bigint
    "ReceivedDateTimeTZ" timestamptz
    "TransactionTax_RefID" bigint
    "AmountRoundOff" numeric(20,2)
    "Remarks" varchar(512)
    }
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoice"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoice"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoice"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoice"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoice"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoice"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoice"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoice"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoice"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoice"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoice"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoice"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoice"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoice"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoice"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoice"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoice"."Log_FileUpload_Pointer_RefID" > "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Pointer"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoice"."Log_FileUpload_Pointer_RefID" > "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Pointer"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoice"."Supplier_RefID" > "SchData-OLTP-SupplyChain"."TblSupplier"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoice"."Supplier_RefID" > "SchData-OLTP-SupplyChain"."TblSupplier"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoice"."PreferredPaymentMethod_RefID" > "SchData-OLTP-Master"."TblPaymentMethod"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoice"."PreferredPaymentMethod_RefID" > "SchData-OLTP-Master"."TblPaymentMethod"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoice"."PreferredBankAccount_RefID" > "SchData-OLTP-Master"."TblBankAccount"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoice"."PreferredBankAccount_RefID" > "SchData-OLTP-Master"."TblBankAccount"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoice"."TransactionTax_RefID" > "SchData-OLTP-Taxation"."TblTransactionTax"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoice"."TransactionTax_RefID" > "SchData-OLTP-Taxation"."TblTransactionTax"."Sys_SID"



TABLE "SchData-OLTP-Finance"."TblPurchaseInvoiceAdditionalCost"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "PurchaseInvoice_RefID" bigint
    "TransactionAdditionalCostType_RefID" bigint
    "PriceCurrency_RefID" bigint
    "PriceCurrencyValue" numeric(20,2)
    "PriceCurrencyExchangeRate" numeric(20,2)
    "PriceBaseCurrencyValue" numeric(20,2)
    "Remarks" varchar(256)
    }
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoiceAdditionalCost"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoiceAdditionalCost"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoiceAdditionalCost"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoiceAdditionalCost"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoiceAdditionalCost"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoiceAdditionalCost"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoiceAdditionalCost"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoiceAdditionalCost"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoiceAdditionalCost"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoiceAdditionalCost"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoiceAdditionalCost"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoiceAdditionalCost"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoiceAdditionalCost"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoiceAdditionalCost"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoiceAdditionalCost"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoiceAdditionalCost"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoiceAdditionalCost"."PurchaseInvoice_RefID" > "SchData-OLTP-Finance"."TblPurchaseInvoice"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoiceAdditionalCost"."PurchaseInvoice_RefID" > "SchData-OLTP-Finance"."TblPurchaseInvoice"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoiceAdditionalCost"."TransactionAdditionalCostType_RefID" > "SchData-OLTP-Master"."TblTransactionAdditionalCostType"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoiceAdditionalCost"."TransactionAdditionalCostType_RefID" > "SchData-OLTP-Master"."TblTransactionAdditionalCostType"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoiceAdditionalCost"."PriceCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoiceAdditionalCost"."PriceCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-Finance"."TblPurchaseInvoiceBillingPurpose"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "InstitutionBranch_RefID" bigint
    "Phone" varchar(64)
    "Faximile" varchar(64)
    "EMail" varchar(128)
    "AttentionName" varchar(128) 
    }
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoiceBillingPurpose"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoiceBillingPurpose"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoiceBillingPurpose"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoiceBillingPurpose"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoiceBillingPurpose"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoiceBillingPurpose"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoiceBillingPurpose"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoiceBillingPurpose"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoiceBillingPurpose"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoiceBillingPurpose"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoiceBillingPurpose"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoiceBillingPurpose"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoiceBillingPurpose"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoiceBillingPurpose"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoiceBillingPurpose"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoiceBillingPurpose"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoiceBillingPurpose"."InstitutionBranch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoiceBillingPurpose"."InstitutionBranch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"



TABLE "SchData-OLTP-Finance"."TblPurchaseInvoiceDetail"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "PurchaseInvoice_RefID" bigint
    "PurchaseOrderDetail_RefID" bigint
    "Product_RefID" bigint
    "Quantity" numeric(20,2)
    "QuantityUnit_RefID" bigint
    "ProductUnitPriceCurrency_RefID" bigint
    "ProductUnitPriceCurrencyValue" numeric(20,2)
    "ProductUnitPriceCurrencyExchangeRate" numeric(20,2)
    "ProductUnitPriceBaseCurrencyValue" numeric(20,2)
    "ProductUnitPriceDiscountCurrency_RefID" bigint
    "ProductUnitPriceDiscountCurrencyValue" numeric(20,2)
    "ProductUnitPriceDiscountCurrencyExchangeRate" numeric(20,2)
    "ProductUnitPriceDiscountBaseCurrencyValue" numeric(20,2)
    "ProductUnitPriceFinalCurrency_RefID" bigint
    "ProductUnitPriceFinalCurrencyValue" numeric(20,2)
    "ProductUnitPriceFinalCurrencyExchangeRate" numeric(20,2)
    "ProductUnitPriceFinalBaseCurrencyValue" numeric(20,2)
    "PriceFinalCurrency_RefID" bigint
    "PriceFinalCurrencyValue" numeric(20,2)
    "PriceFinalCurrencyExchangeRate" numeric(20,2)
    "PriceFinalBaseCurrencyValue" numeric(20,2)
    "Remarks" varchar(512)
    }
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoiceDetail"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoiceDetail"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoiceDetail"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoiceDetail"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoiceDetail"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoiceDetail"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoiceDetail"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoiceDetail"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoiceDetail"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoiceDetail"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoiceDetail"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoiceDetail"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoiceDetail"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoiceDetail"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoiceDetail"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoiceDetail"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoiceDetail"."PurchaseInvoice_RefID" > "SchData-OLTP-Finance"."TblPurchaseInvoice"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoiceDetail"."PurchaseInvoice_RefID" > "SchData-OLTP-Finance"."TblPurchaseInvoice"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoiceDetail"."PurchaseOrderDetail_RefID" > "SchData-OLTP-SupplyChain"."TblPurchaseOrderDetail"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoiceDetail"."PurchaseOrderDetail_RefID" > "SchData-OLTP-SupplyChain"."TblPurchaseOrderDetail"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoiceDetail"."Product_RefID" > "SchData-OLTP-Master"."TblProduct"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoiceDetail"."Product_RefID" > "SchData-OLTP-Master"."TblProduct"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoiceDetail"."QuantityUnit_RefID" > "SchData-OLTP-Master"."TblQuantityUnit"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoiceDetail"."QuantityUnit_RefID" > "SchData-OLTP-Master"."TblQuantityUnit"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoiceDetail"."ProductUnitPriceCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoiceDetail"."ProductUnitPriceCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoiceDetail"."ProductUnitPriceDiscountCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoiceDetail"."ProductUnitPriceDiscountCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoiceDetail"."ProductUnitPriceFinalCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoiceDetail"."ProductUnitPriceFinalCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoiceDetail"."PriceFinalCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseInvoiceDetail"."PriceFinalCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-Finance"."TblPurchaseProformaInvoice"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "Log_FileUpload_Pointer_RefID" bigint
    "Supplier_RefID" bigint
    "DocumentNumber" varchar(64)
    "DocumentDateTimeTZ" timestamptz
    "SalesOrderNumber" varchar(256)
    "PaymentDueDateTimeTZ" timestamptz
    "PreferredPaymentMethod_RefID" bigint
    "PreferredBankAccount_RefID" bigint
    "ReceivedDateTimeTZ" timestamptz
    "TransactionTax_RefID" bigint
    "AmountRoundOff" numeric(20,2)
    "Remarks" varchar(512)
    }
Ref: "SchData-OLTP-Finance"."TblPurchaseProformaInvoice"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseProformaInvoice"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseProformaInvoice"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseProformaInvoice"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseProformaInvoice"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseProformaInvoice"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseProformaInvoice"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseProformaInvoice"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseProformaInvoice"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseProformaInvoice"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseProformaInvoice"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseProformaInvoice"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseProformaInvoice"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseProformaInvoice"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseProformaInvoice"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseProformaInvoice"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseProformaInvoice"."Log_FileUpload_Pointer_RefID" > "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Pointer"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseProformaInvoice"."Log_FileUpload_Pointer_RefID" > "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Pointer"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseProformaInvoice"."Supplier_RefID" > "SchData-OLTP-SupplyChain"."TblSupplier"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseProformaInvoice"."Supplier_RefID" > "SchData-OLTP-SupplyChain"."TblSupplier"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseProformaInvoice"."PreferredPaymentMethod_RefID" > "SchData-OLTP-Master"."TblPaymentMethod"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseProformaInvoice"."PreferredPaymentMethod_RefID" > "SchData-OLTP-Master"."TblPaymentMethod"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseProformaInvoice"."PreferredBankAccount_RefID" > "SchData-OLTP-Master"."TblBankAccount"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseProformaInvoice"."PreferredBankAccount_RefID" > "SchData-OLTP-Master"."TblBankAccount"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseProformaInvoice"."TransactionTax_RefID" > "SchData-OLTP-Taxation"."TblTransactionTax"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseProformaInvoice"."TransactionTax_RefID" > "SchData-OLTP-Taxation"."TblTransactionTax"."Sys_SID"



TABLE "SchData-OLTP-Finance"."TblPurchaseProformaInvoiceAdditionalCost"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "PurchaseProformaInvoice_RefID" bigint
    "TransactionAdditionalCostType_RefID" bigint
    "PriceCurrency_RefID" bigint
    "PriceCurrencyValue" numeric(20,2)
    "PriceCurrencyExchangeRate" numeric(20,2)
    "PriceBaseCurrencyValue" numeric(20,2)
    "Remarks" varchar(256)
    }
Ref: "SchData-OLTP-Finance"."TblPurchaseProformaInvoiceAdditionalCost"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseProformaInvoiceAdditionalCost"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseProformaInvoiceAdditionalCost"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseProformaInvoiceAdditionalCost"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseProformaInvoiceAdditionalCost"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseProformaInvoiceAdditionalCost"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseProformaInvoiceAdditionalCost"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseProformaInvoiceAdditionalCost"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseProformaInvoiceAdditionalCost"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseProformaInvoiceAdditionalCost"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseProformaInvoiceAdditionalCost"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseProformaInvoiceAdditionalCost"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseProformaInvoiceAdditionalCost"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseProformaInvoiceAdditionalCost"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseProformaInvoiceAdditionalCost"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseProformaInvoiceAdditionalCost"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseProformaInvoiceAdditionalCost"."PurchaseProformaInvoice_RefID" > "SchData-OLTP-Finance"."TblPurchaseProformaInvoice"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseProformaInvoiceAdditionalCost"."PurchaseProformaInvoice_RefID" > "SchData-OLTP-Finance"."TblPurchaseProformaInvoice"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseProformaInvoiceAdditionalCost"."TransactionAdditionalCostType_RefID" > "SchData-OLTP-Master"."TblTransactionAdditionalCostType"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseProformaInvoiceAdditionalCost"."TransactionAdditionalCostType_RefID" > "SchData-OLTP-Master"."TblTransactionAdditionalCostType"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseProformaInvoiceAdditionalCost"."PriceCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseProformaInvoiceAdditionalCost"."PriceCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-Finance"."TblPurchaseProformaInvoiceDetail"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "PurchaseProformaInvoice_RefID" bigint
    "PurchaseOrderDetail_RefID" bigint
    "Product_RefID" bigint
    "Quantity" numeric(20,2)
    "QuantityUnit_RefID" bigint
    "ProductUnitPriceCurrency_RefID" bigint
    "ProductUnitPriceCurrencyValue" numeric(20,2)
    "ProductUnitPriceCurrencyExchangeRate" numeric(20,2)
    "ProductUnitPriceBaseCurrencyValue" numeric(20,2)
    "ProductUnitPriceDiscountCurrency_RefID" bigint
    "ProductUnitPriceDiscountCurrencyValue" numeric(20,2)
    "ProductUnitPriceDiscountCurrencyExchangeRate" numeric(20,2)
    "ProductUnitPriceDiscountBaseCurrencyValue" numeric(20,2)
    "ProductUnitPriceFinalCurrency_RefID" bigint
    "ProductUnitPriceFinalCurrencyValue" numeric(20,2)
    "ProductUnitPriceFinalCurrencyExchangeRate" numeric(20,2)
    "ProductUnitPriceFinalBaseCurrencyValue" numeric(20,2)
    "PriceFinalCurrency_RefID" bigint
    "PriceFinalCurrencyValue" numeric(20,2)
    "PriceFinalCurrencyExchangeRate" numeric(20,2)
    "PriceFinalBaseCurrencyValue" numeric(20,2)
    "Remarks" varchar(512)
    }
Ref: "SchData-OLTP-Finance"."TblPurchaseProformaInvoiceDetail"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseProformaInvoiceDetail"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseProformaInvoiceDetail"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseProformaInvoiceDetail"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseProformaInvoiceDetail"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseProformaInvoiceDetail"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseProformaInvoiceDetail"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseProformaInvoiceDetail"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseProformaInvoiceDetail"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseProformaInvoiceDetail"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseProformaInvoiceDetail"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseProformaInvoiceDetail"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseProformaInvoiceDetail"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseProformaInvoiceDetail"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseProformaInvoiceDetail"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseProformaInvoiceDetail"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseProformaInvoiceDetail"."Product_RefID" > "SchData-OLTP-Master"."TblProduct"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseProformaInvoiceDetail"."Product_RefID" > "SchData-OLTP-Master"."TblProduct"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseProformaInvoiceDetail"."QuantityUnit_RefID" > "SchData-OLTP-Master"."TblQuantityUnit"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseProformaInvoiceDetail"."QuantityUnit_RefID" > "SchData-OLTP-Master"."TblQuantityUnit"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseProformaInvoiceDetail"."ProductUnitPriceCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseProformaInvoiceDetail"."ProductUnitPriceCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseProformaInvoiceDetail"."ProductUnitPriceDiscountCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseProformaInvoiceDetail"."ProductUnitPriceDiscountCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseProformaInvoiceDetail"."ProductUnitPriceFinalCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseProformaInvoiceDetail"."ProductUnitPriceFinalCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblPurchaseProformaInvoiceDetail"."PriceFinalCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblPurchaseProformaInvoiceDetail"."PriceFinalCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-Finance"."TblSalesInvoice"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "BusinessDocumentVersion_RefID" bigint
    "Log_FileUpload_Pointer_RefID" bigint
    "RequesterWorkerJobsPosition_RefID" bigint
    "TransactionTax_RefID" bigint
    "AmountRoundOff" numeric(20,2)
    "TermAndConditions" varchar(1024)
    "Remarks" varchar(512) 
    }
Ref: "SchData-OLTP-Finance"."TblSalesInvoice"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoice"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoice"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoice"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoice"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoice"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoice"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoice"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoice"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoice"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoice"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoice"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoice"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoice"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoice"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoice"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoice"."BusinessDocumentVersion_RefID" > "SchData-OLTP-Master"."TblBusinessDocumentVersion"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoice"."BusinessDocumentVersion_RefID" > "SchData-OLTP-Master"."TblBusinessDocumentVersion"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoice"."Log_FileUpload_Pointer_RefID" > "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Pointer"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoice"."Log_FileUpload_Pointer_RefID" > "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Pointer"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoice"."RequesterWorkerJobsPosition_RefID" > "SchData-OLTP-HumanResource"."TblWorkerCareerInternal"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoice"."RequesterWorkerJobsPosition_RefID" > "SchData-OLTP-HumanResource"."TblWorkerCareerInternal"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoice"."TransactionTax_RefID" > "SchData-OLTP-Taxation"."TblTransactionTax"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoice"."TransactionTax_RefID" > "SchData-OLTP-Taxation"."TblTransactionTax"."Sys_SID"



TABLE "SchData-OLTP-Finance"."TblSalesInvoiceAdditionalCost"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "SalesInvoice_RefID" bigint
    "TransactionAdditionalCostType_RefID" bigint
    "PriceCurrency_RefID" bigint
    "PriceCurrencyValue" numeric(20,2)
    "PriceCurrencyExchangeRate" numeric(20,2)
    "PriceBaseCurrencyValue" numeric(20,2)
    "Remarks" varchar(256)
    }
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceAdditionalCost"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceAdditionalCost"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceAdditionalCost"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceAdditionalCost"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceAdditionalCost"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceAdditionalCost"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceAdditionalCost"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceAdditionalCost"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceAdditionalCost"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceAdditionalCost"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceAdditionalCost"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceAdditionalCost"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceAdditionalCost"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceAdditionalCost"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceAdditionalCost"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceAdditionalCost"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceAdditionalCost"."SalesInvoice_RefID" > "SchData-OLTP-Finance"."TblSalesInvoice"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceAdditionalCost"."SalesInvoice_RefID" > "SchData-OLTP-Finance"."TblSalesInvoice"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceAdditionalCost"."TransactionAdditionalCostType_RefID" > "SchData-OLTP-Master"."TblTransactionAdditionalCostType"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceAdditionalCost"."TransactionAdditionalCostType_RefID" > "SchData-OLTP-Master"."TblTransactionAdditionalCostType"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceAdditionalCost"."PriceCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceAdditionalCost"."PriceCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-Finance"."TblSalesInvoiceDetail"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "SalesInvoice_RefID" bigint
    "SalesInvoiceRequisitionDetail_RefID" bigint
    "Product_RefID" bigint
    "Quantity" numeric(20,2)
    "QuantityUnit_RefID" bigint
    "ProductUnitPriceCurrency_RefID" bigint
    "ProductUnitPriceCurrencyValue" numeric(20,2)
    "ProductUnitPriceCurrencyExchangeRate" numeric(20,2)
    "ProductUnitPriceBaseCurrencyValue" numeric(20,2)
    "ProductUnitPriceDiscountCurrency_RefID" bigint
    "ProductUnitPriceDiscountCurrencyValue" numeric(20,2)
    "ProductUnitPriceDiscountCurrencyExchangeRate" numeric(20,2)
    "ProductUnitPriceDiscountBaseCurrencyValue" numeric(20,2)
    "ProductUnitPriceFinalCurrency_RefID" bigint
    "ProductUnitPriceFinalCurrencyValue" numeric(20,2)
    "ProductUnitPriceFinalCurrencyExchangeRate" numeric(20,2)
    "ProductUnitPriceFinalBaseCurrencyValue" numeric(20,2)
    "PriceFinalCurrency_RefID" bigint
    "PriceFinalCurrencyValue" numeric(20,2)
    "PriceFinalCurrencyExchangeRate" numeric(20,2)
    "PriceFinalBaseCurrencyValue" numeric(20,2)
    "TransactionTax_RefID" bigint
    "Remarks" varchar(512) 
    }
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceDetail"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceDetail"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceDetail"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceDetail"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceDetail"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceDetail"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceDetail"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceDetail"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceDetail"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceDetail"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceDetail"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceDetail"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceDetail"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceDetail"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceDetail"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceDetail"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceDetail"."SalesInvoice_RefID" > "SchData-OLTP-Finance"."TblSalesInvoice"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceDetail"."SalesInvoice_RefID" > "SchData-OLTP-Finance"."TblSalesInvoice"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceDetail"."SalesInvoiceRequisitionDetail_RefID" > "SchData-OLTP-Finance"."TblSalesInvoiceRequisitionDetail"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceDetail"."SalesInvoiceRequisitionDetail_RefID" > "SchData-OLTP-Finance"."TblSalesInvoiceRequisitionDetail"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceDetail"."Product_RefID" > "SchData-OLTP-Master"."TblProduct"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceDetail"."Product_RefID" > "SchData-OLTP-Master"."TblProduct"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceDetail"."QuantityUnit_RefID" > "SchData-OLTP-Master"."TblQuantityUnit"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceDetail"."QuantityUnit_RefID" > "SchData-OLTP-Master"."TblQuantityUnit"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceDetail"."ProductUnitPriceCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceDetail"."ProductUnitPriceCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceDetail"."ProductUnitPriceDiscountCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceDetail"."ProductUnitPriceDiscountCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceDetail"."ProductUnitPriceFinalCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceDetail"."ProductUnitPriceFinalCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceDetail"."PriceFinalCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceDetail"."PriceFinalCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceDetail"."TransactionTax_RefID" > "SchData-OLTP-Taxation"."TblTransactionTax"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceDetail"."TransactionTax_RefID" > "SchData-OLTP-Taxation"."TblTransactionTax"."Sys_SID"



TABLE "SchData-OLTP-Finance"."TblSalesInvoiceRequisition"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "BusinessDocumentVersion_RefID" bigint
    "Log_FileUpload_Pointer_RefID" bigint
    "RequesterWorkerJobsPosition_RefID" bigint
    "Remarks" varchar(512)
    }
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceRequisition"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceRequisition"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceRequisition"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceRequisition"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceRequisition"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceRequisition"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceRequisition"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceRequisition"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceRequisition"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceRequisition"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceRequisition"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceRequisition"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceRequisition"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceRequisition"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceRequisition"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceRequisition"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceRequisition"."BusinessDocumentVersion_RefID" > "SchData-OLTP-Master"."TblBusinessDocumentVersion"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceRequisition"."BusinessDocumentVersion_RefID" > "SchData-OLTP-Master"."TblBusinessDocumentVersion"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceRequisition"."Log_FileUpload_Pointer_RefID" > "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Pointer"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceRequisition"."Log_FileUpload_Pointer_RefID" > "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Pointer"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceRequisition"."RequesterWorkerJobsPosition_RefID" > "SchData-OLTP-HumanResource"."TblWorkerCareerInternal"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceRequisition"."RequesterWorkerJobsPosition_RefID" > "SchData-OLTP-HumanResource"."TblWorkerCareerInternal"."Sys_SID"



TABLE "SchData-OLTP-Finance"."TblSalesInvoiceRequisitionDetail"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "SalesInvoiceRequisition_RefID" bigint
    "SalesOrderDetail_RefID" bigint
    "Product_RefID" bigint
    "Quantity" numeric(20,2)
    "QuantityUnit_RefID" bigint
    "ProductUnitPriceCurrency_RefID" bigint
    "ProductUnitPriceCurrencyValue" numeric(20,2)
    "ProductUnitPriceCurrencyExchangeRate" numeric(20,2)
    "ProductUnitPriceBaseCurrencyValue" numeric(20,2)
    "ProductUnitPriceDiscountCurrency_RefID" bigint
    "ProductUnitPriceDiscountCurrencyValue" numeric(20,2)
    "ProductUnitPriceDiscountCurrencyExchangeRate" numeric(20,2)
    "ProductUnitPriceDiscountBaseCurrencyValue" numeric(20,2)
    "ProductUnitPriceFinalCurrency_RefID" bigint
    "ProductUnitPriceFinalCurrencyValue" numeric(20,2)
    "ProductUnitPriceFinalCurrencyExchangeRate" numeric(20,2)
    "ProductUnitPriceFinalBaseCurrencyValue" numeric(20,2)
    "PriceFinalCurrency_RefID" bigint
    "PriceFinalCurrencyValue" numeric(20,2)
    "PriceFinalCurrencyExchangeRate" numeric(20,2)
    "PriceFinalBaseCurrencyValue" numeric(20,2)
    "Remarks" varchar(512)
    }
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceRequisitionDetail"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceRequisitionDetail"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceRequisitionDetail"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceRequisitionDetail"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceRequisitionDetail"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceRequisitionDetail"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceRequisitionDetail"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceRequisitionDetail"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceRequisitionDetail"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceRequisitionDetail"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceRequisitionDetail"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceRequisitionDetail"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceRequisitionDetail"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceRequisitionDetail"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceRequisitionDetail"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceRequisitionDetail"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceRequisitionDetail"."SalesInvoiceRequisition_RefID" > "SchData-OLTP-Finance"."TblSalesInvoiceRequisition"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceRequisitionDetail"."SalesInvoiceRequisition_RefID" > "SchData-OLTP-Finance"."TblSalesInvoiceRequisition"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceRequisitionDetail"."SalesOrderDetail_RefID" > "SchData-OLTP-CustomerRelation"."TblSalesOrderDetail"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceRequisitionDetail"."SalesOrderDetail_RefID" > "SchData-OLTP-CustomerRelation"."TblSalesOrderDetail"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceRequisitionDetail"."Product_RefID" > "SchData-OLTP-Master"."TblProduct"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceRequisitionDetail"."Product_RefID" > "SchData-OLTP-Master"."TblProduct"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceRequisitionDetail"."QuantityUnit_RefID" > "SchData-OLTP-Master"."TblQuantityUnit"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceRequisitionDetail"."QuantityUnit_RefID" > "SchData-OLTP-Master"."TblQuantityUnit"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceRequisitionDetail"."ProductUnitPriceCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceRequisitionDetail"."ProductUnitPriceCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceRequisitionDetail"."ProductUnitPriceDiscountCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceRequisitionDetail"."ProductUnitPriceDiscountCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceRequisitionDetail"."ProductUnitPriceFinalCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceRequisitionDetail"."ProductUnitPriceFinalCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceRequisitionDetail"."PriceFinalCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Finance"."TblSalesInvoiceRequisitionDetail"."PriceFinalCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-FixedAsset"."TblGoodsIdentity"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "GoodsModel_RefID" bigint
    "SerialNumber" varchar(256)
    }
Ref: "SchData-OLTP-FixedAsset"."TblGoodsIdentity"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-FixedAsset"."TblGoodsIdentity"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-FixedAsset"."TblGoodsIdentity"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-FixedAsset"."TblGoodsIdentity"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-FixedAsset"."TblGoodsIdentity"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-FixedAsset"."TblGoodsIdentity"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-FixedAsset"."TblGoodsIdentity"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-FixedAsset"."TblGoodsIdentity"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-FixedAsset"."TblGoodsIdentity"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-FixedAsset"."TblGoodsIdentity"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-FixedAsset"."TblGoodsIdentity"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-FixedAsset"."TblGoodsIdentity"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-FixedAsset"."TblGoodsIdentity"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-FixedAsset"."TblGoodsIdentity"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-FixedAsset"."TblGoodsIdentity"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-FixedAsset"."TblGoodsIdentity"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-FixedAsset"."TblGoodsIdentity"."GoodsModel_RefID" > "SchData-OLTP-Master"."TblGoodsModel"."Sys_PID"
Ref: "SchData-OLTP-FixedAsset"."TblGoodsIdentity"."GoodsModel_RefID" > "SchData-OLTP-Master"."TblGoodsModel"."Sys_SID"



TABLE "SchData-OLTP-HumanResource"."TblBusinessTripAccommodationArrangementsType"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "Name" varchar(256)
    }
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripAccommodationArrangementsType"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripAccommodationArrangementsType"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripAccommodationArrangementsType"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripAccommodationArrangementsType"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripAccommodationArrangementsType"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripAccommodationArrangementsType"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripAccommodationArrangementsType"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripAccommodationArrangementsType"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripAccommodationArrangementsType"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripAccommodationArrangementsType"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripAccommodationArrangementsType"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripAccommodationArrangementsType"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripAccommodationArrangementsType"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripAccommodationArrangementsType"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripAccommodationArrangementsType"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripAccommodationArrangementsType"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-HumanResource"."TblBusinessTripCostComponent"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "Name" varchar(256)
    }
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripCostComponent"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripCostComponent"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripCostComponent"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripCostComponent"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripCostComponent"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripCostComponent"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripCostComponent"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripCostComponent"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripCostComponent"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripCostComponent"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripCostComponent"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripCostComponent"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripCostComponent"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripCostComponent"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripCostComponent"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripCostComponent"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-HumanResource"."TblBusinessTripTransportationCostType"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "BusinessTripTransportationType_RefID" bigint
    "BusinessTripTransportationCostTypeComponent_RefID" bigint
    }
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripTransportationCostType"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripTransportationCostType"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripTransportationCostType"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripTransportationCostType"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripTransportationCostType"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripTransportationCostType"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripTransportationCostType"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripTransportationCostType"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripTransportationCostType"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripTransportationCostType"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripTransportationCostType"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripTransportationCostType"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripTransportationCostType"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripTransportationCostType"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripTransportationCostType"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripTransportationCostType"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripTransportationCostType"."BusinessTripTransportationType_RefID" > "SchData-OLTP-HumanResource"."TblBusinessTripTransportationType"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripTransportationCostType"."BusinessTripTransportationType_RefID" > "SchData-OLTP-HumanResource"."TblBusinessTripTransportationType"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripTransportationCostType"."BusinessTripTransportationCostTypeComponent_RefID" > "SchData-OLTP-HumanResource"."TblBusinessTripTransportationCostTypeComponent"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripTransportationCostType"."BusinessTripTransportationCostTypeComponent_RefID" > "SchData-OLTP-HumanResource"."TblBusinessTripTransportationCostTypeComponent"."Sys_SID"



TABLE "SchData-OLTP-HumanResource"."TblBusinessTripTransportationCostTypeComponent"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "Name" varchar(256)
    }
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripTransportationCostTypeComponent"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripTransportationCostTypeComponent"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripTransportationCostTypeComponent"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripTransportationCostTypeComponent"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripTransportationCostTypeComponent"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripTransportationCostTypeComponent"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripTransportationCostTypeComponent"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripTransportationCostTypeComponent"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripTransportationCostTypeComponent"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripTransportationCostTypeComponent"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripTransportationCostTypeComponent"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripTransportationCostTypeComponent"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripTransportationCostTypeComponent"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripTransportationCostTypeComponent"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripTransportationCostTypeComponent"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripTransportationCostTypeComponent"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-HumanResource"."TblBusinessTripTransportationType"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "Name" varchar(256)
    "VehicleType_RefID" bigint
    }
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripTransportationType"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripTransportationType"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripTransportationType"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripTransportationType"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripTransportationType"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripTransportationType"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripTransportationType"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripTransportationType"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripTransportationType"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripTransportationType"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripTransportationType"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripTransportationType"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripTransportationType"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripTransportationType"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripTransportationType"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripTransportationType"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripTransportationType"."VehicleType_RefID" > "SchData-OLTP-Master"."TblVehicleType"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblBusinessTripTransportationType"."VehicleType_RefID" > "SchData-OLTP-Master"."TblVehicleType"."Sys_SID"



TABLE "SchData-OLTP-HumanResource"."TblDocumentEmploymentRelationship"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "DocumentEmploymentRelationshipType_RefID" bigint
    "DocumentNumber" varchar(128)
    "IssuedDateTimeTZ" timestamptz
    "ValidStartDateTimeTZ" timestamptz
    "ValidFinishDateTimeTZ" timestamptz
    }
Ref: "SchData-OLTP-HumanResource"."TblDocumentEmploymentRelationship"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblDocumentEmploymentRelationship"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblDocumentEmploymentRelationship"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblDocumentEmploymentRelationship"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblDocumentEmploymentRelationship"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblDocumentEmploymentRelationship"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblDocumentEmploymentRelationship"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblDocumentEmploymentRelationship"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblDocumentEmploymentRelationship"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblDocumentEmploymentRelationship"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblDocumentEmploymentRelationship"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblDocumentEmploymentRelationship"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblDocumentEmploymentRelationship"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblDocumentEmploymentRelationship"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblDocumentEmploymentRelationship"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblDocumentEmploymentRelationship"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblDocumentEmploymentRelationship"."DocumentEmploymentRelationshipType_RefID" > "SchData-OLTP-HumanResource"."TblDocumentEmploymentRelationshipType"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblDocumentEmploymentRelationship"."DocumentEmploymentRelationshipType_RefID" > "SchData-OLTP-HumanResource"."TblDocumentEmploymentRelationshipType"."Sys_SID"



TABLE "SchData-OLTP-HumanResource"."TblDocumentEmploymentRelationshipType"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "Name" varchar(128)
    }
Ref: "SchData-OLTP-HumanResource"."TblDocumentEmploymentRelationshipType"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblDocumentEmploymentRelationshipType"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblDocumentEmploymentRelationshipType"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblDocumentEmploymentRelationshipType"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblDocumentEmploymentRelationshipType"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblDocumentEmploymentRelationshipType"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblDocumentEmploymentRelationshipType"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblDocumentEmploymentRelationshipType"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblDocumentEmploymentRelationshipType"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblDocumentEmploymentRelationshipType"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblDocumentEmploymentRelationshipType"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblDocumentEmploymentRelationshipType"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblDocumentEmploymentRelationshipType"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblDocumentEmploymentRelationshipType"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblDocumentEmploymentRelationshipType"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblDocumentEmploymentRelationshipType"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-HumanResource"."TblMapper_FingerPrintUserToPerson"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "GoodsIdentity_RefID" bigint
    "FingerPrintUser_RefID" bigint
    "Person_RefID" bigint
    }
Ref: "SchData-OLTP-HumanResource"."TblMapper_FingerPrintUserToPerson"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblMapper_FingerPrintUserToPerson"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblMapper_FingerPrintUserToPerson"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblMapper_FingerPrintUserToPerson"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblMapper_FingerPrintUserToPerson"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblMapper_FingerPrintUserToPerson"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblMapper_FingerPrintUserToPerson"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblMapper_FingerPrintUserToPerson"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblMapper_FingerPrintUserToPerson"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblMapper_FingerPrintUserToPerson"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblMapper_FingerPrintUserToPerson"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblMapper_FingerPrintUserToPerson"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblMapper_FingerPrintUserToPerson"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblMapper_FingerPrintUserToPerson"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblMapper_FingerPrintUserToPerson"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblMapper_FingerPrintUserToPerson"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblMapper_FingerPrintUserToPerson"."GoodsIdentity_RefID" > "SchData-OLTP-FixedAsset"."TblGoodsIdentity"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblMapper_FingerPrintUserToPerson"."GoodsIdentity_RefID" > "SchData-OLTP-FixedAsset"."TblGoodsIdentity"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblMapper_FingerPrintUserToPerson"."Person_RefID" > "SchData-OLTP-Master"."TblPerson"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblMapper_FingerPrintUserToPerson"."Person_RefID" > "SchData-OLTP-Master"."TblPerson"."Sys_SID"



TABLE "SchData-OLTP-HumanResource"."TblOrganizationalDepartment"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "Name" varchar(256)
    "ValidStartDateTimeTZ" timestamptz
    "ValidFinishDateTimeTZ" timestamptz
    }
Ref: "SchData-OLTP-HumanResource"."TblOrganizationalDepartment"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblOrganizationalDepartment"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblOrganizationalDepartment"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblOrganizationalDepartment"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblOrganizationalDepartment"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblOrganizationalDepartment"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblOrganizationalDepartment"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblOrganizationalDepartment"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblOrganizationalDepartment"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblOrganizationalDepartment"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblOrganizationalDepartment"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblOrganizationalDepartment"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblOrganizationalDepartment"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblOrganizationalDepartment"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblOrganizationalDepartment"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblOrganizationalDepartment"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-HumanResource"."TblOrganizationalJobPosition"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "Name" varchar(256)
    "ValidStartDateTimeTZ" timestamptz
    "ValidFinishDateTimeTZ" timestamptz
    }
Ref: "SchData-OLTP-HumanResource"."TblOrganizationalJobPosition"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblOrganizationalJobPosition"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblOrganizationalJobPosition"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblOrganizationalJobPosition"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblOrganizationalJobPosition"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblOrganizationalJobPosition"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblOrganizationalJobPosition"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblOrganizationalJobPosition"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblOrganizationalJobPosition"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblOrganizationalJobPosition"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblOrganizationalJobPosition"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblOrganizationalJobPosition"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblOrganizationalJobPosition"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblOrganizationalJobPosition"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblOrganizationalJobPosition"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblOrganizationalJobPosition"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-HumanResource"."TblPersonBusinessTrip"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "BusinessDocumentVersion_RefID" bigint
    "PaymentDisbursementMethod_RefID" bigint
    "CombinedBudgetSectionDetail_RefID" bigint
    }
Ref: "SchData-OLTP-HumanResource"."TblPersonBusinessTrip"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonBusinessTrip"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblPersonBusinessTrip"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonBusinessTrip"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblPersonBusinessTrip"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonBusinessTrip"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblPersonBusinessTrip"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonBusinessTrip"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblPersonBusinessTrip"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonBusinessTrip"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblPersonBusinessTrip"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonBusinessTrip"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblPersonBusinessTrip"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonBusinessTrip"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblPersonBusinessTrip"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonBusinessTrip"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblPersonBusinessTrip"."BusinessDocumentVersion_RefID" > "SchData-OLTP-Master"."TblBusinessDocumentVersion"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonBusinessTrip"."BusinessDocumentVersion_RefID" > "SchData-OLTP-Master"."TblBusinessDocumentVersion"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblPersonBusinessTrip"."PaymentDisbursementMethod_RefID" > "SchData-OLTP-Master"."TblPaymentDisbursementMethod"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonBusinessTrip"."PaymentDisbursementMethod_RefID" > "SchData-OLTP-Master"."TblPaymentDisbursementMethod"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblPersonBusinessTrip"."CombinedBudgetSectionDetail_RefID" > "SchData-OLTP-Budgeting"."TblCombinedBudgetSectionDetail"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonBusinessTrip"."CombinedBudgetSectionDetail_RefID" > "SchData-OLTP-Budgeting"."TblCombinedBudgetSectionDetail"."Sys_SID"



TABLE "SchData-OLTP-HumanResource"."TblPersonBusinessTripSequence"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "PersonBusinessTrip_RefID" bigint
    "Sequence" smallint
    "RequesterWorkerJobsPosition_RefID" bigint
    "StartDateTimeTZ" timestamptz
    "FinishDateTimeTZ" timestamptz
    "BusinessTripAccommodationArrangementsType_RefID" bigint
    "BusinessTripTransportationType_RefIDArray" bigint[]
    "Remarks" varchar(256)
    }
Ref: "SchData-OLTP-HumanResource"."TblPersonBusinessTripSequence"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonBusinessTripSequence"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblPersonBusinessTripSequence"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonBusinessTripSequence"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblPersonBusinessTripSequence"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonBusinessTripSequence"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblPersonBusinessTripSequence"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonBusinessTripSequence"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblPersonBusinessTripSequence"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonBusinessTripSequence"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblPersonBusinessTripSequence"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonBusinessTripSequence"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblPersonBusinessTripSequence"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonBusinessTripSequence"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblPersonBusinessTripSequence"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonBusinessTripSequence"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblPersonBusinessTripSequence"."PersonBusinessTrip_RefID" > "SchData-OLTP-HumanResource"."TblPersonBusinessTrip"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonBusinessTripSequence"."PersonBusinessTrip_RefID" > "SchData-OLTP-HumanResource"."TblPersonBusinessTrip"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblPersonBusinessTripSequence"."RequesterWorkerJobsPosition_RefID" > "SchData-OLTP-HumanResource"."TblWorkerCareerInternal"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonBusinessTripSequence"."RequesterWorkerJobsPosition_RefID" > "SchData-OLTP-HumanResource"."TblWorkerCareerInternal"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblPersonBusinessTripSequence"."BusinessTripAccommodationArrangementsType_RefID" > "SchData-OLTP-HumanResource"."TblBusinessTripAccommodationArrangementsType"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonBusinessTripSequence"."BusinessTripAccommodationArrangementsType_RefID" > "SchData-OLTP-HumanResource"."TblBusinessTripAccommodationArrangementsType"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblPersonBusinessTripSequence"."BusinessTripTransportationType_RefIDArray" > "SchData-OLTP-HumanResource"."TblBusinessTripTransportationType"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonBusinessTripSequence"."BusinessTripTransportationType_RefIDArray" > "SchData-OLTP-HumanResource"."TblBusinessTripTransportationType"."Sys_SID"



TABLE "SchData-OLTP-HumanResource"."TblPersonBusinessTripSequenceDetail"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
	"PersonBusinessTripSequence_RefID" bigint
    "BusinessTripCostComponentEntity_RefID" bigint
    "AmountCurrency_RefID" bigint
    "AmountCurrencyValue" numeric(20,2)
    "AmountCurrencyExchangeRate" numeric(20,2)
    "AmountBaseCurrencyValue" numeric(20,2)
    "Remarks" varchar(256)
    }
Ref: "SchData-OLTP-HumanResource"."TblPersonBusinessTripSequenceDetail"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonBusinessTripSequenceDetail"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblPersonBusinessTripSequenceDetail"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonBusinessTripSequenceDetail"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblPersonBusinessTripSequenceDetail"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonBusinessTripSequenceDetail"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblPersonBusinessTripSequenceDetail"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonBusinessTripSequenceDetail"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblPersonBusinessTripSequenceDetail"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonBusinessTripSequenceDetail"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblPersonBusinessTripSequenceDetail"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonBusinessTripSequenceDetail"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblPersonBusinessTripSequenceDetail"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonBusinessTripSequenceDetail"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblPersonBusinessTripSequenceDetail"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonBusinessTripSequenceDetail"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblPersonBusinessTripSequenceDetail"."PersonBusinessTripSequence_RefID" > "SchData-OLTP-HumanResource"."TblPersonBusinessTripSequence"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonBusinessTripSequenceDetail"."PersonBusinessTripSequence_RefID" > "SchData-OLTP-HumanResource"."TblPersonBusinessTripSequence"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblPersonBusinessTripSequenceDetail"."BusinessTripCostComponentEntity_RefID" > "SchData-OLTP-HumanResource"."TblBusinessTripCostComponent"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonBusinessTripSequenceDetail"."BusinessTripCostComponentEntity_RefID" > "SchData-OLTP-HumanResource"."TblBusinessTripCostComponent"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblPersonBusinessTripSequenceDetail"."AmountCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonBusinessTripSequenceDetail"."AmountCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-HumanResource"."TblPersonWorkAbsencePermit"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "Person_RefID" bigint
    "WorkAbsencePermit_RefID" bigint
    "PermitStartDate" date
    "DuringDays" smallint
    "Annotation" varchar(512)
    }
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkAbsencePermit"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkAbsencePermit"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkAbsencePermit"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkAbsencePermit"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkAbsencePermit"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkAbsencePermit"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkAbsencePermit"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkAbsencePermit"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkAbsencePermit"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkAbsencePermit"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkAbsencePermit"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkAbsencePermit"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkAbsencePermit"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkAbsencePermit"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkAbsencePermit"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkAbsencePermit"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkAbsencePermit"."Person_RefID" > "SchData-OLTP-Master"."TblPerson"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkAbsencePermit"."Person_RefID" > "SchData-OLTP-Master"."TblPerson"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkAbsencePermit"."WorkAbsencePermit_RefID" > "SchData-OLTP-HumanResource"."TblWorkAbsencePermit"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkAbsencePermit"."WorkAbsencePermit_RefID" > "SchData-OLTP-HumanResource"."TblWorkAbsencePermit"."Sys_SID"



TABLE "SchData-OLTP-HumanResource"."TblPersonWorkAbsenceReplacement"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "Person_RefID" bigint
    "OriginDate" date
    "DestinationDate" date
    }
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkAbsenceReplacement"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkAbsenceReplacement"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkAbsenceReplacement"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkAbsenceReplacement"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkAbsenceReplacement"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkAbsenceReplacement"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkAbsenceReplacement"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkAbsenceReplacement"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkAbsenceReplacement"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkAbsenceReplacement"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkAbsenceReplacement"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkAbsenceReplacement"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkAbsenceReplacement"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkAbsenceReplacement"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkAbsenceReplacement"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkAbsenceReplacement"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkAbsenceReplacement"."Person_RefID" > "SchData-OLTP-Master"."TblPerson"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkAbsenceReplacement"."Person_RefID" > "SchData-OLTP-Master"."TblPerson"."Sys_SID"



TABLE "SchData-OLTP-HumanResource"."TblPersonWorkArriveDepartPermit"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "Person_RefID" bigint
    "WorkArriveDepartPermit_RefID" bigint
    "PermitDate" date
    "Annotation" varchar(512)
    }
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkArriveDepartPermit"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkArriveDepartPermit"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkArriveDepartPermit"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkArriveDepartPermit"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkArriveDepartPermit"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkArriveDepartPermit"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkArriveDepartPermit"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkArriveDepartPermit"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkArriveDepartPermit"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkArriveDepartPermit"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkArriveDepartPermit"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkArriveDepartPermit"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkArriveDepartPermit"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkArriveDepartPermit"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkArriveDepartPermit"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkArriveDepartPermit"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkArriveDepartPermit"."Person_RefID" > "SchData-OLTP-Master"."TblPerson"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkArriveDepartPermit"."Person_RefID" > "SchData-OLTP-Master"."TblPerson"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkArriveDepartPermit"."WorkArriveDepartPermit_RefID" > "SchData-OLTP-HumanResource"."TblWorkArriveDepartPermit"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkArriveDepartPermit"."WorkArriveDepartPermit_RefID" > "SchData-OLTP-HumanResource"."TblWorkArriveDepartPermit"."Sys_SID"



TABLE "SchData-OLTP-HumanResource"."TblPersonWorkTimeSheet"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "DocumentNumber" varchar(64)
    "DocumentDateTimeTZ" timestamptz
    "Person_RefID" bigint
    "StartDateTimeTZ" timestamptz
    "FinishDateTimeTZ" timestamptz
    "Project_RefID" bigint
    "ColorText" varchar(7)
    "ColorBackground" varchar(7)
    }
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkTimeSheet"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkTimeSheet"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkTimeSheet"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkTimeSheet"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkTimeSheet"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkTimeSheet"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkTimeSheet"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkTimeSheet"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkTimeSheet"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkTimeSheet"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkTimeSheet"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkTimeSheet"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkTimeSheet"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkTimeSheet"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkTimeSheet"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkTimeSheet"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkTimeSheet"."Person_RefID" > "SchData-OLTP-Master"."TblPerson"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkTimeSheet"."Person_RefID" > "SchData-OLTP-Master"."TblPerson"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkTimeSheet"."Project_RefID" > "SchData-OLTP-Project"."TblProject"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkTimeSheet"."Project_RefID" > "SchData-OLTP-Project"."TblProject"."Sys_SID"



TABLE "SchData-OLTP-HumanResource"."TblPersonWorkTimeSheetActivity"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "PersonWorkTimeSheet_RefID" bigint
    "ProjectSectionItem_RefID" bigint
    "StartDateTimeTZ" timestamptz
    "FinishDateTimeTZ" timestamptz
    "Activity" varchar(2048)
    "ColorText" varchar(7)
    "ColorBackground" varchar(7)
    }
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkTimeSheetActivity"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkTimeSheetActivity"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkTimeSheetActivity"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkTimeSheetActivity"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkTimeSheetActivity"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkTimeSheetActivity"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkTimeSheetActivity"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkTimeSheetActivity"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkTimeSheetActivity"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkTimeSheetActivity"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkTimeSheetActivity"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkTimeSheetActivity"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkTimeSheetActivity"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkTimeSheetActivity"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkTimeSheetActivity"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkTimeSheetActivity"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkTimeSheetActivity"."PersonWorkTimeSheet_RefID" > "SchData-OLTP-HumanResource"."TblPersonWorkTimeSheet"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkTimeSheetActivity"."PersonWorkTimeSheet_RefID" > "SchData-OLTP-HumanResource"."TblPersonWorkTimeSheet"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkTimeSheetActivity"."ProjectSectionItem_RefID" > "SchData-OLTP-Project"."TblProjectSectionItem"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblPersonWorkTimeSheetActivity"."ProjectSectionItem_RefID" > "SchData-OLTP-Project"."TblProjectSectionItem"."Sys_SID"



TABLE "SchData-OLTP-HumanResource"."TblWorkAbsencePermit"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "WorkAbsencePermitType_RefID" bigint
    "Name" varchar(256)
    }
Ref: "SchData-OLTP-HumanResource"."TblWorkAbsencePermit"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkAbsencePermit"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkAbsencePermit"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkAbsencePermit"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkAbsencePermit"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkAbsencePermit"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkAbsencePermit"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkAbsencePermit"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkAbsencePermit"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkAbsencePermit"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkAbsencePermit"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkAbsencePermit"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkAbsencePermit"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkAbsencePermit"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkAbsencePermit"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkAbsencePermit"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkAbsencePermit"."WorkAbsencePermitType_RefID" > "SchData-OLTP-HumanResource"."TblWorkAbsencePermitType"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkAbsencePermit"."WorkAbsencePermitType_RefID" > "SchData-OLTP-HumanResource"."TblWorkAbsencePermitType"."Sys_SID"



TABLE "SchData-OLTP-HumanResource"."TblWorkAbsencePermitType"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "Name" varchar(256)
    }
Ref: "SchData-OLTP-HumanResource"."TblWorkAbsencePermitType"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkAbsencePermitType"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkAbsencePermitType"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkAbsencePermitType"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkAbsencePermitType"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkAbsencePermitType"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkAbsencePermitType"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkAbsencePermitType"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkAbsencePermitType"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkAbsencePermitType"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkAbsencePermitType"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkAbsencePermitType"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkAbsencePermitType"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkAbsencePermitType"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkAbsencePermitType"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkAbsencePermitType"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-HumanResource"."TblWorkArriveDepartPermit"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "Name" varchar(256)
    }
Ref: "SchData-OLTP-HumanResource"."TblWorkArriveDepartPermit"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkArriveDepartPermit"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkArriveDepartPermit"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkArriveDepartPermit"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkArriveDepartPermit"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkArriveDepartPermit"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkArriveDepartPermit"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkArriveDepartPermit"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkArriveDepartPermit"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkArriveDepartPermit"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkArriveDepartPermit"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkArriveDepartPermit"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkArriveDepartPermit"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkArriveDepartPermit"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkArriveDepartPermit"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkArriveDepartPermit"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-HumanResource"."TblWorkDay"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "Name" varchar(256)
    }
Ref: "SchData-OLTP-HumanResource"."TblWorkDay"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkDay"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkDay"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkDay"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkDay"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkDay"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkDay"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkDay"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkDay"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkDay"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkDay"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkDay"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkDay"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkDay"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkDay"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkDay"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-HumanResource"."TblWorkTimeAssignation"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "Person_RefID" bigint
    "WorkDateStart" date
    "WorkTimeEpoch_RefID" bigint
    "DaySequenceStart" smallint
    }
Ref: "SchData-OLTP-HumanResource"."TblWorkTimeAssignation"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkTimeAssignation"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkTimeAssignation"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkTimeAssignation"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkTimeAssignation"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkTimeAssignation"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkTimeAssignation"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkTimeAssignation"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkTimeAssignation"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkTimeAssignation"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkTimeAssignation"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkTimeAssignation"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkTimeAssignation"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkTimeAssignation"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkTimeAssignation"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkTimeAssignation"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkTimeAssignation"."Person_RefID" > "SchData-OLTP-Master"."TblPerson"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkTimeAssignation"."Person_RefID" > "SchData-OLTP-Master"."TblPerson"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkTimeAssignation"."WorkTimeEpoch_RefID" > "SchData-OLTP-HumanResource"."TblWorkTimeEpoch"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkTimeAssignation"."WorkTimeEpoch_RefID" > "SchData-OLTP-HumanResource"."TblWorkTimeEpoch"."Sys_SID"



TABLE "SchData-OLTP-HumanResource"."TblWorkTimeEpoch"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "Name" varchar(256) 
    }
Ref: "SchData-OLTP-HumanResource"."TblWorkTimeEpoch"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkTimeEpoch"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkTimeEpoch"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkTimeEpoch"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkTimeEpoch"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkTimeEpoch"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkTimeEpoch"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkTimeEpoch"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkTimeEpoch"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkTimeEpoch"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkTimeEpoch"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkTimeEpoch"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkTimeEpoch"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkTimeEpoch"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkTimeEpoch"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkTimeEpoch"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-HumanResource"."TblWorkTimeSchedule"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "WorkTimeEpoch_RefID" bigint
    "DaySequence" smallint
    "WorkDay_RefID" bigint
    "ScheduleStartIntervalFrom00AM" interval
    "ScheduleFinishIntervalFrom00AM" interval
    "WorkStartIntervalFrom00AM" interval
    "WorkFinishIntervalFrom00AM" interval
    "RestStartIntervalFrom00AM" interval
    "RestFinishIntervalFrom00AM" interval
    }
Ref: "SchData-OLTP-HumanResource"."TblWorkTimeSchedule"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkTimeSchedule"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkTimeSchedule"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkTimeSchedule"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkTimeSchedule"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkTimeSchedule"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkTimeSchedule"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkTimeSchedule"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkTimeSchedule"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkTimeSchedule"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkTimeSchedule"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkTimeSchedule"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkTimeSchedule"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkTimeSchedule"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkTimeSchedule"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkTimeSchedule"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkTimeSchedule"."WorkTimeEpoch_RefID" > "SchData-OLTP-HumanResource"."TblWorkTimeEpoch"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkTimeSchedule"."WorkTimeEpoch_RefID" > "SchData-OLTP-HumanResource"."TblWorkTimeEpoch"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkTimeSchedule"."WorkDay_RefID" > "SchData-OLTP-HumanResource"."TblWorkDay"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkTimeSchedule"."WorkDay_RefID" > "SchData-OLTP-HumanResource"."TblWorkDay"."Sys_SID"



TABLE "SchData-OLTP-HumanResource"."TblWorker"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "Person_RefID" bigint
    "IdentityNumber" varchar(128)
    }
Ref: "SchData-OLTP-HumanResource"."TblWorker"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorker"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorker"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorker"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorker"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorker"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorker"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorker"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorker"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorker"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorker"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorker"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorker"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorker"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorker"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorker"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorker"."Person_RefID" > "SchData-OLTP-Master"."TblPerson"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorker"."Person_RefID" > "SchData-OLTP-Master"."TblPerson"."Sys_SID"



TABLE "SchData-OLTP-HumanResource"."TblWorkerCareerInternal"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "Worker_RefID" bigint
    "WorkerType_RefID" bigint
    "OrganizationalDepartment_RefID" bigint
    "OrganizationalJobPosition_RefID" bigint
    "ValidStartDateTimeTZ" timestamptz
    "ValidFinishDateTimeTZ" timestamptz
    "DocumentEmploymentRelationship_RefID" bigint
    }
Ref: "SchData-OLTP-HumanResource"."TblWorkerCareerInternal"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerCareerInternal"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerCareerInternal"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerCareerInternal"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerCareerInternal"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerCareerInternal"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerCareerInternal"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerCareerInternal"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerCareerInternal"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerCareerInternal"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerCareerInternal"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerCareerInternal"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerCareerInternal"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerCareerInternal"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerCareerInternal"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerCareerInternal"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerCareerInternal"."Worker_RefID" > "SchData-OLTP-HumanResource"."TblWorker"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerCareerInternal"."Worker_RefID" > "SchData-OLTP-HumanResource"."TblWorker"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerCareerInternal"."WorkerType_RefID" > "SchData-OLTP-HumanResource"."TblWorkerType"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerCareerInternal"."WorkerType_RefID" > "SchData-OLTP-HumanResource"."TblWorkerType"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerCareerInternal"."OrganizationalDepartment_RefID" > "SchData-OLTP-HumanResource"."TblOrganizationalDepartment"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerCareerInternal"."OrganizationalDepartment_RefID" > "SchData-OLTP-HumanResource"."TblOrganizationalDepartment"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerCareerInternal"."OrganizationalJobPosition_RefID" > "SchData-OLTP-HumanResource"."TblOrganizationalJobPosition"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerCareerInternal"."OrganizationalJobPosition_RefID" > "SchData-OLTP-HumanResource"."TblOrganizationalJobPosition"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerCareerInternal"."DocumentEmploymentRelationship_RefID" > "SchData-OLTP-HumanResource"."TblDocumentEmploymentRelationship"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerCareerInternal"."DocumentEmploymentRelationship_RefID" > "SchData-OLTP-HumanResource"."TblDocumentEmploymentRelationship"."Sys_SID"



TABLE "SchData-OLTP-HumanResource"."TblWorkerCareerInternalRoleAccess"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "WorkerCareerInternal_RefID" bigint
    "UserRole_RefID" bigint
    "CallProjectSyntax" varchar(256)
    "ValidStartDateTimeTZ" timestamptz
    "ValidFinishDateTimeTZ" timestamptz
    }
Ref: "SchData-OLTP-HumanResource"."TblWorkerCareerInternalRoleAccess"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerCareerInternalRoleAccess"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerCareerInternalRoleAccess"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerCareerInternalRoleAccess"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerCareerInternalRoleAccess"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerCareerInternalRoleAccess"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerCareerInternalRoleAccess"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerCareerInternalRoleAccess"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerCareerInternalRoleAccess"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerCareerInternalRoleAccess"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerCareerInternalRoleAccess"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerCareerInternalRoleAccess"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerCareerInternalRoleAccess"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerCareerInternalRoleAccess"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerCareerInternalRoleAccess"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerCareerInternalRoleAccess"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerCareerInternalRoleAccess"."WorkerCareerInternal_RefID" > "SchData-OLTP-HumanResource"."TblWorkerCareerInternal"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerCareerInternalRoleAccess"."WorkerCareerInternal_RefID" > "SchData-OLTP-HumanResource"."TblWorkerCareerInternal"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerCareerInternalRoleAccess"."UserRole_RefID" > "SchSysConfig"."TblAppObject_UserRole"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerCareerInternalRoleAccess"."UserRole_RefID" > "SchSysConfig"."TblAppObject_UserRole"."Sys_SID"



TABLE "SchData-OLTP-HumanResource"."TblWorkerCareerInternalRoleDelegation"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "SourceWorkerCareerInternalRoleAccess_RefID" bigint
    "DestinationUser_RefID" bigint
    "SignMutualExclusive" boolean
    "ValidStartDateTimeTZ" timestamptz
    "ValidFinishDateTimeTZ" timestamptz
    }
Ref: "SchData-OLTP-HumanResource"."TblWorkerCareerInternalRoleDelegation"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerCareerInternalRoleDelegation"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerCareerInternalRoleDelegation"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerCareerInternalRoleDelegation"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerCareerInternalRoleDelegation"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerCareerInternalRoleDelegation"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerCareerInternalRoleDelegation"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerCareerInternalRoleDelegation"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerCareerInternalRoleDelegation"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerCareerInternalRoleDelegation"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerCareerInternalRoleDelegation"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerCareerInternalRoleDelegation"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerCareerInternalRoleDelegation"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerCareerInternalRoleDelegation"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerCareerInternalRoleDelegation"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerCareerInternalRoleDelegation"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerCareerInternalRoleDelegation"."SourceWorkerCareerInternalRoleAccess_RefID" > "SchData-OLTP-HumanResource"."TblWorkerCareerInternalRoleAccess"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerCareerInternalRoleDelegation"."SourceWorkerCareerInternalRoleAccess_RefID" > "SchData-OLTP-HumanResource"."TblWorkerCareerInternalRoleAccess"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerCareerInternalRoleDelegation"."DestinationUser_RefID" > "SchSysConfig"."TblDBObject_User"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerCareerInternalRoleDelegation"."DestinationUser_RefID" > "SchSysConfig"."TblDBObject_User"."Sys_SID"



TABLE "SchData-OLTP-HumanResource"."TblWorkerType"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "Name" varchar(128)
    "EnglishName" varchar(128)
    }
Ref: "SchData-OLTP-HumanResource"."TblWorkerType"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerType"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerType"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerType"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerType"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerType"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerType"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerType"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerType"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerType"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerType"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerType"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerType"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerType"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerType"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-HumanResource"."TblWorkerType"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-Production"."TblBillOfMaterial"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "BusinessDocumentVersion_RefID" bigint
    "Level" smallint
    }
Ref: "SchData-OLTP-Production"."TblBillOfMaterial"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblBillOfMaterial"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Production"."TblBillOfMaterial"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblBillOfMaterial"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Production"."TblBillOfMaterial"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblBillOfMaterial"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Production"."TblBillOfMaterial"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblBillOfMaterial"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Production"."TblBillOfMaterial"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblBillOfMaterial"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Production"."TblBillOfMaterial"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblBillOfMaterial"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Production"."TblBillOfMaterial"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblBillOfMaterial"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Production"."TblBillOfMaterial"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblBillOfMaterial"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Production"."TblBillOfMaterial"."BusinessDocumentVersion_RefID" > "SchData-OLTP-Master"."TblBusinessDocumentVersion"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblBillOfMaterial"."BusinessDocumentVersion_RefID" > "SchData-OLTP-Master"."TblBusinessDocumentVersion"."Sys_SID"



TABLE "SchData-OLTP-Production"."TblBillOfMaterialDetail"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "BillOfMaterial_RefID" bigint
    "MaterialProduct_RefID" bigint
    "Quantity" numeric(20,2)
    "UnitPriceCurrency_RefID" bigint
    "UnitPriceCurrencyValue" numeric(20,2)
    "UnitPriceCurrencyExchangeRate" numeric(20,2)
    "UnitPriceBaseCurrencyValue" numeric(20,2)
    }
Ref: "SchData-OLTP-Production"."TblBillOfMaterialDetail"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblBillOfMaterialDetail"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Production"."TblBillOfMaterialDetail"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblBillOfMaterialDetail"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Production"."TblBillOfMaterialDetail"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblBillOfMaterialDetail"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Production"."TblBillOfMaterialDetail"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblBillOfMaterialDetail"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Production"."TblBillOfMaterialDetail"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblBillOfMaterialDetail"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Production"."TblBillOfMaterialDetail"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblBillOfMaterialDetail"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Production"."TblBillOfMaterialDetail"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblBillOfMaterialDetail"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Production"."TblBillOfMaterialDetail"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblBillOfMaterialDetail"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Production"."TblBillOfMaterialDetail"."BillOfMaterial_RefID" > "SchData-OLTP-Production"."TblBillOfMaterial"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblBillOfMaterialDetail"."BillOfMaterial_RefID" > "SchData-OLTP-Production"."TblBillOfMaterial"."Sys_SID"
Ref: "SchData-OLTP-Production"."TblBillOfMaterialDetail"."MaterialProduct_RefID" > "SchData-OLTP-Production"."TblMaterialProductAssemblyVersion"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblBillOfMaterialDetail"."MaterialProduct_RefID" > "SchData-OLTP-Production"."TblMaterialProductAssemblyVersion"."Sys_SID"
Ref: "SchData-OLTP-Production"."TblBillOfMaterialDetail"."MaterialProduct_RefID" > "SchData-OLTP-Production"."TblMaterialProductComponent"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblBillOfMaterialDetail"."MaterialProduct_RefID" > "SchData-OLTP-Production"."TblMaterialProductComponent"."Sys_SID"
Ref: "SchData-OLTP-Production"."TblBillOfMaterialDetail"."UnitPriceCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblBillOfMaterialDetail"."UnitPriceCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-Production"."TblMaterialProductAssembly"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
	"BusinessDocument_BillOfMaterial_RefID" bigint
    "Name" varchar(256)
    "QuantityUnit_RefID" bigint
    "Code" varchar(64)
    }
Ref: "SchData-OLTP-Production"."TblMaterialProductAssembly"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblMaterialProductAssembly"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Production"."TblMaterialProductAssembly"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblMaterialProductAssembly"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Production"."TblMaterialProductAssembly"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblMaterialProductAssembly"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Production"."TblMaterialProductAssembly"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblMaterialProductAssembly"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Production"."TblMaterialProductAssembly"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblMaterialProductAssembly"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Production"."TblMaterialProductAssembly"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblMaterialProductAssembly"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Production"."TblMaterialProductAssembly"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblMaterialProductAssembly"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Production"."TblMaterialProductAssembly"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblMaterialProductAssembly"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Production"."TblMaterialProductAssembly"."BusinessDocument_BillOfMaterial_RefID" > "SchData-OLTP-Master"."TblBusinessDocument"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblMaterialProductAssembly"."BusinessDocument_BillOfMaterial_RefID" > "SchData-OLTP-Master"."TblBusinessDocument"."Sys_SID"



TABLE "SchData-OLTP-Production"."TblMaterialProductAssemblyVersion"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "MaterialProductAssembly_RefID" bigint
    "BillOfMaterial_RefID" bigint
    "ValidStartDateTimeTZ" timestamptz
    "ValidFinishDateTimeTZ" timestamptz
    }
Ref: "SchData-OLTP-Production"."TblMaterialProductAssemblyVersion"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblMaterialProductAssemblyVersion"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Production"."TblMaterialProductAssemblyVersion"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblMaterialProductAssemblyVersion"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Production"."TblMaterialProductAssemblyVersion"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblMaterialProductAssemblyVersion"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Production"."TblMaterialProductAssemblyVersion"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblMaterialProductAssemblyVersion"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Production"."TblMaterialProductAssemblyVersion"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblMaterialProductAssemblyVersion"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Production"."TblMaterialProductAssemblyVersion"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblMaterialProductAssemblyVersion"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Production"."TblMaterialProductAssemblyVersion"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblMaterialProductAssemblyVersion"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Production"."TblMaterialProductAssemblyVersion"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblMaterialProductAssemblyVersion"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Production"."TblMaterialProductAssemblyVersion"."MaterialProductAssembly_RefID" > "SchData-OLTP-Production"."TblMaterialProductAssembly"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblMaterialProductAssemblyVersion"."MaterialProductAssembly_RefID" > "SchData-OLTP-Production"."TblMaterialProductAssembly"."Sys_SID"
Ref: "SchData-OLTP-Production"."TblMaterialProductAssemblyVersion"."BillOfMaterial_RefID" > "SchData-OLTP-Production"."TblBillOfMaterial"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblMaterialProductAssemblyVersion"."BillOfMaterial_RefID" > "SchData-OLTP-Production"."TblBillOfMaterial"."Sys_SID"



TABLE "SchData-OLTP-Production"."TblMaterialProductComponent"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "Product_RefID" bigint
    "ProductType_RefID" bigint
    "QuantityUnit_RefID" bigint
    "ValidStartDateTimeTZ" timestamptz
    "ValidFinishDateTimeTZ" timestamptz
    "Code" varchar(32)
    }
Ref: "SchData-OLTP-Production"."TblMaterialProductComponent"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblMaterialProductComponent"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Production"."TblMaterialProductComponent"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblMaterialProductComponent"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Production"."TblMaterialProductComponent"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblMaterialProductComponent"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Production"."TblMaterialProductComponent"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblMaterialProductComponent"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Production"."TblMaterialProductComponent"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblMaterialProductComponent"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Production"."TblMaterialProductComponent"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblMaterialProductComponent"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Production"."TblMaterialProductComponent"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblMaterialProductComponent"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Production"."TblMaterialProductComponent"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblMaterialProductComponent"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Production"."TblMaterialProductComponent"."Product_RefID" > "SchData-OLTP-Master"."TblProduct"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblMaterialProductComponent"."Product_RefID" > "SchData-OLTP-Master"."TblProduct"."Sys_SID"
Ref: "SchData-OLTP-Production"."TblMaterialProductComponent"."ProductType_RefID" > "SchData-OLTP-Master"."TblProductType"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblMaterialProductComponent"."ProductType_RefID" > "SchData-OLTP-Master"."TblProductType"."Sys_SID"
Ref: "SchData-OLTP-Production"."TblMaterialProductComponent"."QuantityUnit_RefID" > "SchData-OLTP-Master"."TblQuantityUnit"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblMaterialProductComponent"."QuantityUnit_RefID" > "SchData-OLTP-Master"."TblQuantityUnit"."Sys_SID"



TABLE "SchData-OLTP-Production"."TblMaterialTakeOff"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "BusinessDocumentVersion_RefID" bigint
    "BillOfMaterial_RefID" bigint
    "Name" varchar(256)
    "Code" varchar(32)
    }
Ref: "SchData-OLTP-Production"."TblMaterialTakeOff"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblMaterialTakeOff"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Production"."TblMaterialTakeOff"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblMaterialTakeOff"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Production"."TblMaterialTakeOff"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblMaterialTakeOff"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Production"."TblMaterialTakeOff"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblMaterialTakeOff"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Production"."TblMaterialTakeOff"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblMaterialTakeOff"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Production"."TblMaterialTakeOff"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblMaterialTakeOff"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Production"."TblMaterialTakeOff"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblMaterialTakeOff"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Production"."TblMaterialTakeOff"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblMaterialTakeOff"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Production"."TblMaterialTakeOff"."BusinessDocumentVersion_RefID" > "SchData-OLTP-Master"."TblBusinessDocumentVersion"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblMaterialTakeOff"."BusinessDocumentVersion_RefID" > "SchData-OLTP-Master"."TblBusinessDocumentVersion"."Sys_SID"
Ref: "SchData-OLTP-Production"."TblMaterialTakeOff"."BillOfMaterial_RefID" > "SchData-OLTP-Production"."TblBillOfMaterial"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblMaterialTakeOff"."BillOfMaterial_RefID" > "SchData-OLTP-Production"."TblBillOfMaterial"."Sys_SID"



TABLE "SchData-OLTP-Production"."TblMaterialTakeOffWork"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "BusinessDocumentVersion_RefID" bigint
    "MaterialTakeOff_RefID" bigint
    "Name" varchar(256)
    "Code" varchar(32)
    }
Ref: "SchData-OLTP-Production"."TblMaterialTakeOffWork"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblMaterialTakeOffWork"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Production"."TblMaterialTakeOffWork"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblMaterialTakeOffWork"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Production"."TblMaterialTakeOffWork"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblMaterialTakeOffWork"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Production"."TblMaterialTakeOffWork"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblMaterialTakeOffWork"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Production"."TblMaterialTakeOffWork"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblMaterialTakeOffWork"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Production"."TblMaterialTakeOffWork"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblMaterialTakeOffWork"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Production"."TblMaterialTakeOffWork"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblMaterialTakeOffWork"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Production"."TblMaterialTakeOffWork"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblMaterialTakeOffWork"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Production"."TblMaterialTakeOffWork"."BusinessDocumentVersion_RefID" > "SchData-OLTP-Master"."TblBusinessDocumentVersion"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblMaterialTakeOffWork"."BusinessDocumentVersion_RefID" > "SchData-OLTP-Master"."TblBusinessDocumentVersion"."Sys_SID"
Ref: "SchData-OLTP-Production"."TblMaterialTakeOffWork"."MaterialTakeOff_RefID" > "SchData-OLTP-Production"."TblMaterialTakeOff"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblMaterialTakeOffWork"."MaterialTakeOff_RefID" > "SchData-OLTP-Production"."TblMaterialTakeOff"."Sys_SID"



TABLE "SchData-OLTP-Production"."TblMaterialTakeOffWorkDetail"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "BusinessDocumentVersion_RefID" bigint
    "MaterialTakeOff_RefID" bigint
    "Product_RefID" bigint
    "Quantity" numeric(12,2)
    }
Ref: "SchData-OLTP-Production"."TblMaterialTakeOffWorkDetail"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblMaterialTakeOffWorkDetail"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Production"."TblMaterialTakeOffWorkDetail"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblMaterialTakeOffWorkDetail"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Production"."TblMaterialTakeOffWorkDetail"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblMaterialTakeOffWorkDetail"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Production"."TblMaterialTakeOffWorkDetail"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblMaterialTakeOffWorkDetail"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Production"."TblMaterialTakeOffWorkDetail"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblMaterialTakeOffWorkDetail"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Production"."TblMaterialTakeOffWorkDetail"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblMaterialTakeOffWorkDetail"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Production"."TblMaterialTakeOffWorkDetail"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblMaterialTakeOffWorkDetail"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Production"."TblMaterialTakeOffWorkDetail"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblMaterialTakeOffWorkDetail"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Production"."TblMaterialTakeOffWorkDetail"."BusinessDocumentVersion_RefID" > "SchData-OLTP-Master"."TblBusinessDocumentVersion"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblMaterialTakeOffWorkDetail"."BusinessDocumentVersion_RefID" > "SchData-OLTP-Master"."TblBusinessDocumentVersion"."Sys_SID"
Ref: "SchData-OLTP-Production"."TblMaterialTakeOffWorkDetail"."MaterialTakeOff_RefID" > "SchData-OLTP-Production"."TblMaterialTakeOff"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblMaterialTakeOffWorkDetail"."MaterialTakeOff_RefID" > "SchData-OLTP-Production"."TblMaterialTakeOff"."Sys_SID"
Ref: "SchData-OLTP-Production"."TblMaterialTakeOffWorkDetail"."Product_RefID" > "SchData-OLTP-Master"."TblProduct"."Sys_PID"
Ref: "SchData-OLTP-Production"."TblMaterialTakeOffWorkDetail"."Product_RefID" > "SchData-OLTP-Master"."TblProduct"."Sys_SID"



TABLE "SchData-OLTP-Project"."TblBillOfQuantity"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "BusinessDocumentVersion_RefID" bigint
    "BillOfQuantityGroup_RefID" bigint
    }
Ref: "SchData-OLTP-Project"."TblBillOfQuantity"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Project"."TblBillOfQuantity"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Project"."TblBillOfQuantity"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Project"."TblBillOfQuantity"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Project"."TblBillOfQuantity"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Project"."TblBillOfQuantity"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Project"."TblBillOfQuantity"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Project"."TblBillOfQuantity"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Project"."TblBillOfQuantity"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Project"."TblBillOfQuantity"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Project"."TblBillOfQuantity"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Project"."TblBillOfQuantity"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Project"."TblBillOfQuantity"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Project"."TblBillOfQuantity"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Project"."TblBillOfQuantity"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Project"."TblBillOfQuantity"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Project"."TblBillOfQuantity"."BusinessDocumentVersion_RefID" > "SchData-OLTP-Master"."TblBusinessDocumentVersion"."Sys_PID"
Ref: "SchData-OLTP-Project"."TblBillOfQuantity"."BusinessDocumentVersion_RefID" > "SchData-OLTP-Master"."TblBusinessDocumentVersion"."Sys_SID"



TABLE "SchData-OLTP-Project"."TblMapper_ProjectToMaterialProductAssembly"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
	"Project_RefID" bigint
    "MaterialProductAssembly_RefID" bigint
    }
Ref: "SchData-OLTP-Project"."TblMapper_ProjectToMaterialProductAssembly"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Project"."TblMapper_ProjectToMaterialProductAssembly"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Project"."TblMapper_ProjectToMaterialProductAssembly"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Project"."TblMapper_ProjectToMaterialProductAssembly"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Project"."TblMapper_ProjectToMaterialProductAssembly"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Project"."TblMapper_ProjectToMaterialProductAssembly"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Project"."TblMapper_ProjectToMaterialProductAssembly"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Project"."TblMapper_ProjectToMaterialProductAssembly"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Project"."TblMapper_ProjectToMaterialProductAssembly"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Project"."TblMapper_ProjectToMaterialProductAssembly"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Project"."TblMapper_ProjectToMaterialProductAssembly"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Project"."TblMapper_ProjectToMaterialProductAssembly"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Project"."TblMapper_ProjectToMaterialProductAssembly"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Project"."TblMapper_ProjectToMaterialProductAssembly"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Project"."TblMapper_ProjectToMaterialProductAssembly"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Project"."TblMapper_ProjectToMaterialProductAssembly"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Project"."TblMapper_ProjectToMaterialProductAssembly"."Project_RefID" > "SchData-OLTP-Project"."TblProject"."Sys_PID"
Ref: "SchData-OLTP-Project"."TblMapper_ProjectToMaterialProductAssembly"."Project_RefID" > "SchData-OLTP-Project"."TblProject"."Sys_SID"
Ref: "SchData-OLTP-Project"."TblMapper_ProjectToMaterialProductAssembly"."MaterialProductAssembly_RefID" > "SchData-OLTP-Production"."TblMaterialProductAssembly"."Sys_PID"
Ref: "SchData-OLTP-Project"."TblMapper_ProjectToMaterialProductAssembly"."MaterialProductAssembly_RefID" > "SchData-OLTP-Production"."TblMaterialProductAssembly"."Sys_SID"



TABLE "SchData-OLTP-Project"."TblProject"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "BusinessDocumentVersion_RefID" bigint
    "Name" varchar(256)
    "MaterialProductAssembly_RefID" bigint
    "ValidStartDateTimeTZ" timestamptz
    "ValidFinishDateTimeTZ" timestamptz
    "Code" varchar(32) 
    }
Ref: "SchData-OLTP-Project"."TblProject"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Project"."TblProject"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Project"."TblProject"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Project"."TblProject"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Project"."TblProject"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Project"."TblProject"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Project"."TblProject"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Project"."TblProject"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Project"."TblProject"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Project"."TblProject"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Project"."TblProject"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Project"."TblProject"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Project"."TblProject"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Project"."TblProject"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Project"."TblProject"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Project"."TblProject"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Project"."TblProject"."BusinessDocumentVersion_RefID" > "SchData-OLTP-Master"."TblBusinessDocumentVersion"."Sys_PID"
Ref: "SchData-OLTP-Project"."TblProject"."BusinessDocumentVersion_RefID" > "SchData-OLTP-Master"."TblBusinessDocumentVersion"."Sys_SID"
Ref: "SchData-OLTP-Project"."TblProject"."MaterialProductAssembly_RefID" > "SchData-OLTP-Production"."TblMaterialProductAssembly"."Sys_PID"
Ref: "SchData-OLTP-Project"."TblProject"."MaterialProductAssembly_RefID" > "SchData-OLTP-Production"."TblMaterialProductAssembly"."Sys_SID"



TABLE "SchData-OLTP-Project"."TblProjectSection"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "BusinessDocumentVersion_RefID" bigint
    "Project_RefID" bigint
    "ProjectSectionType_RefID" bigint
    "Name" varchar(256)
    "Code" varchar(32)
    }
Ref: "SchData-OLTP-Project"."TblProjectSection"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Project"."TblProjectSection"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Project"."TblProjectSection"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Project"."TblProjectSection"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Project"."TblProjectSection"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Project"."TblProjectSection"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Project"."TblProjectSection"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Project"."TblProjectSection"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Project"."TblProjectSection"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Project"."TblProjectSection"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Project"."TblProjectSection"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Project"."TblProjectSection"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Project"."TblProjectSection"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Project"."TblProjectSection"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Project"."TblProjectSection"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Project"."TblProjectSection"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Project"."TblProjectSection"."BusinessDocumentVersion_RefID" > "SchData-OLTP-Master"."TblBusinessDocumentVersion"."Sys_PID"
Ref: "SchData-OLTP-Project"."TblProjectSection"."BusinessDocumentVersion_RefID" > "SchData-OLTP-Master"."TblBusinessDocumentVersion"."Sys_SID"
Ref: "SchData-OLTP-Project"."TblProjectSection"."Project_RefID" > "SchData-OLTP-Project"."TblProject"."Sys_PID"
Ref: "SchData-OLTP-Project"."TblProjectSection"."Project_RefID" > "SchData-OLTP-Project"."TblProject"."Sys_SID"
Ref: "SchData-OLTP-Project"."TblProjectSection"."ProjectSectionType_RefID" > "SchData-OLTP-Project"."TblProjectSectionType"."Sys_PID"
Ref: "SchData-OLTP-Project"."TblProjectSection"."ProjectSectionType_RefID" > "SchData-OLTP-Project"."TblProjectSectionType"."Sys_SID"



TABLE "SchData-OLTP-Project"."TblProjectSectionItem"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "BusinessDocumentVersion_RefID" bigint
    "ProjectSection_RefID" bigint
    "Name" varchar(256)
    "MaterialProductAssembly_RefID" bigint
    "Code" varchar(32) 
    }
Ref: "SchData-OLTP-Project"."TblProjectSectionItem"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Project"."TblProjectSectionItem"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Project"."TblProjectSectionItem"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Project"."TblProjectSectionItem"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Project"."TblProjectSectionItem"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Project"."TblProjectSectionItem"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Project"."TblProjectSectionItem"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Project"."TblProjectSectionItem"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Project"."TblProjectSectionItem"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Project"."TblProjectSectionItem"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Project"."TblProjectSectionItem"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Project"."TblProjectSectionItem"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Project"."TblProjectSectionItem"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Project"."TblProjectSectionItem"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Project"."TblProjectSectionItem"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Project"."TblProjectSectionItem"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Project"."TblProjectSectionItem"."BusinessDocumentVersion_RefID" > "SchData-OLTP-Master"."TblBusinessDocumentVersion"."Sys_PID"
Ref: "SchData-OLTP-Project"."TblProjectSectionItem"."BusinessDocumentVersion_RefID" > "SchData-OLTP-Master"."TblBusinessDocumentVersion"."Sys_SID"
Ref: "SchData-OLTP-Project"."TblProjectSectionItem"."ProjectSection_RefID" > "SchData-OLTP-Project"."TblProjectSection"."Sys_PID"
Ref: "SchData-OLTP-Project"."TblProjectSectionItem"."ProjectSection_RefID" > "SchData-OLTP-Project"."TblProjectSection"."Sys_SID"
Ref: "SchData-OLTP-Project"."TblProjectSectionItem"."MaterialProductAssembly_RefID" > "SchData-OLTP-Production"."TblMaterialProductAssembly"."Sys_PID"
Ref: "SchData-OLTP-Project"."TblProjectSectionItem"."MaterialProductAssembly_RefID" > "SchData-OLTP-Production"."TblMaterialProductAssembly"."Sys_SID"



TABLE "SchData-OLTP-Project"."TblProjectSectionItemWork"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "BusinessDocumentVersion_RefID" bigint
    "ProjectSectionItem_RefID" bigint
    "Name" varchar(256)
    "MaterialProductAssembly_RefID" bigint
    "Code" varchar(32)
    }
Ref: "SchData-OLTP-Project"."TblProjectSectionItemWork"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Project"."TblProjectSectionItemWork"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Project"."TblProjectSectionItemWork"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Project"."TblProjectSectionItemWork"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Project"."TblProjectSectionItemWork"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Project"."TblProjectSectionItemWork"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Project"."TblProjectSectionItemWork"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Project"."TblProjectSectionItemWork"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Project"."TblProjectSectionItemWork"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Project"."TblProjectSectionItemWork"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Project"."TblProjectSectionItemWork"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Project"."TblProjectSectionItemWork"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Project"."TblProjectSectionItemWork"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Project"."TblProjectSectionItemWork"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Project"."TblProjectSectionItemWork"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Project"."TblProjectSectionItemWork"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Project"."TblProjectSectionItemWork"."BusinessDocumentVersion_RefID" > "SchData-OLTP-Master"."TblBusinessDocumentVersion"."Sys_PID"
Ref: "SchData-OLTP-Project"."TblProjectSectionItemWork"."BusinessDocumentVersion_RefID" > "SchData-OLTP-Master"."TblBusinessDocumentVersion"."Sys_SID"
Ref: "SchData-OLTP-Project"."TblProjectSectionItemWork"."ProjectSectionItem_RefID" > "SchData-OLTP-Project"."TblProjectSectionItem"."Sys_PID"
Ref: "SchData-OLTP-Project"."TblProjectSectionItemWork"."ProjectSectionItem_RefID" > "SchData-OLTP-Project"."TblProjectSectionItem"."Sys_SID"
Ref: "SchData-OLTP-Project"."TblProjectSectionItemWork"."MaterialProductAssembly_RefID" > "SchData-OLTP-Production"."TblMaterialProductAssembly"."Sys_PID"
Ref: "SchData-OLTP-Project"."TblProjectSectionItemWork"."MaterialProductAssembly_RefID" > "SchData-OLTP-Production"."TblMaterialProductAssembly"."Sys_SID"



TABLE "SchData-OLTP-Project"."TblProjectSectionType"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "Name" varchar(16)
    }
Ref: "SchData-OLTP-Project"."TblProjectSectionType"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Project"."TblProjectSectionType"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Project"."TblProjectSectionType"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Project"."TblProjectSectionType"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Project"."TblProjectSectionType"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Project"."TblProjectSectionType"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Project"."TblProjectSectionType"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Project"."TblProjectSectionType"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Project"."TblProjectSectionType"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Project"."TblProjectSectionType"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Project"."TblProjectSectionType"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Project"."TblProjectSectionType"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Project"."TblProjectSectionType"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Project"."TblProjectSectionType"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Project"."TblProjectSectionType"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Project"."TblProjectSectionType"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-SupplyChain"."TblDeliveryDestinationType"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "Name" varchar(256)
    }
Ref: "SchData-OLTP-SupplyChain"."TblDeliveryDestinationType"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblDeliveryDestinationType"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblDeliveryDestinationType"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblDeliveryDestinationType"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblDeliveryDestinationType"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblDeliveryDestinationType"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblDeliveryDestinationType"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblDeliveryDestinationType"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblDeliveryDestinationType"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblDeliveryDestinationType"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblDeliveryDestinationType"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblDeliveryDestinationType"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblDeliveryDestinationType"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblDeliveryDestinationType"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblDeliveryDestinationType"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblDeliveryDestinationType"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-SupplyChain"."TblDeliveryOrder"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "BusinessDocumentVersion_RefID" bigint
    "Log_FileUpload_Pointer_RefID" bigint
    "RequesterWorkerJobsPosition_RefID" bigint
    "Remarks" varchar(512)
    }
Ref: "SchData-OLTP-SupplyChain"."TblDeliveryOrder"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblDeliveryOrder"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblDeliveryOrder"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblDeliveryOrder"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblDeliveryOrder"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblDeliveryOrder"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblDeliveryOrder"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblDeliveryOrder"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblDeliveryOrder"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblDeliveryOrder"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblDeliveryOrder"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblDeliveryOrder"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblDeliveryOrder"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblDeliveryOrder"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblDeliveryOrder"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblDeliveryOrder"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-SupplyChain"."TblDeliveryOrderDetail"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "DeliveryOrder_RefID" bigint
    "ReferenceDocument_RefID" bigint
    "Quantity" numeric(20,2)
    "QuantityUnit_RefID" bigint
    "Remarks" varchar(512)
    }
Ref: "SchData-OLTP-SupplyChain"."TblDeliveryOrderDetail"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblDeliveryOrderDetail"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblDeliveryOrderDetail"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblDeliveryOrderDetail"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblDeliveryOrderDetail"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblDeliveryOrderDetail"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblDeliveryOrderDetail"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblDeliveryOrderDetail"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblDeliveryOrderDetail"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblDeliveryOrderDetail"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblDeliveryOrderDetail"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblDeliveryOrderDetail"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblDeliveryOrderDetail"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblDeliveryOrderDetail"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblDeliveryOrderDetail"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblDeliveryOrderDetail"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblDeliveryOrderDetail"."DeliveryOrder_RefID" > "SchData-OLTP-SupplyChain"."TblDeliveryOrder"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblDeliveryOrderDetail"."DeliveryOrder_RefID" > "SchData-OLTP-SupplyChain"."TblDeliveryOrder"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblDeliveryOrderDetail"."ReferenceDocument_RefID" > "SchData-OLTP-SupplyChain"."TblPurchaseOrder"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblDeliveryOrderDetail"."ReferenceDocument_RefID" > "SchData-OLTP-SupplyChain"."TblPurchaseOrder"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblDeliveryOrderDetail"."QuantityUnit_RefID" > "SchData-OLTP-Master"."TblQuantityUnit"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblDeliveryOrderDetail"."QuantityUnit_RefID" > "SchData-OLTP-Master"."TblQuantityUnit"."Sys_SID"



TABLE "SchData-OLTP-SupplyChain"."TblOrderPicking"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "BusinessDocumentVersion_RefID" bigint
    "Log_FileUpload_Pointer_RefID" bigint
    "RequesterWorkerJobsPosition_RefID" bigint
    "Warehouse_RefID" bigint
    "DeliveryDateTimeTZ" timestamptz
    "DeliveryDestination_RefID" bigint
    "Remarks" varchar(512)
    }
Ref: "SchData-OLTP-SupplyChain"."TblOrderPicking"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPicking"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPicking"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPicking"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPicking"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPicking"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPicking"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPicking"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPicking"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPicking"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPicking"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPicking"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPicking"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPicking"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPicking"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPicking"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPicking"."BusinessDocumentVersion_RefID" > "SchData-OLTP-Master"."TblBusinessDocumentVersion"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPicking"."BusinessDocumentVersion_RefID" > "SchData-OLTP-Master"."TblBusinessDocumentVersion"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPicking"."Log_FileUpload_Pointer_RefID" > "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Pointer"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPicking"."Log_FileUpload_Pointer_RefID" > "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Pointer"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPicking"."RequesterWorkerJobsPosition_RefID" > "SchData-OLTP-HumanResource"."TblWorkerCareerInternal"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPicking"."RequesterWorkerJobsPosition_RefID" > "SchData-OLTP-HumanResource"."TblWorkerCareerInternal"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPicking"."Warehouse_RefID" > "SchData-OLTP-SupplyChain"."TblWarehouse"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPicking"."Warehouse_RefID" > "SchData-OLTP-SupplyChain"."TblWarehouse"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPicking"."DeliveryDestination_RefID" > "SchData-OLTP-Master"."TblInstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPicking"."DeliveryDestination_RefID" > "SchData-OLTP-Master"."TblInstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPicking"."DeliveryDestination_RefID" > "SchData-OLTP-SupplyChain"."TblWarehouse"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPicking"."DeliveryDestination_RefID" > "SchData-OLTP-SupplyChain"."TblWarehouse"."Sys_SID"



TABLE "SchData-OLTP-SupplyChain"."TblOrderPickingDetail"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "OrderPicking_RefID" bigint
    "OrderPickingRequisitionDetail_RefID" bigint
    "Quantity" numeric(20,2)
    "QuantityUnit_RefID" bigint
    "ProductUnitPriceCurrency_RefID" bigint
    "ProductUnitPriceCurrencyValue" numeric(20,2)
    "ProductUnitPriceCurrencyExchangeRate" numeric(20,2)
    "ProductUnitPriceBaseCurrencyValue" numeric(20,2)
    "ProductUnitPriceDiscountCurrency_RefID" bigint
    "ProductUnitPriceDiscountCurrencyValue" numeric(20,2)
    "ProductUnitPriceDiscountCurrencyExchangeRate" numeric(20,2)
    "ProductUnitPriceDiscountBaseCurrencyValue" numeric(20,2)
    "ProductUnitPriceFinalCurrency_RefID" bigint
    "ProductUnitPriceFinalCurrencyValue" numeric(20,2)
    "ProductUnitPriceFinalCurrencyExchangeRate" numeric(20,2)
    "ProductUnitPriceFinalBaseCurrencyValue" numeric(20,2)
    "PriceFinalCurrency_RefID" bigint
    "PriceFinalCurrencyValue" numeric(20,2)
    "PriceFinalCurrencyExchangeRate" numeric(20,2)
    "PriceFinalBaseCurrencyValue" numeric(20,2)
    "Remarks" varchar(256)
    }
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingDetail"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingDetail"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingDetail"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingDetail"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingDetail"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingDetail"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingDetail"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingDetail"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingDetail"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingDetail"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingDetail"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingDetail"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingDetail"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingDetail"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingDetail"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingDetail"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingDetail"."OrderPicking_RefID" > "SchData-OLTP-SupplyChain"."TblOrderPicking"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingDetail"."OrderPicking_RefID" > "SchData-OLTP-SupplyChain"."TblOrderPicking"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingDetail"."OrderPickingRequisitionDetail_RefID" > "SchData-OLTP-SupplyChain"."TblOrderPickingRequisitionDetail"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingDetail"."OrderPickingRequisitionDetail_RefID" > "SchData-OLTP-SupplyChain"."TblOrderPickingRequisitionDetail"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingDetail"."QuantityUnit_RefID" > "SchData-OLTP-Master"."TblQuantityUnit"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingDetail"."QuantityUnit_RefID" > "SchData-OLTP-Master"."TblQuantityUnit"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingDetail"."ProductUnitPriceCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingDetail"."ProductUnitPriceCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingDetail"."ProductUnitPriceDiscountCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingDetail"."ProductUnitPriceDiscountCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingDetail"."ProductUnitPriceFinalCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingDetail"."ProductUnitPriceFinalCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingDetail"."PriceFinalCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingDetail"."PriceFinalCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-SupplyChain"."TblOrderPickingRequisition"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "BusinessDocumentVersion_RefID" bigint
    "Log_FileUpload_Pointer_RefID" bigint
    "RequesterWorkerJobsPosition_RefID" bigint
    "Remarks" varchar(512)
    }
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingRequisition"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingRequisition"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingRequisition"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingRequisition"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingRequisition"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingRequisition"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingRequisition"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingRequisition"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingRequisition"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingRequisition"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingRequisition"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingRequisition"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingRequisition"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingRequisition"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingRequisition"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingRequisition"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingRequisition"."BusinessDocumentVersion_RefID" > "SchData-OLTP-Master"."TblBusinessDocumentVersion"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingRequisition"."BusinessDocumentVersion_RefID" > "SchData-OLTP-Master"."TblBusinessDocumentVersion"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingRequisition"."Log_FileUpload_Pointer_RefID" > "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Pointer"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingRequisition"."Log_FileUpload_Pointer_RefID" > "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Pointer"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingRequisition"."RequesterWorkerJobsPosition_RefID" > "SchData-OLTP-HumanResource"."TblWorkerCareerInternal"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingRequisition"."RequesterWorkerJobsPosition_RefID" > "SchData-OLTP-HumanResource"."TblWorkerCareerInternal"."Sys_SID"



TABLE "SchData-OLTP-SupplyChain"."TblOrderPickingRequisitionDetail"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "OrderPickingRequisition_RefID" bigint
    "PurchaseRequisitionDetail_RefID" bigint
    "Product_RefID" bigint
    "Quantity" numeric(20,2)
    "QuantityUnit_RefID" bigint
    "ProductUnitPriceCurrency_RefID" bigint
    "ProductUnitPriceCurrencyValue" numeric(20,2)
    "ProductUnitPriceCurrencyExchangeRate" numeric(20,2)
    "ProductUnitPriceBaseCurrencyValue" numeric(20,2)
    "PriceCurrency_RefID" bigint
    "PriceCurrencyValue" numeric(20,2)
    "PriceCurrencyExchangeRate" numeric(20,2)
    "PriceBaseCurrencyValue" numeric(20,2) 
    "FulfillmentDeadlineDateTimeTZ" timestamptz
    "Remarks" varchar(256)
    }
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingRequisitionDetail"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingRequisitionDetail"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingRequisitionDetail"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingRequisitionDetail"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingRequisitionDetail"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingRequisitionDetail"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingRequisitionDetail"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingRequisitionDetail"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingRequisitionDetail"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingRequisitionDetail"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingRequisitionDetail"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingRequisitionDetail"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingRequisitionDetail"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingRequisitionDetail"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingRequisitionDetail"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingRequisitionDetail"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingRequisitionDetail"."OrderPickingRequisition_RefID" > "SchData-OLTP-SupplyChain"."TblOrderPickingRequisition"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingRequisitionDetail"."OrderPickingRequisition_RefID" > "SchData-OLTP-SupplyChain"."TblOrderPickingRequisition"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingRequisitionDetail"."PurchaseRequisitionDetail_RefID" > "SchData-OLTP-SupplyChain"."TblPurchaseRequisitionDetail"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingRequisitionDetail"."PurchaseRequisitionDetail_RefID" > "SchData-OLTP-SupplyChain"."TblPurchaseRequisitionDetail"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingRequisitionDetail"."Product_RefID" > "SchData-OLTP-Master"."TblProduct"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingRequisitionDetail"."Product_RefID" > "SchData-OLTP-Master"."TblProduct"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingRequisitionDetail"."QuantityUnit_RefID" > "SchData-OLTP-Master"."TblQuantityUnit"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingRequisitionDetail"."QuantityUnit_RefID" > "SchData-OLTP-Master"."TblQuantityUnit"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingRequisitionDetail"."ProductUnitPriceCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingRequisitionDetail"."ProductUnitPriceCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingRequisitionDetail"."PriceCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblOrderPickingRequisitionDetail"."PriceCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-SupplyChain"."TblPurchaseOrder"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "BusinessDocumentVersion_RefID" bigint
    "Log_FileUpload_Pointer_RefID" bigint
    "RequesterWorkerJobsPosition_RefID" bigint
    "Supplier_RefID" bigint
    "DeliveryDateTimeTZ" timestamptz
    "DeliveryDestination_RefID" bigint
    "PurchaseInvoiceBillingPurpose_RefID" bigint
    "TransactionTax_RefID" bigint
    "Remarks" varchar(512)
    }
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrder"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrder"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrder"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrder"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrder"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrder"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrder"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrder"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrder"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrder"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrder"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrder"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrder"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrder"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrder"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrder"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrder"."BusinessDocumentVersion_RefID" > "SchData-OLTP-Master"."TblBusinessDocumentVersion"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrder"."BusinessDocumentVersion_RefID" > "SchData-OLTP-Master"."TblBusinessDocumentVersion"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrder"."Log_FileUpload_Pointer_RefID" > "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Pointer"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrder"."Log_FileUpload_Pointer_RefID" > "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Pointer"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrder"."RequesterWorkerJobsPosition_RefID" > "SchData-OLTP-HumanResource"."TblWorkerCareerInternal"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrder"."RequesterWorkerJobsPosition_RefID" > "SchData-OLTP-HumanResource"."TblWorkerCareerInternal"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrder"."Supplier_RefID" > "SchData-OLTP-SupplyChain"."TblSupplier"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrder"."Supplier_RefID" > "SchData-OLTP-SupplyChain"."TblSupplier"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrder"."DeliveryDestination_RefID" > "SchData-OLTP-Master"."TblInstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrder"."DeliveryDestination_RefID" > "SchData-OLTP-Master"."TblInstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrder"."DeliveryDestination_RefID" > "SchData-OLTP-SupplyChain"."TblWarehouse"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrder"."DeliveryDestination_RefID" > "SchData-OLTP-SupplyChain"."TblWarehouse"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrder"."PurchaseInvoiceBillingPurpose_RefID" > "SchData-OLTP-Finance"."TblPurchaseInvoiceBillingPurpose"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrder"."PurchaseInvoiceBillingPurpose_RefID" > "SchData-OLTP-Finance"."TblPurchaseInvoiceBillingPurpose"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrder"."TransactionTax_RefID" > "SchData-OLTP-Taxation"."TblTransactionTax"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrder"."TransactionTax_RefID" > "SchData-OLTP-Taxation"."TblTransactionTax"."Sys_SID"



TABLE "SchData-OLTP-SupplyChain"."TblPurchaseOrderAdditionalCost"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "PurchaseOrder_RefID" bigint
    "TransactionAdditionalCostType_RefID" bigint
    "PriceCurrency_RefID" bigint
    "PriceCurrencyValue" numeric(20,2)
    "PriceCurrencyExchangeRate" numeric(20,2)
    "PriceBaseCurrencyValue" numeric(20,2)
    "Remarks" varchar(256)
    }
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderAdditionalCost"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderAdditionalCost"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderAdditionalCost"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderAdditionalCost"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderAdditionalCost"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderAdditionalCost"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderAdditionalCost"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderAdditionalCost"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderAdditionalCost"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderAdditionalCost"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderAdditionalCost"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderAdditionalCost"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderAdditionalCost"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderAdditionalCost"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderAdditionalCost"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderAdditionalCost"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderAdditionalCost"."PurchaseOrder_RefID" > "SchData-OLTP-SupplyChain"."TblPurchaseOrder"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderAdditionalCost"."PurchaseOrder_RefID" > "SchData-OLTP-SupplyChain"."TblPurchaseOrder"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderAdditionalCost"."TransactionAdditionalCostType_RefID" > "SchData-OLTP-Master"."TblTransactionAdditionalCostType"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderAdditionalCost"."TransactionAdditionalCostType_RefID" > "SchData-OLTP-Master"."TblTransactionAdditionalCostType"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderAdditionalCost"."PriceCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderAdditionalCost"."PriceCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-SupplyChain"."TblPurchaseOrderDetail"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "PurchaseOrder_RefID" bigint
    "PurchaseRequisitionDetail_RefID" bigint
    "Quantity" numeric(20,2)
    "QuantityUnit_RefID" bigint
    "ProductUnitPriceCurrency_RefID" bigint
    "ProductUnitPriceCurrencyValue" numeric(20,2)
    "ProductUnitPriceCurrencyExchangeRate" numeric(20,2)
    "ProductUnitPriceBaseCurrencyValue" numeric(20,2)
    "ProductUnitPriceDiscountCurrency_RefID" bigint
    "ProductUnitPriceDiscountCurrencyValue" numeric(20,2)
    "ProductUnitPriceDiscountCurrencyExchangeRate" numeric(20,2)
    "ProductUnitPriceDiscountBaseCurrencyValue" numeric(20,2)
    "ProductUnitPriceFinalCurrency_RefID" bigint
    "ProductUnitPriceFinalCurrencyValue" numeric(20,2)
    "ProductUnitPriceFinalCurrencyExchangeRate" numeric(20,2)
    "ProductUnitPriceFinalBaseCurrencyValue" numeric(20,2)
    "PriceFinalCurrency_RefID" bigint
    "PriceFinalCurrencyValue" numeric(20,2)
    "PriceFinalCurrencyExchangeRate" numeric(20,2)
    "PriceFinalBaseCurrencyValue" numeric(20,2)
    "Remarks" varchar(256)
    }
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderDetail"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderDetail"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderDetail"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderDetail"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderDetail"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderDetail"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderDetail"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderDetail"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderDetail"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderDetail"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderDetail"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderDetail"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderDetail"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderDetail"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderDetail"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderDetail"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderDetail"."PurchaseOrder_RefID" > "SchData-OLTP-SupplyChain"."TblPurchaseOrder"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderDetail"."PurchaseOrder_RefID" > "SchData-OLTP-SupplyChain"."TblPurchaseOrder"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderDetail"."PurchaseRequisitionDetail_RefID" > "SchData-OLTP-SupplyChain"."TblPurchaseRequisitionDetail"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderDetail"."PurchaseRequisitionDetail_RefID" > "SchData-OLTP-SupplyChain"."TblPurchaseRequisitionDetail"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderDetail"."QuantityUnit_RefID" > "SchData-OLTP-Master"."TblQuantityUnit"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderDetail"."QuantityUnit_RefID" > "SchData-OLTP-Master"."TblQuantityUnit"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderDetail"."ProductUnitPriceCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderDetail"."ProductUnitPriceCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderDetail"."ProductUnitPriceDiscountCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderDetail"."ProductUnitPriceDiscountCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderDetail"."ProductUnitPriceFinalCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderDetail"."ProductUnitPriceFinalCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderDetail"."PriceFinalCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderDetail"."PriceFinalCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-SupplyChain"."TblPurchaseOrderPaymentTerm"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "PurchaseOrder_RefID" bigint
    "PaymentTerm_RefID" bigint
    "DueDays" smallint
    "DiscountDueDays" smallint
    "DiscountPercentageRate" numeric(20,2)
    "Remarks" varchar(256)
    }
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderPaymentTerm"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderPaymentTerm"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderPaymentTerm"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderPaymentTerm"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderPaymentTerm"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderPaymentTerm"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderPaymentTerm"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderPaymentTerm"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderPaymentTerm"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderPaymentTerm"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderPaymentTerm"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderPaymentTerm"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderPaymentTerm"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderPaymentTerm"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderPaymentTerm"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderPaymentTerm"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderPaymentTerm"."PurchaseOrder_RefID" > "SchData-OLTP-SupplyChain"."TblPurchaseOrder"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderPaymentTerm"."PurchaseOrder_RefID" > "SchData-OLTP-SupplyChain"."TblPurchaseOrder"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderPaymentTerm"."PaymentTerm_RefID" > "SchData-OLTP-Master"."TblPaymentTerm"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderPaymentTerm"."PaymentTerm_RefID" > "SchData-OLTP-Master"."TblPaymentTerm"."Sys_SID"



TABLE "SchData-OLTP-SupplyChain"."TblPurchaseOrderPaymentTermDetail"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "PurchaseOrderPaymentTerm_RefID" bigint
    "Sequence" smallint
    "PriceCurrency_RefID" bigint
    "PriceCurrencyValue" numeric(20,2)
    "PriceCurrencyExchangeRate" numeric(20,2)
    "PriceBaseCurrencyValue" numeric(20,2)
    "Remarks" varchar(256) 
    }
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderPaymentTermDetail"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderPaymentTermDetail"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderPaymentTermDetail"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderPaymentTermDetail"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderPaymentTermDetail"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderPaymentTermDetail"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderPaymentTermDetail"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderPaymentTermDetail"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderPaymentTermDetail"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderPaymentTermDetail"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderPaymentTermDetail"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderPaymentTermDetail"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderPaymentTermDetail"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderPaymentTermDetail"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderPaymentTermDetail"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderPaymentTermDetail"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderPaymentTermDetail"."PurchaseOrderPaymentTerm_RefID" > "SchData-OLTP-SupplyChain"."TblPurchaseOrderPaymentTerm"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderPaymentTermDetail"."PurchaseOrderPaymentTerm_RefID" > "SchData-OLTP-SupplyChain"."TblPurchaseOrderPaymentTerm"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderPaymentTermDetail"."PriceCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseOrderPaymentTermDetail"."PriceCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-SupplyChain"."TblPurchaseRequisition"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "BusinessDocumentVersion_RefID" bigint
    "Log_FileUpload_Pointer_RefID" bigint
    "RequesterWorkerJobsPosition_RefID" bigint
    "Remarks" varchar(512)
    }
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseRequisition"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseRequisition"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseRequisition"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseRequisition"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseRequisition"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseRequisition"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseRequisition"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseRequisition"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseRequisition"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseRequisition"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseRequisition"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseRequisition"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseRequisition"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseRequisition"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseRequisition"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseRequisition"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseRequisition"."BusinessDocumentVersion_RefID" > "SchData-OLTP-Master"."TblBusinessDocumentVersion"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseRequisition"."BusinessDocumentVersion_RefID" > "SchData-OLTP-Master"."TblBusinessDocumentVersion"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseRequisition"."Log_FileUpload_Pointer_RefID" > "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Pointer"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseRequisition"."Log_FileUpload_Pointer_RefID" > "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Pointer"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseRequisition"."RequesterWorkerJobsPosition_RefID" > "SchData-OLTP-HumanResource"."TblWorkerCareerInternal"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseRequisition"."RequesterWorkerJobsPosition_RefID" > "SchData-OLTP-HumanResource"."TblWorkerCareerInternal"."Sys_SID"




TABLE "SchData-OLTP-SupplyChain"."TblPurchaseRequisitionDetail"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "PurchaseRequisition_RefID" bigint
    "CombinedBudgetSectionDetail_RefID" bigint
    "Product_RefID" bigint
    "Quantity" numeric(20,2)
    "QuantityUnit_RefID" bigint
    "ProductUnitPriceCurrency_RefID" bigint
    "ProductUnitPriceCurrencyValue" numeric(20,2)
    "ProductUnitPriceCurrencyExchangeRate" numeric(20,2)
    "ProductUnitPriceBaseCurrencyValue" numeric(20,2)
    "PriceCurrency_RefID" bigint
    "PriceCurrencyValue" numeric(20,2)
    "PriceCurrencyExchangeRate" numeric(20,2)
    "PriceBaseCurrencyValue" numeric(20,2)
    "FulfillmentDeadlineDateTimeTZ" timestamptz
    "Remarks" varchar(256) 
    }
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseRequisitionDetail"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseRequisitionDetail"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseRequisitionDetail"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseRequisitionDetail"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseRequisitionDetail"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseRequisitionDetail"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseRequisitionDetail"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseRequisitionDetail"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseRequisitionDetail"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseRequisitionDetail"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseRequisitionDetail"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseRequisitionDetail"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseRequisitionDetail"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseRequisitionDetail"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseRequisitionDetail"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseRequisitionDetail"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseRequisitionDetail"."PurchaseRequisition_RefID" > "SchData-OLTP-SupplyChain"."TblPurchaseRequisition"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseRequisitionDetail"."PurchaseRequisition_RefID" > "SchData-OLTP-SupplyChain"."TblPurchaseRequisition"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseRequisitionDetail"."CombinedBudgetSectionDetail_RefID" > "SchData-OLTP-Budgeting"."TblCombinedBudgetSectionDetail"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseRequisitionDetail"."CombinedBudgetSectionDetail_RefID" > "SchData-OLTP-Budgeting"."TblCombinedBudgetSectionDetail"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseRequisitionDetail"."Product_RefID" > "SchData-OLTP-Master"."TblProduct"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseRequisitionDetail"."Product_RefID" > "SchData-OLTP-Master"."TblProduct"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseRequisitionDetail"."QuantityUnit_RefID" > "SchData-OLTP-Master"."TblQuantityUnit"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseRequisitionDetail"."QuantityUnit_RefID" > "SchData-OLTP-Master"."TblQuantityUnit"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseRequisitionDetail"."ProductUnitPriceCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseRequisitionDetail"."ProductUnitPriceCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseRequisitionDetail"."PriceCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblPurchaseRequisitionDetail"."PriceCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-SupplyChain"."TblSupplier"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "Entity_RefID" bigint
    "Code" varchar(10)
    }
Ref: "SchData-OLTP-SupplyChain"."TblSupplier"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblSupplier"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblSupplier"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblSupplier"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblSupplier"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblSupplier"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblSupplier"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblSupplier"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblSupplier"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblSupplier"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblSupplier"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblSupplier"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblSupplier"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblSupplier"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblSupplier"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblSupplier"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblSupplier"."Entity_RefID" > "SchData-OLTP-Master"."TblInstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblSupplier"."Entity_RefID" > "SchData-OLTP-Master"."TblInstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblSupplier"."Entity_RefID" > "SchData-OLTP-Master"."TblPerson"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblSupplier"."Entity_RefID" > "SchData-OLTP-Master"."TblPerson"."Sys_SID"



TABLE "SchData-OLTP-SupplyChain"."TblWarehouse"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "InstitutionBranch_RefID" bigint
    "Name" varchar(256)
    "WarehouseType_RefID" bigint
    "Address" varchar(256)
    "CountryAdministrativeArea_RefID" bigint
    "PostalCode" varchar(5)
    "GPSPoint" point
    "Code" varchar(10)
    }
Ref: "SchData-OLTP-SupplyChain"."TblWarehouse"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouse"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouse"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouse"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouse"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouse"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouse"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouse"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouse"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouse"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouse"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouse"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouse"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouse"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouse"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouse"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouse"."InstitutionBranch_RefID" > "SchData-OLTP-Master"."TblInstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouse"."InstitutionBranch_RefID" > "SchData-OLTP-Master"."TblInstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouse"."WarehouseType_RefID" > "SchData-OLTP-SupplyChain"."TblWarehouseType"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouse"."WarehouseType_RefID" > "SchData-OLTP-SupplyChain"."TblWarehouseType"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouse"."CountryAdministrativeArea_RefID" > "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel1"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouse"."CountryAdministrativeArea_RefID" > "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel1"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouse"."CountryAdministrativeArea_RefID" > "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel2"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouse"."CountryAdministrativeArea_RefID" > "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel2"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouse"."CountryAdministrativeArea_RefID" > "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel3"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouse"."CountryAdministrativeArea_RefID" > "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel3"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouse"."CountryAdministrativeArea_RefID" > "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel4"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouse"."CountryAdministrativeArea_RefID" > "SchData-OLTP-Master"."TblCountryAdministrativeAreaLevel4"."Sys_SID"



TABLE "SchData-OLTP-SupplyChain"."TblWarehouseInboundOrder"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "BusinessDocumentVersion_RefID" bigint
    "Log_FileUpload_Pointer_RefID" bigint
    "RequesterWorkerJobsPosition_RefID" bigint
    "Remarks" varchar(512)
    }
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseInboundOrder"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseInboundOrder"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseInboundOrder"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseInboundOrder"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseInboundOrder"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseInboundOrder"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseInboundOrder"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseInboundOrder"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseInboundOrder"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseInboundOrder"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseInboundOrder"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseInboundOrder"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseInboundOrder"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseInboundOrder"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseInboundOrder"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseInboundOrder"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseInboundOrder"."BusinessDocumentVersion_RefID" > "SchData-OLTP-Master"."TblBusinessDocumentVersion"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseInboundOrder"."BusinessDocumentVersion_RefID" > "SchData-OLTP-Master"."TblBusinessDocumentVersion"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseInboundOrder"."Log_FileUpload_Pointer_RefID" > "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Pointer"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseInboundOrder"."Log_FileUpload_Pointer_RefID" > "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Pointer"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseInboundOrder"."RequesterWorkerJobsPosition_RefID" > "SchData-OLTP-HumanResource"."TblWorkerCareerInternal"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseInboundOrder"."RequesterWorkerJobsPosition_RefID" > "SchData-OLTP-HumanResource"."TblWorkerCareerInternal"."Sys_SID"


TABLE "SchData-OLTP-SupplyChain"."TblWarehouseInboundOrderDetail"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "WarehouseInboundOrder_RefID" bigint
    "ReferenceDocument_RefID" bigint
    "Product_RefID" bigint
    "Quantity" numeric(20,2)
    "QuantityUnit_RefID" bigint
    "ProductUnitPriceCurrency_RefID" bigint
    "ProductUnitPriceCurrencyExchangeRate" numeric(20,2)
    "ProductUnitPriceCurrencyValue" numeric(20,2)
    "ProductUnitPriceBaseCurrencyValue" numeric(20,2)
    "Remarks" varchar(512) 
    }
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseInboundOrderDetail"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseInboundOrderDetail"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseInboundOrderDetail"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseInboundOrderDetail"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseInboundOrderDetail"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseInboundOrderDetail"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseInboundOrderDetail"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseInboundOrderDetail"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseInboundOrderDetail"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseInboundOrderDetail"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseInboundOrderDetail"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseInboundOrderDetail"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseInboundOrderDetail"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseInboundOrderDetail"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseInboundOrderDetail"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseInboundOrderDetail"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseInboundOrderDetail"."WarehouseInboundOrder_RefID" > "SchData-OLTP-SupplyChain"."TblWarehouse"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseInboundOrderDetail"."WarehouseInboundOrder_RefID" > "SchData-OLTP-SupplyChain"."TblWarehouse"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseInboundOrderDetail"."Product_RefID" > "SchData-OLTP-Master"."TblProduct"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseInboundOrderDetail"."Product_RefID" > "SchData-OLTP-Master"."TblProduct"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseInboundOrderDetail"."QuantityUnit_RefID" > "SchData-OLTP-Master"."TblQuantityUnit"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseInboundOrderDetail"."QuantityUnit_RefID" > "SchData-OLTP-Master"."TblQuantityUnit"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseInboundOrderDetail"."ProductUnitPriceCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseInboundOrderDetail"."ProductUnitPriceCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-SupplyChain"."TblWarehouseOutboundOrder"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "BusinessDocumentVersion_RefID" bigint
    "Log_FileUpload_Pointer_RefID" bigint
    "RequesterWorkerJobsPosition_RefID" bigint
    "Remarks" varchar(512)
    }
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseOutboundOrder"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseOutboundOrder"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseOutboundOrder"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseOutboundOrder"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseOutboundOrder"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseOutboundOrder"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseOutboundOrder"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseOutboundOrder"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseOutboundOrder"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseOutboundOrder"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseOutboundOrder"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseOutboundOrder"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseOutboundOrder"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseOutboundOrder"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseOutboundOrder"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseOutboundOrder"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseOutboundOrder"."BusinessDocumentVersion_RefID" > "SchData-OLTP-Master"."TblBusinessDocumentVersion"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseOutboundOrder"."BusinessDocumentVersion_RefID" > "SchData-OLTP-Master"."TblBusinessDocumentVersion"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseOutboundOrder"."Log_FileUpload_Pointer_RefID" > "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Pointer"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseOutboundOrder"."Log_FileUpload_Pointer_RefID" > "SchData-OLTP-DataAcquisition"."TblLog_FileUpload_Pointer"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseOutboundOrder"."RequesterWorkerJobsPosition_RefID" > "SchData-OLTP-HumanResource"."TblWorkerCareerInternal"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseOutboundOrder"."RequesterWorkerJobsPosition_RefID" > "SchData-OLTP-HumanResource"."TblWorkerCareerInternal"."Sys_SID"



TABLE "SchData-OLTP-SupplyChain"."TblWarehouseOutboundOrderDetail"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "WarehouseOutboundOrder_RefID" bigint
    "ReferenceDocument_RefID" bigint
    "Product_RefID" bigint
    "Quantity" numeric(20,2)
    "QuantityUnit_RefID" bigint
    "ProductUnitPriceCurrency_RefID" bigint
    "ProductUnitPriceCurrencyExchangeRate" numeric(20,2)
    "ProductUnitPriceCurrencyValue" numeric(20,2)
    "ProductUnitPriceBaseCurrencyValue" numeric(20,2)
    "Remarks" varchar(512)
    }
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseOutboundOrderDetail"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseOutboundOrderDetail"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseOutboundOrderDetail"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseOutboundOrderDetail"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseOutboundOrderDetail"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseOutboundOrderDetail"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseOutboundOrderDetail"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseOutboundOrderDetail"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseOutboundOrderDetail"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseOutboundOrderDetail"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseOutboundOrderDetail"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseOutboundOrderDetail"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseOutboundOrderDetail"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseOutboundOrderDetail"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseOutboundOrderDetail"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseOutboundOrderDetail"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseOutboundOrderDetail"."WarehouseOutboundOrder_RefID" > "SchData-OLTP-SupplyChain"."TblWarehouseOutboundOrder"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseOutboundOrderDetail"."WarehouseOutboundOrder_RefID" > "SchData-OLTP-SupplyChain"."TblWarehouseOutboundOrder"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseOutboundOrderDetail"."Product_RefID" > "SchData-OLTP-Master"."TblProduct"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseOutboundOrderDetail"."Product_RefID" > "SchData-OLTP-Master"."TblProduct"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseOutboundOrderDetail"."QuantityUnit_RefID" > "SchData-OLTP-Master"."TblQuantityUnit"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseOutboundOrderDetail"."QuantityUnit_RefID" > "SchData-OLTP-Master"."TblQuantityUnit"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseOutboundOrderDetail"."ProductUnitPriceCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseOutboundOrderDetail"."ProductUnitPriceCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-SupplyChain"."TblWarehouseType"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "Name" varchar(256)
    "Annotation" varchar(256)
    }
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseType"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseType"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseType"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseType"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseType"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseType"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseType"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseType"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseType"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseType"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseType"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseType"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseType"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseType"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseType"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-SupplyChain"."TblWarehouseType"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-Taxation"."TblTaxTariff"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "TaxType_RefID" bigint
    "ValidStartDateTimeTZ" timestamptz
    "ValidFinishDateTimeTZ" timestamptz
    "TariffMinimumRate" numeric(6,3)
    "TariffMaximumRate" numeric(6,3)
    "RoundUnit" smallint
    "SignRoundUp" boolean
    }
Ref: "SchData-OLTP-Taxation"."TblTaxTariff"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Taxation"."TblTaxTariff"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Taxation"."TblTaxTariff"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Taxation"."TblTaxTariff"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Taxation"."TblTaxTariff"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Taxation"."TblTaxTariff"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Taxation"."TblTaxTariff"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Taxation"."TblTaxTariff"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Taxation"."TblTaxTariff"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Taxation"."TblTaxTariff"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Taxation"."TblTaxTariff"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Taxation"."TblTaxTariff"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Taxation"."TblTaxTariff"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Taxation"."TblTaxTariff"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Taxation"."TblTaxTariff"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Taxation"."TblTaxTariff"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Taxation"."TblTaxTariff"."TaxType_RefID" > "SchData-OLTP-Taxation"."TblTaxType"."Sys_PID"
Ref: "SchData-OLTP-Taxation"."TblTaxTariff"."TaxType_RefID" > "SchData-OLTP-Taxation"."TblTaxType"."Sys_SID"



TABLE "SchData-OLTP-Taxation"."TblTaxType"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "Name" varchar(64)
    "Annotation" varchar(1024)
    }
Ref: "SchData-OLTP-Taxation"."TblTaxType"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Taxation"."TblTaxType"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Taxation"."TblTaxType"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Taxation"."TblTaxType"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Taxation"."TblTaxType"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Taxation"."TblTaxType"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Taxation"."TblTaxType"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Taxation"."TblTaxType"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Taxation"."TblTaxType"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Taxation"."TblTaxType"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Taxation"."TblTaxType"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Taxation"."TblTaxType"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Taxation"."TblTaxType"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Taxation"."TblTaxType"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Taxation"."TblTaxType"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Taxation"."TblTaxType"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-Taxation"."TblTransactionTax"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "TaxBaseCurrency_RefID" bigint
    "TaxBaseCurrencyValue" numeric(20,2)
    "TaxBaseCurrencyExchangeRate" numeric(20,2)
    "TaxBaseBaseCurrencyValue" numeric(20,2)
    "Remarks" varchar(256)
    }
Ref: "SchData-OLTP-Taxation"."TblTransactionTax"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Taxation"."TblTransactionTax"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Taxation"."TblTransactionTax"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Taxation"."TblTransactionTax"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Taxation"."TblTransactionTax"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Taxation"."TblTransactionTax"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Taxation"."TblTransactionTax"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Taxation"."TblTransactionTax"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Taxation"."TblTransactionTax"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Taxation"."TblTransactionTax"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Taxation"."TblTransactionTax"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Taxation"."TblTransactionTax"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Taxation"."TblTransactionTax"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Taxation"."TblTransactionTax"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Taxation"."TblTransactionTax"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Taxation"."TblTransactionTax"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Taxation"."TblTransactionTax"."TaxBaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Taxation"."TblTransactionTax"."TaxBaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-OLTP-Taxation"."TblTransactionTaxDetail"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "TaxType_RefID" bigint
    "TariffCurrency_RefID" bigint
    "TariffCurrencyValue" numeric(20,2)
    "TariffCurrencyExchangeRate" numeric(20,2)
    "TariffBaseCurrencyValue" numeric(20,2)
    "TaxRatio" numeric(20,4)
    "Remarks" varchar(256)
    }
Ref: "SchData-OLTP-Taxation"."TblTransactionTaxDetail"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Taxation"."TblTransactionTaxDetail"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Taxation"."TblTransactionTaxDetail"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Taxation"."TblTransactionTaxDetail"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Taxation"."TblTransactionTaxDetail"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Taxation"."TblTransactionTaxDetail"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Taxation"."TblTransactionTaxDetail"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Taxation"."TblTransactionTaxDetail"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Taxation"."TblTransactionTaxDetail"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-OLTP-Taxation"."TblTransactionTaxDetail"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-OLTP-Taxation"."TblTransactionTaxDetail"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-OLTP-Taxation"."TblTransactionTaxDetail"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-OLTP-Taxation"."TblTransactionTaxDetail"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-OLTP-Taxation"."TblTransactionTaxDetail"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-OLTP-Taxation"."TblTransactionTaxDetail"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Taxation"."TblTransactionTaxDetail"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-OLTP-Taxation"."TblTransactionTaxDetail"."TaxType_RefID" > "SchData-OLTP-Taxation"."TblTaxType"."Sys_PID"
Ref: "SchData-OLTP-Taxation"."TblTransactionTaxDetail"."TaxType_RefID" > "SchData-OLTP-Taxation"."TblTaxType"."Sys_SID"
Ref: "SchData-OLTP-Taxation"."TblTransactionTaxDetail"."TariffCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-OLTP-Taxation"."TblTransactionTaxDetail"."TariffCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-Warehouse-Acquisition"."TblLog_Device_PersonAccess"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "Log_Device_PersonAccessFetch_RefID" bigint
    "AttendanceDateTimeTZ" timestamptz
    "PersonID" bigint
    "PersonUserName" varchar(256)
    }
Ref: "SchData-Warehouse-Acquisition"."TblLog_Device_PersonAccess"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-Warehouse-Acquisition"."TblLog_Device_PersonAccess"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-Warehouse-Acquisition"."TblLog_Device_PersonAccess"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-Warehouse-Acquisition"."TblLog_Device_PersonAccess"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-Warehouse-Acquisition"."TblLog_Device_PersonAccess"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-Warehouse-Acquisition"."TblLog_Device_PersonAccess"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-Warehouse-Acquisition"."TblLog_Device_PersonAccess"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-Warehouse-Acquisition"."TblLog_Device_PersonAccess"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-Warehouse-Acquisition"."TblLog_Device_PersonAccess"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-Warehouse-Acquisition"."TblLog_Device_PersonAccess"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-Warehouse-Acquisition"."TblLog_Device_PersonAccess"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-Warehouse-Acquisition"."TblLog_Device_PersonAccess"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-Warehouse-Acquisition"."TblLog_Device_PersonAccess"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-Warehouse-Acquisition"."TblLog_Device_PersonAccess"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-Warehouse-Acquisition"."TblLog_Device_PersonAccess"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-Warehouse-Acquisition"."TblLog_Device_PersonAccess"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-Warehouse-Acquisition"."TblLog_Device_PersonAccess"."Log_Device_PersonAccessFetch_RefID" > "SchData-Warehouse-Acquisition"."TblLog_Device_PersonAccessFetch"."Sys_PID"
Ref: "SchData-Warehouse-Acquisition"."TblLog_Device_PersonAccess"."Log_Device_PersonAccessFetch_RefID" > "SchData-Warehouse-Acquisition"."TblLog_Device_PersonAccessFetch"."Sys_SID"



TABLE "SchData-Warehouse-Acquisition"."TblLog_Device_PersonAccessFetch"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
    "GoodsIdentity_RefID" bigint
    "FetchDateTimeTZ" timestamptz
    }
Ref: "SchData-Warehouse-Acquisition"."TblLog_Device_PersonAccessFetch"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-Warehouse-Acquisition"."TblLog_Device_PersonAccessFetch"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-Warehouse-Acquisition"."TblLog_Device_PersonAccessFetch"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-Warehouse-Acquisition"."TblLog_Device_PersonAccessFetch"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-Warehouse-Acquisition"."TblLog_Device_PersonAccessFetch"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-Warehouse-Acquisition"."TblLog_Device_PersonAccessFetch"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-Warehouse-Acquisition"."TblLog_Device_PersonAccessFetch"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-Warehouse-Acquisition"."TblLog_Device_PersonAccessFetch"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-Warehouse-Acquisition"."TblLog_Device_PersonAccessFetch"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-Warehouse-Acquisition"."TblLog_Device_PersonAccessFetch"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-Warehouse-Acquisition"."TblLog_Device_PersonAccessFetch"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-Warehouse-Acquisition"."TblLog_Device_PersonAccessFetch"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-Warehouse-Acquisition"."TblLog_Device_PersonAccessFetch"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-Warehouse-Acquisition"."TblLog_Device_PersonAccessFetch"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-Warehouse-Acquisition"."TblLog_Device_PersonAccessFetch"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-Warehouse-Acquisition"."TblLog_Device_PersonAccessFetch"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"
Ref: "SchData-Warehouse-Acquisition"."TblLog_Device_PersonAccessFetch"."GoodsIdentity_RefID" > "SchData-OLTP-FixedAsset"."TblGoodsIdentity"."Sys_PID"
Ref: "SchData-Warehouse-Acquisition"."TblLog_Device_PersonAccessFetch"."GoodsIdentity_RefID" > "SchData-OLTP-FixedAsset"."TblGoodsIdentity"."Sys_SID"



TABLE "SchData-Warehouse-Log"."TblLog_TableSnapshotSignature"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
	"SchemaName" varchar(128)
	"TableName" varchar(128)
	"SignatureID" varchar(32)
    }
Ref: "SchData-Warehouse-Log"."TblLog_TableSnapshotSignature"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-Warehouse-Log"."TblLog_TableSnapshotSignature"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-Warehouse-Log"."TblLog_TableSnapshotSignature"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-Warehouse-Log"."TblLog_TableSnapshotSignature"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-Warehouse-Log"."TblLog_TableSnapshotSignature"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-Warehouse-Log"."TblLog_TableSnapshotSignature"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-Warehouse-Log"."TblLog_TableSnapshotSignature"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-Warehouse-Log"."TblLog_TableSnapshotSignature"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-Warehouse-Log"."TblLog_TableSnapshotSignature"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-Warehouse-Log"."TblLog_TableSnapshotSignature"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-Warehouse-Log"."TblLog_TableSnapshotSignature"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-Warehouse-Log"."TblLog_TableSnapshotSignature"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-Warehouse-Log"."TblLog_TableSnapshotSignature"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-Warehouse-Log"."TblLog_TableSnapshotSignature"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-Warehouse-Log"."TblLog_TableSnapshotSignature"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-Warehouse-Log"."TblLog_TableSnapshotSignature"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"



TABLE "SchData-Warehouse-Log"."TblLog_TransactionHistory"
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
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Sys_BaseCurrency_RefID" bigint
    "Sys_DataIntegrityShadow" varchar(32)
	"Source_RefPID" bigint
    "Source_RefSID" bigint
    "Source_RefRPK" bigint
    "Source_EntryDateTimeTZ" timestamptz
    "Content" json
    "Source_RefHeaderID" bigint
    "Type" varchar(32)
    }
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_PID"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig"."TblLog_UserLoginSession"."Sys_SID"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Sys_Branch_RefID" > "SchSysConfig"."TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_PID"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Sys_BaseCurrency_RefID" > "SchData-OLTP-Master"."TblCurrency"."Sys_SID"

Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Source_RefPID" > "SchData-OLTP-Finance"."TblAdvance"."Sys_PID"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Source_RefPID" > "SchData-OLTP-Finance"."TblAdvanceDetail"."Sys_PID"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Source_RefPID" > "SchData-OLTP-Finance"."TblAdvancePayment"."Sys_PID"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Source_RefPID" > "SchData-OLTP-Finance"."TblAdvancePaymentDetail"."Sys_PID"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Source_RefPID" > "SchData-OLTP-Finance"."TblAdvanceSettlement"."Sys_PID"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Source_RefPID" > "SchData-OLTP-Finance"."TblAdvanceSettlementDetail"."Sys_PID"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Source_RefPID" > "SchData-OLTP-Finance"."TblCreditNote"."Sys_PID"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Source_RefPID" > "SchData-OLTP-Finance"."TblCreditNoteDetail"."Sys_PID"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Source_RefPID" > "SchData-OLTP-Finance"."TblDebitNote"."Sys_PID"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Source_RefPID" > "SchData-OLTP-Finance"."TblDebitNoteDetail"."Sys_PID"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Source_RefPID" > "SchData-OLTP-Finance"."TblPayment"."Sys_PID"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Source_RefPID" > "SchData-OLTP-Finance"."TblPaymentDetail"."Sys_PID"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Source_RefPID" > "SchData-OLTP-Finance"."TblPaymentInstruction"."Sys_PID"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Source_RefPID" > "SchData-OLTP-Finance"."TblPaymentInstructionDetail"."Sys_PID"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Source_RefPID" > "SchData-OLTP-Finance"."TblPurchaseInvoice"."Sys_PID"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Source_RefPID" > "SchData-OLTP-Finance"."TblPurchaseInvoiceDetail"."Sys_PID"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Source_RefPID" > "SchData-OLTP-Finance"."TblSalesInvoice"."Sys_PID"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Source_RefPID" > "SchData-OLTP-Finance"."TblSalesInvoiceDetail"."Sys_PID"
	
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Source_RefSID" > "SchData-OLTP-Finance"."TblAdvance"."Sys_SID"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Source_RefSID" > "SchData-OLTP-Finance"."TblAdvanceDetail"."Sys_SID"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Source_RefSID" > "SchData-OLTP-Finance"."TblAdvancePayment"."Sys_SID"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Source_RefSID" > "SchData-OLTP-Finance"."TblAdvancePaymentDetail"."Sys_SID"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Source_RefSID" > "SchData-OLTP-Finance"."TblAdvanceSettlement"."Sys_SID"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Source_RefSID" > "SchData-OLTP-Finance"."TblAdvanceSettlementDetail"."Sys_SID"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Source_RefSID" > "SchData-OLTP-Finance"."TblCreditNote"."Sys_SID"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Source_RefSID" > "SchData-OLTP-Finance"."TblCreditNoteDetail"."Sys_SID"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Source_RefSID" > "SchData-OLTP-Finance"."TblDebitNote"."Sys_SID"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Source_RefSID" > "SchData-OLTP-Finance"."TblDebitNoteDetail"."Sys_SID"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Source_RefSID" > "SchData-OLTP-Finance"."TblPayment"."Sys_SID"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Source_RefSID" > "SchData-OLTP-Finance"."TblPaymentDetail"."Sys_SID"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Source_RefSID" > "SchData-OLTP-Finance"."TblPaymentInstruction"."Sys_SID"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Source_RefSID" > "SchData-OLTP-Finance"."TblPaymentInstructionDetail"."Sys_SID"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Source_RefSID" > "SchData-OLTP-Finance"."TblPurchaseInvoice"."Sys_SID"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Source_RefSID" > "SchData-OLTP-Finance"."TblPurchaseInvoiceDetail"."Sys_SID"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Source_RefSID" > "SchData-OLTP-Finance"."TblSalesInvoice"."Sys_SID"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Source_RefSID" > "SchData-OLTP-Finance"."TblSalesInvoiceDetail"."Sys_SID"

Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Source_RefRPK" > "SchData-OLTP-Finance"."TblAdvance"."Sys_RPK"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Source_RefRPK" > "SchData-OLTP-Finance"."TblAdvanceDetail"."Sys_RPK"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Source_RefRPK" > "SchData-OLTP-Finance"."TblAdvancePayment"."Sys_RPK"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Source_RefRPK" > "SchData-OLTP-Finance"."TblAdvancePaymentDetail"."Sys_RPK"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Source_RefRPK" > "SchData-OLTP-Finance"."TblAdvanceSettlement"."Sys_RPK"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Source_RefRPK" > "SchData-OLTP-Finance"."TblAdvanceSettlementDetail"."Sys_RPK"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Source_RefRPK" > "SchData-OLTP-Finance"."TblCreditNote"."Sys_RPK"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Source_RefRPK" > "SchData-OLTP-Finance"."TblCreditNoteDetail"."Sys_RPK"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Source_RefRPK" > "SchData-OLTP-Finance"."TblDebitNote"."Sys_RPK"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Source_RefRPK" > "SchData-OLTP-Finance"."TblDebitNoteDetail"."Sys_RPK"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Source_RefRPK" > "SchData-OLTP-Finance"."TblPayment"."Sys_RPK"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Source_RefRPK" > "SchData-OLTP-Finance"."TblPaymentDetail"."Sys_RPK"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Source_RefRPK" > "SchData-OLTP-Finance"."TblPaymentInstruction"."Sys_RPK"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Source_RefRPK" > "SchData-OLTP-Finance"."TblPaymentInstructionDetail"."Sys_RPK"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Source_RefRPK" > "SchData-OLTP-Finance"."TblPurchaseInvoice"."Sys_RPK"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Source_RefRPK" > "SchData-OLTP-Finance"."TblPurchaseInvoiceDetail"."Sys_RPK"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Source_RefRPK" > "SchData-OLTP-Finance"."TblSalesInvoice"."Sys_RPK"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Source_RefRPK" > "SchData-OLTP-Finance"."TblSalesInvoiceDetail"."Sys_RPK"

Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Source_EntryDateTimeTZ" > "SchData-OLTP-Finance"."TblAdvance"."Sys_Data_Entry_DateTimeTZ"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Source_EntryDateTimeTZ" > "SchData-OLTP-Finance"."TblAdvanceDetail"."Sys_Data_Entry_DateTimeTZ"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Source_EntryDateTimeTZ" > "SchData-OLTP-Finance"."TblAdvancePayment"."Sys_Data_Entry_DateTimeTZ"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Source_EntryDateTimeTZ" > "SchData-OLTP-Finance"."TblAdvancePaymentDetail"."Sys_Data_Entry_DateTimeTZ"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Source_EntryDateTimeTZ" > "SchData-OLTP-Finance"."TblAdvanceSettlement"."Sys_Data_Entry_DateTimeTZ"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Source_EntryDateTimeTZ" > "SchData-OLTP-Finance"."TblAdvanceSettlementDetail"."Sys_Data_Entry_DateTimeTZ"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Source_EntryDateTimeTZ" > "SchData-OLTP-Finance"."TblCreditNote"."Sys_Data_Entry_DateTimeTZ"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Source_EntryDateTimeTZ" > "SchData-OLTP-Finance"."TblCreditNoteDetail"."Sys_Data_Entry_DateTimeTZ"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Source_EntryDateTimeTZ" > "SchData-OLTP-Finance"."TblDebitNote"."Sys_Data_Entry_DateTimeTZ"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Source_EntryDateTimeTZ" > "SchData-OLTP-Finance"."TblDebitNoteDetail"."Sys_Data_Entry_DateTimeTZ"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Source_EntryDateTimeTZ" > "SchData-OLTP-Finance"."TblPayment"."Sys_Data_Entry_DateTimeTZ"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Source_EntryDateTimeTZ" > "SchData-OLTP-Finance"."TblPaymentDetail"."Sys_Data_Entry_DateTimeTZ"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Source_EntryDateTimeTZ" > "SchData-OLTP-Finance"."TblPaymentInstruction"."Sys_Data_Entry_DateTimeTZ"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Source_EntryDateTimeTZ" > "SchData-OLTP-Finance"."TblPaymentInstructionDetail"."Sys_Data_Entry_DateTimeTZ"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Source_EntryDateTimeTZ" > "SchData-OLTP-Finance"."TblPurchaseInvoice"."Sys_Data_Entry_DateTimeTZ"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Source_EntryDateTimeTZ" > "SchData-OLTP-Finance"."TblPurchaseInvoiceDetail"."Sys_Data_Entry_DateTimeTZ"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Source_EntryDateTimeTZ" > "SchData-OLTP-Finance"."TblSalesInvoice"."Sys_Data_Entry_DateTimeTZ"
Ref: "SchData-Warehouse-Log"."TblLog_TransactionHistory"."Source_EntryDateTimeTZ" > "SchData-OLTP-Finance"."TblSalesInvoiceDetail"."Sys_Data_Entry_DateTimeTZ"




