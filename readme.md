## About QuickOrder

QuickOrder is abc web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling.

#########Clone github#########

git clone https://github.com/katimaz/order order

#########install composer#########

apt-get composer

composer install

#########Install php 7.1#########

sudo add-apt-repository ppa:ondrej/php
sudo apt-get update

service apache2 stop

sudo apt-get install php7.1 php7.1-common
sudo apt-get install php7.1-curl php7.1-xml php7.1-zip php7.1-gd php7.1-mysql php7.1-mbstring
sudo apt-get install zip unzip php7.1-zip

Remove PHP 7.0
Now we have PHP7.1, lets get rid of PHP7.0

sudo apt-get purge php7.0 php7.0-common
sudo shutdown -r now
a2enmod php7.1
service apache2 restart

cd "folder_path"
chmod -R 777 storage
chmod -R 777 bootstrap/cache

######### DB Table #########

php artisan migrate

######### HTACCESS #########

Enable mod_rewrite on the apache server: sudo a2enmod rewrite.

Edit /etc/apache2/apache2.conf, changing the "AllowOverride" directive for the /var/www directory (which is my main document root): AllowOverride All

Then restart the Apache server: service apache2 restart
=======

