<?php namespace MyCMS;

class File
{

	public function add(array $files = array())
	{
		foreach ($files as $file)
		{

			if (self::exists($file))
			{
				require($file);
			} else {
				echo 'File ' . $file . ' is not found!';
			}
		}
	}

	public function getNamespace()
	{
		return __NAMESPACE__;
	}

	public static function requireFile($filePath)
	{
		require($filePath);
	}

	public static function requireFileOnce()
	{

	}

	public static function exists($filePath)
	{
		if (file_exists($filePath))
		{
			return true;
		}
		return false;
	}

	public static function readable($filePath)
	{
		if (is_readable($filePath))
		{
			return true;
		}
		return false;
	}
}