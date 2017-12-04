#!/bin/sh

# Update git
cd /home/fastcat/fastcat-site
git pull

# Update html contents
rsync -rv --delete --exclude-from=/home/fastcat/fastcat-site/exclude-list.txt /home/fastcat/fastcat-site/ /var/www/html/
