#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.Docker.BuildImage.Samba.sh
# ▪ Versi              : 1.00.0000
# ▪ Tanggal            : 2020-12-16
# ▪ Input              : -
# ▪ Output             : -
# ▪ Deskripsi          : Script ini digunakan untuk menarik Image Samba didalam Docker
# ▪ Execution Syntax   : ./BashScript/Script.Docker.BuildImage.Samba.sh
#                        <FullPathFromRoot>/BashScript/Script.Docker.BuildImage.Samba.sh
# ▪ Copyright          : Zheta © 2020
#----------------------------------------------------------------------------------------------------

#!/bin/bash

clear;

#sudo docker pull dperson/samba;
sudo docker pull nowsci/samba-domain;
sudo cp ./.ProjectCore/Configuration/Docker/Samba/smb.conf ./../ERPReborn-PermanentStorage/Samba/config/samba/smb.conf;
sudo docker build --file ./.ProjectCore/Configuration/Docker/Samba/Dockerfile -t erp-reborn-samba .;
