#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.Docker.Start.sh
# ▪ Versi              : 1.00.0002
# ▪ Tanggal            : 2020-06-18
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
./BashScript/Script.Docker.Reinitializing.LaravelFolderOwnership.sh;
sudo ./BashScript/Script.System.WatchDog.Docker.ContainerPostgreSQL.sh &
sudo docker-compose up --remove-orphans;
varCmdExec="sudo kill -s 9 "`ps aux | grep "Script.System.WatchDog.Docker.ContainerPostgreSQL.sh" | grep -v "\-\-color" | awk '{print $2}'`";";
#varResult=$(eval $varCmdExec) 2>/dev/null
eval $varCmdExec 2>/dev/null;
