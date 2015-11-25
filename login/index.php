<?php

ob_start();
    session_start();
if(isset($_SESSION['rollnum'])){
         header("Location: http://thaparexpress.in/index.php");
    exit();
}?>
<!DOCTYPE html>
<html>
	
<head>
	<title>Thapar Express | Log In</title>
		<meta charset="utf-8">
		<meta name="google-site-verification" content="KoxyJJZ2Y3RvONGZBKpFKrEktEv-P63nxyoLdNTkh4Q" />
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--webfonts-->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,400,300,600,700' rel='stylesheet' type='text/css'>
		<!--//webfonts-->
		<link rel="shortcut icon" href="../favicon.ico">

		<link rel="stylesheet" type="text/css" href="../css/component.css" />
					<link href="css/style.css" rel='stylesheet' type='text/css' />

</head>
<body>
				
					<!-- here is the menu file -->
				<?php include('../menu.php');?>

				 <!-----start-main---->
				<div class="login-form">
					
				<form method="post" action="./login">
					<li>
						<input name="rollnum" required="required" id="rollnum" type="text" class="text"  placeholder="ROLL NUMBER">
					</li>
					<li>
						<input name="password" required="required"  id="password" type="password" placeholder="PASSWORD" }">
					</li>
					<a href="./forgot">
					<span class="forgot_pass">Forgot password?</span>
					</a>
					
								<input type="hidden" name="formsubmitted" value="TRUE" />
					<div class="p-container">
								
								<input type="submit" onclick="myFunction()" class="log_button" value="Sign In" >
								
								<a class="reg_button"  href="./register.php" class="reg_button">Register</a>
								
								
								<div class="clear"> </div>
					</div>
				
					<div class="p-container">
					
					
					</div>
					
				</form>
			</div>
			<!--//End-login-form-->
			
				</div></div>
			<script src="../js/classie.js"></script>
			<script src="../js/modernizr.custom.js"></script>
  
		<script>
			new gnMenu( document.getElementById( 'gn-menu' ) );
		</script>

		 		
</body>
</html>
