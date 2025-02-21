#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.Docker.BuildPermanentStorage.NodeJS.sh
# ▪ Versi              : 1.00.0000
# ▪ Tanggal            : 2025-02-13
# ▪ Input              : -
# ▪ Output             : -
# ▪ Deskripsi          : Script ini digunakan untuk memetakan permanent storage NodeJS didalam Docker
# ▪ Execution Syntax   : ./BashScript/Script.Docker.BuildPermanentStorage.NodeJS.sh
#                        <FullPathFromRoot>/BashScript/Script.Docker.BuildPermanentStorage.NodeJS.sh
# ▪ Copyright          : Zheta © 2025
#----------------------------------------------------------------------------------------------------

#!/bin/bash

clear;

varDirectory="./../ERPReborn-PermanentStorage/BindMount/NodeJS";

if [ ! -d $varDirectory ]; then
   sudo mkdir -p $varDirectory;
   #sudo mkdir -p $varDirectory/var/lib/grafana/plugins;
   #sudo mkdir -p $varDirectory/var/log/grafana;
fi

sudo chmod 775 $varDirectory;
sudo chown -R 472:472 $varDirectory;
