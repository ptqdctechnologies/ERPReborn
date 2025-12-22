#FROM dunglas/frankenphp:static-builder-gnu
FROM dunglas/frankenphp:latest
#FROM dunglas/frankenphp:1.10-builder-php8.3
ENV DEBIAN_FRONTEND=noninteractive


RUN printf "deb http://archive.debian.org/debian stretch main contrib non-free" >> /etc/apt/sources.list \
    && printf "deb http://kartolo.sby.datautama.net.id/debian/ buster main contrib non-free" >> /etc/apt/sources.list \
    && printf "deb http://kambing.ui.ac.id/debian/ buster main contrib non-free" >> /etc/apt/sources.list \
    && printf "deb http://repo.ugm.ac.id/debian/ buster main contrib non-free" >> /etc/apt/sources.list

#RUN printf "deb http://kambing.ui.ac.id/debian/ buster main contrib non-free" >> /etc/apt/sources.list \
#    && printf "deb http://repo.ugm.ac.id/debian/ buster main contrib non-free" >> /etc/apt/sources.list


#---> Main
RUN apt-get update --fix-missing \
  && apt-get upgrade -y \
  && apt-get autoremove -y \
  && apt-get install -y \
     apt-utils \
     libpq-dev
     #software-properties-common


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

#---> PHP Extension : PCNTL
RUN docker-php-ext-install pcntl
RUN install-php-extensions pcntl

#---> PHP Extension : GD
RUN apt-get install -y \
    libfreetype6:amd64=2.6.3-3.2+deb9u1 \
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
#    libreoffice \
#    ghostscript \
#    imagemagick \
#    build-essential \
#    libmagickwand-dev

#RUN pecl install imagick \
#    && docker-php-ext-enable imagick


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


#---> CA Certificate
RUN cd /usr/local/share/ca-certificates/ \
    && ln -s /etc/ssl/certs/ca-certificates.crt ca-certificates.crt \
    && cd - \
    && update-ca-certificates \
    && export SSL_CERT_FILE=/etc/ssl/certs/ca-certificates.crt


#---> Imagick Convertion for PDF
COPY ./.ProjectCore/Configuration/Docker/PHPApacheBackEnd/System/etc/ImageMagick-6/policy.xml /etc/ImageMagick-6/policy.xml


#RUN apt-get install -y \
#    caddy
RUN apt-get install -y \
    libnss3-tools

#RUN chown -R www-data:www-data storage bootstrap/cache

#---> Release Port
EXPOSE 80
EXPOSE 443
EXPOSE 8000

#---> ZhtConf Folder
RUN mkdir -p /zhtConf/tmp/processSign

# Example for Laravel Octane
#CMD ["frankenphp", "php", "artisan", "octane:frankenphp"] 

#ENTRYPOINT ["php", "artisan", "octane:frankenphp"]
