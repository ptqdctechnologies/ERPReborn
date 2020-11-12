#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.Docker.BuildPermanentStorage.Grafana.sh
# ▪ Versi              : 1.00.0001
# ▪ Tanggal            : 2020-11-12
# ▪ Input              : -
# ▪ Output             : -
# ▪ Deskripsi          : Script ini digunakan untuk memetakan permanent storage Grafana didalam Docker
# ▪ Execution Syntax   : ./BashScript/Script.Docker.BuildPermanentStorage.Grafana.sh
#                        <FullPathFromRoot>/BashScript/Script.Docker.BuildPermanentStorage.Grafana.sh
# ▪ Copyright          : Zheta © 2020
#----------------------------------------------------------------------------------------------------

#!/bin/bash

clear;

varDirectory="./../ERPReborn-PermanentStorage/Grafana";

if [ ! -d $varDirectory ]; then
   sudo mkdir -p $varDirectory;
fi

sudo chmod 775 $varDirectory;
sudo chown -R 472:472 $varDirectory;
