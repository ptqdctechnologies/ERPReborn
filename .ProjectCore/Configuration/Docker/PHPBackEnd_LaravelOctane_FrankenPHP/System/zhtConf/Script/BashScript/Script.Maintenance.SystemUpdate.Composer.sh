#!/bin/bash

clear;
cd /var/www/html/WebBackEnd;
composer self-update;
git config --global --add safe.directory '*';
composer update;
cd -;
