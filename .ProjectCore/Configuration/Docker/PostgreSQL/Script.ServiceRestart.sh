#!/bin/bash

if [ ! -f /zhtConf/tmp/processSign/.initialized ]; then
   #sleep 30;
   echo "Initializing MariaDB (MySQL) on PostgreSQL Container";
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
