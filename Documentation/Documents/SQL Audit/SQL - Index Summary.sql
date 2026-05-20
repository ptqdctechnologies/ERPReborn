SELECT
	"SubSQL"."SchemaTableName",
	"SubSQL"."IndexCount",
	"SubSQL"."IndexSize",
	"SubSQL"."TotalIndexScans",
	"SubSQL"."UnusedIndex",
	ROW_NUMBER () OVER (
		ORDER BY
			"SubSQL"."UnusedIndex" DESC,
			"SubSQL"."IndexSize" DESC
		) AS "OrderSequence"
FROM
	(
	SELECT
		(schemaname || '.' || relname)::varchar AS "SchemaTableName",
		COUNT (*) AS "IndexCount",
		(pg_size_pretty (SUM (pg_relation_size(indexrelid))))::varchar AS "IndexSize",
		SUM (idx_scan) AS "TotalIndexScans",
		COUNT (*) FILTER (WHERE idx_scan = 0) AS "UnusedIndex"
	FROM
		pg_stat_user_indexes
	GROUP BY 
		schemaname,
		relname
	ORDER BY
		SUM (pg_relation_size(indexrelid)) DESC
	) AS "SubSQL"
