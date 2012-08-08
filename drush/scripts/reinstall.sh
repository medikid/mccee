#!/usr/bin/sh

#HOME = 
#SOURCE_DIR = D://wamp/www/mccee/
#TEST_DIR = 

#change directory to home
cd D://wamp/www/

#If devel folder does not exist, create one.
if [ ! -d devel ]; then
echo "Devel folder does not exist"
mkdir devel
echo "Devel folder created"
fi

#download drupal latest version into folder devel
drush dl drupal --drupal-project-rename="devel"

#create a contrib folder before you download any modules
cd devel/sites/all/modules/
mkdir contrib

#now go back to root devel folder
cd D://wamp/www/devel/

#install all required modules
drush dl admin_menu
drush dl auto_nodetitle
drush dl ckeditor
drush dl ctools
drush dl devel
drush dl entity
drush dl field_group
drush dl module_filter
drush dl rules
drush dl schema
drush dl services
drush dl ubercart
drush dl views
drush dl views_bulk_operations

echo "Completed downloading all the required contrib modules"

cd profiles
cp -r "d://wamp/www/mccee/profiles/meditrainer" "meditrainer"
echo "Copied meditrainer installation profle"

cd D://wamp/www/devel/
cd sites/all/modules

cp -r "d://wamp/www/mccee/sites/all/modules/custom" "custom"
echo "Copied all custom modules"

#now copy spyc.php to services folder
cd d://wamp/www/devel/sites/all/modules/
cp "d://wamp/www/mccee/sites/all/modules/contrib/services/servers/rest_server/lib/spyc.php" "contrib/services/servers/rest_server/lib/"

#if devel db exist,drop it
if  ! mysql -u root -e 'use devel'; then
mysql -u root <<<'create database devel;'
else
#create mysql database devel
	mysql -u root <<<'drop database devel;'
	mysql -u root <<<'create database devel;'
fi

#now install meditrainer profile
cd d://wamp/www/devel/
#drush si meditrainer --db-url=mysql://root:@localhost/devel --account-name=admin 
--account-pass=drupal123 --account-mail=example@domain.com

drush si --db-url=mysql://root:@localhost/devel --account-name=admin 
--account-pass=drupal123 --account-mail=example@domain.com

#echo "Completed installing standard profile, now disable the default-enabled modules
drush pm-disable `drush pm-list --type=module --status=enabled --pipe`

#enable required modules as per meditrainer profile"
drush --yes en block
drush --yes en book
drush --yes en ckeditor
drush --yes en field
drush --yes en field_sql_storage
drush --yes en color
drush --yes en options
drush --yes en file
drush --yes en filter
drush --yes en menu
drush --yes en node
drush --yes en comment
drush --yes en image
drush --yes en contextual
drush --yes en dashboard
drush --yes en dblog
drush --yes en user
drush --yes en text
drush --yes en system
drush --yes en taxonomy
drush --yes en services
drush --yes en rest_server
drush --yes en list
drush --yes en number
drush --yes en field_ui
drush --yes en help
drush --yes en overlay
drush --yes en path
drush --yes en rdf
drush --yes en search
drush --yes en shortcut
drush --yes en trigger
drush --yes en update
drush --yes en admin_menu
drush --yes en admin_menu_toolbar
drush --yes en admin_devel
drush --yes en auto_nodetitle
drush --yes en ctools
drush --yes en devel
drush --yes en devel_node_access
drush --yes en entity
drush --yes en entity_token
drush --yes en field_group
drush --yes en module_filter
drush --yes en rules
drush --yes en rules_scheduler
drush --yes en schema
drush --yes en uc_authorizenet
drush --yes en test_gateway
drush --yes en uc_credit
drush --yes en uc_payment
drush --yes en uc_payment_pack
drush --yes en uc_paypal
drush --yes en uc_attribute
drush --yes en uc_cart
drush --yes en uc_cart_links
drush --yes en uc_order
drush --yes en uc_product
drush --yes en uc_roles
drush --yes en uc_store
drush --yes en views
drush --yes en views_ui
drush --yes en views_bulk_operations
drush --yes en mt_core
drush --yes en mt_memberships
drush --yes en mt_members
drush --yes en mt_mcq
drush --yes en mt_exam
drush --yes en mt_notes
drush --yes en mt_import_export
drush --yes en mt_services
