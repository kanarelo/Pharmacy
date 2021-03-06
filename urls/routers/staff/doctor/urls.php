<?php
	$doctor_list = new Route("$BASE_URL/admin/staff/doctors/");
	$doctor_list->setMapClass("Doctor")->setMapMethod("view_list");
	$router->addRoute( "doctor-list", $doctor_list );
	
	$doctor_add = new Route("$BASE_URL/admin/staff/doctors/add/");
	$doctor_add->setMapClass("Doctor")->setMapMethod("add");
	$router->addRoute("doctor-add",$doctor_add);
	
	$doctor_edit = new Route("$BASE_URL/admin/staff/doctors/:id/edit/");
	$doctor_edit->setMapClass("Doctor")->setMapMethod("edit")
				   ->addDynamicElement( ":id", '^\d+$' );
	$router->addRoute("doctor-edit",$doctor_edit);
	
	$doctor_delete = new Route("$BASE_URL/admin/staff/doctors/:id/delete/");
	$doctor_delete->setMapClass("Doctor")->setMapMethod("delete")
				   ->addDynamicElement(":id", '^\d+$');
	$router->addRoute("doctor-delete",$doctor_delete);
?>