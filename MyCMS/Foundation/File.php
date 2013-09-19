<?php namespace wvanbreukelen\MyCMS;

class File
{
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