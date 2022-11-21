#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.Docker.BuildPermanentStorage.PostgreSQL.sh
# ▪ Versi              : 1.00.0004
# ▪ Tanggal            : 2022-11-21
# ▪ Input              : -
# ▪ Output             : -
# ▪ Deskripsi          : Script ini digunakan untuk memetakan permanent storage PostgreSQL didalam 
#                        Docker
# ▪ Execution Syntax   : ./BashScript/Script.Docker.BuildPermanentStorage.PostgreSQL.sh
#                        <FullPathFromRoot>/BashScript/Script.Docker.BuildPermanentStorage.PostgreSQL.sh
# ▪ Copyright          : Zheta © 2020-2022
#----------------------------------------------------------------------------------------------------

#!/bin/bash

clear;

#------[ Main ]------
varDirectory="./../ERPReborn-PermanentStorage/BindMount/PostgreSQL";
if [ ! -d $varDirectory ]; then
   sudo mkdir -p $varDirectory/root;
   sudo touch $varDirectory/root/.bash_history;
fi

#------[ PostgreSQL ]------
varDirectory="./../ERPReborn-PermanentStorage/BindMount/PostgreSQL/var/lib/postgresql/data";

if [ ! -d $varDirectory ]; then
   sudo mkdir -p $varDirectory;
fi

sudo chmod 700 $varDirectory;
sudo chown 999 $varDirectory;

#------[ MySQL ]------

varDirectory="./../ERPReborn-PermanentStorage/BindMount/PostgreSQL/var/lib/mysql";

if [ ! -d $varDirectory ]; then
   sudo cp .ProjectCore/Configuration/Docker/PostgreSQL/ERPReborn-PermanentStorage_PostgreSQL_MariaDB.tgz ./../ERPReborn-PermanentStorage/BindMount/PostgreSQL/var/lib/ERPReborn-PermanentStorage_PostgreSQL_MariaDB.tgz;
   cd ./../ERPReborn-PermanentStorage/BindMount/PostgreSQL/var/lib;
   sudo tar xzvf ERPReborn-PermanentStorage_PostgreSQL_MariaDB.tgz;
   sudo rm -rf ./ERPReborn-PermanentStorage_PostgreSQL_MariaDB.tgz;
   cd -;
fi

sudo chmod 755 $varDirectory;
sudo chown 101:102 $varDirectory;
