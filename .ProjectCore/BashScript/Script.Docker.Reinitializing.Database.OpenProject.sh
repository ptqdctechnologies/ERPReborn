#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.Docker.Reinitializing.Database.OpenProject.sh
# ▪ Versi              : 1.00.0000
# ▪ Tanggal            : 2022-05-25
# ▪ Input              : -
# ▪ Output             : -
# ▪ Deskripsi          : Script ini digunakan untuk menginisialisasi ulang (Cloning) Database dari 
#                        Production Server kedalam volume database (volume-postgresql) pada Container
#                        OpenProject
# ▪ Execution Syntax   : ./BashScript/Script.Docker.Reinitializing.Database.OpenProject.sh
#                        <FullPathFromRoot>/BashScript/Script.Docker.Reinitializing.Database.OpenProject.sh
# ▪ Copyright          : Zheta © 2022
#----------------------------------------------------------------------------------------------------

#!/bin/bash

clear;

varCmd='sudo docker exec -it openproject /bin/bash -c';

varRoleName='SysEngine';
varRolePassword='748159263';
varCmdContainer='psql -U postgres -d postgres -c';
echo "---> Initializing Role : "$varRoleName" With Password "$varRolePassword;
#$varCmd "su - postgres -c \"psql -U postgres -d postgres -c \\\"DROP ROLE IF EXISTS \\\\\\\""$varRoleName"\\\\\\\"; \\\"\";";
#$varCmd "su - postgres -c \"psql -U postgres -d postgres -c \\\"CREATE ROLE \\\\\\\""$varRoleName"\\\\\\\" LOGIN SUPERUSER CREATEROLE CREATEDB PASSWORD '"$varRolePassword"'; \\\"\";";



varCmd='sudo docker exec -it postgresql /bin/bash -c';
varRoleName='SysEngine';
varRolePassword='748159263';
#+-------------------------------------------------------------------------------------------------+
#| Database : dbERPReborn-Documentation-OpenProject                                                |
#+-------------------------------------------------------------------------------------------------+
varDBName='dbERPReborn-Documentation-OpenProject';
varFileName='/var/lib/postgresql/temp/dump-OpenProject.sql';
varDBMasterHost='192.168.1.24';
varDBMasterPort='5432';

echo "   ---> Database Cloning : "$varDBName;
$varCmd "PGPASSWORD=\""$varRolePassword"\" pg_dump -h "$varDBMasterHost" -p "$varDBMasterPort" -U \""$varRoleName"\" --format plain --encoding UTF8 \""$varDBName"\" > "$varFileName;
$varCmd "psql -U postgres -d postgres -c \"DROP DATABASE IF EXISTS \\\""$varDBName"\\\" \";";
$varCmd "psql -U postgres -d postgres -c \"CREATE DATABASE \\\""$varDBName"\\\" WITH OWNER=\\\""$varRoleName"\\\" ENCODING='UTF8' TABLESPACE=pg_default CONNECTION LIMIT=-1 \";";
$varCmd "psql -U \""$varRoleName"\" -d \""$varDBName"\" < "$varFileName";";
$varCmd "rm -rf "$varFileName;
echo "";


#+-------------------------------------------------------------------------------------------------+
#| Others Script                                                                                   |
#+-------------------------------------------------------------------------------------------------+
./BashScript/Script.Docker.Backup.OpenProject.All.sh












##varRoleName='openproject';
##varRolePassword='openproject';
#varRoleName='SysEngine';
#varRolePassword='748159263';

##varDBName='openproject';
#varDBName='dbERPReborn-Documentation-OpenProject';
#varFileName='/var/openproject/temp/dump.sql';
#varDBMasterHost='192.168.1.24';
#varDBMasterPort='5432';

#echo "   ---> Database Cloning : "$varDBName;
##$varCmd "/zhtConf/Script/BashScript/Script.Database.Dump.sh;";

##$varCmd "su - postgres -c \"PGPASSWORD=748159263 pg_dump -h 192.168.1.24 -p 5432 -U \\\"SysEngine\\\" -d \\\"dbERPReborn-Documentation-OpenProject\\\" \" > /tmp/dump.sql";

##sudo docker exec -e PGPASSWORD=748159263 -it openproject pg_dump -U "SysEngine" -h 192.168.1.24 -d "dbERPReborn-Documentation-OpenProject" -x -O > /tmp/dump.sql;


##./../ERPReborn-TemporaryStorage/BindMount/OpenProject/Temp/dump.sql;


##$varCmd "PGPASSWORD=748159263 pg_dump -h 192.168.1.24 -p 5432 -U \"SysEngine\" --format plain --encoding UTF8 \"dbERPReborn-Documentation-OpenProject\" > /var/openproject/temp/dump.sql";

##$varCmd "PGPASSWORD=\""$varRolePassword"\" pg_dump -h "$varDBMasterHost" -p "$varDBMasterPort" -U \""$varRoleName"\" --format plain --encoding UTF8 \""$varDBName"\" -x -O > "$varFileName;
##$varCmd "su - postgres -c \"PGPASSWORD=748159263 pg_dump -h 192.168.1.24 -p 5432 -U \\\"SysEngine\\\" --format plain --encoding UTF8 \\\"dbERPReborn-Documentation-OpenProject\\\" > /var/openproject/temp/dump.sql\"      ";



##sudo docker exec -e PGPASSWORD=openproject -it openproject pg_dump -U openproject -h localhost -d openproject -x -O > ./../ERPReborn-TemporaryStorage/BindMount/OpenProject/Temp/dump.sql;
##sudo docker exec -e PGPASSWORD=openproject -it openproject pg_dump -U openproject -h varDBMasterHost -p varDBMasterPort -d openproject -x -O > /tmp/dump.sql;
##sudo docker exec -e PGPASSWORD=748159263 -it openproject pg_dump -U "SysEngine" -h 192.168.1.24 -p 5432 -d "dbERPReborn-Documentation-OpenProject" -x -O > /tmp/dump.sql;
##sudo docker exec PGPASSWORD=748159263 -it openproject pg_dump -U "SysEngine" -h 192.168.1.24 -p 5432 -d "dbERPReborn-Documentation-OpenProject" -x -O > /tmp/dump.sql;

#varRoleName='SysEngine';
#varRolePassword='748159263';

#$varCmd "psql -h 172.28.0.2 -p 5432 -U \"SysEngine\" -d \"dbERPReborn-Documentation-OpenProject\" < "$varFileName";";
##$varCmd "psql -h 192.168.1.24 -p 5432 -U \"SysEngine\" -d \"dbERPReborn-Documentation-OpenProject\" < "$varFileName";";
