FROM php:8.4.4-apache
ENV DEBIAN_FRONTEND=noninteractive

#    && add-apt-repository ppa:ondrej/php \
#    && apt-get install -y software-properties-common \

#RUN printf "deb http://httpredir.debian.org/debian jessie-backports main non-free\ndeb-src http://httpredir.debian.org/debian jessie-backports main non-free" > /etc/apt/sources.list.d/backports.list


RUN printf "deb http://kambing.ui.ac.id/debian/ buster main contrib non-free" >> /etc/apt/sources.list \
    && printf "deb http://repo.ugm.ac.id/debian/ buster main contrib non-free" >> /etc/apt/sources.list


#---> Main
#RUN apt-get update --fix-missing \
RUN apt-get update \
    && apt-get upgrade -y \
    && apt-get autoremove -y \
    && apt-get install -y \
       apt-utils \
       libpq-dev \
       software-properties-common


#---> Basic Application
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
RUN apt-get install -y \
   git \
   vim 


#---> Basic Application : Cron
RUN apt-get install -y \
   cron
ADD ./.ProjectCore/Configuration/Docker/PHPApacheBackEnd/System/etc/cron.d/cron_Script_* /etc/cron.d/
RUN chmod 0644 /etc/cron.d/cron_Script_* \
    && touch /var/log/cron.log
RUN touch /var/log/cron.log


#---> Basic Application : Network Utility
RUN apt-get install -y \ 
   arp-scan


#---> Basic Application : SSH
RUN apt-get install -y sshpass \
   sshfs


#---> PHP Extension : Compression
RUN apt-get install -y \
   bzip2 \
   libbz2-dev \
   libzip-dev \
   lz4 \
   unzip \
   zlib1g-dev \
   && docker-php-ext-install -j$(nproc) \
      zip


#---> PHP Extension : Sockets
RUN docker-php-ext-install \
   sockets \
   && docker-php-ext-enable \ 
      sockets


#---> PHP Extension : Database
RUN docker-php-ext-install \
   pdo \
   pdo_pgsql \
   pgsql


#---> PHP Extension : Redis
RUN pecl install redis \
   && docker-php-ext-enable \
      redis


#---> PHP Extension : CURL
RUN apt-get install -y \
   libcurl4-gnutls-dev \
   && docker-php-ext-install \
      curl
#libcurl4-openssl-dev \


#---> PHP Extension : LDAP
RUN apt-get install -y \
   libldap2-dev \
   && docker-php-ext-configure \
      ldap --with-libdir=lib/x86_64-linux-gnu/ \
   && docker-php-ext-install \
      ldap \
   && docker-php-ext-enable \
      ldap


#---> PHP Extension : UnixODBC
RUN apt-get install -y \
   unixodbc \
   unixodbc-dev \
   && docker-php-ext-configure \
      pdo_odbc --with-pdo-odbc=unixODBC,/usr \
   && docker-php-ext-install pdo_odbc \
   && apt-get install -y \
      mdbtools \
      odbc-mdbtools


#---> PHP Extension : XML & SOAP
RUN apt-get install -y libxml2-dev \
   && docker-php-ext-install \
      soap


#---> PHP Extension : GD
RUN apt-get install -y \
   libfreetype6-dev \
   libjpeg62-turbo-dev \ 
   libpng-dev \ 
   libxpm-dev \
   libwebp-dev \
   zlib1g-dev \
   && docker-php-ext-configure \
      gd --with-jpeg --with-freetype --with-webp \
   && docker-php-ext-install -j$(nproc) \ 
      gd


#---> PHP Extension : File Converter
#RUN apt-get install -y \
#   libreoffice \
#   ghostscript \
#   imagemagick \
#   build-essential \
#   libmagickwand-dev

#RUN pecl install imagick \
#   && docker-php-ext-enable imagick

RUN apt-get install -y \
   libreoffice \
   ghostscript

RUN apt-get install -y \
      build-essential \
      libmagickwand-dev \
   && git clone https://github.com/Imagick/imagick \
      && cd ./imagick/ \
         && phpize \
         && ./configure \
         && make \
         && make install \
      && cd - \
      && rm -rf ./imagick
#         && make test \

RUN docker-php-ext-enable imagick









#   && docker-php-ext-install \
#      php-imagick \
#   && apt-get install -y \
#      aptitude \
#   && aptitude install -y \
#      php-imagick \
#   && apt-get install -y \
#      php7-imagick \
#   && aptitude -y install \
#      imagemagick \
#   && aptitude -y install \
#      libmagickcore-dev


#ADD .ProjectCore/Configuration/Docker/PHPApacheBackEnd/crontab /etc/cron.d/cronLaravel

#RUN chmod 0644 /etc/cron.d/cronLaravel \
#    && touch /var/log/cron.log

#       && docker-php-ext-configure odbc --with-unixODBC=shared,/usr \
#       && docker-php-ext-install odbc \

#ADD .ProjectCore/Configuration/Docker/PHPApacheBackEnd/System/etc/cron.d/cron.Script.Laravel.ArtisanScheduleRun.sh /etc/cron.d/cron.Script.Laravel.ArtisanScheduleRun.sh

#RUN chmod 0644 /etc/cron.d/cron.Script.Laravel.ArtisanScheduleRun.sh \
#    && touch /var/log/cron.log


#CMD printenv > /etc/environment && echo "cron starting..." && (cron) && : > /var/log/cron.log && tail -f /var/log/cron.log


#---> CA Certificate
RUN cd /usr/local/share/ca-certificates/ \
    && ln -s /etc/ssl/certs/ca-certificates.crt ca-certificates.crt \
    && cd - \
    && update-ca-certificates \
    && export SSL_CERT_FILE=/etc/ssl/certs/ca-certificates.crt


#---> Increase Memory
RUN cd /usr/local/etc/php/conf.d/ \
    && echo 'memory_limit = -1' >> /usr/local/etc/php/conf.d/docker-php-memlimit.ini

#ADD . /var/www
#ADD ./public /var/www/html

#---> Cloning File
#COPY . /var/www/html/
COPY ./.ProjectCore/Configuration/Docker/PHPApacheBackEnd/vhost.conf /etc/apache2/sites-available/000-default.conf
#RUN cd .. && cp ./../.ZhtConf/Docker/PHP/vhost.conf /etc/apache2/sites-available/000-default.conf & cd -
#---> Imagick Convertion for PDF
COPY ./.ProjectCore/Configuration/Docker/PHPApacheBackEnd/System/etc/ImageMagick-6/policy.xml /etc/ImageMagick-6/policy.xml


#---> Aktivasi SSL
RUN a2enmod ssl \
    && a2enmod socache_shmcb

RUN sed -i '/DocumentRoot/cDocumentRoot /var/www/html/WebBackEnd/public' /etc/apache2/sites-available/default-ssl.conf
RUN sed -i '/SSLCertificateFile.*snakeoil\.pem/cSSLCertificateFile /etc/ssl/certs/ERPRebornLocalhost.crt' /etc/apache2/sites-available/default-ssl.conf
RUN sed -i '/SSLCertificateKeyFile.*snakeoil\.key/cSSLCertificateKeyFile /etc/ssl/private/ERPRebornLocalhost.key' /etc/apache2/sites-available/default-ssl.conf

RUN a2ensite default-ssl


#---> Set Ulang Kepemilikan File
RUN chown -R www-data:www-data /var/www \
    && a2enmod rewrite


#---> Set Name Server
RUN echo "ServerName localhost" | tee /etc/apache2/conf-available/servername.conf
RUN a2enconf servername


#---> Release Port
EXPOSE 80
EXPOSE 443


#---> ZhtConf Folder
RUN mkdir -p /zhtConf/tmp/processSign

