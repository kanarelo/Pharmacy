<?php
	class WardController{
		public function add($args){
			$request = $args["request"];
			global $router, $smarty;
			userIsAdmin($request->user);
			
			if ($request->method == "POST"){
				$new_ward = R::graph($request->POST['ward']);
				
				$_id = R::store($new_ward);
				if($_id){
					redirectToPage('ward-list');
				}
			}
			
			$smarty->assign("ward", R::dispense('ward'));

			$smarty->assign("categories", R::find('category'));
			$smarty->assign("request", $request);
			$smarty->display('ward/edit.tpl');
		}
		
		public function edit($args){
			$request = $args["request"];
			global $smarty;
			userIsAdmin($request->user);
			
			$id = $args[":id"];
			$ward = R::load("ward", $id);
			
			if(!$ward->id){
				PageError::show('404',NULL,'Ward not found!', "Ward with Id: $id not found!");
				die();
			}
			
			if ($request->method == "POST"){
				if($ward->id){
					$edited_ward = R::graph($request->POST['ward']);
					$edited_ward->id = $id;
					
					$_id = R::store($edited_ward);
					if ($_id){
						redirectToPage('ward-list');
					}
				}
			}else if ($request->method == "GET"){
				if ($ward->id){
					$smarty->assign("ward", $ward);
				}else{
					PageError::show('404',NULL,'Ward not found!', "Ward with Id: $id not found!");
					die();
				}
			}
			
			$smarty->assign("categories", R::find('category'));
			$smarty->assign("request", $request);
			$smarty->display('ward/edit.tpl');
		}
		
		public function view($args){
			$request = $args["request"];
			checkLoggedIn($request->user);
			global $smarty;
			
			if ($request->method == "GET"){
				$id = $args[":id"];
				$ward = R::load("ward", $id);
				
				if($ward->id){ 
					$smarty->assign("ward", $ward);
				}else{
					PageError::show('404',NULL,'Ward not found!', "Ward with Id: $id not found!");
					die();
				}
			}
			
			$smarty->assign("request", $request);
			$smarty->display('ward/detailview.tpl');
		}
		
		public function view_list($args){
			$request = $args["request"];
			checkLoggedIn($request->user);
			global $smarty;
			
			if ($request->method == "GET"){
				$smarty->assign("wards", R::find("ward"));	
			}
			
			$smarty->assign("request", $request);
			$smarty->display('ward/list.tpl');
		}
		
		public function search($args){
			$request = $args["request"];
			checkLoggedIn($request->user);
			global $smarty;
			$wards = array();
			
			if ($request->method == "GET" && isset($request->GET['q'])){
				$wards = R::find("ward", 'name=?', array($request->GET['q']));
			}
			
			$smarty->assign("wards", $wards);
			$smarty->assign("request", $request);
			$smarty->display('ward/list.tpl');
		}
		
		public function delete($args){
			$request = $args["request"];
			checkLoggedIn($request->user);
			
			global $smarty;
			
			if ($request->method == "POST"){
				$id = $args[":id"];
				$ward = R::load("ward", $id);
				
				if (!$ward->id){
					PageError::show('404',NULL,'Ward not found!', "Ward with Id: $id not found!");
				}
				
				R::trash($ward);
				redirectToPage('ward-list');
			}else if ($request->method == "GET"){
				$smarty->assign("request", $request);
				$smarty->assign("object_type", "ward");
				$smarty->display('confirm_delete.tpl');
			}
		}
	}
?>