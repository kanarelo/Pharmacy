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
	}
?>