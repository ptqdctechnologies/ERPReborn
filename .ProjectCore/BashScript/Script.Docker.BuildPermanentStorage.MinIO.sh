#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.Docker.BuildPermanentStorage.MinIO.sh
# ▪ Versi              : 1.00.0002
# ▪ Tanggal            : 2020-11-12
# ▪ Input              : -
# ▪ Output             : -
# ▪ Deskripsi          : Script ini digunakan untuk memetakan permanent storage MinIO didalam Docker
# ▪ Execution Syntax   : ./BashScript/Script.Docker.BuildPermanentStorage.MinIO.sh
#                        <FullPathFromRoot>/BashScript/Script.Docker.BuildPermanentStorage.MinIO.sh
# ▪ Copyright          : Zheta © 2020
#----------------------------------------------------------------------------------------------------

#!/bin/bash

clear;

varDirectory="./../ERPReborn-PermanentStorage/MinIO";

if [ ! -d $varDirectory ]; then
   sudo mkdir -p $varDirectory;
fi
