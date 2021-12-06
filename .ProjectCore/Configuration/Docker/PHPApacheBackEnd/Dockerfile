FROM php:8.1-apache
ENV DEBIAN_FRONTEND=noninteractive

#    && add-apt-repository ppa:ondrej/php \
#    && apt-get install -y software-properties-common \

#RUN printf "deb http://httpredir.debian.org/debian jessie-backports main non-free\ndeb-src http://httpredir.debian.org/debian jessie-backports main non-free" > /etc/apt/sources.list.d/backports.list

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

RUN apt-get install -y \
   vim \ 
   libbz2-dev \
   && docker-php-ext-install \
      pdo \
      pdo_pgsql \
      pgsql \
   && pecl install redis \
       && docker-php-ext-enable \
          redis \
   && docker-php-ext-install \
      sockets \
      bz2 \
   && docker-php-ext-enable \ 
      sockets \
   && apt-get install -y \
      libldap2-dev \
      && docker-php-ext-configure \
          ldap --with-libdir=lib/x86_64-linux-gnu/ \
       && docker-php-ext-install \
          ldap \
       && docker-php-ext-enable \
          ldap \
    && apt-get install -y \ 
       libcurl4-gnutls-dev \
       && docker-php-ext-install \
          curl \
   && apt-get install -y \ 
      arp-scan \
   && apt-get install -y libxml2-dev \
      && docker-php-ext-install \
         soap \
      && apt-get install -y unixodbc \
         unixodbc-dev \
      && docker-php-ext-configure pdo_odbc --with-pdo-odbc=unixODBC,/usr \
      && docker-php-ext-install pdo_odbc \
   && apt-get install -y mdbtools \
      odbc-mdbtools \
   && apt-get install -y sshpass \
      sshfs \
   && apt-get install -y cron \
   && apt-get install -y \
      libpng-dev \
      zlib1g-dev \
      && docker-php-ext-install \ 
         gd \
   && apt-get install -y \
      lz4;

#ADD .ProjectCore/Configuration/Docker/PHPApacheBackEnd/crontab /etc/cron.d/cronLaravel

#RUN chmod 0644 /etc/cron.d/cronLaravel \
#    && touch /var/log/cron.log

#       && docker-php-ext-configure odbc --with-unixODBC=shared,/usr \
#       && docker-php-ext-install odbc \

#ADD .ProjectCore/Configuration/Docker/PHPApacheBackEnd/System/etc/cron.d/cron.Script.Laravel.ArtisanScheduleRun.sh /etc/cron.d/cron.Script.Laravel.ArtisanScheduleRun.sh

#RUN chmod 0644 /etc/cron.d/cron.Script.Laravel.ArtisanScheduleRun.sh \
#    && touch /var/log/cron.log

ADD ./.ProjectCore/Configuration/Docker/PHPApacheBackEnd/System/etc/cron.d/cron_Script_* /etc/cron.d/
RUN chmod 0644 /etc/cron.d/cron_Script_* \
    && touch /var/log/cron.log


RUN touch /var/log/cron.log

#CMD printenv > /etc/environment && echo "cron starting..." && (cron) && : > /var/log/cron.log && tail -f /var/log/cron.log

#--->CA Certificate
RUN cd /usr/local/share/ca-certificates/ \
    && ln -s /etc/ssl/certs/ca-certificates.crt ca-certificates.crt \
    && cd - \
    && update-ca-certificates \
    && export SSL_CERT_FILE=/etc/ssl/certs/ca-certificates.crt

#--->Increase Memory
RUN cd /usr/local/etc/php/conf.d/ \
    && echo 'memory_limit = -1' >> /usr/local/etc/php/conf.d/docker-php-memlimit.ini

#ADD . /var/www
#ADD ./public /var/www/html

#---> Cloning File
#COPY . /var/www/html/
COPY ./.ProjectCore/Configuration/Docker/PHPApacheBackEnd/vhost.conf /etc/apache2/sites-available/000-default.conf
#RUN cd .. && cp ./../.ZhtConf/Docker/PHP/vhost.conf /etc/apache2/sites-available/000-default.conf & cd -

#---> Set Ulang Kepemilikan File
RUN chown -R www-data:www-data /var/www \
    && a2enmod rewrite

#---> Set Name Server
RUN echo "ServerName localhost" | tee /etc/apache2/conf-available/servername.conf
RUN a2enconf servername

#---> Release Port
EXPOSE 80

#---> ZhtConf Folder
RUN mkdir -p /zhtConf/tmp/processSign
