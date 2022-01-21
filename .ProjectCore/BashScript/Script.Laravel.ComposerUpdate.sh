#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.Laravel.ComposerUpdate.sh
# ▪ Versi              : 1.00.0001
# ▪ Tanggal            : 2022-01-21
# ▪ Input              : -
# ▪ Output             : -
# ▪ Deskripsi          : Script ini digunakan untuk mengupdate Laravel menggunakan Composer
# ▪ Execution Syntax   : ./BashScript/Script.Laravel.ComposerUpdate.sh
#                        <FullPathFromRoot>/BashScript/Script.Laravel.ComposerUpdate.sh
# ▪ Copyright          : Zheta © 2020-2022
#----------------------------------------------------------------------------------------------------

#!/bin/bash

clear;

sudo docker exec -it php-apache-backend /bin/bash -c "composer self-update; cd /var/www/html/WebBackEnd; composer update; cd -; ";
sudo docker exec -it php-apache-frontend /bin/bash -c "composer self-update; cd /var/www/html/WebFrontEnd; composer update; cd -; ";

#cd Programming/WebBackEnd/;
#composer update;
#cd -;

#cd Programming/WebFrontEnd/;
#composer update;
#cd -;
