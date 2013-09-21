<?php namespace MyCMS\Alias;

class AliasLoader
{
	public function createAlias($name, $class)
	{
		class_alias($class, $name);
	}
}