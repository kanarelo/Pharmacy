<?php
	require_once('category/urls.php');

	$product_list = new Route("$BASE_URL/products/");
	$product_list->setMapClass('Product')->setMapMethod('view_list');
	$router->addRoute('product-list', $product_list);
	
	$product_view = new Route("$BASE_URL/products/:id/");
	$product_view->setMapClass("Product")->setMapMethod("view")
				   ->addDynamicElement(":id", '^\d+$');
	$router->addRoute("product-view",$product_view);
	
	$product_feedback = new Route("$BASE_URL/products/:id/:status/");
	$product_feedback->setMapClass("Product")->setMapMethod("feedback")
					->addDynamicElement( ":status", '^(approve|disapprove)$')
					->addDynamicElement(":id", '^\d+$');
	$router->addRoute("product-feedback",$product_feedback);

	$product_add = new Route("$BASE_URL/admin/products/add/");
	$product_add->setMapClass("Product")->setMapMethod("add");
	$router->addRoute("product-add",$product_add);
	
	$product_edit = new Route("$BASE_URL/admin/products/:id/edit/");
	$product_edit->setMapClass("Product")->setMapMethod("edit")
				   ->addDynamicElement( ":id", '^\d+$' );
	$router->addRoute("product-edit",$product_edit);
	
	$product_delete = new Route("$BASE_URL/admin/products/:id/delete/");
	$product_delete->setMapClass("Product")->setMapMethod("delete")
				   ->addDynamicElement(":id", '^\d+$');
	$router->addRoute("product-delete",$product_delete);	
?>