<?php

namespace App\Model;

class Book extends Product
{
	public function measurement()
	{
		return "Weight : {$this->weight} KG";
	}
}
