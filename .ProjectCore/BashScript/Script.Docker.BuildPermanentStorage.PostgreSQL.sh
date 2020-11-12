#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.Docker.BuildPermanentStorage.PostgreSQL.sh
# ▪ Versi              : 1.00.0001
# ▪ Tanggal            : 2020-11-12
# ▪ Input              : -
# ▪ Output             : -
# ▪ Deskripsi          : Script ini digunakan untuk memetakan permanent storage PostgreSQL didalam 
#                        Docker
# ▪ Execution Syntax   : ./BashScript/Script.Docker.BuildPermanentStorage.PostgreSQL.sh
#                        <FullPathFromRoot>/BashScript/Script.Docker.BuildPermanentStorage.PostgreSQL.sh
# ▪ Copyright          : Zheta © 2020
#----------------------------------------------------------------------------------------------------

#!/bin/bash

clear;

varDirectory="./../ERPReborn-PermanentStorage/PostgreSQL/var/lib/postgresql/data";

if [ ! -d $varDirectory ]; then
   sudo mkdir -p $varDirectory;
fi

sudo chmod 700 $varDirectory;
sudo chown 999 $varDirectory;
