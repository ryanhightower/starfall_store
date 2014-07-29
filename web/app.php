<?php

use Symfony\Component\ClassLoader\ApcClassLoader;
use Symfony\Component\HttpFoundation\Request;

//$loader = require_once __DIR__.'/../app/bootstrap.php.cache';
$loader = require_once __DIR__.'/../app/autoload.php';

//$loader = new ApcClassLoader('sylius', $loader);
//$loader->register(true);

require_once __DIR__.'/../app/AppKernel.php';
//require_once __DIR__.'/../app/AppCache.php';

$kernel = new AppKernel('prod', true);
//$kernel = new AppCache($kernel);

$request = Request::createFromGlobals();

Request::enableHttpMethodParameterOverride();

$response = $kernel->handle($request);
$response->send();

$kernel->terminate($request, $response);
