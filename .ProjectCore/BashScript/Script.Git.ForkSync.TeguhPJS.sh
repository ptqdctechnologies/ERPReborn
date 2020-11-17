#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.Git.ForkSync.TeguhPJS.sh
# ▪ Versi              : 1.00.0003
# ▪ Tanggal            : 2020-11-17
# ▪ Input              : -
# ▪ Output             : -
# ▪ Deskripsi          : Script ini digunakan untuk menyinkronisasikan Fork Repository GitHub dengan
#                        Repository GitHub Utama
# ▪ Execution Syntax   : ./BashScript/Script.Git.ForkSync.TeguhPJS.sh
#                        <FullPathFromRoot>/BashScript/Script.Git.ForkSync.TeguhPJS.sh
# ▪ Copyright          : Zheta © 2020
#----------------------------------------------------------------------------------------------------

#!/bin/bash

varGitHubMainSite='https://github.com/ptqdctechnologies/ERPReborn';
varGitHubForkSite='https://github.com/teguhpjs/ERPReborn';
varDateTime=`date '+%Y-%m-%d_%H-%M-%S'`;

clear;

cp ./.ProjectCore/BashScript/Script.Git.ForkSync.TeguhPJS.sh ./../Script.Git.ForkSync.TeguhPJS.sh;
cd ..;
sudo tar czvf ./ERPReborn-BackUp-BeforeForkSync-$varDateTime.tgz ./ERPReborn;
git clone $varGitHubForkSite;
cd ./ERPReborn/;
git remote add upstream $varGitHubMainSite;
git fetch upstream;
git pull upstream master;
git push origin master;
sudo rm -rf ./../Script.Git.ForkSync.TeguhPJS.sh;

cd .;
./BashScript/Script.Laravel.ComposerUpdate.sh;
