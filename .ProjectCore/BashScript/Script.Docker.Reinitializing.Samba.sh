#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.Docker.Reinitializing.Samba.sh
# ▪ Versi              : 1.00.0000
# ▪ Tanggal            : 2020-12-17
# ▪ Input              : -
# ▪ Output             : -
# ▪ Deskripsi          : Script ini digunakan untuk menginisialisasi ulang Samba pada Container
#                        samba
# ▪ Execution Syntax   : ./BashScript/Script.Docker.Reinitializing.Samba.sh
#                        <FullPathFromRoot>/BashScript/Script.Docker.Reinitializing.Samba.sh
# ▪ Copyright          : Zheta © 2020
#----------------------------------------------------------------------------------------------------

#!/bin/bash

clear;

varCmd='sudo docker exec -it samba /bin/bash -c';

varCmdContainer='samba-tool';

#+-------------------------------------------------------------------------------------------------+
#| Main Configuration                                                                              |
#+-------------------------------------------------------------------------------------------------+
sudo cp ./.ProjectCore/Configuration/Docker/Samba/smb.conf ./../ERPReborn-PermanentStorage/Samba/config/samba/smb.conf;

#+-------------------------------------------------------------------------------------------------+
#| User Configuration                                                                              |
#+-------------------------------------------------------------------------------------------------+
echo "   ---> User Reconfiguration";
$varCmd "$varCmdContainer user add teguh.pratama teguhpratama789" &

echo "   ---> Configuration Load";
$varCmd "smbcontrol all reload-config;";
