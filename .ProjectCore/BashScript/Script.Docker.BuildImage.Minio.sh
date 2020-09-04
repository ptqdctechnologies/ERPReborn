#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.Docker.BuildImage.Minio.sh
# ▪ Versi              : 1.00.0000
# ▪ Tanggal            : 2020-09-04
# ▪ Input              : -
# ▪ Output             : -
# ▪ Deskripsi          : Script ini digunakan untuk menarik Image Minio didalam Docker
# ▪ Execution Syntax   : ./BashScript/Script.Docker.BuildImage.Minio.sh
#                        <FullPathFromRoot>/BashScript/Script.Docker.BuildImage.Minio.sh
# ▪ Copyright          : Zheta © 2020
#----------------------------------------------------------------------------------------------------

#!/bin/bash

clear;

sudo docker pull minio/minio;
