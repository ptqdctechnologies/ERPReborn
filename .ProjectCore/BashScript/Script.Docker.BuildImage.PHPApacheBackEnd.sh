#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.Docker.BuildImage.PHPApacheBackEnd.sh
# ▪ Versi              : 1.00.0000
# ▪ Tanggal            : 2020-06-11
# ▪ Input              : -
# ▪ Output             : erp-reborn-phpapache-backend (Docker's Image Object)
# ▪ Deskripsi          : Script ini digunakan untuk membangun ulang Image PHP Apache Back End didalam 
#                        Docker
# ▪ Execution Syntax   : ./BashScript/Script.Docker.BuildImage.PHPApacheBackEnd.sh
#                        <FullPathFromRoot>/BashScript/Script.Docker.BuildImage.PHPApacheBackEnd.sh
# ▪ Copyright          : Zheta © 2020
#----------------------------------------------------------------------------------------------------

#!/bin/bash

clear;

sudo docker pull php:7.3-apache;
#vim ./.ProjectCore/Configuration/Docker/PHPApacheBackEnd/Dockerfile
sudo docker build --file ./.ProjectCore/Configuration/Docker/PHPApacheBackEnd/Dockerfile -t erp-reborn-phpapache-backend .;
