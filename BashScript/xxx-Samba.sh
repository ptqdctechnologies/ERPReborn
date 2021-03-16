#Hack Mengatasi abnormalitas Samba dan Supervisor (Jalanin sebelum Script.Docker.Start.sh)

#!/bin/bash

clear;

sudo docker run -t -i \
   -e "DOMAIN=QDC-FILES.QDC.CO.ID" \
   -e "DOMAINPASS=qu1d151t3chn0aNbOcPdQeRfSgThUiVjWkXlYmZ" \
   -e "DNSFORWARDER=192.168.1.1" \
   -e "NOCOMPLEXITY=true" \
   -e "INSECURELDAP=false" \
   -e "HOSTIP=172.28.0.8" \
   -v /ZhtConf/Project/ERPReborn/.ProjectCore/PermanentStorage/Samba/etc/localtime:/etc/localtime:ro \
   -v /ZhtConf/Project/ERPReborn/.ProjectCore/PermanentStorage/Samba/data:/var/lib/samba \
   -v /ZhtConf/Project/ERPReborn/.ProjectCore/PermanentStorage/Samba/config/samba:/etc/samba/external \
   -v /ZhtConf/Project/ERPReborn/.ProjectCore/Configuration/Docker/Samba/Script.ServiceRestart.sh:/usr/local/bin/Script.ServiceRestart.sh \
   erp-reborn-samba;
