#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.Docker.BuildTemporaryStorage.OpenProject.sh
# ▪ Versi              : 1.00.0000
# ▪ Tanggal            : 2022-05-25
# ▪ Input              : -
# ▪ Output             : -
# ▪ Deskripsi          : Script ini digunakan untuk memetakan Temporary storage Open Project didalam 
#                        Docker
# ▪ Execution Syntax   : ./BashScript/Script.Docker.BuildTemporaryStorage.OpenProject.sh
#                        <FullPathFromRoot>/BashScript/Script.Docker.BuildTemporaryStorage.OpenProject.sh
# ▪ Copyright          : Zheta © 2022
#----------------------------------------------------------------------------------------------------

#!/bin/bash

clear;

#------[ PostgreSQL ]------

varDirectory="./../ERPReborn-TemporaryStorage/BindMount/OpenProject/Temp";

if [ ! -d $varDirectory ]; then
   sudo mkdir -p $varDirectory;
fi

sudo chmod 700 $varDirectory;
sudo chown 999 $varDirectory;
