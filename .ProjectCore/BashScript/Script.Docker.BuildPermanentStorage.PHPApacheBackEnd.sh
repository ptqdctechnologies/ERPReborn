#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.Docker.BuildPermanentStorage.PHPApacheBackEnd.sh
# ▪ Versi              : 1.00.0006
# ▪ Tanggal            : 2023-12-01 - 2023-01-20
# ▪ Input              : -
# ▪ Output             : -
# ▪ Deskripsi          : Script ini digunakan untuk memetakan permanent storage PHPApacheBackEnd 
#                        didalam Docker
# ▪ Execution Syntax   : ./BashScript/Script.Docker.BuildPermanentStorage.PHPApacheBackEnd.sh
#                        <FullPathFromRoot>/BashScript/Script.Docker.BuildPermanentStorage.PHPApacheBackEnd.sh
# ▪ Copyright          : Zheta © 2021 - 2023
#----------------------------------------------------------------------------------------------------

#!/bin/bash

clear;

varDirectory="./../ERPReborn-PermanentStorage/BindMount/PHPApacheBackEnd";

if [ ! -d $varDirectory ]; then
   sudo mkdir -p $varDirectory/root;
   sudo touch $varDirectory/root/.bash_history;

   sudo mkdir -p $varDirectory/zhtConf/log/lastSession/cron.d;
   sudo mkdir -p $varDirectory/zhtConf/log/lastSession/scheduledTask/everyMinute/jobs;
   sudo mkdir -p $varDirectory/zhtConf/log/lastSession/scheduledTask/everyFifteenMinutes/jobs;
   sudo mkdir -p $varDirectory/zhtConf/log/lastSession/scheduledTask/everyThirtyMinutes/jobs;
   sudo mkdir -p $varDirectory/zhtConf/log/lastSession/scheduledTask/everyHour/jobs;
   sudo mkdir -p $varDirectory/zhtConf/log/lastSession/scheduledTask/everyTwoHours/jobs;
   sudo mkdir -p $varDirectory/zhtConf/log/lastSession/scheduledTask/everyDay/jobs;
   sudo mkdir -p $varDirectory/zhtConf/log/lastSession/scheduledTask/everyDayAt21/jobs;
   sudo mkdir -p $varDirectory/zhtConf/log/lastSession/scheduledTask/everyMonth/jobs;
   sudo mkdir -p $varDirectory/zhtConf/log/lastSession/scheduledTask/everyYear/jobs;

   cd $varDirectory/zhtConf/;
   sudo ln -s ./../../../../ERPReborn/.ProjectCore/Configuration/Docker/PHPApacheBackEnd/System/zhtConf/Script Script;
   #sudo ln -s ./../../../ERPReborn/.ProjectCore/Configuration/Docker/PHPApacheBackEnd/System/zhtConf/Script Script;
   cd -;
fi
