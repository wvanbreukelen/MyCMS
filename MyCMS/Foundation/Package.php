<?php namespace wvanbreukelen\MyCMS;

use wvanbreukelen\MyCMS\File;
use wvanbreukelen\MyCMS\Application;

class Package
{
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
			$providerObject = new $provider;
			if ($boot == true) 
			{ 

				$providerObject->boot(); 
				Application::addPackage($providerObject);

			}

		}
	}
}