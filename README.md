# ERPReborn

**ERP Reborn** merupakan proyek sistem Enterprise Resource Planning yang digunakan oleh PT QDC Technologies

Langkah Cloning Repository
1. Pastikan **docker**, **docker-compose**, dan **composer** sudah terinstall pada perangkat Laptop
2. Pastikan **service docker** sudah berjalan pada perangkat Laptop
3. Jalankan perintah **git clone https://github.com/ptqdctechnologies/ERPReborn ERPReborn**
4. Jalankan perintah **cd ./ERPReborn** untuk masuk kedalam folder ERPReborn
5. Jalankan perintah **./BashScript/Script.System.FirstTimeInitRun.sh**. Selama menjalankan perintah berbasis Bash Script, banyak command yang memerlukan instruksi dalam mode **Priviliged User** sehingga harus diisikan password beberapa kali dalam eksekusinya. Bash Script ini menjalankan beberapa instruksi utama diantaranya :
   a. Update Laravel Melalui Composer
   b. Rebuild Volume, Images, dan Network Docker
   c. Menjalankankan grup container Docker melalui docker-compose dengan memanggil images :
      - **erp-reborn-postgresql** --> membentuk container bernama **postgresql**
      - **erp-reborn-phpapache-backend** --> membentuk container bernama **php-apache-frontend**
      - **erp-reborn-phpapache-frontend** --> membentuk container bernama **php-apache-backend**
      - **redis** --> membentuk container bernama **redis**
      - **dpage/pgadmin4** --> membentuk container bernama **pgadmin4**
6. Setelah seluruh container terbentuk maka akan berjalan service didalam docker berupa :
   a. **postgresql** --> **http://localhost:15432**
   b. **mysql** --> **http://localhost:13306**
   c. **apache WebBackEnd** --> **http://localhost:10080**
   d. **apache WebFrontEnd** --> **http://localhost:20080**
   e. **redis** --> **http://localhost:6379**
   f. **pgadmin4** --> **http://localhost:15050**
