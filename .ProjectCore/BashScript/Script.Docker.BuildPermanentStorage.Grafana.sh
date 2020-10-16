#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.Docker.BuildPermanentStorage.Grafana.sh
# ▪ Versi              : 1.00.0000
# ▪ Tanggal            : 2020-09-25
# ▪ Input              : -
# ▪ Output             : -
# ▪ Deskripsi          : Script ini digunakan untuk memetakan permanent storage Grafana didalam Docker
# ▪ Execution Syntax   : ./BashScript/Script.Docker.BuildPermanentStorage.Grafana.sh
#                        <FullPathFromRoot>/BashScript/Script.Docker.BuildPermanentStorage.Grafana.sh
# ▪ Copyright          : Zheta © 2020
#----------------------------------------------------------------------------------------------------

#!/bin/bash

clear;

mkdir -p ./../ERPReborn-PermanentStorage/Grafana;
sudo chmod 775 ./../ERPReborn-PermanentStorage/Grafana;
sudo chown -R 472:472 ./../ERPReborn-PermanentStorage/Grafana;
