<?php
	$ward_list = new Route("$BASE_URL/wards/");
	$ward_list->setMapClass('Ward')->setMapMethod('view_list');
	$router->addRoute('ward-list', $ward_list);
	
	$ward_view = new Route("$BASE_URL/wards/:id/");
	$ward_view->setMapClass("Ward")->setMapMethod("view")
				   ->addDynamicElement(":id", '^\d+$');
	$router->addRoute("ward-view",$ward_view);
	
	$ward_add = new Route("$BASE_URL/admin/wards/add/");
	$ward_add->setMapClass("Ward")->setMapMethod("add");
	$router->addRoute("ward-add",$ward_add);
	
	$ward_edit = new Route("$BASE_URL/admin/wards/:id/edit/");
	$ward_edit->setMapClass("Ward")->setMapMethod("edit")
				   ->addDynamicElement( ":id", '^\d+$' );
	$router->addRoute("ward-edit",$ward_edit);
	
	$ward_delete = new Route("$BASE_URL/admin/wards/:id/delete/");
	$ward_delete->setMapClass("Ward")->setMapMethod("delete")
				   ->addDynamicElement(":id", '^\d+$');
	$router->addRoute("ward-delete",$ward_delete);	
?>