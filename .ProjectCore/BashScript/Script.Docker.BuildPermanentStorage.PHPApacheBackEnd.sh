#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.Docker.BuildPermanentStorage.PHPApacheBackEnd.sh
# ▪ Versi              : 1.00.0001
# ▪ Tanggal            : 2021-02-03
# ▪ Input              : -
# ▪ Output             : -
# ▪ Deskripsi          : Script ini digunakan untuk memetakan permanent storage PHPApacheBackEnd 
#                        didalam Docker
# ▪ Execution Syntax   : ./BashScript/Script.Docker.BuildPermanentStorage.PHPApacheBackEnd.sh
#                        <FullPathFromRoot>/BashScript/Script.Docker.BuildPermanentStorage.PHPApacheBackEnd.sh
# ▪ Copyright          : Zheta © 2021
#----------------------------------------------------------------------------------------------------

#!/bin/bash

clear;

varDirectory="./../ERPReborn-PermanentStorage/PHPApacheBackEnd";

if [ ! -d $varDirectory ]; then
   sudo mkdir -p $varDirectory/zhtConf/log/lastSession/scheduledTask/everyMinute/jobs;
   sudo mkdir -p $varDirectory/zhtConf/log/lastSession/scheduledTask/everyHour/jobs;
   sudo mkdir -p $varDirectory/zhtConf/log/lastSession/scheduledTask/everyTwoHours/jobs;
   sudo mkdir -p $varDirectory/zhtConf/log/lastSession/scheduledTask/everyDay/jobs;
   sudo mkdir -p $varDirectory/zhtConf/log/lastSession/scheduledTask/everyMonth/jobs;
   sudo mkdir -p $varDirectory/zhtConf/log/lastSession/scheduledTask/everyYear/jobs;
fi
