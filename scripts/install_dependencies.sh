#!/bin/bash
yum -y update
amazon-linux-extras install -y lamp-mariadb10.2-php7.2 php7.2
yum install -y httpd
yum install -y php-pecl-memcached
yum install -y memcached