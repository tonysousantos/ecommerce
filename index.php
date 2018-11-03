<?php 
session_start();
require_once("vendor/autoload.php");

use \Slim\Slim;

$app = new Slim();

$app->config('debug', true);

//require_once("functions.php");
require_once("site.php");
require_once("admin-admin.php");
require_once("admin-users.php");
require_once("admin-categories.php");
require_once("admin-products.php");
//require_once("admin-orders.php");

$app->get("/categories/:idcategory", function($idcategory){

	$category = new Category();
	
	$category->get((int)$idcategory);

	$page = new Page();
	
	$page->setTpl("category", [
		'category'=>$category->getValues(),
		'products'=>[]
	]);

});

$app->run();

 ?>