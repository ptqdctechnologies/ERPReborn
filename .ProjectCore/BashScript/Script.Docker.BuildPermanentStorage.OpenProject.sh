#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.Docker.BuildPermanentStorage.OpenProject.sh
# ▪ Versi              : 1.00.0000
# ▪ Tanggal            : 2021-11-11
# ▪ Input              : -
# ▪ Output             : -
# ▪ Deskripsi          : Script ini digunakan untuk memetakan permanent storage OpenProject didalam 
#                        Docker
# ▪ Execution Syntax   : ./BashScript/Script.Docker.BuildPermanentStorage.OpenProject.sh
#                        <FullPathFromRoot>/BashScript/Script.Docker.BuildPermanentStorage.OpenProject.sh
# ▪ Copyright          : Zheta © 2021
#----------------------------------------------------------------------------------------------------

#!/bin/bash

clear;

varDirectory="./../ERPReborn-PermanentStorage/BindMount/OpenProject";

if [ ! -d $varDirectory ]; then
   sudo mkdir -p $varDirectory;
   sudo mkdir -p $varDirectory/var/lib/openproject/pgdata;
   sudo mkdir -p $varDirectory/var/lib/openproject/assets;
fi

sudo chmod 775 $varDirectory;
#sudo chown -R 472:472 $varDirectory;
