-- FUNCTION: SchData-OLTP-Finance.Func_TblAdvance_SET(bigint, bigint, character varying, character varying, bigint, bigint, timestamp with time zone, bigint, bigint, bigint, bigint, character varying, character varying, json)

-- DROP FUNCTION IF EXISTS "SchData-OLTP-Finance"."Func_TblAdvance_SET"(bigint, bigint, character varying, character varying, bigint, bigint, timestamp with time zone, bigint, bigint, bigint, bigint, character varying, character varying, json);

CREATE OR REPLACE FUNCTION "SchData-OLTP-Finance"."Func_TblAdvance_SET"(
	bigint,
	bigint,
	character varying,
	character varying,
	bigint,
	bigint,
	timestamp with time zone,
	bigint,
	bigint,
	bigint,
	bigint,
	character varying,
	character varying,
	json DEFAULT '[]'::json)
    RETURNS SETOF "SchSystem"."HoldFuncSys_General_FeedBackQuery" 
    LANGUAGE 'plpgsql'
    COST 100
    VOLATILE PARALLEL UNSAFE
    ROWS 1000

AS $BODY$
/*----------------------------------------------------------------------------------------------------
▪ Nama                : "SchData-OLTP-Finance"."Func_TblAdvance_SET"
▪ Versi               : 1.01.0001
▪ Tanggal 
     ► Pemutakhiran   : 2022-07-06
     ► Pembuatan      : 2022-05-17
▪ Input               : varIDSession (bigint - Mandatory)
						varID (bigint - Mandatory)
						varSysDataAnnotation (varchar - Mandatory)
						varSysPartitionRemovableRecordKeyRefName (varchar - Mandatory)
						varBranch_RefID (bigint - Mandatory)
						varBaseCurrency_RefID (bigint - Mandatory)
						------------------------------
						varDocumentDateTimeTZ (timestamptz - Mandatory)
						varLog_FileUpload_Pointer_RefID (bigint - Mandatory)
						varRequesterWorkerJobsPosition_RefID (bigint - Mandatory)
						varBeneficiaryWorkerJobsPosition_RefID (bigint - Mandatory)
						varBeneficiaryBankAccount_RefID (bigint - Mandatory)
						varInternalNotes (varchar - Mandatory)
						varRemarks (varchar - Mandatory)
						------------------------------
						varAdditionalData (json - Optional)
▪ Output              : varRecSetOutput ("SchSystem"."HoldFuncSys_General_FeedBackQuery")
▪ Keterkaitan Fungsi  : "SchBudgeting"."Func_TblAdvance_INSERT"(varchar, bigint, timestamptz, bigint, bigint, bigint, varchar)
						"SchBudgeting"."Func_TblAdvance_UPDATE"(bigint, bigint, timestamptz, bigint, bigint, bigint, varchar)
						"SchSysConfig"."FuncSys_General_GetDBLinkConnectionString"(varchar)
						"SchSysConfig"."FuncSys_General_SetAfterRecordInsert"(varchar, varchar, bigint)
						"SchSysConfig"."FuncSys_General_SetAfterRecordUpdate"(varchar, varchar, bigint)
▪ Deskripsi           : Mengeset data (INSERT dan UPDATE) pada tabel TblAdvance
▪ Copyright           : Zheta © 2022

----[ SQL Example(s) ]------------------------------------------------------------------------------

▪ ---> (INSERT NEW DATA)
	SELECT * FROM "SchData-OLTP-Finance"."Func_TblAdvance_SET"(
		6000000000001,
		NULL,
		NULL::varchar,
		NULL::varchar,
		11000000000003,
		62000000000001,

		'2022-03-07'::timestamptz,
		NULL::bigint,
		164000000000497::bigint,
		164000000000439::bigint,
		167000000000001::bigint,
		'My Internal Notes'::varchar, 
		'My Remarks'::varchar, 
		'{
		"itemList": {
			"items": [
				{
				"entities": {
					"combinedBudgetSectionDetail_RefID":169000000000001,
					"product_RefID":88000000000002,
					"quantity":10,"quantityUnit_RefID":73000000000001,
					"quantityUnit_RefID":73000000000001,
					"productUnitPriceCurrency_RefID":62000000000001,
					"productUnitPriceCurrencyValue":30000,
					"productUnitPriceCurrencyExchangeRate":1,
					"remarks":"Catatan"
					}
				},
				{
				"entities": {
					"combinedBudgetSectionDetail_RefID":169000000000001,
					"product_RefID":88000000000003,
					"quantity":5,
					"quantityUnit_RefID":73000000000001,
					"productUnitPriceCurrency_RefID":62000000000001,
					"productUnitPriceCurrencyValue":40000,
					"productUnitPriceCurrencyExchangeRate":1,
					"remarks":"Catatan"
					}
				}
				]
			}
		}'::json
		);
	
▪ ---> (UPDATE EXISTING DATA)
	SELECT * FROM "SchData-OLTP-Finance"."Func_TblAdvance_SET"(
		6000000000001,
		76000000000064,
		NULL::varchar,
		NULL::varchar,
		11000000000003,
		62000000000001,

		'2022-03-07'::timestamptz,
		NULL::bigint,
		164000000000497::bigint,
		164000000000439::bigint,
		167000000000001::bigint,
		'My Internal Notes'::varchar, 
		'My Remarks'::varchar, 
		'{
		"itemList": {
			"items": [
				{
				"recordID": 82000000000001,
				"entities": {
					"combinedBudgetSectionDetail_RefID":169000000000001,
					"product_RefID":88000000000002,
					"quantity":10,"quantityUnit_RefID":73000000000001,
					"quantityUnit_RefID":73000000000001,
					"productUnitPriceCurrency_RefID":62000000000001,
					"productUnitPriceCurrencyValue":30000,
					"productUnitPriceCurrencyExchangeRate":1,
					"remarks":"Catatan"
					}
				},
				{
				"recordID": null,
				"entities": {
					"combinedBudgetSectionDetail_RefID":169000000000001,
					"product_RefID":88000000000003,
					"quantity":10,
					"quantityUnit_RefID":73000000000001,
					"productUnitPriceCurrency_RefID":62000000000001,
					"productUnitPriceCurrencyValue":30000,
					"productUnitPriceCurrencyExchangeRate":1,
					"remarks":"Catatan"
					}
				}
				]
			}
		}'::json
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
		varDocumentDateTimeTZ						ALIAS FOR $7;
		varLog_FileUpload_Pointer_RefID				ALIAS FOR $8;
		varRequesterWorkerJobsPosition_RefID		ALIAS FOR $9;
		varBeneficiaryWorkerJobsPosition_RefID		ALIAS FOR $10;
		varBeneficiaryBankAccount_RefID				ALIAS FOR $11;
		varInternalNotes							ALIAS FOR $12;
		varRemarks									ALIAS FOR $13;
		------------------------------
		varAdditionalData							ALIAS FOR $14;

	---[ Output Variable(s) ]-----------------------------------------------------------------------
		varRecSetOutput								"SchSystem"."HoldFuncSys_General_FeedBackQuery"%rowtype;

	---[ Intermediate Variable(s) ]-----------------------------------------------------------------
		varSystemNoticeTag							varchar;
		varSignEligibleToProcess					boolean;

		varSQL										varchar;
		varSignValid								int;
		varRPK         								bigint;
		varRecTemp									record;

		varOperationMode							varchar;
		varBusinessDocumentVersion_RefID			bigint;

BEGIN
	---[ Data Initializing ]------------------------------------------------------------------------
		varSystemNoticeTag := "SchSysAsset"."Func_GetSystemNoticeTag"();
		varSignEligibleToProcess := FALSE;

		IF (varSignEligibleToProcess = FALSE) THEN
			varSignEligibleToProcess := TRUE;
		END IF;

		IF (varSignEligibleToProcess = TRUE) THEN
			---> Inisialisasi varAdditionalData
			IF (varAdditionalData IS NULL) THEN
				varAdditionalData := '[]'::json;
			END IF;

			---> Inisialisasi varOperationMode dan varBusinessDocumentVersion_RefID
			SELECT
				"OperationMode",
				"BusinessDocumentVersion_RefID"
			INTO
				varOperationMode,
				varBusinessDocumentVersion_RefID
			FROM
				"SchData-OLTP-Master"."Func_General_GetBusinessDocumentVersionForRecordDataSet"(
					6000000000001,
					(SELECT "SchData-OLTP-Master"."Func_General_GetBusinessDocumentTypeIDByName"('Advance Form'))::bigint,
					varDocumentDateTimeTZ::timestamptz,
					varID::bigint
					);
		END IF;

	---[ Data Processing ]--------------------------------------------------------------------------
		IF (varSignEligibleToProcess = TRUE) THEN
			-----[ MAIN DATA PROCESSING ]-----(START)-----
			IF (varOperationMode = 'INSERT') THEN
				-----[ MODE : INSERT ]-----(START)-----
				SELECT 
					"SubSQL"."Sys_RPK" 
				INTO
					varRPK
				FROM 
					DBLINK(
						(SELECT "SchSysConfig"."FuncSys_General_GetDBLinkConnectionString"('Data-OLTP')), '
						SELECT 
							"SignRecordID"
						FROM
							"SchFinance"."Func_TblAdvance_INSERT"(
								' || (SELECT "SchSysAsset"."Func_GetStringLiteralConvertion_VarChar"(varSysDataAnnotation)) || '::varchar,
								' || varIDSession || ', 
								''' || (SELECT "SchSysConfig"."FuncSys_General_GetDBClusterTimestamp"()) || '''::timestamptz, 
								' || (SELECT "SchSysAsset"."Func_GetStringLiteralConvertion_BigInt"((SELECT "SchSysConfig"."FuncSys_General_GetPartitionKeyID"('SchData-OLTP-Finance', 'TblAdvance', varSysPartitionRemovableRecordKeyRefName)))) || ', 
								' || (SELECT "SchSysAsset"."Func_GetStringLiteralConvertion_BigInt"(varBranch_RefID::bigint)) || '::bigint, 
								' || (SELECT "SchSysAsset"."Func_GetStringLiteralConvertion_BigInt"(varBaseCurrency_RefID::bigint)) || '::bigint, 
								------------------------------
								' || (SELECT "SchSysAsset"."Func_GetStringLiteralConvertion_BigInt"(varBusinessDocumentVersion_RefID::bigint)) || '::bigint,
								' || (SELECT "SchSysAsset"."Func_GetStringLiteralConvertion_BigInt"(varLog_FileUpload_Pointer_RefID::bigint)) || '::bigint,
								' || (SELECT "SchSysAsset"."Func_GetStringLiteralConvertion_BigInt"(varRequesterWorkerJobsPosition_RefID::bigint)) || '::bigint,
								' || (SELECT "SchSysAsset"."Func_GetStringLiteralConvertion_BigInt"(varBeneficiaryWorkerJobsPosition_RefID::bigint)) || '::bigint,
								' || (SELECT "SchSysAsset"."Func_GetStringLiteralConvertion_BigInt"(varBeneficiaryBankAccount_RefID::bigint)) || '::bigint,
								' || (SELECT "SchSysAsset"."Func_GetStringLiteralConvertion_VarChar"(varInternalNotes::varchar)) || '::varchar,
								' || (SELECT "SchSysAsset"."Func_GetStringLiteralConvertion_VarChar"(varRemarks::varchar)) || '::varchar
								)
						'
					) AS "SubSQL"("Sys_RPK" bigint);

				varSQL := '
					SELECT
						*
					FROM
						"SchSysConfig"."FuncSys_General_SetAfterRecordInsert"(
							''SchData-OLTP-Finance'', 
							''TblAdvance'', 
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
						(SELECT "SchSysConfig"."FuncSys_General_GetDBLinkConnectionString"('Data-OLTP')), '
						SELECT 
							"SignRecordID"
						FROM
							"SchFinance"."Func_TblAdvance_UPDATE"(
								' || varID || ',
								' || varIDSession || ', 
								''' || (SELECT "SchSysConfig"."FuncSys_General_GetDBClusterTimestamp"()) || '''::timestamptz, 
								' || (SELECT "SchSysAsset"."Func_GetStringLiteralConvertion_BigInt"((SELECT "SchSysConfig"."FuncSys_General_GetPartitionKeyID"('SchData-OLTP-Finance', 'TblAdvance', varSysPartitionRemovableRecordKeyRefName)))) || ', 
								' || (SELECT "SchSysAsset"."Func_GetStringLiteralConvertion_BigInt"(varBranch_RefID::bigint)) || '::bigint, 
								' || (SELECT "SchSysAsset"."Func_GetStringLiteralConvertion_BigInt"(varBaseCurrency_RefID::bigint)) || '::bigint, 
								------------------------------
								' || (SELECT "SchSysAsset"."Func_GetStringLiteralConvertion_BigInt"(varBusinessDocumentVersion_RefID::bigint)) || '::bigint,
								' || (SELECT "SchSysAsset"."Func_GetStringLiteralConvertion_BigInt"(varLog_FileUpload_Pointer_RefID::bigint)) || '::bigint,
								' || (SELECT "SchSysAsset"."Func_GetStringLiteralConvertion_BigInt"(varRequesterWorkerJobsPosition_RefID::bigint)) || '::bigint,
								' || (SELECT "SchSysAsset"."Func_GetStringLiteralConvertion_BigInt"(varBeneficiaryWorkerJobsPosition_RefID::bigint)) || '::bigint,
								' || (SELECT "SchSysAsset"."Func_GetStringLiteralConvertion_BigInt"(varBeneficiaryBankAccount_RefID::bigint)) || '::bigint,
								' || (SELECT "SchSysAsset"."Func_GetStringLiteralConvertion_VarChar"(varInternalNotes::varchar)) || '::varchar,
								' || (SELECT "SchSysAsset"."Func_GetStringLiteralConvertion_VarChar"(varRemarks::varchar)) || '::varchar
								)
						'
					) AS "SubSQL"("Sys_RPK" bigint);

				varSQL :=  '
					SELECT
						*
					FROM
						"SchSysConfig"."FuncSys_General_SetAfterRecordUpdate"(
							''SchData-OLTP-Finance'', 
							''TblAdvance'', 
							' || varRPK || '
							)
					';
				EXECUTE varSQL INTO varRecSetOutput."SignRecordID";
				-----[ MODE : UPDATE ]-----( END )-----
			END IF;
-- 			RAISE NOTICE '%', varRecSetOutput."SignRecordID";
			---> Set Transaction History
			PERFORM "SchData-Warehouse-Log"."Func_General_SetTransactionHistory"(varRecSetOutput."SignRecordID");

			-----[ MAIN DATA PROCESSING ]-----( END )-----

			-----[ ADDITIONAL DATA PROCESSING ]-----(START)-----
			IF (varAdditionalData::varchar != '[]'::json::varchar) THEN
				---> Penghapusan Unused Additional Data Record
				PERFORM "SchSysAsset"."Func_General_DBObject_SetDeleteForUnusedAdditionalDataRecord"(
					varIDSession::bigint,
					varRecSetOutput."SignRecordID"::bigint,
					'SchData-OLTP-Finance'::varchar,
					'TblAdvanceDetail'::varchar,
					'Advance_RefID'::varchar,
					(varAdditionalData->'itemList')::json
					);

				---> Penulisan Ulang Record Sesuai Input
				IF (varAdditionalData->'itemList' IS NOT NULL) THEN
					FOR i IN 1 .. JSON_ARRAY_LENGTH(varAdditionalData->'itemList'->'items')
						LOOP
							varSQL := '
								SELECT 
									*
								FROM
									"SchData-OLTP-Finance"."Func_TblAdvanceDetail_SET"(
										' || varIDSession || '::bigint, 
										' || (SELECT "SchSysAsset"."Func_GetStringLiteralConvertion_BigInt"((varAdditionalData->'itemList'->'items'->(i-1)->>'recordID')::bigint)) || '::bigint,
										NULL::varchar, 
										' || (SELECT "SchSysAsset"."Func_GetStringLiteralConvertion_BigInt"((SELECT "SchSysConfig"."FuncSys_General_GetPartitionKeyID"('SchData-OLTP-Finance', 'TblAdvanceDetail', varSysPartitionRemovableRecordKeyRefName)))) || '::varchar, 
										' || (SELECT "SchSysAsset"."Func_GetStringLiteralConvertion_BigInt"(varBranch_RefID::bigint)) || '::bigint, 
										' || (SELECT "SchSysAsset"."Func_GetStringLiteralConvertion_BigInt"(varBaseCurrency_RefID::bigint)) || '::bigint, 
										------------------------------
										' || (SELECT "SchSysAsset"."Func_GetStringLiteralConvertion_BigInt"(varRecSetOutput."SignRecordID"::bigint)) || '::bigint, 
										' || (SELECT "SchSysAsset"."Func_GetStringLiteralConvertion_BigInt"((varAdditionalData->'itemList'->'items'->(i-1)->'entities'->>'combinedBudgetSectionDetail_RefID')::bigint)) || '::bigint,
										' || (SELECT "SchSysAsset"."Func_GetStringLiteralConvertion_BigInt"((varAdditionalData->'itemList'->'items'->(i-1)->'entities'->>'product_RefID')::bigint)) || '::bigint, 
										' || (SELECT "SchSysAsset"."Func_GetStringLiteralConvertion_VarChar"((varAdditionalData->'itemList'->'items'->(i-1)->'entities'->>'quantity')::varchar)) || '::numeric, 
										' || (SELECT "SchSysAsset"."Func_GetStringLiteralConvertion_BigInt"((varAdditionalData->'itemList'->'items'->(i-1)->'entities'->>'quantityUnit_RefID')::bigint)) || '::bigint, 
										' || (SELECT "SchSysAsset"."Func_GetStringLiteralConvertion_BigInt"((varAdditionalData->'itemList'->'items'->(i-1)->'entities'->>'productUnitPriceCurrency_RefID')::bigint)) || '::bigint, 
										' || (SELECT "SchSysAsset"."Func_GetStringLiteralConvertion_VarChar"((varAdditionalData->'itemList'->'items'->(i-1)->'entities'->>'productUnitPriceCurrencyValue')::varchar)) || '::numeric, 
										' || (SELECT "SchSysAsset"."Func_GetStringLiteralConvertion_VarChar"((varAdditionalData->'itemList'->'items'->(i-1)->'entities'->>'productUnitPriceCurrencyExchangeRate')::varchar)) || '::numeric, 
										' || (SELECT "SchSysAsset"."Func_GetStringLiteralConvertion_VarChar"((varAdditionalData->'itemList'->'items'->(i-1)->'entities'->>'remarks')::varchar)) || '::varchar
									)
								';
							--RAISE NOTICE '%', varSQL;
							EXECUTE varSQL;
						END LOOP;
				END IF;
			END IF;
			-----[ ADDITIONAL DATA PROCESSING ]-----( END )-----
		END IF;

	---[ Data Return ]------------------------------------------------------------------------------
		IF (varSignEligibleToProcess = TRUE) THEN
			RETURN NEXT varRecSetOutput;
		END IF;

	---[ Exception Handling ]-----------------------------------------------------------------------
		--EXCEPTION WHEN OTHERS THEN ...

END;
$BODY$;

ALTER FUNCTION "SchData-OLTP-Finance"."Func_TblAdvance_SET"(bigint, bigint, character varying, character varying, bigint, bigint, timestamp with time zone, bigint, bigint, bigint, bigint, character varying, character varying, json)
    OWNER TO "SysEngine";
