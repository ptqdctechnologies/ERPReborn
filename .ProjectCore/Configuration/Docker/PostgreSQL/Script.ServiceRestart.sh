#!/bin/bash

if [ ! -f .initialized ]; then
   echo "Initializing PostgreSQL Container";
   service mysql start;
   touch .initialized;
fi
#update-rc.d mysql disable;
#sleep 10;
#varStatus=`service mysql status | awk '{print $3}'`;
#if [ "$varStatus" = "stopped.." ]; then
#   service mysql start;
#fi
