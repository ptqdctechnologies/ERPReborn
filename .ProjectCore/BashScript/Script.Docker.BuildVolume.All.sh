#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.Docker.BuildVolume.All.sh
# ▪ Versi              : 1.00.0001
# ▪ Tanggal            : 2020-06-15
# ▪ Input              : -
# ▪ Output             : -
# ▪ Deskripsi          : Script ini digunakan untuk membuat semua volume Docker
# ▪ Execution Syntax   : ./BashScript/Script.Docker.BuildVolume.All.sh
#                        <FullPathFromRoot>/BashScript/Script.Docker.BuildVolume.All.sh
# ▪ Copyright          : Zheta © 2020
#----------------------------------------------------------------------------------------------------

#!/bin/bash

sudo docker volume create --driver local --name=volume-mysql;
sudo docker volume create --driver local --name=volume-postgresql;
sudo docker volume create --driver local --name=volume-pgadmin4;
sudo docker volume create --driver local --name=volume-redis;
