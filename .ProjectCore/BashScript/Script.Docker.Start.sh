#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.Docker.Start.sh
# ▪ Versi              : 1.00.0000
# ▪ Tanggal            : 2020-06-11
# ▪ Input              : -
# ▪ Output             : -
# ▪ Deskripsi          : Script ini digunakan untuk menjalankan Docker melalui Compose-Up
# ▪ Execution Syntax   : ./BashScript/Script.Docker.Start.sh
#                        <FullPathFromRoot>/BashScript/Script.Docker.Start.sh
# ▪ Copyright          : Zheta © 2020
#----------------------------------------------------------------------------------------------------

#!/bin/bash

clear;

#---> Specific : Redis
#sudo sysctl vm.overcommit_memory=1;
#sudo echo never > /sys/kernel/mm/transparent_hugepage/enabled;

#---> General

sudo docker network prune --force;
sudo docker container prune --force;
sudo docker-compose up --remove-orphans;


#sudo docker-compose up --remove-orphans \
#  | parallel sleep 20 \
#     && sudo docker exec -it postgresql service mysql status;

  
#   \
#   && sleep 20 \
#   && sudo docker exec -it postgresql "/usr/local/bin/Script.ServiceRestart.sh";
#sudo docker exec -it postgresql -c "";
