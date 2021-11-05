<?php
require __DIR__ . '/vendor/autoload.php';

use App\Lib\App;
use App\Lib\Router;
use App\Lib\Request;
use App\Lib\Response;
use App\Controller\ProductController;

Router::get('/', function () {
	(new ProductController())->index();
});

Router::get('/add-product', function () {
	(new ProductController())->add();
});

Router::post('/insert', function () {
	(new ProductController())->insert();
});

Router::post('/delete', function () {
	(new ProductController())->delete();
});

App::run();
