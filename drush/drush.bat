@echo off
rem Drush automatically determines the user's home directory by checking for
rem HOME or HOMEDRIVE/HOMEPATH environment variables, and the temporary
rem directory by checking for TEMP, TMP, or WINDIR environment variables.
rem The home path is used for caching Drush commands and the git --reference
rem cache. The temporary directory is used by various commands, including
rem package manager for downloading projects.
rem You may want to specify a path that is not user-specific here; e.g., to
rem keep cache files on the same filesystem, or to share caches with other
rem users.

set HOME=D:/wamp/www/mccee/drush
rem set TEMP=H:/drush

REM See http://drupal.org/node/506448 for more information.
rem @php.exe "%~dp0drush.php" --php="php.exe" %*
@php.exe D:/wamp/www/mccee/drush/drush.php %1 %2 %3 %4 %5 %6 %7 %8 %9