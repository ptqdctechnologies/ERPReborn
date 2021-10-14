#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.Git.UpdateLaravelVendor.sh
# ▪ Versi              : 1.00.0000
# ▪ Tanggal            : 2020-11-12
# ▪ Input              : -
# ▪ Output             : -
# ▪ Deskripsi          : Script ini digunakan untuk mengupdate Laravel Vendor melalui Composer lalu 
#                        meng-cloning Local Repository ke Git Hub
# ▪ Execution Syntax   : ./BashScript/Script.Git.UpdateLaravelVendor.sh
#                        <FullPathFromRoot>/BashScript/Script.Git.UpdateLaravelVendor.sh
# ▪ Copyright          : Zheta © 2020
#----------------------------------------------------------------------------------------------------

#!/bin/bash

clear;

./BashScript/Script.Laravel.ComposerUpdate.sh; 

sudo chown -R $(id -u):$(id -g) ./.git/objects/;

git add -A; 
git status; 
git commit -m "Update Vendor Laravel";

./BashScript/Script.Git.ForcePushLocalRepoToGitHUB.sh;
