#!/bin/bash

clear;

#sudo docker pull dunglas/frankenphp:static-builder-gnu;
#sudo docker pull dunglas/frankenphp:latest;
sudo docker pull composer:latest;
#vim ./.ProjectCore/Configuration/Docker/PHPApacheBackEnd/Dockerfile
sudo docker build --file ./.ProjectCore/Configuration/Docker/PHPBackEnd_LaravelOctane_FrankenPHP/Dockerfile -t erp-reborn-php-backend-laraveloctane-frankenphp .;
