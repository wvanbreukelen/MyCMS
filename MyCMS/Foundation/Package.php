<?php namespace MyCMS;

use MyCMS\File;
use MyCMS\Application;

class Package
{

	protected static $serviceProviders = array();

	public static function load($package)
	{
		$path = BASE_PATH . 'MyCMS' . DS . $package . DS . $package . 'ServiceProvider.php';
		if (File::exists($path))
		{
			File::requireFile($path);
		}
	}

	public static function loadProviders($boot = true)
	{
		global $serviceProviders;
		foreach ($serviceProviders as $provider)
		{
			self::$serviceProviders[] = new $provider;
		}

		foreach (self::$serviceProviders as $providerObject)
		{
			if ($boot == true) 
			{ 

				$providerObject->register();
				$providerObject->boot(); 
				Application::addPackage($providerObject);

			}
		}
	}

	public static function getProvidersInstance()
	{
		return self::$serviceProviders;
	}
}