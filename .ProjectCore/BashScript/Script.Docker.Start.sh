#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.Docker.Start.sh
# ▪ Versi              : 1.00.0004
# ▪ Tanggal            : 2021-01-18
# ▪ Input              : -
# ▪ Output             : -
# ▪ Deskripsi          : Script ini digunakan untuk menjalankan Docker melalui Compose-Up
# ▪ Execution Syntax   : ./BashScript/Script.Docker.Start.sh
#                        <FullPathFromRoot>/BashScript/Script.Docker.Start.sh
# ▪ Copyright          : Zheta © 2020, 2021
#----------------------------------------------------------------------------------------------------

#!/bin/bash

clear;

#---> Specific : Redis
#sudo sysctl vm.overcommit_memory=1;
#sudo echo never > /sys/kernel/mm/transparent_hugepage/enabled;

#---> General
#./BashScript/Script.Laravel.ComposerUpdate.sh;
./BashScript/Script.Docker.Reinitializing.LaravelFolderOwnership.sh;
./BashScript/Script.Laravel.DumpAutoLoad.sh;

sudo systemctl restart docker;

sudo docker network prune --force;
sudo docker container prune --force;

#---> Execute WatchDog Script
sudo ./BashScript/Script.System.WatchDog.Docker.ContainerPostgreSQL.sh &
echo "";
sudo ./BashScript/Script.System.WatchDog.Docker.ContainerSamba.sh &
echo "";
sudo ./BashScript/Script.System.WatchDog.Docker.ContainerPHPApacheBackEnd.sh &
echo "";

#sudo ./BashScript/Script.System.WatchDog.Docker.ContainerPostgreSQL.sh && ./BashScript/Script.System.WatchDog.Docker.ContainerSamba.sh && ./BashScript/Script.System.WatchDog.Docker.ContainerPHPApacheBackEnd.sh &

varCmdExec="sudo kill -s 9 "`ps aux | grep "Script.System.WatchDog.Docker.ContainerPostgreSQL.sh" | grep -v "\-\-color" | awk '{print $2}'`";";
#varResult=$(eval $varCmdExec) 2>/dev/null
eval $varCmdExec 2>/dev/null;

varCmdExec="sudo kill -s 9 "`ps aux | grep "Script.System.WatchDog.Docker.ContainerSamba.sh" | grep -v "\-\-color" | awk '{print $2}'`";";
eval $varCmdExec 2>/dev/null;

varCmdExec="sudo kill -s 9 "`ps aux | grep "Script.System.WatchDog.Docker.ContainerPHPApacheBackEnd.sh" | grep -v "\-\-color" | awk '{print $2}'`";";
eval $varCmdExec 2>/dev/null;

sudo docker-compose up --remove-orphans;
