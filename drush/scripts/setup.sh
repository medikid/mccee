#!/usr/bin/sh

cd d://wamp/www/devel

#enable the meditrainer required modules
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

#echo "Completed enabling required modules as per meditrainer profile"