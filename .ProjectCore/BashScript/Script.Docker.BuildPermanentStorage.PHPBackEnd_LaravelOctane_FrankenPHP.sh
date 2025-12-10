#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.Docker.BuildPermanentStorage.PHPBackEnd_LaravelOctane_FrankenPHP.sh
# ▪ Versi              : 1.00.0000
# ▪ Tanggal            : 2025-12-10 - 2025-12-10
# ▪ Input              : -
# ▪ Output             : -
# ▪ Deskripsi          : Script ini digunakan untuk memetakan permanent storage PHPBackEnd_LaravelOctane_FrankenPHP 
#                        didalam Docker
# ▪ Execution Syntax   : ./BashScript/Script.Docker.BuildPermanentStorage.PHPBackEnd_LaravelOctane_FrankenPHP.sh
#                        <FullPathFromRoot>/BashScript/Script.Docker.BuildPermanentStorage.PHPBackEnd_LaravelOctane_FrankenPHP.sh
# ▪ Copyright          : Zheta © 2025
#----------------------------------------------------------------------------------------------------

#!/bin/bash

clear;

varDirectory="./../ERPReborn-PermanentStorage/BindMount/PHPBackEnd_LaravelOctane_FrankenPHP";

if [ ! -d $varDirectory ]; then
   sudo mkdir -p $varDirectory/root;
   sudo touch $varDirectory/root/.bash_history;

   sudo mkdir -p $varDirectory/zhtConf/dataVolume/caddyData;
   sudo mkdir -p $varDirectory/zhtConf/dataVolume/caddyConfig;

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
   sudo ln -s ./../../../../ERPReborn/.ProjectCore/Configuration/Docker/PHPBackEnd_LaravelOctane_FrankenPHP/System/zhtConf/Script Script;
   cd -;
fi
