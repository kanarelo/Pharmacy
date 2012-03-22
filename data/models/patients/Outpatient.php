<?php
	
	class Model_Outpatient extends RedBean_SimpleModel{
		public function clearBill(){
			$outpatient_products = R::find('outpatient_product', 'outpatient_id = ? AND NOT cleared = 1', array($this->id));
			foreach ($outpatient_products as $outpatient_product){
				$outpatient_product->cleared = 1;
				R::store($outpatient_product);
			}
			return $outpatient_products;
		}
	}
?>