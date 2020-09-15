#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.Laravel.Upgrade7xTo8x.sh
# ▪ Versi              : 1.00.0000
# ▪ Tanggal            : 2020-07-15
# ▪ Input              : -
# ▪ Output             : -
# ▪ Deskripsi          : Script ini digunakan untuk mengupdate Laravel Framework dari 7.x ke 8.x
#                        Menggunakan Composer
# ▪ Execution Syntax   : ./BashScript/Script.Laravel.Upgrade7xTo8x.sh
#                        <FullPathFromRoot>/BashScript/Script.Laravel.Upgrade7xTo8x.sh
# ▪ Copyright          : Zheta © 2020
#----------------------------------------------------------------------------------------------------

#!/bin/bash

clear;

COMPOSER_MEMORY_LIMIT=-1 composer require laravel/framework laravel/ui illuminate/http dragonmantank/cron-expression vlucas/phpdotenv dragonmantank/cron-expression vlucas/phpdotenv;
