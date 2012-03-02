<?php
	class OutpatientController{
		public function add($args){
			$request = $args["request"];
			global $router, $smarty;
			userBelongsToGroups($request->user,'admin,pharmacists');
			
			if ($request->method == "POST"){
				$new_outpatient = R::graph($request->POST['outpatient']);
				
				$_id = R::store($new_outpatient);
				if($_id){
					if(isset($request->POST['user'])){
						$user = R::load("user", $request->POST['user']);
						if ($user->id){
							$user->ownOutpatient[] = $new_outpatient;
							R::store($user);
						}
					}
					redirectToPage('outpatient-list');
				}
			}
			
			$smarty->assign("users", R::find('user'));
			
			$smarty->assign("request", $request);
			$smarty->assign("outpatient", R::dispense('outpatient'));
			$smarty->display('outpatient/edit.tpl');
		}
		
		public function edit($args){
			$request = $args["request"];
			global $smarty;
			userBelongsToGroups($request->user,'admin,pharmacists');
			
			$id = $args[":id"];
			$outpatient = R::load("outpatient", $id);
			
			if ($request->method == "POST"){
				if($outpatient->id){
					$edited_outpatient = R::graph($request->POST['outpatient']);
					$edited_outpatient->id = $id;
					
					$_id = R::store($edited_outpatient);
					if ($_id){
						if(isset($request->POST['user'])){
							$user = R::load("user", $request->POST['user']);
							if ($user->id){
								$user->ownOutpatient[] = $edited_outpatient;
								R::store($user);
							}
						}
						redirectToPage('outpatient-list');
					}
				}
			}else if ($request->method == "GET"){
				if ($outpatient->id){
					$smarty->assign("outpatient", $outpatient);
					$smarty->assign("users", R::find('user'));
					$smarty->assign("parent_user", $outpatient->user);
					
				}else{
					PageError::show('404',NULL,'Outpatient not found!', "Outpatient with Id: $id not found!");
				}
			}
			
			$smarty->assign("request", $request);
			$smarty->display('outpatient/edit.tpl');
		}
		
		public function view_list($args){
			$request = $args["request"];
			checkLoggedIn($request->user);
			global $smarty;
			
			if ($request->method == "GET"){
				$smarty->assign("outpatients", R::find("outpatient"));	
			}
			
			$smarty->assign("request", $request);
			$smarty->display('outpatient/list.tpl');
		}
		
		public function search($args){
			$request = $args["request"];
			checkLoggedIn($request->user);
			global $smarty;
			$outpatients = array();
			
			if ($request->method == "GET" && isset($request->GET['q'])){
				$outpatients = R::find("outpatient", 'name=?', array($request->GET['q']));
				if(!$outpatients){
					$outpatients = R::find("outpatient", 'id=?', array($request->GET['q']));
				}
			}
			
			$smarty->assign("request", $request);
			$smarty->assign("outpatients", $outpatients);
			$smarty->display('outpatient/list.tpl');
		}
		
		public function delete($args){
			$request = $args["request"];
			checkLoggedIn($request->user);
			
			global $smarty;
			
			if ($request->method == "POST"){
				$id = $args[":id"];
				$outpatient = R::load("outpatient", $id);
				
				if (!$outpatient->id){
					PageError::show('404',NULL,'Outpatient not found!', "Outpatient with Id: $id not found!");
				}
				
				R::trash($outpatient);
				redirectToPage('outpatient-list');
			}else if ($request->method == "GET"){
				$smarty->assign("request", $request);
				$smarty->assign("object_type", "outpatient");
				$smarty->display('confirm_delete.tpl');
			}
		}
	}
?>