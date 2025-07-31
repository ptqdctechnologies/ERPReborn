#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.Docker.BuildImage.Grafana.sh
# ▪ Versi              : 1.00.0000
# ▪ Tanggal            : 2025-07-30
# ▪ Input              : -
# ▪ Output             : -
# ▪ Deskripsi          : Script ini digunakan untuk menarik Image Percona didalam Docker
# ▪ Execution Syntax   : ./BashScript/Script.Docker.BuildImage.Percona.sh
#                        <FullPathFromRoot>/BashScript/Script.Docker.BuildImage.Percona.sh
# ▪ Copyright          : Zheta © 2025
#----------------------------------------------------------------------------------------------------

#!/bin/bash

clear;

sudo docker pull percona/pmm-server:latest;
sudo docker build --file ./.ProjectCore/Configuration/Docker/Percona/Dockerfile -t erp-reborn-monitoring-percona .;

