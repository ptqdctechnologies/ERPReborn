#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.Docker.BuildPermanentStorage.Samba.sh
# ▪ Versi              : 1.00.0003
# ▪ Tanggal            : 2021-08-09
# ▪ Input              : -
# ▪ Output             : -
# ▪ Deskripsi          : Script ini digunakan untuk memetakan permanent storage Samba didalam Docker
# ▪ Execution Syntax   : ./BashScript/Script.Docker.BuildPermanentStorage.Samba.sh
#                        <FullPathFromRoot>/BashScript/Script.Docker.BuildPermanentStorage.Samba.sh
# ▪ Copyright          : Zheta © 2021, 2020
#----------------------------------------------------------------------------------------------------

#!/bin/bash

clear;

varDirectory="./../ERPReborn-PermanentStorage/BindMount/Samba";

if [ ! -d $varDirectory ]; then
#   sudo mkdir -p $varDirectory;

#   sudo mkdir -p $varDirectory/etc/localtime;
#   sudo mkdir -p $varDirectory/data;
#   sudo mkdir -p $varDirectory/config/samba;
#   sudo mkdir -p $varDirectory/config/openvpn;

   sudo cp ./.ProjectCore/Configuration/Docker/Samba/ERPReborn-PermanentStorage_Samba.tgz ./../ERPReborn-PermanentStorage/BindMount/ERPReborn-PermanentStorage_Samba.tgz;
   cd ./../ERPReborn-PermanentStorage/BindMount/;
   sudo tar xzvf ERPReborn-PermanentStorage_Samba.tgz;
   sudo rm -rf ./ERPReborn-PermanentStorage_Samba.tgz;
   cd -;

   sudo chmod 777 $varDirectory/data;
fi
