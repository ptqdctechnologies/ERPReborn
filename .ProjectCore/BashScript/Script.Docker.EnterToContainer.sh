#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.Docker.EnterToContainer.sh
# ▪ Versi              : 1.00.0001
# ▪ Tanggal            : 2021-01-19
# ▪ Input              : -
# ▪ Output             : -
# ▪ Deskripsi          : Script ini digunakan untuk mengakses Container yang sedang berjalan pada 
#                        Docker
# ▪ Execution Syntax   : ./BashScript/Script.Docker.EnterToContainer.sh
#                        <FullPathFromRoot>/BashScript/Script.Docker.EnterToContainer.sh
# ▪ Copyright          : Zheta © 2020, 2021
#----------------------------------------------------------------------------------------------------

#!/bin/bash

clear;

if [ $# -eq 0 ]
   then
      echo "Available Container Name : ";
      sudo docker ps --format '{{.Names}}' | grep -v NAMES | awk '{print "   -> " $1}';
      echo "Please type selected container name : ";
      read varContainerName;
   else
      varContainerName=$1;
fi

sudo docker exec -it $varContainerName /bin/bash;
