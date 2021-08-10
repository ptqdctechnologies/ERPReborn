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
       git \
       wget \
       unzip \
       vim

RUN apt-get install -y lsb-release \
    && wget http://repo.mysql.com/mysql-apt-config_0.8.13-1_all.deb \
       && dpkg -i mysql-apt-config_0.8.13-1_all.deb \
    && apt-get update \
    && git clone https://github.com/EnterpriseDB/mysql_fdw.git \
       && apt-get install -y mariadb-server \
       && cd /mysql_fdw \
          && export PATH=/usr/lib/postgresql/13/bin/:/usr/bin/mysql:$PATH make USE_PGXS=1 \
          && PATH=/usr/lib/postgresql/13/bin/:/usr/bin/mysql:$PATH make USE_PGXS=1 install \
          && cd / \
          && rm -rf /mysql_fdw

#wget https://github.com/CartoDB/odbc_fdw/archive/master.zip \
RUN git clone https://github.com/CartoDB/odbc_fdw.git \
       && apt-get install -y \
          unixodbc-dev \
       && cd /odbc_fdw \
          && make \
          && make install \
          && cd / \
          && rm -rf /odbc_fdw

#RUN wget https://github.com/tds-fdw/tds_fdw/archive/master.zip \
RUN git clone https://github.com/tds-fdw/tds_fdw.git \
       && apt-get install -y \
          libsybdb5 \
          freetds-dev \
          freetds-common \
       && cd /tds_fdw \
          && make USE_PGXS=1 \
          && make USE_PGXS=1 install \
          && cd / \
          && rm -rf /tds_fdw

#ENTRYPOINT ["Script.ServiceRestart.sh"]
#EXPOSE 3306

#---> ZhtConf Folder
RUN mkdir -p /zhtConf/tmp/processSign
