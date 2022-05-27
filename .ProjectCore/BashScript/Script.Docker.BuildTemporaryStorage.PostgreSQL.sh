#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.Docker.BuildTemporaryStorage.PostgreSQL.sh
# ▪ Versi              : 1.00.0001
# ▪ Tanggal            : 2022-05-27
# ▪ Input              : -
# ▪ Output             : -
# ▪ Deskripsi          : Script ini digunakan untuk memetakan Temporary storage PostgreSQL didalam 
#                        Docker
# ▪ Execution Syntax   : ./BashScript/Script.Docker.BuildTemporaryStorage.PostgreSQL.sh
#                        <FullPathFromRoot>/BashScript/Script.Docker.BuildTemporaryStorage.PostgreSQL.sh
# ▪ Copyright          : Zheta © 2022
#----------------------------------------------------------------------------------------------------

#!/bin/bash

clear;

#------[ PostgreSQL ]------

varDirectory="./../ERPReborn-TemporaryStorage/BindMount/PostgreSQL/Temp";

if [ ! -d $varDirectory ]; then
   sudo mkdir -p $varDirectory;
fi

sudo chmod 700 $varDirectory;
sudo chown 999 $varDirectory;
