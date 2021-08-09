#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.Docker.BuildPermanentStorage.LocalStorage.sh
# ▪ Versi              : 1.00.0001
# ▪ Tanggal            : 2021-08-09
# ▪ Input              : -
# ▪ Output             : -
# ▪ Deskripsi          : Script ini digunakan untuk memetakan permanent Local Storage didalam Docker
# ▪ Execution Syntax   : ./BashScript/Script.Docker.BuildPermanentStorage.LocalStorage.sh
#                        <FullPathFromRoot>/BashScript/Script.Docker.BuildPermanentStorage.LocalStorage.sh
# ▪ Copyright          : Zheta © 2021
#----------------------------------------------------------------------------------------------------

#!/bin/bash

clear;

varDirectory="./../ERPReborn-PermanentStorage/BindMount/LocalStorage/WebBackEnd";

if [ ! -d $varDirectory ]; then
   sudo mkdir -p $varDirectory;
fi
sudo chown -R 33:33 $varDirectory;

varDirectory="./../ERPReborn-PermanentStorage/BindMount/LocalStorage/WebFrontEnd";

if [ ! -d $varDirectory ]; then
   sudo mkdir -p $varDirectory;
fi
sudo chown -R 33:33 $varDirectory;
