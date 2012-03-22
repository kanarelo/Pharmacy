<?php
	require_once('PatientController.php');
	
	class OutpatientController extends PatientController{
		public function OutpatientController(){
			$this->object = "outpatient";
			$this->readableObject = "Outpatient";
		}
	}
?>