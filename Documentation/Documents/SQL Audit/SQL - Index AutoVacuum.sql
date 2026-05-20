SELECT
	"SubSQL"."SchemaTableName",
	"SubSQL"."Parameters"
FROM
	(
	SELECT
		(n.nspname || '.' || c.relname) AS "SchemaTableName",
		c.reloptions AS "Parameters"
	FROM
		pg_class AS c
			JOIN
				pg_namespace AS n
					ON
						n.oid = c.relnamespace
	WHERE
		c.relkind = 'r'
		AND
		c.reloptions IS NOT NULL
	ORDER BY 1
	) AS "SubSQL"