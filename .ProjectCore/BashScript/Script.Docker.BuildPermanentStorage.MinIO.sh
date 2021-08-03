#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.Docker.BuildPermanentStorage.MinIO.sh
# ▪ Versi              : 1.00.0003
# ▪ Tanggal            : 2021-08-03
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
varDirectory="./../ERPReborn-PermanentStorage/MinIO/erp-reborn";

if [ ! -d $varDirectory ]; then
   sudo mkdir -p $varDirectory;
fi
