#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.Docker.BuildPermanentStorage.PHPApacheBackEnd.sh
# ▪ Versi              : 1.00.0000
# ▪ Tanggal            : 2020-12-19
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
   sudo mkdir -p $varDirectory/zhtConf/log/lastSession/scheduledTask/everyMinute;
   sudo mkdir -p $varDirectory/zhtConf/log/lastSession/scheduledTask/everyHour;
   sudo mkdir -p $varDirectory/zhtConf/log/lastSession/scheduledTask/everyTwoHours;
   sudo mkdir -p $varDirectory/zhtConf/log/lastSession/scheduledTask/everyDay;
   sudo mkdir -p $varDirectory/zhtConf/log/lastSession/scheduledTask/everyMonth;
   sudo mkdir -p $varDirectory/zhtConf/log/lastSession/scheduledTask/everyYear;
fi
