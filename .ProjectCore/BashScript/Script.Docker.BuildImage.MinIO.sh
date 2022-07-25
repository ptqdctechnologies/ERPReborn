#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.Docker.BuildImage.MinIO.sh
# ▪ Versi              : 1.00.0003
# ▪ Tanggal Update     : 2022-07-25
# ▪ Tanggal Init       : 2021-09-06
# ▪ Input              : -
# ▪ Output             : -
# ▪ Deskripsi          : Script ini digunakan untuk menarik Image MinIO didalam Docker
# ▪ Execution Syntax   : ./BashScript/Script.Docker.BuildImage.MinIO.sh
#                        <FullPathFromRoot>/BashScript/Script.Docker.BuildImage.MinIO.sh
# ▪ Copyright          : Zheta © 2020, 2021, 2022
#----------------------------------------------------------------------------------------------------

#!/bin/bash

clear;

#sudo docker pull bitnami/minio:latest;
sudo docker pull minio/minio;
sudo docker pull minio/mc;
#sudo docker pull minio/minio:RELEASE.2021-08-31T05-46-54Z.fips;
#sudo docker pull minio/minio:RELEASE.2021-08-25T00-41-18Z.fips;
#sudo docker pull minio/minio:RELEASE.2021-08-05T22-01-19Z;
sudo docker build --file ./.ProjectCore/Configuration/Docker/MinIO/Dockerfile -t erp-reborn-minio .;

