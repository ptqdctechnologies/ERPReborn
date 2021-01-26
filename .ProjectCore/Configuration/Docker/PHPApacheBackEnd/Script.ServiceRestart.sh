#!/bin/bash

varTitle='( PHPApacheBackEnd )';

if [ ! -f /zhtConf/tmp/processSign/.initialized ]; then
   #sleep 30;
   echo -e "\e[1;33m"$varTitle" ► Cron Service Initialization...\e[0m";
      /etc/init.d/cron restart;
   echo -e "\e[1;33m"$varTitle" ► PHP-Artisan Optimization...\e[0m";
      cd /var/www/html/WebBackEnd/;
      php artisan optimize;
      cd -;
   
   varFailedSign=`service cron status | grep 'cron is not running';`;
   if [ ! -z "$varFailedSign" ]; then
      rm /zhtConf/tmp/processSign/.initialized;
   else
      touch /zhtConf/tmp/processSign/.initialized;
   fi
fi
