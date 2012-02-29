<?php
	$outpatient_list = new Route("$BASE_URL/patients/outpatients/");
	$outpatient_list->setMapClass("Outpatient")->setMapMethod("view_list");
	$router->addRoute( "outpatient-list", $outpatient_list );
	
	$outpatient_add = new Route("$BASE_URL/patients/outpatients/add/");
	$outpatient_add->setMapClass("Outpatient")->setMapMethod("add");
	$router->addRoute("outpatient-add",$outpatient_add);
	
	$outpatient_edit = new Route("$BASE_URL/patients/outpatients/:id/edit/");
	$outpatient_edit->setMapClass("Outpatient")->setMapMethod("edit")
				   ->addDynamicElement( ":id", '^\d+$' );
	$router->addRoute("outpatient-edit",$outpatient_edit);
	
	$outpatient_delete = new Route("$BASE_URL/patients/outpatients/:id/delete/");
	$outpatient_delete->setMapClass("Outpatient")->setMapMethod("delete")
				   ->addDynamicElement(":id", '^\d+$');
	$router->addRoute("outpatient-delete",$outpatient_delete);
	
?>