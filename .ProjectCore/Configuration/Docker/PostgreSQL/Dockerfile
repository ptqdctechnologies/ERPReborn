FROM library/postgres
ENV DEBIAN_FRONTEND=noninteractive

ENV POSTGRES_USER postgres
ENV POSTGRES_PASSWORD 748159263
ENV POSTGRES_DB postgres

ENV MYSQL_USER SysEngine
ENV MYSQL_PASSWORD 748159263
ENV MYSQL_ROOT_PASSWORD 748159263
ENV MYSQL_DATABASE db

COPY ./.ProjectCore/Configuration/Docker/PostgreSQL/.my.cnf /root/

RUN apt-get update \
    && apt-get install -y \
       libpq-dev \
       postgresql-server-dev-all \
       libmariadb-dev-compat \
       libmariadb-dev \
       gcc \
       wget \
       unzip \
       vim

RUN apt-get install -y lsb-release \
    && wget http://repo.mysql.com/mysql-apt-config_0.8.13-1_all.deb \
       && dpkg -i mysql-apt-config_0.8.13-1_all.deb \
    && apt-get update \
    && wget https://github.com/EnterpriseDB/mysql_fdw/archive/master.zip \
       && apt-get install -y mariadb-server \
       && unzip master.zip \
       && rm -rf /master.zip \
       && cd /mysql_fdw-master \
          && export PATH=/usr/lib/postgresql/13/bin/:/usr/bin/mysql:$PATH make USE_PGXS=1 \
          && PATH=/usr/lib/postgresql/13/bin/:/usr/bin/mysql:$PATH make USE_PGXS=1 install \
          && cd / \
          && rm -rf /mysql_fdw-master \
    && wget https://github.com/CartoDB/odbc_fdw/archive/master.zip \
       && apt-get install -y unixodbc-dev \
          && unzip master.zip \
          && rm -rf /master.zip \
          && cd /odbc_fdw-master \
             && make \
             && make install \
             && cd / \
             && rm -rf /odbc_fdw-master

#ENTRYPOINT ["Script.ServiceRestart.sh"]
#EXPOSE 3306

#---> ZhtConf Folder
RUN mkdir -p /zhtConf/tmp/processSign
