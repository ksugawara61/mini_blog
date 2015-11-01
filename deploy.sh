#!/bin/sh
mkdir /var/www/html/mini-blog.localhost
sudo cp MiniBlogApplication.php /var/www/html/mini-blog.localhost/
sudo cp bootstrap.php /var/www/html/mini-blog.localhost/
sudo cp -r core /var/www/html/mini-blog.localhost/
sudo cp -r views /var/www/html/mini-blog.localhost/
sudo cp -r web /var/www/html/mini-blog.localhost/
