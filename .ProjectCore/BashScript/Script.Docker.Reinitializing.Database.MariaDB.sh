#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.Docker.Reinitializing.Database.MariaDB.sh
# ▪ Versi              : 1.00.0000
# ▪ Tanggal            : 
# 	2024-01-11
# 	2020-06-16
# ▪ Input              : -
# ▪ Output             : -
# ▪ Deskripsi          : Script ini digunakan untuk menginisialisasi ulang (Cloning) Database dari 
#                        Production Server kedalam volume database (volume-mysql) pada Container
#                        PostgreSQL
# ▪ Execution Syntax   : ./BashScript/Script.Docker.Reinitializing.Database.MariaDB.sh
#                        <FullPathFromRoot>/BashScript/Script.Docker.Reinitializing.Database.MariaDB.sh
# ▪ Copyright          : Zheta © 2020 - 2024
#----------------------------------------------------------------------------------------------------

#!/bin/bash

clear;

varRoleName='SysEngine';
varRolePassword='748159263';
varDBName='erpdb';
varFileName='/var/lib/mysql/temp/dump.sql';
varDBMasterHost='192.168.0.27';
varDBMasterPort='3306';

sudo docker exec -it postgresql /bin/bash -c "mariadb-dump --verbose -c -h "$varDBMasterHost" -P "$varDBName" -u \""$varRoleName"\" --password=\"$(echo $varRolePassword)\" --database \""$varDBName"\" > "$varFileName";";

sudo docker exec -it postgresql /bin/bash -c "mariadb --verbose -u root -e \"FLUSH PRIVILEGES;\"";
sudo docker exec -it postgresql /bin/bash -c "mariadb --verbose -u root -e \"DROP USER IF EXISTS '"$varRoleName"'@'localhost'; CREATE USER '"$varRoleName"'@'localhost' IDENTIFIED BY '"$varRolePassword"'; GRANT ALL PRIVILEGES ON *.* TO '"$varRoleName"'@'localhost' IDENTIFIED BY '"$varRolePassword"' WITH GRANT OPTION; \"";
sudo docker exec -it postgresql /bin/bash -c "mariadb --verbose -u root -e \"DROP USER IF EXISTS '"$varRoleName"'@'%'; CREATE USER '"$varRoleName"'@'%' IDENTIFIED BY '"$varRolePassword"'; GRANT ALL PRIVILEGES ON *.* TO '"$varRoleName"'@'%' IDENTIFIED BY '"$varRolePassword"' WITH GRANT OPTION; \"";
sudo docker exec -it postgresql /bin/bash -c "mariadb --verbose -u root -e \"FLUSH PRIVILEGES;\"";
sudo docker exec -it postgresql /bin/bash -c "mariadb --verbose -u "$varRoleName" --password=\"$(echo $varRolePassword)\" -e \"DROP DATABASE IF EXISTS "$varDBName"; CREATE DATABASE "$varDBName";\"";
sudo docker exec -it postgresql /bin/bash -c "sed -i "$varFileName" -e 's/utf8mb4_0900_ai_ci/utf8mb4_unicode_ci/g';";

echo "DATABASE RESTORE";
sudo docker exec -it postgresql /bin/bash -c "mariadb -u "$varRoleName" --password=\"$(echo $varRolePassword)\" --database \""$varDBName"\" < "$varFileName";";
sudo docker exec -it postgresql /bin/bash -c "rm -rf "$varFileName;
echo "";
echo "DONE";
