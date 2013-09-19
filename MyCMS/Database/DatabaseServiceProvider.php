<?php namespace wvanbreukelen\MyCMS\Database;

use wvanbreukelen\MyCMS\ServiceProvider;

class DatabaseServiceProvider extends ServiceProvider 
{

	public function boot()
	{
		// Register the package to our application
		$this->register();

		// Any other startup method
		// ...
	}
}