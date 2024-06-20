#!/bin/bash
mysql -uroot -ptoor < /var/www/build.sql
cd /var/www/task && composer install
chown -R 1000:1000 /var/www/task
chmod -R 0777 /var/www/task