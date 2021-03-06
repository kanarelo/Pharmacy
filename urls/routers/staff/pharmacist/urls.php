<?php
	$pharmacist_list = new Route("$BASE_URL/staff/pharmacists/");
	$pharmacist_list->setMapClass("Pharmacist")->setMapMethod("view_list");
	$router->addRoute( "pharmacist-list", $pharmacist_list );
	
	$pharmacist_view = new Route("$BASE_URL/admin/staff/pharmacists/:id/");
	$pharmacist_view->setMapClass("Pharmacist")->setMapMethod("view")
				   ->addDynamicElement(":id", '^\d+$');
	$router->addRoute("pharmacist-view",$pharmacist_view);
	
	$pharmacist_add = new Route("$BASE_URL/admin/staff/pharmacists/add/");
	$pharmacist_add->setMapClass("Pharmacist")->setMapMethod("add");
	$router->addRoute("pharmacist-add",$pharmacist_add);
	
	$pharmacist_edit = new Route("$BASE_URL/admin/staff/pharmacists/:id/edit/");
	$pharmacist_edit->setMapClass("Pharmacist")->setMapMethod("edit")
				   ->addDynamicElement( ":id", '^\d+$' );
	$router->addRoute("pharmacist-edit",$pharmacist_edit);
	
	$pharmacist_delete = new Route("$BASE_URL/admin/staff/pharmacists/:id/delete/");
	$pharmacist_delete->setMapClass("Pharmacist")->setMapMethod("delete")
				   ->addDynamicElement(":id", '^\d+$');
	$router->addRoute("pharmacist-delete",$pharmacist_delete);
	
?>