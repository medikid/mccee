#!/usr/bin/sh

cd d://wamp/www/devel

#delete settings.php
rm -rf "sites/default/settings.php"

#empty profiles meditrainer folder
cd profiles
rm -rf meditrainer


#copy profiles meditrainer folder
cp -r "d://wamp/www/mccee/profiles/meditrainer" "meditrainer"


#empty sites/all/modules folder
cd d://wamp/www/devel
cd sites/all/modules/

rm -rf contrib
rm -rf custom

#copy sites/all/modules/contrib folder
cp  -r "d://wamp/www/mccee/sites/all/modules/contrib" "contrib"

#copy sires/all/modules/custom folder
cp -r "d://wamp/www/mccee/sites/all/modules/custom" "custom"



#drop devel table
if  ! mysql -u root -e 'use devel'; then
mysql -u root <<<'create database devel;'
else
#create mysql database devel
	mysql -u root <<<'drop database devel;'
	mysql -u root <<<'create database devel;'
fi

mysql -u root <<<'show databases;';exit;