<?php
	class PatientController{
		public function add($args){
			$request = $args["request"];
			global $router, $smarty;
			userBelongsToGroups($request->user,'admin,doctors,pharmacists');

			if ($request->method == "POST"){
				$new_object = R::graph($request->POST['patient']);
				
				$_id = R::store($new_object);
				redirectToPage("$this->object-list");
			}
			
			$smarty->assign("users", R::find('user'));
			
			$smarty->assign("request", $request);
			$smarty->assign('patient', R::dispense($this->object));
			$smarty->display("$this->object/edit.tpl");
		}
		
		public function edit($args){
			$request = $args["request"];
			global $smarty;
			userBelongsToGroups($request->user,'admin,doctors,pharmacists');
			
			$id = $args[":id"];
			$object = R::load("$this->object", $id);
			
			if ($request->method == "POST"){
				if($object->id){
					$edited_object = R::graph($request->POST['patient']);
					$edited_object->id = $object->id;
					
					$_id = R::store($edited_object);
					redirectToPage("$this->object-list");
				}
			}else if ($request->method == "GET"){
				if ($object->id){
					$smarty->assign('patient', $object);
					
				}else{
					PageError::show('404',NULL,"$this->readableObject not found!", "$this->readableObject with Id: $id not found!");
				}
			}
			
			$smarty->assign("request", $request);
			$smarty->display("$this->object/edit.tpl");
		}
		
		public function clear_bill_approved($args){
			$request = $args["request"];
			global $smarty;

			userBelongsToGroups($request->user,'admin,pharmacists');
			$id = $args[":id"];
			$object = R::load($this->object, $id);
			$object_products = $object->clearBill();
			
			if (count($object_products) > 0){
				$total = 0; 
				
				foreach ($object_products as $object_product){
					$total += ($object_product->product->price * $object_product->quantity);
				}
				
				$smarty->assign('patient', $object);
				$smarty->assign("total", $total);
				$smarty->assign("patient_products", $object_products);
				$smarty->assign("request", $request);
				
				createPDF($smarty->fetch('receipt.tpl'), $object->name);
			}else{
				print "No $this->readableObject Found";
			}
		}
		
		public function clear_bill($args){
			$request = $args["request"];
			global $smarty;

			userBelongsToGroups($request->user,'admin,pharmacists');
			
			$id = $args[":id"];
			$object = R::load($this->object, $id);
			
			$smarty->assign('patient', $object);
			$smarty->assign("patient_products", R::find($this->object."_product", $this->object.'_id = ? AND NOT cleared = 1', array($object->id)));
			$smarty->assign("request", $request);
			$smarty->display("$this->object/clear_bill.tpl");
		}
		
		public function assign_drug($args){
			$request = $args["request"];
			global $smarty;
			
			if ($this->object == "inpatient")
				userBelongsToGroups($request->user,'nurses');
			else
				userBelongsToGroups($request->user,'doctors');
			
			$id = $args[":id"];
			$object = R::load("$this->object", $id);
			
			if (!$object->id){
				PageError::show('404',NULL,"$this->readableObject not found!", "$this->readableObject with Id: $id not found!");
				die();
			}
			
			if ($request->method == "POST"){
				$pp = R::findOne($this->object."_product", $this->object.'_id=? AND product_id=? AND NOT cleared=1', array($object->id, $request->POST['product']));
				if (is_null($pp)){
					$pp = R::load($this->object."_product", R::associate($object, R::load("product", $request->POST['product'])));
					$_id = R::store($object);
				}
				$pp->quantity = $request->POST['quantity'];
				$pp->time_changed = time();
				$pp->cleared = 0;
				R::store($pp);
				
				redirectToPage("$this->object-view", array(':id' => $object->id));
			}else if ($request->method == "GET"){
				$smarty->assign('patient', $object);
			}
			
			$smarty->assign("products", R::find('product'));
			$smarty->assign("request", $request);
			$smarty->display("$this->object/assign.tpl");
		}
		
		public function view($args){
			$request = $args["request"];
			checkLoggedIn($request->user);
			global $smarty;
			
			if ($request->method == "GET"){
				$id = $args[":id"];
				$object = R::load("$this->object", $id);
				if($object->id){ 
					$smarty->assign('patient', $object);
				}else{
					PageError::show('404',NULL,"$this->readableObject not found!", "$this->readableObject with Id: $id not found!");
					die();
				}
			}
			
			$smarty->assign("patient_products", R::find($this->object."_product", $this->object."_id = ? AND NOT cleared = 1", array($object->id)));
			$smarty->assign("request", $request);
			$smarty->display("$this->object/detailview.tpl");
		}
		
		public function view_list($args){
			$request = $args["request"];
			checkLoggedIn($request->user);
			global $smarty;
			
			if ($request->method == "GET"){
				$smarty->assign("patients", R::find($this->object));	
			}
			
			$smarty->assign("request", $request);
			$smarty->display("$this->object/list.tpl");
		}
		
		public function search($args){
			$request = $args["request"];
			checkLoggedIn($request->user);
			global $smarty;
			$object = array();
			
			if ($request->method == "GET" && isset($request->GET['q'])){
				$object = R::find($this->object, 'name like "%'.$request->GET['q'].'%"');
				if(!$object){
					$$thisobjects = R::find($this->object, 'id=?', array($request->GET['q']));
				}
			}
			
			$smarty->assign("$this->object", $object);
			$smarty->assign("request", $request);
			$smarty->display("$this->object/list.tpl");
		}
		
		public function delete($args){
			$request = $args["request"];
			checkLoggedIn($request->user);
			
			global $smarty;
			
			if ($request->method == "POST"){
				$id = $args[":id"];
				$object = R::load('patient', $id);
				
				if (!$object->id){
					PageError::show('404',NULL,"$this->readableObject not found!", "$this->readableObject with Id: $id not found!");
				}
				
				R::trash($object);
				redirectToPage("$this->object-list");
			}else if ($request->method == "GET"){
				$smarty->assign("request", $request);
				$smarty->assign("object_type", $this->object);
				$smarty->display('confirm_delete.tpl');
			}
		}
	}
?>