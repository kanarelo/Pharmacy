<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>{block "title"}{/block}</title>
		
		{block "extracss"}{/block}
		{block "extrajs"}{/block}
	</head>
	<body>
		{block "body"}
			<div id="main_container">
				{block "main_container"}
					  <div class="title_icon">
					    <div id="logo"></div>
					    <div class="right_header">
					      <div id="menu">
					      	{block "menu"}
								{include "auth/left-nav.tpl"}
							{/block}
					      </div>
					    </div>
					    <img src="{#BASE_URL#}/static/images/cross.jpg" width="270" height="150" longdesc="{#BASE_URL#}/static/images/cross.jpg" />
					     <div align="left">
					     	<span class="style14">PHARMACARE</span> 
					     	<span class="style12">Your Pharmacy management partner </span> 
					     </div>
					  </div>
					  <div id="middle_box">
						  {block "middle_box"}
						  		
						  {/block}
				{/block}
			</div>
			<div id="footer">
				{block "footer"}
				    <div class="footer_links"></div>
				    <div style="clear:both;">
				      <div align="left"><img src="{#BASE_URL#}/static/images/hioxindia-pharmacy_03.jpg" alt="" width="903" height="86" /></div>
				    </div>
				{/block}
			</div>
		{/block}
	</body>
</html>