#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.System.WatchDog.Docker.ContainerSamba.sh
# ▪ Versi              : 1.00.0000
# ▪ Tanggal            : 2020-12-16
# ▪ Input              : -
# ▪ Output             : -
# ▪ Deskripsi          : Script ini digunakan untuk memonitor apakah Container Samba sudah 
#                        berjalan. Bila sudah Container sudah berjalan maka dapat dijalankan blok 
#                        instruksi selanjutnya
# ▪ Execution Syntax   : ./BashScript/Script.System.WatchDog.Docker.ContainerSamba.sh
#                        <FullPathFromRoot>/BashScript/Script.System.WatchDog.Docker.ContainerSamba.sh
# ▪ Copyright          : Zheta © 2020
#----------------------------------------------------------------------------------------------------

#!/bin/bash

varScriptName='Script.System.WatchDog.Docker.ContainerSamba.sh';
varContainerName='erp-reborn-samba';

echo $varScriptName" --->> Press [CTRL+C] to stop...";
while :
   do
      varSign=`sudo docker container ls | grep $varContainerName | awk '{print $2}';`;
      if [ ! -z "$varSign" ]; then 
         sudo docker exec -i samba /bin/bash -c "Script.ServiceRestart.sh";
      fi
      sleep 5;
   done




