<?php namespace MyCMS;

class Http
{

	protected $path;

	public function path()
	{
		if (isset($_GET['page']))
		{
			$this->path = $_GET['page'];
			return trim($this->path);
		}
	}

	public function getController()
	{
		$explod = explode('/', $this->path);
		return trim($explod[0]);
	}

	public function getControllerAction()
	{
		$explod = explode('/', $this->path);
		return isset($explod[1]) ? trim($explod[1]) : false;
	}
}