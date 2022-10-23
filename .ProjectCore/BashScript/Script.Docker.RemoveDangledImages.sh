#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.Docker.RemoveDangledImages.sh
# ▪ Versi              : 1.00.0001
# ▪ Tanggal Upodate    : 2022-10-24
# ▪ Tanggal Pembuatan  : 2020-06-11
# ▪ Input              : -
# ▪ Output             : -
# ▪ Deskripsi          : Script ini digunakan untuk menghapus Images Docker yang sudah tidak terpakai
# ▪ Execution Syntax   : ./BashScript/Script.Docker.RemoveDangledImages.sh
#                        <FullPathFromRoot>/BashScript/Script.Docker.RemoveDangledImages.sh
# ▪ Copyright          : Zheta © 2020 - 2022
#----------------------------------------------------------------------------------------------------

#!/bin/bash

clear;
#sudo docker rmi $(sudo docker images -a | grep "^<none>" | awk '{print $3}');

varUnusedImages=$(sudo docker images | grep '<none>' | awk '{print $3}' | tr '\n' ' ');
if [ -z "$varUnusedImages" ]; 
	then 
		echo "Unused Docker's Images Not Found";
	else
		sudo docker rmi $(sudo docker images | grep '<none>' | awk '{print $3}' | tr '\n' ' ');
fi;
