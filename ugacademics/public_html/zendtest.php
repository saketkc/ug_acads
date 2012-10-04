<?
$path = '/home/ugacademics/public_html/zend_sandbox/zend/library';
set_include_path(get_include_path() . PATH_SEPARATOR . $path);
require_once 'Zend/Loader.php';
Zend_Loader::loadClass('Zend_Http_Client_Adapter_Proxy');
Zend_Loader::loadClass('Zend_Gdata');
Zend_Loader::loadClass('Zend_Gdata_App_HttpException');
Zend_Loader::loadClass('Zend_Gdata_AuthSub'); 
Zend_Loader::loadClass('Zend_Gdata_ClientLogin'); 
Zend_Loader::loadClass('Zend_Gdata_Docs');
Zend_Loader::loadClass('Zend_Gdata_App_HttpException');
Zend_Loader::loadClass('Zend_Gdata_ClientLogin');
Zend_Loader::loadClass('Zend_Gdata_Docs');

Zend_Loader::loadClass('Zend_Http_Client_Exception');
Zend_Loader::loadClass('Zend_Http_Client');
Zend_Loader::loadClass('Zend_Http_Client_Adapter_Proxy');
// Configure the proxy connection with your hostname and portnumber
$config = array(
    'adapter'    => 'Zend_Http_Client_Adapter_Proxy',
    'proxy_host' => 'netmon.iitb.ac.in',
    'proxy_port' => 80,
    'proxy_user' => 'saket.kumar',
    'proxy_pass' => 'thisisit1314.'
);
$proxiedHttpClient = new Zend_Http_Client('http://www.google.com:443', $config);
$username = 'ugacads.iitb@gmail.com';
$password = 'fedora13';

// The service name would depend on what API you are interacting with, here
// we are using the Google DocumentsList Data API
$service = Zend_Gdata_Docs::AUTH_SERVICE_NAME;
// Try to perform the ClientLogin authentication using our proxy client.
// If there is an error, we exit since it doesn't make sense to go on.
try {

  // Note that we are creating another Zend_Http_Client
  // by passing our proxied client into the constructor.

  $httpClient = Zend_Gdata_ClientLogin::getHttpClient(
      $username, $password, $service, $proxiedHttpClient);

} catch (Zend_Gdata_App_HttpException $httpException) {

  // You may want to handle this differently in your application
  exit("An error occurred trying to connect to the proxy server\n" .        
      $httpException->getMessage() . "\n");

} 
?>


