FROM minio/minio

RUN curl https://dl.min.io/client/mc/release/linux-amd64/mc \
  --create-dirs \
  -o $HOME/minio-binaries/mc

RUN chmod +x $HOME/minio-binaries/mc

RUN export PATH=$PATH:$HOME/minio-binaries/

#---> Release Port
EXPOSE 9000
EXPOSE 9001

#---> ZhtConf Folder
