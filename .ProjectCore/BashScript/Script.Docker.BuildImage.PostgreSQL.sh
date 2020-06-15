#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.Docker.BuildImage.PostgreSQL.sh
# ▪ Versi              : 1.00.0000
# ▪ Tanggal            : 2020-06-11
# ▪ Input              : -
# ▪ Output             : erp-reborn-postgresql (Docker's Image Object)
# ▪ Deskripsi          : Script ini digunakan untuk membangun ulang Image PostgreSQL didalam Docker
# ▪ Execution Syntax   : ./BashScript/Script.Docker.BuildImage.PostgreSQL.sh
#                        <FullPathFromRoot>/BashScript/Script.Docker.BuildImage.PostgreSQL.sh
# ▪ Copyright          : Zheta © 2020
#----------------------------------------------------------------------------------------------------

#!/bin/bash

clear;

sudo docker pull postgres;
vim ./.ZhtConf/Docker/PostgreSQL/Dockerfile;
sudo docker build --file ./.ZhtConf/Docker/PostgreSQL/Dockerfile -t erp-reborn-postgresql .;
