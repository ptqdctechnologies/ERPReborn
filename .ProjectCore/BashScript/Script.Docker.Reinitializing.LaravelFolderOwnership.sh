#!/bin/bash

#sudo mkdir -p ./Programming/WebBackEnd/storage/app/Application/Upload/StagingArea/;
#sudo chmod 777 ./Programming/WebBackEnd/storage/app/Application/Upload/StagingArea/;

#sudo mkdir -p ./Programming/WebBackEnd/storage/logs;
#sudo mkdir -p ./Programming/WebFrontEnd/storage/logs;

#sudo mkdir -p ./Programming/WebBackEnd/bootstrap/cache;
#sudo mkdir -p ./Programming/WebFrontEnd/bootstrap/cache;

sudo chown -R 33:33 ./Programming/WebBackEnd/storage/;
sudo chown -R 33:33 ./Programming/WebFrontEnd/storage/;

sudo chown -R 33:33 ./Programming/WebBackEnd/bootstrap/cache;
sudo chown -R 33:33 ./Programming/WebFrontEnd/bootstrap/cache;

sudo touch ./Programming/WebBackEnd/storage/logs/laravel.log;
sudo touch ./Programming/WebFrontEnd/storage/logs/laravel.log;

sudo chmod 666 ./Programming/WebBackEnd/storage/logs/laravel.log; 
sudo chmod 666 ./Programming/WebFrontEnd/storage/logs/laravel.log; 

sudo chmod 777 ./Programming/WebBackEnd/bootstrap/cache;
sudo chmod 777 ./Programming/WebFrontEnd/bootstrap/cache;

sudo chmod 777 ./Programming/WebBackEnd/vendor/tecnickcom/tcpdf/fonts;

sudo chown -R $(id -u):$(id -g) ./Programming/WebBackEnd/vendor/composer;
sudo chown -R $(id -u):$(id -g) ./Programming/WebFrontEnd/vendor/composer;

sudo chown -R $(id -u):$(id -g) ./Programming/WebBackEnd/vendor;
sudo chown -R $(id -u):$(id -g) ./Programming/WebFrontEnd/vendor;
