#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.Docker.BuildImage.Redis.sh
# ▪ Versi              : 1.00.0000
# ▪ Tanggal            : 2020-06-11
# ▪ Input              : -
# ▪ Output             : -
# ▪ Deskripsi          : Script ini digunakan untuk menarik Image Redis didalam Docker
# ▪ Execution Syntax   : ./BashScript/Script.Docker.BuildImage.Redis.sh
#                        <FullPathFromRoot>/BashScript/Script.Docker.BuildImage.Redis.sh
# ▪ Copyright          : Zheta © 2020
#----------------------------------------------------------------------------------------------------

#!/bin/bash

clear;

sudo docker pull redis;
