<?php namespace wvanbreukelen\MyCMS;

use wvanbreukelen\MyCMS\Package;

abstract class ServiceProvider extends Package 
{

	protected static $providers = array();
	protected static $param = array();
	public $holding;

	abstract public function boot();

	public function register($params = array())
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

	protected function access(array $packages = array())
	{
		foreach ($packages as $package)
		{	
			$this->load();
		}
	}
}