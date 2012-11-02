The tests directory contains the tests for the amfserver via the simpletest framework (the 'Testing module' in D7 core).
To enable the testing without an actionscript client the SabreAMF library is used to function as an AMF client.
The SabreAMF library can be found at http://code.google.com/p/sabreamf/.
for testing, the latest version of SabreAMF is used: version 1.3.234

In order to run the tests
- download the right version of SabreAMF
- unzip it.
- enter the folder SabreAMF-1.3.234, for reference we will call it folder A
- you will see another folder in that folder A called SabreAMF-1.3.234 and this one contains the actual classes and code. we will call this folder B.
- rename folder B to SabreAMF (case sensitive), we will now refer to it as folder C
- copy folder C to your drupal setup sites/all/libraries, the same folder as where the Zend library is located
- the end result will be: sites/all/libraries/SabreAMF and in this folder you will find the code of SabreAMF.
- enable the Testing module.
- make sure the right endpoint is already enabled. The testing framework gave me some troubles if I had not first made an endpoint at path 'amf'
- enable the right resources to be able to run the tests.
- run the amfserver tests if you like.
- as of yet, the tests are a work in progress. The module has been tested in production use, via the flash 'testsuite' and via the simpletest framewok.