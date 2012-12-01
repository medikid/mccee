
echo alias mt-db-login='mysql -u meditrai_dbuser -p'
echo alias mt-db-select='mysql -u meditrai -p <<'use meditrai_meditrainer;''
echo alias mt-db-drop='mysql -u meditrai -p <<'drop database meditrai_meditrainer;''
echo alias mt-db-create='mysql -u meditrai -p <<'create database meditrai_meditrainer;''
echo alias mt-db-logout='exit;'

echo alias mt-home='cd ~' >>
echo alias mt-drupal-home='cd public_html/meditrainer' >>
echo alias mt-drupal-delete='' >>
echo alias mt-drupal-reset=''
echo alias mt-drupal-reinstall=''
echo alias mt-drupal-clone=''

echo alias mt-git-fetch=''
echo alias mt-git-commit=''
echo alias mt-git-merge=''
echo alias mt-git-branch-change=''