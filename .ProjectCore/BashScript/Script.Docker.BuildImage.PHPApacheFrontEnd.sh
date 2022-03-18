#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.Docker.BuildImage.PHPApacheFrontEnd.sh
# ▪ Versi              : 1.00.0003
# ▪ Tanggal            : 2022-03-18 From 2021-03-05
# ▪ Input              : -
# ▪ Output             : erp-reborn-phpapache-frontend (Docker's Image Object)
# ▪ Deskripsi          : Script ini digunakan untuk membangun ulang Image PHP Apache Front End  
#                        didalam Docker
# ▪ Execution Syntax   : ./BashScript/Script.Docker.BuildImage.PHPApacheFrontEnd.sh
#                        <FullPathFromRoot>/BashScript/Script.Docker.BuildImage.PHPApacheFrontEnd.sh
# ▪ Copyright          : Zheta © 2020 - 2022
#----------------------------------------------------------------------------------------------------

#!/bin/bash

clear;

sudo docker pull php:8.1-apache;
sudo docker pull composer:latest;
#vim ./.ProjectCore/Configuration/Docker/PHPApacheFrontEnd/Dockerfile
sudo docker build --file ./.ProjectCore/Configuration/Docker/PHPApacheFrontEnd/Dockerfile -t erp-reborn-phpapache-frontend .;
