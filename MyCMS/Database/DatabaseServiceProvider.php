<?php namespace MyCMS\Database;

use MyCMS\ServiceProvider;

class DatabaseServiceProvider extends ServiceProvider 
{

	private $core;
	private $general;

	public function boot()
	{
		// Register the package to our application
		$this->registerProvider();
	    
		$this->general['DB']->setup();

	}

	public function register()
	{
		 $this->core = $this->access(array('MyCMS\\File', 'MyCMS\\Package'));
		 $this->core['File']->add(array(__DIR__ . '\\Database.php'));
		 $this->general = $this->access(array('\\MyCMS\\Database\\DB'));
	}
}