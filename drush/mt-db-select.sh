#!/usr/bin/sh
./mt-init.sh
mysql -u $DBUSER -p <<<'use $DBNAME;'