TABLE "SchSysConfig.TblLog_UserLoginSession"
{
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" bigint [pk, not null, default: `nextval('"SchSysConfig"."TblLog_UserLoginSession_Sys_RPK_seq"'::regclass)`]
    "Sys_Data_Annotation" "varchar(1024)"
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
    "Sys_DataIntegrityShadow" "varchar"
    "User_RefID" bigint
    "APIWebToken" "varchar"
    "OptionsList" json
    "Branch_RefID" bigint
    "UserRole_RefID" bigint
    "SessionStartDateTimeTZ" timestamptz
    "SessionFinishDateTimeTZ" timestamptz
    "SessionAutoStartDateTimeTZ" timestamptz
    "SessionAutoFinishDateTimeTZ" timestamptz
}
Ref: "SchSysConfig.TblLog_UserLoginSession"."Sys_Data_Entry_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblLog_UserLoginSession"."Sys_Data_Entry_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblLog_UserLoginSession"."Sys_Data_Edit_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblLog_UserLoginSession"."Sys_Data_Edit_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblLog_UserLoginSession"."Sys_Data_Delete_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblLog_UserLoginSession"."Sys_Data_Delete_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblLog_UserLoginSession"."Sys_Data_Hidden_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblLog_UserLoginSession"."Sys_Data_Hidden_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblLog_UserLoginSession"."Sys_Data_Authentication_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblLog_UserLoginSession"."Sys_Data_Authentication_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblLog_UserLoginSession"."Sys_Partition_RemovableRecord_Key_RefID" < "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig.TblLog_UserLoginSession"."Sys_Partition_RemovableRecord_Key_RefID" < "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig.TblLog_UserLoginSession"."Sys_Branch_RefID" < "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig.TblLog_UserLoginSession"."Sys_Branch_RefID" < "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchSysConfig.TblLog_UserLoginSession"."Branch_RefID" < "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig.TblLog_UserLoginSession"."Branch_RefID" < "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchSysConfig.TblLog_UserLoginSession"."User_RefID" < "SchSysConfig.TblDBObject_User"."Sys_PID"
Ref: "SchSysConfig.TblLog_UserLoginSession"."User_RefID" < "SchSysConfig.TblDBObject_User"."Sys_SID"


TABLE "SchSysConfig.TblDBObject_Schema"
{
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" bigint [pk, not null, default: `nextval('"SchSysConfig"."TblDBObject_Schema_Sys_RPK_seq"'::regclass)`]
    "Sys_Data_Annotation" "varchar(1024)"
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
    "Sys_DataIntegrityShadow" "varchar(32)"
    "Name" "varchar(128)"
}
Ref: "SchSysConfig.TblDBObject_Schema"."Sys_Data_Entry_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblDBObject_Schema"."Sys_Data_Entry_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblDBObject_Schema"."Sys_Data_Edit_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblDBObject_Schema"."Sys_Data_Edit_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblDBObject_Schema"."Sys_Data_Delete_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblDBObject_Schema"."Sys_Data_Delete_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblDBObject_Schema"."Sys_Data_Hidden_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblDBObject_Schema"."Sys_Data_Hidden_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblDBObject_Schema"."Sys_Data_Authentication_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblDBObject_Schema"."Sys_Data_Authentication_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblDBObject_Schema"."Sys_Partition_RemovableRecord_Key_RefID" < "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig.TblDBObject_Schema"."Sys_Partition_RemovableRecord_Key_RefID" < "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig.TblDBObject_Schema"."Sys_Branch_RefID" < "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig.TblDBObject_Schema"."Sys_Branch_RefID" < "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"



Table "SchSysConfig.TblDBObject_Table" {
  "Sys_PID" bigint
  "Sys_SID" bigint
  "Sys_RPK" bigint [pk, not null, default: `nextval('"SchSysConfig"."TblDBObject_Table_Sys_RPK_seq"'::regclass)`]
  "Sys_Data_Annotation" "varchar(1024)"
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
  "Sys_DataIntegrityShadow" "varchar(32)"
  "Schema_RefID" bigint
  "Name" "varchar(128)"
  "Partition_RemovableRecord_Parameter_RefID" bigint
}
Ref: "SchSysConfig.TblDBObject_Table"."Sys_Data_Entry_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblDBObject_Table"."Sys_Data_Entry_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblDBObject_Table"."Sys_Data_Edit_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblDBObject_Table"."Sys_Data_Edit_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblDBObject_Table"."Sys_Data_Delete_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblDBObject_Table"."Sys_Data_Delete_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblDBObject_Table"."Sys_Data_Hidden_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblDBObject_Table"."Sys_Data_Hidden_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblDBObject_Table"."Sys_Data_Authentication_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblDBObject_Table"."Sys_Data_Authentication_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblDBObject_Table"."Sys_Partition_RemovableRecord_Key_RefID" < "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig.TblDBObject_Table"."Sys_Partition_RemovableRecord_Key_RefID" < "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig.TblDBObject_Table"."Sys_Branch_RefID" < "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig.TblDBObject_Table"."Sys_Branch_RefID" < "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchSysConfig.TblDBObject_Table"."Schema_RefID" < "SchSysConfig.TblDBObject_Schema"."Sys_PID"
Ref: "SchSysConfig.TblDBObject_Table"."Schema_RefID" < "SchSysConfig.TblDBObject_Schema"."Sys_SID"



TABLE "SchSysConfig.TblDBObject_User"
{
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" bigint [pk, not null, default: `nextval('"SchSysConfig"."TblDBObject_User_Sys_RPK_seq"'::regclass)`]
    "Sys_Data_Annotation" "varchar(1024)"
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
    "Sys_DataIntegrityShadow" "varchar(32)"
    "PersonName" "varchar(256)"
    "UserName" "varchar(128)"
    "EncryptedPassword" bytea
    "PasswordShadow" "varchar(32)"
}
Ref: "SchSysConfig.TblDBObject_User"."Sys_Data_Entry_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblDBObject_User"."Sys_Data_Entry_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblDBObject_User"."Sys_Data_Edit_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblDBObject_User"."Sys_Data_Edit_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblDBObject_User"."Sys_Data_Delete_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblDBObject_User"."Sys_Data_Delete_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblDBObject_User"."Sys_Data_Hidden_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblDBObject_User"."Sys_Data_Hidden_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblDBObject_User"."Sys_Data_Authentication_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblDBObject_User"."Sys_Data_Authentication_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblDBObject_User"."Sys_Partition_RemovableRecord_Key_RefID" < "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig.TblDBObject_User"."Sys_Partition_RemovableRecord_Key_RefID" < "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig.TblDBObject_User"."Sys_Branch_RefID" < "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig.TblDBObject_User"."Sys_Branch_RefID" < "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"



TABLE "SchSysConfig.TblDBObject_Partition_RemovableRecord_Parameter"
{
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" bigint [pk, not null, default: `nextval('nextval('"SchSysConfig"."TblDBObject_Partition_RemovableRecord_Parameter_Sys_RPK_seq"'::regclass)`]
    "Sys_Data_Annotation" "varchar(1024)"
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
    "Sys_DataIntegrityShadow" "varchar(32)"
    "Parameter" "varchar(128)"
}
Ref: "SchSysConfig.TblDBObject_Partition_RemovableRecord_Parameter"."Sys_Data_Entry_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblDBObject_Partition_RemovableRecord_Parameter"."Sys_Data_Entry_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblDBObject_Partition_RemovableRecord_Parameter"."Sys_Data_Edit_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblDBObject_Partition_RemovableRecord_Parameter"."Sys_Data_Edit_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblDBObject_Partition_RemovableRecord_Parameter"."Sys_Data_Delete_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblDBObject_Partition_RemovableRecord_Parameter"."Sys_Data_Delete_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblDBObject_Partition_RemovableRecord_Parameter"."Sys_Data_Hidden_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblDBObject_Partition_RemovableRecord_Parameter"."Sys_Data_Hidden_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblDBObject_Partition_RemovableRecord_Parameter"."Sys_Data_Authentication_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblDBObject_Partition_RemovableRecord_Parameter"."Sys_Data_Authentication_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblDBObject_Partition_RemovableRecord_Parameter"."Sys_Partition_RemovableRecord_Key_RefID" < "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig.TblDBObject_Partition_RemovableRecord_Parameter"."Sys_Partition_RemovableRecord_Key_RefID" < "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig.TblDBObject_Partition_RemovableRecord_Parameter"."Sys_Branch_RefID" < "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig.TblDBObject_Partition_RemovableRecord_Parameter"."Sys_Branch_RefID" < "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"



TABLE "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"
{
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" bigint [pk, not null, default: `nextval('"SchSysConfig"."TblDBObject_Partition_RemovableRecord_Key_Sys_RPK_seq"'::regclass)`]
    "Sys_Data_Annotation" "varchar(1024)"
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
    "Sys_DataIntegrityShadow" "varchar(32)"
    "Partition_RemovableRecord_Parameter_RefID" bigint
    "Key" "varchar(128)"
}
Ref: "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_Data_Entry_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_Data_Entry_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_Data_Edit_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_Data_Edit_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_Data_Delete_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_Data_Delete_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_Data_Hidden_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_Data_Hidden_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_Data_Authentication_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_Data_Authentication_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_Partition_RemovableRecord_Key_RefID" < "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_Partition_RemovableRecord_Key_RefID" < "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_Branch_RefID" < "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_Branch_RefID" < "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Partition_RemovableRecord_Parameter_RefID" < "SchSysConfig.TblDBObject_Partition_RemovableRecord_Parameter"."Sys_PID"
Ref: "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Partition_RemovableRecord_Parameter_RefID" < "SchSysConfig.TblDBObject_Partition_RemovableRecord_Parameter"."Sys_SID"



TABLE "SchSysConfig.TblAppObject_InstitutionCompany"
{
    "Sys_PID" bigint 
    "Sys_SID" bigint 
    "Sys_RPK" bigint [pk, not null, default: `nextval('"SchSysConfig"."TblAppObject_InstitutionCompany_Sys_RPK_seq"'::regclass)`]
    "Sys_Data_Annotation" varchar(1024)
    "Sys_Data_Entry_LoginSession_RefID" bigint 
    "Sys_Data_Entry_DateTimeTZ" timestamptz
    "Sys_Data_Edit_LoginSession_RefID" bigint 
    "Sys_Data_Edit_DateTimeTZ" timestamptz
    "Sys_Data_Delete_LoginSession_RefID" bigint 
    "Sys_Data_Delete_DateTimeTZ" timestamptz
    "Sys_Data_Hidden_LoginSession_RefID" bigint 
    "Sys_Data_Hidden_DateTimeTZ" timestamtz
    "Sys_Data_Authentication_LoginSession_RefID" bigint 
    "Sys_Data_Authentication_DateTimeTZ" timestamptz
    "Sys_Partition_RemovableRecord_Key_RefID" bigint 
    "Sys_Branch_RefID" bigint 
    "Sys_DataIntegrityShadow" varchar(32)
    "Name" varchar(128)
}
Ref: "SchSysConfig.TblAppObject_InstitutionCompany"."Sys_Data_Entry_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_InstitutionCompany"."Sys_Data_Entry_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_InstitutionCompany"."Sys_Data_Edit_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_InstitutionCompany"."Sys_Data_Edit_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_InstitutionCompany"."Sys_Data_Delete_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_InstitutionCompany"."Sys_Data_Delete_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_InstitutionCompany"."Sys_Data_Hidden_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_InstitutionCompany"."Sys_Data_Hidden_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_InstitutionCompany"."Sys_Data_Authentication_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_InstitutionCompany"."Sys_Data_Authentication_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_InstitutionCompany"."Sys_Partition_RemovableRecord_Key_RefID" < "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_InstitutionCompany"."Sys_Partition_RemovableRecord_Key_RefID" < "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_InstitutionCompany"."Sys_Branch_RefID" < "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_InstitutionCompany"."Sys_Branch_RefID" < "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"



TABLE "SchSysConfig.TblAppObject_InstitutionRegional"
{
    "Sys_PID" bigint 
    "Sys_SID" bigint 
    "Sys_RPK" bigint [pk, not null, default: `nextval('"SchSysConfig"."TblAppObject_InstitutionRegional_Sys_RPK_seq"'::regclass)`]
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
    "Sys_DataIntegrityShadow" varchar(32)
    "AppObject_InstitutionCompany_RefID" bigint 
    "Name" varchar(128)
}
Ref: "SchSysConfig.TblAppObject_InstitutionRegional"."Sys_Data_Entry_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_InstitutionRegional"."Sys_Data_Entry_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_InstitutionRegional"."Sys_Data_Edit_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_InstitutionRegional"."Sys_Data_Edit_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_InstitutionRegional"."Sys_Data_Delete_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_InstitutionRegional"."Sys_Data_Delete_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_InstitutionRegional"."Sys_Data_Hidden_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_InstitutionRegional"."Sys_Data_Hidden_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_InstitutionRegional"."Sys_Data_Authentication_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_InstitutionRegional"."Sys_Data_Authentication_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_InstitutionRegional"."Sys_Partition_RemovableRecord_Key_RefID" < "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_InstitutionRegional"."Sys_Partition_RemovableRecord_Key_RefID" < "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_InstitutionRegional"."Sys_Branch_RefID" < "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_InstitutionRegional"."Sys_Branch_RefID" < "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_InstitutionRegional"."AppObject_InstitutionCompany_RefID" < "SchSysConfig.TblAppObject_InstitutionCompany"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_InstitutionRegional"."AppObject_InstitutionCompany_RefID" < "SchSysConfig.TblAppObject_InstitutionCompany"."Sys_SID"



TABLE "SchSysConfig.TblAppObject_InstitutionBranch"
{
    "Sys_PID" bigint 
    "Sys_SID" bigint 
    "Sys_RPK" bigint [pk, not null, default: `nextval('"SchSysConfig"."TblAppObject_InstitutionBranch_Sys_RPK_seq"'::regclass)`]
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
    "Sys_DataIntegrityShadow" varchar(32)
    "AppObject_InstitutionRegional_RefID" bigint 
    "Name" varchar(128)
}
Ref: "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_Data_Entry_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_Data_Entry_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_Data_Edit_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_Data_Edit_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_Data_Delete_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_Data_Delete_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_Data_Hidden_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_Data_Hidden_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_Data_Authentication_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_Data_Authentication_LoginSession_RefID" < "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_Partition_RemovableRecord_Key_RefID" < "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_Partition_RemovableRecord_Key_RefID" < "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_InstitutionBranch"."AppObject_InstitutionRegional_RefID" < "SchSysConfig.TblAppObject_InstitutionRegional"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_InstitutionBranch"."AppObject_InstitutionRegional_RefID" < "SchSysConfig.TblAppObject_InstitutionRegional"."Sys_SID"