#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.Docker.BuildPermanentStorage.Grafana.sh
# ▪ Versi              : 1.00.0002
# ▪ Tanggal            : 2021-08-09
# ▪ Input              : -
# ▪ Output             : -
# ▪ Deskripsi          : Script ini digunakan untuk memetakan permanent storage Grafana didalam Docker
# ▪ Execution Syntax   : ./BashScript/Script.Docker.BuildPermanentStorage.Grafana.sh
#                        <FullPathFromRoot>/BashScript/Script.Docker.BuildPermanentStorage.Grafana.sh
# ▪ Copyright          : Zheta © 2020, 2021
#----------------------------------------------------------------------------------------------------

#!/bin/bash

clear;

varDirectory="./../ERPReborn-PermanentStorage/BindMount/Grafana";

if [ ! -d $varDirectory ]; then
   sudo mkdir -p $varDirectory;
   sudo mkdir -p $varDirectory/var/lib/grafana/plugins;
   sudo mkdir -p $varDirectory/var/log/grafana;
fi

sudo chmod 775 $varDirectory;
sudo chown -R 472:472 $varDirectory;
