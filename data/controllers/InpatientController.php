<?php
	class InpatientController{
		public function add($args){
			$request = $args["request"];
			global $router, $smarty;
			userBelongsToGroups($request->user,'admin,pharmacists');
			
			if ($request->method == "POST"){
				$new_inpatient = R::graph($request->POST['inpatient']);
				
				$_id = R::store($new_inpatient);
				redirectToPag('inpatient-list');
			}
			
			$smarty->assign("users", R::find('user'));
			
			$smarty->assign("request", $request);
			$smarty->assign("inpatient", R::dispense('inpatient'));
			$smarty->display('inpatient/edit.tpl');
		}
		
		public function edit($args){
			$request = $args["request"];
			global $smarty;
			userBelongsToGroups($request->user,'admin,pharmacists');
			
			$id = $args[":id"];
			$inpatient = R::load("inpatient", $id);
			
			if ($request->method == "POST"){
				if($inpatient->id){
					$edited_inpatient = R::graph($request->POST['inpatient']);
					$edited_inpatient->id = $id;
					
					$_id = R::store($edited_inpatient);
					redirectToPage('inpatient-list');
				}
			}else if ($request->method == "GET"){
				if ($inpatient->id){
					$smarty->assign("inpatient", $inpatient);
					$smarty->assign("users", R::find('user'));
					$smarty->assign("parent_user", $inpatient->user);
					
				}else{
					PageError::show('404',NULL,'Inpatient not found!', "Inpatient with Id: $id not found!");
				}
			}
			
			$smarty->assign("request", $request);
			$smarty->display('inpatient/edit.tpl');
		}
		
		public function clear_bill($args){
			$request = $args["request"];
			global $smarty;

			
			$smarty->assign("request", $request);
			$smarty->display('inpatient/assign.tpl');
		}
		
		public function assign_drug($args){
			$request = $args["request"];
			global $smarty;
			userBelongsToGroups($request->user,'nurses');
			
			$id = $args[":id"];
			$inpatient = R::load("inpatient", $id);
			
			if ($request->method == "POST"){
				if($inpatient->id){
					R::associate($inpatient, R::load("product", $request->POST['product']));
					$_id = R::store($inpatient);
					$ip = R::findOne('inpatient_product', 'inpatient_id = ?', array($inpatient->id));
					$ip->time_changed = time();
					$ip->cleared = 0;
					$ip->quantity = $request->POST['quantity'];
					R::store($ip);
					redirectToPage('inpatient-list');
				}
			}else if ($request->method == "GET"){
				if ($inpatient->id){
					$smarty->assign("inpatient", $inpatient);
					$smarty->assign("users", R::find('user'));
					$smarty->assign("parent_user", $inpatient->user);
				}else{
					PageError::show('404',NULL,'Inpatient not found!', "Inpatient with Id: $id not found!");
				}
			}
			
			$smarty->assign("products", R::find('product'));
			$smarty->assign("request", $request);
			$smarty->display('inpatient/assign.tpl');
		}
		
		public function view($args){
			$request = $args["request"];
			checkLoggedIn($request->user);
			global $smarty;
			
			if ($request->method == "GET"){
				$id = $args[":id"];
				$inpatient = R::load("inpatient", $id);
				if($inpatient->id){ 
					$smarty->assign("inpatient", $inpatient);
				}else{
					PageError::show('404',NULL,'Inpatient not found!', "Inpatient with Id: $id not found!");
					die();
				}
			}
			
			$smarty->assign("inpatient_products", R::find('inpatient_product', 'inpatient_id = ? AND NOT cleared = 1', array($inpatient->id)));
			$smarty->assign("request", $request);
			$smarty->display('inpatient/detailview.tpl');
		}
		
		public function view_list($args){
			$request = $args["request"];
			checkLoggedIn($request->user);
			global $smarty;
			
			if ($request->method == "GET"){
				$smarty->assign("inpatients", R::find("inpatient"));	
			}
			
			$smarty->assign("request", $request);
			$smarty->display('inpatient/list.tpl');
		}
		
		public function search($args){
			$request = $args["request"];
			checkLoggedIn($request->user);
			global $smarty;
			$inpatients = array();
			
			if ($request->method == "GET" && isset($request->GET['q'])){
				$inpatients = R::find("inpatient", 'name=?', array($request->GET['q']));
				if(!$inpatients){
					$inpatients = R::find("inpatient", 'id=?', array($request->GET['q']));
				}
			}
			
			$smarty->assign("inpatients", $inpatients);
			$smarty->assign("request", $request);
			$smarty->display('inpatient/list.tpl');
		}
	}
?>