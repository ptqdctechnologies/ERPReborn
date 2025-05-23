#----------------------------------------------------------------------------------------------------
# ▪ Nama                 : Script.Docker.Backup.PostgreSQL.StructureOnly.sh
# ▪ Versi                : 1.00.0001
# ▪ Tanggal Pemutakhiran : 2023-12-15
# ▪ Tanggal Pembuatan    : 2021-09-01
# ▪ Input                : -
# ▪ Output               : -
# ▪ Deskripsi            : Script ini digunakan untuk men-dump Struktur Database dari Local Database
#                          pada Container PostgreSQL
# ▪ Execution Syntax     : ./BashScript/Script.Docker.Backup.PostgreSQL.StructureOnly.sh
#                          <FullPathFromRoot>/BashScript/Script.Docker.Backup.PostgreSQL.StructureOnly.sh
# ▪ Copyright            : Zheta © 2021 - 2023
#----------------------------------------------------------------------------------------------------

#!/bin/bash

clear;

varCmd='sudo docker exec -it postgresql /bin/bash -c';

varRoleName='SysEngine';
varRolePassword='748159263';
varCmdContainer='psql -U postgres -d postgres -c';

#+-------------------------------------------------------------------------------------------------+
#| Database : dbERPReborn-SysConfig                                                                |
#+-------------------------------------------------------------------------------------------------+
varDBName='dbERPReborn-SysConfig';
varCmdContainer='pg_dump --username "SysEngine" --schema-only --format plain --encoding UTF8 --verbose --file "/zhtConf/databaseStructure/'$varDBName'.sql" "'$varDBName'";';
$varCmd "$varCmdContainer";


#+-------------------------------------------------------------------------------------------------+
#| Database : dbERPReborn-Data-OLTP                                                                |
#+-------------------------------------------------------------------------------------------------+
varDBName='dbERPReborn-Data-OLTP';
varCmdContainer='pg_dump --username "SysEngine" --schema-only --format plain --encoding UTF8 --verbose --file "/zhtConf/databaseStructure/'$varDBName'.sql" "'$varDBName'";';
$varCmd "$varCmdContainer";


#+-------------------------------------------------------------------------------------------------+
#| Database : dbERPReborn-Data-OLAP                                                                |
#+-------------------------------------------------------------------------------------------------+
varDBName='dbERPReborn-Data-OLAP';
varCmdContainer='pg_dump --username "SysEngine" --schema-only --format plain --encoding UTF8 --verbose --file "/zhtConf/databaseStructure/'$varDBName'.sql" "'$varDBName'";';
$varCmd "$varCmdContainer";


#+-------------------------------------------------------------------------------------------------+
#| Database : dbERPReborn-Data-Warehouse                                                           |
#+-------------------------------------------------------------------------------------------------+
varDBName='dbERPReborn-Data-Warehouse';
varCmdContainer='pg_dump --username "SysEngine" --schema-only --format plain --encoding UTF8 --verbose --file "/zhtConf/databaseStructure/'$varDBName'.sql" "'$varDBName'";';
$varCmd "$varCmdContainer";


#+-------------------------------------------------------------------------------------------------+
#| Database : dbERPReborn-Data-BinaryObject                                                        |
#+-------------------------------------------------------------------------------------------------+
varDBName='dbERPReborn-Data-BinaryObject';
varCmdContainer='pg_dump --username "SysEngine" --schema-only --format plain --encoding UTF8 --verbose --file "/zhtConf/databaseStructure/'$varDBName'.sql" "'$varDBName'";';
$varCmd "$varCmdContainer";


#+-------------------------------------------------------------------------------------------------+
#| Database : dbERPReborn                                                                          |
#+-------------------------------------------------------------------------------------------------+
varDBName='dbERPReborn';
varCmdContainer='pg_dump --username "SysEngine" --schema-only --format plain --encoding UTF8 --verbose --file "/zhtConf/databaseStructure/'$varDBName'.sql" "'$varDBName'";';
$varCmd "$varCmdContainer";


#+-------------------------------------------------------------------------------------------------+
#| GIT Update                                                                                      |
#+-------------------------------------------------------------------------------------------------+
sudo chown -R zheta:zheta .git/objects/ ;

cd ./Database/Structure/PostgreSQL/;
rm -rf ./dbERPReborn.tgz;
tar czvf dbERPReborn.tgz ./dbERPReborn-Data-BinaryObject.sql ./dbERPReborn-Data-OLAP.sql ./dbERPReborn-Data-OLTP.sql ./dbERPReborn-Data-Warehouse.sql ./dbERPReborn-SysConfig.sql ./dbERPReborn.sql;
rm -rf ./*.sql;
cd -;

#git add ./Database/Structure/PostgreSQL/dbERPReborn-Data-BinaryObject.sql Database/Structure/PostgreSQL/dbERPReborn-Data-OLAP.sql Database/Structure/PostgreSQL/dbERPReborn-Data-OLTP.sql Database/Structure/PostgreSQL/dbERPReborn-SysConfig.sql Database/Structure/PostgreSQL/dbERPReborn.sql;
git add ./Database/Structure/PostgreSQL/dbERPReborn.tgz;
git status; 
git commit -m "Update Database";
