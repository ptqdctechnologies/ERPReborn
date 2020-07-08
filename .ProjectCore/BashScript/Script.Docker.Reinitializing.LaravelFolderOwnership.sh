#!/bin/bash

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
