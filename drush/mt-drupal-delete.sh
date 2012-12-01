#!/usr/bin/sh
./mt-init.sh
cd public_html/meditrainer/site
chmod 777 default
cd default
rm -rf settings.php
cd public_html
rm -rf meditrainer
