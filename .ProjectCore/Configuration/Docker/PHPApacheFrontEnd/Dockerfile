FROM php:8.4.4-apache
ENV DEBIAN_FRONTEND=noninteractive

RUN printf "deb http://kambing.ui.ac.id/debian/ buster main contrib non-free" >> /etc/apt/sources.list \
    && printf "deb http://repo.ugm.ac.id/debian/ buster main contrib non-free" >> /etc/apt/sources.list

#RUN apt-get update --fix-missing \
RUN apt-get update \
    && apt-get upgrade -y \
    && apt-get autoremove -y

RUN apt-get install -y \
       apt-utils \
       libpq-dev \
       software-properties-common

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

RUN apt-get install -y \
   git \
   vim \
   && pecl install redis \
   && docker-php-ext-enable redis \
   && docker-php-ext-install \
      sockets \
   && docker-php-ext-enable \
      sockets \
   && apt-get install -y \
      libcurl4-gnutls-dev \
      && docker-php-ext-install \
         curl


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


#---> Cloning File
COPY ./.ProjectCore/Configuration/Docker/PHPApacheFrontEnd/vhost.conf /etc/apache2/sites-available/000-default.conf

#---> Aktivasi SSL
RUN a2enmod ssl \
    && a2enmod socache_shmcb

RUN sed -i '/DocumentRoot/cDocumentRoot /var/www/html/WebFrontEnd/public' /etc/apache2/sites-available/default-ssl.conf
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
