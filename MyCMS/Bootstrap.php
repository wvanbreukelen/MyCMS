<?php

$basePath = BASE_PATH . 'MyCMS' . DS;

require(BASE_PATH . 'vendor' . DS . 'autoload.php');
require($basePath . 'Config' . DS . 'Config.php');


require($basePath . 'Foundation' . DS . 'File.php');
require($basePath . 'Foundation' . DS . 'Package.php');
require($basePath . 'Foundation' . DS . 'Http.php');
require($basePath . 'Foundation' . DS . 'AliasLoader.php');
require($basePath . 'Foundation' . DS . 'ServiceProvider.php');
require($basePath . 'Foundation' . DS . 'Application.php');


use MyCMS\Application;
use MyCMS\Package;
use MyCMS\Database\DatabaseServiceProvider;




$app = new Application();


/**
* Load the packages for our application
*/


$app->loadPackages();

/**
* Load the provider for our packages to use those for our application
*/

$app->loadProviders();

/**
* Load the aliases for our application specified in the config file
*/

$app->loadAliases();

/**
* Shutdown our application
*/

$app->shutdown();
