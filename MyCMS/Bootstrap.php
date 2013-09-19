<?php

$basePath = BASE_PATH . 'MyCMS' . DS;

require(BASE_PATH . 'vendor' . DS . 'autoload.php');
require($basePath . 'Config' . DS . 'Config.php');


require($basePath . 'Foundation' . DS . 'File.php');
require($basePath . 'Foundation' . DS . 'Package.php');
require($basePath . 'Foundation' . DS . 'ServiceProvider.php');
require($basePath . 'Foundation' . DS . 'Application.php');

use wvanbreukelen\MyCMS\Application;
use wvanbreukelen\MyCMS\Package;
use wvanbreukelen\MyCMS\Database\DatabaseServiceProvider;

Package::load('Database');
Package::loadProviders();


$app = new Application();

//$app->addPackage($package);
$app->printPackages();