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
      2. **php:8.1-apache**
      3. **redis:latest**
      4. **nowsci/samba-domain:latest**
      5. **minio/minio:latest**
      6. **grafana/grafana:latest**
      7. **dpage/pgadmin4:latest**
   4. Rebuild Images Docker yang terdiri atas :
      1. **erp-reborn-postgresql** (turunan dari Image postgres:latest)
      2. **erp-reborn-phpapache-backend** (turunan dari Image php:8.1-apache)
      3. **erp-reborn-phpapache-frontend** (turunan dari Image php:8.1-apache)
      4. **erp-reborn-samba** (turunan dari Image nowsci/samba-domain:latest)
      5. **erp-reborn-minio** (turunan dari Image minio/minio:latest)
      6. **erp-reborn-devtools-pgadmin4** (turunan dari Image dpage/pgadmin4:latest)
      7. **erp-reborn-devtools-openproject** (turunan dari Image openproject/community:12)
   5. Rebuild Network Docker yang berupa **erpreborn_app-network** (mode bridge)
   6. Menjalankankan grup container Docker melalui docker-compose dengan memanggil images :
      1. **erp-reborn-postgresql** &rarr; membentuk container bernama **postgresql** (Docker IP : 172.28.0.2)
      2. **erp-reborn-phpapache-frontend** &rarr; membentuk container bernama **php-apache-backend** (Docker IP : 172.28.0.3)
      3. **erp-reborn-phpapache-backend** &rarr; membentuk container bernama **php-apache-frontend** (Docker IP : 172.28.0.4)
      4. **redis** &rarr; membentuk container bernama **redis** (Docker IP : 172.28.0.5)
      5. **erp-reborn-samba** &rarr; membentuk container bernama **samba** (Docker IP : 172.28.0.7)
      6. **grafana/grafana** &rarr; membentuk container bernama **grafana** (Docker IP : 172.28.0.8)
      7. **erp-reborn-minio** &rarr; membentuk container bernama **minio-node1** (Docker IP : 172.28.0.9), **minio-node2** (Docker IP : 172.28.0.7.10), **minio-node3** (Docker IP : 172.28.0.11), **minio-node4** (Docker IP : 172.28.0.12)
      8. **dpage/pgadmin4** &rarr; membentuk container bernama **pgadmin4** (Docker IP : 172.28.0.100)
      9. **openproject/community** &rarr; membentuk container bernama **openproject** (Docker IP : 172.28.0.101)
      
5. Setelah seluruh container terbentuk maka akan berjalan service didalam docker berupa :
   1. **postgresql** &rarr; **http://localhost:15432** (NAT dari 172.28.0.2:5432)
   2. **mysql** &rarr; **http://localhost:13306** (NAT dari 172.28.0.2:3306)
   3. **apache WebBackEnd** &rarr; **http://localhost:10080** (NAT dari 172.28.0.3:80)
   4. **apache WebFrontEnd** &rarr; **http://localhost:20080** (NAT dari 172.28.0.4:80)
   5. **redis** &rarr; **http://localhost:16379** (NAT dari 172.28.0.5:6379)
   7. **samba** &rarr; **http://localhost:10137** (NAT dari 172.28.0.7:137), **http://localhost:10138** (NAT dari 172.28.0.7:138), **http://localhost:10139** (NAT dari 172.28.0.7:139), **http://localhost:10445** (NAT dari 172.28.0.7:445)
   6. **minio** &rarr; **http://localhost:19000** (NAT dari 172.28.0.9:9000), **http://localhost:29000** (NAT dari 172.28.0.10:9000), **http://localhost:39000** (NAT dari 172.28.0.11:9000), **http://localhost:49000** (NAT dari 172.28.0.12:9000)
   8. **grafana** &rarr; **http://localhost:13000** (NAT dari http://172.28.0.8:3000)
   9. **pgadmin4** &rarr; **http://localhost:15050** (NAT dari 172.28.0.100:5050)
   9. **openproject** &rarr; **http://localhost:30080** (NAT dari 172.28.0.101:80)
   
6. Untuk mematikan docker-composer tekan **[Ctrl+C]**

7. Untuk menjalankannnya docker-compose kembali dapat menggunakan **./BashScript/Script.Docker.Start.sh**

<h3>Konfigurasi</h3>

1. Konfigurasi Laravel WebBackEnd disimpan pada :
   - <BASE DIRECTORY>/Programming/WebBackEnd/.env
   - <BASE DIRECTORY>/Programming/WebBackEnd/config/Application/BackEnd/environment.txt
2. Konfigurasi Laravel WebFrontEnd disimpan pada :
   - <BASE DIRECTORY>/Programming/WebFrontEnd/.env

<h3>Lokasi Script Coding Pemrograman PHP pada Laravel :</h3>

   - WebBackEnd : **ERPReborn/Programming/WebBackEnd/**
   - WebFrontEnd : **ERPReborn/Programming/WebFrontEnd/**
 
<h3>Development Team</h3>
   
![Team-ProjectManager](https://i.ibb.co/LdBfhDH/Teguh-Pratama-Januzir-S.jpg)
**Teguh Pratama Januzir S** | <em>Project Manager</em>
   
![Team-ProjectConsultant](https://i.ibb.co/f48Hppb/Team-Bherly-Novrandy.jpg)
**Bherly Novrandy** | <em>Project Consultant</em>

![Team-FrontEndAndBackEndDeveloperCoordinator](https://i.ibb.co/WtK1wky/Team-Icha-Mailinda.jpg)
**Icha Mailinda** | <em>FrontEnd And BackEnd Developer Coordinator</em>

![Team-FrontEndDeveloper](https://i.ibb.co/RyRHf8f/Team-Suyanto.jpg)
**Suyanto** | <em>FrontEnd Developer</em>

![Team-BackEndDeveloper](https://i.ibb.co/ZJ6J72b/Team-Aldi-Mulyadi.jpg)
**Aldi Mulyadi** | <em>BackEnd Developer</em>

![Team-DatabaseEngineer](https://i.ibb.co/LdBfhDH/Teguh-Pratama-Januzir-S.jpg)
**Teguh Pratama Januzir S** | <em>Database Engineer</em>

![Team-SystemAdministrator](https://i.ibb.co/zn7vX0K/Team-Zainudin-Anwar.jpg)
**Zainudin Anwar** | <em>System Administrator</em>
