--
-- PostgreSQL database dump
--

\restrict 9ejzyEJNDaFGEkSkzoyTVFHTLlchisTPrjSOjGYw5JZ8auFyvhti9DaNyRcxPpT

-- Dumped from database version 18.3 (Debian 18.3-1.pgdg13+1)
-- Dumped by pg_dump version 18.3 (Debian 18.3-1.pgdg13+1)

-- Started on 2026-03-14 14:10:31 WIB

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET transaction_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 7 (class 2615 OID 1933078)
-- Name: SchBudgeting; Type: SCHEMA; Schema: -; Owner: SysEngine
--

CREATE SCHEMA "SchBudgeting";


ALTER SCHEMA "SchBudgeting" OWNER TO "SysEngine";

--
-- TOC entry 8 (class 2615 OID 1933079)
-- Name: SchSystem; Type: SCHEMA; Schema: -; Owner: SysEngine
--

CREATE SCHEMA "SchSystem";


ALTER SCHEMA "SchSystem" OWNER TO "SysEngine";

--
-- TOC entry 9 (class 2615 OID 2200)
-- Name: public; Type: SCHEMA; Schema: -; Owner: postgres
--

-- *not* creating schema, since initdb creates it


ALTER SCHEMA public OWNER TO postgres;

--
-- TOC entry 2 (class 3079 OID 1933080)
-- Name: dblink; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS dblink WITH SCHEMA public;


--
-- TOC entry 3720 (class 0 OID 0)
-- Dependencies: 2
-- Name: EXTENSION dblink; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION dblink IS 'connect to other PostgreSQL databases from within a database';


--
-- TOC entry 3 (class 3079 OID 1933126)
-- Name: pg_stat_statements; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS pg_stat_statements WITH SCHEMA public;


--
-- TOC entry 3721 (class 0 OID 0)
-- Dependencies: 3
-- Name: EXTENSION pg_stat_statements; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION pg_stat_statements IS 'track planning and execution statistics of all SQL statements executed';


--
-- TOC entry 951 (class 1247 OID 1933172)
-- Name: HoldFuncSys_General_FeedBackQuery; Type: TYPE; Schema: SchSystem; Owner: SysEngine
--

CREATE TYPE "SchSystem"."HoldFuncSys_General_FeedBackQuery" AS (
	"SignSuccess" smallint,
	"SignRecordType" character varying,
	"SignRecordID" bigint,
	"SignMessage" character varying,
	"AdditionalData" json
);


ALTER TYPE "SchSystem"."HoldFuncSys_General_FeedBackQuery" OWNER TO "SysEngine";

--
-- TOC entry 954 (class 1247 OID 1933175)
-- Name: HoldFuncSys_General_GetDataPickSet; Type: TYPE; Schema: SchSystem; Owner: SysEngine
--

CREATE TYPE "SchSystem"."HoldFuncSys_General_GetDataPickSet" AS (
	"Sys_ID" bigint,
	"ProcessedData_FlatText" character varying,
	"ProcessedData_TextArray" character varying[],
	"ProcessedData_JSON" json,
	"RawData_JSON" json
);


ALTER TYPE "SchSystem"."HoldFuncSys_General_GetDataPickSet" OWNER TO "SysEngine";

--
-- TOC entry 319 (class 1255 OID 1933176)
-- Name: Func_TblCombinedBudgetSectionDetailAbsorption_INSERT(character varying, bigint, timestamp with time zone, bigint, bigint, bigint, bigint, numeric, numeric, json); Type: FUNCTION; Schema: SchBudgeting; Owner: SysEngine
--

CREATE FUNCTION "SchBudgeting"."Func_TblCombinedBudgetSectionDetailAbsorption_INSERT"(character varying, bigint, timestamp with time zone, bigint, bigint, bigint, bigint, numeric, numeric, json) RETURNS SETOF "SchSystem"."HoldFuncSys_General_FeedBackQuery"
    LANGUAGE plpgsql
    AS $_$
/*----------------------------------------------------------------------------------------------------
▪ Nama                : "SchBudgeting"."Func_TblCombinedBudgetSectionDetailAbsorption_INSERT"
▪ Versi               : 1.00.0000
▪ Tanggal 
     ► Pemutakhiran   : 2023-12-04
     ► Pembuatan      : 2023-12-04
▪ Input               : varSysDataAnnotation (varchar - Mandatory)
						varIDSession (bigint - Mandatory)
						varEntryDateTimeTZ (timestamptz - Mandatory)
						varSysPartitionRemovableRecordKey_RefID (bigint - Mandatory)
						varBranch_RefID (bigint - Mandatory)
						varBaseCurrency_RefID (bigint - Mandatory)
						------------------------------
						varCombinedBudgetSectionDetail_RefID (bigint - Mandatory)
						varQuantityAbsorption (numeric - Mandatory)
						varPriceBaseCurrencyAbsorptionValue	(numeric - Mandatory)
						varAbsorptionDetail	(json - Mandatory)
						------------------------------
▪ Output              : varRecSetOutput ("SchSystem"."HoldFuncSys_General_FeedBackQuery")
▪ Keterkaitan Fungsi  : -
▪ Deskripsi           : Memasukan data (INSERT) pada tabel TblCombinedBudgetSectionDetailAbsorption
▪ Copyright           : Zheta © 2023

----------------------------------------------------------------------------------------------------*/

DECLARE
	---[ Input Variable(s) ]------------------------------------------------------------------------
		varSysDataAnnotation						ALIAS FOR $1;
		varIDSession								ALIAS FOR $2;
		varEntryDateTimeTZ							ALIAS FOR $3;
		varSysPartitionRemovableRecordKey_RefID		ALIAS FOR $4;
		varBranch_RefID								ALIAS FOR $5;
		varBaseCurrency_RefID						ALIAS FOR $6;
		------------------------------
		varCombinedBudgetSectionDetail_RefID		ALIAS FOR $7;
		varQuantityAbsorption						ALIAS FOR $8;
		varPriceBaseCurrencyAbsorptionValue			ALIAS FOR $9;
		varAbsorptionDetail							ALIAS FOR $10;

	---[ Output Variable(s) ]-----------------------------------------------------------------------
		varRecSetOutput								"SchSystem"."HoldFuncSys_General_FeedBackQuery"%rowtype;

	---[ Intermediate Variable(s) ]-----------------------------------------------------------------
		varSystemNoticeTag							varchar;
		varSignEligibleToProcess					boolean;

BEGIN
	---[ Data Initializing ]------------------------------------------------------------------------
		--varSystemNoticeTag := "SchSysAsset"."Func_GetSystemNoticeTag"();
		varSignEligibleToProcess := FALSE;

		IF (varSignEligibleToProcess = FALSE) THEN
			varSignEligibleToProcess := TRUE;
		END IF;

		IF (varSignEligibleToProcess = TRUE) THEN
		END IF;


	---[ Data Processing ]--------------------------------------------------------------------------
		IF (varSignEligibleToProcess = TRUE) THEN
			INSERT INTO 
				"SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption"
					(
					"Sys_Data_Annotation",
					"Sys_Data_Entry_LoginSession_RefID",
					"Sys_Data_Entry_DateTimeTZ",
					"Sys_Partition_RemovableRecord_Key_RefID",
					"Sys_Branch_RefID",
					"Sys_BaseCurrency_RefID",
					------------------------------
					"CombinedBudgetSectionDetail_RefID",
					"QuantityAbsorption",
					"PriceBaseCurrencyAbsorptionValue",
					"AbsorptionDetail"
					)
				VALUES
					(
					varSysDataAnnotation,
					varIDSession,
					varEntryDateTimeTZ,
					varSysPartitionRemovableRecordKey_RefID,
					varBranch_RefID,
					varBaseCurrency_RefID,
					------------------------------
					varCombinedBudgetSectionDetail_RefID,
					varQuantityAbsorption,
					varPriceBaseCurrencyAbsorptionValue,
					varAbsorptionDetail
					);
		END IF;


	---[ Data Return ]-----------------------------------------------------------------------------
		IF (varSignEligibleToProcess = TRUE) THEN
			varRecSetOutput."SignSuccess" := 1;
			varRecSetOutput."SignRecordType" := 'Sys_RPK';
			varRecSetOutput."SignRecordID" := CURRVAL('"SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_Sys_RPK_seq"');
			varRecSetOutput."SignMessage" := null;

			RETURN NEXT varRecSetOutput;
		END IF;


	---[ Exception Handling ]-----------------------------------------------------------------------
		--EXCEPTION WHEN OTHERS THEN ...

END;
$_$;


ALTER FUNCTION "SchBudgeting"."Func_TblCombinedBudgetSectionDetailAbsorption_INSERT"(character varying, bigint, timestamp with time zone, bigint, bigint, bigint, bigint, numeric, numeric, json) OWNER TO "SysEngine";

--
-- TOC entry 320 (class 1255 OID 1933177)
-- Name: Func_TblCombinedBudgetSectionDetailAbsorption_UPDATE(bigint, bigint, timestamp with time zone, bigint, bigint, bigint, bigint, numeric, numeric, json); Type: FUNCTION; Schema: SchBudgeting; Owner: SysEngine
--

CREATE FUNCTION "SchBudgeting"."Func_TblCombinedBudgetSectionDetailAbsorption_UPDATE"(bigint, bigint, timestamp with time zone, bigint, bigint, bigint, bigint, numeric, numeric, json) RETURNS SETOF "SchSystem"."HoldFuncSys_General_FeedBackQuery"
    LANGUAGE plpgsql
    AS $_$
/*----------------------------------------------------------------------------------------------------
▪ Nama                : "SchBudgeting"."Func_TblCombinedBudgetSectionDetailAbsorption_UPDATE"
▪ Versi               : 1.00.0000
▪ Tanggal 
     ► Pemutakhiran   : 2023-12-04
     ► Pembuatan      : 2023-12-04
▪ Input               : varID (bigint - Mandatory)
						varIDSession (bigint - Mandatory)
						varEditDateTimeTZ (timestamptz - Mandatory)
						varSysPartitionRemovableRecordKey_RefID (bigint - Mandatory)
						varBranch_RefID (bigint - Mandatory)
						varBaseCurrency_RefID (bigint - Mandatory)
						------------------------------
						varCombinedBudgetSectionDetail_RefID (bigint - Mandatory)
						varQuantityAbsorption (numeric - Mandatory)
						varPriceBaseCurrencyAbsorptionValue	(numeric - Mandatory)
						varAbsorptionDetail	(json - Mandatory)
						------------------------------
▪ Output              : varRecSetOutput ("SchSystem"."HoldFuncSys_General_FeedBackQuery")
▪ Keterkaitan Fungsi  : -
▪ Deskripsi           : Memutakhirkan data (UPDATE) pada tabel TblCombinedBudgetSectionDetailAbsorption
▪ Copyright           : Zheta © 2023

----------------------------------------------------------------------------------------------------*/

DECLARE
	---[ Input Variable(s) ]------------------------------------------------------------------------
		varID										ALIAS FOR $1;
		varIDSession								ALIAS FOR $2;
		varEditDateTimeTZ							ALIAS FOR $3;
		varSysPartitionRemovableRecordKey_RefID		ALIAS FOR $4;
		varBranch_RefID								ALIAS FOR $5;
		varBaseCurrency_RefID						ALIAS FOR $6;
		------------------------------
		varCombinedBudgetSectionDetail_RefID		ALIAS FOR $7;
		varQuantityAbsorption						ALIAS FOR $8;
		varPriceBaseCurrencyAbsorptionValue			ALIAS FOR $9;
		varAbsorptionDetail							ALIAS FOR $10;

	---[ Output Variable(s) ]-----------------------------------------------------------------------
		varRecSetOutput								"SchSystem"."HoldFuncSys_General_FeedBackQuery"%rowtype;

	---[ Intermediate Variable(s) ]-----------------------------------------------------------------
		varSystemNoticeTag							varchar;
		varSignEligibleToProcess					boolean;

BEGIN
	---[ Data Initializing ]------------------------------------------------------------------------
		--varSystemNoticeTag := "SchSysAsset"."Func_GetSystemNoticeTag"();
		varSignEligibleToProcess := FALSE;

		IF (varSignEligibleToProcess = FALSE) THEN
			varSignEligibleToProcess := TRUE;
		END IF;

		IF (varSignEligibleToProcess = TRUE) THEN
		END IF;


	---[ Data Processing ]--------------------------------------------------------------------------
		IF (varSignEligibleToProcess = TRUE) THEN
			UPDATE
				"SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption"
			SET
				"Sys_Data_Edit_LoginSession_RefID" = varIDSession,
				"Sys_Data_Edit_DateTimeTZ" = varEditDateTimeTZ,
				"Sys_Partition_RemovableRecord_Key_RefID" = varSysPartitionRemovableRecordKey_RefID,
				"Sys_Branch_RefID" = varBranch_RefID,
				"Sys_BaseCurrency_RefID" = varBaseCurrency_RefID,
				------------------------------
				"CombinedBudgetSectionDetail_RefID" = varCombinedBudgetSectionDetail_RefID,
				"QuantityAbsorption" = varQuantityAbsorption,
				"PriceBaseCurrencyAbsorptionValue" = varPriceBaseCurrencyAbsorptionValue,
				"AbsorptionDetail" = varAbsorptionDetail
			WHERE
				"Sys_PID" = varID
				OR
				"Sys_SID" = varID;
		END IF;


	---[ Data Return ]-----------------------------------------------------------------------------
		IF (varSignEligibleToProcess = TRUE) THEN
			varRecSetOutput."SignSuccess" := 1;
			varRecSetOutput."SignRecordType" := 'Sys_RPK';
			varRecSetOutput."SignRecordID" := (SELECT "Sys_RPK" FROM "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption" WHERE "Sys_PID" = varID OR "Sys_SID" = varID LIMIT 1);
			varRecSetOutput."SignMessage" := null;

			RETURN NEXT varRecSetOutput;
		END IF;


	---[ Exception Handling ]-----------------------------------------------------------------------
		--EXCEPTION WHEN OTHERS THEN ...

END;
$_$;


ALTER FUNCTION "SchBudgeting"."Func_TblCombinedBudgetSectionDetailAbsorption_UPDATE"(bigint, bigint, timestamp with time zone, bigint, bigint, bigint, bigint, numeric, numeric, json) OWNER TO "SysEngine";

--
-- TOC entry 321 (class 1255 OID 1933178)
-- Name: FuncSys_General_CreateSequence(character varying, character varying); Type: FUNCTION; Schema: SchSystem; Owner: SysEngine
--

CREATE FUNCTION "SchSystem"."FuncSys_General_CreateSequence"(character varying, character varying) RETURNS void
    LANGUAGE plpgsql
    AS $_$
/*----------------------------------------------------------------------------------------------------
▪ Nama               : "SchSystem""."FuncSys_General_CreateSequence"
▪ Versi              : 1.00.0000
▪ Tanggal            : 2020-12-02
▪ Input              : varSchemaName (varchar) 
					   varSequenceName (varchar)
▪ Output             : void
▪ Keterkaitan Fungsi : -
▪ Deskripsi          : Fungsi ini digunakan untuk membangun Sequence
▪ Copyright          : Zheta © 2020
----------------------------------------------------------------------------------------------------*/

DECLARE
   	varSchemaName		ALIAS FOR $1;
   	varSequenceName		ALIAS FOR $2;
   	varSQL				varchar;

BEGIN
	varSQL := '
		CREATE SEQUENCE IF NOT EXISTS "' || varSchemaName || '"."' || varSequenceName || '"
			INCREMENT 1
			START 1
			MINVALUE 1
			MAXVALUE 9223372036854775807
			CACHE 1;
		';
	EXECUTE varSQL;
END;
$_$;


ALTER FUNCTION "SchSystem"."FuncSys_General_CreateSequence"(character varying, character varying) OWNER TO "SysEngine";

--
-- TOC entry 322 (class 1255 OID 1933179)
-- Name: FuncSys_General_GetSequence(character varying, character varying, bigint); Type: FUNCTION; Schema: SchSystem; Owner: SysEngine
--

CREATE FUNCTION "SchSystem"."FuncSys_General_GetSequence"(character varying, character varying, bigint DEFAULT (1)::bigint) RETURNS bigint
    LANGUAGE plpgsql
    AS $_$
/*----------------------------------------------------------------------------------------------------
▪ Nama               : "SchSystem""."FuncSys_General_GetSequence"
▪ Versi              : 1.00.0002
▪ Tanggal            : 
▪ Tanggal 
     ► Pembuatan     : 2020-12-02
     ► Pemutakhiran  : 2022-01-14
▪ Input              : varSchemaName (varchar - Mandatory) 
					   varSequenceName (varchar - Mandatory)
					   varOffset (bigint - Optional)
▪ Output             : varOutput (bigint)
▪ Keterkaitan Fungsi : -
▪ Deskripsi          : Fungsi ini digunakan untuk mendapatkan nilai dari Sequence
▪ Copyright          : Zheta © 2020 - 2022

----[ SQL Example(s) ]------------------------------------------------------------------------------

▪ SELECT * FROM "SchSystem"."FuncSys_General_GetSequence"('SchBudgeting', 'TblTEMP_BudgetExpenseLineCeilingObjects_Sys_RPK_seq')

----------------------------------------------------------------------------------------------------*/

DECLARE
	varSchemaName		ALIAS FOR $1;
	varSequenceName		ALIAS FOR $2;
	varOffset			ALIAS FOR $3;
	
	varSQL				varchar;

	varOutput			bigint;

	varTemp				bigint;

BEGIN
	varSQL := '
		SELECT NEXTVAL(''"' || varSchemaName || '"."' || varSequenceName || '"'')
		';
	EXECUTE varSQL INTO varOutput;

    IF (varOffset > 1) THEN
		varSQL := '
			SELECT SETVAL(''"' || varSchemaName || '"."' || varSequenceName || '"'', (LASTVAL() + ' || varOffset || ' - 1))
			';
		EXECUTE varSQL INTO varOutput;
	END IF;
	
	RETURN varOutput;
END;

$_$;


ALTER FUNCTION "SchSystem"."FuncSys_General_GetSequence"(character varying, character varying, bigint) OWNER TO "SysEngine";

--
-- TOC entry 323 (class 1255 OID 1933180)
-- Name: FuncSys_General_SetSequence(character varying, character varying, bigint); Type: FUNCTION; Schema: SchSystem; Owner: SysEngine
--

CREATE FUNCTION "SchSystem"."FuncSys_General_SetSequence"(character varying, character varying, bigint) RETURNS void
    LANGUAGE plpgsql
    AS $_$
/*----------------------------------------------------------------------------------------------------
▪ Nama               : "SchSysConfig"."FuncSys_General_SetSequence"
▪ Versi              : 1.00.0001
▪ Tanggal            : 2021-07-27
▪ Input              : varSchemaName (varchar)
                       varTableName (varchar)
▪ Output             : void
▪ Keterkaitan Fungsi : -
▪ Deskripsi          : Fungsi ini digunakan untuk menginisialisasi ulang sequence yang terkait 
					   dengan Skema (varSchemaName) dan Table (varTableName) tertentu kembali
                       keangka tertentu (varSequenceNumber)
▪ Copyright          : Zheta © 2018 - 2021
----------------------------------------------------------------------------------------------------*/

DECLARE
   varSchemaName		ALIAS FOR $1;
   varTableName			ALIAS FOR $2;
   varSequenceNumber	ALIAS FOR $3;
   varSQL				varchar;
   varSequenceName		varchar;

BEGIN
	IF ((LENGTH(varTableName) >= 13) AND (SUBSTR(varTableName, 1, 13) = 'TblRotateLog_'))  THEN
		varSequenceName :=  varTableName || '_Sys_RPK_seq';
	ELSE
		varSQL :='
			SELECT
				SUBSTRING("SubSQL"."SequenceField", (10 + LENGTH(''' || varSchemaName || ''') + 4), (LENGTH("SubSQL"."SequenceField") - LENGTH(''' || varSchemaName || ''') - 13 - 13))
			FROM
				(
				SELECT 
					column_default AS "SequenceField"
				FROM
					information_schema.columns 
				WHERE 
					table_schema LIKE ''' || varSchemaName || '''
					AND
					table_name LIKE ''' || varTableName || '''
					AND
					column_default LIKE ''nextval(%''
					AND
					column_default LIKE ''%::regclass)''
				) AS "SubSQL"
			';
		EXECUTE varSQL INTO varSequenceName;
	END IF;

   ---> Set Sequence
	varSQL :='
		ALTER SEQUENCE 
			"' || varSchemaName || '"."' || varSequenceName || '"
		RESTART WITH ' || varSequenceNumber;
	EXECUTE varSQL;
END;
$_$;


ALTER FUNCTION "SchSystem"."FuncSys_General_SetSequence"(character varying, character varying, bigint) OWNER TO "SysEngine";

--
-- TOC entry 228 (class 1259 OID 1933181)
-- Name: TblCombinedBudgetSectionDetailAbsorption_Sys_RPK_seq; Type: SEQUENCE; Schema: SchBudgeting; Owner: SysEngine
--

CREATE SEQUENCE "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_Sys_RPK_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_Sys_RPK_seq" OWNER TO "SysEngine";

SET default_tablespace = '';

--
-- TOC entry 229 (class 1259 OID 1933182)
-- Name: TblCombinedBudgetSectionDetailAbsorption; Type: TABLE; Schema: SchBudgeting; Owner: SysEngine
--

CREATE TABLE "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_Sys_RPK_seq"'::regclass) NOT NULL,
    "Sys_Data_Annotation" character varying(1024),
    "Sys_Data_Entry_LoginSession_RefID" bigint,
    "Sys_Data_Entry_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Edit_LoginSession_RefID" bigint,
    "Sys_Data_Edit_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Delete_LoginSession_RefID" bigint,
    "Sys_Data_Delete_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Hidden_LoginSession_RefID" bigint,
    "Sys_Data_Hidden_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Authentication_LoginSession_RefID" bigint,
    "Sys_Data_Authentication_DateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "CombinedBudgetSectionDetail_RefID" bigint,
    "QuantityAbsorption" numeric(20,2),
    "PriceBaseCurrencyAbsorptionValue" numeric(20,2),
    "AbsorptionDetail" json
)
PARTITION BY LIST ("Sys_Partition_RemovableRecord_Key_RefID");


ALTER TABLE "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption" OWNER TO "SysEngine";

SET default_table_access_method = heap;

--
-- TOC entry 230 (class 1259 OID 1933187)
-- Name: TblCombinedBudgetSectionDetailAbsorption_DEF; Type: TABLE; Schema: SchBudgeting; Owner: SysEngine
--

CREATE TABLE "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_DEF" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_Sys_RPK_seq"'::regclass) NOT NULL,
    "Sys_Data_Annotation" character varying(1024),
    "Sys_Data_Entry_LoginSession_RefID" bigint,
    "Sys_Data_Entry_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Edit_LoginSession_RefID" bigint,
    "Sys_Data_Edit_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Delete_LoginSession_RefID" bigint,
    "Sys_Data_Delete_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Hidden_LoginSession_RefID" bigint,
    "Sys_Data_Hidden_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Authentication_LoginSession_RefID" bigint,
    "Sys_Data_Authentication_DateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "CombinedBudgetSectionDetail_RefID" bigint,
    "QuantityAbsorption" numeric(20,2),
    "PriceBaseCurrencyAbsorptionValue" numeric(20,2),
    "AbsorptionDetail" json
);


ALTER TABLE "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_DEF" OWNER TO "SysEngine";

--
-- TOC entry 231 (class 1259 OID 1933194)
-- Name: TblCombinedBudgetSectionDetailAbsorption_PMT; Type: TABLE; Schema: SchBudgeting; Owner: SysEngine
--

CREATE TABLE "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_PMT" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_Sys_RPK_seq"'::regclass) NOT NULL,
    "Sys_Data_Annotation" character varying(1024),
    "Sys_Data_Entry_LoginSession_RefID" bigint,
    "Sys_Data_Entry_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Edit_LoginSession_RefID" bigint,
    "Sys_Data_Edit_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Delete_LoginSession_RefID" bigint,
    "Sys_Data_Delete_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Hidden_LoginSession_RefID" bigint,
    "Sys_Data_Hidden_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Authentication_LoginSession_RefID" bigint,
    "Sys_Data_Authentication_DateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "CombinedBudgetSectionDetail_RefID" bigint,
    "QuantityAbsorption" numeric(20,2),
    "PriceBaseCurrencyAbsorptionValue" numeric(20,2),
    "AbsorptionDetail" json
);


ALTER TABLE "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_PMT" OWNER TO "SysEngine";

--
-- TOC entry 232 (class 1259 OID 1933201)
-- Name: TblCombinedBudgetSectionDetailAbsorption_RMV; Type: TABLE; Schema: SchBudgeting; Owner: SysEngine
--

CREATE TABLE "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_Sys_RPK_seq"'::regclass) NOT NULL,
    "Sys_Data_Annotation" character varying(1024),
    "Sys_Data_Entry_LoginSession_RefID" bigint,
    "Sys_Data_Entry_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Edit_LoginSession_RefID" bigint,
    "Sys_Data_Edit_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Delete_LoginSession_RefID" bigint,
    "Sys_Data_Delete_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Hidden_LoginSession_RefID" bigint,
    "Sys_Data_Hidden_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Authentication_LoginSession_RefID" bigint,
    "Sys_Data_Authentication_DateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "CombinedBudgetSectionDetail_RefID" bigint,
    "QuantityAbsorption" numeric(20,2),
    "PriceBaseCurrencyAbsorptionValue" numeric(20,2),
    "AbsorptionDetail" json
)
PARTITION BY LIST ("Sys_Partition_RemovableRecord_Key_RefID");


ALTER TABLE "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV" OWNER TO "SysEngine";

--
-- TOC entry 233 (class 1259 OID 1933206)
-- Name: TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000001; Type: TABLE; Schema: SchBudgeting; Owner: SysEngine
--

CREATE TABLE "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000001" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_Sys_RPK_seq"'::regclass) CONSTRAINT "TblCombinedBudgetSectionDetailAbsorption_RMV_8_Sys_RPK_not_null" NOT NULL,
    "Sys_Data_Annotation" character varying(1024),
    "Sys_Data_Entry_LoginSession_RefID" bigint,
    "Sys_Data_Entry_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Edit_LoginSession_RefID" bigint,
    "Sys_Data_Edit_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Delete_LoginSession_RefID" bigint,
    "Sys_Data_Delete_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Hidden_LoginSession_RefID" bigint,
    "Sys_Data_Hidden_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Authentication_LoginSession_RefID" bigint,
    "Sys_Data_Authentication_DateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "CombinedBudgetSectionDetail_RefID" bigint,
    "QuantityAbsorption" numeric(20,2),
    "PriceBaseCurrencyAbsorptionValue" numeric(20,2),
    "AbsorptionDetail" json
);


ALTER TABLE "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000001" OWNER TO "SysEngine";

--
-- TOC entry 234 (class 1259 OID 1933213)
-- Name: TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000002; Type: TABLE; Schema: SchBudgeting; Owner: SysEngine
--

CREATE TABLE "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000002" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_Sys_RPK_seq"'::regclass) CONSTRAINT "TblCombinedBudgetSectionDetailAbsorption_RMV__Sys_RPK_not_null1" NOT NULL,
    "Sys_Data_Annotation" character varying(1024),
    "Sys_Data_Entry_LoginSession_RefID" bigint,
    "Sys_Data_Entry_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Edit_LoginSession_RefID" bigint,
    "Sys_Data_Edit_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Delete_LoginSession_RefID" bigint,
    "Sys_Data_Delete_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Hidden_LoginSession_RefID" bigint,
    "Sys_Data_Hidden_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Authentication_LoginSession_RefID" bigint,
    "Sys_Data_Authentication_DateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "CombinedBudgetSectionDetail_RefID" bigint,
    "QuantityAbsorption" numeric(20,2),
    "PriceBaseCurrencyAbsorptionValue" numeric(20,2),
    "AbsorptionDetail" json
);


ALTER TABLE "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000002" OWNER TO "SysEngine";

--
-- TOC entry 235 (class 1259 OID 1933220)
-- Name: TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000003; Type: TABLE; Schema: SchBudgeting; Owner: SysEngine
--

CREATE TABLE "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000003" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_Sys_RPK_seq"'::regclass) CONSTRAINT "TblCombinedBudgetSectionDetailAbsorption_RMV__Sys_RPK_not_null2" NOT NULL,
    "Sys_Data_Annotation" character varying(1024),
    "Sys_Data_Entry_LoginSession_RefID" bigint,
    "Sys_Data_Entry_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Edit_LoginSession_RefID" bigint,
    "Sys_Data_Edit_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Delete_LoginSession_RefID" bigint,
    "Sys_Data_Delete_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Hidden_LoginSession_RefID" bigint,
    "Sys_Data_Hidden_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Authentication_LoginSession_RefID" bigint,
    "Sys_Data_Authentication_DateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "CombinedBudgetSectionDetail_RefID" bigint,
    "QuantityAbsorption" numeric(20,2),
    "PriceBaseCurrencyAbsorptionValue" numeric(20,2),
    "AbsorptionDetail" json
);


ALTER TABLE "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000003" OWNER TO "SysEngine";

--
-- TOC entry 236 (class 1259 OID 1933227)
-- Name: TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000004; Type: TABLE; Schema: SchBudgeting; Owner: SysEngine
--

CREATE TABLE "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000004" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_Sys_RPK_seq"'::regclass) CONSTRAINT "TblCombinedBudgetSectionDetailAbsorption_RMV__Sys_RPK_not_null3" NOT NULL,
    "Sys_Data_Annotation" character varying(1024),
    "Sys_Data_Entry_LoginSession_RefID" bigint,
    "Sys_Data_Entry_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Edit_LoginSession_RefID" bigint,
    "Sys_Data_Edit_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Delete_LoginSession_RefID" bigint,
    "Sys_Data_Delete_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Hidden_LoginSession_RefID" bigint,
    "Sys_Data_Hidden_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Authentication_LoginSession_RefID" bigint,
    "Sys_Data_Authentication_DateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "CombinedBudgetSectionDetail_RefID" bigint,
    "QuantityAbsorption" numeric(20,2),
    "PriceBaseCurrencyAbsorptionValue" numeric(20,2),
    "AbsorptionDetail" json
);


ALTER TABLE "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000004" OWNER TO "SysEngine";

--
-- TOC entry 237 (class 1259 OID 1933234)
-- Name: TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000005; Type: TABLE; Schema: SchBudgeting; Owner: SysEngine
--

CREATE TABLE "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000005" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_Sys_RPK_seq"'::regclass) CONSTRAINT "TblCombinedBudgetSectionDetailAbsorption_RMV__Sys_RPK_not_null4" NOT NULL,
    "Sys_Data_Annotation" character varying(1024),
    "Sys_Data_Entry_LoginSession_RefID" bigint,
    "Sys_Data_Entry_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Edit_LoginSession_RefID" bigint,
    "Sys_Data_Edit_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Delete_LoginSession_RefID" bigint,
    "Sys_Data_Delete_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Hidden_LoginSession_RefID" bigint,
    "Sys_Data_Hidden_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Authentication_LoginSession_RefID" bigint,
    "Sys_Data_Authentication_DateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "CombinedBudgetSectionDetail_RefID" bigint,
    "QuantityAbsorption" numeric(20,2),
    "PriceBaseCurrencyAbsorptionValue" numeric(20,2),
    "AbsorptionDetail" json
);


ALTER TABLE "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000005" OWNER TO "SysEngine";

--
-- TOC entry 238 (class 1259 OID 1933241)
-- Name: TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000006; Type: TABLE; Schema: SchBudgeting; Owner: SysEngine
--

CREATE TABLE "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000006" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_Sys_RPK_seq"'::regclass) CONSTRAINT "TblCombinedBudgetSectionDetailAbsorption_RMV__Sys_RPK_not_null5" NOT NULL,
    "Sys_Data_Annotation" character varying(1024),
    "Sys_Data_Entry_LoginSession_RefID" bigint,
    "Sys_Data_Entry_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Edit_LoginSession_RefID" bigint,
    "Sys_Data_Edit_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Delete_LoginSession_RefID" bigint,
    "Sys_Data_Delete_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Hidden_LoginSession_RefID" bigint,
    "Sys_Data_Hidden_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Authentication_LoginSession_RefID" bigint,
    "Sys_Data_Authentication_DateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "CombinedBudgetSectionDetail_RefID" bigint,
    "QuantityAbsorption" numeric(20,2),
    "PriceBaseCurrencyAbsorptionValue" numeric(20,2),
    "AbsorptionDetail" json
);


ALTER TABLE "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000006" OWNER TO "SysEngine";

--
-- TOC entry 239 (class 1259 OID 1933248)
-- Name: TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000007; Type: TABLE; Schema: SchBudgeting; Owner: SysEngine
--

CREATE TABLE "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000007" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_Sys_RPK_seq"'::regclass) CONSTRAINT "TblCombinedBudgetSectionDetailAbsorption_RMV__Sys_RPK_not_null6" NOT NULL,
    "Sys_Data_Annotation" character varying(1024),
    "Sys_Data_Entry_LoginSession_RefID" bigint,
    "Sys_Data_Entry_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Edit_LoginSession_RefID" bigint,
    "Sys_Data_Edit_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Delete_LoginSession_RefID" bigint,
    "Sys_Data_Delete_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Hidden_LoginSession_RefID" bigint,
    "Sys_Data_Hidden_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Authentication_LoginSession_RefID" bigint,
    "Sys_Data_Authentication_DateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "CombinedBudgetSectionDetail_RefID" bigint,
    "QuantityAbsorption" numeric(20,2),
    "PriceBaseCurrencyAbsorptionValue" numeric(20,2),
    "AbsorptionDetail" json
);


ALTER TABLE "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000007" OWNER TO "SysEngine";

--
-- TOC entry 240 (class 1259 OID 1933255)
-- Name: TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000008; Type: TABLE; Schema: SchBudgeting; Owner: SysEngine
--

CREATE TABLE "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000008" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_Sys_RPK_seq"'::regclass) CONSTRAINT "TblCombinedBudgetSectionDetailAbsorption_RMV__Sys_RPK_not_null7" NOT NULL,
    "Sys_Data_Annotation" character varying(1024),
    "Sys_Data_Entry_LoginSession_RefID" bigint,
    "Sys_Data_Entry_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Edit_LoginSession_RefID" bigint,
    "Sys_Data_Edit_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Delete_LoginSession_RefID" bigint,
    "Sys_Data_Delete_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Hidden_LoginSession_RefID" bigint,
    "Sys_Data_Hidden_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Authentication_LoginSession_RefID" bigint,
    "Sys_Data_Authentication_DateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "CombinedBudgetSectionDetail_RefID" bigint,
    "QuantityAbsorption" numeric(20,2),
    "PriceBaseCurrencyAbsorptionValue" numeric(20,2),
    "AbsorptionDetail" json
);


ALTER TABLE "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000008" OWNER TO "SysEngine";

--
-- TOC entry 241 (class 1259 OID 1933262)
-- Name: TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000009; Type: TABLE; Schema: SchBudgeting; Owner: SysEngine
--

CREATE TABLE "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000009" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_Sys_RPK_seq"'::regclass) CONSTRAINT "TblCombinedBudgetSectionDetailAbsorption_RMV__Sys_RPK_not_null8" NOT NULL,
    "Sys_Data_Annotation" character varying(1024),
    "Sys_Data_Entry_LoginSession_RefID" bigint,
    "Sys_Data_Entry_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Edit_LoginSession_RefID" bigint,
    "Sys_Data_Edit_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Delete_LoginSession_RefID" bigint,
    "Sys_Data_Delete_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Hidden_LoginSession_RefID" bigint,
    "Sys_Data_Hidden_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Authentication_LoginSession_RefID" bigint,
    "Sys_Data_Authentication_DateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "CombinedBudgetSectionDetail_RefID" bigint,
    "QuantityAbsorption" numeric(20,2),
    "PriceBaseCurrencyAbsorptionValue" numeric(20,2),
    "AbsorptionDetail" json
);


ALTER TABLE "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000009" OWNER TO "SysEngine";

--
-- TOC entry 242 (class 1259 OID 1933269)
-- Name: TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000010; Type: TABLE; Schema: SchBudgeting; Owner: SysEngine
--

CREATE TABLE "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000010" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_Sys_RPK_seq"'::regclass) CONSTRAINT "TblCombinedBudgetSectionDetailAbsorption_RMV__Sys_RPK_not_null9" NOT NULL,
    "Sys_Data_Annotation" character varying(1024),
    "Sys_Data_Entry_LoginSession_RefID" bigint,
    "Sys_Data_Entry_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Edit_LoginSession_RefID" bigint,
    "Sys_Data_Edit_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Delete_LoginSession_RefID" bigint,
    "Sys_Data_Delete_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Hidden_LoginSession_RefID" bigint,
    "Sys_Data_Hidden_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Authentication_LoginSession_RefID" bigint,
    "Sys_Data_Authentication_DateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "CombinedBudgetSectionDetail_RefID" bigint,
    "QuantityAbsorption" numeric(20,2),
    "PriceBaseCurrencyAbsorptionValue" numeric(20,2),
    "AbsorptionDetail" json
);


ALTER TABLE "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000010" OWNER TO "SysEngine";

--
-- TOC entry 243 (class 1259 OID 1933276)
-- Name: TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000011; Type: TABLE; Schema: SchBudgeting; Owner: SysEngine
--

CREATE TABLE "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000011" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_Sys_RPK_seq"'::regclass) CONSTRAINT "TblCombinedBudgetSectionDetailAbsorption_RMV_Sys_RPK_not_null10" NOT NULL,
    "Sys_Data_Annotation" character varying(1024),
    "Sys_Data_Entry_LoginSession_RefID" bigint,
    "Sys_Data_Entry_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Edit_LoginSession_RefID" bigint,
    "Sys_Data_Edit_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Delete_LoginSession_RefID" bigint,
    "Sys_Data_Delete_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Hidden_LoginSession_RefID" bigint,
    "Sys_Data_Hidden_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Authentication_LoginSession_RefID" bigint,
    "Sys_Data_Authentication_DateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "CombinedBudgetSectionDetail_RefID" bigint,
    "QuantityAbsorption" numeric(20,2),
    "PriceBaseCurrencyAbsorptionValue" numeric(20,2),
    "AbsorptionDetail" json
);


ALTER TABLE "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000011" OWNER TO "SysEngine";

--
-- TOC entry 244 (class 1259 OID 1933283)
-- Name: TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000012; Type: TABLE; Schema: SchBudgeting; Owner: SysEngine
--

CREATE TABLE "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000012" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_Sys_RPK_seq"'::regclass) CONSTRAINT "TblCombinedBudgetSectionDetailAbsorption_RMV_Sys_RPK_not_null11" NOT NULL,
    "Sys_Data_Annotation" character varying(1024),
    "Sys_Data_Entry_LoginSession_RefID" bigint,
    "Sys_Data_Entry_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Edit_LoginSession_RefID" bigint,
    "Sys_Data_Edit_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Delete_LoginSession_RefID" bigint,
    "Sys_Data_Delete_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Hidden_LoginSession_RefID" bigint,
    "Sys_Data_Hidden_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Authentication_LoginSession_RefID" bigint,
    "Sys_Data_Authentication_DateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "CombinedBudgetSectionDetail_RefID" bigint,
    "QuantityAbsorption" numeric(20,2),
    "PriceBaseCurrencyAbsorptionValue" numeric(20,2),
    "AbsorptionDetail" json
);


ALTER TABLE "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000012" OWNER TO "SysEngine";

--
-- TOC entry 245 (class 1259 OID 1933290)
-- Name: TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000013; Type: TABLE; Schema: SchBudgeting; Owner: SysEngine
--

CREATE TABLE "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000013" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_Sys_RPK_seq"'::regclass) CONSTRAINT "TblCombinedBudgetSectionDetailAbsorption_RMV_Sys_RPK_not_null12" NOT NULL,
    "Sys_Data_Annotation" character varying(1024),
    "Sys_Data_Entry_LoginSession_RefID" bigint,
    "Sys_Data_Entry_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Edit_LoginSession_RefID" bigint,
    "Sys_Data_Edit_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Delete_LoginSession_RefID" bigint,
    "Sys_Data_Delete_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Hidden_LoginSession_RefID" bigint,
    "Sys_Data_Hidden_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Authentication_LoginSession_RefID" bigint,
    "Sys_Data_Authentication_DateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "CombinedBudgetSectionDetail_RefID" bigint,
    "QuantityAbsorption" numeric(20,2),
    "PriceBaseCurrencyAbsorptionValue" numeric(20,2),
    "AbsorptionDetail" json
);


ALTER TABLE "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000013" OWNER TO "SysEngine";

--
-- TOC entry 246 (class 1259 OID 1933297)
-- Name: TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000014; Type: TABLE; Schema: SchBudgeting; Owner: SysEngine
--

CREATE TABLE "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000014" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_Sys_RPK_seq"'::regclass) CONSTRAINT "TblCombinedBudgetSectionDetailAbsorption_RMV_Sys_RPK_not_null13" NOT NULL,
    "Sys_Data_Annotation" character varying(1024),
    "Sys_Data_Entry_LoginSession_RefID" bigint,
    "Sys_Data_Entry_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Edit_LoginSession_RefID" bigint,
    "Sys_Data_Edit_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Delete_LoginSession_RefID" bigint,
    "Sys_Data_Delete_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Hidden_LoginSession_RefID" bigint,
    "Sys_Data_Hidden_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Authentication_LoginSession_RefID" bigint,
    "Sys_Data_Authentication_DateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "CombinedBudgetSectionDetail_RefID" bigint,
    "QuantityAbsorption" numeric(20,2),
    "PriceBaseCurrencyAbsorptionValue" numeric(20,2),
    "AbsorptionDetail" json
);


ALTER TABLE "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000014" OWNER TO "SysEngine";

--
-- TOC entry 247 (class 1259 OID 1933304)
-- Name: TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000015; Type: TABLE; Schema: SchBudgeting; Owner: SysEngine
--

CREATE TABLE "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000015" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_Sys_RPK_seq"'::regclass) CONSTRAINT "TblCombinedBudgetSectionDetailAbsorption_RMV_Sys_RPK_not_null14" NOT NULL,
    "Sys_Data_Annotation" character varying(1024),
    "Sys_Data_Entry_LoginSession_RefID" bigint,
    "Sys_Data_Entry_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Edit_LoginSession_RefID" bigint,
    "Sys_Data_Edit_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Delete_LoginSession_RefID" bigint,
    "Sys_Data_Delete_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Hidden_LoginSession_RefID" bigint,
    "Sys_Data_Hidden_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Authentication_LoginSession_RefID" bigint,
    "Sys_Data_Authentication_DateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "CombinedBudgetSectionDetail_RefID" bigint,
    "QuantityAbsorption" numeric(20,2),
    "PriceBaseCurrencyAbsorptionValue" numeric(20,2),
    "AbsorptionDetail" json
);


ALTER TABLE "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000015" OWNER TO "SysEngine";

--
-- TOC entry 248 (class 1259 OID 1933311)
-- Name: TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000016; Type: TABLE; Schema: SchBudgeting; Owner: SysEngine
--

CREATE TABLE "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000016" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_Sys_RPK_seq"'::regclass) CONSTRAINT "TblCombinedBudgetSectionDetailAbsorption_RMV_Sys_RPK_not_null15" NOT NULL,
    "Sys_Data_Annotation" character varying(1024),
    "Sys_Data_Entry_LoginSession_RefID" bigint,
    "Sys_Data_Entry_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Edit_LoginSession_RefID" bigint,
    "Sys_Data_Edit_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Delete_LoginSession_RefID" bigint,
    "Sys_Data_Delete_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Hidden_LoginSession_RefID" bigint,
    "Sys_Data_Hidden_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Authentication_LoginSession_RefID" bigint,
    "Sys_Data_Authentication_DateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "CombinedBudgetSectionDetail_RefID" bigint,
    "QuantityAbsorption" numeric(20,2),
    "PriceBaseCurrencyAbsorptionValue" numeric(20,2),
    "AbsorptionDetail" json
);


ALTER TABLE "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000016" OWNER TO "SysEngine";

--
-- TOC entry 249 (class 1259 OID 1933318)
-- Name: TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000017; Type: TABLE; Schema: SchBudgeting; Owner: SysEngine
--

CREATE TABLE "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000017" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_Sys_RPK_seq"'::regclass) CONSTRAINT "TblCombinedBudgetSectionDetailAbsorption_RMV_Sys_RPK_not_null16" NOT NULL,
    "Sys_Data_Annotation" character varying(1024),
    "Sys_Data_Entry_LoginSession_RefID" bigint,
    "Sys_Data_Entry_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Edit_LoginSession_RefID" bigint,
    "Sys_Data_Edit_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Delete_LoginSession_RefID" bigint,
    "Sys_Data_Delete_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Hidden_LoginSession_RefID" bigint,
    "Sys_Data_Hidden_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Authentication_LoginSession_RefID" bigint,
    "Sys_Data_Authentication_DateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "CombinedBudgetSectionDetail_RefID" bigint,
    "QuantityAbsorption" numeric(20,2),
    "PriceBaseCurrencyAbsorptionValue" numeric(20,2),
    "AbsorptionDetail" json
);


ALTER TABLE "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000017" OWNER TO "SysEngine";

--
-- TOC entry 250 (class 1259 OID 1933325)
-- Name: TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000018; Type: TABLE; Schema: SchBudgeting; Owner: SysEngine
--

CREATE TABLE "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000018" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_Sys_RPK_seq"'::regclass) CONSTRAINT "TblCombinedBudgetSectionDetailAbsorption_RMV_Sys_RPK_not_null17" NOT NULL,
    "Sys_Data_Annotation" character varying(1024),
    "Sys_Data_Entry_LoginSession_RefID" bigint,
    "Sys_Data_Entry_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Edit_LoginSession_RefID" bigint,
    "Sys_Data_Edit_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Delete_LoginSession_RefID" bigint,
    "Sys_Data_Delete_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Hidden_LoginSession_RefID" bigint,
    "Sys_Data_Hidden_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Authentication_LoginSession_RefID" bigint,
    "Sys_Data_Authentication_DateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "CombinedBudgetSectionDetail_RefID" bigint,
    "QuantityAbsorption" numeric(20,2),
    "PriceBaseCurrencyAbsorptionValue" numeric(20,2),
    "AbsorptionDetail" json
);


ALTER TABLE "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000018" OWNER TO "SysEngine";

--
-- TOC entry 251 (class 1259 OID 1933332)
-- Name: TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000019; Type: TABLE; Schema: SchBudgeting; Owner: SysEngine
--

CREATE TABLE "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000019" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_Sys_RPK_seq"'::regclass) CONSTRAINT "TblCombinedBudgetSectionDetailAbsorption_RMV_Sys_RPK_not_null18" NOT NULL,
    "Sys_Data_Annotation" character varying(1024),
    "Sys_Data_Entry_LoginSession_RefID" bigint,
    "Sys_Data_Entry_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Edit_LoginSession_RefID" bigint,
    "Sys_Data_Edit_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Delete_LoginSession_RefID" bigint,
    "Sys_Data_Delete_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Hidden_LoginSession_RefID" bigint,
    "Sys_Data_Hidden_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Authentication_LoginSession_RefID" bigint,
    "Sys_Data_Authentication_DateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "CombinedBudgetSectionDetail_RefID" bigint,
    "QuantityAbsorption" numeric(20,2),
    "PriceBaseCurrencyAbsorptionValue" numeric(20,2),
    "AbsorptionDetail" json
);


ALTER TABLE "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000019" OWNER TO "SysEngine";

--
-- TOC entry 252 (class 1259 OID 1933339)
-- Name: TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000020; Type: TABLE; Schema: SchBudgeting; Owner: SysEngine
--

CREATE TABLE "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000020" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_Sys_RPK_seq"'::regclass) CONSTRAINT "TblCombinedBudgetSectionDetailAbsorption_RMV_Sys_RPK_not_null19" NOT NULL,
    "Sys_Data_Annotation" character varying(1024),
    "Sys_Data_Entry_LoginSession_RefID" bigint,
    "Sys_Data_Entry_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Edit_LoginSession_RefID" bigint,
    "Sys_Data_Edit_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Delete_LoginSession_RefID" bigint,
    "Sys_Data_Delete_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Hidden_LoginSession_RefID" bigint,
    "Sys_Data_Hidden_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Authentication_LoginSession_RefID" bigint,
    "Sys_Data_Authentication_DateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "CombinedBudgetSectionDetail_RefID" bigint,
    "QuantityAbsorption" numeric(20,2),
    "PriceBaseCurrencyAbsorptionValue" numeric(20,2),
    "AbsorptionDetail" json
);


ALTER TABLE "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000020" OWNER TO "SysEngine";

--
-- TOC entry 253 (class 1259 OID 1933346)
-- Name: TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000021; Type: TABLE; Schema: SchBudgeting; Owner: SysEngine
--

CREATE TABLE "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000021" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_Sys_RPK_seq"'::regclass) CONSTRAINT "TblCombinedBudgetSectionDetailAbsorption_RMV_Sys_RPK_not_null20" NOT NULL,
    "Sys_Data_Annotation" character varying(1024),
    "Sys_Data_Entry_LoginSession_RefID" bigint,
    "Sys_Data_Entry_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Edit_LoginSession_RefID" bigint,
    "Sys_Data_Edit_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Delete_LoginSession_RefID" bigint,
    "Sys_Data_Delete_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Hidden_LoginSession_RefID" bigint,
    "Sys_Data_Hidden_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Authentication_LoginSession_RefID" bigint,
    "Sys_Data_Authentication_DateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "CombinedBudgetSectionDetail_RefID" bigint,
    "QuantityAbsorption" numeric(20,2),
    "PriceBaseCurrencyAbsorptionValue" numeric(20,2),
    "AbsorptionDetail" json
);


ALTER TABLE "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000021" OWNER TO "SysEngine";

--
-- TOC entry 254 (class 1259 OID 1933353)
-- Name: TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000022; Type: TABLE; Schema: SchBudgeting; Owner: SysEngine
--

CREATE TABLE "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000022" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_Sys_RPK_seq"'::regclass) CONSTRAINT "TblCombinedBudgetSectionDetailAbsorption_RMV_Sys_RPK_not_null21" NOT NULL,
    "Sys_Data_Annotation" character varying(1024),
    "Sys_Data_Entry_LoginSession_RefID" bigint,
    "Sys_Data_Entry_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Edit_LoginSession_RefID" bigint,
    "Sys_Data_Edit_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Delete_LoginSession_RefID" bigint,
    "Sys_Data_Delete_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Hidden_LoginSession_RefID" bigint,
    "Sys_Data_Hidden_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Authentication_LoginSession_RefID" bigint,
    "Sys_Data_Authentication_DateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "CombinedBudgetSectionDetail_RefID" bigint,
    "QuantityAbsorption" numeric(20,2),
    "PriceBaseCurrencyAbsorptionValue" numeric(20,2),
    "AbsorptionDetail" json
);


ALTER TABLE "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000022" OWNER TO "SysEngine";

--
-- TOC entry 255 (class 1259 OID 1933360)
-- Name: TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000023; Type: TABLE; Schema: SchBudgeting; Owner: SysEngine
--

CREATE TABLE "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000023" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_Sys_RPK_seq"'::regclass) CONSTRAINT "TblCombinedBudgetSectionDetailAbsorption_RMV_Sys_RPK_not_null22" NOT NULL,
    "Sys_Data_Annotation" character varying(1024),
    "Sys_Data_Entry_LoginSession_RefID" bigint,
    "Sys_Data_Entry_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Edit_LoginSession_RefID" bigint,
    "Sys_Data_Edit_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Delete_LoginSession_RefID" bigint,
    "Sys_Data_Delete_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Hidden_LoginSession_RefID" bigint,
    "Sys_Data_Hidden_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Authentication_LoginSession_RefID" bigint,
    "Sys_Data_Authentication_DateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "CombinedBudgetSectionDetail_RefID" bigint,
    "QuantityAbsorption" numeric(20,2),
    "PriceBaseCurrencyAbsorptionValue" numeric(20,2),
    "AbsorptionDetail" json
);


ALTER TABLE "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000023" OWNER TO "SysEngine";

--
-- TOC entry 256 (class 1259 OID 1933367)
-- Name: TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000024; Type: TABLE; Schema: SchBudgeting; Owner: SysEngine
--

CREATE TABLE "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000024" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_Sys_RPK_seq"'::regclass) CONSTRAINT "TblCombinedBudgetSectionDetailAbsorption_RMV_Sys_RPK_not_null23" NOT NULL,
    "Sys_Data_Annotation" character varying(1024),
    "Sys_Data_Entry_LoginSession_RefID" bigint,
    "Sys_Data_Entry_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Edit_LoginSession_RefID" bigint,
    "Sys_Data_Edit_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Delete_LoginSession_RefID" bigint,
    "Sys_Data_Delete_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Hidden_LoginSession_RefID" bigint,
    "Sys_Data_Hidden_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Authentication_LoginSession_RefID" bigint,
    "Sys_Data_Authentication_DateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "CombinedBudgetSectionDetail_RefID" bigint,
    "QuantityAbsorption" numeric(20,2),
    "PriceBaseCurrencyAbsorptionValue" numeric(20,2),
    "AbsorptionDetail" json
);


ALTER TABLE "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000024" OWNER TO "SysEngine";

--
-- TOC entry 257 (class 1259 OID 1933374)
-- Name: TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000025; Type: TABLE; Schema: SchBudgeting; Owner: SysEngine
--

CREATE TABLE "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000025" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_Sys_RPK_seq"'::regclass) CONSTRAINT "TblCombinedBudgetSectionDetailAbsorption_RMV_Sys_RPK_not_null24" NOT NULL,
    "Sys_Data_Annotation" character varying(1024),
    "Sys_Data_Entry_LoginSession_RefID" bigint,
    "Sys_Data_Entry_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Edit_LoginSession_RefID" bigint,
    "Sys_Data_Edit_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Delete_LoginSession_RefID" bigint,
    "Sys_Data_Delete_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Hidden_LoginSession_RefID" bigint,
    "Sys_Data_Hidden_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Authentication_LoginSession_RefID" bigint,
    "Sys_Data_Authentication_DateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "CombinedBudgetSectionDetail_RefID" bigint,
    "QuantityAbsorption" numeric(20,2),
    "PriceBaseCurrencyAbsorptionValue" numeric(20,2),
    "AbsorptionDetail" json
);


ALTER TABLE "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000025" OWNER TO "SysEngine";

--
-- TOC entry 258 (class 1259 OID 1933381)
-- Name: TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000026; Type: TABLE; Schema: SchBudgeting; Owner: SysEngine
--

CREATE TABLE "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000026" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_Sys_RPK_seq"'::regclass) CONSTRAINT "TblCombinedBudgetSectionDetailAbsorption_RMV_Sys_RPK_not_null25" NOT NULL,
    "Sys_Data_Annotation" character varying(1024),
    "Sys_Data_Entry_LoginSession_RefID" bigint,
    "Sys_Data_Entry_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Edit_LoginSession_RefID" bigint,
    "Sys_Data_Edit_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Delete_LoginSession_RefID" bigint,
    "Sys_Data_Delete_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Hidden_LoginSession_RefID" bigint,
    "Sys_Data_Hidden_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Authentication_LoginSession_RefID" bigint,
    "Sys_Data_Authentication_DateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "CombinedBudgetSectionDetail_RefID" bigint,
    "QuantityAbsorption" numeric(20,2),
    "PriceBaseCurrencyAbsorptionValue" numeric(20,2),
    "AbsorptionDetail" json
);


ALTER TABLE "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000026" OWNER TO "SysEngine";

--
-- TOC entry 259 (class 1259 OID 1933388)
-- Name: TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000027; Type: TABLE; Schema: SchBudgeting; Owner: SysEngine
--

CREATE TABLE "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000027" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_Sys_RPK_seq"'::regclass) CONSTRAINT "TblCombinedBudgetSectionDetailAbsorption_RMV_Sys_RPK_not_null26" NOT NULL,
    "Sys_Data_Annotation" character varying(1024),
    "Sys_Data_Entry_LoginSession_RefID" bigint,
    "Sys_Data_Entry_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Edit_LoginSession_RefID" bigint,
    "Sys_Data_Edit_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Delete_LoginSession_RefID" bigint,
    "Sys_Data_Delete_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Hidden_LoginSession_RefID" bigint,
    "Sys_Data_Hidden_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Authentication_LoginSession_RefID" bigint,
    "Sys_Data_Authentication_DateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "CombinedBudgetSectionDetail_RefID" bigint,
    "QuantityAbsorption" numeric(20,2),
    "PriceBaseCurrencyAbsorptionValue" numeric(20,2),
    "AbsorptionDetail" json
);


ALTER TABLE "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000027" OWNER TO "SysEngine";

--
-- TOC entry 260 (class 1259 OID 1933395)
-- Name: TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000028; Type: TABLE; Schema: SchBudgeting; Owner: SysEngine
--

CREATE TABLE "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000028" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_Sys_RPK_seq"'::regclass) CONSTRAINT "TblCombinedBudgetSectionDetailAbsorption_RMV_Sys_RPK_not_null27" NOT NULL,
    "Sys_Data_Annotation" character varying(1024),
    "Sys_Data_Entry_LoginSession_RefID" bigint,
    "Sys_Data_Entry_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Edit_LoginSession_RefID" bigint,
    "Sys_Data_Edit_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Delete_LoginSession_RefID" bigint,
    "Sys_Data_Delete_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Hidden_LoginSession_RefID" bigint,
    "Sys_Data_Hidden_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Authentication_LoginSession_RefID" bigint,
    "Sys_Data_Authentication_DateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "CombinedBudgetSectionDetail_RefID" bigint,
    "QuantityAbsorption" numeric(20,2),
    "PriceBaseCurrencyAbsorptionValue" numeric(20,2),
    "AbsorptionDetail" json
);


ALTER TABLE "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000028" OWNER TO "SysEngine";

--
-- TOC entry 261 (class 1259 OID 1933402)
-- Name: TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000029; Type: TABLE; Schema: SchBudgeting; Owner: SysEngine
--

CREATE TABLE "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000029" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_Sys_RPK_seq"'::regclass) CONSTRAINT "TblCombinedBudgetSectionDetailAbsorption_RMV_Sys_RPK_not_null28" NOT NULL,
    "Sys_Data_Annotation" character varying(1024),
    "Sys_Data_Entry_LoginSession_RefID" bigint,
    "Sys_Data_Entry_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Edit_LoginSession_RefID" bigint,
    "Sys_Data_Edit_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Delete_LoginSession_RefID" bigint,
    "Sys_Data_Delete_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Hidden_LoginSession_RefID" bigint,
    "Sys_Data_Hidden_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Authentication_LoginSession_RefID" bigint,
    "Sys_Data_Authentication_DateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "CombinedBudgetSectionDetail_RefID" bigint,
    "QuantityAbsorption" numeric(20,2),
    "PriceBaseCurrencyAbsorptionValue" numeric(20,2),
    "AbsorptionDetail" json
);


ALTER TABLE "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000029" OWNER TO "SysEngine";

--
-- TOC entry 262 (class 1259 OID 1933409)
-- Name: TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000030; Type: TABLE; Schema: SchBudgeting; Owner: SysEngine
--

CREATE TABLE "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000030" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_Sys_RPK_seq"'::regclass) CONSTRAINT "TblCombinedBudgetSectionDetailAbsorption_RMV_Sys_RPK_not_null29" NOT NULL,
    "Sys_Data_Annotation" character varying(1024),
    "Sys_Data_Entry_LoginSession_RefID" bigint,
    "Sys_Data_Entry_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Edit_LoginSession_RefID" bigint,
    "Sys_Data_Edit_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Delete_LoginSession_RefID" bigint,
    "Sys_Data_Delete_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Hidden_LoginSession_RefID" bigint,
    "Sys_Data_Hidden_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Authentication_LoginSession_RefID" bigint,
    "Sys_Data_Authentication_DateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "CombinedBudgetSectionDetail_RefID" bigint,
    "QuantityAbsorption" numeric(20,2),
    "PriceBaseCurrencyAbsorptionValue" numeric(20,2),
    "AbsorptionDetail" json
);


ALTER TABLE "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000030" OWNER TO "SysEngine";

--
-- TOC entry 263 (class 1259 OID 1933416)
-- Name: TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000031; Type: TABLE; Schema: SchBudgeting; Owner: SysEngine
--

CREATE TABLE "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000031" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_Sys_RPK_seq"'::regclass) CONSTRAINT "TblCombinedBudgetSectionDetailAbsorption_RMV_Sys_RPK_not_null30" NOT NULL,
    "Sys_Data_Annotation" character varying(1024),
    "Sys_Data_Entry_LoginSession_RefID" bigint,
    "Sys_Data_Entry_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Edit_LoginSession_RefID" bigint,
    "Sys_Data_Edit_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Delete_LoginSession_RefID" bigint,
    "Sys_Data_Delete_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Hidden_LoginSession_RefID" bigint,
    "Sys_Data_Hidden_DateTimeTZ" timestamp with time zone,
    "Sys_Data_Authentication_LoginSession_RefID" bigint,
    "Sys_Data_Authentication_DateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "CombinedBudgetSectionDetail_RefID" bigint,
    "QuantityAbsorption" numeric(20,2),
    "PriceBaseCurrencyAbsorptionValue" numeric(20,2),
    "AbsorptionDetail" json
);


ALTER TABLE "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000031" OWNER TO "SysEngine";

--
-- TOC entry 3496 (class 0 OID 0)
-- Name: TblCombinedBudgetSectionDetailAbsorption_DEF; Type: TABLE ATTACH; Schema: SchBudgeting; Owner: SysEngine
--

ALTER TABLE ONLY "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption" ATTACH PARTITION "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_DEF" DEFAULT;


--
-- TOC entry 3497 (class 0 OID 0)
-- Name: TblCombinedBudgetSectionDetailAbsorption_PMT; Type: TABLE ATTACH; Schema: SchBudgeting; Owner: SysEngine
--

ALTER TABLE ONLY "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption" ATTACH PARTITION "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_PMT" FOR VALUES IN (NULL);


--
-- TOC entry 3498 (class 0 OID 0)
-- Name: TblCombinedBudgetSectionDetailAbsorption_RMV; Type: TABLE ATTACH; Schema: SchBudgeting; Owner: SysEngine
--

ALTER TABLE ONLY "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption" ATTACH PARTITION "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV" FOR VALUES IN ('8000000000001', '8000000000002', '8000000000003', '8000000000004', '8000000000005', '8000000000006', '8000000000007', '8000000000008', '8000000000009', '8000000000010', '8000000000011', '8000000000012', '8000000000013', '8000000000014', '8000000000015', '8000000000016', '8000000000017', '8000000000018', '8000000000019', '8000000000020', '8000000000021', '8000000000022', '8000000000023', '8000000000024', '8000000000025', '8000000000026', '8000000000027', '8000000000028', '8000000000029', '8000000000030', '8000000000031');


--
-- TOC entry 3499 (class 0 OID 0)
-- Name: TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000001; Type: TABLE ATTACH; Schema: SchBudgeting; Owner: SysEngine
--

ALTER TABLE ONLY "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV" ATTACH PARTITION "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000001" FOR VALUES IN ('8000000000001');


--
-- TOC entry 3500 (class 0 OID 0)
-- Name: TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000002; Type: TABLE ATTACH; Schema: SchBudgeting; Owner: SysEngine
--

ALTER TABLE ONLY "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV" ATTACH PARTITION "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000002" FOR VALUES IN ('8000000000002');


--
-- TOC entry 3501 (class 0 OID 0)
-- Name: TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000003; Type: TABLE ATTACH; Schema: SchBudgeting; Owner: SysEngine
--

ALTER TABLE ONLY "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV" ATTACH PARTITION "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000003" FOR VALUES IN ('8000000000003');


--
-- TOC entry 3502 (class 0 OID 0)
-- Name: TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000004; Type: TABLE ATTACH; Schema: SchBudgeting; Owner: SysEngine
--

ALTER TABLE ONLY "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV" ATTACH PARTITION "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000004" FOR VALUES IN ('8000000000004');


--
-- TOC entry 3503 (class 0 OID 0)
-- Name: TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000005; Type: TABLE ATTACH; Schema: SchBudgeting; Owner: SysEngine
--

ALTER TABLE ONLY "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV" ATTACH PARTITION "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000005" FOR VALUES IN ('8000000000005');


--
-- TOC entry 3504 (class 0 OID 0)
-- Name: TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000006; Type: TABLE ATTACH; Schema: SchBudgeting; Owner: SysEngine
--

ALTER TABLE ONLY "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV" ATTACH PARTITION "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000006" FOR VALUES IN ('8000000000006');


--
-- TOC entry 3505 (class 0 OID 0)
-- Name: TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000007; Type: TABLE ATTACH; Schema: SchBudgeting; Owner: SysEngine
--

ALTER TABLE ONLY "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV" ATTACH PARTITION "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000007" FOR VALUES IN ('8000000000007');


--
-- TOC entry 3506 (class 0 OID 0)
-- Name: TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000008; Type: TABLE ATTACH; Schema: SchBudgeting; Owner: SysEngine
--

ALTER TABLE ONLY "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV" ATTACH PARTITION "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000008" FOR VALUES IN ('8000000000008');


--
-- TOC entry 3507 (class 0 OID 0)
-- Name: TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000009; Type: TABLE ATTACH; Schema: SchBudgeting; Owner: SysEngine
--

ALTER TABLE ONLY "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV" ATTACH PARTITION "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000009" FOR VALUES IN ('8000000000009');


--
-- TOC entry 3508 (class 0 OID 0)
-- Name: TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000010; Type: TABLE ATTACH; Schema: SchBudgeting; Owner: SysEngine
--

ALTER TABLE ONLY "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV" ATTACH PARTITION "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000010" FOR VALUES IN ('8000000000010');


--
-- TOC entry 3509 (class 0 OID 0)
-- Name: TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000011; Type: TABLE ATTACH; Schema: SchBudgeting; Owner: SysEngine
--

ALTER TABLE ONLY "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV" ATTACH PARTITION "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000011" FOR VALUES IN ('8000000000011');


--
-- TOC entry 3510 (class 0 OID 0)
-- Name: TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000012; Type: TABLE ATTACH; Schema: SchBudgeting; Owner: SysEngine
--

ALTER TABLE ONLY "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV" ATTACH PARTITION "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000012" FOR VALUES IN ('8000000000012');


--
-- TOC entry 3511 (class 0 OID 0)
-- Name: TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000013; Type: TABLE ATTACH; Schema: SchBudgeting; Owner: SysEngine
--

ALTER TABLE ONLY "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV" ATTACH PARTITION "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000013" FOR VALUES IN ('8000000000013');


--
-- TOC entry 3512 (class 0 OID 0)
-- Name: TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000014; Type: TABLE ATTACH; Schema: SchBudgeting; Owner: SysEngine
--

ALTER TABLE ONLY "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV" ATTACH PARTITION "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000014" FOR VALUES IN ('8000000000014');


--
-- TOC entry 3513 (class 0 OID 0)
-- Name: TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000015; Type: TABLE ATTACH; Schema: SchBudgeting; Owner: SysEngine
--

ALTER TABLE ONLY "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV" ATTACH PARTITION "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000015" FOR VALUES IN ('8000000000015');


--
-- TOC entry 3514 (class 0 OID 0)
-- Name: TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000016; Type: TABLE ATTACH; Schema: SchBudgeting; Owner: SysEngine
--

ALTER TABLE ONLY "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV" ATTACH PARTITION "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000016" FOR VALUES IN ('8000000000016');


--
-- TOC entry 3515 (class 0 OID 0)
-- Name: TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000017; Type: TABLE ATTACH; Schema: SchBudgeting; Owner: SysEngine
--

ALTER TABLE ONLY "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV" ATTACH PARTITION "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000017" FOR VALUES IN ('8000000000017');


--
-- TOC entry 3516 (class 0 OID 0)
-- Name: TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000018; Type: TABLE ATTACH; Schema: SchBudgeting; Owner: SysEngine
--

ALTER TABLE ONLY "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV" ATTACH PARTITION "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000018" FOR VALUES IN ('8000000000018');


--
-- TOC entry 3517 (class 0 OID 0)
-- Name: TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000019; Type: TABLE ATTACH; Schema: SchBudgeting; Owner: SysEngine
--

ALTER TABLE ONLY "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV" ATTACH PARTITION "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000019" FOR VALUES IN ('8000000000019');


--
-- TOC entry 3518 (class 0 OID 0)
-- Name: TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000020; Type: TABLE ATTACH; Schema: SchBudgeting; Owner: SysEngine
--

ALTER TABLE ONLY "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV" ATTACH PARTITION "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000020" FOR VALUES IN ('8000000000020');


--
-- TOC entry 3519 (class 0 OID 0)
-- Name: TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000021; Type: TABLE ATTACH; Schema: SchBudgeting; Owner: SysEngine
--

ALTER TABLE ONLY "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV" ATTACH PARTITION "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000021" FOR VALUES IN ('8000000000021');


--
-- TOC entry 3520 (class 0 OID 0)
-- Name: TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000022; Type: TABLE ATTACH; Schema: SchBudgeting; Owner: SysEngine
--

ALTER TABLE ONLY "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV" ATTACH PARTITION "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000022" FOR VALUES IN ('8000000000022');


--
-- TOC entry 3521 (class 0 OID 0)
-- Name: TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000023; Type: TABLE ATTACH; Schema: SchBudgeting; Owner: SysEngine
--

ALTER TABLE ONLY "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV" ATTACH PARTITION "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000023" FOR VALUES IN ('8000000000023');


--
-- TOC entry 3522 (class 0 OID 0)
-- Name: TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000024; Type: TABLE ATTACH; Schema: SchBudgeting; Owner: SysEngine
--

ALTER TABLE ONLY "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV" ATTACH PARTITION "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000024" FOR VALUES IN ('8000000000024');


--
-- TOC entry 3523 (class 0 OID 0)
-- Name: TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000025; Type: TABLE ATTACH; Schema: SchBudgeting; Owner: SysEngine
--

ALTER TABLE ONLY "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV" ATTACH PARTITION "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000025" FOR VALUES IN ('8000000000025');


--
-- TOC entry 3524 (class 0 OID 0)
-- Name: TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000026; Type: TABLE ATTACH; Schema: SchBudgeting; Owner: SysEngine
--

ALTER TABLE ONLY "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV" ATTACH PARTITION "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000026" FOR VALUES IN ('8000000000026');


--
-- TOC entry 3525 (class 0 OID 0)
-- Name: TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000027; Type: TABLE ATTACH; Schema: SchBudgeting; Owner: SysEngine
--

ALTER TABLE ONLY "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV" ATTACH PARTITION "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000027" FOR VALUES IN ('8000000000027');


--
-- TOC entry 3526 (class 0 OID 0)
-- Name: TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000028; Type: TABLE ATTACH; Schema: SchBudgeting; Owner: SysEngine
--

ALTER TABLE ONLY "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV" ATTACH PARTITION "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000028" FOR VALUES IN ('8000000000028');


--
-- TOC entry 3527 (class 0 OID 0)
-- Name: TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000029; Type: TABLE ATTACH; Schema: SchBudgeting; Owner: SysEngine
--

ALTER TABLE ONLY "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV" ATTACH PARTITION "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000029" FOR VALUES IN ('8000000000029');


--
-- TOC entry 3528 (class 0 OID 0)
-- Name: TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000030; Type: TABLE ATTACH; Schema: SchBudgeting; Owner: SysEngine
--

ALTER TABLE ONLY "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV" ATTACH PARTITION "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000030" FOR VALUES IN ('8000000000030');


--
-- TOC entry 3529 (class 0 OID 0)
-- Name: TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000031; Type: TABLE ATTACH; Schema: SchBudgeting; Owner: SysEngine
--

ALTER TABLE ONLY "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV" ATTACH PARTITION "SchBudgeting"."TblCombinedBudgetSectionDetailAbsorption_RMV_8000000000031" FOR VALUES IN ('8000000000031');


--
-- TOC entry 3719 (class 0 OID 0)
-- Dependencies: 9
-- Name: SCHEMA public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE USAGE ON SCHEMA public FROM PUBLIC;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2026-03-14 14:10:31 WIB

--
-- PostgreSQL database dump complete
--

\unrestrict 9ejzyEJNDaFGEkSkzoyTVFHTLlchisTPrjSOjGYw5JZ8auFyvhti9DaNyRcxPpT

