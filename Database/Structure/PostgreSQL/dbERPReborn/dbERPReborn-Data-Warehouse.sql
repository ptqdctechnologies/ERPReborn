--
-- PostgreSQL database dump
--

\restrict CGg6v7a2dAlk3GtlgSFUBufRQJxocjq2Sg1GqnglhQHZuebPnuTJUmpVV7oWisP

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
-- TOC entry 8 (class 2615 OID 1933435)
-- Name: SchAcquisition; Type: SCHEMA; Schema: -; Owner: SysEngine
--

CREATE SCHEMA "SchAcquisition";


ALTER SCHEMA "SchAcquisition" OWNER TO "SysEngine";

--
-- TOC entry 9 (class 2615 OID 1933436)
-- Name: SchCache; Type: SCHEMA; Schema: -; Owner: SysAdmin
--

CREATE SCHEMA "SchCache";


ALTER SCHEMA "SchCache" OWNER TO "SysAdmin";

--
-- TOC entry 10 (class 2615 OID 1933437)
-- Name: SchLock; Type: SCHEMA; Schema: -; Owner: SysAdmin
--

CREATE SCHEMA "SchLock";


ALTER SCHEMA "SchLock" OWNER TO "SysAdmin";

--
-- TOC entry 11 (class 2615 OID 1933438)
-- Name: SchLog; Type: SCHEMA; Schema: -; Owner: SysEngine
--

CREATE SCHEMA "SchLog";


ALTER SCHEMA "SchLog" OWNER TO "SysEngine";

--
-- TOC entry 12 (class 2615 OID 1933439)
-- Name: SchSystem; Type: SCHEMA; Schema: -; Owner: SysEngine
--

CREATE SCHEMA "SchSystem";


ALTER SCHEMA "SchSystem" OWNER TO "SysEngine";

--
-- TOC entry 2 (class 3079 OID 1933440)
-- Name: dblink; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS dblink WITH SCHEMA public;


--
-- TOC entry 4766 (class 0 OID 0)
-- Dependencies: 2
-- Name: EXTENSION dblink; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION dblink IS 'connect to other PostgreSQL databases from within a database';


--
-- TOC entry 3 (class 3079 OID 1933486)
-- Name: pg_stat_statements; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS pg_stat_statements WITH SCHEMA public;


--
-- TOC entry 4767 (class 0 OID 0)
-- Dependencies: 3
-- Name: EXTENSION pg_stat_statements; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION pg_stat_statements IS 'track planning and execution statistics of all SQL statements executed';


--
-- TOC entry 1076 (class 1247 OID 1933532)
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
-- TOC entry 1079 (class 1247 OID 1933535)
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
-- TOC entry 384 (class 1255 OID 1933536)
-- Name: Func_SQLGenerator_DataList_FileUploads(bigint, bigint[], json); Type: FUNCTION; Schema: SchAcquisition; Owner: SysAdmin
--

CREATE FUNCTION "SchAcquisition"."Func_SQLGenerator_DataList_FileUploads"(bigint, bigint[] DEFAULT NULL::bigint[], json DEFAULT NULL::json) RETURNS character varying
    LANGUAGE plpgsql
    AS $_$
/*----------------------------------------------------------------------------------------------------
▪ Nama                :	"SchAcquisition"."Func_SQLGenerator_DataList_FileUploads"
▪ Versi               :	1.00.0001
▪ Tanggal
     ► Pemutakhiran   :	2025-12-04
     ► Pembuatan      :	2025-11-14
▪ Input               :	• varBranch_RefID (bigint - Mandatory)
						------------------------------
						------------------------------
						• varArrayID (bigint[] - Optional)
						• varEnvironmentParameter (json - Optional)
						------------------------------
▪ Output              :	varReturn (varchar)
▪ Keterkaitan Fungsi  :	• "SchMaster"."Func_SQLGenerator_DataList_BusinessDocumentVersion"(bigint, bigint[], json)
▪ Deskripsi           :	• Mendapatkan SQL Generator untuk Daftar Unggahan File-File berdasarkan ID
						  Branch (varBranch_RefID) dan ID Data (varArrayID).
					  	• Parameter (diperbolehkan parsial) pada varEnvironmentParameter yang dapat
						  digunakan adalah :
						  	- DBLink Connection String :
						 		- "DBLink.ConnectionString.FrontEnd"				-> (varchar) DBLink Connection String untuk Database FrontEnd
								- "DBLink.ConnectionString.BackEnd.DataOLAP"		-> (varchar) DBLink Connection String untuk Database BackEnd OLAP
								- "DBLink.ConnectionString.BackEnd.DataOLTP"		-> (varchar) DBLink Connection String untuk Database BackEnd OLTP
								- "DBLink.ConnectionString.BackEnd.DataWarehouse"	-> (varchar) DBLink Connection String untuk Database BackEnd Data Warehouse
								- "DBLink.ConnectionString.BackEnd.SysConfig"		-> (varchar) DBLink Connection String untuk Database BackEnd SysConfig
						  	- Pagination :
								- "Pagination.PageSize"								-> (bigint) Pagination Page Size (Items Per Page)
								- "Pagination.PageShow"								-> (bigint) Pagination Page Show (Page Cursor)
						  	- Data Customize :
								- "DataCustomize.Filter"							-> (json) Data Filtering (Format JSON Array : Field Name, Field Data Type, Operator, Value)
								- "DataCustomize.Sort"								-> (json) Data Sorting (Format JSON Array : Field Name, Mode)
						  	- Data Reference :
								- "DataReference.Array.BaseBranch"					-> (json) Data Reference - Array - Base Branch (Format JSON Object : ID, Value_BaseBranchID)
								- "DataReference.Array.Currency"					-> (json) Data Reference - Array - Currency (Format JSON Object : ID, Value_ISOCode, Value_Symbol)
						• Apabila pada Data Customize diaktifkan pada varEnvironmentParameter, maka
						  akan berpotensi memperlambat proses eksekusi.
						  Hal ini terjadi disebabkan oleh adanya DATA PREPROCESSING terlebih dahulu
						  untuk merepresentasikan data secara lengkap dan utuh sebelum dilakukan
						  proses FILTERING dan SORTING.
						• Jika varArrayID hanya terdiri dari 1 (satu) ID saja, maka secara otomatis
						  field "JSONDataDetail" akan diinisialisasi dengan DATA DETAIL untuk 
						  mengantisipasi adanya kemungkinan pengolahan DOCUMENT FORM.
						  Sedangkan apabila varArrayID lebih dari 1 ID, maka field "JSONDataDetail"
						  tidak akan diinisialisasi sama sekali (diisi nilai NULL).
▪ Copyright           :	Zheta © 2025

----[ SQL Example(s) ]------------------------------------------------------------------------------

▪ ---> With Branch ID (varBranch_RefID)
	SELECT 
		"SchAcquisition"."Func_SQLGenerator_DataList_FileUploads"(
			11000000000004::bigint
			------------------------------
			------------------------------
			);

▪ ---> With Branch ID (varBranch_RefID) and Array ID (varArrayID)
	SELECT 
		"SchAcquisition"."Func_SQLGenerator_DataList_FileUploads"(
			11000000000004::bigint,
			------------------------------
			------------------------------
			'{91000000000001, 91000000000002, 91000000000003}'::bigint[]
			);

▪ ---> With Branch ID (varBranch_RefID), Array ID (varArrayID), and Environment Parameter (varEnvironmentParameter : DBLink Connection String)
	SELECT 
		"SchAcquisition"."Func_SQLGenerator_DataList_FileUploads"(
			11000000000004::bigint,
			------------------------------
			------------------------------
			'{91000000000001, 91000000000002, 91000000000003}'::bigint[],
			JSON_BUILD_OBJECT (
				'DBLink.ConnectionString.FrontEnd', 'dbname=''dbERPReborn'' host=127.0.0.1 port=5432 user=''SysEngine'' password=''748159263''',
				'DBLink.ConnectionString.BackEnd.DataOLAP', 'dbname=''dbERPReborn-Data-OLAP'' host=127.0.0.1 port=5432 user=''SysEngine'' password=''748159263''',
				'DBLink.ConnectionString.BackEnd.DataOLTP', 'dbname=''dbERPReborn-Data-OLTP'' host=127.0.0.1 port=5432 user=''SysEngine'' password=''748159263''',
				'DBLink.ConnectionString.BackEnd.DataWarehouse', 'dbname=''dbERPReborn-Data-Warehouse'' host=127.0.0.1 port=5432 user=''SysEngine'' password=''748159263''',
				'DBLink.ConnectionString.BackEnd.SysConfig', 'dbname=''dbERPReborn-SysConfig'' host=127.0.0.1 port=5432 user=''SysEngine'' password=''748159263'''
				------------------------------
				------------------------------
				)
			);

▪ ---> With Branch ID (varBranch_RefID), Array ID (varArrayID), and Environment Parameter (varEnvironmentParameter : DBLink Connection String, Pagination, and Data Customize)
	SELECT 
		"SchAcquisition"."Func_SQLGenerator_DataList_FileUploads"(
			11000000000004::bigint,
			------------------------------
			------------------------------
			'{91000000000001, 91000000000002, 91000000000003}'::bigint[],
			JSON_BUILD_OBJECT (
				'DBLink.ConnectionString.FrontEnd', 'dbname=''dbERPReborn'' host=127.0.0.1 port=5432 user=''SysEngine'' password=''748159263''',
				'DBLink.ConnectionString.BackEnd.DataOLAP', 'dbname=''dbERPReborn-Data-OLAP'' host=127.0.0.1 port=5432 user=''SysEngine'' password=''748159263''',
				'DBLink.ConnectionString.BackEnd.DataOLTP', 'dbname=''dbERPReborn-Data-OLTP'' host=127.0.0.1 port=5432 user=''SysEngine'' password=''748159263''',
				'DBLink.ConnectionString.BackEnd.DataWarehouse', 'dbname=''dbERPReborn-Data-Warehouse'' host=127.0.0.1 port=5432 user=''SysEngine'' password=''748159263''',
				'DBLink.ConnectionString.BackEnd.SysConfig', 'dbname=''dbERPReborn-SysConfig'' host=127.0.0.1 port=5432 user=''SysEngine'' password=''748159263''',
				------------------------------
				'Pagination.PageSize', 10,
				'Pagination.PageShow', 1,
				------------------------------
				'DataCustomize.Filter', JSON_BUILD_ARRAY (
					JSON_BUILD_ARRAY (
						'DocumentNumber', 'varchar', 'ILIKE', 'Adv'
						)
					),
				'DataCustomize.Sort', JSON_BUILD_ARRAY (
					JSON_BUILD_ARRAY (
						'DocumentNumber', 'ASC'
						)
					),
				------------------------------
				'DataReference.Array.BaseBranch', JSON_BUILD_OBJECT (
					'ID', '{11000000000001,10011000000000001,11000000000002,10011000000000002,11000000000003,10011000000000003,11000000000004,10011000000000004}'::bigint[]::varchar,
					'Value_BaseBranchID', '{11000000000004,11000000000004,11000000000004,11000000000004,11000000000004,11000000000004,11000000000004,11000000000004}'::bigint[]::varchar
					),
				'DataReference.Array.Currency', JSON_BUILD_OBJECT (
					'ID', '{62000000000001,10062000000000001,62000000000002,10062000000000002,62000000000003,10062000000000003,62000000000004,10062000000000004,62000000000005,10062000000000005,62000000000006,10062000000000006,62000000000007,10062000000000007,62000000000008,10062000000000008,62000000000009,10062000000000009,62000000000010,10062000000000010,62000000000011,10062000000000011,62000000000012,10062000000000012,62000000000013,10062000000000013,62000000000014,10062000000000014,62000000000015,10062000000000015,62000000000016,10062000000000016,62000000000017,10062000000000017,62000000000018,10062000000000018,62000000000019,10062000000000019,62000000000020,10062000000000020,62000000000021,10062000000000021,62000000000022,10062000000000022,62000000000023,10062000000000023,62000000000024,10062000000000024,62000000000025,10062000000000025,62000000000026,10062000000000026,62000000000027,10062000000000027,62000000000028,10062000000000028,62000000000029,10062000000000029,62000000000030,10062000000000030,62000000000031,10062000000000031,62000000000032,10062000000000032,62000000000033,10062000000000033,62000000000034,10062000000000034,62000000000035,10062000000000035,62000000000036,10062000000000036,62000000000037,10062000000000037,62000000000038,10062000000000038,62000000000039,10062000000000039,62000000000040,10062000000000040,62000000000041,10062000000000041,62000000000042,10062000000000042,62000000000043,10062000000000043,62000000000044,10062000000000044,62000000000045,10062000000000045,62000000000046,10062000000000046,62000000000047,10062000000000047,62000000000048,10062000000000048,62000000000049,10062000000000049,62000000000050,10062000000000050,62000000000051,10062000000000051,62000000000052,10062000000000052,62000000000053,10062000000000053,62000000000054,10062000000000054,62000000000055,10062000000000055,62000000000056,10062000000000056,62000000000057,10062000000000057,62000000000058,10062000000000058,62000000000059,10062000000000059,62000000000060,10062000000000060,62000000000061,10062000000000061,62000000000062,10062000000000062,62000000000063,10062000000000063,62000000000064,10062000000000064,62000000000065,10062000000000065,62000000000066,10062000000000066,62000000000067,10062000000000067,62000000000068,10062000000000068,62000000000069,10062000000000069,62000000000070,10062000000000070,62000000000071,10062000000000071,62000000000072,10062000000000072,62000000000073,10062000000000073,62000000000074,10062000000000074,62000000000075,10062000000000075,62000000000076,10062000000000076,62000000000077,10062000000000077,62000000000078,10062000000000078,62000000000079,10062000000000079,62000000000080,10062000000000080,62000000000081,10062000000000081,62000000000082,10062000000000082,62000000000083,10062000000000083,62000000000084,10062000000000084,62000000000085,10062000000000085,62000000000086,10062000000000086,62000000000087,10062000000000087,62000000000088,10062000000000088,62000000000089,10062000000000089,62000000000090,10062000000000090,62000000000091,10062000000000091,62000000000092,10062000000000092,62000000000093,10062000000000093,62000000000094,10062000000000094,62000000000095,10062000000000095,62000000000096,10062000000000096,62000000000097,10062000000000097,62000000000098,10062000000000098,62000000000099,10062000000000099,62000000000100,10062000000000100,62000000000101,10062000000000101,62000000000102,10062000000000102,62000000000103,10062000000000103,62000000000104,10062000000000104,62000000000105,10062000000000105,62000000000106,10062000000000106,62000000000107,10062000000000107,62000000000108,10062000000000108,62000000000109,10062000000000109,62000000000110,10062000000000110,62000000000111,10062000000000111,62000000000112,10062000000000112,62000000000113,10062000000000113,62000000000114,10062000000000114,62000000000115,10062000000000115,62000000000116,10062000000000116,62000000000117,10062000000000117,62000000000118,10062000000000118,62000000000119,10062000000000119,62000000000120,10062000000000120}'::bigint[]::varchar,
					'Value_ISOCode', '{IDR,IDR,USD,USD,AUD,AUD,CAD,CAD,DKK,DKK,HKD,HKD,MYR,MYR,NZD,NZD,NOK,NOK,GBP,GBP,SGD,SGD,SEK,SEK,CHF,CHF,JPY,JPY,MMK,MMK,INR,INR,KWD,KWD,PKR,PKR,PHP,PHP,SAR,SAR,LKR,LKR,THB,THB,BND,BND,EUR,EUR,CNY,CNY,KRW,KRW,CNH,CNH,LAK,LAK,PGK,PGK,VND,VND,ID2,ID2,ALL,ALL,AFN,AFN,ARS,ARS,AWG,AWG,AZN,AZN,BSD,BSD,BBD,BBD,BYR,BYR,BZD,BZD,BMD,BMD,BOB,BOB,BAM,BAM,BWP,BWP,BGN,BGN,BRL,BRL,KHR,KHR,KYD,KYD,CLP,CLP,COP,COP,CRC,CRC,HRK,HRK,CUP,CUP,CZK,CZK,DOP,DOP,XCD,XCD,EGP,EGP,SVC,SVC,EEK,EEK,FKP,FKP,FJD,FJD,GHC,GHC,GIP,GIP,GTQ,GTQ,GGP,GGP,GYD,GYD,HNL,HNL,HUF,HUF,ISK,ISK,IRR,IRR,IMP,IMP,ILS,ILS,JMD,JMD,JEP,JEP,KZT,KZT,KPW,KPW,KGS,KGS,LVL,LVL,LBP,LBP,LRD,LRD,LTL,LTL,MKD,MKD,MUR,MUR,MXN,MXN,MNT,MNT,MZN,MZN,NAD,NAD,NPR,NPR,ANG,ANG,NIO,NIO,NGN,NGN,KPW,KPW,OMR,OMR,PAB,PAB,PYG,PYG,PEN,PEN,PLN,PLN,QAR,QAR,RON,RON,RUB,RUB,SHP,SHP,RSD,RSD,SCR,SCR,SBD,SBD,SOS,SOS,ZAR,ZAR,KRW,KRW,SRD,SRD,SYP,SYP,TWD,TWD,TTD,TTD,TRY,TRY,TRL,TRL,TVD,TVD,UAH,UAH,UYU,UYU,UZS,UZS,VEF,VEF,YER,YER,ZWD,ZWD}'::varchar[]::varchar,
					'Value_Symbol', '{Rp,Rp,$,$,$,$,$,$,kr,kr,$,$,RM,RM,$,$,kr,kr,£,£,$,$,kr,kr,₣,₣,¥,¥,K,K,NULL,NULL,NULL,NULL,₨,₨,₱,₱,﷼,﷼,රු,රු,฿,฿,$,$,€,€,¥,¥,₩,₩,¥,¥,₭,₭,K,K,₫,₫,Rp,Rp,Lek,Lek,؋,؋,$,$,ƒ,ƒ,ман,ман,$,$,$,$,p.,p.,BZ$,BZ$,$,$,$b,$b,KM,KM,P,P,лв,лв,R$,R$,៛,៛,$,$,$,$,$,$,₡,₡,kn,kn,₱,₱,Kč,Kč,RD$,RD$,$,$,£,£,$,$,kr,kr,£,£,$,$,¢,¢,£,£,Q,Q,£,£,$,$,L,L,Ft,Ft,kr,kr,﷼,﷼,£,£,₪,₪,J$,J$,£,£,лв,лв,₩,₩,лв,лв,Ls,Ls,£,£,$,$,Lt,Lt,ден,ден,₨,₨,$,$,₮,₮,MT,MT,$,$,₨,₨,ƒ,ƒ,C$,C$,₦,₦,₩,₩,﷼,﷼,B/.,B/.,Gs,Gs,S/.,S/.,zł,zł,﷼,﷼,lei,lei,руб,руб,£,£,Дин.,Дин.,₨,₨,$,$,S,S,R,R,₩,₩,$,$,£,£,NT$,NT$,TT$,TT$,TL,TL,₤,₤,$,$,₴,₴,$U,$U,лв,лв,Bs,Bs,﷼,﷼,Z$,Z$}'::varchar[]::varchar
					)
				)
			);

----------------------------------------------------------------------------------------------------*/

DECLARE
	----[ ⦿ ]--[ Input Variable(s) ]-------------------------------------------------------[ ⦿ ]----
		---{ Mandatory }------------------
			varBranch_RefID											ALIAS FOR $1;
			------------------------------

		---{ Optional }-------------------
			------------------------------
			varArrayID												ALIAS FOR $2;
			varEnvironmentParameter									ALIAS FOR $3;

		---{ Additional }-----------------

	----[ ⦿ ]--[ Output Variable(s) ]-----------------------------------------------------[ ⦿ ]----
			varReturn												varchar;

	----[ ⦿ ]--[ Intermediate Variable(s) ]-----------------------------------------------[ ⦿ ]----
		---{ Default }--------------------
			varSystemNoticeTag										varchar;
			varSignEligibleToProcess								boolean;

			varDBLinkConnectionString_FE							varchar;
			varDBLinkConnectionString_BE_DataOLAP					varchar;
			varDBLinkConnectionString_BE_DataOLTP					varchar;
			varDBLinkConnectionString_BE_DataWarehouse				varchar;
			varDBLinkConnectionString_BE_SysConfig					varchar;

			varPagination_PageSize									bigint;
			varPagination_PageShow									bigint;

			varDataCustomize_Filter									varchar;
			varDataCustomize_Sort									varchar;

			varArraySysBranch_RefID									bigint[];
			varArraySysBaseBranch_RefID								bigint[];

			varArrayCurrency_RefID									bigint[];
			varArrayCurrencyISOCode									varchar(3)[];
			varArrayCurrencySymbol									varchar(4)[];

			varMainTable											varchar;

			varSQL													varchar;
			varSQLDefault											varchar;

			varSQLJSONDataDetail									varchar;

		---{ Additional }-----------------

BEGIN
	----[ ⦿ ]--[ Data Initializing ]------------------------------------------------------[ ⦿ ]----
		--varSystemNoticeTag := "SchSysAsset"."Func_GetSystemNoticeTag"();
		varSignEligibleToProcess := FALSE;

		-----[ ELIGIBLE PROCESS DETERMINATION ]---------------------------------------( START )-----
			IF (varSignEligibleToProcess IS FALSE) THEN
				varSignEligibleToProcess := TRUE;
			END IF;

			IF (CARDINALITY(varArrayID::bigint[]) = 0) THEN
				varSignEligibleToProcess := FALSE;
			END IF;
		-----[ ELIGIBLE PROCESS DETERMINATION ]---------------------------------------(  END  )-----

		-----[ VARIABLES INITIALIZATION FOR ELIGIBLE PROCESS ]------------------------( START )-----
			IF (varSignEligibleToProcess IS TRUE) THEN
				---> Reinitializing : varDBLinkConnectionString
					varDBLinkConnectionString_FE :=
						COALESCE (
							(varEnvironmentParameter->>'DBLink.ConnectionString.FrontEnd')::varchar,
							'dbname=''dbERPReborn'' host=127.0.0.1 port=5432 user=''SysEngine'' password=''748159263'''
							);

					varDBLinkConnectionString_BE_DataOLAP :=
						COALESCE (
							(varEnvironmentParameter->>'DBLink.ConnectionString.BackEnd.DataOLAP')::varchar,
							'dbname=''dbERPReborn-Data-OLAP'' host=127.0.0.1 port=5432 user=''SysEngine'' password=''748159263'''
							);

					varDBLinkConnectionString_BE_DataOLTP :=
						COALESCE (
							(varEnvironmentParameter->>'DBLink.ConnectionString.BackEnd.DataOLTP')::varchar,
							'dbname=''dbERPReborn-Data-OLTP'' host=127.0.0.1 port=5432 user=''SysEngine'' password=''748159263'''
							);

					varDBLinkConnectionString_BE_DataWarehouse :=
						COALESCE (
							(varEnvironmentParameter->>'DBLink.ConnectionString.BackEnd.DataWarehouse')::varchar,
							'dbname=''dbERPReborn-Data-Warehouse'' host=127.0.0.1 port=5432 user=''SysEngine'' password=''748159263'''
							);

					varDBLinkConnectionString_BE_SysConfig :=
						COALESCE (
							(varEnvironmentParameter->>'DBLink.ConnectionString.BackEnd.SysConfig')::varchar,
							'dbname=''dbERPReborn-SysConfig'' host=127.0.0.1 port=5432 user=''SysEngine'' password=''748159263'''
							);

				---> Initializing : varPagination
					varPagination_PageSize :=
						COALESCE (
							CASE
								WHEN ((varEnvironmentParameter->>'Pagination.PageSize')::bigint > 0) THEN
									(varEnvironmentParameter->>'Pagination.PageSize')::bigint
								ELSE
									NULL
							END
							);

					varPagination_PageShow :=
						COALESCE (
							CASE
								WHEN ((varEnvironmentParameter->>'Pagination.PageShow')::bigint > 0) THEN
									(varEnvironmentParameter->>'Pagination.PageShow')::bigint
								ELSE
									NULL
							END
							);

				---> Initializing : varDataCustomize_Filter, varDataCustomize_Sort
					SELECT
						"SubSQL"."JSONData"->>'filterString',
						"SubSQL"."JSONData"->>'sortString'
					INTO
						varDataCustomize_Filter,
						varDataCustomize_Sort
					FROM
						(
						SELECT
							"SchSystem"."FuncSys_General_StrSQLBuilder_FilterAndSort"(
								(varEnvironmentParameter->>'DataCustomize.Filter')::json,
								(varEnvironmentParameter->>'DataCustomize.Sort')::json
								) AS "JSONData"
						) AS "SubSQL";

				---> Initializing : varArraySysBranch_RefID, varArraySysBaseBranch_RefID
					varArraySysBranch_RefID := (varEnvironmentParameter->'DataReference.Array.BaseBranch'->>'ID')::bigint[];
					varArraySysBaseBranch_RefID := (varEnvironmentParameter->'DataReference.Array.BaseBranch'->>'Value_BaseBranchID')::bigint[];

					IF ((varArraySysBranch_RefID IS NULL) OR (varArraySysBaseBranch_RefID IS NULL)) THEN
						SELECT
							"InstitutionBranch_RefIDArray",
							"BaseInstitutionBranch_RefIDArray"
						INTO
							varArraySysBranch_RefID,
							varArraySysBaseBranch_RefID
						FROM
							DBLINK (
								varDBLinkConnectionString_BE_SysConfig,
								'
								SELECT
									"SubSQL"."IDArray",
									"SubSQL"."ValueArray_BaseInstitutionBranch_RefID"
								FROM
									"SchSystem"."FuncSys_General_StrSQLExecution"((
										SELECT
											(
											''
											SELECT
												"SubSQL"."IDArray",
												"SubSQL"."ValueArray_BaseInstitutionBranch_RefID"
											FROM
												(
												''
												||
												(
												SELECT
													"SchSysConfig"."Func_SQLGenerator_Array_BaseBranch"(
														' || varBranch_RefID::varchar || '::bigint
														)
												)
												||
												''
												) AS "SubSQL"
											''
											)
										)) AS "SubSQL"("IDArray" bigint[], "ValueArray_BaseInstitutionBranch_RefID" bigint[])
								'
								) AS "SubSQL" (
									"InstitutionBranch_RefIDArray" bigint[],
									"BaseInstitutionBranch_RefIDArray" bigint[]
									);
					END IF;
					--RAISE NOTICE 'varArraySysBranch_RefID : %', varArraySysBranch_RefID;
					--RAISE NOTICE 'varArraySysBaseBranch_RefID : %', varArraySysBaseBranch_RefID;

				---> Initializing : varArrayCurrency_RefID, varArrayCurrencyISOCode, varArrayCurrencySymbol
					varArrayCurrency_RefID := (varEnvironmentParameter->'DataReference.Array.Currency'->>'ID')::bigint[];
					varArrayCurrencyISOCode := (varEnvironmentParameter->'DataReference.Array.Currency'->>'Value_ISOCode')::varchar(3)[];
					varArrayCurrencySymbol := (varEnvironmentParameter->'DataReference.Array.Currency'->>'Value_Symbol')::varchar(4)[];

					IF ((varArrayCurrency_RefID IS NULL) OR (varArrayCurrencyISOCode IS NULL) OR (varArrayCurrencySymbol IS NULL)) THEN
						SELECT
							"SubSQL"."Currency_RefIDArray",
							"SubSQL"."ISOCodeArray",
							"SubSQL"."SymbolArray"
						INTO
							varArrayCurrency_RefID,
							varArrayCurrencyISOCode,
							varArrayCurrencySymbol
						FROM
							DBLINK (
								varDBLinkConnectionString_BE_DataOLTP,
								'
								SELECT
									"SubSQL"."Currency_RefIDArray",
									"SubSQL"."ISOCodeArray",
									"SubSQL"."SymbolArray"
								FROM
									"SchSystem"."FuncSys_General_StrSQLExecution"((
										SELECT
											''
											SELECT
												"SubSQL"."IDArray",
												"SubSQL"."ValueArray_ISOCode",
												"SubSQL"."ValueArray_Symbol"
											FROM
												(
												''
												||
												(
												SELECT
													"SchMaster"."Func_SQLGenerator_Array_Currency"()
												)
												||
												''
												) AS "SubSQL"
											''
										)) AS "SubSQL" (
											"Currency_RefIDArray" bigint[],
											"ISOCodeArray" varchar[],
											"SymbolArray" varchar[]
											)
								'
								) AS "SubSQL" (
									"Currency_RefIDArray" bigint[],
									"ISOCodeArray" varchar[],
									"SymbolArray" varchar[]
									);
					END IF;
					--RAISE NOTICE 'varArrayCurrency_RefID : %', varArrayCurrency_RefID;
					--RAISE NOTICE 'varArrayCurrencyISOCode : %', varArrayCurrencyISOCode;
					--RAISE NOTICE 'varArrayCurrencySymbol : %', varArrayCurrencySymbol;

				---> Initializing : varMainTable
					varMainTable := '"SchAcquisition"."TblLog_FileUpload_Pointer"';

				---> Reinitializing : varArrayID
					IF (varArrayID::varchar = '{}') THEN
						varArrayID := NULL::bigint[];
					END IF;

				---> Initializing : varSQL ► Build Source Data Link
					IF (varArrayID IS NOT NULL) THEN
						varSQL := '
							SELECT
								"Sys_PID",
								"Sys_SID",
								"Sys_RPK"
							FROM
								' || varMainTable || '
							WHERE
								"Sys_PID" IN (
									SELECT DISTINCT
										UNNEST ((''' || COALESCE(varArrayID::varchar, '') || ''')::bigint[])
									)
								AND
								"Sys_Data_Delete_DateTimeTZ" IS NULL
								AND
								"Sys_Data_Hidden_DateTimeTZ" IS NULL
								AND
								CASE
									WHEN (' || COALESCE(varBranch_RefID::varchar, 'NULL') || '::bigint IS NOT NULL) THEN
										"Sys_Branch_RefID" IN (' || ('SELECT UNNEST(''' || varArraySysBranch_RefID::varchar || '''::bigint[])::bigint')::varchar || ')
									ELSE
										1 = 1
								END
							UNION
							SELECT
								"Sys_PID",
								"Sys_SID",
								"Sys_RPK"
							FROM
								' || varMainTable || '
							WHERE
								"Sys_SID" IN (
									SELECT DISTINCT
										UNNEST ((''' || COALESCE(varArrayID::varchar, '') || ''')::bigint[])
									)
								AND
								"Sys_Data_Delete_DateTimeTZ" IS NULL
								AND
								"Sys_Data_Hidden_DateTimeTZ" IS NULL
								AND
								CASE
									WHEN (' || COALESCE(varBranch_RefID::varchar, 'NULL') || '::bigint IS NOT NULL) THEN
										"Sys_Branch_RefID" IN (' || ('SELECT UNNEST(''' || varArraySysBranch_RefID::varchar || '''::bigint[])::bigint')::varchar || ')
									ELSE
										1 = 1
								END
						';
					ELSE
						varSQL := '
							SELECT
								"Sys_PID",
								"Sys_SID",
								"Sys_RPK"
							FROM
								' || varMainTable || '
							WHERE
								"Sys_Data_Delete_DateTimeTZ" IS NULL
								AND
								"Sys_Data_Hidden_DateTimeTZ" IS NULL
								AND
								CASE
									WHEN (' || COALESCE(varBranch_RefID::varchar, 'NULL') || '::bigint IS NOT NULL) THEN
										"Sys_Branch_RefID" IN (' || ('SELECT UNNEST(''' || varArraySysBranch_RefID::varchar || '''::bigint[])::bigint')::varchar || ')
									ELSE
										1 = 1
								END
							';
					END IF;				
					--RAISE NOTICE '%', varSQL;

				---> Initializing : varSQL ► Rearrange Sequence
					IF (varArrayID IS NOT NULL) THEN
						varSQL := '
							SELECT
								"SubSQL"."Sys_ID",
								"SubSQL"."Sys_RPK",
								------------------------------
								"SubSQL"."OrderSequence"
							FROM
								(
								SELECT
									COALESCE (
										"SubSQL2"."Sys_PID",
										"SubSQL2"."Sys_SID"
										) AS "Sys_ID",
									"SubSQL2"."Sys_RPK",
									------------------------------
									"SubSQL1"."OrderSequence"
								FROM
									(
									SELECT
										"SubSQL"."Sys_IDLink",
										------------------------------
										ROW_NUMBER () OVER () AS "OrderSequence"
									FROM
										(
										SELECT
											UNNEST (' || (COALESCE(('''' || varArrayID::varchar || ''''), 'NULL'::varchar)) || '::bigint[]) AS "Sys_IDLink"
										) AS "SubSQL"
									) AS "SubSQL1"
										LEFT JOIN
											(' || varSQL || ') AS "SubSQL2"
												ON
													"SubSQL1"."Sys_IDLink" = "SubSQL2"."Sys_PID"
													OR
													"SubSQL1"."Sys_IDLink" = "SubSQL2"."Sys_SID"
								ORDER BY
									"SubSQL1"."OrderSequence" ASC
								) AS "SubSQL"
							';
					ELSE
						varSQL := '
							SELECT
								"SubSQL"."Sys_ID",
								"SubSQL"."Sys_RPK",
								------------------------------
								"SubSQL"."OrderSequence"
							FROM
								(
								SELECT
									COALESCE (
										"SubSQL"."Sys_PID",
										"SubSQL"."Sys_SID"
										) AS "Sys_ID",
									"SubSQL"."Sys_RPK",
									------------------------------
									ROW_NUMBER () OVER () AS "OrderSequence"
								FROM
									(' || varSQL || ') AS "SubSQL"
								) AS "SubSQL"
							';
					END IF;
					--RAISE NOTICE '%', varSQL;

			ELSE
				---> Initializing : varSQLDefault
					varSQLDefault := '
						SELECT
							*
						FROM
							(
							SELECT
								NULL::bigint AS "Sys_ID",
								NULL::bigint AS "Sys_PID",
								NULL::bigint AS "Sys_SID",
								NULL::bigint AS "Sys_RPK",
								NULL::bigint AS "Sys_Branch_RefID",
								NULL::bigint AS "Sys_BaseBranch_RefID",
								NULL::bigint AS "Sys_BaseCurrency_RefID",
								NULL::varchar(3) AS "Sys_BaseCurrencyISOCode",
								NULL::varchar(4) AS "Sys_BaseCurrencySymbol",
								-----------------------------
								NULL::bigint AS "Log_FileUpload_PointerHistory_RefID",
								------------------------------
								NULL::bigint AS "Log_FileUpload_PointerHistoryDetail_RefID",
								------------------------------
								NULL::bigint AS "Log_FileUpload_Object_RefID",
								------------------------------
								NULL::json AS "JSONData",
								------------------------------
								NULL::bigint AS "OrderSequence",
								------------------------------
								NULL::bigint AS "Env_Pagination_ItemSequence",
								NULL::json AS "Env_Information"
							WHERE
								FALSE IS TRUE
							) AS "SubSQL"
						';
			END IF;
		-----[ VARIABLES INITIALIZATION FOR ELIGIBLE PROCESS ]------------------------(  END  )-----

	----[ ⦿ ]--[ Data Processing ]--------------------------------------------------------[ ⦿ ]----
		IF (varSignEligibleToProcess IS TRUE) THEN
			-----[ MAIN DATA PROCESSING ]---------------------------------------------( START )-----
				---> Initializing : varSQL
					varSQL := '
						SELECT
							*
						FROM
							(
							SELECT
								"SubSQL"."Sys_ID",
								"SubSQL"."Sys_PID",
								"SubSQL"."Sys_SID",
								"SubSQL"."Sys_RPK",
								"SubSQL"."Sys_Branch_RefID",
								"SubSQL"."Sys_BaseBranch_RefID",
								"SubSQL"."Sys_BaseCurrency_RefID",
								------------------------------
								"SubSQL"."Log_FileUpload_PointerHistory_RefID",
								------------------------------
								"SubSQL"."Log_FileUpload_PointerHistoryDetail_RefID",
								------------------------------
								"SubSQL"."Log_FileUpload_Object_RefID",
								------------------------------
								"SubSQL"."JSONData",
								------------------------------
								"SubSQL"."OrderSequence"
							FROM
								(
								SELECT
									"SubSQL"."Sys_ID",
									"SubSQL"."Sys_PID",
									"SubSQL"."Sys_SID",
									"SubSQL"."Sys_RPK",
									"SubSQL"."Sys_Branch_RefID",
									"SubSQL"."Sys_BaseBranch_RefID",
									"SubSQL"."Sys_BaseCurrency_RefID",
									------------------------------
									"SubSQL"."Log_FileUpload_PointerHistory_RefID",
									------------------------------
									"SubSQL"."Log_FileUpload_PointerHistoryDetail_RefID",
									------------------------------
									"SubSQL"."Log_FileUpload_Object_RefID",
									------------------------------
									(
									''['' ||
									STRING_AGG (
										(
										CASE
											WHEN ("SubSQL"."Log_FileUpload_ObjectDetail_RefID" IS NOT NULL) THEN 
												JSON_BUILD_OBJECT (
													''index'', "SubSQL"."IndexSequence",
													''recordID'', "SubSQL"."Log_FileUpload_ObjectDetail_RefID",
													''dataSource'', ''SchAcquisition.TblLog_FileUpload_ObjectDetail'',
													''entities'', JSON_BUILD_OBJECT (
														''log_FileUpload_PointerHistory_RefID'', "SubSQL"."Log_FileUpload_PointerHistory_RefID",
														''log_FileUpload_PointerHistoryDetail_RefID'', "SubSQL"."Log_FileUpload_PointerHistoryDetail_RefID",
														''log_FileUpload_Object_RefID'', "SubSQL"."Log_FileUpload_Object_RefID",
														''uploadDateTimeTZ'', "SubSQL"."UploadDateTimeTZ",
														''name'', "SubSQL"."Name",
														''size'', "SubSQL"."Size",
														''extension'', "SubSQL"."Extension"
														)
													)::varchar
											ELSE
												NULL
										END
										),
										'', ''
									) OVER (
										PARTITION BY
											"SubSQL"."OrderSequence"
										) ||
									'']''
									)::json AS "JSONData",
									------------------------------
									"SubSQL"."OrderSequence",
									ROW_NUMBER () OVER (
										PARTITION BY
											"SubSQL"."OrderSequence"
										) AS "FilterSequence",
									"SubSQL"."OrderSequenceExpansion"
								FROM
									(
									SELECT
										"SubSQL"."Sys_ID",
										"SubSQL"."Sys_PID",
										"SubSQL"."Sys_SID",
										"SubSQL"."Sys_RPK",
										"SubSQL"."Sys_Branch_RefID",
										"SubSQL"."Sys_BaseBranch_RefID",
										"SubSQL"."Sys_BaseCurrency_RefID",
										------------------------------
										"SubSQL"."UploadDateTimeTZ",
										------------------------------
										"SubSQL"."Log_FileUpload_PointerHistory_RefID",
										------------------------------
										"SubSQL"."Log_FileUpload_PointerHistoryDetail_RefID",
										------------------------------
										"SubSQL"."Log_FileUpload_Object_RefID",
										------------------------------
										"SubSQL"."Log_FileUpload_ObjectDetail_RefID",
										------------------------------
										"SubSQL"."Sequence",
										"SubSQL"."Name",
										"SubSQL"."Size",
										"SubSQL"."Extension",
										------------------------------
										"SubSQL"."OrderSequence",
										ROW_NUMBER () OVER (
											PARTITION BY
												"SubSQL"."OrderSequence"
											ORDER BY
												"SubSQL"."OrderSequenceExpansion" ASC
											) AS "IndexSequence",
										"SubSQL"."OrderSequenceExpansion"
									FROM
										(
										SELECT
											"SubSQL"."Sys_ID",
											"SubSQL"."Sys_PID",
											"SubSQL"."Sys_SID",
											"SubSQL"."Sys_RPK",
											"SubSQL"."Sys_Branch_RefID",
											"SubSQL"."Sys_BaseBranch_RefID",
											"SubSQL"."Sys_BaseCurrency_RefID",
											------------------------------
											"SubSQL"."UploadDateTimeTZ",
											------------------------------
											"SubSQL"."Log_FileUpload_PointerHistory_RefID",
											------------------------------
											"SubSQL"."Log_FileUpload_PointerHistoryDetail_RefID",
											------------------------------
											"SubSQL"."Log_FileUpload_Object_RefID",
											------------------------------
											"SubSQL"."Log_FileUpload_ObjectDetail_RefID",
											------------------------------
											"SubSQL"."Sequence",
											"SubSQL"."Name",
											"SubSQL"."Size",
											"SubSQL"."Extension",
											------------------------------
											"SubSQL"."OrderSequence",
											ROW_NUMBER () OVER (
												ORDER BY
													"SubSQL"."OrderSequenceExpansion" ASC,
													"SubSQL"."Sequence" ASC
												) AS "OrderSequenceExpansion"
										FROM
											(
											SELECT
												"SubSQL"."Sys_ID",
												"SubSQL"."Sys_PID",
												"SubSQL"."Sys_SID",
												"SubSQL"."Sys_RPK",
												"SubSQL"."Sys_Branch_RefID",
												"SubSQL"."Sys_BaseBranch_RefID",
												"SubSQL"."Sys_BaseCurrency_RefID",
												------------------------------
												"SubSQL"."UploadDateTimeTZ",
												------------------------------
												"SubSQL"."Log_FileUpload_PointerHistory_RefID",
												------------------------------
												"SubSQL"."Log_FileUpload_PointerHistoryDetail_RefID",
												------------------------------
												"SubSQL"."Log_FileUpload_Object_RefID",
												------------------------------
												COALESCE (
													"VirtTblLog_FileUpload_ObjectDetail_PID"."Sys_PID",
													"VirtTblLog_FileUpload_ObjectDetail_SID"."Sys_PID",
													"VirtTblLog_FileUpload_ObjectDetail_PID"."Sys_SID",
													"VirtTblLog_FileUpload_ObjectDetail_SID"."Sys_SID"
													) AS "Log_FileUpload_ObjectDetail_RefID",
												------------------------------
												COALESCE (
													"VirtTblLog_FileUpload_ObjectDetail_PID"."Sequence",
													"VirtTblLog_FileUpload_ObjectDetail_SID"."Sequence"
													) AS "Sequence",
												COALESCE (
													"VirtTblLog_FileUpload_ObjectDetail_PID"."Name",
													"VirtTblLog_FileUpload_ObjectDetail_SID"."Name"
													) AS "Name",
												COALESCE (
													"VirtTblLog_FileUpload_ObjectDetail_PID"."Size",
													"VirtTblLog_FileUpload_ObjectDetail_SID"."Size"
													) AS "Size",
												COALESCE (
													"VirtTblLog_FileUpload_ObjectDetail_PID"."Extension",
													"VirtTblLog_FileUpload_ObjectDetail_SID"."Extension"
													) AS "Extension",
												------------------------------
												"SubSQL"."OrderSequence",
												ROW_NUMBER () OVER (
													ORDER BY
														"SubSQL"."OrderSequenceExpansion" ASC,
														COALESCE (
															"VirtTblLog_FileUpload_ObjectDetail_PID"."Sys_Data_Edit_DateTimeTZ",
															"VirtTblLog_FileUpload_ObjectDetail_SID"."Sys_Data_Edit_DateTimeTZ",
															"VirtTblLog_FileUpload_ObjectDetail_PID"."Sys_Data_Entry_DateTimeTZ",
															"VirtTblLog_FileUpload_ObjectDetail_SID"."Sys_Data_Entry_DateTimeTZ"
															) ASC
													) AS "OrderSequenceExpansion"
											FROM
												(
												SELECT
													"SubSQL"."Sys_ID",
													"SubSQL"."Sys_PID",
													"SubSQL"."Sys_SID",
													"SubSQL"."Sys_RPK",
													"SubSQL"."Sys_Branch_RefID",
													"SubSQL"."Sys_BaseBranch_RefID",
													"SubSQL"."Sys_BaseCurrency_RefID",
													------------------------------
													"SubSQL"."UploadDateTimeTZ",
													------------------------------
													"SubSQL"."Log_FileUpload_PointerHistory_RefID",
													------------------------------
													"SubSQL"."Log_FileUpload_PointerHistoryDetail_RefID",
													------------------------------
													COALESCE (
														"VirtTblLog_FileUpload_Object_PID"."Sys_PID",
														"VirtTblLog_FileUpload_Object_SID"."Sys_PID",
														"VirtTblLog_FileUpload_Object_PID"."Sys_SID",
														"VirtTblLog_FileUpload_Object_SID"."Sys_SID"
														) AS "Log_FileUpload_Object_RefID",
													COALESCE (
														"VirtTblLog_FileUpload_Object_PID"."Sys_PID",
														"VirtTblLog_FileUpload_Object_SID"."Sys_PID"
														) AS "Log_FileUpload_Object_RefPIDLink",
													COALESCE (
														"VirtTblLog_FileUpload_Object_PID"."Sys_SID",
														"VirtTblLog_FileUpload_Object_SID"."Sys_SID"
														) AS "Log_FileUpload_Object_RefSIDLink",
													------------------------------
													"SubSQL"."OrderSequence",
													ROW_NUMBER () OVER (
														ORDER BY
															"SubSQL"."OrderSequenceExpansion" ASC,
															COALESCE (
																"VirtTblLog_FileUpload_Object_PID"."Sys_Data_Edit_DateTimeTZ",
																"VirtTblLog_FileUpload_Object_SID"."Sys_Data_Edit_DateTimeTZ",
																"VirtTblLog_FileUpload_Object_PID"."Sys_Data_Entry_DateTimeTZ",
																"VirtTblLog_FileUpload_Object_SID"."Sys_Data_Entry_DateTimeTZ"
																) ASC
														) AS "OrderSequenceExpansion"
												FROM
													(
													SELECT
														"SubSQL"."Sys_ID",
														"SubSQL"."Sys_PID",
														"SubSQL"."Sys_SID",
														"SubSQL"."Sys_RPK",
														"SubSQL"."Sys_Branch_RefID",
														"SubSQL"."Sys_BaseBranch_RefID",
														"SubSQL"."Sys_BaseCurrency_RefID",
														------------------------------
														"SubSQL"."UploadDateTimeTZ",
														------------------------------
														"SubSQL"."Log_FileUpload_PointerHistory_RefID",
														------------------------------
														COALESCE (
															"VirtTblLog_FileUpload_PointerHistoryDetail_PID". "Sys_PID",
															"VirtTblLog_FileUpload_PointerHistoryDetail_PID". "Sys_PID",
															"VirtTblLog_FileUpload_PointerHistoryDetail_SID". "Sys_SID",
															"VirtTblLog_FileUpload_PointerHistoryDetail_SID". "Sys_SID"
															) AS "Log_FileUpload_PointerHistoryDetail_RefID",
														------------------------------
														COALESCE (
															"VirtTblLog_FileUpload_PointerHistoryDetail_PID". "Log_FileUpload_Object_RefID",
															"VirtTblLog_FileUpload_PointerHistoryDetail_SID". "Log_FileUpload_Object_RefID"
															) AS "Log_FileUpload_Object_RefIDLink",
														------------------------------
														"SubSQL"."OrderSequence",
														ROW_NUMBER () OVER (
															ORDER BY
																"SubSQL"."OrderSequenceExpansion" ASC,
																COALESCE (
																	"VirtTblLog_FileUpload_PointerHistoryDetail_PID"."Sys_Data_Edit_DateTimeTZ",
																	"VirtTblLog_FileUpload_PointerHistoryDetail_SID"."Sys_Data_Edit_DateTimeTZ",
																	"VirtTblLog_FileUpload_PointerHistoryDetail_PID"."Sys_Data_Entry_DateTimeTZ",
																	"VirtTblLog_FileUpload_PointerHistoryDetail_SID"."Sys_Data_Entry_DateTimeTZ"
																	) ASC
															) AS "OrderSequenceExpansion"
													FROM
														(
														SELECT
															"SubSQL"."Sys_ID",
															"SubSQL"."Sys_PID",
															"SubSQL"."Sys_SID",
															"SubSQL"."Sys_RPK",
															"SubSQL"."Sys_Branch_RefID",
															"SubSQL"."Sys_BaseBranch_RefID",
															"SubSQL"."Sys_BaseCurrency_RefID",
															------------------------------
															COALESCE (
																"VirtTblLog_FileUpload_PointerHistory_PID"."Sys_PID",
																"VirtTblLog_FileUpload_PointerHistory_SID"."Sys_PID",
																"VirtTblLog_FileUpload_PointerHistory_PID"."Sys_SID",
																"VirtTblLog_FileUpload_PointerHistory_SID"."Sys_SID"
																) AS "Log_FileUpload_PointerHistory_RefID",
															COALESCE (
																"VirtTblLog_FileUpload_PointerHistory_PID"."Sys_PID",
																"VirtTblLog_FileUpload_PointerHistory_SID"."Sys_PID"
																) AS "Log_FileUpload_PointerHistory_RefPIDLink",
															COALESCE (
																"VirtTblLog_FileUpload_PointerHistory_PID"."Sys_SID",
																"VirtTblLog_FileUpload_PointerHistory_SID"."Sys_SID"
																) AS "Log_FileUpload_PointerHistory_RefSIDLink",
															------------------------------
															COALESCE (
																"VirtTblLog_FileUpload_PointerHistory_PID"."Sys_Data_Edit_DateTimeTZ",
																"VirtTblLog_FileUpload_PointerHistory_SID"."Sys_Data_Edit_DateTimeTZ",
																"VirtTblLog_FileUpload_PointerHistory_PID"."Sys_Data_Entry_DateTimeTZ",
																"VirtTblLog_FileUpload_PointerHistory_SID"."Sys_Data_Entry_DateTimeTZ"
																) AS "UploadDateTimeTZ",
															------------------------------
															"SubSQL"."OrderSequence",
															ROW_NUMBER () OVER (
																ORDER BY
																	"SubSQL"."OrderSequence" ASC,
																	COALESCE (
																		"VirtTblLog_FileUpload_PointerHistory_PID"."Sys_Data_Edit_DateTimeTZ",
																		"VirtTblLog_FileUpload_PointerHistory_SID"."Sys_Data_Edit_DateTimeTZ",
																		"VirtTblLog_FileUpload_PointerHistory_PID"."Sys_Data_Entry_DateTimeTZ",
																		"VirtTblLog_FileUpload_PointerHistory_SID"."Sys_Data_Entry_DateTimeTZ"
																		) ASC
																) AS "OrderSequenceExpansion"
														FROM
															(
															----[ MAIN CORE DATA ]-----( START )-----
															SELECT
																"SubSQL"."Sys_ID",
																"SubSQL"."Sys_PID",
																"SubSQL"."Sys_SID",
																"SubSQL"."Sys_RPK",
																"SubSQL"."Sys_Branch_RefID",
																"SubSQL"."Sys_BaseBranch_RefID",
																"SubSQL"."Sys_BaseCurrency_RefID",
																------------------------------
																"SubSQL"."OrderSequence"
															FROM
																(
																SELECT
																	COALESCE (
																		"VirtTblMainData"."Sys_PID",
																		"VirtTblMainData"."Sys_SID"
																		) AS "Sys_ID",
																	"VirtTblMainData"."Sys_PID",
																	"VirtTblMainData"."Sys_SID",
																	"VirtTblMainData"."Sys_RPK",
																	"VirtTblMainData"."Sys_Branch_RefID",
																	"SubSQLBaseBranch"."BaseInstitutionBranch_RefID" AS "Sys_BaseBranch_RefID",
																	"VirtTblMainData"."Sys_BaseCurrency_RefID",
																	------------------------------
																	ROW_NUMBER () OVER (
																		ORDER BY
																			"SubSQL"."OrderSequence" ASC
																	) AS "OrderSequence"
																FROM
																	(' || varSQL || ') AS "SubSQL"
																		LEFT JOIN
																			' || varMainTable || ' AS "VirtTblMainData"
																				ON
																					"SubSQL"."Sys_RPK" = "VirtTblMainData"."Sys_RPK"
																		LEFT JOIN
																			(
																			SELECT
																				UNNEST(''' || varArraySysBranch_RefID::varchar || '''::bigint[])::bigint AS "InstitutionBranch_RefID",
																				UNNEST(''' || varArraySysBaseBranch_RefID::varchar || '''::bigint[])::bigint AS "BaseInstitutionBranch_RefID"
																			) AS "SubSQLBaseBranch"
																				ON
																					"VirtTblMainData"."Sys_Branch_RefID" = "SubSQLBaseBranch"."InstitutionBranch_RefID"
																) AS "SubSQL"
															----[ MAIN CORE DATA ]-----(  END  )-----
															) AS "SubSQL"
																LEFT JOIN
																	"SchAcquisition"."TblLog_FileUpload_PointerHistory" AS "VirtTblLog_FileUpload_PointerHistory_PID"
																		ON
																			"SubSQL"."Sys_PID" = "VirtTblLog_FileUpload_PointerHistory_PID". "Log_FileUpload_Pointer_RefID"
																			AND
																			"VirtTblLog_FileUpload_PointerHistory_PID". "Sys_Data_Delete_DateTimeTZ" IS NULL
																			AND
																			"VirtTblLog_FileUpload_PointerHistory_PID". "Sys_Data_Hidden_DateTimeTZ" IS NULL
																LEFT JOIN
																	"SchAcquisition"."TblLog_FileUpload_PointerHistory" AS "VirtTblLog_FileUpload_PointerHistory_SID"
																		ON
																			"SubSQL"."Sys_SID" = "VirtTblLog_FileUpload_PointerHistory_SID". "Log_FileUpload_Pointer_RefID"
																			AND
																			"VirtTblLog_FileUpload_PointerHistory_SID". "Sys_Data_Delete_DateTimeTZ" IS NULL
																			AND
																			"VirtTblLog_FileUpload_PointerHistory_SID". "Sys_Data_Hidden_DateTimeTZ" IS NULL
														) AS "SubSQL"
															LEFT JOIN
																"SchAcquisition"."TblLog_FileUpload_PointerHistoryDetail" AS "VirtTblLog_FileUpload_PointerHistoryDetail_PID"
																	ON
																		"SubSQL"."Log_FileUpload_PointerHistory_RefPIDLink" = "VirtTblLog_FileUpload_PointerHistoryDetail_PID". "Log_FileUpload_PointerHistory_RefID"
																		AND
																		"VirtTblLog_FileUpload_PointerHistoryDetail_PID". "Sys_Data_Delete_DateTimeTZ" IS NULL
																		AND
																		"VirtTblLog_FileUpload_PointerHistoryDetail_PID". "Sys_Data_Hidden_DateTimeTZ" IS NULL
															LEFT JOIN
																"SchAcquisition"."TblLog_FileUpload_PointerHistoryDetail" AS "VirtTblLog_FileUpload_PointerHistoryDetail_SID"
																	ON
																		"SubSQL"."Log_FileUpload_PointerHistory_RefSIDLink" = "VirtTblLog_FileUpload_PointerHistoryDetail_SID". "Log_FileUpload_PointerHistory_RefID"
																		AND
																		"VirtTblLog_FileUpload_PointerHistoryDetail_SID". "Sys_Data_Delete_DateTimeTZ" IS NULL
																		AND
																		"VirtTblLog_FileUpload_PointerHistoryDetail_SID". "Sys_Data_Hidden_DateTimeTZ" IS NULL
													) AS "SubSQL"
														LEFT JOIN
															"SchAcquisition"."TblLog_FileUpload_Object" AS "VirtTblLog_FileUpload_Object_PID"
																ON
																	"SubSQL"."Log_FileUpload_Object_RefIDLink" = "VirtTblLog_FileUpload_Object_PID"."Sys_PID"
																	AND
																	"VirtTblLog_FileUpload_Object_PID". "Sys_Data_Delete_DateTimeTZ" IS NULL
																	AND
																	"VirtTblLog_FileUpload_Object_PID". "Sys_Data_Hidden_DateTimeTZ" IS NULL
														LEFT JOIN
															"SchAcquisition"."TblLog_FileUpload_Object" AS "VirtTblLog_FileUpload_Object_SID"
																ON
																	"SubSQL"."Log_FileUpload_Object_RefIDLink" = "VirtTblLog_FileUpload_Object_SID"."Sys_SID"
																	AND
																	"VirtTblLog_FileUpload_Object_SID". "Sys_Data_Delete_DateTimeTZ" IS NULL
																	AND
																	"VirtTblLog_FileUpload_Object_SID". "Sys_Data_Hidden_DateTimeTZ" IS NULL
												) AS "SubSQL"
													LEFT JOIN
														"SchAcquisition"."TblLog_FileUpload_ObjectDetail" AS "VirtTblLog_FileUpload_ObjectDetail_PID"
															ON
																"SubSQL"."Log_FileUpload_Object_RefPIDLink" = "VirtTblLog_FileUpload_ObjectDetail_PID"."Log_FileUpload_Object_RefID"
																AND
																"VirtTblLog_FileUpload_ObjectDetail_PID". "Sys_Data_Delete_DateTimeTZ" IS NULL
																AND
																"VirtTblLog_FileUpload_ObjectDetail_PID". "Sys_Data_Hidden_DateTimeTZ" IS NULL
													LEFT JOIN
														"SchAcquisition"."TblLog_FileUpload_ObjectDetail" AS "VirtTblLog_FileUpload_ObjectDetail_SID"
															ON
																"SubSQL"."Log_FileUpload_Object_RefSIDLink" = "VirtTblLog_FileUpload_ObjectDetail_SID"."Log_FileUpload_Object_RefID"
																AND
																"VirtTblLog_FileUpload_ObjectDetail_SID". "Sys_Data_Delete_DateTimeTZ" IS NULL
																AND
																"VirtTblLog_FileUpload_ObjectDetail_SID". "Sys_Data_Hidden_DateTimeTZ" IS NULL
											) AS "SubSQL"
										--WHERE
										--	"SubSQL"."Log_FileUpload_ObjectDetail_RefID" IS NOT NULL
										) AS "SubSQL"
									) AS "SubSQL"
								) AS "SubSQL"
							WHERE
								"SubSQL"."FilterSequence" = 1
							) AS "SubSQL"
						';

					varSQL := '
						SELECT
							*
						FROM
							(
							SELECT
								"SubSQL"."Sys_ID",
								"SubSQL"."Sys_PID",
								"SubSQL"."Sys_SID",
								"SubSQL"."Sys_RPK",
								"SubSQL"."Sys_Branch_RefID",
								"SubSQL"."Sys_BaseBranch_RefID",
								"SubSQL"."Sys_BaseCurrency_RefID",
								"SubSQL"."Sys_BaseCurrencyISOCode",
								"SubSQL"."Sys_BaseCurrencySymbol",
								------------------------------
								"SubSQL"."Log_FileUpload_PointerHistory_RefID",
								------------------------------
								"SubSQL"."Log_FileUpload_PointerHistoryDetail_RefID",
								------------------------------
								"SubSQL"."Log_FileUpload_Object_RefID",
								------------------------------
								"SubSQL"."JSONData",
								------------------------------
								ROW_NUMBER () OVER (
									ORDER BY
										"SubSQL"."OrderSequence" ASC
									) AS "OrderSequence",
								------------------------------
								"SubSQL"."Env_Pagination_ItemSequence",
								"SubSQL"."Env_Information"
							FROM
								(
								SELECT
									"SubSQL"."Env_Information",
									"SubSQL"."Env_Pagination_ItemSequence",
									------------------------------
									"SubSQL"."Sys_ID",
									"SubSQL"."Sys_PID",
									"SubSQL"."Sys_SID",
									"SubSQL"."Sys_RPK",
									"SubSQL"."Sys_Branch_RefID",
									"SubSQL"."Sys_BaseBranch_RefID",
									"SubSQLBaseCurrency"."Sys_ID" AS "Sys_BaseCurrency_RefID",
									"SubSQLBaseCurrency"."ISOCode" AS "Sys_BaseCurrencyISOCode",
									"SubSQLBaseCurrency"."Symbol" AS "Sys_BaseCurrencySymbol",
									------------------------------
									"SubSQL"."Log_FileUpload_PointerHistory_RefID",
									------------------------------
									"SubSQL"."Log_FileUpload_PointerHistoryDetail_RefID",
									------------------------------
									"SubSQL"."Log_FileUpload_Object_RefID",
									------------------------------
									"SubSQL"."JSONData",
									------------------------------
									"SubSQL"."OrderSequence"
								FROM
									(
									----[ MAIN CORE DATA + PAGINATION ]-----( START )-----
									SELECT
										"SubSQL"."Env_Information",
										"SubSQL"."Env_Pagination_ItemSequence",
										------------------------------
										"SubSQL"."Sys_ID",
										"SubSQL"."Sys_PID",
										"SubSQL"."Sys_SID",
										"SubSQL"."Sys_RPK",
										"SubSQL"."Sys_Branch_RefID",
										"SubSQL"."Sys_BaseBranch_RefID",
										"SubSQL"."Sys_BaseCurrency_RefID",
										------------------------------
										"SubSQL"."Log_FileUpload_PointerHistory_RefID",
										------------------------------
										"SubSQL"."Log_FileUpload_PointerHistoryDetail_RefID",
										------------------------------
										"SubSQL"."Log_FileUpload_Object_RefID",
										------------------------------
										"SubSQL"."JSONData",
										------------------------------
										"SubSQL"."OrderSequence"
									FROM
										(
										SELECT
											(
											CASE
												WHEN ("SubSQL"."OrderSequence" = 1) THEN
													JSON_BUILD_OBJECT (
														''general'',
															JSON_BUILD_OBJECT (
																''dataCount'', "SubSQL"."Env_DataCount",
																''pagination'', JSON_BUILD_OBJECT (
																	''pageSize'', "SubSQL"."Env_Pagination_PageSize",
																	''pageCount'', "SubSQL"."Env_Pagination_PageCount",
																	''pageShow'', "SubSQL"."Env_Pagination_PageShow"																
																	),
																''dataCustomize'', JSON_BUILD_OBJECT (
																	''filterString'', ' || COALESCE(('''' || REPLACE (varDataCustomize_Filter, '''', '''''') || ''''), 'NULL') || ',
																	''sortString'', ' || COALESCE(('''' || REPLACE (varDataCustomize_Sort, '''', '''''') || ''''), 'NULL') || '
																	)
																)
														)
												ELSE
													NULL
											END
											) AS "Env_Information",
											"SubSQL"."Env_Pagination_ItemSequence",
											------------------------------
											"SubSQL"."Sys_ID",
											"SubSQL"."Sys_PID",
											"SubSQL"."Sys_SID",
											"SubSQL"."Sys_RPK",
											"SubSQL"."Sys_Branch_RefID",
											"SubSQL"."Sys_BaseBranch_RefID",
											"SubSQL"."Sys_BaseCurrency_RefID",
											------------------------------
											"SubSQL"."Log_FileUpload_PointerHistory_RefID",
											------------------------------
											"SubSQL"."Log_FileUpload_PointerHistoryDetail_RefID",
											------------------------------
											"SubSQL"."Log_FileUpload_Object_RefID",
											------------------------------
											"SubSQL"."JSONData",
											------------------------------
											"SubSQL"."OrderSequence"
										FROM
											(
											SELECT
												"SubSQL"."Env_DataCount",
												"SubSQL"."Env_Pagination_PageSize",
												"SubSQL"."Env_Pagination_PageCount",
												"SubSQL"."Env_Pagination_PageShow",
												"SubSQL"."Env_Pagination_ItemSequence",
												------------------------------
												"SubSQL"."Sys_ID",
												"SubSQL"."Sys_PID",
												"SubSQL"."Sys_SID",
												"SubSQL"."Sys_RPK",
												"SubSQL"."Sys_Branch_RefID",
												"SubSQL"."Sys_BaseBranch_RefID",
												"SubSQL"."Sys_BaseCurrency_RefID",
												------------------------------
												"SubSQL"."Log_FileUpload_PointerHistory_RefID",
												------------------------------
												"SubSQL"."Log_FileUpload_PointerHistoryDetail_RefID",
												------------------------------
												"SubSQL"."Log_FileUpload_Object_RefID",
												------------------------------
												"SubSQL"."JSONData",
												------------------------------
												"SubSQL"."OrderSequence"
											FROM
												(
												SELECT
													"SubSQL"."Env_DataCount",
													"SubSQL"."Env_Pagination_PageSize",
													"SubSQL"."Env_Pagination_PageCount",
													COALESCE (
														CASE
															WHEN ("SubSQL"."Env_Pagination_PageShow" > "SubSQL"."Env_Pagination_PageCount") THEN
																"SubSQL"."Env_Pagination_PageCount"
															WHEN ("SubSQL"."Env_Pagination_PageShow" > 0) THEN
																"SubSQL"."Env_Pagination_PageShow"
															ELSE
																NULL
														END,
														1
														) AS "Env_Pagination_PageShow",
													"SubSQL"."Env_Pagination_ItemSequence",
													------------------------------
													"SubSQL"."Sys_ID",
													"SubSQL"."Sys_PID",
													"SubSQL"."Sys_SID",
													"SubSQL"."Sys_RPK",
													"SubSQL"."Sys_Branch_RefID",
													"SubSQL"."Sys_BaseBranch_RefID",
													"SubSQL"."Sys_BaseCurrency_RefID",
													------------------------------
													"SubSQL"."Log_FileUpload_PointerHistory_RefID",
													------------------------------
													"SubSQL"."Log_FileUpload_PointerHistoryDetail_RefID",
													------------------------------
													"SubSQL"."Log_FileUpload_Object_RefID",
													------------------------------
													"SubSQL"."JSONData",
													------------------------------
													"SubSQL"."OrderSequence"
												FROM
													(
													SELECT
														"SubSQL"."Env_DataCount",
														"SubSQL"."Env_Pagination_PageSize",
														(
															("SubSQL"."Env_DataCount" / "SubSQL"."Env_Pagination_PageSize") + 
															CASE
																WHEN (("SubSQL"."Env_DataCount" % "SubSQL"."Env_Pagination_PageSize") = 0) THEN
																	0
																ELSE
																	1
															END
														) AS "Env_Pagination_PageCount",
														"SubSQL"."Env_Pagination_PageShow",
														"SubSQL"."Env_Pagination_ItemSequence",
														------------------------------
														"SubSQL"."Sys_ID",
														"SubSQL"."Sys_PID",
														"SubSQL"."Sys_SID",
														"SubSQL"."Sys_RPK",
														"SubSQL"."Sys_Branch_RefID",
														"SubSQL"."Sys_BaseBranch_RefID",
														"SubSQL"."Sys_BaseCurrency_RefID",
														------------------------------
														"SubSQL"."Log_FileUpload_PointerHistory_RefID",
														------------------------------
														"SubSQL"."Log_FileUpload_PointerHistoryDetail_RefID",
														------------------------------
														"SubSQL"."Log_FileUpload_Object_RefID",
														------------------------------
														"SubSQL"."JSONData",
														------------------------------
														"SubSQL"."OrderSequence"
													FROM
														(
														SELECT
															"SubSQL"."Env_DataCount",
															COALESCE (
																CASE
																	WHEN ("SubSQL"."Env_Pagination_PageSize" > "SubSQL"."Env_DataCount") THEN
																		NULL
																	WHEN ("SubSQL"."Env_Pagination_PageSize" > 0) THEN
																		"SubSQL"."Env_Pagination_PageSize"
																	ELSE
																		NULL
																END,
																"SubSQL"."Env_DataCount"
																) AS "Env_Pagination_PageSize",
															"SubSQL"."Env_Pagination_PageShow",
															"SubSQL"."Env_Pagination_ItemSequence",
															------------------------------
															"SubSQL"."Sys_ID",
															"SubSQL"."Sys_PID",
															"SubSQL"."Sys_SID",
															"SubSQL"."Sys_RPK",
															"SubSQL"."Sys_Branch_RefID",
															"SubSQL"."Sys_BaseBranch_RefID",
															"SubSQL"."Sys_BaseCurrency_RefID",
															------------------------------
															"SubSQL"."Log_FileUpload_PointerHistory_RefID",
															------------------------------
															"SubSQL"."Log_FileUpload_PointerHistoryDetail_RefID",
															------------------------------
															"SubSQL"."Log_FileUpload_Object_RefID",
															------------------------------
															"SubSQL"."JSONData",
															------------------------------
															"SubSQL"."OrderSequence"
														FROM
															(
															SELECT
																MAX ("SubSQL"."OrderSequence") OVER () AS "Env_DataCount",
																' || COALESCE (varPagination_PageSize::varchar, 'NULL'::varchar) || '::bigint AS "Env_Pagination_PageSize",
																' || COALESCE (varPagination_PageShow::varchar, 'NULL'::varchar) || '::bigint AS "Env_Pagination_PageShow",
																"SubSQL"."OrderSequence" AS "Env_Pagination_ItemSequence",
																------------------------------
																"SubSQL"."Sys_ID",
																"SubSQL"."Sys_PID",
																"SubSQL"."Sys_SID",
																"SubSQL"."Sys_RPK",
																"SubSQL"."Sys_Branch_RefID",
																"SubSQL"."Sys_BaseBranch_RefID",
																"SubSQL"."Sys_BaseCurrency_RefID",
																------------------------------
																"SubSQL"."Log_FileUpload_PointerHistory_RefID",
																------------------------------
																"SubSQL"."Log_FileUpload_PointerHistoryDetail_RefID",
																------------------------------
																"SubSQL"."Log_FileUpload_Object_RefID",
																------------------------------
																"SubSQL"."JSONData",
																------------------------------
																"SubSQL"."OrderSequence"
															FROM
																(
																----[ MAIN CORE DATA ]-----( START )-----
																SELECT
																	"SubSQL"."Sys_ID",
																	"SubSQL"."Sys_PID",
																	"SubSQL"."Sys_SID",
																	"SubSQL"."Sys_RPK",
																	"SubSQL"."Sys_Branch_RefID",
																	"SubSQL"."Sys_BaseBranch_RefID",
																	"SubSQL"."Sys_BaseCurrency_RefID",
																	------------------------------
																	"SubSQL"."Log_FileUpload_PointerHistory_RefID",
																	------------------------------
																	"SubSQL"."Log_FileUpload_PointerHistoryDetail_RefID",
																	------------------------------
																	"SubSQL"."Log_FileUpload_Object_RefID",
																	------------------------------
																	"SubSQL"."JSONData",
																	------------------------------
																	"SubSQL"."OrderSequence"
																FROM
																	(
																	SELECT
																		COALESCE (
																			"VirtTblMainData"."Sys_PID",
																			"VirtTblMainData"."Sys_SID"
																			) AS "Sys_ID",
																		"VirtTblMainData"."Sys_PID",
																		"VirtTblMainData"."Sys_SID",
																		"VirtTblMainData"."Sys_RPK",
																		"VirtTblMainData"."Sys_Branch_RefID",
																		"SubSQLBaseBranch"."BaseInstitutionBranch_RefID" AS "Sys_BaseBranch_RefID",
																		"VirtTblMainData"."Sys_BaseCurrency_RefID",
																		------------------------------
																		"VirtTblMainData"."Log_FileUpload_PointerHistory_RefID",
																		------------------------------
																		"VirtTblMainData"."Log_FileUpload_PointerHistoryDetail_RefID",
																		------------------------------
																		"VirtTblMainData"."Log_FileUpload_Object_RefID",
																		------------------------------
																		"VirtTblMainData"."JSONData",
																		------------------------------
																		"VirtTblMainData"."OrderSequence"
																	FROM
																		(
																		' || varSQL || '
																		) AS "VirtTblMainData"
																			LEFT JOIN
																				(
																				SELECT
																					UNNEST(''' || varArraySysBranch_RefID::varchar || '''::bigint[])::bigint AS "InstitutionBranch_RefID",
																					UNNEST(''' || varArraySysBaseBranch_RefID::varchar || '''::bigint[])::bigint AS "BaseInstitutionBranch_RefID"
																				) AS "SubSQLBaseBranch"
																					ON
																						"VirtTblMainData"."Sys_Branch_RefID" = "SubSQLBaseBranch"."InstitutionBranch_RefID"
																	) AS "SubSQL"
																----[ MAIN CORE DATA ]-----(  END  )-----
																) AS "SubSQL"
															) AS "SubSQL"
														) AS "SubSQL"
													) AS "SubSQL"
												) AS "SubSQL"
											WHERE
												CASE
													WHEN (' || (CASE WHEN ((varDataCustomize_Filter IS NULL) AND (varDataCustomize_Sort IS NULL)) THEN 'TRUE' ELSE 'FALSE' END) || ' IS TRUE) THEN
														("SubSQL"."OrderSequence" > (("SubSQL"."Env_Pagination_PageShow" - 1) * "SubSQL"."Env_Pagination_PageSize"))
														AND
														("SubSQL"."OrderSequence" <= ("SubSQL"."Env_Pagination_PageShow" * "SubSQL"."Env_Pagination_PageSize"))
													ELSE
														1 = 1
												END
											) AS "SubSQL"
										) AS "SubSQL"
									----[ MAIN CORE DATA + PAGINATION ]-----(  END  )-----
									) AS "SubSQL"
										LEFT JOIN
											(
											SELECT
												UNNEST(('|| COALESCE ('''' || varArrayCurrency_RefID::varchar || '''', 'NULL'::varchar) || ')::bigint[]) AS "Sys_ID",
												UNNEST(('|| COALESCE ('''' || varArrayCurrencyISOCode::varchar || '''', 'NULL'::varchar) || ')::varchar[]) AS "ISOCode",
												UNNEST(('|| COALESCE ('''' || varArrayCurrencySymbol::varchar || '''', 'NULL'::varchar) || ')::varchar[]) AS "Symbol"
											) AS "SubSQLBaseCurrency"
												ON
													"SubSQL"."Sys_BaseCurrency_RefID" = "SubSQLBaseCurrency"."Sys_ID"
								) AS "SubSQL"
							) AS "SubSQL"
						';
			-----[ MAIN DATA PROCESSING ]---------------------------------------------(  END  )-----
		END IF;

		---> Initializing : varReturn
			varReturn := 
				(
				CASE
					WHEN (varSignEligibleToProcess IS TRUE) THEN
						varSQL
					ELSE
						varSQLDefault
				END
				);

	----[ ⦿ ]--[ Data Return ]------------------------------------------------------------[ ⦿ ]----
		---> Send Data Output
		RETURN
			varReturn;

	----[ ⦿ ]--[ Exception Handling ]-----------------------------------------------------[ ⦿ ]----
		EXCEPTION
			WHEN OTHERS THEN
				NULL;

END;
$_$;


ALTER FUNCTION "SchAcquisition"."Func_SQLGenerator_DataList_FileUploads"(bigint, bigint[], json) OWNER TO "SysAdmin";

--
-- TOC entry 393 (class 1255 OID 1933539)
-- Name: Func_TblLog_Device_PersonAccessFetch_INSERT(character varying, bigint, timestamp with time zone, bigint, bigint, bigint, bigint, timestamp with time zone); Type: FUNCTION; Schema: SchAcquisition; Owner: SysAdmin
--

CREATE FUNCTION "SchAcquisition"."Func_TblLog_Device_PersonAccessFetch_INSERT"(character varying, bigint, timestamp with time zone, bigint, bigint, bigint, bigint, timestamp with time zone) RETURNS SETOF "SchSystem"."HoldFuncSys_General_FeedBackQuery"
    LANGUAGE plpgsql
    AS $_$
/*----------------------------------------------------------------------------------------------------
▪ Nama                :	"SchAcquisition"."Func_TblLog_Device_PersonAccessFetch_INSERT"
▪ Versi               :	1.00.0002
▪ Tanggal
     ► Pemutakhiran   :	2024-10-04
     ► Pembuatan      :	2021-05-03
▪ Input               :	• varSysDataAnnotation (varchar - Mandatory)
						• varIDSession (bigint - Mandatory)
						• varEntryDateTimeTZ (timestamptz - Mandatory)
						• varSysPartitionRemovableRecordKeyRefID (bigint - Mandatory)
						• varBranch_RefID (bigint - Mandatory)
						• varBaseCurrency_RefID (bigint - Mandatory)
						------------------------------
						• varGoodsIdentity_RefID (bigint - Mandatory)
						• varFetchDateTimeTZ (timestamptz - Mandatory)
						------------------------------
▪ Output              :	varRecSetOutput ("SchSystem"."HoldFuncSys_General_FeedBackQuery")
▪ Keterkaitan Fungsi  :	-
▪ Deskripsi           :	• Memasukan data (INSERT) pada tabel TblLog_Device_PersonAccessFetch
▪ Copyright           :	Zheta © 2021 - 2024

----[ SQL Example(s) ]------------------------------------------------------------------------------

----------------------------------------------------------------------------------------------------*/

DECLARE
	---[ Input Variable(s) ]------------------------------------------------------------------------
		---{ Mandatory }------------------
			varSysDataAnnotation									ALIAS FOR $1;
			varIDSession											ALIAS FOR $2;
			varEntryDateTimeTZ										ALIAS FOR $3;
			varSysPartitionRemovableRecordKeyRefID					ALIAS FOR $4;
			varBranch_RefID											ALIAS FOR $5;
			varBaseCurrency_RefID									ALIAS FOR $6;
			------------------------------
			varGoodsIdentity_RefID									ALIAS FOR $7;
			varFetchDateTimeTZ										ALIAS FOR $8;

		---{ Optional }-------------------

		---{ Additional }-----------------

	---[ Output Variable(s) ]-----------------------------------------------------------------------
			varRecSetOutput											"SchSystem"."HoldFuncSys_General_FeedBackQuery"%rowtype;

	---[ Intermediate Variable(s) ]-----------------------------------------------------------------
		---{ Default }--------------------
			varSystemNoticeTag										varchar;
			varSignEligibleToProcess								boolean;

		---{ Additional }-----------------

BEGIN
	---[ Data Initializing ]------------------------------------------------------------------------
		--varSystemNoticeTag := "SchSysAsset"."Func_GetSystemNoticeTag"();
		varSignEligibleToProcess := FALSE;

		IF (varSignEligibleToProcess IS FALSE) THEN
			varSignEligibleToProcess := TRUE;
		END IF;

		IF (varSignEligibleToProcess IS TRUE) THEN
		END IF;

	---[ Data Processing ]--------------------------------------------------------------------------
		IF (varSignEligibleToProcess IS TRUE) THEN
			INSERT INTO 
				"SchAcquisition"."TblLog_Device_PersonAccessFetch"
					(
					"Sys_Data_Annotation",
					"Sys_Data_Entry_LoginSession_RefID",
					"Sys_Data_Entry_DateTimeTZ",
					"Sys_Partition_RemovableRecord_Key_RefID",
					"Sys_Branch_RefID",
					"Sys_BaseCurrency_RefID",
					------------------------------
					"GoodsIdentity_RefID",
					"FetchDateTimeTZ"
					)
				VALUES
					(
					varSysDataAnnotation,
					varIDSession,
					varEntryDateTimeTZ,
					varSysPartitionRemovableRecordKeyRefID,
					varBranch_RefID,
					varBaseCurrency_RefID,
					------------------------------
					varGoodsIdentity_RefID,
					varFetchDateTimeTZ
					);
		END IF;

	---[ Data Return ]-----------------------------------------------------------------------------
		IF (varSignEligibleToProcess IS TRUE) THEN
			varRecSetOutput."SignSuccess" := 1;
			varRecSetOutput."SignRecordType" := 'Sys_RPK';
			varRecSetOutput."SignRecordID" := CURRVAL('"SchAcquisition"."TblLog_Device_PersonAccessFetch_Sys_RPK_seq"');
			varRecSetOutput."SignMessage" := null;
		
			RETURN NEXT varRecSetOutput;
		END IF;

	---[ Exception Handling ]-----------------------------------------------------------------------
		--EXCEPTION WHEN OTHERS THEN ...

END;
$_$;


ALTER FUNCTION "SchAcquisition"."Func_TblLog_Device_PersonAccessFetch_INSERT"(character varying, bigint, timestamp with time zone, bigint, bigint, bigint, bigint, timestamp with time zone) OWNER TO "SysAdmin";

--
-- TOC entry 366 (class 1255 OID 1933540)
-- Name: Func_TblLog_Device_PersonAccessFetch_UPDATE(bigint, bigint, timestamp with time zone, bigint, bigint, bigint, bigint, timestamp with time zone); Type: FUNCTION; Schema: SchAcquisition; Owner: SysAdmin
--

CREATE FUNCTION "SchAcquisition"."Func_TblLog_Device_PersonAccessFetch_UPDATE"(bigint, bigint, timestamp with time zone, bigint, bigint, bigint, bigint, timestamp with time zone) RETURNS SETOF "SchSystem"."HoldFuncSys_General_FeedBackQuery"
    LANGUAGE plpgsql
    AS $_$
/*----------------------------------------------------------------------------------------------------
▪ Nama                :	"SchAcquisition"."Func_TblLog_Device_PersonAccessFetch_UPDATE"
▪ Versi               :	1.00.0002
▪ Tanggal
     ► Pemutakhiran   :	2024-10-04
     ► Pembuatan      :	2021-05-03
▪ Input               :	• varID (bigint - Mandatory)
						• varIDSession (bigint - Mandatory)
						• varEditDateTimeTZ (timestamptz - Mandatory)
						• varSysPartitionRemovableRecordKeyRefID (bigint - Mandatory)
						• varBranch_RefID (bigint - Mandatory)
						• varBaseCurrency_RefID (bigint - Mandatory)
						------------------------------
						• varGoodsIdentity_RefID (bigint - Mandatory)
						• varFetchDateTimeTZ (timestamptz - Mandatory)
						------------------------------
▪ Output              :	varRecSetOutput ("SchSystem"."HoldFuncSys_General_FeedBackQuery")
▪ Keterkaitan Fungsi  :	-
▪ Deskripsi           :	• Memutakhirkan data (UPDATE) pada tabel TblLog_Device_PersonAccessFetch
▪ Copyright           :	Zheta © 2021 - 2024

----[ SQL Example(s) ]------------------------------------------------------------------------------

----------------------------------------------------------------------------------------------------*/

DECLARE
	---[ Input Variable(s) ]------------------------------------------------------------------------
		---{ Mandatory }------------------
			varID													ALIAS FOR $1;
			varIDSession											ALIAS FOR $2;
			varEditDateTimeTZ										ALIAS FOR $3;
			varSysPartitionRemovableRecordKeyRefID					ALIAS FOR $4;
			varBranch_RefID											ALIAS FOR $5;
			varBaseCurrency_RefID									ALIAS FOR $6;
			------------------------------
			varGoodsIdentity_RefID									ALIAS FOR $7;
			varFetchDateTimeTZ										ALIAS FOR $8;

		---{ Optional }-------------------

		---{ Additional }-----------------

	---[ Output Variable(s) ]-----------------------------------------------------------------------
			varRecSetOutput											"SchSystem"."HoldFuncSys_General_FeedBackQuery"%rowtype;

	---[ Intermediate Variable(s) ]-----------------------------------------------------------------
		---{ Default }--------------------
			varSystemNoticeTag										varchar;
			varSignEligibleToProcess								boolean;

		---{ Additional }-----------------

BEGIN
	---[ Data Initializing ]------------------------------------------------------------------------
		--varSystemNoticeTag := "SchSysAsset"."Func_GetSystemNoticeTag"();
		varSignEligibleToProcess := FALSE;

		IF (varSignEligibleToProcess IS FALSE) THEN
			varSignEligibleToProcess := TRUE;
		END IF;

		IF (varSignEligibleToProcess IS TRUE) THEN
		END IF;

	---[ Data Processing ]--------------------------------------------------------------------------
		IF (varSignEligibleToProcess IS TRUE) THEN
			UPDATE
				"SchAcquisition"."TblLog_Device_PersonAccessFetch"
			SET
				"Sys_Data_Edit_LoginSession_RefID" = varIDSession,
				"Sys_Data_Edit_DateTimeTZ" = varEditDateTimeTZ,
				"Sys_Partition_RemovableRecord_Key_RefID" = varSysPartitionRemovableRecordKeyRefID,
				"Sys_Branch_RefID" = varBranch_RefID,
				"Sys_BaseCurrency_RefID" = varBaseCurrency_RefID,
				------------------------------
				"GoodsIdentity_RefID" = varGoodsIdentity_RefID,
				"FetchDateTimeTZ" = varFetchDateTimeTZ
			WHERE
				"Sys_PID" = varID
				OR
				"Sys_SID" = varID;
		END IF;

	---[ Data Return ]-----------------------------------------------------------------------------
		IF (varSignEligibleToProcess IS TRUE) THEN
			varRecSetOutput."SignSuccess" := 1;
			varRecSetOutput."SignRecordType" := 'Sys_RPK';
			varRecSetOutput."SignRecordID" := (SELECT "Sys_RPK" FROM "SchAcquisition"."TblLog_Device_PersonAccessFetch" WHERE "Sys_PID" = varID OR "Sys_SID" = varID LIMIT 1);
			varRecSetOutput."SignMessage" := null;
		
			RETURN NEXT varRecSetOutput;
		END IF;

	---[ Exception Handling ]-----------------------------------------------------------------------
		--EXCEPTION WHEN OTHERS THEN ...

END;
$_$;


ALTER FUNCTION "SchAcquisition"."Func_TblLog_Device_PersonAccessFetch_UPDATE"(bigint, bigint, timestamp with time zone, bigint, bigint, bigint, bigint, timestamp with time zone) OWNER TO "SysAdmin";

--
-- TOC entry 435 (class 1255 OID 1933541)
-- Name: Func_TblLog_Device_PersonAccess_INSERT(character varying, bigint, timestamp with time zone, bigint, bigint, bigint, bigint, timestamp with time zone, bigint, character varying); Type: FUNCTION; Schema: SchAcquisition; Owner: SysAdmin
--

CREATE FUNCTION "SchAcquisition"."Func_TblLog_Device_PersonAccess_INSERT"(character varying, bigint, timestamp with time zone, bigint, bigint, bigint, bigint, timestamp with time zone, bigint, character varying) RETURNS SETOF "SchSystem"."HoldFuncSys_General_FeedBackQuery"
    LANGUAGE plpgsql
    AS $_$
/*----------------------------------------------------------------------------------------------------
▪ Nama                :	"SchAcquisition"."Func_TblLog_Device_PersonAccess_INSERT"
▪ Versi               :	1.00.0002
▪ Tanggal
     ► Pemutakhiran   :	2024-10-04
     ► Pembuatan      :	2021-05-03
▪ Input               :	• varSysDataAnnotation (varchar - Mandatory)
						• varIDSession (bigint - Mandatory)
						• varEntryDateTimeTZ (timestamptz - Mandatory)
						• varSysPartitionRemovableRecordKeyRefID (bigint - Mandatory)
						• varBranch_RefID (bigint - Mandatory)
						• varBaseCurrency_RefID (bigint - Mandatory)
						------------------------------
						• varLog_Device_PersonAccessFetch_RefID (bigint - Mandatory)
						• varAttendanceDateTimeTZ (timestamptz - Mandatory)
						• varPersonID (bigint - Mandatory)
						• varPersonUserName (varchar - Mandatory)
						------------------------------
▪ Output              :	varRecSetOutput ("SchSystem"."HoldFuncSys_General_FeedBackQuery")
▪ Keterkaitan Fungsi  :	-
▪ Deskripsi           :	• Memasukan data (INSERT) pada tabel TblLog_Device_PersonAccess
▪ Copyright           :	Zheta © 2021 - 2024

----[ SQL Example(s) ]------------------------------------------------------------------------------

----------------------------------------------------------------------------------------------------*/

DECLARE
	---[ Input Variable(s) ]------------------------------------------------------------------------
		---{ Mandatory }------------------
			varSysDataAnnotation									ALIAS FOR $1;
			varIDSession											ALIAS FOR $2;
			varEntryDateTimeTZ										ALIAS FOR $3;
			varSysPartitionRemovableRecordKeyRefID					ALIAS FOR $4;
			varBranch_RefID											ALIAS FOR $5;
			varBaseCurrency_RefID									ALIAS FOR $6;
			------------------------------
			varLog_Device_PersonAccessFetch_RefID					ALIAS FOR $7;
			varAttendanceDateTimeTZ									ALIAS FOR $8;
			varPersonID												ALIAS FOR $9;
			varPersonUserName										ALIAS FOR $10;

		---{ Optional }-------------------

		---{ Additional }-----------------

	---[ Output Variable(s) ]-----------------------------------------------------------------------
			varRecSetOutput											"SchSystem"."HoldFuncSys_General_FeedBackQuery"%rowtype;

	---[ Intermediate Variable(s) ]-----------------------------------------------------------------
		---{ Default }--------------------
			varSystemNoticeTag										varchar;
			varSignEligibleToProcess								boolean;

		---{ Additional }-----------------

BEGIN
	---[ Data Initializing ]------------------------------------------------------------------------
		--varSystemNoticeTag := "SchSysAsset"."Func_GetSystemNoticeTag"();
		varSignEligibleToProcess := FALSE;

		IF (varSignEligibleToProcess IS FALSE) THEN
			varSignEligibleToProcess := TRUE;
		END IF;

		IF (varSignEligibleToProcess IS TRUE) THEN
		END IF;

	---[ Data Processing ]--------------------------------------------------------------------------
		IF (varSignEligibleToProcess IS TRUE) THEN
			INSERT INTO 
				"SchAcquisition"."TblLog_Device_PersonAccess"
					(
					"Sys_Data_Annotation",
					"Sys_Data_Entry_LoginSession_RefID",
					"Sys_Data_Entry_DateTimeTZ",
					"Sys_Partition_RemovableRecord_Key_RefID",
					"Sys_Branch_RefID",
					"Sys_BaseCurrency_RefID",
					------------------------------
					"Log_Device_PersonAccessFetch_RefID",
					"AttendanceDateTimeTZ",
					"PersonID",
					"PersonUserName"
					)
				VALUES
					(
					varSysDataAnnotation,
					varIDSession,
					varEntryDateTimeTZ,
					varSysPartitionRemovableRecordKeyRefID,
					varBranch_RefID,
					varBaseCurrency_RefID,
					------------------------------
					varLog_Device_PersonAccessFetch_RefID,
					varAttendanceDateTimeTZ,
					varPersonID,
					varPersonUserName
					);
		END IF;

	---[ Data Return ]-----------------------------------------------------------------------------
		IF (varSignEligibleToProcess IS TRUE) THEN
			varRecSetOutput."SignSuccess" := 1;
			varRecSetOutput."SignRecordType" := 'Sys_RPK';
			varRecSetOutput."SignRecordID" := CURRVAL('"SchAcquisition"."TblLog_Device_PersonAccess_Sys_RPK_seq"');
			varRecSetOutput."SignMessage" := null;
		
			RETURN NEXT varRecSetOutput;
		END IF;

	---[ Exception Handling ]-----------------------------------------------------------------------
		--EXCEPTION WHEN OTHERS THEN ...

END;
$_$;


ALTER FUNCTION "SchAcquisition"."Func_TblLog_Device_PersonAccess_INSERT"(character varying, bigint, timestamp with time zone, bigint, bigint, bigint, bigint, timestamp with time zone, bigint, character varying) OWNER TO "SysAdmin";

--
-- TOC entry 410 (class 1255 OID 1933542)
-- Name: Func_TblLog_Device_PersonAccess_UPDATE(bigint, bigint, timestamp with time zone, bigint, bigint, bigint, bigint, timestamp with time zone, bigint, character varying); Type: FUNCTION; Schema: SchAcquisition; Owner: SysAdmin
--

CREATE FUNCTION "SchAcquisition"."Func_TblLog_Device_PersonAccess_UPDATE"(bigint, bigint, timestamp with time zone, bigint, bigint, bigint, bigint, timestamp with time zone, bigint, character varying) RETURNS SETOF "SchSystem"."HoldFuncSys_General_FeedBackQuery"
    LANGUAGE plpgsql
    AS $_$
/*----------------------------------------------------------------------------------------------------
▪ Nama                :	"SchAcquisition"."Func_TblLog_Device_PersonAccess_UPDATE"
▪ Versi               :	1.00.0002
▪ Tanggal
     ► Pemutakhiran   :	2024-10-04
     ► Pembuatan      :	2021-05-03
▪ Input               :	• varID (bigint)
						• varIDSession (bigint)
						• varEditDateTimeTZ (timestamptz)
						• varSysPartitionRemovableRecordKeyRefID (bigint)
						• varBranch_RefID (bigint)
						• varBaseCurrency_RefID (bigint - Mandatory)
						------------------------------
						• varLog_Device_PersonAccessFetch_RefID (bigint)
						• varAttendanceDateTimeTZ (timestamptz)
						• varPersonID (bigint)
						• varPersonUserName (varchar)
						------------------------------
▪ Output              :	varRecSetOutput ("SchSystem"."HoldFuncSys_General_FeedBackQuery")
▪ Keterkaitan Fungsi  :	-
▪ Deskripsi           :	• Memutakhirkan data (UPDATE) pada tabel TblLog_Device_PersonAccess
▪ Copyright           :	Zheta © 2021 - 2024

----[ SQL Example(s) ]------------------------------------------------------------------------------

----------------------------------------------------------------------------------------------------*/

DECLARE
	---[ Input Variable(s) ]------------------------------------------------------------------------
		---{ Mandatory }------------------
			varID													ALIAS FOR $1;
			varIDSession											ALIAS FOR $2;
			varEditDateTimeTZ										ALIAS FOR $3;
			varSysPartitionRemovableRecordKeyRefID					ALIAS FOR $4;
			varBranch_RefID											ALIAS FOR $5;
			varBaseCurrency_RefID									ALIAS FOR $6;
			------------------------------
			varLog_Device_PersonAccessFetch_RefID					ALIAS FOR $7;
			varAttendanceDateTimeTZ									ALIAS FOR $8;
			varPersonID												ALIAS FOR $9;
			varPersonUserName										ALIAS FOR $10;

		---{ Optional }-------------------

		---{ Additional }-----------------

	---[ Output Variable(s) ]-----------------------------------------------------------------------
			varRecSetOutput											"SchSystem"."HoldFuncSys_General_FeedBackQuery"%rowtype;

	---[ Intermediate Variable(s) ]-----------------------------------------------------------------
		---{ Default }--------------------
			varSystemNoticeTag										varchar;
			varSignEligibleToProcess								boolean;

		---{ Additional }-----------------

BEGIN
	---[ Data Initializing ]------------------------------------------------------------------------
		--varSystemNoticeTag := "SchSysAsset"."Func_GetSystemNoticeTag"();
		varSignEligibleToProcess := FALSE;

		IF (varSignEligibleToProcess IS FALSE) THEN
			varSignEligibleToProcess := TRUE;
		END IF;

		IF (varSignEligibleToProcess IS TRUE) THEN
		END IF;

	---[ Data Processing ]--------------------------------------------------------------------------
		IF (varSignEligibleToProcess IS TRUE) THEN
			UPDATE
				"SchAcquisition"."TblLog_Device_PersonAccess"
			SET
				"Sys_Data_Edit_LoginSession_RefID" = varIDSession,
				"Sys_Data_Edit_DateTimeTZ" = varEditDateTimeTZ,
				"Sys_Partition_RemovableRecord_Key_RefID" = varSysPartitionRemovableRecordKeyRefID,
				"Sys_Branch_RefID" = varBranch_RefID,
				"Sys_BaseCurrency_RefID" = varBaseCurrency_RefID,
				------------------------------
				"Log_Device_PersonAccessFetch_RefID" = varLog_Device_PersonAccessFetch_RefID,
				"AttendanceDateTimeTZ" = varAttendanceDateTimeTZ,
				"PersonID" = varPersonID,
				"PersonUserName" = varPersonUserName
			WHERE
				"Sys_PID" = varID
				OR
				"Sys_SID" = varID;
		END IF;

	---[ Data Return ]-----------------------------------------------------------------------------
		IF (varSignEligibleToProcess IS TRUE) THEN
			varRecSetOutput."SignSuccess" := 1;
			varRecSetOutput."SignRecordType" := 'Sys_RPK';
			varRecSetOutput."SignRecordID" := (SELECT "Sys_RPK" FROM "SchAcquisition"."TblLog_Device_PersonAccess" WHERE "Sys_PID" = varID OR "Sys_SID" = varID LIMIT 1);
			varRecSetOutput."SignMessage" := null;
		
			RETURN NEXT varRecSetOutput;
		END IF;

	---[ Exception Handling ]-----------------------------------------------------------------------
		--EXCEPTION WHEN OTHERS THEN ...

END;
$_$;


ALTER FUNCTION "SchAcquisition"."Func_TblLog_Device_PersonAccess_UPDATE"(bigint, bigint, timestamp with time zone, bigint, bigint, bigint, bigint, timestamp with time zone, bigint, character varying) OWNER TO "SysAdmin";

--
-- TOC entry 442 (class 1255 OID 1933543)
-- Name: Func_TblLog_FileUpload_ObjectDetail_INSERT(character varying, bigint, timestamp with time zone, bigint, bigint, bigint, bigint, bigint, smallint, character varying, bigint, character varying, character varying, character varying, bigint, bigint, character varying, bigint, character varying); Type: FUNCTION; Schema: SchAcquisition; Owner: SysAdmin
--

CREATE FUNCTION "SchAcquisition"."Func_TblLog_FileUpload_ObjectDetail_INSERT"(character varying, bigint, timestamp with time zone, bigint, bigint, bigint, bigint, bigint, smallint, character varying, bigint, character varying, character varying, character varying, bigint, bigint, character varying, bigint, character varying) RETURNS SETOF "SchSystem"."HoldFuncSys_General_FeedBackQuery"
    LANGUAGE plpgsql
    AS $_$
/*----------------------------------------------------------------------------------------------------
▪ Nama                :	"SchAcquisition"."Func_TblLog_FileUpload_ObjectDetail_INSERT"
▪ Versi               :	1.00.0005
▪ Tanggal
     ► Pemutakhiran   :	2024-10-04
     ► Pembuatan      :	2021-07-26
▪ Input               :	• varSysDataAnnotation (varchar - Mandatory)
						• varIDSession (bigint - Mandatory)
						• varEntryDateTimeTZ (timestamptz - Mandatory)
						• varSysPartitionRemovableRecordKeyRefID (bigint - Mandatory)
						• varBranchRefID (bigint - Mandatory)
						• varBaseCurrency_RefID (bigint - Mandatory)
						------------------------------
						• varLog_FileUpload_Object_RefID (bigint - Mandatory)
						• varRotateLog_FileUploadStagingAreaDetail_RefRPK (bigint - Mandatory)
						• varSequence (smallint - Mandatory)
						• varName (varchar - Mandatory)
						• varSize (bigint - Mandatory)
						• varMIME (varchar - Mandatory)
						• varExtension (varchar - Mandatory)
						• varLastModifiedDateTimeTZ (varchar - Mandatory)
						• varLastModifiedUnixTimestamp (bigint - Mandatory)
						• varHashMethod_RefID (bigint - Mandatory)
						• varContentBase64Hash (varchar - Mandatory)
						• varDataCompression_RefID (bigint - Mandatory)
						• varStagingAreaFilePath (varchar - Mandatory)
▪ Output              :	varRecSetOutput ("SchSystem"."HoldFuncSys_General_FeedBackQuery")
▪ Keterkaitan Fungsi  :	-
▪ Deskripsi           :	• Memasukan data (INSERT) pada tabel TblLog_FileUpload_ObjectDetail
▪ Copyright           :	Zheta © 2021 - 2024

----[ SQL Example(s) ]------------------------------------------------------------------------------

----------------------------------------------------------------------------------------------------*/

DECLARE
	---[ Input Variable(s) ]------------------------------------------------------------------------
		---{ Mandatory }------------------
			varSysDataAnnotation									ALIAS FOR $1;
			varIDSession											ALIAS FOR $2;
			varEntryDateTimeTZ										ALIAS FOR $3;
			varSysPartitionRemovableRecordKeyRefID					ALIAS FOR $4;
			varBranchRefID											ALIAS FOR $5;
			varBaseCurrency_RefID									ALIAS FOR $6;
			------------------------------
			varLog_FileUpload_Object_RefID							ALIAS FOR $7;
			varRotateLog_FileUploadStagingAreaDetail_RefRPK		ALIAS FOR $8;
			varSequence												ALIAS FOR $9;
			varName													ALIAS FOR $10;	
			varSize													ALIAS FOR $11;
			varMIME													ALIAS FOR $12;
			varExtension											ALIAS FOR $13;
			varLastModifiedDateTimeTZ								ALIAS FOR $14;
			varLastModifiedUnixTimestamp							ALIAS FOR $15;
			varHashMethod_RefID										ALIAS FOR $16;
			varContentBase64Hash									ALIAS FOR $17;
			varDataCompression_RefID								ALIAS FOR $18;
			varStagingAreaFilePath									ALIAS FOR $19;

		---{ Optional }-------------------

		---{ Additional }-----------------

	---[ Output Variable(s) ]-----------------------------------------------------------------------
			varRecSetOutput											"SchSystem"."HoldFuncSys_General_FeedBackQuery"%rowtype;

	---[ Intermediate Variable(s) ]-----------------------------------------------------------------
		---{ Default }--------------------
			varSystemNoticeTag										varchar;
			varSignEligibleToProcess								boolean;

		---{ Additional }-----------------

BEGIN
	---[ Data Initializing ]------------------------------------------------------------------------
		--varSystemNoticeTag := "SchSysAsset"."Func_GetSystemNoticeTag"();
		varSignEligibleToProcess := FALSE;

		IF (varSignEligibleToProcess IS FALSE) THEN
			varSignEligibleToProcess := TRUE;
		END IF;

		IF (varSignEligibleToProcess IS TRUE) THEN
		END IF;

	---[ Data Processing ]--------------------------------------------------------------------------
		IF (varSignEligibleToProcess IS TRUE) THEN
			INSERT INTO 
				"SchAcquisition"."TblLog_FileUpload_ObjectDetail"
					(
					"Sys_Data_Annotation",
					"Sys_Data_Entry_LoginSession_RefID",
					"Sys_Data_Entry_DateTimeTZ",
					"Sys_Partition_RemovableRecord_Key_RefID",
					"Sys_Branch_RefID",
					"Sys_BaseCurrency_RefID",
					------------------------------
					"Log_FileUpload_Object_RefID",
					"RotateLog_FileUploadStagingAreaDetail_RefRPK",
					"Sequence",
					"Name",
					"Size",
					"MIME",
					"Extension",
					"LastModifiedDateTimeTZ",
					"LastModifiedUnixTimestamp",
					"HashMethod_RefID",
					"ContentBase64Hash",
					"DataCompression_RefID",
					"StagingAreaFilePath"
					)
				VALUES
					(
					varSysDataAnnotation,
					varIDSession,
					varEntryDateTimeTZ,
					varSysPartitionRemovableRecordKeyRefID,
					varBranchRefID,
					varBaseCurrency_RefID,
					------------------------------
					varLog_FileUpload_Object_RefID,
					varRotateLog_FileUploadStagingAreaDetail_RefRPK,
					varSequence,
					varName,
					varSize,
					varMIME,
					varExtension,
					varLastModifiedDateTimeTZ,
					varLastModifiedUnixTimestamp,
					varHashMethod_RefID,
					varContentBase64Hash,
					varDataCompression_RefID,
					varStagingAreaFilePath
					);
		END IF;

	---[ Data Return ]-----------------------------------------------------------------------------
		IF (varSignEligibleToProcess IS TRUE) THEN
			varRecSetOutput."SignSuccess" := 1;
			varRecSetOutput."SignRecordType" := 'Sys_RPK';
			varRecSetOutput."SignRecordID" := CURRVAL('"SchAcquisition"."TblLog_FileUpload_ObjectDetail_Sys_RPK_seq"');
			varRecSetOutput."SignMessage" := null;

			RETURN NEXT varRecSetOutput;
		END IF;

	---[ Exception Handling ]-----------------------------------------------------------------------
		--EXCEPTION WHEN OTHERS THEN ...

END;
$_$;


ALTER FUNCTION "SchAcquisition"."Func_TblLog_FileUpload_ObjectDetail_INSERT"(character varying, bigint, timestamp with time zone, bigint, bigint, bigint, bigint, bigint, smallint, character varying, bigint, character varying, character varying, character varying, bigint, bigint, character varying, bigint, character varying) OWNER TO "SysAdmin";

--
-- TOC entry 436 (class 1255 OID 1933544)
-- Name: Func_TblLog_FileUpload_ObjectDetail_UPDATE(bigint, bigint, timestamp with time zone, bigint, bigint, bigint, bigint, bigint, smallint, character varying, bigint, character varying, character varying, character varying, bigint, bigint, character varying, bigint, character varying); Type: FUNCTION; Schema: SchAcquisition; Owner: SysAdmin
--

CREATE FUNCTION "SchAcquisition"."Func_TblLog_FileUpload_ObjectDetail_UPDATE"(bigint, bigint, timestamp with time zone, bigint, bigint, bigint, bigint, bigint, smallint, character varying, bigint, character varying, character varying, character varying, bigint, bigint, character varying, bigint, character varying) RETURNS SETOF "SchSystem"."HoldFuncSys_General_FeedBackQuery"
    LANGUAGE plpgsql
    AS $_$
/*----------------------------------------------------------------------------------------------------
▪ Nama                :	"SchAcquisition"."Func_TblLog_FileUpload_ObjectDetail_UPDATE"
▪ Versi               :	1.00.0005
▪ Tanggal
     ► Pemutakhiran   :	2024-10-04
     ► Pembuatan      :	2021-07-26
▪ Input               :	• varID (bigint - Mandatory)
						• varIDSession (bigint - Mandatory)
						• varEditDateTimeTZ (timestamptz - Mandatory)
						• varSysPartitionRemovableRecordKeyRefID (bigint - Mandatory)
						• varBranchRefID (bigint - Mandatory)
						• varBaseCurrency_RefID (bigint - Mandatory)
						------------------------------
						• varLog_FileUpload_Object_RefID (bigint - Mandatory)
						• varRotateLog_FileUploadStagingAreaDetail_RefRPK (bigint - Mandatory)
						• varSequence (smallint - Mandatory)
						• varName (varchar - Mandatory)
						• varSize (bigint - Mandatory)
						• varMIME (varchar - Mandatory)
						• varExtension (varchar - Mandatory)
						• varLastModifiedDateTimeTZ (varchar - Mandatory)
						• varLastModifiedUnixTimestamp (bigint - Mandatory)
						• varHashMethod_RefID (bigint - Mandatory)
						• varContentBase64Hash (varchar - Mandatory)
						• varDataCompression_RefID (bigint - Mandatory)
						• varStagingAreaFilePath (varchar - Mandatory)
▪ Output              :	varRecSetOutput ("SchSystem"."HoldFuncSys_General_FeedBackQuery")
▪ Keterkaitan Fungsi  :	-
▪ Deskripsi           :	• Memutakhirkan data (UPDATE) pada tabel TblLog_FileUpload_ObjectDetail
▪ Copyright           :	Zheta © 2021 - 2024

----[ SQL Example(s) ]------------------------------------------------------------------------------

----------------------------------------------------------------------------------------------------*/

DECLARE
	---[ Input Variable(s) ]------------------------------------------------------------------------
		---{ Mandatory }------------------
			varID													ALIAS FOR $1;
			varIDSession											ALIAS FOR $2;
			varEditDateTimeTZ										ALIAS FOR $3;
			varSysPartitionRemovableRecordKeyRefID					ALIAS FOR $4;
			varBranchRefID											ALIAS FOR $5;
			varBaseCurrency_RefID									ALIAS FOR $6;
			------------------------------
			varLog_FileUpload_Object_RefID							ALIAS FOR $7;
			varRotateLog_FileUploadStagingAreaDetail_RefRPK		ALIAS FOR $8;
			varSequence												ALIAS FOR $9;
			varName													ALIAS FOR $10;	
			varSize													ALIAS FOR $11;
			varMIME													ALIAS FOR $12;
			varExtension											ALIAS FOR $13;
			varLastModifiedDateTimeTZ								ALIAS FOR $14;
			varLastModifiedUnixTimestamp							ALIAS FOR $15;
			varHashMethod_RefID										ALIAS FOR $16;
			varContentBase64Hash									ALIAS FOR $17;
			varDataCompression_RefID								ALIAS FOR $18;
			varStagingAreaFilePath									ALIAS FOR $19;

		---{ Optional }-------------------

		---{ Additional }-----------------

	---[ Output Variable(s) ]-----------------------------------------------------------------------
			varRecSetOutput											"SchSystem"."HoldFuncSys_General_FeedBackQuery"%rowtype;

	---[ Intermediate Variable(s) ]-----------------------------------------------------------------
		---{ Default }--------------------
			varSystemNoticeTag										varchar;
			varSignEligibleToProcess								boolean;

		---{ Additional }-----------------

BEGIN
	---[ Data Initializing ]------------------------------------------------------------------------
		--varSystemNoticeTag := "SchSysAsset"."Func_GetSystemNoticeTag"();
		varSignEligibleToProcess := FALSE;

		IF (varSignEligibleToProcess IS FALSE) THEN
			varSignEligibleToProcess := TRUE;
		END IF;

		IF (varSignEligibleToProcess IS TRUE) THEN
		END IF;

	---[ Data Processing ]--------------------------------------------------------------------------
		IF (varSignEligibleToProcess IS TRUE) THEN
			UPDATE
				"SchAcquisition"."TblLog_FileUpload_ObjectDetail"
			SET
				"Sys_Data_Edit_LoginSession_RefID" = varIDSession,
				"Sys_Data_Edit_DateTimeTZ" = varEditDateTimeTZ,
				"Sys_Partition_RemovableRecord_Key_RefID" = varSysPartitionRemovableRecordKeyRefID,
				"Sys_Branch_RefID" = varBranchRefID,
				"Sys_BaseCurrency_RefID" = varBaseCurrency_RefID,
				------------------------------
				"Log_FileUpload_Object_RefID" = varLog_FileUpload_Object_RefID,
				"RotateLog_FileUploadStagingAreaDetail_RefRPK" = varRotateLog_FileUploadStagingAreaDetail_RefRPK,
				"Sequence" = varSequence,
				"Name" = varName,
				"Size" = varSize,
				"MIME" = varMIME,
				"Extension" = varExtension,
				"LastModifiedDateTimeTZ" = varLastModifiedDateTimeTZ,
				"LastModifiedUnixTimestamp" = varLastModifiedUnixTimestamp,
				"HashMethod_RefID" = varHashMethod_RefID,
				"ContentBase64Hash" = varContentBase64Hash,
				"DataCompression_RefID" = varDataCompression_RefID,
				"StagingAreaFilePath" = varStagingAreaFilePath
			WHERE
				"Sys_PID" = varID
				OR
				"Sys_SID" = varID;
		END IF;

	---[ Data Return ]-----------------------------------------------------------------------------
		IF (varSignEligibleToProcess IS TRUE) THEN
			varRecSetOutput."SignSuccess" := 1;
			varRecSetOutput."SignRecordType" := 'Sys_RPK';
			varRecSetOutput."SignRecordID" := (SELECT "Sys_RPK" FROM "SchAcquisition"."TblLog_FileUpload_ObjectDetail" WHERE "Sys_PID" = varID OR "Sys_SID" = varID LIMIT 1);
			varRecSetOutput."SignMessage" := null;

			RETURN NEXT varRecSetOutput;
		END IF;

	---[ Exception Handling ]-----------------------------------------------------------------------
		--EXCEPTION WHEN OTHERS THEN ...

END;
$_$;


ALTER FUNCTION "SchAcquisition"."Func_TblLog_FileUpload_ObjectDetail_UPDATE"(bigint, bigint, timestamp with time zone, bigint, bigint, bigint, bigint, bigint, smallint, character varying, bigint, character varying, character varying, character varying, bigint, bigint, character varying, bigint, character varying) OWNER TO "SysAdmin";

--
-- TOC entry 370 (class 1255 OID 1933545)
-- Name: Func_TblLog_FileUpload_Object_INSERT(character varying, bigint, timestamp with time zone, bigint, bigint, bigint, bigint); Type: FUNCTION; Schema: SchAcquisition; Owner: SysAdmin
--

CREATE FUNCTION "SchAcquisition"."Func_TblLog_FileUpload_Object_INSERT"(character varying, bigint, timestamp with time zone, bigint, bigint, bigint, bigint) RETURNS SETOF "SchSystem"."HoldFuncSys_General_FeedBackQuery"
    LANGUAGE plpgsql
    AS $_$
/*----------------------------------------------------------------------------------------------------
▪ Nama                :	"SchAcquisition"."Func_TblLog_FileUpload_Object_INSERT"
▪ Versi               :	1.00.0002
▪ Tanggal
     ► Pemutakhiran   :	2024-10-04
     ► Pembuatan      :	2021-07-26
▪ Input               :	• varSysDataAnnotation (varchar - Mandatory)
						• varIDSession (bigint - Mandatory)
						• varEntryDateTimeTZ (timestamptz - Mandatory)
						• varSysPartitionRemovableRecordKeyRefID (bigint - Mandatory)
						• varBranchRefID (bigint - Mandatory)
						• varBaseCurrency_RefID (bigint - Mandatory)
						------------------------------
						• varRotateLog_FileUploadStagingArea_RefRPK (bigint - Mandatory)
						------------------------------
▪ Output              :	varRecSetOutput ("SchSystem"."HoldFuncSys_General_FeedBackQuery")
▪ Keterkaitan Fungsi  :	-
▪ Deskripsi           :	• Memasukan data (INSERT) pada tabel TblLog_FileUpload_Object
▪ Copyright           :	Zheta © 2021 - 2024

----[ SQL Example(s) ]------------------------------------------------------------------------------

----------------------------------------------------------------------------------------------------*/

DECLARE
	---[ Input Variable(s) ]------------------------------------------------------------------------
		---{ Mandatory }------------------
			varSysDataAnnotation									ALIAS FOR $1;
			varIDSession											ALIAS FOR $2;
			varEntryDateTimeTZ										ALIAS FOR $3;
			varSysPartitionRemovableRecordKeyRefID					ALIAS FOR $4;
			varBranchRefID											ALIAS FOR $5;
			varBaseCurrency_RefID									ALIAS FOR $6;
			------------------------------
			varRotateLog_FileUploadStagingArea_RefRPK				ALIAS FOR $7;

		---{ Optional }-------------------

		---{ Additional }-----------------

	---[ Output Variable(s) ]-----------------------------------------------------------------------
			varRecSetOutput											"SchSystem"."HoldFuncSys_General_FeedBackQuery"%rowtype;

	---[ Intermediate Variable(s) ]-----------------------------------------------------------------
		---{ Default }--------------------
			varSystemNoticeTag										varchar;
			varSignEligibleToProcess								boolean;

		---{ Additional }-----------------

BEGIN
	---[ Data Initializing ]------------------------------------------------------------------------
		--varSystemNoticeTag := "SchSysAsset"."Func_GetSystemNoticeTag"();
		varSignEligibleToProcess := FALSE;

		IF (varSignEligibleToProcess IS FALSE) THEN
			varSignEligibleToProcess := TRUE;
		END IF;

		IF (varSignEligibleToProcess IS TRUE) THEN
		END IF;

	---[ Data Processing ]--------------------------------------------------------------------------
		IF (varSignEligibleToProcess IS TRUE) THEN
			INSERT INTO 
				"SchAcquisition"."TblLog_FileUpload_Object"
					(
					"Sys_Data_Annotation",
					"Sys_Data_Entry_LoginSession_RefID",
					"Sys_Data_Entry_DateTimeTZ",
					"Sys_Partition_RemovableRecord_Key_RefID",
					"Sys_Branch_RefID",
					"Sys_BaseCurrency_RefID",
					------------------------------
					"RotateLog_FileUploadStagingArea_RefRPK"
					)
				VALUES
					(
					varSysDataAnnotation,
					varIDSession,
					varEntryDateTimeTZ,
					varSysPartitionRemovableRecordKeyRefID,
					varBranchRefID,
					varBaseCurrency_RefID,
					------------------------------
					varRotateLog_FileUploadStagingArea_RefRPK
					);
		END IF;

	---[ Data Return ]-----------------------------------------------------------------------------
		IF (varSignEligibleToProcess IS TRUE) THEN
			varRecSetOutput."SignSuccess" := 1;
			varRecSetOutput."SignRecordType" := 'Sys_RPK';
			varRecSetOutput."SignRecordID" := CURRVAL('"SchAcquisition"."TblLog_FileUpload_Object_Sys_RPK_seq"');
			varRecSetOutput."SignMessage" := null;

			RETURN NEXT varRecSetOutput;
		END IF;

	---[ Exception Handling ]-----------------------------------------------------------------------
		--EXCEPTION WHEN OTHERS THEN ...

END;
$_$;


ALTER FUNCTION "SchAcquisition"."Func_TblLog_FileUpload_Object_INSERT"(character varying, bigint, timestamp with time zone, bigint, bigint, bigint, bigint) OWNER TO "SysAdmin";

--
-- TOC entry 395 (class 1255 OID 1933546)
-- Name: Func_TblLog_FileUpload_Object_UPDATE(bigint, bigint, timestamp with time zone, bigint, bigint, bigint, bigint); Type: FUNCTION; Schema: SchAcquisition; Owner: SysAdmin
--

CREATE FUNCTION "SchAcquisition"."Func_TblLog_FileUpload_Object_UPDATE"(bigint, bigint, timestamp with time zone, bigint, bigint, bigint, bigint) RETURNS SETOF "SchSystem"."HoldFuncSys_General_FeedBackQuery"
    LANGUAGE plpgsql
    AS $_$
/*----------------------------------------------------------------------------------------------------
▪ Nama                :	"SchAcquisition"."Func_TblLog_FileUpload_Object_UPDATE"
▪ Versi               :	1.00.0002
▪ Tanggal
     ► Pemutakhiran   :	2024-10-04
     ► Pembuatan      :	2021-07-26
▪ Input               :	• varID (bigint - Mandatory)
						• varIDSession (bigint - Mandatory)
						• varEditDateTimeTZ (timestamptz - Mandatory)
						• varSysPartitionRemovableRecordKeyRefID (bigint - Mandatory)
						• varBranchRefID (bigint - Mandatory)
						• varBaseCurrency_RefID (bigint - Mandatory)
						------------------------------
						• varRotateLog_FileUploadStagingArea_RefRPK (bigint - Mandatory)
						------------------------------
▪ Output              :	varRecSetOutput ("SchSystem"."HoldFuncSys_General_FeedBackQuery")
▪ Keterkaitan Fungsi  :	-
▪ Deskripsi           :	• Memutakhirkan data (UPDATE) pada tabel TblLog_FileUpload_Object
▪ Copyright           :	Zheta © 2021 - 2024

----[ SQL Example(s) ]------------------------------------------------------------------------------

----------------------------------------------------------------------------------------------------*/

DECLARE
	---[ Input Variable(s) ]------------------------------------------------------------------------
		---{ Mandatory }------------------
			varID													ALIAS FOR $1;
			varIDSession											ALIAS FOR $2;
			varEditDateTimeTZ										ALIAS FOR $3;
			varSysPartitionRemovableRecordKeyRefID					ALIAS FOR $4;
			varBranchRefID											ALIAS FOR $5;
			varBaseCurrency_RefID									ALIAS FOR $6;
			------------------------------
			varRotateLog_FileUploadStagingArea_RefRPK				ALIAS FOR $7;

		---{ Optional }-------------------

		---{ Additional }-----------------

	---[ Output Variable(s) ]-----------------------------------------------------------------------
			varRecSetOutput											"SchSystem"."HoldFuncSys_General_FeedBackQuery"%rowtype;

	---[ Intermediate Variable(s) ]-----------------------------------------------------------------
		---{ Default }--------------------
			varSystemNoticeTag										varchar;
			varSignEligibleToProcess								boolean;

		---{ Additional }-----------------

BEGIN
	---[ Data Initializing ]------------------------------------------------------------------------
		--varSystemNoticeTag := "SchSysAsset"."Func_GetSystemNoticeTag"();
		varSignEligibleToProcess := FALSE;

		IF (varSignEligibleToProcess IS FALSE) THEN
			varSignEligibleToProcess := TRUE;
		END IF;

		IF (varSignEligibleToProcess IS TRUE) THEN
		END IF;

	---[ Data Processing ]--------------------------------------------------------------------------
		IF (varSignEligibleToProcess IS TRUE) THEN
			UPDATE
				"SchAcquisition"."TblLog_FileUpload_Object"
			SET
				"Sys_Data_Edit_LoginSession_RefID" = varIDSession,
				"Sys_Data_Edit_DateTimeTZ" = varEditDateTimeTZ,
				"Sys_Partition_RemovableRecord_Key_RefID" = varSysPartitionRemovableRecordKeyRefID,
				"Sys_Branch_RefID" = varBranchRefID,
				"Sys_BaseCurrency_RefID" = varBaseCurrency_RefID,
				------------------------------
				"RotateLog_FileUploadStagingArea_RefRPK" = varRotateLog_FileUploadStagingArea_RefRPK
			WHERE
				"Sys_PID" = varID
				OR
				"Sys_SID" = varID;
		END IF;

	---[ Data Return ]-----------------------------------------------------------------------------
		IF (varSignEligibleToProcess IS TRUE) THEN
			varRecSetOutput."SignSuccess" := 1;
			varRecSetOutput."SignRecordType" := 'Sys_RPK';
			varRecSetOutput."SignRecordID" := (SELECT "Sys_RPK" FROM "SchAcquisition"."TblLog_FileUpload_Object" WHERE "Sys_PID" = varID OR "Sys_SID" = varID LIMIT 1);
			varRecSetOutput."SignMessage" := null;

			RETURN NEXT varRecSetOutput;
		END IF;

	---[ Exception Handling ]-----------------------------------------------------------------------
		--EXCEPTION WHEN OTHERS THEN ...

END;
$_$;


ALTER FUNCTION "SchAcquisition"."Func_TblLog_FileUpload_Object_UPDATE"(bigint, bigint, timestamp with time zone, bigint, bigint, bigint, bigint) OWNER TO "SysAdmin";

--
-- TOC entry 433 (class 1255 OID 1933547)
-- Name: Func_TblLog_FileUpload_PointerHistoryDetail_INSERT(character varying, bigint, timestamp with time zone, bigint, bigint, bigint, bigint, bigint); Type: FUNCTION; Schema: SchAcquisition; Owner: SysAdmin
--

CREATE FUNCTION "SchAcquisition"."Func_TblLog_FileUpload_PointerHistoryDetail_INSERT"(character varying, bigint, timestamp with time zone, bigint, bigint, bigint, bigint, bigint) RETURNS SETOF "SchSystem"."HoldFuncSys_General_FeedBackQuery"
    LANGUAGE plpgsql
    AS $_$
/*----------------------------------------------------------------------------------------------------
▪ Nama                :	"SchAcquisition"."Func_TblLog_FileUpload_PointerHistoryDetail_INSERT"
▪ Versi               :	1.00.0002
▪ Tanggal
     ► Pemutakhiran   :	2024-10-04
     ► Pembuatan      :	2021-07-29
▪ Input               :	• varSysDataAnnotation (varchar - Mandatory)
						• varIDSession (bigint - Mandatory)
						• varEntryDateTimeTZ (timestamptz - Mandatory)
						• varSysPartitionRemovableRecordKeyRefID (bigint - Mandatory)
						• varBranchRefID (bigint - Mandatory)
						• varBaseCurrency_RefID (bigint - Mandatory)
						------------------------------
						• varLog_FileUpload_PointerHistory_RefID (bigint - Mandatory)
						• varLog_FileUpload_Object_RefID (bigint - Mandatory)
						------------------------------
▪ Output              :	varRecSetOutput ("SchSystem"."HoldFuncSys_General_FeedBackQuery")
▪ Keterkaitan Fungsi  :	-
▪ Deskripsi           :	• Memasukan data (INSERT) pada tabel TblLog_FileUpload_PointerHistoryDetail
▪ Copyright           :	Zheta © 2021 - 2022

----[ SQL Example(s) ]------------------------------------------------------------------------------

----------------------------------------------------------------------------------------------------*/

DECLARE
	---[ Input Variable(s) ]------------------------------------------------------------------------
		varSysDataAnnotation									ALIAS FOR $1;
		varIDSession											ALIAS FOR $2;
		varEntryDateTimeTZ										ALIAS FOR $3;
		varSysPartitionRemovableRecordKeyRefID					ALIAS FOR $4;
		varBranchRefID											ALIAS FOR $5;
		varBaseCurrency_RefID									ALIAS FOR $6;
		------------------------------
		varLog_FileUpload_PointerHistory_RefID					ALIAS FOR $7;
		varLog_FileUpload_Object_RefID							ALIAS FOR $8;

	---[ Output Variable(s) ]-----------------------------------------------------------------------
		varRecSetOutput											"SchSystem"."HoldFuncSys_General_FeedBackQuery"%rowtype;

	---[ Intermediate Variable(s) ]-----------------------------------------------------------------
		varSystemNoticeTag										varchar;
		varSignEligibleToProcess								boolean;

BEGIN
	---[ Data Initializing ]------------------------------------------------------------------------
		--varSystemNoticeTag := "SchSysAsset"."Func_GetSystemNoticeTag"();
		varSignEligibleToProcess := FALSE;

		IF (varSignEligibleToProcess IS FALSE) THEN
			varSignEligibleToProcess := TRUE;
		END IF;

		IF (varSignEligibleToProcess IS TRUE) THEN
		END IF;

	---[ Data Processing ]--------------------------------------------------------------------------
		IF (varSignEligibleToProcess IS TRUE) THEN
			INSERT INTO 
				"SchAcquisition"."TblLog_FileUpload_PointerHistoryDetail"
					(
					"Sys_Data_Annotation",
					"Sys_Data_Entry_LoginSession_RefID",
					"Sys_Data_Entry_DateTimeTZ",
					"Sys_Partition_RemovableRecord_Key_RefID",
					"Sys_Branch_RefID",
					"Sys_BaseCurrency_RefID",
					------------------------------
					"Log_FileUpload_PointerHistory_RefID",
					"Log_FileUpload_Object_RefID"
					)
				VALUES
					(
					varSysDataAnnotation,
					varIDSession,
					varEntryDateTimeTZ,
					varSysPartitionRemovableRecordKeyRefID,
					varBranchRefID,
					varBaseCurrency_RefID,
					------------------------------
					varLog_FileUpload_PointerHistory_RefID,
					varLog_FileUpload_Object_RefID
					);
		END IF;

	---[ Data Return ]-----------------------------------------------------------------------------
		IF (varSignEligibleToProcess IS TRUE) THEN
			varRecSetOutput."SignSuccess" := 1;
			varRecSetOutput."SignRecordType" := 'Sys_RPK';
			varRecSetOutput."SignRecordID" := CURRVAL('"SchAcquisition"."TblLog_FileUpload_PointerHistoryDetail_Sys_RPK_seq"');
			varRecSetOutput."SignMessage" := null;

			RETURN NEXT varRecSetOutput;
		END IF;

	---[ Exception Handling ]-----------------------------------------------------------------------
		--EXCEPTION WHEN OTHERS THEN ...

END;
$_$;


ALTER FUNCTION "SchAcquisition"."Func_TblLog_FileUpload_PointerHistoryDetail_INSERT"(character varying, bigint, timestamp with time zone, bigint, bigint, bigint, bigint, bigint) OWNER TO "SysAdmin";

--
-- TOC entry 431 (class 1255 OID 1933548)
-- Name: Func_TblLog_FileUpload_PointerHistoryDetail_UPDATE(bigint, bigint, timestamp with time zone, bigint, bigint, bigint, bigint, bigint); Type: FUNCTION; Schema: SchAcquisition; Owner: SysAdmin
--

CREATE FUNCTION "SchAcquisition"."Func_TblLog_FileUpload_PointerHistoryDetail_UPDATE"(bigint, bigint, timestamp with time zone, bigint, bigint, bigint, bigint, bigint) RETURNS SETOF "SchSystem"."HoldFuncSys_General_FeedBackQuery"
    LANGUAGE plpgsql
    AS $_$
/*----------------------------------------------------------------------------------------------------
▪ Nama                :	"SchAcquisition"."Func_TblLog_FileUpload_PointerHistoryDetail_UPDATE"
▪ Versi               :	1.00.0002
▪ Tanggal
     ► Pemutakhiran   :	2024-10-04
     ► Pembuatan      :	2021-07-29
▪ Input               :	• varID (bigint - Mandatory)
						• varIDSession (bigint - Mandatory)
						• varEditDateTimeTZ (timestamptz - Mandatory)
						• varSysPartitionRemovableRecordKeyRefID (bigint - Mandatory)
						• varBranchRefID (bigint - Mandatory)
						• varBaseCurrency_RefID (bigint - Mandatory)
						------------------------------
						• varLog_FileUpload_PointerHistory_RefID (bigint - Mandatory)
						• varLog_FileUpload_Object_RefID (bigint - Mandatory)
						------------------------------
▪ Output              :	varRecSetOutput ("SchSystem"."HoldFuncSys_General_FeedBackQuery")
▪ Keterkaitan Fungsi  :	-
▪ Deskripsi           :	• Memutakhirkan data (UPDATE) pada tabel
						  TblLog_FileUpload_PointerHistoryDetail
▪ Copyright           :	Zheta © 2021 - 2022

----[ SQL Example(s) ]------------------------------------------------------------------------------

----------------------------------------------------------------------------------------------------*/

DECLARE
	---[ Input Variable(s) ]------------------------------------------------------------------------
		varID													ALIAS FOR $1;
		varIDSession											ALIAS FOR $2;
		varEditDateTimeTZ										ALIAS FOR $3;
		varSysPartitionRemovableRecordKeyRefID					ALIAS FOR $4;
		varBranchRefID											ALIAS FOR $5;
		varBaseCurrency_RefID									ALIAS FOR $6;
		------------------------------
		varLog_FileUpload_PointerHistory_RefID					ALIAS FOR $7;
		varLog_FileUpload_Object_RefID							ALIAS FOR $8;

	---[ Output Variable(s) ]-----------------------------------------------------------------------
		varRecSetOutput											"SchSystem"."HoldFuncSys_General_FeedBackQuery"%rowtype;

	---[ Intermediate Variable(s) ]-----------------------------------------------------------------
		varSystemNoticeTag										varchar;
		varSignEligibleToProcess								boolean;

BEGIN
	---[ Data Initializing ]------------------------------------------------------------------------
		--varSystemNoticeTag := "SchSysAsset"."Func_GetSystemNoticeTag"();
		varSignEligibleToProcess := FALSE;

		IF (varSignEligibleToProcess IS FALSE) THEN
			varSignEligibleToProcess := TRUE;
		END IF;

		IF (varSignEligibleToProcess IS TRUE) THEN
		END IF;

	---[ Data Processing ]--------------------------------------------------------------------------
		IF (varSignEligibleToProcess IS TRUE) THEN
			UPDATE
				"SchAcquisition"."TblLog_FileUpload_PointerHistoryDetail"
			SET
				"Sys_Data_Edit_LoginSession_RefID" = varIDSession,
				"Sys_Data_Edit_DateTimeTZ" = varEditDateTimeTZ,
				"Sys_Partition_RemovableRecord_Key_RefID" = varSysPartitionRemovableRecordKeyRefID,
				"Sys_Branch_RefID" = varBranchRefID,
				"Sys_BaseCurrency_RefID" = varBaseCurrency_RefID,
				------------------------------
				"Log_FileUpload_PointerHistory_RefID" = varLog_FileUpload_PointerHistory_RefID,
				"Log_FileUpload_Object_RefID" = varLog_FileUpload_Object_RefID
			WHERE
				"Sys_PID" = varID
				OR
				"Sys_SID" = varID;
		END IF;

	---[ Data Return ]-----------------------------------------------------------------------------
		IF (varSignEligibleToProcess IS TRUE) THEN
			varRecSetOutput."SignSuccess" := 1;
			varRecSetOutput."SignRecordType" := 'Sys_RPK';
			varRecSetOutput."SignRecordID" := (SELECT "Sys_RPK" FROM "SchAcquisition"."TblLog_FileUpload_PointerHistoryDetail" WHERE "Sys_PID" = varID OR "Sys_SID" = varID LIMIT 1);
			varRecSetOutput."SignMessage" := null;
		END IF;

	---[ Exception Handling ]-----------------------------------------------------------------------
		--EXCEPTION WHEN OTHERS THEN ...

END;
$_$;


ALTER FUNCTION "SchAcquisition"."Func_TblLog_FileUpload_PointerHistoryDetail_UPDATE"(bigint, bigint, timestamp with time zone, bigint, bigint, bigint, bigint, bigint) OWNER TO "SysAdmin";

--
-- TOC entry 388 (class 1255 OID 1933549)
-- Name: Func_TblLog_FileUpload_PointerHistory_INSERT(character varying, bigint, timestamp with time zone, bigint, bigint, bigint, bigint); Type: FUNCTION; Schema: SchAcquisition; Owner: SysAdmin
--

CREATE FUNCTION "SchAcquisition"."Func_TblLog_FileUpload_PointerHistory_INSERT"(character varying, bigint, timestamp with time zone, bigint, bigint, bigint, bigint) RETURNS SETOF "SchSystem"."HoldFuncSys_General_FeedBackQuery"
    LANGUAGE plpgsql
    AS $_$
/*----------------------------------------------------------------------------------------------------
▪ Nama                :	"SchAcquisition"."Func_TblLog_FileUpload_PointerHistory_INSERT"
▪ Versi               :	1.00.0001
▪ Tanggal
     ► Pemutakhiran   :	2024-10-04
     ► Pembuatan      :	2022-08-08
▪ Input               :	• varSysDataAnnotation (varchar - Mandatory)
						• varIDSession (bigint - Mandatory)
						• varEntryDateTimeTZ (timestamptz - Mandatory)
						• varSysPartitionRemovableRecordKeyRefID (bigint - Mandatory)
						• varBranchRefID (bigint - Mandatory)
						• varBaseCurrency_RefID (bigint - Mandatory)
						------------------------------
						• varLog_FileUpload_Pointer_RefID (bigint - Mandatory)
▪ Output              :	varRecSetOutput ("SchSystem"."HoldFuncSys_General_FeedBackQuery")
▪ Keterkaitan Fungsi  :	-
▪ Deskripsi           :	• Memasukan data (INSERT) pada tabel TblLog_FileUpload_PointerHistory
▪ Copyright           :	Zheta © 2021 - 2024

----[ SQL Example(s) ]------------------------------------------------------------------------------

----------------------------------------------------------------------------------------------------*/

DECLARE
	---[ Input Variable(s) ]------------------------------------------------------------------------
		---{ Mandatory }------------------
			varSysDataAnnotation									ALIAS FOR $1;
			varIDSession											ALIAS FOR $2;
			varEntryDateTimeTZ										ALIAS FOR $3;
			varSysPartitionRemovableRecordKeyRefID					ALIAS FOR $4;
			varBranchRefID											ALIAS FOR $5;
			varBaseCurrency_RefID									ALIAS FOR $6;
			------------------------------
			varLog_FileUpload_Pointer_RefID						ALIAS FOR $7;

		---{ Optional }-------------------

		---{ Additional }-----------------

	---[ Output Variable(s) ]-----------------------------------------------------------------------
			varRecSetOutput											"SchSystem"."HoldFuncSys_General_FeedBackQuery"%rowtype;

	---[ Intermediate Variable(s) ]-----------------------------------------------------------------
		---{ Default }--------------------
			varSystemNoticeTag										varchar;
			varSignEligibleToProcess								boolean;

		---{ Additional }-----------------


BEGIN
	---[ Data Initializing ]------------------------------------------------------------------------
		--varSystemNoticeTag := "SchSysAsset"."Func_GetSystemNoticeTag"();
		varSignEligibleToProcess := FALSE;

		IF (varSignEligibleToProcess IS FALSE) THEN
			varSignEligibleToProcess := TRUE;
		END IF;

		IF (varSignEligibleToProcess IS TRUE) THEN
		END IF;

	---[ Data Processing ]--------------------------------------------------------------------------
		IF (varSignEligibleToProcess IS TRUE) THEN
			INSERT INTO 
				"SchAcquisition"."TblLog_FileUpload_PointerHistory"
					(
					"Sys_Data_Annotation",
					"Sys_Data_Entry_LoginSession_RefID",
					"Sys_Data_Entry_DateTimeTZ",
					"Sys_Partition_RemovableRecord_Key_RefID",
					"Sys_Branch_RefID",
					"Sys_BaseCurrency_RefID",
					------------------------------
					"Log_FileUpload_Pointer_RefID"
					)
				VALUES
					(
					varSysDataAnnotation,
					varIDSession,
					varEntryDateTimeTZ,
					varSysPartitionRemovableRecordKeyRefID,
					varBranchRefID,
					varBaseCurrency_RefID,
					------------------------------
					varLog_FileUpload_Pointer_RefID
					);
		END IF;

	---[ Data Return ]-----------------------------------------------------------------------------
		IF (varSignEligibleToProcess IS TRUE) THEN
			varRecSetOutput."SignSuccess" := 1;
			varRecSetOutput."SignRecordType" := 'Sys_RPK';
			varRecSetOutput."SignRecordID" := CURRVAL('"SchAcquisition"."TblLog_FileUpload_PointerHistory_Sys_RPK_seq"');
			varRecSetOutput."SignMessage" := null;

			RETURN NEXT varRecSetOutput;
		END IF;

	---[ Exception Handling ]-----------------------------------------------------------------------
		--EXCEPTION WHEN OTHERS THEN ...

END;
$_$;


ALTER FUNCTION "SchAcquisition"."Func_TblLog_FileUpload_PointerHistory_INSERT"(character varying, bigint, timestamp with time zone, bigint, bigint, bigint, bigint) OWNER TO "SysAdmin";

--
-- TOC entry 372 (class 1255 OID 1933550)
-- Name: Func_TblLog_FileUpload_PointerHistory_UPDATE(bigint, bigint, timestamp with time zone, bigint, bigint, bigint, bigint); Type: FUNCTION; Schema: SchAcquisition; Owner: SysAdmin
--

CREATE FUNCTION "SchAcquisition"."Func_TblLog_FileUpload_PointerHistory_UPDATE"(bigint, bigint, timestamp with time zone, bigint, bigint, bigint, bigint) RETURNS SETOF "SchSystem"."HoldFuncSys_General_FeedBackQuery"
    LANGUAGE plpgsql
    AS $_$
/*----------------------------------------------------------------------------------------------------
▪ Nama                :	"SchAcquisition"."Func_TblLog_FileUpload_PointerHistory_UPDATE"
▪ Versi               :	1.00.0001
▪ Tanggal
     ► Pemutakhiran   :	2024-10-04
     ► Pembuatan      :	2022-08-08
▪ Input               :	• varID (bigint - Mandatory)
						• varIDSession (bigint - Mandatory)
						• varEditDateTimeTZ (timestamptz - Mandatory)
						• varSysPartitionRemovableRecordKeyRefID (bigint - Mandatory)
						• varBranchRefID (bigint - Mandatory)
						• varBaseCurrency_RefID (bigint - Mandatory)
						------------------------------
						• varLog_FileUpload_Pointer_RefID (bigint - Mandatory)
▪ Output              :	varRecSetOutput ("SchSystem"."HoldFuncSys_General_FeedBackQuery")
▪ Keterkaitan Fungsi  :	-
▪ Deskripsi           :	• Memutakhirkan data (UPDATE) pada tabel TblLog_FileUpload_PointerHistory
▪ Copyright           :	Zheta © 2021 - 2024

----[ SQL Example(s) ]------------------------------------------------------------------------------

----------------------------------------------------------------------------------------------------*/

DECLARE
	---[ Input Variable(s) ]------------------------------------------------------------------------
		---{ Mandatory }------------------
			varID													ALIAS FOR $1;
			varIDSession											ALIAS FOR $2;
			varEditDateTimeTZ										ALIAS FOR $3;
			varSysPartitionRemovableRecordKeyRefID					ALIAS FOR $4;
			varBranchRefID											ALIAS FOR $5;
			varBaseCurrency_RefID									ALIAS FOR $6;
			------------------------------
			varLog_FileUpload_Pointer_RefID						ALIAS FOR $7;

		---{ Optional }-------------------

		---{ Additional }-----------------

	---[ Output Variable(s) ]-----------------------------------------------------------------------
			varRecSetOutput											"SchSystem"."HoldFuncSys_General_FeedBackQuery"%rowtype;

	---[ Intermediate Variable(s) ]-----------------------------------------------------------------
		---{ Default }--------------------
			varSystemNoticeTag										varchar;
			varSignEligibleToProcess								boolean;

		---{ Additional }-----------------


BEGIN
	---[ Data Initializing ]------------------------------------------------------------------------
		--varSystemNoticeTag := "SchSysAsset"."Func_GetSystemNoticeTag"();
		varSignEligibleToProcess := FALSE;

		IF (varSignEligibleToProcess IS FALSE) THEN
			varSignEligibleToProcess := TRUE;
		END IF;

		IF (varSignEligibleToProcess IS TRUE) THEN
		END IF;

	---[ Data Processing ]--------------------------------------------------------------------------
		IF (varSignEligibleToProcess IS TRUE) THEN
			UPDATE
				"SchAcquisition"."TblLog_FileUpload_PointerHistory"
			SET
				"Sys_Data_Edit_LoginSession_RefID" = varIDSession,
				"Sys_Data_Edit_DateTimeTZ" = varEditDateTimeTZ,
				"Sys_Partition_RemovableRecord_Key_RefID" = varSysPartitionRemovableRecordKeyRefID,
				"Sys_Branch_RefID" = varBranchRefID,
				"Sys_BaseCurrency_RefID" = varBaseCurrency_RefID,
				------------------------------
				"Log_FileUpload_Pointer_RefID" = varLog_FileUpload_Pointer_RefID
			WHERE
				"Sys_PID" = varID
				OR
				"Sys_SID" = varID;
		END IF;

	---[ Data Return ]-----------------------------------------------------------------------------
		IF (varSignEligibleToProcess IS TRUE) THEN
			varRecSetOutput."SignSuccess" := 1;
			varRecSetOutput."SignRecordType" := 'Sys_RPK';
			varRecSetOutput."SignRecordID" := (SELECT "Sys_RPK" FROM "SchAcquisition"."TblLog_FileUpload_PointerHistory" WHERE "Sys_PID" = varID OR "Sys_SID" = varID LIMIT 1);
			varRecSetOutput."SignMessage" := null;

			RETURN NEXT varRecSetOutput;
		END IF;

	---[ Exception Handling ]-----------------------------------------------------------------------
		--EXCEPTION WHEN OTHERS THEN ...

END;
$_$;


ALTER FUNCTION "SchAcquisition"."Func_TblLog_FileUpload_PointerHistory_UPDATE"(bigint, bigint, timestamp with time zone, bigint, bigint, bigint, bigint) OWNER TO "SysAdmin";

--
-- TOC entry 419 (class 1255 OID 1933551)
-- Name: Func_TblLog_FileUpload_Pointer_INSERT(character varying, bigint, timestamp with time zone, bigint, bigint, bigint); Type: FUNCTION; Schema: SchAcquisition; Owner: SysAdmin
--

CREATE FUNCTION "SchAcquisition"."Func_TblLog_FileUpload_Pointer_INSERT"(character varying, bigint, timestamp with time zone, bigint, bigint, bigint) RETURNS SETOF "SchSystem"."HoldFuncSys_General_FeedBackQuery"
    LANGUAGE plpgsql
    AS $_$
/*----------------------------------------------------------------------------------------------------
▪ Nama                :	"SchAcquisition"."Func_TblLog_FileUpload_Pointer_INSERT"
▪ Versi               :	1.00.0003
▪ Tanggal
     ► Pemutakhiran   :	2024-10-04
     ► Pembuatan      :	2021-07-26
▪ Input               :	• varSysDataAnnotation (varchar - Mandatory)
						• varIDSession (bigint - Mandatory)
						• varEntryDateTimeTZ (timestamptz - Mandatory)
						• varSysPartitionRemovableRecordKeyRefID (bigint - Mandatory)
						• varBranchRefID (bigint - Mandatory)
						• varBaseCurrency_RefID (bigint - Mandatory)
						------------------------------
						------------------------------
▪ Output              :	varRecSetOutput ("SchSystem"."HoldFuncSys_General_FeedBackQuery")
▪ Keterkaitan Fungsi  :	-
▪ Deskripsi           :	• Memasukan data (INSERT) pada tabel TblLog_FileUpload_Pointer
▪ Copyright           :	Zheta © 2021 - 2024

----[ SQL Example(s) ]------------------------------------------------------------------------------

----------------------------------------------------------------------------------------------------*/

DECLARE
	---[ Input Variable(s) ]------------------------------------------------------------------------
		---{ Mandatory }------------------
			varSysDataAnnotation									ALIAS FOR $1;
			varIDSession											ALIAS FOR $2;
			varEntryDateTimeTZ										ALIAS FOR $3;
			varSysPartitionRemovableRecordKeyRefID					ALIAS FOR $4;
			varBranchRefID											ALIAS FOR $5;
			varBaseCurrency_RefID									ALIAS FOR $6;
			------------------------------

		---{ Optional }-------------------

		---{ Additional }-----------------

	---[ Output Variable(s) ]-----------------------------------------------------------------------
			varRecSetOutput											"SchSystem"."HoldFuncSys_General_FeedBackQuery"%rowtype;

	---[ Intermediate Variable(s) ]-----------------------------------------------------------------
		---{ Default }--------------------
			varSystemNoticeTag										varchar;
			varSignEligibleToProcess								boolean;

		---{ Additional }-----------------

BEGIN
	---[ Data Initializing ]------------------------------------------------------------------------
		--varSystemNoticeTag := "SchSysAsset"."Func_GetSystemNoticeTag"();
		varSignEligibleToProcess := FALSE;

		IF (varSignEligibleToProcess IS FALSE) THEN
			varSignEligibleToProcess := TRUE;
		END IF;

		IF (varSignEligibleToProcess IS TRUE) THEN
		END IF;

	---[ Data Processing ]--------------------------------------------------------------------------
		IF (varSignEligibleToProcess IS TRUE) THEN
			INSERT INTO 
				"SchAcquisition"."TblLog_FileUpload_Pointer"
					(
					"Sys_Data_Annotation",
					"Sys_Data_Entry_LoginSession_RefID",
					"Sys_Data_Entry_DateTimeTZ",
					"Sys_Partition_RemovableRecord_Key_RefID",
					"Sys_Branch_RefID",
					"Sys_BaseCurrency_RefID"
					------------------------------
					)
				VALUES
					(
					varSysDataAnnotation,
					varIDSession,
					varEntryDateTimeTZ,
					varSysPartitionRemovableRecordKeyRefID,
					varBranchRefID,
					varBaseCurrency_RefID
					------------------------------
					);
		END IF;

	---[ Data Return ]-----------------------------------------------------------------------------
		IF (varSignEligibleToProcess IS TRUE) THEN
			varRecSetOutput."SignSuccess" := 1;
			varRecSetOutput."SignRecordType" := 'Sys_RPK';
			varRecSetOutput."SignRecordID" := CURRVAL('"SchAcquisition"."TblLog_FileUpload_Pointer_Sys_RPK_seq"');
			varRecSetOutput."SignMessage" := null;
		
			RETURN NEXT varRecSetOutput;
		END IF;

	---[ Exception Handling ]-----------------------------------------------------------------------
		--EXCEPTION WHEN OTHERS THEN ...

END;
$_$;


ALTER FUNCTION "SchAcquisition"."Func_TblLog_FileUpload_Pointer_INSERT"(character varying, bigint, timestamp with time zone, bigint, bigint, bigint) OWNER TO "SysAdmin";

--
-- TOC entry 363 (class 1255 OID 1933552)
-- Name: Func_TblLog_FileUpload_Pointer_UPDATE(bigint, bigint, timestamp with time zone, bigint, bigint, bigint); Type: FUNCTION; Schema: SchAcquisition; Owner: SysAdmin
--

CREATE FUNCTION "SchAcquisition"."Func_TblLog_FileUpload_Pointer_UPDATE"(bigint, bigint, timestamp with time zone, bigint, bigint, bigint) RETURNS SETOF "SchSystem"."HoldFuncSys_General_FeedBackQuery"
    LANGUAGE plpgsql
    AS $_$
/*----------------------------------------------------------------------------------------------------
▪ Nama                :	"SchAcquisition"."Func_TblLog_FileUpload_Pointer_UPDATE"
▪ Versi               :	1.00.0003
▪ Tanggal
     ► Pemutakhiran   :	2024-10-04
     ► Pembuatan      :	2021-07-26
▪ Input               :	• varID (bigint - Mandatory)
						• varIDSession (bigint - Mandatory)
						• varEditDateTimeTZ (timestamptz - Mandatory)
						• varSysPartitionRemovableRecordKeyRefID (bigint - Mandatory)
						• varBranchRefID (bigint - Mandatory)
						• varBaseCurrency_RefID (bigint - Mandatory)
						------------------------------
						------------------------------
▪ Output              :	varRecSetOutput ("SchSystem"."HoldFuncSys_General_FeedBackQuery")
▪ Keterkaitan Fungsi  :	-
▪ Deskripsi           :	• Memutakhirkan data (UPDATE) pada tabel TblLog_FileUpload_Pointer
▪ Copyright           :	Zheta © 2021 - 2024

----[ SQL Example(s) ]------------------------------------------------------------------------------

----------------------------------------------------------------------------------------------------*/

DECLARE
	---[ Input Variable(s) ]------------------------------------------------------------------------
		---{ Mandatory }------------------
			varID													ALIAS FOR $1;
			varIDSession											ALIAS FOR $2;
			varEditDateTimeTZ										ALIAS FOR $3;
			varSysPartitionRemovableRecordKeyRefID					ALIAS FOR $4;
			varBranchRefID											ALIAS FOR $5;
			varBaseCurrency_RefID									ALIAS FOR $6;
			------------------------------

		---{ Optional }-------------------

		---{ Additional }-----------------

	---[ Output Variable(s) ]-----------------------------------------------------------------------
			varRecSetOutput											"SchSystem"."HoldFuncSys_General_FeedBackQuery"%rowtype;

	---[ Intermediate Variable(s) ]-----------------------------------------------------------------
		---{ Default }--------------------
			varSystemNoticeTag										varchar;
			varSignEligibleToProcess								boolean;

		---{ Additional }-----------------
BEGIN
	---[ Data Initializing ]------------------------------------------------------------------------
		--varSystemNoticeTag := "SchSysAsset"."Func_GetSystemNoticeTag"();
		varSignEligibleToProcess := FALSE;

		IF (varSignEligibleToProcess IS FALSE) THEN
			varSignEligibleToProcess := TRUE;
		END IF;

		IF (varSignEligibleToProcess IS TRUE) THEN
		END IF;

	---[ Data Processing ]--------------------------------------------------------------------------
		IF (varSignEligibleToProcess IS TRUE) THEN
			UPDATE
				"SchAcquisition"."TblLog_FileUpload_Pointer"
			SET
				"Sys_Data_Edit_LoginSession_RefID" = varIDSession,
				"Sys_Data_Edit_DateTimeTZ" = varEditDateTimeTZ,
				"Sys_Partition_RemovableRecord_Key_RefID" = varSysPartitionRemovableRecordKeyRefID,
				"Sys_Branch_RefID" = varBranchRefID,
				"Sys_BaseCurrency_RefID" = varBaseCurrency_RefID
				------------------------------
			WHERE
				"Sys_PID" = varID
				OR
				"Sys_SID" = varID;
		END IF;

	---[ Data Return ]-----------------------------------------------------------------------------
		IF (varSignEligibleToProcess IS TRUE) THEN
			varRecSetOutput."SignSuccess" := 1;
			varRecSetOutput."SignRecordType" := 'Sys_RPK';
			varRecSetOutput."SignRecordID" := (SELECT "Sys_RPK" FROM "SchAcquisition"."TblLog_FileUpload_Pointer" WHERE "Sys_PID" = varID OR "Sys_SID" = varID LIMIT 1);
			varRecSetOutput."SignMessage" := null;
		
			RETURN NEXT varRecSetOutput;
		END IF;

	---[ Exception Handling ]-----------------------------------------------------------------------
		--EXCEPTION WHEN OTHERS THEN ...

END;
$_$;


ALTER FUNCTION "SchAcquisition"."Func_TblLog_FileUpload_Pointer_UPDATE"(bigint, bigint, timestamp with time zone, bigint, bigint, bigint) OWNER TO "SysAdmin";

--
-- TOC entry 407 (class 1255 OID 1933553)
-- Name: Func_TblRotateLog_FileUploadStagingAreaDetail_INSERT(character varying, bigint, timestamp with time zone, bigint, smallint, character varying, bigint, character varying, character varying, character varying, bigint, bigint, character varying, character varying); Type: FUNCTION; Schema: SchAcquisition; Owner: SysAdmin
--

CREATE FUNCTION "SchAcquisition"."Func_TblRotateLog_FileUploadStagingAreaDetail_INSERT"(character varying, bigint, timestamp with time zone, bigint, smallint, character varying, bigint, character varying, character varying, character varying, bigint, bigint, character varying, character varying) RETURNS SETOF "SchSystem"."HoldFuncSys_General_FeedBackQuery"
    LANGUAGE plpgsql
    AS $_$
/*----------------------------------------------------------------------------------------------------
▪ Nama                :	"SchAcquisition"."Func_TblRotateLog_FileUploadStagingAreaDetail_INSERT"
▪ Versi               :	1.00.0001
▪ Tanggal
     ► Pemutakhiran   :	2024-10-04
     ► Pembuatan      :	2024-08-19
▪ Input               :	• varSysDataAnnotation (varchar - Mandatory)
						• varIDSession (bigint - Mandatory)
						• varEntryDateTimeTZ (timestamptz - Mandatory)
						------------------------------
						• varRotateLog_FileUploadStagingArea_RefRPK (bigint - Mandatory)
						• varSequence (smallint - Mandatory)
						• varName	(varchar - Mandatory)
						• varSize (bigint - Mandatory)
						• varMIME (varchar - Mandatory)
						• varExtension (varchar - Mandatory)
						• varLastModifiedDateTimeTZ (varchar - Mandatory)
						• varLastModifiedUnixTimestamp (bigint - Mandatory)
						• varHashMethod_RefID (bigint - Mandatory)
						• varContentBase64Hash (varchar - Mandatory)
						• varURLDelete (varchar - Mandatory)
						------------------------------
▪ Output              :	varRecSetOutput ("SchSystem"."HoldFuncSys_General_FeedBackQuery")
▪ Keterkaitan Fungsi  :	-
▪ Deskripsi           :	• Memasukan data (INSERT) pada tabel TblRotateLog_FileUploadStagingAreaDetail
▪ Copyright           :	Zheta © 2024

----[ SQL Example(s) ]------------------------------------------------------------------------------

----------------------------------------------------------------------------------------------------*/

DECLARE
	---[ Input Variable(s) ]------------------------------------------------------------------------
		---{ Mandatory }------------------
			varSysDataAnnotation									ALIAS FOR $1;
			varIDSession											ALIAS FOR $2;
			varEntryDateTimeTZ										ALIAS FOR $3;
			------------------------------
			varRotateLog_FileUploadStagingArea_RefRPK				ALIAS FOR $4;
			varSequence												ALIAS FOR $5;
			varName													ALIAS FOR $6;	
			varSize													ALIAS FOR $7;
			varMIME													ALIAS FOR $8;
			varExtension											ALIAS FOR $9;
			varLastModifiedDateTimeTZ								ALIAS FOR $10;
			varLastModifiedUnixTimestamp							ALIAS FOR $11;
			varHashMethod_RefID										ALIAS FOR $12;
			varContentBase64Hash									ALIAS FOR $13;
			varURLDelete											ALIAS FOR $14;

		---{ Optional }-------------------

		---{ Additional }-----------------

	---[ Output Variable(s) ]-----------------------------------------------------------------------
			varRecSetOutput											"SchSystem"."HoldFuncSys_General_FeedBackQuery"%rowtype;
	
	---[ Intermediate Variable(s) ]-----------------------------------------------------------------
		---{ Default }--------------------
			varSystemNoticeTag										varchar;
			varSignEligibleToProcess								boolean;
	
			varPrimeNumber											bigint;
			varSys_RotateID											bigint;
			varSys_RPK												bigint;
		
		   	varSignExist											smallint;

		---{ Additional }-----------------

BEGIN
	---[ Data Initializing ]------------------------------------------------------------------------
		--varSystemNoticeTag := "SchSysAsset"."Func_GetSystemNoticeTag"();
		varSignEligibleToProcess := FALSE;

		IF (varSignEligibleToProcess IS FALSE) THEN
			varSignEligibleToProcess := TRUE;
		END IF;

		IF (varSignEligibleToProcess IS TRUE) THEN
			---> Reinitializing varPrimeNumber
			varPrimeNumber := 10007; --2; --10007;

			---> Reinitializing varSys_RPK
			varSys_RPK := nextval('"SchAcquisition"."TblRotateLog_FileUploadStagingAreaDetail_Sys_RPK_seq"'::regclass);
			--RAISE NOTICE '%', varSys_RPK;

			---> Reinitializing varSys_RotateID
			varSys_RotateID := (((varSys_RPK - 1) % varPrimeNumber) + 1);
			--RAISE NOTICE '%', varSys_RotateID;

			---> Reinitializing varSignExist
			SELECT 
				COUNT("Sys_RotateID")
					INTO
						varSignExist
			FROM 
				"SchAcquisition"."TblRotateLog_FileUploadStagingAreaDetail"
			WHERE
				"Sys_RotateID" = varSys_RotateID;			
			--RAISE NOTICE '%', varSignExist;
		END IF;

	---[ Data Processing ]--------------------------------------------------------------------------
		IF (varSignExist = 0) THEN
			INSERT INTO 
				"SchAcquisition"."TblRotateLog_FileUploadStagingAreaDetail"
					(
					"Sys_RotateID",
					"Sys_RPK",
					"Sys_Data_Annotation",
					"Sys_Data_Entry_LoginSession_RefID",
					"Sys_Data_Entry_DateTimeTZ",
					------------------------------
					"RotateLog_FileUploadStagingArea_RefRPK",
					"Sequence",
					"Name",
					"Size",
					"MIME",
					"Extension",
					"LastModifiedDateTimeTZ",
					"LastModifiedUnixTimestamp",
					"HashMethod_RefID",
					"ContentBase64Hash",
					"URLDelete"
					)
				VALUES
					(
					varSys_RotateID,
					varSys_RPK,
					varSysDataAnnotation,
					varIDSession,
					varEntryDateTimeTZ,
					------------------------------
					varRotateLog_FileUploadStagingArea_RefRPK,
					varSequence,
					varName,
					varSize,
					varMIME,
					varExtension,
					varLastModifiedDateTimeTZ,
					varLastModifiedUnixTimestamp,
					varHashMethod_RefID,
					varContentBase64Hash,
					varURLDelete
					);
		ELSE
			UPDATE 
				"SchAcquisition"."TblRotateLog_FileUploadStagingAreaDetail"
			SET
				"Sys_RPK" = varSys_RPK,
				"Sys_Data_Annotation" = varSysDataAnnotation,
				"Sys_Data_Entry_LoginSession_RefID" = varIDSession,
				"Sys_Data_Entry_DateTimeTZ" = varEntryDateTimeTZ,
				------------------------------
				"RotateLog_FileUploadStagingArea_RefRPK" = varRotateLog_FileUploadStagingArea_RefRPK,
				"Sequence" = varSequence,
				"Name" = varName,
				"Size" = varSize,
				"MIME" = varMIME,
				"Extension" = varExtension,
				"LastModifiedDateTimeTZ" = varLastModifiedDateTimeTZ,
				"LastModifiedUnixTimestamp" = varLastModifiedUnixTimestamp,
				"HashMethod_RefID" = varHashMethod_RefID,
				"ContentBase64Hash" = varContentBase64Hash,
				"URLDelete" = varURLDelete
			WHERE
				"Sys_RotateID" = varSys_RotateID;
		END IF;

	---[ Data Return ]-----------------------------------------------------------------------------
		IF (varSignEligibleToProcess IS TRUE) THEN
			varRecSetOutput."SignSuccess" := 1;
			varRecSetOutput."SignRecordType" := 'Sys_RotateID';
			varRecSetOutput."SignRecordID" := CURRVAL('"SchAcquisition"."TblRotateLog_FileUploadStagingAreaDetail_Sys_RPK_seq"');
			varRecSetOutput."SignMessage" := null;
		
			RETURN NEXT varRecSetOutput;
		END IF;

	---[ Exception Handling ]-----------------------------------------------------------------------
		--EXCEPTION WHEN OTHERS THEN ...

END;
$_$;


ALTER FUNCTION "SchAcquisition"."Func_TblRotateLog_FileUploadStagingAreaDetail_INSERT"(character varying, bigint, timestamp with time zone, bigint, smallint, character varying, bigint, character varying, character varying, character varying, bigint, bigint, character varying, character varying) OWNER TO "SysAdmin";

--
-- TOC entry 377 (class 1255 OID 1933556)
-- Name: Func_TblRotateLog_FileUploadStagingArea_INSERT(character varying, bigint, timestamp with time zone, character varying); Type: FUNCTION; Schema: SchAcquisition; Owner: SysAdmin
--

CREATE FUNCTION "SchAcquisition"."Func_TblRotateLog_FileUploadStagingArea_INSERT"(character varying, bigint, timestamp with time zone, character varying) RETURNS SETOF "SchSystem"."HoldFuncSys_General_FeedBackQuery"
    LANGUAGE plpgsql
    AS $_$
/*----------------------------------------------------------------------------------------------------
▪ Nama                :	"SchAcquisition"."Func_TblRotateLog_FileUploadStagingArea_INSERT"
▪ Versi               :	1.00.0001
▪ Tanggal
     ► Pemutakhiran   :	2024-10-04
     ► Pembuatan      :	2024-08-19
▪ Input               :	• varSysDataAnnotation (varchar - Mandatory)
						• varIDSession (bigint - Mandatory)
						• varEntryDateTimeTZ (timestamptz - Mandatory)
						------------------------------
						• varApplicationKey (varchar - Mandatory)
						------------------------------
▪ Output              :	varRecSetOutput ("SchSystem"."HoldFuncSys_General_FeedBackQuery")
▪ Keterkaitan Fungsi  :	-
▪ Deskripsi           :	• Memasukan data (INSERT) pada tabel TblRotateLog_FileUploadStagingArea
▪ Copyright           :	Zheta © 2024

----[ SQL Example(s) ]------------------------------------------------------------------------------

----------------------------------------------------------------------------------------------------*/

DECLARE
	---[ Input Variable(s) ]------------------------------------------------------------------------
		---{ Mandatory }------------------
			varSysDataAnnotation									ALIAS FOR $1;
			varIDSession											ALIAS FOR $2;
			varEntryDateTimeTZ										ALIAS FOR $3;
			------------------------------
			varApplicationKey										ALIAS FOR $4;

		---{ Optional }-------------------

		---{ Additional }-----------------

	---[ Output Variable(s) ]-----------------------------------------------------------------------
			varRecSetOutput											"SchSystem"."HoldFuncSys_General_FeedBackQuery"%rowtype;
	
	---[ Intermediate Variable(s) ]-----------------------------------------------------------------
		---{ Default }--------------------
			varSystemNoticeTag										varchar;
			varSignEligibleToProcess								boolean;
	
			varPrimeNumber											bigint;
			varSys_RotateID											bigint;
			varSys_RPK												bigint;
		
		   	varSignExist											smallint;

		---{ Additional }-----------------

BEGIN
	---[ Data Initializing ]------------------------------------------------------------------------
		--varSystemNoticeTag := "SchSysAsset"."Func_GetSystemNoticeTag"();
		varSignEligibleToProcess := FALSE;

		IF (varSignEligibleToProcess IS FALSE) THEN
			varSignEligibleToProcess := TRUE;
		END IF;

		IF (varSignEligibleToProcess IS TRUE) THEN
			---> Reinitializing varPrimeNumber
			varPrimeNumber := 10007; --2; --10007;

			---> Reinitializing varSys_RPK
			varSys_RPK := nextval('"SchAcquisition"."TblRotateLog_FileUploadStagingArea_Sys_RPK_seq"'::regclass);
			--RAISE NOTICE '%', varSys_RPK;

			---> Reinitializing varSys_RotateID
			varSys_RotateID := (((varSys_RPK - 1) % varPrimeNumber) + 1);
			--RAISE NOTICE '%', varSys_RotateID;

			---> Reinitializing varSignExist
			SELECT
				COUNT("Sys_RotateID")
					INTO
						varSignExist
			FROM 
				"SchAcquisition"."TblRotateLog_FileUploadStagingArea"
			WHERE
				"Sys_RotateID" = varSys_RotateID;
			--RAISE NOTICE '%', varSignExist;
		END IF;

	---[ Data Processing ]--------------------------------------------------------------------------
		IF (varSignEligibleToProcess IS TRUE) THEN
			IF (varSignExist = 0) THEN
				INSERT INTO 
					"SchAcquisition"."TblRotateLog_FileUploadStagingArea"
						(
						"Sys_RotateID",
						"Sys_RPK",
						"Sys_Data_Annotation",
						"Sys_Data_Entry_LoginSession_RefID",
						"Sys_Data_Entry_DateTimeTZ",
						------------------------------
						"ApplicationKey"
						)
					VALUES
						(
						varSys_RotateID,
						varSys_RPK,
						varSysDataAnnotation,
						varIDSession,
						varEntryDateTimeTZ,
						------------------------------
						varApplicationKey
						);
			ELSE
				UPDATE 
					"SchAcquisition"."TblRotateLog_FileUploadStagingArea"
				SET
					"Sys_RPK" = varSys_RPK,
					"Sys_Data_Annotation" = varSysDataAnnotation,
					"Sys_Data_Entry_LoginSession_RefID" = varIDSession,
					"Sys_Data_Entry_DateTimeTZ" = varEntryDateTimeTZ,
					------------------------------
					"ApplicationKey" = varApplicationKey
				WHERE
					"Sys_RotateID" = varSys_RotateID;
			END IF;
		END IF;

	---[ Data Return ]-----------------------------------------------------------------------------
		IF (varSignEligibleToProcess IS TRUE) THEN
			varRecSetOutput."SignSuccess" := 1;
			varRecSetOutput."SignRecordType" := 'Sys_RotateID';
			varRecSetOutput."SignRecordID" := CURRVAL('"SchAcquisition"."TblRotateLog_FileUploadStagingArea_Sys_RPK_seq"');
			varRecSetOutput."SignMessage" := null;
		
			RETURN NEXT varRecSetOutput;
		END IF;

	---[ Exception Handling ]-----------------------------------------------------------------------
		--EXCEPTION WHEN OTHERS THEN ...

END;
$_$;


ALTER FUNCTION "SchAcquisition"."Func_TblRotateLog_FileUploadStagingArea_INSERT"(character varying, bigint, timestamp with time zone, character varying) OWNER TO "SysAdmin";

--
-- TOC entry 430 (class 1255 OID 1933557)
-- Name: Func_TblCache_FunctionResult_INSERT(character varying, bigint, timestamp with time zone, bigint, bigint, bigint, character varying, json, json, character varying, json, character varying, character varying, bigint, interval); Type: FUNCTION; Schema: SchCache; Owner: SysAdmin
--

CREATE FUNCTION "SchCache"."Func_TblCache_FunctionResult_INSERT"(character varying, bigint, timestamp with time zone, bigint, bigint, bigint, character varying, json, json, character varying, json, character varying, character varying, bigint, interval) RETURNS SETOF "SchSystem"."HoldFuncSys_General_FeedBackQuery"
    LANGUAGE plpgsql
    AS $_$
/*----------------------------------------------------------------------------------------------------
▪ Nama                :	"SchCache"."Func_TblCache_FunctionResult_INSERT"
▪ Versi               :	1.03.0001
▪ Tanggal
     ► Pemutakhiran   :	2024-10-04
     ► Pembuatan      :	2024-07-03
▪ Input               :	• varSysDataAnnotation (varchar - Mandatory)
						• varIDSession (bigint - Mandatory)
						• varEntryDateTimeTZ (timestamptz - Mandatory)
						• varSysPartitionRemovableRecordKeyRefID (bigint - Mandatory)
						• varBranch_RefID (bigint - Mandatory)
						• varBaseCurrency_RefID (bigint - Mandatory)
						------------------------------
						• varSchemaFunctionName (varchar - Mandatory)
						• varParameter (json - Mandatory)
						• varObjectsSignatureReference (json - Mandatory)
						• varSQLRecallSyntax (varchar - Mandatory)
						• varResult (json - Mandatory)
						• varReturnDataType (varchar - Mandatory)
						• varReturnDataTypePlaceHolder (varchar - Mandatory)
						• varRecordCount (bigint - Mandatory)
						• varQueryExecutionInterval (interval - Mandatory)
						------------------------------
▪ Output              :	varRecSetOutput ("SchSystem"."HoldFuncSys_General_FeedBackQuery")
▪ Keterkaitan Fungsi  :	-
▪ Deskripsi           :	• Memasukan data (INSERT) pada tabel TblCache_FunctionResult
▪ Copyright           :	Zheta © 2024

----[ SQL Example(s) ]------------------------------------------------------------------------------

----------------------------------------------------------------------------------------------------*/

DECLARE
	---[ Input Variable(s) ]------------------------------------------------------------------------
		---{ Mandatory }------------------
			varSysDataAnnotation									ALIAS FOR $1;
			varIDSession											ALIAS FOR $2;
			varEntryDateTimeTZ										ALIAS FOR $3;
			varSysPartitionRemovableRecordKeyRefID					ALIAS FOR $4;
			varBranch_RefID											ALIAS FOR $5;
			varBaseCurrency_RefID									ALIAS FOR $6;
			------------------------------
			varSchemaFunctionName									ALIAS FOR $7;
			varParameter											ALIAS FOR $8;
			varObjectsSignatureReference							ALIAS FOR $9;
			varSQLRecallSyntax										ALIAS FOR $10;
			varResult												ALIAS FOR $11;
			varReturnDataType										ALIAS FOR $12;
			varReturnDataTypePlaceHolder							ALIAS FOR $13;
			varRecordCount											ALIAS FOR $14;
			varQueryExecutionInterval								ALIAS FOR $15;

		---{ Optional }-------------------

		---{ Additional }-----------------

	---[ Output Variable(s) ]-----------------------------------------------------------------------
			varRecSetOutput											"SchSystem"."HoldFuncSys_General_FeedBackQuery"%rowtype;

	---[ Intermediate Variable(s) ]-----------------------------------------------------------------
		---{ Default }--------------------
			varSystemNoticeTag										varchar;
			varSignEligibleToProcess								boolean;

		---{ Additional }-----------------

BEGIN
	---[ Data Initializing ]------------------------------------------------------------------------
		--varSystemNoticeTag := "SchSysAsset"."Func_GetSystemNoticeTag"();
		varSignEligibleToProcess := FALSE;

		IF (varSignEligibleToProcess IS FALSE) THEN
			varSignEligibleToProcess := TRUE;
		END IF;

		IF (varSignEligibleToProcess IS TRUE) THEN
		END IF;

	---[ Data Processing ]--------------------------------------------------------------------------
		IF (varSignEligibleToProcess IS TRUE) THEN
			INSERT INTO 
				"SchCache"."TblCache_FunctionResult"
					(
					"Sys_Data_Annotation",
					"Sys_Data_Entry_LoginSession_RefID",
					"Sys_Data_Entry_DateTimeTZ",
					"Sys_Partition_RemovableRecord_Key_RefID",
					"Sys_Branch_RefID",
					"Sys_BaseCurrency_RefID",
					------------------------------
					"SchemaFunctionName",
					"Parameter",
					"ObjectsSignatureReference",
					"SQLRecallSyntax",
					"Result",
					"ReturnDataType",
					"ReturnDataTypePlaceHolder",
					"RecordCount",
					"QueryExecutionInterval"
					)
				VALUES
					(
					varSysDataAnnotation,
					varIDSession,
					varEntryDateTimeTZ,
					varSysPartitionRemovableRecordKeyRefID,
					varBranch_RefID,
					varBaseCurrency_RefID,
					------------------------------
					varSchemaFunctionName,
					varParameter,
					varObjectsSignatureReference,
					varSQLRecallSyntax,
					varResult,
					varReturnDataType,
					varReturnDataTypePlaceHolder,
					varRecordCount,
					varQueryExecutionInterval
					);
		END IF;

	---[ Data Return ]-----------------------------------------------------------------------------
		IF (varSignEligibleToProcess IS TRUE) THEN
			varRecSetOutput."SignSuccess" := 1;
			varRecSetOutput."SignRecordType" := 'Sys_RPK';
			varRecSetOutput."SignRecordID" := CURRVAL('"SchCache"."TblCache_FunctionResult_Sys_RPK_seq"');
			varRecSetOutput."SignMessage" := null;

			RETURN NEXT varRecSetOutput;
		END IF;

	---[ Exception Handling ]-----------------------------------------------------------------------
		--EXCEPTION WHEN OTHERS THEN ...

END;
$_$;


ALTER FUNCTION "SchCache"."Func_TblCache_FunctionResult_INSERT"(character varying, bigint, timestamp with time zone, bigint, bigint, bigint, character varying, json, json, character varying, json, character varying, character varying, bigint, interval) OWNER TO "SysAdmin";

--
-- TOC entry 412 (class 1255 OID 1933558)
-- Name: Func_TblCache_FunctionResult_UPDATE(bigint, bigint, timestamp with time zone, bigint, bigint, bigint, character varying, json, json, character varying, json, character varying, character varying, bigint, interval); Type: FUNCTION; Schema: SchCache; Owner: SysAdmin
--

CREATE FUNCTION "SchCache"."Func_TblCache_FunctionResult_UPDATE"(bigint, bigint, timestamp with time zone, bigint, bigint, bigint, character varying, json, json, character varying, json, character varying, character varying, bigint, interval) RETURNS SETOF "SchSystem"."HoldFuncSys_General_FeedBackQuery"
    LANGUAGE plpgsql
    AS $_$
/*----------------------------------------------------------------------------------------------------
▪ Nama                :	"SchCache"."Func_TblCache_FunctionResult_UPDATE"
▪ Versi               :	1.03.0001
▪ Tanggal
     ► Pemutakhiran   :	2024-10-04
     ► Pembuatan      :	2024-07-03
▪ Input               :	• varID (bigint - Mandatory)
						• varIDSession (bigint - Mandatory)
						• varEditDateTimeTZ (timestamptz - Mandatory)
						• varSysPartitionRemovableRecordKeyRefID (bigint - Mandatory)
						• varBranch_RefID (bigint - Mandatory)
						• varBaseCurrency_RefID (bigint - Mandatory)
						------------------------------
						• varSchemaFunctionName (varchar - Mandatory)
						• varParameter (json - Mandatory)
						• varObjectsSignatureReference (json - Mandatory)
						• varSQLRecallSyntax (varchar - Mandatory)
						• varResult (json - Mandatory)
						• varReturnDataType (varchar - Mandatory)
						• varReturnDataTypePlaceHolder (varchar - Mandatory)
						• varRecordCount (bigint - Mandatory)
						• varQueryExecutionInterval (interval - Mandatory)
						------------------------------
▪ Output              :	varRecSetOutput ("SchSystem"."HoldFuncSys_General_FeedBackQuery")
▪ Keterkaitan Fungsi  :	-
▪ Deskripsi           :	• Memutakhirkan data (UPDATE) pada tabel TblCache_FunctionResult
▪ Copyright           :	Zheta © 2024

----[ SQL Example(s) ]------------------------------------------------------------------------------

----------------------------------------------------------------------------------------------------*/

DECLARE
	---[ Input Variable(s) ]------------------------------------------------------------------------
		---{ Mandatory }------------------
			varID													ALIAS FOR $1;
			varIDSession											ALIAS FOR $2;
			varEditDateTimeTZ										ALIAS FOR $3;
			varSysPartitionRemovableRecordKeyRefID					ALIAS FOR $4;
			varBranch_RefID											ALIAS FOR $5;
			varBaseCurrency_RefID									ALIAS FOR $6;
			------------------------------
			varSchemaFunctionName									ALIAS FOR $7;
			varParameter											ALIAS FOR $8;
			varObjectsSignatureReference							ALIAS FOR $9;
			varSQLRecallSyntax										ALIAS FOR $10;
			varResult												ALIAS FOR $11;
			varReturnDataType										ALIAS FOR $12;
			varReturnDataTypePlaceHolder							ALIAS FOR $13;
			varRecordCount											ALIAS FOR $14;
			varQueryExecutionInterval								ALIAS FOR $15;

		---{ Optional }-------------------

		---{ Additional }-----------------

	---[ Output Variable(s) ]-----------------------------------------------------------------------
			varRecSetOutput											"SchSystem"."HoldFuncSys_General_FeedBackQuery"%rowtype;

	---[ Intermediate Variable(s) ]-----------------------------------------------------------------
		---{ Default }--------------------
			varSystemNoticeTag										varchar;
			varSignEligibleToProcess								boolean;

		---{ Additional }-----------------

BEGIN
	---[ Data Initializing ]------------------------------------------------------------------------
		--varSystemNoticeTag := "SchSysAsset"."Func_GetSystemNoticeTag"();
		varSignEligibleToProcess := FALSE;

		IF (varSignEligibleToProcess IS FALSE) THEN
			varSignEligibleToProcess := TRUE;
		END IF;

		IF (varSignEligibleToProcess IS TRUE) THEN
		END IF;

	---[ Data Processing ]--------------------------------------------------------------------------
		IF (varSignEligibleToProcess IS TRUE) THEN
			UPDATE
				"SchCache"."TblCache_FunctionResult"
			SET
				"Sys_Data_Edit_LoginSession_RefID" = varIDSession,
				"Sys_Data_Edit_DateTimeTZ" = varEditDateTimeTZ,
				-- "Sys_Partition_RemovableRecord_Key_RefID" = varSysPartitionRemovableRecordKeyRefID,
				"Sys_Branch_RefID" = varBranch_RefID,
				"Sys_BaseCurrency_RefID" = varBaseCurrency_RefID,
				------------------------------
				"SchemaFunctionName" = varSchemaFunctionName,
				"Parameter" = varParameter,
				"ObjectsSignatureReference" = varObjectsSignatureReference,
				"SQLRecallSyntax" = varSQLRecallSyntax,
				"Result" = varResult,
				"ReturnDataType" = varReturnDataType,
				"ReturnDataTypePlaceHolder" = varReturnDataTypePlaceHolder,
				"RecordCount" = varRecordCount,
				"QueryExecutionInterval" = varQueryExecutionInterval
			WHERE
				"Sys_PID" = varID
				OR
				"Sys_SID" = varID;
		END IF;

	---[ Data Return ]-----------------------------------------------------------------------------
		IF (varSignEligibleToProcess IS TRUE) THEN
			varRecSetOutput."SignSuccess" := 1;
			varRecSetOutput."SignRecordType" := 'Sys_RPK';
			varRecSetOutput."SignRecordID" := (SELECT "Sys_RPK" FROM "SchCache"."TblCache_FunctionResult" WHERE "Sys_PID" = varID OR "Sys_SID" = varID LIMIT 1);
			varRecSetOutput."SignMessage" := null;
		
			RETURN NEXT varRecSetOutput;
		END IF;

	---[ Exception Handling ]-----------------------------------------------------------------------
		--EXCEPTION WHEN OTHERS THEN ...

END;
$_$;


ALTER FUNCTION "SchCache"."Func_TblCache_FunctionResult_UPDATE"(bigint, bigint, timestamp with time zone, bigint, bigint, bigint, character varying, json, json, character varying, json, character varying, character varying, bigint, interval) OWNER TO "SysAdmin";

--
-- TOC entry 375 (class 1255 OID 1933559)
-- Name: Func_TblStatistic_CacheFunctionResultAccess_INSERT(character varying, bigint, timestamp with time zone, bigint, bigint, bigint, bigint, timestamp with time zone, bigint); Type: FUNCTION; Schema: SchCache; Owner: SysAdmin
--

CREATE FUNCTION "SchCache"."Func_TblStatistic_CacheFunctionResultAccess_INSERT"(character varying, bigint, timestamp with time zone, bigint, bigint, bigint, bigint, timestamp with time zone, bigint) RETURNS SETOF "SchSystem"."HoldFuncSys_General_FeedBackQuery"
    LANGUAGE plpgsql
    AS $_$
/*----------------------------------------------------------------------------------------------------
▪ Nama                :	"SchCache"."Func_TblStatistic_CacheFunctionResultAccess_INSERT"
▪ Versi               :	1.00.0001
▪ Tanggal
     ► Pemutakhiran   :	2024-10-04
     ► Pembuatan      :	2024-07-08
▪ Input               :	• varSysDataAnnotation (varchar - Mandatory)
						• varIDSession (bigint - Mandatory)
						• varEntryDateTimeTZ (timestamptz - Mandatory)
						• varSysPartitionRemovableRecordKeyRefID (bigint - Mandatory)
						• varBranch_RefID (bigint - Mandatory)
						• varBaseCurrency_RefID (bigint - Mandatory)
						------------------------------
						• varCache_FunctionResult_RefID (bigint - Mandatory)
						• varLastReadDateTimeTZ (timestamptz - Mandatory)
						• varReadFrequencies (bigint - Mandatory)
						------------------------------
▪ Output              :	varRecSetOutput ("SchSystem"."HoldFuncSys_General_FeedBackQuery")
▪ Keterkaitan Fungsi  :	-
▪ Deskripsi           :	• Memasukan data (INSERT) pada tabel TblStatistic_CacheFunctionResultAccess
▪ Copyright           :	Zheta © 2024

----[ SQL Example(s) ]------------------------------------------------------------------------------

----------------------------------------------------------------------------------------------------*/

DECLARE
	---[ Input Variable(s) ]------------------------------------------------------------------------
		---{ Mandatory }------------------
			varSysDataAnnotation									ALIAS FOR $1;
			varIDSession											ALIAS FOR $2;
			varEntryDateTimeTZ										ALIAS FOR $3;
			varSysPartitionRemovableRecordKeyRefID					ALIAS FOR $4;
			varBranch_RefID											ALIAS FOR $5;
			varBaseCurrency_RefID									ALIAS FOR $6;
			------------------------------
			varCache_FunctionResult_RefID							ALIAS FOR $7;
			varLastReadDateTimeTZ									ALIAS FOR $8;
			varReadFrequencies										ALIAS FOR $9;

		---{ Optional }-------------------

		---{ Additional }-----------------

	---[ Output Variable(s) ]-----------------------------------------------------------------------
			varRecSetOutput											"SchSystem"."HoldFuncSys_General_FeedBackQuery"%rowtype;

	---[ Intermediate Variable(s) ]-----------------------------------------------------------------
		---{ Default }--------------------
			varSystemNoticeTag										varchar;
			varSignEligibleToProcess								boolean;

		---{ Additional }-----------------

BEGIN
	---[ Data Initializing ]------------------------------------------------------------------------
		--varSystemNoticeTag := "SchSysAsset"."Func_GetSystemNoticeTag"();
		varSignEligibleToProcess := FALSE;

		IF (varSignEligibleToProcess IS FALSE) THEN
			varSignEligibleToProcess := TRUE;
		END IF;

		IF (varSignEligibleToProcess IS TRUE) THEN
		END IF;

	---[ Data Processing ]--------------------------------------------------------------------------
		IF (varSignEligibleToProcess IS TRUE) THEN
			INSERT INTO 
				"SchCache"."TblStatistic_CacheFunctionResultAccess"
					(
					"Sys_Data_Annotation",
					"Sys_Data_Entry_LoginSession_RefID",
					"Sys_Data_Entry_DateTimeTZ",
					"Sys_Partition_RemovableRecord_Key_RefID",
					"Sys_Branch_RefID",
					"Sys_BaseCurrency_RefID",
					------------------------------
					"Cache_FunctionResult_RefID",
					"LastReadDateTimeTZ",
					"ReadFrequencies"
					)
				VALUES
					(
					varSysDataAnnotation,
					varIDSession,
					varEntryDateTimeTZ,
					varSysPartitionRemovableRecordKeyRefID,
					varBranch_RefID,
					varBaseCurrency_RefID,
					------------------------------
					varCache_FunctionResult_RefID,
					varLastReadDateTimeTZ,
					varReadFrequencies
					);
		END IF;

	---[ Data Return ]-----------------------------------------------------------------------------
		IF (varSignEligibleToProcess IS TRUE) THEN
			varRecSetOutput."SignSuccess" := 1;
			varRecSetOutput."SignRecordType" := 'Sys_RPK';
			varRecSetOutput."SignRecordID" := CURRVAL('"SchCache"."TblStatistic_CacheFunctionResultAccess_Sys_RPK_seq"');
			varRecSetOutput."SignMessage" := null;

			RETURN NEXT varRecSetOutput;
		END IF;

	---[ Exception Handling ]-----------------------------------------------------------------------
		--EXCEPTION WHEN OTHERS THEN ...

END;
$_$;


ALTER FUNCTION "SchCache"."Func_TblStatistic_CacheFunctionResultAccess_INSERT"(character varying, bigint, timestamp with time zone, bigint, bigint, bigint, bigint, timestamp with time zone, bigint) OWNER TO "SysAdmin";

--
-- TOC entry 445 (class 1255 OID 1933560)
-- Name: Func_TblStatistic_CacheFunctionResultAccess_UPDATE(bigint, bigint, timestamp with time zone, bigint, bigint, bigint, bigint, timestamp with time zone, bigint); Type: FUNCTION; Schema: SchCache; Owner: SysAdmin
--

CREATE FUNCTION "SchCache"."Func_TblStatistic_CacheFunctionResultAccess_UPDATE"(bigint, bigint, timestamp with time zone, bigint, bigint, bigint, bigint, timestamp with time zone, bigint) RETURNS SETOF "SchSystem"."HoldFuncSys_General_FeedBackQuery"
    LANGUAGE plpgsql
    AS $_$
/*----------------------------------------------------------------------------------------------------
▪ Nama                :	"SchCache"."Func_TblStatistic_CacheFunctionResultAccess_UPDATE"
▪ Versi               :	1.00.0001
▪ Tanggal
     ► Pemutakhiran   :	2024-10-04
     ► Pembuatan      :	2024-07-08
▪ Input               :	• varID (bigint - Mandatory)
						• varIDSession (bigint - Mandatory)
						• varEditDateTimeTZ (timestamptz - Mandatory)
						• varSysPartitionRemovableRecordKeyRefID (bigint - Mandatory)
						• varBranch_RefID (bigint - Mandatory)
						• varBaseCurrency_RefID (bigint - Mandatory)
						------------------------------
						• varCache_FunctionResult_RefID (bigint - Mandatory)
						• varLastReadDateTimeTZ (timestamptz - Mandatory)
						• varReadFrequencies (bigint - Mandatory)
						------------------------------
▪ Output              :	varRecSetOutput ("SchSystem"."HoldFuncSys_General_FeedBackQuery")
▪ Keterkaitan Fungsi  :	-
▪ Deskripsi           :	• Memutakhirkan data (UPDATE) pada tabel
						  TblStatistic_CacheFunctionResultAccess
▪ Copyright           :	Zheta © 2024

----[ SQL Example(s) ]------------------------------------------------------------------------------

----------------------------------------------------------------------------------------------------*/

DECLARE
	---[ Input Variable(s) ]------------------------------------------------------------------------
		---{ Mandatory }------------------
			varID													ALIAS FOR $1;
			varIDSession											ALIAS FOR $2;
			varEditDateTimeTZ										ALIAS FOR $3;
			varSysPartitionRemovableRecordKeyRefID					ALIAS FOR $4;
			varBranch_RefID											ALIAS FOR $5;
			varBaseCurrency_RefID									ALIAS FOR $6;
			------------------------------
			varCache_FunctionResult_RefID							ALIAS FOR $7;
			varLastReadDateTimeTZ									ALIAS FOR $8;
			varReadFrequencies										ALIAS FOR $9;

		---{ Optional }-------------------

		---{ Additional }-----------------

	---[ Output Variable(s) ]-----------------------------------------------------------------------
			varRecSetOutput											"SchSystem"."HoldFuncSys_General_FeedBackQuery"%rowtype;

	---[ Intermediate Variable(s) ]-----------------------------------------------------------------
		---{ Default }--------------------
			varSystemNoticeTag										varchar;
			varSignEligibleToProcess								boolean;

		---{ Additional }-----------------

BEGIN
	---[ Data Initializing ]------------------------------------------------------------------------
		--varSystemNoticeTag := "SchSysAsset"."Func_GetSystemNoticeTag"();
		varSignEligibleToProcess := FALSE;

		IF (varSignEligibleToProcess IS FALSE) THEN
			varSignEligibleToProcess := TRUE;
		END IF;

		IF (varSignEligibleToProcess IS TRUE) THEN
		END IF;

	---[ Data Processing ]--------------------------------------------------------------------------
		IF (varSignEligibleToProcess IS TRUE) THEN
			UPDATE
				"SchCache"."TblStatistic_CacheFunctionResultAccess"
			SET
				"Sys_Data_Edit_LoginSession_RefID" = varIDSession,
				"Sys_Data_Edit_DateTimeTZ" = varEditDateTimeTZ,
				-- "Sys_Partition_RemovableRecord_Key_RefID" = varSysPartitionRemovableRecordKeyRefID,
				"Sys_Branch_RefID" = varBranch_RefID,
				"Sys_BaseCurrency_RefID" = varBaseCurrency_RefID,
				------------------------------
				"Cache_FunctionResult_RefID" = varCache_FunctionResult_RefID,
				"LastReadDateTimeTZ" = varLastReadDateTimeTZ,
				"ReadFrequencies" = varReadFrequencies
			WHERE
				"Sys_PID" = varID
				OR
				"Sys_SID" = varID;
		END IF;

	---[ Data Return ]-----------------------------------------------------------------------------
		IF (varSignEligibleToProcess IS TRUE) THEN
			varRecSetOutput."SignSuccess" := 1;
			varRecSetOutput."SignRecordType" := 'Sys_RPK';
			varRecSetOutput."SignRecordID" := (SELECT "Sys_RPK" FROM "SchCache"."TblStatistic_CacheFunctionResultAccess" WHERE "Sys_PID" = varID OR "Sys_SID" = varID LIMIT 1);
			varRecSetOutput."SignMessage" := null;
		
			RETURN NEXT varRecSetOutput;
		END IF;

	---[ Exception Handling ]-----------------------------------------------------------------------
		--EXCEPTION WHEN OTHERS THEN ...

END;
$_$;


ALTER FUNCTION "SchCache"."Func_TblStatistic_CacheFunctionResultAccess_UPDATE"(bigint, bigint, timestamp with time zone, bigint, bigint, bigint, bigint, timestamp with time zone, bigint) OWNER TO "SysAdmin";

--
-- TOC entry 411 (class 1255 OID 1933561)
-- Name: Func_TblLog_FunctionSnapshotSignature_INSERT(character varying, bigint, timestamp with time zone, bigint, bigint, bigint, character varying, character varying, character varying); Type: FUNCTION; Schema: SchLog; Owner: SysAdmin
--

CREATE FUNCTION "SchLog"."Func_TblLog_FunctionSnapshotSignature_INSERT"(character varying, bigint, timestamp with time zone, bigint, bigint, bigint, character varying, character varying, character varying) RETURNS SETOF "SchSystem"."HoldFuncSys_General_FeedBackQuery"
    LANGUAGE plpgsql
    AS $_$
/*----------------------------------------------------------------------------------------------------
▪ Nama                :	"SchLog"."Func_TblLog_FunctionSnapshotSignature_INSERT"
▪ Versi               :	1.00.0001
▪ Tanggal
     ► Pemutakhiran   :	2024-10-04
     ► Pembuatan      :	2024-07-10
▪ Input               :	• varSysDataAnnotation (varchar - Mandatory)
						• varIDSession (bigint - Mandatory)
						• varEntryDateTimeTZ (timestamptz - Mandatory)
						• varSysPartitionRemovableRecordKeyRefID (bigint - Mandatory)
						• varBranch_RefID (bigint - Mandatory)
						• varBaseCurrency_RefID (bigint - Mandatory)
						------------------------------
						• varSchemaName (varchar - Mandatory)
						• varFunctionName (varchar - Mandatory)
						• varSignatureID (varchar - Mandatory)
						------------------------------
▪ Output              :	varRecSetOutput ("SchSystem"."HoldFuncSys_General_FeedBackQuery")
▪ Keterkaitan Fungsi  :	-
▪ Deskripsi           :	• Memasukan data (INSERT) pada tabel TblLog_FunctionSnapshotSignature
▪ Copyright           :	Zheta © 2024

----[ SQL Example(s) ]------------------------------------------------------------------------------

----------------------------------------------------------------------------------------------------*/

DECLARE
	---[ Input Variable(s) ]------------------------------------------------------------------------
		---{ Mandatory }------------------
			varSysDataAnnotation									ALIAS FOR $1;
			varIDSession											ALIAS FOR $2;
			varEntryDateTimeTZ										ALIAS FOR $3;
			varSysPartitionRemovableRecordKeyRefID					ALIAS FOR $4;
			varBranch_RefID											ALIAS FOR $5;
			varBaseCurrency_RefID									ALIAS FOR $6;
			------------------------------
			varSchemaName											ALIAS FOR $7;
			varFunctionName											ALIAS FOR $8;
			varSignatureID											ALIAS FOR $9;

		---{ Optional }-------------------

		---{ Additional }-----------------

	---[ Output Variable(s) ]-----------------------------------------------------------------------
			varRecSetOutput											"SchSystem"."HoldFuncSys_General_FeedBackQuery"%rowtype;

	---[ Intermediate Variable(s) ]-----------------------------------------------------------------
		---{ Default }--------------------
			varSystemNoticeTag										varchar;
			varSignEligibleToProcess								boolean;

		---{ Additional }-----------------

BEGIN
	---[ Data Initializing ]------------------------------------------------------------------------
		--varSystemNoticeTag := "SchSysAsset"."Func_GetSystemNoticeTag"();
		varSignEligibleToProcess := FALSE;

		IF (varSignEligibleToProcess IS FALSE) THEN
			varSignEligibleToProcess := TRUE;
		END IF;

		IF (varSignEligibleToProcess IS TRUE) THEN
		END IF;

	---[ Data Processing ]--------------------------------------------------------------------------
		IF (varSignEligibleToProcess IS TRUE) THEN
			INSERT INTO 
				"SchLog"."TblLog_FunctionSnapshotSignature"
					(
					"Sys_Data_Annotation",
					"Sys_Data_Entry_LoginSession_RefID",
					"Sys_Data_Entry_DateTimeTZ",
					"Sys_Partition_RemovableRecord_Key_RefID",
					"Sys_Branch_RefID",
					"Sys_BaseCurrency_RefID",
					------------------------------
					"SchemaName",
					"FunctionName",
					"SignatureID"
					)
				VALUES
					(
					varSysDataAnnotation,
					varIDSession,
					varEntryDateTimeTZ,
					varSysPartitionRemovableRecordKeyRefID,
					varBranch_RefID,
					varBaseCurrency_RefID,
					------------------------------
					varSchemaName,
					varFunctionName,
					varSignatureID
					);
		END IF;

	---[ Data Return ]-----------------------------------------------------------------------------
		IF (varSignEligibleToProcess IS TRUE) THEN
			varRecSetOutput."SignSuccess" := 1;
			varRecSetOutput."SignRecordType" := 'Sys_RPK';
			varRecSetOutput."SignRecordID" := CURRVAL('"SchLog"."TblLog_FunctionSnapshotSignature_Sys_RPK_seq"');
			varRecSetOutput."SignMessage" := null;

			RETURN NEXT varRecSetOutput;
		END IF;

	---[ Exception Handling ]-----------------------------------------------------------------------
		--EXCEPTION WHEN OTHERS THEN ...

END;
$_$;


ALTER FUNCTION "SchLog"."Func_TblLog_FunctionSnapshotSignature_INSERT"(character varying, bigint, timestamp with time zone, bigint, bigint, bigint, character varying, character varying, character varying) OWNER TO "SysAdmin";

--
-- TOC entry 420 (class 1255 OID 1933562)
-- Name: Func_TblLog_FunctionSnapshotSignature_UPDATE(bigint, bigint, timestamp with time zone, bigint, bigint, bigint, character varying, character varying, character varying); Type: FUNCTION; Schema: SchLog; Owner: SysAdmin
--

CREATE FUNCTION "SchLog"."Func_TblLog_FunctionSnapshotSignature_UPDATE"(bigint, bigint, timestamp with time zone, bigint, bigint, bigint, character varying, character varying, character varying) RETURNS SETOF "SchSystem"."HoldFuncSys_General_FeedBackQuery"
    LANGUAGE plpgsql
    AS $_$
/*----------------------------------------------------------------------------------------------------
▪ Nama                :	"SchLog"."Func_TblLog_FunctionSnapshotSignature_UPDATE"
▪ Versi               :	1.00.0001
▪ Tanggal
     ► Pemutakhiran   :	2024-10-04
     ► Pembuatan      :	2024-07-10
▪ Input               :	• varID (bigint - Mandatory)
						• varIDSession (bigint - Mandatory)
						• varEditDateTimeTZ (timestamptz - Mandatory)
						• varSysPartitionRemovableRecordKeyRefID (bigint - Mandatory)
						• varBranch_RefID (bigint - Mandatory)
						• varBaseCurrency_RefID (bigint - Mandatory)
						------------------------------
						• varSchemaName (varchar - Mandatory)
						• varFunctionName (varchar - Mandatory)
						• varSignatureID (varchar - Mandatory)
						------------------------------
▪ Output              :	varRecSetOutput ("SchSystem"."HoldFuncSys_General_FeedBackQuery")
▪ Keterkaitan Fungsi  :	-
▪ Deskripsi           :	• Memutakhirkan data (UPDATE) pada tabel TblLog_FunctionSnapshotSignature
▪ Copyright           :	Zheta © 2024

----[ SQL Example(s) ]------------------------------------------------------------------------------

----------------------------------------------------------------------------------------------------*/

DECLARE
	---[ Input Variable(s) ]------------------------------------------------------------------------
		---{ Mandatory }------------------
			varID													ALIAS FOR $1;
			varIDSession											ALIAS FOR $2;
			varEditDateTimeTZ										ALIAS FOR $3;
			varSysPartitionRemovableRecordKeyRefID					ALIAS FOR $4;
			varBranch_RefID											ALIAS FOR $5;
			varBaseCurrency_RefID									ALIAS FOR $6;
			------------------------------
			varSchemaName											ALIAS FOR $7;
			varFunctionName											ALIAS FOR $8;
			varSignatureID											ALIAS FOR $9;

		---{ Optional }-------------------

		---{ Additional }-----------------

	---[ Output Variable(s) ]-----------------------------------------------------------------------
			varRecSetOutput											"SchSystem"."HoldFuncSys_General_FeedBackQuery"%rowtype;

	---[ Intermediate Variable(s) ]-----------------------------------------------------------------
		---{ Default }--------------------
			varSystemNoticeTag										varchar;
			varSignEligibleToProcess								boolean;

		---{ Additional }-----------------

BEGIN
	---[ Data Initializing ]------------------------------------------------------------------------
		--varSystemNoticeTag := "SchSysAsset"."Func_GetSystemNoticeTag"();
		varSignEligibleToProcess := FALSE;

		IF (varSignEligibleToProcess IS FALSE) THEN
			varSignEligibleToProcess := TRUE;
		END IF;

		IF (varSignEligibleToProcess IS TRUE) THEN
		END IF;

	---[ Data Processing ]--------------------------------------------------------------------------
		IF (varSignEligibleToProcess IS TRUE) THEN
			UPDATE
				"SchLog"."TblLog_FunctionSnapshotSignature"
			SET
				"Sys_Data_Edit_LoginSession_RefID" = varIDSession,
				"Sys_Data_Edit_DateTimeTZ" = varEditDateTimeTZ,
				-- "Sys_Partition_RemovableRecord_Key_RefID" = varSysPartitionRemovableRecordKeyRefID,
				"Sys_Branch_RefID" = varBranch_RefID,
				"Sys_BaseCurrency_RefID" = varBaseCurrency_RefID,
				------------------------------
				"SchemaName" = varSchemaName,
				"FunctionName" = varFunctionName,
				"SignatureID" = varSignatureID
			WHERE
				"Sys_PID" = varID
				OR
				"Sys_SID" = varID;
		END IF;

	---[ Data Return ]-----------------------------------------------------------------------------
		IF (varSignEligibleToProcess IS TRUE) THEN
			varRecSetOutput."SignSuccess" := 1;
			varRecSetOutput."SignRecordType" := 'Sys_RPK';
			varRecSetOutput."SignRecordID" := (SELECT "Sys_RPK" FROM "SchLog"."TblLog_FunctionSnapshotSignature" WHERE "Sys_PID" = varID OR "Sys_SID" = varID LIMIT 1);
			varRecSetOutput."SignMessage" := null;
		
			RETURN NEXT varRecSetOutput;
		END IF;

	---[ Exception Handling ]-----------------------------------------------------------------------
		--EXCEPTION WHEN OTHERS THEN ...

END;
$_$;


ALTER FUNCTION "SchLog"."Func_TblLog_FunctionSnapshotSignature_UPDATE"(bigint, bigint, timestamp with time zone, bigint, bigint, bigint, character varying, character varying, character varying) OWNER TO "SysAdmin";

--
-- TOC entry 414 (class 1255 OID 1933563)
-- Name: Func_TblLog_TableSnapshotSignature_INSERT(character varying, bigint, timestamp with time zone, bigint, bigint, bigint, character varying, character varying, character varying); Type: FUNCTION; Schema: SchLog; Owner: SysAdmin
--

CREATE FUNCTION "SchLog"."Func_TblLog_TableSnapshotSignature_INSERT"(character varying, bigint, timestamp with time zone, bigint, bigint, bigint, character varying, character varying, character varying) RETURNS SETOF "SchSystem"."HoldFuncSys_General_FeedBackQuery"
    LANGUAGE plpgsql
    AS $_$
/*----------------------------------------------------------------------------------------------------
▪ Nama                :	"SchLog"."Func_TblLog_TableSnapshotSignature_INSERT"
▪ Versi               :	1.00.0001
▪ Tanggal
     ► Pemutakhiran   :	2024-10-04
     ► Pembuatan      :	2023-03-24
▪ Input               :	• varSysDataAnnotation (varchar - Mandatory)
						• varIDSession (bigint - Mandatory)
						• varEntryDateTimeTZ (timestamptz - Mandatory)
						• varSysPartitionRemovableRecordKeyRefID (bigint - Mandatory)
						• varBranch_RefID (bigint - Mandatory)
						• varBaseCurrency_RefID (bigint - Mandatory)
						------------------------------
						• varSchemaName (varchar - Mandatory)
						• varTableName (varchar - Mandatory)
						• varSignatureID (varchar - Mandatory)
						------------------------------
▪ Output              :	varRecSetOutput ("SchSystem"."HoldFuncSys_General_FeedBackQuery")
▪ Keterkaitan Fungsi  :	-
▪ Deskripsi           :	• Memasukan data (INSERT) pada tabel TblLog_TableSnapshotSignature
▪ Copyright           :	Zheta © 2023 - 2024

----[ SQL Example(s) ]------------------------------------------------------------------------------

----------------------------------------------------------------------------------------------------*/

DECLARE
	---[ Input Variable(s) ]------------------------------------------------------------------------
		---{ Mandatory }------------------
			varSysDataAnnotation									ALIAS FOR $1;
			varIDSession											ALIAS FOR $2;
			varEntryDateTimeTZ										ALIAS FOR $3;
			varSysPartitionRemovableRecordKeyRefID					ALIAS FOR $4;
			varBranch_RefID											ALIAS FOR $5;
			varBaseCurrency_RefID									ALIAS FOR $6;
			------------------------------
			varSchemaName											ALIAS FOR $7;
			varTableName											ALIAS FOR $8;
			varSignatureID											ALIAS FOR $9;

		---{ Optional }-------------------

		---{ Additional }-----------------

	---[ Output Variable(s) ]-----------------------------------------------------------------------
			varRecSetOutput											"SchSystem"."HoldFuncSys_General_FeedBackQuery"%rowtype;

	---[ Intermediate Variable(s) ]-----------------------------------------------------------------
		---{ Default }--------------------
			varSystemNoticeTag										varchar;
			varSignEligibleToProcess								boolean;

		---{ Additional }-----------------

BEGIN
	---[ Data Initializing ]------------------------------------------------------------------------
		--varSystemNoticeTag := "SchSysAsset"."Func_GetSystemNoticeTag"();
		varSignEligibleToProcess := FALSE;

		IF (varSignEligibleToProcess IS FALSE) THEN
			varSignEligibleToProcess := TRUE;
		END IF;

		IF (varSignEligibleToProcess IS TRUE) THEN
		END IF;

	---[ Data Processing ]--------------------------------------------------------------------------
		IF (varSignEligibleToProcess IS TRUE) THEN
			INSERT INTO 
				"SchLog"."TblLog_TableSnapshotSignature"
					(
					"Sys_Data_Annotation",
					"Sys_Data_Entry_LoginSession_RefID",
					"Sys_Data_Entry_DateTimeTZ",
					"Sys_Partition_RemovableRecord_Key_RefID",
					"Sys_Branch_RefID",
					"Sys_BaseCurrency_RefID",
					------------------------------
					"SchemaName",
					"TableName",
					"SignatureID"
					)
				VALUES
					(
					varSysDataAnnotation,
					varIDSession,
					varEntryDateTimeTZ,
					varSysPartitionRemovableRecordKeyRefID,
					varBranch_RefID,
					varBaseCurrency_RefID,
					------------------------------
					varSchemaName,
					varTableName,
					varSignatureID
					);
		END IF;

	---[ Data Return ]-----------------------------------------------------------------------------
		IF (varSignEligibleToProcess IS TRUE) THEN
			varRecSetOutput."SignSuccess" := 1;
			varRecSetOutput."SignRecordType" := 'Sys_RPK';
			varRecSetOutput."SignRecordID" := CURRVAL('"SchLog"."TblLog_TableSnapshotSignature_Sys_RPK_seq"');
			varRecSetOutput."SignMessage" := null;

			RETURN NEXT varRecSetOutput;
		END IF;

	---[ Exception Handling ]-----------------------------------------------------------------------
		--EXCEPTION WHEN OTHERS THEN ...

END;
$_$;


ALTER FUNCTION "SchLog"."Func_TblLog_TableSnapshotSignature_INSERT"(character varying, bigint, timestamp with time zone, bigint, bigint, bigint, character varying, character varying, character varying) OWNER TO "SysAdmin";

--
-- TOC entry 424 (class 1255 OID 1933564)
-- Name: Func_TblLog_TableSnapshotSignature_UPDATE(bigint, bigint, timestamp with time zone, bigint, bigint, bigint, character varying, character varying, character varying); Type: FUNCTION; Schema: SchLog; Owner: SysAdmin
--

CREATE FUNCTION "SchLog"."Func_TblLog_TableSnapshotSignature_UPDATE"(bigint, bigint, timestamp with time zone, bigint, bigint, bigint, character varying, character varying, character varying) RETURNS SETOF "SchSystem"."HoldFuncSys_General_FeedBackQuery"
    LANGUAGE plpgsql
    AS $_$
/*----------------------------------------------------------------------------------------------------
▪ Nama                :	"SchLog"."Func_TblLog_TableSnapshotSignature_UPDATE"
▪ Versi               :	1.00.0001
▪ Tanggal
     ► Pemutakhiran   :	2024-10-04
     ► Pembuatan      :	2023-03-24
▪ Input               :	• varID (bigint - Mandatory)
						• varIDSession (bigint - Mandatory)
						• varEditDateTimeTZ (timestamptz - Mandatory)
						• varSysPartitionRemovableRecordKeyRefID (bigint - Mandatory)
						• varBranch_RefID (bigint - Mandatory)
						• varBaseCurrency_RefID (bigint - Mandatory)
						------------------------------
						• varSchemaName (varchar - Mandatory)
						• varTableName (varchar - Mandatory)
						• varSignatureID (varchar - Mandatory)
						------------------------------
▪ Output              :	varRecSetOutput ("SchSystem"."HoldFuncSys_General_FeedBackQuery")
▪ Keterkaitan Fungsi  :	-
▪ Deskripsi           :	• Memutakhirkan data (UPDATE) pada tabel TblLog_TableSnapshotSignature
▪ Copyright           :	Zheta © 2023 - 2024

----[ SQL Example(s) ]------------------------------------------------------------------------------

----------------------------------------------------------------------------------------------------*/

DECLARE
	---[ Input Variable(s) ]------------------------------------------------------------------------
		---{ Mandatory }------------------
			varID													ALIAS FOR $1;
			varIDSession											ALIAS FOR $2;
			varEditDateTimeTZ										ALIAS FOR $3;
			varSysPartitionRemovableRecordKeyRefID					ALIAS FOR $4;
			varBranch_RefID											ALIAS FOR $5;
			varBaseCurrency_RefID									ALIAS FOR $6;
			------------------------------
			varSchemaName											ALIAS FOR $7;
			varTableName											ALIAS FOR $8;
			varSignatureID											ALIAS FOR $9;

		---{ Optional }-------------------

		---{ Additional }-----------------

	---[ Output Variable(s) ]-----------------------------------------------------------------------
			varRecSetOutput											"SchSystem"."HoldFuncSys_General_FeedBackQuery"%rowtype;

	---[ Intermediate Variable(s) ]-----------------------------------------------------------------
		---{ Default }--------------------
			varSystemNoticeTag										varchar;
			varSignEligibleToProcess								boolean;

		---{ Additional }-----------------

BEGIN
	---[ Data Initializing ]------------------------------------------------------------------------
		--varSystemNoticeTag := "SchSysAsset"."Func_GetSystemNoticeTag"();
		varSignEligibleToProcess := FALSE;

		IF (varSignEligibleToProcess IS FALSE) THEN
			varSignEligibleToProcess := TRUE;
		END IF;

		IF (varSignEligibleToProcess IS TRUE) THEN
		END IF;

	---[ Data Processing ]--------------------------------------------------------------------------
		IF (varSignEligibleToProcess IS TRUE) THEN
			UPDATE
				"SchLog"."TblLog_TableSnapshotSignature"
			SET
				"Sys_Data_Edit_LoginSession_RefID" = varIDSession,
				"Sys_Data_Edit_DateTimeTZ" = varEditDateTimeTZ,
				-- "Sys_Partition_RemovableRecord_Key_RefID" = varSysPartitionRemovableRecordKeyRefID,
				"Sys_Branch_RefID" = varBranch_RefID,
				"Sys_BaseCurrency_RefID" = varBaseCurrency_RefID,
				------------------------------
				"SchemaName" = varSchemaName,
				"TableName" = varTableName,
				"SignatureID" = varSignatureID
			WHERE
				"Sys_PID" = varID
				OR
				"Sys_SID" = varID;
		END IF;

	---[ Data Return ]-----------------------------------------------------------------------------
		IF (varSignEligibleToProcess IS TRUE) THEN
			varRecSetOutput."SignSuccess" := 1;
			varRecSetOutput."SignRecordType" := 'Sys_RPK';
			varRecSetOutput."SignRecordID" := (SELECT "Sys_RPK" FROM "SchLog"."TblLog_TableSnapshotSignature" WHERE "Sys_PID" = varID OR "Sys_SID" = varID LIMIT 1);
			varRecSetOutput."SignMessage" := null;
		
			RETURN NEXT varRecSetOutput;
		END IF;

	---[ Exception Handling ]-----------------------------------------------------------------------
		--EXCEPTION WHEN OTHERS THEN ...

END;
$_$;


ALTER FUNCTION "SchLog"."Func_TblLog_TableSnapshotSignature_UPDATE"(bigint, bigint, timestamp with time zone, bigint, bigint, bigint, character varying, character varying, character varying) OWNER TO "SysAdmin";

--
-- TOC entry 398 (class 1255 OID 1933565)
-- Name: Func_TblLog_TransactionHistory_INSERT(character varying, bigint, timestamp with time zone, bigint, bigint, bigint, bigint, bigint, bigint, timestamp with time zone, json, bigint, character varying); Type: FUNCTION; Schema: SchLog; Owner: SysEngine
--

CREATE FUNCTION "SchLog"."Func_TblLog_TransactionHistory_INSERT"(character varying, bigint, timestamp with time zone, bigint, bigint, bigint, bigint, bigint, bigint, timestamp with time zone, json, bigint, character varying) RETURNS SETOF "SchSystem"."HoldFuncSys_General_FeedBackQuery"
    LANGUAGE plpgsql
    AS $_$
/*----------------------------------------------------------------------------------------------------
▪ Nama                :	"SchLog"."Func_TblLog_TransactionHistory_INSERT"
▪ Versi               :	1.00.0001
▪ Tanggal
     ► Pemutakhiran   :	2024-10-04
     ► Pembuatan      :	2023-12-01
▪ Input               :	• varSysDataAnnotation (varchar - Mandatory)
						• varIDSession (bigint - Mandatory)
						• varEntryDateTimeTZ (timestamptz - Mandatory)
						• varSysPartitionRemovableRecordKeyRefID (bigint - Mandatory)
						• varBranch_RefID (bigint - Mandatory)
						• varBaseCurrency_RefID (bigint - Mandatory)
						------------------------------
						• varSource_RefPID (bigint - Mandatory)
						• varSource_RefSID (bigint - Mandatory)
						• varSource_RefRPK (bigint - Mandatory)
						• varSource_EntryDateTimeTZ (timestamptz - Mandatory)
						• varContent (json - Mandatory)
						• varSource_RefHeaderID (bigint - Mandatory)
						• varType (varchar - Mandatory)
						------------------------------
▪ Output              :	varRecSetOutput ("SchSystem"."HoldFuncSys_General_FeedBackQuery")
▪ Keterkaitan Fungsi  :	-
▪ Deskripsi           :	• Memasukan data (INSERT) pada tabel TblLog_TransactionHistory
▪ Copyright           :	Zheta © 2023 - 2024

----[ SQL Example(s) ]------------------------------------------------------------------------------

----------------------------------------------------------------------------------------------------*/

DECLARE
	---[ Input Variable(s) ]------------------------------------------------------------------------
		---{ Mandatory }------------------
			varSysDataAnnotation									ALIAS FOR $1;
			varIDSession											ALIAS FOR $2;
			varEntryDateTimeTZ										ALIAS FOR $3;
			varSysPartitionRemovableRecordKeyRefID					ALIAS FOR $4;
			varBranch_RefID											ALIAS FOR $5;
			varBaseCurrency_RefID									ALIAS FOR $6;
			------------------------------
			varSource_RefPID										ALIAS FOR $7;
			varSource_RefSID										ALIAS FOR $8;
			varSource_RefRPK										ALIAS FOR $9;
			varSource_EntryDateTimeTZ								ALIAS FOR $10;
			varContent												ALIAS FOR $11;
			varSource_RefHeaderID									ALIAS FOR $12;
			varType													ALIAS FOR $13;

		---{ Optional }-------------------

		---{ Additional }-----------------

	---[ Output Variable(s) ]-----------------------------------------------------------------------
			varRecSetOutput											"SchSystem"."HoldFuncSys_General_FeedBackQuery"%rowtype;

	---[ Intermediate Variable(s) ]-----------------------------------------------------------------
		---{ Default }--------------------
			varSystemNoticeTag										varchar;
			varSignEligibleToProcess								boolean;

		---{ Additional }-----------------

BEGIN
	---[ Data Initializing ]------------------------------------------------------------------------
		--varSystemNoticeTag := "SchSysAsset"."Func_GetSystemNoticeTag"();
		varSignEligibleToProcess := FALSE;

		IF (varSignEligibleToProcess IS FALSE) THEN
			varSignEligibleToProcess := TRUE;
		END IF;

		IF (varSignEligibleToProcess IS TRUE) THEN
		END IF;

	---[ Data Processing ]--------------------------------------------------------------------------
		IF (varSignEligibleToProcess IS TRUE) THEN
			INSERT INTO 
				"SchLog"."TblLog_TransactionHistory"
					(
					"Sys_Data_Annotation",
					"Sys_Data_Entry_LoginSession_RefID",
					"Sys_Data_Entry_DateTimeTZ",
					"Sys_Partition_RemovableRecord_Key_RefID",
					"Sys_Branch_RefID",
					"Sys_BaseCurrency_RefID",
					------------------------------
					"Source_RefPID",
					"Source_RefSID",
					"Source_RefRPK",
					"Source_EntryDateTimeTZ",
					"Content",
					"Source_RefHeaderID",
					"Type"
					)
				VALUES
					(
					varSysDataAnnotation,
					varIDSession,
					varEntryDateTimeTZ,
					varSysPartitionRemovableRecordKeyRefID,
					varBranch_RefID,
					varBaseCurrency_RefID,
					------------------------------
					varSource_RefPID,
					varSource_RefSID,
					varSource_RefRPK,
					varSource_EntryDateTimeTZ,
					varContent,
					varSource_RefHeaderID,
					varType
					);
		END IF;

	---[ Data Return ]-----------------------------------------------------------------------------
		IF (varSignEligibleToProcess IS TRUE) THEN
			varRecSetOutput."SignSuccess" := 1;
			varRecSetOutput."SignRecordType" := 'Sys_RPK';
			varRecSetOutput."SignRecordID" := CURRVAL('"SchLog"."TblLog_TransactionHistory_Sys_RPK_seq"');
			varRecSetOutput."SignMessage" := null;

			RETURN NEXT varRecSetOutput;
		END IF;

	---[ Exception Handling ]-----------------------------------------------------------------------
		--EXCEPTION WHEN OTHERS THEN ...

END;
$_$;


ALTER FUNCTION "SchLog"."Func_TblLog_TransactionHistory_INSERT"(character varying, bigint, timestamp with time zone, bigint, bigint, bigint, bigint, bigint, bigint, timestamp with time zone, json, bigint, character varying) OWNER TO "SysEngine";

--
-- TOC entry 439 (class 1255 OID 1933566)
-- Name: Func_TblLog_TransactionHistory_UPDATE(bigint, bigint, timestamp with time zone, bigint, bigint, bigint, bigint, bigint, bigint, timestamp with time zone, json, bigint, character varying); Type: FUNCTION; Schema: SchLog; Owner: SysEngine
--

CREATE FUNCTION "SchLog"."Func_TblLog_TransactionHistory_UPDATE"(bigint, bigint, timestamp with time zone, bigint, bigint, bigint, bigint, bigint, bigint, timestamp with time zone, json, bigint, character varying) RETURNS SETOF "SchSystem"."HoldFuncSys_General_FeedBackQuery"
    LANGUAGE plpgsql
    AS $_$
/*----------------------------------------------------------------------------------------------------
▪ Nama                :	"SchLog"."Func_TblLog_TransactionHistory_UPDATE"
▪ Versi               :	1.00.0001
▪ Tanggal
     ► Pemutakhiran   :	2024-10-04
     ► Pembuatan      :	2023-12-01
▪ Input               :	• varID (bigint - Mandatory)
						• varIDSession (bigint - Mandatory)
						• varEditDateTimeTZ (timestamptz - Mandatory)
						• varSysPartitionRemovableRecordKeyRefID (bigint - Mandatory)
						• varBranch_RefID (bigint - Mandatory)
						• varBaseCurrency_RefID (bigint - Mandatory)
						------------------------------
						• varSource_RefPID (bigint - Mandatory)
						• varSource_RefSID (bigint - Mandatory)
						• varSource_RefRPK (bigint - Mandatory)
						• varSource_EntryDateTimeTZ (timestamptz - Mandatory)
						• varContent (json - Mandatory)
						• varSource_RefHeaderID (bigint - Mandatory)
						• varType (varchar - Mandatory)
						------------------------------
▪ Output              :	varRecSetOutput ("SchSystem"."HoldFuncSys_General_FeedBackQuery")
▪ Keterkaitan Fungsi  :	-
▪ Deskripsi           :	• Memutakhirkan data (UPDATE) pada tabel TblLog_TransactionHistory
▪ Copyright           :	Zheta © 2023 - 2024

----[ SQL Example(s) ]------------------------------------------------------------------------------

----------------------------------------------------------------------------------------------------*/

DECLARE
	---[ Input Variable(s) ]------------------------------------------------------------------------
		---{ Mandatory }------------------
			varSysDataAnnotation									ALIAS FOR $1;
			varIDSession											ALIAS FOR $2;
			varEntryDateTimeTZ										ALIAS FOR $3;
			varSysPartitionRemovableRecordKeyRefID					ALIAS FOR $4;
			varBranch_RefID											ALIAS FOR $5;
			varBaseCurrency_RefID									ALIAS FOR $6;
			------------------------------
			varSource_RefPID										ALIAS FOR $7;
			varSource_RefSID										ALIAS FOR $8;
			varSource_RefRPK										ALIAS FOR $9;
			varSource_EntryDateTimeTZ								ALIAS FOR $10;
			varContent												ALIAS FOR $11;
			varSource_RefHeaderID									ALIAS FOR $12;
			varType													ALIAS FOR $13;

		---{ Optional }-------------------

		---{ Additional }-----------------

	---[ Output Variable(s) ]-----------------------------------------------------------------------
			varRecSetOutput											"SchSystem"."HoldFuncSys_General_FeedBackQuery"%rowtype;

	---[ Intermediate Variable(s) ]-----------------------------------------------------------------
		---{ Default }--------------------
			varSystemNoticeTag										varchar;
			varSignEligibleToProcess								boolean;

		---{ Additional }-----------------

BEGIN
	---[ Data Initializing ]------------------------------------------------------------------------
		--varSystemNoticeTag := "SchSysAsset"."Func_GetSystemNoticeTag"();
		varSignEligibleToProcess := FALSE;

		IF (varSignEligibleToProcess IS FALSE) THEN
			varSignEligibleToProcess := TRUE;
		END IF;

		IF (varSignEligibleToProcess IS TRUE) THEN
		END IF;

	---[ Data Processing ]--------------------------------------------------------------------------
		IF (varSignEligibleToProcess IS TRUE) THEN
			UPDATE
				"SchLog"."TblLog_TransactionHistory"
			SET
				"Sys_Data_Edit_LoginSession_RefID" = varIDSession,
				"Sys_Data_Edit_DateTimeTZ" = varEditDateTimeTZ,
				"Sys_Partition_RemovableRecord_Key_RefID" = varSysPartitionRemovableRecordKeyRefID,
				"Sys_Branch_RefID" = varBranch_RefID,
				"Sys_BaseCurrency_RefID" = varBaseCurrency_RefID,
				------------------------------
				"Source_RefPID" = varSource_RefPID,
				"Source_RefSID" = varSource_RefSID,
				"Source_RefRPK" = varSource_RefRPK,
				"Source_EntryDateTimeTZ" = varSource_EntryDateTimeTZ,
				"Content" = varContent,
				"Source_RefHeaderID" = varSource_RefHeaderID,
				"Type" = varType
			WHERE
				"Sys_PID" = varID
				OR
				"Sys_SID" = varID;
		END IF;

	---[ Data Return ]-----------------------------------------------------------------------------
		IF (varSignEligibleToProcess IS TRUE) THEN
			varRecSetOutput."SignSuccess" := 1;
			varRecSetOutput."SignRecordType" := 'Sys_RPK';
			varRecSetOutput."SignRecordID" := (SELECT "Sys_RPK" FROM "SchLog"."TblLog_TransactionHistory" WHERE "Sys_PID" = varID OR "Sys_SID" = varID LIMIT 1);
			varRecSetOutput."SignMessage" := null;

			RETURN NEXT varRecSetOutput;
		END IF;

	---[ Exception Handling ]-----------------------------------------------------------------------
		--EXCEPTION WHEN OTHERS THEN ...

END;
$_$;


ALTER FUNCTION "SchLog"."Func_TblLog_TransactionHistory_UPDATE"(bigint, bigint, timestamp with time zone, bigint, bigint, bigint, bigint, bigint, bigint, timestamp with time zone, json, bigint, character varying) OWNER TO "SysEngine";

--
-- TOC entry 446 (class 1255 OID 1933567)
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
-- TOC entry 422 (class 1255 OID 1933568)
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
-- TOC entry 365 (class 1255 OID 1933569)
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
    IF (varSequenceNumber = 0) THEN 
        varSequenceNumber := 1; 
    END IF;

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
		--RAISE NOTICE '%', varSQL;
		EXECUTE varSQL INTO varSequenceName;
	END IF;

   ---> Set Sequence
	varSQL :='
		ALTER SEQUENCE 
			"' || varSchemaName || '"."' || varSequenceName || '"
		RESTART WITH ' || varSequenceNumber;
--		RESTART WITH ' || (CASE WHEN (varSequenceNumber = 0) THEN 1 ELSE varSequenceNumber END);
	EXECUTE varSQL;
END;
$_$;


ALTER FUNCTION "SchSystem"."FuncSys_General_SetSequence"(character varying, character varying, bigint) OWNER TO "SysEngine";

--
-- TOC entry 403 (class 1255 OID 1933570)
-- Name: FuncSys_General_StrSQLBuilder_FilterAndSort(json, json); Type: FUNCTION; Schema: SchSystem; Owner: SysAdmin
--

CREATE FUNCTION "SchSystem"."FuncSys_General_StrSQLBuilder_FilterAndSort"(json, json) RETURNS json
    LANGUAGE plpgsql
    AS $_$/*----------------------------------------------------------------------------------------------------
▪ Nama                :	"SchSystem"."FuncSys_General_StrSQLBuilder_FilterAndSort"
▪ Versi               :	1.00.0002
▪ Tanggal
     ► Pemutakhiran   :	2026-02-25
     ► Pembuatan      :	2025-10-22
▪ Input               :	• varSQL (varchar - Mandatory)
						------------------------------
						------------------------------
						------------------------------
▪ Output              :	varReturn (record)
▪ Keterkaitan Fungsi  : -
▪ Deskripsi           :	• Mendapatkan String SQL untuk Filtering dan Sorting.
▪ Copyright           :	Zheta © 2025 - 2026

----[ SQL Example(s) ]------------------------------------------------------------------------------

▪ --->
	SELECT 
		"SchSystem"."FuncSys_General_StrSQLBuilder_FilterAndSort"(
			JSON_BUILD_ARRAY (
				JSON_BUILD_ARRAY ('Name', 'varchar', 'ILIKE', 'Wisnu')
				--JSON_BUILD_ARRAY ('Name', 'varchar', '=', 'Wisnu')
				--JSON_BUILD_ARRAY ('OrderSequence', 'bigint', '=', '1')
				--JSON_BUILD_ARRAY ('OrderSequence', 'bigint', 'IS', 'NULL')
				--JSON_BUILD_ARRAY ('FetchDateTimeTZ', 'timestamptz', '=', '2025-01-01')
				),
			JSON_BUILD_ARRAY (
				JSON_BUILD_ARRAY ('Name', 'ASC')
				)
			);

----------------------------------------------------------------------------------------------------*/

DECLARE
	----[ ⦿ ]--[ Input Variable(s) ]-------------------------------------------------------[ ⦿ ]----
		---{ Mandatory }------------------
			varJSONFilter	ALIAS FOR $1;
			varJSONSort		ALIAS FOR $2;
			------------------------------

		---{ Optional }-------------------

		---{ Additional }-----------------

	----[ ⦿ ]--[ Output Variable(s) ]-----------------------------------------------------[ ⦿ ]----
			varReturn												json;

	----[ ⦿ ]--[ Intermediate Variable(s) ]-----------------------------------------------[ ⦿ ]----
		---{ Default }--------------------
			varSystemNoticeTag										varchar;
			varSignEligibleToProcess								boolean;

			varStrFilter											varchar;
			varStrSort												varchar;

		---{ Additional }-----------------

BEGIN
	----[ ⦿ ]--[ Data Initializing ]------------------------------------------------------[ ⦿ ]----
		--varSystemNoticeTag := "SchSysAsset"."Func_GetSystemNoticeTag"();
		varSignEligibleToProcess := FALSE;

		-----[ ELIGIBLE PROCESS DETERMINATION ]---------------------------------------( START )-----
			IF (varSignEligibleToProcess IS FALSE) THEN
				varSignEligibleToProcess := TRUE;
			END IF;
		-----[ ELIGIBLE PROCESS DETERMINATION ]---------------------------------------(  END  )-----

		-----[ VARIABLES INITIALIZATION FOR ELIGIBLE PROCESS ]------------------------( START )-----
			IF (varSignEligibleToProcess IS TRUE) THEN
			END IF;
		-----[ VARIABLES INITIALIZATION FOR ELIGIBLE PROCESS ]------------------------(  END  )-----

	----[ ⦿ ]--[ Data Processing ]--------------------------------------------------------[ ⦿ ]----
		IF (varSignEligibleToProcess IS TRUE) THEN
			-----[ MAIN DATA PROCESSING ]---------------------------------------------( START )-----
				---> Initializing : varStrFilter
					IF ((varJSONFilter::json IS NOT NULL) AND (varJSONFilter::varchar != '[]')) THEN
						IF (JSON_ARRAY_LENGTH (varJSONFilter::json) > 0) THEN
							varStrFilter :=
								(
								SELECT
									(
									'WHERE ' ||
									STRING_AGG (
											(
												(
												'"' ||
												("SubSQL"."JSONData"->>0)::varchar ||
												'"' ||
												(
												CASE
													WHEN (("SubSQL"."JSONData"->>2)::varchar ILIKE '%LIKE') THEN
														'::varchar '
													ELSE
														('::' || ("SubSQL"."JSONData"->>1)::varchar || ' ')
												END
												)
											)
											||
											(
												("SubSQL"."JSONData"->>2)::varchar ||
												' '
											) 
											||											
											(
											CASE
												WHEN (("SubSQL"."JSONData"->>2)::varchar ILIKE '%LIKE') THEN
													'''%'
												WHEN (("SubSQL"."JSONData"->>2)::varchar ILIKE '@>') THEN
													''''
												WHEN (
													(("SubSQL"."JSONData"->>1)::varchar ILIKE '%CHAR%') OR
													(("SubSQL"."JSONData"->>1)::varchar ILIKE '%TIMESTAMP%') OR
													(("SubSQL"."JSONData"->>1)::varchar ILIKE '%DATE%')
													) THEN
													''''
												ELSE
													''
											END
											) 
											||
																					
											("SubSQL"."JSONData"->>3)::varchar ||
											
											(
											CASE
												WHEN (("SubSQL"."JSONData"->>2)::varchar ILIKE '%LIKE') THEN
													'%''::varchar'
												WHEN (("SubSQL"."JSONData"->>2)::varchar ILIKE '@>') THEN
													'''::' || ("SubSQL"."JSONData"->>1)::varchar
												WHEN (
													(("SubSQL"."JSONData"->>1)::varchar ILIKE '%CHAR%') OR
													(("SubSQL"."JSONData"->>1)::varchar ILIKE '%TIMESTAMP%') OR
													(("SubSQL"."JSONData"->>1)::varchar ILIKE '%DATE%')
													) THEN
													'''::' || ("SubSQL"."JSONData"->>1)::varchar
												ELSE
													''
											END
											)
										),
										' AND '
										) OVER ()
									)
								FROM
									(
									SELECT
										JSON_ARRAY_ELEMENTS (
											varJSONFilter::json
											) AS "JSONData"
									) AS "SubSQL"
								LIMIT 1
								);
						END IF;
						--RAISE NOTICE 'varStrFilter : %', varStrFilter;
					END IF;

				---> Initializing : varStrSort
					IF ((varJSONSort::json IS NOT NULL) AND (varJSONSort::varchar != '[]')) THEN
						IF (JSON_ARRAY_LENGTH (varJSONSort::json) > 0) THEN
							varStrSort :=
								(
								SELECT
									(
									'ORDER BY ' ||
									STRING_AGG (
										(
										'"' ||
										("SubSQL"."JSONData"->>0)::varchar ||
										'" ' ||
										("SubSQL"."JSONData"->>1)::varchar
										),
										', '
										) OVER ()
									)
								FROM
									(
									SELECT
										JSON_ARRAY_ELEMENTS (
											varJSONSort::json
											) AS "JSONData"
									) AS "SubSQL"
								LIMIT 1
								);
						END IF;
						--RAISE NOTICE 'varStrSort : %', varStrSort;
					END IF;

				---> Initializing : varReturn
					varReturn :=
						JSON_BUILD_OBJECT (
							'filterString', varStrFilter,
							'sortString', varStrSort
							);

			-----[ MAIN DATA PROCESSING ]---------------------------------------------(  END  )-----
		END IF;

	----[ ⦿ ]--[ Data Return ]------------------------------------------------------------[ ⦿ ]----
		IF (varSignEligibleToProcess IS TRUE) THEN
			---> Send Data Output
				RETURN
					varReturn;
		END IF;

	----[ ⦿ ]--[ Exception Handling ]-----------------------------------------------------[ ⦿ ]----
		EXCEPTION
			WHEN OTHERS THEN
				NULL;

END;$_$;


ALTER FUNCTION "SchSystem"."FuncSys_General_StrSQLBuilder_FilterAndSort"(json, json) OWNER TO "SysAdmin";

--
-- TOC entry 421 (class 1255 OID 1933573)
-- Name: FuncSys_General_StrSQLExecution(character varying); Type: FUNCTION; Schema: SchSystem; Owner: SysAdmin
--

CREATE FUNCTION "SchSystem"."FuncSys_General_StrSQLExecution"(character varying) RETURNS SETOF record
    LANGUAGE plpgsql
    AS $_$
/*----------------------------------------------------------------------------------------------------
▪ Nama                :	"SchSystem"."FuncSys_General_StrSQLExecution"
▪ Versi               :	1.00.0000
▪ Tanggal
     ► Pemutakhiran   :	2025-08-12
     ► Pembuatan      :	2025-08-12
▪ Input               :	• varSQL (varchar - Mandatory)
						------------------------------
						------------------------------
						------------------------------
▪ Output              :	varReturn (record)
▪ Keterkaitan Fungsi  : -
▪ Deskripsi           :	• Mendapatkan hasil ekseskusi dari String SQL (varSQL) dalam bentuk record.
▪ Copyright           :	Zheta © 2025

----[ SQL Example(s) ]------------------------------------------------------------------------------

▪ --->
	SELECT
		*
	FROM
		"SchSystem"."FuncSys_General_StrSQLExecution"(
			'
			SELECT
				1::smallint AS "Tag",
				''a''::varchar AS "Character" 
			UNION ALL
			SELECT
				2::smallint AS "Tag",
				''abc''::varchar AS "Character" 
			'::varchar
			) AS "SubSQL"(xxx smallint, yyy varchar);

----------------------------------------------------------------------------------------------------*/

DECLARE
	----[ ⦿ ]--[ Input Variable(s) ]-------------------------------------------------------[ ⦿ ]----
		---{ Mandatory }------------------
			varSQL													ALIAS FOR $1;
			------------------------------

		---{ Optional }-------------------

		---{ Additional }-----------------

	----[ ⦿ ]--[ Output Variable(s) ]-----------------------------------------------------[ ⦿ ]----
			varReturn												record;

	----[ ⦿ ]--[ Intermediate Variable(s) ]-----------------------------------------------[ ⦿ ]----
		---{ Default }--------------------
			varSystemNoticeTag										varchar;
			varSignEligibleToProcess								boolean;

			varRecSet												record;	
		---{ Additional }-----------------

BEGIN
	----[ ⦿ ]--[ Data Initializing ]------------------------------------------------------[ ⦿ ]----
		--varSystemNoticeTag := "SchSysAsset"."Func_GetSystemNoticeTag"();
		varSignEligibleToProcess := FALSE;

		-----[ ELIGIBLE PROCESS DETERMINATION ]---------------------------------------( START )-----
			IF (varSignEligibleToProcess IS FALSE) THEN
				varSignEligibleToProcess := TRUE;
			END IF;
		-----[ ELIGIBLE PROCESS DETERMINATION ]---------------------------------------(  END  )-----

		-----[ VARIABLES INITIALIZATION FOR ELIGIBLE PROCESS ]------------------------( START )-----
			IF (varSignEligibleToProcess IS TRUE) THEN
			END IF;
		-----[ VARIABLES INITIALIZATION FOR ELIGIBLE PROCESS ]------------------------(  END  )-----

	----[ ⦿ ]--[ Data Processing ]--------------------------------------------------------[ ⦿ ]----
		IF (varSignEligibleToProcess IS TRUE) THEN
			-----[ MAIN DATA PROCESSING ]---------------------------------------------( START )-----
			-----[ MAIN DATA PROCESSING ]---------------------------------------------(  END  )-----
		END IF;

	----[ ⦿ ]--[ Data Return ]------------------------------------------------------------[ ⦿ ]----
		IF (varSignEligibleToProcess IS TRUE) THEN
			---> Send Data Output
				FOR varRecSet IN EXECUTE varSQL
					LOOP
						varReturn := varRecSet;
						RETURN NEXT varReturn;
					END LOOP;
		END IF;

	----[ ⦿ ]--[ Exception Handling ]-----------------------------------------------------[ ⦿ ]----
		EXCEPTION
			WHEN OTHERS THEN
				NULL;

END;
$_$;


ALTER FUNCTION "SchSystem"."FuncSys_General_StrSQLExecution"(character varying) OWNER TO "SysAdmin";

--
-- TOC entry 231 (class 1259 OID 1933574)
-- Name: TblLog_Device_PersonAccess_Sys_RPK_seq; Type: SEQUENCE; Schema: SchAcquisition; Owner: SysEngine
--

CREATE SEQUENCE "SchAcquisition"."TblLog_Device_PersonAccess_Sys_RPK_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE "SchAcquisition"."TblLog_Device_PersonAccess_Sys_RPK_seq" OWNER TO "SysEngine";

SET default_tablespace = '';

--
-- TOC entry 232 (class 1259 OID 1933575)
-- Name: TblLog_Device_PersonAccess; Type: TABLE; Schema: SchAcquisition; Owner: SysEngine
--

CREATE TABLE "SchAcquisition"."TblLog_Device_PersonAccess" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchAcquisition"."TblLog_Device_PersonAccess_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "Log_Device_PersonAccessFetch_RefID" bigint,
    "AttendanceDateTimeTZ" timestamp with time zone,
    "PersonID" bigint,
    "PersonUserName" character varying(256)
)
PARTITION BY LIST ("Sys_Partition_RemovableRecord_Key_RefID");


ALTER TABLE "SchAcquisition"."TblLog_Device_PersonAccess" OWNER TO "SysEngine";

--
-- TOC entry 233 (class 1259 OID 1933580)
-- Name: TblLog_Device_PersonAccessFetch_Sys_RPK_seq; Type: SEQUENCE; Schema: SchAcquisition; Owner: SysEngine
--

CREATE SEQUENCE "SchAcquisition"."TblLog_Device_PersonAccessFetch_Sys_RPK_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE "SchAcquisition"."TblLog_Device_PersonAccessFetch_Sys_RPK_seq" OWNER TO "SysEngine";

--
-- TOC entry 234 (class 1259 OID 1933581)
-- Name: TblLog_Device_PersonAccessFetch; Type: TABLE; Schema: SchAcquisition; Owner: SysEngine
--

CREATE TABLE "SchAcquisition"."TblLog_Device_PersonAccessFetch" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchAcquisition"."TblLog_Device_PersonAccessFetch_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "GoodsIdentity_RefID" bigint,
    "FetchDateTimeTZ" timestamp with time zone
)
PARTITION BY LIST ("Sys_Partition_RemovableRecord_Key_RefID");


ALTER TABLE "SchAcquisition"."TblLog_Device_PersonAccessFetch" OWNER TO "SysEngine";

SET default_table_access_method = heap;

--
-- TOC entry 235 (class 1259 OID 1933586)
-- Name: TblLog_Device_PersonAccessFetch_DEF; Type: TABLE; Schema: SchAcquisition; Owner: SysEngine
--

CREATE TABLE "SchAcquisition"."TblLog_Device_PersonAccessFetch_DEF" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchAcquisition"."TblLog_Device_PersonAccessFetch_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "GoodsIdentity_RefID" bigint,
    "FetchDateTimeTZ" timestamp with time zone
);


ALTER TABLE "SchAcquisition"."TblLog_Device_PersonAccessFetch_DEF" OWNER TO "SysEngine";

--
-- TOC entry 236 (class 1259 OID 1933593)
-- Name: TblLog_Device_PersonAccessFetch_PMT; Type: TABLE; Schema: SchAcquisition; Owner: SysEngine
--

CREATE TABLE "SchAcquisition"."TblLog_Device_PersonAccessFetch_PMT" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchAcquisition"."TblLog_Device_PersonAccessFetch_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "GoodsIdentity_RefID" bigint,
    "FetchDateTimeTZ" timestamp with time zone
);


ALTER TABLE "SchAcquisition"."TblLog_Device_PersonAccessFetch_PMT" OWNER TO "SysEngine";

--
-- TOC entry 237 (class 1259 OID 1933600)
-- Name: TblLog_Device_PersonAccessFetch_RMV; Type: TABLE; Schema: SchAcquisition; Owner: SysEngine
--

CREATE TABLE "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchAcquisition"."TblLog_Device_PersonAccessFetch_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "GoodsIdentity_RefID" bigint,
    "FetchDateTimeTZ" timestamp with time zone
)
PARTITION BY LIST ("Sys_Partition_RemovableRecord_Key_RefID");


ALTER TABLE "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV" OWNER TO "SysEngine";

--
-- TOC entry 238 (class 1259 OID 1933605)
-- Name: TblLog_Device_PersonAccessFetch_RMV_8000000000001; Type: TABLE; Schema: SchAcquisition; Owner: SysEngine
--

CREATE TABLE "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000001" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchAcquisition"."TblLog_Device_PersonAccessFetch_Sys_RPK_seq"'::regclass) CONSTRAINT "TblLog_Device_PersonAccessFetch_RMV_8000000000_Sys_RPK_not_null" NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "GoodsIdentity_RefID" bigint,
    "FetchDateTimeTZ" timestamp with time zone
);


ALTER TABLE "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000001" OWNER TO "SysEngine";

--
-- TOC entry 239 (class 1259 OID 1933612)
-- Name: TblLog_Device_PersonAccessFetch_RMV_8000000000002; Type: TABLE; Schema: SchAcquisition; Owner: SysEngine
--

CREATE TABLE "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000002" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchAcquisition"."TblLog_Device_PersonAccessFetch_Sys_RPK_seq"'::regclass) CONSTRAINT "TblLog_Device_PersonAccessFetch_RMV_800000000_Sys_RPK_not_null1" NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "GoodsIdentity_RefID" bigint,
    "FetchDateTimeTZ" timestamp with time zone
);


ALTER TABLE "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000002" OWNER TO "SysEngine";

--
-- TOC entry 240 (class 1259 OID 1933619)
-- Name: TblLog_Device_PersonAccessFetch_RMV_8000000000003; Type: TABLE; Schema: SchAcquisition; Owner: SysEngine
--

CREATE TABLE "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000003" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchAcquisition"."TblLog_Device_PersonAccessFetch_Sys_RPK_seq"'::regclass) CONSTRAINT "TblLog_Device_PersonAccessFetch_RMV_800000000_Sys_RPK_not_null2" NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "GoodsIdentity_RefID" bigint,
    "FetchDateTimeTZ" timestamp with time zone
);


ALTER TABLE "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000003" OWNER TO "SysEngine";

--
-- TOC entry 241 (class 1259 OID 1933626)
-- Name: TblLog_Device_PersonAccessFetch_RMV_8000000000004; Type: TABLE; Schema: SchAcquisition; Owner: SysEngine
--

CREATE TABLE "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000004" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchAcquisition"."TblLog_Device_PersonAccessFetch_Sys_RPK_seq"'::regclass) CONSTRAINT "TblLog_Device_PersonAccessFetch_RMV_800000000_Sys_RPK_not_null3" NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "GoodsIdentity_RefID" bigint,
    "FetchDateTimeTZ" timestamp with time zone
);


ALTER TABLE "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000004" OWNER TO "SysEngine";

--
-- TOC entry 242 (class 1259 OID 1933633)
-- Name: TblLog_Device_PersonAccessFetch_RMV_8000000000005; Type: TABLE; Schema: SchAcquisition; Owner: SysEngine
--

CREATE TABLE "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000005" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchAcquisition"."TblLog_Device_PersonAccessFetch_Sys_RPK_seq"'::regclass) CONSTRAINT "TblLog_Device_PersonAccessFetch_RMV_800000000_Sys_RPK_not_null4" NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "GoodsIdentity_RefID" bigint,
    "FetchDateTimeTZ" timestamp with time zone
);


ALTER TABLE "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000005" OWNER TO "SysEngine";

--
-- TOC entry 243 (class 1259 OID 1933640)
-- Name: TblLog_Device_PersonAccessFetch_RMV_8000000000006; Type: TABLE; Schema: SchAcquisition; Owner: SysEngine
--

CREATE TABLE "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000006" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchAcquisition"."TblLog_Device_PersonAccessFetch_Sys_RPK_seq"'::regclass) CONSTRAINT "TblLog_Device_PersonAccessFetch_RMV_800000000_Sys_RPK_not_null5" NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "GoodsIdentity_RefID" bigint,
    "FetchDateTimeTZ" timestamp with time zone
);


ALTER TABLE "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000006" OWNER TO "SysEngine";

--
-- TOC entry 244 (class 1259 OID 1933647)
-- Name: TblLog_Device_PersonAccessFetch_RMV_8000000000007; Type: TABLE; Schema: SchAcquisition; Owner: SysEngine
--

CREATE TABLE "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000007" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchAcquisition"."TblLog_Device_PersonAccessFetch_Sys_RPK_seq"'::regclass) CONSTRAINT "TblLog_Device_PersonAccessFetch_RMV_800000000_Sys_RPK_not_null6" NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "GoodsIdentity_RefID" bigint,
    "FetchDateTimeTZ" timestamp with time zone
);


ALTER TABLE "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000007" OWNER TO "SysEngine";

--
-- TOC entry 245 (class 1259 OID 1933654)
-- Name: TblLog_Device_PersonAccessFetch_RMV_8000000000008; Type: TABLE; Schema: SchAcquisition; Owner: SysEngine
--

CREATE TABLE "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000008" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchAcquisition"."TblLog_Device_PersonAccessFetch_Sys_RPK_seq"'::regclass) CONSTRAINT "TblLog_Device_PersonAccessFetch_RMV_800000000_Sys_RPK_not_null7" NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "GoodsIdentity_RefID" bigint,
    "FetchDateTimeTZ" timestamp with time zone
);


ALTER TABLE "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000008" OWNER TO "SysEngine";

--
-- TOC entry 246 (class 1259 OID 1933661)
-- Name: TblLog_Device_PersonAccessFetch_RMV_8000000000009; Type: TABLE; Schema: SchAcquisition; Owner: SysEngine
--

CREATE TABLE "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000009" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchAcquisition"."TblLog_Device_PersonAccessFetch_Sys_RPK_seq"'::regclass) CONSTRAINT "TblLog_Device_PersonAccessFetch_RMV_800000000_Sys_RPK_not_null8" NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "GoodsIdentity_RefID" bigint,
    "FetchDateTimeTZ" timestamp with time zone
);


ALTER TABLE "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000009" OWNER TO "SysEngine";

--
-- TOC entry 247 (class 1259 OID 1933668)
-- Name: TblLog_Device_PersonAccessFetch_RMV_8000000000010; Type: TABLE; Schema: SchAcquisition; Owner: SysEngine
--

CREATE TABLE "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000010" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchAcquisition"."TblLog_Device_PersonAccessFetch_Sys_RPK_seq"'::regclass) CONSTRAINT "TblLog_Device_PersonAccessFetch_RMV_800000000_Sys_RPK_not_null9" NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "GoodsIdentity_RefID" bigint,
    "FetchDateTimeTZ" timestamp with time zone
);


ALTER TABLE "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000010" OWNER TO "SysEngine";

--
-- TOC entry 248 (class 1259 OID 1933675)
-- Name: TblLog_Device_PersonAccessFetch_RMV_8000000000011; Type: TABLE; Schema: SchAcquisition; Owner: SysEngine
--

CREATE TABLE "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000011" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchAcquisition"."TblLog_Device_PersonAccessFetch_Sys_RPK_seq"'::regclass) CONSTRAINT "TblLog_Device_PersonAccessFetch_RMV_80000000_Sys_RPK_not_null10" NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "GoodsIdentity_RefID" bigint,
    "FetchDateTimeTZ" timestamp with time zone
);


ALTER TABLE "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000011" OWNER TO "SysEngine";

--
-- TOC entry 249 (class 1259 OID 1933682)
-- Name: TblLog_Device_PersonAccessFetch_RMV_8000000000012; Type: TABLE; Schema: SchAcquisition; Owner: SysEngine
--

CREATE TABLE "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000012" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchAcquisition"."TblLog_Device_PersonAccessFetch_Sys_RPK_seq"'::regclass) CONSTRAINT "TblLog_Device_PersonAccessFetch_RMV_80000000_Sys_RPK_not_null11" NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "GoodsIdentity_RefID" bigint,
    "FetchDateTimeTZ" timestamp with time zone
);


ALTER TABLE "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000012" OWNER TO "SysEngine";

--
-- TOC entry 250 (class 1259 OID 1933689)
-- Name: TblLog_Device_PersonAccessFetch_RMV_8000000000013; Type: TABLE; Schema: SchAcquisition; Owner: SysEngine
--

CREATE TABLE "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000013" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchAcquisition"."TblLog_Device_PersonAccessFetch_Sys_RPK_seq"'::regclass) CONSTRAINT "TblLog_Device_PersonAccessFetch_RMV_80000000_Sys_RPK_not_null12" NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "GoodsIdentity_RefID" bigint,
    "FetchDateTimeTZ" timestamp with time zone
);


ALTER TABLE "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000013" OWNER TO "SysEngine";

--
-- TOC entry 251 (class 1259 OID 1933696)
-- Name: TblLog_Device_PersonAccessFetch_RMV_8000000000014; Type: TABLE; Schema: SchAcquisition; Owner: SysEngine
--

CREATE TABLE "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000014" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchAcquisition"."TblLog_Device_PersonAccessFetch_Sys_RPK_seq"'::regclass) CONSTRAINT "TblLog_Device_PersonAccessFetch_RMV_80000000_Sys_RPK_not_null13" NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "GoodsIdentity_RefID" bigint,
    "FetchDateTimeTZ" timestamp with time zone
);


ALTER TABLE "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000014" OWNER TO "SysEngine";

--
-- TOC entry 252 (class 1259 OID 1933703)
-- Name: TblLog_Device_PersonAccessFetch_RMV_8000000000015; Type: TABLE; Schema: SchAcquisition; Owner: SysEngine
--

CREATE TABLE "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000015" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchAcquisition"."TblLog_Device_PersonAccessFetch_Sys_RPK_seq"'::regclass) CONSTRAINT "TblLog_Device_PersonAccessFetch_RMV_80000000_Sys_RPK_not_null14" NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "GoodsIdentity_RefID" bigint,
    "FetchDateTimeTZ" timestamp with time zone
);


ALTER TABLE "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000015" OWNER TO "SysEngine";

--
-- TOC entry 253 (class 1259 OID 1933710)
-- Name: TblLog_Device_PersonAccessFetch_RMV_8000000000016; Type: TABLE; Schema: SchAcquisition; Owner: SysEngine
--

CREATE TABLE "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000016" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchAcquisition"."TblLog_Device_PersonAccessFetch_Sys_RPK_seq"'::regclass) CONSTRAINT "TblLog_Device_PersonAccessFetch_RMV_80000000_Sys_RPK_not_null15" NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "GoodsIdentity_RefID" bigint,
    "FetchDateTimeTZ" timestamp with time zone
);


ALTER TABLE "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000016" OWNER TO "SysEngine";

--
-- TOC entry 254 (class 1259 OID 1933717)
-- Name: TblLog_Device_PersonAccessFetch_RMV_8000000000017; Type: TABLE; Schema: SchAcquisition; Owner: SysEngine
--

CREATE TABLE "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000017" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchAcquisition"."TblLog_Device_PersonAccessFetch_Sys_RPK_seq"'::regclass) CONSTRAINT "TblLog_Device_PersonAccessFetch_RMV_80000000_Sys_RPK_not_null16" NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "GoodsIdentity_RefID" bigint,
    "FetchDateTimeTZ" timestamp with time zone
);


ALTER TABLE "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000017" OWNER TO "SysEngine";

--
-- TOC entry 255 (class 1259 OID 1933724)
-- Name: TblLog_Device_PersonAccessFetch_RMV_8000000000018; Type: TABLE; Schema: SchAcquisition; Owner: SysEngine
--

CREATE TABLE "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000018" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchAcquisition"."TblLog_Device_PersonAccessFetch_Sys_RPK_seq"'::regclass) CONSTRAINT "TblLog_Device_PersonAccessFetch_RMV_80000000_Sys_RPK_not_null17" NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "GoodsIdentity_RefID" bigint,
    "FetchDateTimeTZ" timestamp with time zone
);


ALTER TABLE "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000018" OWNER TO "SysEngine";

--
-- TOC entry 256 (class 1259 OID 1933731)
-- Name: TblLog_Device_PersonAccessFetch_RMV_8000000000019; Type: TABLE; Schema: SchAcquisition; Owner: SysEngine
--

CREATE TABLE "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000019" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchAcquisition"."TblLog_Device_PersonAccessFetch_Sys_RPK_seq"'::regclass) CONSTRAINT "TblLog_Device_PersonAccessFetch_RMV_80000000_Sys_RPK_not_null18" NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "GoodsIdentity_RefID" bigint,
    "FetchDateTimeTZ" timestamp with time zone
);


ALTER TABLE "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000019" OWNER TO "SysEngine";

--
-- TOC entry 257 (class 1259 OID 1933738)
-- Name: TblLog_Device_PersonAccessFetch_RMV_8000000000020; Type: TABLE; Schema: SchAcquisition; Owner: SysEngine
--

CREATE TABLE "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000020" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchAcquisition"."TblLog_Device_PersonAccessFetch_Sys_RPK_seq"'::regclass) CONSTRAINT "TblLog_Device_PersonAccessFetch_RMV_80000000_Sys_RPK_not_null19" NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "GoodsIdentity_RefID" bigint,
    "FetchDateTimeTZ" timestamp with time zone
);


ALTER TABLE "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000020" OWNER TO "SysEngine";

--
-- TOC entry 258 (class 1259 OID 1933745)
-- Name: TblLog_Device_PersonAccessFetch_RMV_8000000000021; Type: TABLE; Schema: SchAcquisition; Owner: SysEngine
--

CREATE TABLE "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000021" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchAcquisition"."TblLog_Device_PersonAccessFetch_Sys_RPK_seq"'::regclass) CONSTRAINT "TblLog_Device_PersonAccessFetch_RMV_80000000_Sys_RPK_not_null20" NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "GoodsIdentity_RefID" bigint,
    "FetchDateTimeTZ" timestamp with time zone
);


ALTER TABLE "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000021" OWNER TO "SysEngine";

--
-- TOC entry 259 (class 1259 OID 1933752)
-- Name: TblLog_Device_PersonAccessFetch_RMV_8000000000022; Type: TABLE; Schema: SchAcquisition; Owner: SysEngine
--

CREATE TABLE "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000022" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchAcquisition"."TblLog_Device_PersonAccessFetch_Sys_RPK_seq"'::regclass) CONSTRAINT "TblLog_Device_PersonAccessFetch_RMV_80000000_Sys_RPK_not_null21" NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "GoodsIdentity_RefID" bigint,
    "FetchDateTimeTZ" timestamp with time zone
);


ALTER TABLE "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000022" OWNER TO "SysEngine";

--
-- TOC entry 260 (class 1259 OID 1933759)
-- Name: TblLog_Device_PersonAccessFetch_RMV_8000000000023; Type: TABLE; Schema: SchAcquisition; Owner: SysEngine
--

CREATE TABLE "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000023" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchAcquisition"."TblLog_Device_PersonAccessFetch_Sys_RPK_seq"'::regclass) CONSTRAINT "TblLog_Device_PersonAccessFetch_RMV_80000000_Sys_RPK_not_null22" NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "GoodsIdentity_RefID" bigint,
    "FetchDateTimeTZ" timestamp with time zone
);


ALTER TABLE "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000023" OWNER TO "SysEngine";

--
-- TOC entry 261 (class 1259 OID 1933766)
-- Name: TblLog_Device_PersonAccessFetch_RMV_8000000000024; Type: TABLE; Schema: SchAcquisition; Owner: SysEngine
--

CREATE TABLE "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000024" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchAcquisition"."TblLog_Device_PersonAccessFetch_Sys_RPK_seq"'::regclass) CONSTRAINT "TblLog_Device_PersonAccessFetch_RMV_80000000_Sys_RPK_not_null23" NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "GoodsIdentity_RefID" bigint,
    "FetchDateTimeTZ" timestamp with time zone
);


ALTER TABLE "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000024" OWNER TO "SysEngine";

--
-- TOC entry 262 (class 1259 OID 1933773)
-- Name: TblLog_Device_PersonAccessFetch_RMV_8000000000025; Type: TABLE; Schema: SchAcquisition; Owner: SysEngine
--

CREATE TABLE "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000025" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchAcquisition"."TblLog_Device_PersonAccessFetch_Sys_RPK_seq"'::regclass) CONSTRAINT "TblLog_Device_PersonAccessFetch_RMV_80000000_Sys_RPK_not_null24" NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "GoodsIdentity_RefID" bigint,
    "FetchDateTimeTZ" timestamp with time zone
);


ALTER TABLE "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000025" OWNER TO "SysEngine";

--
-- TOC entry 263 (class 1259 OID 1933780)
-- Name: TblLog_Device_PersonAccessFetch_RMV_8000000000026; Type: TABLE; Schema: SchAcquisition; Owner: SysEngine
--

CREATE TABLE "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000026" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchAcquisition"."TblLog_Device_PersonAccessFetch_Sys_RPK_seq"'::regclass) CONSTRAINT "TblLog_Device_PersonAccessFetch_RMV_80000000_Sys_RPK_not_null25" NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "GoodsIdentity_RefID" bigint,
    "FetchDateTimeTZ" timestamp with time zone
);


ALTER TABLE "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000026" OWNER TO "SysEngine";

--
-- TOC entry 264 (class 1259 OID 1933787)
-- Name: TblLog_Device_PersonAccessFetch_RMV_8000000000027; Type: TABLE; Schema: SchAcquisition; Owner: SysEngine
--

CREATE TABLE "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000027" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchAcquisition"."TblLog_Device_PersonAccessFetch_Sys_RPK_seq"'::regclass) CONSTRAINT "TblLog_Device_PersonAccessFetch_RMV_80000000_Sys_RPK_not_null26" NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "GoodsIdentity_RefID" bigint,
    "FetchDateTimeTZ" timestamp with time zone
);


ALTER TABLE "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000027" OWNER TO "SysEngine";

--
-- TOC entry 265 (class 1259 OID 1933794)
-- Name: TblLog_Device_PersonAccessFetch_RMV_8000000000028; Type: TABLE; Schema: SchAcquisition; Owner: SysEngine
--

CREATE TABLE "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000028" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchAcquisition"."TblLog_Device_PersonAccessFetch_Sys_RPK_seq"'::regclass) CONSTRAINT "TblLog_Device_PersonAccessFetch_RMV_80000000_Sys_RPK_not_null27" NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "GoodsIdentity_RefID" bigint,
    "FetchDateTimeTZ" timestamp with time zone
);


ALTER TABLE "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000028" OWNER TO "SysEngine";

--
-- TOC entry 266 (class 1259 OID 1933801)
-- Name: TblLog_Device_PersonAccessFetch_RMV_8000000000029; Type: TABLE; Schema: SchAcquisition; Owner: SysEngine
--

CREATE TABLE "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000029" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchAcquisition"."TblLog_Device_PersonAccessFetch_Sys_RPK_seq"'::regclass) CONSTRAINT "TblLog_Device_PersonAccessFetch_RMV_80000000_Sys_RPK_not_null28" NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "GoodsIdentity_RefID" bigint,
    "FetchDateTimeTZ" timestamp with time zone
);


ALTER TABLE "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000029" OWNER TO "SysEngine";

--
-- TOC entry 267 (class 1259 OID 1933808)
-- Name: TblLog_Device_PersonAccessFetch_RMV_8000000000030; Type: TABLE; Schema: SchAcquisition; Owner: SysEngine
--

CREATE TABLE "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000030" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchAcquisition"."TblLog_Device_PersonAccessFetch_Sys_RPK_seq"'::regclass) CONSTRAINT "TblLog_Device_PersonAccessFetch_RMV_80000000_Sys_RPK_not_null29" NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "GoodsIdentity_RefID" bigint,
    "FetchDateTimeTZ" timestamp with time zone
);


ALTER TABLE "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000030" OWNER TO "SysEngine";

--
-- TOC entry 268 (class 1259 OID 1933815)
-- Name: TblLog_Device_PersonAccessFetch_RMV_8000000000031; Type: TABLE; Schema: SchAcquisition; Owner: SysEngine
--

CREATE TABLE "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000031" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchAcquisition"."TblLog_Device_PersonAccessFetch_Sys_RPK_seq"'::regclass) CONSTRAINT "TblLog_Device_PersonAccessFetch_RMV_80000000_Sys_RPK_not_null30" NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "GoodsIdentity_RefID" bigint,
    "FetchDateTimeTZ" timestamp with time zone
);


ALTER TABLE "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000031" OWNER TO "SysEngine";

--
-- TOC entry 269 (class 1259 OID 1933822)
-- Name: TblLog_Device_PersonAccess_DEF; Type: TABLE; Schema: SchAcquisition; Owner: SysEngine
--

CREATE TABLE "SchAcquisition"."TblLog_Device_PersonAccess_DEF" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchAcquisition"."TblLog_Device_PersonAccess_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "Log_Device_PersonAccessFetch_RefID" bigint,
    "AttendanceDateTimeTZ" timestamp with time zone,
    "PersonID" bigint,
    "PersonUserName" character varying(256)
);


ALTER TABLE "SchAcquisition"."TblLog_Device_PersonAccess_DEF" OWNER TO "SysEngine";

--
-- TOC entry 270 (class 1259 OID 1933829)
-- Name: TblLog_Device_PersonAccess_PMT; Type: TABLE; Schema: SchAcquisition; Owner: SysEngine
--

CREATE TABLE "SchAcquisition"."TblLog_Device_PersonAccess_PMT" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchAcquisition"."TblLog_Device_PersonAccess_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "Log_Device_PersonAccessFetch_RefID" bigint,
    "AttendanceDateTimeTZ" timestamp with time zone,
    "PersonID" bigint,
    "PersonUserName" character varying(256)
);


ALTER TABLE "SchAcquisition"."TblLog_Device_PersonAccess_PMT" OWNER TO "SysEngine";

--
-- TOC entry 271 (class 1259 OID 1933836)
-- Name: TblLog_Device_PersonAccess_RMV; Type: TABLE; Schema: SchAcquisition; Owner: SysEngine
--

CREATE TABLE "SchAcquisition"."TblLog_Device_PersonAccess_RMV" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchAcquisition"."TblLog_Device_PersonAccess_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "Log_Device_PersonAccessFetch_RefID" bigint,
    "AttendanceDateTimeTZ" timestamp with time zone,
    "PersonID" bigint,
    "PersonUserName" character varying(256)
)
PARTITION BY LIST ("Sys_Partition_RemovableRecord_Key_RefID");


ALTER TABLE "SchAcquisition"."TblLog_Device_PersonAccess_RMV" OWNER TO "SysEngine";

--
-- TOC entry 272 (class 1259 OID 1933841)
-- Name: TblLog_Device_PersonAccess_RMV_8000000000001; Type: TABLE; Schema: SchAcquisition; Owner: SysEngine
--

CREATE TABLE "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000001" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchAcquisition"."TblLog_Device_PersonAccess_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "Log_Device_PersonAccessFetch_RefID" bigint,
    "AttendanceDateTimeTZ" timestamp with time zone,
    "PersonID" bigint,
    "PersonUserName" character varying(256)
);


ALTER TABLE "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000001" OWNER TO "SysEngine";

--
-- TOC entry 273 (class 1259 OID 1933848)
-- Name: TblLog_Device_PersonAccess_RMV_8000000000002; Type: TABLE; Schema: SchAcquisition; Owner: SysEngine
--

CREATE TABLE "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000002" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchAcquisition"."TblLog_Device_PersonAccess_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "Log_Device_PersonAccessFetch_RefID" bigint,
    "AttendanceDateTimeTZ" timestamp with time zone,
    "PersonID" bigint,
    "PersonUserName" character varying(256)
);


ALTER TABLE "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000002" OWNER TO "SysEngine";

--
-- TOC entry 274 (class 1259 OID 1933855)
-- Name: TblLog_Device_PersonAccess_RMV_8000000000003; Type: TABLE; Schema: SchAcquisition; Owner: SysEngine
--

CREATE TABLE "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000003" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchAcquisition"."TblLog_Device_PersonAccess_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "Log_Device_PersonAccessFetch_RefID" bigint,
    "AttendanceDateTimeTZ" timestamp with time zone,
    "PersonID" bigint,
    "PersonUserName" character varying(256)
);


ALTER TABLE "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000003" OWNER TO "SysEngine";

--
-- TOC entry 275 (class 1259 OID 1933862)
-- Name: TblLog_Device_PersonAccess_RMV_8000000000004; Type: TABLE; Schema: SchAcquisition; Owner: SysEngine
--

CREATE TABLE "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000004" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchAcquisition"."TblLog_Device_PersonAccess_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "Log_Device_PersonAccessFetch_RefID" bigint,
    "AttendanceDateTimeTZ" timestamp with time zone,
    "PersonID" bigint,
    "PersonUserName" character varying(256)
);


ALTER TABLE "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000004" OWNER TO "SysEngine";

--
-- TOC entry 276 (class 1259 OID 1933869)
-- Name: TblLog_Device_PersonAccess_RMV_8000000000005; Type: TABLE; Schema: SchAcquisition; Owner: SysEngine
--

CREATE TABLE "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000005" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchAcquisition"."TblLog_Device_PersonAccess_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "Log_Device_PersonAccessFetch_RefID" bigint,
    "AttendanceDateTimeTZ" timestamp with time zone,
    "PersonID" bigint,
    "PersonUserName" character varying(256)
);


ALTER TABLE "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000005" OWNER TO "SysEngine";

--
-- TOC entry 277 (class 1259 OID 1933876)
-- Name: TblLog_Device_PersonAccess_RMV_8000000000006; Type: TABLE; Schema: SchAcquisition; Owner: SysEngine
--

CREATE TABLE "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000006" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchAcquisition"."TblLog_Device_PersonAccess_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "Log_Device_PersonAccessFetch_RefID" bigint,
    "AttendanceDateTimeTZ" timestamp with time zone,
    "PersonID" bigint,
    "PersonUserName" character varying(256)
);


ALTER TABLE "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000006" OWNER TO "SysEngine";

--
-- TOC entry 278 (class 1259 OID 1933883)
-- Name: TblLog_Device_PersonAccess_RMV_8000000000007; Type: TABLE; Schema: SchAcquisition; Owner: SysEngine
--

CREATE TABLE "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000007" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchAcquisition"."TblLog_Device_PersonAccess_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "Log_Device_PersonAccessFetch_RefID" bigint,
    "AttendanceDateTimeTZ" timestamp with time zone,
    "PersonID" bigint,
    "PersonUserName" character varying(256)
);


ALTER TABLE "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000007" OWNER TO "SysEngine";

--
-- TOC entry 279 (class 1259 OID 1933890)
-- Name: TblLog_Device_PersonAccess_RMV_8000000000008; Type: TABLE; Schema: SchAcquisition; Owner: SysEngine
--

CREATE TABLE "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000008" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchAcquisition"."TblLog_Device_PersonAccess_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "Log_Device_PersonAccessFetch_RefID" bigint,
    "AttendanceDateTimeTZ" timestamp with time zone,
    "PersonID" bigint,
    "PersonUserName" character varying(256)
);


ALTER TABLE "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000008" OWNER TO "SysEngine";

--
-- TOC entry 280 (class 1259 OID 1933897)
-- Name: TblLog_Device_PersonAccess_RMV_8000000000009; Type: TABLE; Schema: SchAcquisition; Owner: SysEngine
--

CREATE TABLE "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000009" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchAcquisition"."TblLog_Device_PersonAccess_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "Log_Device_PersonAccessFetch_RefID" bigint,
    "AttendanceDateTimeTZ" timestamp with time zone,
    "PersonID" bigint,
    "PersonUserName" character varying(256)
);


ALTER TABLE "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000009" OWNER TO "SysEngine";

--
-- TOC entry 281 (class 1259 OID 1933904)
-- Name: TblLog_Device_PersonAccess_RMV_8000000000010; Type: TABLE; Schema: SchAcquisition; Owner: SysEngine
--

CREATE TABLE "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000010" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchAcquisition"."TblLog_Device_PersonAccess_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "Log_Device_PersonAccessFetch_RefID" bigint,
    "AttendanceDateTimeTZ" timestamp with time zone,
    "PersonID" bigint,
    "PersonUserName" character varying(256)
);


ALTER TABLE "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000010" OWNER TO "SysEngine";

--
-- TOC entry 282 (class 1259 OID 1933911)
-- Name: TblLog_Device_PersonAccess_RMV_8000000000011; Type: TABLE; Schema: SchAcquisition; Owner: SysEngine
--

CREATE TABLE "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000011" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchAcquisition"."TblLog_Device_PersonAccess_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "Log_Device_PersonAccessFetch_RefID" bigint,
    "AttendanceDateTimeTZ" timestamp with time zone,
    "PersonID" bigint,
    "PersonUserName" character varying(256)
);


ALTER TABLE "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000011" OWNER TO "SysEngine";

--
-- TOC entry 283 (class 1259 OID 1933918)
-- Name: TblLog_Device_PersonAccess_RMV_8000000000012; Type: TABLE; Schema: SchAcquisition; Owner: SysEngine
--

CREATE TABLE "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000012" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchAcquisition"."TblLog_Device_PersonAccess_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "Log_Device_PersonAccessFetch_RefID" bigint,
    "AttendanceDateTimeTZ" timestamp with time zone,
    "PersonID" bigint,
    "PersonUserName" character varying(256)
);


ALTER TABLE "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000012" OWNER TO "SysEngine";

--
-- TOC entry 284 (class 1259 OID 1933925)
-- Name: TblLog_Device_PersonAccess_RMV_8000000000013; Type: TABLE; Schema: SchAcquisition; Owner: SysEngine
--

CREATE TABLE "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000013" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchAcquisition"."TblLog_Device_PersonAccess_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "Log_Device_PersonAccessFetch_RefID" bigint,
    "AttendanceDateTimeTZ" timestamp with time zone,
    "PersonID" bigint,
    "PersonUserName" character varying(256)
);


ALTER TABLE "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000013" OWNER TO "SysEngine";

--
-- TOC entry 285 (class 1259 OID 1933932)
-- Name: TblLog_Device_PersonAccess_RMV_8000000000014; Type: TABLE; Schema: SchAcquisition; Owner: SysEngine
--

CREATE TABLE "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000014" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchAcquisition"."TblLog_Device_PersonAccess_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "Log_Device_PersonAccessFetch_RefID" bigint,
    "AttendanceDateTimeTZ" timestamp with time zone,
    "PersonID" bigint,
    "PersonUserName" character varying(256)
);


ALTER TABLE "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000014" OWNER TO "SysEngine";

--
-- TOC entry 286 (class 1259 OID 1933939)
-- Name: TblLog_Device_PersonAccess_RMV_8000000000015; Type: TABLE; Schema: SchAcquisition; Owner: SysEngine
--

CREATE TABLE "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000015" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchAcquisition"."TblLog_Device_PersonAccess_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "Log_Device_PersonAccessFetch_RefID" bigint,
    "AttendanceDateTimeTZ" timestamp with time zone,
    "PersonID" bigint,
    "PersonUserName" character varying(256)
);


ALTER TABLE "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000015" OWNER TO "SysEngine";

--
-- TOC entry 287 (class 1259 OID 1933946)
-- Name: TblLog_Device_PersonAccess_RMV_8000000000016; Type: TABLE; Schema: SchAcquisition; Owner: SysEngine
--

CREATE TABLE "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000016" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchAcquisition"."TblLog_Device_PersonAccess_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "Log_Device_PersonAccessFetch_RefID" bigint,
    "AttendanceDateTimeTZ" timestamp with time zone,
    "PersonID" bigint,
    "PersonUserName" character varying(256)
);


ALTER TABLE "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000016" OWNER TO "SysEngine";

--
-- TOC entry 288 (class 1259 OID 1933953)
-- Name: TblLog_Device_PersonAccess_RMV_8000000000017; Type: TABLE; Schema: SchAcquisition; Owner: SysEngine
--

CREATE TABLE "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000017" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchAcquisition"."TblLog_Device_PersonAccess_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "Log_Device_PersonAccessFetch_RefID" bigint,
    "AttendanceDateTimeTZ" timestamp with time zone,
    "PersonID" bigint,
    "PersonUserName" character varying(256)
);


ALTER TABLE "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000017" OWNER TO "SysEngine";

--
-- TOC entry 289 (class 1259 OID 1933960)
-- Name: TblLog_Device_PersonAccess_RMV_8000000000018; Type: TABLE; Schema: SchAcquisition; Owner: SysEngine
--

CREATE TABLE "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000018" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchAcquisition"."TblLog_Device_PersonAccess_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "Log_Device_PersonAccessFetch_RefID" bigint,
    "AttendanceDateTimeTZ" timestamp with time zone,
    "PersonID" bigint,
    "PersonUserName" character varying(256)
);


ALTER TABLE "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000018" OWNER TO "SysEngine";

--
-- TOC entry 290 (class 1259 OID 1933967)
-- Name: TblLog_Device_PersonAccess_RMV_8000000000019; Type: TABLE; Schema: SchAcquisition; Owner: SysEngine
--

CREATE TABLE "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000019" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchAcquisition"."TblLog_Device_PersonAccess_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "Log_Device_PersonAccessFetch_RefID" bigint,
    "AttendanceDateTimeTZ" timestamp with time zone,
    "PersonID" bigint,
    "PersonUserName" character varying(256)
);


ALTER TABLE "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000019" OWNER TO "SysEngine";

--
-- TOC entry 291 (class 1259 OID 1933974)
-- Name: TblLog_Device_PersonAccess_RMV_8000000000020; Type: TABLE; Schema: SchAcquisition; Owner: SysEngine
--

CREATE TABLE "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000020" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchAcquisition"."TblLog_Device_PersonAccess_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "Log_Device_PersonAccessFetch_RefID" bigint,
    "AttendanceDateTimeTZ" timestamp with time zone,
    "PersonID" bigint,
    "PersonUserName" character varying(256)
);


ALTER TABLE "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000020" OWNER TO "SysEngine";

--
-- TOC entry 292 (class 1259 OID 1933981)
-- Name: TblLog_Device_PersonAccess_RMV_8000000000021; Type: TABLE; Schema: SchAcquisition; Owner: SysEngine
--

CREATE TABLE "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000021" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchAcquisition"."TblLog_Device_PersonAccess_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "Log_Device_PersonAccessFetch_RefID" bigint,
    "AttendanceDateTimeTZ" timestamp with time zone,
    "PersonID" bigint,
    "PersonUserName" character varying(256)
);


ALTER TABLE "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000021" OWNER TO "SysEngine";

--
-- TOC entry 293 (class 1259 OID 1933988)
-- Name: TblLog_Device_PersonAccess_RMV_8000000000022; Type: TABLE; Schema: SchAcquisition; Owner: SysEngine
--

CREATE TABLE "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000022" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchAcquisition"."TblLog_Device_PersonAccess_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "Log_Device_PersonAccessFetch_RefID" bigint,
    "AttendanceDateTimeTZ" timestamp with time zone,
    "PersonID" bigint,
    "PersonUserName" character varying(256)
);


ALTER TABLE "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000022" OWNER TO "SysEngine";

--
-- TOC entry 294 (class 1259 OID 1933995)
-- Name: TblLog_Device_PersonAccess_RMV_8000000000023; Type: TABLE; Schema: SchAcquisition; Owner: SysEngine
--

CREATE TABLE "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000023" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchAcquisition"."TblLog_Device_PersonAccess_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "Log_Device_PersonAccessFetch_RefID" bigint,
    "AttendanceDateTimeTZ" timestamp with time zone,
    "PersonID" bigint,
    "PersonUserName" character varying(256)
);


ALTER TABLE "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000023" OWNER TO "SysEngine";

--
-- TOC entry 295 (class 1259 OID 1934002)
-- Name: TblLog_Device_PersonAccess_RMV_8000000000024; Type: TABLE; Schema: SchAcquisition; Owner: SysEngine
--

CREATE TABLE "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000024" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchAcquisition"."TblLog_Device_PersonAccess_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "Log_Device_PersonAccessFetch_RefID" bigint,
    "AttendanceDateTimeTZ" timestamp with time zone,
    "PersonID" bigint,
    "PersonUserName" character varying(256)
);


ALTER TABLE "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000024" OWNER TO "SysEngine";

--
-- TOC entry 296 (class 1259 OID 1934009)
-- Name: TblLog_Device_PersonAccess_RMV_8000000000025; Type: TABLE; Schema: SchAcquisition; Owner: SysEngine
--

CREATE TABLE "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000025" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchAcquisition"."TblLog_Device_PersonAccess_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "Log_Device_PersonAccessFetch_RefID" bigint,
    "AttendanceDateTimeTZ" timestamp with time zone,
    "PersonID" bigint,
    "PersonUserName" character varying(256)
);


ALTER TABLE "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000025" OWNER TO "SysEngine";

--
-- TOC entry 297 (class 1259 OID 1934016)
-- Name: TblLog_Device_PersonAccess_RMV_8000000000026; Type: TABLE; Schema: SchAcquisition; Owner: SysEngine
--

CREATE TABLE "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000026" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchAcquisition"."TblLog_Device_PersonAccess_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "Log_Device_PersonAccessFetch_RefID" bigint,
    "AttendanceDateTimeTZ" timestamp with time zone,
    "PersonID" bigint,
    "PersonUserName" character varying(256)
);


ALTER TABLE "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000026" OWNER TO "SysEngine";

--
-- TOC entry 298 (class 1259 OID 1934023)
-- Name: TblLog_Device_PersonAccess_RMV_8000000000027; Type: TABLE; Schema: SchAcquisition; Owner: SysEngine
--

CREATE TABLE "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000027" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchAcquisition"."TblLog_Device_PersonAccess_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "Log_Device_PersonAccessFetch_RefID" bigint,
    "AttendanceDateTimeTZ" timestamp with time zone,
    "PersonID" bigint,
    "PersonUserName" character varying(256)
);


ALTER TABLE "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000027" OWNER TO "SysEngine";

--
-- TOC entry 299 (class 1259 OID 1934030)
-- Name: TblLog_Device_PersonAccess_RMV_8000000000028; Type: TABLE; Schema: SchAcquisition; Owner: SysEngine
--

CREATE TABLE "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000028" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchAcquisition"."TblLog_Device_PersonAccess_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "Log_Device_PersonAccessFetch_RefID" bigint,
    "AttendanceDateTimeTZ" timestamp with time zone,
    "PersonID" bigint,
    "PersonUserName" character varying(256)
);


ALTER TABLE "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000028" OWNER TO "SysEngine";

--
-- TOC entry 300 (class 1259 OID 1934037)
-- Name: TblLog_Device_PersonAccess_RMV_8000000000029; Type: TABLE; Schema: SchAcquisition; Owner: SysEngine
--

CREATE TABLE "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000029" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchAcquisition"."TblLog_Device_PersonAccess_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "Log_Device_PersonAccessFetch_RefID" bigint,
    "AttendanceDateTimeTZ" timestamp with time zone,
    "PersonID" bigint,
    "PersonUserName" character varying(256)
);


ALTER TABLE "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000029" OWNER TO "SysEngine";

--
-- TOC entry 301 (class 1259 OID 1934044)
-- Name: TblLog_Device_PersonAccess_RMV_8000000000030; Type: TABLE; Schema: SchAcquisition; Owner: SysEngine
--

CREATE TABLE "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000030" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchAcquisition"."TblLog_Device_PersonAccess_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "Log_Device_PersonAccessFetch_RefID" bigint,
    "AttendanceDateTimeTZ" timestamp with time zone,
    "PersonID" bigint,
    "PersonUserName" character varying(256)
);


ALTER TABLE "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000030" OWNER TO "SysEngine";

--
-- TOC entry 302 (class 1259 OID 1934051)
-- Name: TblLog_Device_PersonAccess_RMV_8000000000031; Type: TABLE; Schema: SchAcquisition; Owner: SysEngine
--

CREATE TABLE "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000031" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchAcquisition"."TblLog_Device_PersonAccess_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "Log_Device_PersonAccessFetch_RefID" bigint,
    "AttendanceDateTimeTZ" timestamp with time zone,
    "PersonID" bigint,
    "PersonUserName" character varying(256)
);


ALTER TABLE "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000031" OWNER TO "SysEngine";

--
-- TOC entry 303 (class 1259 OID 1934058)
-- Name: TblLog_FileUpload_Object_Sys_RPK_seq; Type: SEQUENCE; Schema: SchAcquisition; Owner: SysAdmin
--

CREATE SEQUENCE "SchAcquisition"."TblLog_FileUpload_Object_Sys_RPK_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE "SchAcquisition"."TblLog_FileUpload_Object_Sys_RPK_seq" OWNER TO "SysAdmin";

--
-- TOC entry 304 (class 1259 OID 1934059)
-- Name: TblLog_FileUpload_Object; Type: TABLE; Schema: SchAcquisition; Owner: SysAdmin
--

CREATE TABLE "SchAcquisition"."TblLog_FileUpload_Object" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchAcquisition"."TblLog_FileUpload_Object_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "RotateLog_FileUploadStagingArea_RefRPK" bigint
);


ALTER TABLE "SchAcquisition"."TblLog_FileUpload_Object" OWNER TO "SysAdmin";

--
-- TOC entry 305 (class 1259 OID 1934066)
-- Name: TblLog_FileUpload_ObjectDetail_Sys_RPK_seq; Type: SEQUENCE; Schema: SchAcquisition; Owner: SysAdmin
--

CREATE SEQUENCE "SchAcquisition"."TblLog_FileUpload_ObjectDetail_Sys_RPK_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE "SchAcquisition"."TblLog_FileUpload_ObjectDetail_Sys_RPK_seq" OWNER TO "SysAdmin";

--
-- TOC entry 306 (class 1259 OID 1934067)
-- Name: TblLog_FileUpload_ObjectDetail; Type: TABLE; Schema: SchAcquisition; Owner: SysAdmin
--

CREATE TABLE "SchAcquisition"."TblLog_FileUpload_ObjectDetail" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchAcquisition"."TblLog_FileUpload_ObjectDetail_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Log_FileUpload_Object_RefID" bigint,
    "RotateLog_FileUploadStagingAreaDetail_RefRPK" bigint,
    "Sequence" smallint,
    "Name" character varying(256),
    "Size" bigint,
    "MIME" character varying(128),
    "Extension" character varying(32),
    "LastModifiedDateTimeTZ" character varying(128),
    "LastModifiedUnixTimestamp" bigint,
    "HashMethod_RefID" bigint,
    "ContentBase64Hash" character varying,
    "DataCompression_RefID" bigint,
    "StagingAreaFilePath" character varying(256)
);


ALTER TABLE "SchAcquisition"."TblLog_FileUpload_ObjectDetail" OWNER TO "SysAdmin";

--
-- TOC entry 307 (class 1259 OID 1934074)
-- Name: TblLog_FileUpload_Pointer_Sys_RPK_seq; Type: SEQUENCE; Schema: SchAcquisition; Owner: SysAdmin
--

CREATE SEQUENCE "SchAcquisition"."TblLog_FileUpload_Pointer_Sys_RPK_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE "SchAcquisition"."TblLog_FileUpload_Pointer_Sys_RPK_seq" OWNER TO "SysAdmin";

--
-- TOC entry 308 (class 1259 OID 1934075)
-- Name: TblLog_FileUpload_Pointer; Type: TABLE; Schema: SchAcquisition; Owner: SysAdmin
--

CREATE TABLE "SchAcquisition"."TblLog_FileUpload_Pointer" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchAcquisition"."TblLog_FileUpload_Pointer_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Sys_DataIntegrityShadow" character varying(32)
);


ALTER TABLE "SchAcquisition"."TblLog_FileUpload_Pointer" OWNER TO "SysAdmin";

--
-- TOC entry 309 (class 1259 OID 1934082)
-- Name: TblLog_FileUpload_PointerHistory_Sys_RPK_seq; Type: SEQUENCE; Schema: SchAcquisition; Owner: SysAdmin
--

CREATE SEQUENCE "SchAcquisition"."TblLog_FileUpload_PointerHistory_Sys_RPK_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE "SchAcquisition"."TblLog_FileUpload_PointerHistory_Sys_RPK_seq" OWNER TO "SysAdmin";

--
-- TOC entry 310 (class 1259 OID 1934083)
-- Name: TblLog_FileUpload_PointerHistory; Type: TABLE; Schema: SchAcquisition; Owner: SysAdmin
--

CREATE TABLE "SchAcquisition"."TblLog_FileUpload_PointerHistory" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchAcquisition"."TblLog_FileUpload_PointerHistory_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Log_FileUpload_Pointer_RefID" bigint
);


ALTER TABLE "SchAcquisition"."TblLog_FileUpload_PointerHistory" OWNER TO "SysAdmin";

--
-- TOC entry 311 (class 1259 OID 1934090)
-- Name: TblLog_FileUpload_PointerHistoryDetail_Sys_RPK_seq; Type: SEQUENCE; Schema: SchAcquisition; Owner: SysAdmin
--

CREATE SEQUENCE "SchAcquisition"."TblLog_FileUpload_PointerHistoryDetail_Sys_RPK_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE "SchAcquisition"."TblLog_FileUpload_PointerHistoryDetail_Sys_RPK_seq" OWNER TO "SysAdmin";

--
-- TOC entry 312 (class 1259 OID 1934091)
-- Name: TblLog_FileUpload_PointerHistoryDetail; Type: TABLE; Schema: SchAcquisition; Owner: SysAdmin
--

CREATE TABLE "SchAcquisition"."TblLog_FileUpload_PointerHistoryDetail" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchAcquisition"."TblLog_FileUpload_PointerHistoryDetail_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Log_FileUpload_PointerHistory_RefID" bigint,
    "Log_FileUpload_Object_RefID" bigint
);


ALTER TABLE "SchAcquisition"."TblLog_FileUpload_PointerHistoryDetail" OWNER TO "SysAdmin";

--
-- TOC entry 313 (class 1259 OID 1934098)
-- Name: TblRotateLog_FileUploadStagingArea; Type: TABLE; Schema: SchAcquisition; Owner: SysAdmin
--

CREATE TABLE "SchAcquisition"."TblRotateLog_FileUploadStagingArea" (
    "Sys_RotateID" bigint NOT NULL,
    "Sys_RPK" bigint NOT NULL,
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
    "ApplicationKey" character varying(256)
);


ALTER TABLE "SchAcquisition"."TblRotateLog_FileUploadStagingArea" OWNER TO "SysAdmin";

--
-- TOC entry 314 (class 1259 OID 1934105)
-- Name: TblRotateLog_FileUploadStagingAreaDetail; Type: TABLE; Schema: SchAcquisition; Owner: SysAdmin
--

CREATE TABLE "SchAcquisition"."TblRotateLog_FileUploadStagingAreaDetail" (
    "Sys_RotateID" bigint NOT NULL,
    "Sys_RPK" bigint NOT NULL,
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
    "RotateLog_FileUploadStagingArea_RefRPK" bigint,
    "Sequence" smallint,
    "Name" character varying(256),
    "Size" bigint,
    "MIME" character varying(128),
    "Extension" character varying(32),
    "LastModifiedDateTimeTZ" character varying(128),
    "LastModifiedUnixTimestamp" bigint,
    "HashMethod_RefID" bigint,
    "ContentBase64Hash" character varying,
    "URLDelete" character varying
);


ALTER TABLE "SchAcquisition"."TblRotateLog_FileUploadStagingAreaDetail" OWNER TO "SysAdmin";

--
-- TOC entry 315 (class 1259 OID 1934112)
-- Name: TblRotateLog_FileUploadStagingAreaDetail_Sys_RPK_seq; Type: SEQUENCE; Schema: SchAcquisition; Owner: SysAdmin
--

CREATE SEQUENCE "SchAcquisition"."TblRotateLog_FileUploadStagingAreaDetail_Sys_RPK_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE "SchAcquisition"."TblRotateLog_FileUploadStagingAreaDetail_Sys_RPK_seq" OWNER TO "SysAdmin";

--
-- TOC entry 316 (class 1259 OID 1934113)
-- Name: TblRotateLog_FileUploadStagingArea_Sys_RPK_seq; Type: SEQUENCE; Schema: SchAcquisition; Owner: SysAdmin
--

CREATE SEQUENCE "SchAcquisition"."TblRotateLog_FileUploadStagingArea_Sys_RPK_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE "SchAcquisition"."TblRotateLog_FileUploadStagingArea_Sys_RPK_seq" OWNER TO "SysAdmin";

--
-- TOC entry 317 (class 1259 OID 1934114)
-- Name: TblCache_FunctionResult_Sys_RPK_seq; Type: SEQUENCE; Schema: SchCache; Owner: SysAdmin
--

CREATE SEQUENCE "SchCache"."TblCache_FunctionResult_Sys_RPK_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE "SchCache"."TblCache_FunctionResult_Sys_RPK_seq" OWNER TO "SysAdmin";

--
-- TOC entry 318 (class 1259 OID 1934115)
-- Name: TblCache_FunctionResult; Type: TABLE; Schema: SchCache; Owner: SysAdmin
--

CREATE TABLE "SchCache"."TblCache_FunctionResult" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchCache"."TblCache_FunctionResult_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "SchemaFunctionName" character varying(128),
    "Parameter" jsonb,
    "ObjectsSignatureReference" jsonb,
    "SQLRecallSyntax" character varying,
    "Result" json,
    "ReturnDataType" character varying,
    "ReturnDataTypePlaceHolder" character varying,
    "RecordCount" bigint,
    "QueryExecutionInterval" interval
);


ALTER TABLE "SchCache"."TblCache_FunctionResult" OWNER TO "SysAdmin";

--
-- TOC entry 319 (class 1259 OID 1934122)
-- Name: TblStatistic_CacheFunctionResultAccess_Sys_RPK_seq; Type: SEQUENCE; Schema: SchCache; Owner: SysAdmin
--

CREATE SEQUENCE "SchCache"."TblStatistic_CacheFunctionResultAccess_Sys_RPK_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE "SchCache"."TblStatistic_CacheFunctionResultAccess_Sys_RPK_seq" OWNER TO "SysAdmin";

--
-- TOC entry 320 (class 1259 OID 1934123)
-- Name: TblStatistic_CacheFunctionResultAccess; Type: TABLE; Schema: SchCache; Owner: SysAdmin
--

CREATE TABLE "SchCache"."TblStatistic_CacheFunctionResultAccess" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchCache"."TblStatistic_CacheFunctionResultAccess_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Cache_FunctionResult_RefID" bigint,
    "LastReadDateTimeTZ" timestamp with time zone,
    "ReadFrequencies" bigint
);


ALTER TABLE "SchCache"."TblStatistic_CacheFunctionResultAccess" OWNER TO "SysAdmin";

--
-- TOC entry 321 (class 1259 OID 1934130)
-- Name: TblLog_FunctionSnapshotSignature_Sys_RPK_seq; Type: SEQUENCE; Schema: SchLog; Owner: SysAdmin
--

CREATE SEQUENCE "SchLog"."TblLog_FunctionSnapshotSignature_Sys_RPK_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE "SchLog"."TblLog_FunctionSnapshotSignature_Sys_RPK_seq" OWNER TO "SysAdmin";

--
-- TOC entry 322 (class 1259 OID 1934131)
-- Name: TblLog_FunctionSnapshotSignature; Type: TABLE; Schema: SchLog; Owner: SysAdmin
--

CREATE TABLE "SchLog"."TblLog_FunctionSnapshotSignature" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchLog"."TblLog_FunctionSnapshotSignature_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "SchemaName" character varying(128),
    "FunctionName" character varying(128),
    "SignatureID" character varying(32),
    "Source_RefHeaderID" bigint,
    "Type" character varying(32)
);


ALTER TABLE "SchLog"."TblLog_FunctionSnapshotSignature" OWNER TO "SysAdmin";

--
-- TOC entry 323 (class 1259 OID 1934138)
-- Name: TblLog_TableSnapshotSignature_Sys_RPK_seq; Type: SEQUENCE; Schema: SchLog; Owner: SysAdmin
--

CREATE SEQUENCE "SchLog"."TblLog_TableSnapshotSignature_Sys_RPK_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE "SchLog"."TblLog_TableSnapshotSignature_Sys_RPK_seq" OWNER TO "SysAdmin";

--
-- TOC entry 324 (class 1259 OID 1934139)
-- Name: TblLog_TableSnapshotSignature; Type: TABLE; Schema: SchLog; Owner: SysAdmin
--

CREATE TABLE "SchLog"."TblLog_TableSnapshotSignature" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchLog"."TblLog_TableSnapshotSignature_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "SchemaName" character varying(128),
    "TableName" character varying(128),
    "SignatureID" character varying(32)
);


ALTER TABLE "SchLog"."TblLog_TableSnapshotSignature" OWNER TO "SysAdmin";

--
-- TOC entry 325 (class 1259 OID 1934146)
-- Name: TblLog_TransactionHistory_Sys_RPK_seq; Type: SEQUENCE; Schema: SchLog; Owner: SysEngine
--

CREATE SEQUENCE "SchLog"."TblLog_TransactionHistory_Sys_RPK_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE "SchLog"."TblLog_TransactionHistory_Sys_RPK_seq" OWNER TO "SysEngine";

--
-- TOC entry 326 (class 1259 OID 1934147)
-- Name: TblLog_TransactionHistory; Type: TABLE; Schema: SchLog; Owner: SysEngine
--

CREATE TABLE "SchLog"."TblLog_TransactionHistory" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchLog"."TblLog_TransactionHistory_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "Source_RefPID" bigint,
    "Source_RefSID" bigint,
    "Source_RefRPK" bigint,
    "Source_EntryDateTimeTZ" timestamp with time zone,
    "Content" json,
    "Source_RefHeaderID" bigint,
    "Type" character varying(32)
)
PARTITION BY LIST ("Sys_Partition_RemovableRecord_Key_RefID");


ALTER TABLE "SchLog"."TblLog_TransactionHistory" OWNER TO "SysEngine";

--
-- TOC entry 327 (class 1259 OID 1934152)
-- Name: TblLog_TransactionHistory_DEF; Type: TABLE; Schema: SchLog; Owner: SysEngine
--

CREATE TABLE "SchLog"."TblLog_TransactionHistory_DEF" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchLog"."TblLog_TransactionHistory_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "Source_RefPID" bigint,
    "Source_RefSID" bigint,
    "Source_RefRPK" bigint,
    "Source_EntryDateTimeTZ" timestamp with time zone,
    "Content" json,
    "Source_RefHeaderID" bigint,
    "Type" character varying(32)
);


ALTER TABLE "SchLog"."TblLog_TransactionHistory_DEF" OWNER TO "SysEngine";

--
-- TOC entry 328 (class 1259 OID 1934159)
-- Name: TblLog_TransactionHistory_PMT; Type: TABLE; Schema: SchLog; Owner: SysEngine
--

CREATE TABLE "SchLog"."TblLog_TransactionHistory_PMT" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchLog"."TblLog_TransactionHistory_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "Source_RefPID" bigint,
    "Source_RefSID" bigint,
    "Source_RefRPK" bigint,
    "Source_EntryDateTimeTZ" timestamp with time zone,
    "Content" json,
    "Source_RefHeaderID" bigint,
    "Type" character varying(32)
);


ALTER TABLE "SchLog"."TblLog_TransactionHistory_PMT" OWNER TO "SysEngine";

--
-- TOC entry 329 (class 1259 OID 1934166)
-- Name: TblLog_TransactionHistory_RMV; Type: TABLE; Schema: SchLog; Owner: SysEngine
--

CREATE TABLE "SchLog"."TblLog_TransactionHistory_RMV" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchLog"."TblLog_TransactionHistory_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "Source_RefPID" bigint,
    "Source_RefSID" bigint,
    "Source_RefRPK" bigint,
    "Source_EntryDateTimeTZ" timestamp with time zone,
    "Content" json,
    "Source_RefHeaderID" bigint,
    "Type" character varying(32)
)
PARTITION BY LIST ("Sys_Partition_RemovableRecord_Key_RefID");


ALTER TABLE "SchLog"."TblLog_TransactionHistory_RMV" OWNER TO "SysEngine";

--
-- TOC entry 330 (class 1259 OID 1934171)
-- Name: TblLog_TransactionHistory_RMV_8000000000001; Type: TABLE; Schema: SchLog; Owner: SysEngine
--

CREATE TABLE "SchLog"."TblLog_TransactionHistory_RMV_8000000000001" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchLog"."TblLog_TransactionHistory_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "Source_RefPID" bigint,
    "Source_RefSID" bigint,
    "Source_RefRPK" bigint,
    "Source_EntryDateTimeTZ" timestamp with time zone,
    "Content" json,
    "Source_RefHeaderID" bigint,
    "Type" character varying(32)
);


ALTER TABLE "SchLog"."TblLog_TransactionHistory_RMV_8000000000001" OWNER TO "SysEngine";

--
-- TOC entry 331 (class 1259 OID 1934178)
-- Name: TblLog_TransactionHistory_RMV_8000000000002; Type: TABLE; Schema: SchLog; Owner: SysEngine
--

CREATE TABLE "SchLog"."TblLog_TransactionHistory_RMV_8000000000002" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchLog"."TblLog_TransactionHistory_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "Source_RefPID" bigint,
    "Source_RefSID" bigint,
    "Source_RefRPK" bigint,
    "Source_EntryDateTimeTZ" timestamp with time zone,
    "Content" json,
    "Source_RefHeaderID" bigint,
    "Type" character varying(32)
);


ALTER TABLE "SchLog"."TblLog_TransactionHistory_RMV_8000000000002" OWNER TO "SysEngine";

--
-- TOC entry 332 (class 1259 OID 1934185)
-- Name: TblLog_TransactionHistory_RMV_8000000000003; Type: TABLE; Schema: SchLog; Owner: SysEngine
--

CREATE TABLE "SchLog"."TblLog_TransactionHistory_RMV_8000000000003" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchLog"."TblLog_TransactionHistory_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "Source_RefPID" bigint,
    "Source_RefSID" bigint,
    "Source_RefRPK" bigint,
    "Source_EntryDateTimeTZ" timestamp with time zone,
    "Content" json,
    "Source_RefHeaderID" bigint,
    "Type" character varying(32)
);


ALTER TABLE "SchLog"."TblLog_TransactionHistory_RMV_8000000000003" OWNER TO "SysEngine";

--
-- TOC entry 333 (class 1259 OID 1934192)
-- Name: TblLog_TransactionHistory_RMV_8000000000004; Type: TABLE; Schema: SchLog; Owner: SysEngine
--

CREATE TABLE "SchLog"."TblLog_TransactionHistory_RMV_8000000000004" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchLog"."TblLog_TransactionHistory_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "Source_RefPID" bigint,
    "Source_RefSID" bigint,
    "Source_RefRPK" bigint,
    "Source_EntryDateTimeTZ" timestamp with time zone,
    "Content" json,
    "Source_RefHeaderID" bigint,
    "Type" character varying(32)
);


ALTER TABLE "SchLog"."TblLog_TransactionHistory_RMV_8000000000004" OWNER TO "SysEngine";

--
-- TOC entry 334 (class 1259 OID 1934199)
-- Name: TblLog_TransactionHistory_RMV_8000000000005; Type: TABLE; Schema: SchLog; Owner: SysEngine
--

CREATE TABLE "SchLog"."TblLog_TransactionHistory_RMV_8000000000005" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchLog"."TblLog_TransactionHistory_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "Source_RefPID" bigint,
    "Source_RefSID" bigint,
    "Source_RefRPK" bigint,
    "Source_EntryDateTimeTZ" timestamp with time zone,
    "Content" json,
    "Source_RefHeaderID" bigint,
    "Type" character varying(32)
);


ALTER TABLE "SchLog"."TblLog_TransactionHistory_RMV_8000000000005" OWNER TO "SysEngine";

--
-- TOC entry 335 (class 1259 OID 1934206)
-- Name: TblLog_TransactionHistory_RMV_8000000000006; Type: TABLE; Schema: SchLog; Owner: SysEngine
--

CREATE TABLE "SchLog"."TblLog_TransactionHistory_RMV_8000000000006" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchLog"."TblLog_TransactionHistory_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "Source_RefPID" bigint,
    "Source_RefSID" bigint,
    "Source_RefRPK" bigint,
    "Source_EntryDateTimeTZ" timestamp with time zone,
    "Content" json,
    "Source_RefHeaderID" bigint,
    "Type" character varying(32)
);


ALTER TABLE "SchLog"."TblLog_TransactionHistory_RMV_8000000000006" OWNER TO "SysEngine";

--
-- TOC entry 336 (class 1259 OID 1934213)
-- Name: TblLog_TransactionHistory_RMV_8000000000007; Type: TABLE; Schema: SchLog; Owner: SysEngine
--

CREATE TABLE "SchLog"."TblLog_TransactionHistory_RMV_8000000000007" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchLog"."TblLog_TransactionHistory_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "Source_RefPID" bigint,
    "Source_RefSID" bigint,
    "Source_RefRPK" bigint,
    "Source_EntryDateTimeTZ" timestamp with time zone,
    "Content" json,
    "Source_RefHeaderID" bigint,
    "Type" character varying(32)
);


ALTER TABLE "SchLog"."TblLog_TransactionHistory_RMV_8000000000007" OWNER TO "SysEngine";

--
-- TOC entry 337 (class 1259 OID 1934220)
-- Name: TblLog_TransactionHistory_RMV_8000000000008; Type: TABLE; Schema: SchLog; Owner: SysEngine
--

CREATE TABLE "SchLog"."TblLog_TransactionHistory_RMV_8000000000008" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchLog"."TblLog_TransactionHistory_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "Source_RefPID" bigint,
    "Source_RefSID" bigint,
    "Source_RefRPK" bigint,
    "Source_EntryDateTimeTZ" timestamp with time zone,
    "Content" json,
    "Source_RefHeaderID" bigint,
    "Type" character varying(32)
);


ALTER TABLE "SchLog"."TblLog_TransactionHistory_RMV_8000000000008" OWNER TO "SysEngine";

--
-- TOC entry 338 (class 1259 OID 1934227)
-- Name: TblLog_TransactionHistory_RMV_8000000000009; Type: TABLE; Schema: SchLog; Owner: SysEngine
--

CREATE TABLE "SchLog"."TblLog_TransactionHistory_RMV_8000000000009" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchLog"."TblLog_TransactionHistory_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "Source_RefPID" bigint,
    "Source_RefSID" bigint,
    "Source_RefRPK" bigint,
    "Source_EntryDateTimeTZ" timestamp with time zone,
    "Content" json,
    "Source_RefHeaderID" bigint,
    "Type" character varying(32)
);


ALTER TABLE "SchLog"."TblLog_TransactionHistory_RMV_8000000000009" OWNER TO "SysEngine";

--
-- TOC entry 339 (class 1259 OID 1934234)
-- Name: TblLog_TransactionHistory_RMV_8000000000010; Type: TABLE; Schema: SchLog; Owner: SysEngine
--

CREATE TABLE "SchLog"."TblLog_TransactionHistory_RMV_8000000000010" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchLog"."TblLog_TransactionHistory_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "Source_RefPID" bigint,
    "Source_RefSID" bigint,
    "Source_RefRPK" bigint,
    "Source_EntryDateTimeTZ" timestamp with time zone,
    "Content" json,
    "Source_RefHeaderID" bigint,
    "Type" character varying(32)
);


ALTER TABLE "SchLog"."TblLog_TransactionHistory_RMV_8000000000010" OWNER TO "SysEngine";

--
-- TOC entry 340 (class 1259 OID 1934241)
-- Name: TblLog_TransactionHistory_RMV_8000000000011; Type: TABLE; Schema: SchLog; Owner: SysEngine
--

CREATE TABLE "SchLog"."TblLog_TransactionHistory_RMV_8000000000011" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchLog"."TblLog_TransactionHistory_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "Source_RefPID" bigint,
    "Source_RefSID" bigint,
    "Source_RefRPK" bigint,
    "Source_EntryDateTimeTZ" timestamp with time zone,
    "Content" json,
    "Source_RefHeaderID" bigint,
    "Type" character varying(32)
);


ALTER TABLE "SchLog"."TblLog_TransactionHistory_RMV_8000000000011" OWNER TO "SysEngine";

--
-- TOC entry 341 (class 1259 OID 1934248)
-- Name: TblLog_TransactionHistory_RMV_8000000000012; Type: TABLE; Schema: SchLog; Owner: SysEngine
--

CREATE TABLE "SchLog"."TblLog_TransactionHistory_RMV_8000000000012" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchLog"."TblLog_TransactionHistory_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "Source_RefPID" bigint,
    "Source_RefSID" bigint,
    "Source_RefRPK" bigint,
    "Source_EntryDateTimeTZ" timestamp with time zone,
    "Content" json,
    "Source_RefHeaderID" bigint,
    "Type" character varying(32)
);


ALTER TABLE "SchLog"."TblLog_TransactionHistory_RMV_8000000000012" OWNER TO "SysEngine";

--
-- TOC entry 342 (class 1259 OID 1934255)
-- Name: TblLog_TransactionHistory_RMV_8000000000013; Type: TABLE; Schema: SchLog; Owner: SysEngine
--

CREATE TABLE "SchLog"."TblLog_TransactionHistory_RMV_8000000000013" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchLog"."TblLog_TransactionHistory_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "Source_RefPID" bigint,
    "Source_RefSID" bigint,
    "Source_RefRPK" bigint,
    "Source_EntryDateTimeTZ" timestamp with time zone,
    "Content" json,
    "Source_RefHeaderID" bigint,
    "Type" character varying(32)
);


ALTER TABLE "SchLog"."TblLog_TransactionHistory_RMV_8000000000013" OWNER TO "SysEngine";

--
-- TOC entry 343 (class 1259 OID 1934262)
-- Name: TblLog_TransactionHistory_RMV_8000000000014; Type: TABLE; Schema: SchLog; Owner: SysEngine
--

CREATE TABLE "SchLog"."TblLog_TransactionHistory_RMV_8000000000014" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchLog"."TblLog_TransactionHistory_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "Source_RefPID" bigint,
    "Source_RefSID" bigint,
    "Source_RefRPK" bigint,
    "Source_EntryDateTimeTZ" timestamp with time zone,
    "Content" json,
    "Source_RefHeaderID" bigint,
    "Type" character varying(32)
);


ALTER TABLE "SchLog"."TblLog_TransactionHistory_RMV_8000000000014" OWNER TO "SysEngine";

--
-- TOC entry 344 (class 1259 OID 1934269)
-- Name: TblLog_TransactionHistory_RMV_8000000000015; Type: TABLE; Schema: SchLog; Owner: SysEngine
--

CREATE TABLE "SchLog"."TblLog_TransactionHistory_RMV_8000000000015" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchLog"."TblLog_TransactionHistory_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "Source_RefPID" bigint,
    "Source_RefSID" bigint,
    "Source_RefRPK" bigint,
    "Source_EntryDateTimeTZ" timestamp with time zone,
    "Content" json,
    "Source_RefHeaderID" bigint,
    "Type" character varying(32)
);


ALTER TABLE "SchLog"."TblLog_TransactionHistory_RMV_8000000000015" OWNER TO "SysEngine";

--
-- TOC entry 345 (class 1259 OID 1934276)
-- Name: TblLog_TransactionHistory_RMV_8000000000016; Type: TABLE; Schema: SchLog; Owner: SysEngine
--

CREATE TABLE "SchLog"."TblLog_TransactionHistory_RMV_8000000000016" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchLog"."TblLog_TransactionHistory_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "Source_RefPID" bigint,
    "Source_RefSID" bigint,
    "Source_RefRPK" bigint,
    "Source_EntryDateTimeTZ" timestamp with time zone,
    "Content" json,
    "Source_RefHeaderID" bigint,
    "Type" character varying(32)
);


ALTER TABLE "SchLog"."TblLog_TransactionHistory_RMV_8000000000016" OWNER TO "SysEngine";

--
-- TOC entry 346 (class 1259 OID 1934283)
-- Name: TblLog_TransactionHistory_RMV_8000000000017; Type: TABLE; Schema: SchLog; Owner: SysEngine
--

CREATE TABLE "SchLog"."TblLog_TransactionHistory_RMV_8000000000017" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchLog"."TblLog_TransactionHistory_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "Source_RefPID" bigint,
    "Source_RefSID" bigint,
    "Source_RefRPK" bigint,
    "Source_EntryDateTimeTZ" timestamp with time zone,
    "Content" json,
    "Source_RefHeaderID" bigint,
    "Type" character varying(32)
);


ALTER TABLE "SchLog"."TblLog_TransactionHistory_RMV_8000000000017" OWNER TO "SysEngine";

--
-- TOC entry 347 (class 1259 OID 1934290)
-- Name: TblLog_TransactionHistory_RMV_8000000000018; Type: TABLE; Schema: SchLog; Owner: SysEngine
--

CREATE TABLE "SchLog"."TblLog_TransactionHistory_RMV_8000000000018" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchLog"."TblLog_TransactionHistory_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "Source_RefPID" bigint,
    "Source_RefSID" bigint,
    "Source_RefRPK" bigint,
    "Source_EntryDateTimeTZ" timestamp with time zone,
    "Content" json,
    "Source_RefHeaderID" bigint,
    "Type" character varying(32)
);


ALTER TABLE "SchLog"."TblLog_TransactionHistory_RMV_8000000000018" OWNER TO "SysEngine";

--
-- TOC entry 348 (class 1259 OID 1934297)
-- Name: TblLog_TransactionHistory_RMV_8000000000019; Type: TABLE; Schema: SchLog; Owner: SysEngine
--

CREATE TABLE "SchLog"."TblLog_TransactionHistory_RMV_8000000000019" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchLog"."TblLog_TransactionHistory_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "Source_RefPID" bigint,
    "Source_RefSID" bigint,
    "Source_RefRPK" bigint,
    "Source_EntryDateTimeTZ" timestamp with time zone,
    "Content" json,
    "Source_RefHeaderID" bigint,
    "Type" character varying(32)
);


ALTER TABLE "SchLog"."TblLog_TransactionHistory_RMV_8000000000019" OWNER TO "SysEngine";

--
-- TOC entry 349 (class 1259 OID 1934304)
-- Name: TblLog_TransactionHistory_RMV_8000000000020; Type: TABLE; Schema: SchLog; Owner: SysEngine
--

CREATE TABLE "SchLog"."TblLog_TransactionHistory_RMV_8000000000020" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchLog"."TblLog_TransactionHistory_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "Source_RefPID" bigint,
    "Source_RefSID" bigint,
    "Source_RefRPK" bigint,
    "Source_EntryDateTimeTZ" timestamp with time zone,
    "Content" json,
    "Source_RefHeaderID" bigint,
    "Type" character varying(32)
);


ALTER TABLE "SchLog"."TblLog_TransactionHistory_RMV_8000000000020" OWNER TO "SysEngine";

--
-- TOC entry 350 (class 1259 OID 1934311)
-- Name: TblLog_TransactionHistory_RMV_8000000000021; Type: TABLE; Schema: SchLog; Owner: SysEngine
--

CREATE TABLE "SchLog"."TblLog_TransactionHistory_RMV_8000000000021" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchLog"."TblLog_TransactionHistory_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "Source_RefPID" bigint,
    "Source_RefSID" bigint,
    "Source_RefRPK" bigint,
    "Source_EntryDateTimeTZ" timestamp with time zone,
    "Content" json,
    "Source_RefHeaderID" bigint,
    "Type" character varying(32)
);


ALTER TABLE "SchLog"."TblLog_TransactionHistory_RMV_8000000000021" OWNER TO "SysEngine";

--
-- TOC entry 351 (class 1259 OID 1934318)
-- Name: TblLog_TransactionHistory_RMV_8000000000022; Type: TABLE; Schema: SchLog; Owner: SysEngine
--

CREATE TABLE "SchLog"."TblLog_TransactionHistory_RMV_8000000000022" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchLog"."TblLog_TransactionHistory_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "Source_RefPID" bigint,
    "Source_RefSID" bigint,
    "Source_RefRPK" bigint,
    "Source_EntryDateTimeTZ" timestamp with time zone,
    "Content" json,
    "Source_RefHeaderID" bigint,
    "Type" character varying(32)
);


ALTER TABLE "SchLog"."TblLog_TransactionHistory_RMV_8000000000022" OWNER TO "SysEngine";

--
-- TOC entry 352 (class 1259 OID 1934325)
-- Name: TblLog_TransactionHistory_RMV_8000000000023; Type: TABLE; Schema: SchLog; Owner: SysEngine
--

CREATE TABLE "SchLog"."TblLog_TransactionHistory_RMV_8000000000023" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchLog"."TblLog_TransactionHistory_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "Source_RefPID" bigint,
    "Source_RefSID" bigint,
    "Source_RefRPK" bigint,
    "Source_EntryDateTimeTZ" timestamp with time zone,
    "Content" json,
    "Source_RefHeaderID" bigint,
    "Type" character varying(32)
);


ALTER TABLE "SchLog"."TblLog_TransactionHistory_RMV_8000000000023" OWNER TO "SysEngine";

--
-- TOC entry 353 (class 1259 OID 1934332)
-- Name: TblLog_TransactionHistory_RMV_8000000000024; Type: TABLE; Schema: SchLog; Owner: SysEngine
--

CREATE TABLE "SchLog"."TblLog_TransactionHistory_RMV_8000000000024" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchLog"."TblLog_TransactionHistory_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "Source_RefPID" bigint,
    "Source_RefSID" bigint,
    "Source_RefRPK" bigint,
    "Source_EntryDateTimeTZ" timestamp with time zone,
    "Content" json,
    "Source_RefHeaderID" bigint,
    "Type" character varying(32)
);


ALTER TABLE "SchLog"."TblLog_TransactionHistory_RMV_8000000000024" OWNER TO "SysEngine";

--
-- TOC entry 354 (class 1259 OID 1934339)
-- Name: TblLog_TransactionHistory_RMV_8000000000025; Type: TABLE; Schema: SchLog; Owner: SysEngine
--

CREATE TABLE "SchLog"."TblLog_TransactionHistory_RMV_8000000000025" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchLog"."TblLog_TransactionHistory_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "Source_RefPID" bigint,
    "Source_RefSID" bigint,
    "Source_RefRPK" bigint,
    "Source_EntryDateTimeTZ" timestamp with time zone,
    "Content" json,
    "Source_RefHeaderID" bigint,
    "Type" character varying(32)
);


ALTER TABLE "SchLog"."TblLog_TransactionHistory_RMV_8000000000025" OWNER TO "SysEngine";

--
-- TOC entry 355 (class 1259 OID 1934346)
-- Name: TblLog_TransactionHistory_RMV_8000000000026; Type: TABLE; Schema: SchLog; Owner: SysEngine
--

CREATE TABLE "SchLog"."TblLog_TransactionHistory_RMV_8000000000026" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchLog"."TblLog_TransactionHistory_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "Source_RefPID" bigint,
    "Source_RefSID" bigint,
    "Source_RefRPK" bigint,
    "Source_EntryDateTimeTZ" timestamp with time zone,
    "Content" json,
    "Source_RefHeaderID" bigint,
    "Type" character varying(32)
);


ALTER TABLE "SchLog"."TblLog_TransactionHistory_RMV_8000000000026" OWNER TO "SysEngine";

--
-- TOC entry 356 (class 1259 OID 1934353)
-- Name: TblLog_TransactionHistory_RMV_8000000000027; Type: TABLE; Schema: SchLog; Owner: SysEngine
--

CREATE TABLE "SchLog"."TblLog_TransactionHistory_RMV_8000000000027" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchLog"."TblLog_TransactionHistory_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "Source_RefPID" bigint,
    "Source_RefSID" bigint,
    "Source_RefRPK" bigint,
    "Source_EntryDateTimeTZ" timestamp with time zone,
    "Content" json,
    "Source_RefHeaderID" bigint,
    "Type" character varying(32)
);


ALTER TABLE "SchLog"."TblLog_TransactionHistory_RMV_8000000000027" OWNER TO "SysEngine";

--
-- TOC entry 357 (class 1259 OID 1934360)
-- Name: TblLog_TransactionHistory_RMV_8000000000028; Type: TABLE; Schema: SchLog; Owner: SysEngine
--

CREATE TABLE "SchLog"."TblLog_TransactionHistory_RMV_8000000000028" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchLog"."TblLog_TransactionHistory_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "Source_RefPID" bigint,
    "Source_RefSID" bigint,
    "Source_RefRPK" bigint,
    "Source_EntryDateTimeTZ" timestamp with time zone,
    "Content" json,
    "Source_RefHeaderID" bigint,
    "Type" character varying(32)
);


ALTER TABLE "SchLog"."TblLog_TransactionHistory_RMV_8000000000028" OWNER TO "SysEngine";

--
-- TOC entry 358 (class 1259 OID 1934367)
-- Name: TblLog_TransactionHistory_RMV_8000000000029; Type: TABLE; Schema: SchLog; Owner: SysEngine
--

CREATE TABLE "SchLog"."TblLog_TransactionHistory_RMV_8000000000029" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchLog"."TblLog_TransactionHistory_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "Source_RefPID" bigint,
    "Source_RefSID" bigint,
    "Source_RefRPK" bigint,
    "Source_EntryDateTimeTZ" timestamp with time zone,
    "Content" json,
    "Source_RefHeaderID" bigint,
    "Type" character varying(32)
);


ALTER TABLE "SchLog"."TblLog_TransactionHistory_RMV_8000000000029" OWNER TO "SysEngine";

--
-- TOC entry 359 (class 1259 OID 1934374)
-- Name: TblLog_TransactionHistory_RMV_8000000000030; Type: TABLE; Schema: SchLog; Owner: SysEngine
--

CREATE TABLE "SchLog"."TblLog_TransactionHistory_RMV_8000000000030" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchLog"."TblLog_TransactionHistory_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "Source_RefPID" bigint,
    "Source_RefSID" bigint,
    "Source_RefRPK" bigint,
    "Source_EntryDateTimeTZ" timestamp with time zone,
    "Content" json,
    "Source_RefHeaderID" bigint,
    "Type" character varying(32)
);


ALTER TABLE "SchLog"."TblLog_TransactionHistory_RMV_8000000000030" OWNER TO "SysEngine";

--
-- TOC entry 360 (class 1259 OID 1934381)
-- Name: TblLog_TransactionHistory_RMV_8000000000031; Type: TABLE; Schema: SchLog; Owner: SysEngine
--

CREATE TABLE "SchLog"."TblLog_TransactionHistory_RMV_8000000000031" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint DEFAULT nextval('"SchLog"."TblLog_TransactionHistory_Sys_RPK_seq"'::regclass) NOT NULL,
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
    "Sys_Data_Validity_StartDateTimeTZ" timestamp with time zone,
    "Sys_Data_Validity_FinishDateTimeTZ" timestamp with time zone,
    "Sys_Partition_RemovableRecord_Key_RefID" bigint,
    "Sys_Branch_RefID" bigint,
    "Sys_BaseCurrency_RefID" bigint,
    "Sys_DataIntegrityShadow" character varying(32),
    "Source_RefPID" bigint,
    "Source_RefSID" bigint,
    "Source_RefRPK" bigint,
    "Source_EntryDateTimeTZ" timestamp with time zone,
    "Content" json,
    "Source_RefHeaderID" bigint,
    "Type" character varying(32)
);


ALTER TABLE "SchLog"."TblLog_TransactionHistory_RMV_8000000000031" OWNER TO "SysEngine";

--
-- TOC entry 361 (class 1259 OID 1934388)
-- Name: TblTEMPLog_TransactionHistory; Type: TABLE; Schema: SchLog; Owner: SysAdmin
--

CREATE TABLE "SchLog"."TblTEMPLog_TransactionHistory" (
    "Sys_PID" bigint,
    "Sys_SID" bigint,
    "Sys_RPK" bigint,
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
    "Source_RefPID" bigint,
    "Source_RefSID" bigint,
    "Source_RefRPK" bigint,
    "Source_EntryDateTimeTZ" timestamp with time zone,
    "Content" json,
    "Source_RefHeaderID" bigint,
    "Type" character varying(32)
);


ALTER TABLE "SchLog"."TblTEMPLog_TransactionHistory" OWNER TO "SysAdmin";

--
-- TOC entry 3867 (class 0 OID 0)
-- Name: TblLog_Device_PersonAccessFetch_DEF; Type: TABLE ATTACH; Schema: SchAcquisition; Owner: SysEngine
--

ALTER TABLE ONLY "SchAcquisition"."TblLog_Device_PersonAccessFetch" ATTACH PARTITION "SchAcquisition"."TblLog_Device_PersonAccessFetch_DEF" DEFAULT;


--
-- TOC entry 3868 (class 0 OID 0)
-- Name: TblLog_Device_PersonAccessFetch_PMT; Type: TABLE ATTACH; Schema: SchAcquisition; Owner: SysEngine
--

ALTER TABLE ONLY "SchAcquisition"."TblLog_Device_PersonAccessFetch" ATTACH PARTITION "SchAcquisition"."TblLog_Device_PersonAccessFetch_PMT" FOR VALUES IN (NULL);


--
-- TOC entry 3869 (class 0 OID 0)
-- Name: TblLog_Device_PersonAccessFetch_RMV; Type: TABLE ATTACH; Schema: SchAcquisition; Owner: SysEngine
--

ALTER TABLE ONLY "SchAcquisition"."TblLog_Device_PersonAccessFetch" ATTACH PARTITION "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV" FOR VALUES IN ('8000000000001', '8000000000002', '8000000000003', '8000000000004', '8000000000005', '8000000000006', '8000000000007', '8000000000008', '8000000000009', '8000000000010', '8000000000011', '8000000000012', '8000000000013', '8000000000014', '8000000000015', '8000000000016', '8000000000017', '8000000000018', '8000000000019', '8000000000020', '8000000000021', '8000000000022', '8000000000023', '8000000000024', '8000000000025', '8000000000026', '8000000000027', '8000000000028', '8000000000029', '8000000000030', '8000000000031');


--
-- TOC entry 3870 (class 0 OID 0)
-- Name: TblLog_Device_PersonAccessFetch_RMV_8000000000001; Type: TABLE ATTACH; Schema: SchAcquisition; Owner: SysEngine
--

ALTER TABLE ONLY "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV" ATTACH PARTITION "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000001" FOR VALUES IN ('8000000000001');


--
-- TOC entry 3871 (class 0 OID 0)
-- Name: TblLog_Device_PersonAccessFetch_RMV_8000000000002; Type: TABLE ATTACH; Schema: SchAcquisition; Owner: SysEngine
--

ALTER TABLE ONLY "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV" ATTACH PARTITION "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000002" FOR VALUES IN ('8000000000002');


--
-- TOC entry 3872 (class 0 OID 0)
-- Name: TblLog_Device_PersonAccessFetch_RMV_8000000000003; Type: TABLE ATTACH; Schema: SchAcquisition; Owner: SysEngine
--

ALTER TABLE ONLY "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV" ATTACH PARTITION "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000003" FOR VALUES IN ('8000000000003');


--
-- TOC entry 3873 (class 0 OID 0)
-- Name: TblLog_Device_PersonAccessFetch_RMV_8000000000004; Type: TABLE ATTACH; Schema: SchAcquisition; Owner: SysEngine
--

ALTER TABLE ONLY "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV" ATTACH PARTITION "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000004" FOR VALUES IN ('8000000000004');


--
-- TOC entry 3874 (class 0 OID 0)
-- Name: TblLog_Device_PersonAccessFetch_RMV_8000000000005; Type: TABLE ATTACH; Schema: SchAcquisition; Owner: SysEngine
--

ALTER TABLE ONLY "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV" ATTACH PARTITION "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000005" FOR VALUES IN ('8000000000005');


--
-- TOC entry 3875 (class 0 OID 0)
-- Name: TblLog_Device_PersonAccessFetch_RMV_8000000000006; Type: TABLE ATTACH; Schema: SchAcquisition; Owner: SysEngine
--

ALTER TABLE ONLY "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV" ATTACH PARTITION "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000006" FOR VALUES IN ('8000000000006');


--
-- TOC entry 3876 (class 0 OID 0)
-- Name: TblLog_Device_PersonAccessFetch_RMV_8000000000007; Type: TABLE ATTACH; Schema: SchAcquisition; Owner: SysEngine
--

ALTER TABLE ONLY "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV" ATTACH PARTITION "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000007" FOR VALUES IN ('8000000000007');


--
-- TOC entry 3877 (class 0 OID 0)
-- Name: TblLog_Device_PersonAccessFetch_RMV_8000000000008; Type: TABLE ATTACH; Schema: SchAcquisition; Owner: SysEngine
--

ALTER TABLE ONLY "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV" ATTACH PARTITION "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000008" FOR VALUES IN ('8000000000008');


--
-- TOC entry 3878 (class 0 OID 0)
-- Name: TblLog_Device_PersonAccessFetch_RMV_8000000000009; Type: TABLE ATTACH; Schema: SchAcquisition; Owner: SysEngine
--

ALTER TABLE ONLY "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV" ATTACH PARTITION "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000009" FOR VALUES IN ('8000000000009');


--
-- TOC entry 3879 (class 0 OID 0)
-- Name: TblLog_Device_PersonAccessFetch_RMV_8000000000010; Type: TABLE ATTACH; Schema: SchAcquisition; Owner: SysEngine
--

ALTER TABLE ONLY "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV" ATTACH PARTITION "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000010" FOR VALUES IN ('8000000000010');


--
-- TOC entry 3880 (class 0 OID 0)
-- Name: TblLog_Device_PersonAccessFetch_RMV_8000000000011; Type: TABLE ATTACH; Schema: SchAcquisition; Owner: SysEngine
--

ALTER TABLE ONLY "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV" ATTACH PARTITION "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000011" FOR VALUES IN ('8000000000011');


--
-- TOC entry 3881 (class 0 OID 0)
-- Name: TblLog_Device_PersonAccessFetch_RMV_8000000000012; Type: TABLE ATTACH; Schema: SchAcquisition; Owner: SysEngine
--

ALTER TABLE ONLY "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV" ATTACH PARTITION "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000012" FOR VALUES IN ('8000000000012');


--
-- TOC entry 3882 (class 0 OID 0)
-- Name: TblLog_Device_PersonAccessFetch_RMV_8000000000013; Type: TABLE ATTACH; Schema: SchAcquisition; Owner: SysEngine
--

ALTER TABLE ONLY "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV" ATTACH PARTITION "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000013" FOR VALUES IN ('8000000000013');


--
-- TOC entry 3883 (class 0 OID 0)
-- Name: TblLog_Device_PersonAccessFetch_RMV_8000000000014; Type: TABLE ATTACH; Schema: SchAcquisition; Owner: SysEngine
--

ALTER TABLE ONLY "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV" ATTACH PARTITION "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000014" FOR VALUES IN ('8000000000014');


--
-- TOC entry 3884 (class 0 OID 0)
-- Name: TblLog_Device_PersonAccessFetch_RMV_8000000000015; Type: TABLE ATTACH; Schema: SchAcquisition; Owner: SysEngine
--

ALTER TABLE ONLY "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV" ATTACH PARTITION "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000015" FOR VALUES IN ('8000000000015');


--
-- TOC entry 3885 (class 0 OID 0)
-- Name: TblLog_Device_PersonAccessFetch_RMV_8000000000016; Type: TABLE ATTACH; Schema: SchAcquisition; Owner: SysEngine
--

ALTER TABLE ONLY "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV" ATTACH PARTITION "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000016" FOR VALUES IN ('8000000000016');


--
-- TOC entry 3886 (class 0 OID 0)
-- Name: TblLog_Device_PersonAccessFetch_RMV_8000000000017; Type: TABLE ATTACH; Schema: SchAcquisition; Owner: SysEngine
--

ALTER TABLE ONLY "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV" ATTACH PARTITION "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000017" FOR VALUES IN ('8000000000017');


--
-- TOC entry 3887 (class 0 OID 0)
-- Name: TblLog_Device_PersonAccessFetch_RMV_8000000000018; Type: TABLE ATTACH; Schema: SchAcquisition; Owner: SysEngine
--

ALTER TABLE ONLY "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV" ATTACH PARTITION "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000018" FOR VALUES IN ('8000000000018');


--
-- TOC entry 3888 (class 0 OID 0)
-- Name: TblLog_Device_PersonAccessFetch_RMV_8000000000019; Type: TABLE ATTACH; Schema: SchAcquisition; Owner: SysEngine
--

ALTER TABLE ONLY "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV" ATTACH PARTITION "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000019" FOR VALUES IN ('8000000000019');


--
-- TOC entry 3889 (class 0 OID 0)
-- Name: TblLog_Device_PersonAccessFetch_RMV_8000000000020; Type: TABLE ATTACH; Schema: SchAcquisition; Owner: SysEngine
--

ALTER TABLE ONLY "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV" ATTACH PARTITION "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000020" FOR VALUES IN ('8000000000020');


--
-- TOC entry 3890 (class 0 OID 0)
-- Name: TblLog_Device_PersonAccessFetch_RMV_8000000000021; Type: TABLE ATTACH; Schema: SchAcquisition; Owner: SysEngine
--

ALTER TABLE ONLY "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV" ATTACH PARTITION "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000021" FOR VALUES IN ('8000000000021');


--
-- TOC entry 3891 (class 0 OID 0)
-- Name: TblLog_Device_PersonAccessFetch_RMV_8000000000022; Type: TABLE ATTACH; Schema: SchAcquisition; Owner: SysEngine
--

ALTER TABLE ONLY "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV" ATTACH PARTITION "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000022" FOR VALUES IN ('8000000000022');


--
-- TOC entry 3892 (class 0 OID 0)
-- Name: TblLog_Device_PersonAccessFetch_RMV_8000000000023; Type: TABLE ATTACH; Schema: SchAcquisition; Owner: SysEngine
--

ALTER TABLE ONLY "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV" ATTACH PARTITION "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000023" FOR VALUES IN ('8000000000023');


--
-- TOC entry 3893 (class 0 OID 0)
-- Name: TblLog_Device_PersonAccessFetch_RMV_8000000000024; Type: TABLE ATTACH; Schema: SchAcquisition; Owner: SysEngine
--

ALTER TABLE ONLY "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV" ATTACH PARTITION "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000024" FOR VALUES IN ('8000000000024');


--
-- TOC entry 3894 (class 0 OID 0)
-- Name: TblLog_Device_PersonAccessFetch_RMV_8000000000025; Type: TABLE ATTACH; Schema: SchAcquisition; Owner: SysEngine
--

ALTER TABLE ONLY "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV" ATTACH PARTITION "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000025" FOR VALUES IN ('8000000000025');


--
-- TOC entry 3895 (class 0 OID 0)
-- Name: TblLog_Device_PersonAccessFetch_RMV_8000000000026; Type: TABLE ATTACH; Schema: SchAcquisition; Owner: SysEngine
--

ALTER TABLE ONLY "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV" ATTACH PARTITION "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000026" FOR VALUES IN ('8000000000026');


--
-- TOC entry 3896 (class 0 OID 0)
-- Name: TblLog_Device_PersonAccessFetch_RMV_8000000000027; Type: TABLE ATTACH; Schema: SchAcquisition; Owner: SysEngine
--

ALTER TABLE ONLY "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV" ATTACH PARTITION "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000027" FOR VALUES IN ('8000000000027');


--
-- TOC entry 3897 (class 0 OID 0)
-- Name: TblLog_Device_PersonAccessFetch_RMV_8000000000028; Type: TABLE ATTACH; Schema: SchAcquisition; Owner: SysEngine
--

ALTER TABLE ONLY "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV" ATTACH PARTITION "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000028" FOR VALUES IN ('8000000000028');


--
-- TOC entry 3898 (class 0 OID 0)
-- Name: TblLog_Device_PersonAccessFetch_RMV_8000000000029; Type: TABLE ATTACH; Schema: SchAcquisition; Owner: SysEngine
--

ALTER TABLE ONLY "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV" ATTACH PARTITION "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000029" FOR VALUES IN ('8000000000029');


--
-- TOC entry 3899 (class 0 OID 0)
-- Name: TblLog_Device_PersonAccessFetch_RMV_8000000000030; Type: TABLE ATTACH; Schema: SchAcquisition; Owner: SysEngine
--

ALTER TABLE ONLY "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV" ATTACH PARTITION "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000030" FOR VALUES IN ('8000000000030');


--
-- TOC entry 3900 (class 0 OID 0)
-- Name: TblLog_Device_PersonAccessFetch_RMV_8000000000031; Type: TABLE ATTACH; Schema: SchAcquisition; Owner: SysEngine
--

ALTER TABLE ONLY "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV" ATTACH PARTITION "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000031" FOR VALUES IN ('8000000000031');


--
-- TOC entry 3901 (class 0 OID 0)
-- Name: TblLog_Device_PersonAccess_DEF; Type: TABLE ATTACH; Schema: SchAcquisition; Owner: SysEngine
--

ALTER TABLE ONLY "SchAcquisition"."TblLog_Device_PersonAccess" ATTACH PARTITION "SchAcquisition"."TblLog_Device_PersonAccess_DEF" DEFAULT;


--
-- TOC entry 3902 (class 0 OID 0)
-- Name: TblLog_Device_PersonAccess_PMT; Type: TABLE ATTACH; Schema: SchAcquisition; Owner: SysEngine
--

ALTER TABLE ONLY "SchAcquisition"."TblLog_Device_PersonAccess" ATTACH PARTITION "SchAcquisition"."TblLog_Device_PersonAccess_PMT" FOR VALUES IN (NULL);


--
-- TOC entry 3903 (class 0 OID 0)
-- Name: TblLog_Device_PersonAccess_RMV; Type: TABLE ATTACH; Schema: SchAcquisition; Owner: SysEngine
--

ALTER TABLE ONLY "SchAcquisition"."TblLog_Device_PersonAccess" ATTACH PARTITION "SchAcquisition"."TblLog_Device_PersonAccess_RMV" FOR VALUES IN ('8000000000001', '8000000000002', '8000000000003', '8000000000004', '8000000000005', '8000000000006', '8000000000007', '8000000000008', '8000000000009', '8000000000010', '8000000000011', '8000000000012', '8000000000013', '8000000000014', '8000000000015', '8000000000016', '8000000000017', '8000000000018', '8000000000019', '8000000000020', '8000000000021', '8000000000022', '8000000000023', '8000000000024', '8000000000025', '8000000000026', '8000000000027', '8000000000028', '8000000000029', '8000000000030', '8000000000031');


--
-- TOC entry 3904 (class 0 OID 0)
-- Name: TblLog_Device_PersonAccess_RMV_8000000000001; Type: TABLE ATTACH; Schema: SchAcquisition; Owner: SysEngine
--

ALTER TABLE ONLY "SchAcquisition"."TblLog_Device_PersonAccess_RMV" ATTACH PARTITION "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000001" FOR VALUES IN ('8000000000001');


--
-- TOC entry 3905 (class 0 OID 0)
-- Name: TblLog_Device_PersonAccess_RMV_8000000000002; Type: TABLE ATTACH; Schema: SchAcquisition; Owner: SysEngine
--

ALTER TABLE ONLY "SchAcquisition"."TblLog_Device_PersonAccess_RMV" ATTACH PARTITION "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000002" FOR VALUES IN ('8000000000002');


--
-- TOC entry 3906 (class 0 OID 0)
-- Name: TblLog_Device_PersonAccess_RMV_8000000000003; Type: TABLE ATTACH; Schema: SchAcquisition; Owner: SysEngine
--

ALTER TABLE ONLY "SchAcquisition"."TblLog_Device_PersonAccess_RMV" ATTACH PARTITION "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000003" FOR VALUES IN ('8000000000003');


--
-- TOC entry 3907 (class 0 OID 0)
-- Name: TblLog_Device_PersonAccess_RMV_8000000000004; Type: TABLE ATTACH; Schema: SchAcquisition; Owner: SysEngine
--

ALTER TABLE ONLY "SchAcquisition"."TblLog_Device_PersonAccess_RMV" ATTACH PARTITION "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000004" FOR VALUES IN ('8000000000004');


--
-- TOC entry 3908 (class 0 OID 0)
-- Name: TblLog_Device_PersonAccess_RMV_8000000000005; Type: TABLE ATTACH; Schema: SchAcquisition; Owner: SysEngine
--

ALTER TABLE ONLY "SchAcquisition"."TblLog_Device_PersonAccess_RMV" ATTACH PARTITION "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000005" FOR VALUES IN ('8000000000005');


--
-- TOC entry 3909 (class 0 OID 0)
-- Name: TblLog_Device_PersonAccess_RMV_8000000000006; Type: TABLE ATTACH; Schema: SchAcquisition; Owner: SysEngine
--

ALTER TABLE ONLY "SchAcquisition"."TblLog_Device_PersonAccess_RMV" ATTACH PARTITION "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000006" FOR VALUES IN ('8000000000006');


--
-- TOC entry 3910 (class 0 OID 0)
-- Name: TblLog_Device_PersonAccess_RMV_8000000000007; Type: TABLE ATTACH; Schema: SchAcquisition; Owner: SysEngine
--

ALTER TABLE ONLY "SchAcquisition"."TblLog_Device_PersonAccess_RMV" ATTACH PARTITION "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000007" FOR VALUES IN ('8000000000007');


--
-- TOC entry 3911 (class 0 OID 0)
-- Name: TblLog_Device_PersonAccess_RMV_8000000000008; Type: TABLE ATTACH; Schema: SchAcquisition; Owner: SysEngine
--

ALTER TABLE ONLY "SchAcquisition"."TblLog_Device_PersonAccess_RMV" ATTACH PARTITION "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000008" FOR VALUES IN ('8000000000008');


--
-- TOC entry 3912 (class 0 OID 0)
-- Name: TblLog_Device_PersonAccess_RMV_8000000000009; Type: TABLE ATTACH; Schema: SchAcquisition; Owner: SysEngine
--

ALTER TABLE ONLY "SchAcquisition"."TblLog_Device_PersonAccess_RMV" ATTACH PARTITION "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000009" FOR VALUES IN ('8000000000009');


--
-- TOC entry 3913 (class 0 OID 0)
-- Name: TblLog_Device_PersonAccess_RMV_8000000000010; Type: TABLE ATTACH; Schema: SchAcquisition; Owner: SysEngine
--

ALTER TABLE ONLY "SchAcquisition"."TblLog_Device_PersonAccess_RMV" ATTACH PARTITION "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000010" FOR VALUES IN ('8000000000010');


--
-- TOC entry 3914 (class 0 OID 0)
-- Name: TblLog_Device_PersonAccess_RMV_8000000000011; Type: TABLE ATTACH; Schema: SchAcquisition; Owner: SysEngine
--

ALTER TABLE ONLY "SchAcquisition"."TblLog_Device_PersonAccess_RMV" ATTACH PARTITION "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000011" FOR VALUES IN ('8000000000011');


--
-- TOC entry 3915 (class 0 OID 0)
-- Name: TblLog_Device_PersonAccess_RMV_8000000000012; Type: TABLE ATTACH; Schema: SchAcquisition; Owner: SysEngine
--

ALTER TABLE ONLY "SchAcquisition"."TblLog_Device_PersonAccess_RMV" ATTACH PARTITION "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000012" FOR VALUES IN ('8000000000012');


--
-- TOC entry 3916 (class 0 OID 0)
-- Name: TblLog_Device_PersonAccess_RMV_8000000000013; Type: TABLE ATTACH; Schema: SchAcquisition; Owner: SysEngine
--

ALTER TABLE ONLY "SchAcquisition"."TblLog_Device_PersonAccess_RMV" ATTACH PARTITION "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000013" FOR VALUES IN ('8000000000013');


--
-- TOC entry 3917 (class 0 OID 0)
-- Name: TblLog_Device_PersonAccess_RMV_8000000000014; Type: TABLE ATTACH; Schema: SchAcquisition; Owner: SysEngine
--

ALTER TABLE ONLY "SchAcquisition"."TblLog_Device_PersonAccess_RMV" ATTACH PARTITION "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000014" FOR VALUES IN ('8000000000014');


--
-- TOC entry 3918 (class 0 OID 0)
-- Name: TblLog_Device_PersonAccess_RMV_8000000000015; Type: TABLE ATTACH; Schema: SchAcquisition; Owner: SysEngine
--

ALTER TABLE ONLY "SchAcquisition"."TblLog_Device_PersonAccess_RMV" ATTACH PARTITION "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000015" FOR VALUES IN ('8000000000015');


--
-- TOC entry 3919 (class 0 OID 0)
-- Name: TblLog_Device_PersonAccess_RMV_8000000000016; Type: TABLE ATTACH; Schema: SchAcquisition; Owner: SysEngine
--

ALTER TABLE ONLY "SchAcquisition"."TblLog_Device_PersonAccess_RMV" ATTACH PARTITION "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000016" FOR VALUES IN ('8000000000016');


--
-- TOC entry 3920 (class 0 OID 0)
-- Name: TblLog_Device_PersonAccess_RMV_8000000000017; Type: TABLE ATTACH; Schema: SchAcquisition; Owner: SysEngine
--

ALTER TABLE ONLY "SchAcquisition"."TblLog_Device_PersonAccess_RMV" ATTACH PARTITION "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000017" FOR VALUES IN ('8000000000017');


--
-- TOC entry 3921 (class 0 OID 0)
-- Name: TblLog_Device_PersonAccess_RMV_8000000000018; Type: TABLE ATTACH; Schema: SchAcquisition; Owner: SysEngine
--

ALTER TABLE ONLY "SchAcquisition"."TblLog_Device_PersonAccess_RMV" ATTACH PARTITION "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000018" FOR VALUES IN ('8000000000018');


--
-- TOC entry 3922 (class 0 OID 0)
-- Name: TblLog_Device_PersonAccess_RMV_8000000000019; Type: TABLE ATTACH; Schema: SchAcquisition; Owner: SysEngine
--

ALTER TABLE ONLY "SchAcquisition"."TblLog_Device_PersonAccess_RMV" ATTACH PARTITION "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000019" FOR VALUES IN ('8000000000019');


--
-- TOC entry 3923 (class 0 OID 0)
-- Name: TblLog_Device_PersonAccess_RMV_8000000000020; Type: TABLE ATTACH; Schema: SchAcquisition; Owner: SysEngine
--

ALTER TABLE ONLY "SchAcquisition"."TblLog_Device_PersonAccess_RMV" ATTACH PARTITION "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000020" FOR VALUES IN ('8000000000020');


--
-- TOC entry 3924 (class 0 OID 0)
-- Name: TblLog_Device_PersonAccess_RMV_8000000000021; Type: TABLE ATTACH; Schema: SchAcquisition; Owner: SysEngine
--

ALTER TABLE ONLY "SchAcquisition"."TblLog_Device_PersonAccess_RMV" ATTACH PARTITION "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000021" FOR VALUES IN ('8000000000021');


--
-- TOC entry 3925 (class 0 OID 0)
-- Name: TblLog_Device_PersonAccess_RMV_8000000000022; Type: TABLE ATTACH; Schema: SchAcquisition; Owner: SysEngine
--

ALTER TABLE ONLY "SchAcquisition"."TblLog_Device_PersonAccess_RMV" ATTACH PARTITION "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000022" FOR VALUES IN ('8000000000022');


--
-- TOC entry 3926 (class 0 OID 0)
-- Name: TblLog_Device_PersonAccess_RMV_8000000000023; Type: TABLE ATTACH; Schema: SchAcquisition; Owner: SysEngine
--

ALTER TABLE ONLY "SchAcquisition"."TblLog_Device_PersonAccess_RMV" ATTACH PARTITION "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000023" FOR VALUES IN ('8000000000023');


--
-- TOC entry 3927 (class 0 OID 0)
-- Name: TblLog_Device_PersonAccess_RMV_8000000000024; Type: TABLE ATTACH; Schema: SchAcquisition; Owner: SysEngine
--

ALTER TABLE ONLY "SchAcquisition"."TblLog_Device_PersonAccess_RMV" ATTACH PARTITION "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000024" FOR VALUES IN ('8000000000024');


--
-- TOC entry 3928 (class 0 OID 0)
-- Name: TblLog_Device_PersonAccess_RMV_8000000000025; Type: TABLE ATTACH; Schema: SchAcquisition; Owner: SysEngine
--

ALTER TABLE ONLY "SchAcquisition"."TblLog_Device_PersonAccess_RMV" ATTACH PARTITION "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000025" FOR VALUES IN ('8000000000025');


--
-- TOC entry 3929 (class 0 OID 0)
-- Name: TblLog_Device_PersonAccess_RMV_8000000000026; Type: TABLE ATTACH; Schema: SchAcquisition; Owner: SysEngine
--

ALTER TABLE ONLY "SchAcquisition"."TblLog_Device_PersonAccess_RMV" ATTACH PARTITION "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000026" FOR VALUES IN ('8000000000026');


--
-- TOC entry 3930 (class 0 OID 0)
-- Name: TblLog_Device_PersonAccess_RMV_8000000000027; Type: TABLE ATTACH; Schema: SchAcquisition; Owner: SysEngine
--

ALTER TABLE ONLY "SchAcquisition"."TblLog_Device_PersonAccess_RMV" ATTACH PARTITION "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000027" FOR VALUES IN ('8000000000027');


--
-- TOC entry 3931 (class 0 OID 0)
-- Name: TblLog_Device_PersonAccess_RMV_8000000000028; Type: TABLE ATTACH; Schema: SchAcquisition; Owner: SysEngine
--

ALTER TABLE ONLY "SchAcquisition"."TblLog_Device_PersonAccess_RMV" ATTACH PARTITION "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000028" FOR VALUES IN ('8000000000028');


--
-- TOC entry 3932 (class 0 OID 0)
-- Name: TblLog_Device_PersonAccess_RMV_8000000000029; Type: TABLE ATTACH; Schema: SchAcquisition; Owner: SysEngine
--

ALTER TABLE ONLY "SchAcquisition"."TblLog_Device_PersonAccess_RMV" ATTACH PARTITION "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000029" FOR VALUES IN ('8000000000029');


--
-- TOC entry 3933 (class 0 OID 0)
-- Name: TblLog_Device_PersonAccess_RMV_8000000000030; Type: TABLE ATTACH; Schema: SchAcquisition; Owner: SysEngine
--

ALTER TABLE ONLY "SchAcquisition"."TblLog_Device_PersonAccess_RMV" ATTACH PARTITION "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000030" FOR VALUES IN ('8000000000030');


--
-- TOC entry 3934 (class 0 OID 0)
-- Name: TblLog_Device_PersonAccess_RMV_8000000000031; Type: TABLE ATTACH; Schema: SchAcquisition; Owner: SysEngine
--

ALTER TABLE ONLY "SchAcquisition"."TblLog_Device_PersonAccess_RMV" ATTACH PARTITION "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000031" FOR VALUES IN ('8000000000031');


--
-- TOC entry 3935 (class 0 OID 0)
-- Name: TblLog_TransactionHistory_DEF; Type: TABLE ATTACH; Schema: SchLog; Owner: SysEngine
--

ALTER TABLE ONLY "SchLog"."TblLog_TransactionHistory" ATTACH PARTITION "SchLog"."TblLog_TransactionHistory_DEF" DEFAULT;


--
-- TOC entry 3936 (class 0 OID 0)
-- Name: TblLog_TransactionHistory_PMT; Type: TABLE ATTACH; Schema: SchLog; Owner: SysEngine
--

ALTER TABLE ONLY "SchLog"."TblLog_TransactionHistory" ATTACH PARTITION "SchLog"."TblLog_TransactionHistory_PMT" FOR VALUES IN (NULL);


--
-- TOC entry 3937 (class 0 OID 0)
-- Name: TblLog_TransactionHistory_RMV; Type: TABLE ATTACH; Schema: SchLog; Owner: SysEngine
--

ALTER TABLE ONLY "SchLog"."TblLog_TransactionHistory" ATTACH PARTITION "SchLog"."TblLog_TransactionHistory_RMV" FOR VALUES IN ('8000000000001', '8000000000002', '8000000000003', '8000000000004', '8000000000005', '8000000000006', '8000000000007', '8000000000008', '8000000000009', '8000000000010', '8000000000011', '8000000000012', '8000000000013', '8000000000014', '8000000000015', '8000000000016', '8000000000017', '8000000000018', '8000000000019', '8000000000020', '8000000000021', '8000000000022', '8000000000023', '8000000000024', '8000000000025', '8000000000026', '8000000000027', '8000000000028', '8000000000029', '8000000000030', '8000000000031');


--
-- TOC entry 3938 (class 0 OID 0)
-- Name: TblLog_TransactionHistory_RMV_8000000000001; Type: TABLE ATTACH; Schema: SchLog; Owner: SysEngine
--

ALTER TABLE ONLY "SchLog"."TblLog_TransactionHistory_RMV" ATTACH PARTITION "SchLog"."TblLog_TransactionHistory_RMV_8000000000001" FOR VALUES IN ('8000000000001');


--
-- TOC entry 3939 (class 0 OID 0)
-- Name: TblLog_TransactionHistory_RMV_8000000000002; Type: TABLE ATTACH; Schema: SchLog; Owner: SysEngine
--

ALTER TABLE ONLY "SchLog"."TblLog_TransactionHistory_RMV" ATTACH PARTITION "SchLog"."TblLog_TransactionHistory_RMV_8000000000002" FOR VALUES IN ('8000000000002');


--
-- TOC entry 3940 (class 0 OID 0)
-- Name: TblLog_TransactionHistory_RMV_8000000000003; Type: TABLE ATTACH; Schema: SchLog; Owner: SysEngine
--

ALTER TABLE ONLY "SchLog"."TblLog_TransactionHistory_RMV" ATTACH PARTITION "SchLog"."TblLog_TransactionHistory_RMV_8000000000003" FOR VALUES IN ('8000000000003');


--
-- TOC entry 3941 (class 0 OID 0)
-- Name: TblLog_TransactionHistory_RMV_8000000000004; Type: TABLE ATTACH; Schema: SchLog; Owner: SysEngine
--

ALTER TABLE ONLY "SchLog"."TblLog_TransactionHistory_RMV" ATTACH PARTITION "SchLog"."TblLog_TransactionHistory_RMV_8000000000004" FOR VALUES IN ('8000000000004');


--
-- TOC entry 3942 (class 0 OID 0)
-- Name: TblLog_TransactionHistory_RMV_8000000000005; Type: TABLE ATTACH; Schema: SchLog; Owner: SysEngine
--

ALTER TABLE ONLY "SchLog"."TblLog_TransactionHistory_RMV" ATTACH PARTITION "SchLog"."TblLog_TransactionHistory_RMV_8000000000005" FOR VALUES IN ('8000000000005');


--
-- TOC entry 3943 (class 0 OID 0)
-- Name: TblLog_TransactionHistory_RMV_8000000000006; Type: TABLE ATTACH; Schema: SchLog; Owner: SysEngine
--

ALTER TABLE ONLY "SchLog"."TblLog_TransactionHistory_RMV" ATTACH PARTITION "SchLog"."TblLog_TransactionHistory_RMV_8000000000006" FOR VALUES IN ('8000000000006');


--
-- TOC entry 3944 (class 0 OID 0)
-- Name: TblLog_TransactionHistory_RMV_8000000000007; Type: TABLE ATTACH; Schema: SchLog; Owner: SysEngine
--

ALTER TABLE ONLY "SchLog"."TblLog_TransactionHistory_RMV" ATTACH PARTITION "SchLog"."TblLog_TransactionHistory_RMV_8000000000007" FOR VALUES IN ('8000000000007');


--
-- TOC entry 3945 (class 0 OID 0)
-- Name: TblLog_TransactionHistory_RMV_8000000000008; Type: TABLE ATTACH; Schema: SchLog; Owner: SysEngine
--

ALTER TABLE ONLY "SchLog"."TblLog_TransactionHistory_RMV" ATTACH PARTITION "SchLog"."TblLog_TransactionHistory_RMV_8000000000008" FOR VALUES IN ('8000000000008');


--
-- TOC entry 3946 (class 0 OID 0)
-- Name: TblLog_TransactionHistory_RMV_8000000000009; Type: TABLE ATTACH; Schema: SchLog; Owner: SysEngine
--

ALTER TABLE ONLY "SchLog"."TblLog_TransactionHistory_RMV" ATTACH PARTITION "SchLog"."TblLog_TransactionHistory_RMV_8000000000009" FOR VALUES IN ('8000000000009');


--
-- TOC entry 3947 (class 0 OID 0)
-- Name: TblLog_TransactionHistory_RMV_8000000000010; Type: TABLE ATTACH; Schema: SchLog; Owner: SysEngine
--

ALTER TABLE ONLY "SchLog"."TblLog_TransactionHistory_RMV" ATTACH PARTITION "SchLog"."TblLog_TransactionHistory_RMV_8000000000010" FOR VALUES IN ('8000000000010');


--
-- TOC entry 3948 (class 0 OID 0)
-- Name: TblLog_TransactionHistory_RMV_8000000000011; Type: TABLE ATTACH; Schema: SchLog; Owner: SysEngine
--

ALTER TABLE ONLY "SchLog"."TblLog_TransactionHistory_RMV" ATTACH PARTITION "SchLog"."TblLog_TransactionHistory_RMV_8000000000011" FOR VALUES IN ('8000000000011');


--
-- TOC entry 3949 (class 0 OID 0)
-- Name: TblLog_TransactionHistory_RMV_8000000000012; Type: TABLE ATTACH; Schema: SchLog; Owner: SysEngine
--

ALTER TABLE ONLY "SchLog"."TblLog_TransactionHistory_RMV" ATTACH PARTITION "SchLog"."TblLog_TransactionHistory_RMV_8000000000012" FOR VALUES IN ('8000000000012');


--
-- TOC entry 3950 (class 0 OID 0)
-- Name: TblLog_TransactionHistory_RMV_8000000000013; Type: TABLE ATTACH; Schema: SchLog; Owner: SysEngine
--

ALTER TABLE ONLY "SchLog"."TblLog_TransactionHistory_RMV" ATTACH PARTITION "SchLog"."TblLog_TransactionHistory_RMV_8000000000013" FOR VALUES IN ('8000000000013');


--
-- TOC entry 3951 (class 0 OID 0)
-- Name: TblLog_TransactionHistory_RMV_8000000000014; Type: TABLE ATTACH; Schema: SchLog; Owner: SysEngine
--

ALTER TABLE ONLY "SchLog"."TblLog_TransactionHistory_RMV" ATTACH PARTITION "SchLog"."TblLog_TransactionHistory_RMV_8000000000014" FOR VALUES IN ('8000000000014');


--
-- TOC entry 3952 (class 0 OID 0)
-- Name: TblLog_TransactionHistory_RMV_8000000000015; Type: TABLE ATTACH; Schema: SchLog; Owner: SysEngine
--

ALTER TABLE ONLY "SchLog"."TblLog_TransactionHistory_RMV" ATTACH PARTITION "SchLog"."TblLog_TransactionHistory_RMV_8000000000015" FOR VALUES IN ('8000000000015');


--
-- TOC entry 3953 (class 0 OID 0)
-- Name: TblLog_TransactionHistory_RMV_8000000000016; Type: TABLE ATTACH; Schema: SchLog; Owner: SysEngine
--

ALTER TABLE ONLY "SchLog"."TblLog_TransactionHistory_RMV" ATTACH PARTITION "SchLog"."TblLog_TransactionHistory_RMV_8000000000016" FOR VALUES IN ('8000000000016');


--
-- TOC entry 3954 (class 0 OID 0)
-- Name: TblLog_TransactionHistory_RMV_8000000000017; Type: TABLE ATTACH; Schema: SchLog; Owner: SysEngine
--

ALTER TABLE ONLY "SchLog"."TblLog_TransactionHistory_RMV" ATTACH PARTITION "SchLog"."TblLog_TransactionHistory_RMV_8000000000017" FOR VALUES IN ('8000000000017');


--
-- TOC entry 3955 (class 0 OID 0)
-- Name: TblLog_TransactionHistory_RMV_8000000000018; Type: TABLE ATTACH; Schema: SchLog; Owner: SysEngine
--

ALTER TABLE ONLY "SchLog"."TblLog_TransactionHistory_RMV" ATTACH PARTITION "SchLog"."TblLog_TransactionHistory_RMV_8000000000018" FOR VALUES IN ('8000000000018');


--
-- TOC entry 3956 (class 0 OID 0)
-- Name: TblLog_TransactionHistory_RMV_8000000000019; Type: TABLE ATTACH; Schema: SchLog; Owner: SysEngine
--

ALTER TABLE ONLY "SchLog"."TblLog_TransactionHistory_RMV" ATTACH PARTITION "SchLog"."TblLog_TransactionHistory_RMV_8000000000019" FOR VALUES IN ('8000000000019');


--
-- TOC entry 3957 (class 0 OID 0)
-- Name: TblLog_TransactionHistory_RMV_8000000000020; Type: TABLE ATTACH; Schema: SchLog; Owner: SysEngine
--

ALTER TABLE ONLY "SchLog"."TblLog_TransactionHistory_RMV" ATTACH PARTITION "SchLog"."TblLog_TransactionHistory_RMV_8000000000020" FOR VALUES IN ('8000000000020');


--
-- TOC entry 3958 (class 0 OID 0)
-- Name: TblLog_TransactionHistory_RMV_8000000000021; Type: TABLE ATTACH; Schema: SchLog; Owner: SysEngine
--

ALTER TABLE ONLY "SchLog"."TblLog_TransactionHistory_RMV" ATTACH PARTITION "SchLog"."TblLog_TransactionHistory_RMV_8000000000021" FOR VALUES IN ('8000000000021');


--
-- TOC entry 3959 (class 0 OID 0)
-- Name: TblLog_TransactionHistory_RMV_8000000000022; Type: TABLE ATTACH; Schema: SchLog; Owner: SysEngine
--

ALTER TABLE ONLY "SchLog"."TblLog_TransactionHistory_RMV" ATTACH PARTITION "SchLog"."TblLog_TransactionHistory_RMV_8000000000022" FOR VALUES IN ('8000000000022');


--
-- TOC entry 3960 (class 0 OID 0)
-- Name: TblLog_TransactionHistory_RMV_8000000000023; Type: TABLE ATTACH; Schema: SchLog; Owner: SysEngine
--

ALTER TABLE ONLY "SchLog"."TblLog_TransactionHistory_RMV" ATTACH PARTITION "SchLog"."TblLog_TransactionHistory_RMV_8000000000023" FOR VALUES IN ('8000000000023');


--
-- TOC entry 3961 (class 0 OID 0)
-- Name: TblLog_TransactionHistory_RMV_8000000000024; Type: TABLE ATTACH; Schema: SchLog; Owner: SysEngine
--

ALTER TABLE ONLY "SchLog"."TblLog_TransactionHistory_RMV" ATTACH PARTITION "SchLog"."TblLog_TransactionHistory_RMV_8000000000024" FOR VALUES IN ('8000000000024');


--
-- TOC entry 3962 (class 0 OID 0)
-- Name: TblLog_TransactionHistory_RMV_8000000000025; Type: TABLE ATTACH; Schema: SchLog; Owner: SysEngine
--

ALTER TABLE ONLY "SchLog"."TblLog_TransactionHistory_RMV" ATTACH PARTITION "SchLog"."TblLog_TransactionHistory_RMV_8000000000025" FOR VALUES IN ('8000000000025');


--
-- TOC entry 3963 (class 0 OID 0)
-- Name: TblLog_TransactionHistory_RMV_8000000000026; Type: TABLE ATTACH; Schema: SchLog; Owner: SysEngine
--

ALTER TABLE ONLY "SchLog"."TblLog_TransactionHistory_RMV" ATTACH PARTITION "SchLog"."TblLog_TransactionHistory_RMV_8000000000026" FOR VALUES IN ('8000000000026');


--
-- TOC entry 3964 (class 0 OID 0)
-- Name: TblLog_TransactionHistory_RMV_8000000000027; Type: TABLE ATTACH; Schema: SchLog; Owner: SysEngine
--

ALTER TABLE ONLY "SchLog"."TblLog_TransactionHistory_RMV" ATTACH PARTITION "SchLog"."TblLog_TransactionHistory_RMV_8000000000027" FOR VALUES IN ('8000000000027');


--
-- TOC entry 3965 (class 0 OID 0)
-- Name: TblLog_TransactionHistory_RMV_8000000000028; Type: TABLE ATTACH; Schema: SchLog; Owner: SysEngine
--

ALTER TABLE ONLY "SchLog"."TblLog_TransactionHistory_RMV" ATTACH PARTITION "SchLog"."TblLog_TransactionHistory_RMV_8000000000028" FOR VALUES IN ('8000000000028');


--
-- TOC entry 3966 (class 0 OID 0)
-- Name: TblLog_TransactionHistory_RMV_8000000000029; Type: TABLE ATTACH; Schema: SchLog; Owner: SysEngine
--

ALTER TABLE ONLY "SchLog"."TblLog_TransactionHistory_RMV" ATTACH PARTITION "SchLog"."TblLog_TransactionHistory_RMV_8000000000029" FOR VALUES IN ('8000000000029');


--
-- TOC entry 3967 (class 0 OID 0)
-- Name: TblLog_TransactionHistory_RMV_8000000000030; Type: TABLE ATTACH; Schema: SchLog; Owner: SysEngine
--

ALTER TABLE ONLY "SchLog"."TblLog_TransactionHistory_RMV" ATTACH PARTITION "SchLog"."TblLog_TransactionHistory_RMV_8000000000030" FOR VALUES IN ('8000000000030');


--
-- TOC entry 3968 (class 0 OID 0)
-- Name: TblLog_TransactionHistory_RMV_8000000000031; Type: TABLE ATTACH; Schema: SchLog; Owner: SysEngine
--

ALTER TABLE ONLY "SchLog"."TblLog_TransactionHistory_RMV" ATTACH PARTITION "SchLog"."TblLog_TransactionHistory_RMV_8000000000031" FOR VALUES IN ('8000000000031');


--
-- TOC entry 4482 (class 2606 OID 1935473)
-- Name: TblLog_FileUpload_ObjectDetail TblLog_FileUpload_ObjectDetail_pkey; Type: CONSTRAINT; Schema: SchAcquisition; Owner: SysAdmin
--

ALTER TABLE ONLY "SchAcquisition"."TblLog_FileUpload_ObjectDetail"
    ADD CONSTRAINT "TblLog_FileUpload_ObjectDetail_pkey" PRIMARY KEY ("Sys_RPK");


--
-- TOC entry 4480 (class 2606 OID 1935475)
-- Name: TblLog_FileUpload_Object TblLog_FileUpload_Object_pkey; Type: CONSTRAINT; Schema: SchAcquisition; Owner: SysAdmin
--

ALTER TABLE ONLY "SchAcquisition"."TblLog_FileUpload_Object"
    ADD CONSTRAINT "TblLog_FileUpload_Object_pkey" PRIMARY KEY ("Sys_RPK");


--
-- TOC entry 4488 (class 2606 OID 1935477)
-- Name: TblLog_FileUpload_PointerHistoryDetail TblLog_FileUpload_PointerHistoryDetail_pkey; Type: CONSTRAINT; Schema: SchAcquisition; Owner: SysAdmin
--

ALTER TABLE ONLY "SchAcquisition"."TblLog_FileUpload_PointerHistoryDetail"
    ADD CONSTRAINT "TblLog_FileUpload_PointerHistoryDetail_pkey" PRIMARY KEY ("Sys_RPK");


--
-- TOC entry 4486 (class 2606 OID 1935479)
-- Name: TblLog_FileUpload_PointerHistory TblLog_FileUpload_PointerHistory_pkey; Type: CONSTRAINT; Schema: SchAcquisition; Owner: SysAdmin
--

ALTER TABLE ONLY "SchAcquisition"."TblLog_FileUpload_PointerHistory"
    ADD CONSTRAINT "TblLog_FileUpload_PointerHistory_pkey" PRIMARY KEY ("Sys_RPK");


--
-- TOC entry 4484 (class 2606 OID 1935481)
-- Name: TblLog_FileUpload_Pointer TblLog_FileUpload_Pointer_pkey; Type: CONSTRAINT; Schema: SchAcquisition; Owner: SysAdmin
--

ALTER TABLE ONLY "SchAcquisition"."TblLog_FileUpload_Pointer"
    ADD CONSTRAINT "TblLog_FileUpload_Pointer_pkey" PRIMARY KEY ("Sys_RPK");


--
-- TOC entry 4492 (class 2606 OID 1935483)
-- Name: TblRotateLog_FileUploadStagingAreaDetail TblRotateLog_FileUploadStagingAreaDetail_pkey; Type: CONSTRAINT; Schema: SchAcquisition; Owner: SysAdmin
--

ALTER TABLE ONLY "SchAcquisition"."TblRotateLog_FileUploadStagingAreaDetail"
    ADD CONSTRAINT "TblRotateLog_FileUploadStagingAreaDetail_pkey" PRIMARY KEY ("Sys_RotateID");


--
-- TOC entry 4490 (class 2606 OID 1935485)
-- Name: TblRotateLog_FileUploadStagingArea TblRotateLog_FileUploadStagingArea_pkey; Type: CONSTRAINT; Schema: SchAcquisition; Owner: SysAdmin
--

ALTER TABLE ONLY "SchAcquisition"."TblRotateLog_FileUploadStagingArea"
    ADD CONSTRAINT "TblRotateLog_FileUploadStagingArea_pkey" PRIMARY KEY ("Sys_RotateID");


--
-- TOC entry 4494 (class 2606 OID 1935487)
-- Name: TblCache_FunctionResult TblCache_FunctionResult_pkey; Type: CONSTRAINT; Schema: SchCache; Owner: SysAdmin
--

ALTER TABLE ONLY "SchCache"."TblCache_FunctionResult"
    ADD CONSTRAINT "TblCache_FunctionResult_pkey" PRIMARY KEY ("Sys_RPK");


--
-- TOC entry 4503 (class 2606 OID 1935489)
-- Name: TblStatistic_CacheFunctionResultAccess TblStatistic_CacheFunctionResultAccess_pkey; Type: CONSTRAINT; Schema: SchCache; Owner: SysAdmin
--

ALTER TABLE ONLY "SchCache"."TblStatistic_CacheFunctionResultAccess"
    ADD CONSTRAINT "TblStatistic_CacheFunctionResultAccess_pkey" PRIMARY KEY ("Sys_RPK");


--
-- TOC entry 4506 (class 2606 OID 1935491)
-- Name: TblLog_FunctionSnapshotSignature TblLog_FunctionSnapshotSignature_pkey; Type: CONSTRAINT; Schema: SchLog; Owner: SysAdmin
--

ALTER TABLE ONLY "SchLog"."TblLog_FunctionSnapshotSignature"
    ADD CONSTRAINT "TblLog_FunctionSnapshotSignature_pkey" PRIMARY KEY ("Sys_RPK");


--
-- TOC entry 4510 (class 2606 OID 1935493)
-- Name: TblLog_TableSnapshotSignature TblLog_TableSnapshotSignature_pkey; Type: CONSTRAINT; Schema: SchLog; Owner: SysAdmin
--

ALTER TABLE ONLY "SchLog"."TblLog_TableSnapshotSignature"
    ADD CONSTRAINT "TblLog_TableSnapshotSignature_pkey" PRIMARY KEY ("Sys_RPK");


--
-- TOC entry 4083 (class 1259 OID 1935494)
-- Name: idx0018_000001; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000001 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_DEF" USING btree ("Sys_PID");


--
-- TOC entry 4088 (class 1259 OID 1935495)
-- Name: idx0018_000002; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000002 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_PMT" USING btree ("Sys_PID");


--
-- TOC entry 4093 (class 1259 OID 1935496)
-- Name: idx0018_000003; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000003 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000001" USING btree ("Sys_PID");


--
-- TOC entry 4098 (class 1259 OID 1935497)
-- Name: idx0018_000004; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000004 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000002" USING btree ("Sys_PID");


--
-- TOC entry 4103 (class 1259 OID 1935498)
-- Name: idx0018_000005; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000005 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000003" USING btree ("Sys_PID");


--
-- TOC entry 4108 (class 1259 OID 1935499)
-- Name: idx0018_000006; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000006 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000004" USING btree ("Sys_PID");


--
-- TOC entry 4113 (class 1259 OID 1935500)
-- Name: idx0018_000007; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000007 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000005" USING btree ("Sys_PID");


--
-- TOC entry 4118 (class 1259 OID 1935501)
-- Name: idx0018_000008; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000008 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000006" USING btree ("Sys_PID");


--
-- TOC entry 4123 (class 1259 OID 1935502)
-- Name: idx0018_000009; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000009 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000007" USING btree ("Sys_PID");


--
-- TOC entry 4128 (class 1259 OID 1935503)
-- Name: idx0018_000010; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000010 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000008" USING btree ("Sys_PID");


--
-- TOC entry 4133 (class 1259 OID 1935504)
-- Name: idx0018_000011; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000011 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000009" USING btree ("Sys_PID");


--
-- TOC entry 4138 (class 1259 OID 1935505)
-- Name: idx0018_000012; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000012 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000010" USING btree ("Sys_PID");


--
-- TOC entry 4143 (class 1259 OID 1935506)
-- Name: idx0018_000013; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000013 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000011" USING btree ("Sys_PID");


--
-- TOC entry 4148 (class 1259 OID 1935507)
-- Name: idx0018_000014; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000014 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000012" USING btree ("Sys_PID");


--
-- TOC entry 4153 (class 1259 OID 1935508)
-- Name: idx0018_000015; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000015 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000013" USING btree ("Sys_PID");


--
-- TOC entry 4158 (class 1259 OID 1935509)
-- Name: idx0018_000016; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000016 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000014" USING btree ("Sys_PID");


--
-- TOC entry 4163 (class 1259 OID 1935510)
-- Name: idx0018_000017; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000017 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000015" USING btree ("Sys_PID");


--
-- TOC entry 4168 (class 1259 OID 1935511)
-- Name: idx0018_000018; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000018 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000016" USING btree ("Sys_PID");


--
-- TOC entry 4173 (class 1259 OID 1935512)
-- Name: idx0018_000019; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000019 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000017" USING btree ("Sys_PID");


--
-- TOC entry 4178 (class 1259 OID 1935513)
-- Name: idx0018_000020; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000020 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000018" USING btree ("Sys_PID");


--
-- TOC entry 4183 (class 1259 OID 1935514)
-- Name: idx0018_000021; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000021 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000019" USING btree ("Sys_PID");


--
-- TOC entry 4188 (class 1259 OID 1935515)
-- Name: idx0018_000022; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000022 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000020" USING btree ("Sys_PID");


--
-- TOC entry 4193 (class 1259 OID 1935516)
-- Name: idx0018_000023; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000023 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000021" USING btree ("Sys_PID");


--
-- TOC entry 4198 (class 1259 OID 1935517)
-- Name: idx0018_000024; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000024 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000022" USING btree ("Sys_PID");


--
-- TOC entry 4203 (class 1259 OID 1935518)
-- Name: idx0018_000025; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000025 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000023" USING btree ("Sys_PID");


--
-- TOC entry 4208 (class 1259 OID 1935519)
-- Name: idx0018_000026; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000026 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000024" USING btree ("Sys_PID");


--
-- TOC entry 4213 (class 1259 OID 1935520)
-- Name: idx0018_000027; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000027 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000025" USING btree ("Sys_PID");


--
-- TOC entry 4218 (class 1259 OID 1935521)
-- Name: idx0018_000028; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000028 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000026" USING btree ("Sys_PID");


--
-- TOC entry 4223 (class 1259 OID 1935522)
-- Name: idx0018_000029; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000029 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000027" USING btree ("Sys_PID");


--
-- TOC entry 4228 (class 1259 OID 1935523)
-- Name: idx0018_000030; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000030 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000028" USING btree ("Sys_PID");


--
-- TOC entry 4233 (class 1259 OID 1935524)
-- Name: idx0018_000031; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000031 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000029" USING btree ("Sys_PID");


--
-- TOC entry 4238 (class 1259 OID 1935525)
-- Name: idx0018_000032; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000032 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000030" USING btree ("Sys_PID");


--
-- TOC entry 4243 (class 1259 OID 1935526)
-- Name: idx0018_000033; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000033 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000031" USING btree ("Sys_PID");


--
-- TOC entry 4084 (class 1259 OID 1935527)
-- Name: idx0018_000034; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000034 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_DEF" USING btree ("Sys_SID");


--
-- TOC entry 4089 (class 1259 OID 1935528)
-- Name: idx0018_000035; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000035 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_PMT" USING btree ("Sys_SID");


--
-- TOC entry 4094 (class 1259 OID 1935529)
-- Name: idx0018_000036; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000036 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000001" USING btree ("Sys_SID");


--
-- TOC entry 4099 (class 1259 OID 1935530)
-- Name: idx0018_000037; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000037 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000002" USING btree ("Sys_SID");


--
-- TOC entry 4104 (class 1259 OID 1935531)
-- Name: idx0018_000038; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000038 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000003" USING btree ("Sys_SID");


--
-- TOC entry 4109 (class 1259 OID 1935532)
-- Name: idx0018_000039; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000039 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000004" USING btree ("Sys_SID");


--
-- TOC entry 4114 (class 1259 OID 1935533)
-- Name: idx0018_000040; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000040 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000005" USING btree ("Sys_SID");


--
-- TOC entry 4119 (class 1259 OID 1935534)
-- Name: idx0018_000041; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000041 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000006" USING btree ("Sys_SID");


--
-- TOC entry 4124 (class 1259 OID 1935535)
-- Name: idx0018_000042; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000042 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000007" USING btree ("Sys_SID");


--
-- TOC entry 4129 (class 1259 OID 1935536)
-- Name: idx0018_000043; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000043 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000008" USING btree ("Sys_SID");


--
-- TOC entry 4134 (class 1259 OID 1935537)
-- Name: idx0018_000044; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000044 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000009" USING btree ("Sys_SID");


--
-- TOC entry 4139 (class 1259 OID 1935538)
-- Name: idx0018_000045; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000045 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000010" USING btree ("Sys_SID");


--
-- TOC entry 4144 (class 1259 OID 1935539)
-- Name: idx0018_000046; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000046 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000011" USING btree ("Sys_SID");


--
-- TOC entry 4149 (class 1259 OID 1935540)
-- Name: idx0018_000047; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000047 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000012" USING btree ("Sys_SID");


--
-- TOC entry 4154 (class 1259 OID 1935541)
-- Name: idx0018_000048; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000048 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000013" USING btree ("Sys_SID");


--
-- TOC entry 4159 (class 1259 OID 1935542)
-- Name: idx0018_000049; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000049 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000014" USING btree ("Sys_SID");


--
-- TOC entry 4164 (class 1259 OID 1935543)
-- Name: idx0018_000050; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000050 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000015" USING btree ("Sys_SID");


--
-- TOC entry 4169 (class 1259 OID 1935544)
-- Name: idx0018_000051; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000051 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000016" USING btree ("Sys_SID");


--
-- TOC entry 4174 (class 1259 OID 1935545)
-- Name: idx0018_000052; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000052 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000017" USING btree ("Sys_SID");


--
-- TOC entry 4179 (class 1259 OID 1935546)
-- Name: idx0018_000053; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000053 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000018" USING btree ("Sys_SID");


--
-- TOC entry 4184 (class 1259 OID 1935547)
-- Name: idx0018_000054; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000054 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000019" USING btree ("Sys_SID");


--
-- TOC entry 4189 (class 1259 OID 1935548)
-- Name: idx0018_000055; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000055 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000020" USING btree ("Sys_SID");


--
-- TOC entry 4194 (class 1259 OID 1935549)
-- Name: idx0018_000056; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000056 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000021" USING btree ("Sys_SID");


--
-- TOC entry 4199 (class 1259 OID 1935550)
-- Name: idx0018_000057; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000057 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000022" USING btree ("Sys_SID");


--
-- TOC entry 4204 (class 1259 OID 1935551)
-- Name: idx0018_000058; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000058 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000023" USING btree ("Sys_SID");


--
-- TOC entry 4209 (class 1259 OID 1935552)
-- Name: idx0018_000059; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000059 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000024" USING btree ("Sys_SID");


--
-- TOC entry 4214 (class 1259 OID 1935553)
-- Name: idx0018_000060; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000060 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000025" USING btree ("Sys_SID");


--
-- TOC entry 4219 (class 1259 OID 1935554)
-- Name: idx0018_000061; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000061 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000026" USING btree ("Sys_SID");


--
-- TOC entry 4224 (class 1259 OID 1935555)
-- Name: idx0018_000062; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000062 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000027" USING btree ("Sys_SID");


--
-- TOC entry 4229 (class 1259 OID 1935556)
-- Name: idx0018_000063; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000063 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000028" USING btree ("Sys_SID");


--
-- TOC entry 4234 (class 1259 OID 1935557)
-- Name: idx0018_000064; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000064 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000029" USING btree ("Sys_SID");


--
-- TOC entry 4239 (class 1259 OID 1935558)
-- Name: idx0018_000065; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000065 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000030" USING btree ("Sys_SID");


--
-- TOC entry 4244 (class 1259 OID 1935559)
-- Name: idx0018_000066; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000066 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000031" USING btree ("Sys_SID");


--
-- TOC entry 4085 (class 1259 OID 1935560)
-- Name: idx0018_000067; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000067 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_DEF" USING btree ("Sys_RPK");


--
-- TOC entry 4090 (class 1259 OID 1935561)
-- Name: idx0018_000068; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000068 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_PMT" USING btree ("Sys_RPK");


--
-- TOC entry 4095 (class 1259 OID 1935562)
-- Name: idx0018_000069; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000069 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000001" USING btree ("Sys_RPK");


--
-- TOC entry 4100 (class 1259 OID 1935563)
-- Name: idx0018_000070; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000070 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000002" USING btree ("Sys_RPK");


--
-- TOC entry 4105 (class 1259 OID 1935564)
-- Name: idx0018_000071; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000071 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000003" USING btree ("Sys_RPK");


--
-- TOC entry 4110 (class 1259 OID 1935565)
-- Name: idx0018_000072; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000072 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000004" USING btree ("Sys_RPK");


--
-- TOC entry 4115 (class 1259 OID 1935566)
-- Name: idx0018_000073; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000073 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000005" USING btree ("Sys_RPK");


--
-- TOC entry 4120 (class 1259 OID 1935567)
-- Name: idx0018_000074; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000074 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000006" USING btree ("Sys_RPK");


--
-- TOC entry 4125 (class 1259 OID 1935568)
-- Name: idx0018_000075; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000075 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000007" USING btree ("Sys_RPK");


--
-- TOC entry 4130 (class 1259 OID 1935569)
-- Name: idx0018_000076; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000076 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000008" USING btree ("Sys_RPK");


--
-- TOC entry 4135 (class 1259 OID 1935570)
-- Name: idx0018_000077; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000077 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000009" USING btree ("Sys_RPK");


--
-- TOC entry 4140 (class 1259 OID 1935571)
-- Name: idx0018_000078; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000078 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000010" USING btree ("Sys_RPK");


--
-- TOC entry 4145 (class 1259 OID 1935572)
-- Name: idx0018_000079; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000079 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000011" USING btree ("Sys_RPK");


--
-- TOC entry 4150 (class 1259 OID 1935573)
-- Name: idx0018_000080; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000080 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000012" USING btree ("Sys_RPK");


--
-- TOC entry 4155 (class 1259 OID 1935574)
-- Name: idx0018_000081; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000081 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000013" USING btree ("Sys_RPK");


--
-- TOC entry 4160 (class 1259 OID 1935575)
-- Name: idx0018_000082; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000082 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000014" USING btree ("Sys_RPK");


--
-- TOC entry 4165 (class 1259 OID 1935576)
-- Name: idx0018_000083; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000083 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000015" USING btree ("Sys_RPK");


--
-- TOC entry 4170 (class 1259 OID 1935577)
-- Name: idx0018_000084; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000084 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000016" USING btree ("Sys_RPK");


--
-- TOC entry 4175 (class 1259 OID 1935578)
-- Name: idx0018_000085; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000085 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000017" USING btree ("Sys_RPK");


--
-- TOC entry 4180 (class 1259 OID 1935579)
-- Name: idx0018_000086; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000086 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000018" USING btree ("Sys_RPK");


--
-- TOC entry 4185 (class 1259 OID 1935580)
-- Name: idx0018_000087; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000087 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000019" USING btree ("Sys_RPK");


--
-- TOC entry 4190 (class 1259 OID 1935581)
-- Name: idx0018_000088; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000088 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000020" USING btree ("Sys_RPK");


--
-- TOC entry 4195 (class 1259 OID 1935582)
-- Name: idx0018_000089; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000089 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000021" USING btree ("Sys_RPK");


--
-- TOC entry 4200 (class 1259 OID 1935583)
-- Name: idx0018_000090; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000090 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000022" USING btree ("Sys_RPK");


--
-- TOC entry 4205 (class 1259 OID 1935584)
-- Name: idx0018_000091; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000091 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000023" USING btree ("Sys_RPK");


--
-- TOC entry 4210 (class 1259 OID 1935585)
-- Name: idx0018_000092; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000092 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000024" USING btree ("Sys_RPK");


--
-- TOC entry 4215 (class 1259 OID 1935586)
-- Name: idx0018_000093; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000093 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000025" USING btree ("Sys_RPK");


--
-- TOC entry 4220 (class 1259 OID 1935587)
-- Name: idx0018_000094; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000094 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000026" USING btree ("Sys_RPK");


--
-- TOC entry 4225 (class 1259 OID 1935588)
-- Name: idx0018_000095; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000095 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000027" USING btree ("Sys_RPK");


--
-- TOC entry 4230 (class 1259 OID 1935589)
-- Name: idx0018_000096; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000096 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000028" USING btree ("Sys_RPK");


--
-- TOC entry 4235 (class 1259 OID 1935590)
-- Name: idx0018_000097; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000097 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000029" USING btree ("Sys_RPK");


--
-- TOC entry 4240 (class 1259 OID 1935591)
-- Name: idx0018_000098; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000098 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000030" USING btree ("Sys_RPK");


--
-- TOC entry 4245 (class 1259 OID 1935592)
-- Name: idx0018_000099; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000099 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000031" USING btree ("Sys_RPK");


--
-- TOC entry 4086 (class 1259 OID 1935593)
-- Name: idx0018_000100; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000100 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_DEF" USING btree ("Sys_Data_Delete_DateTimeTZ");


--
-- TOC entry 4091 (class 1259 OID 1935594)
-- Name: idx0018_000101; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000101 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_PMT" USING btree ("Sys_Data_Delete_DateTimeTZ");


--
-- TOC entry 4096 (class 1259 OID 1935595)
-- Name: idx0018_000102; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000102 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000001" USING btree ("Sys_Data_Delete_DateTimeTZ");


--
-- TOC entry 4101 (class 1259 OID 1935596)
-- Name: idx0018_000103; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000103 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000002" USING btree ("Sys_Data_Delete_DateTimeTZ");


--
-- TOC entry 4106 (class 1259 OID 1935597)
-- Name: idx0018_000104; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000104 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000003" USING btree ("Sys_Data_Delete_DateTimeTZ");


--
-- TOC entry 4111 (class 1259 OID 1935598)
-- Name: idx0018_000105; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000105 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000004" USING btree ("Sys_Data_Delete_DateTimeTZ");


--
-- TOC entry 4116 (class 1259 OID 1935599)
-- Name: idx0018_000106; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000106 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000005" USING btree ("Sys_Data_Delete_DateTimeTZ");


--
-- TOC entry 4121 (class 1259 OID 1935600)
-- Name: idx0018_000107; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000107 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000006" USING btree ("Sys_Data_Delete_DateTimeTZ");


--
-- TOC entry 4126 (class 1259 OID 1935601)
-- Name: idx0018_000108; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000108 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000007" USING btree ("Sys_Data_Delete_DateTimeTZ");


--
-- TOC entry 4131 (class 1259 OID 1935602)
-- Name: idx0018_000109; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000109 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000008" USING btree ("Sys_Data_Delete_DateTimeTZ");


--
-- TOC entry 4136 (class 1259 OID 1935603)
-- Name: idx0018_000110; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000110 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000009" USING btree ("Sys_Data_Delete_DateTimeTZ");


--
-- TOC entry 4141 (class 1259 OID 1935604)
-- Name: idx0018_000111; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000111 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000010" USING btree ("Sys_Data_Delete_DateTimeTZ");


--
-- TOC entry 4146 (class 1259 OID 1935605)
-- Name: idx0018_000112; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000112 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000011" USING btree ("Sys_Data_Delete_DateTimeTZ");


--
-- TOC entry 4151 (class 1259 OID 1935606)
-- Name: idx0018_000113; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000113 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000012" USING btree ("Sys_Data_Delete_DateTimeTZ");


--
-- TOC entry 4156 (class 1259 OID 1935607)
-- Name: idx0018_000114; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000114 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000013" USING btree ("Sys_Data_Delete_DateTimeTZ");


--
-- TOC entry 4161 (class 1259 OID 1935608)
-- Name: idx0018_000115; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000115 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000014" USING btree ("Sys_Data_Delete_DateTimeTZ");


--
-- TOC entry 4166 (class 1259 OID 1935609)
-- Name: idx0018_000116; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000116 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000015" USING btree ("Sys_Data_Delete_DateTimeTZ");


--
-- TOC entry 4171 (class 1259 OID 1935610)
-- Name: idx0018_000117; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000117 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000016" USING btree ("Sys_Data_Delete_DateTimeTZ");


--
-- TOC entry 4176 (class 1259 OID 1935611)
-- Name: idx0018_000118; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000118 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000017" USING btree ("Sys_Data_Delete_DateTimeTZ");


--
-- TOC entry 4181 (class 1259 OID 1935612)
-- Name: idx0018_000119; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000119 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000018" USING btree ("Sys_Data_Delete_DateTimeTZ");


--
-- TOC entry 4186 (class 1259 OID 1935613)
-- Name: idx0018_000120; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000120 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000019" USING btree ("Sys_Data_Delete_DateTimeTZ");


--
-- TOC entry 4191 (class 1259 OID 1935614)
-- Name: idx0018_000121; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000121 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000020" USING btree ("Sys_Data_Delete_DateTimeTZ");


--
-- TOC entry 4196 (class 1259 OID 1935615)
-- Name: idx0018_000122; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000122 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000021" USING btree ("Sys_Data_Delete_DateTimeTZ");


--
-- TOC entry 4201 (class 1259 OID 1935616)
-- Name: idx0018_000123; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000123 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000022" USING btree ("Sys_Data_Delete_DateTimeTZ");


--
-- TOC entry 4206 (class 1259 OID 1935617)
-- Name: idx0018_000124; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000124 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000023" USING btree ("Sys_Data_Delete_DateTimeTZ");


--
-- TOC entry 4211 (class 1259 OID 1935618)
-- Name: idx0018_000125; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000125 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000024" USING btree ("Sys_Data_Delete_DateTimeTZ");


--
-- TOC entry 4216 (class 1259 OID 1935619)
-- Name: idx0018_000126; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000126 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000025" USING btree ("Sys_Data_Delete_DateTimeTZ");


--
-- TOC entry 4221 (class 1259 OID 1935620)
-- Name: idx0018_000127; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000127 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000026" USING btree ("Sys_Data_Delete_DateTimeTZ");


--
-- TOC entry 4226 (class 1259 OID 1935621)
-- Name: idx0018_000128; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000128 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000027" USING btree ("Sys_Data_Delete_DateTimeTZ");


--
-- TOC entry 4231 (class 1259 OID 1935622)
-- Name: idx0018_000129; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000129 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000028" USING btree ("Sys_Data_Delete_DateTimeTZ");


--
-- TOC entry 4236 (class 1259 OID 1935623)
-- Name: idx0018_000130; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000130 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000029" USING btree ("Sys_Data_Delete_DateTimeTZ");


--
-- TOC entry 4241 (class 1259 OID 1935624)
-- Name: idx0018_000131; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000131 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000030" USING btree ("Sys_Data_Delete_DateTimeTZ");


--
-- TOC entry 4246 (class 1259 OID 1935625)
-- Name: idx0018_000132; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000132 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000031" USING btree ("Sys_Data_Delete_DateTimeTZ");


--
-- TOC entry 4087 (class 1259 OID 1935626)
-- Name: idx0018_000133; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000133 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_DEF" USING btree ("Sys_Data_Hidden_DateTimeTZ");


--
-- TOC entry 4092 (class 1259 OID 1935627)
-- Name: idx0018_000134; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000134 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_PMT" USING btree ("Sys_Data_Hidden_DateTimeTZ");


--
-- TOC entry 4097 (class 1259 OID 1935628)
-- Name: idx0018_000135; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000135 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000001" USING btree ("Sys_Data_Hidden_DateTimeTZ");


--
-- TOC entry 4102 (class 1259 OID 1935629)
-- Name: idx0018_000136; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000136 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000002" USING btree ("Sys_Data_Hidden_DateTimeTZ");


--
-- TOC entry 4107 (class 1259 OID 1935630)
-- Name: idx0018_000137; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000137 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000003" USING btree ("Sys_Data_Hidden_DateTimeTZ");


--
-- TOC entry 4112 (class 1259 OID 1935631)
-- Name: idx0018_000138; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000138 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000004" USING btree ("Sys_Data_Hidden_DateTimeTZ");


--
-- TOC entry 4117 (class 1259 OID 1935632)
-- Name: idx0018_000139; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000139 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000005" USING btree ("Sys_Data_Hidden_DateTimeTZ");


--
-- TOC entry 4122 (class 1259 OID 1935633)
-- Name: idx0018_000140; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000140 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000006" USING btree ("Sys_Data_Hidden_DateTimeTZ");


--
-- TOC entry 4127 (class 1259 OID 1935634)
-- Name: idx0018_000141; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000141 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000007" USING btree ("Sys_Data_Hidden_DateTimeTZ");


--
-- TOC entry 4132 (class 1259 OID 1935635)
-- Name: idx0018_000142; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000142 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000008" USING btree ("Sys_Data_Hidden_DateTimeTZ");


--
-- TOC entry 4137 (class 1259 OID 1935636)
-- Name: idx0018_000143; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000143 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000009" USING btree ("Sys_Data_Hidden_DateTimeTZ");


--
-- TOC entry 4142 (class 1259 OID 1935637)
-- Name: idx0018_000144; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000144 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000010" USING btree ("Sys_Data_Hidden_DateTimeTZ");


--
-- TOC entry 4147 (class 1259 OID 1935638)
-- Name: idx0018_000145; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000145 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000011" USING btree ("Sys_Data_Hidden_DateTimeTZ");


--
-- TOC entry 4152 (class 1259 OID 1935639)
-- Name: idx0018_000146; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000146 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000012" USING btree ("Sys_Data_Hidden_DateTimeTZ");


--
-- TOC entry 4157 (class 1259 OID 1935640)
-- Name: idx0018_000147; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000147 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000013" USING btree ("Sys_Data_Hidden_DateTimeTZ");


--
-- TOC entry 4162 (class 1259 OID 1935641)
-- Name: idx0018_000148; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000148 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000014" USING btree ("Sys_Data_Hidden_DateTimeTZ");


--
-- TOC entry 4167 (class 1259 OID 1935642)
-- Name: idx0018_000149; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000149 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000015" USING btree ("Sys_Data_Hidden_DateTimeTZ");


--
-- TOC entry 4172 (class 1259 OID 1935643)
-- Name: idx0018_000150; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000150 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000016" USING btree ("Sys_Data_Hidden_DateTimeTZ");


--
-- TOC entry 4177 (class 1259 OID 1935644)
-- Name: idx0018_000151; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000151 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000017" USING btree ("Sys_Data_Hidden_DateTimeTZ");


--
-- TOC entry 4182 (class 1259 OID 1935645)
-- Name: idx0018_000152; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000152 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000018" USING btree ("Sys_Data_Hidden_DateTimeTZ");


--
-- TOC entry 4187 (class 1259 OID 1935646)
-- Name: idx0018_000153; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000153 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000019" USING btree ("Sys_Data_Hidden_DateTimeTZ");


--
-- TOC entry 4192 (class 1259 OID 1935647)
-- Name: idx0018_000154; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000154 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000020" USING btree ("Sys_Data_Hidden_DateTimeTZ");


--
-- TOC entry 4197 (class 1259 OID 1935648)
-- Name: idx0018_000155; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000155 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000021" USING btree ("Sys_Data_Hidden_DateTimeTZ");


--
-- TOC entry 4202 (class 1259 OID 1935649)
-- Name: idx0018_000156; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000156 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000022" USING btree ("Sys_Data_Hidden_DateTimeTZ");


--
-- TOC entry 4207 (class 1259 OID 1935650)
-- Name: idx0018_000157; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000157 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000023" USING btree ("Sys_Data_Hidden_DateTimeTZ");


--
-- TOC entry 4212 (class 1259 OID 1935651)
-- Name: idx0018_000158; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000158 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000024" USING btree ("Sys_Data_Hidden_DateTimeTZ");


--
-- TOC entry 4217 (class 1259 OID 1935652)
-- Name: idx0018_000159; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000159 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000025" USING btree ("Sys_Data_Hidden_DateTimeTZ");


--
-- TOC entry 4222 (class 1259 OID 1935653)
-- Name: idx0018_000160; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000160 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000026" USING btree ("Sys_Data_Hidden_DateTimeTZ");


--
-- TOC entry 4227 (class 1259 OID 1935654)
-- Name: idx0018_000161; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000161 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000027" USING btree ("Sys_Data_Hidden_DateTimeTZ");


--
-- TOC entry 4232 (class 1259 OID 1935655)
-- Name: idx0018_000162; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000162 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000028" USING btree ("Sys_Data_Hidden_DateTimeTZ");


--
-- TOC entry 4237 (class 1259 OID 1935656)
-- Name: idx0018_000163; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000163 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000029" USING btree ("Sys_Data_Hidden_DateTimeTZ");


--
-- TOC entry 4242 (class 1259 OID 1935657)
-- Name: idx0018_000164; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000164 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000030" USING btree ("Sys_Data_Hidden_DateTimeTZ");


--
-- TOC entry 4247 (class 1259 OID 1935658)
-- Name: idx0018_000165; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0018_000165 ON "SchAcquisition"."TblLog_Device_PersonAccessFetch_RMV_8000000000031" USING btree ("Sys_Data_Hidden_DateTimeTZ");


--
-- TOC entry 4248 (class 1259 OID 1935659)
-- Name: idx0019_000001; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000001 ON "SchAcquisition"."TblLog_Device_PersonAccess_DEF" USING btree ("Sys_PID");


--
-- TOC entry 4255 (class 1259 OID 1935660)
-- Name: idx0019_000002; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000002 ON "SchAcquisition"."TblLog_Device_PersonAccess_PMT" USING btree ("Sys_PID");


--
-- TOC entry 4262 (class 1259 OID 1935661)
-- Name: idx0019_000003; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000003 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000001" USING btree ("Sys_PID");


--
-- TOC entry 4269 (class 1259 OID 1935662)
-- Name: idx0019_000004; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000004 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000002" USING btree ("Sys_PID");


--
-- TOC entry 4276 (class 1259 OID 1935663)
-- Name: idx0019_000005; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000005 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000003" USING btree ("Sys_PID");


--
-- TOC entry 4283 (class 1259 OID 1935664)
-- Name: idx0019_000006; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000006 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000004" USING btree ("Sys_PID");


--
-- TOC entry 4290 (class 1259 OID 1935665)
-- Name: idx0019_000007; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000007 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000005" USING btree ("Sys_PID");


--
-- TOC entry 4297 (class 1259 OID 1935666)
-- Name: idx0019_000008; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000008 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000006" USING btree ("Sys_PID");


--
-- TOC entry 4304 (class 1259 OID 1935667)
-- Name: idx0019_000009; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000009 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000007" USING btree ("Sys_PID");


--
-- TOC entry 4311 (class 1259 OID 1935668)
-- Name: idx0019_000010; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000010 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000008" USING btree ("Sys_PID");


--
-- TOC entry 4318 (class 1259 OID 1935669)
-- Name: idx0019_000011; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000011 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000009" USING btree ("Sys_PID");


--
-- TOC entry 4325 (class 1259 OID 1935670)
-- Name: idx0019_000012; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000012 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000010" USING btree ("Sys_PID");


--
-- TOC entry 4332 (class 1259 OID 1935673)
-- Name: idx0019_000013; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000013 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000011" USING btree ("Sys_PID");


--
-- TOC entry 4339 (class 1259 OID 1935680)
-- Name: idx0019_000014; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000014 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000012" USING btree ("Sys_PID");


--
-- TOC entry 4346 (class 1259 OID 1935681)
-- Name: idx0019_000015; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000015 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000013" USING btree ("Sys_PID");


--
-- TOC entry 4353 (class 1259 OID 1935684)
-- Name: idx0019_000016; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000016 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000014" USING btree ("Sys_PID");


--
-- TOC entry 4360 (class 1259 OID 1935685)
-- Name: idx0019_000017; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000017 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000015" USING btree ("Sys_PID");


--
-- TOC entry 4367 (class 1259 OID 1935686)
-- Name: idx0019_000018; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000018 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000016" USING btree ("Sys_PID");


--
-- TOC entry 4374 (class 1259 OID 1935687)
-- Name: idx0019_000019; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000019 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000017" USING btree ("Sys_PID");


--
-- TOC entry 4381 (class 1259 OID 1935688)
-- Name: idx0019_000020; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000020 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000018" USING btree ("Sys_PID");


--
-- TOC entry 4388 (class 1259 OID 1935689)
-- Name: idx0019_000021; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000021 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000019" USING btree ("Sys_PID");


--
-- TOC entry 4395 (class 1259 OID 1935690)
-- Name: idx0019_000022; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000022 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000020" USING btree ("Sys_PID");


--
-- TOC entry 4402 (class 1259 OID 1935691)
-- Name: idx0019_000023; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000023 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000021" USING btree ("Sys_PID");


--
-- TOC entry 4409 (class 1259 OID 1935692)
-- Name: idx0019_000024; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000024 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000022" USING btree ("Sys_PID");


--
-- TOC entry 4416 (class 1259 OID 1935693)
-- Name: idx0019_000025; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000025 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000023" USING btree ("Sys_PID");


--
-- TOC entry 4423 (class 1259 OID 1935694)
-- Name: idx0019_000026; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000026 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000024" USING btree ("Sys_PID");


--
-- TOC entry 4430 (class 1259 OID 1935695)
-- Name: idx0019_000027; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000027 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000025" USING btree ("Sys_PID");


--
-- TOC entry 4437 (class 1259 OID 1935696)
-- Name: idx0019_000028; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000028 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000026" USING btree ("Sys_PID");


--
-- TOC entry 4444 (class 1259 OID 1935697)
-- Name: idx0019_000029; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000029 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000027" USING btree ("Sys_PID");


--
-- TOC entry 4451 (class 1259 OID 1935698)
-- Name: idx0019_000030; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000030 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000028" USING btree ("Sys_PID");


--
-- TOC entry 4458 (class 1259 OID 1935699)
-- Name: idx0019_000031; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000031 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000029" USING btree ("Sys_PID");


--
-- TOC entry 4465 (class 1259 OID 1935700)
-- Name: idx0019_000032; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000032 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000030" USING btree ("Sys_PID");


--
-- TOC entry 4472 (class 1259 OID 1935701)
-- Name: idx0019_000033; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000033 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000031" USING btree ("Sys_PID");


--
-- TOC entry 4249 (class 1259 OID 1935702)
-- Name: idx0019_000034; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000034 ON "SchAcquisition"."TblLog_Device_PersonAccess_DEF" USING btree ("Sys_SID");


--
-- TOC entry 4256 (class 1259 OID 1935703)
-- Name: idx0019_000035; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000035 ON "SchAcquisition"."TblLog_Device_PersonAccess_PMT" USING btree ("Sys_SID");


--
-- TOC entry 4263 (class 1259 OID 1935704)
-- Name: idx0019_000036; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000036 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000001" USING btree ("Sys_SID");


--
-- TOC entry 4270 (class 1259 OID 1935705)
-- Name: idx0019_000037; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000037 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000002" USING btree ("Sys_SID");


--
-- TOC entry 4277 (class 1259 OID 1935706)
-- Name: idx0019_000038; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000038 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000003" USING btree ("Sys_SID");


--
-- TOC entry 4284 (class 1259 OID 1935707)
-- Name: idx0019_000039; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000039 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000004" USING btree ("Sys_SID");


--
-- TOC entry 4291 (class 1259 OID 1935708)
-- Name: idx0019_000040; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000040 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000005" USING btree ("Sys_SID");


--
-- TOC entry 4298 (class 1259 OID 1935709)
-- Name: idx0019_000041; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000041 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000006" USING btree ("Sys_SID");


--
-- TOC entry 4305 (class 1259 OID 1935710)
-- Name: idx0019_000042; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000042 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000007" USING btree ("Sys_SID");


--
-- TOC entry 4312 (class 1259 OID 1935711)
-- Name: idx0019_000043; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000043 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000008" USING btree ("Sys_SID");


--
-- TOC entry 4319 (class 1259 OID 1935712)
-- Name: idx0019_000044; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000044 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000009" USING btree ("Sys_SID");


--
-- TOC entry 4326 (class 1259 OID 1935713)
-- Name: idx0019_000045; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000045 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000010" USING btree ("Sys_SID");


--
-- TOC entry 4333 (class 1259 OID 1935714)
-- Name: idx0019_000046; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000046 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000011" USING btree ("Sys_SID");


--
-- TOC entry 4340 (class 1259 OID 1935715)
-- Name: idx0019_000047; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000047 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000012" USING btree ("Sys_SID");


--
-- TOC entry 4347 (class 1259 OID 1935716)
-- Name: idx0019_000048; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000048 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000013" USING btree ("Sys_SID");


--
-- TOC entry 4354 (class 1259 OID 1935717)
-- Name: idx0019_000049; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000049 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000014" USING btree ("Sys_SID");


--
-- TOC entry 4361 (class 1259 OID 1935718)
-- Name: idx0019_000050; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000050 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000015" USING btree ("Sys_SID");


--
-- TOC entry 4368 (class 1259 OID 1935719)
-- Name: idx0019_000051; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000051 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000016" USING btree ("Sys_SID");


--
-- TOC entry 4375 (class 1259 OID 1935720)
-- Name: idx0019_000052; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000052 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000017" USING btree ("Sys_SID");


--
-- TOC entry 4382 (class 1259 OID 1935721)
-- Name: idx0019_000053; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000053 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000018" USING btree ("Sys_SID");


--
-- TOC entry 4389 (class 1259 OID 1935722)
-- Name: idx0019_000054; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000054 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000019" USING btree ("Sys_SID");


--
-- TOC entry 4396 (class 1259 OID 1935723)
-- Name: idx0019_000055; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000055 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000020" USING btree ("Sys_SID");


--
-- TOC entry 4403 (class 1259 OID 1935724)
-- Name: idx0019_000056; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000056 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000021" USING btree ("Sys_SID");


--
-- TOC entry 4410 (class 1259 OID 1935725)
-- Name: idx0019_000057; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000057 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000022" USING btree ("Sys_SID");


--
-- TOC entry 4417 (class 1259 OID 1935726)
-- Name: idx0019_000058; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000058 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000023" USING btree ("Sys_SID");


--
-- TOC entry 4424 (class 1259 OID 1935727)
-- Name: idx0019_000059; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000059 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000024" USING btree ("Sys_SID");


--
-- TOC entry 4431 (class 1259 OID 1935728)
-- Name: idx0019_000060; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000060 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000025" USING btree ("Sys_SID");


--
-- TOC entry 4438 (class 1259 OID 1935729)
-- Name: idx0019_000061; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000061 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000026" USING btree ("Sys_SID");


--
-- TOC entry 4445 (class 1259 OID 1935730)
-- Name: idx0019_000062; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000062 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000027" USING btree ("Sys_SID");


--
-- TOC entry 4452 (class 1259 OID 1935731)
-- Name: idx0019_000063; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000063 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000028" USING btree ("Sys_SID");


--
-- TOC entry 4459 (class 1259 OID 1935732)
-- Name: idx0019_000064; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000064 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000029" USING btree ("Sys_SID");


--
-- TOC entry 4466 (class 1259 OID 1935733)
-- Name: idx0019_000065; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000065 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000030" USING btree ("Sys_SID");


--
-- TOC entry 4473 (class 1259 OID 1935734)
-- Name: idx0019_000066; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000066 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000031" USING btree ("Sys_SID");


--
-- TOC entry 4250 (class 1259 OID 1935735)
-- Name: idx0019_000067; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000067 ON "SchAcquisition"."TblLog_Device_PersonAccess_DEF" USING btree ("Sys_RPK");


--
-- TOC entry 4257 (class 1259 OID 1935736)
-- Name: idx0019_000068; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000068 ON "SchAcquisition"."TblLog_Device_PersonAccess_PMT" USING btree ("Sys_RPK");


--
-- TOC entry 4264 (class 1259 OID 1935737)
-- Name: idx0019_000069; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000069 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000001" USING btree ("Sys_RPK");


--
-- TOC entry 4271 (class 1259 OID 1935738)
-- Name: idx0019_000070; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000070 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000002" USING btree ("Sys_RPK");


--
-- TOC entry 4278 (class 1259 OID 1935739)
-- Name: idx0019_000071; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000071 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000003" USING btree ("Sys_RPK");


--
-- TOC entry 4285 (class 1259 OID 1935740)
-- Name: idx0019_000072; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000072 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000004" USING btree ("Sys_RPK");


--
-- TOC entry 4292 (class 1259 OID 1935741)
-- Name: idx0019_000073; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000073 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000005" USING btree ("Sys_RPK");


--
-- TOC entry 4299 (class 1259 OID 1935742)
-- Name: idx0019_000074; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000074 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000006" USING btree ("Sys_RPK");


--
-- TOC entry 4306 (class 1259 OID 1935743)
-- Name: idx0019_000075; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000075 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000007" USING btree ("Sys_RPK");


--
-- TOC entry 4313 (class 1259 OID 1935744)
-- Name: idx0019_000076; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000076 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000008" USING btree ("Sys_RPK");


--
-- TOC entry 4320 (class 1259 OID 1935745)
-- Name: idx0019_000077; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000077 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000009" USING btree ("Sys_RPK");


--
-- TOC entry 4327 (class 1259 OID 1935746)
-- Name: idx0019_000078; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000078 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000010" USING btree ("Sys_RPK");


--
-- TOC entry 4334 (class 1259 OID 1935747)
-- Name: idx0019_000079; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000079 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000011" USING btree ("Sys_RPK");


--
-- TOC entry 4341 (class 1259 OID 1935748)
-- Name: idx0019_000080; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000080 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000012" USING btree ("Sys_RPK");


--
-- TOC entry 4348 (class 1259 OID 1935749)
-- Name: idx0019_000081; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000081 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000013" USING btree ("Sys_RPK");


--
-- TOC entry 4355 (class 1259 OID 1935750)
-- Name: idx0019_000082; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000082 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000014" USING btree ("Sys_RPK");


--
-- TOC entry 4362 (class 1259 OID 1935751)
-- Name: idx0019_000083; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000083 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000015" USING btree ("Sys_RPK");


--
-- TOC entry 4369 (class 1259 OID 1935753)
-- Name: idx0019_000084; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000084 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000016" USING btree ("Sys_RPK");


--
-- TOC entry 4376 (class 1259 OID 1935756)
-- Name: idx0019_000085; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000085 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000017" USING btree ("Sys_RPK");


--
-- TOC entry 4383 (class 1259 OID 1935757)
-- Name: idx0019_000086; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000086 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000018" USING btree ("Sys_RPK");


--
-- TOC entry 4390 (class 1259 OID 1935758)
-- Name: idx0019_000087; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000087 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000019" USING btree ("Sys_RPK");


--
-- TOC entry 4397 (class 1259 OID 1935759)
-- Name: idx0019_000088; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000088 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000020" USING btree ("Sys_RPK");


--
-- TOC entry 4404 (class 1259 OID 1935760)
-- Name: idx0019_000089; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000089 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000021" USING btree ("Sys_RPK");


--
-- TOC entry 4411 (class 1259 OID 1935761)
-- Name: idx0019_000090; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000090 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000022" USING btree ("Sys_RPK");


--
-- TOC entry 4418 (class 1259 OID 1935762)
-- Name: idx0019_000091; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000091 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000023" USING btree ("Sys_RPK");


--
-- TOC entry 4425 (class 1259 OID 1935763)
-- Name: idx0019_000092; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000092 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000024" USING btree ("Sys_RPK");


--
-- TOC entry 4432 (class 1259 OID 1935764)
-- Name: idx0019_000093; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000093 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000025" USING btree ("Sys_RPK");


--
-- TOC entry 4439 (class 1259 OID 1935765)
-- Name: idx0019_000094; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000094 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000026" USING btree ("Sys_RPK");


--
-- TOC entry 4446 (class 1259 OID 1935766)
-- Name: idx0019_000095; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000095 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000027" USING btree ("Sys_RPK");


--
-- TOC entry 4453 (class 1259 OID 1935767)
-- Name: idx0019_000096; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000096 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000028" USING btree ("Sys_RPK");


--
-- TOC entry 4460 (class 1259 OID 1935768)
-- Name: idx0019_000097; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000097 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000029" USING btree ("Sys_RPK");


--
-- TOC entry 4467 (class 1259 OID 1935769)
-- Name: idx0019_000098; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000098 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000030" USING btree ("Sys_RPK");


--
-- TOC entry 4474 (class 1259 OID 1935770)
-- Name: idx0019_000099; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000099 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000031" USING btree ("Sys_RPK");


--
-- TOC entry 4251 (class 1259 OID 1935771)
-- Name: idx0019_000100; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000100 ON "SchAcquisition"."TblLog_Device_PersonAccess_DEF" USING btree ("Sys_Data_Delete_DateTimeTZ");


--
-- TOC entry 4258 (class 1259 OID 1935772)
-- Name: idx0019_000101; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000101 ON "SchAcquisition"."TblLog_Device_PersonAccess_PMT" USING btree ("Sys_Data_Delete_DateTimeTZ");


--
-- TOC entry 4265 (class 1259 OID 1935773)
-- Name: idx0019_000102; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000102 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000001" USING btree ("Sys_Data_Delete_DateTimeTZ");


--
-- TOC entry 4272 (class 1259 OID 1935774)
-- Name: idx0019_000103; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000103 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000002" USING btree ("Sys_Data_Delete_DateTimeTZ");


--
-- TOC entry 4279 (class 1259 OID 1935775)
-- Name: idx0019_000104; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000104 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000003" USING btree ("Sys_Data_Delete_DateTimeTZ");


--
-- TOC entry 4286 (class 1259 OID 1935776)
-- Name: idx0019_000105; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000105 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000004" USING btree ("Sys_Data_Delete_DateTimeTZ");


--
-- TOC entry 4293 (class 1259 OID 1935777)
-- Name: idx0019_000106; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000106 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000005" USING btree ("Sys_Data_Delete_DateTimeTZ");


--
-- TOC entry 4300 (class 1259 OID 1935778)
-- Name: idx0019_000107; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000107 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000006" USING btree ("Sys_Data_Delete_DateTimeTZ");


--
-- TOC entry 4307 (class 1259 OID 1935779)
-- Name: idx0019_000108; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000108 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000007" USING btree ("Sys_Data_Delete_DateTimeTZ");


--
-- TOC entry 4314 (class 1259 OID 1935780)
-- Name: idx0019_000109; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000109 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000008" USING btree ("Sys_Data_Delete_DateTimeTZ");


--
-- TOC entry 4321 (class 1259 OID 1935781)
-- Name: idx0019_000110; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000110 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000009" USING btree ("Sys_Data_Delete_DateTimeTZ");


--
-- TOC entry 4328 (class 1259 OID 1935782)
-- Name: idx0019_000111; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000111 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000010" USING btree ("Sys_Data_Delete_DateTimeTZ");


--
-- TOC entry 4335 (class 1259 OID 1935783)
-- Name: idx0019_000112; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000112 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000011" USING btree ("Sys_Data_Delete_DateTimeTZ");


--
-- TOC entry 4342 (class 1259 OID 1935784)
-- Name: idx0019_000113; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000113 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000012" USING btree ("Sys_Data_Delete_DateTimeTZ");


--
-- TOC entry 4349 (class 1259 OID 1935785)
-- Name: idx0019_000114; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000114 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000013" USING btree ("Sys_Data_Delete_DateTimeTZ");


--
-- TOC entry 4356 (class 1259 OID 1935786)
-- Name: idx0019_000115; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000115 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000014" USING btree ("Sys_Data_Delete_DateTimeTZ");


--
-- TOC entry 4363 (class 1259 OID 1935787)
-- Name: idx0019_000116; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000116 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000015" USING btree ("Sys_Data_Delete_DateTimeTZ");


--
-- TOC entry 4370 (class 1259 OID 1935788)
-- Name: idx0019_000117; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000117 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000016" USING btree ("Sys_Data_Delete_DateTimeTZ");


--
-- TOC entry 4377 (class 1259 OID 1935789)
-- Name: idx0019_000118; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000118 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000017" USING btree ("Sys_Data_Delete_DateTimeTZ");


--
-- TOC entry 4384 (class 1259 OID 1935790)
-- Name: idx0019_000119; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000119 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000018" USING btree ("Sys_Data_Delete_DateTimeTZ");


--
-- TOC entry 4391 (class 1259 OID 1935791)
-- Name: idx0019_000120; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000120 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000019" USING btree ("Sys_Data_Delete_DateTimeTZ");


--
-- TOC entry 4398 (class 1259 OID 1935792)
-- Name: idx0019_000121; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000121 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000020" USING btree ("Sys_Data_Delete_DateTimeTZ");


--
-- TOC entry 4405 (class 1259 OID 1935793)
-- Name: idx0019_000122; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000122 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000021" USING btree ("Sys_Data_Delete_DateTimeTZ");


--
-- TOC entry 4412 (class 1259 OID 1935794)
-- Name: idx0019_000123; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000123 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000022" USING btree ("Sys_Data_Delete_DateTimeTZ");


--
-- TOC entry 4419 (class 1259 OID 1935795)
-- Name: idx0019_000124; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000124 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000023" USING btree ("Sys_Data_Delete_DateTimeTZ");


--
-- TOC entry 4426 (class 1259 OID 1935796)
-- Name: idx0019_000125; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000125 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000024" USING btree ("Sys_Data_Delete_DateTimeTZ");


--
-- TOC entry 4433 (class 1259 OID 1935797)
-- Name: idx0019_000126; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000126 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000025" USING btree ("Sys_Data_Delete_DateTimeTZ");


--
-- TOC entry 4440 (class 1259 OID 1935798)
-- Name: idx0019_000127; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000127 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000026" USING btree ("Sys_Data_Delete_DateTimeTZ");


--
-- TOC entry 4447 (class 1259 OID 1935799)
-- Name: idx0019_000128; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000128 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000027" USING btree ("Sys_Data_Delete_DateTimeTZ");


--
-- TOC entry 4454 (class 1259 OID 1935800)
-- Name: idx0019_000129; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000129 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000028" USING btree ("Sys_Data_Delete_DateTimeTZ");


--
-- TOC entry 4461 (class 1259 OID 1935801)
-- Name: idx0019_000130; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000130 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000029" USING btree ("Sys_Data_Delete_DateTimeTZ");


--
-- TOC entry 4468 (class 1259 OID 1935802)
-- Name: idx0019_000131; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000131 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000030" USING btree ("Sys_Data_Delete_DateTimeTZ");


--
-- TOC entry 4475 (class 1259 OID 1935803)
-- Name: idx0019_000132; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000132 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000031" USING btree ("Sys_Data_Delete_DateTimeTZ");


--
-- TOC entry 4252 (class 1259 OID 1935804)
-- Name: idx0019_000133; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000133 ON "SchAcquisition"."TblLog_Device_PersonAccess_DEF" USING btree ("Sys_Data_Hidden_DateTimeTZ");


--
-- TOC entry 4259 (class 1259 OID 1935805)
-- Name: idx0019_000134; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000134 ON "SchAcquisition"."TblLog_Device_PersonAccess_PMT" USING btree ("Sys_Data_Hidden_DateTimeTZ");


--
-- TOC entry 4266 (class 1259 OID 1935806)
-- Name: idx0019_000135; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000135 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000001" USING btree ("Sys_Data_Hidden_DateTimeTZ");


--
-- TOC entry 4273 (class 1259 OID 1935807)
-- Name: idx0019_000136; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000136 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000002" USING btree ("Sys_Data_Hidden_DateTimeTZ");


--
-- TOC entry 4280 (class 1259 OID 1935808)
-- Name: idx0019_000137; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000137 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000003" USING btree ("Sys_Data_Hidden_DateTimeTZ");


--
-- TOC entry 4287 (class 1259 OID 1935809)
-- Name: idx0019_000138; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000138 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000004" USING btree ("Sys_Data_Hidden_DateTimeTZ");


--
-- TOC entry 4294 (class 1259 OID 1935810)
-- Name: idx0019_000139; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000139 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000005" USING btree ("Sys_Data_Hidden_DateTimeTZ");


--
-- TOC entry 4301 (class 1259 OID 1935811)
-- Name: idx0019_000140; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000140 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000006" USING btree ("Sys_Data_Hidden_DateTimeTZ");


--
-- TOC entry 4308 (class 1259 OID 1935812)
-- Name: idx0019_000141; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000141 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000007" USING btree ("Sys_Data_Hidden_DateTimeTZ");


--
-- TOC entry 4315 (class 1259 OID 1935813)
-- Name: idx0019_000142; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000142 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000008" USING btree ("Sys_Data_Hidden_DateTimeTZ");


--
-- TOC entry 4322 (class 1259 OID 1935814)
-- Name: idx0019_000143; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000143 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000009" USING btree ("Sys_Data_Hidden_DateTimeTZ");


--
-- TOC entry 4329 (class 1259 OID 1935815)
-- Name: idx0019_000144; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000144 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000010" USING btree ("Sys_Data_Hidden_DateTimeTZ");


--
-- TOC entry 4336 (class 1259 OID 1935816)
-- Name: idx0019_000145; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000145 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000011" USING btree ("Sys_Data_Hidden_DateTimeTZ");


--
-- TOC entry 4343 (class 1259 OID 1935817)
-- Name: idx0019_000146; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000146 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000012" USING btree ("Sys_Data_Hidden_DateTimeTZ");


--
-- TOC entry 4350 (class 1259 OID 1935818)
-- Name: idx0019_000147; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000147 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000013" USING btree ("Sys_Data_Hidden_DateTimeTZ");


--
-- TOC entry 4357 (class 1259 OID 1935819)
-- Name: idx0019_000148; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000148 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000014" USING btree ("Sys_Data_Hidden_DateTimeTZ");


--
-- TOC entry 4364 (class 1259 OID 1935820)
-- Name: idx0019_000149; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000149 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000015" USING btree ("Sys_Data_Hidden_DateTimeTZ");


--
-- TOC entry 4371 (class 1259 OID 1935821)
-- Name: idx0019_000150; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000150 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000016" USING btree ("Sys_Data_Hidden_DateTimeTZ");


--
-- TOC entry 4378 (class 1259 OID 1935822)
-- Name: idx0019_000151; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000151 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000017" USING btree ("Sys_Data_Hidden_DateTimeTZ");


--
-- TOC entry 4385 (class 1259 OID 1935823)
-- Name: idx0019_000152; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000152 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000018" USING btree ("Sys_Data_Hidden_DateTimeTZ");


--
-- TOC entry 4392 (class 1259 OID 1935824)
-- Name: idx0019_000153; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000153 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000019" USING btree ("Sys_Data_Hidden_DateTimeTZ");


--
-- TOC entry 4399 (class 1259 OID 1935825)
-- Name: idx0019_000154; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000154 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000020" USING btree ("Sys_Data_Hidden_DateTimeTZ");


--
-- TOC entry 4406 (class 1259 OID 1935826)
-- Name: idx0019_000155; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000155 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000021" USING btree ("Sys_Data_Hidden_DateTimeTZ");


--
-- TOC entry 4413 (class 1259 OID 1935827)
-- Name: idx0019_000156; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000156 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000022" USING btree ("Sys_Data_Hidden_DateTimeTZ");


--
-- TOC entry 4420 (class 1259 OID 1935828)
-- Name: idx0019_000157; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000157 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000023" USING btree ("Sys_Data_Hidden_DateTimeTZ");


--
-- TOC entry 4427 (class 1259 OID 1935829)
-- Name: idx0019_000158; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000158 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000024" USING btree ("Sys_Data_Hidden_DateTimeTZ");


--
-- TOC entry 4434 (class 1259 OID 1935830)
-- Name: idx0019_000159; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000159 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000025" USING btree ("Sys_Data_Hidden_DateTimeTZ");


--
-- TOC entry 4441 (class 1259 OID 1935831)
-- Name: idx0019_000160; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000160 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000026" USING btree ("Sys_Data_Hidden_DateTimeTZ");


--
-- TOC entry 4448 (class 1259 OID 1935832)
-- Name: idx0019_000161; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000161 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000027" USING btree ("Sys_Data_Hidden_DateTimeTZ");


--
-- TOC entry 4455 (class 1259 OID 1935833)
-- Name: idx0019_000162; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000162 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000028" USING btree ("Sys_Data_Hidden_DateTimeTZ");


--
-- TOC entry 4462 (class 1259 OID 1935834)
-- Name: idx0019_000163; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000163 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000029" USING btree ("Sys_Data_Hidden_DateTimeTZ");


--
-- TOC entry 4469 (class 1259 OID 1935835)
-- Name: idx0019_000164; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000164 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000030" USING btree ("Sys_Data_Hidden_DateTimeTZ");


--
-- TOC entry 4476 (class 1259 OID 1935836)
-- Name: idx0019_000165; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000165 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000031" USING btree ("Sys_Data_Hidden_DateTimeTZ");


--
-- TOC entry 4253 (class 1259 OID 1935837)
-- Name: idx0019_000166; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000166 ON "SchAcquisition"."TblLog_Device_PersonAccess_DEF" USING btree ("Log_Device_PersonAccessFetch_RefID");


--
-- TOC entry 4260 (class 1259 OID 1935838)
-- Name: idx0019_000167; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000167 ON "SchAcquisition"."TblLog_Device_PersonAccess_PMT" USING btree ("Log_Device_PersonAccessFetch_RefID");


--
-- TOC entry 4267 (class 1259 OID 1935839)
-- Name: idx0019_000168; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000168 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000001" USING btree ("Log_Device_PersonAccessFetch_RefID");


--
-- TOC entry 4274 (class 1259 OID 1935840)
-- Name: idx0019_000169; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000169 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000002" USING btree ("Log_Device_PersonAccessFetch_RefID");


--
-- TOC entry 4281 (class 1259 OID 1935841)
-- Name: idx0019_000170; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000170 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000003" USING btree ("Log_Device_PersonAccessFetch_RefID");


--
-- TOC entry 4288 (class 1259 OID 1935842)
-- Name: idx0019_000171; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000171 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000004" USING btree ("Log_Device_PersonAccessFetch_RefID");


--
-- TOC entry 4295 (class 1259 OID 1935843)
-- Name: idx0019_000172; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000172 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000005" USING btree ("Log_Device_PersonAccessFetch_RefID");


--
-- TOC entry 4302 (class 1259 OID 1935844)
-- Name: idx0019_000173; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000173 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000006" USING btree ("Log_Device_PersonAccessFetch_RefID");


--
-- TOC entry 4309 (class 1259 OID 1935845)
-- Name: idx0019_000174; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000174 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000007" USING btree ("Log_Device_PersonAccessFetch_RefID");


--
-- TOC entry 4316 (class 1259 OID 1935846)
-- Name: idx0019_000175; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000175 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000008" USING btree ("Log_Device_PersonAccessFetch_RefID");


--
-- TOC entry 4323 (class 1259 OID 1935847)
-- Name: idx0019_000176; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000176 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000009" USING btree ("Log_Device_PersonAccessFetch_RefID");


--
-- TOC entry 4330 (class 1259 OID 1935848)
-- Name: idx0019_000177; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000177 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000010" USING btree ("Log_Device_PersonAccessFetch_RefID");


--
-- TOC entry 4337 (class 1259 OID 1935849)
-- Name: idx0019_000178; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000178 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000011" USING btree ("Log_Device_PersonAccessFetch_RefID");


--
-- TOC entry 4344 (class 1259 OID 1935850)
-- Name: idx0019_000179; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000179 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000012" USING btree ("Log_Device_PersonAccessFetch_RefID");


--
-- TOC entry 4351 (class 1259 OID 1935851)
-- Name: idx0019_000180; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000180 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000013" USING btree ("Log_Device_PersonAccessFetch_RefID");


--
-- TOC entry 4358 (class 1259 OID 1935852)
-- Name: idx0019_000181; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000181 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000014" USING btree ("Log_Device_PersonAccessFetch_RefID");


--
-- TOC entry 4365 (class 1259 OID 1935853)
-- Name: idx0019_000182; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000182 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000015" USING btree ("Log_Device_PersonAccessFetch_RefID");


--
-- TOC entry 4372 (class 1259 OID 1935854)
-- Name: idx0019_000183; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000183 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000016" USING btree ("Log_Device_PersonAccessFetch_RefID");


--
-- TOC entry 4379 (class 1259 OID 1935856)
-- Name: idx0019_000184; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000184 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000017" USING btree ("Log_Device_PersonAccessFetch_RefID");


--
-- TOC entry 4386 (class 1259 OID 1935857)
-- Name: idx0019_000185; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000185 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000018" USING btree ("Log_Device_PersonAccessFetch_RefID");


--
-- TOC entry 4393 (class 1259 OID 1935858)
-- Name: idx0019_000186; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000186 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000019" USING btree ("Log_Device_PersonAccessFetch_RefID");


--
-- TOC entry 4400 (class 1259 OID 1935859)
-- Name: idx0019_000187; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000187 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000020" USING btree ("Log_Device_PersonAccessFetch_RefID");


--
-- TOC entry 4407 (class 1259 OID 1935860)
-- Name: idx0019_000188; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000188 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000021" USING btree ("Log_Device_PersonAccessFetch_RefID");


--
-- TOC entry 4414 (class 1259 OID 1935861)
-- Name: idx0019_000189; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000189 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000022" USING btree ("Log_Device_PersonAccessFetch_RefID");


--
-- TOC entry 4421 (class 1259 OID 1935862)
-- Name: idx0019_000190; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000190 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000023" USING btree ("Log_Device_PersonAccessFetch_RefID");


--
-- TOC entry 4428 (class 1259 OID 1935863)
-- Name: idx0019_000191; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000191 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000024" USING btree ("Log_Device_PersonAccessFetch_RefID");


--
-- TOC entry 4435 (class 1259 OID 1935864)
-- Name: idx0019_000192; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000192 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000025" USING btree ("Log_Device_PersonAccessFetch_RefID");


--
-- TOC entry 4442 (class 1259 OID 1935865)
-- Name: idx0019_000193; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000193 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000026" USING btree ("Log_Device_PersonAccessFetch_RefID");


--
-- TOC entry 4449 (class 1259 OID 1935866)
-- Name: idx0019_000194; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000194 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000027" USING btree ("Log_Device_PersonAccessFetch_RefID");


--
-- TOC entry 4456 (class 1259 OID 1935867)
-- Name: idx0019_000195; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000195 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000028" USING btree ("Log_Device_PersonAccessFetch_RefID");


--
-- TOC entry 4463 (class 1259 OID 1935868)
-- Name: idx0019_000196; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000196 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000029" USING btree ("Log_Device_PersonAccessFetch_RefID");


--
-- TOC entry 4470 (class 1259 OID 1935869)
-- Name: idx0019_000197; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000197 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000030" USING btree ("Log_Device_PersonAccessFetch_RefID");


--
-- TOC entry 4477 (class 1259 OID 1935870)
-- Name: idx0019_000198; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000198 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000031" USING btree ("Log_Device_PersonAccessFetch_RefID");


--
-- TOC entry 4254 (class 1259 OID 1935871)
-- Name: idx0019_000199; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000199 ON "SchAcquisition"."TblLog_Device_PersonAccess_DEF" USING btree ("PersonID");


--
-- TOC entry 4261 (class 1259 OID 1935872)
-- Name: idx0019_000200; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000200 ON "SchAcquisition"."TblLog_Device_PersonAccess_PMT" USING btree ("PersonID");


--
-- TOC entry 4268 (class 1259 OID 1935873)
-- Name: idx0019_000201; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000201 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000001" USING btree ("PersonID");


--
-- TOC entry 4275 (class 1259 OID 1935874)
-- Name: idx0019_000202; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000202 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000002" USING btree ("PersonID");


--
-- TOC entry 4282 (class 1259 OID 1935875)
-- Name: idx0019_000203; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000203 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000003" USING btree ("PersonID");


--
-- TOC entry 4289 (class 1259 OID 1935876)
-- Name: idx0019_000204; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000204 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000004" USING btree ("PersonID");


--
-- TOC entry 4296 (class 1259 OID 1935877)
-- Name: idx0019_000205; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000205 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000005" USING btree ("PersonID");


--
-- TOC entry 4303 (class 1259 OID 1935878)
-- Name: idx0019_000206; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000206 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000006" USING btree ("PersonID");


--
-- TOC entry 4310 (class 1259 OID 1935879)
-- Name: idx0019_000207; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000207 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000007" USING btree ("PersonID");


--
-- TOC entry 4317 (class 1259 OID 1935880)
-- Name: idx0019_000208; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000208 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000008" USING btree ("PersonID");


--
-- TOC entry 4324 (class 1259 OID 1935881)
-- Name: idx0019_000209; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000209 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000009" USING btree ("PersonID");


--
-- TOC entry 4331 (class 1259 OID 1935882)
-- Name: idx0019_000210; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000210 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000010" USING btree ("PersonID");


--
-- TOC entry 4338 (class 1259 OID 1935889)
-- Name: idx0019_000211; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000211 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000011" USING btree ("PersonID");


--
-- TOC entry 4345 (class 1259 OID 1935893)
-- Name: idx0019_000212; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000212 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000012" USING btree ("PersonID");


--
-- TOC entry 4352 (class 1259 OID 1935904)
-- Name: idx0019_000213; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000213 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000013" USING btree ("PersonID");


--
-- TOC entry 4359 (class 1259 OID 1935905)
-- Name: idx0019_000214; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000214 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000014" USING btree ("PersonID");


--
-- TOC entry 4366 (class 1259 OID 1935906)
-- Name: idx0019_000215; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000215 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000015" USING btree ("PersonID");


--
-- TOC entry 4373 (class 1259 OID 1935907)
-- Name: idx0019_000216; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000216 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000016" USING btree ("PersonID");


--
-- TOC entry 4380 (class 1259 OID 1935908)
-- Name: idx0019_000217; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000217 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000017" USING btree ("PersonID");


--
-- TOC entry 4387 (class 1259 OID 1935909)
-- Name: idx0019_000218; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000218 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000018" USING btree ("PersonID");


--
-- TOC entry 4394 (class 1259 OID 1935910)
-- Name: idx0019_000219; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000219 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000019" USING btree ("PersonID");


--
-- TOC entry 4401 (class 1259 OID 1935911)
-- Name: idx0019_000220; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000220 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000020" USING btree ("PersonID");


--
-- TOC entry 4408 (class 1259 OID 1935912)
-- Name: idx0019_000221; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000221 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000021" USING btree ("PersonID");


--
-- TOC entry 4415 (class 1259 OID 1935913)
-- Name: idx0019_000222; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000222 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000022" USING btree ("PersonID");


--
-- TOC entry 4422 (class 1259 OID 1935914)
-- Name: idx0019_000223; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000223 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000023" USING btree ("PersonID");


--
-- TOC entry 4429 (class 1259 OID 1935915)
-- Name: idx0019_000224; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000224 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000024" USING btree ("PersonID");


--
-- TOC entry 4436 (class 1259 OID 1935916)
-- Name: idx0019_000225; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000225 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000025" USING btree ("PersonID");


--
-- TOC entry 4443 (class 1259 OID 1935917)
-- Name: idx0019_000226; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000226 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000026" USING btree ("PersonID");


--
-- TOC entry 4450 (class 1259 OID 1935918)
-- Name: idx0019_000227; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000227 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000027" USING btree ("PersonID");


--
-- TOC entry 4457 (class 1259 OID 1935919)
-- Name: idx0019_000228; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000228 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000028" USING btree ("PersonID");


--
-- TOC entry 4464 (class 1259 OID 1935920)
-- Name: idx0019_000229; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000229 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000029" USING btree ("PersonID");


--
-- TOC entry 4471 (class 1259 OID 1935921)
-- Name: idx0019_000230; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000230 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000030" USING btree ("PersonID");


--
-- TOC entry 4478 (class 1259 OID 1935922)
-- Name: idx0019_000231; Type: INDEX; Schema: SchAcquisition; Owner: SysEngine
--

CREATE INDEX idx0019_000231 ON "SchAcquisition"."TblLog_Device_PersonAccess_RMV_8000000000031" USING btree ("PersonID");


--
-- TOC entry 4495 (class 1259 OID 1935923)
-- Name: idx0259_000001; Type: INDEX; Schema: SchCache; Owner: SysAdmin
--

CREATE INDEX idx0259_000001 ON "SchCache"."TblCache_FunctionResult" USING btree ("SchemaFunctionName");


--
-- TOC entry 4496 (class 1259 OID 1935924)
-- Name: idx0259_000002; Type: INDEX; Schema: SchCache; Owner: SysAdmin
--

CREATE INDEX idx0259_000002 ON "SchCache"."TblCache_FunctionResult" USING btree ("Parameter");


--
-- TOC entry 4497 (class 1259 OID 1935925)
-- Name: idx0259_000003; Type: INDEX; Schema: SchCache; Owner: SysAdmin
--

CREATE INDEX idx0259_000003 ON "SchCache"."TblCache_FunctionResult" USING btree ("ObjectsSignatureReference");


--
-- TOC entry 4498 (class 1259 OID 1935926)
-- Name: idx0259_000004; Type: INDEX; Schema: SchCache; Owner: SysAdmin
--

CREATE INDEX idx0259_000004 ON "SchCache"."TblCache_FunctionResult" USING btree ("SQLRecallSyntax");


--
-- TOC entry 4499 (class 1259 OID 1935927)
-- Name: idx0259_000005; Type: INDEX; Schema: SchCache; Owner: SysAdmin
--

CREATE INDEX idx0259_000005 ON "SchCache"."TblCache_FunctionResult" USING btree ("ReturnDataType");


--
-- TOC entry 4500 (class 1259 OID 1935928)
-- Name: idx0259_000006; Type: INDEX; Schema: SchCache; Owner: SysAdmin
--

CREATE INDEX idx0259_000006 ON "SchCache"."TblCache_FunctionResult" USING btree ("ReturnDataTypePlaceHolder");


--
-- TOC entry 4501 (class 1259 OID 1935929)
-- Name: idx0259_000007; Type: INDEX; Schema: SchCache; Owner: SysAdmin
--

CREATE INDEX idx0259_000007 ON "SchCache"."TblCache_FunctionResult" USING btree ("SQLRecallSyntax", "ReturnDataType", "ReturnDataTypePlaceHolder", "Sys_Data_Delete_DateTimeTZ", "Sys_Data_Hidden_DateTimeTZ");


--
-- TOC entry 4504 (class 1259 OID 1935930)
-- Name: idx0260_000001; Type: INDEX; Schema: SchCache; Owner: SysAdmin
--

CREATE INDEX idx0260_000001 ON "SchCache"."TblStatistic_CacheFunctionResultAccess" USING btree ("Cache_FunctionResult_RefID");


--
-- TOC entry 4511 (class 1259 OID 1935931)
-- Name: idx0235_000001; Type: INDEX; Schema: SchLog; Owner: SysAdmin
--

CREATE INDEX idx0235_000001 ON "SchLog"."TblLog_TableSnapshotSignature" USING btree ("SchemaName");


--
-- TOC entry 4512 (class 1259 OID 1935932)
-- Name: idx0235_000002; Type: INDEX; Schema: SchLog; Owner: SysAdmin
--

CREATE INDEX idx0235_000002 ON "SchLog"."TblLog_TableSnapshotSignature" USING btree ("TableName");


--
-- TOC entry 4513 (class 1259 OID 1935933)
-- Name: idx0246_000001; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000001 ON "SchLog"."TblLog_TransactionHistory_DEF" USING btree ("Source_RefPID");


--
-- TOC entry 4516 (class 1259 OID 1935934)
-- Name: idx0246_000002; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000002 ON "SchLog"."TblLog_TransactionHistory_PMT" USING btree ("Source_RefPID");


--
-- TOC entry 4519 (class 1259 OID 1935939)
-- Name: idx0246_000003; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000003 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000001" USING btree ("Source_RefPID");


--
-- TOC entry 4522 (class 1259 OID 1935940)
-- Name: idx0246_000004; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000004 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000002" USING btree ("Source_RefPID");


--
-- TOC entry 4525 (class 1259 OID 1935941)
-- Name: idx0246_000005; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000005 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000003" USING btree ("Source_RefPID");


--
-- TOC entry 4528 (class 1259 OID 1935942)
-- Name: idx0246_000006; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000006 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000004" USING btree ("Source_RefPID");


--
-- TOC entry 4531 (class 1259 OID 1935943)
-- Name: idx0246_000007; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000007 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000005" USING btree ("Source_RefPID");


--
-- TOC entry 4534 (class 1259 OID 1935944)
-- Name: idx0246_000008; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000008 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000006" USING btree ("Source_RefPID");


--
-- TOC entry 4537 (class 1259 OID 1935945)
-- Name: idx0246_000009; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000009 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000007" USING btree ("Source_RefPID");


--
-- TOC entry 4540 (class 1259 OID 1935946)
-- Name: idx0246_000010; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000010 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000008" USING btree ("Source_RefPID");


--
-- TOC entry 4543 (class 1259 OID 1935947)
-- Name: idx0246_000011; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000011 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000009" USING btree ("Source_RefPID");


--
-- TOC entry 4546 (class 1259 OID 1935948)
-- Name: idx0246_000012; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000012 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000010" USING btree ("Source_RefPID");


--
-- TOC entry 4549 (class 1259 OID 1935949)
-- Name: idx0246_000013; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000013 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000011" USING btree ("Source_RefPID");


--
-- TOC entry 4552 (class 1259 OID 1935950)
-- Name: idx0246_000014; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000014 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000012" USING btree ("Source_RefPID");


--
-- TOC entry 4555 (class 1259 OID 1935951)
-- Name: idx0246_000015; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000015 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000013" USING btree ("Source_RefPID");


--
-- TOC entry 4558 (class 1259 OID 1935952)
-- Name: idx0246_000016; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000016 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000014" USING btree ("Source_RefPID");


--
-- TOC entry 4561 (class 1259 OID 1935953)
-- Name: idx0246_000017; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000017 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000015" USING btree ("Source_RefPID");


--
-- TOC entry 4564 (class 1259 OID 1935954)
-- Name: idx0246_000018; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000018 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000016" USING btree ("Source_RefPID");


--
-- TOC entry 4567 (class 1259 OID 1935955)
-- Name: idx0246_000019; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000019 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000017" USING btree ("Source_RefPID");


--
-- TOC entry 4570 (class 1259 OID 1935956)
-- Name: idx0246_000020; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000020 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000018" USING btree ("Source_RefPID");


--
-- TOC entry 4573 (class 1259 OID 1935957)
-- Name: idx0246_000021; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000021 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000019" USING btree ("Source_RefPID");


--
-- TOC entry 4576 (class 1259 OID 1935958)
-- Name: idx0246_000022; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000022 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000020" USING btree ("Source_RefPID");


--
-- TOC entry 4579 (class 1259 OID 1935959)
-- Name: idx0246_000023; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000023 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000021" USING btree ("Source_RefPID");


--
-- TOC entry 4582 (class 1259 OID 1935960)
-- Name: idx0246_000024; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000024 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000022" USING btree ("Source_RefPID");


--
-- TOC entry 4585 (class 1259 OID 1935961)
-- Name: idx0246_000025; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000025 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000023" USING btree ("Source_RefPID");


--
-- TOC entry 4588 (class 1259 OID 1935962)
-- Name: idx0246_000026; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000026 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000024" USING btree ("Source_RefPID");


--
-- TOC entry 4591 (class 1259 OID 1935963)
-- Name: idx0246_000027; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000027 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000025" USING btree ("Source_RefPID");


--
-- TOC entry 4594 (class 1259 OID 1935964)
-- Name: idx0246_000028; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000028 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000026" USING btree ("Source_RefPID");


--
-- TOC entry 4597 (class 1259 OID 1935965)
-- Name: idx0246_000029; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000029 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000027" USING btree ("Source_RefPID");


--
-- TOC entry 4600 (class 1259 OID 1935966)
-- Name: idx0246_000030; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000030 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000028" USING btree ("Source_RefPID");


--
-- TOC entry 4603 (class 1259 OID 1935967)
-- Name: idx0246_000031; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000031 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000029" USING btree ("Source_RefPID");


--
-- TOC entry 4606 (class 1259 OID 1935968)
-- Name: idx0246_000032; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000032 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000030" USING btree ("Source_RefPID");


--
-- TOC entry 4609 (class 1259 OID 1935969)
-- Name: idx0246_000033; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000033 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000031" USING btree ("Source_RefPID");


--
-- TOC entry 4514 (class 1259 OID 1935970)
-- Name: idx0246_000034; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000034 ON "SchLog"."TblLog_TransactionHistory_DEF" USING btree ("Source_RefSID");


--
-- TOC entry 4517 (class 1259 OID 1935971)
-- Name: idx0246_000035; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000035 ON "SchLog"."TblLog_TransactionHistory_PMT" USING btree ("Source_RefSID");


--
-- TOC entry 4520 (class 1259 OID 1935972)
-- Name: idx0246_000036; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000036 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000001" USING btree ("Source_RefSID");


--
-- TOC entry 4523 (class 1259 OID 1935973)
-- Name: idx0246_000037; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000037 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000002" USING btree ("Source_RefSID");


--
-- TOC entry 4526 (class 1259 OID 1935974)
-- Name: idx0246_000038; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000038 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000003" USING btree ("Source_RefSID");


--
-- TOC entry 4529 (class 1259 OID 1935975)
-- Name: idx0246_000039; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000039 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000004" USING btree ("Source_RefSID");


--
-- TOC entry 4532 (class 1259 OID 1935976)
-- Name: idx0246_000040; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000040 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000005" USING btree ("Source_RefSID");


--
-- TOC entry 4535 (class 1259 OID 1935977)
-- Name: idx0246_000041; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000041 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000006" USING btree ("Source_RefSID");


--
-- TOC entry 4538 (class 1259 OID 1935978)
-- Name: idx0246_000042; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000042 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000007" USING btree ("Source_RefSID");


--
-- TOC entry 4541 (class 1259 OID 1935979)
-- Name: idx0246_000043; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000043 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000008" USING btree ("Source_RefSID");


--
-- TOC entry 4544 (class 1259 OID 1935980)
-- Name: idx0246_000044; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000044 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000009" USING btree ("Source_RefSID");


--
-- TOC entry 4547 (class 1259 OID 1935981)
-- Name: idx0246_000045; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000045 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000010" USING btree ("Source_RefSID");


--
-- TOC entry 4550 (class 1259 OID 1935982)
-- Name: idx0246_000046; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000046 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000011" USING btree ("Source_RefSID");


--
-- TOC entry 4553 (class 1259 OID 1935983)
-- Name: idx0246_000047; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000047 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000012" USING btree ("Source_RefSID");


--
-- TOC entry 4556 (class 1259 OID 1935984)
-- Name: idx0246_000048; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000048 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000013" USING btree ("Source_RefSID");


--
-- TOC entry 4559 (class 1259 OID 1935985)
-- Name: idx0246_000049; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000049 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000014" USING btree ("Source_RefSID");


--
-- TOC entry 4562 (class 1259 OID 1935986)
-- Name: idx0246_000050; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000050 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000015" USING btree ("Source_RefSID");


--
-- TOC entry 4565 (class 1259 OID 1935987)
-- Name: idx0246_000051; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000051 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000016" USING btree ("Source_RefSID");


--
-- TOC entry 4568 (class 1259 OID 1935988)
-- Name: idx0246_000052; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000052 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000017" USING btree ("Source_RefSID");


--
-- TOC entry 4571 (class 1259 OID 1935989)
-- Name: idx0246_000053; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000053 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000018" USING btree ("Source_RefSID");


--
-- TOC entry 4574 (class 1259 OID 1935990)
-- Name: idx0246_000054; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000054 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000019" USING btree ("Source_RefSID");


--
-- TOC entry 4577 (class 1259 OID 1935991)
-- Name: idx0246_000055; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000055 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000020" USING btree ("Source_RefSID");


--
-- TOC entry 4580 (class 1259 OID 1935992)
-- Name: idx0246_000056; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000056 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000021" USING btree ("Source_RefSID");


--
-- TOC entry 4583 (class 1259 OID 1935993)
-- Name: idx0246_000057; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000057 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000022" USING btree ("Source_RefSID");


--
-- TOC entry 4586 (class 1259 OID 1935994)
-- Name: idx0246_000058; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000058 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000023" USING btree ("Source_RefSID");


--
-- TOC entry 4589 (class 1259 OID 1935995)
-- Name: idx0246_000059; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000059 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000024" USING btree ("Source_RefSID");


--
-- TOC entry 4592 (class 1259 OID 1935996)
-- Name: idx0246_000060; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000060 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000025" USING btree ("Source_RefSID");


--
-- TOC entry 4595 (class 1259 OID 1935997)
-- Name: idx0246_000061; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000061 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000026" USING btree ("Source_RefSID");


--
-- TOC entry 4598 (class 1259 OID 1935998)
-- Name: idx0246_000062; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000062 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000027" USING btree ("Source_RefSID");


--
-- TOC entry 4601 (class 1259 OID 1935999)
-- Name: idx0246_000063; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000063 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000028" USING btree ("Source_RefSID");


--
-- TOC entry 4604 (class 1259 OID 1936000)
-- Name: idx0246_000064; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000064 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000029" USING btree ("Source_RefSID");


--
-- TOC entry 4607 (class 1259 OID 1936001)
-- Name: idx0246_000065; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000065 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000030" USING btree ("Source_RefSID");


--
-- TOC entry 4610 (class 1259 OID 1936002)
-- Name: idx0246_000066; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000066 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000031" USING btree ("Source_RefSID");


--
-- TOC entry 4515 (class 1259 OID 1936003)
-- Name: idx0246_000067; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000067 ON "SchLog"."TblLog_TransactionHistory_DEF" USING btree ("Source_RefRPK");


--
-- TOC entry 4518 (class 1259 OID 1936004)
-- Name: idx0246_000068; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000068 ON "SchLog"."TblLog_TransactionHistory_PMT" USING btree ("Source_RefRPK");


--
-- TOC entry 4521 (class 1259 OID 1936005)
-- Name: idx0246_000069; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000069 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000001" USING btree ("Source_RefRPK");


--
-- TOC entry 4524 (class 1259 OID 1936006)
-- Name: idx0246_000070; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000070 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000002" USING btree ("Source_RefRPK");


--
-- TOC entry 4527 (class 1259 OID 1936007)
-- Name: idx0246_000071; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000071 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000003" USING btree ("Source_RefRPK");


--
-- TOC entry 4530 (class 1259 OID 1936008)
-- Name: idx0246_000072; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000072 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000004" USING btree ("Source_RefRPK");


--
-- TOC entry 4533 (class 1259 OID 1936009)
-- Name: idx0246_000073; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000073 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000005" USING btree ("Source_RefRPK");


--
-- TOC entry 4536 (class 1259 OID 1936010)
-- Name: idx0246_000074; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000074 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000006" USING btree ("Source_RefRPK");


--
-- TOC entry 4539 (class 1259 OID 1936011)
-- Name: idx0246_000075; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000075 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000007" USING btree ("Source_RefRPK");


--
-- TOC entry 4542 (class 1259 OID 1936012)
-- Name: idx0246_000076; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000076 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000008" USING btree ("Source_RefRPK");


--
-- TOC entry 4545 (class 1259 OID 1936013)
-- Name: idx0246_000077; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000077 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000009" USING btree ("Source_RefRPK");


--
-- TOC entry 4548 (class 1259 OID 1936014)
-- Name: idx0246_000078; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000078 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000010" USING btree ("Source_RefRPK");


--
-- TOC entry 4551 (class 1259 OID 1936015)
-- Name: idx0246_000079; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000079 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000011" USING btree ("Source_RefRPK");


--
-- TOC entry 4554 (class 1259 OID 1936016)
-- Name: idx0246_000080; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000080 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000012" USING btree ("Source_RefRPK");


--
-- TOC entry 4557 (class 1259 OID 1936017)
-- Name: idx0246_000081; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000081 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000013" USING btree ("Source_RefRPK");


--
-- TOC entry 4560 (class 1259 OID 1936018)
-- Name: idx0246_000082; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000082 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000014" USING btree ("Source_RefRPK");


--
-- TOC entry 4563 (class 1259 OID 1936019)
-- Name: idx0246_000083; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000083 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000015" USING btree ("Source_RefRPK");


--
-- TOC entry 4566 (class 1259 OID 1936020)
-- Name: idx0246_000084; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000084 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000016" USING btree ("Source_RefRPK");


--
-- TOC entry 4569 (class 1259 OID 1936021)
-- Name: idx0246_000085; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000085 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000017" USING btree ("Source_RefRPK");


--
-- TOC entry 4572 (class 1259 OID 1936022)
-- Name: idx0246_000086; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000086 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000018" USING btree ("Source_RefRPK");


--
-- TOC entry 4575 (class 1259 OID 1936023)
-- Name: idx0246_000087; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000087 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000019" USING btree ("Source_RefRPK");


--
-- TOC entry 4578 (class 1259 OID 1936024)
-- Name: idx0246_000088; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000088 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000020" USING btree ("Source_RefRPK");


--
-- TOC entry 4581 (class 1259 OID 1936025)
-- Name: idx0246_000089; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000089 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000021" USING btree ("Source_RefRPK");


--
-- TOC entry 4584 (class 1259 OID 1936026)
-- Name: idx0246_000090; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000090 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000022" USING btree ("Source_RefRPK");


--
-- TOC entry 4587 (class 1259 OID 1936027)
-- Name: idx0246_000091; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000091 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000023" USING btree ("Source_RefRPK");


--
-- TOC entry 4590 (class 1259 OID 1936028)
-- Name: idx0246_000092; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000092 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000024" USING btree ("Source_RefRPK");


--
-- TOC entry 4593 (class 1259 OID 1936029)
-- Name: idx0246_000093; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000093 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000025" USING btree ("Source_RefRPK");


--
-- TOC entry 4596 (class 1259 OID 1936030)
-- Name: idx0246_000094; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000094 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000026" USING btree ("Source_RefRPK");


--
-- TOC entry 4599 (class 1259 OID 1936031)
-- Name: idx0246_000095; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000095 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000027" USING btree ("Source_RefRPK");


--
-- TOC entry 4602 (class 1259 OID 1936032)
-- Name: idx0246_000096; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000096 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000028" USING btree ("Source_RefRPK");


--
-- TOC entry 4605 (class 1259 OID 1936033)
-- Name: idx0246_000097; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000097 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000029" USING btree ("Source_RefRPK");


--
-- TOC entry 4608 (class 1259 OID 1936034)
-- Name: idx0246_000098; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000098 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000030" USING btree ("Source_RefRPK");


--
-- TOC entry 4611 (class 1259 OID 1936035)
-- Name: idx0246_000099; Type: INDEX; Schema: SchLog; Owner: SysEngine
--

CREATE INDEX idx0246_000099 ON "SchLog"."TblLog_TransactionHistory_RMV_8000000000031" USING btree ("Source_RefRPK");


--
-- TOC entry 4507 (class 1259 OID 1936036)
-- Name: idx0261_000001; Type: INDEX; Schema: SchLog; Owner: SysAdmin
--

CREATE INDEX idx0261_000001 ON "SchLog"."TblLog_FunctionSnapshotSignature" USING btree ("SchemaName");


--
-- TOC entry 4508 (class 1259 OID 1936037)
-- Name: idx0261_000002; Type: INDEX; Schema: SchLog; Owner: SysAdmin
--

CREATE INDEX idx0261_000002 ON "SchLog"."TblLog_FunctionSnapshotSignature" USING btree ("FunctionName");


-- Completed on 2026-03-14 14:10:31 WIB

--
-- PostgreSQL database dump complete
--

\unrestrict CGg6v7a2dAlk3GtlgSFUBufRQJxocjq2Sg1GqnglhQHZuebPnuTJUmpVV7oWisP

