#!/usr/bin/sh

cd d://wamp/www/mccee

#delete settings.php
rm -rf "sites/default/settings.php"

#drop devel table
if  ! mysql -u root -e 'use mccee'; then
mysql -u root <<<'create database mccee;'
else
#create mysql database devel
	mysql -u root <<<'drop database mccee;'
	mysql -u root <<<'create database mccee;'
fi

mysql -u root <<<'show databases;';exit;