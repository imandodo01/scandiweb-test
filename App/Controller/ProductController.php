<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use App\Model\Book;
use App\Model\DVD;
use App\Model\Furniture;
use App\Lib\Response;
use stdClass;

class ProductController
{
	public $url = 'https://c894-125-163-59-33.ngrok.io';
	public function index()
	{
		$products = ProductRepository::all();
		require_once("App/View/index.php");
	}

	public function add()
	{
		$products = ProductRepository::all();
		require_once("App/View/form.php");
	}

	public function insert()
	{
		$body = json_decode(file_get_contents('php://input'));
		$class = "App\\Model\\{$body->type}";
		$product = new $class();
		$product->set_sku($body->sku);
		$product->set_name($body->name);
		$product->set_price($body->price);
		$product->set_type($body->type);
		$product->set_weight($body->weight == '' ? 'null' : $body->weight);
		$product->set_size($body->size == '' ? 'null' : $body->size);
		$product->set_height($body->height == '' ? 'null' : $body->height);
		$product->set_width($body->width == '' ? 'null' : $body->width);
		$product->set_length($body->length == '' ? 'null' : $body->length);


		$sku = ProductRepository::searchSku($product);
		if ($sku) {
			echo "0";
		} else {
			$products = ProductRepository::insert($product);
			echo "1";
		}
	}

	public function delete()
	{
		$body = json_decode(file_get_contents('php://input'));
		$product = ProductRepository::delete($body->id);
	}
}
