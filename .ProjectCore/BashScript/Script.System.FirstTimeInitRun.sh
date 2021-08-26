#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.System.FirstTimeInitRun.sh
# ▪ Versi              : 1.00.0006
# ▪ Tanggal            : 2021-08-25
# ▪ Input              : -
# ▪ Output             : -
# ▪ Deskripsi          : Script ini digunakan untuk menjalankan semua Script saat Inisialisasi Pertama 
#                        kalinya (Baru dicloning dari Repository)
# ▪ Execution Syntax   : ./BashScript/Script.System.FirstTimeInitRun.sh
#                        <FullPathFromRoot>/BashScript/Script.System.FirstTimeInitRun.sh
# ▪ Copyright          : Zheta © 2020, 2021
#----------------------------------------------------------------------------------------------------

#!/bin/bash

clear;

./BashScript/Script.Laravel.ComposerUpdate.sh;
./BashScript/Script.Docker.Reinitializing.LaravelFolderOwnership.sh;

./BashScript/Script.Docker.BuildPermanentStorage.Grafana.sh;
./BashScript/Script.Docker.BuildPermanentStorage.LocalStorage.sh;
./BashScript/Script.Docker.BuildPermanentStorage.MinIO.sh;
./BashScript/Script.Docker.BuildPermanentStorage.PostgreSQL.sh;
./BashScript/Script.Docker.BuildPermanentStorage.PHPApacheBackEnd.sh;
./BashScript/Script.Docker.BuildPermanentStorage.Samba.sh;

./BashScript/Script.Docker.BuildVolume.All.sh;

./BashScript/Script.Docker.BuildImage.MinIO.sh;
./BashScript/Script.Docker.BuildImage.PostgreSQL.sh;
./BashScript/Script.Docker.BuildImage.PGAdmin4.sh;
./BashScript/Script.Docker.BuildImage.PHPApacheBackEnd.sh;
./BashScript/Script.Docker.BuildImage.PHPApacheFrontEnd.sh;
./BashScript/Script.Docker.BuildImage.Samba.sh;

./BashScript/Script.Docker.Start.sh;
