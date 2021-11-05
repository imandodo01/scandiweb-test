<?php

namespace App\Repository;

use App\Lib\Database;
use App\Model\Book;
use App\Model\DVD;
use App\Model\Furniture;
use App\Model\Product;
use App\Lib\Logger;
use Exception;

class ProductRepository
{

	public static function all()
	{
		$list = [];
		$db = Database::getInstance();
		$result = mysqli_query($db, 'SELECT * FROM product');

		while ($row = mysqli_fetch_assoc($result)) {
			$class = "App\\Model\\{$row['type']}";
			$product = new $class($row);
			$product->set_id($row['id']);
			$product->set_sku($row['sku']);
			$product->set_name($row['name']);
			$product->set_price($row['price']);
			$product->set_type($row['type']);
			$product->set_weight($row['weight']);
			$product->set_size($row['size']);
			$product->set_height($row['height']);
			$product->set_width($row['width']);
			$product->set_length($row['length']);
			$list[] = $product;
		}

		return $list;
	}

	public static function get($product_id)
	{
		$db = Database::getInstance();
		if ($result = mysqli_query($db, "SELECT * FROM product where id = $product_id")) {
			$row = mysqli_fetch_assoc($result);
			$class = "App\\Model\\{$row['type']}";
			$product = new $class($row);
			$product->set_id($row['id']);
			$product->set_sku($row['sku']);
			$product->set_name($row['name']);
			$product->set_price($row['price']);
			$product->set_type($row['type']);
			$product->set_weight($row['weight']);
			$product->set_size($row['size']);
			$product->set_height($row['height']);
			$product->set_width($row['width']);
			$product->set_length($row['length']);
			return $product;
		} else {
			return new Book();
		}
	}

	public static function searchSku($product)
	{
		$db = Database::getInstance();
		if ($result = mysqli_query($db, "SELECT * FROM product where sku = '{$product->get_sku()}'")) {
			$row = mysqli_num_rows($result);
			if ($row > 0) return true;
			else return false;
		} else {
			return false;
		}
	}

	public static function delete($ids)
	{
		$db = Database::getInstance();
		$id = '';
		foreach ($ids as $row) {
			if ($id != '') $id .= ',';
			$id .= $row;
		}
		$result = mysqli_query($db, "delete from product where id in ($id)");
		Logger::enableSystemLogs();
		$logger = Logger::getInstance();
		$logger->info(mysqli_error($db));
		return true;
	}

	public static function insert(Product $product)
	{

		$db = Database::getInstance();
		$result = mysqli_query($db, "Insert into product (sku, name,price, type, height, width, length, size, weight) values ('{$product->get_sku()}','{$product->get_name()}','{$product->get_price()}','{$product->get_type()}',{$product->get_height()},{$product->get_width()},{$product->get_length()},{$product->get_size()},{$product->get_weight()})");
		$product->set_id(mysqli_insert_id($db));
		return $product;
	}
}
