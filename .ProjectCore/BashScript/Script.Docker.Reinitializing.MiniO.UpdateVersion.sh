#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.Laravel.ComposerUpdate.sh
# ▪ Versi              : 1.00.0000
# ▪ Tanggal            : 2022-08-03
# ▪ Input              : -
# ▪ Output             : -
# ▪ Deskripsi          : Script ini digunakan untuk mengupdate Minio Vrsion menggunakan Composer
# ▪ Execution Syntax   : ./BashScript/Script.Docker.Reinitializing.MiniO.UpdateVersion.sh
#                        <FullPathFromRoot>/BashScript/Script.Docker.Reinitializing.MiniO.UpdateVersion.sh
# ▪ Copyright          : Zheta © 2020-2022
#----------------------------------------------------------------------------------------------------

#!/bin/bash

clear;

sudo docker exec -it minio-node01 /bin/bash -c "/opt/minio-binaries/mc alias set minio http://172.28.0.9:9000 pt.qdc.technologies@gmail.com qu1d151t3chn0; /opt/minio-binaries/mc admin update minio; ";
sudo docker exec -it minio-node02 /bin/bash -c "/opt/minio-binaries/mc alias set minio http://172.28.0.10:9000 pt.qdc.technologies@gmail.com qu1d151t3chn0; /opt/minio-binaries/mc admin update minio; ";
sudo docker exec -it minio-node03 /bin/bash -c "/opt/minio-binaries/mc alias set minio http://172.28.0.11:9000 pt.qdc.technologies@gmail.com qu1d151t3chn0; /opt/minio-binaries/mc admin update minio; ";
sudo docker exec -it minio-node04 /bin/bash -c "/opt/minio-binaries/mc alias set minio http://172.28.0.12:9000 pt.qdc.technologies@gmail.com qu1d151t3chn0; /opt/minio-binaries/mc admin update minio; ";
