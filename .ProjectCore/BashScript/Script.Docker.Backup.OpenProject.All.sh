#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.Docker.Backup.OpenProject.All.sh
# ▪ Versi              : 1.00.0000
# ▪ Tanggal            : 2022-05-27
# ▪ Input              : -
# ▪ Output             : -
# ▪ Deskripsi          : Script ini digunakan untuk men-dump Struktur Database dari Local Database
#                        pada Container OpenProject
# ▪ Execution Syntax   : ./BashScript/Script.Docker.Backup.OpenProject.All.sh
#                        <FullPathFromRoot>/BashScript/Script.Docker.Backup.OpenProject.All.sh
# ▪ Copyright          : Zheta © 2022
#----------------------------------------------------------------------------------------------------

#!/bin/bash

clear;

varCmd='sudo docker exec -it postgresql /bin/bash -c';

varRoleName='SysEngine';
varRolePassword='748159263';
varCmdContainer='psql -U postgres -d postgres -c';

#+-------------------------------------------------------------------------------------------------+
#| Database : dbERPReborn-Documentation-OpenProject                                                |
#+-------------------------------------------------------------------------------------------------+
varDBName='dbERPReborn-Documentation-OpenProject';
varCmdContainer='pg_dump --username "SysEngine" --format plain --encoding UTF8 --verbose --file "/zhtConf/databaseStructure/'$varDBName'.sql" "'$varDBName'";';
$varCmd "$varCmdContainer";

#+-------------------------------------------------------------------------------------------------+
#| GIT Update                                                                                      |
#+-------------------------------------------------------------------------------------------------+
sudo chown -R zheta:zheta .git/objects/ ;

#cd ./Database/AllEntities/OpenProject/;
cd ./Database/Structure/PostgreSQL/;
rm -rf ./dbERPReborn-Documentation-OpenProject.tgz;
tar czvf dbERPReborn-Documentation-OpenProject.tgz ./dbERPReborn-Documentation-OpenProject.sql;
rm -rf ./*.sql;
cd -;
mv ./Database/Structure/PostgreSQL/dbERPReborn-Documentation-OpenProject.tgz ./Database/AllEntities/OpenProject/;

git add ./Database/AllEntities/OpenProject/dbERPReborn-Documentation-OpenProject.tgz;
git status; 
git commit -m "Update Database Open Project";
