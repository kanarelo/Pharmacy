<html lang="en-us">
	<head>
		<meta charset="utf-8">
		<link rel="apple-touch-con" href="">
		<title>Muse Admin Panel</title>
		<link rel="stylesheet" href="{#BASE_URL#}/static/css/columnal.css" type="text/css" media="screen">
		<link rel="stylesheet" href="{#BASE_URL#}/static/css/jqueryui.css" type="text/css" media="screen">
		<link rel="stylesheet" href="{#BASE_URL#}/static/css/style.css" type="text/css" media="screen">
		<link rel="stylesheet" href="{#BASE_URL#}/static/css/global.css" type="text/css" media="screen">
		<link rel="stylesheet" href="{#BASE_URL#}/static/css/config.css" type="text/css" media="screen">
		
		{block "extracss"}
			<link rel="stylesheet" href="{#BASE_URL#}/static/css/superfish.css" type="text/css" media="screen">
			<link rel="stylesheet" href="{#BASE_URL#}/static/css/validationEngine.jquery.css" type="text/css" media="screen">
			<link rel="stylesheet" href="{#BASE_URL#}/static/css/validationEngine.jquery.css" type="text/css" media="screen">
			<link rel="stylesheet" href="{#BASE_URL#}/static/css/jquery.cleditor.css" type="text/css" media="screen">
			<link rel="stylesheet" href="{#BASE_URL#}/static/css/fullcalendar.print.css" type="text/css" media="print">
			<link rel="stylesheet" href="{#BASE_URL#}/static/css/fullcalendar.css" type="text/css" media="screen">
			<link rel="stylesheet" href="{#BASE_URL#}/static/css/colorbox.css" type="text/css" media="screen">
			<link rel="stylesheet" href="{#BASE_URL#}/static/css/colorpicker.css" type="text/css" media="screen">
			<link rel="stylesheet" href="{#BASE_URL#}/static/css/uploadify.css" type="text/css" media="screen">
		{/block}
		{block "extrajs"}
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
			<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
			<script type="text/javascript" src="{#BASE_URL#}/static/js/jquery.placeholder.1.2.min.shrink.js"></script>
			<script src="{#BASE_URL#}/static/js/superfish.js"></script>
			<script type="text/javascript" src="{#BASE_URL#}/static/js/jquery.flot.min.js"></script>
			<script type="text/javascript" src="{#BASE_URL#}/static/js/jquery.flot.pie.min.js"></script>
			<script type="text/javascript" src="{#BASE_URL#}/static/js/jquery.flot.stack.min.js"></script>
			<script src="{#BASE_URL#}/static/js/jquery.validationEngine.js"></script>
			<script src="{#BASE_URL#}/static/js/jquery.validationEngine-en.js"></script>
			<script src="{#BASE_URL#}/static/js/jquery.dataTables.min.js"></script>
			<script src="{#BASE_URL#}/static/js/twipsy.js"></script>
			<script src="{#BASE_URL#}/static/js/jquery.cleditor.min.js"></script>
			<script src="{#BASE_URL#}/static/js/fullcalendar.min.js"></script>
			<script src="{#BASE_URL#}/static/js/gcal.js"></script>
			<script src="{#BASE_URL#}/static/js/jquery.colorbox-min.js"></script>
			<script src="{#BASE_URL#}/static/js/colorpicker.js"></script>
			<script src="{#BASE_URL#}/static/js/muse.js"></script>
			<script type="text/javascript" src="{#BASE_URL#}/static/js/jquery.uploadify.v2.1.4.min.js"></script>
			<script type="text/javascript" src="{#BASE_URL#}/static/js/swfobject.js"></script>
			<script src="{#BASE_URL#}/static/js/demo.js"></script>
		{/block}
	</head>
	<body {block "body-id"}{/block}>
		{block "body"}
			<div id="cboxOverlay" style="display: none; "></div>
			<div style="padding-bottom: 42px; padding-right: 42px; display: none; " id="colorbox">
				<div id="cboxWrapper" style="">
					<div style="">
						<div id="cboxTopLeft" style="float: left; "></div><div id="cboxTopCenter" style="float: left; "></div><div id="cboxTopRight" style="float: left; "></div>
					</div>
					<div style="clear: left; ">
						<div id="cboxMiddleLeft" style="float: left; "></div>
						<div id="cboxContent" style="float: left; ">
							<div id="cboxLoadedContent" style="width: 0px; height: 0px; overflow-x: hidden; overflow-y: hidden; "></div><div id="cboxLoadingOverlay" style=""></div><div id="cboxLoadingGraphic" style=""></div><div id="cboxTitle" style=""></div><div id="cboxCurrent" style=""></div><div id="cboxNext" style=""></div><div id="cboxPrevious" style=""></div><div id="cboxSlideshow" style=""></div><div id="cboxClose" style=""></div>
						</div><div id="cboxMiddleRight" style="float: left; "></div>
					</div>
					<div style="clear: left; ">
						<div id="cboxBottomLeft" style="float: left; "></div><div id="cboxBottomCenter" style="float: left; "></div><div id="cboxBottomRight" style="float: left; "></div>
					</div>
				</div><div style="position: absolute; width: 9999px; visibility: hidden; display: none; "></div>
			</div>
			<div id="wrap">
				<div id="main">
					<header class="container">
						<div class="row clearfix">
							<div class="left">
								<a href="index.php" id="logo">Muse</a>
							</div>
							<div class="right">
								<ul id="toolbar">
									<li>
										<span>Logged in as </span><a class="user" href="#">{$request->user->username}</a>
									</li>
									<li>
										<a id="logoutprofile" href="{#BASE_URL#}/auth/logout/">Logout</a>
									</li>
								</ul>
							</div>
						</div>
					</header>
					<nav class="container">
						<ul class="sf-menu mobile-hide row clearfix sf-js-enabled sf-shadow">
							<li class="active iconed">
								<a href="{#BASE_URL#}/"><span><img src="{#BASE_URL#}/static/images/icon_dashboard.png"> Dashboard</span></a>
							</li>
							<li>
								<a href="{#BASE_URL#}/products/"><span>Products</span></a>
							</li>
							{if $request->user->belongsToGroups('nurses')}
							{else if $request->user->belongsToGroups('pharmacists')}
								<li>
									<a href="{#BASE_URL#}/wards/"><span>Wards</span></a>
								</li>
								<li>
									<a href="" class="sf-with-ul"><span>Staff</span><span class="sf-sub-indicator"> »</span></a>
									<ul style="display: none; visibility: hidden; ">
										<li>
											<a href="{#BASE_URL#}/staff/doctors/"><span>Doctors</span></a>
										</li>
										<li>
											<a href="{#BASE_URL#}/staff/doctors/"><span>Nurses</span></a>
										</li>
										<li>
											<a href="{#BASE_URL#}/staff/stock-personel/"><span>Stock</span></a>
										</li>
										<li>
											<a href="{#BASE_URL#}/staff/pharmacists/"><span>Pharmacists</span></a>
										</li>
									</ul>
								</li>
							{else if $request->user->belongsToGroups('doctors')}
							{else if $request->user->belongsToGroups('inventory-personel')}
							{/if}
							{if $request->user->belongsToGroups('admin') && !$request->user->belongsToGroups('pharmacists')}
								<li>
									<a href="" class="sf-with-ul"><span>Staff</span><span class="sf-sub-indicator"> »</span></a>
									<ul style="display: none; visibility: hidden; ">
										<li>
											<a href="{#BASE_URL#}/staff/doctors/"><span>Doctors</span></a>
										</li>
										<li>
											<a href="{#BASE_URL#}/staff/doctors/"><span>Nurses</span></a>
										</li>
										<li>
											<a href="{#BASE_URL#}/staff/stock-personel/"><span>Stock</span></a>
										</li>
										<li>
											<a href="{#BASE_URL#}/staff/pharmacists/"><span>Pharmacists</span></a>
										</li>
									</ul>
								</li>
								<li>
									<a href="{#BASE_URL#}/admin/users/"><span>Users</span></a>
								</li>
							{/if}
						</ul>
					</nav>
					<div id="titlediv">
						{block "titlediv"}
							<div class="clearfix container" id="pattern">
								<div class="row">
									<div class="col_12">
										<ul class="breadcrumbs hor-list">
											<li>
												<a href="index.php">Dashboard</a>
											</li>
										</ul>
										<h1>{block "page-title"}Dashboard{/block}</h1>
									</div>
								</div>
							</div>
						{/block}
					</div>
					<div class="container" id="actualbody">{block "container"}{/block}</div>
				</div>
			</div>
			<footer>
				{block "footer"}
					<div class="container">
						<div class="row clearfix">
							<div class="col_12">
								<span class="left">© 2011 Themio.</span>
								<span class="right">Powered by Muse</span>
							</div>
						</div>
					</div>
				{/block}
			</footer>
		{/block}
	</body>
</html>