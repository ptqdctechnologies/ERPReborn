#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.Docker.BuildImage.Grafana.sh
# ▪ Versi              : 1.00.0000
# ▪ Tanggal            : 2020-09-25
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
