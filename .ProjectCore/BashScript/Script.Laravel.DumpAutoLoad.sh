#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.Laravel.DumpAutoLoad.sh
# ▪ Versi              : 1.00.0000
# ▪ Tanggal            : 2020-07-08
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
composer dump-autoload;
cd -;

cd ./Programming/WebFrontEnd; 
composer dump-autoload; 
cd -;
