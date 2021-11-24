<?php

namespace App\Model;

class Book extends Product
{
	protected $weight;

	public function measurement()
	{
		return "Weight : {$this->weight} KG";
	}

	public function get_weight()
	{
		return $this->weight;
	}

	public function set_weight($weight)
	{
		$this->weight = $weight;
	}
}
