#!/bin/bash
yum -y update
amazon-linux-extras install -y lamp-mariadb10.2-php7.2 php7.2
yum install -y httpd
yum install -y php-pecl-memcached
sed 's/^\(session.save_handler\).*/\1 = memcached/' -i /etc/php.ini
sed '\#^\(session.save_handler\).*#{n;s#.*#session.save_path = "cachebsm.hqfv4d.cfg.use1.cache.amazonaws.com:11211"#}' -i /etc/php.ini
service httpd restart