#!/usr/bin/sh

#!/usr/bin/sh

echo Please, enter your Site Name
read SITENAME
echo Please, choose Admin Password
read ADMPWD
echo Please, enter your db name
read DBNAME
echo Please, enter your db password
read DBPWD
cd d://wamp/www/$SITENAME

#delete settings.php
rm -rf "sites/default/settings.php"

#drop devel table
if  ! mysql -u root -e 'use $DBNAME'; then
mysql -u root <<<'create database $DBNAME;'
else
#create mysql database devel
	mysql -u root <<<'drop database $DBNAME;'
	mysql -u root <<<'create database $DBNAME;'
fi

#mysql -u root <<<'show databases;';exit;

#now install meditrainer profile
cd d://wamp/www/$SITENAME/
#drush si meditrainer --db-url=mysql://root:@localhost/devel --account-name=admin --account-pass=drupal123 --account-mail=example@domain.com

#unable to install meditrainer profile, so lets install core profile and then customize
drush si --db-url=mysql://root:@localhost/$DBNAME --account-name=admin --account-pass=$ADMPWD --account-mail=example@domain.com

#echo "Completed installing standard profile, now disable the default-enabled modules
drush pm-disable `drush pm-list --type=module --status=enabled --pipe`

declare -a toenable=(
'block'
'book'
'ckeditor'
'field'
'field_sql_storage'
'color'
'options'
'file'
'filter'
'menu'
'node'
'comment'
'image'
'contextual'
'dashboard'
'dblog'
'user'
'text'
'system'
'taxonomy'
'services
'rest_server'

'list'
'number'
'field_ui'

'help'
'overlay''
'path'
'rdf'
'search'
'shortcut'
'trigger'
'update'

'admin_menu'
'admin_menu_toolbar'
'admin_devel'

'auto_nodetitle'

'ctools'

'devel'
'devel_node_access'

'entity'
'entity_token'

'field_group'

'module_filter'

'rules'
'rules_scheduler'
'rules_admin'

'schema'

'uc_authorizenet'
'test_gateway'
'uc_credit'
'uc_payment'
'uc_payment_pack'
'uc_paypal'
'uc_attribute'
'uc_cart'
'uc_cart_links'
'uc_order'
'uc_product'
'uc_roles'
'uc_store'

'views'
'views_ui'
'views_bulk_operations'

'file_entity'
'media'
'media_internet'
'media_youtube'
'remote_stream_wrapper'

'mt_core'
'mt_memberships'
'mt_members'
'mt_mcq'
'mt_exam'
'mt_notes'
'mt_import_export'
'mt_services'
'mt_mindmaps'
'mt_media'
'mt_message'
'mt_payments'
)

declare -a enablefailed=()

x=0
y=${#toenable[@]}
z=0
while [ $x -lt $y ]; do

if drush --yes en ${toenable[$x]}; then
let x+=1
echo Installed $[x+1] / $y and unable to install $z
else 
enablefailed=( "${enablefailed[@]}" ${toenable[$x]} )
let x+=1
let z+=1
echo Installed $[x+1] / $y and unable to install $z
fi



done