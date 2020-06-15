#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.Laravel.ComposerUpdate.sh
# ▪ Versi              : 1.00.0000
# ▪ Tanggal            : 2020-06-15
# ▪ Input              : -
# ▪ Output             : -
# ▪ Deskripsi          : Script ini digunakan untuk mengupdate Laravel menggunakan Composer
# ▪ Execution Syntax   : ./BashScript/Script.Laravel.ComposerUpdate.sh
#                        <FullPathFromRoot>/BashScript/Script.Laravel.ComposerUpdate.sh
# ▪ Copyright          : Zheta © 2020
#----------------------------------------------------------------------------------------------------

#!/bin/bash

clear;

cd Programming/.LaravelCore/;
composer update;
cd -;
