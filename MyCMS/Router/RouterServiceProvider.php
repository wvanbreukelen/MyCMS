<?php namespace MyCMS\Router;

use MyCMS\ServiceProvider;

class RouterServiceProvider extends ServiceProvider
{

	protected $core = array();
	protected $local = array();

	public function boot()
	{
		$this->registerProvider();
	
	}

	public function register()
	{
		$this->core = $this->access(array('MyCMS\\Http', 'MyCMS\\File'));
		$this->core['File']->add(array(__DIR__ . '\\Router.php'));
		$this->core['File']->add(array(__DIR__ . '\\RouteInterface.php'));
		$this->core['File']->add(array(__DIR__ . '\\Route.php'));
		$this->local = $this->access(array('MyCMS\\Routing\\Router'));
	}

	public function finish()
	{
		$this->local['Router']->setRequest(array('GET' => array('page' => $this->core['Http']->path()), 'POST' => $_POST));
		$this->local['Router']->run();
	}

	public static function instance()
	{
		return $this->core['Router'];
	}
} 