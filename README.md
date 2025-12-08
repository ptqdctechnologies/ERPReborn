# ERPReborn

![LogoERPReborn](https://i.ibb.co/fnL12cm/Logo-Phoenix.png)


```diff
It's not just an ordinary ERP
```

**ERP Reborn** merupakan proyek sistem Enterprise Resource Planning yang digunakan oleh PT QDC Technologies (diinisiasi sejak akhir tahun 2020)

```diff
Main Features :
1. Multiple Users
2. Multiple Companies, Regions, & Branches
3. Multiple Base Currencies & Transaction Currencies
4. Multiple Underlying Document References
5. Convert File Attachments To Thumbnails Automatically
6. SQL Injection Threat Prevention For Some Implemented APIs
```

<h3>Langkah-Langkah Instalasi Docker pada Linux FEDORA</h3>

Referensi (12 Agustus 2024) : https://docs.docker.com/engine/install/fedora/

1. Hapus instalasi docker bawaan fedora :
   ```diff
   sudo dnf remove docker \
      docker-client \
      docker-client-latest \
      docker-common \
      docker-latest \
      docker-latest-logrotate \
      docker-logrotate \
      docker-selinux \
      docker-engine-selinux \
      docker-engine;
   ```
2. Set up repository :
   ```diff
   sudo dnf -y install dnf-plugins-core; sudo dnf config-manager --add-repo https://download.docker.com/linux/fedora/docker-ce.repo;
   ```
4. Install Docker Engine, containerd, and Docker Compose :
   ```diff
   sudo dnf install docker-ce docker-ce-cli containerd.io docker-buildx-plugin docker-compose-plugin;
   ```
5. Klik Yes (Y) untuk menerima Kunci GPG


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
      **Image** | **Tag**
      :--- | :---
      postgres | latest
      php | 8.3.3-apache
      redis | latest
      nowsci/samba-domain | latest
      minio/minio | latest
      dpage/pgadmin4 | latest
      openproject/community | 12
      grafana/grafana | latest
      percona/pmm-server | latest
   4. Rebuild Customized Images Docker yang terdiri atas :
      **Customized Image** | **Source Image**
      :--- | :---
      erp-reborn-postgresql | postgres:latest
      erp-reborn-phpapache-backend | php:8.3.3-apache
      erp-reborn-phpapache-frontend | php:8.3.3-apache
      erp-reborn-samba | nowsci/samba-domain:latest
      erp-reborn-minio | minio/minio:latest
      erp-reborn-devtools-pgadmin4 | dpage/pgadmin4:latest
      erp-reborn-devtools-openproject | openproject/community:12
      erp-reborn-monitoring-grafana | grafana/grafana:latest
      erp-reborn-monitoring-percona | percona/pmm-server:latest
   6. Rebuild Network Docker yang berupa **erpreborn_app-network** (mode bridge)
   7. Menjalankankan grup container Docker melalui docker-compose dengan memanggil images :
      **Containers** | **Docker's IP** | **Image**
      :--- | :--- | :---
      postgresql | 172.28.0.2 | erp-reborn-postgresql
      php-apache-backend | 172.28.0.3 | erp-reborn-phpapache-backend
      php-apache-frontend | 172.28.0.4 | erp-reborn-phpapache-frontend
      redis | 172.28.0.5 | redis
      samba | 172.28.0.7 | erp-reborn-samba
      minio-node1<br />minio-node2<br />minio-node3<br />minio-node4 | 172.28.0.9<br />172.28.0.7.10<br />172.28.0.7.11<br />172.28.0.7.12 | erp-reborn-minio
      pgadmin4 | 172.28.0.100 | erp-reborn-devtools-pgadmin4
      openproject | 172.28.0.102 | erp-reborn-devtools-openproject
      grafana | 172.28.0.110 | erp-reborn-monitoring-grafana
      percona | 172.28.0.111 | erp-reborn-monitoring-percona

5. Setelah seluruh container terbentuk maka akan berjalan service didalam docker berupa :
   **Service** | **Local Host & Port** | **Container** | **NAT From**
   :--- | :--- | :--- | :---
   postgresql | http://localhost:15432 | postgresql | http://172.28.0.2:5432
   mysql | http://localhost:13306 | postgresql | http://172.28.0.2:3306
   apache (HTTPS) | https://localhost:10443<br />https://localhost:20443 | php-apache-backend<br />php-apache-frontend | https://172.28.0.3<br >https://172.28.0.4
   apache (HTTP) | http://localhost:10080<br />http://localhost:20080 | php-apache-backend<br />php-apache-frontend | http://172.28.0.3<br >http://172.28.0.4 
   redis | http://localhost:16379 | redis | http://172.28.0.5:6379
   samba | http://localhost:10137<br />http://localhost:10138<br />http://localhost:10139<br />http://localhost:10445 | samba | http://172.28.0.7:137<br />http://172.28.0.7:138<br />http://172.28.0.7:139<br />http://172.28.0.7:445
   minio | http://localhost:19000<br />http://localhost:29000<br />http://localhost:39000<br />http://localhost:49000 | minio-node1<br />minio-node2<br />minio-node3<br />minio-node4 | http://172.28.0.9:9000<br />http://172.28.0.10:9000<br />http://172.28.0.11:9000<br />http://172.28.0.12:9000
   pgadmin4 | http://localhost:15050 | pgadmin4 | http://172.28.0.100:5050
   openproject | http://localhost:30080 | openproject | http://172.28.0.102
   grafana | http://localhost:13000 | grafana | http://172.28.0.110:3000
   percona | http://localhost:40080<br />https://localhost:40443 | percona | http://172.28.0.111:8080<br />https://172.28.0.111:8443

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
   
![Team-ProjectManager](https://i.ibb.co.com/B2sTW7Jx/Team-Teguh-Pratama-Januzir-S.jpg)
**Teguh Pratama Januzir S** | <em>Project Manager</em>
   
![Team-ProjectConsultant](https://i.ibb.co.com/4gKJFP39/Team-Bherly-Novrandy.jpg)
**Bherly Novrandy** | <em>Project Consultant</em>

![Team-FrontEndAndBackEndDeveloperCoordinator](https://i.ibb.co.com/FG42yjQ/Team-Icha-Mailinda.jpg)
**Icha Mailinda** | <em>FrontEnd Developer Coordinator</em>

![Team-FrontEndDeveloper](https://i.ibb.co.com/Y4qCg530/Team-Suyanto.jpg)
**Suyanto** | <em>FrontEnd Developer (26 December 2019 - 3 December 2025)</em>

![Team-FrontEndDeveloper](https://i.ibb.co.com/MDHfgNVY/Team-Wisnu-Trenggono.jpg)
**Wisnu Trenggono Wirayuda** | <em>FrontEnd Developer (15 June 2024 - Now)</em>

![Team-FrontEndDeveloper](https://i.ibb.co.com/SwfwLRqD/Team-Aldi-Mulyadi.jpg)
**Aldi Mulyadi** | <em>FullStack Developer (14 October 2020 - 14 June 2024)</em>

![Team-BackEndDeveloper](https://i.ibb.co.com/KXTWQyF/Team-Muhammad-Rizal.jpg)
**Muhammad Rizal** | <em>BackEnd Developer (23 January 2025 - Now)</em>

![Team-DatabaseEngineer](https://i.ibb.co.com/B2sTW7Jx/Team-Teguh-Pratama-Januzir-S.jpg)
**Teguh Pratama Januzir S** | <em>BackEnd Developer Coordinator And Database Engineer</em>

![Team-SystemAdministrator](https://i.ibb.co.com/cpj6ty0/Team-Zainudin-Anwar.jpg)
**Zainudin Anwar** | <em>System Administrator (9 August 2019 - Now)</em>
