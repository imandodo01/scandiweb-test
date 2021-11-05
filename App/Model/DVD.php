<?php

namespace App\Model;

class DVD extends Product
{
	public function measurement()
	{
		return "Size : {$this->size}";
	}
}
