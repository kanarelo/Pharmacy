<?php
	require_once("auth/urls.php");
	require_once('patient/inpatient/urls.php');
	require_once('patient/outpatient/urls.php');
	require_once("product/urls.php");
	require_once("staff/urls.php");
	require_once("ward/urls.php");
	require_once("prescription/urls.php");
	require_once("search_urls.php");
	
	//setup the default url
	$default_route = new Route("$BASE_URL/");
	$default_route->setMapClass("Default")->setMapMethod("index");
	$router->addRoute( "default", $default_route );
	
	$user_dashboard = new Route("$BASE_URL/dashboard/");
	$user_dashboard->setMapClass("Default")->setMapMethod("user_dashboard");
	$router->addRoute( "user-dashboard", $user_dashboard );
	
	$admin_dashboard = new Route("$BASE_URL/dashboard/admin/");
	$admin_dashboard->setMapClass("Default")->setMapMethod("admin_dashboard");
	$router->addRoute( "admin-dashboard", $admin_dashboard );
	
	$contacts = new Route("$BASE_URL/contacts/");
	$contacts->setMapClass("Default")->setMapMethod("contacts");
	$router->addRoute( "contacts", $contacts );
	
	$feedback = new Route("$BASE_URL/reports/feedback/");
	$feedback->setMapClass("Default")->setMapMethod("feedback");
	$router->addRoute( "feedback", $feedback );
?>