<?php namespace MyCMS\Database;

use Illuminate\Database\Capsule\Manager as Database;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

class DB extends Database
{

	protected $database;

	public function setup()
	{
		$this->database = $this;

		$this->database->addConnection([
		    'driver'    => 'mysql',
		    'host'      => 'localhost',
		    'database'  => 'database',
		    'username'  => 'root',
		    'password'  => 'password',
		    'charset'   => 'utf8',
		    'collation' => 'utf8_unicode_ci',
		    'prefix'    => '',
		]);

		// Set the event dispatcher used by Eloquent models... (optional)
		$this->database->setEventDispatcher(new Dispatcher(new Container));

		$this->database->setAsGlobal();

		$this->database->bootEloquent();

	}

	public static function ac()
	{
		return $this->database;
	}

	public function getNamespace()
	{
		return __NAMESPACE__;
	}
}