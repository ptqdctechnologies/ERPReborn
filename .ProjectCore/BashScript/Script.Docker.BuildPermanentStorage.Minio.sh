#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.Docker.BuildPermanentStorage.Minio.sh
# ▪ Versi              : 1.00.0000
# ▪ Tanggal            : 2020-06-11
# ▪ Input              : -
# ▪ Output             : -
# ▪ Deskripsi          : Script ini digunakan untuk memetakan permanent storage Minio didalam Docker
# ▪ Execution Syntax   : ./BashScript/Script.Docker.BuildPermanentStorage.Minio.sh
#                        <FullPathFromRoot>/BashScript/Script.Docker.BuildPermanentStorage.Minio.sh
# ▪ Copyright          : Zheta © 2020
#----------------------------------------------------------------------------------------------------

#!/bin/bash

clear;

mkdir -p ./../ERPReborn-PermanentStorage/Minio;
#sudo docker pull postgres;
#vim ./.ProjectCore/Configuration/Docker/PostgreSQL/Dockerfile;
#sudo docker build --file ./.ProjectCore/Configuration/Docker/PostgreSQL/Dockerfile -t erp-reborn-postgresql .;
