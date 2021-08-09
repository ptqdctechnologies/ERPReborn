#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.Docker.BuildPermanentStorage.MinIO.sh
# ▪ Versi              : 1.00.0005
# ▪ Tanggal            : 2021-08-09
# ▪ Input              : -
# ▪ Output             : -
# ▪ Deskripsi          : Script ini digunakan untuk memetakan permanent storage MinIO didalam Docker
# ▪ Execution Syntax   : ./BashScript/Script.Docker.BuildPermanentStorage.MinIO.sh
#                        <FullPathFromRoot>/BashScript/Script.Docker.BuildPermanentStorage.MinIO.sh
# ▪ Copyright          : Zheta © 2020, 2021
#----------------------------------------------------------------------------------------------------

#!/bin/bash

clear;

#varDirectory="./../ERPReborn-PermanentStorage/MinIO";
#varDirectory="./../ERPReborn-PermanentStorage/MinIO/erp-reborn";
#if [ ! -d $varDirectory ]; then
#   sudo mkdir -p $varDirectory;
#fi

varDirectory="./../ERPReborn-PermanentStorage/BindMount/MinIO";
if [ ! -d $varDirectory ]; then
   sudo cp ./.ProjectCore/Configuration/Docker/MinIO/ERPReborn-PermanentStorage_MinIO.tgz ./../ERPReborn-PermanentStorage/BindMount/ERPReborn-PermanentStorage_MinIO.tgz;
   cd ./../ERPReborn-PermanentStorage/BindMount/;
   sudo tar xzvf ERPReborn-PermanentStorage_MinIO.tgz;
   sudo rm -rf ./ERPReborn-PermanentStorage_MinIO.tgz;
   cd -;
fi


#varDirectory="./../ERPReborn-PermanentStorage/BindMount/MinIO/Node-01";
#if [ ! -d $varDirectory ]; then
#   sudo mkdir -p $varDirectory;
#   sudo mkdir -p $varDirectory"/Disk-01/erp-reborn/lost+found";
#   sudo mkdir -p $varDirectory"/Disk-02/erp-reborn/lost+found";
#   sudo mkdir -p $varDirectory"/Disk-03/erp-reborn/lost+found";
#   sudo mkdir -p $varDirectory"/Disk-04/erp-reborn/lost+found";
#fi

#varDirectory="./../ERPReborn-PermanentStorage/BindMount/MinIO/Node-02";
#if [ ! -d $varDirectory ]; then
#   sudo mkdir -p $varDirectory;
#   sudo mkdir -p $varDirectory"/Disk-01/erp-reborn/lost+found";
#   sudo mkdir -p $varDirectory"/Disk-02/erp-reborn/lost+found";
#   sudo mkdir -p $varDirectory"/Disk-03/erp-reborn/lost+found";
#   sudo mkdir -p $varDirectory"/Disk-04/erp-reborn/lost+found";
#fi

#varDirectory="./../ERPReborn-PermanentStorage/BindMount/MinIO/Node-03";
#if [ ! -d $varDirectory ]; then
#   sudo mkdir -p $varDirectory;
#   sudo mkdir -p $varDirectory"/Disk-01/erp-reborn/lost+found";
#   sudo mkdir -p $varDirectory"/Disk-02/erp-reborn/lost+found";
#   sudo mkdir -p $varDirectory"/Disk-03/erp-reborn/lost+found";
#   sudo mkdir -p $varDirectory"/Disk-04/erp-reborn/lost+found";
#fi

#varDirectory="./../ERPReborn-PermanentStorage/BindMount/MinIO/Node-04";
#if [ ! -d $varDirectory ]; then
#   sudo mkdir -p $varDirectory;
#   sudo mkdir -p $varDirectory"/Disk-01/erp-reborn/lost+found";
#   sudo mkdir -p $varDirectory"/Disk-02/erp-reborn/lost+found";
#   sudo mkdir -p $varDirectory"/Disk-03/erp-reborn/lost+found";
#   sudo mkdir -p $varDirectory"/Disk-04/erp-reborn/lost+found";
#fi
