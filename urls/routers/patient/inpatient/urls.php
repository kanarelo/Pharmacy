<?php
	$inpatient_list = new Route("$BASE_URL/patients/inpatients/");
	$inpatient_list->setMapClass("Inpatient")->setMapMethod("view_list");
	$router->addRoute( "inpatient-list", $inpatient_list );
	
	$inpatient_add = new Route("$BASE_URL/patients/inpatients/add/");
	$inpatient_add->setMapClass("Inpatient")->setMapMethod("add");
	$router->addRoute("inpatient-add",$inpatient_add);
	
	$inpatient_edit = new Route("$BASE_URL/patients/inpatients/:id/");
	$inpatient_edit->setMapClass("Inpatient")->setMapMethod("view")
				   ->addDynamicElement( ":id", '^\d+$' );
	$router->addRoute("inpatient-view",$inpatient_edit);
	
	$inpatient_edit = new Route("$BASE_URL/patients/inpatients/:id/edit/");
	$inpatient_edit->setMapClass("Inpatient")->setMapMethod("edit")
				   ->addDynamicElement( ":id", '^\d+$' );
	$router->addRoute("inpatient-edit",$inpatient_edit);
	
	$inpatient_edit = new Route("$BASE_URL/patients/inpatients/:id/assign-drug/"); 
	$inpatient_edit->setMapClass("Inpatient")->setMapMethod("assign_drug") 
				   ->addDynamicElement( ":id", '^\d+$' );
	$router->addRoute("inpatient-assign",$inpatient_edit);
	
	$inpatient_edit = new Route("$BASE_URL/patients/inpatients/:id/clear-bill/"); 
	$inpatient_edit->setMapClass("Inpatient")->setMapMethod("clear_bill") 
				   ->addDynamicElement( ":id", '^\d+$' );
	$router->addRoute("inpatient-clear",$inpatient_edit);
	
	$inpatient_delete = new Route("$BASE_URL/patients/inpatients/:id/delete/");
	$inpatient_delete->setMapClass("Inpatient")->setMapMethod("delete")
				   ->addDynamicElement(":id", '^\d+$');
	$router->addRoute("inpatient-delete",$inpatient_delete);
?>