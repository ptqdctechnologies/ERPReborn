
#!/bin/bash

#sudo docker exec -it postgresql /bin/bash -c "mysql -u root -D mysql -e \"UPDATE user SET Plugin='' WHERE User='root'; flush privileges;\"";
sudo docker exec -it postgresql /bin/bash -c "mysql -u root -D mysql -e \"UPDATE user SET Password=PASSWORD('748159263') WHERE User='root'; flush privileges;\"";
