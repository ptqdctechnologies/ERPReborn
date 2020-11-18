#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.Git.ForkSync.IchaMailinda.sh
# ▪ Versi              : 1.00.0002
# ▪ Tanggal            : 2020-06-18
# ▪ Input              : -
# ▪ Output             : -
# ▪ Deskripsi          : Script ini digunakan untuk menyinkronisasikan Fork Repository GitHub dengan
#                        Repository GitHub Utama
# ▪ Execution Syntax   : ./BashScript/Script.Git.ForkSync.IchaMailinda.sh
#                        <FullPathFromRoot>/BashScript/Script.Git.ForkSync.IchaMailinda.sh
# ▪ Copyright          : Zheta © 2020
#----------------------------------------------------------------------------------------------------

#!/bin/bash

varGitHubMainSite='https://github.com/ptqdctechnologies/ERPReborn';
varGitHubForkSite='https://github.com/teguhpjs/ERPReborn';
varDateTime=`date '+%Y-%m-%d_%H-%M-%S'`;

clear;

cp ./.ProjectCore/BashScript/Script.Git.ForkSync.IchaMailinda.sh ./../Script.Git.ForkSync.IchaMailinda.sh;
cd ..;
sudo mv ./ERPReborn ./ERPReborn-BeforeForkSync-$varDateTime;
sudo tar czvf ERPReborn-BackUp-BeforeForkSync-$varDateTime.tgz ./ERPReborn-BeforeForkSync-$varDateTime;
sudo rm -rf ./ERPReborn-BeforeForkSync-$varDateTime;

git clone $varGitHubForkSite;
cd ./ERPReborn/;
git remote add upstream $varGitHubMainSite;
git fetch upstream;
git pull upstream master;
git push origin master;
sudo rm -rf ./../Script.Git.ForkSync.IchaMailinda.sh;

cd .;
./BashScript/Script.Laravel.ComposerUpdate.sh;
