#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.Laravel.ComposerUpdate.sh
# ▪ Versi              : 1.00.0002
# ▪ Tanggal            : 2023-03-17
# ▪ Input              : -
# ▪ Output             : -
# ▪ Deskripsi          : Script ini digunakan untuk mengupdate Laravel menggunakan Composer
# ▪ Execution Syntax   : ./BashScript/Script.Laravel.ComposerUpdate.sh
#                        <FullPathFromRoot>/BashScript/Script.Laravel.ComposerUpdate.sh
# ▪ Copyright          : Zheta © 2020 - 2023
#----------------------------------------------------------------------------------------------------

#!/bin/bash

clear;

sudo docker exec -it php-apache-backend /bin/bash -c "composer self-update; cd /var/www/html/WebBackEnd; git config --global --add safe.directory '*'; composer update; cd -; ";
sudo docker exec -it php-apache-frontend /bin/bash -c "composer self-update; cd /var/www/html/WebFrontEnd; git config --global --add safe.directory '*'; composer update; cd -; ";

./BashScript/Script.Docker.Reinitializing.LaravelFolderOwnership.sh;

#cd Programming/WebBackEnd/;
#composer update;
#cd -;

#cd Programming/WebFrontEnd/;
#composer update;
#cd -;
