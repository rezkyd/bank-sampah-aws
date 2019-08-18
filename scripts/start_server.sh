#!/bin/bash
systemctl start httpd
systemctl enable httpd
systemctl start mariadb
systemctl enable mariadb