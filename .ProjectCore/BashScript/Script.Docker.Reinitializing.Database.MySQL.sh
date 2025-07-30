#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.Docker.Reinitializing.Database.MySQL.sh
# ▪ Versi              : 1.00.0000
# ▪ Tanggal            : 2020-06-16
# ▪ Input              : -
# ▪ Output             : -
# ▪ Deskripsi          : Script ini digunakan untuk menginisialisasi ulang (Cloning) Database dari 
#                        Production Server kedalam volume database (volume-mysql) pada Container
#                        PostgreSQL
# ▪ Execution Syntax   : ./BashScript/Script.Docker.Reinitializing.Database.MySQL.sh
#                        <FullPathFromRoot>/BashScript/Script.Docker.Reinitializing.Database.MySQL.sh
# ▪ Copyright          : Zheta © 2020
#----------------------------------------------------------------------------------------------------

#!/bin/bash

clear;

varRoleName='SysEngine';
varRolePassword='748159263';
varDBName='erpdb';
varFileName='/var/lib/mysql/temp/dump.sql';
varDBMasterHost='192.168.0.27';
varDBMasterPort='3306';

sudo docker exec -it postgresql /bin/bash -c "mysqldump --verbose -h "$varDBMasterHost" -P "$varDBName" -u \""$varRoleName"\" --password=\"$(echo $varRolePassword)\" --database \""$varDBName"\" > "$varFileName";";
##sudo docker exec -it postgresql /bin/bash -c "mysql --verbose -u root -e \"DROP DATABASE IF EXISTS "$varDBName"; CREATE DATABASE "$varDBName";\"";
##sudo docker exec -it postgresql /bin/bash -c "mysql --verbose -u root -e \"DROP USER IF EXISTS "$varRoleName"; CREATE USER "$varRoleName" IDENTIFIED BY '"$varRolePassword"';\"";

#sudo docker exec -it postgresql /bin/bash -c "mysql --verbose -u root -e \"DROP USER IF EXISTS "$varRoleName"; CREATE USER '"$varRoleName"'@'%' IDENTIFIED BY '"$varRolePassword"'; GRANT ALL PRIVILEGES ON *.* TO '"$varRoleName"'@'%' WITH GRANT OPTION; \"";
#sudo docker exec -it postgresql /bin/bash -c "mysql --verbose -u "$varRoleName" --password=\"$(echo $varRolePassword)\" -e \"DROP DATABASE IF EXISTS "$varDBName"; CREATE DATABASE "$varDBName";\"";
#sudo docker exec -it postgresql /bin/bash -c "sed -i "$varFileName" -e 's/utf8mb4_0900_ai_ci/utf8mb4_unicode_ci/g';";
##sudo docker exec -it postgresql /bin/bash -c "mysql --verbose -u root -e \"GRANT ALL PRIVILEGES ON *.* TO '"$varRoleName"';\"";

echo "Restore Database";
#sudo docker exec -it postgresql /bin/bash -c "mysql -u "$varRoleName" --password=\"$(echo varRolePassword)\" --database \""$varDBName"\" < "$varFileName";";
#sudo docker exec -it postgresql /bin/bash -c "rm -rf "$varFileName;
echo "";
echo "DONE";
