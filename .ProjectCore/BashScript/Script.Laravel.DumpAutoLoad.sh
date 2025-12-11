#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.Laravel.DumpAutoLoad.sh
# ▪ Versi              : 1.00.0003
# ▪ Tanggal Update     : 2025-09-16
# ▪ Tanggal            : 2020-01-21
# ▪ Input              : -
# ▪ Output             : -
# ▪ Deskripsi          : Script ini digunakan untuk mengupdate Laravel menggunakan Composer
# ▪ Execution Syntax   : ./BashScript/Script.Laravel.DumpAutoLoad.sh
#                        <FullPathFromRoot>/BashScript/Script.Laravel.DumpAutoLoad.sh
# ▪ Copyright          : Zheta © 2020-2025
#----------------------------------------------------------------------------------------------------

#!/bin/bash

clear;

#sudo docker exec -it php-apache-backend /bin/bash -c "cd /var/www/html/WebBackEnd; php artisan key:generate; php artisan config:clear; php artisan route:clear; php artisan cache:clear; composer dump-autoload; cd -; ";
#sudo docker exec -it php-apache-frontend /bin/bash -c "cd /var/www/html/WebFrontEnd; php artisan key:generate; php artisan config:clear; php artisan route:clear; php artisan cache:clear; composer dump-autoload; cd -; ";

#sudo docker exec -it php-apache-backend /bin/bash -c "cd /var/www/html/WebBackEnd; php artisan config:clear; php artisan route:clear; php artisan cache:clear; composer dump-autoload; cd -; ";
sudo docker exec -it php-apache-backend /bin/bash -c "cd /var/www/html/WebBackEnd; php artisan config:clear; php artisan route:clear; php artisan cache:clear; composer dump-autoload; php artisan config:cache; cd -; ";
#sudo docker exec -it php-apache-frontend /bin/bash -c "cd /var/www/html/WebFrontEnd; php artisan config:clear; php artisan route:clear; php artisan cache:clear; composer dump-autoload; cd -; ";
sudo docker exec -it php-apache-frontend /bin/bash -c "cd /var/www/html/WebFrontEnd; php artisan config:clear; php artisan route:clear; php artisan cache:clear; composer dump-autoload; php artisan config:cache; cd -; ";

sudo docker exec -it php-backend-frankenPHP /bin/bash -c "cd /var/www/html/WebBackEnd; php artisan config:clear; php artisan route:clear; php artisan cache:clear; composer dump-autoload; php artisan config:cache; php artisan route:cache; cd -; ";

#php artisan route:cache
#php artisan config:cache
#php artisan optimize

#cd ./Programming/WebBackEnd;
#sudo php artisan route:clear;
#sudo php artisan config:clear;
#sudo php artisan cache:clear;
#composer dump-autoload;
#cd -;

#cd ./Programming/WebFrontEnd; 
#sudo php artisan route:clear;
#sudo php artisan config:clear;
#sudo php artisan cache:clear;
#composer dump-autoload; 
#cd -;
