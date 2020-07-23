FROM php:7.3-apache
ENV DEBIAN_FRONTEND=noninteractive

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
       sockets

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
