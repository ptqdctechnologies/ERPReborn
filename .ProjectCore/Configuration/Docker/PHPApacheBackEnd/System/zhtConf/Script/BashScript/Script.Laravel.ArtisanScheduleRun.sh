#!/bin/bash

touch /zhtConf/log/lastSession/cron.d/Script.Laravel.ArtisanScheduleRun.sh;

clear;
/usr/local/bin/php -q -f /var/www/html/WebBackEnd/artisan schedule:run --no-ansi;
