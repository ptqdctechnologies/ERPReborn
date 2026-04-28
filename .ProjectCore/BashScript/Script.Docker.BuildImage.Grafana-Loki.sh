#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.Docker.BuildImage.Grafana-Loki.sh
# ▪ Versi              : 1.00.0000
# ▪ Tanggal            : 2026-04-28
# ▪ Input              : -
# ▪ Output             : -
# ▪ Deskripsi          : Script ini digunakan untuk menarik Image Grafana Loki didalam Docker
# ▪ Execution Syntax   : ./BashScript/Script.Docker.BuildImage.Grafana-Loki.sh
#                        <FullPathFromRoot>/BashScript/Script.Docker.BuildImage.Grafana-Loki.sh
# ▪ Copyright          : Zheta © 2026
#----------------------------------------------------------------------------------------------------

#!/bin/bash

clear;

sudo docker pull grafana/loki;
sudo docker build --file ./.ProjectCore/Configuration/Docker/Grafana-Loki/Dockerfile -t erp-reborn-monitoring-grafana-loki .;

#sudo cp ./.ProjectCore/Configuration/Docker/Grafana/System/etc/grafana/grafana.ini /etc/grafana/grafana.ini;
