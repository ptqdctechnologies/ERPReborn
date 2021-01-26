#!/bin/bash

varTitle='( PostgreSQL )';

if [ ! -f /zhtConf/tmp/processSign/.initialized ]; then
   #sleep 30;
   echo -e "\e[1;33m"$varTitle" ► MariaDB (MySQL) Service Initialization...\e[0m";
   #service postgresql restart;
   service mysql restart;
   touch /zhtConf/tmp/processSign/.initialized;
fi

#update-rc.d mysql disable;
#sleep 10;
#varStatus=`service mysql status | awk '{print $3}'`;
#if [ "$varStatus" = "stopped.." ]; then
#   service mysql start;
#fi
