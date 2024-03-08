-- FUNCTION: SchData-Warehouse-Log.Func_TblLog_TransactionHistory_SET(bigint, bigint, character varying, character varying, bigint, bigint, bigint, bigint, bigint, timestamp with time zone, json)

-- DROP FUNCTION IF EXISTS "SchData-Warehouse-Log"."Func_TblLog_TransactionHistory_SET"(bigint, bigint, character varying, character varying, bigint, bigint, bigint, bigint, bigint, timestamp with time zone, json);

CREATE OR REPLACE FUNCTION "SchData-Warehouse-Log"."Func_TblLog_TransactionHistory_SET"(
	bigint,
	bigint,
	character varying,
	character varying,
	bigint,
	bigint,
	bigint,
	bigint,
	bigint,
	timestamp with time zone,
	json)
    RETURNS SETOF "SchSystem"."HoldFuncSys_General_FeedBackQuery" 
    LANGUAGE 'plpgsql'
    COST 100
    VOLATILE PARALLEL UNSAFE
    ROWS 1000

AS $BODY$
/*----------------------------------------------------------------------------------------------------
▪ Nama                : "SchData-Warehouse-Log"."Func_TblLog_TransactionHistory_SET"
▪ Versi               : 1.00.0000
▪ Tanggal
     ► Pemutakhiran   : 2023-12-05
     ► Pembuatan      : 2023-12-05
▪ Input               : varIDSession (bigint - Mandatory)
						varID (bigint - Mandatory)
						varSysDataAnnotation (varchar - Mandatory)
						varSysPartitionRemovableRecordKeyRefName	(varchar - Mandatory)
						varBranch_RefID (bigint - Mandatory)
						varBaseCurrency_RefID (bigint - Mandatory)
						------------------------------
						varSource_RefPID (bigint - Mandatory)
						varSource_RefSID (bigint - Mandatory)
						varSource_RefRPK (bigint - Mandatory)
						varSource_EntryDateTimeTZ (timestamptz - Mandatory)
						varContent (json - Mandatory)
▪ Output              : varRecSetOutput ("SchSystem"."HoldFuncSys_General_FeedBackQuery")
▪ Keterkaitan Fungsi  : "SchSysAsset"."Func_GetSystemNoticeTag"(varchar)
						"SchLog"."Func_TblLog_TransactionHistory_INSERT"(varchar, bigint, timestamptz, bigint, bigint, bigint, bigint, bigint, bigint, timestamptz, json)
						"SchLog"."Func_TblLog_TransactionHistory_UPDATE"(bigint, bigint, timestamptz, bigint, bigint, bigint, bigint, bigint, bigint, timestamptz, json)
						"SchSysConfig"."FuncSys_General_GetDBLinkConnectionString"(varchar)
						"SchSysConfig"."FuncSys_General_SetAfterRecordInsert"(varchar, varchar, bigint)
						"SchSysConfig"."FuncSys_General_SetAfterRecordUpdate"(varchar, varchar, bigint)
▪ Deskripsi           : Mengeset data (INSERT dan UPDATE) pada tabel TblLog_TransactionHistory
▪ Copyright           : Zheta © 2023

----[ SQL Example(s) ]------------------------------------------------------------------------------

▪ ---> (INSERT NEW DATA)
	SELECT * FROM "SchData-Warehouse-Log"."Func_TblLog_TransactionHistory_SET"(
		6000000000001,
		NULL::bigint,
		NULL::varchar,
		NULL::varchar,
		11000000000001::bigint,
		NULL::bigint,

		76000000000001,
		10076000000000001,
		1,
		'2022-10-21 14:57:22.817091+07'::timestamptz,
		'{}'::json
		);

----------------------------------------------------------------------------------------------------*/

DECLARE
	---[ Input Variable(s) ]------------------------------------------------------------------------
		varIDSession								ALIAS FOR $1;
		varID										ALIAS FOR $2;
		varSysDataAnnotation						ALIAS FOR $3;
		varSysPartitionRemovableRecordKeyRefName	ALIAS FOR $4;
		varBranch_RefID								ALIAS FOR $5;
		varBaseCurrency_RefID						ALIAS FOR $6;
		------------------------------
		varSource_RefPID							ALIAS FOR $7;
		varSource_RefSID							ALIAS FOR $8;
		varSource_RefRPK							ALIAS FOR $9;
		varSource_EntryDateTimeTZ					ALIAS FOR $10;
		varContent									ALIAS FOR $11;

	---[ Output Variable(s) ]-----------------------------------------------------------------------
		varRecSetOutput								"SchSystem"."HoldFuncSys_General_FeedBackQuery"%rowtype;

	---[ Intermediate Variable(s) ]-----------------------------------------------------------------
		varSystemNoticeTag							varchar;
		varSignEligibleToProcess					boolean;

		varSQL										varchar;
		varSignValid								int;
		varRPK         								bigint;
		varRecTemp									record;

BEGIN
	---[ Data Initializing ]------------------------------------------------------------------------
		varSystemNoticeTag := "SchSysAsset"."Func_GetSystemNoticeTag"();
		varSignEligibleToProcess := FALSE;

		IF (varSignEligibleToProcess = FALSE) THEN
			varSignEligibleToProcess := TRUE;
		END IF;

		IF (varSignEligibleToProcess = TRUE) THEN
		END IF;

	---[ Data Processing ]--------------------------------------------------------------------------
		IF (varSignEligibleToProcess = TRUE) THEN
			IF (varID IS NULL) THEN
				-----[ MODE : INSERT ]-----(START)-----
				SELECT 
					"SubSQL"."Sys_RPK" 
				INTO
					varRPK
				FROM 
					DBLINK(
						(SELECT "SchSysConfig"."FuncSys_General_GetDBLinkConnectionString"('Data-Warehouse')), '
						SELECT 
							"SignRecordID"
						FROM
							"SchLog"."Func_TblLog_TransactionHistory_INSERT"(
								' || (SELECT "SchSysAsset"."Func_GetStringLiteralConvertion_VarChar"(varSysDataAnnotation)) || '::varchar,
								' || varIDSession || ', 
								''' || (SELECT "SchSysConfig"."FuncSys_General_GetDBClusterTimestamp"()) || '''::timestamptz, 
								' || (SELECT "SchSysAsset"."Func_GetStringLiteralConvertion_BigInt"((SELECT "SchSysConfig"."FuncSys_General_GetPartitionKeyID"('SchData-Warehouse-Log', 'TblLog_TransactionHistory', varSysPartitionRemovableRecordKeyRefName)))) || ', 
								' || (SELECT "SchSysAsset"."Func_GetStringLiteralConvertion_BigInt"(varBranch_RefID::bigint)) || '::bigint,
								' || (SELECT "SchSysAsset"."Func_GetStringLiteralConvertion_BigInt"(varBaseCurrency_RefID::bigint)) || '::bigint,
								------------------------------
								' || (SELECT "SchSysAsset"."Func_GetStringLiteralConvertion_BigInt"(varSource_RefPID::bigint)) || '::bigint,
								' || (SELECT "SchSysAsset"."Func_GetStringLiteralConvertion_BigInt"(varSource_RefSID::bigint)) || '::bigint,
								' || (SELECT "SchSysAsset"."Func_GetStringLiteralConvertion_BigInt"(varSource_RefRPK::bigint)) || '::bigint,
								' || (SELECT "SchSysAsset"."Func_GetStringLiteralConvertion_TimestampTZ"(varSource_EntryDateTimeTZ::timestamptz)) || '::timestamptz,
								' || (SELECT "SchSysAsset"."Func_GetStringLiteralConvertion_JSON"(varContent::json)) || '::json
								)
						'
					) AS "SubSQL"("Sys_RPK" bigint);						  
							  
				varSQL := '
					SELECT
						*
					FROM
						"SchSysConfig"."FuncSys_General_SetAfterRecordInsert"(
							''SchData-Warehouse-Log'', 
							''TblLog_TransactionHistory'', 
							' || varRPK || '
							)
					';
				EXECUTE varSQL INTO varRecSetOutput."SignRecordID";

				--varRecSetOutput."SignRecordID" = varRPK;
				--varRecSetOutput."SignRecordType" = varSQL;
				-----[ MODE : INSERT ]-----( END )-----
			ELSE
				-----[ MODE : UPDATE ]-----(START)-----
				SELECT 
					"SubSQL"."Sys_RPK" 
				INTO
					varRPK
				FROM
					DBLINK(
						(SELECT "SchSysConfig"."FuncSys_General_GetDBLinkConnectionString"('Data-Warehouse')), '
						SELECT 
							"SignRecordID"
						FROM
							"SchLog"."Func_TblLog_TransactionHistory_UPDATE"(
								' || varID || ',
								' || varIDSession || ', 
								''' || (SELECT "SchSysConfig"."FuncSys_General_GetDBClusterTimestamp"()) || '''::timestamptz, 
								' || (SELECT "SchSysAsset"."Func_GetStringLiteralConvertion_BigInt"((SELECT "SchSysConfig"."FuncSys_General_GetPartitionKeyID"('SchData-Warehouse-Log', 'TblLog_TransactionHistory', varSysPartitionRemovableRecordKeyRefName)))) || ', 
								' || (SELECT "SchSysAsset"."Func_GetStringLiteralConvertion_BigInt"(varBranch_RefID::bigint)) || '::bigint,
								' || (SELECT "SchSysAsset"."Func_GetStringLiteralConvertion_BigInt"(varBaseCurrency_RefID::bigint)) || '::bigint,
								------------------------------
								' || (SELECT "SchSysAsset"."Func_GetStringLiteralConvertion_BigInt"(varSource_RefPID::bigint)) || '::bigint,
								' || (SELECT "SchSysAsset"."Func_GetStringLiteralConvertion_BigInt"(varSource_RefSID::bigint)) || '::bigint,
								' || (SELECT "SchSysAsset"."Func_GetStringLiteralConvertion_BigInt"(varSource_RefRPK::bigint)) || '::bigint,
								' || (SELECT "SchSysAsset"."Func_GetStringLiteralConvertion_TimestampTZ"(varSource_EntryDateTimeTZ::timestamptz)) || '::timestamptz,
								' || (SELECT "SchSysAsset"."Func_GetStringLiteralConvertion_JSON"(varContent::json)) || '::json
								)
						'
					) AS "SubSQL"("Sys_RPK" bigint);

				varSQL := '
					SELECT
						*
					FROM
						"SchSysConfig"."FuncSys_General_SetAfterRecordUpdate"(
							''SchData-Warehouse-Log'', 
							''TblLog_TransactionHistory'', 
							' || varRPK || '
							)
					';
				EXECUTE varSQL INTO varRecSetOutput."SignRecordID";
				-----[ MODE : UPDATE ]-----( END )-----
			END IF;
		END IF;

	---[ Data Return ]------------------------------------------------------------------------------
		IF (varSignEligibleToProcess = TRUE) THEN
			RETURN NEXT varRecSetOutput;
		END IF;

	---[ Exception Handling ]-----------------------------------------------------------------------
		--EXCEPTION WHEN OTHERS THEN ...

END;
$BODY$;

ALTER FUNCTION "SchData-Warehouse-Log"."Func_TblLog_TransactionHistory_SET"(bigint, bigint, character varying, character varying, bigint, bigint, bigint, bigint, bigint, timestamp with time zone, json)
    OWNER TO "SysEngine";
