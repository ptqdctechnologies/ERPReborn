-- FUNCTION: SchData-Warehouse-Log.Func_General_SetTransactionHistory(bigint)

-- DROP FUNCTION IF EXISTS "SchData-Warehouse-Log"."Func_General_SetTransactionHistory"(bigint);

CREATE OR REPLACE FUNCTION "SchData-Warehouse-Log"."Func_General_SetTransactionHistory"(
	bigint)
    RETURNS boolean
    LANGUAGE 'plpgsql'
    COST 100
    VOLATILE PARALLEL UNSAFE
AS $BODY$
/*----------------------------------------------------------------------------------------------------
▪ Nama                : "SchData-Warehouse-Log"."Func_General_SetTransactionHistory"
▪ Versi               : 1.00.0000
▪ Tanggal 
     ► Pemutakhiran   : 2023-12-06
     ► Pembuatan      : 2023-12-06
▪ Input               : varID (bigint - Mandatory)
▪ Output              : varReturn (boolean)
▪ Keterkaitan Fungsi  : "SchSysAsset"."Func_General_DBObject_GetNotice"(varchar, varchar)
▪ Deskripsi           : Menyimpan Transaction History 
▪ Copyright           : Zheta © 2023

----[ SQL Example(s) ]------------------------------------------------------------------------------

▪ SELECT "SchData-Warehouse-Log"."Func_General_SetTransactionHistory"(
	11000000000004::bigint
	);

----------------------------------------------------------------------------------------------------*/

DECLARE
	---[ Input Variable(s) ]------------------------------------------------------------------------
		varID						                ALIAS FOR $1;

	---[ Output Variable(s) ]-----------------------------------------------------------------------
		varReturn									boolean;

	---[ Intermediate Variable(s) ]-----------------------------------------------------------------
		varSystemNoticeTag							varchar;
		varSignEligibleToProcess					boolean;

		varSQL										varchar;

		varRecTemp									record;

BEGIN
	---[ Data Initializing ]------------------------------------------------------------------------
		varSystemNoticeTag := "SchSysAsset"."Func_GetSystemNoticeTag"();
		varSignEligibleToProcess := FALSE;

		IF (varSignEligibleToProcess = FALSE) THEN
			IF (varID IS NOT NULL) THEN
				varSignEligibleToProcess := TRUE;
			END IF;
		END IF;

		IF (varSignEligibleToProcess = TRUE) THEN
		END IF;

	---[ Data Processing ]--------------------------------------------------------------------------
		IF (varSignEligibleToProcess = TRUE) THEN
			varSQL := '
				SELECT
					("SubSQL"."JSONData"->>''Sys_PID'')::bigint AS "Sys_PID",
					("SubSQL"."JSONData"->>''Sys_SID'')::bigint AS "Sys_SID",
					("SubSQL"."JSONData"->>''Sys_RPK'')::bigint AS "Sys_RPK",
					("SubSQL"."JSONData"->>''Sys_Data_Entry_DateTimeTZ'')::timestamptz AS "Sys_Data_Entry_DateTimeTZ",
					"SubSQL"."JSONData"
				FROM
					(
					SELECT 
						"Func_General_GetJSONOfTableRecordByID" AS "JSONData" 
					FROM
						"SchData-Warehouse-Log"."Func_General_GetJSONOfTableRecordByID"(' || (SELECT "SchSysAsset"."Func_GetStringLiteralConvertion_BigInt"(varID::bigint)) || '::bigint)
					) AS "SubSQL"
				';
			EXECUTE varSQL INTO varRecTemp;
			--PERFORM "SchSysAsset"."Func_General_DBObject_GetNotice"(varSystemNoticeTag, varRecTemp."JSONData");

			RAISE NOTICE '%', varRecTemp."JSONData";
			varSQL := '
				SELECT * FROM "SchData-Warehouse-Log"."Func_TblLog_TransactionHistory_SET"(
					6000000000001,
					NULL::bigint,
					NULL::varchar,
					NULL::varchar,
					11000000000001::bigint,
					NULL::bigint,

					' || (SELECT "SchSysAsset"."Func_GetStringLiteralConvertion_BigInt"(varRecTemp."Sys_PID"::bigint)) || '::bigint,
					' || (SELECT "SchSysAsset"."Func_GetStringLiteralConvertion_BigInt"(varRecTemp."Sys_SID"::bigint)) || '::bigint,
					' || (SELECT "SchSysAsset"."Func_GetStringLiteralConvertion_BigInt"(varRecTemp."Sys_RPK"::bigint)) || '::bigint,
					' || (SELECT "SchSysAsset"."Func_GetStringLiteralConvertion_TimestampTZ"(varRecTemp."Sys_Data_Entry_DateTimeTZ"::timestamptz)) || '::timestamptz,
					' || (SELECT "SchSysAsset"."Func_GetStringLiteralConvertion_JSON"(varRecTemp."JSONData"::json)) || '::json
					)
				';
			--PERFORM "SchSysAsset"."Func_General_DBObject_GetNotice"(varSystemNoticeTag, varSQL);
			EXECUTE varSQL;

			varReturn := TRUE;
		END IF;

	---[ Data Return ]------------------------------------------------------------------------------
		IF (varSignEligibleToProcess = TRUE) THEN
			RETURN varReturn;
		END IF;

	---[ Exception Handling ]-----------------------------------------------------------------------
		--EXCEPTION WHEN OTHERS THEN ...

END;
$BODY$;

ALTER FUNCTION "SchData-Warehouse-Log"."Func_General_SetTransactionHistory"(bigint)
    OWNER TO "SysEngine";
