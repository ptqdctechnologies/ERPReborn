#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.System.FirstTimeInitRun.sh
# ▪ Versi              : 1.00.0000
# ▪ Tanggal            : 2020-06-17
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
./BashScript/Script.Docker.BuildVolume.All.sh;
./BashScript/Script.Docker.Start.sh;
