#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.Docker.BuildImage.PHPApacheBackEnd.sh
# ▪ Versi              : 1.00.0006
# ▪ Tanggal            : 2022-10-19 From 2021-03-05
# ▪ Input              : -
# ▪ Output             : erp-reborn-phpapache-backend (Docker's Image Object)
# ▪ Deskripsi          : Script ini digunakan untuk membangun ulang Image PHP Apache Back End didalam 
#                        Docker
# ▪ Execution Syntax   : ./BashScript/Script.Docker.BuildImage.PHPApacheBackEnd.sh
#                        <FullPathFromRoot>/BashScript/Script.Docker.BuildImage.PHPApacheBackEnd.sh
# ▪ Copyright          : Zheta © 2020 - 2022
#----------------------------------------------------------------------------------------------------

#!/bin/bash

clear;

#sudo docker pull php:8.1.10-apache;
#sudo docker pull php:8.1.11-apache;
#sudo docker pull php:8.2.1-apache;
#sudo docker pull php:8.2.13-apache;
#sudo docker pull php:8.3.3-apache;
#sudo docker pull php:8.3.8-apache;
#sudo docker pull php:8.3.12-apache;
#sudo docker pull php:8.4.4-apache;
sudo docker pull php:8.4.7-apache;
sudo docker pull composer:latest;
#vim ./.ProjectCore/Configuration/Docker/PHPApacheBackEnd/Dockerfile
sudo docker build --file ./.ProjectCore/Configuration/Docker/PHPApacheBackEnd/Dockerfile -t erp-reborn-phpapache-backend .;
