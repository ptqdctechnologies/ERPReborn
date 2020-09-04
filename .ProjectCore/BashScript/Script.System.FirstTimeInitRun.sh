#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.System.FirstTimeInitRun.sh
# ▪ Versi              : 1.00.0001
# ▪ Tanggal            : 2020-09-04
# ▪ Input              : -
# ▪ Output             : -
# ▪ Deskripsi          : Script ini digunakan untuk menjalankan semua Script saat Inisialisasi Pertama 
#                        kalinya (Baru dicloning dari Repository)
# ▪ Execution Syntax   : ./BashScript/Script.System.FirstTimeInitRun.sh
#                        <FullPathFromRoot>/BashScript/Script.System.FirstTimeInitRun.sh
# ▪ Copyright          : Zheta © 2020
#----------------------------------------------------------------------------------------------------

#!/bin/bash

clear;

./BashScript/Script.Laravel.ComposerUpdate.sh;
./BashScript/Script.Docker.Reinitializing.LaravelFolderOwnership.sh;

./BashScript/Script.Docker.BuildVolume.All.sh;
./BashScript/Script.Docker.BuildImage.PostgreSQL.sh;
./BashScript/Script.Docker.BuildImage.PGAdmin4.sh;
./BashScript/Script.Docker.BuildImage.PHPApacheBackEnd.sh;
./BashScript/Script.Docker.BuildImage.PHPApacheFrontEnd.sh;

./BashScript/Script.Docker.BuildPermanentStorage.Minio.sh;

./BashScript/Script.Docker.Start.sh;
