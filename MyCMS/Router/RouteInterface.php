<?php namespace MyCMS\Routing;

interface RouteInterface
{
	public function get($path, $destination);
	public function post($path, $destination);
	public function any($path, $destination);
}