#!/usr/bin/sh

cd d://wamp/www/devel

#disable all the enable modules
drush pm-disable `drush pm-list --type=module --status=enabled --pipe`