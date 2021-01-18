#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.System.WatchDog.Docker.ContainerPHPApacheBackEnd.sh
# ▪ Versi              : 1.00.0000
# ▪ Tanggal            : 2021-01-18
# ▪ Input              : -
# ▪ Output             : -
# ▪ Deskripsi          : Script ini digunakan untuk memonitor apakah Container PHPApacheBackEnd sudah 
#                        berjalan. Bila sudah Container sudah berjalan maka dapat dijalankan blok 
#                        instruksi selanjutnya
# ▪ Execution Syntax   : ./BashScript/Script.System.WatchDog.Docker.ContainerPHPApacheBackEnd.sh
#                        <FullPathFromRoot>/BashScript/Script.System.WatchDog.Docker.ContainerPHPApacheBackEnd.sh
# ▪ Copyright          : Zheta © 2021
#----------------------------------------------------------------------------------------------------

#!/bin/bash

varScriptName='Script.System.WatchDog.Docker.ContainerPHPApacheBackEnd.sh';
varImageName='erp-reborn-phpapache-backend';
varContainerName='php-apache-backend';

echo $varScriptName" --->> Press [CTRL+C] to stop...";
while :
   do
      varSign=`sudo docker container ls | grep $varContainerName | awk '{print $2}';`;
      if [ ! -z "$varSign" ]; then 
	 echo "RUN"; date +"Date : %d/%m/%Y Time : %H.%M.%S";
         sudo docker exec -i php-apache-backend /bin/bash -c "Script.ServiceRestart.sh";
      fi
      sleep 5;
   done
