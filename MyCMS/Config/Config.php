<?php

$packages = array(
    'Database',
    'Router',

    
);

$serviceProviders = array(
	'MyCMS\Database\DatabaseServiceProvider',
	'MyCMS\Router\RouterServiceProvider',


);

$aliases = array(
	'App' => 'MyCMS\Application',
	'File' => 'MyCMS\File',
	'Route' => 'MyCMS\Routing\RouteInterface',

);