#!/bin/bash

varTitle='( Samba )';

if [ ! -f /zhtConf/tmp/processSign/.initialized ]; then
   #sleep 30;
   echo -e "\e[1;33m"$varTitle" ► Samba Service Initialization...\e[0m";

   samba-tool domain passwordsettings set --complexity=off;
   samba-tool domain passwordsettings set --max-pwd-age=0;
   samba-tool domain passwordsettings set --history-length=0;
   samba-tool domain passwordsettings set --min-pwd-age=0;
   samba-tool domain passwordsettings set --min-pwd-length=4;

   #samba-tool user add teguh.pratama teguhpratama789;

   touch /zhtConf/tmp/processSign/.initialized;
fi
