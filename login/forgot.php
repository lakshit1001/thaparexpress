<?
if(isset($_POST['ans']))
{
$un = ($_POST['ans']);
$error = array();
if (empty($_POST['ans'])) {//if the email supplied is empty 
        $error[] = 'You forgot to enter  your Email ';
    }
else if (!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $_POST['ans'])) {
           $error[] = 'Invalid Email!';
		   }
else
{


include ('config.php');

$query = "SELECT * FROM members WHERE Email = '$un'";
$result = mysql_query($query) ; 

if(!$result){
            $error[] = 'Invalid Email!';
        }
else
{		
$user = mysql_fetch_array($result) or die(mysql_error());
$uu = $user['rollnum'];
$up = $user['password'];


	
		
	$message = " Your details are<br>Roll number : $uu <br> Password: '$up' ";
                $headers = "From: " . $mail . "\r\n";
				$headers .= "Reply-To: ". $mail . "\r\n";
				$headers .= "MIME-Version: 1.0\r\n";
				$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
				mail($un, 'Password - Thapar Express', $message, $headers);
				
               
$error[] = 'Password sent via Email Successfully!';
				}}
echo '<div class="errormsgbox"> <ol>';
        foreach ($error as $key => $values) {
            
            echo '	<li style=" background: white;">'.$values.'</li>';


       
        }
        echo '</ol></div>';

    }
?>
<!DOCTYPE html>
<html>
	
<head>
	<title>Thapar Express | Forgot</title>
		<meta charset="utf-8">
		<meta name="google-site-verification" content="KoxyJJZ2Y3RvONGZBKpFKrEktEv-P63nxyoLdNTkh4Q" />
		<link href="css/style.css" rel='stylesheet' type='text/css' />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,400,300,600,700' rel='stylesheet' type='text/css'>
		<!--//webfonts-->
		
		
		<link rel="stylesheet" type="text/css" href="../css/component.css" />
				<link href="css/style.css" rel='stylesheet' type='text/css' />

</head>
<body>
	<!-- here is the menu file -->
				<?php include('../menu.php');?>
	
				 <!-----start-main---->
				<div class="login-form">
					<form method="post" action="./forgot">
					<li>
						<input type="text" name="ans" id="ans" class="text" placeholder="EMAIL" >
					</li>
					<a class ="btn btn danger" href="./index">
					<span class="forgot_pass">Suddenly remembered?</span>
					</a>
							
					<div class="p-container">
								
								
								<input type="submit" onclick="myFunction()" class="log_button" value="SUBMIT" >
							<a   href="./register.php" class="reg_button">REGISTER</a>
							<div class="clear"> </div>
					</div>
				
					<div class="p-container">
					
					
					</div>
					
				</form>
			</div>
			<!--//End-login-form-->
			
			<script src="../js/classie.js"></script>

  
		<script>
			new gnMenu( document.getElementById( 'gn-menu' ) );
		</script>
		  
		 
		 		
</body>
</html>