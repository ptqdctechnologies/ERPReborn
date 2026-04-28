#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.Docker.BuildImage.Grafana-Loki-Driver.sh
# ▪ Versi              : 1.00.0000
# ▪ Tanggal            : 2026-04-28
# ▪ Input              : -
# ▪ Output             : -
# ▪ Deskripsi          : Script ini digunakan untuk menarik Image Grafana Loki Driver didalam Docker
# ▪ Execution Syntax   : ./BashScript/Script.Docker.BuildImage.Grafana-Loki-Driver.sh
#                        <FullPathFromRoot>/BashScript/Script.Docker.BuildImage.Grafana-Loki-Driver.sh
# ▪ Copyright          : Zheta © 2026
#----------------------------------------------------------------------------------------------------

#!/bin/bash

clear;

sudo docker plugin install grafana/loki-docker-driver:latest --alias loki --grant-all-permissions;
sudo docker plugin enable loki;
#sudo docker pull grafana/loki-docker-driver;
#sudo docker build --file ./.ProjectCore/Configuration/Docker/Grafana-Loki/Dockerfile -t erp-reborn-monitoring-grafana-loki .;

#sudo cp ./.ProjectCore/Configuration/Docker/Grafana/System/etc/grafana/grafana.ini /etc/grafana/grafana.ini;
