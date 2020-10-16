#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.Docker.BuildPermanentStorage.PostgreSQL.sh
# ▪ Versi              : 1.00.0000
# ▪ Tanggal            : 2020-10-16
# ▪ Input              : -
# ▪ Output             : -
# ▪ Deskripsi          : Script ini digunakan untuk memetakan permanent storage PostgreSQL didalam 
#                        Docker
# ▪ Execution Syntax   : ./BashScript/Script.Docker.BuildPermanentStorage.PostgreSQL.sh
#                        <FullPathFromRoot>/BashScript/Script.Docker.BuildPermanentStorage.PostgreSQL.sh
# ▪ Copyright          : Zheta © 2020
#----------------------------------------------------------------------------------------------------

#!/bin/bash

clear;

mkdir -p ./../ERPReborn-PermanentStorage/PostgreSQL/var/lib/postgresql/data;
sudo chmod 700 ./../ERPReborn-PermanentStorage/PostgreSQL/var/lib/postgresql/data;
sudo chown 999 ./../ERPReborn-PermanentStorage/PostgreSQL/var/lib/postgresql/data;
