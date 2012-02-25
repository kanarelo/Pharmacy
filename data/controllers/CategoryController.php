<?php
	class CategoryController{
		public function add($args){
			$request = $args["request"];
			global $router, $smarty;
			userIsAdmin($request->user);
			
			if ($request->method == "POST"){
				$new_category = R::graph($request->POST['category']);
				
				$_id = R::store($new_category);
				if($_id){
					redirectToPage('category-view', array(':id'=>$_id));
				}
			}
			
			$user_ids = array();
			foreach(R::find('user') as $user){
				$user_ids[$user->id] = $user->username;
			}
			$smarty->assign("category", R::dispense('category'));
			$smarty->assign("request", $request);
			$smarty->display('category/edit.tpl');
		}
		
		public function edit($args){
			$request = $args["request"];
			global $smarty;
			userIsAdmin($request->user);
			
			$id = $args[":id"];
			$category = R::load("category", $id);
			
			if(!$category){
				PageError::show('404',NULL,'Category not found!', "Category with Id: $id not found!");
			}
			
			if ($request->method == "POST"){
				if($category->id){
					$edited_category = R::graph($request->POST['category']);
					$edited_category->id = $id;
					
					$_id = R::store($edited_category);
					if ($_id){
						if(isset($request->POST['user'])){
							$user = R::load("user", $request->POST['user']);
							if ($user->id){
								R::store($edited_category);
							}
						}
						redirectToPage('category-view', array(':id'=>$_id));
					}
				}
			}else if ($request->method == "GET"){
				if ($category->id){
					$smarty->assign("category", $category);
					$smarty->assign("users", R::find('user'));
				}else{
					PageError::show('404',NULL,'Category not found!', "Category with Id: $id not found!");
				}
			}
			
			$user_ids = array();
			foreach(R::find('user') as $user){
				$user_ids[$user->id] = $user->username;
			}
			$smarty->assign("users", $user_ids);
			
			$smarty->assign("request", $request);
			$smarty->display('category/edit.tpl');
		}
		
		public function view($args){
			$request = $args["request"];
			checkLoggedIn($request->user);
			global $smarty;
			
			if ($request->method == "GET"){
				$id = $args[":id"];
				$category = R::load("category", $id);
				
				if($category->id){ 
					$smarty->assign("category", $category);
				}else{
					PageError::show('404',NULL,'Category not found!', "Category with Id: $id not found!");
					die();
				}
			}
			
			$smarty->assign("request", $request);
			$smarty->display('category/detailview.tpl');
		}
		
		public function view_list($args){
			$request = $args["request"];
			checkLoggedIn($request->user);
			global $smarty;
			
			if ($request->method == "GET"){
				$smarty->assign("categories", R::find("category"));	
			}
			
			$smarty->assign("request", $request);
			$smarty->display('category/list.tpl');
		}
		
		public function search($args){
			$request = $args["request"];
			checkLoggedIn($request->user);
			global $smarty;
			
			if ($request->method == "GET" && isset($request->GET['q'])){
				$smarty->assign("categories", R::find("category", 'name=?', array($request->GET['q'])));
			}
			
			$smarty->assign("request", $request);
			$smarty->display('category/list.tpl');
		}
	}
?>