#----------------------------------------------------------------------------------------------------
# ▪ Nama               : Script.Docker.CreateSSLCert.LocalHost.sh
# ▪ Versi              : 1.00.0000
# ▪ Tanggal
#   ▪ Pemutakhiran     : 2024-08-30
#   ▪ Pembuatan        : 2024-08-30
# ▪ Input              : -
# ▪ Output             : -
# ▪ Deskripsi          : Script ini digunakan untuk membuat Self-Signed SSL Certificate untuk 
#                        Localhost 
# ▪ Execution Syntax   : ./BashScript/Script.Docker.CreateSSLCert.LocalHost.sh
#                        <FullPathFromRoot>/BashScript/Script.Docker.CreateSSLCert.LocalHost.sh
# ▪ Copyright          : Zheta © 2024
#----------------------------------------------------------------------------------------------------

#!/bin/bash

clear;

#openssl req -x509 -nodes -days 365 -newkey rsa:4096 -keyout ./.ProjectCore/Configuration/Docker/PHPApacheFrontEnd/System/etc/ssl/private/ERPRebornLocalhost.key -out ./.ProjectCore/Configuration/Docker/PHPApacheFrontEnd/System/etc/ssl/certs/ERPRebornLocalhost.crt -subj "/C=ID/ST=DaerahKhususJakarta/L=JakartaSelatan/O=PTQDCTechnologies/CN=localhost";

openssl req \
   -x509 \
   -nodes \
   -days 365 \
   -newkey rsa:4096 \
   -keyout ./Programming/.SystemCore/SSLCertificate/ERPRebornLocalhost.key \
   -out ./Programming/.SystemCore/SSLCertificate/ERPRebornLocalhost.crt \
   -subj "/C=ID/ST=Daerah Khusus Jakarta/L=Jakarta Selatan/O=PT QDC Technologies/CN=localhost";

#mv mycert.crt ./System/etc/ssl/certs/mycert.crt; mv mycert.key ./System/etc/ssl/private/mycert.key;




