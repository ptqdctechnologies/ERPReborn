#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.Laravel.DumpAutoLoad.sh
# ▪ Versi              : 1.00.0001
# ▪ Tanggal            : 2020-07-22
# ▪ Input              : -
# ▪ Output             : -
# ▪ Deskripsi          : Script ini digunakan untuk mengupdate Laravel menggunakan Composer
# ▪ Execution Syntax   : ./BashScript/Script.Laravel.DumpAutoLoad.sh
#                        <FullPathFromRoot>/BashScript/Script.Laravel.DumpAutoLoad.sh
# ▪ Copyright          : Zheta © 2020
#----------------------------------------------------------------------------------------------------

#!/bin/bash

clear;

cd ./Programming/WebBackEnd;
sudo php artisan route:clear;
sudo php artisan config:clear;
sudo php artisan cache:clear;
composer dump-autoload;
cd -;

cd ./Programming/WebFrontEnd; 
sudo php artisan route:clear;
sudo php artisan config:clear;
sudo php artisan cache:clear;
composer dump-autoload; 
cd -;
