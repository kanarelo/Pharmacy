<?php
	$search = new Route("$BASE_URL/search/");
	$search->setMapClass("Default")->setMapMethod("search");
	$router->addRoute( "search", $search );

	$user_search = new Route("$BASE_URL/search/users/");
	$user_search->setMapClass("User")->setMapMethod("search");
	$router->addRoute( "user-search", $user_search );
	
	$user_search = new Route("$BASE_URL/search/products/");
	$user_search->setMapClass("Product")->setMapMethod("search");
	$router->addRoute( "product-search", $user_search );
?>