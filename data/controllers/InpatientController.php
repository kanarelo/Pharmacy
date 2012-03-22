<?php
	require_once('PatientController.php');
	
	class InpatientController extends PatientController{
		public function InpatientController(){
			$this->object = "inpatient";
			$this->readableObject = "Inpatient";
		}
	}
?>