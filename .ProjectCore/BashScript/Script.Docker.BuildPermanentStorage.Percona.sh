#----------------------------------------------------------------------------------------------------
#
# ▪ Nama               : Script.Docker.BuildPermanentStorage.Percona.sh
# ▪ Versi              : 1.00.0000
# ▪ Tanggal            : 2025-07-30
# ▪ Input              : -
# ▪ Output             : -
# ▪ Deskripsi          : Script ini digunakan untuk memetakan permanent storage Percona didalam Docker
# ▪ Execution Syntax   : ./BashScript/Script.Docker.BuildPermanentStorage.Percona.sh
#                        <FullPathFromRoot>/BashScript/Script.Docker.BuildPermanentStorage.Percona.sh
# ▪ Copyright          : Zheta © 2025
#
#----------------------------------------------------------------------------------------------------

#!/bin/bash

clear;

varDirectory="./../ERPReborn-PermanentStorage/BindMount/Percona";

if [ ! -d $varDirectory ]; then
   sudo mkdir -p $varDirectory;
   sudo mkdir -p $varDirectory/srv;
fi

#sudo chmod 775 $varDirectory;
sudo chmod 775 $varDirectory;
sudo chown -R 1000:1000 $varDirectory;
