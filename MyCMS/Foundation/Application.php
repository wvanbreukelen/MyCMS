<?php namespace MyCMS;

use MyCMS\ServiceProvider;
use MyCMS\Alias\AliasLoader;
use MyCMS\Package;
use MyCMS\Http;

class Application
{
	protected static $packages = array();

	public static function addPackage($provider)
	{
		$parameters = $provider->getParameters();
		self::$packages[$parameters['packageObject']['name']] = new $parameters['packageObject']['value'];
	}

	public static function accessPackage($package)
	{
		return self::$packages[$package];
	}

	public function loadAliases()
	{
		global $aliases;

		$aliasLoader = new AliasLoader();

		foreach ($aliases as $aliasName => $class)
		{
			$aliasLoader->createAlias($aliasName, $class);
		}
	}

	public function loadPackages()
	{
		global $packages;

		foreach ($packages as $package)
		{
			Package::load($package);
		}
	}

	public function loadProviders()
	{
		Package::loadProviders();
	}



	public function shutdown()
	{

		foreach (Package::getProvidersInstance() as $provider)
		{
			if (method_exists($provider, 'finish'))
			{
				$provider->finish();
			}
		}
	}

	public function getURI()
	{
		$html = new Http();
		echo $html->path();
	}
}