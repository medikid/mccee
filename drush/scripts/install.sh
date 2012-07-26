#!/usr/bin/sh

cd d://wamp/www/devel/

#install standard profile, since meditrainer installation profile is error prone
drush si standard --db-url=mysql://root:@localhost/devel --account-name=admin --account-pass=drupal123 --account-mail=example@domain.com