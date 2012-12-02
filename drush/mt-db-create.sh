#!/usr/bin/sh
./mt-init.sh
mysql -u $DBUSER -p <<<'creaet database $DBNAME;'