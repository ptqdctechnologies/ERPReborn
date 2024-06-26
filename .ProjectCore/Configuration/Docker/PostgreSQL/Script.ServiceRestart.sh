#!/bin/bash

varTitle='( PostgreSQL )';

if [ ! -f /zhtConf/tmp/processSign/.initialized ]; then
   #sleep 30;
   echo -e "\e[1;33m"$varTitle" ► MariaDB (MySQL) Service Initialization...\e[0m";
   #service postgresql restart;
   #service mysql restart;
   
   if [ ! -f /var/lib/mysql/mysql/servers.frm ]; then
      mariadb-install-db --user=mysql --basedir=/usr --datadir=/var/lib/mysql
   fi
   /etc/init.d/mariadb restart;
   touch /zhtConf/tmp/processSign/.initialized;
fi

#update-rc.d mysql disable;
#sleep 10;
#varStatus=`service mysql status | awk '{print $3}'`;
#if [ "$varStatus" = "stopped.." ]; then
#   service mysql start;
#fi
