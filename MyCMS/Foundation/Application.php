<?php namespace wvanbreukelen\MyCMS;

use wvanbreukelen\MyCMS\ServiceProvider;

class Application
{
	protected static $packages = array();

	public static function addPackage($provider)
	{
		$parameters = $provider->getParameters();
		self::$packages[$parameters['packageObject']['name']] = new $parameters['packageObject']['value'];
	}

	public function printPackages()
	{
		print_r(self::$packages);
	}

	public static function accessPackage($package)
	{
		return $this->packages[$package];
	}
}