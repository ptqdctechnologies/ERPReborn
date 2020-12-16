#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.Docker.BuildPermanentStorage.Samba.sh
# ▪ Versi              : 1.00.0001
# ▪ Tanggal            : 2020-12-16
# ▪ Input              : -
# ▪ Output             : -
# ▪ Deskripsi          : Script ini digunakan untuk memetakan permanent storage Samba didalam Docker
# ▪ Execution Syntax   : ./BashScript/Script.Docker.BuildPermanentStorage.Samba.sh
#                        <FullPathFromRoot>/BashScript/Script.Docker.BuildPermanentStorage.Samba.sh
# ▪ Copyright          : Zheta © 2020
#----------------------------------------------------------------------------------------------------

#!/bin/bash

clear;

varDirectory="./../ERPReborn-PermanentStorage/Samba";

if [ ! -d $varDirectory ]; then
   sudo mkdir -p $varDirectory;
fi
