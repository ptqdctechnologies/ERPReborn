#!/bin/bash

if [ ! -f .initialized ]; then
   #sleep 30;
   echo "Initializing MariaDB (MySQL) on PostgreSQL Container";
   #service postgresql restart;
   service mysql restart;
   touch .initialized;
fi

#update-rc.d mysql disable;
#sleep 10;
#varStatus=`service mysql status | awk '{print $3}'`;
#if [ "$varStatus" = "stopped.." ]; then
#   service mysql start;
#fi
