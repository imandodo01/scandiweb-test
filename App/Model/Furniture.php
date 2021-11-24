<?php

namespace App\Model;

class Furniture extends Product
{
	protected $height;
	protected $width;
	protected $length;

	public function measurement()
	{
		return "Dimension : {$this->height}x{$this->width}x{$this->length}";
	}

	public function get_height()
	{
		return $this->height;
	}

	public function set_height($height)
	{
		$this->height = $height;
	}

	public function get_width()
	{
		return $this->width;
	}

	public function set_width($width)
	{
		$this->width = $width;
	}

	public function get_length()
	{
		return $this->length;
	}

	public function set_length($length)
	{
		$this->length = $length;
	}
}
