#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.System.WatchDog.Docker.ContainerPostgreSQL.sh
# ▪ Versi              : 1.00.0002
# ▪ Tanggal            : 2021-01-18
# ▪ Input              : -
# ▪ Output             : -
# ▪ Deskripsi          : Script ini digunakan untuk memonitor apakah Container PostgreSQL sudah 
#                        berjalan. Bila sudah Container sudah berjalan maka dapat dijalankan blok 
#                        instruksi selanjutnya
# ▪ Execution Syntax   : ./BashScript/Script.System.WatchDog.Docker.ContainerPostgreSQL.sh
#                        <FullPathFromRoot>/BashScript/Script.System.WatchDog.Docker.ContainerPostgreSQL.sh
# ▪ Copyright          : Zheta © 2020, 2021
#----------------------------------------------------------------------------------------------------

#!/bin/bash

varScriptName='Script.System.WatchDog.Docker.ContainerPostgreSQL.sh';
varImageName='erp-reborn-postgresql';
varContainerName='postgresql';

echo $varScriptName" --->> Press [CTRL+C] to stop...";
while :
   do
      varSign=`sudo docker container ls | grep $varContainerName | awk '{print $2}';`;
      if [ ! -z "$varSign" ]; then 
         #echo "RUN"; date +"Date : %d/%m/%Y Time : %H.%M.%S";
         sudo docker exec -i $varContainerName /bin/bash -c "Script.ServiceRestart.sh";
      fi
      sleep 5;
   done




