#!/bin/sh

# Update git
cd /home/ec2-user/fastcat-site
git pull

# Update html contents
rsync -rv --delete --exclude-from=/home/ec2-user/fastcat-site/exclude-list.txt /home/ec2-user/fastcat-site/ /var/www/html/
