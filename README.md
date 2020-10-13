# ERPReborn

![LogoERPReborn](https://i.ibb.co/fnL12cm/Logo-Phoenix.png)

**ERP Reborn** merupakan proyek sistem Enterprise Resource Planning yang digunakan oleh PT QDC Technologies (diinisiasi sejak tahun 2020)

<h3>Langkah-Langkah Instalasi dan Cloning Repository</h3>

1. Pastikan terlebih dahulu hal-hal sebagai berikut :
   1. User yang anda gunakan saat ini sudah masuk dalam grup **SUDOER** pada perangkat komputer, karena semua perintah docker menggunakan mode **Priviliged User (menggunakan mode sudo)**
   2. Package **docker**, **docker-compose**, dan **composer** sudah terinstall pada perangkat komputer
   3. Service **docker** sudah berjalan pada perangkat komputer
   4. Perangkat komputer sudah terhubung dengan internet

2. Jalankan perintah **git clone https://github.com/ptqdctechnologies/ERPReborn ERPReborn**

3. Jalankan perintah **cd ./ERPReborn** untuk masuk kedalam folder ERPReborn

4. Jalankan perintah **./BashScript/Script.System.FirstTimeInitRun.sh**. Selama menjalankan perintah berbasis Bash Script, banyak command yang memerlukan instruksi dalam mode **Priviliged User** sehingga harus diisikan password beberapa kali dalam eksekusinya. Bash Script ini menjalankan beberapa instruksi utama diantaranya :
   1. Update Laravel Melalui Composer
   2. Rebuild Volume Docker yang terdiri atas :
      1. **volume-postgresql**
      2. **volume-mysql**
      3. **volume-redis**
      4. **volume-pgadmin4**
   3. Pull Images Docker yang terdiri atas :
      1. **postgres:latest**
      2. **php:7.3-apache**
      3. **redis:latest**
      4. **dpage/pgadmin4:latest**
      5. **minio/minio:latest**
      6. **grafana/grafana:latest**
   4. Rebuild Images Docker yang terdiri atas :
      1. **erp-reborn-postgresql** (turunan dari Image postgres:latest)
      2. **erp-reborn-phpapache-backend** (turunan dari Image php:7.3-apache)
      3. **erp-reborn-phpapache-frontend** (turunan dari Image php:7.3-apache)
   4. Rebuild Network Docker yang berupa **erpreborn_app-network** (mode bridge)
   3. Menjalankankan grup container Docker melalui docker-compose dengan memanggil images :
      1. **erp-reborn-postgresql** &rarr; membentuk container bernama **postgresql** (Docker IP : 172.28.0.2)
      2. **erp-reborn-phpapache-frontend** &rarr; membentuk container bernama **php-apache-backend** (Docker IP : 172.28.0.3)
      3. **erp-reborn-phpapache-backend** &rarr; membentuk container bernama **php-apache-frontend** (Docker IP : 172.28.0.4)
      4. **redis** &rarr; membentuk container bernama **redis** (Docker IP : 172.28.0.5)
      5. **dpage/pgadmin4** &rarr; membentuk container bernama **pgadmin4** (Docker IP : 172.28.0.6)
      6. **minio/minio** &rarr; membentuk container bernama **minio** (Docker IP : 172.28.0.7)
      6. **grafana/grafana** &rarr; membentuk container bernama **grafana** (Docker IP : 172.28.0.8)
      
5. Setelah seluruh container terbentuk maka akan berjalan service didalam docker berupa :
   1. **postgresql** &rarr; **http://localhost:15432** (NAT dari 172.28.0.2:5432)
   2. **mysql** &rarr; **http://localhost:13306** (NAT dari 172.28.0.2:3306)
   3. **apache WebBackEnd** &rarr; **http://localhost:10080** (NAT dari 172.28.0.3:80)
   4. **apache WebFrontEnd** &rarr; **http://localhost:20080** (NAT dari 172.28.0.4:80)
   5. **redis** &rarr; **http://localhost:16379** (NAT dari 172.28.0.5:6379)
   6. **pgadmin4** &rarr; **http://localhost:15050** (NAT dari 172.28.0.6:5050)
   7. **minio** &rarr; **http://localhost:19000** (NAT dari 172.28.0.7:9000)
   8. **grafana** &rarr; **http://localhost:13000** (NAT dari http://172.28.0.8:3000)
   
6. Untuk mematikan docker-composer tekan **[Ctrl+C]**

7. Untuk menjalankannnya docker-compose kembali dapat menggunakan **./BashScript/Script.Docker.Start.sh**


<h3>Lokasi Script Coding Pemrograman PHP pada Laravel :</h3>

- WebBackEnd : **ERPReborn/Programming/WebBackEnd/**
- WebFrontEnd : **ERPReborn/Programming/WebFrontEnd/**
 
