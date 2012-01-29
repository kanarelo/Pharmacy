<?php
	/*
		UserCake
		http://usercake.com
		
		Developed by: Adam Davis
	*/
	
	require_once('/../conf/config.php');
	
	$request = new Request(
		$_COOKIE,
		$_FILES,
		$_GET,
		$_POST,
		$_REQUEST,
		$_SESSION,
		$_SERVER
	);

	$dao = new AuthDAO();
	//Prevent the user visiting the logged in page if he/she is already logged in
	if($request->user->isUserLoggedIn()) { header("Location: account.php"); die(); }
	//Forms posted
	if(!empty($_POST))
	{
		$errors = array();
		$username = trim($_POST["username"]);
		$password = trim($_POST["password"]);
	
		//Perform some validation
		//Feel free to edit / change as required
		if($username == "")
		{
			$errors[] = lang("ACCOUNT_SPECIFY_USERNAME");
		}
		if($password == "")
		{
			$errors[] = lang("ACCOUNT_SPECIFY_PASSWORD");
		}
		
		//End data validation
		if(count($errors) == 0)
		{
			//A security note here, never tell the user which credential was incorrect
			if(!$dao->usernameExists($username))
			{
				$errors[] = lang("ACCOUNT_USER_OR_PASS_INVALID");
			}
			else
			{
				$user = $dao->fetchUserDetails($username);
			
				//See if the user's account is activation
				if($user->is_active==0)
				{
					$errors[] = lang("ACCOUNT_INACTIVE");
				}
				else
				{
					//Hash the password and use the salt from the database to compare the password.
					$entered_pass = generateHash($password,$user->password);

					if($entered_pass != $user->password)
					{
						//Again, we know the password is at fault here, but lets not give away the combination incase of someone bruteforcing
						$errors[] = lang("ACCOUNT_USER_OR_PASS_INVALID");
					}
					else
					{
						//Passwords match! we're good to go'
						//Construct a new logged in user object
						//Transfer some db data to the session object
						$dao->loginUser($user);
						//Redirect to user account page
						header("Location: account.php");
						die();
					}
				}
			}
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
<link href="/KRA/static/css/cakestyle.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="wrapper">
	<div id="content">

        <div id="left-nav">
        <?php include("layout_inc/left-nav.php"); ?>
            <div class="clear"></div>
        </div>

        <div id="main">
        
        <h1>Login</h1>
        
        <?php
        if(!empty($_POST))
        {
        ?>
        <?php
        if(count($errors) > 0)
        {
        ?>
        <div id="errors">
        <?php errorBlock($errors); ?>
        </div>     
        <?php
        } }
        ?> 
        
            <div id="regbox">
                <form name="newUser" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                <p>
                    <label>Username:</label>
                    <input type="text" name="username" />
                </p>
                
                <p>
                     <label>Password:</label>
                     <input type="password" name="password" />
                </p>
                
                <p>
                    <label>&nbsp;</label>
                    <input type="submit" value="Login" class="submit" />
                </p>

                </form>
                
            </div>
        </div>
        
            <div class="clear"></div>
        </div>
</div>
</body>
</html>


