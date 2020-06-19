# ERPReborn

**ERP Reborn** merupakan proyek sistem Enterprise Resource Planning yang digunakan oleh PT QDC Technologies

<h3>Langkah-Langkah Cloning Repository</h3>
1. Pastikan **docker**, **docker-compose**, dan **composer** sudah terinstall pada perangkat Laptop

2. Pastikan **service docker** sudah berjalan pada perangkat Laptop

3. Jalankan perintah **git clone https://github.com/ptqdctechnologies/ERPReborn ERPReborn**

4. Jalankan perintah **cd ./ERPReborn** untuk masuk kedalam folder ERPReborn

5. Jalankan perintah **./BashScript/Script.System.FirstTimeInitRun.sh**. Selama menjalankan perintah berbasis Bash Script, banyak command yang memerlukan instruksi dalam mode **Priviliged User** sehingga harus diisikan password beberapa kali dalam eksekusinya. Bash Script ini menjalankan beberapa instruksi utama diantaranya :
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
   4. Rebuild Images Docker yang terdiri atas :
      1. **erp-reborn-postgresql** (turunan dari Image postgres:latest)
      2. **erp-reborn-phpapache-backend** (turunan dari Image php:7.3-apache)
      3. **erp-reborn-phpapache-frontend** (turunan dari Image php:7.3-apache)
   4. Rebuild Network Docker yang berupa **erpreborn_app-network** (mode bridge)
   3. Menjalankankan grup container Docker melalui docker-compose dengan memanggil images :
      1. **erp-reborn-postgresql** &rarr; membentuk container bernama **postgresql**
      2. **erp-reborn-phpapache-backend** &rarr; membentuk container bernama **php-apache-frontend**
      3. **erp-reborn-phpapache-frontend** &rarr; membentuk container bernama **php-apache-backend**
      4. **redis** &rarr; membentuk container bernama **redis**
      5. **dpage/pgadmin4** &rarr; membentuk container bernama **pgadmin4**
      
6. Setelah seluruh container terbentuk maka akan berjalan service didalam docker berupa :
   1. **postgresql** &rarr; **http://localhost:15432** (NAT dari 172.28.0.2:5432)
   2. **mysql** &rarr; **http://localhost:13306** (NAT dari 172.28.0.2:3306)
   3. **apache WebBackEnd** &rarr; **http://localhost:10080** (NAT dari 172.28.0.3:80)
   4. **apache WebFrontEnd** &rarr; **http://localhost:20080** (NAT dari 172.28.0.4:80)
   5. **redis** &rarr; **http://localhost:6379** (NAT dari 172.28.0.5:6379)
   6. **pgadmin4** &rarr; **http://localhost:15050** (NAT dari 172.28.0.6:5050)
   
7. Untuk mematikan docker-composer tekan **[Ctrl+C]**

8. Untuk menjalankannnya docker-compose kembali dapat menggunakan **./BashScript/Script.Docker.Start.sh**
 
