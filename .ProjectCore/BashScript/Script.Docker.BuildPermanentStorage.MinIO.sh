#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.Docker.BuildPermanentStorage.MinIO.sh
# ▪ Versi              : 1.00.0001
# ▪ Tanggal            : 2020-06-11
# ▪ Input              : -
# ▪ Output             : -
# ▪ Deskripsi          : Script ini digunakan untuk memetakan permanent storage MinIO didalam Docker
# ▪ Execution Syntax   : ./BashScript/Script.Docker.BuildPermanentStorage.MinIO.sh
#                        <FullPathFromRoot>/BashScript/Script.Docker.BuildPermanentStorage.MinIO.sh
# ▪ Copyright          : Zheta © 2020
#----------------------------------------------------------------------------------------------------

#!/bin/bash

clear;

mkdir -p ./../ERPReborn-PermanentStorage/MinIO;
#sudo docker pull postgres;
#vim ./.ProjectCore/Configuration/Docker/PostgreSQL/Dockerfile;
#sudo docker build --file ./.ProjectCore/Configuration/Docker/PostgreSQL/Dockerfile -t erp-reborn-postgresql .;
