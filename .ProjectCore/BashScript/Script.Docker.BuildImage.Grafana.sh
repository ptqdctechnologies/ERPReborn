#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.Docker.BuildImage.Grafana.sh
# ▪ Versi              : 1.00.0000
# ▪ Tanggal            : 2022-10-14
# ▪ Input              : -
# ▪ Output             : -
# ▪ Deskripsi          : Script ini digunakan untuk menarik Image Grafana didalam Docker
# ▪ Execution Syntax   : ./BashScript/Script.Docker.BuildImage.Grafana.sh
#                        <FullPathFromRoot>/BashScript/Script.Docker.BuildImage.Grafana.sh
# ▪ Copyright          : Zheta © 2020
#----------------------------------------------------------------------------------------------------

#!/bin/bash

clear;

sudo docker pull grafana/grafana;
sudo docker build --file ./.ProjectCore/Configuration/Docker/Grafana/Dockerfile -t erp-reborn-monitoring-grafana .;

#sudo cp ./.ProjectCore/Configuration/Docker/Grafana/System/etc/grafana/grafana.ini /etc/grafana/grafana.ini;
