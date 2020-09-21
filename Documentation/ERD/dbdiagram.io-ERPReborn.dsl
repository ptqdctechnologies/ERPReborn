PROJECT "ERPReborn" 
    {
    database_type: 'PostgreSQL'
    Note: 'ERP Reborn'
    }



TABLE "SchSysConfig.TblAppObject_AuthorizationSequence"
    {
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" bigint [pk]
    "Sys_Data_Annotation" varchar(1024)
    "Sys_Data_Entry_LoginSession_RefID" bigint
    "Sys_Data_Entry_DateTimeTZ" timestamptz
    "Sys_Data_Edit_LoginSession_RefID" bigint
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
    "Owner_RefID" bigint
    "BusinessDocumentType_RefID" bigint
    }
Ref: "SchSysConfig.TblAppObject_AuthorizationSequence"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequence"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequence"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequence"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequence"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequence"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequence"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequence"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequence"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequence"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequence"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequence"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequence"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequence"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequence"."BusinessDocumentType_RefID" > "SchMaster.TblBusinessDocument"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequence"."BusinessDocumentType_RefID" > "SchMaster.TblBusinessDocument"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequence"."Owner_RefID" > "SchHumanResource.TblOrganizationalDepartment"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequence"."Owner_RefID" > "SchHumanResource.TblOrganizationalDepartment"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequence"."Owner_RefID" > "SchProject.TblProject"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequence"."Owner_RefID" > "SchProject.TblProject"."Sys_SID"



TABLE "SchSysConfig.TblAppObject_AuthorizationSequenceActionType"
    {
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" bigint [pk]
    "Sys_Data_Annotation" varchar(1024)
    "Sys_Data_Entry_LoginSession_RefID" bigint
    "Sys_Data_Entry_DateTimeTZ" timestamptz
    "Sys_Data_Edit_LoginSession_RefID" bigint
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
    "Name" varchar(64)
    }
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceActionType"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceActionType"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceActionType"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceActionType"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceActionType"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceActionType"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceActionType"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceActionType"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceActionType"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceActionType"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceActionType"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceActionType"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceActionType"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceActionType"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"



TABLE "SchSysConfig.TblAppObject_AuthorizationSequenceEdge"
    {
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" bigint [pk]
    "Sys_Data_Annotation" varchar(1024)
    "Sys_Data_Entry_LoginSession_RefID" bigint
    "Sys_Data_Entry_DateTimeTZ" timestamptz
    "Sys_Data_Edit_LoginSession_RefID" bigint
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
    "AuthorizationSequenceVersion_RefID" bigint
    "PreviousAuthorizationSequenceNode_RefID" bigint
    "NextAuthorizationSequenceNode_RefID" bigint
    "PreviousVersionAuthorizationSequenceEdge_RefID" bigint
    }
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceEdge"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceEdge"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceEdge"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceEdge"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceEdge"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceEdge"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceEdge"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceEdge"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceEdge"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceEdge"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceEdge"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceEdge"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceEdge"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceEdge"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceEdge"."AuthorizationSequenceVersion_RefID" > "SchSysConfig.TblAppObject_AuthorizationSequenceVersion"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceEdge"."AuthorizationSequenceVersion_RefID" > "SchSysConfig.TblAppObject_AuthorizationSequenceVersion"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceEdge"."PreviousAuthorizationSequenceNode_RefID" > "SchSysConfig.TblAppObject_AuthorizationSequenceNode"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceEdge"."PreviousAuthorizationSequenceNode_RefID" > "SchSysConfig.TblAppObject_AuthorizationSequenceNode"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceEdge"."NextAuthorizationSequenceNode_RefID" > "SchSysConfig.TblAppObject_AuthorizationSequenceNode"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceEdge"."NextAuthorizationSequenceNode_RefID" > "SchSysConfig.TblAppObject_AuthorizationSequenceNode"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceEdge"."PreviousVersionAuthorizationSequenceEdge_RefID" > "SchSysConfig.TblAppObject_AuthorizationSequenceEdge"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceEdge"."PreviousVersionAuthorizationSequenceEdge_RefID" > "SchSysConfig.TblAppObject_AuthorizationSequenceEdge"."Sys_SID"



TABLE "SchSysConfig.TblAppObject_AuthorizationSequenceEdgeMember"
    {
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" bigint [pk]
    "Sys_Data_Annotation" varchar(1024)
    "Sys_Data_Entry_LoginSession_RefID" bigint
    "Sys_Data_Entry_DateTimeTZ" timestamptz
    "Sys_Data_Edit_LoginSession_RefID" bigint
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
    "AuthorizationSequenceEdge_RefID" bigint
    "User_RefID" bigint
    }
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceEdgeMember"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceEdgeMember"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceEdgeMember"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceEdgeMember"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceEdgeMember"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceEdgeMember"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceEdgeMember"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceEdgeMember"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceEdgeMember"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceEdgeMember"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceEdgeMember"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceEdgeMember"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceEdgeMember"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceEdgeMember"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceEdgeMember"."AuthorizationSequenceEdge_RefID" > "SchSysConfig.TblAppObject_AuthorizationSequenceEdge"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceEdgeMember"."AuthorizationSequenceEdge_RefID" > "SchSysConfig.TblAppObject_AuthorizationSequenceEdge"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceEdgeMember"."User_RefID" > "SchSysConfig.TblDBObject_User"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceEdgeMember"."User_RefID" > "SchSysConfig.TblDBObject_User"."Sys_SID"



TABLE "SchSysConfig.TblAppObject_AuthorizationSequenceEdgeMemberType"
    {
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" bigint [pk]
    "Sys_Data_Annotation" varchar(1024)
    "Sys_Data_Entry_LoginSession_RefID" bigint
    "Sys_Data_Entry_DateTimeTZ" timestamptz
    "Sys_Data_Edit_LoginSession_RefID" bigint
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
    "Name" varchar(64)
    }
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceEdgeMemberType"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceEdgeMemberType"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceEdgeMemberType"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceEdgeMemberType"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceEdgeMemberType"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceEdgeMemberType"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceEdgeMemberType"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceEdgeMemberType"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceEdgeMemberType"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceEdgeMemberType"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceEdgeMemberType"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceEdgeMemberType"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceEdgeMemberType"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceEdgeMemberType"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"



TABLE "SchSysConfig.TblAppObject_AuthorizationSequenceNode"
    {
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" bigint [pk]
    "Sys_Data_Annotation" varchar(1024)
    "Sys_Data_Entry_LoginSession_RefID" bigint
    "Sys_Data_Entry_DateTimeTZ" timestamptz
    "Sys_Data_Edit_LoginSession_RefID" bigint
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
    "AuthorizationSequence_RefID" bigint
    "AuthorizationSequenceNodeType_RefID" bigint
    }
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceNode"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceNode"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceNode"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceNode"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceNode"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceNode"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceNode"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceNode"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceNode"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceNode"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceNode"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceNode"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceNode"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceNode"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceNode"."AuthorizationSequence_RefID" > "SchSysConfig.TblAppObject_AuthorizationSequence"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceNode"."AuthorizationSequence_RefID" > "SchSysConfig.TblAppObject_AuthorizationSequence"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceNode"."AuthorizationSequenceNodeType_RefID" > "SchSysConfig.TblAppObject_AuthorizationSequenceNodeType"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceNode"."AuthorizationSequenceNodeType_RefID" > "SchSysConfig.TblAppObject_AuthorizationSequenceNodeType"."Sys_SID"



TABLE "SchSysConfig.TblAppObject_AuthorizationSequenceNodeType"
    {
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" bigint [pk]
    "Sys_Data_Annotation" varchar(1024)
    "Sys_Data_Entry_LoginSession_RefID" bigint
    "Sys_Data_Entry_DateTimeTZ" timestamptz
    "Sys_Data_Edit_LoginSession_RefID" bigint
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
    "Name" varchar(64)
    }
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceNodeType"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceNodeType"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceNodeType"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceNodeType"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceNodeType"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceNodeType"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceNodeType"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceNodeType"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceNodeType"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceNodeType"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceNodeType"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceNodeType"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceNodeType"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceNodeType"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"



TABLE "SchSysConfig.TblAppObject_AuthorizationSequenceVersion"
    {
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" bigint [pk]
    "Sys_Data_Annotation" varchar(1024)
    "Sys_Data_Entry_LoginSession_RefID" bigint
    "Sys_Data_Entry_DateTimeTZ" timestamptz
    "Sys_Data_Edit_LoginSession_RefID" bigint
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
    "AuthorizationSequence_RefID" bigint
    "Version" smallint
    }
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceVersion"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceVersion"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceVersion"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceVersion"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceVersion"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceVersion"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceVersion"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceVersion"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceVersion"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceVersion"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceVersion"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceVersion"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceVersion"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceVersion"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceVersion"."AuthorizationSequence_RefID" > "SchSysConfig.TblAppObject_AuthorizationSequence"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_AuthorizationSequenceVersion"."AuthorizationSequence_RefID" > "SchSysConfig.TblAppObject_AuthorizationSequence"."Sys_SID"



TABLE "SchSysConfig.TblAppObject_InstitutionBranch"
    {
    "Sys_PID" bigint 
    "Sys_SID" bigint 
    "Sys_RPK" bigint [pk]
    "Sys_Data_Annotation" varchar(1024)
    "Sys_Data_Entry_LoginSession_RefID" bigint 
    "Sys_Data_Entry_DateTimeTZ" timestamptz
    "Sys_Data_Edit_LoginSession_RefID" bigint 
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
Ref: "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_InstitutionBranch"."AppObject_InstitutionRegional_RefID" > "SchSysConfig.TblAppObject_InstitutionRegional"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_InstitutionBranch"."AppObject_InstitutionRegional_RefID" > "SchSysConfig.TblAppObject_InstitutionRegional"."Sys_SID"



TABLE "SchSysConfig.TblAppObject_InstitutionCompany"
    {
    "Sys_PID" bigint 
    "Sys_SID" bigint 
    "Sys_RPK" bigint [pk]
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
Ref: "SchSysConfig.TblAppObject_InstitutionCompany"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_InstitutionCompany"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_InstitutionCompany"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_InstitutionCompany"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_InstitutionCompany"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_InstitutionCompany"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_InstitutionCompany"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_InstitutionCompany"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_InstitutionCompany"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_InstitutionCompany"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_InstitutionCompany"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_InstitutionCompany"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_InstitutionCompany"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_InstitutionCompany"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"



TABLE "SchSysConfig.TblAppObject_InstitutionRegional"
    {
    "Sys_PID" bigint 
    "Sys_SID" bigint 
    "Sys_RPK" bigint [pk]
    "Sys_Data_Annotation" varchar(1024)
    "Sys_Data_Entry_LoginSession_RefID" bigint 
    "Sys_Data_Entry_DateTimeTZ" timestamptz
    "Sys_Data_Edit_LoginSession_RefID" bigint 
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
Ref: "SchSysConfig.TblAppObject_InstitutionRegional"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_InstitutionRegional"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_InstitutionRegional"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_InstitutionRegional"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_InstitutionRegional"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_InstitutionRegional"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_InstitutionRegional"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_InstitutionRegional"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_InstitutionRegional"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_InstitutionRegional"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_InstitutionRegional"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_InstitutionRegional"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_InstitutionRegional"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_InstitutionRegional"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_InstitutionRegional"."AppObject_InstitutionCompany_RefID" > "SchSysConfig.TblAppObject_InstitutionCompany"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_InstitutionRegional"."AppObject_InstitutionCompany_RefID" > "SchSysConfig.TblAppObject_InstitutionCompany"."Sys_SID"



TABLE "SchSysConfig.TblAppObject_UserRole"
    {
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" bigint [pk]
    "Sys_Data_Annotation" varchar(1024)
    "Sys_Data_Entry_LoginSession_RefID" bigint
    "Sys_Data_Entry_DateTimeTZ" timestamptz
    "Sys_Data_Edit_LoginSession_RefID" bigint
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
    "Name" varchar(256)
    }
Ref: "SchSysConfig.TblAppObject_UserRole"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_UserRole"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_UserRole"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_UserRole"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_UserRole"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_UserRole"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_UserRole"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_UserRole"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_UserRole"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_UserRole"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_UserRole"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_UserRole"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig.TblAppObject_UserRole"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig.TblAppObject_UserRole"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"



TABLE "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"
    {
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" bigint [pk]
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
Ref: "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Partition_RemovableRecord_Parameter_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Parameter"."Sys_PID"
Ref: "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Partition_RemovableRecord_Parameter_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Parameter"."Sys_SID"



TABLE "SchSysConfig.TblDBObject_Partition_RemovableRecord_Parameter"
    {
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" bigint [pk]
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
Ref: "SchSysConfig.TblDBObject_Partition_RemovableRecord_Parameter"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblDBObject_Partition_RemovableRecord_Parameter"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblDBObject_Partition_RemovableRecord_Parameter"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblDBObject_Partition_RemovableRecord_Parameter"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblDBObject_Partition_RemovableRecord_Parameter"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblDBObject_Partition_RemovableRecord_Parameter"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblDBObject_Partition_RemovableRecord_Parameter"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblDBObject_Partition_RemovableRecord_Parameter"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblDBObject_Partition_RemovableRecord_Parameter"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblDBObject_Partition_RemovableRecord_Parameter"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblDBObject_Partition_RemovableRecord_Parameter"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig.TblDBObject_Partition_RemovableRecord_Parameter"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig.TblDBObject_Partition_RemovableRecord_Parameter"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig.TblDBObject_Partition_RemovableRecord_Parameter"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"



TABLE "SchSysConfig.TblDBObject_Schema"
    {
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" bigint [pk]
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
Ref: "SchSysConfig.TblDBObject_Schema"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblDBObject_Schema"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblDBObject_Schema"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblDBObject_Schema"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblDBObject_Schema"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblDBObject_Schema"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblDBObject_Schema"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblDBObject_Schema"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblDBObject_Schema"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblDBObject_Schema"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblDBObject_Schema"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig.TblDBObject_Schema"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig.TblDBObject_Schema"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig.TblDBObject_Schema"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"



Table "SchSysConfig.TblDBObject_Table" 
    {
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" bigint [pk]
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
Ref: "SchSysConfig.TblDBObject_Table"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblDBObject_Table"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblDBObject_Table"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblDBObject_Table"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblDBObject_Table"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblDBObject_Table"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblDBObject_Table"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblDBObject_Table"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblDBObject_Table"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblDBObject_Table"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblDBObject_Table"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig.TblDBObject_Table"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig.TblDBObject_Table"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig.TblDBObject_Table"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchSysConfig.TblDBObject_Table"."Schema_RefID" > "SchSysConfig.TblDBObject_Schema"."Sys_PID"
Ref: "SchSysConfig.TblDBObject_Table"."Schema_RefID" > "SchSysConfig.TblDBObject_Schema"."Sys_SID"
Ref: "SchSysConfig.TblDBObject_Table"."Partition_RemovableRecord_Parameter_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Parameter"."Sys_PID"
Ref: "SchSysConfig.TblDBObject_Table"."Partition_RemovableRecord_Parameter_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Parameter"."Sys_SID"



TABLE "SchSysConfig.TblDBObject_User"
    {
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" bigint [pk]
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
Ref: "SchSysConfig.TblDBObject_User"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblDBObject_User"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblDBObject_User"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblDBObject_User"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblDBObject_User"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblDBObject_User"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblDBObject_User"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblDBObject_User"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblDBObject_User"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblDBObject_User"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblDBObject_User"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig.TblDBObject_User"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig.TblDBObject_User"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig.TblDBObject_User"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"



TABLE "SchSysConfig.TblLDAPObject_User"
    {
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" bigint [pk]
    "Sys_Data_Annotation" varchar(1024)
    "Sys_Data_Entry_LoginSession_RefID" bigint
    "Sys_Data_Entry_DateTimeTZ" timestamptz
    "Sys_Data_Edit_LoginSession_RefID" bigint
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
    "UserID" varchar(128)
    "UserName" varchar(256)
    }
Ref: "SchSysConfig.TblLDAPObject_User"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblLDAPObject_User"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblLDAPObject_User"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblLDAPObject_User"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblLDAPObject_User"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblLDAPObject_User"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblLDAPObject_User"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblLDAPObject_User"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblLDAPObject_User"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblLDAPObject_User"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblLDAPObject_User"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig.TblLDAPObject_User"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig.TblLDAPObject_User"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig.TblLDAPObject_User"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"



TABLE "SchSysConfig.TblLog_UserLoginSession"
    {
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" bigint [pk]
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
Ref: "SchSysConfig.TblLog_UserLoginSession"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblLog_UserLoginSession"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblLog_UserLoginSession"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblLog_UserLoginSession"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblLog_UserLoginSession"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblLog_UserLoginSession"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblLog_UserLoginSession"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblLog_UserLoginSession"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblLog_UserLoginSession"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblLog_UserLoginSession"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblLog_UserLoginSession"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig.TblLog_UserLoginSession"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig.TblLog_UserLoginSession"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig.TblLog_UserLoginSession"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchSysConfig.TblLog_UserLoginSession"."Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig.TblLog_UserLoginSession"."Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchSysConfig.TblLog_UserLoginSession"."User_RefID" > "SchSysConfig.TblDBObject_User"."Sys_PID"
Ref: "SchSysConfig.TblLog_UserLoginSession"."User_RefID" > "SchSysConfig.TblDBObject_User"."Sys_SID"
Ref: "SchSysConfig.TblLog_UserLoginSession"."UserRole_RefID" > "SchSysConfig.TblAppObject_UserRole"."Sys_PID"
Ref: "SchSysConfig.TblLog_UserLoginSession"."UserRole_RefID" > "SchSysConfig.TblAppObject_UserRole"."Sys_SID"



TABLE "SchSysConfig.TblMapper_LDAPUserToPerson"
    {
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" bigint [pk]
    "Sys_Data_Annotation" varchar(1024)
    "Sys_Data_Entry_LoginSession_RefID" bigint
    "Sys_Data_Entry_DateTimeTZ" timestamptz
    "Sys_Data_Edit_LoginSession_RefID" bigint
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
    "LDAPUser_RefID" bigint
    "Person_RefID" bigint
    }
Ref: "SchSysConfig.TblMapper_LDAPUserToPerson"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblMapper_LDAPUserToPerson"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblMapper_LDAPUserToPerson"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblMapper_LDAPUserToPerson"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblMapper_LDAPUserToPerson"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblMapper_LDAPUserToPerson"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblMapper_LDAPUserToPerson"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblMapper_LDAPUserToPerson"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblMapper_LDAPUserToPerson"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblMapper_LDAPUserToPerson"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblMapper_LDAPUserToPerson"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig.TblMapper_LDAPUserToPerson"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig.TblMapper_LDAPUserToPerson"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig.TblMapper_LDAPUserToPerson"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchSysConfig.TblMapper_LDAPUserToPerson"."LDAPUser_RefID" > "SchSysConfig.TblLDAPObject_User"."Sys_PID"
Ref: "SchSysConfig.TblMapper_LDAPUserToPerson"."LDAPUser_RefID" > "SchSysConfig.TblLDAPObject_User"."Sys_SID"
Ref: "SchSysConfig.TblMapper_LDAPUserToPerson"."Person_RefID" > "SchMaster.TblPerson"."Sys_PID"
Ref: "SchSysConfig.TblMapper_LDAPUserToPerson"."Person_RefID" > "SchMaster.TblPerson"."Sys_SID"



TABLE "SchSysConfig.TblMapper_UserToLDAPUser"
    {
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" bigint [pk]
    "Sys_Data_Annotation" varchar(1024)
    "Sys_Data_Entry_LoginSession_RefID" bigint
    "Sys_Data_Entry_DateTimeTZ" timestamptz
    "Sys_Data_Edit_LoginSession_RefID" bigint
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
    "User_RefID" bigint
    "LDAPUserID" varchar(256)
    "EncryptedPassword" bytea
    "PasswordShadow" varchar(32)
    }
Ref: "SchSysConfig.TblMapper_UserToLDAPUser"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblMapper_UserToLDAPUser"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblMapper_UserToLDAPUser"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblMapper_UserToLDAPUser"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblMapper_UserToLDAPUser"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblMapper_UserToLDAPUser"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblMapper_UserToLDAPUser"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblMapper_UserToLDAPUser"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblMapper_UserToLDAPUser"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblMapper_UserToLDAPUser"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblMapper_UserToLDAPUser"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig.TblMapper_UserToLDAPUser"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig.TblMapper_UserToLDAPUser"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig.TblMapper_UserToLDAPUser"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchSysConfig.TblMapper_UserToLDAPUser"."User_RefID" > "SchSysConfig.TblDBObject_User"."Sys_PID"
Ref: "SchSysConfig.TblMapper_UserToLDAPUser"."User_RefID" > "SchSysConfig.TblDBObject_User"."Sys_SID"
Ref: "SchSysConfig.TblMapper_UserToLDAPUser"."LDAPUserID" > "SchSysConfig.TblLDAPObject_User"."Sys_PID"
Ref: "SchSysConfig.TblMapper_UserToLDAPUser"."LDAPUserID" > "SchSysConfig.TblLDAPObject_User"."Sys_SID"



TABLE "SchSysConfig.TblMapper_UserToUserRole"
    {
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" bigint [pk]
    "Sys_Data_Annotation" varchar(1024)
    "Sys_Data_Entry_LoginSession_RefID" bigint
    "Sys_Data_Entry_DateTimeTZ" timestamptz
    "Sys_Data_Edit_LoginSession_RefID" bigint
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
    "User_RefID" bigint
    "UserRole_RefID" bigint
    "CallProjectSyntax" varchar(256)
    "ValidStartDateTimeTZ" timestamptz
    "ValidFinishDateTimeTZ" timestamptz
    }
Ref: "SchSysConfig.TblMapper_UserToUserRole"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblMapper_UserToUserRole"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblMapper_UserToUserRole"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblMapper_UserToUserRole"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblMapper_UserToUserRole"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblMapper_UserToUserRole"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblMapper_UserToUserRole"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblMapper_UserToUserRole"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblMapper_UserToUserRole"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSysConfig.TblMapper_UserToUserRole"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSysConfig.TblMapper_UserToUserRole"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSysConfig.TblMapper_UserToUserRole"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSysConfig.TblMapper_UserToUserRole"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSysConfig.TblMapper_UserToUserRole"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchSysConfig.TblMapper_UserToUserRole"."User_RefID" > "SchSysConfig.TblDBObject_User"."Sys_PID"
Ref: "SchSysConfig.TblMapper_UserToUserRole"."User_RefID" > "SchSysConfig.TblDBObject_User"."Sys_SID"
Ref: "SchSysConfig.TblMapper_UserToUserRole"."UserRole_RefID" > "SchSysConfig.TblAppObject_UserRole"."Sys_PID"
Ref: "SchSysConfig.TblMapper_UserToUserRole"."UserRole_RefID" > "SchSysConfig.TblAppObject_UserRole"."Sys_SID"



TABLE "SchHumanResource.TblOrganizationalDepartment"
    {
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" bigint [pk]
    "Sys_Data_Annotation" varchar(1024)
    "Sys_Data_Entry_LoginSession_RefID" bigint
    "Sys_Data_Entry_DateTimeTZ" timestamptz
    "Sys_Data_Edit_LoginSession_RefID" bigint
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
    "Name" varchar(256)
    "ValidStartDateTimeTZ" timestamptz
    "ValidFinishDateTimeTZ" timestamptz
    }
Ref: "SchHumanResource.TblOrganizationalDepartment"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchHumanResource.TblOrganizationalDepartment"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchHumanResource.TblOrganizationalDepartment"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchHumanResource.TblOrganizationalDepartment"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchHumanResource.TblOrganizationalDepartment"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchHumanResource.TblOrganizationalDepartment"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchHumanResource.TblOrganizationalDepartment"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchHumanResource.TblOrganizationalDepartment"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchHumanResource.TblOrganizationalDepartment"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchHumanResource.TblOrganizationalDepartment"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchHumanResource.TblOrganizationalDepartment"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchHumanResource.TblOrganizationalDepartment"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchHumanResource.TblOrganizationalDepartment"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchHumanResource.TblOrganizationalDepartment"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"



TABLE "SchMaster.TblBloodAglutinogenType"
    {
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" bigint [pk]
    "Sys_Data_Annotation" varchar(1024)
    "Sys_Data_Entry_LoginSession_RefID" bigint
    "Sys_Data_Entry_DateTimeTZ" timestamptz
    "Sys_Data_Edit_LoginSession_RefID" bigint
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
    "Type" varchar(2)
    }
Ref: "SchMaster.TblBloodAglutinogenType"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblBloodAglutinogenType"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblBloodAglutinogenType"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblBloodAglutinogenType"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblBloodAglutinogenType"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblBloodAglutinogenType"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblBloodAglutinogenType"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblBloodAglutinogenType"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblBloodAglutinogenType"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblBloodAglutinogenType"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblBloodAglutinogenType"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchMaster.TblBloodAglutinogenType"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchMaster.TblBloodAglutinogenType"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchMaster.TblBloodAglutinogenType"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"



TABLE "SchMaster.TblBusinessDocument"
    {
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" bigint [pk]
    "Sys_Data_Annotation" varchar(1024)
    "Sys_Data_Entry_LoginSession_RefID" bigint
    "Sys_Data_Entry_DateTimeTZ" timestamptz
    "Sys_Data_Edit_LoginSession_RefID" bigint
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
    "SignDataAuthentication" boolean
    "BusinessDocumentType_RefID" bigint
    "DocumentNumber" varchar(32)
    }
Ref: "SchMaster.TblBusinessDocument"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblBusinessDocument"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblBusinessDocument"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblBusinessDocument"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblBusinessDocument"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblBusinessDocument"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblBusinessDocument"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblBusinessDocument"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblBusinessDocument"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblBusinessDocument"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblBusinessDocument"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchMaster.TblBusinessDocument"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchMaster.TblBusinessDocument"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchMaster.TblBusinessDocument"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchMaster.TblBusinessDocument"."BusinessDocumentType_RefID" > "SchMaster.TblBusinessDocumentType"."Sys_PID"
Ref: "SchMaster.TblBusinessDocument"."BusinessDocumentType_RefID" > "SchMaster.TblBusinessDocumentType"."Sys_SID"



TABLE "SchMaster.TblBusinessDocumentAuthorizationCurrentStage"
    {
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" bigint [pk]
    "Sys_Data_Annotation" varchar(1024)
    "Sys_Data_Entry_LoginSession_RefID" bigint
    "Sys_Data_Entry_DateTimeTZ" timestamptz
    "Sys_Data_Edit_LoginSession_RefID" bigint
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
    "BusinessDocumentVersion_RefID" bigint
    "AuthorizationSequenceEdge_RefID" bigint
    }
Ref: "SchMaster.TblBusinessDocumentAuthorizationCurrentStage"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblBusinessDocumentAuthorizationCurrentStage"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblBusinessDocumentAuthorizationCurrentStage"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblBusinessDocumentAuthorizationCurrentStage"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblBusinessDocumentAuthorizationCurrentStage"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblBusinessDocumentAuthorizationCurrentStage"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblBusinessDocumentAuthorizationCurrentStage"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblBusinessDocumentAuthorizationCurrentStage"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblBusinessDocumentAuthorizationCurrentStage"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblBusinessDocumentAuthorizationCurrentStage"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblBusinessDocumentAuthorizationCurrentStage"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchMaster.TblBusinessDocumentAuthorizationCurrentStage"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchMaster.TblBusinessDocumentAuthorizationCurrentStage"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchMaster.TblBusinessDocumentAuthorizationCurrentStage"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchMaster.TblBusinessDocumentAuthorizationCurrentStage"."BusinessDocumentVersion_RefID" > "SchMaster.TblBusinessDocumentVersion"."Sys_PID"
Ref: "SchMaster.TblBusinessDocumentAuthorizationCurrentStage"."BusinessDocumentVersion_RefID" > "SchMaster.TblBusinessDocumentVersion"."Sys_SID"
Ref: "SchMaster.TblBusinessDocumentAuthorizationCurrentStage"."AuthorizationSequenceEdge_RefID" > "SchSysConfig.TblAppObject_AuthorizationSequenceEdge"."Sys_PID"
Ref: "SchMaster.TblBusinessDocumentAuthorizationCurrentStage"."AuthorizationSequenceEdge_RefID" > "SchSysConfig.TblAppObject_AuthorizationSequenceEdge"."Sys_SID"



TABLE "SchMaster.TblBusinessDocumentAuthorizationHistory"
    {
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" bigint [pk]
    "Sys_Data_Annotation" varchar(1024)
    "Sys_Data_Entry_LoginSession_RefID" bigint
    "Sys_Data_Entry_DateTimeTZ" timestamptz
    "Sys_Data_Edit_LoginSession_RefID" bigint
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
    "BusinessDocumentVersion_RefID" bigint
    "User_RefID" bigint
    "AuthorizationSequenceActionType_RefID" bigint
    }
Ref: "SchMaster.TblBusinessDocumentAuthorizationHistory"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblBusinessDocumentAuthorizationHistory"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblBusinessDocumentAuthorizationHistory"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblBusinessDocumentAuthorizationHistory"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblBusinessDocumentAuthorizationHistory"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblBusinessDocumentAuthorizationHistory"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblBusinessDocumentAuthorizationHistory"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblBusinessDocumentAuthorizationHistory"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblBusinessDocumentAuthorizationHistory"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblBusinessDocumentAuthorizationHistory"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblBusinessDocumentAuthorizationHistory"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchMaster.TblBusinessDocumentAuthorizationHistory"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchMaster.TblBusinessDocumentAuthorizationHistory"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchMaster.TblBusinessDocumentAuthorizationHistory"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchMaster.TblBusinessDocumentAuthorizationHistory"."BusinessDocumentVersion_RefID" > "SchMaster.TblBusinessDocumentVersion"."Sys_PID"
Ref: "SchMaster.TblBusinessDocumentAuthorizationHistory"."BusinessDocumentVersion_RefID" > "SchMaster.TblBusinessDocumentVersion"."Sys_SID"
Ref: "SchMaster.TblBusinessDocumentAuthorizationHistory"."User_RefID" > "SchSysConfig.TblDBObject_User"."Sys_PID"
Ref: "SchMaster.TblBusinessDocumentAuthorizationHistory"."User_RefID" > "SchSysConfig.TblDBObject_User"."Sys_SID"
Ref: "SchMaster.TblBusinessDocumentAuthorizationHistory"."AuthorizationSequenceActionType_RefID" > "SchSysConfig.TblAppObject_AuthorizationSequenceActionType"."Sys_PID"
Ref: "SchMaster.TblBusinessDocumentAuthorizationHistory"."AuthorizationSequenceActionType_RefID" > "SchSysConfig.TblAppObject_AuthorizationSequenceActionType"."Sys_SID"



TABLE "SchMaster.TblBusinessDocumentType"
    {
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" bigint [pk]
    "Sys_Data_Annotation" varchar(1024)
    "Sys_Data_Entry_LoginSession_RefID" bigint
    "Sys_Data_Entry_DateTimeTZ" timestamptz
    "Sys_Data_Edit_LoginSession_RefID" bigint
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
    "SignDataAuthentication" boolean
    "Name" varchar(256)
    }
Ref: "SchMaster.TblBusinessDocumentType"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblBusinessDocumentType"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblBusinessDocumentType"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblBusinessDocumentType"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblBusinessDocumentType"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblBusinessDocumentType"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblBusinessDocumentType"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblBusinessDocumentType"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblBusinessDocumentType"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblBusinessDocumentType"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblBusinessDocumentType"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchMaster.TblBusinessDocumentType"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchMaster.TblBusinessDocumentType"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchMaster.TblBusinessDocumentType"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"



TABLE "SchMaster.TblBusinessDocumentVersion"
    {
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" bigint [pk]
    "Sys_Data_Annotation" varchar(1024)
    "Sys_Data_Entry_LoginSession_RefID" bigint
    "Sys_Data_Entry_DateTimeTZ" timestamptz
    "Sys_Data_Edit_LoginSession_RefID" bigint
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
    "SignDataAuthentication" boolean
    "BusinessDocument_RefID" bigint
    "Version" smallint
    "DocumentDateTimeTZ" timestamptz
    "Annotation" varchar(2048)
    "DocumentOwner_RefID" bigint
    }
Ref: "SchMaster.TblBusinessDocumentVersion"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblBusinessDocumentVersion"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblBusinessDocumentVersion"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblBusinessDocumentVersion"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblBusinessDocumentVersion"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblBusinessDocumentVersion"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblBusinessDocumentVersion"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblBusinessDocumentVersion"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblBusinessDocumentVersion"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblBusinessDocumentVersion"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblBusinessDocumentVersion"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchMaster.TblBusinessDocumentVersion"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchMaster.TblBusinessDocumentVersion"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchMaster.TblBusinessDocumentVersion"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchMaster.TblBusinessDocumentVersion"."BusinessDocument_RefID" > "SchMaster.TblBusinessDocument"."Sys_PID"
Ref: "SchMaster.TblBusinessDocumentVersion"."BusinessDocument_RefID" > "SchMaster.TblBusinessDocument"."Sys_SID"
Ref: "SchMaster.TblBusinessDocumentVersion"."DocumentOwner_RefID" > "SchHumanResource.TblOrganizationalDepartment"."Sys_PID"
Ref: "SchMaster.TblBusinessDocumentVersion"."DocumentOwner_RefID" > "SchHumanResource.TblOrganizationalDepartment"."Sys_SID"
Ref: "SchMaster.TblBusinessDocumentVersion"."DocumentOwner_RefID" > "SchProject.TblProject"."Sys_PID"
Ref: "SchMaster.TblBusinessDocumentVersion"."DocumentOwner_RefID" > "SchProject.TblProject"."Sys_SID"



TABLE "SchMaster.TblCitizenFamilyCard"
    {
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" bigint [pk]
    "Sys_Data_Annotation" varchar(1024)
    "Sys_Data_Entry_LoginSession_RefID" bigint
    "Sys_Data_Entry_DateTimeTZ" timestamptz
    "Sys_Data_Edit_LoginSession_RefID" bigint
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
    "CardNumber" varchar(64)
    "IssuedDate" date
    "CardSerialNumber" varchar(64)
    }
Ref: "SchMaster.TblCitizenFamilyCard"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblCitizenFamilyCard"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblCitizenFamilyCard"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblCitizenFamilyCard"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblCitizenFamilyCard"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblCitizenFamilyCard"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblCitizenFamilyCard"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblCitizenFamilyCard"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblCitizenFamilyCard"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblCitizenFamilyCard"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblCitizenFamilyCard"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchMaster.TblCitizenFamilyCard"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchMaster.TblCitizenFamilyCard"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"



TABLE "SchMaster.TblCitizenFamilyCardMember"
    {
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" bigint [pk]
    "Sys_Data_Annotation" varchar(1024)
    "Sys_Data_Entry_LoginSession_RefID" bigint
    "Sys_Data_Entry_DateTimeTZ" timestamptz
    "Sys_Data_Edit_LoginSession_RefID" bigint
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
    "CitizenFamilyCard_RefID" bigint
    "CitizenIdentity_RefID" bigint
    }
Ref: "SchMaster.TblCitizenFamilyCardMember"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblCitizenFamilyCardMember"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblCitizenFamilyCardMember"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblCitizenFamilyCardMember"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblCitizenFamilyCardMember"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblCitizenFamilyCardMember"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblCitizenFamilyCardMember"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblCitizenFamilyCardMember"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblCitizenFamilyCardMember"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblCitizenFamilyCardMember"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblCitizenFamilyCardMember"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchMaster.TblCitizenFamilyCardMember"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchMaster.TblCitizenFamilyCardMember"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchMaster.TblCitizenFamilyCardMember"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchMaster.TblCitizenFamilyCardMember"."CitizenFamilyCard_RefID" > "SchMaster.TblCitizenFamilyCard"."Sys_PID"
Ref: "SchMaster.TblCitizenFamilyCardMember"."CitizenFamilyCard_RefID" > "SchMaster.TblCitizenFamilyCard"."Sys_SID"
Ref: "SchMaster.TblCitizenFamilyCardMember"."CitizenIdentity_RefID" > "SchMaster.TblCitizenIdentity"."Sys_PID"
Ref: "SchMaster.TblCitizenFamilyCardMember"."CitizenIdentity_RefID" > "SchMaster.TblCitizenIdentity"."Sys_SID"



TABLE "SchMaster.TblCitizenIdentity"
    {
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" bigint [pk]
    "Sys_Data_Annotation" varchar(1024)
    "Sys_Data_Entry_LoginSession_RefID" bigint
    "Sys_Data_Entry_DateTimeTZ" timestamptz
    "Sys_Data_Edit_LoginSession_RefID" bigint
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
    "Person_RefID" bigint
    "Name" varchar(256)
    "IdentityNumber" varchar(64)
    "PersonGender_RefID" bigint
    "BirthPlace_RefID" bigint
    "BirthDateTime" timestamp
    "Religion_RefID" bigint
    }
Ref: "SchMaster.TblCitizenIdentity"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblCitizenIdentity"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblCitizenIdentity"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblCitizenIdentity"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblCitizenIdentity"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblCitizenIdentity"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblCitizenIdentity"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblCitizenIdentity"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblCitizenIdentity"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblCitizenIdentity"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblCitizenIdentity"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchMaster.TblCitizenIdentity"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchMaster.TblCitizenIdentity"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchMaster.TblCitizenIdentity"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchMaster.TblCitizenIdentity"."Person_RefID" > "SchMaster.TblPerson"."Sys_PID"
Ref: "SchMaster.TblCitizenIdentity"."Person_RefID" > "SchMaster.TblPerson"."Sys_SID"
Ref: "SchMaster.TblCitizenIdentity"."PersonGender_RefID" > "SchMaster.TblPersonGender"."Sys_PID"
Ref: "SchMaster.TblCitizenIdentity"."PersonGender_RefID" > "SchMaster.TblPersonGender"."Sys_SID"
Ref: "SchMaster.TblCitizenIdentity"."BirthPlace_RefID" > "SchMaster.TblCountry"."Sys_PID"
Ref: "SchMaster.TblCitizenIdentity"."BirthPlace_RefID" > "SchMaster.TblCountry"."Sys_SID"
Ref: "SchMaster.TblCitizenIdentity"."BirthPlace_RefID" > "SchMaster.TblCountryAdministrativeAreaLevel1"."Sys_PID"
Ref: "SchMaster.TblCitizenIdentity"."BirthPlace_RefID" > "SchMaster.TblCountryAdministrativeAreaLevel1"."Sys_SID"
Ref: "SchMaster.TblCitizenIdentity"."BirthPlace_RefID" > "SchMaster.TblCountryAdministrativeAreaLevel2"."Sys_PID"
Ref: "SchMaster.TblCitizenIdentity"."BirthPlace_RefID" > "SchMaster.TblCountryAdministrativeAreaLevel2"."Sys_SID"
Ref: "SchMaster.TblCitizenIdentity"."BirthPlace_RefID" > "SchMaster.TblCountryAdministrativeAreaLevel3"."Sys_PID"
Ref: "SchMaster.TblCitizenIdentity"."BirthPlace_RefID" > "SchMaster.TblCountryAdministrativeAreaLevel3"."Sys_SID"
Ref: "SchMaster.TblCitizenIdentity"."BirthPlace_RefID" > "SchMaster.TblCountryAdministrativeAreaLevel4"."Sys_PID"
Ref: "SchMaster.TblCitizenIdentity"."BirthPlace_RefID" > "SchMaster.TblCountryAdministrativeAreaLevel4"."Sys_SID"
Ref: "SchMaster.TblCitizenIdentity"."Religion_RefID" > "SchMaster.TblReligion"."Sys_PID"
Ref: "SchMaster.TblCitizenIdentity"."Religion_RefID" > "SchMaster.TblReligion"."Sys_SID"



TABLE "SchMaster.TblCitizenIdentityCard"
    {
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" bigint [pk]
    "Sys_Data_Annotation" varchar(1024)
    "Sys_Data_Entry_LoginSession_RefID" bigint
    "Sys_Data_Entry_DateTimeTZ" timestamptz
    "Sys_Data_Edit_LoginSession_RefID" bigint
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
    "CitizenIdentity_RefID" bigint
    "BloodAglutinogenType_RefID" bigint
    "AddressCountryAdministrativeAreaLevel1_RefID" bigint
    "AddressCountryAdministrativeAreaLevel2_RefID" bigint
    "AddressCountryAdministrativeAreaLevel3_RefID" bigint
    "AddressCountryAdministrativeAreaLevel4_RefID" bigint
    "Address" varchar(128)
    }
Ref: "SchMaster.TblCitizenIdentityCard"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblCitizenIdentityCard"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblCitizenIdentityCard"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblCitizenIdentityCard"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblCitizenIdentityCard"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblCitizenIdentityCard"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblCitizenIdentityCard"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblCitizenIdentityCard"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblCitizenIdentityCard"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblCitizenIdentityCard"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblCitizenIdentityCard"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchMaster.TblCitizenIdentityCard"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchMaster.TblCitizenIdentityCard"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchMaster.TblCitizenIdentityCard"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchMaster.TblCitizenIdentityCard"."CitizenIdentity_RefID" > "SchMaster.TblCitizenIdentity"."Sys_PID"
Ref: "SchMaster.TblCitizenIdentityCard"."CitizenIdentity_RefID" > "SchMaster.TblCitizenIdentity"."Sys_SID"
Ref: "SchMaster.TblCitizenIdentityCard"."BloodAglutinogenType_RefID" > "SchMaster.TblBloodAglutinogenType"."Sys_PID"
Ref: "SchMaster.TblCitizenIdentityCard"."BloodAglutinogenType_RefID" > "SchMaster.TblBloodAglutinogenType"."Sys_SID"
Ref: "SchMaster.TblCitizenIdentityCard"."AddressCountryAdministrativeAreaLevel1_RefID" > "SchMaster.TblCountryAdministrativeAreaLevel1"."Sys_PID"
Ref: "SchMaster.TblCitizenIdentityCard"."AddressCountryAdministrativeAreaLevel1_RefID" > "SchMaster.TblCountryAdministrativeAreaLevel1"."Sys_SID"
Ref: "SchMaster.TblCitizenIdentityCard"."AddressCountryAdministrativeAreaLevel2_RefID" > "SchMaster.TblCountryAdministrativeAreaLevel2"."Sys_PID"
Ref: "SchMaster.TblCitizenIdentityCard"."AddressCountryAdministrativeAreaLevel2_RefID" > "SchMaster.TblCountryAdministrativeAreaLevel2"."Sys_SID"
Ref: "SchMaster.TblCitizenIdentityCard"."AddressCountryAdministrativeAreaLevel3_RefID" > "SchMaster.TblCountryAdministrativeAreaLevel3"."Sys_PID"
Ref: "SchMaster.TblCitizenIdentityCard"."AddressCountryAdministrativeAreaLevel3_RefID" > "SchMaster.TblCountryAdministrativeAreaLevel3"."Sys_SID"
Ref: "SchMaster.TblCitizenIdentityCard"."AddressCountryAdministrativeAreaLevel4_RefID" > "SchMaster.TblCountryAdministrativeAreaLevel4"."Sys_PID"
Ref: "SchMaster.TblCitizenIdentityCard"."AddressCountryAdministrativeAreaLevel4_RefID" > "SchMaster.TblCountryAdministrativeAreaLevel4"."Sys_SID"



TABLE "SchMaster.TblCountry"
    {
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" bigint [pk]
    "Sys_Data_Annotation" varchar(1024)
    "Sys_Data_Entry_LoginSession_RefID" bigint
    "Sys_Data_Entry_DateTimeTZ" timestamptz
    "Sys_Data_Edit_LoginSession_RefID" bigint
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
    "InternationalName" varchar(256)
    "IndonesianName" varchar(256)
    }
Ref: "SchMaster.TblCountry"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblCountry"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblCountry"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblCountry"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblCountry"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblCountry"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblCountry"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblCountry"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblCountry"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblCountry"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblCountry"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchMaster.TblCountry"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchMaster.TblCountry"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchMaster.TblCountry"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"



TABLE "SchMaster.TblCountryAdministrativeAreaLevel1"
    {
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" bigint [pk]
    "Sys_Data_Annotation" varchar(1024)
    "Sys_Data_Entry_LoginSession_RefID" bigint
    "Sys_Data_Entry_DateTimeTZ" timestamptz
    "Sys_Data_Edit_LoginSession_RefID" bigint
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
    "Country_RefID" bigint
    "Name" varchar(256)
    }
Ref: "SchMaster.TblCountryAdministrativeAreaLevel1"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblCountryAdministrativeAreaLevel1"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblCountryAdministrativeAreaLevel1"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblCountryAdministrativeAreaLevel1"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblCountryAdministrativeAreaLevel1"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblCountryAdministrativeAreaLevel1"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblCountryAdministrativeAreaLevel1"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblCountryAdministrativeAreaLevel1"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblCountryAdministrativeAreaLevel1"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblCountryAdministrativeAreaLevel1"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblCountryAdministrativeAreaLevel1"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchMaster.TblCountryAdministrativeAreaLevel1"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchMaster.TblCountryAdministrativeAreaLevel1"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchMaster.TblCountryAdministrativeAreaLevel1"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchMaster.TblCountryAdministrativeAreaLevel1"."Country_RefID" > "SchMaster.TblCountry"."Sys_PID"
Ref: "SchMaster.TblCountryAdministrativeAreaLevel1"."Country_RefID" > "SchMaster.TblCountry"."Sys_SID"



TABLE "SchMaster.TblCountryAdministrativeAreaLevel2"
    {
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" bigint [pk]
    "Sys_Data_Annotation" varchar(1024)
    "Sys_Data_Entry_LoginSession_RefID" bigint
    "Sys_Data_Entry_DateTimeTZ" timestamptz
    "Sys_Data_Edit_LoginSession_RefID" bigint
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
    "CountryAdministrativeAreaLevel1_RefID" bigint
    "Name" varchar(256)
    }
Ref: "SchMaster.TblCountryAdministrativeAreaLevel2"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblCountryAdministrativeAreaLevel2"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblCountryAdministrativeAreaLevel2"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblCountryAdministrativeAreaLevel2"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblCountryAdministrativeAreaLevel2"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblCountryAdministrativeAreaLevel2"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblCountryAdministrativeAreaLevel2"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblCountryAdministrativeAreaLevel2"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblCountryAdministrativeAreaLevel2"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblCountryAdministrativeAreaLevel2"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblCountryAdministrativeAreaLevel2"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchMaster.TblCountryAdministrativeAreaLevel2"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchMaster.TblCountryAdministrativeAreaLevel2"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchMaster.TblCountryAdministrativeAreaLevel2"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchMaster.TblCountryAdministrativeAreaLevel2"."CountryAdministrativeAreaLevel1_RefID" > "SchMaster.TblCountryAdministrativeAreaLevel1"."Sys_PID"
Ref: "SchMaster.TblCountryAdministrativeAreaLevel2"."CountryAdministrativeAreaLevel1_RefID" > "SchMaster.TblCountryAdministrativeAreaLevel1"."Sys_SID"



TABLE "SchMaster.TblCountryAdministrativeAreaLevel3"
    {
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" bigint [pk]
    "Sys_Data_Annotation" varchar(1024)
    "Sys_Data_Entry_LoginSession_RefID" bigint
    "Sys_Data_Entry_DateTimeTZ" timestamptz
    "Sys_Data_Edit_LoginSession_RefID" bigint
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
    "CountryAdministrativeAreaLevel2_RefID" bigint
    "Name" varchar(256)
    }
Ref: "SchMaster.TblCountryAdministrativeAreaLevel3"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblCountryAdministrativeAreaLevel3"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblCountryAdministrativeAreaLevel3"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblCountryAdministrativeAreaLevel3"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblCountryAdministrativeAreaLevel3"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblCountryAdministrativeAreaLevel3"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblCountryAdministrativeAreaLevel3"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblCountryAdministrativeAreaLevel3"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblCountryAdministrativeAreaLevel3"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblCountryAdministrativeAreaLevel3"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblCountryAdministrativeAreaLevel3"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchMaster.TblCountryAdministrativeAreaLevel3"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchMaster.TblCountryAdministrativeAreaLevel3"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchMaster.TblCountryAdministrativeAreaLevel3"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchMaster.TblCountryAdministrativeAreaLevel3"."CountryAdministrativeAreaLevel2_RefID" > "SchMaster.TblCountryAdministrativeAreaLevel2"."Sys_PID"
Ref: "SchMaster.TblCountryAdministrativeAreaLevel3"."CountryAdministrativeAreaLevel2_RefID" > "SchMaster.TblCountryAdministrativeAreaLevel2"."Sys_SID"



TABLE "SchMaster.TblCountryAdministrativeAreaLevel4"
    {
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" bigint [pk]
    "Sys_Data_Annotation" varchar(1024)
    "Sys_Data_Entry_LoginSession_RefID" bigint
    "Sys_Data_Entry_DateTimeTZ" timestamptz
    "Sys_Data_Edit_LoginSession_RefID" bigint
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
    "CountryAdministrativeAreaLevel3_RefID" bigint
    "Name" varchar(256)
    }
Ref: "SchMaster.TblCountryAdministrativeAreaLevel4"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblCountryAdministrativeAreaLevel4"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblCountryAdministrativeAreaLevel4"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblCountryAdministrativeAreaLevel4"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblCountryAdministrativeAreaLevel4"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblCountryAdministrativeAreaLevel4"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblCountryAdministrativeAreaLevel4"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblCountryAdministrativeAreaLevel4"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblCountryAdministrativeAreaLevel4"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblCountryAdministrativeAreaLevel4"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblCountryAdministrativeAreaLevel4"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchMaster.TblCountryAdministrativeAreaLevel4"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchMaster.TblCountryAdministrativeAreaLevel4"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchMaster.TblCountryAdministrativeAreaLevel4"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"



TABLE "SchMaster.TblCurrency"
    {
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" bigint [pk]
    "Sys_Data_Annotation" varchar(1024)
    "Sys_Data_Entry_LoginSession_RefID" bigint
    "Sys_Data_Entry_DateTimeTZ" timestamptz
    "Sys_Data_Edit_LoginSession_RefID" bigint
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
    "ISOCode" varchar(3)
    "Name" varchar(128)
    "Symbol" varchar(2)
    }
Ref: "SchMaster.TblCurrency"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblCurrency"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblCurrency"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblCurrency"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblCurrency"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblCurrency"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblCurrency"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblCurrency"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblCurrency"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblCurrency"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblCurrency"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchMaster.TblCurrency"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchMaster.TblCurrency"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchMaster.TblCurrency"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"



TABLE "SchMaster.TblCurrencyExchangeRateCentralBank"
    {
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" bigint [pk]
    "Sys_Data_Annotation" varchar(1024)
    "Sys_Data_Entry_LoginSession_RefID" bigint
    "Sys_Data_Entry_DateTimeTZ" timestamptz
    "Sys_Data_Edit_LoginSession_RefID" bigint
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
    "SignDataAuthentication" boolean
    "Currency_RefID" bigint
    "ExchangeRateBuy" numeric(202)
    "ExchangeRateSell" numeric(202)
    "ValidStartDateTimeTZ" timestamptz
    "ValidFinishDateTimeTZ" timestamptz
    }
Ref: "SchMaster.TblCurrencyExchangeRateCentralBank"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblCurrencyExchangeRateCentralBank"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblCurrencyExchangeRateCentralBank"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblCurrencyExchangeRateCentralBank"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblCurrencyExchangeRateCentralBank"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblCurrencyExchangeRateCentralBank"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblCurrencyExchangeRateCentralBank"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblCurrencyExchangeRateCentralBank"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblCurrencyExchangeRateCentralBank"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblCurrencyExchangeRateCentralBank"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblCurrencyExchangeRateCentralBank"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchMaster.TblCurrencyExchangeRateCentralBank"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchMaster.TblCurrencyExchangeRateCentralBank"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchMaster.TblCurrencyExchangeRateCentralBank"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchMaster.TblCurrencyExchangeRateCentralBank"."Currency_RefID" > "SchMaster.TblCurrency"."Sys_PID"
Ref: "SchMaster.TblCurrencyExchangeRateCentralBank"."Currency_RefID" > "SchMaster.TblCurrency"."Sys_SID"



TABLE "SchMaster.TblCurrencyExchangeRateTax"
    {
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" bigint [pk]
    "Sys_Data_Annotation" varchar(1024)
    "Sys_Data_Entry_LoginSession_RefID" bigint
    "Sys_Data_Entry_DateTimeTZ" timestamptz
    "Sys_Data_Edit_LoginSession_RefID" bigint
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
    "SignDataAuthentication" boolean
    "Currency_RefID" bigint
    "ExchangeRate" numeric(202)
    "ValidStartDateTimeTZ" timestamptz
    "ValidFinishDateTimeTZ" timestamptz
    }
Ref: "SchMaster.TblCurrencyExchangeRateTax"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblCurrencyExchangeRateTax"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblCurrencyExchangeRateTax"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblCurrencyExchangeRateTax"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblCurrencyExchangeRateTax"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblCurrencyExchangeRateTax"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblCurrencyExchangeRateTax"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblCurrencyExchangeRateTax"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblCurrencyExchangeRateTax"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblCurrencyExchangeRateTax"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblCurrencyExchangeRateTax"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchMaster.TblCurrencyExchangeRateTax"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchMaster.TblCurrencyExchangeRateTax"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchMaster.TblCurrencyExchangeRateTax"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchMaster.TblCurrencyExchangeRateTax"."Currency_RefID" > "SchMaster.TblCurrency"."Sys_PID"
Ref: "SchMaster.TblCurrencyExchangeRateTax"."Currency_RefID" > "SchMaster.TblCurrency"."Sys_SID"



TABLE "SchMaster.TblDayOffGovernmentPolicy"
    {
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" bigint [pk]
    "Sys_Data_Annotation" varchar(1024)
    "Sys_Data_Entry_LoginSession_RefID" bigint
    "Sys_Data_Entry_DateTimeTZ" timestamptz
    "Sys_Data_Edit_LoginSession_RefID" bigint
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
    "Country_RefID" bigint
    "Name" varchar(256)
    "ValidStartDate" date
    "ValidFinishDate" date
    }
Ref: "SchMaster.TblDayOffGovernmentPolicy"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblDayOffGovernmentPolicy"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblDayOffGovernmentPolicy"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblDayOffGovernmentPolicy"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblDayOffGovernmentPolicy"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblDayOffGovernmentPolicy"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblDayOffGovernmentPolicy"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblDayOffGovernmentPolicy"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblDayOffGovernmentPolicy"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblDayOffGovernmentPolicy"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblDayOffGovernmentPolicy"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchMaster.TblDayOffGovernmentPolicy"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchMaster.TblDayOffGovernmentPolicy"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchMaster.TblDayOffGovernmentPolicy"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchMaster.TblDayOffGovernmentPolicy"."Country_RefID" > "SchMaster.TblCountry"."Sys_PID"
Ref: "SchMaster.TblDayOffGovernmentPolicy"."Country_RefID" > "SchMaster.TblCountry"."Sys_SID"



TABLE "SchMaster.TblDayOffNational"
    {
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" bigint [pk]
    "Sys_Data_Annotation" varchar(1024)
    "Sys_Data_Entry_LoginSession_RefID" bigint
    "Sys_Data_Entry_DateTimeTZ" timestamptz
    "Sys_Data_Edit_LoginSession_RefID" bigint
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
    "Country_RefID" bigint
    "Name" varchar(256)
    "ValidStartDate" date
    "ValidFinishDate" date
    }
Ref: "SchMaster.TblDayOffNational"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblDayOffNational"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblDayOffNational"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblDayOffNational"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblDayOffNational"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblDayOffNational"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblDayOffNational"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblDayOffNational"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblDayOffNational"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblDayOffNational"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblDayOffNational"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchMaster.TblDayOffNational"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchMaster.TblDayOffNational"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchMaster.TblDayOffNational"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchMaster.TblDayOffNational"."Country_RefID" > "SchMaster.TblCountry"."Sys_PID"
Ref: "SchMaster.TblDayOffNational"."Country_RefID" > "SchMaster.TblCountry"."Sys_SID"



TABLE "SchMaster.TblDayOffRegional"
    {
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" bigint [pk]
    "Sys_Data_Annotation" varchar(1024)
    "Sys_Data_Entry_LoginSession_RefID" bigint
    "Sys_Data_Entry_DateTimeTZ" timestamptz
    "Sys_Data_Edit_LoginSession_RefID" bigint
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
    "Regional_RefID" bigint
    "Name" varchar(256)
    "ValidStartDate" date
    "ValidFinishDate" date
    }
Ref: "SchMaster.TblDayOffRegional"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblDayOffRegional"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblDayOffRegional"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblDayOffRegional"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblDayOffRegional"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblDayOffRegional"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblDayOffRegional"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblDayOffRegional"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblDayOffRegional"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblDayOffRegional"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblDayOffRegional"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchMaster.TblDayOffRegional"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchMaster.TblDayOffRegional"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchMaster.TblDayOffRegional"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchMaster.TblDayOffRegional"."Regional_RefID" > "SchMaster.TblCountryAdministrativeAreaLevel1"."Sys_PID"
Ref: "SchMaster.TblDayOffRegional"."Regional_RefID" > "SchMaster.TblCountryAdministrativeAreaLevel1"."Sys_SID"



TABLE "SchMaster.TblGoodsModel"
    {
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" bigint [pk]
    "Sys_Data_Annotation" varchar(1024)
    "Sys_Data_Entry_LoginSession_RefID" bigint
    "Sys_Data_Entry_DateTimeTZ" timestamptz
    "Sys_Data_Edit_LoginSession_RefID" bigint
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
    "TradeMark_RefID" bigint
    "GoodsType_RefID" bigint
    "ModelName" varchar(256)
    "ModelNumber" varchar(256)
    }
Ref: "SchMaster.TblGoodsModel"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblGoodsModel"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblGoodsModel"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblGoodsModel"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblGoodsModel"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblGoodsModel"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblGoodsModel"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblGoodsModel"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblGoodsModel"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblGoodsModel"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblGoodsModel"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchMaster.TblGoodsModel"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchMaster.TblGoodsModel"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchMaster.TblGoodsModel"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchMaster.TblGoodsModel"."TradeMark_RefID" > "SchMaster.TblTradeMark"."Sys_PID"
Ref: "SchMaster.TblGoodsModel"."TradeMark_RefID" > "SchMaster.TblTradeMark"."Sys_SID"
Ref: "SchMaster.TblGoodsModel"."GoodsType_RefID" > "SchMaster.TblGoodsType"."Sys_PID"
Ref: "SchMaster.TblGoodsModel"."GoodsType_RefID" > "SchMaster.TblGoodsType"."Sys_SID"



TABLE "SchMaster.TblGoodsType"
    {
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" bigint [pk]
    "Sys_Data_Annotation" varchar(1024)
    "Sys_Data_Entry_LoginSession_RefID" bigint
    "Sys_Data_Entry_DateTimeTZ" timestamptz
    "Sys_Data_Edit_LoginSession_RefID" bigint
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
    "Name" varchar(256)
    }
Ref: "SchMaster.TblGoodsType"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblGoodsType"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblGoodsType"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblGoodsType"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblGoodsType"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblGoodsType"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblGoodsType"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblGoodsType"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblGoodsType"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblGoodsType"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblGoodsType"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchMaster.TblGoodsType"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchMaster.TblGoodsType"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchMaster.TblGoodsType"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"



TABLE "SchMaster.TblPerson"
    {
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" bigint [pk]
    "Sys_Data_Annotation" varchar(1024)
    "Sys_Data_Entry_LoginSession_RefID" bigint
    "Sys_Data_Entry_DateTimeTZ" timestamptz
    "Sys_Data_Edit_LoginSession_RefID" bigint
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
    "Name" varchar(256)
    "Photo_RefID" bigint
    }
Ref: "SchMaster.TblPerson"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblPerson"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblPerson"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblPerson"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblPerson"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblPerson"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblPerson"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblPerson"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblPerson"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblPerson"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblPerson"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchMaster.TblPerson"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchMaster.TblPerson"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchMaster.TblPerson"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"



TABLE "SchMaster.TblPersonAccountEMail"
    {
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" bigint [pk]
    "Sys_Data_Annotation" varchar(1024)
    "Sys_Data_Entry_LoginSession_RefID" bigint
    "Sys_Data_Entry_DateTimeTZ" timestamptz
    "Sys_Data_Edit_LoginSession_RefID" bigint
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
    "Person_RefID" bigint
    "Account" varchar(256)
    }
Ref: "SchMaster.TblPersonAccountEMail"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblPersonAccountEMail"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblPersonAccountEMail"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblPersonAccountEMail"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblPersonAccountEMail"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblPersonAccountEMail"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblPersonAccountEMail"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblPersonAccountEMail"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblPersonAccountEMail"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblPersonAccountEMail"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblPersonAccountEMail"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchMaster.TblPersonAccountEMail"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchMaster.TblPersonAccountEMail"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchMaster.TblPersonAccountEMail"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchMaster.TblPersonAccountEMail"."Person_RefID" > "SchMaster.TblPerson"."Sys_PID"
Ref: "SchMaster.TblPersonAccountEMail"."Person_RefID" > "SchMaster.TblPerson"."Sys_SID"



TABLE "SchMaster.TblPersonAccountSocialMedia"
    {
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" bigint [pk]
    "Sys_Data_Annotation" varchar(1024)
    "Sys_Data_Entry_LoginSession_RefID" bigint
    "Sys_Data_Entry_DateTimeTZ" timestamptz
    "Sys_Data_Edit_LoginSession_RefID" bigint
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
    "Person_RefID" bigint
    "SocialMedia_RefID" bigint
    "AccountLink" varchar(256)
    }
Ref: "SchMaster.TblPersonAccountSocialMedia"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblPersonAccountSocialMedia"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblPersonAccountSocialMedia"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblPersonAccountSocialMedia"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblPersonAccountSocialMedia"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblPersonAccountSocialMedia"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblPersonAccountSocialMedia"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblPersonAccountSocialMedia"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblPersonAccountSocialMedia"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblPersonAccountSocialMedia"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblPersonAccountSocialMedia"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchMaster.TblPersonAccountSocialMedia"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchMaster.TblPersonAccountSocialMedia"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchMaster.TblPersonAccountSocialMedia"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchMaster.TblPersonAccountSocialMedia"."Person_RefID" > "SchMaster.TblPerson"."Sys_PID"
Ref: "SchMaster.TblPersonAccountSocialMedia"."Person_RefID" > "SchMaster.TblPerson"."Sys_SID"
Ref: "SchMaster.TblPersonAccountSocialMedia"."SocialMedia_RefID" > "SchMaster.TblSocialMedia"."Sys_PID"
Ref: "SchMaster.TblPersonAccountSocialMedia"."SocialMedia_RefID" > "SchMaster.TblSocialMedia"."Sys_SID"



TABLE "SchMaster.TblPersonGender"
    {
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" bigint [pk]
    "Sys_Data_Annotation" varchar(1024)
    "Sys_Data_Entry_LoginSession_RefID" bigint
    "Sys_Data_Entry_DateTimeTZ" timestamptz
    "Sys_Data_Edit_LoginSession_RefID" bigint
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
    "Name" varchar(256)
    }
Ref: "SchMaster.TblPersonGender"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblPersonGender"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblPersonGender"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblPersonGender"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblPersonGender"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblPersonGender"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblPersonGender"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblPersonGender"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblPersonGender"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblPersonGender"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblPersonGender"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchMaster.TblPersonGender"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchMaster.TblPersonGender"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchMaster.TblPersonGender"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"



TABLE "SchMaster.TblProduct"
    {
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" bigint [pk]
    "Sys_Data_Annotation" varchar(1024)
    "Sys_Data_Entry_LoginSession_RefID" bigint
    "Sys_Data_Entry_DateTimeTZ" timestamptz
    "Sys_Data_Edit_LoginSession_RefID" bigint
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
    "Code" varchar(32)
    "Name" varchar(256)
    "ProductType_RefID" bigint
    "QuantityUnit_RefID" bigint
    }
Ref: "SchMaster.TblProduct"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblProduct"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblProduct"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblProduct"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblProduct"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblProduct"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblProduct"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblProduct"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblProduct"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblProduct"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblProduct"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchMaster.TblProduct"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchMaster.TblProduct"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchMaster.TblProduct"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchMaster.TblProduct"."ProductType_RefID" > "SchMaster.TblProductType"."Sys_PID"
Ref: "SchMaster.TblProduct"."ProductType_RefID" > "SchMaster.TblProductType"."Sys_SID"
Ref: "SchMaster.TblProduct"."QuantityUnit_RefID" > "SchMaster.TblQuantityUnit"."Sys_PID"
Ref: "SchMaster.TblProduct"."QuantityUnit_RefID" > "SchMaster.TblQuantityUnit"."Sys_SID"



TABLE "SchMaster.TblProductType"
    {
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" bigint [pk]
    "Sys_Data_Annotation" varchar(1024)
    "Sys_Data_Entry_LoginSession_RefID" bigint
    "Sys_Data_Entry_DateTimeTZ" timestamptz
    "Sys_Data_Edit_LoginSession_RefID" bigint
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
    "Name" varchar(256)
    }
Ref: "SchMaster.TblProductType"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblProductType"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblProductType"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblProductType"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblProductType"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblProductType"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblProductType"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblProductType"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblProductType"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblProductType"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblProductType"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchMaster.TblProductType"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchMaster.TblProductType"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchMaster.TblProductType"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"



TABLE "SchMaster.TblQuantityUnit"
    {
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" bigint [pk]
    "Sys_Data_Annotation" varchar(1024)
    "Sys_Data_Entry_LoginSession_RefID" bigint
    "Sys_Data_Entry_DateTimeTZ" timestamptz
    "Sys_Data_Edit_LoginSession_RefID" bigint
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
    "Name" varchar(256)
    }
Ref: "SchMaster.TblQuantityUnit"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblQuantityUnit"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblQuantityUnit"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblQuantityUnit"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblQuantityUnit"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblQuantityUnit"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblQuantityUnit"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblQuantityUnit"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblQuantityUnit"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblQuantityUnit"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblQuantityUnit"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchMaster.TblQuantityUnit"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchMaster.TblQuantityUnit"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchMaster.TblQuantityUnit"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"



TABLE "SchMaster.TblReligion"
    {
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" bigint [pk]
    "Sys_Data_Annotation" varchar(1024)
    "Sys_Data_Entry_LoginSession_RefID" bigint
    "Sys_Data_Entry_DateTimeTZ" timestamptz
    "Sys_Data_Edit_LoginSession_RefID" bigint
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
    "Name" varchar(64)
    }
Ref: "SchMaster.TblReligion"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblReligion"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblReligion"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblReligion"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblReligion"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblReligion"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblReligion"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblReligion"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblReligion"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblReligion"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblReligion"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchMaster.TblReligion"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchMaster.TblReligion"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchMaster.TblReligion"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"



TABLE "SchMaster.TblSocialMedia"
    {
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" [pk]
    "Sys_Data_Annotation" varchar(1024)
    "Sys_Data_Entry_LoginSession_RefID" bigint
    "Sys_Data_Entry_DateTimeTZ" timestamptz
    "Sys_Data_Edit_LoginSession_RefID" bigint
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
    "Name" varchar(256)
    "Website" varchar(256)
    } 
Ref: "SchMaster.TblSocialMedia"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblSocialMedia"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblSocialMedia"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblSocialMedia"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblSocialMedia"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblSocialMedia"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblSocialMedia"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblSocialMedia"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblSocialMedia"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblSocialMedia"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblSocialMedia"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchMaster.TblSocialMedia"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchMaster.TblSocialMedia"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchMaster.TblSocialMedia"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"



TABLE "SchMaster.TblTradeMark"
    {
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" bigint [pk]
    "Sys_Data_Annotation" varchar(1024)
    "Sys_Data_Entry_LoginSession_RefID" bigint
    "Sys_Data_Entry_DateTimeTZ" timestamptz
    "Sys_Data_Edit_LoginSession_RefID" bigint
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
    "Name" varchar(256)
    }
Ref: "SchMaster.TblTradeMark"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblTradeMark"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblTradeMark"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblTradeMark"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblTradeMark"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblTradeMark"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblTradeMark"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblTradeMark"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblTradeMark"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblTradeMark"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblTradeMark"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchMaster.TblTradeMark"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchMaster.TblTradeMark"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchMaster.TblTradeMark"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"



TABLE "SchProject.TblProject"
    {
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" bigint [pk]
    "Sys_Data_Annotation" varchar(1024)
    "Sys_Data_Entry_LoginSession_RefID" bigint
    "Sys_Data_Entry_DateTimeTZ" timestamptz
    "Sys_Data_Edit_LoginSession_RefID" bigint
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
    "SignDataAuthentication" boolean
    "Code" varchar(32)
    "Name" varchar(256)
    "ValidStartDate" date
    "ValidFinishDate" date
    "Customer_RefID" bigint
    }
Ref: "SchProject.TblProject"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchProject.TblProject"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchProject.TblProject"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchProject.TblProject"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchProject.TblProject"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchProject.TblProject"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchProject.TblProject"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchProject.TblProject"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchProject.TblProject"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchProject.TblProject"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchProject.TblProject"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchProject.TblProject"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchProject.TblProject"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchProject.TblProject"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"



TABLE "SchProject.TblProjectSection"
    {
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" bigint [pk]
    "Sys_Data_Annotation" varchar(1024)
    "Sys_Data_Entry_LoginSession_RefID" bigint
    "Sys_Data_Entry_DateTimeTZ" timestamptz
    "Sys_Data_Edit_LoginSession_RefID" bigint
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
    "SignDataAuthentication" boolean
    "Project_RefID" bigint
    "Name" varchar(256)
    }
Ref: "SchProject.TblProjectSection"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchProject.TblProjectSection"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchProject.TblProjectSection"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchProject.TblProjectSection"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchProject.TblProjectSection"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchProject.TblProjectSection"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchProject.TblProjectSection"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchProject.TblProjectSection"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchProject.TblProjectSection"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchProject.TblProjectSection"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchProject.TblProjectSection"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchProject.TblProjectSection"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchProject.TblProjectSection"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchProject.TblProjectSection"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchProject.TblProjectSection"."Project_RefID" > "SchProject.TblProject"."Sys_PID"
Ref: "SchProject.TblProjectSection"."Project_RefID" > "SchProject.TblProject"."Sys_SID"



 TABLE "SchAccounting.TblCodeOfAccounting"
    {
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" bigint [pk]
    "Sys_Data_Annotation" varchar(1024)
    "Sys_Data_Entry_LoginSession_RefID" bigint
    "Sys_Data_Entry_DateTimeTZ" timestamptz
    "Sys_Data_Edit_LoginSession_RefID" bigint
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
    "Code" varchar(20)
    "Name" varchar(128)
    "Currency_RefID" bigint
    "ValidStartDateTime" timestamp
    "ValidFinishDateTime" timestamp
    }
Ref: "SchAccounting.TblCodeOfAccounting"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchAccounting.TblCodeOfAccounting"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchAccounting.TblCodeOfAccounting"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchAccounting.TblCodeOfAccounting"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchAccounting.TblCodeOfAccounting"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchAccounting.TblCodeOfAccounting"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchAccounting.TblCodeOfAccounting"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchAccounting.TblCodeOfAccounting"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchAccounting.TblCodeOfAccounting"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchAccounting.TblCodeOfAccounting"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchAccounting.TblCodeOfAccounting"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchAccounting.TblCodeOfAccounting"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchAccounting.TblCodeOfAccounting"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchAccounting.TblCodeOfAccounting"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchAccounting.TblCodeOfAccounting"."Currency_RefID" > "SchMaster.TblCurrency"."Sys_PID"
Ref: "SchAccounting.TblCodeOfAccounting"."Currency_RefID" > "SchMaster.TblCurrency"."Sys_SID"



TABLE "SchBudgeting.TblBudget"
    {
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" bigint [pk]
    "Sys_Data_Annotation" varchar(1024)
    "Sys_Data_Entry_LoginSession_RefID" bigint
    "Sys_Data_Entry_DateTimeTZ" timestamptz
    "Sys_Data_Edit_LoginSession_RefID" bigint
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
    "BusinessDocumentVersion_RefID" bigint
    "BudgetType_RefID" bigint
    "Project_RefID" bigint
    "Name" varchar(256)
    "RequesterPerson_RefID" bigint
    }
Ref: "SchBudgeting.TblBudget"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchBudgeting.TblBudget"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchBudgeting.TblBudget"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchBudgeting.TblBudget"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchBudgeting.TblBudget"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchBudgeting.TblBudget"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchBudgeting.TblBudget"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchBudgeting.TblBudget"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchBudgeting.TblBudget"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchBudgeting.TblBudget"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchBudgeting.TblBudget"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchBudgeting.TblBudget"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchBudgeting.TblBudget"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchBudgeting.TblBudget"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchBudgeting.TblBudget"."BusinessDocumentVersion_RefID" > "SchMaster.TblBusinessDocumentVersion"."Sys_PID"
Ref: "SchBudgeting.TblBudget"."BusinessDocumentVersion_RefID" > "SchMaster.TblBusinessDocumentVersion"."Sys_SID"
Ref: "SchBudgeting.TblBudget"."BudgetType_RefID" > "SchBudgeting.TblBudgetType"."Sys_PID"
Ref: "SchBudgeting.TblBudget"."BudgetType_RefID" > "SchBudgeting.TblBudgetType"."Sys_SID"
Ref: "SchBudgeting.TblBudget"."Project_RefID" > "SchProject.TblProject"."Sys_PID"
Ref: "SchBudgeting.TblBudget"."Project_RefID" > "SchProject.TblProject"."Sys_SID"
Ref: "SchBudgeting.TblBudget"."RequesterPerson_RefID" > "SchMaster.TblPerson"."Sys_PID"
Ref: "SchBudgeting.TblBudget"."RequesterPerson_RefID" > "SchMaster.TblPerson"."Sys_SID"



TABLE "SchBudgeting.TblBudgetCeiling"
    {
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" bigint [pk]
    "Sys_Data_Annotation" varchar(1024)
    "Sys_Data_Entry_LoginSession_RefID" bigint
    "Sys_Data_Entry_DateTimeTZ" timestamptz
    "Sys_Data_Edit_LoginSession_RefID" bigint
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
    "BudgetLine_RefID" bigint
    "DateTimeTZStart" timestamptz
    "DateTimeTZFinish" timestamptz
    "Currency_RefID" bigint
    "CurrencyExchangeRate" numeric(202)
    "CurrencyValue" numeric(202)
    "BaseCurrencyValue" numeric(202)
    }
Ref: "SchBudgeting.TblBudgetCeiling"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchBudgeting.TblBudgetCeiling"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchBudgeting.TblBudgetCeiling"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchBudgeting.TblBudgetCeiling"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchBudgeting.TblBudgetCeiling"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchBudgeting.TblBudgetCeiling"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchBudgeting.TblBudgetCeiling"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchBudgeting.TblBudgetCeiling"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchBudgeting.TblBudgetCeiling"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchBudgeting.TblBudgetCeiling"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchBudgeting.TblBudgetCeiling"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchBudgeting.TblBudgetCeiling"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchBudgeting.TblBudgetCeiling"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchBudgeting.TblBudgetCeiling"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchBudgeting.TblBudgetCeiling"."BudgetLine_RefID" > "SchBudgeting.TblBudgetLine"."Sys_PID"
Ref: "SchBudgeting.TblBudgetCeiling"."BudgetLine_RefID" > "SchBudgeting.TblBudgetLine"."Sys_SID"
Ref: "SchBudgeting.TblBudgetCeiling"."Currency_RefID" > "SchMaster.TblCurrency"."Sys_PID"
Ref: "SchBudgeting.TblBudgetCeiling"."Currency_RefID" > "SchMaster.TblCurrency"."Sys_SID"



TABLE "SchBudgeting.TblBudgetCeilingObjects"
    {
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" bigint [pk]
    "Sys_Data_Annotation" varchar(1024)
    "Sys_Data_Entry_LoginSession_RefID" bigint
    "Sys_Data_Entry_DateTimeTZ" timestamptz
    "Sys_Data_Edit_LoginSession_RefID" bigint
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
    "BudgetCeiling_RefID" bigint
    "Product_RefID" bigint
    "Quantity" numeric(202)
    "QuantityUnit_RefID" bigint
    "ProductUnitPriceCurrency_RefID" bigint
    "ProductUnitPriceCurrencyExchangeRate" numeric(202)
    "ProductUnitPriceCurrencyValue" numeric(202)
    "ProductUnitPriceBaseCurrencyValue" numeric(202)
    }
Ref: "SchBudgeting.TblBudgetCeilingObjects"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchBudgeting.TblBudgetCeilingObjects"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchBudgeting.TblBudgetCeilingObjects"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchBudgeting.TblBudgetCeilingObjects"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchBudgeting.TblBudgetCeilingObjects"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchBudgeting.TblBudgetCeilingObjects"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchBudgeting.TblBudgetCeilingObjects"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchBudgeting.TblBudgetCeilingObjects"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchBudgeting.TblBudgetCeilingObjects"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchBudgeting.TblBudgetCeilingObjects"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchBudgeting.TblBudgetCeilingObjects"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchBudgeting.TblBudgetCeilingObjects"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchBudgeting.TblBudgetCeilingObjects"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchBudgeting.TblBudgetCeilingObjects"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchBudgeting.TblBudgetCeilingObjects"."BudgetCeiling_RefID" > "SchBudgeting.TblBudgetCeiling"."Sys_PID"
Ref: "SchBudgeting.TblBudgetCeilingObjects"."BudgetCeiling_RefID" > "SchBudgeting.TblBudgetCeiling"."Sys_SID"
Ref: "SchBudgeting.TblBudgetCeilingObjects"."Product_RefID" > "SchMaster.TblProduct"."Sys_PID"
Ref: "SchBudgeting.TblBudgetCeilingObjects"."Product_RefID" > "SchMaster.TblProduct"."Sys_SID"
Ref: "SchBudgeting.TblBudgetCeilingObjects"."QuantityUnit_RefID" > "SchMaster.TblQuantityUnit"."Sys_PID"
Ref: "SchBudgeting.TblBudgetCeilingObjects"."QuantityUnit_RefID" > "SchMaster.TblQuantityUnit"."Sys_SID"
Ref: "SchBudgeting.TblBudgetCeilingObjects"."ProductUnitPriceCurrency_RefID" > "SchMaster.TblCurrency"."Sys_PID"
Ref: "SchBudgeting.TblBudgetCeilingObjects"."ProductUnitPriceCurrency_RefID" > "SchMaster.TblCurrency"."Sys_SID"



TABLE "SchBudgeting.TblBudgetGroup"
    {
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" bigint [pk]
    "Sys_Data_Annotation" varchar(1024)
    "Sys_Data_Entry_LoginSession_RefID" bigint
    "Sys_Data_Entry_DateTimeTZ" timestamptz
    "Sys_Data_Edit_LoginSession_RefID" bigint
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
    "BudgetType_RefID" bigint
    "Code" varchar(32)
    "Name" varchar(64)
    "ValidStartDateTimeTZ" timestamptz
    "ValidFinishDateTimeTZ" timestamptz
    }
Ref: "SchBudgeting.TblBudgetGroup"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchBudgeting.TblBudgetGroup"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchBudgeting.TblBudgetGroup"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchBudgeting.TblBudgetGroup"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchBudgeting.TblBudgetGroup"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchBudgeting.TblBudgetGroup"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchBudgeting.TblBudgetGroup"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchBudgeting.TblBudgetGroup"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchBudgeting.TblBudgetGroup"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchBudgeting.TblBudgetGroup"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchBudgeting.TblBudgetGroup"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchBudgeting.TblBudgetGroup"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchBudgeting.TblBudgetGroup"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchBudgeting.TblBudgetGroup"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchBudgeting.TblBudgetGroup"."BudgetType_RefID" > "SchBudgeting.TblBudgetType"."Sys_PID"
Ref: "SchBudgeting.TblBudgetGroup"."BudgetType_RefID" > "SchBudgeting.TblBudgetType"."Sys_SID"



TABLE "SchBudgeting.TblBudgetLine"
    {
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" bigint [pk]
    "Sys_Data_Annotation" varchar(1024)
    "Sys_Data_Entry_LoginSession_RefID" bigint
    "Sys_Data_Entry_DateTimeTZ" timestamptz
    "Sys_Data_Edit_LoginSession_RefID" bigint
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
    "BudgetSection_RefID" bigint
    "BudgetGroup_RefID" bigint
    "Code" varchar(20)
    "Name" varchar(128)
    }
Ref: "SchBudgeting.TblBudgetLine"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchBudgeting.TblBudgetLine"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchBudgeting.TblBudgetLine"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchBudgeting.TblBudgetLine"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchBudgeting.TblBudgetLine"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchBudgeting.TblBudgetLine"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchBudgeting.TblBudgetLine"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchBudgeting.TblBudgetLine"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchBudgeting.TblBudgetLine"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchBudgeting.TblBudgetLine"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchBudgeting.TblBudgetLine"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchBudgeting.TblBudgetLine"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchBudgeting.TblBudgetLine"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchBudgeting.TblBudgetLine"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchBudgeting.TblBudgetLine"."BudgetSection_RefID" > "SchBudgeting.TblBudgetSection"."Sys_PID"
Ref: "SchBudgeting.TblBudgetLine"."BudgetSection_RefID" > "SchBudgeting.TblBudgetSection"."Sys_SID"
Ref: "SchBudgeting.TblBudgetLine"."BudgetGroup_RefID" > "SchBudgeting.TblBudgetGroup"."Sys_PID"
Ref: "SchBudgeting.TblBudgetLine"."BudgetGroup_RefID" > "SchBudgeting.TblBudgetGroup"."Sys_SID"



TABLE "SchBudgeting.TblBudgetSection"
    {
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" bigint [pk]
    "Sys_Data_Annotation" varchar(1024)
    "Sys_Data_Entry_LoginSession_RefID" bigint
    "Sys_Data_Entry_DateTimeTZ" timestamptz
    "Sys_Data_Edit_LoginSession_RefID" bigint
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
    "Budget_RefID" bigint
    "BudgetOwner_RefID" bigint
    }
Ref: "SchBudgeting.TblBudgetSection"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchBudgeting.TblBudgetSection"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchBudgeting.TblBudgetSection"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchBudgeting.TblBudgetSection"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchBudgeting.TblBudgetSection"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchBudgeting.TblBudgetSection"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchBudgeting.TblBudgetSection"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchBudgeting.TblBudgetSection"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchBudgeting.TblBudgetSection"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchBudgeting.TblBudgetSection"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchBudgeting.TblBudgetSection"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchBudgeting.TblBudgetSection"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchBudgeting.TblBudgetSection"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchBudgeting.TblBudgetSection"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchBudgeting.TblBudgetSection"."Budget_RefID" > "SchBudgeting.TblBudget"."Sys_PID"
Ref: "SchBudgeting.TblBudgetSection"."Budget_RefID" > "SchBudgeting.TblBudget"."Sys_SID"
Ref: "SchBudgeting.TblBudgetSection"."BudgetOwner_RefID" > "SchHumanResource.TblOrganizationalDepartment"."Sys_PID"
Ref: "SchBudgeting.TblBudgetSection"."BudgetOwner_RefID" > "SchHumanResource.TblOrganizationalDepartment"."Sys_SID"
Ref: "SchBudgeting.TblBudgetSection"."BudgetOwner_RefID" > "SchProject.TblProject"."Sys_PID"
Ref: "SchBudgeting.TblBudgetSection"."BudgetOwner_RefID" > "SchProject.TblProject"."Sys_SID"



TABLE "SchBudgeting.TblBudgetType"
    {
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" bigint [pk]
    "Sys_Data_Annotation" varchar(1024)
    "Sys_Data_Entry_LoginSession_RefID" bigint
    "Sys_Data_Entry_DateTimeTZ" timestamptz
    "Sys_Data_Edit_LoginSession_RefID" bigint
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
    "Type" varchar(64)
    }
Ref: "SchBudgeting.TblBudgetType"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchBudgeting.TblBudgetType"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchBudgeting.TblBudgetType"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchBudgeting.TblBudgetType"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchBudgeting.TblBudgetType"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchBudgeting.TblBudgetType"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchBudgeting.TblBudgetType"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchBudgeting.TblBudgetType"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchBudgeting.TblBudgetType"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchBudgeting.TblBudgetType"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchBudgeting.TblBudgetType"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchBudgeting.TblBudgetType"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchBudgeting.TblBudgetType"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchBudgeting.TblBudgetType"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"



TABLE "SchCustomerRelation.TblCustomer"
    {
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" bigint [pk]
    "Sys_Data_Annotation" varchar(1024)
    "Sys_Data_Entry_LoginSession_RefID" bigint
    "Sys_Data_Entry_DateTimeTZ" timestamptz
    "Sys_Data_Edit_LoginSession_RefID" bigint
    "Sys_Data_Edit_DateTimeTZ" timestamptz
    "Sys_Data_Delete_LoginSession_RefID" bigint
    "Sys_Data_Delete_DateTimeTZ" timestamptz
    "Sys_Data_Hidden_LoginSession_RefID" bigint
    "Sys_Data_Hidden_DateTimeTZ" timestamptz
    "Sys_Data_Authentication_LoginSession_RefID" bigint
    "Sys_Data_Authentication_DateTimeTZ" timestamptz
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Entity_RefID" bigint
    }
Ref: "SchCustomerRelation.TblCustomer"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchCustomerRelation.TblCustomer"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchCustomerRelation.TblCustomer"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchCustomerRelation.TblCustomer"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchCustomerRelation.TblCustomer"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchCustomerRelation.TblCustomer"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchCustomerRelation.TblCustomer"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchCustomerRelation.TblCustomer"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchCustomerRelation.TblCustomer"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchCustomerRelation.TblCustomer"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchCustomerRelation.TblCustomer"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchCustomerRelation.TblCustomer"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchCustomerRelation.TblCustomer"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchCustomerRelation.TblCustomer"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchCustomerRelation.TblCustomer"."Entity_RefID" > "SchMaster.TblInstitutionBranch"."Sys_PID"
Ref: "SchCustomerRelation.TblCustomer"."Entity_RefID" > "SchMaster.TblInstitutionBranch"."Sys_SID"
Ref: "SchCustomerRelation.TblCustomer"."Entity_RefID" > "SchMaster.TblPerson"."Sys_PID"
Ref: "SchCustomerRelation.TblCustomer"."Entity_RefID" > "SchMaster.TblPerson"."Sys_SID"



TABLE "SchMaster.TblInstitution"
    {
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" bigint [pk]
    "Sys_Data_Annotation" varchar(1024)
    "Sys_Data_Entry_LoginSession_RefID" bigint
    "Sys_Data_Entry_DateTimeTZ" timestamptz
    "Sys_Data_Edit_LoginSession_RefID" bigint
    "Sys_Data_Edit_DateTimeTZ" timestamptz
    "Sys_Data_Delete_LoginSession_RefID" bigint
    "Sys_Data_Delete_DateTimeTZ" timestamptz
    "Sys_Data_Hidden_LoginSession_RefID" bigint
    "Sys_Data_Hidden_DateTimeTZ" timestamptz
    "Sys_Data_Authentication_LoginSession_RefID" bigint
    "Sys_Data_Authentication_DateTimeTZ" timestamptz
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Name" varchar(256)
    }
Ref: "SchMaster.TblInstitution"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblInstitution"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblInstitution"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblInstitution"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblInstitution"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblInstitution"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblInstitution"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblInstitution"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblInstitution"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblInstitution"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblInstitution"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchMaster.TblInstitution"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchMaster.TblInstitution"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchMaster.TblInstitution"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"



TABLE "SchMaster.TblInstitutionBranch"
    {
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" bigint [pk]
    "Sys_Data_Annotation" varchar(1024)
    "Sys_Data_Entry_LoginSession_RefID" bigint
    "Sys_Data_Entry_DateTimeTZ" timestamptz
    "Sys_Data_Edit_LoginSession_RefID" bigint
    "Sys_Data_Edit_DateTimeTZ" timestamptz
    "Sys_Data_Delete_LoginSession_RefID" bigint
    "Sys_Data_Delete_DateTimeTZ" timestamptz
    "Sys_Data_Hidden_LoginSession_RefID" bigint
    "Sys_Data_Hidden_DateTimeTZ" timestamptz
    "Sys_Data_Authentication_LoginSession_RefID" bigint
    "Sys_Data_Authentication_DateTimeTZ" timestamptz
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Institution_RefID" bigint
    "Name" varchar(256)
    }
Ref: "SchMaster.TblInstitutionBranch"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblInstitutionBranch"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblInstitutionBranch"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblInstitutionBranch"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblInstitutionBranch"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblInstitutionBranch"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblInstitutionBranch"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblInstitutionBranch"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblInstitutionBranch"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchMaster.TblInstitutionBranch"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchMaster.TblInstitutionBranch"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchMaster.TblInstitutionBranch"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchMaster.TblInstitutionBranch"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchMaster.TblInstitutionBranch"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchMaster.TblInstitutionBranch"."Institution_RefID" > "SchMaster.TblInstitution"."Sys_PID"
Ref: "SchMaster.TblInstitutionBranch"."Institution_RefID" > "SchMaster.TblInstitution"."Sys_SID"



TABLE "SchFinance.TblAdvance"
    {
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" bigint [pk]
    "Sys_Data_Annotation" varchar(1024)
    "Sys_Data_Entry_LoginSession_RefID" bigint
    "Sys_Data_Entry_DateTimeTZ" timestamptz
    "Sys_Data_Edit_LoginSession_RefID" bigint
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
    "SignDataAuthentication" boolean
    "BusinessDocumentVersion_RefID" bigint
    "CodeOfBudgeting_RefID" bigint
    "RequesterPerson_RefID" bigint
    }
Ref: "SchFinance.TblAdvance"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchFinance.TblAdvance"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchFinance.TblAdvance"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchFinance.TblAdvance"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchFinance.TblAdvance"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchFinance.TblAdvance"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchFinance.TblAdvance"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchFinance.TblAdvance"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchFinance.TblAdvance"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchFinance.TblAdvance"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchFinance.TblAdvance"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchFinance.TblAdvance"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchFinance.TblAdvance"."BusinessDocumentVersion_RefID" > "SchMaster.TblBusinessDocumentVersion"."Sys_PID"
Ref: "SchFinance.TblAdvance"."BusinessDocumentVersion_RefID" > "SchMaster.TblBusinessDocumentVersion"."Sys_SID"



TABLE "SchFinance.TblAdvanceDetail"
    {
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" bigint [pk]
    "Sys_Data_Annotation" varchar(1024)
    "Sys_Data_Entry_LoginSession_RefID" bigint
    "Sys_Data_Entry_DateTimeTZ" timestamptz
    "Sys_Data_Edit_LoginSession_RefID" bigint
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
    "SignDataAuthentication" boolean
    "Advance_RefID" bigint
    "Product_RefID" bigint
    "Quantity" numeric(202)
    "QuantityUnit_RefID" bigint
    "UnitPrice_Currency_RefID" bigint
    "UnitPrice_CurrencyExchangeRate" numeric(202)
    "UnitPrice_CurrencyValue" numeric(202)
    }
Ref: "SchFinance.TblAdvanceDetail"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchFinance.TblAdvanceDetail"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchFinance.TblAdvanceDetail"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchFinance.TblAdvanceDetail"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchFinance.TblAdvanceDetail"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchFinance.TblAdvanceDetail"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchFinance.TblAdvanceDetail"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchFinance.TblAdvanceDetail"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchFinance.TblAdvanceDetail"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchFinance.TblAdvanceDetail"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchFinance.TblAdvanceDetail"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchFinance.TblAdvanceDetail"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchFinance.TblAdvanceDetail"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchFinance.TblAdvanceDetail"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchFinance.TblAdvanceDetail"."Advance_RefID" > "SchFinance.TblAdvance"."Sys_PID"
Ref: "SchFinance.TblAdvanceDetail"."Advance_RefID" > "SchFinance.TblAdvance"."Sys_SID"



TABLE "SchSupplyChain.TblSupplier"
    {
    "Sys_PID" bigint
    "Sys_SID" bigint
    "Sys_RPK" bigint [pk]
    "Sys_Data_Annotation" varchar(1024)
    "Sys_Data_Entry_LoginSession_RefID" bigint
    "Sys_Data_Entry_DateTimeTZ" timestamptz
    "Sys_Data_Edit_LoginSession_RefID" bigint
    "Sys_Data_Edit_DateTimeTZ" timestamptz
    "Sys_Data_Delete_LoginSession_RefID" bigint
    "Sys_Data_Delete_DateTimeTZ" timestamptz
    "Sys_Data_Hidden_LoginSession_RefID" bigint
    "Sys_Data_Hidden_DateTimeTZ" timestamptz
    "Sys_Data_Authentication_LoginSession_RefID" bigint
    "Sys_Data_Authentication_DateTimeTZ" timestamptz
    "Sys_Partition_RemovableRecord_Key_RefID" bigint
    "Sys_Branch_RefID" bigint
    "Entity_RefID" bigint
    }
Ref: "SchSupplyChain.TblSupplier"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSupplyChain.TblSupplier"."Sys_Data_Entry_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSupplyChain.TblSupplier"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSupplyChain.TblSupplier"."Sys_Data_Edit_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSupplyChain.TblSupplier"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSupplyChain.TblSupplier"."Sys_Data_Delete_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSupplyChain.TblSupplier"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSupplyChain.TblSupplier"."Sys_Data_Hidden_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSupplyChain.TblSupplier"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_PID"
Ref: "SchSupplyChain.TblSupplier"."Sys_Data_Authentication_LoginSession_RefID" > "SchSysConfig.TblLog_UserLoginSession"."Sys_SID"
Ref: "SchSupplyChain.TblSupplier"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_PID"
Ref: "SchSupplyChain.TblSupplier"."Sys_Partition_RemovableRecord_Key_RefID" > "SchSysConfig.TblDBObject_Partition_RemovableRecord_Key"."Sys_SID"
Ref: "SchSupplyChain.TblSupplier"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_PID"
Ref: "SchSupplyChain.TblSupplier"."Sys_Branch_RefID" > "SchSysConfig.TblAppObject_InstitutionBranch"."Sys_SID"
Ref: "SchSupplyChain.TblSupplier"."Entity_RefID" > "SchMaster.TblInstitutionBranch"."Sys_PID"
Ref: "SchSupplyChain.TblSupplier"."Entity_RefID" > "SchMaster.TblInstitutionBranch"."Sys_SID"
Ref: "SchSupplyChain.TblSupplier"."Entity_RefID" > "SchMaster.TblPerson"."Sys_PID"
Ref: "SchSupplyChain.TblSupplier"."Entity_RefID" > "SchMaster.TblPerson"."Sys_SID"