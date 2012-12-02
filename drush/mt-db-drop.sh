#!/usr/bin/sh
./mt-init.sh
mysql -u $DBUSER -p <<<'drop database $DBNAME;'