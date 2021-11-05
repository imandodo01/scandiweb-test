<?php

namespace App\Lib;

class Database
{
  	private static $instance = NULL;
	public static function getInstance()
	{
		if(!isset(self::$instance)){
			self::$instance = mysqli_connect("localhost","root","","assignment2");
		}
		return self::$instance;
	}
}
