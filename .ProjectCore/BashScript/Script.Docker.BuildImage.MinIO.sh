#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.Docker.BuildImage.MinIO.sh
# ▪ Versi              : 1.00.0001
# ▪ Tanggal            : 2021-08-04
# ▪ Input              : -
# ▪ Output             : -
# ▪ Deskripsi          : Script ini digunakan untuk menarik Image MinIO didalam Docker
# ▪ Execution Syntax   : ./BashScript/Script.Docker.BuildImage.MinIO.sh
#                        <FullPathFromRoot>/BashScript/Script.Docker.BuildImage.MinIO.sh
# ▪ Copyright          : Zheta © 2020, 2021
#----------------------------------------------------------------------------------------------------

#!/bin/bash

clear;

sudo docker pull minio/minio;
sudo docker build --file ./.ProjectCore/Configuration/Docker/MinIO/Dockerfile -t erp-reborn-minio .;

