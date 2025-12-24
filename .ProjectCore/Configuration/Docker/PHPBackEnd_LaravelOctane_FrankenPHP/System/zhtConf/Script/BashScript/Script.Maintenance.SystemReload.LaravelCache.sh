#!/bin/bash

clear;
cd /var/www/html/WebBackEnd;
php artisan config:clear;
php artisan route:clear;
php artisan cache:clear;
php artisan view:clear;
php artisan event:clear;
php artisan config:cache;
php artisan route:cache;
php artisan view:cache;
php artisan event:cache;
php artisan optimize;
cd -;
