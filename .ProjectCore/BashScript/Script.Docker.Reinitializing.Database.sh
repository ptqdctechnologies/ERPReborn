#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.Docker.Reinitializing.Database.sh
# ▪ Versi              : 1.00.0000
# ▪ Tanggal            : 2020-06-11
# ▪ Input              : -
# ▪ Output             : -
# ▪ Deskripsi          : Script ini digunakan untuk menginisialisasi ulang (Cloning) Database dari 
#                        Production Server kedalam volume database (volume-postgresql)
# ▪ Execution Syntax   : ./BashScript/Script.Docker.Reinitializing.Database.sh
#                        <FullPathFromRoot>/BashScript/Script.Docker.Reinitializing.Database.sh
# ▪ Copyright          : Zheta © 2020
#----------------------------------------------------------------------------------------------------

#!/bin/bash

clear;
#sudo docker exec -it postgresql /bin/bash -c "apt update; apt list --upgradable; apt install sudo; ";


varRoleName='SysEngine';
varRolePassword='748159263';
echo "---> Initializing Role : "$varRoleName" With Password "$varRolePassword;
sudo docker exec -it postgresql /bin/bash -c "psql -U postgres -d postgres -c \"REASSIGN OWNED BY \\\""$varRoleName"\\\" TO postgres; DROP OWNED BY \\\""$varRoleName"\\\";\"";
sudo docker exec -it postgresql /bin/bash -c "psql -U postgres -d postgres -c \"DROP ROLE IF EXISTS \\\""$varRoleName"\\\";\"";
sudo docker exec -it postgresql /bin/bash -c "psql -U postgres -d postgres -c \"CREATE ROLE \\\""$varRoleName"\\\" LOGIN SUPERUSER CREATEROLE CREATEDB PASSWORD '"$varRolePassword"';\"";
echo "";


varDBName='dbERPReborn-SysConfig';
varFileName='/var/lib/postgresql/temp/dump.sql';
varDBMasterHost='192.168.1.24';
varDBMasterPort='5432';
echo "---> Reinitializing Database : "$varDBName;
sudo docker exec -it postgresql /bin/bash -c "psql -U postgres -d postgres -c \"DROP DATABASE IF EXISTS \\\""$varDBName"\\\";\"";
sudo docker exec -it postgresql /bin/bash -c "psql -U postgres -d postgres -c \"CREATE DATABASE \\\""$varDBName"\\\" OWNER \\\""$varRoleName"\\\";\"";
echo "   ---> Database Cloning : "$varDBName;
sudo docker exec -it postgresql /bin/bash -c "PGPASSWORD=\""$varRolePassword"\" pg_dump -h "$varDBMasterHost" -p "$varDBMasterPort" -U \""$varRoleName"\" --format plain --encoding UTF8 \""$varDBName"\" > "$varFileName;
sudo docker exec -it postgresql /bin/bash -c "psql -U \""$varRoleName"\" -d \""$varDBName"\" < "$varFileName";";
sudo docker exec -it postgresql /bin/bash -c "rm -rf "$varFileName;
echo "";


varDBName='dbERPReborn-Data-OLTP';
varFileName='/var/lib/postgresql/temp/dump.sql';
varDBMasterHost='192.168.1.24';
varDBMasterPort='5432';
echo "---> Reinitializing Database : "$varDBName;
sudo docker exec -it postgresql /bin/bash -c "psql -U postgres -d postgres -c \"DROP DATABASE IF EXISTS \\\""$varDBName"\\\";\"";
sudo docker exec -it postgresql /bin/bash -c "psql -U postgres -d postgres -c \"CREATE DATABASE \\\""$varDBName"\\\" OWNER \\\""$varRoleName"\\\";\"";
echo "   ---> Database Cloning : "$varDBName;
sudo docker exec -it postgresql /bin/bash -c "PGPASSWORD=\""$varRolePassword"\" pg_dump -h "$varDBMasterHost" -p "$varDBMasterPort" -U \""$varRoleName"\" --format plain --encoding UTF8 \""$varDBName"\" > "$varFileName;
sudo docker exec -it postgresql /bin/bash -c "psql -U \""$varRoleName"\" -d \""$varDBName"\" < "$varFileName";";
sudo docker exec -it postgresql /bin/bash -c "rm -rf "$varFileName;
echo "";


varDBName='dbERPReborn-Data-OLAP';
varFileName='/var/lib/postgresql/temp/dump.sql';
varDBMasterHost='192.168.1.24';
varDBMasterPort='5432';
echo "---> Reinitializing Database : "$varDBName;
sudo docker exec -it postgresql /bin/bash -c "psql -U postgres -d postgres -c \"DROP DATABASE IF EXISTS \\\""$varDBName"\\\";\"";
sudo docker exec -it postgresql /bin/bash -c "psql -U postgres -d postgres -c \"CREATE DATABASE \\\""$varDBName"\\\" OWNER \\\""$varRoleName"\\\";\"";
echo "   ---> Database Cloning : "$varDBName;
sudo docker exec -it postgresql /bin/bash -c "PGPASSWORD=\""$varRolePassword"\" pg_dump -h "$varDBMasterHost" -p "$varDBMasterPort" -U \""$varRoleName"\" --format plain --encoding UTF8 \""$varDBName"\" > "$varFileName;
sudo docker exec -it postgresql /bin/bash -c "psql -U \""$varRoleName"\" -d \""$varDBName"\" < "$varFileName";";
sudo docker exec -it postgresql /bin/bash -c "rm -rf "$varFileName;
echo "";


varDBName='dbERPReborn-Data-BinaryObject';
varFileName='/var/lib/postgresql/temp/dump.sql';
varDBMasterHost='192.168.1.24';
varDBMasterPort='5432';
echo "---> Reinitializing Database : "$varDBName;
sudo docker exec -it postgresql /bin/bash -c "psql -U postgres -d postgres -c \"DROP DATABASE IF EXISTS \\\""$varDBName"\\\";\"";
sudo docker exec -it postgresql /bin/bash -c "psql -U postgres -d postgres -c \"CREATE DATABASE \\\""$varDBName"\\\" OWNER \\\""$varRoleName"\\\";\"";
echo "   ---> Database Cloning : "$varDBName;
sudo docker exec -it postgresql /bin/bash -c "PGPASSWORD=\""$varRolePassword"\" pg_dump -h "$varDBMasterHost" -p "$varDBMasterPort" -U \""$varRoleName"\" --format plain --encoding UTF8 \""$varDBName"\" > "$varFileName;
sudo docker exec -it postgresql /bin/bash -c "psql -U \""$varRoleName"\" -d \""$varDBName"\" < "$varFileName";";
sudo docker exec -it postgresql /bin/bash -c "rm -rf "$varFileName;
echo "";


varDBName='dbERPReborn';
varFileName='/var/lib/postgresql/temp/dump.sql';
varDBMasterHost='192.168.1.24';
varDBMasterPort='5432';
echo "---> Reinitializing Database : "$varDBName;
sudo docker exec -it postgresql /bin/bash -c "psql -U postgres -d postgres -c \"DROP DATABASE IF EXISTS \\\""$varDBName"\\\";\"";
sudo docker exec -it postgresql /bin/bash -c "psql -U postgres -d postgres -c \"CREATE DATABASE \\\""$varDBName"\\\" OWNER \\\""$varRoleName"\\\";\"";
echo "   ---> Create Extension : MySQL_FDW";
sudo docker exec -it postgresql /bin/bash -c "psql -U \""$varRoleName"\" -d \""$varDBName"\" -c \"CREATE EXTENSION mysql_fdw;\"";
echo "   ---> Database Cloning : "$varDBName;
sudo docker exec -it postgresql /bin/bash -c "PGPASSWORD=\""$varRolePassword"\" pg_dump -h "$varDBMasterHost" -p "$varDBMasterPort" -U \""$varRoleName"\" --format plain --encoding UTF8 \""$varDBName"\" > "$varFileName;
sudo docker exec -it postgresql /bin/bash -c "psql -U \""$varRoleName"\" -d \""$varDBName"\" < "$varFileName";";
sudo docker exec -it postgresql /bin/bash -c "rm -rf "$varFileName;
echo "";


