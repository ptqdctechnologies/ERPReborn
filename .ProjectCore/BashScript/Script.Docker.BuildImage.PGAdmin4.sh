#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.Docker.BuildImage.PGAdmin4.sh
# ▪ Versi              : 1.00.0000
# ▪ Tanggal            : 2020-06-11
# ▪ Input              : -
# ▪ Output             : -
# ▪ Deskripsi          : Script ini digunakan untuk menarik Image PGAdmin4 didalam Docker
# ▪ Execution Syntax   : ./BashScript/Script.Docker.BuildImage.PGAdmin4.sh
#                        <FullPathFromRoot>/BashScript/Script.Docker.BuildImage.PGAdmin4.sh
# ▪ Copyright          : Zheta © 2020
#----------------------------------------------------------------------------------------------------

#!/bin/bash

clear;

sudo docker pull dpage/pgadmin4;
