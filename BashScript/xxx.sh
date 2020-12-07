#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.Docker.Reinitializing.Database.PostgreSQL.sh
# ▪ Versi              : 1.00.0000
# ▪ Tanggal            : 2020-06-11
# ▪ Input              : -
# ▪ Output             : -
# ▪ Deskripsi          : Script ini digunakan untuk menginisialisasi ulang (Cloning) Database dari 
#                        Production Server kedalam volume database (volume-postgresql) pada Container
#                        PostgreSQL
# ▪ Execution Syntax   : ./BashScript/Script.Docker.Reinitializing.Database.PostgreSQL.sh
#                        <FullPathFromRoot>/BashScript/Script.Docker.Reinitializing.Database.PostgreSQL.sh
# ▪ Copyright          : Zheta © 2020
#----------------------------------------------------------------------------------------------------

#!/bin/bash

clear;
#sudo docker exec -it postgresql /bin/bash -c "apt update; apt list --upgradable; apt install sudo; ";

varCmd='sudo docker exec -it postgresql /bin/bash -c';

varRoleName='SysEngine';
varRolePassword='748159263';

#+-------------------------------------------------------------------------------------------------+
#| Database : dbERPReborn                                                                          |
#+-------------------------------------------------------------------------------------------------+
varDBName='dbERPReborn';
varFileName='/var/lib/postgresql/temp/dump.sql';
varDBMasterHost='192.168.1.24';
varDBMasterPort='5432';

echo "---> Reinitializing Database : "$varDBName;
varCmdContainer='psql -U postgres -d postgres -c';
$varCmd "$varCmdContainer \"DROP DATABASE IF EXISTS \\\""$varDBName"\\\";\"";
$varCmd "$varCmdContainer \"CREATE DATABASE \\\""$varDBName"\\\" OWNER \\\""$varRoleName"\\\";\"";

echo "   ---> Create Extension : MySQL_FDW";
$varCmd "psql -U \""$varRoleName"\" -d \""$varDBName"\" -c \"CREATE EXTENSION mysql_fdw;\"";

echo "   ---> Database Cloning : "$varDBName;
$varCmd "PGPASSWORD=\""$varRolePassword"\" pg_dump -h "$varDBMasterHost" -p "$varDBMasterPort" -U \""$varRoleName"\" --format plain --encoding UTF8 \""$varDBName"\" > "$varFileName;
$varCmd "psql -U \""$varRoleName"\" -d \""$varDBName"\" < "$varFileName";";
$varCmd "rm -rf "$varFileName;

echo "---> Initializing Database Link";
varCmdContainer='psql -U postgres -d "'$varDBName'" -c';
$varCmd "$varCmdContainer \"CREATE EXTENSION mysql_fdw SCHEMA public;\"";
$varCmd "$varCmdContainer \"DROP SERVER \\\"dbExtern-MySQL-ERP-QDC\\\" CASCADE;\"";
$varCmd "$varCmdContainer \"CREATE SERVER \\\"dbExtern-MySQL-ERP-QDC\\\" FOREIGN DATA WRAPPER mysql_fdw OPTIONS (host '127.0.0.1', port '3306');\"";
$varCmd "$varCmdContainer \"DROP USER MAPPING FOR \\\"SysEngine\\\" SERVER \\\"dbExtern-MySQL-ERP-QDC\\\";\"";
$varCmd "$varCmdContainer \"CREATE USER MAPPING FOR \\\"SysEngine\\\" SERVER \\\"dbExtern-MySQL-ERP-QDC\\\" OPTIONS (password '748159263', username 'SysEngine');\"";
varCmdContainer='psql -U "'$varRoleName'" -d "'$varDBName'" -c';
$varCmd "$varCmdContainer \"SELECT * FROM \\\"SchSysConfig\\\".\\\"FuncSys_KickStart1_ForeignSchema1\\\"('172.28.0.2', '5432');\"";
