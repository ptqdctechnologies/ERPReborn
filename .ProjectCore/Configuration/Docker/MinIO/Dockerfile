FROM minio/minio

RUN curl https://dl.min.io/client/mc/release/linux-amd64/mc \
  --create-dirs \
  -o /opt/minio-binaries/mc

RUN chmod +x /opt/minio-binaries/mc

ENV export PATH=$PATH:/opt/minio-binaries/

#---> Release Port
EXPOSE 9000
EXPOSE 9001

#---> ZhtConf Folder
