#!/bin/bash

if [ ! -f .initialized ]; then
   #sleep 30;
   echo "Initializing Cron on php-apache-backend Container";
   /etc/init.d/cron restart;
   
   varFailedSign=`service cron status | grep 'cron is not running';`;
   if [ ! -z "$varFailedSign" ]; then
      rm .initialized;
   else
      touch .initialized;
   fi
fi
