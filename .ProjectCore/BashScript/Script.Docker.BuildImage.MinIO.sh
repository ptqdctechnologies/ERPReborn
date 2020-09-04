#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.Docker.BuildImage.MinIO.sh
# ▪ Versi              : 1.00.0000
# ▪ Tanggal            : 2020-09-04
# ▪ Input              : -
# ▪ Output             : -
# ▪ Deskripsi          : Script ini digunakan untuk menarik Image MinIO didalam Docker
# ▪ Execution Syntax   : ./BashScript/Script.Docker.BuildImage.MinIO.sh
#                        <FullPathFromRoot>/BashScript/Script.Docker.BuildImage.MinIO.sh
# ▪ Copyright          : Zheta © 2020
#----------------------------------------------------------------------------------------------------

#!/bin/bash

clear;

sudo docker pull minio/minio;
