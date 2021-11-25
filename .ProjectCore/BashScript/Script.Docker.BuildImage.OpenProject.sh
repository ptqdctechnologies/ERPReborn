#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.Docker.BuildImage.OpenProject.sh
# ▪ Versi              : 1.00.0001
# ▪ Tanggal            : 2021-11-25
# ▪ Input              : -
# ▪ Output             : -
# ▪ Deskripsi          : Script ini digunakan untuk menarik Image Open Project didalam Docker
# ▪ Execution Syntax   : ./BashScript/Script.Docker.BuildImage.OpenProject.sh
#                        <FullPathFromRoot>/Script.Docker.BuildImage.OpenProject.sh
# ▪ Copyright          : Zheta © 2021
#----------------------------------------------------------------------------------------------------

#!/bin/bash

clear;

sudo docker pull openproject/community:12;

sudo docker build --file ./.ProjectCore/Configuration/Docker/OpenProject/Dockerfile -t erp-reborn-devtools-openproject .;
