#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.Docker.BuildVolume.All.sh
# ▪ Versi              : 1.00.0004
# ▪ Tanggal            : 2025-07-30
# ▪ Input              : -
# ▪ Output             : -
# ▪ Deskripsi          : Script ini digunakan untuk membuat semua volume Docker
# ▪ Execution Syntax   : ./BashScript/Script.Docker.BuildVolume.All.sh
#                        <FullPathFromRoot>/BashScript/Script.Docker.BuildVolume.All.sh
# ▪ Copyright          : Zheta © 2020 - 2025
#----------------------------------------------------------------------------------------------------

#!/bin/bash

sudo docker volume create --driver local --name=volume-mysql;
sudo docker volume create --driver local --name=volume-percona;
sudo docker volume create --driver local --name=volume-postgresql;
sudo docker volume create --driver local --name=volume-pgadmin4;
sudo docker volume create --driver local --name=volume-redis;

sudo docker volume create --driver local --name=volume-minio-node01-disk01;
#sudo docker volume create --driver local --name=volume-minio-node01-disk02;
#sudo docker volume create --driver local --name=volume-minio-node01-disk03;
#sudo docker volume create --driver local --name=volume-minio-node01-disk04;

sudo docker volume create --driver local --name=volume-minio-node02-disk01;
#sudo docker volume create --driver local --name=volume-minio-node02-disk02;
#sudo docker volume create --driver local --name=volume-minio-node02-disk03;
#sudo docker volume create --driver local --name=volume-minio-node02-disk04;

sudo docker volume create --driver local --name=volume-minio-node03-disk01;
#sudo docker volume create --driver local --name=volume-minio-node03-disk02;
#sudo docker volume create --driver local --name=volume-minio-node03-disk03;
#sudo docker volume create --driver local --name=volume-minio-node03-disk04;

sudo docker volume create --driver local --name=volume-minio-node04-disk01;
#sudo docker volume create --driver local --name=volume-minio-node04-disk02;
#sudo docker volume create --driver local --name=volume-minio-node04-disk03;
#sudo docker volume create --driver local --name=volume-minio-node04-disk04;



sudo docker volume create --driver local --name=volume-openproject;
