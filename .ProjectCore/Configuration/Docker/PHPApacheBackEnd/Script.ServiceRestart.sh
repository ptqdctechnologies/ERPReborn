#!/bin/bash

if [ ! -f /zhtConf/tmp/processSign/.initialized ]; then
   #sleep 30;
   echo "Initializing Cron on php-apache-backend Container";
      /etc/init.d/cron restart;
   echo "Optimizing PHP-Artisan on php-apache-backend Container";
      cd WebBackEnd/;
      php artisan optimize;
      cd -;
   
   varFailedSign=`service cron status | grep 'cron is not running';`;
   if [ ! -z "$varFailedSign" ]; then
      rm /zhtConf/tmp/processSign/.initialized;
   else
      touch /zhtConf/tmp/processSign/.initialized;
   fi
fi
