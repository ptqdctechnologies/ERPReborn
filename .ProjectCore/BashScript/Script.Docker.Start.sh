#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.Docker.Start.sh
# ▪ Versi              : 1.00.0005
# ▪ Tanggal            : 2021-01-19
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
printf "\n▪ ▪ ▪ Docker Service Restart ▪ ▪ ▪\n";
sudo systemctl restart docker;

printf "▪ ▪ ▪ Reinitializing Laravel Folder Ownership ▪ ▪ ▪\n";
#./BashScript/Script.Laravel.ComposerUpdate.sh;
./BashScript/Script.Docker.Reinitializing.LaravelFolderOwnership.sh;

printf "\n▪ ▪ ▪ Laravel Dump Autoload ▪ ▪ ▪\n";
./BashScript/Script.Laravel.DumpAutoLoad.sh;

printf "\n▪ ▪ ▪ Pruning Docker's Unused Objects ▪ ▪ ▪\n";
sudo docker network prune --force;
sudo docker container prune --force;
sudo ./BashScript/Script.Docker.RemoveDangledImages.sh;

#---> Execute WatchDog Script
printf "\n▪ ▪ ▪ Initializing System Watchdog Script ▪ ▪ ▪\n";
sudo ./BashScript/Script.System.WatchDog.Docker.ContainerPostgreSQL.sh &
sudo ./BashScript/Script.System.WatchDog.Docker.ContainerSamba.sh &
sudo ./BashScript/Script.System.WatchDog.Docker.ContainerPHPApacheBackEnd.sh &
sleep 1;

printf "\n▪ ▪ ▪ Docker-Compose Up Start ▪ ▪ ▪\n";
#sudo docker-compose up --remove-orphans;
sudo COMPOSE_HTTP_TIMEOUT=200 docker-compose up --remove-orphans;

./BashScript/Script.Docker.Reinitializing.LaravelFolderOwnership.sh;

printf "\n▪ ▪ ▪ System Watchdog Script Termination ▪ ▪ ▪\n";
varCmdExec="sudo kill -s 9 "`ps aux | grep "Script.System.WatchDog.Docker.ContainerPostgreSQL.sh" | grep -v "\-\-color" | awk '{print $2}'`";";
#varResult=$(eval $varCmdExec) 2>/dev/null
eval $varCmdExec 2>/dev/null;

varCmdExec="sudo kill -s 9 "`ps aux | grep "Script.System.WatchDog.Docker.ContainerSamba.sh" | grep -v "\-\-color" | awk '{print $2}'`";";
eval $varCmdExec 2>/dev/null;

varCmdExec="sudo kill -s 9 "`ps aux | grep "Script.System.WatchDog.Docker.ContainerPHPApacheBackEnd.sh" | grep -v "\-\-color" | awk '{print $2}'`";";
eval $varCmdExec 2>/dev/null;

printf "\n▪ ▪ ▪ System Was Stopped Successfully ▪ ▪ ▪\n";
