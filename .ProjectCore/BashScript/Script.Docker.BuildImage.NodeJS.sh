#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.Docker.BuildImage.NodeJS.sh
# ▪ Versi              : 1.00.0000
# ▪ Tanggal            : 2025-02-13
# ▪ Input              : -
# ▪ Output             : -
# ▪ Deskripsi          : Script ini digunakan untuk menarik Image NodeJS didalam Docker
# ▪ Execution Syntax   : ./BashScript/Script.Docker.BuildImage.NodeJS.sh
#                        <FullPathFromRoot>/BashScript/Script.Docker.BuildImage.NodeJS.sh
# ▪ Copyright          : Zheta © 2025
#----------------------------------------------------------------------------------------------------

#!/bin/bash

clear;

sudo docker pull library/node;
sudo docker build --file ./.ProjectCore/Configuration/Docker/NodeJS/DockerFile -t erp-reborn-nodejs .;
