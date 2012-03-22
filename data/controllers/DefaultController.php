<?php
	class DefaultController{
		public function index($args){
			$request = $args["request"];
			checkLoggedIn($request->user);
			
			redirectToPage('user-dashboard');
		}
		
		public function user_dashboard($args){
			$request = $args["request"];
			checkLoggedIn($request->user);
			
			global $smarty;
			
			if($request->user->belongsToGroup(array('admin'))){
				redirectToPage('admin-dashboard');
			}
			
			$smarty->assign("request", $request);
			$smarty->display('dashboard.tpl');
		}
		
		public function admin_dashboard($args){
			$request = $args["request"];
			userIsAdmin($request->user);
			global $smarty;
			
			$smarty->assign("request", $request);
			$smarty->display('admin_dashboard.tpl');
		}
		
		public function contacts($args){
			$request = $args["request"];
			global $smarty;
			
			$smarty->assign("request", $request);
			$smarty->display('admin_dashboard.tpl');
		}

		public function feedback($args){
			$request = $args["request"];
			global $smarty;
			$request->user->belongsToGroup(array('admin,doctors,pharmacists'));
			
			$smarty->assign("request", $request);
			$smarty->assign("feedbacks", R::find('productfeedback'));
			createPDF($smarty->fetch('feedback_report.tpl'), "Feedback-Report");
		}
	}
?>