<?php namespace MyCMS\Routing;

use MyCMS\Router\RouterServiceProvider;

class Route implements RouteInterface
{

	private $router;

	public function __construct()
	{
		$this->router = RouterServiceProvider::instance();
	}

	public function post($path, $destination)
	{
		$this->router->getByGET($path, $destination);
	}

	public function get($path, $destination)
	{
		$this->router->getByGET($path, $destination);
	}

	public function any($path, $destination)
	{
		$this->router->getByGET($path, $destination);
	}
}