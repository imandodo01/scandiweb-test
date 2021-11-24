<?php

namespace App\Model;

class DVD extends Product
{
	protected $size;

	public function measurement()
	{
		return "Size : {$this->size}";
	}

	public function get_size()
	{
		return $this->size;
	}

	public function set_size($size)
	{
		$this->size = $size;
	}
}
