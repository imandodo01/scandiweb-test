<?php

namespace App\Model;

class Furniture extends Product
{
	public function measurement()
	{
		return "Dimension : {$this->height}x{$this->width}x{$this->length}";
	}
}
