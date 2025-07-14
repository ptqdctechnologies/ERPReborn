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

   samba-tool user delete icha;
   samba-tool user add icha icha1234;

   samba-tool user delete suyanto;
   samba-tool user add suyanto suyanto1234;

   samba-tool user delete aldi.mulyadi;
   samba-tool user add aldi.mulyadi aldi1234;
   
   samba-tool user delete budianto;
   samba-tool user add budianto budianto1234;
 
   samba-tool user delete kurnia;
   samba-tool user add kurnia kurnia1234;

   samba-tool user delete eka.bagus;
   samba-tool user add eka.bagus eka.bagus1234;

   samba-tool user delete eka.purwanti;
   samba-tool user add eka.purwanti eka.purwanti1234;

   samba-tool user delete febriyanto;
   samba-tool user add febriyanto febriyanto1234;

   samba-tool user delete ferdian;
   samba-tool user add ferdian ferdian1234;

   samba-tool user delete redi.subekti;
   samba-tool user add redi.subekti redi1234;
 
   samba-tool user delete restu;
   samba-tool user add restu restu1234;

   samba-tool user delete seftiyan;
   samba-tool user add seftiyan seftiyan1234;

   samba-tool user delete sufie;
   samba-tool user add sufie sufie1234;

   samba-tool user delete wardah;
   samba-tool user add wardah wardah1234;

   samba-tool user delete zainudin.anwar;
   samba-tool user add zainudin.anwar anwar1234;

   samba-tool user delete faiz;
   samba-tool user add faiz faiz1234;

   samba-tool user delete wisnu.trenggono;
   samba-tool user add wisnu.trenggono wisnu1234;

   samba-tool user delete adhe.kurniawan;
   samba-tool user add adhe.kurniawan adhe.kurniawan1234;
   
   samba-tool user delete eka.kurniawan;
   samba-tool user add  eka.kurniawan eka.kurniawan1234;

   samba-tool user delete eka.purwanti;
   samba-tool user add eka.purwanti eka.purwanti1234;

   samba-tool user delete fikri;
   samba-tool user add fikri fikri1234;

   samba-tool user delete irma.maulidawati;
   samba-tool user add irma.maulidawati irma.maulidawati1234;

   samba-tool user delete jimmy;
   samba-tool user add jimmy jimmy1234;

   samba-tool user delete marungkil;
   samba-tool user add marungkil marungkil1234;

   samba-tool user delete marbun;
   samba-tool user add marbun marbun1234;

fi
