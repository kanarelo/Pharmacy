<?php
	class ProductController{
		public function add($args){
			$request = $args["request"];
			global $router, $smarty;
			userIsAdmin($request->user);
			
			if ($request->method == "POST"){
				$new_product = R::graph($request->POST['product']);
				
				if($new_product->category){
					$new_product->category = R::load("category", $new_product->category);;
				}
				$_id = R::store($new_product);
				if($_id){
					redirectToPage('product-list');
				}
			}
			
			$smarty->assign("product", R::dispense('product'));

			$smarty->assign("categories", R::find('category'));
			$smarty->assign("request", $request);
			$smarty->display('product/edit.tpl');
		}
		
		public function feedback($args){
			$request = $args["request"];
			global $router, $smarty;
			userBelongsToGroups($request->user, 'doctors');
			
			$id = $args[":id"];
			$status = $args[":status"];
			$product = R::load("product", $id);
			
			if(!$product->id){
				PageError::show('404',NULL,'Product not found!', "Product with Id: $id not found!");
				die();
			}
			
			if ($request->method == "POST"){
				$feedback = R::graph($request->POST['feedback']);
				$feedback->product = $product;
				$feedback->status = $status;
				$_id = R::store($feedback);
				
				if($_id){
					redirectToPage('product-list');
				}
			}else if ($request->method == "GET"){
				$smarty->assign("categories", R::find('category'));
				$smarty->assign("request", $request);
			}
			$smarty->display('product/feedback.tpl');
		}
		
		public function edit($args){
			$request = $args["request"];
			global $smarty;
			userIsAdmin($request->user);
			
			$id = $args[":id"];
			$product = R::load("product", $id);
			
			if(!$product->id){
				PageError::show('404',NULL,'Product not found!', "Product with Id: $id not found!");
				die();
			}
			
			if ($request->method == "POST"){
				if($product->id){
					$edited_product = R::graph($request->POST['product']);
					$edited_product->id = $id;
					
					if($edited_product->category){
						$edited_product->category = R::load("category", $edited_product->category);
					}
					
					$_id = R::store($edited_product);
					if ($_id){
						redirectToPage('product-list');
					}
				}
			}else if ($request->method == "GET"){
				if ($product->id){
					$smarty->assign("product", $product);
				}else{
					PageError::show('404',NULL,'Product not found!', "Product with Id: $id not found!");
					die();
				}
			}
			
			$smarty->assign("categories", R::find('category'));
			$smarty->assign("request", $request);
			$smarty->display('product/edit.tpl');
		}
		
		public function view($args){
			$request = $args["request"];
			checkLoggedIn($request->user);
			global $smarty;
			
			if ($request->method == "GET"){
				$id = $args[":id"];
				$product = R::load("product", $id);
				
				if($product->id){ 
					$smarty->assign("product", $product);
				}else{
					PageError::show('404',NULL,'Product not found!', "Product with Id: $id not found!");
					die();
				}
			}
			
			$smarty->assign("request", $request);
			$smarty->display('product/detailview.tpl');
		}
		
		public function view_list($args){
			$request = $args["request"];
			checkLoggedIn($request->user);
			global $smarty;
			
			if ($request->method == "GET"){
				$smarty->assign("products", R::find("product"));	
			}
			
			$smarty->assign("request", $request);
			$smarty->display('product/list.tpl');
		}
		
		public function search($args){
			$request = $args["request"];
			checkLoggedIn($request->user);
			global $smarty;
			
			$products = array();
			
			if ($request->method == "GET" && isset($request->GET['q'])){
				$products = R::find("product", 'name=?', array($request->GET['q']));
			}
			
			$smarty->assign("products", $products);
			$smarty->assign("request", $request);
			$smarty->display('product/list.tpl');
		}
		
		public function delete($args){
			$request = $args["request"];
			checkLoggedIn($request->user);
			
			global $smarty;
			
			if ($request->method == "POST"){
				$id = $args[":id"];
				$product = R::load("product", $id);
				
				if (!$product->id){
					PageError::show('404',NULL,'Product not found!', "Product with Id: $id not found!");
				}
				
				R::trash($product);
				redirectToPage('product-list');
			}else if ($request->method == "GET"){
				$smarty->assign("request", $request);
				$smarty->assign("object_type", "product");
				$smarty->display('confirm_delete.tpl');
			}
		}
	}
?>