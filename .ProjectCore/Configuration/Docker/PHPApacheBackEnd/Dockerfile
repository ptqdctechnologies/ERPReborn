FROM php:7.3-apache
ENV DEBIAN_FRONTEND=noninteractive

#    && add-apt-repository ppa:ondrej/php \
#    && apt-get install -y software-properties-common \

RUN apt-get update \
    && apt-get install -y \ 
       apt-utils \ 
       libpq-dev \
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
       arp-scan

#--->Increase Memory
RUN cd /usr/local/etc/php/conf.d/ && \
  echo 'memory_limit = -1' >> /usr/local/etc/php/conf.d/docker-php-memlimit.ini

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
