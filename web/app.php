<?php
require_once __DIR__ . '/../app/bootstrap.php.cache';
require_once __DIR__ . '/../app/AppKernel.php';

//require_once __DIR__.'/../app/AppCache.php';

use Symfony\Component\HttpFoundation\Request;

$environment = isset($_SERVER['ENVIRONMENT']) ? $_SERVER['ENVIRONMENT'] : 'prod';

$debug = ($environment == 'dev') ? true : false;

$kernel = new AppKernel($environment, $debug);
$kernel->loadClassCache();
//$kernel = new AppCache($kernel);
$kernel->handle(Request::createFromGlobals())->send();