#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.Docker.RemoveDangledImages.sh
# ▪ Versi              : 1.00.0000
# ▪ Tanggal            : 2020-06-11
# ▪ Input              : -
# ▪ Output             : -
# ▪ Deskripsi          : Script ini digunakan untuk menghapus Images Docker yang sudah tidak terpakai
# ▪ Execution Syntax   : ./BashScript/Script.Docker.RemoveDangledImages.sh
#                        <FullPathFromRoot>/BashScript/Script.Docker.RemoveDangledImages.sh
# ▪ Copyright          : Zheta © 2020
#----------------------------------------------------------------------------------------------------

#!/bin/bash

clear;
sudo docker rmi $(sudo docker images -a | grep "^<none>" | awk '{print $3}');
