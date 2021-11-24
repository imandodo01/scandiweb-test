<?php

namespace App\Model;

abstract class Product
{

	protected $id;
	protected $sku;
	protected $name;
	protected $price;
	protected $type;

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
	public function price()
	{
		return $this->price . "$";
	}

	abstract protected function measurement();
}
