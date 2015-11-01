#!/bin/sh
dir=/var/www/html/mini-blog.localhost

if [ ! -e $dir ]; then
	mkdir /var/www/html/mini-blog.localhost
fi

sudo cp MiniBlogApplication.php /var/www/html/mini-blog.localhost/
sudo cp bootstrap.php /var/www/html/mini-blog.localhost/
sudo cp -r core /var/www/html/mini-blog.localhost/
sudo cp -r views /var/www/html/mini-blog.localhost/
sudo cp -r web /var/www/html/mini-blog.localhost/
