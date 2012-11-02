amfserver

DESCRIPTION
-----------
This module provides amf support to the Services module for Drupal 7. This module uses Zend Amf classes to provide support for services defined in the service api. 

INSTALLATION
------------
- make sure the services module (7.x-3.x) is installed or install it first.
- Place the entire amfserver folder in sites/all/modules (sites/all/modules/amfserver
- Download the Zend Framework (http://www.zend.com/) and place it in sites/all/libraries with the name 'Zend' (sites/all/libraries/Zend). 
  If the sites/all/libraries directory is not present, create it first.
  The main thing is that the Amf code is included. all other functionality in the Zend framework is a bonus.
- Enable the amfserver module in the modules section
- set permissions if necessary
- create the service endpoint for the amfserver and configure the resources
- visit the endpoint by going to the url www.yoursite.com/<endpoint>  (replace what needs replacing in that url :))
- create your actionscript client (I recommend the opensource drupal package by dpdk: http://www.dpdk.nl/opensource, both for drupal 6 and drupal 7 flash integration)


 -- CONTACT --
 
Current maintainers:
Rolf Vreijdenberger - http://groups.drupal.org/user/33076
 
This project has been sponsored by:
dpdk
Visit http://www.dpdk.nl for more information.
 