#Hack Mengatasi abnormalitas Samba dan Supervisor (Jalanin sebelum Script.Docker.Start.sh)

#!/bin/bash

clear;

sudo docker run -t -i -v /ZhtConf/Project/ERPReborn/.ProjectCore/PermanentStorage/Samba/etc/localtime:/etc/localtime:ro -v /ZhtConf/Project/ERPReborn/.ProjectCore/PermanentStorage/Samba/data:/var/lib/samba -v /ZhtConf/Project/ERPReborn/.ProjectCore/PermanentStorage/Samba/config/samba:/etc/samba/external -v /ZhtConf/Project/ERPReborn/.ProjectCore/Configuration/Docker/Samba/Script.ServiceRestart.sh:/usr/local/bin/Script.ServiceRestart.sh erp-reborn-samba;
