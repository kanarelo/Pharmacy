{extends 'base.tpl'}
{block 'title'}Authentication{/block}

{block 'extrajs'}
	<script src="{#BASE_URL#}/static/js/SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
{/block}

{block 'extracss'}
	<link href="{#BASE_URL#}/static/js/SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="{#BASE_URL#}/static/css/style2.css" media="screen" />
	<!--[if IE 6]>
	<link rel="stylesheet" type="text/css" href="iecss.css" />
	<![endif]-->
	<style type="text/css">
	<!--
	.style2 {
		font-size: 36px;
		color: #00CC33;
		background-image: none;
	}
	.style6 {
		color: #666666;
		font-weight: bold;
		font-size: 14px;
	}
	-->
	</style>
	<style type="text/css">
	<!--
	.style9 {
		color: #FFFFFF
	}
	-->
	</style>
	<style type="text/css">
	<!--
	.style10 {
		font-family: Verdana, Arial, Helvetica, sans-serif
	}
	.style11 {
		color: #000000
	}
	.style12 {
		font-size: 12px;
		font-style: italic;
	}
	.style14 {
		font-size: 36px
	}
	.style15 {
		color: #333333;
		font-weight: bold;
	}
	.style16 {
		font-size: 14px;
		font-weight: bold;
	}
	-->
	</style>
{/block}

{block "middle_box"}
    <div class="middle_box_content">
      <form method="POST" action=".">
        <p >Welcome to the Pharmacare system. Please log in to enjoy our services.</p>
        <table width="478" border="0">
          <tr>
            <td width="324">
            	<table width="324" height="109" border="0" bordercolor="#F0F0F0">
	                <tr>
	                  <td width="141"><span class="style6 style11">Name :</span></td>
	                  <td width="173"><span id="sprytextfield1">
	                  	{if isset($errors)} <div id="errors">{$errors}</div> {/if}
	                    <label>
	                    <input name="username" type="text" id="username">
	                    </label>
	                </tr>
	                <tr>
	                  <td><span class="style6 style11">Password:</span></td>
	                  <td><span id="sprytextfield2">
	                    <label>
	                    <input name="password" type="password" id="mypassword">
	                    </label>
	                </tr>
	                <tr>
	                	<td>
	                		<p class="style15"><a href="{#BASE_URL#}/auth/forgot-password/">Forgot password?</a></p>
	                	</td>
	                	<td style="float: right">
	                		<p class="style15">
			                	<input type="submit" class="login" value="Login"/>
			           		</p>
	                	</td>
	                </tr>
	              </table>
            </td>
            <td width="144">
             </td>
          </tr>
        </table>
      </form>
    </div>
{/block}
