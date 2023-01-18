#!/bin/bash

varTitle='( Samba )';

if [ ! -f /zhtConf/tmp/processSign/.initialized ]; then
   touch /zhtConf/tmp/processSign/.initialized;
   #sleep 30;
   
   echo -e "\e[1;33m"$varTitle" ► Samba Service Initialization...\e[0m";
   samba-tool domain passwordsettings set --complexity=off;
   samba-tool domain passwordsettings set --max-pwd-age=0;
   samba-tool domain passwordsettings set --history-length=0;
   samba-tool domain passwordsettings set --min-pwd-age=0;
   samba-tool domain passwordsettings set --min-pwd-length=4;

   echo -e "\e[1;33m"$varTitle" ► Samba Users Recreation...\e[0m";
   samba-tool user delete sysadmin;
   samba-tool user add sysadmin sysadmin1234;
   samba-tool user delete teguh.pratama;
   samba-tool user add teguh.pratama teguhpratama1234;
   samba-tool user delete icha.mailinda;
   samba-tool user add icha.mailinda icha1234;
   samba-tool user delete suyanto;
   samba-tool user add suyanto suyanto1234;
   samba-tool user delete aldi.mulyadi;
   samba-tool user add aldi.mulyadi aldi1234;
 
   samba-tool user delete kurnia;
   samba-tool user add kurnia kurnia1234;
   samba-tool user delete eka.bagus;
   samba-tool user add eka.bagus eka.bagus1234;

fi
