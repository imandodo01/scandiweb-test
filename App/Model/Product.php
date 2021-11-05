<?php

namespace App\Model;

abstract class Product
{

	protected $id;
	protected $sku;
	protected $name;
	protected $price;
	protected $type;
	protected $height;
	protected $width;
	protected $length;
	protected $size;
	protected $weight;

	public function get_id()
	{
		return $this->id;
	}

	public function set_id($id)
	{
		$this->id = $id;
	}

	public function get_sku()
	{
		return $this->sku;
	}

	public function set_sku($sku)
	{
		$this->sku = $sku;
	}

	public function get_name()
	{
		return $this->name;
	}

	public function set_name($name)
	{
		$this->name = $name;
	}

	public function get_price()
	{
		return $this->price;
	}

	public function set_price($price)
	{
		$this->price = $price;
	}

	public function get_type()
	{
		return $this->type;
	}

	public function set_type($type)
	{
		$this->type = $type;
	}

	public function get_weight()
	{
		return $this->weight;
	}

	public function set_weight($weight)
	{
		$this->weight = $weight;
	}

	public function get_size()
	{
		return $this->size;
	}

	public function set_size($size)
	{
		$this->size = $size;
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

	public function price()
	{
		return $this->price . "$";
	}

	abstract protected function measurement();
}
