<?php
	$outpatient_list = new Route("$BASE_URL/patients/outpatients/");
	$outpatient_list->setMapClass("Outpatient")->setMapMethod("view_list");
	$router->addRoute( "outpatient-list", $outpatient_list );

	$outpatient_add = new Route("$BASE_URL/patients/outpatients/add/");
	$outpatient_add->setMapClass("Outpatient")->setMapMethod("add");
	$router->addRoute("outpatient-add",$outpatient_add);

	$outpatient_edit = new Route("$BASE_URL/patients/outpatients/:id/");
	$outpatient_edit->setMapClass("Outpatient")->setMapMethod("view")
				   ->addDynamicElement( ":id", '^\d+$' );
	$router->addRoute("outpatient-view",$outpatient_edit);

	$outpatient_edit = new Route("$BASE_URL/patients/outpatients/:id/edit/");
	$outpatient_edit->setMapClass("Outpatient")->setMapMethod("edit")
				   ->addDynamicElement( ":id", '^\d+$' );
	$router->addRoute("outpatient-edit",$outpatient_edit);

	$outpatient_edit = new Route("$BASE_URL/patients/outpatients/:id/assign-drug/"); 
	$outpatient_edit->setMapClass("Outpatient")->setMapMethod("assign_drug") 
				   ->addDynamicElement( ":id", '^\d+$' );
	$router->addRoute("outpatient-assign",$outpatient_edit);

	$outpatient_edit = new Route("$BASE_URL/patients/outpatients/:id/clear-bill/"); 
	$outpatient_edit->setMapClass("Outpatient")->setMapMethod("clear_bill") 
				   ->addDynamicElement( ":id", '^\d+$' );
	$router->addRoute("outpatient-clear",$outpatient_edit);

	$outpatient_edit = new Route("$BASE_URL/patients/outpatients/:id/clear-bill-approved/"); 
	$outpatient_edit->setMapClass("Outpatient")->setMapMethod("clear_bill_approved") 
				   ->addDynamicElement( ":id", '^\d+$' );
	$router->addRoute("outpatient-clear-approved",$outpatient_edit);

	$outpatient_delete = new Route("$BASE_URL/patients/outpatients/:id/delete/");
	$outpatient_delete->setMapClass("Outpatient")->setMapMethod("delete")
				   ->addDynamicElement(":id", '^\d+$');
	$router->addRoute("outpatient-delete",$outpatient_delete);
?>