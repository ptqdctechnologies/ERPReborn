#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.Docker.EnterToContainer.sh
# ▪ Versi              : 1.00.0000
# ▪ Tanggal            : 2020-06-11
# ▪ Input              : -
# ▪ Output             : -
# ▪ Deskripsi          : Script ini digunakan untuk mengakses Container yang sedang berjalan pada 
#                        Docker
# ▪ Execution Syntax   : ./BashScript/Script.Docker.EnterToContainer.sh
#                        <FullPathFromRoot>/BashScript/Script.Docker.EnterToContainer.sh
# ▪ Copyright          : Zheta © 2020
#----------------------------------------------------------------------------------------------------

#!/bin/bash

clear;

if [ $# -eq 0 ]
   then
      echo "Available Container Name : ";
      sudo docker container ls | cut -c 169-200 | grep -v NAMES | awk '{print "   -> " $1}';
      echo "Please type selected container name : ";
      read varContainerName;
   else
      varContainerName=$1;
fi

sudo docker exec -it $varContainerName /bin/bash;
