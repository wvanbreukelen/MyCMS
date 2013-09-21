<?php namespace MyCMS;

use MyCMS\Package;

abstract class ServiceProvider extends Package 
{

	protected static $providers = array();
	protected static $param = array();
	public $holding;
	protected $packageObjects = array();

	abstract public function boot();
	abstract protected function register();

	public function registerProvider($params = array())
	{
		self::$providers[] = get_class($this);
		$params['packageObject'] = get_class($this);
		$params['packageObject2'] = get_class($this);
		$this->holding = get_class($this);
		foreach ($params as $parameter => $parameterOptional)
		{
			self::$param[$this->holding][$parameter] = array('name' => $parameter, 'value' => $parameterOptional);
		}
	}

	public function getParameters($provider = null)
	{
		if (is_null($provider))
		{
			$provider = $this->holding;
		}

		return self::$param[$provider];
	}

	protected function guessNamespaces()
	{
		foreach ($this->packageObjects as $object)
		{
			
		}
	}

	protected function access(array $packages = array())
	{
		$result = array();
		foreach ($packages as $package)
		{
			$pName = explode('\\', $package);
			$pName = end($pName);
			$result[$pName] = $this->loadFormCore($package);
		}
		return $result;
	}

	protected function loadFormCore($package)
	{
		// Load the core element by this namespace
		//require(BASE_PATH . 'MyCMS' . DS . 'Database' . DS . 'DatabaseClass.php');
		return new $package;
		
	}
}