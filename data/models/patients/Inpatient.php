<?php
	class Model_Inpatient extends Model_Patient{
		public function clearBill(){
			$inpatient_products = R::find('inpatient_product', 'inpatient_id = ? AND NOT cleared = 1', array($this->id));
			
			foreach ($inpatient_products as $inpatient_product){
				$inpatient_product->cleared = 1;
				R::store($inpatient_product);
			}
			
			return $inpatient_products;
		}
	}
?>