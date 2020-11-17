#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.Git.ForkSync.AldiMulyadi.sh
# ▪ Versi              : 1.00.0000
# ▪ Tanggal            : 2020-11-17
# ▪ Input              : -
# ▪ Output             : -
# ▪ Deskripsi          : Script ini digunakan untuk menyinkronisasikan Fork Repository GitHub dengan
#                        Repository GitHub Utama
# ▪ Execution Syntax   : ./BashScript/Script.Git.ForkSync.AldiMulyadi.sh
#                        <FullPathFromRoot>/BashScript/Script.Git.ForkSync.AldiMulyadi.sh
# ▪ Copyright          : Zheta © 2020
#----------------------------------------------------------------------------------------------------

#!/bin/bash

varGitHubMainSite='https://github.com/ptqdctechnologies/ERPReborn';
varGitHubForkSite='https://github.com/aldimulyadi11/ERPReborn';
varDateTime=`date '+%Y-%m-%d_%H-%M-%S'`;

clear;

cp ./.ProjectCore/BashScript/Script.Git.ForkSync.AldiMulyadi.sh ./../Script.Git.ForkSync.AldiMulyadi.sh;
cd ..;
sudo mv ./ERPReborn ./ERPReborn-$varDateTime;
git clone $varGitHubForkSite;
cd ./ERPReborn/;
git remote add upstream $varGitHubMainSite;
git fetch upstream;
git pull upstream master;
git push origin master;
sudo rm -rf ./../Script.Git.ForkSync.AldiMulyadi.sh;

cd .;
./BashScript/Script.Laravel.ComposerUpdate.sh;
